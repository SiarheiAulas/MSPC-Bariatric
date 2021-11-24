<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientsController extends Controller
{
    // все методы реализуют сортировку данных из таблицы `patients` по значениям полей и пагинацию по 50 на страницу. Данные передаются представлению main
    public function nosurgery() {
        $patients=DB::table('patients')->where('surgery','nosurgery')->paginate(50);
        return view('main', compact('patients'));
    }
    
    public function lsg(){
        $patients=DB::table('patients')->where('surgery', 'lsg')->paginate(50);
        return view('main', compact('patients'));
    }
    
     public function mgb(){
        $patients=DB::table('patients')->where('surgery', 'mgb')->paginate(50);
        return view('main', compact('patients'));
    }
     public function rygb(){
        $patients=DB::table('patients')->where('surgery', 'rygb')->paginate(50);
        return view('main', compact('patients'));
    }
     public function lagb(){
        $patients=DB::table('patients')->where('surgery', 'lagb')->paginate(50);
        return view('main', compact('patients'));
    }
     public function gp(){
        $patients=DB::table('patients')->where('surgery', 'gp')->paginate(50);
        return view('main', compact('patients'));
    }
     public function other(){
        $patients=DB::table('patients')->where('surgery', 'other')->paginate(50);
        return view('main', compact('patients'));
    }
     public function primary(){
        $patients=DB::table('patients')->where('surgerytype', 'primary')->paginate(50);
        return view('main', compact('patients'));
    }
     public function secondary(){
        $patients=DB::table('patients')->where('surgerytype', 'secondary')->paginate(50);
        return view('main', compact('patients'));
    }
     public function simultaneous(){
        $patients=DB::table('patients')->where('simultaneous', '1')->paginate(50);
        return view('main', compact('patients'));
    }
     public function notsimultaneous(){
        $patients=DB::table('patients')->where('simultaneous', '0')->paginate(50);
        return view('main', compact('patients'));
    }
     public function complicated(){
        $patients=DB::table('patients')->where('complicated', '1')->paginate(50);
        return view('main', compact('patients'));
    }
     public function uncomplicated(){
        $patients=DB::table('patients')->where('complicated', '0')->paginate(50);
        return view('main', compact('patients'));
    }
     public function obes0(){
        $patients=DB::table('patients')->where('diagnosis', '0')->paginate(50);
        return view('main', compact('patients'));
    }
     public function obes1(){
        $patients=DB::table('patients')->where('diagnosis', '1')->paginate(50);
        return view('main', compact('patients'));
    }
     public function obes2(){
        $patients=DB::table('patients')->where('diagnosis', '2')->paginate(50);
        return view('main', compact('patients'));
    }
     public function obes3(){
        $patients=DB::table('patients')->where('diagnosis', '3')->paginate(50);
        return view('main', compact('patients'));
    }
}
