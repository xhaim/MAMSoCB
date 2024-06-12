<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('archived_registries', function (Blueprint $table) {
        
            $table->id();
            $table->text('rsbsa_id')->nullable();
            $table->text('generated_id')->nullable();
            $table->string('date_enrolled')->nullable();

            // Household Members // Household Members // Household Members // Household Members // Household Members //
            
            // HHM 1
            $table->text('hh_member')->nullable();
            $table->text('surname')->nullable();
            $table->text('firstname')->nullable();
            $table->text('middlename')->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->text('age')->nullable();
            $table->string('birthdate')->nullable();
            // HHM 2
            $table->text('hh_member2')->nullable();
            $table->text('surname2')->nullable();
            $table->text('firstname2')->nullable();
            $table->text('middlename2')->nullable();
            $table->enum('gender2', ['Male', 'Female'])->nullable();
            $table->text('age2')->nullable();
            $table->string('birthdate2')->nullable();
            // HHM 3
            $table->text('hh_member3')->nullable();
            $table->text('surname3')->nullable();
            $table->text('firstname3')->nullable();
            $table->text('middlename3')->nullable();
            $table->enum('gender3', ['Male', 'Female'])->nullable();
            $table->text('age3')->nullable();
            $table->string('birthdate3')->nullable();
            // HHM 4
            $table->text('hh_member4')->nullable();
            $table->text('surname4')->nullable();
            $table->text('firstname4')->nullable();
            $table->text('middlename4')->nullable();
            $table->enum('gender4', ['Male', 'Female'])->nullable();
            $table->text('age4')->nullable();
            $table->string('birthdate4')->nullable();
            // HHM 5
            $table->text('hh_member5')->nullable();
            $table->text('surname5')->nullable();
            $table->text('firstname5')->nullable();
            $table->text('middlename5')->nullable();
            $table->enum('gender5', ['Male', 'Female'])->nullable();
            $table->text('age5')->nullable();
            $table->string('birthdate5')->nullable();
            // HHM 6
            $table->text('hh_member6')->nullable();
            $table->text('surname6')->nullable();
            $table->text('firstname6')->nullable();
            $table->text('middlename6')->nullable();
            $table->enum('gender6', ['Male', 'Female'])->nullable();
            $table->text('age6')->nullable();
            $table->string('birthdate6')->nullable();
            // HHM 7
            $table->text('hh_member7')->nullable();
            $table->text('surname7')->nullable();
            $table->text('firstname7')->nullable();
            $table->text('middlename7')->nullable();
            $table->enum('gender7', ['Male', 'Female'])->nullable();
            $table->text('age7')->nullable();
            $table->string('birthdate7')->nullable();
            // HHM 8
            $table->text('hh_member8')->nullable();
            $table->text('surname8')->nullable();
            $table->text('firstname8')->nullable();
            $table->text('middlename8')->nullable();
            $table->enum('gender8', ['Male', 'Female'])->nullable();
            $table->text('age8')->nullable();
            $table->string('birthdate8')->nullable();
            // HHM 9
            $table->text('hh_member9')->nullable();
            $table->text('surname9')->nullable();
            $table->text('firstname9')->nullable();
            $table->text('middlename9')->nullable();
            $table->enum('gender9', ['Male', 'Female'])->nullable();
            $table->text('age9')->nullable();
            $table->string('birthdate9')->nullable();
            // HHM 10
            $table->text('hh_member10')->nullable();
            $table->text('surname10')->nullable();
            $table->text('firstname10')->nullable();
            $table->text('middlename10')->nullable();
            $table->enum('gender10', ['Male', 'Female'])->nullable();
            $table->text('age10')->nullable();
            $table->string('birthdate10')->nullable();
            // HHM 11
            $table->text('hh_member11')->nullable();
            $table->text('surname11')->nullable();
            $table->text('firstname11')->nullable();
            $table->text('middlename11')->nullable();
            $table->enum('gender11', ['Male', 'Female'])->nullable();
            $table->text('age11')->nullable();
            $table->string('birthdate11')->nullable();
            // HHM 12
            $table->text('hh_member12')->nullable();
            $table->text('surname12')->nullable();
            $table->text('firstname12')->nullable();
            $table->text('middlename12')->nullable();
            $table->enum('gender12', ['Male', 'Female'])->nullable();
            $table->text('age12')->nullable();
            $table->string('birthdate12')->nullable();
            // HHM 13
            $table->text('hh_member13')->nullable();
            $table->text('surname13')->nullable();
            $table->text('firstname13')->nullable();
            $table->text('middlename13')->nullable();
            $table->enum('gender13', ['Male', 'Female'])->nullable();
            $table->text('age13')->nullable();
            $table->string('birthdate13')->nullable();
            // HHM 14
            $table->text('hh_member14')->nullable();
            $table->text('surname14')->nullable();
            $table->text('firstname14')->nullable();
            $table->text('middlename14')->nullable();
            $table->enum('gender14', ['Male', 'Female'])->nullable();
            $table->text('age14')->nullable();
            $table->string('birthdate14')->nullable();
            // HHM 15
            $table->text('hh_member15')->nullable();
            $table->text('surname15')->nullable();
            $table->text('firstname15')->nullable();
            $table->text('middlename15')->nullable();
            $table->enum('gender15', ['Male', 'Female'])->nullable();
            $table->text('age15')->nullable();
            $table->string('birthdate15')->nullable();
            // HHM 16
            $table->text('hh_member16')->nullable();
            $table->text('surname16')->nullable();
            $table->text('firstname16')->nullable();
            $table->text('middlename16')->nullable();
            $table->enum('gender16', ['Male', 'Female'])->nullable();
            $table->text('age16')->nullable();
            $table->string('birthdate16')->nullable();
            // HHM 17
            $table->text('hh_member17')->nullable();
            $table->text('surname17')->nullable();
            $table->text('firstname17')->nullable();
            $table->text('middlename17')->nullable();
            $table->enum('gender17', ['Male', 'Female'])->nullable();
            $table->text('age17')->nullable();
            $table->string('birthdate17')->nullable();
            // HHM 18
            $table->text('hh_member18')->nullable();
            $table->text('surname18')->nullable();
            $table->text('firstname18')->nullable();
            $table->text('middlename18')->nullable();
            $table->enum('gender18', ['Male', 'Female'])->nullable();
            $table->text('age18')->nullable();
            $table->string('birthdate18')->nullable();
            // HHM 19
            $table->text('hh_member19')->nullable();
            $table->text('surname19')->nullable();
            $table->text('firstname19')->nullable();
            $table->text('middlename19')->nullable();
            $table->enum('gender19', ['Male', 'Female'])->nullable();
            $table->text('age19')->nullable();
            $table->string('birthdate19')->nullable();
            // HHM 20
            $table->text('hh_member20')->nullable();
            $table->text('surname20')->nullable();
            $table->text('firstname20')->nullable();
            $table->text('middlename20')->nullable();
            $table->enum('gender20', ['Male', 'Female'])->nullable();
            $table->text('age20')->nullable();
            $table->string('birthdate20')->nullable();

            // End of Household Member // End of Household Member // End of Household Member // End of Household Member //

            $table->text('income_source')->nullable();
            $table->text('est_annual_income')->nullable();
            $table->text('address')->nullable();
            $table->text('sitio_purok')->nullable();
            $table->text('barangay')->nullable();
            $table->text('city')->nullable();
            $table->text('geo_coordinates')->nullable();
            $table->text('years_of_residency')->nullable();

            // MEMBERSHIP & AFFILIATIONS // MEMBERSHIP & AFFILIATIONS // MEMBERSHIP & AFFILIATIONS // MEMBERSHIP & AFFILIATIONS //
            
            // M&A 1
            $table->text('membership')->nullable();
            $table->text('position')->nullable();
            $table->integer('member_since')->nullable();
            $table->enum('status', ['ACTIVE', 'INACTIVE'])->nullable();

            // M&A 2
            $table->text('membership2')->nullable();
            $table->text('position2')->nullable();
            $table->integer('member_since2')->nullable();   
            $table->enum('status2', ['ACTIVE', 'INACTIVE'])->nullable();

            // M&A 3
            $table->text('membership3')->nullable();
            $table->text('position3')->nullable();
            $table->integer('member_since3')->nullable();
            $table->enum('status3', ['ACTIVE', 'INACTIVE'])->nullable();
           
            // M&A 4
            $table->text('membership4')->nullable();
            $table->text('position4')->nullable();
            $table->integer('member_since4')->nullable();
            $table->enum('status4', ['ACTIVE', 'INACTIVE'])->nullable();

            // M&A 5
            $table->text('membership5')->nullable();
            $table->text('position5')->nullable();
            $table->integer('member_since5')->nullable();
            $table->enum('status5', ['ACTIVE', 'INACTIVE'])->nullable();

            // AWARDS & CITATIONS // AWARDS & CITATIONS // AWARDS & CITATIONS // AWARDS & CITATIONS // AWARDS & CITATIONS //
            
            // A&C 1
            $table->text('award')->nullable();
            $table->text('awarding_body')->nullable();
            $table->string('date_received')->nullable();

            // A&C 2
            $table->text('award2')->nullable();
            $table->text('awarding_body2')->nullable();
            $table->string('date_received2')->nullable();   

            // A&C 3
            $table->text('award3')->nullable();
            $table->text('awarding_body3')->nullable();
            $table->string('date_received3')->nullable();
           
            // A&C 4
            $table->text('award4')->nullable();
            $table->text('awarding_body4')->nullable();
            $table->string('date_received4')->nullable();

            // A&C 5
            $table->text('award5')->nullable();
            $table->text('awarding_body5')->nullable();
            $table->string('date_received5')->nullable();
           
            // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS // REMARKS //

            $table->text('remarks')->nullable();

            // PARTICULARS // PARTICULARS // PARTICULARS // PARTICULARS // PARTICULARS // PARTICULARS //

            // PARTICULAR 1
            $table->text('purok')->nullable();
            $table->text('brngy')->nullable();
            $table->text('geographic_coordinates')->nullable();
            $table->text('title_no')->nullable();
            $table->text('tax_declarration_no')->nullable();
            $table->string('tenure')->nullable();
            $table->text('existing_crop')->nullable();
            $table->text('previous_crop')->nullable();
            // TOPOGRAPHY
            $table->text('hectares')->nullable();
            $table->string('land')->nullable();
            $table->text('soil_type')->nullable();
            $table->string('source')->nullable();
            // REMARKS
            $table->text('notes')->nullable();

            // PARTICULAR 2
            $table->text('purok2')->nullable();
            $table->text('brngy2')->nullable();
            $table->text('geographic_coordinates2')->nullable();
            $table->text('title_no2')->nullable();
            $table->text('tax_declarration_no2')->nullable();
            $table->string('tenure2')->nullable();
            $table->text('existing_crop2')->nullable();
            $table->text('previous_crop2')->nullable();
            // TOPOGRAPHY
            $table->text('hectares2')->nullable();
            $table->string('land2')->nullable();
            $table->text('soil_type2')->nullable();
            $table->string('source2')->nullable();
            // REMARKS2
            $table->text('notes2')->nullable();

            // PARTICULAR 3
            $table->text('purok3')->nullable();
            $table->text('brngy3')->nullable();
            $table->text('geographic_coordinates3')->nullable();
            $table->text('title_no3')->nullable();
            $table->text('tax_declarration_no3')->nullable();
            $table->string('tenure3')->nullable();
            $table->text('existing_crop3')->nullable();
            $table->text('previous_crop3')->nullable();
            // TOPOGRAPHY
            $table->text('hectares3')->nullable();
            $table->string('land3')->nullable();
            $table->text('soil_type3')->nullable();
            $table->string('source3')->nullable();
            // REMARKS
            $table->text('notes3')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archived_registries');
    }
};
