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
        return view("welcome.welcome", [
            "news"=>$news,
            "comments"=>$comment
        ]);
    }

    public function newsDetail($id){
        News::findOrFaild($id);

    }
    public function blog(){
        return view("welcome.blog");
    }
    public function contactUs(){
       return view("welcome.contact-us");

    }
    public function aboutUs(){
        return view("welcome.about-us");
    }

}

