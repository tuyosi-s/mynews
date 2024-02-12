<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//以下の１行をつけ足すことでNews Modelが扱えるようになる
use App\Models\News;

class NewsController extends Controller
{
    //
    public function add()
    {
        return view('admin.news.create');
    }


    public function create(Request $request)
    {
       //Validationを行う
       $this->Validate($request,News::$rules);
        
       $news = new News;
       $form = $request->all();
       
       // フォームから画像が送信されてきたら、保存し、$news->image_path に画像のパスを保存する
       if (isset($form['image'])) {
           $path = $request->file('image')->store('public/image');
           $news->image_path = basename($path);
        } else {
            $news->image_path = null;
        }
       
       
       //フォームから送信されてきた_tokenを削除する
       unset($form['_token']);
       //フォームから送信されてきたimageを削除する
       unset($form['image']);
       
       //データベースに保存する
       $news->fill($form);
       $news->save();
        
       
        
       //admin/news/createにダイレクトする
       return redirect('admin/news/create');
    }
    //No.25 以下記述
    public function index(Request $request)
    {
       $cond_title = $request->cond_title;
       // //もしcond_titleの中になにもなければ、
       if($cond_title != ''){
       //Newsテーブルの中のtitleカラムに$cond_title（ユーザーの入力した文字）と一致するレコードをすべて取得し、変数postに入れる
           $posts = News::where('title,$cond_title')->get();
       } else {
           //データベースに保存されるNewsテーブルのレコードを全て取得し、変数postに入れる
           $posts = News::all();
       }
    return view('admin.news.index',['posts' =>$posts,'cond_title' =>$cond_title]);
    }
    
    //ベーシックタームNo.27にて下記を追加。
    public function edit(Request $request)
    {
        //dd($request->id);
        // News Modelからデータを取得
        $news = News::find($request->id);
        if(empty($news)){
            abort(404);
        }
        return view('admin.news.edit',['news_form' => $news]);
    }
    
    public function update(Request $request)
    {
         //Validationをかける
         $this->validate($request,News::$reles);
         //News　Model　からデータを取得する
         $news = News::find($request->id);
         //送信さてきたフォームデータを変数$news_form格納する
         $news_form = $request->all();
         
         
         if($request->remove =='true'){
             $news_form['image_path'] = null;
         }elseif ($request->file('image')){
             $path = $request->file('image')->store('public/image');
             $news_form['image_path'] = basename($path);
         }else{
             $news_form['image_path'] = $news->image_path;
         }
         //$form変数で不必要な連想配列（'image','remove','_token' を削除する
         unset($news_form['image']);
         unset($news_form['remove']);
         unset($news_form['_token']);
         //fillメソッドで配列されたデータを各カラムに入れる
         $news->fill($news_form)->save();
         //saveメソッドで保存
         return redirect('admin/news');
    }
    
    public function delete(Request $request)
    {
        //該当するNews Modelを取得
        $news = News::find($request->id);
        //削除
        $news->delete();
        
        return redirect('admin/news/');

    }
    
    
}