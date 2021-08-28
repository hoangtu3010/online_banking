<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavingsPackage extends Model
{
    use HasFactory;
     protected $table = "savings_package";

     protected $fillable = [
         "name_package",
         "time_package",
         "interest"
     ];

     public function SaveMoney(){
         return $this->hasMany(SaveMoney::class);
     }
}
