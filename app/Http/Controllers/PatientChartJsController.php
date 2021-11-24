<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PatientChartJsController extends Controller
{
    
    public function index(Request $request, $id){
        
        //параметр получается из GET-запроса
        $param=$request->query('param');
        
        //выбор из базы количества записей по каждому параметру и их группировка
        $record=DB::table('followups')
            ->select("$param")
            ->where('patientid',$id)
            ->pluck("$param")->all();
        
        $chart= new Chart;
        $chart->labels=(array_keys($record));
        $chart->dataset=(array_values($record));
         
        //выбор щаголовка в зависимости от параметра
        switch ($param){
            case 'bmi':
                $title='Dynamics of BMI';
                break;
            case 'ew':
                $title='Dynamics of excessive weight';
                break;
            case 'percentewl':
                $title='Dynamics of %EWL';
                break;
            case 'percentbmil':
                $title='Dynamics of %BMIL';
                break;
            case 'percentebmil':
                $title='Dynamics of %EBMIL';
                break;
            case 'percenttwl':
                $title='Dynamics of %TWL';
                break;
            case 'neck':
                $title='Dynamics of neck circumference';
                break;
            case 'ejfract':
                $title='Dynamics of ejection fraction';
                break;
            case 'wbc':
                $title='Dynamics of WBC';
                break;
            case 'rbc':
                $title='Dynamics of RBC';
                break;
            case 'hgb':
                $title='Dynamics of hemoglobine level';
                break;
            case 'plt':
                $title='Dynamics of PLT';
                break;
            case 'gluc':
                $title='Dynamics of glucose level';
                break;
            case 'tbil':
                $title='Dynamics of total bilirubine level';
                break;
            case 'dbil':
                $title='Dynamics of direct bilirubine level';
                break;
            case 'tprot':
                $title='Dynamics of total proteine level';
                break;
            case 'ast':
                $title='Dynamics of AST level';
                break;
            case 'alt':
                $title='Dynamics of ALT level';
                break;
            case 'na':
                $title='Dynamics of sodium level';
                break;
            case 'k':
                $title='Dynamics of potassium level';
                break;
            case 'ca':
                $title='Dynamics of total calcium level';
                break;
            case 'cl':
                $title='Dynamics of cloride level';
                break;
            case 'chol':
                $title='Dynamics of total cholesterol level';
                break;
            case 'rbc':
                $title='Dynamics of Dynamics of trigliceride level';
                break;
            case 'ldl':
                $title='Dynamics of LDL-cholesterol level';
                break;
            case 'hdl':
                $title='Dynamics of HDL-cholesterol level';
                break;
            case 'sad':
                $title='Dynamics of systolic arterial pressure level';
                break;
            case 'dad':
                $title='Dynamics of diastolic arterial pressure level';
                break;
            default:
                $title='Dynamics of '.$param;
        }
        
        //выбор типа диаграммы - для динамики показателей тип line
        $type='line';
        
        //передача данных, типа и заголовка представлению
        return view('chart', compact('chart','title','type'));
    }
}
