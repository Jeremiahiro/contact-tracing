<div class="">
    @include('partials.mobile.header.header')
    <div class="container pl-4">
        <div class="trace_date py-5">
            @include('homepage.splash.extra.time')
        </div>
        <div class="">
            <h1 class="time">
                <a href="{{ route('activity.create') }}" class="time f-46 text-white">
                    CONTACT TRACING
                </a>
            </h1>
        </div>
    </div>
</div>
