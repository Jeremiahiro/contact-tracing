<div class="modal fade show" id="activityTags-{{ $person->id }}" role="dialog" aria-labelledby="activityTagsModal" aria-hidden="true">
    <div class="modal-dialog route_purple mt-5 mx-0 px-3 py-4" style="pointer-events:auto;" role="document">
        <div class="">
            <div class="d-flex justify-content-between mb-0">
                <h6 class="m-0 bold f-10">Route & Interactions</h6>
                <button type="button" style="opacity:1;" class="btn close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><img src="{{ asset('/frontend/img/svg/Icon-close-circle.svg')}}"
                            alt="map-pin"></span>
                </button>
            </div>
            {{-- @foreach ($collection as $item)
                
            @endforeach --}}
            {{-- <div class="d-flex justify-content-between bold mb-3">
                <div>
                    <img src="{{ $person->avatar }}" class="avatar avatar-md" alt="Activity Tag">
                </div>
                <div class="d-flex mr-auto p-1">
                    <h3 class="f-30 bold m-0">{{ $firstStringCharacter = substr($person->name, 0, 1) }}</h3>
                    <span style="padding-top:10px;">
                        <p class="f-18 bold bg-white px-1 m-0 purple-text rounded">{{ $firstStringCharacter = substr($person->name, 1, 1) }}</p>
                    </span>
                </div>
            </div> --}}

            {{-- <div id="ActivityConnectionCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                      <div class="container">
                        <div class="row">
                            <div class="col-6 p-1">
                                <div class="d-flex">
                                     <p class="p-8 bold m-0 py-1">8AM</p>
                                    <p class="p-8 bold m-0 py-1">-11:30AM</p>
                                </div>
                               
                                <div class="bg-blue p-1 text-white text-center position-relative"
                                    style="height:122px; background-image: url('')">
                                    <div class="map-img-overlay">
                                        <div class="d-flex justify-content-between p-2">
                                            <div class="">
                                                <a href="" class="text-white" data-toggle="modal"
                                                    data-target="#tagModal">
                                                    <div class="text-left">
                                                        <h4 class="month bold f-12 m-0">
                                                            June, 2020</h4>
                                                        <h3 class="time light f-12">
                                                            10:54 AM</h3>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="">
                                                <a href="" class="text-white" data-toggle="modal"
                                                    data-target="#activityMenu">
                                                    <i class="fa fa-ellipsis-v"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between bold py-1 mb-2">
                                    <div class="d-flex">
                                        <img src="{{ asset('/frontend/img/svg/map-pin-markedwhite.svg')}}" alt="map-pin">
                                        <div class="ml-2 pt-1">
                                            <h3 class="m-0 p-0 f-8 bold">PARK & SHOP</h3>
                                            <p class="m-0 p-0 f-6 regular">147 Aba road, Port Harcourt , Rivers State</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="py-1 connectionlarge ">
                                    <h3 class="f-10 bold">View Interaction</h3>
                                    <p class="f-8 bold">16.05.20</p>
                                </div>
                               
                                <div class="row">
                                    <div class="col col-4 text-center">
                                        <img src="{{ asset('frontend/img/user1.jpg') }}" class="avatar avatar-sm" alt="">
                                        <p class="f-8 bold py-1 m-0">John</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
