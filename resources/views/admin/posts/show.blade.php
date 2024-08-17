@extends('admin.layouts.master')

@section('title')
   Chi tiết bài viết {{ $post->id }}
@endsection

@section('content')
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
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $post->name }}"  disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="sku" class="form-label">Sku</label>
                                        <input type="text" class="form-control" id="sku" name="sku"
                                        value="{{ $post->sku }}" disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="category_id" class="form-label">Categories</label>        
                                        <input type="text" name="category_id" class="form-control" value="{{$post->category->name}}"  disabled>
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
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-check form-switch form-switch-primary">
                                                <input class="form-check-input" type="checkbox" role="switch" name="is_active"
                                                id="is_active" @if ($post->is_active === 1)checked @endif disabled>
                                               <label class="form-check-label" for="is_active">Is Active</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mt-3">
                                            <label for="overview" class="form-label">Overview</label>
                                            <textarea class="form-control" name="overview" id="overview" rows="2" disabled>{{ $post->overview }}</textarea>
                                        </div>
                                        <div class="mt-3">
                                            <label for="content" class="form-label">Content</label>
                                            <textarea class="form-control" name="content" id="content" disabled>{{ $post->content }}</textarea>
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
                                    <div class="row">
                                        @foreach ($post->photos as $photo)
                                        <div class="col-12 col-md-4 col-lg-3">
                                            <img src="{{ Storage::url($photo->file_path) }}" alt="" width="100">
                                        </div>
                                        @endforeach
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
                                        <label for="tags" class="form-label">Tags </label><br>
                                            @foreach ($post->tags as $tag)
                                            <span class="badge bg-primary me-2 mb-2">{{ $tag->name }}</span>
                                            @endforeach
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
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js" integrity="sha512-lKwk82OTcXaujpLk2G2rplJ8ntniQ5fV/1qlg7EMqyF88lJsEgZaVFP9wxb/ZSCop7CfTsAxnTUg/vvZlFzyQw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@section('scripts')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
