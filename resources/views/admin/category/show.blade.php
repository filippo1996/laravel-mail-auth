@extends('layouts.admin')

@section('content')

    <!-- start title page -->
    <x-admin.title title="Show Category"/>
    <!-- end title page -->

    <div class="bg-light p-5 rounded">
        <h1>Categoria: {{ $category->name }}</h1>
        <h3>Post collegati all categiria {{ $category->name }}</h3>
        <ol>
            @forelse ($category->posts as $post)
                <li>
                    <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                </li>
            @empty
                <h3>Nessun Post trovato.</h3>
            @endforelse
        </ol>
    </div>  

@endsection