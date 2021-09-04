@extends('teamilk.master')

@section('other_styles')

   {{-- <link href="{{ asset('dashboard/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet"> --}}

@stop

@section('content')

@if(isset($error))

{{ $error }}

@endif
{{-- @include('teamilk.feature') --}}
@include('teamilk.slider3')
{{-- @include('teamilk.service') --}}
{{-- y te suc khoe --}}
@include('teamilk.popular')
{{-- lam dep --}}
@include('teamilk.shop-2-2')
{{-- tieu dung --}}
@include('teamilk.popular-thung')

 {{-- gia dung --}}
@include('teamilk.shop-2-7')
{{-- sach van phong pham --}}
@include('teamilk.popular-may-loc')
{{-- @include('teamilk.shop-linh-kien') --}}
@include('teamilk.blog')

 {{-- @include('teamilk.request')  --}}
{{--  @include('teamilk.testimonial')  --}}
@include('teamilk.customer-review') 
@include('teamilk.partner') 
@stop

@section('other_scripts')

   {{-- <script src="{{ asset('assets-tea/custom/order.js?v=0.0.6') }}" type="text/javascript"></script> --}}

@stop