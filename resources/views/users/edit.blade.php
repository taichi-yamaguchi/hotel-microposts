@extends(layouts.app)

@section('content')
   <h1>ユーザー設定</h1>
   <div class="row">
        <div class="col-6">
            {!! Form::model($user, ['route' => ['users.update',$user->id], 'method' => put]) !!}

                <div class="form-group">
                    {!! Form::label('user_name', 'メッセージ:') !!}
                    {!! Form::text('user_name', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection('content')