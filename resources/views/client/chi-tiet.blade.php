@extends('client.layouts.master')

@section('title')
    Chi tiết {{ $post->id }}
@endsection

@section('content')
    @include('client.components.breadcrumb', ['pageName' => 'Chi tiết'])

    <section class="section mt-5 text-black">
        <div class="container">
            <div class="row justify-content-center">
                <div class=" col-lg-9   mb-5 mb-lg-0">
                    <article>
                        <div class="post-slider mb-4">
                            <img src="{{ $post->img_thumbnail }}" width="100%" height="500px" alt="post-thumb">
                        </div>

                        <h1 class="h2">{{ $post->name }}</h1>
                        <ul class="card-meta my-3 list-inline">
                            <li class="list-inline-item">
                                <a href="author-single.html" class="card-meta-author">
                                    {{-- <img src="images/john-doe.jpg"> --}}
                                    <span>{{ $post->author->name }}</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-calendar"></i>{{ $post->created_at->format('d/m/Y') }}
                            </li>
                            <li class="list-inline-item">
                                <ul class="card-meta-tag list-inline">
                                    @foreach ($post->tags as $tag)
                                        <li class="list-inline-item">
                                            <a href="tags.html" class="badge bg-info text-dark">{{ $tag->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                        <div class="content">
                            <div class="image mb-3 mt-3">
                                @foreach ($post->photos as $photo)
                                <img src="{{$photo->file_path}}" alt="" width="100%" class="mb-3">
                                @endforeach
                            </div>
                            <p>{{ $post->content }}</p>
                        </div>
                    </article>

                </div>

                <div class="col-lg-9 col-md-12">
                    <div class="mb-5 border-top mt-4 pt-5">
                        <h3 class="mb-4"><b>Comments</b></h3>

                        @foreach ($post->comments as $comment)         
                        <div class="media d-block d-sm-flex mb-4 pb-4">
                            <div class="media-body">
                                <h4>*{{ $comment->user->name  }}</h4>
                                <p>{{ $comment->comment }}</p>
                                <span class="text-black-800 mr-3 font-weight-600">{{ $comment->created_at }}</span>
                            </div>
                        </div>
                        @endforeach     
                    </div>

                    <div>
                        <h3 class="mb-4">Bình luận</h3>
                        <form action="{{ route('binhluan',$post) }}" method="POST" class="mb-5">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="comment" class="form-label">Nội dung</label>
                                    <textarea class="form-control shadow-none" name="comment" rows="7" required></textarea>
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Comment Now</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
