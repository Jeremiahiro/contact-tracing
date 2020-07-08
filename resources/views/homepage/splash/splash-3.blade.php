<div class="">
    @include('partials.mobile.header.header-transparent')

    <div class="container pl-4">
        <div class="trace_date py-5">
            <h1 class="date">{{ date('d') }}</h1>
            <h4 class="month">{{ date('M, Y') }}</h4>
            <h3 class="time">{{ date('H:i A') }}</h3>
        </div>

        <a class="add_contact text-white" href="{{ route('activity.create') }}">
            <div class="mb-2">
                <img src="{{  asset('/frontend/img/svg/add.svg') }}" alt="Add Activity">
            </div>
            <span class="">
                <span class="border border-white py-1 px-3 rounded f-14">ADD</span>
            </span>
        </a>
    </div>
</div>
