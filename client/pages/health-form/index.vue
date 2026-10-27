<template>
    <div class="container">
        <form v-on:submit.prevent="openPreviewModal" method="post">
            <div class="pt-5 mt-5">
                <div class="container main-form-container pb-5 mt-5">
                    <div class="row mb-4">
                        <p class="please-complete-label">{{ lang.pleaseComplete }}</p>
                    </div>
                    <h3 class="font-weight-bold">{{ lang.studentInformation }}</h3>
                    <div>
                        <span class="question-label">{{ lang.gender }}</span> <span class="red font-weight-bold">*</span>
                    </div>
                    <div>
                        <input name="gender" v-model="details.gender" value="male" type="radio" :required="true" />
                        <span class="pr-md-3">{{ lang.male }}</span>
                        <input name="gender" v-model="details.gender" value="female" type="radio" :required="true" />
                        <span>{{ lang.female }}</span>
                    </div>
                    <div class="row pt-4">
                        <div class="col">
                            <span class="question-label">{{ lang.firstName }}</span> <span class="red font-weight-bold">*</span>
                            <input name="first_name" class="form-control" v-model="details.first_name" type="text" :required="true" />
                        </div>
                        <div class="col">
                            <span class="question-label">{{ lang.lastName }}</span> <span class="red font-weight-bold">*</span>
                            <input name="last_name" class="form-control" v-model="details.last_name" type="text" :required="true" />
                        </div>
                    </div>
                    <div class="pt-4">
                        <span class="question-label">{{ lang.birthdate }}</span> <span class="red font-weight-bold">*</span>
                        <input name="birthdate" class="form-control" v-model="details.birthdate" type="date" :required="true" />
                    </div>
                    <div class="pt-4">
                        <span class="question-label">{{ lang.email }}</span> <span class="red font-weight-bold">*</span>
                        <input name="email" class="form-control" v-model="details.email" type="email" :required="true" />
                    </div>
                    <div class="pt-4">
                        <span class="question-label">{{ lang.physicalRestrictions }}</span>
                        <div>
                            <input name="physical_restrictions" v-model="details.physical_restrictions" value="I have reviewed the program and the activities of the camp and feel the camper can participate without restrictions." type="radio">
                            <span>{{ lang.physicalRestrictionOption1 }}</span>
                        </div>
                        <div>
                            <input name="physical_restrictions" v-model="details.physical_restrictions" value="I have reviewed the program and activities and feel the camper can participate with restrictions or adaptations." type="radio">
                            <span>{{ lang.physicalRestrictionOption2 }}</span>
                        </div>
                    </div>
                    <div class="pt-4">
                        <div>
                            <span class="question-label">{{ lang.allergies }}</span>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <input name="known_allergies" v-model="details.known_allergies" value="No known allergies" type="radio" />
                                <span>{{ lang.allergiesOption1 }}</span>
                            </div>
                            <div class="col-md-6 col-12">
                                <input name="known_allergies" v-model="details.known_allergies" value="This camper is allergic to" type="radio" />
                                <span>{{ lang.allergiesOption2 }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="mb-0">{{ lang.allergiesOptionNote }}</p>
                                <input name="text" class="form-control" v-model="details.allergies_note" type="text"/>
                            </div>
                        </div>
                    </div>
                    <div class="pt-4">
                        <div>
                            <span class="question-label">{{ lang.dietandnutrition }}</span>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <input name="regular_diet" v-model="details.diet_nutrition" value="Eats regular diet" type="checkbox" />
                                <span>{{ lang.dietandnutritionOption1 }}</span>
                            </div>
                            <div class="col-md-6 col-12">
                                <input name="vegetarian_diet" v-model="details.diet_nutrition" value="Eats a regular vegetarian diet" type="checkbox" />
                                <span>{{ lang.dietandnutritionOption2 }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <input name="gluten_intolerant" v-model="details.diet_nutrition" value="Gluten intolerant" type="checkbox" />
                                <span>{{ lang.dietandnutritionOption3 }}</span>
                            </div>
                            <div class="col-md-6 col-12">
                                <input name="lactose_intolerant" v-model="details.diet_nutrition" value="Lactose intolerant" type="checkbox" />
                                <span>{{ lang.dietandnutritionOption4 }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <input name="other_diet" v-model="details.diet_nutrition" value="Other" type="checkbox" />
                                <span>{{ lang.dietandnutritionOption5 }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="mb-0">{{ lang.dietandnutritionOptionNote }}</p>
                                <input name="text" class="form-control" v-model="details.diet_note" type="text"/>
                            </div>
                        </div>
                    </div>
                    <div class="pt-4">
                        <h5 class="font-weight-bold">{{ lang.immunizationRecords }}</h5>
                        <p>{{ lang.immunizationRecordsDescription }}</p>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md col-12">
                            <span class="question-label" style="font-size: 15px;"><b>{{ lang.dTap }}</b></span>
                            <input name="diptheira_tetanus_pertussis_date" class="form-control" v-model="details.diptheira_tetanus_pertussis_date" type="text" />
                            <span class="input-sub-text">{{ lang.monthYear }}</span>
                        </div>
                        <div class="col-md col-12">
                            <span class="question-label" style="font-size: 15px;"><b>{{ lang.iPv }}</b></span>
                            <input name="polio_date" class="form-control" v-model="details.polio_date" type="text" />
                            <span class="input-sub-text">{{ lang.monthYear }}</span>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md col-12">
                            <span class="question-label" style="font-size: 15px;"><b>{{ lang.tdaP }}</b></span>
                            <input name="tetanus_booster_date" class="form-control" v-model="details.tetanus_booster_date" type="text" />
                            <span class="input-sub-text">{{ lang.monthYear }}</span>
                        </div>
                        <div class="col-md col-12">
                            <span class="question-label" style="font-size: 15px;"><b>{{ lang.hiB }}</b></span>
                            <input name="haemophilus_influenza_date" class="form-control" v-model="details.haemophilus_influenza_date" type="text" />
                            <span class="input-sub-text">{{ lang.monthYear }}</span>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md col-12">
                            <span class="question-label" style="font-size: 15px;"><b>{{ lang.mMR }}</b></span>
                            <input name="mumps_measles_rubella_date" class="form-control" v-model="details.mumps_measles_rubella_date" type="text" />
                            <span class="input-sub-text">{{ lang.monthYear }}</span>
                        </div>
                        <div class="col-md col-12">
                            <span class="question-label" style="font-size: 15px;"><b>{{ lang.pCv }}</b></span>
                            <input name="pneumococcal_date" class="form-control" v-model="details.pneumococcal_date" type="text" />
                            <span class="input-sub-text">{{ lang.monthYear }}</span>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md col-12">
                            <span class="question-label" style="font-size: 15px;"><b>{{ lang.hepaB }}</b></span>
                            <input name="hepatitis_b_date" class="form-control" v-model="details.hepatitis_b_date" type="text" />
                            <span class="input-sub-text">{{ lang.monthYear }}</span>
                        </div>
                        <div class="col-md col-12">
                            <span class="question-label" style="font-size: 15px;"><b>{{ lang.hepaA }}</b></span>
                            <input name="hepatitis_a_date" class="form-control" v-model="details.hepatitis_a_date" type="text" />
                            <span>{{ lang.monthYear }}</span>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md col-12">
                            <span class="question-label" style="font-size: 15px;"><b>{{ lang.chickenPox }}</b></span>
                            <input name="chicken_pox_date" class="form-control" v-model="details.chicken_pox_date" type="text" />
                            <span class="input-sub-text">{{ lang.monthYear }}</span>
                        </div>
                        <div class="col-md col-12">
                            <span class="question-label" style="font-size: 15px;"><b>{{ lang.mCv4 }}</b></span>
                            <input name="meningococcal_meningitis_date" class="form-control" v-model="details.meningococcal_meningitis_date" type="text" />
                            <span class="input-sub-text">{{ lang.monthYear }}</span>
                        </div>
                    </div>
                    <div class="pt-4">
                        <div class="immunization_consent_container p-md-5 p-3">
                            <h3 class="font-weight-bold" style="margin-top: 0px !important;">{{ lang.immunizationConsent }}</h3>
                            <p>{{ lang.immunizationConsentTxt1 }}</p>
                            <p>{{ lang.immunizationConsentTxt2 }}</p>
                            <div class="pt-4">
                                <span class="question-label">{{ lang.guardianSign }}</span>
                                <input name="sign_of_custodial_parent" class="form-control" v-model="details.sign_of_custodial_parent" type="text" />
                            </div>
                            <div class="row pt-4">
                                <div class="col">
                                    <span class="question-label">{{ lang.relationship }}</span>
                                    <input name="custodial_parent_relationship" class="form-control" v-model="details.custodial_parent_relationship" type="text" />
                                </div>
                                <div class="col">
                                    <span class="question-label">{{ lang.date }}</span>
                                    <input name="custodial_parent_date" class="form-control" v-model="details.custodial_parent_date" type="date" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-5">
                        <h5 class="font-weight-bold">{{ lang.medication }}</h5>
                        <p>{{ lang.medicationDescription }}</p>
                    </div>
                    <div class="pt-4">
                        <h5 class="font-weight-bold">{{ lang.nonPresMedication }}</h5>
                        <div class="non-prescription-container" id="nonPrescriptionContainer">
                            <div class="row non-prescription-row" v-for="(non_presc, index) in details.non_prescription_medicine">
                                <div class="col-md-12 mt-2">
                                    <span>{{ lang.nameOfMedication }}</span>
                                    <input name="name_of_medication" class="form-control" v-model="non_presc.name_of_medication" type="text" />
                                </div>
                                <div class="col-md-6 mt-2">
                                    <span>{{ lang.reasonForTaking }}</span>
                                    <input name="reason_for_taking" class="form-control" v-model="non_presc.reason_for_taking" type="text" />
                                </div>
                                <div class="col-md-6 mt-2">
                                    <span>{{ lang.amountDose }}</span>
                                    <input name="amount_dose_given" class="form-control" v-model="non_presc.amount_dose_given" type="text" />
                                </div>
                                <div class="col-md-6 mt-2">
                                    <span>{{ lang.frequency }}</span>
                                    <input name="frequency" class="form-control" v-model="non_presc.frequency" type="text" />
                                </div>
                                <div class="col-md-6 mt-2">
                                    <span>{{ lang.timeOfDay }}</span>
                                    <input name="time_of_day" class="form-control" v-model="non_presc.time_of_day" type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-3 pr-1">
                                <button class="form-control medication-btn text-light" @click="addNonPrescription" type="button">(+) {{ lang.addMedication }}</button>
                            </div>
                            <div class="col-3 pl-0">
                                <button class="form-control medication-btn text-light" @click="removeNonPrescription" type="button">(-) {{ lang.removeMedication }}</button>
                            </div>
                        </div>
                    </div>
                    <div class="pt-5">
                        <h5 class="font-weight-bold">{{ lang.prescriptionMedication }}</h5>
                        <div id="prescriptionContainer">
                            <div class="row prescription-row" v-for="(presc, index) in details.prescription_medicine">
                                <div class="col-md-12 mt-2">
                                    <span>{{ lang.nameOfMedication }}</span>
                                    <input name="name_of_medication" class="form-control" v-model="presc.name_of_medication" type="text" />
                                </div>
                                <div class="col-md-6 mt-2">
                                    <span>{{ lang.reasonForTaking }}</span>
                                    <input name="reason_for_taking" class="form-control" v-model="presc.reason_for_taking" type="text" />
                                </div>
                                <div class="col-md-6 mt-2">
                                    <span>{{ lang.amountDose }}</span>
                                    <input name="amount_dose_given" class="form-control" v-model="presc.amount_dose_given" type="text" />
                                </div>
                                <div class="col-md-6 mt-2">
                                    <span>{{ lang.frequency }}</span>
                                    <input name="frequency" class="form-control" v-model="presc.frequency" type="text" />
                                </div>
                                <div class="col-md-6 mt-2">
                                    <span>{{ lang.timeOfDay }}</span>
                                    <input name="time_of_day" class="form-control" v-model="presc.time_of_day" type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-3 pr-1">
                                <button class="form-control medication-btn text-light" @click="addPrescription" type="button">(+) {{ lang.addMedication }}</button>
                            </div>
                            <div class="col-3 pl-0">
                                <button class="form-control medication-btn text-light" @click="removePrescription" type="button">(-) {{ lang.removeMedication }}</button>
                            </div>
                        </div>
                    </div>
                    <div class="pt-5">
                        <p>{{ lang.nonPrescriptionMedicationDescription1 }}<b>{{ lang.nonPrescriptionMedicationDescription2 }}</b></p>
                    </div>
                    <div class="container">
                        <div class="row pt-4">
                            <div class="col-md col-12">
                                <div>
                                    <input name="med_acetaminophen" v-model="details.medicine_to_not_be_given" value="Acetaminophen (Tylenol)" type="checkbox">
                                    <span>{{ lang.tylenol }}</span>
                                </div>
                                <div>
                                    <input name="med_antihistamine" v-model="details.medicine_to_not_be_given" value="Antihistamine (allergy medicine)" type="checkbox">
                                    <span>{{ lang.allergyMedicine }}</span>
                                </div>
                                <div>
                                    <input name="med_ibuprofen" v-model="details.medicine_to_not_be_given" value="Ibuprofen (Advil. Motrin)" type="checkbox">
                                    <span>{{ lang.ibuprofen }}</span>
                                </div>
                            </div>
                            <div class="col-md col-12">
                                <div>
                                    <input name="med_aloe_gel" v-model="details.medicine_to_not_be_given" value="Aloe Gel for sun burn" type="checkbox">
                                    <span>{{ lang.aloe }}</span>
                                </div>
                                <div>
                                    <input name="med_antiacid" v-model="details.medicine_to_not_be_given" value="Antiacid for stomach pain" type="checkbox">
                                    <span>{{ lang.antiacid }}</span>
                                </div>
                                <div>
                                    <input name="med_lice_shampoo" v-model="details.medicine_to_not_be_given" value="Lice shampoo or cream" type="checkbox">
                                    <span>{{ lang.liceShampoo }}</span>
                                </div>
                            </div>
                            <div class="col-md col-12">
                                <div>
                                    <input name="med_calamine" v-model="details.medicine_to_not_be_given" value="Calamine lotion" type="checkbox">
                                    <span>{{ lang.calamine }}</span>
                                </div>
                                <div>
                                    <input name="med_laxatives" v-model="details.medicine_to_not_be_given" value="Laxatives for constipation (Ex-lax)" type="checkbox">
                                    <span>{{ lang.laxatives }}</span>
                                </div>
                                <div>
                                    <input name="med_cough_drops" v-model="details.medicine_to_not_be_given" value="Generic cough drops" type="checkbox">
                                    <span>{{ lang.coughDrops }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-5">
                        <div class="col-12">
                            <div>
                                <h5 class="font-weight-bold">{{ lang.genHealthHistory }}</h5>
                            </div>
                            <div>
                                <span>{{ lang.pleaseCheckYesOrNo }}</span>
                            </div>
                            <div class="row pt-4">
                                <div class="col-md-8">
                                    <span>{{ lang.problemsWithDiarrhea }}</span>
                                </div>
                                <div class="col">
                                    <input name="problems_with_diarrhea" v-model="details.general_health_history.problems_with_diarrhea.answer" value="No" type="radio">
                                    <span class="pr-2">{{ lang.no }}</span>
                                    <input name="problems_with_diarrhea" v-model="details.general_health_history.problems_with_diarrhea.answer" value="Yes" type="radio">
                                    <span>{{ lang.yes }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <span>{{ lang.painDuringExercises }}</span>
                                </div>
                                <div class="col">
                                    <input name="pain_during_exercises" v-model="details.general_health_history.pain_during_exercises.answer" value="No" type="radio">
                                    <span class="pr-2">{{ lang.no }}</span>
                                    <input name="pain_during_exercises" v-model="details.general_health_history.pain_during_exercises.answer" value="Yes" type="radio">
                                    <span>{{ lang.yes }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <span>{{ lang.chronicIllness }}</span>
                                </div>
                                <div class="col">
                                    <input name="recurrent_chronic_illnesses" v-model="details.general_health_history.recurrent_chronic_illnesses.answer" value="No" type="radio">
                                    <span class="pr-2">{{ lang.no }}</span>
                                    <input name="recurrent_chronic_illnesses" v-model="details.general_health_history.recurrent_chronic_illnesses.answer" value="Yes" type="radio">
                                    <span>{{ lang.yes }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <span>{{ lang.infectiousDisease }}</span>
                                </div>
                                <div class="col">
                                    <input name="recent_infectious_disease" v-model="details.general_health_history.recent_infectious_disease.answer" value="No" type="radio">
                                    <span class="pr-2">{{ lang.no }}</span>
                                    <input name="recent_infectious_disease" v-model="details.general_health_history.recent_infectious_disease.answer" value="Yes" type="radio">
                                    <span>{{ lang.yes }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <span>{{ lang.jointProblems }}</span>
                                </div>
                                <div class="col">
                                    <input name="back_joint_problems" v-model="details.general_health_history.back_joint_problems.answer" value="No" type="radio">
                                    <span class="pr-2">{{ lang.no }}</span>
                                    <input name="back_joint_problems" v-model="details.general_health_history.back_joint_problems.answer" value="Yes" type="radio">
                                    <span>{{ lang.yes }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <span>{{ lang.hadAsthma }}</span>
                                </div>
                                <div class="col">
                                    <input name="asthma_shortness_of_breath" v-model="details.general_health_history.asthma_shortness_of_breath.answer" value="No" type="radio">
                                    <span class="pr-2">{{ lang.no }}</span>
                                    <input name="asthma_shortness_of_breath" v-model="details.general_health_history.asthma_shortness_of_breath.answer" value="Yes" type="radio">
                                    <span>{{ lang.yes }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <span>{{ lang.wearGlasses }}</span>
                                </div>
                                <div class="col">
                                    <input name="wear_glasses_or_contacts" v-model="details.general_health_history.wear_glasses_or_contacts.answer" value="No" type="radio">
                                    <span class="pr-2">{{ lang.no }}</span>
                                    <input name="wear_glasses_or_contacts" v-model="details.general_health_history.wear_glasses_or_contacts.answer" value="Yes" type="radio">
                                    <span>{{ lang.yes }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <span>{{ lang.oftenHeadaches }}</span>
                                </div>
                                <div class="col">
                                    <input name="often_have_headaches" v-model="details.general_health_history.often_have_headaches.answer" value="No" type="radio">
                                    <span class="pr-2">{{ lang.no }}</span>
                                    <input name="often_have_headaches" v-model="details.general_health_history.often_have_headaches.answer" value="Yes" type="radio">
                                    <span>{{ lang.yes }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <span>{{ lang.hadSeizures }}</span>
                                </div>
                                <div class="col">
                                    <input name="had_seizures" v-model="details.general_health_history.had_seizures.answer" value="No" type="radio">
                                    <span class="pr-2">{{ lang.no }}</span>
                                    <input name="had_seizures" v-model="details.general_health_history.had_seizures.answer" value="Yes" type="radio">
                                    <span>{{ lang.yes }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <span>{{ lang.hadDiabetes }}</span>
                                </div>
                                <div class="col">
                                    <input name="had_diabetes" v-model="details.general_health_history.had_diabetes.answer" value="No" type="radio">
                                    <span class="pr-2">{{ lang.no }}</span>
                                    <input name="had_diabetes" v-model="details.general_health_history.had_diabetes.answer" value="Yes" type="radio">
                                    <span>{{ lang.yes }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <span>{{ lang.hadSurgery }}</span>
                                </div>
                                <div class="col">
                                    <input name="had_surgery" v-model="details.general_health_history.had_surgery.answer" value="No" type="radio">
                                    <span class="pr-2">{{ lang.no }}</span>
                                    <input name="had_surgery" v-model="details.general_health_history.had_surgery.answer" value="Yes" type="radio">
                                    <span>{{ lang.yes }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <span>{{ lang.hadInjury }}</span>
                                </div>
                                <div class="col">
                                    <input name="had_recent_injury" v-model="details.general_health_history.had_recent_injury.answer" value="No" type="radio">
                                    <span class="pr-2">{{ lang.no }}</span>
                                    <input name="had_recent_injury" v-model="details.general_health_history.had_recent_injury.answer" value="Yes" type="radio">
                                    <span>{{ lang.yes }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <span>{{ lang.hadDizziness }}</span>
                                </div>
                                <div class="col">
                                    <input name="fainting_dizziness" v-model="details.general_health_history.fainting_dizziness.answer" value="No" type="radio">
                                    <span class="pr-2">{{ lang.no }}</span>
                                    <input name="fainting_dizziness" v-model="details.general_health_history.fainting_dizziness.answer" value="Yes" type="radio">
                                    <span>{{ lang.yes }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <span>{{ lang.hospitalized }}</span>
                                </div>
                                <div class="col">
                                    <input name="ever_been_hospitalized" v-model="details.general_health_history.ever_been_hospitalized.answer" value="No" type="radio">
                                    <span class="pr-2">{{ lang.no }}</span>
                                    <input name="ever_been_hospitalized" v-model="details.general_health_history.ever_been_hospitalized.answer" value="Yes" type="radio">
                                    <span>{{ lang.yes }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <span>{{ lang.skinProblems }}</span>
                                </div>
                                <div class="col">
                                    <input name="have_skin_problems" v-model="details.general_health_history.have_skin_problems.answer" value="No" type="radio">
                                    <span class="pr-2">{{ lang.no }}</span>
                                    <input name="have_skin_problems" v-model="details.general_health_history.have_skin_problems.answer" value="Yes" type="radio">
                                    <span>{{ lang.yes }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <span>{{ lang.menstrualCycle }}</span>
                                </div>
                                <div class="col">
                                    <input name="mestrual_cycle_started" v-model="details.general_health_history.mestrual_cycle_started.answer" value="No" type="radio">
                                    <span class="pr-2">{{ lang.no }}</span>
                                    <input name="mestrual_cycle_started" v-model="details.general_health_history.mestrual_cycle_started.answer" value="Yes" type="radio">
                                    <span>{{ lang.yes }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-5">
                        <h5 class="font-weight-bold">{{ lang.mentalEmotionalSocial }}</h5>
                        <p>{{ lang.pleaseCheckYesOrNo }}</p>
                    </div>
                    <div class="pt-4">
                        <div class="row">
                            <div class="col-md-8">
                                <span>{{ lang.treatedForADHD }}</span>
                            </div>
                            <div class="col">
                                <input name="treated_for_add" v-model="details.mental_emotional_health.treated_for_add.answer" value="No" type="radio">
                                <span class="pr-2">{{ lang.no }}</span>
                                <input name="treated_for_add" v-model="details.mental_emotional_health.treated_for_add.answer" value="Yes" type="radio">
                                <span>{{ lang.yes }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <span>{{ lang.treatedForEmotionalDisorder }}</span>
                            </div>
                            <div class="col">
                                <input name="treated_for_emotional_behavioral" v-model="details.mental_emotional_health.treated_for_emotional_behavioral.answer" value="No" type="radio">
                                <span class="pr-2">{{ lang.no }}</span>
                                <input name="treated_for_emotional_behavioral" v-model="details.mental_emotional_health.treated_for_emotional_behavioral.answer" value="Yes" type="radio">
                                <span>{{ lang.yes }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <span>{{ lang.seenProfessionalForMental }}</span>
                            </div>
                            <div class="col">
                                <input name="seen_professional_address_mental" v-model="details.mental_emotional_health.seen_professional_address_mental.answer" value="No" type="radio">
                                <span class="pr-2">{{ lang.no }}</span>
                                <input name="seen_professional_address_mental" v-model="details.mental_emotional_health.seen_professional_address_mental.answer" value="Yes" type="radio">
                                <span>{{ lang.yes }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <span>{{ lang.hadSignificantLifeEvent }}</span>
                            </div>
                            <div class="col">
                                <input name="had_siginificant_life_event" v-model="details.mental_emotional_health.had_siginificant_life_event.answer" value="No" type="radio">
                                <span class="pr-2">{{ lang.no }}</span>
                                <input name="had_siginificant_life_event" v-model="details.mental_emotional_health.had_siginificant_life_event.answer" value="Yes" type="radio">
                                <span>{{ lang.yes }}</span>
                            </div>
                        </div>
                        <div class="pt-4">
                            <div class="row">
                                <div class="col-md-8">
                                        <span>{{ lang.mentalHealthConcerns }}</span>
                                </div>
                                <div class="col">
                                    <input name="mental_heath_concerns" v-model="details.mental_emotional_health.mental_heath_concerns.answer" value="No" type="radio">
                                    <span class="pr-2">{{ lang.no }}</span>
                                    <input name="mental_heath_concerns" v-model="details.mental_emotional_health.mental_heath_concerns.answer" value="Yes" type="radio">
                                    <span>{{ lang.yes }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <p class="pl-2 mb-0 ml-2">{{ lang.mentalHealthConcernsYes }}</p>
                                <input name="text" class="form-control ml-3 col-md-8" v-model="details.mental_health_note" type="text"/>
                            </div>
                        </div>
                        <div class="pt-4">
                            <div class="row">
                                <div class="col-md-8">
                                        <span>{{ lang.behavioralIntervention }}</span>
                                </div>
                                <div class="col">
                                    <input name="behavioral_intervention" v-model="details.mental_emotional_health.behavioral_intervention.answer" value="No" type="radio">
                                    <span class="pr-2">{{ lang.no }}</span>
                                    <input name="behavioral_intervention" v-model="details.mental_emotional_health.behavioral_intervention.answer" value="Yes" type="radio">
                                    <span>{{ lang.yes }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <p class="pl-2 mb-0 ml-2">{{ lang.behavioralInterventionYes }}</p>
                                <input name="text" class="form-control ml-3 col-md-5" v-model="details.behavioral_note" type="text"/>
                            </div>
                        </div>
                        <div class="pt-4">
                            <input name="i_understand_not_registered_until_reviewed" v-model="form.i_understand_not_registered_until_reviewed" type="checkbox" />
                            <span>{{ lang.notRegisteredUntilReviewed }}</span>
                        </div>
                    </div>
                    <div class="pt-5">
                        <h5 class="font-weight-bold">{{ lang.parentAuthorization }}</h5>
                        <p>{{ lang.parentAuthorizationTxt1 }}</p>
                        <p>{{ lang.parentAuthorizationTxt2 }}</p>
                    </div>
                    <div class="row pt-4">
                        <div class="col">
                            <span class="question-label">{{ lang.parentFirstName }}</span>
                            <input name="parent_first_name" class="form-control" v-model="details.parent_first_name" type="text" />
                        </div>
                        <div class="col">
                            <span class="question-label">{{ lang.parentLastName }}</span>
                            <input name="parent_last_name" class="form-control" v-model="details.parent_last_name" type="text" />
                        </div>
                    </div>
                    <div class="pt-4">
                        <span class="question-label">{{ lang.date }}</span>
                        <input name="authorization_date" class="form-control" v-model="details.authorization_date" type="date" />
                    </div>
                    <div class="pt-4">
                        <span class="question-label">{{ lang.relationshipWithCamper }}</span>
                        <div>
                            <input name="relation_to_camper" type="radio" v-model="details.relation_to_camper" value="Father" />
                            <span>{{ lang.father }}</span>
                            <input name="relation_to_camper" type="radio" v-model="details.relation_to_camper" value="Mother" />
                            <span>{{ lang.mother }}</span>
                            <input name="relation_to_camper" type="radio" v-model="details.relation_to_camper" value="Legal Guardian" />
                            <span>{{ lang.legalGuardian }}</span>
                        </div>
                        <div class="pt-4">
                            <input name="confirmed_authorization" v-model="form.confirmed_authorization" type="checkbox" />
                            <span>{{ lang.confirmedAuthorization }}</span>
                        </div>
                    </div>
                    <div class="pt-4">
                        <span class="question-label">{{ lang.additionalComments }}</span>
                        <textarea name="additional_comments" v-model="details.additional_comments" class="form-control"></textarea>
                    </div>
                    <div class="pt-4">
                        <h5 class="font-weight-bold">{{ lang.signatureSection }}</h5>
                        <div>
                            <input name="agree_to_terms_and_conditions" v-model="form.agree_to_terms_and_conditions" type="checkbox" /> <span>{{ lang.agreeToTermsAndConditions }}</span>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col">
                            <div>
                                <span class="question-label">{{ lang.parentFirstName }}</span>
                            </div>
                            <input name="agree_terms_conditions_parent_first_name" class="form-control" v-model="details.agree_terms_conditions_parent_first_name" type="text" />
                        </div>
                        <div class="col">
                            <div>
                                <span class="question-label">{{ lang.parentLastName }}</span>
                            </div>
                            <input name="agree_terms_conditions_parent_last_name" class="form-control" v-model="details.agree_terms_conditions_parent_last_name" type="text" />
                        </div>
                    </div>
                    <div class="pt-4">
                        <input name="agree_changes_to_registration" v-model="form.agree_changes_to_registration" type="checkbox" /> 
                        <span>{{ lang.understandChanges }}</span>
                    </div>
                    <div class="row pt-4">
                        <div class="col">
                            <div>
                                <span class="question-label">{{ lang.parentFirstName }}</span>
                            </div>
                            <input name="agree_changes_parent_first_name" class="form-control" v-model="details.agree_changes_parent_first_name" type="text" />
                        </div>
                        <div class="col">
                            <div>
                                <span class="question-label">{{ lang.parentLastName }}</span>
                            </div>
                            <input name="agree_changes_parent_last_name" class="form-control" v-model="details.agree_changes_parent_last_name" type="text" />
                        </div>
                    </div>
                    <button class="confirmation-btn mt-4 pl-3 pr-3 mb-5" type="submit">{{ lang.submit }}</button>
                </div>
            </div>
        </form>

        <!-- Preview Modal -->
        <div id="previewModal" class="modal">
            <div class="modal-content">
                <div class="modal-header pt-2 pb-0">
                    <h3>{{ lang.reviewInformation }}</h3>
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
                                    <div class="col-md col-6">
                                        <div class="preview-label"><b>{{ lang.firstName }}:</b></div> 
                                        <span v-if="details.first_name">{{ details.first_name }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                    <div class="col-md col-6">
                                        <div class="preview-label"><b>{{ lang.lastName }}:</b></div>
                                        <span v-if="details.last_name">{{ details.last_name }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                    <div class="col-md col-6">
                                        <div class="preview-label"><b>{{ lang.gender }}:</b></div>
                                        <span v-if="details.gender">{{ details.gender }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                    <div class="col-md col-6">
                                        <div class="preview-label"><b>{{ lang.birthdate }}:</b></div>
                                        <span v-if="details.birthdate">{{ details.birthdate }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="col-md col-12">
                                        <div class="preview-label"><b>Email:</b></div>
                                        <span v-if="details.email">{{ details.email }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                    <div class="col-md"></div>
                                    <div class="col-md"></div>
                                    <div class="col-md"></div>
                                </div>
                                <div class="row pb-2">
                                    <div class="col">
                                        <div class="preview-label"><b>{{ lang.physicalRestrictions }}:</b></div>
                                        <span v-if="details.physical_restrictions">{{ details.physical_restrictions }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="col">
                                        <div class="preview-label"><b>{{ lang.allergies }}:</b></div>
                                        <span v-if="details.known_allergies">{{ details.known_allergies }} {{ details.allergies_note }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="preview-label"><b>{{ lang.dietandnutrition }}:</b></div>
                                        <div v-if="details.diet_nutrition.length != 0">
                                            <ul>
                                                <li v-for="(diet, index) in details.diet_nutrition">{{ diet }}</li>
                                            </ul>
                                        </div>
                                        <div v-else>
                                            <span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-2 ml-2">
                                    <div class="col">
                                        <span>{{ lang.dietandnutritionOptionNote }}</span>
                                        <span v-if="details.diet_note">{{ details.diet_note }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                </div>
                                <div class="row pl-2 mt-2">
                                    <h5 class="font-weight-bold">{{ lang.immunizationRecords }}</h5>
                                </div>
                                <div class="row pb-2">
                                    <div class="col-md col-6">
                                        <div class="preview-label"><b>{{ lang.dTap }}:</b></div> 
                                        <span v-if="details.diptheira_tetanus_pertussis_date">{{ details.diptheira_tetanus_pertussis_date }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                    <div class="col-md col-6">
                                        <div class="preview-label"><b>{{ lang.iPv }}:</b></div>
                                        <span v-if="details.polio_date">{{ details.polio_date }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                    <div class="col-md col-6">
                                        <div class="preview-label"><b>{{ lang.tdaP }}:</b></div>
                                        <span v-if="details.tetanus_booster_date">{{ details.tetanus_booster_date }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                    <div class="col-md col-6">
                                        <div class="preview-label"><b>{{ lang.hiB }}:</b></div>
                                        <span v-if="details.haemophilus_influenza_date">{{ details.haemophilus_influenza_date }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="col-md col-6">
                                        <div class="preview-label"><b>{{ lang.mMR }}:</b></div> 
                                        <span v-if="details.mumps_measles_rubella_date">{{ details.mumps_measles_rubella_date }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                    <div class="col-md col-6">
                                        <div class="preview-label"><b>{{ lang.pCv }}:</b></div>
                                        <span v-if="details.pneumococcal_date">{{ details.pneumococcal_date }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                    <div class="col-md col-6">
                                        <div class="preview-label"><b>{{ lang.hepaB }}:</b></div>
                                        <span v-if="details.hepatitis_b_date">{{ details.hepatitis_b_date }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                    <div class="col-md col-6">
                                        <div class="preview-label"><b>{{ lang.hepaA }}:</b></div>
                                        <span v-if="details.hepatitis_a_date">{{ details.hepatitis_a_date }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="col-md col-6">
                                        <div class="preview-label"><b>{{ lang.chickenPox }}:</b></div> 
                                        <span v-if="details.chicken_pox_date">{{ details.chicken_pox_date }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                    <div class="col-md col-6">
                                        <div class="preview-label"><b>{{ lang.mCv4 }}:</b></div>
                                        <span v-if="details.meningococcal_meningitis_date">{{ details.meningococcal_meningitis_date }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                    <div class="col-md col-6"></div>
                                    <div class="col-md col-6"></div>
                                </div>
                                <div class="row pl-2 mt-2">
                                    <h5 class="font-weight-bold">{{ lang.immunizationConsent }}</h5>
                                </div>
                                <div class="row pb-2">
                                    <div class="col">
                                        <div class="preview-label"><b>{{ lang.guardianSign }}:</b></div> 
                                        <span v-if="details.sign_of_custodial_parent">{{ details.sign_of_custodial_parent }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="col-md col-6">
                                        <div class="preview-label"><b>{{ lang.relationship }}:</b></div> 
                                        <span v-if="details.custodial_parent_relationship">{{ details.custodial_parent_relationship }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                    <div class="col-md col-6">
                                        <div class="preview-label"><b>{{ lang.date }}:</b></div>
                                        <span v-if="details.custodial_parent_date">{{ details.custodial_parent_date }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                    <div class="col-md col-6"></div>
                                    <div class="col-md col-6"></div>
                                </div>
                                <div class="row pl-2 mt-2">
                                    <h5 class="font-weight-bold">{{ lang.nonPresMedication }}</h5>
                                </div>
                                <div class="row pb-2" v-for="(non_presc, index) in details.non_prescription_medicine">
                                    <div class="col">
                                        <div class="preview-label"><b>{{ lang.nameOfMedication }}:</b></div> 
                                        <span v-if="non_presc.name_of_medication">{{ non_presc.name_of_medication }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                    <div class="col">
                                        <div class="preview-label"><b>{{ lang.reasonForTaking }}:</b></div>
                                        <span v-if="non_presc.reason_for_taking">{{ non_presc.reason_for_taking }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                    <div class="col">
                                        <div class="preview-label"><b>{{ lang.amountDose }}:</b></div>
                                        <span v-if="non_presc.amount_dose_given">{{ non_presc.amount_dose_given }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                    <div class="col">
                                        <div class="preview-label"><b>{{ lang.Frequency }}:</b></div>
                                        <span v-if="non_presc.frequency">{{ non_presc.frequency }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                    <div class="col">
                                        <div class="preview-label"><b>{{ lang.timeOfDay }}:</b></div>
                                        <span v-if="non_presc.time_of_day">{{ non_presc.time_of_day }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                </div>
                                <div class="row pl-2 mt-2">
                                    <h5 class="font-weight-bold">{{ lang.prescriptionMedication }}</h5>
                                </div>
                                <div class="row pb-2" v-for="(presc, index) in details.prescription_medicine">
                                    <div class="col">
                                        <div class="preview-label"><b>{{ lang.nameOfMedication }}:</b></div> 
                                        <span v-if="presc.name_of_medication">{{ presc.name_of_medication }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                    <div class="col">
                                        <div class="preview-label"><b>{{ lang.reasonForTaking }}:</b></div>
                                        <span v-if="presc.reason_for_taking">{{ presc.reason_for_taking }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                    <div class="col">
                                        <div class="preview-label"><b>{{ lang.amountDose }}:</b></div>
                                        <span v-if="presc.amount_dose_given">{{ presc.amount_dose_given }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                    <div class="col">
                                        <div class="preview-label"><b>{{ lang.frequency }}:</b></div>
                                        <span v-if="presc.frequency">{{ presc.frequency }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                    <div class="col">
                                        <div class="preview-label"><b>{{ lang.timeOfDay }}:</b></div>
                                        <span v-if="presc.time_of_day">{{ presc.time_of_day }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="col">
                                        <div class="preview-label"><b>{{ lang.medicationChildShouldNotBeGiven }}:</b></div>
                                        <div v-if="details.medicine_to_not_be_given.length != 0">
                                            <ul>
                                                <li v-for="(med, index) in details.medicine_to_not_be_given">{{ med }}</li>
                                            </ul>
                                        </div>
                                        <div v-else>
                                            <span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pl-2 mt-2">
                                    <h5 class="font-weight-bold">{{ lang.genHealthHistory }}</h5>
                                </div>
                                <div class="row pb-2">
                                    <div class="col">
                                        <ul>
                                            <li>
                                                {{ details.general_health_history.problems_with_diarrhea.label }}
                                                <span v-if="details.general_health_history.problems_with_diarrhea.answer != null"><b>{{ details.general_health_history.problems_with_diarrhea.answer }}</b></span>
                                                <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                            </li>
                                            <li>
                                                {{ details.general_health_history.pain_during_exercises.label }}
                                                <span v-if="details.general_health_history.pain_during_exercises.answer != null"><b>{{ details.general_health_history.pain_during_exercises.answer }}</b></span>
                                                <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                            </li>
                                            <li>
                                                {{ details.general_health_history.recurrent_chronic_illnesses.label }}
                                                <span v-if="details.general_health_history.recurrent_chronic_illnesses.answer != null"><b>{{ details.general_health_history.recurrent_chronic_illnesses.answer }}</b></span>
                                                <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                            </li>
                                            <li>
                                                {{ details.general_health_history.recent_infectious_disease.label }}
                                                <span v-if="details.general_health_history.recent_infectious_disease.answer != null"><b>{{ details.general_health_history.recent_infectious_disease.answer }}</b></span>
                                                <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                            </li>
                                            <li>
                                                {{ details.general_health_history.back_joint_problems.label }}
                                                <span v-if="details.general_health_history.back_joint_problems.answer != null"><b>{{ details.general_health_history.back_joint_problems.answer }}</b></span>
                                                <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                            </li>
                                            <li>
                                                {{ details.general_health_history.asthma_shortness_of_breath.label }}
                                                <span v-if="details.general_health_history.asthma_shortness_of_breath.answer != null"><b>{{ details.general_health_history.asthma_shortness_of_breath.answer }}</b></span>
                                                <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                            </li>
                                            <li>
                                                {{ details.general_health_history.wear_glasses_or_contacts.label }}
                                                <span v-if="details.general_health_history.wear_glasses_or_contacts.answer != null"><b>{{ details.general_health_history.wear_glasses_or_contacts.answer }}</b></span>
                                                <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                            </li>
                                            <li>
                                                {{ details.general_health_history.often_have_headaches.label }}
                                                <span v-if="details.general_health_history.often_have_headaches.answer != null"><b>{{ details.general_health_history.often_have_headaches.answer }}</b></span>
                                                <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                            </li>
                                            <li>
                                                {{ details.general_health_history.had_seizures.label }}
                                                <span v-if="details.general_health_history.had_seizures.answer != null"><b>{{ details.general_health_history.had_seizures.answer }}</b></span>
                                                <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                            </li>
                                            <li>
                                                {{ details.general_health_history.had_diabetes.label }}
                                                <span v-if="details.general_health_history.had_diabetes.answer != null"><b>{{ details.general_health_history.had_diabetes.answer }}</b></span>
                                                <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                            </li>
                                            <li>
                                                {{ details.general_health_history.had_surgery.label }}
                                                <span v-if="details.general_health_history.had_surgery.answer != null"><b>{{ details.general_health_history.had_surgery.answer }}</b></span>
                                                <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                            </li>
                                            <li>
                                                {{ details.general_health_history.had_recent_injury.label }}
                                                <span v-if="details.general_health_history.had_recent_injury.answer != null"><b>{{ details.general_health_history.had_recent_injury.answer }}</b></span>
                                                <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                            </li>
                                            <li>
                                                {{ details.general_health_history.fainting_dizziness.label }}
                                                <span v-if="details.general_health_history.fainting_dizziness.answer != null"><b>{{ details.general_health_history.fainting_dizziness.answer }}</b></span>
                                                <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                            </li>
                                            <li>
                                                {{ details.general_health_history.ever_been_hospitalized.label }}
                                                <span v-if="details.general_health_history.ever_been_hospitalized.answer != null"><b>{{ details.general_health_history.ever_been_hospitalized.answer }}</b></span>
                                                <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                            </li>
                                            <li>
                                                {{ details.general_health_history.have_skin_problems.label }}
                                                <span v-if="details.general_health_history.have_skin_problems.answer != null"><b>{{ details.general_health_history.have_skin_problems.answer }}</b></span>
                                                <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                            </li>
                                            <li>
                                                {{ details.general_health_history.mestrual_cycle_started.label }}
                                                <span v-if="details.general_health_history.mestrual_cycle_started.answer != null"><b>{{ details.general_health_history.mestrual_cycle_started.answer }}</b></span>
                                                <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row pl-2 mt-2">
                                    <h5 class="font-weight-bold">{{ lang.mentalEmotionalSocial }}</h5>
                                </div>
                                <div class="row pb-2">
                                    <div class="col">
                                        <ul>
                                            <li>
                                                {{ details.mental_emotional_health.treated_for_add.label }}
                                                <span v-if="details.mental_emotional_health.treated_for_add.answer != null"><b>{{ details.mental_emotional_health.treated_for_add.answer }}</b></span>
                                                <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                            </li>
                                            <li>
                                                {{ details.mental_emotional_health.treated_for_emotional_behavioral.label }}
                                                <span v-if="details.mental_emotional_health.treated_for_emotional_behavioral.answer != null"><b>{{ details.mental_emotional_health.treated_for_emotional_behavioral.answer }}</b></span>
                                                <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                            </li>
                                            <li>
                                                {{ details.mental_emotional_health.seen_professional_address_mental.label }}
                                                <span v-if="details.mental_emotional_health.seen_professional_address_mental.answer != null"><b>{{ details.mental_emotional_health.seen_professional_address_mental.answer }}</b></span>
                                                <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                            </li>
                                            <li>
                                                {{ details.mental_emotional_health.had_siginificant_life_event.label }}
                                                <span v-if="details.mental_emotional_health.had_siginificant_life_event.answer != null"><b>{{ details.mental_emotional_health.had_siginificant_life_event.answer }}</b></span>
                                                <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                            </li>
                                            <li>
                                                {{ details.mental_emotional_health.mental_heath_concerns.label }}
                                                <span v-if="details.mental_emotional_health.mental_heath_concerns.answer != null"><b>{{ details.mental_emotional_health.mental_heath_concerns.answer }} {{ details.mental_health_note }}</b></span>
                                                <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                            </li>
                                            <li>
                                                {{ details.mental_emotional_health.behavioral_intervention.label }}
                                                <span v-if="details.mental_emotional_health.behavioral_intervention.answer != null"><b>{{ details.mental_emotional_health.behavioral_intervention.answer }} {{ details.behavioral_note }}</b></span>
                                                <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row pl-2 mt-2">
                                    <h5 class="font-weight-bold">{{ lang.parentAuthorization }}</h5>
                                </div>
                                <div class="row pb-2">
                                    <div class="col-md col-6">
                                        <div class="preview-label"><b>{{ lang.parentFirstName }}:</b></div> 
                                        <span v-if="details.parent_first_name">{{ details.parent_first_name }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                    <div class="col-md col-6">
                                        <div class="preview-label"><b>{{ lang.parentLastName }}:</b></div>
                                        <span v-if="details.parent_last_name">{{ details.parent_last_name }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                    <div class="col-md col-6">
                                        <div class="preview-label"><b>{{ lang.date }}:</b></div>
                                        <span v-if="details.authorization_date">{{ details.authorization_date }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                    <div class="col-md col-6">
                                        <div class="preview-label"><b>{{ lang.relationship }}:</b></div>
                                        <span v-if="details.relation_to_camper">{{ details.relation_to_camper }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="col">
                                        <div class="preview-label"><b>{{ lang.additionalComments }}:</b></div> 
                                        <span v-if="details.parent_first_name">{{ details.parent_first_name }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                </div>
                                <div class="row pl-2 mt-2">
                                    <h5 class="font-weight-bold">{{ lang.signatureSection }}</h5>
                                </div>
                                <div class="row pb-2">
                                    <div class="col">
                                        <span>{{ lang.agreeToTermsAndConditions }}</span>
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="col-md col-6">
                                        <div class="preview-label"><b>{{ lang.parentFirstName }}:</b></div> 
                                        <span v-if="details.agree_terms_conditions_parent_first_name">{{ details.agree_terms_conditions_parent_first_name }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                    <div class="col-md col-6">
                                        <div class="preview-label"><b>{{ lang.parentLastName }}:</b></div>
                                        <span v-if="details.agree_terms_conditions_parent_last_name">{{ details.agree_terms_conditions_parent_last_name }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                    <div class="col-md col-6"></div>
                                    <div class="col-md col-6"></div>
                                </div>
                                <div class="row pb-2">
                                    <div class="col">
                                        <span>{{ lang.understandChanges }}</span>
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="col-md col-6">
                                        <div class="preview-label"><b>{{ lang.parentFirstName }}:</b></div> 
                                        <span v-if="details.agree_changes_parent_first_name">{{ details.agree_changes_parent_first_name }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                    <div class="col-md col-6">
                                        <div class="preview-label"><b>{{ lang.parentLastName }}:</b></div>
                                        <span v-if="details.agree_changes_parent_last_name">{{ details.agree_changes_parent_last_name }}</span>
                                        <span v-else><span class='red-txt font-weight-bold'>{{ lang.notInformed }}</span></span>
                                    </div>
                                    <div class="col-md col-6"></div>
                                    <div class="col-md col-6"></div>
                                </div>
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
</template>

<style>
    .main-form-container {
        width: 90%;
    }

    .please-complete-label {
        font-size: 1.5em !important;
        color: red !important;
    }

    .question-label {
        font-size: 1.4em;
    }

    .banner-container {
        border: solid;
        border-color: #8cb1d2;
    }
    
    .banner-txt-container {
        background-color: #c9effd;
    }

    .banner-img-container {
        background-color: #8cb1d2;
    }

    .banner-img {
        width: 69%;
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

    .input-sub-text {
        font-size: 0.8em;
    }

    .immunization_consent_container {
        background-color: #f7f7f7;
    }

    .medication-btn {
        background-color: #0640a2;
    }

    .medication-btn:focus {
        background-color: #0640a2;
    }

    .processing-fee {
        background-color: #e8eff4;
        color: #2165b9;
    }

    .agency-only-div {
        background-color: #f7f7f7;
    }

    .confirmation-btn {
        background-color: #0640a2;
        color: #ffffff;
        border: none;
        font-size: larger;
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
        z-index: 1; /* Sit on top */
        padding-top: 3%; /* Location of the box */
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
    @media screen and (max-width: 767px) {
        .modal-content {
            margin: auto auto 70px;
        }
    }
</style>
<script>
    import nationalities from '@/content/nationalities.json'
    import countries from '@/content/countries.json'
    
    export default {
        async asyncData({ $content, params }) {
            const lang = await $content(`health-form/en`).fetch();
            return {
                lang, 
                nationalities, 
                countries,
                isLoading: false,
                form: {
                    i_understand_not_registered_until_reviewed:false,
                    confirmed_authorization:false,
                    agree_to_terms_and_conditions:false,
                    agree_changes_to_registration:false
                },
                details: {
                    gender:null,
                    first_name:null,
                    last_name:null,
                    birthdate:null,
                    email:null,
                    physical_restrictions:null,
                    known_allergies:null,
                    allergies_note:null,
                    diet_nutrition: [],
                    diet_note:null,
                    diptheira_tetanus_pertussis_date:null,
                    polio_date:null,
                    tetanus_booster_date:null,
                    haemophilus_influenza_date:null,
                    mumps_measles_rubella_date:null,
                    pneumococcal_date:null,
                    hepatitis_b_date:null,
                    hepatitis_a_date:null,
                    chicken_pox_date:null,
                    meningococcal_meningitis_date:null,
                    sign_of_custodial_parent:null,
                    custodial_parent_relationship:null,
                    custodial_parent_date:null,
                    non_prescription_medicine: [
                        {name_of_medication:null, reason_for_taking: null, amount_dose_given: null, frequency: null, time_of_day:null}
                    ],
                    prescription_medicine: [
                        {name_of_medication:null, reason_for_taking: null, amount_dose_given: null, frequency: null, time_of_day:null}
                    ],
                    medicine_to_not_be_given: [],
                    general_health_history: {
                        problems_with_diarrhea: {label: "Have problems with diarrhea?", answer:null},
                        pain_during_exercises: {label: "Had pain during exercises?", answer:null},
                        recurrent_chronic_illnesses: {label: "Have recurrent/chronic illnesses?", answer:null},
                        recent_infectious_disease: {label: "Had a recent infectious disease?", answer:null},
                        back_joint_problems: {label: "Ever had back/joint problems?", answer:null},
                        asthma_shortness_of_breath: {label: "Had asthma/shortness of breath?", answer:null},
                        wear_glasses_or_contacts: {label: "Wear glasses and or contacts?", answer:null},
                        often_have_headaches: {label: "Often have headaches?", answer:null},
                        had_seizures: {label: "Had seizures?", answer:null},
                        had_diabetes: {label: "Had diabetes?", answer:null},
                        had_surgery: {label: "Ever had surgery?", answer:null},
                        had_recent_injury: {label: "Had a recent injury?", answer:null},
                        fainting_dizziness: {label: "Had fainting/dizziness?", answer:null},
                        ever_been_hospitalized: {label: "Ever been hospitalized?", answer:null},
                        have_skin_problems: {label: "Have any skin problems?", answer:null},
                        mestrual_cycle_started: {label: "Menstrual cycle started (period)", answer:null}
                    },
                    mental_emotional_health: {
                        treated_for_add: {label: "Ever been treated for attention deficit disorder (ADD) or attention deficit/hyperactivity disorder (AD/HD)?", answer:null},
                        treated_for_emotional_behavioral: {label: "Ever been treated for emotional or behavioral difficulties or an eating disorder?", answer:null},
                        seen_professional_address_mental: {label: "During the past 12 months, seen a professional to address mental/emotional health concerns?", answer:null},
                        had_siginificant_life_event: {label: "Had a significant life event that continues to affect the camper's life? (History of abuse, death of loved one, family change, adoption, foster care, new sibling, others)", answer:null},
                        mental_heath_concerns: {label: "Are there any mental health concerns (e.g., depression, anxiety disorders) that we should be aware of to ensure the camper's well-being?", answer:null},
                        behavioral_intervention: {label: "Has the camper had any prior behavioral interventions or support plans (e.g., Individualized Education Program, therapy)?", answer:null},
                    },
                    
                    mental_health_note:null,
                    behavioral_note:null,
                    parent_first_name:null,
                    parent_last_name:null,
                    authorization_date:null,
                    relation_to_camper:null,
                    additional_comments:null,
                    agree_terms_conditions_parent_first_name:null,
                    agree_terms_conditions_parent_last_name:null,
                    agree_changes_parent_first_name:null,
                    agree_changes_parent_last_name:null
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
        layout:'uclasummercampv2',
        methods: {
            addNonPrescription() {
                this.details.non_prescription_medicine.push({name_of_medication:null, reason_for_taking: null, amount_dose_given: null, frequency: null, time_of_day:null})
            },
            removeNonPrescription() {
                this.details.non_prescription_medicine.pop()
            },
            addPrescription() {
                this.details.prescription_medicine.push({name_of_medication:null, reason_for_taking: null, amount_dose_given: null, frequency: null, time_of_day:null})
            },
            removePrescription() {
                this.details.prescription_medicine.pop()
            },
            openPreviewModal() {
                const modal = document.getElementById("previewModal");
                modal.style.display = "block";
            },
            closePreviewModal() {
                const modal = document.getElementById("previewModal");
                modal.style.display = "none";
            },
            async submitData() {
                
                this.isLoading = true;
                await this.$axios.post('health-form').then(function(response) {
                    // window.location.href = '/health-form/thanks';
                }).catch(function(error) {
                    console.log('error')
                });
            }
        }
    }
</script>