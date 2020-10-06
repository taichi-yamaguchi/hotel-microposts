<header class="fixed-top">
    <nav class="navbar navbar-expand-sm navbar-light bg-dark">
      <a class="navbar-brand text-white" href="/">HotelTrip</a>
      <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Menu
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @if (Auth::check())
                   {{-- 投稿ページへのリンク --}}
                   <li class="dropdown-item">{!! link_to_route('microposts.create', '投稿', [], ['class' => 'nav-link']) !!}</li>
                    {{-- ログアウトへのリンク --}}
                　 <li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'nav-link']) !!}</li>
                    {{--ユーザー情報変更へのリンク　--}}
                    <li class="dropdown-item">{!! link_to_route('users.edit', 'ユーザー設定', ['user' => Auth::id()], ['class' => 'nav-link']) !!}</li>    
                @else
                    {{-- ユーザ登録ページへのリンク --}}
                    <li class="dropdown-item">{!! link_to_route('signup.get', '登録', [], ['class' => 'nav-link']) !!}</li>
                    {{-- ログインページへのリンク --}}
                    <li class="dropdown-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
          </li>
        </ul>
      </div>
    </nav>
</header>