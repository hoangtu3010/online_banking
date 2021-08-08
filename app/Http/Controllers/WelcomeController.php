<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome(){
        $news = News::all();
        $comment = Comment::all();
        return view("welcome", [
            "news"=>$news,
            "comments"=>$comment
        ]);
    }

    public function newsDetail($id){
        News::findOrFaild($id);

    }
}
