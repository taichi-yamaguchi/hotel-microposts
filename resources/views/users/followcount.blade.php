@extends('layouts.app')


@section('content')
<div class="count-page">
    <div class="count-title">
        <h5>フォロー一覧</h5>
    </div>
    <div class="follow-user-index">
        @foreach($users as $user)
            <a href="{{ route('users.show', ['user' => $user->id]) }}" class="follow-user-one">
                    <div class="follow-user-name">
                        {{ $user -> user_name }}
                    </div>
                    <div class="follow-user-btn">
                        @if(Auth::user() -> is_following($user->id))
                            {{-- アンフォローボタン --}}
                            {!! Form::open(['route' => ['user.unfollow',$user->id], 'method' => 'delete']) !!}
                                {!! Form::submit('フォローを外す',['class' => "user-unfollow"]) !!}
                            {!! Form::close() !!}
                        @else
                            {{-- フォローボタン --}}
                            {!! Form::open(['route' => ['user.follow',$user->id]]) !!}
                                {!! Form::submit('フォローする',['class' => "user-follow"]) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
            </a>
        @endforeach
    </div>
</div>
@endsection