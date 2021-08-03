<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "admins";

    protected $guarded = "admin";

    protected $fillable = [
        "name",
        "email",
        "password",
        "role_id",
        "created_at",
        "updated_at"
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function Role(){
        return $this->belongsTo(Role::class, "role_id");
    }
}
