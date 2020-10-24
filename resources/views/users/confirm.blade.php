@extends('layouts.app')

@section('content')

<div class="confirm-page">
    <h4>本当に退会されますか？</h4>
    <div class="confirm-btn">
        <div class="confirm-delete">
            {!! Form::open(['method'=>'DELETE', 'action'=>['UsersController@destroy', Auth::id()]]) !!}
            <!--{{ csrf_field()}}-->
            {!! Form::submit('退会する', ['class'=>'confirm-delete-user']) !!}
            {!! Form::close() !!}
        </div>
        <div class="confirm-back">
            <a class="confirm-back-user" href="/">戻る</a>
        </div>
    </div>
</div>

@endsection('content')