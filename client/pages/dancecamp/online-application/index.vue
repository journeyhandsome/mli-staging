<template>
    <div class="container">
      <form v-on:submit.prevent="openPreviewModal" method="post">
          <div>
              <div class="container main-form-container pb-5">
                  <div class="row mb-5">
                      <img class="banner-img" src="/assets/images/dancecamp/online-application/UCLA2025.png"/>
                  </div>
                  <p class="font-weight-bold" style="color:red">{{ lang.note }}</p>
                  <h3 class="font-weight-bold">{{ lang.studentInformation }}</h3>
                  <div>
                      <span class="question-label">{{ lang.gender }}</span> <span class="red font-weight-bold">*</span>
                  </div>
                  <div>
                      <input name="gender" v-model="details.gender" value="male" type="radio" :required="true" />
                      <span class="pr-3">{{ lang.male }}</span>
                      <input name="gender" v-model="details.gender" value="female" type="radio" :required="true" />
                      <span>{{ lang.female }}</span>
                  </div>
                  <div class="row pt-4">
                      <div class="col-md col-12">
                          <span class="question-label">{{ lang.firstName }}</span> <span class="red font-weight-bold">*</span>
                          <input name="first_name" class="form-control" v-model="details.first_name" type="text" :required="true" />
                      </div>
                      <div class="col-md col-12">
                          <span class="question-label">{{ lang.lastName }}</span> <span class="red font-weight-bold">*</span>
                          <input name="last_name" class="form-control" v-model="details.last_name" type="text" :required="true" />
                      </div>
                  </div>
                  <div class="row pt-4">
                      <div class="col">
                          <span class="question-label">{{ lang.birthdate }}</span> <span class="red font-weight-bold">*</span>
                          <input name="birthdate" class="form-control" v-model="details.birthdate" type="date" :required="true" />
                      </div>
                  </div>
                  <div class="row pt-4">
                      <div class="col">
                          <span class="question-label">{{ lang.grade }}</span><br>
                          <span>{{ lang.gradeLevel }}</span>
                          <div class="row">
                              <div class="col">
                                  <div>
                                      <input name="grade_level" v-model="details.grade_level" :value="lang.gradeLevelOption1" type="radio"/>
                                      <span>{{ lang.gradeLevelOption1 }}</span>
                                  </div>
                                  <div>
                                      <input name="grade_level" v-model="details.grade_level" :value="lang.gradeLevelOption2" type="radio"/>
                                      <span>{{ lang.gradeLevelOption2 }}</span>
                                  </div>
                                  <div>
                                      <input name="grade_level" v-model="details.grade_level" :value="lang.gradeLevelOption3" type="radio"/>
                                      <span>{{ lang.gradeLevelOption3 }}</span>
                                  </div>
                                  <div>
                                      <input name="grade_level" v-model="details.grade_level" :value="lang.gradeLevelOption4" type="radio"/>
                                      <span>{{ lang.gradeLevelOption4 }}</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col">
                          <span class="question-label"></span><br>
                          <span>{{ lang.gradeLevel2 }}</span>
                          <div class="row">
                              <div class="col">
                                  <div>
                                      <input name="grade_level" v-model="details.grade_level" :value="lang.gradeLevel2Option1" type="radio"/>
                                      <span>{{ lang.gradeLevel2Option1 }}</span>
                                  </div>
                                  <div>
                                      <input name="grade_level" v-model="details.grade_level" :value="lang.gradeLevel2Option2" type="radio"/>
                                      <span>{{ lang.gradeLevel2Option2 }}</span>
                                  </div>
                                  <div>
                                      <input name="grade_level" v-model="details.grade_level" :value="lang.gradeLevel2Option3" type="radio"/>
                                      <span>{{ lang.gradeLevel2Option3 }}</span>
                                  </div>
                                  <div>
                                      <input name="grade_level" v-model="details.grade_level" :value="lang.gradeLevel2Option4" type="radio"/>
                                      <span>{{ lang.gradeLevel2Option4 }}</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                      
                  </div>
                  <span class="row pt-3">{{ lang.levelNote }}</span>
                  <div class="row pt-4">
                      <div class="col-md col-12">
                          <span class="question-label">{{ lang.email }}</span> <span class="red font-weight-bold">*</span>
                          <input name="email" class="form-control" v-model="details.email" type="email" :required="true" />
                      </div>
                      <div class="col-md col-12">
                          <span class="question-label">{{ lang.confirmEmail }}</span> <span class="red font-weight-bold">*</span>
                          <input id="confirmEmail" name="confirm_email" class="form-control" v-model="form.confirm_email" type="email" :required="true" />
                      </div>
                  </div>
                  <div class="row pt-4">
                      <div class="col">
                          <span class="question-label">{{ lang.phone }}</span>
                          <input name="phone" class="form-control mb-1" v-model="details.phone" oninput="this.value = this.value.replace(/[^0-9.-]/g, '').replace(/(\..*?)\..*/g, '$1');" type="text" />
                          <span>{{ lang.countryCityNumCode }}</span>
                      </div>
                  </div>
                  <div class="row pt-4">
                      <div class="col">
                          <span class="question-label">{{ lang.nationality }}</span> <span class="red font-weight-bold">*</span>
                          <select class="form-control" name="nationality" v-model="details.nationality" id="nationality" :required="true">
                              <option :value="null">-- Select --</option>
                              <option v-for="nationality in nationalities" :value="nationality">{{ nationality }}</option>
                          </select>
                      </div>
                  </div>
                  <div class="row pt-4">
                      <div class="col">
                          <div class="row">
                              <div class="col">
                                  <span class="question-label">{{ lang.address }}</span>
                                  <input name="address_1" class="form-control" v-model="details.address_1" type="text" />
                                  <input name="address_2" placeholder="Apt. #" class="form-control mt-3" v-model="details.address_2" type="text" />
                              </div>
                          </div>
                          <div class="row pt-3">
                              <div class="col">
                                  <input name="city" class="form-control mb-2" v-model="details.city" type="text" />
                                  <span class="question-label">{{ lang.city }}</span>
                              </div>
                              <div class="col">
                                  <input name="state" class="form-control mb-2" v-model="details.state" type="text" />
                                  <span class="question-label">{{ lang.state }}</span>
                              </div>
                              <div class="col">
                                  <input name="zip" class="form-control mb-2" v-model="details.zip" type="text" />
                                  <span class="question-label">{{ lang.zip }}</span>
                              </div>
                          </div>
                          <div class="row pt-4">
                              <div class="col">
                                  <select class="form-control" name="country" v-model="details.country" id="country">
                                      <option :value="null">-- Select --</option>
                                      <option v-for="country in countries" :value="country.country">{{ country.country }}</option>
                                  </select>
                                  <span class="question-label">{{ lang.country }}</span>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row pt-4">
                      <div class="col">
                          <span class="question-label">{{ lang.language }}</span> <span class="red font-weight-bold">*</span>
                          <input name="language" class="form-control" v-model="details.language_spoken" type="text" :required="true" />
                      </div>
                  </div>
                  <div class="row pt-4">
                      <div class="col">
                          <h3 class="font-weight-bold">{{ lang.emergencyContact }}</h3>
                          <div class="row">
                              <div class="col">
                                  <span class="question-label">{{ lang.emergencyContactFullName }}</span> <span class="red font-weight-bold">*</span>
                                  <input name="emergency_contact_full_name" class="form-control" v-model="details.emergency_contact_full_name" type="text" :required="true" />
                              </div>
                              <div class="col">
                                  <span class="question-label">{{ lang.emergencyContact }}</span>
                                  <span class="question-label">{{ lang.relationship }}</span> <span class="red font-weight-bold">*</span>
                                  <input name="emergency_contact_relationship" class="form-control" v-model="details.emergency_contact_relationship" type="text" :required="true" />
                              </div>
                          </div>
                          <div class="row pt-4">
                              <div class="col">
                                  <span class="question-label">{{ lang.emergencyContactEmail }}</span> <span class="red font-weight-bold">*</span>
                                  <input name="emergency_contact_email" class="form-control" v-model="details.emergency_contact_email" type="email" :required="true" />
                              </div>
                              <div class="col">
                                  <span class="question-label">{{ lang.emergencyContactPhone }}</span> <span class="red font-weight-bold">*</span>
                                  <input name="emergency_contact_phone" class="form-control" v-model="details.emergency_contact_phone" oninput="this.value = this.value.replace(/[^0-9.-]/g, '').replace(/(\..*?)\..*/g, '$1');" type="text" :required="true" />
                                  <span>{{ lang.countryCityNumCode }}</span>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row pt-4">
                      <div class="col">
                          <h3 class="font-weight-bold">{{ lang.legalGuardianInfo }}</h3>
                          <div class="row">
                              <div class="col">
                                  <span class="question-label">{{ lang.nameOfParendAndGuardian }}</span> <span class="red font-weight-bold">*</span>
                                  <input name="guardian_name" class="form-control" v-model="details.guardian_name" type="text" :required="true"  />
                              </div>
                          </div>
                          <div class="row pt-4">
                              <div class="col">
                                  <span class="question-label">{{ lang.guardianDaytimePhone }}</span>
                                  <input name="guardian_daytime_phone" class="form-control" v-model="details.guardian_daytime_phone" oninput="this.value = this.value.replace(/[^0-9.-]/g, '').replace(/(\..*?)\..*/g, '$1');" type="text" />
                              </div>
                          </div>
                          <div class="row pt-4">
                              <div class="col">
                                  <span class="question-label">{{ lang.guardianHomePhone }}</span>
                                  <input name="guardian_home_phone" class="form-control" v-model="details.guardian_home_phone" oninput="this.value = this.value.replace(/[^0-9.-]/g, '').replace(/(\..*?)\..*/g, '$1');" type="text" />
                                  <span>{{ lang.countryCityNumCode }}</span>
                              </div>
                          </div>
                          <div class="row pt-4">
                              <div class="col">
                                  <span class="question-label">{{ lang.guardianMobilePhone }}</span> <span class="red font-weight-bold">*</span>
                                  <input name="guardian_mobile_phone" class="form-control" v-model="details.guardian_mobile_phone" oninput="this.value = this.value.replace(/[^0-9.-]/g, '').replace(/(\..*?)\..*/g, '$1');" type="text" :required="true" />
                              </div>
                          </div>
                          <div class="row pt-4">
                              <div class="col">
                                  <span class="question-label">{{ lang.guardianEmail }}</span> <span class="red font-weight-bold">*</span>
                                  <input name="guardian_email" class="form-control" v-model="details.guardian_email" type="email" :required="true" />
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row pt-4">
                      <div class="col">
                          <h3 class="font-weight-bold">{{ lang.summerCampInfo }}</h3>
                          <span class="question-label">{{ lang.accomodation }}</span> <span class="red font-weight-bold">*</span>
                          <div class="row">
                              <div class="col">
                                  <input name="accomodation" v-model="details.accomodation" value="UCLA Residence" type="radio" :required="true"/>
                                  <span class="pr-3">{{ lang.uclaResidence }}</span>
                                  <input name="accomodation" v-model="details.accomodation" value="Self-arranged" type="radio" :required="true"/>
                                  <span>{{ lang.selfArranged }}</span>
                              </div>
                          </div>
                          <div class="row pt-4">
                              <div class="col">
                                  <span class="question-label">{{ lang.programStartingDate }}</span> <span class="red font-weight-bold">*</span>
                                  <select class="form-control" name="program_start_date" v-model="details.program_start_date" id="program_start_date" :required="true">
                                      <option :value="null">-- Select --</option>
                                      <option value="7/20/2025">7/20/2025</option>
                                      <option value="7/27/2025">7/27/2025</option>
                                      <option value="8/3/2025">8/3/2025</option>
                                      <option value="8/10/2025">8/10/2025</option>
                                  </select>
                              </div>
                          </div>
                          <div class="row pt-4">
                              <div class="col">
                                  <span class="question-label">{{ lang.programAgeGroup }}</span> <span class="red font-weight-bold">*</span>
                                  <select class="form-control" name="program_age_group" v-model="details.program_age_group" id="program_age_group" :required="true">
                                      <option :value="null">-- Select --</option>
                                      <option :value="lang.programAgeGroupOption1">{{ lang.programAgeGroupOption1 }}</option>
                                      <option :value="lang.programAgeGroupOption2">{{ lang.programAgeGroupOption2 }}</option>
                                  </select>
                              </div>
                          </div>
                          <div class="row pt-4">
                              <div class="col">
                                  <span class="question-label">{{ lang.noOfWeeks }}</span> <span class="red font-weight-bold">*</span>
                                  <select class="form-control" name="program_weeks" v-model="details.program_weeks" id="program_weeks" :required="true">
                                      <option :value="null">-- Select --</option>
                                      <option value="1 week">1 week</option>
                                      <option value="2 weeks">2 weeks</option>
                                      <option value="3 weeks">3 weeks</option>
                                      <option value="4 weeks">4 weeks</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row pt-4">
                      <div class="col">
                          <h3 class="font-weight-bold">{{ lang.extraAccomodationNights }}</h3>
                          <span>{{ lang.extraAccommodationNote }}</span><br><p>{{ lang.extraAccommodationNote1 }}</p>
                          <span class="question-label">{{ lang.residence }}</span>
                          <div class="row">
                              <div class="col">
                                  <span class="pr-md-3">{{ lang.additionalResidence1 }}</span>
                              </div>
                          </div>
                          <div class="row pt-4">
                              <div class="col">
                                  <span class="question-label">{{ lang.noExtraNights }}</span>
                                  <span class="question-label">{{ lang.beforeCampDateStarts }}</span>
                                  <select class="form-control" name="before_camp_start" v-model="details.before_camp_start" id="before_camp_start">
                                      <option :value="null">-- Select --</option>
                                      <option value="1 day">1 day</option>
                                      <option value="2 days">2 days</option>
                                      <option value="3 days">3 days</option>
                                  </select>
                              </div>
                              <div class="col">
                                  <span class="question-label">{{ lang.noExtraNights }}</span>
                                  <span class="question-label">{{ lang.afterCampDateEnds }}</span>
                                  <select class="form-control" name="after_camp_start" v-model="details.after_camp_start" id="after_camp_start">
                                      <option :value="null">-- Select --</option>
                                      <option value="1 day">1 day</option>
                                      <option value="2 days">2 days</option>
                                      <option value="3 days">3 days</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row pt-4">
                      <div class="col">
                          <h5 class="font-weight-bold">{{ lang.irregularPickup }}</h5>
                          <div class="row">
                             <div class="col">
                                  <div>
                                      <input name="irregular_pickup" v-model="details.irregular_pickup" :value="lang.irregularPickupOption1" type="checkbox" />
                                      <span class="pr-md-3">{{ lang.irregularPickupOption1 }}</span>
                                  </div>
                                  <div>
                                      <input name="irregular_pickup" v-model="details.irregular_pickup" :value="lang.irregularPickupOption2" type="checkbox" />
                                      <span class="pr-md-3">{{ lang.irregularPickupOption2 }}</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col">
                          <h5 class="font-weight-bold">{{ lang.minorService }}</h5>
                          <div class="row">
                             <div class="col">
                                  <div>
                                      <input name="minor_service" v-model="details.minor_service" :value="lang.minorServiceOption1" type="radio" />
                                      <span class="pr-md-3">{{ lang.minorServiceOption1 }}</span>
                                  </div>
                                  <div>
                                      <input name="minor_service" v-model="details.minor_service" :value="lang.minorServiceOption2" type="radio" />
                                      <span class="pr-md-3">{{ lang.minorServiceOption2 }}</span>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                             <div class="col">
                                  <div>
                                      <p class="pr-md-3">{{ lang.minorServiceNote }}</p>
                                  </div>
                              </div>
                          </div>
                          <div class="row pt-4">
                             <div class="col">
                                  <div>
                                      <h6 class="font-weight-bold">{{ lang.specialPickup }}</h6>
                                      <span class="pr-md-3">{{ lang.specialPickupNote }}</span>
                                  </div>
                                  <div>
                                      <h6 class="font-weight-bold">{{ lang.specialDropoff }}</h6>
                                      <span class="pr-md-3">{{ lang.specialDropoffNote }}</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row pt-4">
                      <div class="col">
                          <h5 class="processing-fee pt-1 pb-1 pl-1">{{ lang.processingFee }}</h5>
                          <input name="pay_via_stripe" v-model="form.pay_via_stripe" type="checkbox" :required="true"/>
                          <span>{{ lang.payViaStripe }} <span class="red font-weight-bold">*</span></span>
                      </div>
                  </div>
                  <div class="row pt-4">
                      <div class="col">
                          <h1 class="font-weight-bold">{{ lang.applicationRegulations }}</h1>
                          <p class="font-weight-bold question-label">{{ lang.leaveCourse }}</p>
                          <p>{{ lang.leaveCourseTxt }}</p>
                          <p class="font-weight-bold question-label">{{ lang.rightToTermination }}</p>
                          <p>{{ lang.rightToTerminationTxt }}</p>
                          <p class="font-weight-bold question-label">{{ lang.refundPolicy }}</p>
                          <p>{{ lang.refundPolicyTxt1 }}</p>
                          <p>{{ lang.refundPolicyTxt2 }}</p>
                      </div>
                  </div>
                  <div class="row pt-4">
                      <div class="col">
                          <h3 class="font-weight-bold">{{ lang.signatureSelection }}</h3>
                          <input name="agree_terms_and_conditions" v-model="form.agree_terms_and_conditions" type="checkbox" :required="true"/>
                          <span>{{ lang.signatureSelectionTxt }}</span>
                      </div>
                  </div>
                  <div class="row pt-4">
                      <div class="col">
                          <span class="question-label">{{ lang.parentsName }}</span>
                          <input name="terms_and_conditions_parent_name" v-model="details.terms_and_conditions_parent_name" class="form-control" />
                      </div>
                      <div class="col">
                          <span class="question-label">{{ lang.date }}</span>
                          <!-- Sign date is automatic. on check of box I guess -->
                          <input name="agree_terms_and_conditions_date" disabled v-model="details.agree_terms_and_conditions_date" class="form-control" type="date" />
                      </div>
                  </div>
                  <div class="row pt-4">
                      <div class="col">
                          <div class="agency-only-div p-5">
                              <h3 class="font-weight-bold">{{ lang.forAgencyUse }}</h3>
                              <span class="question-label">{{ lang.agencyName }}</span>
                              <input name="agency_name" class="form-control mb-4" v-model="details.agency_name" />
                              <span class="question-label">{{ lang.agencyRepName }}</span>
                              <input name="agency_rep_name" class="form-control mb-4" v-model="details.agency_rep_name" />
                              <span class="question-label">{{ lang.agencyRepEmail }}</span>
                              <input name="agency_rep_email" class="form-control mb-4" v-model="details.agency_rep_email" type="email" />
                              <span class="question-label">{{ lang.tamWoodSales }}</span>
                              <input name="tamwood_sales" class="form-control" v-model="details.tamwood_sales" />
                          </div>
                      </div>
                  </div>
                  <div class="w-100 text-lg-left text-center">
                      <button class="confirmation-btn btn btn-lg mt-4" type="submit">{{ lang.goToConfirm }}</button>
                  </div>
              </div>
          </div>
      </form>
      <!-- Preview Modal -->
      <div id="previewModal" class="modal">
          <div class="modal-content">
              <div class="modal-header pt-2 pb-0">
                  <h3>{{ lang.modalHeader }}</h3>
                  <span @click="closePreviewModal" class="close">&times;</span>
              </div>
              <div class="modal-body p-0">
                  <div class="container">
                      <div class="row">
                          <div class="col">
                              <div class="row pl-2 mt-2">
                                  <h5 class="font-weight-bold">{{ lang.studentInformation }}</h5>
                              </div>
                              <div class="row pb-2">
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.firstName }}:</b></div> 
                                      <span v-if="details.first_name">{{ details.first_name }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.lastName }}:</b></div>
                                      <span v-if="details.last_name">{{ details.last_name }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.gender }}:</b></div>
                                      <span v-if="details.gender">{{ details.gender }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.email }}:</b></div>
                                      <span v-if="details.email">{{ details.email }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                              </div>
                              <div class="row pb-2">
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.grade }}:</b></div>
                                      <span v-if="details.grade_level">{{ details.grade_level }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.birthdate }}:</b></div>
                                      <span v-if="details.birthdate">{{ details.birthdate }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.phone }}:</b></div>
                                      <span v-if="details.phone">{{ details.phone }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.nationality }}:</b></div>
                                      <span v-if="details.nationality">{{ details.nationality }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                                  <div class="col">
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.address }} 1:</b></div>
                                  </div>
                                  <div class="col"></div>
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.address }} 2:</b></div>
                                  </div>
                                  <div class="col"></div>
                              </div>
                              <div class="row pb-2">
                                  <div class="col">
                                      <span v-if="details.address_1">{{ details.address_1 }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                                  <div class="col">
                                      <span v-if="details.address_2">{{ details.address_2 }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                              </div>
                              <div class="row pb-2">
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.city }}:</b></div>
                                      <span v-if="details.state">{{ details.state }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.state }}:</b></div>
                                      <span v-if="details.state">{{ details.state }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.zip }}:</b></div>
                                      <span v-if="details.zip">{{ details.zip }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.country }}:</b></div>
                                      <span v-if="details.country">{{ details.country }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                              </div>
                              <div class="row pb-2">
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.language }}:</b></div>
                                      <span v-if="details.language_spoken">{{ details.language_spoken }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                                  <div class="col">
                                  </div>
                              </div>
                              <div class="row pl-2 mt-4">
                                  <h5 class="font-weight-bold">{{ lang.emergencyContact }}</h5>
                              </div>
                              <div class="row pb-2">
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.emergencyContactFullName }} {{ lang.name }}:</b></div>
                                      <span v-if="details.emergency_contact_full_name">{{ details.emergency_contact_full_name }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.emergencyContact }} {{ lang.relationship }}:</b></div>
                                      <span v-if="details.emergency_contact_relationship">{{ details.emergency_contact_relationship }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.emergencyContactEmail }}:</b></div>
                                      <span v-if="details.emergency_contact_email">{{ details.emergency_contact_email }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.emergencyContactPhone }}:</b></div>
                                      <span v-if="details.emergency_contact_phone">{{ details.emergency_contact_phone }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                              </div>
                              <div class="row pl-2 mt-4">
                                  <h5 class="font-weight-bold">{{ lang.legalGuardianInfo }}</h5>
                              </div>
                              <div class="row pb-2">
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.nameOfParendAndGuardian }}:</b></div>
                                      <span v-if="details.guardian_name">{{ details.guardian_name }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.guardianDaytimePhone }}:</b></div>
                                      <span v-if="details.guardian_daytime_phone">{{ details.guardian_daytime_phone }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.guardianHomePhone }}:</b></div>
                                      <span v-if="details.guardian_home_phone">{{ details.guardian_home_phone }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.guardianMobilePhone }}:</b></div>
                                      <span v-if="details.guardian_mobile_phone">{{ details.guardian_mobile_phone }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                              </div>
                              <div class="row pb-2">
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.guardianEmail }}:</b></div>
                                      <span v-if="details.guardian_email">{{ details.guardian_email }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                                  <div class="col"></div>
                                  <div class="col"></div>
                                  <div class="col"></div>
                              </div>
                              <div class="row pl-2 mt-4">
                                  <h5 class="font-weight-bold">{{ lang.summerCampInfo }}</h5>
                              </div>
                              <div class="row pb-2">
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.accomodation }}:</b></div>
                                      <span v-if="details.accomodation">{{ details.accomodation }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.programStartingDate }}:</b></div>
                                      <span v-if="details.program_start_date">{{ details.program_start_date }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.programAgeGroup }}:</b></div>
                                      <span v-if="details.program_age_group">{{ details.program_age_group }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.noOfWeeks }}:</b></div>
                                      <span v-if="details.program_start_date">{{ details.program_start_date }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                              </div>
                              <div class="row pl-2 mt-4">
                                  <h5 class="font-weight-bold">{{ lang.extraAccomodationNights }}</h5>
                              </div>
                              <div class="pl-2">
                                  <span>{{ lang.extraAccommodationNote }}</span> <br>
                                  <span>{{ lang.extraAccommodationNote1 }}</span>
                              </div>
                              <div class="row pb-2">
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.residence }}:</b></div>
                                  </div>
                              </div>
                              <div class="row pb-2">
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.noExtraNights }} {{ lang.beforeCampDateStarts }}:</b></div>
                                      <span v-if="details.before_camp_start">{{ details.before_camp_start }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.noExtraNights }} {{ lang.afterCampDateEnds }}:</b></div>
                                      <span v-if="details.after_camp_start">{{ details.after_camp_start }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.irregularPickup }}:</b></div>
                                      <div v-if="details.irregular_pickup.length != 0">
                                            <div v-for="item in details.irregular_pickup">
                                                <span>{{ item }}</span>
                                            </div>
                                        </div>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.minorService }}:</b></div>
                                      <span v-if="details.minor_service">{{ details.minor_service }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                              </div>
                              <div class="row pl-2 mt-4">
                                  <h5 class="font-weight-bold">{{ lang.signatureSelection }}</h5>
                              </div>
                              <div class="row pb-2">
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.parentsName }}:</b></div>
                                      <span v-if="details.terms_and_conditions_parent_name">{{ details.terms_and_conditions_parent_name }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.date }}:</b></div>
                                      <span v-if="details.agree_terms_and_conditions_date">{{ details.agree_terms_and_conditions_date }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                              </div>
                              <div class="row pl-2 mt-4">
                                  <h5 class="font-weight-bold">{{ lang.forAgencyUse }}</h5>
                              </div>
                              <div class="row pb-2">
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.agencyName }}:</b></div>
                                      <span v-if="details.agency_name">{{ details.agency_name }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.agencyRepName }}:</b></div>
                                      <span v-if="details.agency_rep_name">{{ details.agency_rep_name }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.agencyRepEmail }}:</b></div>
                                      <span v-if="details.agency_rep_email">{{ details.agency_rep_email }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                                  <div class="col">
                                      <div class="preview-label"><b>{{ lang.tamWoodSales }}:</b></div>
                                      <span v-if="details.tamwood_sales">{{ details.tamwood_sales }}</span>
                                      <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                  </div>
                              </div>
                              <div class="text-right mb-3 mt-4">
                                  <button v-if="isLoading" class="btn btn-success submit-btn" disabled>
                                      <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                      {{ lang.loading }}...
                                  </button>
                                  <button v-else class="btn btn-success submit-btn" @click="submitData">{{ lang.submit }}</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
  
      </div>
  
    </div>
</template>

<style>
    .main-form-container {
        width: 90%;
    }

    .question-label {
        font-size: 1.4em;
    }
    
    .banner-txt-container {
        background-color: #c9effd;
    }

    .banner-img-container {
        background-color: #8cb1d2;
    }

    .banner-img {
        width: 100%;
    }

    .banner-txt-1 {
        font-size: 200%;
        background-color: #8cb1d2;
    }
    .banner-txt-2 {
        color: #0861fe;
        font-size: 200%;
    }
    
    .red {
        color: red;
        font-size: larger;
    }

    .red-txt {
        color: red;
    }

    .sml-txt {
        font-size: 0.8em;
    }

    .processing-fee {
        background-color: #e8eff4;
        color: #2165b9;
    }

    .agency-only-div {
        background-color: #f7f7f7;
    }

    .confirmation-btn {
        background-color: #28a745;
        color: #ffffff;
        border: none;
        font-size: larger;
        font-weight: bold;
        border-radius: 0px;
    }

    .confirmation-btn:hover {
        background-color: #249b40;
        color: #ffffff;
    }

    .preview-label {
        font-size: 0.85em;
        background-color: #f2f2f2;
    }

    .submit-btn {
        width: 250px
    }

    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 2; /* Sit on top */
        padding-top: 0; /* Location of the box */
        /* padding-top: 3%;  */
        padding-bottom: 3%;
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        border: 1px solid #888;
        width: 80%;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s
    }

    /* Add Animation */
    @-webkit-keyframes animatetop {
        from {top:-300px; opacity:0} 
        to {top:0; opacity:1}
    }

    @keyframes animatetop {
        from {top:-300px; opacity:0}
        to {top:0; opacity:1}
    }

    /* The Close Button */
    .close {
        color: white;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .modal-header {
        background-color: #343b46;
        color: white;
    }
</style>
<script>
    import nationalities from '@/content/nationalities.json'
    import countries from '@/content/countries.json'

	export default {
        async asyncData({ $content, params }) {
            const lang = await $content(`dancecamp/online-application/en`).fetch();
            return {
                lang, 
                nationalities, 
                countries,
                isLoading: false,
                form: {
                    confirm_email:null,
                    pay_via_stripe:false,
                    agree_terms_and_conditions:false
                },
                details: {
                    gender:null,
                    first_name:null,
                    last_name:null,
                    birthdate:null,
                    grade_level:null,
                    email:null,
                    phone:null,
                    nationality:null,
                    address_1:null,
                    address_2:null,
                    city:null,
                    state:null,
                    zip:null,
                    country:null,
                    language_spoken:null,
                    emergency_contact_full_name:null,
                    emergency_contact_relationship:null,
                    emergency_contact_email:null,
                    emergency_contact_phone:null,
                    guardian_name:null,
                    guardian_daytime_phone:null,
                    guardian_home_phone:null,
                    guardian_mobile_phone:null,
                    guardian_email:null,
                    accomodation:null,
                    program_start_date:null,
                    program_age_group:null,
                    program_weeks:null,
                    before_camp_start:null,
                    after_camp_start:null,
                    irregular_pickup:[],
                    minor_service:null,
                    terms_and_conditions_parent_name:null,
                    agree_terms_and_conditions_date:new Date().toLocaleDateString('en-CA'),
                    agency_name:null,
                    agency_rep_name:null,
                    agency_rep_email:null,
                    tamwood_sales:null
                }
            }
        },
        head() {
			if(this.lang) {
				return {
					title: this.lang.pageTitle,
					meta: [
						{
                            hid: 'description',
                            name: 'description',
                            content: this.lang.pageDescription
						}
					],
				}
			}
		},
        layout:'dancecamp',
        methods: {
            openPreviewModal() {
                if(this.details.email != this.form.confirm_email) {
                    document.getElementById("confirmEmail").focus();
                    alert("Confirm Student Email does not match the Email typed in");
                    return false;
                }
                const modal = document.getElementById("previewModal");
                modal.style.display = "block";
            },
            closePreviewModal() {
                const modal = document.getElementById("previewModal");
                modal.style.display = "none";
            },
            async submitData() {
                this.isLoading = true;

                await this.$axios.post('/api/dancecamp/online-application', this.details).then(function(response) {
                    window.location.href=response.data.Location;
                }).catch(function(error) {
                    console.log(error)
                });
                this.isLoading = false;
            }
        }
	}
</script>