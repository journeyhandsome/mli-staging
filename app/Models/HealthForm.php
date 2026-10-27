<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthForm extends Model
{
    use HasFactory;
    protected $table = 'health_forms';

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'birthdate',
        'email',
        'physical_restrictions',
        'known_allergies',
        'allergies_note',
        'diet_nutrition',
        'diet_note',
        'diptheira_tetanus_pertussis_date',
        'polio_date',
        'tetanus_booster_date',
        'haemophilus_influenza_date',
        'mumps_measles_rubella_date',
        'pneumococcal_date',
        'hepatitis_b_date',
        'hepatitis_a_date',
        'chicken_pox_date',
        'meningococcal_meningitis_date',
        'sign_of_custodial_parent',
        'custodial_parent_relationship',
        'custodial_parent_date',
        'non_prescription_medicine',
        'prescription_medicine',
        'medicine_to_not_be_given',
        'general_health_history',
        'mental_emotional_health',
        'mental_health_note',
        'behavioral_note',
        'parent_first_name',
        'parent_last_name',
        'authorization_date',
        'relation_to_camper',
        'additional_comments',
        'agree_terms_conditions_parent_first_name',
        'agree_terms_conditions_parent_last_name',
        'agree_changes_parent_first_name',
        'agree_changes_parent_last_name'
    ];
}
