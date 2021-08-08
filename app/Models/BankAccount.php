<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class BankAccount extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $table = "bank_account";
    protected $guarded="bank";

    protected $fillable = [
        "stk",
        "balance",
        "status",
        "password",
        "user_id",
        "created_at",
        "updated_at"
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
