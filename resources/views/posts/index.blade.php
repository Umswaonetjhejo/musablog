@section('title', 'Home')
@extends('layouts.app')

@section('content')

    @foreach ($posts as $post)
        @include('error.summary')
    @endforeach

@endsection