@extends('website.layouts.app')

@section('content')

 @php $payment = \App\Models\Payment::where([
    ['user_id',\Auth::id()],['is_accepted',2]
])->get(); @endphp
@if(!count($payment))
<!-- start title Package -->
<div class="title-Package">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>الباقات المتوفرة</h1>
                @if(isset($data->description))
                <p>{!! $data->description !!}</p>
                @endif
            </div>
            <div class="col-lg-12">
                <div class="sup-package">
                    <button class="but1">شهرية</button>
                    <button class="but2">سنوية</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- start-Offers-package -->
<div class="Offers-package">
    <div class="container">
        <div class="row">
            @foreach($packages as $package)
            <div class="col-lg-4  col-md-6">
                <div class="main-Offers-package">
                    <h2>{{$package->type}}</h2>
                    <h4>{{$package->price}} <span>رس</span></h4>
                    <h3>{{$package->duration . ' يوم '}}</h3>
                   <ul class="list-unstyled">
                       <li>{!! $package->body !!}</li>
                   </ul>
                    @if($package->duration!=0)
                    <a  href="{{route('paymentMethods',$package->id)}}" class="custom-btn">اشترك الآن</a>
              @endif
                </div>
            </div>
            @endforeach




        </div>
    </div>
</div>
@else
    <div class="alert alert-info" style="position: relative;top: 100px">
        <strong>طلبك قيد المراجعة وسيتم الرد عليكم فى خلال 48 ساعة</strong>
    </div>
@endif
@endsection

@section('footer')

@include('website.layouts.footer')

@endsection

