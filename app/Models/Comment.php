<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = "comments";

    protected $fillable = [
        "customer_name",
        "customer_image",
        "user_email",
        "content",
        "reply_id",
        "new_id",
    ];

    public function getImage(){
        if ($this->image){
            return asset("upload/".$this->customer_image);
        }
        return asset("upload/default-customer.png");
    }

    public function News(){
        return $this->belongsTo(News::class, "new_id");
    }
}
