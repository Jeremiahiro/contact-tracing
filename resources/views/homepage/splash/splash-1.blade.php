<div class="">
    @include('partials.mobile.header.header')
    <div class="container pl-4">
        <div class="trace_date py-5">
            <h1 class="date">{{ date('d') }}</h1>
            <h4 class="month">{{ date('M, Y') }}</h4>
            <h3 class="time">{{ date('H:i A') }}</h3>
        </div>
        <div class="">
            <h1 class="time">
                <a href="{{ route('activity.create') }}" class="time text-white">
                    CONTACT TRACING
                </a>
            </h1>
        </div>
    </div>
</div>
