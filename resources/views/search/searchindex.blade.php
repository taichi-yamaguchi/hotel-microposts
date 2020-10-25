@extends('layouts.app')

@section('content')

<div class="search">
  {!! Form::open(['route' => 'search.searchindex', 'method' => 'get']) !!}
    <div class="form-group">
      {!! Form::label('text', 'キーワード:') !!}
      {!! Form::text('keyword' ,$keyword, ['class' => 'form-control'] ) !!}
    </div>
    {!! Form::submit('検索', ['class' => 'btn btn-primary btn-block']) !!}
  {!! Form::close() !!}
  @if($datas != '')
  <div class="container search-page">
    <div class="list-star row">
          @foreach($datas as $data)
            <div class="post col-sm-4">
              <a href="{{ route('microposts.show', ['micropost' => $data->id]) }}" class="text-secondary">
                <div class="card" style="width: 100%;">
                  @if($data->getImagecount()==1)
                    <div class="img1">
                      <img class="card-img-top" src="{{$data->image1}}" alt="投稿画像">
                    </div>
                  @elseif($data->getImagecount()==2)
                    <div class="img-box">
                      <div class="img2">
                        <img class="card-img-top" src="{{$data->image1}}" alt="投稿画像">
                      </div>
                      <div class="img2">
                        <img class="card-img-top" src="{{$data->image2}}" alt="投稿画像">
                      </div>
                    </div>
                  @elseif($data->getImagecount()==3)
                    <div class="img-box">
                      <div class="img3">
                        <img class="card-img-half"src="{{$data->image1}}" alt="投稿画像">
                      </div>
                      <div class="img3">
                        <img class="card-img-half"  src="{{$data->image2}}" alt="投稿画像">
                      </div>
                    </div>
                    <div class="img-row-3">
                      <img class="card-img-half"  src="{{$data->image3}}" alt="投稿画像">
                    </div>
                  @elseif($data->getImagecount()==4)
                    <div class="img-box">
                      <div class="img4">
                        <img class="card-img-half" src="{{$data->image1}}" alt="投稿画像">
                      </div>
                      <div class="img4">
                        <img class="card-img-half"  src="{{$data->image2}}" alt="投稿画像">
                      </div>
                    </div>
                    <div class="img-box">
                      <div class="img4">
                        <img class="card-img-half"   src="{{$data->image3}}" alt="投稿画像">
                      </div>
                      <div class="img4">
                        <img class="card-img-half"  src="{{$data->image4}}" alt="投稿画像">
                      </div>
                    </div>
                  @endif
                </div>
                <div class="card text-box" style="width: 100%;">
                  <div class="card-body">
                    <h4 class="card-title">{{$data->hotel_name}}</h4>
                    <div class="location-box">
                      <div class="itag">
                        <i class="fas fa-map-marker-alt"></i>
                      </div>
                      <div class="prefecture">
                        <p class="card-text">{{$data->prefecture}}</p>
                      </div>
                    </div>
                    <p class="card-text">{{mb_strimwidth("$data->content",0,70,"...")}}</p>
                    <p class="card-text"><span class="price-text">一泊あたり</span><br>¥{{$data->price}}</p>
                    <star-rating star-size="20" show-rating="false" read-only="true" v-bind:rating="{{ $data->evaluate }}"></star-rating>
                  </div>
                  <div class="favorite-box">
                    @if (Auth::user()->is_favorite($data->id))
                      {{-- お気に入りを外すボタンのフォーム --}}
                      {!! Form::open(['route' => ['favorites.unfavorite', $data->id], 'method' => 'delete']) !!}
                        {!! Form::button('<i class="fas fa-plane unfavorite"></i>', ['class' => 'btn unfavorite' , 'type' => 'submit']) !!}
                      {!! Form::close() !!}
                    @else
                      {{-- お気に入りをするボタンのフォーム --}}
                      {!! Form::open(['route' => ['favorites.favorite', $data->id]]) !!}
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
  @else
   <p class="mt-3">{{ $keyword }}に一致する検索結果はありませんでした。</p>
   
   @endif

</div>

<div class="microposts-page">
   {{ $datas->appends(Request::only('keyword'))->links() }}
</div>

@endsection

  
  
