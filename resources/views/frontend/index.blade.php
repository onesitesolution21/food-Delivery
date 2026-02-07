@extends('layouts.master-layout')

@section('content')
    <!-- Carousel Start -->
    @include('frontend.Carousel')
    <!-- Carousel End -->

    <!-- Searvices Start -->
    @include('frontend.Searvices')
    <!-- Searvices End -->

    <!-- Our Products Start -->
    @include('frontend.products')
    <!-- Our Products End -->

@endsection