<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Micropost;

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
         
        if ($request->image1 != null)
        {
             $image1 = $request->file('image1');
             
             $path1 = Storage::disk('s3')->putFile('myprefix', $image1, 'public');
             
             /* ファイルパスから参照するURLを生成する */
             $url1 = Storage::disk('s3')->url($path1);
        }
         if ($request->image2 != null)
        {
             $image2 = $request->file('image2');
             
             $path2 = Storage::disk('s3')->putFile('myprefix', $image2, 'public');
             
             /* ファイルパスから参照するURLを生成する */
             $url2 = Storage::disk('s3')->url($path2);
        }
        else
        {
         $url2=null;
         
        }
         if ($request->image3 != null)
        {
             $image3 = $request->file('image3');
             
             $path3 = Storage::disk('s3')->putFile('myprefix', $image3, 'public');
             
             /* ファイルパスから参照するURLを生成する */
             $url3 = Storage::disk('s3')->url($path3);
        }
        else
        {
         $url3=null;
         
        }
         if ($request->image4 != null)
        {
             $image4 = $request->file('image4');
             
             $path4 = Storage::disk('s3')->putFile('myprefix', $image4, 'public');
             
             /* ファイルパスから参照するURLを生成する */
             $url4 = Storage::disk('s3')->url($path4);
        }
        else
        {
         $url4=null;
         
        }
         
        //認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）    
        $request->user()->microposts()->create
        ([
            'image1' => $url1,
            'image2' => $url2,
            'image3' => $url3,
            'image4' => $url4,
            'hotel_name' => $request->hotel_name,
            'content' => $request->content,
            'prefecture' => $request->prefecture,
            'price' => $request->price,
            'evaluate' => $request->evaluate,
        ]);
        
       
        
        
       //トップページへリダイレクト
        return redirect('/');
    }
    
    public function show($id){
     
       //idの値で投稿を検索して取得
        $micropost = Micropost::findOrfail($id);
        
         return view('microposts.micropostshow', [
            'micropost' => $micropost,
            ]);
        
       
    }
    
    
}


