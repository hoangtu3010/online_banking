<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = "transactions";

    protected $fillable = [
        "content",
        "money",
        "sender",
        "getter",
        "bank_account_id",
        "created_at",
        "updated_at"
    ];

    public function BankAccount(){
        return $this->belongsTo(BankAccount::class, "bank_account_id");
    }
}
