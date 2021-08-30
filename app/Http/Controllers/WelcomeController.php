<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Feedback;
use App\Models\News;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome(){
        $news = News::with("comment")->get()->sortDesc()->take(3);
        return view("welcome.welcome", [
            "news"=>$news
        ]);
    }

    public function getDetail(){
        return view("welcome.blog-detail");
    }

    public function newsDetail($id){
        $recent = News::with("comment")->get()->sortDesc()->take(3);
        $data=News::with("comment")->findOrFail($id);
        return view("welcome.blog-detail",[
            "data"=>$data,
            "recent"=>$recent
        ]);
    }

    public function sendFeedback(Request $request){
        Feedback::create([
            "name"=>$request->get("name"),
            "email"=>$request->get("email"),
            "message"=>$request->get("message"),
        ]);
        return redirect()->back();
    }

    public function blog(Request $request){
        $recent = News::with("comment")->get()->sortDesc()->take(3);
        if ($request->get("table_search") == null) {
            $news = News::with("comment")->orderBy("id", "DESC")->paginate(3);
        } else {
            $news = News::with("comment")
                ->where("title", "like", "%" . $request->get("table_search") . "%")
                ->orWhere("author", "like", "%" . $request->get("table_search") . "%")
                ->orderBy("id", "DESC")
                ->paginate(3);
        }
        return view("welcome.blog",[
            "news"=>$news,
            "recent"=>$recent,
            "search"=>$request->get("table_search")
        ]);
    }
    public function contactUs(){
       return view("welcome.contact-us");

    }
    public function aboutUs(){
        return view("welcome.about-us");
    }

}

