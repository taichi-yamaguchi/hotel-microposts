@extends('layouts.app')

@section('content')


<div class="box">
    
     @if (count($errors) > 0)
        <ul class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <li class="ml-4">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    
    {!! Form::open(['route' => 'microposts.store','files' => true]) !!}
        <div class="form-group">
            {!! Form::label('file','画像',['class' => 'control-label', 'rows' => '2']) !!}
            <div>
                {!! Form::file('image1') !!}
            </div>
        </div>
        <div class="form-group">
             {!! Form::file('image2') !!}
        </div>
         <div class="form-group">
             {!! Form::file('image3') !!}
        </div>
         <div class="form-group">
             {!! Form::file('image4') !!}
        </div>
        <div class="form-group">
             {!! Form::label('text','ホテル名',['class' => 'control-label', 'rows' => '2']) !!}
            {!! Form::text('hotel_name',null,['class' => 'form-control', 'rows' => '2']) !!}
        </div>
         <div class="form-group">
             {!! Form::label('textarea','コメント(255文字まで)',['class' => 'control-label', 'rows' => '2']) !!}
            {!! Form::textarea('content',null,['class' => 'form-control', 'rows' => '2']) !!}
        </div>
        <div class="form-group">
             {!! Form::label('text','都道府県',['class' => 'control-label', 'rows' => '2']) !!}
            {!! Form::text('prefecture',null,['class' => 'form-control', 'rows' => '2']) !!}
        </div>
        <div class="form-group">
             {!! Form::label('text','一泊あたりの料金',['class' => 'control-label', 'rows' => '2']) !!}
            {!! Form::text('price',null,['class' => 'form-control', 'rows' => '2']) !!}
        </div>
        <div id="star">
          <label for="star">評価</label> 
        　<star-rating :star-size="20" v-model="rating" :show-rating="false" ></star-rating>
        　 <!--//選択した星の値をhiddenで送信する。「:value="rating"」で値を取得する -->
        　<input type="hidden" name="evaluate" :value="rating"/ id="star">
        </div>
         <!--Vueを呼ぶJSを読み込む -->
         <!--assetでpublicディレクトリのパスを返す -->
        <script src="{{ asset('js/app.js') }}" async></script>
        
        {!! Form::submit('投稿', ['class' => 'btn btn-primary btn-block mt-5']) !!}
    
    {!! Form::close() !!}

</div>

@endsection