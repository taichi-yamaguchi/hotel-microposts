<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Micropost;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
                
       
        $query = Micropost::query();
        
        $keyword = $request->input('keyword');
        
        if($request->has('keyword') && $keyword != '' ){
            
            $query->where('hotel_name', 'like', '%'.$keyword.'%')
                ->orWhere('content', 'like', '%'.$keyword.'%')
                ->orWhere('prefecture', 'like', '%'.$keyword.'%')
                ->orWhere('price', 'like', '%'.$keyword.'%')
                ->orWhere('evaluate', 'like', '%'.$keyword.'%');
                
            
            //ユーザを1ページにつき10件ずつ表示させます
            $datas = $query->paginate(12);
            
    
            return view('search.searchindex',[
                'datas' => $datas,
                'keyword' => $keyword
            ]);
        
        }
        
        else{
            
            //ユーザを1ページにつき10件ずつ表示させます
            $datas = $query->paginate(12);
            
    
            return view('search.searchindex',[
                'datas' => $datas,
                'keyword' => $keyword
            ]);
            
        }
        
    }
    
    public function search(){
        
        return view('users.searchform');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
