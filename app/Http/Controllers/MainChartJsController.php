<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MainChartJsController extends Controller
{
    public function index(Request $request){
        
        //получение параметра из GET-запроса
        $param=$request->query('param');
        
        //запрос к базе для подсчета количества записей с соответствующим параметром и группировкой по параметру
        $record=DB::table('patients')
            ->select("$param", \DB::raw("COUNT(*) as count"))
            ->groupBy("$param")
            ->pluck('count',"$param")->all();
        
        $chart= new Chart;
        $chart->labels=(array_keys($record));
        $chart->dataset=(array_values($record));
        
        //генерация рандомного цвета для каждой группы в диаграмме
        for ($i=0; $i<=count($record); $i++){
            $colors[]='#'.substr(str_shuffle('ABCDEF123456789'), 0, 6);
        }
        
        $chart->colors=$colors;
        
        //генерация заглавия диаграммы
        switch ($param){
            case 'sex':
                $title='Structure by gender';
                break;
            case 'diagnosis':
                $title='Structure by obesity grade';
                break;
            case 'surgery':
                $title='Structure bysurgery type';
                break;
            case 'complicated':
                $title='Structure by postoperative complications';
                break;
            default:
                $title='Structure by '.$param;
            }
        
        //выбор типа диаграммы
        if($param==='sex'||$param==='diagnosis'||$param==='surgery'||$param==='complicated'||$param==='risk'){
            $type='pie';
        }else{
            $type='bar';
        };
        
        //передача данных, заголовка и типа диаграммы представлению
        return view('chart', compact('chart','title','type'));
        
    }
}
