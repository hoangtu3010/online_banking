<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table = "branches";

    protected $fillable = [
      "name",
      "address",
        "created_at",
        "updated_at"
    ];

    public function User(){
        return $this->hasMany(User::class);
    }
}
