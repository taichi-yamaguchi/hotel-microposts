@extends('layouts.app')

@section('content')

<div class="search">
    {!! Form::open(['route' => 'search.searchindex', 'method' => 'get']) !!}
        <div class="form-group">
            {!! Form::label('text', 'キーワード:') !!}
            {!! Form::text('keyword' ,'', ['class' => 'form-control'] ) !!}
        </div>
        {!! Form::submit('検索', ['class' => 'btn btn-primary btn-block']) !!}
    {!! Form::close() !!}
</div>

@endsection