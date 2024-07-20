<div class="container">
    <div class="row">
        <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="footer-heading mb-4">
                        Thông tin khác
                    </h3>
                </div>
                <div class="col-12">
                    <ul class="list-unstyled">
                        <li><a href="{{route('home')}}">Trang chủ</a></li>
                        <li><a href="{{route('about')}}">Giới thiệu</a></li>
                        <li><a href="{{route('contact')}}">Liên hệ</a></li>
                    </ul>
                </div>
                {{-- <div class="col-md-6 col-lg-4">
                    <ul class="list-unstyled">
                        <li><a href="#">Mobile commerce</a></li>
                        <li><a href="#">Dropshipping</a></li>
                        <li>
                            <a href="#">Website development</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-4">
                    <ul class="list-unstyled">
                        <li><a href="#">Point of sale</a></li>
                        <li><a href="#">Hardware</a></li>
                        <li><a href="#">Software</a></li>
                    </ul>
                </div> --}}
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <h3 class="footer-heading mb-4">Logo</h3>
            <a href="{{route('home') }}" class="block-6">
                <img src="/client/images/logo.jpg" alt="Image placeholder" class="img-fluid rounded mb-4" width="120"/>
            </a>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="block-5 mb-5">
                <h3 class="footer-heading mb-4">
                    Thông tin liên hệ
                </h3>
                <ul class="list-unstyled">
                    <li class="address">
                       Cao đẳng FPT Hà Nội
                    </li>
                    <li class="phone">
                        <a href="tel://23923929210">+84899354031</a>
                    </li>
                    <li class="email">
                       khaicao2004@gmail.com
                    </li>
                </ul>
            </div>

            <div class="block-7">
                <form action="#" method="post">
                    <label for="email_subscribe" class="footer-heading">Subscribe</label>
                    <div class="form-group">
                        <input type="text" class="form-control py-4" id="email_subscribe" placeholder="Email" />
                        <input type="submit" class="btn btn-sm btn-primary" value="Send" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row pt-5 mt-5 text-center">
        <div class="col-md-12">
            <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                <script>
                    document.write(new Date().getFullYear());
                </script>
                All rights reserved | This template is made with
                <i class="icon-heart" aria-hidden="true"></i> by
                <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>
    </div>
</div>
