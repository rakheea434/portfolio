@extends('Layout.app')
@section('title','Contact')
@section('content')
<div class="row mt-5 text-center">
    
    <div class="col-md-12 mt-5">
    <h3 class="service-card-title">ঠিকানা</h3>
                <hr>
                <p class="footer-text"><i class="fas fa-map-marker-alt"></i> শেখেরটেক ৮ মোহাম্মদপুর, ঢাকা </p>
                <p class="footer-text"><i class="fas fa-phone"></i> ০১৭৮৫৩৮৮৯১৯ </p>
                <p class="footer-text"><i class="fas fa-envelope"></i> Rabbil@Yahoo.com</p>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mt-5">@include('Component.ContactMap')</div>
    <div class="col-md-6">@include('Component.HomeContact')</div>
</div>


@endsection