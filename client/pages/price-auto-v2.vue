<template>
  <div class="container" v-if="details">
    <template v-if="isDefault">
      <div class="row">
        <div class="col-lg-12">
          <h1>{{ details.defaultText.title }}</h1>
          <p class="font-weight-bolder">{{ details.defaultText.subtitle }}</p>

          <div v-for="(info, index) in details.defaultText.lists" :key="`lists-${index}`">
            <h3>{{ info.title }}</h3>
            <p v-if="info.subtitle">{{ info.subtitle }}</p>

            <select v-model="priceFields[info.name]" :name="info.name" class="form-control" @change="selectChange(info.name)" :ref="`ref_${info.name}`">
              <option v-for="(sel, selIndex) in info.selection" :key="`selection-${index}-${selIndex}`" :value="sel.key">
                {{ sel.value }}
              </option>
            </select>

            <template v-if="info.notes">
              <paragraph :desc="info.notes" />
            </template>
          </div>

          <button @click="computePrice" class="btn btn-success btn-block mt-2">{{ details.defaultText.buttonName }}</button>
        </div>
      </div>
    </template>
    <template v-else>
      <div id="printable">
        <div class="row">
          <div class="col-lg-12">
            <h1 style="font-weight: bold;font-size: 36px; line-height: 44px; color: #000000; margin-bottom: 1.5rem;">{{ details.resultText.title }}</h1>
            <h5 v-for="(sub, index) in details.resultText.subtitle" :key="`result-subtitle-${index}`" :value="sub.key">
              <span v-html="sub"></span>
            </h5>
            <h5>{{ details.resultText.name }} <span class="hutoaka">$ {{ totalPrice }}</span>(USD)</h5>
          </div>
        </div>
        <template v-if="details.resultText.buttonImage && notForPrinting">
          <div class="row">
            <div class="col-sm-12 col-sm-12 col-lg-6" v-for="(imgLink, index) in details.resultText.buttonImage" :key="`result-image-${index}`">
              <a :href="imgLink.link">
                <img :src="`/assets/images/prices/price-auto/${imgLink.image}`" class="w-100" />
              </a>
            </div>
          </div>
        </template>
        <div class="row">
          <div class="col-lg-12">
            <template v-if="details.resultText.breakdown.title">
            <h2 style="font-weight: bold; font-size: 32px; line-height: 39px; color: #2165B9; text-align: left; margin-top: 3rem; padding-bottom: 1rem; margin-bottom: 1rem; border-bottom: 2px solid #DFDFDF; width: 100%;">{{ details.resultText.breakdown.title }}</h2>
            </template>
            <template v-else>
            <h2> Course: {{ getCourseDescription() }}</h2>
            </template>

            <div class="table-responsive">
              <table class="table table-striped" style="width: 100%; margin-bottom: 1rem; color: #212529;">
                <thead>
                  <tr>
                    <th v-for="(text_th, index_th) in details.resultText.breakdown.header" :key="`breakdown-header-${index_th}`" style="vertical-align: bottom; border-bottom: 2px solid #dee2e6;">
                      {{ text_th }}
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(text_td, index_td) in details.resultText.breakdown.content" :key="`breakdown-header-${index_td}`" v-show="resultFields[text_td.key].show">
                   <template v-if="lang == 'jp'">
                        <template v-if="text_td.key == 'tuition'">  
                        <td v-if="text_td.title">{{ text_td.title }} ({{week}} {{weekText}})</td>
                        </template>
                        <template v-else-if="text_td.key == 'housing_rent'">
                          <td v-if="text_td.title">{{ text_td.title }} {{week}} {{weekText}} [{{ accommodationNameJp }}]</td>
                        </template>
                        <template v-else>
                          <td v-if="text_td.title">{{ text_td.title }}</td>
                        </template>
                        <td>{{ resultFields[text_td.key].value }}</td>
                    </template>
                    <template v-else>
                        <template v-if="text_td.key == 'tuition'">  
                        <td v-if="text_td.title">{{ text_td.title }} ({{week}} {{weekText}})</td>
                        </template>
                        <template v-else-if="text_td.key == 'housing_rent'">
                          <td v-if="text_td.title">{{ text_td.title }} {{week}} {{weekText}} [{{accommodationName}}]</td>
                        </template>
                        <template v-else-if="text_td.key == 'extra'">
                          <td v-if="text_td.title">{{ text_td.title }} [{{extra}}]</td>
                        </template>
                        <template v-else>
                          <td v-if="text_td.title">{{ text_td.title }} <br/> {{ text_td.note }} </td>
                        </template>
                        <td>{{ resultFields[text_td.key].value }}</td>
                    </template>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="mt-10 mb-10 text-center" v-if="notForPrinting">
              <template v-for="(btn_det, btn_index) in details.resultText.breakdown.btn">
                <button v-if="btn_det.key == 'send_email'" class="btn btn-primary ml-1 mr-1" :key="`breakdown-button-${btn_index}`" data-toggle="modal" data-target="#sendEmailModal">
                  <span v-html="btn_det.value"></span>
                </button>
                <button v-else @click="estimateButtons(btn_det.key)" class="btn btn-primary ml-1 mr-1" :key="`breakdown-button-${btn_index}`">
                  <span v-html="btn_det.value"></span>
                </button>
              </template>
            </div>
            <template v-if="details.resultText.note">
            <div style="background: #FFFBDA; border-radius: 6px; padding: 20px; margin: 50px 0;">
              <p style="color: #ff0000"><b>{{ details.resultText.note.title }}</b></p>
              <list-text :listObj="details.resultText.note.lists" />
            </div>
            </template>

            <template v-if="notForPrinting">
              <h3>{{ details.resultText.faq.title }}</h3>

              <div v-for="(faq_text, faq_index) in details.resultText.faq.lists" :key="`faq-lists-${faq_index}`">
                <p>
                  <b>{{ faq_text.key }}</b>
                  <br />
                  {{ faq_text.value }}
                  <br />

                  <template v-if="faq_text.link">
                    <a :href="faq_text.link">
                      <span v-html="faq_text.link_text"></span>
                    </a>
                  </template>
                </p>
              </div>

              <div>
                <a :href="details.resultText.faq.btnApply.link">
                  <button class="btn btn-success btn-lg btn-block mb-3">{{ details.resultText.faq.btnApply.text }}</button>
                </a>
                <button class="btn btn-secondary btn-lg btn-block mb-3" @click="toggleCompute()">
                  {{ details.resultText.faq.btnCalculate }}
                </button>
              </div>
            </template>

          </div>
        </div>
      </div>
    </template>

    <!-- Modal -->
    <div class="modal fade" id="sendEmailModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form v-on:submit.prevent="submitFormEmail" method="post">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">{{ details.sendToEmail.title }}</h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form-handler :formInfos="details.sendToEmail.forms" ref="sendToEmailModal"/>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <template v-if="isLoading">
                <button class="btn btn-primary btn-block" type="button" disabled>
                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                  Sending mail, please wait...
                </button>
              </template>
              <template v-else>
                    <button type="submit" class="btn btn-primary">{{ details.btn_label }}</button>
              </template>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
  import helpers from '../plugins/helpers.js';
	export default {
    async asyncData({ $content, $axios, params }) {
      const details = await $content(`price-auto-v2/en`).fetch();
      const lang = (params.slug) ? params.slug : 'en';

      return {
        details,
        lang,
        $axios
      }
    },
		head() {
			if(this.details) {
				return {
					title: this.details.pageTitle,
					meta: [
						{
						hid: 'description',
						name: 'description',
						content: this.details.pageDescription
						}
					],
				}
			}
		},
    data() {
			return {
        totalPrice: '',
        notForPrinting: true,
        isDefault: true,
        priceFields: {
          course: 'esl',
          week: '1',
          visa: 'student_visa',
          age: 'under_18',
          accommodation: 'one',
          extra: '',
          transport: 'yes',
        },
        resultFields: {
          processing_fee: {
            show: true,
            value: '$150',
          },
          tuition: {
            show: true,
            value: ''
          },
          sevis: {
            show: true,
            value: '$350',
          },
          i20: {
            show: true,
            value: '$0'
          },
          housing_placement: {
            show: true,
            value: ''
          },
          housing_rent: {
            show: true,
            value: ''
          },
          extra: {
            show: true,
            value: ''
          },
          security_deposit: {
            show: true,
            value: '$300',
          },
          transport: {
            show: true,
            value: ''
          },
        },
        isLoading: false,
			}
		},
    methods: {
      async submitFormEmail(e) {
        e.preventDefault();
        this.isLoading = true;

        const dataFields = Object.assign({}, this.$refs.sendToEmailModal.getFormData());
              dataFields.language = this.lang;
              dataFields.message = dataFields.message == null ? '' : dataFields.message;
              dataFields.phone_call = !dataFields.phone_call ? false : true;
              
              dataFields.totalPrice = this.totalPrice;
              dataFields.processing_fee = this.resultFields.processing_fee.value;
              dataFields.tuition = this.resultFields.tuition.value;
              dataFields.i20 = this.resultFields.i20.value;
              dataFields.sevis = this.resultFields.sevis.value;
              dataFields.extra = this.resultFields.extra.value;
              dataFields.housing_placement = this.resultFields.housing_placement.value;
              dataFields.housing_rent = this.resultFields.housing_rent.value;
              dataFields.security_deposit = this.resultFields.security_deposit.value;
              dataFields.transport = this.resultFields.transport.value;
              
              dataFields.week = this.week;
              dataFields.weekText = this.weekText;
              dataFields.extra = this.extra;
              dataFields.extra_day = this.extraDay;
              dataFields.title = this.resultFields.title;
              dataFields.course_title = this.resultFields.courseTitle;
              dataFields.name = this.resultFields.name;
              dataFields.accommodation = this.accommodationName;
              dataFields.course_description = this.getCourseDescription();

              dataFields.visa = this.priceFields.visa;
              dataFields.course = this.priceFields.course;
              dataFields.accommodationKey = this.priceFields.accommodation;

        dataFields.utm_source = helpers.getToken('utm_source');
        await this.$axios.post('/api/price-send-email', dataFields).then(function(response) {
          this.isLoading = false;
          window.location.href = '/contact/thanks';
        }.bind(this));
      },
      getCourseDescription: function() {
        const course = this.details.defaultText.lists[0].selection.filter(course => course.key == this.priceFields.course);

        return (course) ? course[0].value : '';
      },
      toggleCompute: function() {
        this.isDefault = !this.isDefault;
      },
      selectChange(forminfo) {
        if (forminfo == 'accommodation') {
          const isReadOnly = this.priceFields[forminfo] != "no";

          this.$refs.ref_transport[0].disabled = isReadOnly;

          if(isReadOnly) this.priceFields['transport'] = 'yes';
        }
      },
      computePrice: function(e) {
        const { course, week, extra, visa, age, accommodation, transport } = this.priceFields;
        let price = 305;

        if (!course || !week || week < 1 || week > 48) {
          return false;
        }

        if (week >= 1 && week <= 4) {
          price = 305;
        } else if (week >= 5 && week <= 12) {
          price = 249;
        } else if (week == 13) {
          price = 238;
        } else if (week >= 14 && week <= 24) {
          price = 226;
        } else if (week >= 25 && week <= 36) {
          price = 218;
        } else if (week >= 37 && week <= 48) {
          price = 209;
        }

        var cal_week_total = price * week;
        var total_price = cal_week_total + 150;

        switch(visa) {
          // Please list down the other languages
          case 'student_visa':
            total_price += 350 + 0;
          break;
          default:
            this.resultFields.sevis.show = false;
            this.resultFields.i20.show = false;
        }

        if (transport == 'yes') {
          this.resultFields.transport.value = '$160';
          total_price += 160;
        } else {
          this.resultFields.transport.show = false;
        }

        if (extra != 0) {
          this.resultFields.extra.show = true;
        } else {
          this.resultFields.extra.show = false;
        }
        if (accommodation != "no" && age != "under_18") {
          var placement = 0;
          var price_per_week = 0;
          var accommodation_name = '';
          var accommodation_name_jp = '';
          var text = '';

          switch (accommodation) {
            case "home_one":
              accommodation_name = "Homestay(Private)";
              accommodation_name_jp = "ホームステイ(1人部屋)";
              text = "ホームステイ（1人部屋）";
              placement = 300;
              extra_day = 63;

              if (week < 4){
                price_per_week = 436;
              } else {
                price_per_week = 395;
              }
            break;
            case "home_two":
              accommodation_name = "Homestay(Shared)";
              accommodation_name_jp = "ホームステイ(シェアルーム)";
              text = "ホームステイ（シェアルーム）";
              placement = 300;
              extra_day = 55;

              if (week < 4){
                price_per_week = 384;
              } else {
                price_per_week = 363;
              }
            break;
            case "one":
              accommodation_name = "Dormitory (Private Room)";
              accommodation_name_jp = "寮（1人部屋）";
              text = "寮（1人部屋）";
              placement = 200;
              extra_day = 80;

              if (week >= 1 && week <= 4) {
                price_per_week = 550;
              } else if (week >= 5 && week <= 12) {
                price_per_week = 520;
              } else {
                price_per_week = 500;
              }
            break;
            case "two":
              accommodation_name = "Dormitory (Shared-2 Room)";
              accommodation_name_jp = "寮（2人部屋）";
              text = "寮（2人部屋）";
              placement = 200;
              extra_day = 60;

              if (week >= 1 && week <= 4) {
                price_per_week = 410;
              } else if (week >= 5 && week <= 12) {
                price_per_week = 370;
              } else {
                price_per_week = 350;
              }
            break;
            case "four":
              accommodation_name = "Dormitory (Shared-4 Room)"
              accommodation_name_jp = "寮（4人部屋）";
              text = "寮（4人部屋）";
              placement = 200;
              extra_day = 50;

              if (week >= 1 && week <= 4) {
                price_per_week = 300;
              } else if (week >= 5 && week <= 12) {
                price_per_week = 270;
              } else {
                price_per_week = 250;
              }
            break;
            default:
              text = "手配の必要なし";
              price_per_week = 0;
          }

          if (accommodation != 'no' && transport != 'yes' ) {
            placement = placement + 30;
          }

          var extra_day = extra_day * extra 
          var total_stay = price_per_week * week 
          total_price += total_stay  + placement + extra_day + 300; //300 Security Desposit

          this.totalPrice = total_price;
          this.resultFields.housing_rent.value = "$" + total_stay;
          this.resultFields.housing_placement.value = "$" + placement;

        } 
        else if (accommodation != "no" && age != "over_18"){

          var placement = 0;
          var price_per_week = 0;
          var accommodation_name = '';
          var accommodation_name_jp = '';
          var text = '';

          switch (accommodation) {
            case "home_one":
              accommodation_name = "Homestay(Private)";
              accommodation_name_jp = "ホームステイ(1人部屋)";
              text = "ホームステイ（1人部屋）";
              placement = 300;
              extra_day = 70;

              if (week < 4){
                price_per_week = 480;
              } else {
                price_per_week = 435;
              }
            break;
            case "home_two":
              accommodation_name = "Homestay(Shared)";
              accommodation_name_jp = "ホームステイ(シェアルーム)";
              text = "ホームステイ（シェアルーム）";
              placement = 300;
              extra_day = 60;

              if (week < 4){
                price_per_week = 422;
              } else {
                price_per_week = 399;
              }
            break;
            case "one":
              accommodation_name = "Dormitory (Private Room)";
              accommodation_name_jp = "寮（1人部屋）";
              text = "寮（1人部屋）";
              placement = 200;
              extra_day = 90;

              if (week >= 1 && week <= 4) {
                price_per_week = 605;
              } else if (week >= 5 && week <= 12) {
                price_per_week = 572;
              } else {
                price_per_week = 500;
              }
            break;
            case "two":
              accommodation_name = "Dormitory (Shared-2 Room)";
              accommodation_name_jp = "寮（2人部屋）";
              text = "寮（2人部屋）";
              placement = 200;
              extra_day = 65;

              if (week >= 1 && week <= 4) {
                price_per_week = 451;
              } else if (week >= 5 && week <= 12) {
                price_per_week = 407;
              } else {
                price_per_week = 350;
              }
            break;
            case "four":
              accommodation_name = "Dormitory (Shared-4 Room)"
              accommodation_name_jp = "寮（4人部屋）";
              text = "寮（4人部屋）";
              placement = 200;
              extra_day = 55;

              if (week >= 1 && week <= 4) {
                price_per_week = 330;
              } else if (week >= 5 && week <= 12) {
                price_per_week = 297;
              } else {
                price_per_week = 250;
              }
            break;
            default:
              text = "手配の必要なし";
              price_per_week = 0;
          }

          if (accommodation != 'no' && transport != 'yes' ) {
            placement = placement + 30;
          }

          var extra_day = extra_day * extra 
          var total_stay = price_per_week * week 
          total_price += total_stay  + placement + extra_day + 300; //300 Security Desposit

          this.totalPrice = total_price;
          this.resultFields.housing_rent.value = "$" + total_stay;
          this.resultFields.housing_placement.value = "$" + placement;
        }
        
        else {
          this.resultFields.housing_placement.show = false;
          this.resultFields.housing_rent.show = false;
          this.resultFields.security_deposit.show = false;
        }

        this.resultFields.title =  this.details.resultText.title;
        this.resultFields.courseTitle =  this.details.resultText.breakdown.title;
        this.resultFields.note =  this.details.resultText.breakdown.note;
        this.resultFields.name =  this.details.resultText.name;

        this.resultFields.extra.value = "$" + extra_day;
        this.resultFields.tuition.value = "$" + cal_week_total;
        var week_text = "weeks";

        if( week == 1){
          week_text = "week";
        }

        this.accommodationName = accommodation_name;
        this.accommodationNameJp = accommodation_name_jp;
        this.week = week;
        this.extra = extra;
        this.extraDay = extra_day;
        this.weekText = week_text;
        this.totalPrice = total_price;
        this.toggleCompute();
      },
      estimateButtons(btn) {
        const vm = this;

        switch(btn) {
          case 'print':
            const self = this;
            this.notForPrinting = false;
            setTimeout(function() {
              const divToPrint = document.getElementById("printable");
              const newWin = window.open("");
              newWin.document.write(divToPrint.outerHTML);
              newWin.print();
              newWin.close();
              self.notForPrinting = true;
            }, 100);
            return;
        }
      }
    },
    mounted() {
      this.$refs.ref_transport[0].disabled = true;
      helpers.setToken('utm_source', this.$route.query.utm_source);
    }
	}
</script>