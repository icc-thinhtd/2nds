@extends('frontend.layouts.master')
@section('title')
    <title>2nds - Tr Thinh</title>
@endsection
@section('content')

    <!-- Banner -->

    @include('frontend.includes.banner');

    <!-- Characteristics -->

    @include('frontend.includes.characteristics');

    <!-- Deals of the week -->

    @include('frontend.includes.deals');

    <!-- Popular Categories -->

    {{--    @include('frontend.includes.popular_categories');--}}

    <!-- Banner -->
    @include('frontend.includes.banner_2');


    <!-- Hot New Arrivals -->

    {{--    @include('frontend.includes.new_arrivals');--}}

    <!-- Best Sellers -->

    {{--    @include('frontend.includes.best_sellers');--}}

    <!-- Adverts -->

    {{--    @include('frontend.includes.adverts');--}}

    <!-- Trends -->

    {{--    @include('frontend.includes.trends');--}}

    <!-- Reviews -->

    {{--    @include('frontend.includes.reviews');--}}
@endsection
