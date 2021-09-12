@extends('website.layouts.app')

@section('content')

<div class="container haraj-specials">
{!! \App\Models\StaticPages::find(6)->description !!}
</div>

@endsection
@section('footer')

    @include('website.layouts.footer')
@endsection
