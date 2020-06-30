<div class="carousel-item splash splash-2">
    @include('partials.mobile.header.header-transparent')

    <div class="container">
        <div class="trace_date py-5">
            <h1>{{ date('d') }}</h1>
            <h4>{{ date('M, Y') }}</h4>
            <h3>{{ date('H:i A') }}</h3>
        </div>
    </div>

    <div class="container">
        <div class="d-flex justify-content-around align-items-center">
            <span>
                <a href="#"><img src="assets/img/map-pin-marked.png" alt="marker"></a>
                <p class="py-2">23 Locations</p>
            </span>
            <span class="pt-1"> 
                <a href="#"><img src="assets/img/Icon material-people.png" alt="contacts"></a>
                <p class="py-2">248 Contacts</p>
            </span>
            <span class="pt-1">
                <a href="#"><img src="assets/img/Icon material-people1.png" alt="Active"></a>
                <p class="py-2">2.6m Active</p>
            </span>
        </div>
    </div>

    <div class="container">
        <div class="pl-4">
            <button type="button" class="btn border-2 border-white btn-sm btn-transparent text-white px-3">
                VIEW
            </button>
        </div>
        
    </div>
  </div>