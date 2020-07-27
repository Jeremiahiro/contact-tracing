<div class="">
    @include('partials.mobile.header.header')

    <div class="container pl-4">
        <div class="trace_date py-5">
            @include('homepage.splash.extra.time')
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
