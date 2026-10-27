<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanceCampOnlineApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dancecamp_online_applications', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('gender', 10);
            $table->string('birthdate', 15);
            $table->string('email');
            $table->string('phone', 20)->nullable();
            $table->string('nationality', 70);
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip', 20)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('language_spoken', 150);
            $table->string('booking_agency')->nullable();
            $table->string('contact_at_agency')->nullable();
            $table->string('emergency_contact_full_name');
            $table->string('emergency_contact_relationship');
            $table->string('emergency_contact_email');
            $table->string('emergency_contact_phone');
            $table->string('guardian_name')->nullable();
            $table->string('guardian_daytime_phone')->nullable();
            $table->string('guardian_home_phone')->nullable();
            $table->string('guardian_mobile_phone');
            $table->string('guardian_email');
            $table->string('accomodation', 20);
            $table->string('program_start_date', 20);
            $table->string('program_age_group', 50);
            $table->string('program_weeks', 50);
            $table->text('extra_nights_residence')->nullable();
            $table->string('before_camp_start', 20)->nullable();
            $table->string('after_camp_start', 20)->nullable();
            $table->tinyInteger('off_hour_transfer_fee')->nullable();
            $table->string('allergies', 40)->nullable();
            $table->text('diet')->nullable();
            $table->text('diet_nutrition_details')->nullable();
            $table->string('terms_and_conditions_parent_name', 80)->nullable();
            $table->string('agree_terms_and_conditions_date', 15);
            $table->string('subject_to_change_parents_name', 80)->nullable();
            $table->string('subject_to_change_date', 80)->nullable();
            $table->string('agency_name', 80)->nullable();
            $table->string('agency_rep_name', 80)->nullable();
            $table->string('agency_rep_email', 80)->nullable();
            $table->string('tamwood_sales', 80)->nullable();
            $table->string('grade_level')->nullable();
            $table->string('irregular_pickup')->nullable();
            $table->string('minor_service')->nullable();
            $table->string('language', 5);
            $table->string('stripe_key', 15)->nullable();
            $table->tinyInteger('is_paid')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dancecamp_online_applications');
    }
}
