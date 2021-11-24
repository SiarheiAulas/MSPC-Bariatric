<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function(Blueprint $table){
            $table->integer('id')->unique();
            $table->string('surname');
            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->string('sex');
            $table->string('phone')->nullable();
            $table->string('country');
            $table->text('adress')->nullable();
            $table->integer('diagnosis');
            $table->text('describediagnosis');
            $table->date('birthdate');
            $table->integer('age');
            $table->string('risk')->nullable();
            $table->string('surgery')->nullable();
            $table->string('surgerytype')->nullable();
            $table->integer('bandedprocedure');
            $table->integer('simultaneous')->nullable();
            $table->text('describesurgery')->nullable();
            $table->date('surgerydate')->nullable();
            $table->date('dischargedate');
            $table->integer('surgeryduration')->nullable();
            $table->integer('detailsofotherprocedure');
            $table->integer('height')->nullable();
            $table->integer('complicated')->nullable();
            $table->text('describecomplications')->nullable();
            $table->integer('bleedwithin30daysofsurgery')->default(0);
            $table->integer('fundingcategory')->default(2);
            $table->integer('hasthepatienthadapriorgastricbaloon')->default(0);
            $table->integer('hasthepatienthadbariatricsurgeryinthepast')->default(0);
            $table->integer('increasedriskofdvtorpe')->default(0);
            $table->integer('leakwithin30daysofsurgery')->default(0);
            $table->integer('obstructionwithin30daysofsurgery')->default(0);
            $table->integer('operativeapproach')->default(1);
            $table->integer('patientstatusatdischarge')->default(0);
            $table->integer('reoperationwithin30daysofsurgery')->default(0);
            $table->integer('typeofoperation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
