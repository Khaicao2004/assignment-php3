@extends('admin.layouts.master')

@section('title')
    Thêm mới hình ảnh
@endsection

@section('content')
    <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Thêm mới hình ảnh</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-6">
                                    <div>
                                        <label for="file_path" class="form-label">File path</label>
                                        <input type="file" class="form-control" id="file_path" name="file_path">
                                        @error('file_path')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check form-switch form-switch-primary">
                                        <input class="form-check-input" type="checkbox" role="switch" name="is_active"
                                            id="is_active" checked>
                                        <label class="form-check-label" for="is_active">Is Active</label>
                                    </div>
                                </div>
                                <!--end col-->
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
