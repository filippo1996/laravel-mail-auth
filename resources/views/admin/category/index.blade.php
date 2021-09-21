@extends('layouts.admin')

@section('content')

    <!-- start title page -->
    <x-admin.title title="Categories"/>
    <!-- end title page -->

    <a href="#" class="btn btn-primary">Create new Category</a>

    <table class="table">
        <thead>
          <tr>
            <th scope="col"># ID</th>
            <th scope="col">name</th>
            <th scope="col">slug</th>
            <th scope="col">Qt. Post</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>{{ $category->posts_count }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('category.show', $category->id) }}">Show</a>
                    <a class="btn btn-warning" href="#">Edit</a>
                    <a class="btn btn-danger" href="#">Delete</a>
                </td>
            </tr>
          @endforeach
        </tbody>
    </table>

@endsection

{{--
@section('script-footer')
@parent
    <script>
        let posts = document.querySelectorAll('.btn-danger');
        posts.forEach( ele => {
            ele.addEventListener('click', function(event){
                
                let status = confirm('Sicuro di voler eliminare questo post?');
                if(!status){
                    event.preventDefault();
                    return false;
                }

                let id = this.closest('tr[data-post]').dataset.post;
                
                let form = document.getElementById('post-delete');
                form.action = "http://127.0.0.1:8000/dashboard/posts/" + id;
                form.submit();
            });
        });
    </script>
@endsection
--}}