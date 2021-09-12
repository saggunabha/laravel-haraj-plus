
@extends('website.layouts.app')

@section('content')

<section class="promotion">
    <div class="title">
        <h5> تمت عملية الدفع بنجاح </h5>
        <p> شكرا لك عزيزى العميل على اختيارك و اشتراكك فى باقات حراج بلص </p>
    </div>

    <div class="proImg">
        <img src="{{ asset('website/images/main/promotion.png') }}" alt="">
    </div>

    <ul class="features">
        <li><h5> لقد حصلت على بعض المميزات </h5></li>
        <li><p><i class="fas fa-check-circle"></i> صلاحية عمل متجر خاص مع رابط خاص</p></li>
        <li><p><i class="fas fa-check-circle"></i> تصميم اعلانات و فيديوهات برسوم مخفضة</p></li>
        <li><p><i class="fas fa-check-circle"></i> عدد مفتوح من الاعلانات</p></li>
        <li><p><i class="fas fa-check-circle"></i> التواصل عبر الجوال مباشرة</p></li>
        <li><p><i class="fas fa-check-circle"></i> نشر منتجاتك على مواقع تواصلنا الاجتماعية</p></li>
        <li><p><i class="fas fa-check-circle"></i> ورش عمل و دورات مجانية تساعدك فى تنمية نشاطك التجارى</p></li>
        <li><p><i class="fas fa-check-circle"></i> دعم فنى اولوية متوسطة</p></li>
        <li><p><i class="fas fa-check-circle"></i> نشر فيديوهاتك الاعلانية عبر قناتنا على اليوتيوب</p></li>
    </ul>

    <div class="backToHome">
        <a href="{{ route('home') }}"> الرجوع للرئيسية </a>
    </div>
</section>
@endsection
@section('footer')
@include('website.layouts.footer')
@endsection