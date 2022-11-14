@extends('shopify-app::layouts.default')

@section('content')
    <!-- You are: (shop domain name) -->
    {{-- <p>You are: {{ $shopDomain ?? Auth::user()->name }}</p> --}}
    <div id="container">
        @include('layout')
    </div>
@endsection

@section('scripts')
    @parent
    <script src="{{asset('js/app.js')}}"></script>
@endsection