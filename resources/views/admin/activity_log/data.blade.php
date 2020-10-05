@foreach ($activity_logs as $data)
<li class="feed-item">
    <span class="data">
        @if ($data->subject_type === "App\Model\User")
        <a href="{{ route('admin.users.show', $data->subject->uuid ) }}">
            {{ $data->subject->username }}
        </a>
        @if ($data->causer != null)
        <b>{{ $data->description }}</b> Account
        {{-- <br> --}}
        <time class="ml-3">
            <em class="small">{{ $data->created_at->diffForHumans() }}</em>
        </time>
        @else
        <b>Updated</b> Account
        {{-- <br> --}}
        <time class="ml-3">
            <em class="small">{{ $data->created_at->diffForHumans() }}</em>
        </time>
        @endif
        @else
        @if ($data->subject_type === "App\Model\Activity")
        <a href="{{ route('admin.users.show', $data->causer->uuid ) }}">
            {{ $data->causer->username }}
        </a>
        <b>{{ $data->description }}</b> an 
        <a href="{{ route('admin.activities.show', $data->subject->id ) }}">
            Activity
        </a>
        {{-- <br> --}}
        <time class="ml-3">
            <em class="small">{{ $data->created_at->diffForHumans() }}</em>
        </time>
        @else
        @if ($data->subject_type === "App\Model\ActivityTags")
        <a href="{{ route('admin.users.show', $data->causer->uuid ) }}">
            {{ $data->causer->username }}
        </a>
        <b>{{ $data->description }}</b> for an
        <a href="{{ route('admin.activities.show', $data->subject->activity_id ) }}">
            Activity
        </a>
        {{-- <br> --}}
        <time class="ml-3">
            <em class="small">{{ $data->created_at->diffForHumans() }}</em>
        </time>
        @else
        @endif
        @endif
        @endif
    </span>
</li>
@endforeach
