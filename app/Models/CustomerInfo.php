<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerInfo extends Model
{
    use HasFactory;

    protected $table = "customer_info";

    protected $fillable = [
        "name",
        "birthday",
        "tel",
        "cmnd",
        "user_id"
    ];

    public function User(){
        return $this->belongsTo(User::class, "user_id");
    }
}
