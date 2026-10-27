<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanceCampOnlineApplication extends Model
{
    protected $table = 'dancecamp_online_applications';
    
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'birthdate',
        'email',
        'phone',
        'nationality',
        'address_1',
        'address_2',
        'city',
        'state',
        'zip',
        'country',
        'language_spoken',
        'emergency_contact_full_name',
        'emergency_contact_relationship',
        'emergency_contact_email',
        'emergency_contact_phone',
        'guardian_name',
        'guardian_daytime_phone',
        'guardian_home_phone',
        'guardian_mobile_phone',
        'guardian_email',
        'accomodation',
        'program_start_date',
        'program_age_group',
        'program_weeks',
        'before_camp_start',
        'after_camp_start',
        'terms_and_conditions_parent_name',
        'agree_terms_and_conditions_date',
        'agency_name',
        'agency_rep_name',
        'agency_rep_email',
        'tamwood_sales',
        'language',
        'stripe_key',
        'is_paid',
        'grade_level',
        'irregular_pickup',
        'minor_service',

    ];
}
