@extends('landingpage.layouts.landingpage')

@section('content')
<link href="{{ asset('css/home.css') }}" rel="stylesheet" />

<div class="content">
    @include('landingpage.includes.swipe')
    <div class="news-card-items">
        @include('landingpage.includes.article-card')
    </div>
</div>
@endsection
