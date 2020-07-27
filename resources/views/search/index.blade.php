@extends('layouts.app')

@section('custom-style')
<link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
@endsection

@section('web-content')
<h1 class="text-center">Please use a mobile device</h1>
@endsection

@section('mobile-content')

<section class="mb-5 p-3 mt-3 bg-gray splash rounded">
    <div class="rounded">
        <input id="search" type="search" class="px-3 white-input input rounded-pill" name="search"
            value="" placeholder="People" autocomplete="off">
    </div>
    <div id="search_result" class="p-3 search-result"></div>  
    {{-- <div id="search_result" class="py-3"></div> --}}
</section>

@endsection
@section('script')
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#search').on('keyup', function () {
            var query = $(this).val();
                if(query.length > 0) {
                    $.ajax({
                    url: "{{ route('search.query') }}",
                    type: "GET",
                    data: {
                        'search': query
                    },
                    success: function (data) {
                        $('#search_result').html(data);
                    }
                })
            }
        });
    });

</script>
@endsection
@section('footer')
@include('partials.mobile.footer.footer')
@endsection
