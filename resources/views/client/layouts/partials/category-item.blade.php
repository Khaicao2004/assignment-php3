{{-- <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="{{ route('loaitin', $category->slug) }}" id="navbarDropdown{{ $category->id }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ $category->name }}
    </a>
    @if ($category->children->isNotEmpty())
        <div class="dropdown-menu" aria-labelledby="navbarDropdown{{ $category->id }}">
            @foreach ($category->children as $child)
                @include('client.layouts.partials.category-item', ['category' => $child])
            @endforeach
        </div>
    @endif
</li> --}}
