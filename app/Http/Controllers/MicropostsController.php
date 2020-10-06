<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Micropost;

class MicropostsController extends Controller
{   
    public function index()
    {
        
    }
    
    public function create()
    {
       //投稿画面Viewでそれらを表示
        return view('microposts.form'); 
    }
    
    public function store(Request $request)
    {
         // バリデーション
        $request->validate
        ([
            'image1' => 'required',
            'hotel_name' => 'required|max:255',
            'content' => 'required|max:255',
            'prefecture' => 'required|max:255',
            'price' => 'required|max:255',
            'evaluate' => 'required|max:5'
         ]);
         
        //認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）    
        $request->user()->microposts()->create
        ([
            'image1' => $request->image1,
            'image2' => $request->image2,
            'image3' => $request->image3,
            'image4' => $request->image4,
            'hotel_name' => $request->hotel_name,
            'content' => $request->content,
            'prefecture' => $request->prefecture,
            'price' => $request->price,
            'evaluate' => $request->evaluate,
        ]);
        
       //トップページへリダイレクト
        return redirect('/');
    }
}


