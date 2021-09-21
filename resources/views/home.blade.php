@extends('layouts.app')

@section('content')
    <!-- start show posts -->
    <views-posts-index url="{{ route('api.posts.index') }}"></views-posts-index>
    <!-- end show posts -->
@endsection