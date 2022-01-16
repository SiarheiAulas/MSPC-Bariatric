@extends('layout')
@section('content')
<!--Фильтры-->
<div class="row g-5">
    <div class="col-2 text-center">
        <h4>Surgery type</h4>
        <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm"><a href="{{Route('patients.index')}}">Any</a></li>
            <li class="list-group-item d-flex justify-content-between lh-sm"><a href="{{Route('nosurgery')}}">None</a></li>
            <li class="list-group-item d-flex justify-content-between lh-sm"><a href="{{Route('lsg')}}">LSG</a></li>
            <li class="list-group-item d-flex justify-content-between lh-sm"><a href="{{Route('mgb')}}">MGB</a></li>
            <li class="list-group-item d-flex justify-content-between lh-sm"><a href="{{Route('rygb')}}">RYGB</a></li>
            <li class="list-group-item d-flex justify-content-between lh-sm"><a href="{{Route('lagb')}}">LAGB</a></li>
            <li class="list-group-item d-flex justify-content-between lh-sm"><a href="{{Route('gp')}}">LGP</a></li>
            <li class="list-group-item d-flex justify-content-between lh-sm"><a href="{{Route('other')}}">Other</a></li>
        </ul>
    </div>
    <div class="col-3 text-center">
        <h4>Primary or secondary</h4>
        <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm"><a href="{{Route('patients.index')}}">All</a></li>
            <li class="list-group-item d-flex justify-content-between lh-sm"><a href="{{Route('primary')}}">Primary</a></li>
            <li class="list-group-item d-flex justify-content-between lh-sm"><a href="{{Route('secondary')}}">Secondary</a></li> 
        </ul>
    </div>
    <div class="col-2 text-center">
        <h4>Simultaneous</h4>
        <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm"><a href="{{Route('patients.index')}}">All</a></li>
            <li class="list-group-item d-flex justify-content-between lh-sm"><a href="{{Route('simultaneous')}}">Simultaneous</a></li>
            <li class="list-group-item d-flex justify-content-between lh-sm"><a href="{{Route('notsimultaneous')}}">Non simultaneous</a></li> 
        </ul>
    </div>
    <div class="col-2 text-center">
        <h4>Complicated</h4>
        <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm"><a href="{{Route('patients.index')}}">All</a></li>
            <li class="list-group-item d-flex justify-content-between lh-sm"><a href="{{Route('complicated')}}">Complicated</a></li>
            <li class="list-group-item d-flex justify-content-between lh-sm"><a href="{{Route('uncomplicated')}}">Uncomplicated</a></li> 
        </ul>
    </div>
    <div class="col-2 text-center">
        <h4>Diagnosis</h4>
        <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm"><a href="{{Route('patients.index')}}">All</a></li>
            <li class="list-group-item d-flex justify-content-between lh-sm"><a href="{{Route('obes0')}}">Obesity 0</a></li>
            <li class="list-group-item d-flex justify-content-between lh-sm"><a href="{{Route('obes1')}}">Obesity 1</a></li> 
            <li class="list-group-item d-flex justify-content-between lh-sm"><a href="{{Route('obes2')}}">Obesity 2</a></li> 
            <li class="list-group-item d-flex justify-content-between lh-sm"><a href="{{Route('obes3')}}">Obesity 3</a></li> 
        </ul>
    </div>
    <!--Для отображения диаграмм-->
    <iframe class="iframe-main" src="{{Route('chart')}}", title="chart", name="iframe_main"></iframe>

    <!--Строчка с поиском и отчетами-->
    <div class="col-12 text-center specified1">
        <div class="col-12 specified2">
            <div class="contain-search">    
                <form action="{{Route('search')}}", method="get">
                    <div class="specified3">
                        <input class="form-control form-control-sm", type="text", id="search", name="search", placeholder="Search by ID", value="{{old('search')}}">
                    </div>
                    <div class="specified4">
                        <button class="btn btn-primary btn-sm", type="submit">Search!</button>
                    </div>
                </form>
                <form action="{{Route('search_name')}}", method="get">
                    <div class="specified4">
                        <input class="form-control form-control-sm", type="text", id="search_name", name="search", placeholder="Search by surname", value="{{old('search_name')}}">
                    </div>
                    <div class="specified4">
                        <button class="btn btn-primary btn-sm", type="submit">Search!</button>
                    </div>
                </form>
            </div>
            <div class="contain-links">
                <p class="btn btn-primary btn-sm inline-block"><a href="{{Route('ifso_baseline')}}">Get IFSO baseline</a></p>
                <p class="btn btn-primary btn-sm inline-block"><a href="{{Route('ifso_followup')}}">Get IFSO followup</a></p>
            </div>
        </div>
    </div>
