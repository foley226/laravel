<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $primaryKey = 'id'; 

    protected $fillable = ['name', 'founded', 'description', 'user_id'];

    // let's hide some info for the car, for example lets hide the description of the cars

    public function carmodels() {
     return $this->hasMany(CarModel::class);
}
    public function headquarter(){
        return $this->hasOne(Headquarter::class);
    }

}
