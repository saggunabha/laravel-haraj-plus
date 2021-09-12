@extends('website.layouts.app')

@section('content')
    <!--start rate-model -->
    <div class="modal fade" id="rate-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="text-center spam-form">
                        <h2 class="modal-title">تقييم منتج</h2>
                        <form class="needs-validation row" novalidate>
                            <div class="static-stars center-stars">
                                <input class="star" id="rate-1" type="radio" name="starrate">
                                <label class="star" for="rate-1"></label>
                                <input class="star" id="rate-2" type="radio" name="starrate">
                                <label class="star" for="rate-2"></label>
                                <input class="star" id="rate-3" type="radio" name="starrate">
                                <label class="star" for="rate-3"></label>
                                <input class="star" id="rate-4" type="radio" name="starrate">
                                <label class="star" for="rate-4"></label>
                                <input class="star" id="rate-5" type="radio" name="starrate">
                                <label class="star" for="rate-5"></label>
                            </div>
                            <div class="form-group  col-12">
                                <textarea class="form-control" placeholder="كتابه تقييم"></textarea>
                                <div class="invalid-feedback">
                                    من فضلك أدخل نص صحيح
                                </div>
                            </div>


                            <div class="form-group  col-12">
                                <button type="submit" class="custom-btn full-width-btn">إرسال</button>
                            </div>



                        </form>

                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- end rate-model -->


    <!--start spam-model -->
    <div class="modal fade" id="spam-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="text-center spam-form">
                        <h4 class="modal-title">ابلاغ عن منتج</h4>
                        <form class="needs-validation row" novalidate>

                            <div class="form-group  col-12">
                                <textarea class="form-control" placeholder="نص البلاغ" required></textarea>
                                <div class="invalid-feedback">
                                    من فضلك أدخل نص صحيح
                                </div>
                            </div>


                            <div class="form-group  col-12">
                                <button type="submit" class="custom-btn full-width-btn">إرسال</button>
                            </div>



                        </form>

                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- end spam-model -->

    <!-- start-about-title -->
    <div class="about-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>{{$about->name}}</h1>
                    <p>حراج بلص Haraj+ هو موقع إلكتروني ربحي عبارة عن منصة إعلانية حرة ويعتبر الموقع الرسمي لمؤسسة حراج بلص التجارية السعودية والمسجل كعلامة تجارية في وزارة التجارة والاستثمار ، تأسست المنشئة عام 1440 هجري الموافق 2019 ميلادي. يعمل حراج بلص
                        على الربط بين التاجر والمستهلك لبيع المنتجات الجديدة والمستعملة، حيث يتيح لأي شخص في المملكة فتح حساب وعرض منتجاته بالصور أو الفيديو مع الوصف ليشاهده الجمهور المستهدف ويتم التواصل مباشرة مع البائع للاستفسار أو لإكمال عملية البيع
                        من الاستلام والتسليم بشكل مباشر بدون عمولة.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- end-about-title -->
    <div class="p-terms-introduction">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-Theme-p">

  {!! $about->description !!}

                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection
@section('footer')

@include('website.layouts.footer')
@endsection
