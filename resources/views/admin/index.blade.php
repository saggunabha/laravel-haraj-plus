@extends('admin.layouts.app')

@section('pageTitle', 'لوحة التحكم')



@section('pageSubTitle', 'الرئيسية')



@section('content')



    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="{{route('main')}}"><i class="fa fa-home"></i>الرئيسية</a></li>
                <li>احصائيات الموقع</li>
            </ul>
        </div>



        <!--start div-->
        <div class="col-12 statistics-div-grid margin-bottom-div">
            <div class="statistics-text">
                <div class="statistics-box text-center">
                    <div class="row no-marg-row">
                        <!--start  div-->
                        <div class="col-xl-3 col-6 st-text-grid">
                            <div class="st-text-div">
                                <h5 class="color-bg box-secondary-title">المستخدمين</h5>

                                <div class="st-icon color-bg">
                                    <i class="fa fa-user"></i>
                                </div>
                                <h4>{{$normalUsers->count()}}</h4>
                            </div>
                        </div>
                        <!--end  div-->

                        <!--start  div-->
                        <div class="col-xl-3 col-6 st-text-grid">
                            <div class="st-text-div">
                                <h5 class="color-bg box-secondary-title">رجال الأعمال</h5>

                                <div class="st-icon color-bg">
                                    <i class="fa fa-user"></i>
                                </div>
                                <h4>{{$buinessUsers->count()}}</h4>
                            </div>
                        </div>
                        <!--end  div-->

                        <!--start  div-->
                        <div class="col-xl-3 col-6 st-text-grid">
                            <div class="st-text-div">
                                <h5 class="color-bg box-secondary-title">منتجات المستخدمين</h5>

                                <div class="st-icon color-bg">
                                    <i class="fa fa-car"></i>
                                </div>
                                <h4>{{$normalProducts->count()}}</h4>
                            </div>
                        </div>
                        <!--end  div-->

                        <!--start  div-->
                        <div class="col-xl-3 col-6 st-text-grid">
                            <div class="st-text-div">
                                <h5 class="color-bg box-secondary-title">منتجات رجال الأعمال</h5>

                                <div class="st-icon color-bg">
                                    <i class="fa fa-car"></i>
                                </div>
                                <h4>{{$buinessProducts->count()}}</h4>
                            </div>
                        </div>
                        <!--end  div-->

                        <div class="col-xl-3 col-6 st-text-grid">
                            <div class="st-text-div">
                                <h5 class="color-bg box-secondary-title">الأقسام الرئيسية</h5>

                                <div class="st-icon color-bg">
                                    <i class="fa fa-tshirt"></i>
                                </div>
                                <h4>{{$categories->count()}}</h4>
                            </div>
                        </div>
                        <!--end  div-->

                        <!--start  div-->
                        <div class="col-xl-3 col-6 st-text-grid">
                            <div class="st-text-div">
                                <h5 class="color-bg box-secondary-title">الأقسام الفرعية</h5>

                                <div class="st-icon color-bg">
                                    <i class="fa fa-ice-cream"></i>
                                </div>
                                <h4>{{$subCategories->count()}}</h4>
                            </div>
                        </div>
                        <!--end  div-->

                        <!--start  div-->
                        <div class="col-xl-3 col-6 st-text-grid">
                            <div class="st-text-div">
                                <h5 class="color-bg box-secondary-title">الماركات</h5>

                                <div class="st-icon color-bg">
                                    <i class="far fa-copyright"></i>
                                </div>
                                <h4>{{$brands->count()}}</h4>
                            </div>
                        </div>
                        <!--end  div-->

                        <!--start  div-->
                        <div class="col-xl-3 col-6 st-text-grid">
                            <div class="st-text-div">
                                <h5 class="color-bg box-secondary-title">الاعلانات</h5>

                                <div class="st-icon color-bg">
                                    <i class="fa fa-ad"></i>
                                </div>
                                <h4>{{$ads->count()}}</h4>
                            </div>
                        </div>
                        <!--end  div-->

                        <!--start  div-->
                        <div class="col-xl-3 col-6 st-text-grid">
                            <div class="st-text-div">
                                <h5 class="color-bg box-secondary-title">الباقات</h5>

                                <div class="st-icon color-bg">
                                    <i class="fa fa-box"></i>
                                </div>
                                <h4>{{$packages->count()}}</h4>
                            </div>
                        </div>
                        <!--end  div-->

                        <div class="col-xl-3 col-6 st-text-grid">
                            <div class="st-text-div">
                                <h5 class="color-bg box-secondary-title">الاتصالات</h5>

                                <div class="st-icon color-bg">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <h4>{{$contacts->count()}}</h4>
                            </div>
                        </div>
                        <!--end  div-->

                        <!--start  div-->
                        <div class="col-xl-3 col-6 st-text-grid">
                            <div class="st-text-div">
                                <h5 class="color-bg box-secondary-title">البلاغات</h5>

                                <div class="st-icon color-bg">
                                    <i class="far fa-hand-paper"></i>
                                </div>
                                <h4>{{$reports->count()}}</h4>
                            </div>
                        </div>
                        <!--end  div-->

                        <!--start  div-->
                        <div class="col-xl-3 col-6 st-text-grid">
                            <div class="st-text-div">
                                <h5 class="color-bg box-secondary-title">الحسابات البنكية</h5>

                                <div class="st-icon color-bg">
                                    <i class="fa fa-money-check"></i>
                                </div>
                                <h4>{{$bankAccounts->count()}}</h4>
                            </div>
                        </div>
                        <!--end  div-->

                        <!--start  div-->
                        <div class="col-xl-3 col-6 st-text-grid">
                            <div class="st-text-div">
                                <h5 class="color-bg box-secondary-title">الترقيات المعلقة</h5>

                                <div class="st-icon color-bg">
                                    <i class="fas fa-chess-queen"></i>
                                </div>
                                <h4>{{$pendingPayments->count()}}</h4>
                            </div>
                        </div>
                        <!--end  div-->

                        {{--<div class="col-xl-3 col-6 st-text-grid">
                            <div class="st-text-div">
                                <h5 class="color-bg box-secondary-title">العمولات المعلقة</h5>

                                <div class="st-icon color-bg">
                                    <i class="fas fa-money-bill-wave-alt"></i>
                                </div>
                                <h4>{{$pendingCommissions->count()}}</h4>
                            </div>
                        </div>--}}
                        <!--end  div-->

                        <!--start  div-->
                        <div class="col-xl-3 col-6 st-text-grid">
                            <div class="st-text-div">
                                <h5 class="color-bg box-secondary-title">المشتركين</h5>

                                <div class="st-icon color-bg">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <h4>{{$subscribers->count()}}</h4>
                            </div>
                        </div>
                        <!--end  div-->

                        <!--start  div-->
                        <!--<div class="col-xl-3 col-6 st-text-grid">-->
                        <!--    <div class="st-text-div">-->
                        <!--        <h5 class="color-bg box-secondary-title">قيمة الترقيات</h5>-->

                        <!--        <div class="st-icon color-bg">-->
                        <!--            <i class="fas fa-funnel-dollar"></i>-->
                        <!--        </div>-->
                        <!--        <h4>{{$totalPayment . ' ريال '}}</h4>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--end  div-->

                    </div>
                </div>

            </div>
        </div>

    </div>
    <!--end div-->









    </div>
    <!--end row-->

@endsection

    @section('script')
    <script>
        // line chart data
        var buyerData = {
            labels: ["1/12", "5/12", "10/12", "15/2", "20/12", "25/12", "30/12"],
            datasets: [{
                fillColor: "#eee",
                strokeColor: "#ccc",
                pointColor: "#fff",
                pointStrokeColor: "#ccc",
                data: [203, 156, 99, 251, 305, 247, 300, 400]
            }]
        }
        // get line chart canvas
        var buyers = document.getElementById('statistics').getContext('2d');
        // draw line chart
        new Chart(buyers).Line(buyerData);
    </script>
    @endsection









