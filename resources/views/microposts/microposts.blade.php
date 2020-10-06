@foreach($microposts as $micropost)
  <div class="post">
    <a href="#" class="text-secondary">
      <div class="card mx-auto" style="width: 18rem;">
        <img class="card-img-top" width="100%" height="180" src="{{$micropost->image1}}" alt="投稿画像">
        <img class="card-img-top" width="100%" height="180" src="{{$micropost->image2}}" alt="投稿画像">
        <img class="card-img-top" width="100%" height="180" src="{{$micropost->image3}}" alt="投稿画像">
        <img class="card-img-top" width="100%" height="180" src="{{$micropost->image4}}" alt="投稿画像">
        <div class="card-body">
          <h4 class="card-title">{{$micropost->hotel_name}}</h4>
        </div>
        <div class="card-body mt-1">
          <p class="card-text">{{$micropost->prefecture}}</p>
        </div>
        <div class="card-body mt-1">
          <p class="card-text">{{$micropost->content}}</p>
        </div>
        <div class="card-body mt-1">
          <p class="card-text">{{$micropost->price}}</p>
        </div>
        <div class="card-body mt-1">
          <star-rating v-bind:rating="{{ $micropost->evaluate }}">
        </div>
      </div>
    </a>
  </div>
@endforeach
