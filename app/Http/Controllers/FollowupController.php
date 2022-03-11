<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FollowupStoreRequest;
use App\Http\Requests\FollowupUpdateRequest;
use App\Models\Followup;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;

//CRUD контроллер для таблицы `followups`
class FollowupController extends Controller
{
//получение всех данных модели Followup
 public function index()
    {
     //по 50 на страницу
       $flwups=Followup::paginate(50);
     //передает все данный представлению patient
        return view('patient', compact('flwups'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *
     * показывает форму добавления нового осмотра 
     **/
    public function create(Request $request)
    {   
        $ptid=$request->input('param');
        return view('createfollowup', compact('ptid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * добавление новой записи в базу
     * получает данные из запроса
     */
    public function store(FollowupStoreRequest $request)
    {
        //данные валидизируются, правила валидации в класса запроса
        $validated=$request->validated();
        
        //новый объект класса
        $followup=new Followup();
        
        //получение данных из GET-запроса
        $followup->patientid=$request->input('patientid');
        $followup->date=$request->input('date');
        $followup->weight=$request->input('weight');
       
        //получаем из таблицы patients значение роста для данного пациента (по его id), которое в дальнейшем будет считаться неизменным. 
        $patient=Patient::where('id', $request->input('patientid'))->first();
        $h=$patient->height;
        
        //расчет ИМТ
        $followup->bmi=$request->input('weight')/pow(($h/100),2);
        
        // ideal body weight (bmi=25)
        $followup->ibw=25*pow(($h/100),2);
        
        //excessive weight
        $followup->ew=$request->input('weight')-$followup->ibw;
        
        //%EWL
        //1)get initial weight or return current if it is 1st record
        $wt=$request->input('weight');
        $initial=Followup::where('patientid',$request->input('patientid'))->firstOr(function () use($wt){
            return $wt;
        });
        
        if (is_numeric($initial)){
            $initialweight=$initial;
        }else{
            $initialweight=$initial->weight;
        }
        
        //2)calculate %EWL
        $followup->percentewl=100*(($initialweight-$request->input('weight'))/($initialweight-$followup->ibw));
        
        //%BMIL
        //1) get initial BMI
        $bmi=$followup->bmi;
        $initialbmindex=Followup::where('patientid',$request->input('patientid'))->firstOr(function () use($bmi){
            return $bmi;
        });
        
        if (is_numeric($initialbmindex)){
            $initialbmi=$initialbmindex;
        }else{
            $initialbmi=$initialbmindex->bmi;
        }
        //calculate %BMIL
        $followup->percentbmil=100*(($initialbmi-$followup->bmi)/$initialbmi);
        
        //$EBMIL
        $followup->percentebmil=100*(($initialbmi-$followup->bmi)/($initialbmi-25));
        
        //%TWL
        $followup->percenttwl=100*(($initialweight-$followup->weight)/$initialweight);
        
        //на случай, если в follow up нет данных о весе
        if(!$followup->weight){
            $followup->bmi=null;
            $followup->percentewl=null;
            $followup->ew=null;
            $followup->percentbmil=null;
            $followup->percentebmil=null;
            $followup->percenttwl=null;
        }
      
        //здесь все получаем из GET- запроса
        $followup->neck=$request->input('neck');
        $followup->sad=$request->input('sad');
        $followup->dad=$request->input('dad');
        $followup->ejfract=$request->input('ejfract');
        $followup->jointpath=$request->input('jointpath');
        $followup->wbc=$request->input('wbc');
        $followup->rbc=$request->input('rbc');
        $followup->hgb=$request->input('hgb');
        $followup->plt=$request->input('plt');
        $followup->gluc=$request->input('gluc');
        $followup->tbil=$request->input('tbil');
        $followup->dbil=$request->input('dbil');
        $followup->tprot=$request->input('tprot');
        $followup->albumine=$request->input('albumine');
        $followup->amylase=$request->input('amylase');
        $followup->ast=$request->input('ast');
        $followup->alt=$request->input('alt');
        $followup->na=$request->input('na');
        $followup->k=$request->input('k');
        $followup->ca=$request->input('ca');
        $followup->ca_ion=$request->input('ca_ion');
        $followup->cl=$request->input('cl');
        $followup->trig=$request->input('trig');
        $followup->chol=$request->input('chol');
        $followup->ldl=$request->input('ldl');
        $followup->hdl=$request->input('hdl');
        $followup->proteinuria=$request->input('proteinuria');
        $followup->endo=$request->input('endo');
        $followup->us=$request->input('us');
        $followup->polysomno=$request->input('polysomno');
        $followup->ct=$request->input('ct');
        
        //заполняется поле АГ автоматически по значению САД и ДАД
        if ($request->input('sad')>=130||$request->input('dad')>=90){
            $followup->arthyper=1;
        }else {
            $followup->arthyper=0;
        }
        
        $followup->dm=$request->input('dm');
        $followup->nash=$request->input('nash');
        $followup->malabs=$request->input('malabs');
        $followup->medication=$request->input('medication');
        $followup->nsurgery=$request->input('nsurgery');
        $followup->describensurgery=$request->input('describensurgery');
        $followup->nsurgeryduration=$request->input('nsurgeryduration');
        $followup->nsurgerydate=$request->input('nsurgerydate');
        $followup->ncomplicated=$request->input('ncomplicated');
        $followup->describencomplication=$request->input('describencomplication');
        $followup->confirmedsleepapnoea=$request->input('confirmedsleepapnoea');
        $followup->depressiononmedication=$request->input('depressiononmedication');
        $followup->dyslipidemiaonmedication=$request->input('dyslipidemiaonmedication');
        $followup->gerdgord=$request->input('gerdgord');
        $followup->isprimaryflw=$request->input('isprimaryflw');
        $followup->musculoskeletalpainonmedication=$request->input('musculoskeletalpainonmedication');
        $followup->patientstatus=$request->input('patientstatus');
        $followup->typeofdiabetesmedication=$request->input('typeofdiabetesmedication');
        
        //поля временно не используются
        $followup->sf36_pf=$request->input('sf36_pf');
        $followup->sf36_rp=$request->input('sf36_rp');
        $followup->sf36_bp=$request->input('sf36_bp');
        $followup->sf36_gh=$request->input('sf36_gh');
        $followup->sf36_vt=$request->input('sf36_vt');
        $followup->sf36_sf=$request->input('sf36_sf');
        $followup->sf36_re=$request->input('sf36_re');
        $followup->sf36_mh=$request->input('sf36_mh');
        $followup->sf36_ph=$request->input('sf36_ph');
        $followup->sf36_meh=$request->input('sf36_meh');
        $followup->debq_restrained=$request->input('debq_restrained');
        $followup->debq_emotional=$request->input('debq_emotional');
        $followup->debq_external=$request->input('debq_external');

        $followup->save();
        
        //для сохранения значений в полях формы после редиректа
        return redirect()->route('patients.show',['patient'=>$followup->patientid]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //получает объект класса по id пациента
        $flwup=Followup::find($id);
        //и передает в форму редактирования
        return view('editfollowup', compact('flwup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FollowupUpdateRequest $request, $id)
    {
        $validated=$request->validated();
        
        $followup=Followup::find($id);
        
        $followup->patientid=$request->input('patientid');
        $followup->date=$request->input('date');
        $followup->weight=$request->input('weight');
       
        //получаем из таблицы patients значение роста для данного пациента (по его id), которое в дальнейшем будет считаться неизменным. 
        $patient=Patient::where('id', $request->input('patientid'))->first();
        $h=$patient->height;
        $followup->bmi=$request->input('weight')/pow(($h/100),2);
        
        // ideal body weight (bmi=25)
        $followup->ibw=25*pow(($h/100),2);
        
        //excessive weight
        $followup->ew=$request->input('weight')-$followup->ibw;
        
        //%EWL
        //1)get initial weight or return current if it is 1st record
        $wt=$request->input('weight');
        $initial=Followup::where('patientid',$request->input('patientid'))->firstOr(function () use($wt){
            return $wt;
        });
        
        if (is_numeric($initial)){
            $initialweight=$initial;
        }else{
            $initialweight=$initial->weight;
        }
        
        //2)calculate %EWL
        $followup->percentewl=100*(($initialweight-$request->input('weight'))/($initialweight-$followup->ibw));
        
        //%BMIL
        //1) get initial BMI
        $bmi=$followup->bmi;
        $initialbmindex=Followup::where('patientid',$request->input('patientid'))->firstOr(function () use($bmi){
            return $bmi;
        });
        
        if (is_numeric($initialbmindex)){
            $initialbmi=$initialbmindex;
        }else{
            $initialbmi=$initialbmindex->bmi;
        }
        //calculate %BMIL
        $followup->percentbmil=100*(($initialbmi-$followup->bmi)/$initialbmi);
        
        //$EBMIL
        $followup->percentebmil=100*(($initialbmi-$followup->bmi)/($initialbmi-25));
        
        //%TWL
        $followup->percenttwl=100*(($initialweight-$followup->weight)/$initialweight);
      
        $followup->neck=$request->input('neck');
        $followup->sad=$request->input('sad');
        $followup->dad=$request->input('dad');
        $followup->ejfract=$request->input('ejfract');
        $followup->jointpath=$request->input('jointpath');
        $followup->wbc=$request->input('wbc');
        $followup->rbc=$request->input('rbc');
        $followup->hgb=$request->input('hgb');
        $followup->plt=$request->input('plt');
        $followup->gluc=$request->input('gluc');
        $followup->tbil=$request->input('tbil');
        $followup->dbil=$request->input('dbil');
        $followup->tprot=$request->input('tprot');
        $followup->albumine=$request->input('albumine');
        $followup->amylase=$request->input('amylase');
        $followup->ast=$request->input('ast');
        $followup->alt=$request->input('alt');
        $followup->na=$request->input('na');
        $followup->k=$request->input('k');
        $followup->ca=$request->input('ca');
        $followup->ca_ion=$request->input('ca_ion');
        $followup->cl=$request->input('cl');
        $followup->trig=$request->input('trig');
        $followup->chol=$request->input('chol');
        $followup->ldl=$request->input('ldl');
        $followup->hdl=$request->input('hdl');
        $followup->proteinuria=$request->input('proteinuria');
        $followup->endo=$request->input('endo');
        $followup->us=$request->input('us');
        $followup->polysomno=$request->input('polysomno');
        $followup->ct=$request->input('ct');
        
        if ($request->input('sad')>=130||$request->input('dad')>=90){
            $followup->arthyper=1;
        }else {
            $followup->arthyper=0;
        }
        
        $followup->dm=$request->input('dm');
        $followup->nash=$request->input('nash');
        $followup->malabs=$request->input('malabs');
        $followup->medication=$request->input('medication');
        $followup->nsurgery=$request->input('nsurgery');
        $followup->describensurgery=$request->input('describensurgery');
        $followup->nsurgeryduration=$request->input('nsurgeryduration');
        $followup->nsurgerydate=$request->input('nsurgerydate');
        $followup->ncomplicated=$request->input('ncomplicated');
        $followup->describencomplication=$request->input('describencomplication');
        $followup->confirmedsleepapnoea=$request->input('confirmedsleepapnoea');
        $followup->depressiononmedication=$request->input('depressiononmedication');
        $followup->dyslipidemiaonmedication=$request->input('dyslipidemiaonmedication');
        $followup->gerdgord=$request->input('gerdgord');
        $followup->isprimaryflw=$request->input('isprimaryflw');
        $followup->musculoskeletalpainonmedication=$request->input('musculoskeletalpainonmedication');
        $followup->patientstatus=$request->input('patientstatus');
        $followup->typeofdiabetesmedication=$request->input('typeofdiabetesmedication');
        
        //поля пока не используются
        $followup->sf36_pf=$request->input('sf36_pf');
        $followup->sf36_rp=$request->input('sf36_rp');
        $followup->sf36_bp=$request->input('sf36_bp');
        $followup->sf36_gh=$request->input('sf36_gh');
        $followup->sf36_vt=$request->input('sf36_vt');
        $followup->sf36_sf=$request->input('sf36_sf');
        $followup->sf36_re=$request->input('sf36_re');
        $followup->sf36_mh=$request->input('sf36_mh');
        $followup->sf36_ph=$request->input('sf36_ph');
        $followup->sf36_meh=$request->input('sf36_meh');
        $followup->debq_restrained	=$request->input('debq_restrained	');
        $followup->debq_emotional=$request->input('debq_emotional');
        $followup->debq_external=$request->input('debq_external');

        $followup->save();
        
        return redirect()->route('patients.show',['patient'=>$followup->patientid]);
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flw=Followup::find($id);
        $flw->delete();
        return back();
    }
}