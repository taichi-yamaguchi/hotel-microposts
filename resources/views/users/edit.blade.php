@extends('layouts.app')

@section('content')
    <div class="setbox">
       <h3>ユーザー設定</h3
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
        <div class="mt-5">
            <h4>退会ページへ</h4>
            {{-- 退会ページへのリンク --}}
            {!! link_to_route('user.confirm', '退会', [], ['class' => 'nav-link']) !!}</li>
        </div>
     </div>

@endsection('content')