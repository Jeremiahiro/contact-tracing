@extends('layouts.app')

@section('title')
Support
@endsection

@section('custom-style')

@endsection

@section('web-content')
<script type="text/javascript">
    window.location = "{{ route('map.view') }}";

</script>
@endsection

@section('content')

<section class="my-5 py-5">


</section>

@endsection
@section('script')
<script>
    jQuery(document).ready(function ($) {

        const menus = $(".footer-bubble");

        $("#toggle-footer-menu").click(function () {
            toggleMenu();
        });

        function toggleMenu() {
            for (const child of menus) {
                child.classList.toggle("footer-bubble--active");
            }
            $('#footer-vertical-icon').toggle("footer-menu--close");
            $('#footer-horizontal-icon').toggle("slow");
        }

    });

</script>
@endsection
@section('footer')
@include('partials.mobile.footer.footer')
@endsection
