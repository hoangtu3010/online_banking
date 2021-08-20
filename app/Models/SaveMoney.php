<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveMoney extends Model
{
    use HasFactory;
    protected $table ='savemoney';
    protected $fillable =[
        'stk',
        'money',
        'timeSave',
        'code',
        'bankAcc_id',
    ];
    public function BankAcc(){
        return $this->belongsTo(BankAccount::class, "bankAcc_id");
    }

}
