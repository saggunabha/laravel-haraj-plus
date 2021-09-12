@extends('website.layouts.app')

@section('content')

    <!-- start pay-ment-title -->
    <div class="pay-ment-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>
                        طرق الدفع
                    </h1>
                    <p>
                        اختر طريقة الدفع المناسبة لك
                    </p>
                    <p>
                       
                        {{ isset($package)?$package->type: '' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- end pay-ment-title -->

    <!-- start  choose -pay-ment- -->

@foreach($paymentMethods as $paymentMethod)
    <div class="Choose-pay-ment container  wow fadeIn">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-3 img-pay-ment">
                <div class="img-pay-men-1">
                    @if($paymentMethod->type=='حساب بنكى')
                        <p> تحويل بنكى</p>
                    @else
                    <img src="{{asset($paymentMethod->image)}}" alt="">
                        @endif
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-6">
                @if($paymentMethod->type == 'حساب بنكى')
                <p>ادفع عن طريق استخدام {{$paymentMethod->type}} الخاص بك </p>
         @else
         
            <p>ادفع عن طريق استخدام {{$paymentMethod->type}} الخاصة بك </p>
         
         @endif
            </div>

            <div class="col-lg-3 col-md-3 col-3">

                 @if($paymentMethod->type=='حساب بنكى')<a href="{{route('payments.create',$package->type)}}"  class="custom-btn"> اختيار</a>
                  @else 
                    <form action="{{ route('pay')}}" method="post">
                        @csrf
                       <input type="hidden" name="type" value="{{ $paymentMethod->type }}">
                       <input type="hidden" name="price" value="{{ $package->price }}">
                       <input type="hidden" name="package" value="{{ $package->id }}">
                       <input type="submit" class="custom-btn payment" value="اختيار">
                    </form>
                    @endif 

            </div>

        </div>
    </div>
@endforeach




@endsection
@section('footer')
    @include('website.layouts.footer')

@endsection
