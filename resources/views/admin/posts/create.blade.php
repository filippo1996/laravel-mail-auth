@extends('layouts.admin')

@section('content')

    <!-- start title page -->
    <x-admin.title title="Create new Post"/>
    <!-- end title page -->

    <!-- show errors request -->
    @include('admin.partials.errors-request')
    <!-- end show errors request -->

    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" name="title" class="form-control" value="{{ old('title') }}" id="title" aria-describedby="title">
          <div id="emailHelp" class="form-text">Inserisci il titolo</div>

          @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror

        </div>
        <div class="mb-3">
          <label for="category" class="form-label">Category</label>
          <select class="form-select" name="category_id" id="category">
            <option value="">-- Seleziona una Categoria --</option>

            @foreach($categories as $category)
              <option value="{{ $category->id }}" 
                @if($category->id == old('category_id')) selected @endif
                >{{ $category->name }}</option>
            @endforeach

          </select>

          @error('category')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror

        </div>
        <div class="form-floating mb-3">
          <textarea class="form-control" name="content" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ old('content') }}</textarea>
          <label for="floatingTextarea2">Comments</label>
        </div>

        @error('content')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @foreach($tags as $tag)
          <div class="form-check">
            <input class="form-check-input" name="tags[]" type="checkbox" value="{{ $tag->id }}" id="tag-{{ $tag->id }}" @if (is_array( old('tags') ) && in_array($tag->id, old('tags'))) checked @endif>
            <label class="form-check-label" for="tag-{{ $tag->id }}">
              {{ $tag->name }}
            </label>
          </div>
        @endforeach

        @error('tags')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary">Submit</button>
    </form> 

@endsection