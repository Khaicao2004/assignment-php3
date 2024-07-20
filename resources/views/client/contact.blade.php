@extends('client.layouts.master')

@section('title')
    Liên hệ
@endsection

@section('content')
@include('client.components.breadcrumb',['pageName' => 'Liên hệ'])

    <section class="section-sm mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">

                    <div class="content mb-5">
                        <h2 class="text-dark"><b>Hãy liên hệ với chúng tôi nếu bạn cần</b></h2>
                    </div>

                    <form method="POST" action="#" class="mb-5">
                        <div class="form-group">
                            <label for="name">Họ và tên (Bắt buộc)</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nguyễn Văn A"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email (Bắt buộc)</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="abc@gmail.com" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Vấn đề cần hỗ trợ</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Vấn đề A">
                        </div>
                        <div class="form-group">
                            <label for="message">Nội dung</label>
                            <textarea name="message" id="message" class="form-control" placeholder="Nội dung A"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi ngay</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