</div>    
<div class="col-12 text-center">
        <h2>General data</h2>
        <div class="col-12 text-justify">
            <a href="{{Route('patients.create')}}">Add primary patient data</a>
        </div>
        <div class="pagination-center">{{$patients->links()}}</div>
        <!--Таблица основных данных пациентов. Данные из модели передаются контроллером-->
        <table class="table table-hover table-bordered table-responsive", width="100%">
            <tr>
                <th class="text-center id", scope="col">Card ID</th>
                <th class="text-center name", scope="col">Surname</th>
                <th class="text-center name", scope="col">First Name</th>
                <th class="text-center name", scope="col">Last Name</th>
                <th class="text-center w35", scope="col"><a href="{{Route('chart')}}?param=sex", target="iframe_main">Gender</a></th>
                <th class="text-center date", scope="col">Birth date</th>
                <th class="text-center w35", scope="col"><a href="{{Route('chart')}}?param=age", target="iframe_main">Age</a></th>
                <th class="text-center w45", scope="col">Height</th>
                <th class="text-center w70", scope="col"><a href="{{Route('chart')}}?param=country", target="iframe_main">Country</a></th>
                <th class="text-center w70", scope="col">Adress</th>
                <th class="text-center w70", scope="col">Phone</th>
                <th class="text-center w150 nooverflow", scope="col"><a href="{{Route('chart')}}?param=diagnosis", target="iframe_main">Diagnosis</a></th>
                <th class="text-center risk", scope="col"><a href="{{Route('chart')}}?param=risk", target="iframe_main">Risk</a></th>
                <th class="text-center w150 nooverflow", scope="col"><a href="{{Route('chart')}}?param=surgery", target="iframe_main">Surgery</a></th>
                <th class="text-center date", scope="col">Surgery date</th>
                <th class="text-center w45", scope="col"><a href="{{Route('chart')}}?param=surgeryduration", target="iframe_main">Surgery duration</a></th>
                <th class="text-center w150 nooverflow", scope="col"><a href="{{Route('chart')}}?param=complicated", target="iframe_main">Complications</a></th>
                <th class="text-center date", scope="col">Discharge date</th>
                <th class="text-center actions", scope="col">Actions</th>
            </tr>
            @foreach ($patients as $patient)
            <tr>
                <td class="id"><a href="{{Route('patients.show', $patient->id)}}">{{$patient->id}}</a></td>
                <td class="name wordbreak"><a href="{{Route('patients.show', $patient->id)}}">{{$patient->surname}}</a></td>
                <td class="name wordbreak"><a href="{{Route('patients.show', $patient->id)}}">{{$patient->firstname}}</a></td>
                <td class="name wordbreak"><a href="{{Route('patients.show', $patient->id)}}">{{$patient->lastname}}</a></td>
                <td class="w35 nooverflow">{{$patient->sex}}</td>
                <td class="date">{{$patient->birthdate}}</td>
                <td class="w35 nooverflow">{{$patient->age}}</td>
                <td class="w45 nooverflow">{{$patient->height}}</td>
                <td class="w70 wordbreak">{{$patient->country}}</td>
                <td class="w70 wordbreak h100">{{$patient->adress}}</td>
                <td class="w70 wordbreak h100">{{$patient->phone}}</td>
                <td class="wordbreak w150 h100">{{$patient->describediagnosis}}</td>
                <td class="risk">{{$patient->risk}}</td>
                <td class="wordbreak w150 h100">{{$patient->describesurgery}}</td>
                <td class="date">{{$patient->surgerydate}}</td>
                <td class="w45 nooverflow">{{$patient->surgeryduration}}</td>
                <td class="wordbreak w150 h100">{{$patient->describecomplications}}</td>
                <td class="date">{{$patient->dischargedate}}</td>
                <td class="action2"><button><a href="{{Route('patients.edit', $patient->id)}}">Edit</a></button></td>
                <td class="action2">
                    <form action="{{Route('patients.destroy', $patient->id)}}", method="post">
                      @csrf
                      <input type="hidden", name="_method", value="DELETE">
                      <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <br>
        <!--Отображает список страниц при количестве записей более 50-->
        <div class="pagination-center">{{$patients->links()}}</div>
</div>
<div class="records-count">
   Records found: {{$patients->count()}}
</div>
<x-footer/>
@endsection 