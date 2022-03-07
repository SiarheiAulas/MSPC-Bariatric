<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PrimaryDataStoreRequest;
use App\Http\Requests\PrimaryDataUpdateRequest;
use App\Models\Patient;
use App\Models\Followup;
use Illuminate\Support\Facades\DB;

//CRUD контроллер таблицы `patients`
class PrimaryDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients=Patient::paginate(50);
        return view('main', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createpatient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PrimaryDataStoreRequest $request) {
        
        //правила валидации в классе запроса
        $validated=$request->validated();
        
        $patient=new Patient();
        
        //получение данных из GET-запроса
        $patient->id=$request->input('id');
        $patient->surname=$request->input('surname');  
        $patient->firstname=$request->input('firstname');  
        $patient->lastname=$request->input('lastname');  
        $patient->sex=$request->input('sex');  
        $patient->phone=$request->input('phone');  
        $patient->country=$request->input('country');  
        $patient->adress=$request->input('adress');  
        $patient->diagnosis=$request->input('diagnosis');  
        $patient->describediagnosis=$request->input('describediagnosis');  
        $patient->birthdate=$request->input('birthdate');  
        $patient->age=$request->input('age');  
        $patient->surgery=$request->input('surgery');  
        $patient->surgerytype=$request->input('surgerytype');
        
        //заполнение полей таблицы на основе пользовательского ввода для последующего вывода в отчет IFSO
        if($patient->surgery=='lagb'){
            $patient->bandedprocedure=1;
        }else{
            $patient->bandedprocedure=0;
        }

        switch($patient->surgery){
            case 'gp':
                $patient->detailsofotherprocedure=1;
                break;
            case 'sadi':
                $patient->detailsofotherprocedure=2;
                break;
            case 'vbd':
                $patient->detailsofotherprocedure=3;
                break;
            default:
                $patient->detailsofotherprocedure=9;
                break;
        }
        
        switch ($patient->surgery){
            case 'lagb':
                $patient->typeofoperation=1;
                break;
            case 'lsg':
                $patient->typeofoperation=3;
                break;
            case 'ds':
                $patient->typeofoperation=4;
                break;
            case 'ds+lsg':
                $patient->typeofoperation=5;
                break;
            case 'bpd':
                $patient->typeofoperation=6;
                break;
            case 'rygb':
                $patient->typeofoperation=7;
                break;
            case 'mgb':
                $patient->typeofoperation=8;
                break;
            default:
                $patient->typeofoperation=9;
                break;                
        }
        
        $patient->bleedwithin30daysofsurgery=$request->input('bleedwithin30daysofsurgery');
        $patient->fundingcategory=$request->input('fundingcategory');
        $patient->hasthepatienthadapriorgastricbaloon=$request->input('hasthepatienthadapriorgastricbaloon');
        $patient->hasthepatienthadbariatricsurgeryinthepast=$request->input('hasthepatienthadbariatricsurgeryinthepast');
        $patient->increasedriskofdvtorpe=$request->input('increasedriskofdvtorpe');
        $patient->leakwithin30daysofsurgery=$request->input('leakwithin30daysofsurgery');
        $patient->obstructionwithin30daysofsurgery=$request->input('obstructionwithin30daysofsurgery');
        $patient->operativeapproach=$request->input('operativeapproach');
        $patient->patientstatusatdischarge=$request->input('patientstatusatdischarge');
        $patient->reoperationwithin30daysofsurgery=$request->input('reoperationwithin30daysofsurgery');
        $patient->simultaneous=$request->input('simultaneous');  
        $patient->describesurgery=$request->input('describesurgery');  
        $patient->surgerydate=$request->input('surgerydate');  
        $patient->dischargedate=$request->input('dischargedate');  
        $patient->surgeryduration=$request->input('surgeryduration');  
        $patient->height=$request->input('height');  
        $patient->complicated=$request->input('complicated');  
        $patient->describecomplications=$request->input('describecomplications');
        
        //расчет риска по формуле логит-регрессии из диссертации
        define('A', 22.85029); //константа
        define('B_CL', -0.40768);//коэффициент корреляции для гемоглобина
        define('B_HGB', 0.11387); //коэффициент корреляции для гемоглобина
        //формула классификации из диссертации (уравнение логит-регрессии)- функция-переключатель:сигмоида
        $p=1/(1+exp(-(A+($request->input('cl')*B_CL)+($request->input('hgb')*B_HGB))));
        
        if(!$request->input('hgb')||!$request->input('cl')){
            $patient->risk='not defined';
        }elseif($p>0.5){
            $patient->risk='high';
        }else{
            $patient->risk='low';
        }
        
        $patient->save();
        return redirect()->route('patients.index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //получение данных пациента из таблицы `patients`
        $patient=Patient::find($id);
        //и получение данных всех его осмотров из таблицы `followups`
        $flwups=Followup::all()->where('patientid', $id);
        //передача данных представлению
        return view('patient', compact('patient','flwups'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //получить данные пациента по id
        $patient=Patient::find($id);
        // и передать их форме радактирования
        return view('editpatient', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PrimaryDataUpdateRequest $request, $id)
    {
        //правила валидации в классе запроса PrimaryDataUpdateRequest
        $validated=$request->validated();
        
        $patient=Patient::find($id);
        
        //получить данные из GET-запроса и записать их в свойства экземпляра класса, найденного по id
        $patient->id=$request->input('id');  
        $patient->surname=$request->input('surname');  
        $patient->firstname=$request->input('firstname');  
        $patient->lastname=$request->input('lastname');  
        $patient->sex=$request->input('sex');  
        $patient->phone=$request->input('phone');  
        $patient->country=$request->input('country');  
        $patient->adress=$request->input('adress');  
        $patient->diagnosis=$request->input('diagnosis');  
        $patient->describediagnosis=$request->input('describediagnosis');  
        $patient->birthdate=$request->input('birthdate');  
        $patient->age=$request->input('age');  
        $patient->surgery=$request->input('surgery');  
        $patient->surgerytype=$request->input('surgerytype');
        
        //заполнение полей на основе пользовательского ввода
        if($patient->surgery=='lagb'){
            $patient->bandedprocedure=1;
        }else{
            $patient->bandedprocedure=0;
        }

        switch($patient->surgery){
            case 'gp':
                $patient->detailsofotherprocedure=1;
                break;
            case 'sadi':
                $patient->detailsofotherprocedure=2;
                break;
            case 'vbg':
                $patient->detailsofotherprocedure=3;
                break;
            default:
                $patient->detailsofotherprocedure=9;
                break;
        }
        
        switch ($patient->surgery){
            case 'lagb':
                $patient->typeofoperation=1;
                break;
            case 'lsg':
                $patient->typeofoperation=3;
                break;
            case 'ds':
                $patient->typeofoperation=4;
                break;
            case 'ds+lsg':
                $patient->typeofoperation=5;
                break;
            case 'bpd':
                $patient->typeofoperation=6;
                break;
            case 'rygb':
                $patient->typeofoperation=7;
                break;
            case 'mgb':
                $patient->typeofoperation=8;
                break;
            default:
                $patient->typeofoperation=9;
                break;                
        }
        
        $patient->bleedwithin30daysofsurgery=$request->input('bleedwithin30daysofsurgery');
        $patient->fundingcategory=$request->input('fundingcategory');
        $patient->hasthepatienthadapriorgastricbaloon=$request->input('hasthepatienthadapriorgastricbaloon');
        $patient->hasthepatienthadbariatricsurgeryinthepast=$request->input('hasthepatienthadbariatricsurgeryinthepast');
        $patient->increasedriskofdvtorpe=$request->input('increasedriskofdvtorpe');
        $patient->leakwithin30daysofsurgery=$request->input('leakwithin30daysofsurgery');
        $patient->obstructionwithin30daysofsurgery=$request->input('obstructionwithin30daysofsurgery');
        $patient->operativeapproach=$request->input('operativeapproach');
        $patient->patientstatusatdischarge=$request->input('patientstatusatdischarge');
        $patient->reoperationwithin30daysofsurgery=$request->input('reoperationwithin30daysofsurgery');
        $patient->simultaneous=$request->input('simultaneous');  
        $patient->describesurgery=$request->input('describesurgery');  
        $patient->surgerydate=$request->input('surgerydate');  
        $patient->dischargedate=$request->input('dischargedate');  
        $patient->surgeryduration=$request->input('surgeryduration');  
        $patient->height=$request->input('height');  
        $patient->complicated=$request->input('complicated');  
        $patient->describecomplications=$request->input('describecomplications');
        
        define('A', 22.85029);
        define('B_CL', -0.40768);
        define('B_HGB', 0.11387);
        $p=1/(1+exp(-(A+($request->input('cl')*B_CL)+($request->input('hgb')*B_HGB))));
        
        if($p>0.5){
            $patient->risk='high';
        }else{
            $patient->risk='low';
        }  
        
        $patient->save();
        
        return redirect()->route('patients.show',['patient'=>$patient]);
        
    }
    
    //простой поиск в бд значений, полностью совпадающих с запросом- используется для поиска по номеру истории
    public function search(Request $request){
        $patientid=$request->input('search');
        $patients=DB::table('patients')->where('id', $patientid)->paginate(50);
        return view('main', compact('patients'));
        }
    
    //полнотекстовый поиск на движке algolia, модель реализует трейт Searcheable
    public function search_name(Request $request){
        $patient_name=$request->input('search');
        $patients=Patient::search($patient_name)->paginate(50);
        //возвращает данные шаблону main
        return view('main', compact('patients'));
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient=Patient::find($id);
        $patient->delete();
        return redirect()->route('patients.index');
    }
}