<div class="">
    @include('partials.mobile.header.header-transparent')

    <div class="container pl-4">
        <div class="trace_date py-5">
            <h1>{{ date('d') }}</h1>
            <h4>{{ date('M, Y') }}</h4>
            <h3>{{ date('H:i A') }}</h3>
        </div>

        <div class="d-flex justify-content-around align-items-center">
            <span class="text-center">
                <a href="#"><img src="{{  asset('/frontend/img/svg/marker.svg') }}" alt="marker"></a>
                <div class="py-2">
                    @guest
                        0
                    @else
                        <span class="count">{{ Auth::user()->activities->count() }}</span>
                    @endguest
                    Locations
                </div>
            </span>
            <span class="text-center pt-2">
                <a href="#"><img src="{{  asset('/frontend/img/svg/person.svg') }}" alt="contacts"></a>
                <div class="py-2">
                    @guest
                        0
                    @else
                        <span class="count">{{ Auth::user()->tags->count() }}</span>
                    @endguest
                    Contacts
                </div>
            </span>
            <span class="text-center pt-2">
                <a href="#"><img src="{{  asset('/frontend/img/svg/people.svg') }}" alt="Active"></a>
                <div class="py-2">
                    @if ($count > 999 && $count <= 999999)
                        {{ $count/1000 . ' K' }}
                    @else
                    @if ($count > 999999)
                        {{ $count/1000000 . ' M' }}
                    @else
                        {{ $count }}
                    @endif
                    @endif
                    Active
                </div>
            </span>
        </div>

        <div class="pl-4">
            <a href="{{ route('activity.index') }}" class="border border-2 border-white py-1 px-3 rounded text-white">
                VIEW
            </a>
        </div>
    </div>

</div>
