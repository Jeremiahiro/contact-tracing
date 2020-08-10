@extends('layouts.app')

@section('title')
ERROR
@endsection

@section('mobile-content')
<div class="bg-blue-100 min-h-screen">
    @include('layouts.header.header-white')
    <section class="w-full max-w-sm mx-auto pt-2 pb-10">
        <div class="my-5 py-5">
            <h1 class="m-0 font-2xl">404</h1>
            <h6>Page not found</h6>
            <p><a href="{{ route('home')}}">Click here to return to Homepage</a></p>
                {{ env('APP_NAME')}}
        </div>
    </section>
</div>
@endsection