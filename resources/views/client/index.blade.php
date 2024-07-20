@extends('client.layouts.master')

@section('title')
    Home
@endsection

@section('content')
    <div class="site-section block-3 site-blocks-2 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>Tin nổi bật</h2>
                </div>
            </div>
            <div class="row">
                    @foreach ($posts as $item)
                    <div class="col-lg-4 mb-5">
                        <article class="card">
                            <div class="post-slider slider-sm">
                                <img src="{{$item->img_thumbnail}}" class="card-img-top" alt="post-thumb">
                            </div>
    
                            <div class="card-body">
                                <h3 class="h4 mb-3"><a class="post-title" href="{{route('chitiet',$item->id)}}">{{ Str::limit($item->name,30) }}</a></h3>
                                <ul class="card-meta list-inline">
                                    <li class="list-inline-item">
                                        <a href="author-single.html" class="card-meta-author">
                                            {{-- <img src="images/john-doe.jpg"> --}}
                                            <span>Charls Xaviar</span>
                                        </a>
                                    </li>              
                                    <li class="list-inline-item">
                                        <i class="ti-calendar"></i>{{$item->created_at->format('d/m/Y')}}
                                    </li>
                                    <li class="list-inline-item">
                                        <ul class="card-meta-tag list-inline">
                                            <li class="list-inline-item"><a href="tags.html">Color</a></li>
                                            <li class="list-inline-item"><a href="tags.html">Recipe</a></li>
                                            <li class="list-inline-item"><a href="tags.html">Fish</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <p>{{ Str::limit($item->overview,100) }}</p>
                                <a href="{{route('chitiet',$item->id)}}" class="btn btn-outline-primary">Read More</a>
                            </div>
                        </article>
                    </div>
                    @endforeach
                    {{ $posts->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section-sm">
        <div class="container">
            <div class="row justify-content-center mb-5 mt-5">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>Tin mới nhất</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <h2 class="h5 section-title">Recent Post</h2>
                    @foreach ($postsNews as $item)
                    <article class="card mb-4">
                        <div class="post-slider">
                            <img
                                src="{{$item->img_thumbnail}}"
                                style="width: 100%; height: 350px;"
                                alt="post-thumb"
                            />
                        </div>
                        <div class="card-body">
                            <h3 class="mb-3">
                                <a
                                    class="post-title"
                                    href="{{route('chitiet',$item->id)}}"
                                >
                                {{ Str::limit($item->name,30) }}
                            </a>
                            </h3>
                            <ul class="card-meta list-inline">
                                <li class="list-inline-item">
                                    <a
                                        href="author-single.html"
                                        class="card-meta-author"
                                    >
                                        <img
                                            src="images/john-doe.jpg"
                                            alt="John Doe"
                                        />
                                        <span>John Doe</span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-calendar"></i>{{$item->created_at->format('d/m/Y')}}
                                </li>
                                <li class="list-inline-item">
                                    <ul class="card-meta-tag list-inline">
                                        <li class="list-inline-item">
                                            <a href="tags.html">Demo</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="tags.html">Elements</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <p>
                                {{ Str::limit($item->overview,100) }}
                            </p>
                            <a
                                href="{{route('chitiet',$item->id)}}"
                                class="btn btn-outline-primary"
                                >Read More</a
                            >
                        </div>
                    </article>
                    @endforeach
                   {{ $postsNews->links() }}
                </div>
                <aside class="col-lg-4 sidebar-home">
                    <!-- recent post -->
                    <div class="widget">
                        <h2 class="h5 section-title">Recent Post</h2>
                        @foreach ($postRight as $item)
                        <article class="widget-card mb-2">
                            <div class="d-flex">
                                <img
                                   style="width: 80px; height: 80px"
                                    src="{{$item->img_thumbnail}}"
                                />
                                <div class="ml-3">
                                    <h5>
                                        <a
                                            class="{{route('chitiet',$item->id)}}"
                                            href="{{route('chitiet',$item->id)}}"
                                            >{{ Str::limit($item->name,30) }}</a
                                        >
                                    </h5>
                                    <ul class="card-meta list-inline mb-0">
                                        <li class="list-inline-item mb-0">
                                            <i class="ti-calendar"></i>{{$item->created_at->format('d/m/Y')}}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </article>                          
                        @endforeach
                    </div>  
                </aside>
            </div>
        </div>
    </section>

@endsection
