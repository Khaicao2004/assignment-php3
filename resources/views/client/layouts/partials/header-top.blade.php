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
                <div class="site-logo">
                    <a href="{{route('home')}}" class="js-logo-clone">PostNews</a>
                </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                <div class="site-top-icons">
                    <ul>
                        <li>
                            <a href="#"><span class="icon icon-person"></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>