export default {
        email:{
            "type": "email",
            "name": "email",
            "label": "E-mail:",
            "icon": "envelope-fill",
            "isRequired": true
          },
          campus:{
            "type": "select",
            "name": "campus",
            "label": "Campus:",
            "icon": "bank2",
            "selection": [
              {
                "value": "Hollywood",
                "label": "Hollywood"
              },
              {
                "value": "Westwood",
                "label": "Westwood"
              }
            ]
          },
          studentType:{
            "type": "select",
            "name": "studentType",
            "label": "Student Type:",
            "icon": "person",
            "selection": [
              {
                "value": "Overseas",
                "label": "Overseas"
              },
              {
                "value": "Transfer",
                "label": "Transfer"
              }
            ]
          },
          date:{
            "type": "datepicker",
            "name": "date",
            "label": "Date",
            "icon": "calendar3-range-fill",
            "isRequired": true
          },
          fname:{
            "type": "text",
            "name": "fname",
            "label": "First Name:",
            "icon": "person",
            "highlight": true,
            "isRequired": true
          },
          lname:{
            "type": "text",
            "name": "lname",
            "label": "Last Name",
            "icon": "people",
            "highlight": true,
            "isRequired": true
          },
          mname:{
            "type": "text",
            "name": "mname",
            "label": "Middle Name",
            "icon": "people",
            "highlight": true,
            "isRequired": true
          },
          country:{
            "type": "select",
            "name": "country",
            "label": "Country",
            "icon": "house-fill",
            "selection":[]
          },
          gender:{
            "type": "select",
            "name": "gender",
            "label": "Gender",
            "icon": "gender-ambiguous",
            "selection": [
              {
                "value": "",
                "label": "Select"
              },
              {
                "value": "Male",
                "label": "Male"
              },
              {
                "value": "Female",
                "label": "Female"
              },
              {
                "value": "Other",
                "label": "Other"
              }
            ]
          },
          birthCity:{
            "type": "text",
            "name": "birthCity",
            "label": "City of Birth",
            "icon": "house-fill",
            "highlight": true,
            "isRequired": false
          },
          street:{
            "type": "text",
            "name": "street_name",
            "label": "Street Name:",
            "icon": "house-fill",
            "isRequired": true
        },
        building:{
            "type": "text",
            "name": "address_no",
            "label": "Building Name, Building Number, and/or Apartment #:",
            "icon": "house-fill",
            "isRequired": true
        },
        city:{
            "type": "text",
            "name": "city",
            "label": "City Name:",
            "icon": "house-fill",
            "isRequired": true
        },
        state:{
            "type": "text",
            "name": "state",
            "label": "State:",
            "icon": "house-fill",
            "isRequired": true
        },
        phone:{
            "type": "text",
            "name": "tel",
            "label": "Phone:",
            "icon": "phone",
            "isRequired": true
        },
        program:{
            "type": "select",
            "name": "appliedProgram",
            "label": "Program",
            "selection": [
              
              {
                "value": "ESL Program (18 hours per week)",
                "label": "ESL Program (18 hours per week)"
              },
              {
                "value": "TOEFL® Preparation Program (18 hours per week)",
                "label": "TOEFL® Preparation Program (18 hours per week)"
              },
              {
                "value": "Business Plus TOEIC® Program (18 hours per week)",
                "label": "Business Plus TOEIC® Program (18 hours per week)"
              },
              {
                "value": "Conversation Program (18 hours per week)",
                "label": "Conversation Program (18 hours per week)"
              },
              {
                "value": "IELTS Preparation Program (18 hours per week)",
                "label": "IELTS Preparation Program (18 hours per week)"
              },
              {
                "value": "Duolingo Preparation Program (18 hours per week)",
                "label": "Duolingo Preparation Program (18 hours per week)"
              }
            ]
          },
          duration:{
            "type": "select",
            "name": "courseDuration",
            "label": "Course Duration",
            "selection": [],
            "func":"scheduleToObject",
            "params":"Week|Weeks,1,48"
          },
          downloadable:{
            "type": "link",
            "name": "downloadable",
            "label": "Please Download",
            "src":"",
            "id":null,
            "selection": [],
          },
          deliveryMode:{
            "type": "select",
            "name": "deliveryMode",
            "label": "How would you like us to deliver your I-20?",
            "callback":"deliveryMode",
            "costs":{"by_email_(in_digital_format)":0,"by_express_mail_(in_paper_through_FedEx)_$120":120,"in_person_(pick_up_at_school_in_paper)":0},
            "selection": [ 
              {
                "value": "by_email_(in_digital_format)",
                "label": "By email (in digital format)"
              },
              {
                "value": "by_express_mail_(in_paper_through_FedEx)_$120",
                "label": "By express mail (in paper through FedEx): *$120"
              },
              {
                "value": "in_person_(pick_up_at_school_in_paper)",
                "label": "In person (pick up at school in paper)"
              }
            ]
          },
          supportingDoc:{
            "type": "button",
            "name": "supportingDocumentPassport",
            "label": "Upload Your Supporting Documents",
            "new_label": "Supporting Documents",
            "component":"uploadDocument",
            "callback":"documentUpload",
            "btn":"Passport",
            "btnkey":"passport",
            "notes":{
                passport:null,
                financial_bank_statement:"<div>The balance must be over over $7,800 for 24wks Program</div><div>MLI recommends the amount over $15,600.</div><div>The statement must be issued within 3 months</div>"
            },
            // "selection": [
            //     {
            //         "value": null,
            //         "label": null
            //     },
            //   {
            //     "value": "passport",
            //     "label": "Passport"
            //   },
            //   {
            //     "value": "financial_bank_statement",
            //     "label": "Financial/ Bank Statement"
            //   }
            // ]
          },
          payViaStripe:{
            "type": "radio",
            "name": "payViaStripe",
            "label": "Pay with stripe (Non-refundable)",
            "currency":"$",
            "dLabel":"Pay with stripe ${} (Non-refundable)",
            "selection": [
              {
                  "value": "payViaStripe",
                  "label": "Pay with stripe $120"
              },
            ]
          },
          radioGroup:{
            "type": "radioGroup",
            "title":"none",
            "groupName": "none",
            "lists": [],
            "checked":-1,
            "func":"radioGroup",
            "isRequired":true
          },
          manualInput:{
            "type": "manualInput",
            "title":"none",
            "name": "none",
            "data":"none",
            "checked":-1,
            "isRequired":true
          }
}