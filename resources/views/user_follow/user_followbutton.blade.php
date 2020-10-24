@if(Auth::id() != $micropost->user_id)
    @if(Auth::user() -> is_following($micropost->user_id))
        {{-- アンフォローボタン --}}
        {!! Form::open(['route' => ['user.unfollow',$micropost->user_id], 'method' => 'delete']) !!}
            {!! Form::submit('フォローを外す',['class' => "user-unfollow"]) !!}
        {!! Form::close() !!}
    @else
        {{-- フォローボタン --}}
        {!! Form::open(['route' => ['user.follow',$micropost->user_id]]) !!}
            {!! Form::submit('フォローする',['class' => "user-follow"]) !!}
        {!! Form::close() !!}
    @endif
@endif