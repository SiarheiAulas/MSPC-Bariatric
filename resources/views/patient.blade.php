@extends('layout')
@section('content')
<div class="row g-5">
    <div class="col-12 text-center">
        <h2>General data</h2>
        <div class="text-justify">
            <a href="{{Route('patients.edit', $patient->id)}}">Edit patient's card</a>
        </div>
    </div>
    <!--Таблица основных данных из 2 частей-->
    <table  class="table table-hover table-bordered table-responsive my-table">
        <tr>
            <th class="text-center name", scope="col">Surname</th>
            <th class="text-center name", scope="col">First Name</th>
            <th class="text-center name", scope="col">Last Name</th>
            <th class="text-center w35", scope="col">Gender</th>
            <th class="text-center date", scope="col">Birth date</th>
            <th class="text-center w35", scope="col">Age</th>
            <th class="text-center w45", scope="col">Height</th>
            <th class="text-center w70", scope="col">Country</th>
            <th class="text-center w70", scope="col">Adress</th>
            <th class="text-center w68", scope="col">Phone</th>
        </tr>
        <tr>
            <td class="text-center name wordbreak", scope="col">{{$patient->surname}}</td>
            <td class="text-center name wordbreak", scope="col">{{$patient->firstname}}</td>
            <td class="text-center name wordbreak", scope="col">{{$patient->lastname}}</td>
            <td class="text-center w35 nooverflow", scope="col">{{$patient->sex}}</td>
            <td class="text-center date", scope="col">{{$patient->birthdate}}</td>
            <td class="text-center w35 nooverflow", scope="col">{{$patient->age}}</td>
            <td class="text-center w45 nooverflow", scope="col">{{$patient->height}}</td>
            <td class="text-center w70 wordbreak", scope="col">{{$patient->country}}</td>
            <td class="text-center w70 h100 wordbreak", scope="col">{{$patient->adress}}</td>
            <td class="text-center w68 wordbreak", scope="col">{{$patient->phone}}</td>
        </tr>
    </table>
    <table  class="table table-hover table-bordered table-responsive my-table">
        <tr>
            <th class="text-center w150", scope="col">Diagnosis</th>
            <th class="text-center risk", scope="col">Risk</th>
            <th class="text-center w150", scope="col">Surgery</th>
            <th class="text-center date", scope="col">Surgery date</th>
            <th class="text-center w45", scope="col">Surgery duration</th>
            <th class="text-center w150", scope="col">Complications</th>
            <th class="text-center date", scope="col">Discharge date</th>
        </tr>
        <tr>
            <td class="text-center w150 h100 wordbreak", scope="col">{{$patient->describediagnosis}}</td>
            <td class="text-center risk h100 nooverflow">{{$patient->risk}}</td>
            <td class="text-center w150 h100 wordbreak", scope="col">{{$patient->describesurgery}}</td>
            <td class="text-center date", scope="col">{{$patient->surgerydate}}</td>
            <td class="text-center w45 nooverflow", scope="col">{{$patient->surgeryduration}}</td>
            <td class="text-center w150 h100 wordbreak", scope="col">{{$patient->describecomplications}}</td>
            <td class="text-center date", scope="col">{{$patient->dischargedate}}</td>
        </tr>
    </table>
    <!--Для отображения графиков-->
    <iframe class="iframe-patient", src="{{Route('chart')}}", title="chart", name="iframe_patient"></iframe>
    <div class="col-12 text-center">
        <h2>Follow-up data</h2>
        <div class="text-justify">
            <a href="{{Route('followups.create')}}?param={{$patient->id}}">Add followup  data</a>
        </div>
    </div>
    <!--Таблица данных осмотров-->
    <table  class="table table-hover table-bordered table-responsive", width="100%">
        <tr>
            <th class="text-center date", scope="col">Date</th>
            <th class="text-center w45", scope="col"><a href="{{Route('ptchart', $patient->id)}}?param=weight", target="iframe_patient">Weight</a></th>
            <th class="text-center w55 nooverflow", scope="col"><a href="{{Route('ptchart', $patient->id)}}?param=bmi", target="iframe_patient">BMI</a></th>
            <th class="text-center w55 nooverflow", scope="col">IBW</th>
            <th class="text-center w55", scope="col"><a href="{{Route('ptchart', $patient->id)}}?param=ew", target="iframe_patient">EW</a></th>
            <th class="text-center w55", scope="col"><a href="{{Route('ptchart', $patient->id)}}?param=percentewl", target="iframe_patient">%EWL</a></th>
            <th class="text-center w55", scope="col"><a href="{{Route('ptchart', $patient->id)}}?param=percentbmil", target="iframe_patient">%BMIL</a></th>
            <th class="text-center w55", scope="col"><a href="{{Route('ptchart', $patient->id)}}?param=percentebmil", target="iframe_patient">%EBMIL</a></th>
            <th class="text-center w55", scope="col"><a href="{{Route('ptchart', $patient->id)}}?param=percenttwl", target="iframe_patient">%TWL</a></th>
            <th class="text-center w35", scope="col"><a href="{{Route('ptchart', $patient->id)}}?param=neck", target="iframe_patient">Neck circumference</a></th>
            <th class="text-center w45", scope="col"><a href="{{Route('ptchart', $patient->id)}}?param=sad", target="iframe_patient">Syst.AP</a></th>
            <th class="text-center w45", scope="col"><a href="{{Route('ptchart', $patient->id)}}?param=dad", target="iframe_patient">Diast. AP</a></th>
            <th class="text-center w35", scope="col"><a href="{{Route('ptchart', $patient->id)}}?param=ejfract", target="iframe_patient">Ejection fraction</a></th>
            <th class="text-center w70", scope="col">Joint pathology</th>
            <th class="text-center w55 nooverflow", scope="col"><a href="{{Route('ptchart', $patient->id)}}?param=wbc", target="iframe_patient">WBC</a></th>
            <th class="text-center w55 nooverflow", scope="col"><a href="{{Route('ptchart', $patient->id)}}?param=rbc", target="iframe_patient">RBC</a></th>
            <th class="text-center w55", scope="col"><a href="{{Route('ptchart', $patient->id)}}?param=hgb", target="iframe_patient">Hemoglobin</a></th>
            <th class="text-center w55 nooverflow", scope="col"><a href="{{Route('ptchart', $patient->id)}}?param=plt", target="iframe_patient">PLT</a></th>
            <th class="text-center w45", scope="col"><a href="{{Route('ptchart', $patient->id)}}?param=gluc", target="iframe_patient">Glucose</a></th>
            <th class="text-center w55", scope="col"><a href="{{Route('ptchart', $patient->id)}}?param=tbil", target="iframe_patient">Total bilirubin</a></th>
            <th class="text-center w55", scope="col"><a href="{{Route('ptchart', $patient->id)}}?param=dbil", target="iframe_patient">Direct bilirubin</a></th>
            <th class="text-center w45", scope="col"><a href="{{Route('ptchart', $patient->id)}}?param=tprot", target="iframe_patient">Total protein</a></th>
            <th class="text-center w45", scope="col"><a href="{{Route('ptchart', $patient->id)}}?param=albumine", target="iframe_patient">Albumine</a></th>
            <th class="text-center w45", scope="col"><a href="{{Route('ptchart', $patient->id)}}?param=amylase", target="iframe_patient">Amylase</a></th>
            <th class="text-center w55 nooverflow", scope="col"><a href="{{Route('ptchart', $patient->id)}}?param=ast", target="iframe_patient">AST</a></th>
            <th class="text-center w45 nooverflow", scope="col"><a href="{{Route('ptchart', $patient->id)}}?param=alt", target="iframe_patient">ALT</a></th>
            <th class="text-center w55", scope="col"><a href="{{Route('ptchart', $patient->id)}}?param=na", target="iframe_patient">Sodium</a></th>
            <th class="text-center w45", scope="col"><a href="{{Route('ptchart', $patient->id)}}?param=k", target="iframe_patient">Potassium</a></th>
            <th class="text-center w45", scope="col"><a href="{{Route('ptchart', $patient->id)}}?param=ca", target="iframe_patient">Calcium (total)</a></th>
            <th class="text-center w55", scope="col"><a href="{{Route('ptchart', $patient->id)}}?param=cl", target="iframe_patient">Cloride</a></th>
            <th class="text-center w45", scope="col"><a href="{{Route('ptchart', $patient->id)}}?param=trig", target="iframe_patient">Triglyceride</a></th>
            <th class="text-center w45", scope="col"><a href="{{Route('ptchart', $patient->id)}}?param=chol", target="iframe_patient">Total cholesterol</a></th>
            <th class="text-center w45 nooverflow", scope="col"><a href="{{Route('ptchart', $patient->id)}}?param=ldl", target="iframe_patient">LDL</a></th>
            <th class="text-center w45 nooverflow", scope="col"><a href="{{Route('ptchart', $patient->id)}}?param=hdl", target="iframe_patient">HDL</a></th>
            <th class="text-center w60", scope="col">Proteinuria</th>
            <th class="text-center date nooverflow", scope="col">Gastroscopy</th>
            <th class="text-center date nooverflow", scope="col">Ultrasound</th>
            <th class="text-center date", scope="col">Polysomnography</th>
            <th class="text-center date nooverflow", scope="col">CT</th>
            <th class="text-center w35", scope="col">Arterial Hypertension</th>
            <th class="text-center w35", scope="col">Diabetes mellitus</th>
            <th class="text-center w35", scope="col">NASH</th>
            <th class="text-center w35", scope="col">Malabsorption</th>
            <th class="text-center w80", scope="col">Current medication</th>
            <th class="text-center w55", scope="col">Repeated surgery</th>
            <th class="text-center date", scope="col">Surgery details</th>
            <th class="text-center w55", scope="col">Surgery duration</th>
            <th class="text-center date", scope="col">Surgery date</th>
            <th class="text-center date nooverflow", scope="col">Late complications</th>
            <th class="text-center actions", scope="col">Actions</th>
        </tr>
       @foreach ($flwups as $flwup)
        <tr>
            <td class="text-center date", scope="col">{{$flwup->date}}</td>
            <td class="text-center w45 nooverflow", scope="col">{{$flwup->weight}}</td>
            <td class="text-center w55 nooverflow", scope="col">{{$flwup->bmi}}</td>
            <td class="text-center w55 nooverflow", scope="col">{{$flwup->ibw}}</td>
            <td class="text-center w55 nooverflow", scope="col">{{$flwup->ew}}</td>
            <td class="text-center w55 nooverflow", scope="col">{{$flwup->percentewl}}</td>
            <td class="text-center w55 nooverflow", scope="col">{{$flwup->percentbmil}}</td>
            <td class="text-center w55 nooverflow", scope="col">{{$flwup->percentebmil}}</td>
            <td class="text-center w55 nooverflow", scope="col">{{$flwup->percenttwl}}</td>
            <td class="text-center w35 nooverflow", scope="col">{{$flwup->neck}}</td>
            <td class="text-center w45 nooverflow", scope="col">{{$flwup->sad}}</td>
            <td class="text-center w45 nooverflow", scope="col">{{$flwup->dad}}</td>
            <td class="text-center w35 nooverflow", scope="col">{{$flwup->ejfract}}</td>
            <td class="text-center w70 wordbreak", scope="col">{{$flwup->jointpath}}</td>
            <td class="text-center w55 nooverflow", scope="col">{{$flwup->wbc}}</td>
            <td class="text-center w55 nooverflow", scope="col">{{$flwup->rbc}}</td>
            <td class="text-center w55 nooverflow", scope="col">{{$flwup->hgb}}</td>
            <td class="text-center w55 nooverflow", scope="col">{{$flwup->plt}}</td>
            <td class="text-center w45 nooverflow", scope="col">{{$flwup->gluc}}</td>
            <td class="text-center w55 nooverflow", scope="col">{{$flwup->tbil}}</td>
            <td class="text-center w55 nooverflow", scope="col">{{$flwup->dbil}}</td>
            <td class="text-center w45 nooverflow", scope="col">{{$flwup->tprot}}</td>
            <td class="text-center w45 nooverflow", scope="col">{{$flwup->albumine}}</td>
            <td class="text-center w45 nooverflow", scope="col">{{$flwup->amylase}}</td>
            <td class="text-center w55 nooverflow", scope="col">{{$flwup->ast}}</td>
            <td class="text-center w45 nooverflow", scope="col">{{$flwup->alt}}</td>
            <td class="text-center w55 nooverflow", scope="col">{{$flwup->na}}</td>
            <td class="text-center w45 nooverflow", scope="col">{{$flwup->k}}</td>
            <td class="text-center w45 nooverflow", scope="col">{{$flwup->ca}}</td>
            <td class="text-center w55 nooverflow", scope="col">{{$flwup->cl}}</td>
            <td class="text-center w45 nooverflow", scope="col">{{$flwup->trig}}</td>
            <td class="text-center w45 nooverflow", scope="col">{{$flwup->chol}}</td>
            <td class="text-center w45 nooverflow", scope="col">{{$flwup->ldl}}</td>
            <td class="text-center w45 nooverflow", scope="col">{{$flwup->hdl}}</td>
            <td class="text-center w60", scope="col">{{$flwup->proteinuria}}</td>
            <td class="text-center date wordbreak", scope="col">{{$flwup->endo}}</td>
            <td class="text-center date wordbreak", scope="col">{{$flwup->us}}</td>
            <td class="text-center date wordbreak", scope="col">{{$flwup->polysomno}}</td>
            <td class="text-center date wordbreak", scope="col">{{$flwup->ct}}</td>
            <td class="text-center w35 nooverflow", scope="col">{{$flwup->arthyper}}</td>
            <td class="text-center w35 nooverflow", scope="col">{{$flwup->dm}}</td>
            <td class="text-center w35 nooverflow", scope="col">{{$flwup->nash}}</td>
            <td class="text-center w35 nooverflow", scope="col">{{$flwup->malabs}}</td>
            <td class="text-center w80 wordbreak", scope="col">{{$flwup->medication}}</td>
            <td class="text-center w55 nooverflow", scope="col">{{$flwup->nsurgery}}</td>
            <td class="text-center date wordbreak scrollable", scope="col">{{$flwup->describensurgery}}</td>
            <td class="text-center w55 nooverflow", scope="col">{{$flwup->nsurgeryduration}}</td>
            <td class="text-center date", scope="col">{{$flwup->nsurgerydate}}</td>
            <td class="text-center date wordbreak", scope="col">{{$flwup->describencomplication}}</td>
            <td class="text-center actions2", scope="col"><button><a href="{{Route('followups.edit', $flwup->id)}}">Edit</a></button></td>
            <td class="text-center actions2", scope="col">
                <!--Потому что нельзя в методе формы писать delete или put -->
                <form action="{{Route('followups.destroy', $flwup->id)}}", method="post">
                  @csrf
                  <input type="hidden", name="_method", value="DELETE">
                  <input type="submit", value="Delete">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <br>
</div>
<x-footer/>
@endsection