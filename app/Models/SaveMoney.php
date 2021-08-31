<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveMoney extends Model
{
    use HasFactory;
    protected $table ='SaveMoney';
    protected $fillable =[
        'stk',
        'money',
        'permission',
        'bankAcc_id',
        'package_id'
    ];

    public function BankAcc(){
        return $this->belongsTo(BankAccount::class, "bankAcc_id");
    }

    public function Package(){
        return $this->belongsTo(SavingsPackage::class, "package_id");
    }
}
