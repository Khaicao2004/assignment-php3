@extends('client.layouts.master')

@section('title')
    Chi tiết {{ $data->id }}
@endsection

@section('content')
    <div class="container">
        <h2><b>{{ $data->name }}</b></h2><br>
        <h4>{{ $data->overview }}</h4>
        <div id="noidung">
            {{ $data->content }}
        </div>
    </div>
    
@endsection
