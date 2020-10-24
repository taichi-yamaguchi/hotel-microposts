@extends('layouts.app')

@section('content')

<div class="username-title">
    <p>{{$user->user_name}}さんのマイページ</p>
</div>


{{-- フォロー一覧表示 --}}
<a href="{{ route('user.followings',['id' => $user->id]) }}">
     フォロー中
     <span class="badge badge-secondary">{{ $user->followings_count }}</span>
</a>

{{-- フォロワー一覧表示 --}}
<a href="{{ route('user.followers',['id' => $user->id]) }}">
     フォロワー
     <span class="badge badge-secondary">{{ $user->followers_count }}</span>
</a>


<ul class="nav nav-tabs nav-justified bg-light">
    {{-- フォローしている人の投稿 --}}
    <li class="nav-item">
        <a href="{{ route('microposts.followindex') }}" class="nav-link {{ Request::routeIs('microposts.followindex') ? 'active' : '' }}">
              <i class="far fa-address-book"></i>タイムライン
        </a>
    </li>
    {{-- 過去の投稿 --}}
    <li class="nav-item">
        <a href="{{ route('users.show',['user' => Auth::id()]) }}" class="nav-link {{ Request::routeIs('users.show') ? 'active' : '' }}">
             <i class="fas fa-shoe-prints"></i>過去の投稿
        </a>
    </li>
        
</ul>

@include('microposts.microposts')

@endsection

  
  
