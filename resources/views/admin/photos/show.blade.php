@extends('admin.layouts.master')

@section('title')
    Chi tiết hình ảnh
@endsection

@section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Chi tiết hình ảnh</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-6">
                                    <div>
                                        <label for="name" class="form-label">File path</label><br>
                                        <img src="{{ Storage::url($photo->file_path) }}" alt="" width="100" height="100">
                                    </div>
                                </div>
                                     <div class="col-6">
                                        <div class="form-check form-switch form-switch-primary">
                                            <input class="form-check-input" type="checkbox" role="switch" name="is_active" id="is_active"  
                                            @if ($photo->is_active === 1)checked @endif disabled>
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
@endsection
