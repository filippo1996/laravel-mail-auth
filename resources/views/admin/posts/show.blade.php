@extends('layouts.admin')

@section('content')

    <!-- start title page -->
    <x-admin.title title="Show Post"/>
    <!-- end title page -->

    <div class="bg-light p-5 rounded">
        <h1>{{ $post->title }}</h1>
        <p class="lead">{{ $post->content }}</p>
        <a class="btn btn-lg btn-primary" href="#" role="button">Slug {{ $post->slug }}</a>
    </div>  

@endsection