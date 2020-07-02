@extends('layouts.app')

@section('custom-style')
    <link href="{{ asset('frontend/css/auth.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/footer.css') }}" rel="stylesheet">
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
            <h3>Record Activity</h3>
            <form>
                <div class="form-group">
                    <label for="wherefrom">WHERE</label>
                    <input type="text" class="form-control" id="wherefrom" placeholder="24 Sanga Street Dline">
                </div>
                <div class="form-group">
                    <label for="whereto">WHERE</label>
                    <input type="text" class="form-control" id="whereto" placeholder="24 Sanga Street Dline">
                </div>
                <div class="form-group">
                    <label for="time">WHEN</label>
                    <input type="datetime-local" class="form-control" id="time" >
                </div>
                <div class="form-group">
                    <label for="contacts">WHO (Meet or See)</label><br>
                    <input type="file" class="p-1 contact-file-input" id="contact-image">
                </div>
                <div class="form-group d-flex justify-content-between contacts">
                    <label for="contactname">Name</label>
                    <input type="text" class="form-control" id="contactname">
                </div>
                <div>
                    <p>Additional Details</p>
                </div>
                <div class="form-group d-flex justify-content-between contacts">
                    <label for="contactemail">Email</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group d-flex justify-content-between contacts">
                    <label for="contactphone">Phone Number</label>
                    <input type="number" class="form-control" id="phone">
                </div>
                <button type="submit" class="w-100 btn btn-outline-primary">SIGN UP</button>
            </form>
        </div>
    </div>
    @include('partials.mobile.footer.footer')
</section>

@endsection
