@extends('admin.layouts.master')

@section('title')
    Xem chi tiết tag: {{ $tag->name }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Chi tiết tag: {{ $tag->name }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div>
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $tag->name }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-check form-switch form-switch-primary">
                                            <input class="form-check-input" type="checkbox" role="switch" name="is_active" id="is_active"  
                                            @if ($tag->is_active === 1)checked @endif disabled>
                                            <label class="form-check-label" for="is_active">Is Active</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
    </div>
@endsection
