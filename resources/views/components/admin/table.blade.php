<table class="table">
    <thead>
      <tr>
        <th scope="col"># - ID</th>
        <th scope="col">Title</th>
        <th scope="col">Slug</th>
        <th scope="col">Category</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($items as $item)
        <tr data-post="{{ $item->id }}">
          <th scope="row">{{ $item->id }}</th>
          <td>{{ $item->title }}</td>
          <td>{{ $item->slug }}</td>
          <td>{{ $item->category->name ?? 'Nessuna categoria' }}</td>
          <td>
            <a class="btn btn-primary" href="{{ route('posts.show', $item->slug) }}">Show</a>
            <a class="btn btn-warning" href="{{ route('posts.edit', $item->slug) }}">Edit</a>
            <a class="btn btn-danger" href="#">Delete</a>
          </td>
        </tr>
      @empty

        <h3>Nessun Post disponibile</h3>
          
      @endforelse
    </tbody>
</table>

<form id="post-delete" action="{{ route('posts.destroy', $item->id) }}" method="post" class="d-none">
  @csrf
  @method('DELETE')
</form>