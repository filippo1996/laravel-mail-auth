<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('dashboard.index') }}">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('posts.index') }}">
            <span data-feather="posts"></span>
            Posts
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('category.index') }}">
            <span data-feather="categories"></span>
            Categories
          </a>
        </li>
      </ul>
    </div>
</nav>