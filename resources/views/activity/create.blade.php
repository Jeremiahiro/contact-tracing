@extends('layouts.app')

@section('custom-style')
    <link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
@endsection


@section('header')

@endsection

@section('web-content')
    <h1 class="text-center">Please use a mobile device</h1>
@endsection

@section('mobile-content')
<section>
    @include('partials.mobile.header.header-white')
    <div class="container">
        <div class="py-5 recordactivity">
            <p >Record Activity</p>
            <form>
                <div class="form-group mb-1">
                    <label class="input_label" for="wherefrom">Where</label>
                    <input type="text" class="blue_input form-control bg-light" id="wherefrom" placeholder="From">
                </div>
                <div class="form-group">
                    <input type="text" class="blue_input form-control bg-light" id="whereto" placeholder="To">
                </div>
                <div class="form-group">
                    <label class="input_label" for="when">When</label>
                    <input type="datetime-local" class="blue_input form-control bg-light" id="time" >
                </div>
    
                <div class="form-group mb-1">
                    <label class="input_label" for="contacts">Who</label>
                    <input type="text" class="blue_input form-control bg-light" id="contactname" placeholder="Name">
                </div>

                <div class="form-group mb-1">
                    <input type="email" class="blue_input form-control bg-light" id="contactemail" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="number" class="blue_input form-control bg-light" id="contactemail" placeholder="Phone">
                </div>
                <div class="d-flex justify-content-between pt-2">
                    <p class="blue-btn rounded routeheader p-1">Peter Drobac</p>
                    <p class="blue-btn rounded routeheader p-1">Peter Drobac</p>
                    <p class="blue-btn rounded routeheader p-1">Peter Drobac</p>
                    <p class="blue-btn rounded routeheader p-1">Peter Drobac</p>
                    <p class="blue-btn rounded routeheader p-1">Peter Drobac</p>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn"><img src="{{  asset('/frontend/img/svg/addcontact.svg') }}" alt="add contact"></button>
                </div>

                <div class="form-group text-right">
                    <button type="submit" class="btn blue-btn">ADD</button>
                </div>
                
            </form>
        </div>
    </div>
    @include('partials.mobile.footer.footer')
</section>

@endsection
