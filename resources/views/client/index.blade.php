@extends('client.layouts.master')

@section('title')
    Home
@endsection

@section('content')
    <div class="site-section block-3 site-blocks-2 bg-light text-black">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2 class="mb-5"><b>Tin nổi bật</b></h2>
                </div>
            </div>
            <div class="row">
                    @foreach ($postHot as $item)
                    <div class="col-lg-4 mb-5">
                        <article class="card">
                            <div class="post-slider slider-sm">
                                <img src="{{Storage::url($item->img_thumbnail)}}" width="100%" height="300px" alt="post-thumb">
                            </div>
    
                            <div class="card-body">
                                <h3 class="h4 mb-3"><a class="post-title" href="{{route('chitiet',$item->slug)}}">{{ Str::limit($item->name,20) }}</a></h3>
                                <ul class="card-meta list-inline">
                                    <li class="list-inline-item">
                                            <h5>{{$item->author->name}}</h5>
                                    </li>              
                                    <li class="list-inline-item">
                                        <i class="ti-calendar"></i>{{$item->created_at->format('d/m/Y')}}
                                    </li>
                                    <li class="list-inline-item">
                                        <ul class="card-meta-tag list-inline">
                                            @foreach ($item->tags as $tag)
                                            <h6 class="badge bg-info text-white">{{$tag->name}}</h6>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                                <p>{{ Str::limit($item->overview,100) }}</p>
                                <a href="{{route('chitiet',$item->slug)}}" class="btn btn-outline-primary">Đọc thêm</a>
                            </div>
                        </article>
                    </div>
                    @endforeach            
                </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section-sm text-black">
        <div class="container ">
            <div class="row justify-content-center mb-5 mt-5">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2><b>Tin mới nhất</b></h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    @foreach ($postsNews as $item)
                    <article class="card mb-4">
                        <div class="post-slider">
                            <img
                                src="{{Storage::url($item->img_thumbnail)}}"
                                style="width: 100%; height: 350px;"
                                alt="post-thumb"
                            />
                        </div>
                        <div class="card-body">
                            <h3 class="mb-3">
                                <a
                                    class="post-title"
                                    href="{{route('chitiet',$item->slug)}}"
                                >
                                {{ Str::limit($item->name,30) }}
                            </a>
                            </h3>
                            <ul class="card-meta list-inline">
                                <li class="list-inline-item">
                                        <h5>{{$item->author->name}}</h5>
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-calendar"></i>{{$item->created_at->format('d/m/Y')}}
                                </li>
                                <li class="list-inline-item">
                                    <ul class="card-meta-tag list-inline">
                                        @foreach ($item->tags as $tag)
                                        <li class="list-inline-item">
                                            <h6 class="badge bg-info text-white">{{$tag->name}}</h6>
                                        </li>
                                       @endforeach
                                    </ul>
                                </li>
                            </ul>
                            <p>
                                {{ Str::limit($item->overview,100) }}
                            </p>
                            <a
                                href="{{route('chitiet',$item->slug)}}"
                                class="btn btn-outline-primary"
                                >Đọc thêm</a
                            >
                        </div>
                    </article>
                    @endforeach
                   {{ $postsNews->links() }}
                </div>
                <aside class="col-lg-4 sidebar-home">
                    <!-- recent post -->
                    <div class="widget">              
                        @foreach ($postsNews as $item)
                        <article class="widget-card mb-2" >
                            <div class="d-flex">
                                <img
                                   style="width: 80px; height: 80px"
                                    src="{{Storage::url($item->img_thumbnail)}}"
                                />
                                <div class="ml-3">
                                    <h5>
                                        <a
                                            class="{{route('chitiet',$item->slug)}}"
                                            href="{{route('chitiet',$item->slug)}}"
                                            style="font-size: 16px"
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
