<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licences', function (Blueprint $table) {
            $table->id();
            $table->string('address')->nullable();
            $table->string('countryLogo')->nullable();
            $table->string('email')->nullable();
            $table->string('fax')->nullable();
            $table->string('licenseLevel')->nullable();
            $table->string('licenseLogo')->nullable();
            $table->string('licenseName')->nullable();
            $table->string('organizationName')->nullable();
            $table->string('registrationCode')->nullable();
            $table->string('regulatoryEffectiveTime')->nullable();
            $table->string('regulatoryLicense')->nullable();
            $table->string('tel')->nullable();
            $table->string('website')->nullable();

            $table->integer('licenseScore')->default(0);
            $table->integer('platformMerchantsId')->default(0);
            $table->integer('plid')->default(0);
            $table->integer('regulatoryNumber')->default(0);
            $table->integer('status')->default(1);
           
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
        Schema::dropIfExists('licences');
    }
}
