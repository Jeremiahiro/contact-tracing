@if($user->activities->count() > 0)
<div class="activityView">
    <div class="activityTab">
        <ul class="mb-0 mt-3 f-12 nav">
            <li class="active">
                <a data-toggle="tab" href="#tab1" class="text-primary active">Places</a>
            </li>
            <span class="mx-1">|</span>
            <li><a data-toggle="tab" href="#tab2" class="text-primary">People</a></li>
        </ul>
    </div>
    <div class="py-3 tab-content">
        <div class="tab-pane fade in active" id="tab1">
            <div class="row px-2" id="activity-list">
                @include('profile.activity')
            </div>
            <div class="text-center mb-5">
                <div class="spinner-grow text-primary load-activity d-none" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
        <div class="tab-pane fade mb-5" id="tab2">
            <div id="activityTaggedControls" class="carousel slide" data-ride="carousel" style="height: 150px;">
                <div class="carousel-inner mb-5" role="listbox">
                    @foreach($user->tagging->chunk(12) as $tags)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        @foreach($tags->chunk(6) as $persons)
                        <div class="row px-2">
                            @foreach($persons as $person)
                            <div class="col-2 text-center p-0 mx-0">
                                <div class="m-1">
                                    @if($person->person_id != null)
                                    <a href="{{ route('dashboard.show', $person->tagged->uuid) }}" class="text-primary">
                                        <img src="{{ $person->tagged->avatar }}"
                                            class="avatar avatar-sm border border-primary" alt="Activity Tag">
                                        <p class="f-10 mb-0 mt-1 bold text-capitalize">
                                            {{ \Illuminate\Support\Str::limit($person->tagged->username, 8) }}
                                        </p>
                                    </a>
                                    @else
                                    <img src="{{ $person->avatar }}" class="avatar avatar-sm" alt="Activity Tag">
                                    <p class="f-10 mb-0 mt-1 bold text-capitalize">
                                        {{ \Illuminate\Support\Str::limit($person->name, 8) }}
                                    </p>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
                <ol class="carousel-indicators" style="top: 90%">
                    @foreach($user->tagging->chunk(12) as $tags)
                    <li data-target="#activityTaggedIndicators" data-slide-to="{{ $loop->index }}"
                        class="bg-blue {{ $loop->first ? 'active' : '' }}">
                    </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>
@else
@if($user->id === auth()->user()->id)
<div class="text-center">
    <a href="{{ route('activity.create') }}" class="btn blue-btn text-white">
        Add an Activity
    </a>
</div>
@endif
@endif
