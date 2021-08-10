<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function getComments()
    {
        $data = Comment::with("News")->orderBy("id", "DESC")->get();
        return view("Admin.Blog.blog-comments", [
            "data" => $data
        ]);
    }

    public function getNews()
    {
        $data = News::all();
        $comment = Comment::all();
        return view("Admin.Blog.blog-news", [
            "data" => $data,
            "comments" => $comment
        ]);
    }

    public function addNews()
    {
        return view("Admin.Blog.add-news");
    }

    public function saveNews(Request $request)
    {
        $image = null;
        if ($request->has("image")) {
            $file = $request->file("image");
            $extName = $file->getClientOriginalExtension();
            $fileName = time() . "." . $extName;
            $fileSize = $file->getSize();
            $allow = ["png", "jpg", "jpeg", "gif"];
            if (in_array($extName, $allow)) {
                if ($fileSize < 25000000) {
                    try {
                        $file->move("upload", $fileName);
                        $image = $fileName;
                    } catch (\Exception $e) {
                    }

                }
            }
        }

        News::create([
            "title" => $request->get("title"),
            "image" => $image,
            "author" => $request->get("author"),
            "content" => $request->get("content"),
        ]);

        return redirect()->to("/admin/blog/news");
    }

    public function editNews($id)
    {
        $news = News::findOrFail($id);
        return view("Admin.Blog.edit-news", [
            "news" => $news
        ]);
    }

    public function updateNews(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $image = $news->__get("image");
        if ($request->has("image")) {
            $file = $request->file("image");
            $extName = $file->getClientOriginalExtension();
            $fileName = time() . "." . $extName;
            $size = $file->getSize();
            $allow = ["png", "jpg", "jpeg", "gif"];
            if (in_array($extName, $allow)) {
                if ($size < 30000000) {
                    try {
                        $file->move("upload", $fileName);
                        $image = $fileName;
                    } catch (\Exception $e) {

                    }
                }
            }
        }

        $news->update([
            "title" => $request->get("title"),
            "image" => $image,
            "author" => $request->get("author"),
            "content" => $request->get("content"),
        ]);

        return redirect()->to("/admin/blog/news");
    }

    public function deleteNews($id){
        $news = News::findOrFail($id);
        $news->delete();
        return redirect()->to("/admin/blog/news");
    }

    public function deleteComments($id){
        $cmt = Comment::findOrFail($id);
        $cmt->delete();
        return redirect()->to("/admin/blog/comments");
    }

}
