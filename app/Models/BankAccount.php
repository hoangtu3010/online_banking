<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;

    protected $table = "bank_account";

    protected $fillable = [
        "stk",
        "balance",
        "status",
        "password",
        "user_id"
    ];
    protected $hidden=[
        "password"
    ];

    public function User(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function Transactions(){
        return $this->hasMany(Transaction::class);
    }

}
