@extends('client.layouts.master')
@section('title')
    Login
@endsection

@section('content')
    <h2 class="text-center mt-5">Đăng nhập</h2>
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6 col-xl-5">
          <div class="card mt-4">

              <div class="card-body p-4">
                  <div class="text-center mt-2">
                      <h5 class="text-primary">Chào mừng !</h5>
                      <p class="text-muted">Vui lòng đăng nhập</p>
                  </div>
                  <div class="p-2 mt-4">
                    <form action="{{ route('login') }}" method="POST" class="mt-5">
                      @csrf
                      <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" class="form-control" id="email" name="email" placeholder="quockhai@gmail.com"
                              autocomplete="email" value="{{ old('email') }}" autofocus>
                              @error('email')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </div>
                      <div class="mb-3">
                          <label for="password" class="form-label">Mật khẩu</label>
                          <input type="password" class="form-control" id="password" name="password" autocomplete="current-password">
                          @error('password')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                      <button type="submit" class="btn btn-primary">Đăng nhập</button>
                  </form>
                  </div>
              </div>
              <!-- end card body -->
          </div>
          <!-- end card -->
          <div class="mt-4 text-center">
              <p class="mb-0">Bạn chưa có tài khoản?<a href="{{route('register') }}" class="fw-semibold text-primary text-decoration-underline">Đăng ký</a> </p>
          </div>

      </div>
  </div>
@endsection
