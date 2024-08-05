@extends('admin.layouts.master')

@section('title')
    Chi tiết tác giả:  {{ $author->name }}
@endsection

@section('content')
    <div class="row">
      <div class="col-lg-12">
          <div class="card">
              <div class="card-header align-items-center d-flex">
                  <h4 class="card-title mb-0 flex-grow-1">Chi tiết tác giả:  {{ $author->name }}</h4>
              </div><!-- end card header -->
              <div class="card-body">
                  <div class="live-preview">
                    <div class="live-preview">
                        <div class="row gy-4">
                          <div class="col-7">
                              <div>
                                  <label for="name" class="form-label">Name</label>
                                  <input type="text" class="form-control" id="name" name="name"  value="{{ $author->name }}" disabled>
                              </div>
                              <div class="mt-3">
                                  <label for="email" class="form-label">email</label>
                                  <input type="email" class="form-control" id="email" name="email" value="{{ $author->email }}" disabled>
                              </div>
                              <div class="mt-3">
                                  <label for="phone" class="form-label">Phone</label>
                                  <input type="text" class="form-control" id="phone" name="phone" value="{{ $author->phone }}" disabled>
                              </div>
                              <div class="mt-3">
                                  <label for="address" class="form-label">Address</label>
                                  <input type="text" class="form-control" id="address" name="address" value="{{ $author->address }}" disabled>
                              </div>
                          </div>
                          <div class="col-5">
                              <div class="row">
                                  <div class="col-md-2">
                                      <div class="form-check form-switch form-switch-primary">
                                          <input class="form-check-input" type="checkbox" role="switch" name="is_active"
                                              id="is_active" @if ($author->is_active === 1)checked @endif disabled>
                                          <label class="form-check-label" for="is_active">Is Active</label>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!--end col-->
                      </div>
                    </div>
                      <!--end row-->
                  </div>
              </div>
          </div>
      </div>
      <!--end col-->
    </div>
@endsection