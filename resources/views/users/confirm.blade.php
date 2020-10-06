@extends('layouts.app')

@section('content')

<div class="box">
   <h4>本当に退会されますか？</h4>
   <div class="container">
       <div class="row">
           <div class="col-sm-2">
               {!! Form::open(['method'=>'DELETE', 'action'=>['UsersController@destroy', Auth::id()]]) !!}
                <!--{{ csrf_field()}}-->
                    <div class="form-group">
                        {!! Form::submit('退会する', ['class'=>'btn btn-danger']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
            
            <div class="col-sm-2">
                <a class="btn btn-primary" href="/">戻る</a>
            </div>
        </div>
    </div>
</div>



@endsection('content')