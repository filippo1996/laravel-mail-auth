@extends('layouts.admin')

@section('content')

    <!-- start title page -->
    <x-admin.title title="Edit Post"/>
    <!-- end title page -->

    <!-- show errors request -->
    @include('admin.partials.errors-request')
    <!-- end show errors request -->

    <form action="{{ route('posts.update', $post->id) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $post->title) }}" aria-describedby="title">
          <div id="emailHelp" class="form-text">Modifica il tuo titolo</div>

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
                @if($category->id == old('category_id', $post->category_id ?? null)) selected @endif
                >{{ $category->name }}</option>
            @endforeach

          </select>

          @error('category')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror

        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" name="content" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ old('content', $post->content) }}</textarea>
            <label for="floatingTextarea2">Comments</label>

            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>

        @foreach($tags as $id => $tag)
          <div class="form-check">
            <input class="form-check-input" name="tags[]" type="checkbox" value="{{ $id }}" id="tag-{{ $id }}" @if (is_array( old('tags') ) && in_array($id, old('tags')) || $post->tags->contains($id)) checked @endif>
            <label class="form-check-label" for="tag-{{ $id }}">
              {{ $tag }}
            </label>
          </div>
        @endforeach

        @error('tags')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary">Submit</button>
    </form> 

@endsection