<div class="carousel-item splash splash-3">
    @include('partials.mobile.header.header-transparent')

    <div class="container">
        <div class="trace_date py-5">
            <h1>{{ date('d') }}</h1>
            <h4>{{ date('M, Y') }}</h4>
            <h3>{{ date('H:i A') }}</h3>
        </div>
    </div>

    <div class="container">
        <div class="add_contact py-3 pl-4">
            <span>
                <a href="#"><img src="{{  asset('/frontend/img/svg/add.svg') }}" alt="add"></a>
            </span>
        </div>
    </div>

    <div class="container">
        <div class="pl-4">
            <button type="button" class="btn border-2 border-white btn-sm btn-transparent text-white px-3">
                ADD
            </button>
        </div>

    </div>
</div>
