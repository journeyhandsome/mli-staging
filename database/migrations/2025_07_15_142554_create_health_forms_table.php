<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_forms', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('gender', 10);
            $table->string('birthdate', 15);
            $table->string('email');
            $table->string('physical_restrictions')->nullable();
            $table->string('known_allergies')->nullable();
            $table->string('allergies_note', 700)->nullable();
            $table->string('diet_nutrition')->nullable();
            $table->string('diet_note', 700)->nullable();
            $table->string('help_friendship_note', 700)->nullable();
            $table->string('anxiety_note', 700)->nullable();
            $table->string('mental_health_note', 700)->nullable();
            $table->string('behavioral_note', 700)->nullable();
            $table->string('diptheira_tetanus_pertussis_date')->nullable();
            $table->string('polio_date')->nullable();
            $table->string('tetanus_booster_date')->nullable();
            $table->string('haemophilus_influenza_date')->nullable();
            $table->string('mumps_measles_rubella_date')->nullable();
            $table->string('pneumococcal_date')->nullable();
            $table->string('hepatitis_b_date')->nullable();
            $table->string('hepatitis_a_date')->nullable();
            $table->string('chicken_pox_date')->nullable();
            $table->string('meningococcal_meningitis_date')->nullable();
            $table->string('sign_of_custodial_parent')->nullable();
            $table->string('custodial_parent_relationship')->nullable();
            $table->string('custodial_parent_date')->nullable();
            $table->text('non_prescription_medicine')->nullable();
            $table->text('prescription_medicine')->nullable();
            $table->text('medicine_to_not_be_given')->nullable();
            $table->text('general_health_history')->nullable();
            $table->text('mental_emotional_health')->nullable();
            $table->string('parent_first_name', 50)->nullable();
            $table->string('parent_last_name', 50)->nullable();
            $table->string('authorization_date', 15)->nullable();
            $table->string('relation_to_camper', 50)->nullable();
            $table->text('additional_comments', 700)->nullable();
            $table->text('require_transportation')->nullable();
            $table->string('agree_terms_conditions_parent_first_name', 50)->nullable();
            $table->string('agree_terms_conditions_parent_last_name', 50)->nullable();
            $table->string('agree_changes_parent_first_name', 50)->nullable();
            $table->string('agree_changes_parent_last_name', 50)->nullable();
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
        Schema::dropIfExists('health_forms');
    }
}
