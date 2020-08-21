<div class="">
    @include('partials.mobile.header.header')

    <div class="container pl-4">
        <div class="trace_date py-5">
            @include('homepage.splash.extra.time')
        </div>

        <div class="d-flex justify-content-around align-items-center">
            <div class="text-center">
                <a href="{{ route('activity.index') }}">
                    <img src="{{  asset('/frontend/img/svg/marker.svg') }}" alt="marker">
                </a>
                <div class="py-2 f-12 bold">
                    @guest
                    0
                    @else
                    <span class="counter" data-count="{{ $activities }}">
                        0
                    </span>
                    @endguest
                    Locations
                </div>
            </div>
            <div class="text-center pt-2">
                <a href="{{ route('search')}}">
                    <img src="{{  asset('/frontend/img/svg/person.svg') }}" alt="contacts">
                </a>
                <div class="py-2 f-12 bold">
                    @guest
                    0
                    @else
                    <span class="counter" data-count="{{ $tags }}">
                        0
                    </span>
                    @endguest
                    Contacts
                </div>
            </div>
            <div class="text-center pt-2">
                <a href="{{ route('map.view')}}"><img src="{{  asset('/frontend/img/svg/people.svg') }}" alt="Active"></a>
                <div class="py-2 f-12 bold">
                    @if($count > 999 && $count <= 999999) 
                    <span class="counter" data-count="{{ $count/1000 . ' K' }}">0</span>
                    @elseif($count> 999999) 
                    <span class="counter" data-count="{{ $count/1000000 . ' M' }}">0</span>
                    @else
                    <span class="counter" data-count="{{ $count }}">0</span>
                    @endif
                    Active
                </div>
            </div>
        </div>

        <div class="pl-4">
            <a href="{{ route('activity.index') }}" class="f-14 border border-white py-1 px-3 rounded text-white">
                VIEW
            </a>
        </div>
    </div>

</div>
