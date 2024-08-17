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
                    <ul class="navbar-nav">
                        @if (!Auth::user())
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">
                                    <span class="icon icon-person"></span>
                                </a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Xin chào, {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        <i class="fa-solid fa-user"></i> Thông tin cá nhân
                                    </a>
                                    @if(Auth::user()->type == 'member')
                                        <a class="dropdown-item" href="{{ route('showUpgradeAccount') }}">
                                            <i class="fa-solid fa-arrow-up"></i> Nâng cấp tài khoản
                                        </a>
                                    @endif
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fa-solid fa-right-from-bracket"></i> Đăng xuất
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            
            
        </div>
    </div>
</div>