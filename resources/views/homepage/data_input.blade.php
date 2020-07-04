@extends('layouts.app')

@section('custom-style')
    <link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/datainput.css') }}" rel="stylesheet">
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
        <div class="py-5">
            <h3 class="recordactivity">Record Activity</h3>
            <form>
                <div class="form-group">
                    <label for="wherefrom">WHERE</label>
                    <input type="text" class="blue_input form-control bg-light" id="wherefrom" placeholder="24 Sanga Street Dline">
                </div>
                <div class="form-group">
                    <label for="whereto">WHERE</label>
                    <input type="text" class="blue_input form-control bg-light" id="whereto" placeholder="24 Sanga Street Dline">
                </div>
                <div class="form-group">
                    <label for="time">WHEN</label>
                    <input type="datetime-local" class="blue_input form-control bg-light" id="time" >
                </div>
                <div class="form-group m-0">
                    <label for="contacts">WHO (Meet or See)</label><br>
                </div>
                <div class="p-3 bg-light">
                    <div class="form-group">
                        <input type="file" class="p-1 contact-file-input" id="contact-image">
                    </div>
                    <div class="form-group d-flex justify-content-between contacts">
                        <label for="contactname" class="pt-3">Name</label>
                        <input type="text" class="form-control bg-light" id="contactname">
                    </div>
                    <div>
                        <p class="m-0">Additional Details</p>
                    </div>
                    <div class="form-group d-flex justify-content-between contacts">
                        <label for="contactemail" class="pt-3">Email</label>
                        <input type="email" class="form-control bg-light" id="email">
                    </div>
                    <div class="form-group d-flex justify-content-between contacts">
                        <label for="contactphone" class="pt-3">Phone Number</label>
                        <input type="number" class="form-control bg-light" id="phone">
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-outline-light"><img src="{{  asset('/frontend/img/svg/addcontact.svg') }}" alt="add contact"></button>
                    </div>
                </div>
                <div class="d-flex justify-content-between py-2">
                    <p class="bg-light p-2">Peter Drobac</p>
                    <p class="bg-light p-2">Peter Drobac</p>
                    <p class="bg-light p-2">Peter Drobac</p>
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
