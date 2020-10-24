@extends('layouts.app')

@section('content')
    <div class="setbox">
        <h3>ユーザー設定</h3>
        <div class="row">
            <div class="col-6">
                {!! Form::model($user, ['route' => ['users.update',$user->id], 'method' => 'put']) !!}
    
                    <div class="form-group">
                        {!! Form::label('user_name', 'ユーザー名:') !!}
                        {!! Form::text('user_name', null, ['class' => 'form-control']) !!}
                    </div>

                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
    
                {!! Form::close() !!}
            </div>
        </div>
        <div class="user-delete">
            <p>
                ※退会は
                {{-- 退会ページへのリンク --}}
                {!! link_to_route('user.confirm', 'こちら', [], ['class' => 'user-delete-btn']) !!}
                から
            </p>
        </div>
     </div>

@endsection('content')