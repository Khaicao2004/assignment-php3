@extends('client.layouts.master')

@section('title')
    {{ $category->name }}
@endsection

@section('content')
    <div class="container text-black">
        <div class="site-section block-3 site-blocks-2 bg-light">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-md-7 site-section-heading text-center pt-4">
                        <h2><b>Danh mục tin:</b> {{ $category->name }}</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach ($posts as $item)
                        <div class="col-lg-4 mb-5">
                            <article class="card">
                                <div class="post-slider slider-sm">
                                    <img src="{{ Storage::url($item->img_thumbnail) }}" width="100%" height="300px" alt="post-thumb">
                                </div>

                                <div class="card-body">
                                    <h3 class="h4 mb-3"><a class="post-title"
                                            href="{{ route('chitiet', $item->id) }}">{{ Str::limit($item->name, 30) }}</a>
                                    </h3>
                                    <ul class="card-meta list-inline">
                                        <li class="list-inline-item">
                                            <h5>{{ $item->author->name }}</h5>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <i class="ti-calendar"></i>{{ $item->created_at->format('d/m/Y') }}
                                        </li>
                                        <li class="list-inline-item">
                                            <ul class="card-meta-tag list-inline">
                                                @foreach ($item->tags as $tag)
                                                    <li class="list-inline-item">
                                                        <h6 class="badge bg-info text-dark">{{ $tag->name }}</h6>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                    <p>{{ Str::limit($item->overview, 100) }}</p>
                                    <a href="{{ route('chitiet', $item->id) }}" class="btn btn-outline-primary">Đọc thêm</a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
