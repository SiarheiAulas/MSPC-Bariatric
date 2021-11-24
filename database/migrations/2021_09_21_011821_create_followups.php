<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patientid');
            $table->date('date');
            $table->float('weight')->default(0);
            $table->float('bmi')->nullable();
            $table->float('ibw')->nullable();
            $table->float('ew')->nullable();
            $table->float('percentewl')->nullable();
            $table->float('percentbmil')->nullable();
            $table->float('percentebmil')->nullable();
            $table->float('percenttwl')->nullable();
            $table->float('neck')->nullable();
            $table->integer('ejfract')->nullable();
            $table->text('jointpath')->nullable();
            $table->float('wbc')->nullable();
            $table->float('hgb')->nullable();
            $table->float('gluc')->nullable();
            $table->float('tbil')->nullable();
            $table->float('dbil')->nullable();
            $table->float('tprot')->nullable();
            $table->float('albumine')->nullable();
            $table->float('amylase')->nullable();
            $table->float('ast')->nullable();
            $table->float('alt')->nullable();
            $table->float('na')->nullable();
            $table->float('k')->nullable();
            $table->float('ca')->nullable();
            $table->float('cl')->nullable();
            $table->float('trig')->nullable();
            $table->float('chol')->nullable();
            $table->float('ldl')->nullable();
            $table->float('hdl')->nullable();
            $table->string('proteinuria')->nullable();
            $table->float('rbc')->nullable();
            $table->float('plt')->nullable();
            $table->integer('sad')->nullable();
            $table->integer('dad')->nullable();
            $table->text('endo')->nullable();
            $table->text('us')->nullable();
            $table->text('polysomno')->nullable();
            $table->text('ct')->nullable();
            $table->integer('arthyper')->default(0);
            $table->integer('dm')->default(0);
            $table->integer('nash')->default(0);
            $table->integer('malabs')->default(0);
            $table->text('medication')->nullable();
            $table->string('nsurgery')->nullable();
            $table->text('describensurgery')->nullable();
            $table->integer('nsurgeryduration')->nullable();
            $table->date('nsurgerydate')->nullable();
            $table->integer('ncomplicated')->default('0');
            $table->text('describencomplication')->nullable();
            $table->integer('confirmedsleepapnoea')->default(0);
            $table->integer('depressiononmedication')->default(0);
            $table->integer('dyslipidemiaonmedication')->default(0);
            $table->integer('gerdgord')->default(0);
            $table->integer('isprimaryflw');
            $table->integer('musculoskeletalpainonmedication')->default(0);
            $table->integer('patientstatus');
            $table->integer('typeofdiabetesmedication')->nullable();
            $table->text('sf36_pf')->nullable();
            $table->text('sf36_rp')->nullable();
            $table->text('sf36_bp')->nullable();
            $table->text('sf36_gh')->nullable();
            $table->text('sf36_vt')->nullable();
            $table->text('sf36_sf')->nullable();
            $table->text('sf36_re')->nullable();
            $table->text('sf36_mh')->nullable();
            $table->text('sf36_ph')->nullable();
            $table->text('sf36_meh')->nullable();
            $table->text('debq_restrained')->nullable();
            $table->text('debq_emotional')->nullable();
            $table->text('debq_external')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('followups');
    }
}
