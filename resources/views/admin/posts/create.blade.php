@extends('admin.layouts.master')

@section('title')
    Thêm mới danh mục sản phẩm
@endsection

@section('content')
    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Thông tin bài viết</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-md-4">
                                    <div>
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    <div class="mt-3">
                                        <label for="sku" class="form-label">Sku</label>
                                        <input type="text" class="form-control" id="sku" name="sku"
                                            value="{{ strtoupper(Str::random(8)) }}">
                                    </div>
                                    <div class="mt-3">
                                        <label for="category_id" class="form-label">Categories</label>
                                        <select name="category_id" id="category_id" class="form-select">
                                            @foreach ($categories as $id => $name)
                                                <option value="{{ $id }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mt-3">
                                        <label for="img_thumbnail" class="form-label">Img Thumbnail</label>
                                        <input type="file" class="form-control" id="img_thumbnail" name="img_thumbnail">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-check form-switch form-switch-primary">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    name="is_active" id="is_active" checked>
                                                <label class="form-check-label" for="is_active">Is Active</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mt-3">
                                            <label for="overview" class="form-label">Overview</label>
                                            <textarea class="form-control" name="overview" id="overview" rows="2"></textarea>
                                        </div>
                                        <div class="mt-3">
                                            <label for="content" class="form-label">Content</label>
                                            <textarea class="form-control" name="content" id="content"></textarea>
                                        </div>
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
                        <h4 class="card-title mb-0 flex-grow-1">Thông tin tác giả</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-7">
                                   <div class="mt-3">
                                    <label class="form-label d-flex">
                                        <input type="radio" name="author_type" value="oldAuthor" class="me-2"  checked onclick="showFormAuthor()"> Chọn tác giả cũ
                                        <input type="radio" name="author_type" value="newAuthor" class="mx-2" onclick="showFormAuthor()"> Thêm tác giả mới
                                    </label>
                                   </div>
                                   <div id="new-author-form" style="display: none;">
                                       <div>
                                           <label for="name" class="form-label">Name</label>
                                           <input type="text" class="form-control" id="name" name="author[name]">
                                       </div>
                                       <div class="mt-3">
                                           <label for="email" class="form-label">email</label>
                                           <input type="email" class="form-control" id="email" name="author[email]">
                                       </div>
                                       <div class="mt-3">
                                           <label for="phone" class="form-label">Phone</label>
                                           <input type="text" class="form-control" id="phone" name="author[phone]">
                                       </div>
                                       <div class="mt-3">
                                           <label for="address" class="form-label">Address</label>
                                           <input type="text" class="form-control" id="address" name="author[address]">
                                       </div>
                                   </div>
                                    <div class="mt-3" id="old-author-form">
                                        <select name="author_id" class="form-select">
                                            @foreach ($authors as $id => $name)
                                                <option value="{{ $id }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-check form-switch form-switch-primary">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    name="is_active" id="is_active" checked>
                                                <label class="form-check-label" for="is_active">Is Active</label>
                                            </div>
                                        </div>
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
                        <h4 class="card-title mb-0 flex-grow-1">Photos</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-md-12">
                                    <div>
                                        <label for="tags" class="form-label">Photos</label>
                                        <input type="file" name="photos[]" id="photos" class="form-control" multiple>
                                    </div>
                                </div>

                                <!--end row-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Tags</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-md-12">
                                    <div>
                                        <label for="tags" class="form-label">Tags </label>
                                        <select name="tags[]" id="tags" class="form-control" multiple>
                                            @foreach ($tags as $id => $name)
                                                <option value="{{ $id }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!--end row-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
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

@section('script-libs')
    <script src="https:////cdn.ckeditor.com/4.8.0/basic/ckeditor.js"></script>
@endsection

@section('scripts')
    <script>
        CKEDITOR.replace('content');
    function showFormAuthor(){
        const authorType = document.querySelector('input[name="author_type"]:checked').value;
        // console.log(authorType);
        if(authorType === 'oldAuthor'){
            document.getElementById('old-author-form').style.display = 'block';
            document.getElementById('new-author-form').style.display = 'none';
        }else{
            document.getElementById('old-author-form').style.display = 'none';
            document.getElementById('new-author-form').style.display = 'block';
        }
    }
    </script>
@endsection
