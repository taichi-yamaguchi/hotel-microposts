<div class="container">
  <div class="list-star row">
        @foreach($microposts as $micropost)
          <div class="post col-sm-4">
            <a href="{{ route('microposts.show', ['micropost' => $micropost->id]) }}" class="text-secondary">
              <div class="card" style="width: 100%;">
                @if($micropost->getImagecount()==1)
                  <div class="img1">
                    <img class="card-img-top" src="{{$micropost->image1}}" alt="投稿画像">
                  </div>
                @elseif($micropost->getImagecount()==2)
                  <div class="img-box">
                    <div class="img2">
                      <img class="card-img-top" src="{{$micropost->image1}}" alt="投稿画像">
                    </div>
                    <div class="img2">
                      <img class="card-img-top" src="{{$micropost->image2}}" alt="投稿画像">
                    </div>
                  </div>
                @elseif($micropost->getImagecount()==3)
                  <div class="img-box">
                    <div class="img3">
                      <img class="card-img-half"src="{{$micropost->image1}}" alt="投稿画像">
                    </div>
                    <div class="img3">
                      <img class="card-img-half"  src="{{$micropost->image2}}" alt="投稿画像">
                    </div>
                  </div>
                  <div class="img-row-3">
                    <img class="card-img-half"  src="{{$micropost->image3}}" alt="投稿画像">
                  </div>
                @elseif($micropost->getImagecount()==4)
                  <div class="img-box">
                    <div class="img4">
                      <img class="card-img-half" src="{{$micropost->image1}}" alt="投稿画像">
                    </div>
                    <div class="img4">
                      <img class="card-img-half"  src="{{$micropost->image2}}" alt="投稿画像">
                    </div>
                  </div>
                  <div class="img-box">
                    <div class="img4">
                      <img class="card-img-half"   src="{{$micropost->image3}}" alt="投稿画像">
                    </div>
                    <div class="img4">
                      <img class="card-img-half"  src="{{$micropost->image4}}" alt="投稿画像">
                    </div>
                  </div>
                @endif
              </div>
              <div class="card text-box" style="width: 100%;">
                <div class="card-body">
                  <h5 class="card-title">{{$micropost->hotel_name}}</h5>
                  <div class="location-box">
                    <div class="itag">
                      <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="prefecture">
                      <p class="card-text">{{$micropost->prefecture}}</p>
                    </div>
                  </div>
                  <p class="card-text">{{mb_strimwidth("$micropost->content",0,70,"...")}}</p>
                  <p class="card-text"><span class="price-text">一泊あたり</span><br>¥{{$micropost->price}}</p>
                  <star-rating star-size="20" show-rating="false" read-only="true" v-bind:rating="{{ $micropost->evaluate }}"></star-rating>
                </div>
                <div class="favorite-box">
                  @if (Auth::user()->is_favorite($micropost->id))
                    {{-- お気に入りを外すボタンのフォーム --}}
                    {!! Form::open(['route' => ['favorites.unfavorite', $micropost->id], 'method' => 'delete']) !!}
                      {!! Form::button('<i class="fas fa-plane unfavorite"></i>', ['class' => 'btn unfavorite' , 'type' => 'submit']) !!}
                    {!! Form::close() !!}
                  @else
                    {{-- お気に入りをするボタンのフォーム --}}
                    {!! Form::open(['route' => ['favorites.favorite', $micropost->id]]) !!}
                      {!! Form::button('<i class="fas fa-plane favorite"></i>', ['class' => 'btn favorite', 'type' => 'submit']) !!}
                    {!! Form::close() !!}
                  @endif
                </div>
              </div>
            </a>
          </div>
        @endforeach
          <!--Vueを呼ぶJSを読み込む -->
          <!--assetでpublicディレクトリのパスを返す -->
        <script src="{{ asset('js/app.js') }}" async></script>
  </div>

</div>

  
  
