@extends('website.layouts.app')
@section('content')
    <!-- start-commission-title -->
    <div class="refused-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>{{$commissionPrivacy->name}}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- end-commission-title -->


    <div class="refused-blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    {!! $commissionPrivacy->description !!}
                </div>
            </div>
        </div>
    </div>

    @endsection
@section('footer')
    @include('website.layouts.footer')
    @endsection






















