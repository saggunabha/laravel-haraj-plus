<?php

$responseData = payrequest($cost,$type);

$respone = json_decode($responseData, TRUE);

$id = $respone['id'];

// $user = auth()->user()->id;

?>
@extends('website.layouts.app')

@section('content')
    <!-- start commmission forma -title -->
    <div class="title-forma-data">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2> ادفع عن طريق بطاقتك الإتمانية الخاصة بك </h2>
                </div>
            </div>
        </div>
    </div>

<script src="https://oppwa.com/v1/paymentWidgets.js?checkoutId=<?php echo $id;?>"></script>
<script>
    var wpwlOptions = {
        locale: "ar",
        numberFormatting:false
    }
</script>
<form action="@if($type == "بطاقة مدى")?{{ route('pay-result') }}@else{{ route('pay-result2') }}@endif" class="paymentWidgets" 
@if($type == "بطاقة مدى") data-brands= 'MADA' @else data-brands= "VISA MASTER" @endif>

</form>
	<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/require.js/2.3.6/require.js"></script>
 



@endsection


@include('website.layouts.footer')