<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Followup;

class CsvController extends Controller
{
    //Multichoise separator (по спецификациям IFSO)- нужен для генерации отчета
    public $s=';';
    
    //Layout specification version (по спецификациям IFSO)
    public $specversion='6.0';
    
    //Submitter code for our center
    public $submitcode='BLR-A';
    
    //выводит на экран csv таблицу
    public function baseline(){
        // шапка отчета по спецификацям IFSO (файл baseline)
        echo 'S	SPECVERSION	SUBMITCODE	IMPORTLINKID	DEMOGID	DEMOGDATEOFBIRTH	AGEATOPERATION	BANDEDPROCEDURE	BLEEDWITHIN30DAYSOFSURGERY	CONFIRMEDSLEEPAPNOEA	DATEOFDISCHARGEORDEATH	DATEOFOPERATION	DEPRESSIONONMEDICATION	DETAILSOFOTHERPROCEDURE	DYSLIPIDAEMIAONMEDICATION	FUNDINGCATEGORY	GENDER	GERDGORD	HASTHEPATIENTHADAPRIORGASTRICBALLOON	HASTHEPATIENTHADBARIATRICSURGERYINTHEPAST	HEIGHT	HYPERTENSIONONMEDICATION	INCREASEDRISKOFDVTORPE	LEAKWITHIN30DAYSOFSURGERY	MUSCULOSKELETALPAINONMEDICATION	OBSTRUCTIONWITHIN30DAYSOFSURGERY	OPERATIVEAPPROACH	PATIENTSTATUSATDISCHARGE	REOPERATIONWITHIN30DAYSOFSURGERY	TYPE2DIABETES	TYPEOFDIABETESMEDICATION	TYPEOFOPERATION	WEIGHTATSURGERY	WEIGHTONENTRYTOTHEWEIGHTLOSSPROGRAM<br>';
        
        //получаем данные из таблицы `patients`
        $patients=Patient::all();
        
        //для каждого пациента генерируется строка по спецификациям IFSO
        foreach ($patients as $patient){
            //Дата первичного обращения нужна для получения только первой записи из таблицы `followups`, где первая запись является первичной для пациента. При этом допускается, что дата операции является датой первичного обращения
            $date=$patient->surgerydate;
            
            //для выбора записей по id пациента
            $id=$patient->id;
            
            //получаем первичную информацию о пациенте из таблицы `followups` с использованием id пациента и даты первичного обращения 
            $followup=Followup::where([['patientid',$id],['date',$date]])->first();
            
            //получение данных из модели, @ для отключения ошибки чтения несуществующего ключа массива
            @$weight=$followup->weight;
            
            //посмотрим, может это и не нужно делать для отчета
            if (!$weight){
                $weight='';
            }
            
            //строка для каждого пациента в файле baseline. IMPORTLINKID и DEMOGID в базе не хранятся и получаются путем объединения строк id и даты (после предварительного удаления из даты символов "-")
            $line=$this->s.' '.$this->specversion.' '.$this->submitcode.' '
                .$patient->id.str_replace('-','',$patient->surgerydate).' '
                .$patient->id.str_replace('-','',$patient->birthdate).' '
                .$patient->birthdate.' '
                .$patient->age.' '
                .$patient->bandedprocedure.' '
                .$patient->bleedwithin30daysofsurgery.' '
                .@$followup->confirmedsleepapnoea.' '
                .$patient->dischargedate.' '
                .$patient->surgerydate.' '
                .@$followup->depressiononmedication.' '
                .$patient->detailsofotherprocedure.' '
                .@$followup->dyslipidemiaonmedication.' '
                .$patient->fundingcategory.' '
                .$patient->sex.' '
                .@$followup->gerdgord.' '
                .$patient->hasthepatienthadapriorgastricbaloon.' '
                .$patient->hasthepatienthadbariatricsurgeryinthepast.' '
                .$patient->height.' '
                .@$followup->arthyper.' '
                .$patient->increasedriskofdvtorpe.' '
                .$patient->leakwithin30daysofsurgery.' '
                .@$followup->musculoskeletalpainonmedication.' '
                .$patient->obstructionwithin30daysofsurgery.' '
                .$patient->operativeapproach.' '
                .$patient->patientstatusatdischarge.' '
                .$patient->reoperationwithin30daysofsurgery.' '
                .@$followup->dm.' '
                .@$followup->typeofdiabetesmedication.' '
                .$patient->typeofoperation.' '
                .$weight.' '
                .$weight.'<br>';
            echo $line;
        }
    }
    
    public function followup(){
        // шапка отчета по спецификацям IFSO (файл followup)
        echo ';	SPECVERSION	SUBMITCODE	IMPORTLINKID	CLINICALEVIDENCEOFMALNUTRITION	CONFIRMEDSLEEPAPNOEA	DATEOFFOLLOWUP	DEPRESSIONONMEDICATION	DYSLIPIDAEMIAONMEDICATION	GERDGORD	HYPERTENSIONONMEDICATION	ISPRIMARYFLW	MUSCULOSKELETALPAINONMEDICATION	PATIENTSTATUS	TYPE2DIABETESONMEDICATION	TYPEOFDIABETESMEDICATION	WEIGHT<br>';
        $patients=Patient::all();
        foreach ($patients as $patient){
            $date=$patient->surgerydate;
            $id=$patient->id;
            //получение данных из модели по id и дате обращения. При этом датой первичного обращения считается дата операции, выбираются все записи с датой обращения большей, чем дата операции.
            $followups=Followup::where('patientid',$id)->where('date', '>', $date)->get();
            foreach ($followups as $flw){
                $line=$this->s.' '.$this->specversion.' '.$this->submitcode.' '
                    .$patient->id.str_replace('-','',$patient->surgerydate).' '
                    .$flw->malabs.' '
                    .$flw->confirmedsleepapnoea.' '
                    .$flw->date.' '
                    .$flw->depressiononmedication.' '
                    .$flw->dyslipidemiaonmedication.' '
                    .$flw->gerdgord.' '
                    .$flw->arthyper.' '
                    .$flw->isprimaryflw.' '
                    .$flw->musculoskeletalpainonmedication.' '
                    .$flw->patientstatus.' '
                    .$flw->dm.' '
                    .$flw->typeofdiabetesmedication.' '
                    .$flw->weight.'<br>';
                echo $line;
            }
        }
    }
}
