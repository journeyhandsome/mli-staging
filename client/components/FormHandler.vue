<template>
  <div>
    <div v-for="(forminfo, f_index) in formInfos" :key="`form-${f_index}`">

      <div class="form-group mb-4" v-if="forminfo.type == 'text'">
        <label>{{ forminfo.label }} <span v-if="forminfo.isRequired" class="hutoaka">*</span></label>

        <template v-if="forminfo.name == 'tel'">
          <input :class="`form-control ${forminfo.highlight ? 'highlight' : ''}`" type="tel" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" v-model="formdata[forminfo.name]" :name="forminfo.name" :required="forminfo.isRequired" />
        </template>
        <template v-else>
          <input :class="`form-control ${forminfo.highlight ? 'highlight' : ''}`" type="text" v-model="formdata[forminfo.name]" :name="forminfo.name" :required="forminfo.isRequired" />
        </template>
      </div>

      <div class="form-group mb-4" v-if="forminfo.type == 'email'">
        <label>{{ forminfo.label }} <span v-if="forminfo.isRequired" class="hutoaka">*</span></label>
        <input :class="`form-control ${forminfo.highlight ? 'highlight' : ''}`" type="email" v-model="formdata[forminfo.name]" :name="forminfo.name" :required="forminfo.isRequired" @input="validateEmails" @blur="validateEmails"/>
        
        <!-- Inline error for confirm_email -->
        <div v-if="forminfo.name === 'confirm_email' && emailError" class="text-danger mt-1">
          {{ emailError }}
        </div>
      </div>

      <div class="form-group mb-4" v-if="forminfo.type == 'textarea'">
        <label>{{ forminfo.label }} <span v-if="forminfo.isRequired" class="hutoaka">*</span></label>
        <textarea :class="`form-control ${forminfo.highlight ? 'highlight' : ''}`" rows="3" v-model="formdata[forminfo.name]" :name="forminfo.name" :required="forminfo.isRequired"></textarea>
      </div>

      <div class="form-check mb-4" v-if="forminfo.type == 'checkbox'">
        <input class="form-check-input" type="checkbox" :name="forminfo.name" v-model="formdata[forminfo.name]" :required="forminfo.isRequired" />
        <label class="form-check-label">{{ forminfo.label }} <span v-if="forminfo.isRequired" class="hutoaka">*</span></label>
      </div>
      <div class="form-group mb-4" v-if="forminfo.type == 'datepicker'">
        <label>{{ forminfo.label }} <span v-if="forminfo.isRequired" class="hutoaka">*</span></label>
        <template v-if="forminfo.note">
          <br />
          <span>{{ forminfo.note }}</span>
        </template>
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text"><i class="bi bi-calendar"></i></div>
          </div>
          <input class="form-control date" :id="forminfo.name" type="text" data-provide="datepicker" readonly />
        </div>
      </div>
        <div class="form-group mb-4" v-if="forminfo.type == 'number'">
          <label>{{ forminfo.label }} <span v-if="forminfo.isRequired" class="hutoaka">*</span></label>
          <input :class="`form-control ${forminfo.highlight ? 'highlight' : ''}`" type="number" v-model="formdata[forminfo.name]" :name="forminfo.name" :required="forminfo.isRequired" />
        </div>
        <div class="form-group mb-4" v-if="forminfo.type == 'amount'">
          <label>{{ forminfo.label }} <span v-if="forminfo.isRequired" class="hutoaka">*</span></label>
          <input :class="`form-control ${forminfo.highlight ? 'highlight' : ''}`" id="amount" type="number" step="0.01" v-model="formdata[forminfo.name]" :name="forminfo.name" :required="forminfo.isRequired" v-on:keyup="getPercentage()" />
        </div>
        <div class="form-group mb-4" v-if="forminfo.type == 'percent'">
          <label>{{ forminfo.label }}</label>
          <input :class="`form-control ${forminfo.highlight ? 'highlight' : ''}`" id="percent" step="0.01" type="number" v-model="formdata[forminfo.name]" :name="forminfo.name" disabled/>
        </div>

      <div class="form-group mb-4" v-if="forminfo.type == 'radio'">
        <label>{{ forminfo.label }} <span v-if="forminfo.isRequired" class="hutoaka">*</span></label>
        <template v-if="forminfo.note">
          <br />
          <span>{{ forminfo.note }}</span>
        </template>
        <div class="col-lg-12">
          <div class="form-check form-check-inline" v-for="(selection, s_index) in forminfo.selection" :key="`form-radio-${f_index}-${s_index}`">
            <input class="form-check-input" type="radio" :name="forminfo.name" v-model="formdata[forminfo.name]" :value="selection.value" :checked="s_index == 0" v-on:change="checkboxChanges">
            <label class="form-check-label">{{ selection.label }}</label>
          </div>
        </div>
      </div>
      
      <div :id="forminfo.name" class="form-group mb-4" v-if="forminfo.type == 'select' && (forminfo.isShow == undefined || forminfo.isShow == true)">
        <label>{{ forminfo.label }} <span v-if="forminfo.isRequired" class="hutoaka">*</span></label>
        <select class="form-control" :required="forminfo.isRequired" v-model="formdata[forminfo.name]">
          <template v-for="(selection, s_index) in forminfo.selection">
            <option :value="selection.value" :key="`form-select-${f_index}-${s_index}`">{{ selection.label }}</option>
          </template>
        </select>
      </div>

      <div class="form-group mb-4" v-if="forminfo.type == 'note'">
        <paragraph :desc="forminfo.description" />
      </div>
    </div>
  </div>
