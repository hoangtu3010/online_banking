<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerInfo extends Model
{
    use HasFactory;

    protected $table = "customer_info";

    protected $fillable = [
        "image",
        "name",
        "birthday",
        "address",
        "tel",
        "cmnd",
        "user_id",
        "created_at",
        "updated_at"
    ];

    public function User(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function getImage(){
        if ($this->image){
            return asset("upload/".$this->image);
        }
        return asset("upload/default.png");
    }
}
