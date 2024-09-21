<nav class="navbar navbar-expand-lg bg-body-tertiaryt">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto">
                @foreach($parentCategories as $category)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{route('loaitin',$category->slug)}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $category->name }}
                        </a>
                        @if($category->children->isNotEmpty())
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach($category->children as $child)
                                    <a class="dropdown-item" href="{{route('loaitin',$child->slug)}}">{{ $child->name }}</a>
                                @endforeach
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
