<div class="site-navbar-top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                <form action="{{route('search')}}" method="POST" class="site-block-top-search">
                    @csrf
                    <span class="icon icon-search2"></span>
                    <input type="text" class="form-control border-0" name="name" placeholder="Search" />
                </form>
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                <a href="{{route('home')}}" class="js-logo-clone">
                <img src="/client/images/logo2.png" alt="Image placeholder" class="img-fluid rounded mb-4" width="70"/>
                </a>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                <div class="site-top-icons">
                    <ul>
                    @if (!Auth::user())
                    <li>
                        <a href="{{ route('login') }}"><span class="icon icon-person"></span></a>
                    </li>
                        
                    @else
                    <li>
                    <a>Xin chao ! {{ Auth::user()->name }}</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="d-flex">
                            @csrf
                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-right-from-bracket"></i></button>
                        </form>
                    </li>
                    @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>