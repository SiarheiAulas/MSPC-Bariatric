<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Patient extends Model
{
    //модель реализует трейт Searchable, что позволяет создавать индексы по выбранным полям 
    use HasFactory, Searchable;
    
    //created_at и updated_at не нужны
    public $timestamps=false;
    
    public function toSearchableArray(){
        $array=$this->toArray();
        
        //ключи массива-поля таблицы длякоторых будут создаваться индексы
        return array('surname'=>$array['surname']);
    }
}
