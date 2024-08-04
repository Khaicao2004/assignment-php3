<nav class="site-navigation text-right text-md-center" role="navigation">
    <div class="container ">
        <ul class="site-menu js-clone-nav d-none d-md-block">
        @foreach ($categories as $slug => $name)
        <li><a href="{{route('loaitin',$slug)}}">{{$name}}</a></li>
        @endforeach
        </ul>
    </div>
</nav>