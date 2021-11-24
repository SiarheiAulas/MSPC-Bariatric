@extends('layout')
@section('content')
    <h2>Add primary data</h2>
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
    <form action="{{Route('patients.store')}}", method="post">
        @csrf
        <!--Классы от bootstrap -->
        <div class="row g-3">
            <div class="col-2">
                <label for="id", class="form-label">Card ID:</label>
                <!--хелпер old для сохранения в полях формы введенных данных при редиректе назад на форму (в случае ошибки валидации) -->
                <input type="text", class="form-control", id="id", name="id", placeholder="Card Id", value="{{old('id')}}">
            </div>
            <div class="col-2">
                <label for="surname", class="form-label">Surname:</label>
                <input type="text", class="form-control", id="surname", name="surname", placeholder="Surname", value="{{old('surname')}}">
            </div>
            <div class="col-2">
                <label for="firstname", class="form-label">First name:</label>
                <input type="text", class="form-control", id="firstname", name="firstname", placeholder="First Name", value="{{old('firstname')}}">
            </div>
            <div class="col-2">
                <label for="lastname", class="form-label">Last Name:</label>
                <input type="text", class="form-control", id="lastname", name="lastname", placeholder="Last Name", value="{{old('lastname')}}">
            </div>
            <div class="col-2">
                <label for="sex", class="form-label">Gender:</label>
                <input type="text", class="form-control", id="sex", name="sex", placeholder="m/f", value="{{old('sex')}}">
            </div>
            <div class="col-2">
                <label for="phone", class="form-label">Phone number:</label>
                <input type="text", class="form-control", id="phone", name="phone", placeholder="+xxx-xx-xxx-xx-xx", value="{{old('phone')}}">
            </div>
            <div class="col-2">
                <label for="country", class="form-label">Country:</label>
                <input type="text", class="form-control", id="country", name="country", placeholder="Country", value="{{old('country')}}">
            </div>
            <div class="col-2">
                <label for="adress", class="form-label">Adress:</label>
                <input type="text", class="form-control", id="adress", name="adress", placeholder="Adress", value="{{old('adress')}}">
            </div>
            <div class="col-2">
                <label for="diagnosis", class="form-label"> Main diagnosis</label>
                <input type="text", class="form-control", id="diagnosis", name="diagnosis", placeholder="Obesity grade (0 to 3)", value="{{old('diagnosis')}}">
            </div>
            <div class="col-12">
                <label for="describediagnosis", class="form-label">Full diagnosis:</label>
                <textarea id="describediagnosis", class="form-control", name="describediagnosis", placeholder="Diagnosis">{{old('describediagnosis')}}</textarea>
            </div>
            <div class="col-2">
                <label for="birthdate", class="form-label">Birth date:</label>
                <input type="date", class="form-control", id="birthdate", name="birthdate", placeholder="Birth Date", value="{{old('date')}}">
            </div>
            <div class="col-2">
                <label for="age", class="form-label">Age:</label>
                <input type="text", class="form-control", id="age", name="age", placeholder="Age at operation", value="{{old('age')}}">
            </div>
            <div class="col-2">
                <label for="cl", class="form-label">Chloride</label>
                <input type="text", class="form-control", id="cl", name="cl", placeholder="Cl (risk estimation)", value="{{old('cl')}}">
            </div>
            <div class="col-2">
                <label for="hgb", class="form-label">Hemoglobin</label>
                <input type="text", class="form-control", id="hgb", name="hgb", placeholder="Hb (risk estimation)", value="{{old('hgb')}}">
            </div>
            <div class="col-2">
                <label for="surgery", class="form-label">Surgery (code):</label>
                <input type="text", class="form-control", id="surgery", name="surgery", placeholder="lsg/mgb/rygb/lagb/gp/other/none", value="{{old('surgery')}}">
            </div>
            <div class="col-2">
                <label for="surgerytype", class="form-label">Type of surgery:</label>
                <input type="text", class="form-control", id="surgerytype", name="surgerytype", placeholder="primary/secondary", value="{{old('surgerytype')}}">
            </div>
            <div class="col-2">
                <label for="bleedwithin30daysofsurgery", class="form-label">Bleed within 30 days of surgery:</label>
                <input type="text", class="form-control", id="bleedwithin30daysofsurgery", name="bleedwithin30daysofsurgery", placeholder="0/1", value="{{old('bleedwithin30daysofsurgery')}}">
            </div>
            <div class="col-2">
                <label for="leakwithin30daysofsurgery", class="form-label">Leak within 30 days of surgery:</label>
                <input type="text", class="form-control", id="leakwithin30daysofsurgery", name="leakwithin30daysofsurgery", placeholder="0/1", value="{{old('leakwithin30daysofsurgery')}}">
            </div>
            <div class="col-2">
                <label for="obstructionwithin30daysofsurgery", class="form-label">Obstruction within 30 days of surgery:</label>
                <input type="text", class="form-control", id="obstructionwithin30daysofsurgery", name="obstructionwithin30daysofsurgery", placeholder="0/1", value="{{old('obstructionwithin30daysofsurgery')}}">
            </div>
            <div class="col-2">
                <label for="reoperationwithin30daysofsurgery", class="form-label">Reoperation within 30 days of surgery:</label>
                <input type="text", class="form-control", id="reoperationwithin30daysofsurgery", name="reoperationwithin30daysofsurgery", placeholder="0/1", value="{{old('reoperationwithin30daysofsurgery')}}">
            </div>
            <div class="col-4">
                <label for="fundingcategory", class="form-label">Funding category:</label>
                <input type="text", class="form-control", id="fundingcategory", name="fundingcategory", placeholder="1 - Publicly funded/ 2 - Self-pay/ 3 - Private insurer", value="{{old('fundingcategory')}}">
            </div>
            <div class="col-2">
                <label for="hasthepatienthadapriorgastricbaloon", class="form-label">Prior gastric baloon:</label>
                <input type="text", class="form-control", id="hasthepatienthadapriorgastricbaloon", name="hasthepatienthadapriorgastricbaloon", placeholder="0/1", value="{{old('hasthepatienthadapriorgastricbaloon')}}">
            </div>
            <div class="col-2">
                <label for="hasthepatienthadbariatricsurgeryinthepast", class="form-label">Bariatric surgery in the past:</label>
                <input type="text", class="form-control", id="hasthepatienthadbariatricsurgeryinthepast", name="hasthepatienthadbariatricsurgeryinthepast", placeholder="0/1", value="{{old('hasthepatienthadbariatricsurgeryinthepast')}}">
            </div>
            <div class="col-2">
                <label for="increasedriskofdvtorpe", class="form-label">Risk of DVT/PE:</label>
                <input type="text", class="form-control", id="increasedriskofdvtorpe", name="increasedriskofdvtorpe", placeholder="0/1", value="{{old('increasedriskofdvtorpe')}}">
            </div>
            <div class="col-6">
                <label for="operativeapproach", class="form-label">Operative approach:</label>
                <input type="text", class="form-control", id="operativeapproach", name="operativeapproach", placeholder="1 - Laparoscopic/ 2 - Lap converted to open/ 3 - Endoscopic/ 4 - Open", value="{{old('operativeapproach')}}">
            </div>
            <div class="col-2">
                <label for="patientstatusatdischarge", class="form-label">Patient status:</label>
                <input type="text", class="form-control", id="patientstatusatdischarge", name="patientstatusatdischarge", placeholder="0 - Alive/ 1 - Deceased", value="{{old('patientstatusatdischarge')}}">
            </div>
            <div class="col-2">
                <label for="simultaneous", class="form-label">Combined procedure:</label>
                <input type="text", class="form-control", id="simultaneous", name="simultaneous", placeholder="0/1", value="{{old('simultaneous')}}">
            </div>
            <div class="col-12">
                <label for="describesurgery", class="form-label">Surgery details:</label>
                <textarea id="describesurgery", class="form-control", name="describesurgery", placeholder="description">{{old('describesurgery')}}</textarea>
            </div>
            <div class="col-2">
                <label for="surgerydate", class="form-label">Surgery date:</label>
                <input type="date", class="form-control", id="surgerydate", name="surgerydate", placeholder="Surgery date", value="{{old('surgerydate')}}">
            </div>
            <div class="col-2">
                <label for="dischargedate", class="form-label">Date of discharge:</label>
                <input type="date", class="form-control", id="dischargedate", name="dischargedate", placeholder="Date of discharge", value="{{old('dischargedate')}}">
            </div>
            <div class="col-2">
                <label for="surgeryduration", class="form-label">Duration of operation:</label>
                <input type="text", class="form-control", id="surgeryduration" name="surgeryduration", placeholder="minutes", value="{{old('surgeryduration')}}">
            </div>
            <div class="col-2">
                <label for="height", class="form-label">Height:</label>
                <input type="text", class="form-control", id="height", name="height", placeholder="cm", value="{{old('height')}}">
            </div>
            <div class="col-2">
                <label for="complicated", class="form-label">Complications:</label>
                <input type="text", class="form-control", id="complicated", name="complicated", placeholder="0/1", value="{{old('complicated')}}">
            </div>
            <div class="col-12">
                <label for="describecomplications", class="form-label">Complications:</label>
                <textarea id="describecomplications", class="form-control", name="describecomplications", placeholder="description">{{old('describecomplications')}}</textarea>
            </div>
        </div>
        <hr class="my-4">
        <div class="container centered">
            <button class="w-50 btn btn-primary btn-lg", type="submit">Add new patient</button>
        </div>
        <hr class="my-4">
    </form>
<x-footer/>
@endsection