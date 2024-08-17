@extends('client.layouts.master');

@section('title')
    Profile
@endsection

@section('content')
<div class="container">
    <h2 class="text-center mt-5 mb-5">Thông tin cá nhân</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('updateProfile',$user) }}" method="POST">
        @csrf
        @method('PUT')
       <div class="row">
        <div class="form-group col-6">
            <label for="name">Tên:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>
        
        <div class="form-group col-6">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{  $user->email }}" disabled>
        </div>
        
        <div class="form-group col-6">
            <label for="password">Mật khẩu mới (nếu muốn đổi):</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        
        <div class="form-group col-6">
            <label for="password_confirmation">Xác nhận mật khẩu:</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>
       </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection