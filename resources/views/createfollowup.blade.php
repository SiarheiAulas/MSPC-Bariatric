@extends('layout')
@section('content')
    <h2>Add follow up data</h2>
    <!-- отображение ошибок валидации формы при их наличии. Правила валидации в классе запроса -->
    @if($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{$err}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!--Переходом по маршруту вызывается метод ресурс-контроллера -->
    <form action="{{Route('followups.store')}}", method="post">
        @csrf
    <!--Классы от bootstrap -->
    <div class="row g-3">
        <div class="col-2">
              <label for="patientid", class="form-label">Patient card ID</label>
              <!--хелпер old для сохранения в полях формы введенных данных при редиректе назад на форму (в случае ошибки валидации) -->
              <input type="text", class="form-control", id="patientid", name="patientid", placeholder="Initial card Id", value="{{$ptid}}">
        </div>
        <div class="col-2">
            <label for="date", class="form-label">Date</label>
            <input type="date", class="form-control", id="date", name="date", placeholder="Date of follow up", value="{{old('date')}}">
         </div>
        <div class="col-2">
            <label for="weight", class="form-label">Weight</label>
            <input type="text", class="form-control", id="weight", name="weight", placeholder="Current weight", value="{{old('weight')}}">
        </div>
        <div class="col-2">
            <label for="neck", class="form-label">Neck circumference</label>
            <input type="text", class="form-control", id="neck", name="neck", placeholder="Current value", value="{{old('neck')}}">
        </div>
        <div class="col-2">
            <label for="sad", class="form-label">Systolic arterial pressure</label>
            <input type="text", class="form-control", id="sad", name="sad", placeholder="Current value", value="{{old('sad')}}">
        </div>
        <div class="col-2">
            <label for="dad", class="form-label">Diastolic arterial pressure</label>
            <input type="text", class="form-control", id="dad", name="dad", placeholder="Current value", value="{{old('dad')}}">
        </div>
        <div class="col-2">
            <label for="ejfract", class="form-label">Ejection fraction</label>
            <input type="text", class="form-control", id="ejfract", name="ejfract", placeholder="Current value", value="{{old('ejfract')}}">
        </div>
        <div class="col-2">
            <label for="jointpath", class="form-label">Joint pathology</label>
            <input type="text", class="form-control", id="jointpath", name="jointpath", placeholder="Description", value="{{old('jointpath')}}">
        </div>
        <div class="col-2">
            <label for="wbc", class="form-label">WBC</label>
            <input type="text", class="form-control", id="wbc", name="wbc", placeholder="Current level", value="{{old('wbc')}}">
        </div>
        <div class="col-2">
            <label for="rbc", class="form-label">RBC </label>
            <input type="text", class="form-control", id="rbc", name="rbc", placeholder="Current level", value="{{old('rbc')}}">
        </div>
        <div class="col-2">
            <label for="hgb", class="form-label">Hemoglobin</label>
            <input type="text", class="form-control", id="hgb", name="hgb", placeholder="Current level", value="{{old('hgb')}}">
        </div>
        <div class="col-2">
            <label for="plt", class="form-label">PLT</label>
            <input type="text", class="form-control", id="plt", name="plt", placeholder="Current level", value="{{old('plt')}}">
        </div>
        <div class="col-2">
            <label for="gluc", class="form-label">Glucose</label>
            <input type="text", class="form-control", id="gluc", name="gluc", placeholder="Current level", value="{{old('gluc')}}">
        </div>
        <div class="col-2">
            <label for="tbil", class="form-label">Total bilirubine</label>
            <input type="text", class="form-control", id="tbil", name="tbil", placeholder="Current level", value="{{old('tbil')}}">
        </div>
        <div class="col-2">
            <label for="dbil", class="form-label">Direct bilirubine</label>
            <input type="text", class="form-control", id="dbil", name="dbil", placeholder="Current level", value="{{old('dbil')}}">
        </div>
        <div class="col-2">
            <label for="tprot", class="form-label">Total proteine</label>
            <input type="text", class="form-control", id="tprot", name="tprot", placeholder="Current level", value="{{old('tprot')}}">
        </div>
        <div class="col-2">
            <label for="albumine", class="form-label">Albumine</label>
            <input type="text", class="form-control", id="albumine", name="albumine", placeholder="Current level", value="{{old('albumine')}}">
        </div>
        <div class="col-2">
            <label for="amylase", class="form-label">Amylase</label>
            <input type="text", class="form-control", id="amylase", name="amylase", placeholder="Current level", value="{{old('amylase')}}">
        </div>
        <div class="col-2">
            <label for="ast", class="form-label">AST</label>
            <input type="text", class="form-control", id="ast", name="ast", placeholder="Current level", value="{{old('ast')}}">
        </div>
        <div class="col-2">
            <label for="alt", class="form-label">ALT</label>
            <input type="text", class="form-control", id="alt", name="alt", placeholder="Current level", value="{{old('alt')}}">
        </div>
        <div class="col-2">
            <label for="na", class="form-label">Sodium</label>
            <input type="text", class="form-control", id="na", name="na", placeholder="Current level", value="{{old('na')}}">
        </div>
        <div class="col-2">
            <label for="k", class="form-label">Potassium</label>
            <input type="text", class="form-control", id="k", name="k", placeholder="Current level", value="{{old('k')}}">
        </div>
        <div class="col-2">
            <label for="ca", class="form-label">Calcium</label>
            <input type="text", class="form-control", id="ca", name="ca", placeholder="Current level", value="{{old('ca')}}">
        </div>
        <div class="col-2">
            <label for="ca_ion", class="form-label">Calcium (ionized)</label>
            <input type="text", class="form-control", id="ca_ion", name="ca_ion", placeholder="Current level", value="{{old('ca_ion')}}">
        </div>
        <div class="col-2">
            <label for="cl", class="form-label">Chloride</label>
            <input type="text", class="form-control", id="cl", name="cl", placeholder="Current level", value="{{old('cl')}}">
        </div>
        <div class="col-2">
            <label for="trig", class="form-label">Triglyceride</label>
            <input type="text", class="form-control", id="trig", name="trig", placeholder="Current level", value="{{old('trig')}}">
        </div>
        <div class="col-2">
            <label for="chol", class="form-label">Total cholesterol</label>
            <input type="text", class="form-control", id="chol", name="chol", placeholder="Current level", value="{{old('chol')}}">
        </div>
        <div class="col-2">
            <label for="ldl", class="form-label">LDL-cholesterol</label>
            <input type="text", class="form-control", id="ldl", name="ldl", placeholder="Current level", value="{{old('ldl')}}">
        </div>
        <div class="col-2">
            <label for="hdl", class="form-label">HDL-cholesterol</label>
            <input type="text", class="form-control", id="hdl", name="hdl", placeholder="Current level", value="{{old('hdl')}}">
        </div>
        <div class="col-2">
            <label for="proteinuria", class="form-label">Proteinuria</label>
            <input type="text", class="form-control", id="proteinuria", name="proteinuria", placeholder="Level or description", value="{{old('proteinuria')}}">
        </div>
        <div class="col-12">
            <label for="endo", class="form-label">Gastroscopy</label>
            <textarea id="endo", class="form-control", name="endo", placeholder="Description and conclusion">{{old('endo')}}</textarea>
        </div>
        <div class="col-12">
            <label for="us", class="form-label">Ultrasonography</label>
            <textarea id="us", class="form-control", name="us", placeholder="Description and conclusion">{{old('us')}}</textarea>
        </div>
        <div class="col-12">
            <label for="polysomno", class="form-label">Polysomnography</label>
            <textarea id="polysomno", class="form-control", name="polysomno", placeholder="Description and conclusion">{{old('polysomno')}}</textarea>
        </div>
        <div class="col-12">
            <label for="ct", class="form-label">CT</label>
            <textarea id="ct", class="form-control", name="ct", placeholder="Description and conclusion">{{old('ct')}}</textarea>
        </div>
        <div class="col-2">
            <label for="dm", class="form-label">Diabetes mellitus</label>
            <input type="text", class="form-control", id="dm", name="dm", placeholder="Current status", value="{{old('dm')}}">
        </div>
        <div class="col-2">
            <label for="nash", class="form-label">NASH</label>
            <input type="text", class="form-control", id="nash", name="nash", placeholder="Current status", value="{{old('nash')}}">
        </div>
        <div class="col-2">
            <label for="malabs", class="form-label">Malabsorption</label>
            <input type="text", class="form-control", id="malabs", name="malabs", placeholder="Current status", value="{{old('malabs')}}">
        </div>
        <div class="col-12">
            <label for="medication", class="form-label">Current medication</label>
            <textarea id="medication", class="form-control", name="medication", placeholder="Drugs list and doses">{{old('medication')}}</textarea>
        </div>
         <div class="col-2">
            <label for="nsurgery", class="form-label">Repeated surgery type</label>
            <input type="text", id="nsurgery", class="form-control", name="nsurgery", placeholder="caused by weight regain or complications", value="{{old('nsurgery')}}">
        </div>
        <div class="col-12">
            <label for="describensurgery", class="form-label">Repeated surgery description</label>
            <input type="text", class="form-control", id="describensurgery", name="describensurgery", placeholder="details", value="{{old('describensurgery')}}">
        </div>
        <div class="col-2">
            <label for="nsurgeryduration", class="form-label">Repeated surgery duration</label>
            <input type="text", class="form-control", id="nsurgeryduration", name="nsurgeryduration", placeholder="minutes", value="{{old('nsurgeryduration')}}">
        </div>
        <div class="col-2">
            <label for="nsurgerydate", class="form-label">Repeated surgery date</label>
            <input type="date", class="form-control", id="nsurgerydate", name="nsurgerydate", placeholder="Date of operation", value="{{old('nsurgerydate')}}">
        </div>
        <div class="col-2">
            <label for="ncomplicated", class="form-label">Late complications</label>
            <input type="text", class="form-control", id="ncomplicated", name="ncomplicated", placeholder="0/1", value="{{old('ncomplicated')}}">
        </div>
        <div class="col-12">
            <label for="describencomplication", class="form-label">Complications details</label>
            <textarea id="describencomplication", class="form-control", name="describencomplication", placeholder="details">{{old('describencomplication')}}</textarea>
        </div>
        <div class="col-2">
            <label for="confirmedsleepapnoea", class="form-label">Sleep apnoea</label>
            <input type="text", class="form-control", id="confirmedsleepapnoea", name="confirmedsleepapnoea", placeholder="0/1", value="{{old('confirmedsleepapnoea')}}">
        </div>
        <div class="col-2">
            <label for="depressiononmedication", class="form-label">Depression</label>
            <input type="text", class="form-control", id="depressiononmedication", name="depressiononmedication", placeholder="0/1", value="{{old('depressiononmedication')}}">
        </div>
        <div class="col-2">
            <label for="dyslipidemiaonmedication", class="form-label">Dyslipidemia</label>
            <input type="text", class="form-control", id="dyslipidemiaonmedication", name="dyslipidemiaonmedication", placeholder="0/1", value="{{old('dyslipidemiaonmedication')}}">
        </div>
        <div class="col-2">
            <label for="gerdgord", class="form-label">GERD</label>
            <input type="text", class="form-control", id="gerdgord", name="gerdgord", placeholder="0/1", value="{{old('gerdgord')}}">
        </div>
        <div class="col-2">
            <label for="isprimaryflw", class="form-label">Primary follow-up?</label>
            <input type="text", class="form-control", id="isprimaryflw", name="isprimaryflw", placeholder="0/1", value="{{old('isprimaryflw')}}">
        </div>
        <div class="col-2">
            <label for="musculoskeletalpainonmedication", class="form-label">Musculo-skeletal pain</label>
            <input type="text", class="form-control", id="musculoskeletalpainonmedication", name="musculoskeletalpainonmedication", placeholder="0/1", value="{{old('musculoskeletalpainonmedication')}}">
        </div>
        <div class="col-2">
            <label for="patientstatus", class="form-label">Patient status</label>
            <input type="text", class="form-control", id="patientstatus", name="patientstatus", placeholder="0 - Alive/ 1 - Deceased", value="{{old('patientstatus')}}">
        </div>
        <div class="col-2">
            <label for="typeofdiabetesmedication", class="form-label">DM medication</label>
            <input type="text", class="form-control", id="typeofdiabetesmedication", name="typeofdiabetesmedication", placeholder="1 - Oral therapy/ 2 - Insulin", value="{{old('typeofdiabetesmedication')}}">
        </div>
    </div>
        <hr class="my-4">
        <div class="container centered">
            <button class="w-50 btn btn-primary btn-lg", type="submit">Add follow up</button>
        </div>
        <hr class="my-4">
    </form>
<x-footer/>
@endsection