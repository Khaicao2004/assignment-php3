@extends('admin.layouts.master')

@section('title')
    Cập nhật trạng thái: {{ $upgrade->name }}
@endsection

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <form action="{{ route('upgrades.update', $upgrade) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Cập nhật trạng thái: {{ $upgrade->name }}</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <div>
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $upgrade->user->name }}" disabled>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            value="{{ $upgrade->user->email }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mt-2">
                                <div class="col-md-6">
                                    <div>
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            value="{{ $upgrade->phone }}" disabled>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ $upgrade->address }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <label for="address" class="form-label">Image</label><br>
                                        <img src="{{ Storage::url($upgrade->image) }}" alt="" width="100px">
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mt-3">
                                <div class="col-12">
                                    <div>
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" class="form-control">
                                            @if ($upgrade->status === 'pending')
                                                <option value="pending" selected>pending</option>
                                                <option value="approved">approved</option>
                                                <option value="rejected">rejected</option>
                                            @elseif ($upgrade->status === 'approved')
                                                <option value="pending">pending</option>
                                                <option value="approved" selected>approved</option>
                                                <option value="rejected">rejected</option>
                                            @else
                                                <option value="pending">pending</option>
                                                <option value="approved">approved</option>
                                                <option value="rejected" selected>rejected</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div><!-- end card header -->
                </div>
            </div>
            <!--end col-->
        </div>
    </form>
@endsection
