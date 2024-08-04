@extends('admin.layouts.master')

@section('title')
   Cập nhật bài viết {{ $post->id }}
@endsection

@section('content')
    <form action="{{ route('posts.update',$post) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
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
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $post->name }}"  >
                                    </div>
                                    <div class="mt-3">
                                        <label for="sku" class="form-label">Sku</label>
                                        <input type="text" class="form-control" id="sku" name="sku"
                                        value="{{ $post->sku }}" disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="category_id" class="form-label">Categories</label>        
                                        <select name="category_id" id="category_id" class="form-select">
                                          @foreach ($categories as $id => $name)
                                              <option value="{{$id }}"
                                              @if ($post->category_id == $id)
                                                  selected
                                              @endif
                                              >{{ $name }}</option>
                                          @endforeach
                                      </select>
                                    </div>
                                    <div class="mt-3">
                                        <label for="img_thumbnail" class="form-label">Img Thumbnail</label><br>
                                        @php
                                        $url = $post->img_thumbnail;
                                        if (!Str::contains($url, 'http')){
                                            $url =  Storage::url($url);
                                        }
                                    @endphp 
                    
                                    <img src="{{ $url }}" alt="" width="200px">
                                    <input type="file" class="form-control mt-3" id="img_thumbnail" name="img_thumbnail">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-check form-switch form-switch-primary">
                                                <input class="form-check-input" type="checkbox" role="switch" name="is_active"
                                                id="is_active" @if ($post->is_active === 1)checked @endif >
                                               <label class="form-check-label" for="is_active">Is Active</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mt-3">
                                            <label for="overview" class="form-label">Overview</label>
                                            <textarea class="form-control" name="overview" id="overview" rows="2" >{{ $post->overview }}</textarea>
                                        </div>
                                        <div class="mt-3">
                                            <label for="content" class="form-label">Content</label>
                                            <textarea class="form-control" name="content" id="content" >{{ $post->content }}</textarea>
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
                                    <div>
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="author[name]"  value="{{ $post->author->name }}" disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="email" class="form-label">email</label>
                                        <input type="email" class="form-control" id="email" name="author[email]" value="{{ $post->author->email }}" disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="author[phone]" value="{{ $post->author->phone }}" disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="address" name="author[address]" value="{{ $post->author->address }}" disabled>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-check form-switch form-switch-primary">
                                                <input class="form-check-input" type="checkbox" role="switch" name="is_active"
                                                    id="is_active" @if ($post->author->is_active === 1)checked @endif disabled>
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
                                    <label for="tags" class="form-label">Photos</label>
                                    <div class="row mb-3">
                                        @foreach ($post->photos as $photo)
                                        <div class="col-12 col-md-4 col-lg-3">
                                            <img src="{{ Storage::url($photo->file_path) }}" alt="" width="100">
                                        </div>
                                        @endforeach
                                    </div>
                                    <input type="file" name="photos[]" id="photos" class="form-control" multiple>
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
                                        <label for="tags" class="form-label">Tags </label><br>
                                        <select name="tags[]" id="tags" class="form-control" multiple>
                                          @foreach ($tags as $id => $name)
                                              <option value="{{ $id }}" 
                                              @if ($post->tags->contains($id))
                                                  selected
                                              @endif
                                              >{{ $name }}</option>
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
    </script>
@endsection
