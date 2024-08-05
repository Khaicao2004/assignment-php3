@extends('admin.layouts.master')

@section('title')
    Danh sách hình ảnh
@endsection

@section('content')
  <!-- start page title -->
  <div class="row">
    <div class="col-12">
        <div
            class="page-title-box d-sm-flex align-items-center justify-content-between"
        >
            <h4 class="mb-sm-0">Danh sách hình ảnh</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="javascript: void(0);"
                            >Hình ảnh</a
                        >
                    </li>
                    <li class="breadcrumb-item active">
                        Danh sách
                    </li>
                </ol>
            </div>
        </div>
        @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="card-title mb-0">
                    Danh sách
                </h5>
                <a href="{{route('photos.create')}}" class="btn btn-primary mb-3">Thêm mới</a>
            </div>
            <div class="card-body">
                <table
                    id="example"
                    class="table table-bordered dt-responsive nowrap table-striped align-middle text-center"
                    style="width: 100%"
                >
               <thead>
                <tr>
                    <th>ID</th>
                    <th>File path</th>
                    <th>Is Active</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Action</th>
                </tr>
               </thead>
                
              <tbody>
                @foreach ($data as $item)         
                <tr>
                    <td>{{$item->id}}</td>
                    <td><img src="{{Storage::url($item->file_path)}}" alt="" width="80" height="80"></td>
                    <td>
                        <div class="form-check form-switch form-switch-primary">
                            <input class="form-check-input" type="checkbox" role="switch" name="is_active"
                                id="is_active" @if ($item->is_active === 1)checked @endif disabled>
                            <label class="form-check-label" for="is_active">Is Active</label>
                        </div>
                        </td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td class="d-flex">
                        <a href="{{route('photos.show', $item->id)}}" class="btn btn-primary mx-2">Xem</a>
                        <a href="{{route('photos.edit', $item->id)}}" class="btn btn-warning me-2">Sửa</a>
                        <form action="{{ route('photos.destroy', $item->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger " onclick="return confirm('Chắc chắn chưa?')">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
              </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->
@endsection
