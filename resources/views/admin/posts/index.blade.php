@extends('layouts.admin')

@section('content')

    <!-- start title page -->
    <x-admin.title title="Posts"/>
    <!-- end title page -->

    <a href="{{ route('posts.create') }}" class="btn btn-primary">Create new Post</a>

    <!-- show table -->
    <x-admin.table :items="$posts"/>
    <!-- end show table -->

@endsection

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