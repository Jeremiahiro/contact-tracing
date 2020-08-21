<div class="modal fade" id="settingsModal" tabindex="-1" role="dialog" aria-labelledby="settingsModalLabel">
    <div class="modal-dialog full-modal m-0 p-0" role="document">
        <div class="modal-content full-modal-content side_nav_purple text-white text-left">
            <div class="modal-body">
                <button type="button" class="close opacity-1 float-right" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><img
                            src="{{ asset('/frontend/img/svg/back.svg') }}"
                            alt="go back"></span>
                </button>
                
                <a href="{{ route('dashboard.index') }}" class="text-white">
                    <img src="{{ Auth::user()->avatar }}" class="avatar avatar-md" alt="default avatar">
                    <h6 class="m-0 f-16">{{ auth()->user()->name }}</h6>
                    <p class="regular">{{ auth()->user()->username }}</p>
                </a>

            <div class="">
                <nav class="nav flex-column">
                    <a class="text-white bold f-16 py-2" href="{{ route('dashboard.edit', auth()->user()->uuid) }}">
                        <i class="mr-2 fa fa-user"></i> Edit Profile 
                    </a>
                    <a class="text-white bold f-16 py-2" href="{{ route('about')}}">
                        <i class="mr-2 fa fa-info-circle"></i> About
                    </a>
                    <a class="text-white bold f-16 py-2" href="{{ route('privacy')}}">
                        <i class="mr-2 fa fa-file"></i> Privacy Policy 
                    </a>
                    <a class="text-white bold f-16 py-2" href="{{ route('tos')}}">
                        <i class="mr-2 fa fa-sticky-note"></i> Terms of Service 
                    </a>
                    <a class="text-white bold f-16 py-2" href="{{ route('gdpr.dpa')}}">
                        <i class="mr-2 fa fa-database"></i> GDPR / DPA 
                    </a>
                    <a class="text-muted bold f-16 py-2" href="#" disabled aria-disabled="true">
                        <i class="mr-2 fa fa-question-circle"></i> FAQ 
                    </a>
                    <a class="text-muted bold f-16 py-2" href="#" disabled aria-disabled="true">
                        <i class="mr-2 fa fa-file"></i> Support 
                    </a>
                    <a class="text-white bold f-16 py-2" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="mr-2 fa fa-sign-out"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </nav>
            </div>
        </div>

        </div>
    </div>
</div>
