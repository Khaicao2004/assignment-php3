@extends('admin.layouts.master')

@section('title')
    Xem chi tiết danh mục: {{ $category->name }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Chi tiết danh mục: {{ $category->name }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row gy-4">
                            <div class="card">
                                <div class="card-body">
                                    <p><strong>ID:</strong> {{ $category->id }}</p>
                                    <p><strong>Tên:</strong> {{ $category->name }}</p>
                                    <p><strong>Danh mục cha:</strong>
                                        @if ($category->parent)
                                            {{ $category->parent->name }}
                                        @else
                                            N/A
                                        @endif
                                    </p>
                                    <p><strong>Danh mục con:</strong></p>
                                    <ul>
                                        @forelse($category->children as $child)
                                            <li>{{ $child->name }}</li>
                                        @empty
                                            <li>Không có danh mục con</li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                            <a href="{{ route('categories.index') }}" class="btn btn-primary mt-3">Quay lại danh sách</a>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </div>
    @endsection
