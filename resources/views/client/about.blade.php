@extends('client.layouts.master')

@section('title')
    About
@endsection

@section('content')
    @include('client.components.breadcrumb',['pageName' => 'Giới thiệu'])

    <div class="site-section border-bottom" data-aos="fade">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="block-16">
                            <img src="/client/images/logo.jpg" alt="Image placeholder" class="img-fluid rounded" />
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="site-section-heading pt-3 mb-4">
                        <h2 class="text-black">Giới thiệu về chúng tôi</h2>
                    </div>
                    <p>
                        Skynews ra đời với sứ mệnh cung cấp thông tin tin cậy, kịp thời và đa dạng cho độc giả. Chúng tôi hướng đến mục tiêu trở thành nguồn tin tức uy tín hàng đầu về chính trị, kinh tế, xã hội tại Việt Nam.

                        Skynews được thành lập vào năm 2024 bởi chàng trai biên tập viên trẻ Cao Quốc Khải đam mê nghiệp vụ báo chí. Với tinh thần trách nhiệm cao và cây bút có nhiều năm kinh nghiệm làm việc tại các cơ quan báo chí uy tín, chúng tôi hiểu rõ tầm quan trọng của việc cung cấp thông tin nhanh nhạy, chính xác và khách quan.
                        
                        Ngoài nội dung tin tức kịp thời, Skynews còn có chuyên mục phân tích sâu về các vấn đề kinh tế, chính trị xã hội; phỏng vấn lãnh đạo; chia sẻ kiến thức qua cột đề tài... Nội dung được biên tập nghiêm ngặt, tinh tế nhằm đáp ứng nhu cầu thông tin, giải trí và hữu ích cho độc giả.
                        
                        Chúng tôi mong muốn sẽ là kênh thông tin uy tín, là người bạn đồng hành đáng tin cậy của quý vị trong mọi lĩnh vực cuộc sống. Xin trân trọng cảm ơn quý vị!
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
