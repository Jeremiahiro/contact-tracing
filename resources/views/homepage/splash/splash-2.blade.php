<div class="">
    @include('partials.mobile.header.header')

    <div class="container pl-4">
        <div class="trace_date py-5">
            <h1 class="date">{{ date('d') }}</h1>
            <h4 class="month">{{ date('M, Y') }}</h4>
            <h3 class="time">{{ date('H:i A') }}</h3>
        </div>

        <div class="d-flex justify-content-around align-items-center">
            <span class="text-center">
                <a href="#"><img src="{{  asset('/frontend/img/svg/marker.svg') }}" alt="marker"></a>
                <div class="py-2 f-12 bold">
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
                <div class="py-2 f-12 bold">
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
                <div class="py-2 f-12 bold">
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
            <a href="{{ route('activity.index') }}" class="f-14 border border-white py-1 px-3 rounded text-white">
                VIEW
            </a>
        </div>
    </div>

</div>
