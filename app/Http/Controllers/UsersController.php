<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function edit($id)
    {
        //idの値でユーザーを検索して取得
        $user = User::findOrfail($id);
        
        //メッセージ編集Viewで」それらを表示
        return view('users.edit', [
            'user' => $user]);
        
    }
    
    public function update(Request $request, $id)
    {
       //idの値でユーザーを検索して取得
        $user = User::findOrfail($id); 
        
        //メッセージを更新
        $user -> user_name = $request -> user_name;
        $user -> save();
        
        //トップページにリダイレクト
        return redirect('/');
    }
    
    public function destroy($id)
    {
        // idの値でメッセージを検索して取得
        $user = User::findOrfail($id);
        //ユーザーを消去
        $user->delete();
        
        //トップページへリダイレクト
        return redirect('/');
        
    }
    public function confirm()
    {
        // //idの値でユーザーを検索して取得
        // $user = User::findOrfail($id);
        
        //退会確認画面Viewでそれらを表示
        return view('users.confirm');
        
    }
    
    public function show($id)
    {
        //idの値でユーザーを検索して取得
        $user = User::findOrfail($id);
        
        //モデルの件数をダウンロード
        $user->loadRelationshipCounts();
        
        
        //ユーザーの投稿を取得して降順で取得
        $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(12);
    
        
        //それらをユーザー詳細で表示
        return view('users.show', [
            'user' => $user,
            'microposts' => $microposts,
            ]);
    }
    
    public function followings($id){
        //idの値でユーザーを検索して取得
        $user = User::findOrFail($id);
        
        //モデルの件数をダウンロード
        $user->loadRelationshipCounts();
        
        $followings = $user->followings()->get();
        
        //viewでそれらを表示
        return view('users.followcount',[
            'user' => $user,
            'users' => $followings,
            ]);
    }
    
    public function followers($id){
        //idの値でユーザーを検索して取得
        $user = User::findOrFail($id);
        
        //モデルの件数をダウンロード
        $user->loadRelationshipCounts();
        
        $followers = $user->followers()->get();
        
        //viewでそれらを表示
        return view('users.followercount',[
            'user' => $user,
            'users' => $followers,
            ]);
    }
    
    public function favorites($id)
    {
        $user = User::findOrFail($id);
        
        $user->loadRelationshipCounts();
        
        $favorites = $user->favorites()->paginate(12);
        
        return view('users.favorites',[
            'user' => $user,
            'microposts' => $favorites,
            ]);
    }
   
    
    
}
