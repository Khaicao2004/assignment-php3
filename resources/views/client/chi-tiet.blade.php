@extends('client.layouts.master')

@section('title')
    Chi tiết {{ $data->id }}
@endsection

@section('content')
@include('client.components.breadcrumb',['pageName' => 'Chi tiết'])

    <section class="section mt-5">
        <div class="container">
          <div class="row justify-content-center">
            <div class=" col-lg-9   mb-5 mb-lg-0">
              <article>
                <div class="post-slider mb-4">
                  <img src="{{ $data->img_thumbnail }}" width="100%" height="500px" alt="post-thumb">
                </div>
    
                <h1 class="h2">{{ $data->name }}</h1>
                <ul class="card-meta my-3 list-inline">
                  <li class="list-inline-item">
                    <a href="author-single.html" class="card-meta-author">
                      {{-- <img src="images/john-doe.jpg"> --}}
                      <span>{{$data->author->name}}</span>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <i class="ti-calendar"></i>{{$data->created_at->format('d/m/Y')}}
                  </li>
                  <li class="list-inline-item">
                    <ul class="card-meta-tag list-inline">
                        @foreach ($data->tags as $tag)
                        <li class="list-inline-item">
                            <a href="tags.html" class="badge bg-info text-dark">{{$tag->name}}</a>
                        </li>
                       @endforeach
                    </ul>
                  </li>
                </ul>
                <div class="content">
                  <p>{{ $data->content }}</p>
                </div>
              </article>
    
            </div>
    
            <div class="col-lg-9 col-md-12">
              <div class="mb-5 border-top mt-4 pt-5">
                <h3 class="mb-4">Comments</h3>
    
                <div class="media d-block d-sm-flex mb-4 pb-4">
                  <a class="d-inline-block mr-2 mb-3 mb-md-0" href="#">
                    <img src="images/post/user-01.jpg" class="mr-3 rounded-circle" alt="">
                  </a>
                  <div class="media-body">
                    <a href="#!" class="h4 d-inline-block mb-3">Alexender Grahambel</a>
    
                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
                      purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi
                      vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
    
                    <span class="text-black-800 mr-3 font-weight-600">April 18, 2020 at 6.25 pm</span>
                    <a class="text-primary font-weight-600" href="#!">Reply</a>
                  </div>
                </div>
                <div class="media d-block d-sm-flex">
                  <div class="d-inline-block mr-2 mb-3 mb-md-0" href="#">
                    <img class="mr-3" src="images/post/arrow.png" alt="">
                    <a href="#!"><img src="images/post/user-02.jpg" class="mr-3 rounded-circle" alt=""></a>
                  </div>
                  <div class="media-body">
                    <a href="#!" class="h4 d-inline-block mb-3">Nadia Sultana Tisa</a>
    
                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
                      purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi
                      vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
    
                    <span class="text-black-800 mr-3 font-weight-600">April 18, 2020 at 6.25 pm</span>
                    <a class="text-primary font-weight-600" href="#!">Reply</a>
                  </div>
                </div>
              </div>
    
              <div>
                <h3 class="mb-4">Leave a Reply</h3>
                <form method="POST">
                  <div class="row">
                    <div class="form-group col-md-12">
                      <textarea class="form-control shadow-none" name="comment" rows="7" required></textarea>
                    </div>
                    <div class="form-group col-md-4">
                      <input class="form-control shadow-none" type="text" placeholder="Name" required>
                    </div>
                    <div class="form-group col-md-4">
                      <input class="form-control shadow-none" type="email" placeholder="Email" required>
                    </div>
                    <div class="form-group col-md-4">
                      <input class="form-control shadow-none" type="url" placeholder="Website">
                      <p class="font-weight-bold valid-feedback">OK! You can skip this field.</p>
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
