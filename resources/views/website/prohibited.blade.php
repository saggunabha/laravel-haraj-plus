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
    <!-- start-refused-prodcuts-title -->
    <div class="refused-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>{{$prohibited->name}} </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- end-refused-prodcuts-title -->



    <div class="refused-blog">
        <div class="container">
            <div class="row">
              {!! $prohibited->description !!}

            </div>
        </div>
    </div>

@endsection
@section('footer')
    @include('website.layouts.footer')
@endsection





