<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthForm;
class HealthFormController extends Controller
{
    public function store(Request $request)
    {
        $allRequest = $request->all();

        $contact = HealthForm::create([
            'first_name' => $allRequest['first_name'],
            'last_name' => $allRequest['last_name'],
            'gender' => $allRequest['gender'],
            'birthdate' => $allRequest['birthdate'],
            'email' => $allRequest['email'],
            'physical_restrictions' => $allRequest['physical_restrictions'],
            'known_allergies' => $allRequest['known_allergies'],
            'allergies_note' => $allRequest['allergies_note'],
            'diet_nutrition' => json_encode($allRequest['diet_nutrition']),
            'diet_note' => $allRequest['diet_note'],
            'diptheira_tetanus_pertussis_date' => $allRequest['diptheira_tetanus_pertussis_date'],
            'polio_date' => $allRequest['polio_date'],
            'tetanus_booster_date' => $allRequest['tetanus_booster_date'],
            'haemophilus_influenza_date' => $allRequest['haemophilus_influenza_date'],
            'mumps_measles_rubella_date' => $allRequest['mumps_measles_rubella_date'],
            'pneumococcal_date' => $allRequest['pneumococcal_date'],
            'hepatitis_b_date' => $allRequest['hepatitis_b_date'],
            'hepatitis_a_date' => $allRequest['hepatitis_a_date'],
            'chicken_pox_date' => $allRequest['chicken_pox_date'],
            'meningococcal_meningitis_date' => $allRequest['meningococcal_meningitis_date'],
            'sign_of_custodial_parent' => $allRequest['sign_of_custodial_parent'],
            'custodial_parent_relationship' => $allRequest['custodial_parent_relationship'],
            'custodial_parent_date' => $allRequest['custodial_parent_date'],
            'non_prescription_medicine' => json_encode($allRequest['non_prescription_medicine']),
            'prescription_medicine' => json_encode($allRequest['prescription_medicine']),
            'medicine_to_not_be_given' => json_encode($allRequest['medicine_to_not_be_given']),
            'general_health_history' => json_encode($allRequest['general_health_history']),
            'mental_emotional_health' => json_encode($allRequest['mental_emotional_health']),
            // 'help_friendship_note' => $allRequest['help_friendship_note'],
            // 'anxiety_note' => $allRequest['anxiety_note'],
            'mental_health_note' => $allRequest['mental_health_note'],
            'behavioral_note' => $allRequest['behavioral_note'],
            'parent_first_name' => $allRequest['parent_first_name'],
            'parent_last_name' => $allRequest['parent_last_name'],
            'authorization_date' => $allRequest['authorization_date'],
            'relation_to_camper' => $allRequest['relation_to_camper'],
            'additional_comments' => $allRequest['additional_comments'],
            'agree_terms_conditions_parent_first_name' => $allRequest['agree_terms_conditions_parent_first_name'],
            'agree_terms_conditions_parent_last_name' => $allRequest['agree_terms_conditions_parent_last_name'],
            'agree_changes_parent_first_name' => $allRequest['agree_changes_parent_first_name'],
            'agree_changes_parent_last_name' => $allRequest['agree_changes_parent_last_name']
        ])->toArray();

        $contact['diet_nutrition_str'] = implode(', ', $allRequest['diet_nutrition']);
        
        $contact['non_prescription_medicine_arr'] = $allRequest['non_prescription_medicine'];

        $contact['prescription_medicine_arr'] = $allRequest['prescription_medicine'];

        $contact['medicine_to_not_be_given_str'] = implode(', ', $allRequest['medicine_to_not_be_given']);

        $contact['general_health_history_arr'] = $allRequest['general_health_history'];

        $contact['mental_emotional_health_arr'] = $allRequest['mental_emotional_health'];

        $language = $request->has('language') ? $request->language : 'en';

        if(isset($contact['id'])) {
            Mail::send('emails.HealthForm', ["data" => $contact, "language" => $language], function($message) use ($language)
            {
                $to_name = env('APP_NAME');
                $to_email = "jmdhagz@gmail.com";
                // $to_email = "contact@mliesl.edu";
                $subject = 'Health Form [' . global_lang_description($language) .']';

                $message->to($to_email, $to_name)->subject($subject);
            });

            //Send to Customer
            Mail::send('emails.customer.HealthForm', ["data" => $contact], function($message) use ($contact)
            {
                $to_name = $contact['first_name'].' '.$contact['last_name'];
                $to_email = $contact['email'];
    
                $message->to($to_email, $to_name)->subject('Health Form Application');
            });
        }

        return 'success';
    }
}
