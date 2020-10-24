@extends('layouts.app')

@section('content')
    <div class="microposts-page">
        @include('microposts.microposts')
        {{ $microposts -> links() }}
    </div>

@endsection
