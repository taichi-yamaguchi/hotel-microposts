<div class="fixed-bottom">
    <footer>
        <ul class="nav nav-tabs nav-justified bg-light">
            {{-- タイムライン --}}
            <li class="nav-item">
                <a href="#" class="nav-link">
                     <i class="fas fa-home"></i>  
                </a>
            </li>
            {{-- 検索 --}}
            <li class="nav-item">
                <a href="#" class="nav-link">
                      <i class="fas fa-search"></i>
                </a>
            </li>
            {{-- お気に入り --}}
            <li class="nav-item">
                <a href="#" class="nav-link">
                      <i class="fas fa-plane"></i>
                </a>
            </li>
            {{-- マイページ --}}
            <li class="nav-item">
                @if (Auth::check())
                    <a href="{{ route('users.show', ['user' => Auth::id()]) }}" class="nav-link {{ Request::routeIs('users.show') ? 'active' : '' }}">
                          <i class="fas fa-user"></i>
                    </a>
                @else
                    <a href="{{ route('login')}}">
                          <i class="fas fa-user"></i>
                    </a>
                @endif
                
            </li>
            
        </ul>
    </footer>
</div>