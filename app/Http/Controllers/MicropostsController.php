<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Micropost;
use Intervention\Image\Facades\Image;


class MicropostsController extends Controller
{   
    public function index(){
     
     $microposts = Micropost::orderBy('created_at', 'desc')->paginate(12);
     
     return view('microposts.index',[
      'microposts' => $microposts,
      ]);
     
    }
    
    public function followindex(){
     $data = [];
     if (\Auth::check()) {
         // 認証済みユーザ（閲覧者）を取得
         $user = \Auth::user();
         
          //モデルの件数をダウンロード
        $user->loadRelationshipCounts();
        
         
         
         // ユーザとフォロー中ユーザの投稿の一覧を作成日時の降順で取得
         $microposts = $user->feed_microposts()->orderBy('created_at', 'desc')->paginate(12);
         

         $data = [
             'user' => $user,
             'microposts' => $microposts,
         ];
      }

        // ビューでそれらを表示
        return view('users.show', $data);
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
            'prefecture' => 'required|max:255|in:北海道,青森県,岩手県,宮城県,秋田県,山形県,福島県,茨城県,栃木県,群馬県,埼玉県,千葉県,東京都,神奈川県,新潟県,富山県,石川県,福井県,山梨県,長野県,岐阜県,静岡県,愛知県,三重県,滋賀県,京都府,大阪府,兵庫県,奈良県,和歌山県,鳥取県,島根県,岡山県,広島県,山口県,徳島県,香川県,愛媛県,高知県,福岡県,佐賀県,長崎県,熊本県,大分県,宮崎県,鹿児島県,沖縄県',
            'price' => 'required|max:255|numeric',
            'evaluate' => 'required|max:5'
         ]);
         
        if ($request->image1 != null)
        {
             $image1 = $request->file('image1');
             
             $resizeImage1= Image::make($image1)
                ->resize(600, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('png');
                
             
             $path1 = 'myprefix/'. uniqid(). '.png';
             Storage::disk('s3')->put($path1, (string)$resizeImage1, 'public');
             $url1 = Storage::disk('s3')->url($path1);
              


             
        }
         if ($request->image2 != null)
        {
             $image2 = $request->file('image2');
             
              
             $resizeImage2= Image::make($image2)
                ->resize(600, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('png');
                
             
             $path2 = 'myprefix/'. uniqid(). '.png';
             Storage::disk('s3')->put($path2, (string)$resizeImage2, 'public');
             $url2 = Storage::disk('s3')->url($path2);
              
        }
        else
        {
         $url2=null;
         
        }
         if ($request->image3 != null)
        {
             $image3 = $request->file('image3');
             
             $resizeImage3= Image::make($image3)
                ->resize(600, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('png');
                
             
             $path3 = 'myprefix/'. uniqid(). '.png';
             Storage::disk('s3')->put($path3, (string)$resizeImage3, 'public');
             $url3 = Storage::disk('s3')->url($path3);
              
        }
        else
        {
         $url3=null;
         
        }
         if ($request->image4 != null)
        {
             $image4 = $request->file('image4');
             
             $resizeImage4= Image::make($image4)
                ->resize(600, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('png');
                
             
             $path4 = 'myprefix/'. uniqid(). '.png';
             Storage::disk('s3')->put($path4, (string)$resizeImage4, 'public');
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
        return redirect()->route('microposts.index');
    }
    
    public function show($id){
     
      
     
       //idの値で投稿を検索して取得
        $micropost = Micropost::findOrfail($id);
        
         return view('microposts.micropostshow', [
            'micropost' => $micropost,
            ]);
        
       
    }
    
    public function destroy($id){
     
        //idの値で投稿を検索して取得
        $micropost = Micropost::findOrfail($id);
        
        //メッセージを消去
        if (\Auth::id() === $micropost->user_id){
        $micropost->delete();
        }
       
        
        //mypageにリダイレクト
        return redirect()->route('users.show', ['user' => \Auth::id()]);
    }
    
    public function followcount($id){
        //idの値でユーザーを検索して取得
        $user = User::findOrfail($id);
        
        //モデルの件数をダウンロード
        $user->loadRelationshipCounts();
        
        return view('micropost.followmicroposts',[
         'user' => $user,
         ]);
     
    }
     
    
    
    
    
}