</template>

<script>
  import Paragraph from './Paragraph.vue';

  export default {
    components: {
      Paragraph,
    },
    props: {
      formInfos: Array,

      // optional (so older pages won't error)
      storageKey: {
        type: String,
        default: null
      },

      storageFormKey: {
        type: String,
        default: null
      },
      excludePersistFields: {
        type: Array,
        default: () => []
      }
    },
    data: function() {
      let formdata = [];

      this.formInfos.map(forminfo => {
        var data = '';

        switch (forminfo.type) {
          case "select":
          case "radio":
            data = forminfo.selection[0].value;
            break;
        }

        formdata[forminfo.name] = data;
      });

      return {
        formdata: formdata,
        emailError: '',
        currentPath: '',
        admissionYesDates: ["20-1-2026", "17-2-2026", "16-3-2026", "13-4-2026", "11-5-2026", "8-6-2026", "6-7-2026", "3-8-2026", "31-8-2026", "28-9-2026", "26-10-2026", "23-11-2026", "21-12-2026", "25-1-2027", "22-2-2027", "22-3-2027", "19-4-2027", "17-5-2027", "14-6-2027", "12-7-2027", "9-8-2027", "7-9-2027", "4-10-2027", "1-11-2027", "29-11-2027", "3-1-2028"],
        admissionNoDates: ["5-1-2026", "12-1-2026", "20-1-2026", "26-1-2026", "2-2-2026", "9-2-2026", "17-2-2026", "23-2-2026", "2-3-2026", "9-3-2026", "16-3-2026", "23-3-2026", "30-3-2026", "6-4-2026", "13-4-2026", "20-4-2026", "27-4-2026", "4-5-2026", "11-5-2026", "18-5-2026", "26-5-2026", "1-6-2026", "8-6-2026", "15-6-2026", "22-6-2026", "29-6-2026", "6-7-2026", "13-7-2026", "20-7-2026", "27-7-2026", "3-8-2026", "10-8-2026", "17-8-2026", "24-8-2026", "31-8-2026", "8-9-2026", "14-9-2026", "21-9-2026", "28-9-2026", "5-10-2026", "13-10-2026", "19-10-2026", "26-10-2026", "2-11-2026", "9-11-2026", "16-11-2026", "23-11-2026", "30-11-2026", "7-12-2026", "14-12-2026", "21-12-2026", "4-1-2027", "11-1-2027", "19-1-2027", "25-1-2027", "1-2-2027", "8-2-2027", "16-2-2027", "22-2-2027", "1-3-2027", "8-3-2027", "15-3-2027", "22-3-2027", "29-3-2027", "5-4-2027", "12-4-2027", "19-4-2027", "26-4-2027", "3-5-2027", "10-5-2027", "17-5-2027", "24-5-2027", "1-6-2027", "7-6-2027", "14-6-2027", "21-6-2027", "28-6-2027", "6-7-2027", "12-7-2027", "19-7-2027", "26-7-2027", "2-8-2027", "9-8-2027", "16-8-2027", "23-8-2027", "30-8-2027", "7-9-2027", "13-9-2027", "20-9-2027", "27-9-2027", "4-10-2027", "12-10-2027", "18-10-2027", "25-10-2027", "1-11-2027", "8-11-2027", "15-11-2027", "22-11-2027", "29-11-2027", "6-12-2027", "13-12-2027", "20-12-2027", "3-1-2028", "10-1-2028", "18-1-2028", "24-1-2028"],
      }
    },
    watch: {
      'formdata.email': 'validateEmails',
      'formdata.confirm_email': 'validateEmails'
    },
    methods: {
      checkboxChanges(e) {
        const self = this;

        switch(this.currentPath) {
          case 'admission':
          case 'slug-admission':

            //Switch for the ids'
            switch (e.target.name) {
              case 'japan_country_trigger':
                const locFormInfos = this.formInfos;
                const arrayKey = locFormInfos.map(form => form.name == 'country').indexOf(true);

                locFormInfos[arrayKey].isShow = e.target.value == "true";
                this.formInfos = locFormInfos;
                break;
                case 'student_visa_application':
                  const selected = e.target.value.trim().toLowerCase();

                  if (selected === 'yes' || selected === 'change of status') {
                    this.resetDate('#lesson_start_date', self.admissionYesDates);
                  } else {
                    this.resetDate('#lesson_start_date', self.admissionNoDates);
                  }
                  break;

              default:
                break;
            }
          break;
        }
      },
      resetDate(id, allowedDates) {
        $(id).datepicker('remove');
        $(id).datepicker({
          beforeShowDay: function (date) {
            var allDates = date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear();

            if(allowedDates.indexOf(allDates) != -1)
              return {classes:'admissionYesDates'};
            else
              return false;
          }
        });
      },
      getFormData() {
        this.formInfos.filter(forminfo => forminfo.type == 'datepicker')
                      .map(forminfo => {
                        this.formdata[forminfo.name] = $(`#${forminfo.name}`).datepicker('getFormattedDate');
                      });

        return this.formdata;
      },
      getPercentage() {

          let x = parseFloat(document.getElementById("amount").value);
          if(x > 0) {

            document.getElementById("percent").value = (((x * 4) / 100) + x).toFixed(2);
            
            // console.log(document.getElementById("percent").value);
          }
          
      },
      setFormData(saved) {
        if (!saved) return;

        // set v-model fields
        Object.keys(saved).forEach((key) => {
          this.formdata[key] = saved[key];
        });

        // update datepicker UI too
        this.$nextTick(() => {
          this.formInfos
            .filter(f => f.type === 'datepicker' && f.name && saved[f.name])
            .forEach(f => {
              try {
                $(`#${f.name}`).datepicker('setDate', saved[f.name]);
              } catch (e) {}
            });
        });

        // force reactivity
        this.formdata = { ...this.formdata };
      },
      normalizeEmail(v) {
        return (v || '').trim().toLowerCase();
      },
      validateEmails() {
        const email = (this.formdata.email || '').trim();
        const confirm = (this.formdata.confirm_email || '').trim();

        // Only show mismatch once user started typing confirm
        if (!confirm) {
          this.emailError = '';
          this.setConfirmValidity('');
          return;
        }

        if (email !== confirm) {
          const msg = 'Email addresses do not match.';
          this.emailError = msg;
          this.setConfirmValidity(msg);
        } else {
          this.emailError = '';
          this.setConfirmValidity('');
        }
      },

      setConfirmValidity(message) {
        this.$nextTick(() => {
          const el = this.$el.querySelector('input[name="confirm_email"]');
          if (el && el.setCustomValidity) el.setCustomValidity(message || '');
        });
      },
    },
    mounted() {
      $(".date").datepicker({
        autoclose: true,
        todayHighlight: true
      }).datepicker('update', new Date());

      switch(this.currentPath) {
        case 'admission':
        case 'slug-admission':
          this.resetDate('#lesson_start_date', this.admissionYesDates);
        break;
        case 'freetrial':
        case 'slug-freetrial':
          $("#date_schedule").datepicker('remove');
          $("#date_schedule").datepicker({
            daysOfWeekDisabled: [0, 1, 5, 6]
          });
          break;
      }
      this.$on('email-error', (msg) => {
        this.emailError = msg;
        this.setConfirmValidity(msg);
      });

      // ✅ Run once on mount in case form is restored from localStorage
      this.validateEmails();
    },
    created() {
      this.currentPath = this.$route.name;

      if (typeof window !== 'undefined' && window.localStorage && this.storageKey && this.storageFormKey) {
        const saved = localStorage.getItem(this.storageKey);
        if (saved) {
          try {
            const parsed = JSON.parse(saved);
            const savedSection = parsed?.[this.storageFormKey];

            if (savedSection) {
              // ✅ remove excluded fields before applying
              const filtered = { ...savedSection };
              this.excludePersistFields.forEach((k) => delete filtered[k]);

              this.setFormData(filtered);
            }
          } catch (e) {
            console.error('Error restoring form section:', e);
          }
        }
      }
    },
  }
</script>

<style lang="scss" scoped>
label {
  font-weight: bold;

  &.form-check-label {
    font-weight: unset;
  }
}
</style>