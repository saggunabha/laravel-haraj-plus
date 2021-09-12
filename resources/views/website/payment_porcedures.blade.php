@extends('website.layouts.app')

@section('content')

<div class="container payment_porcedures">
    {!! \App\Models\StaticPages::find(4)->description !!}
</div>
@endsection

@include('website.layouts.footer')
