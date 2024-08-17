@extends('client.layouts.master');

@section('title')
    Update Account
@endsection

@section('content')
    <div class="container">
        <h2 class="text-center mt-5 mb-5">Nâng cấp tài khoản</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('upgradeAccount') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                    <div class="form-group col-6">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" name="phone" id="phone" class="form-control" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="address">Địa chỉ</label>
                        <input type="text" name="address" id="address" class="form-control" required>
                    </div>
                    <div class="form-group col-12">
                        <label for="image">Ảnh đại diện (tùy chọn)</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                </div>
            <button type="submit" class="btn btn-primary">Nâng cấp</button>
        </form>
    </div>
@endsection
