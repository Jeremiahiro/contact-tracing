<div class="modal fade right" id="userFollowers" tabindex="-1" role="dialog" aria-labelledby="sideNavlLabel">
    <div class="modal-dialog full-modal m-0 p-0" role="document">
        <div class="modal-content full-modal-content side_nav_white text-primary">
            <div class="modal-body">
                <button type="button" class="close opacity-1 float-right" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><img
                            src="{{ asset('/frontend/img/svg/back_blue.svg') }}"
                            alt="go back"></span>
                </button>
                <div class="text-uppercase">Connections</div>
                <div class="activityView">
                    <div class="activityTab">
                        <ul class="mb-0 mt-3 f-12 nav">
                            <li>
                                <a data-toggle="tab" href="#Fmutual" class="text-primary">Mutual</a>
                            </li>
                            <span class="mx-1">|</span>
                            <li class="active">
                                <a data-toggle="tab" href="#Fneutral" class="text-primary active">Neutral</a>
                            </li>
                        </ul>
                    </div>
                    <div class="py-3 tab-content">
                        <div class="tab-pane fade" id="Fmutual">
                            @foreach(auth()->user()->followings as $user)
                                <div class="mb-2 d-flex justify-content-between">
                                    <div class="d-flex align-middle">
                                        <img class="avatar avatar-md border border-primary" src="{{ $user->avatar }}"
                                            alt="{{ $user->name }}">
                                        <div class="ml-2">
                                            <h6 class="bold m-0 f-16">{{ $user->name }}</h6>
                                            <p class="light">{{ $user->username }}</p>
                                        </div>
                                    </div>
                                    <div>
                                        <button
                                            class="text-center mt-3 btn f-12 rounded blue-btn text-white action-follow"
                                            data-id="{{ $user->id }}">
                                            <input type="hidden" class="hidden F-status"
                                                value="{{ auth()->user()->isFollowing($user) ? 1 : 0 }}">
                                            <strong>
                                                @if(auth()->user()->isFollowing($user))
                                                    UNFOLLOW
                                                @else
                                                    FOLLOW
                                                @endif
                                            </strong>
                                            <div class="spinner-border text-white ml-2 spinner-border-sm d-none"
                                                id="follow-spinner" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="tab-pane active" id="Fneutral">
                            @foreach(auth()->user()->followers as $user)
                                <div class="mb-2 d-flex justify-content-between">
                                    <div class="d-flex align-middle">
                                        <img class="avatar avatar-md border border-primary" src="{{ $user->avatar }}"
                                            alt="{{ $user->name }}">
                                        <div class="ml-2">
                                            <h6 class="bold m-0 f-16">{{ $user->name }}</h6>
                                            <p class="light">{{ $user->username }}</p>
                                        </div>
                                    </div>
                                    <div>
                                        <button
                                            class="text-center mt-3 btn f-12 rounded blue-btn text-white action-follow"
                                            data-id="{{ $user->id }}">
                                            <input type="hidden" class="hidden F-status"
                                                value="{{ auth()->user()->isFollowing($user) ? 1 : 0 }}">
                                            <strong>
                                                @if(auth()->user()->isFollowing($user))
                                                    UNFOLLOW
                                                @else
                                                    FOLLOW
                                                @endif
                                            </strong>
                                            <div class="spinner-border text-white ml-2 spinner-border-sm d-none"
                                                id="follow-spinner" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
