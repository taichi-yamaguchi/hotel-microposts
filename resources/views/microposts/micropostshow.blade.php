@extends('layouts.app')

@section('content')

<div class="list-star">
  <div class="post">
    <div class="image-box col-sm-7">
        @if($micropost->getImagecount()==1)
          <div class="micropostshow-img1">
            <img class="micropostshow-img" src="{{$micropost->image1}}" alt="投稿画像">
          </div>
        @elseif($micropost->getImagecount()==2)
          <div id="example-2" class="carousel slide" data-ride="carousel" >
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="micropostshow-img" src="{{$micropost->image1}}" alt="投稿画像">
              </div>
              <div class="carousel-item">
                <img class="micropostshow-img" src="{{$micropost->image2}}" alt="投稿画像">
              </div>
              <ol class="carousel-indicators">
                <li data-target="#example-2" data-slide-to="0" class="active"></li>
                <li data-target="#example-2" data-slide-to="1"></li>
              </ol>
            </div>
          </div>
        @elseif($micropost->getImagecount()==3)
          <div id="example-2" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="micropostshow-img" src="{{$micropost->image1}}" alt="投稿画像">
              </div>
              <div class="carousel-item">
                <img class="micropostshow-img" src="{{$micropost->image2}}" alt="投稿画像">
              </div>
              <div class="carousel-item">
                <img class="micropostshow-img" src="{{$micropost->image3}}" alt="投稿画像">
              </div>
              <ol class="carousel-indicators">
                <li data-target="#example-2" data-slide-to="0" class="active"></li>
                <li data-target="#example-2" data-slide-to="1"></li>
                <li data-target="#example-2" data-slide-to="2"></li>
              </ol>
            </div>
          </div>
        @elseif($micropost->getImagecount()==4)
          <div id="example-2" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="micropostshow-img" src="{{$micropost->image1}}" alt="投稿画像">
              </div>
              <div class="carousel-item">
                <img class="micropostshow-img" src="{{$micropost->image2}}" alt="投稿画像">
              </div>
              <div class="carousel-item">
                <img class="micropostshow-img" src="{{$micropost->image3}}" alt="投稿画像">
              </div>
              <div class="carousel-item">
                <img class="micropostshow-img" src="{{$micropost->image4}}" alt="投稿画像">
              </div>
              <ol class="carousel-indicators">
                <li data-target="#example-2" data-slide-to="0" class="active"></li>
                <li data-target="#example-2" data-slide-to="1"></li>
                <li data-target="#example-2" data-slide-to="2"></li>
                <li data-target="#example-2" data-slide-to="3"></li>
              </ol>
            </div>
          </div>
                    
        @endif
      <div class="field-box col-sm-6" style="width: 100%;">
        <div class="field">
          <div class="field-title">ホテル名</div>
          <div class="hotel-name">{{$micropost->hotel_name}}</div>
        </div>
        <div class="field">
          <div class="location-box">
            <div class="itag">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="prefecture">{{$micropost->prefecture}}</div>
          </div>
        </div>
        <div class="field">
          <div class="field-title">コメント</div>
          <div class="ccontent">{!! nl2br(e($micropost->content)) !!}</div>
        </div>
        <div class="field">
          <div class="field-title">料金</div>
          <div class="price"><span>一泊あたり</span>¥{{number_format($micropost->price)}}</div>
        </div>
        <div class="field">
          <div class="field-title">評価</div>
          <star-rating star-size="20" show-rating="false" read-only="true" v-bind:rating="{{ $micropost->evaluate }}"></star-rating>
        </div>
      </div>
    </div>
  </div>
  <!--Vueを呼ぶJSを読み込む -->
  <!--assetでpublicディレクトリのパスを返す -->
  <script src="{{ asset('js/app.js') }}" async></script>
</div>
@endsection