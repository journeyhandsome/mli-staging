<template>
    <div>
      <!-- Modal -->
      <div class="modal fade" id="readMore" tabindex="-1" role="dialog" aria-labelledby="readMoreTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
          <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <div class="stepBox" id="step01" v-if="step == 1" v-html="lang.read_1.join('')"></div>
              <div class="stepBox" id="step02" v-if="step == 2" v-html="lang.read_2.join('')"></div>
              <div class="stepBox" id="step03" v-if="step == 3" v-html="lang.read_3.join('')"></div>
          </div>
          <div class="modal-footer"></div>
          </div>
      </div>
      </div>
      <main>
          <section class="mv">
              <div class="innerBanner mv__inner">
                  <div class="mv__wrapper">
                      <div class="mv__titleWrap">
                            <img class="transfer_student_banner" src="/assets/images/lptf-new/en/TITTLE.png" alt="click_for_student_visa">
                      </div>
                      <!-- <div class="mv__textWrap">
                          <a href="#change_of_status">
                            <img class="visa__button__img" src="/assets/images/lptf-new/en/BUTTON VISA.png" alt="click_for_student_visa">
                            <img class="visa__button__img-sp" src="/assets/images/lptf-new/en/BUTTON VISA Orange.png" alt="click_for_student_visa">
                          </a>
                          <p class="mv__text" v-html="lang.sched_text.join('')"></p>
                      </div> -->
                      <div class="change_of_status_button">
                        <a href="#change_of_status" class="student-visa-btn">Click for Change of Status</a>
                        <a href="#change_of_status" class="student-visa-btn-sp">Click for Change of Status</a>
                      </div>
                      <div class="mv__priceWrap">
                          <p class="mv__priceText" v-html="lang.affordable_price.join('')"></p>
                          <p class="mv__price" v-html="lang.price.join('')"></p>
                          <p class="mv__text2">{{ lang.text_2 }}</p>
                      </div>
                      <a class="mv__btn" href="#contact">{{ lang.apply_online }}</a>
                  </div>
              </div>
          </section>
          
          <section class="intro">
              <div class="intro__logosWrap">
                  <p class="mv__logos"><img src="/assets/images/lptf-new/logos.png" alt=""></p>
              </div>
                <div class="mv__circle">
                    <p class="mv__subtext" v-html="lang.sched_per_week.join('')"></p>
                </div>
              <div class=inner>
                  <p class="intro__text" v-html="lang.intro_text.join('')"></p>
              </div>
              <!-- <h3 class="intro__catch cursor-pointer" @click="openPreviewModal('/assets/images/lptf-new/Friendship_promo_2025 Rev4.jpg')"><img :src="lang.not_satisfied_img" class="not_satisfied_img" alt="NOT SATISFIED WITH YOUR CURRENT SCHOOL?"></h3> -->
              <div id="price"></div>
              <a class="greenBtn introBtn" href="../freetrial" v-html="lang.free_trial.join('')"></a>
          </section>
          
          <section class="reason">
              <h3 class="topTitle">{{lang.reason}}</h3>  
              <h4 class="reason__title--blue" v-html="lang.reason_1"></h4>
              <div class="reasonIntro">
                  <div class="inner">
                      <div class="reasonIntro__flexWrap">
                          <div class="reasonIntro__textBox" v-html="lang.reason_text_1.join('')"></div>
                          <div class="reasonIntro__special">
                              <p class="reasonIntro__heading" v-html="lang.reason_text_2.join('')"></p>
                              <p class="reasonIntro__note">{{ lang.reason_text_3 }}</p>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="reasonPrice">
                  <div class="inner">
                      <div class="reasonPrice__imgWrap">
                          <img class="reasonPrice__img" :src="lang.reason_img" alt="">
                      </div>
                      <div class="reasonPrice__flexWrap">
                          <div class="reasonPrice__table">
                              <div class="reasonPrice__tr" v-for="(each, key) in lang.prices" :key="key" v-html="each.join('')"></div>
                          </div>
                          <div class="reasonPrice__noteWrap" v-html="lang.price_notes.join('')"></div>
                      </div>
                  </div>
              </div>
              <div class="reasonCompare">
                  <div class="inner">
                      <h5 class="reasonCompare__title">{{ lang.compare_text_1 }}</h5>
                      <p class="reasonCompare__text">{{lang.compare_text_2}}</p>
                      <div class="reasonCompare__wrapper">
                      <div class="reasonCompare__table">
                          <img class="reasonCompare__img" :src="lang.compare_img" alt="">
                      </div>  
                      </div>
                  </div>
              </div>
                      <div id="schedule"></div>
              <a class="greenBtn" href="#contact">{{lang.download_brochure}}</a>
              <h4 class="reason__title--orange" v-html="lang.reason_2"></h4>
              <div id="programs"></div>
              <div class="reasonFlex">
                  <div class="inner">
                      <div class="reasonFlex__flexWrap">
                          <div class="reasonFlex__flexBox">
                              <p class="reason__heading--orange" v-html="lang.reason_2_text_1.join('')"></p>
                          </div>
                          <p class="reasonFlex__text" v-html="lang.reason_2_text_2.join('')"></p>
                      </div>
                      <div class="reasonFlex__program">
                          <div class="reasonFlex__box" v-html="lang.reason_2_row_1.join('')"></div>
                          <div class="reasonFlex__box" v-html="lang.reason_2_row_2.join('')"></div>
                      </div>
                  </div>
              </div>
              <div class="reasonText">
                  <div class="inner">
                      <p class="reasonText__lead" v-html="lang.reason_2_notes.join('')"></p>
                  </div>
              </div>
              <div class="reasonSchedule">
                  <div class="inner">
                      <p class="reasonSchedule__lead">{{ lang.reason_2_lead }}</p>
                      <div class="reasonSchedule__wrapper">
                          <div class="reasonSchedule__table">
                              <div class="reasonSchedule__flexWrap" v-html="lang.reason_schedule_row_1.join('')"></div>
                              <div class="reasonSchedule__flexWrap" v-html="lang.reason_schedule_row_2.join('')"></div>
                              <div class="reasonSchedule__flexWrap" v-html="lang.reason_schedule_row_3.join('')"></div>
                              <div class="reasonSchedule__flexWrap" v-html="lang.reason_schedule_row_4.join('')"></div>
                          </div>
                      </div>
                      <p class="reasonSchecule__exmaple">{{ lang.reason_computation }}</p>
                      <img class="private_lessons" src="/assets/images/lptf-new/en/private_lessons.png" alt="Private Lessons">
                      <img class="private_lessons-sp" src="/assets/images/lptf-new/en/PRIVATE_LESSON.png" alt="Private Lessons">
                  </div>
                      <div id="location"></div>
              </div>
              <a class="greenBtn" href="#contact">{{ lang.ask_question }}</a>
              <h4 class="reason__title--purple" v-html="lang.reason_3.join('')"></h4>
              <div class="reasonLocation">
                  <div class="inner">
                      <div class="reasonLocation__flexWrap">
                          <div class="reasonLocation__flexBox">
                              <p class="reason__heading--purple" v-html="lang.reason_heading.join('')"></p>
                          </div>
                          <div class="reasonLocation__flexBox">
                              <p class="reasonLocation__text" v-html="lang.reason_location_text.join('')"></p>
                          </div>
                      </div>
                      <div class="reasonLocation__mapWrap">
                          <div class="reasonLocation__mapBox">
                              <div class="reasonLocation__map">
                                  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d826.3568826679748!2d-118.4435785!3d34.0585531!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bbf6308a41cf%3A0x9988e75762b8ff3b!2sMentor%20Language%20Institute!5e0!3m2!1sen!2sjp!4v1681882612821!5m2!1sen!2sjp" width="432" height="241" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                              </div>
                              <p class="reasonLocation__address">10880 Wilshire Blvd #122, Los Angeles, CA 90024, United States</p>
                              <div class="reasonLocation__access">
                                  <p class="reasonLocation__area">WESTWOOD</p>
                                  <p class="reasonLocation__desc" v-html="lang.westwood_text.join('')"></p>
                              </div>
                          </div>
                          <div class="reasonLocation__mapBox">
                              <div class="reasonLocation__map">
                                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d412.9706926037186!2d-118.34460892299424!3d34.10114629931431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bf239f1c4a45%3A0x6953aa45bd461a42!2sMentor%20Language%20Institute%20-%20Hollywood!5e0!3m2!1sen!2sjp!4v1681883684501!5m2!1sen!2sjp" width="432" height="241" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                              </div>
                              <p class="reasonLocation__address">7080 Hollywood Blvd #314, Los Angeles, CA 90028, United States</p>
                              <div id="howto"></div>
                              <div class="reasonLocation__access">
                                  <p class="reasonLocation__area">HOLLYWOOD</p>
                                  <p class="reasonLocation__desc" v-html="lang.hollywood_text.join('')"></p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
          
          <section class="process">
              <div class="inner"> 
                  <h3 class="topTitle">{{ lang.easy_transfer }}</h3>
                  <p class="process__lead">{{ lang.transfer_text }}</p>
                  <div class="process__flexWrap">
                      <p class="process__text" v-html="lang.transfer_text_2.join('')"></p>
                      <ul class="process__step">
                          <li class="process__box--01">
                              <a class="popup" href="#step01" v-html="lang.step_1.join('')" data-toggle="modal" data-target="#readMore" @click="step = 1"></a>
                          </li>
                          <li class="process__box--02">
                              <a class="popup" href="#step02" v-html="lang.step_2.join('')" data-toggle="modal" data-target="#readMore" @click="step = 2"></a>
                          </li>
                          <li class="process__box--03">
                              <a class="popup" href="#step03" v-html="lang.step_3.join('')" data-toggle="modal" data-target="#readMore" @click="step = 3"></a>
                          </li>
                      </ul>
                  </div>
                  <div  id="change_of_status"></div>
                  <a class="greenBtn" href="../admission/">{{ lang.apply_now }}</a>
              </div>
              <div class="change_of_status">
                  <div class="inner">
                    <img src="/assets/images/lptf-new/en/change_of_status.png" alt="change_of_status" class="change-status">
                    <img src="/assets/images/lptf-new/en/CHANGE_STATUS.jpg" alt="change_of_status" class="change-status-sp">
                    <img src="/assets/images/lptf-new/en/with_our_school_lawyer.png" alt="with_our_school_lawyer" class="lawyer">
                    <img src="/assets/images/lptf-new/en/LAWYER.jpg" alt="with_our_school_lawyer" class="lawyer-sp">
                    <a class="steps-btn cursor-pointer eng-steps-btn" @click="openPreviewModal('/assets/images/lptf-new/en/pop_up_steps.jpg')">Click for 6 steps for Change of status (COS)</a>
                  </div>
              </div>
              <div class="schedule">
                  <div class="inner">
                      <div class="schedule__flexWrap">
                      <div id="contact"></div>
                          <div class="schedule__textBox" v-html="lang.not_sure_text.join('')">
                          </div>
                          <a class="schedule__btn" href="../freetrial" v-html="lang.free_trial_text.join('')"></a>
                      </div>
                  </div>
              </div>
          </section>
          
          <section class="contact">
              <div class="inner">
                  <h3 class="contact__title">{{lang.contact}}</h3>
                  <form method="post" v-on:submit.prevent="send">
                      <div>
                          <div>
                              <div class="form-group mb-4">
                                  <label>{{ lang.name }} <span class="hutoaka">*</span></label>
                                  <input name="name" required="required" class="form-control highlight" type="text" v-model="details.name">
                              </div>
                          </div>
                          <div>
                              <div class="form-group mb-4">
                                  <label>{{ lang.email }} <span class="hutoaka">*</span></label>
                                  <input type="email" name="email" required="required" class="form-control highlight" v-model="details.email">
                              </div>
                          </div>
                          <div>
                              <div class="form-group mb-4"><label>{{ lang.phone }} <span class="hutoaka">*</span></label> <br>
                                  <label><span style="font-size: 1.5rem;">Do not use a hyphen "-" or "+" when typing your phone number</span></label>
                                  <input name="phone" required="required" class="form-control highlight" type="text" @input="numeric" v-model="details.phone" maxlength="11" minlength="10">
                              </div>
                          </div>
                          <div>
                              <div style="display:grid; grid-template-columns: 20px 1fr;">
                                  <div><input type="checkbox" name="phone_call" v-model="details.receiving"></div>
                                  <div><label class="form-check-label">{{ lang.receive }}</label></div>
                              </div><br>
                          </div>
                          <div>
                              <div id="campus" class="form-group mb-4">
                                  <label>{{ lang.campus_ref }} <span class="hutoaka">*</span></label>
                                  <select required="required" class="form-control" name="campus" v-model="details.campus">
                                      <option selected="" value="Westwood">Westwood</option>
                                      <option value="Hollywood">Hollywood</option>
                                      <option value="Both">Both</option>
                                  </select>
                              </div>
                          </div>
                          <div>
                              <div id="time_to_start" class="form-group mb-4">
                                  <label>{{lang.approx}}<span class="hutoaka">*</span></label>
                                  <select required="required" class="form-control" name="start" v-model="details.program">
                                      <option value="one month">One Month</option>
                                      <option value="three months">Three Months</option>
                                      <option value="six months">Six Months</option>
                                      <option value="one year or more">One Year or More</option>
                                  </select>
                              </div>
                          </div>
                          <div>
                              <div id="media" class="form-group mb-4">
                                  <label>{{ lang.media }} <span class="hutoaka">*</span></label>
                                  <select required="required" class="form-control" name="media" v-model="details.reference">
                                      <option selected="" value="An agent">An Agent</option>
                                      <option value="Friend">Friend</option>
                                      <option value="Internet">Internet</option>
                                      <option value="Other">Other</option>
                                  </select>
                              </div>
                          </div>
                          <div>
                              <div class="form-group mb-4"><label>{{ lang.msg }}</label>
                                  <textarea rows="3" name="message" class="form-control " v-model="details.message"></textarea>
                              </div>
                          </div>
                      </div> <button type="submit" :disabled="disabled" class="btn btn-success btn-block">{{ lang.send }}</button>
                  </form>
              </div>
          </section>
      </main>
      <footer class="footer">
          <div class="inner">
              <div class="footer__upper">
                  <p class="footer__logo"><img src="/assets/images/lptf-new/logo-white.png" alt="Mentor Language Institute"></p>
                  <ul class="footer__snsWrap">
                      <li class="footer__sns"><a class="footer__link--facebook" href="https://www.facebook.com/MentorLanguageInstitute/">MentorLanguageInstitute</a></li>
                      <li class="footer__sns"><a class="footer__link--instagram" href="https://www.instagram.com/mentorlanguageinstitute/">MentorLanguageInstitute</a></li>
                      <li><img src="/assets/images/lptf-new/tiktok.png" style="padding-right: 10px; vertical-align: middle;"><a class="footer__link--tiktok" style="font-size: 1.5rem; font-weight: 500; color: #13265d;" href="https://www.tiktok.com/@mentorlanguage">@mentorlanguage</a></li>
                  </ul>
              </div>
              <small class="footer__copyright">Copyright© Mentor Language Institute , 2025 All Rights Reserved.</small>
          </div>
      </footer>
    
        <div id="previewModal" class="modal">
            <div class="modal-content">
                <div class="modal-header pt-2 pb-0">
                    <span @click="closePreviewModal" class="close mb-1">&times;</span>
                </div>
                <div class="modal-body p-0">
                    <img class="modal-img" :src="modalImage">
                </div>
            </div>
        </div>
    </div>
  </template>
  
  <script>
  import helpers from '@/plugins/helpers.js'
  export default {
      async asyncData({ $content, params, $axios }) { 
          let lang = await $content(`lptf/en`).fetch()
          return {
              lang,
              modalImage: ''
          }
      },
  
      layout:'lptf02',
      data: function() {
          return {
              details:{name:null,email:null,phone:null,receiving:false, campus:null, program:null, reference:null, message:null},
              step: null,
              disabled: false
          }
      },
      methods:{
           send() {
              this.details.language = "en"
              this.details.utm_source = helpers.getToken('utm_source');
              this.disabled = true
              this.$axios.post('/api/lptf/question', this.details)
                  setTimeout(()=>{
                      location.href = "/tf_material/thanks"
                  }, 2000)
          },
          numeric() {
              this.details.phone = helpers.numberOnly(this.details.phone)
          },
        
        openPreviewModal(imgSrc) {
                this.modalImage = imgSrc;
                const modal = document.getElementById("previewModal");
                modal.style.display = "block";
                modal.style.textAlign = "center";
            },
        closePreviewModal() {
            this.modalImage = '';
            const modal = document.getElementById("previewModal");
            modal.style.display = "none";
        },
      },
      mounted() {
      helpers.setToken('utm_source', this.$route.query.utm_source);
      }
  }
  </script>
  
  <style>
  @import url('~/assets/css/lptf/normalize.css');
  @import url('~/assets/css/lptf/jquery.fancybox.css');
  @import url('~/assets/css/lptf/style.css');
  </style>
  