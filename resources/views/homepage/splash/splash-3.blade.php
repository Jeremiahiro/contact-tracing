<div class="">
    @include('partials.mobile.header.header-transparent')

    <div class="container pl-4">
        <div class="trace_date py-5">
            <h1>{{ date('d') }}</h1>
            <h4>{{ date('M, Y') }}</h4>
            <h3>{{ date('H:i A') }}</h3>
        </div>

        <a class="add_contact text-white" href="{{ route('activity.create') }}">
            <div class="mb-2">
                <img src="{{  asset('/frontend/img/svg/add.svg') }}" alt="Add Activity">
            </div>
            <span class="">
                <span class="border border-2 border-white py-1 px-3 rounded">ADD</span>
            </span>
        </a>
    </div>
</div>
