@extends('layouts.admin')

@section('style')

@endsection

@section('content')
<div class="container-fluid">
    <ul>
        @foreach ($activity_logs as $data)
        <li>
            @if ($data->subject_type === "App\Model\User")
            <a href="{{ route('admin.users.show', $data->subject->uuid ) }}">
                {{ $data->subject->username }}
            </a>
            @if ($data->causer != null)
                <b>
                    <em>
                        {{ $data->description }}
                    </em>
                </b> Account {{ $data->created_at->diffForHumans() }}
            @else
                <b>
                    <em>Updates</em>    
                </b> Account {{ $data->created_at->diffForHumans() }}
            @endif
            @else
            @if ($data->subject_type === "App\Model\Activity")
            <a href="{{ route('admin.users.show', $data->causer->uuid ) }}">
                {{ $data->causer->username }}
            </a>
            <b>
                <em>
                    {{ $data->description }}
                </em>
            </b> an
            <a href="{{ route('admin.activities.show', $data->subject->id ) }}">
                Activity
            </a>
            {{ $data->created_at->diffForHumans() }}
            @else
            @if ($data->subject_type === "App\Model\ActivityTags")
            <a href="{{ route('admin.users.show', $data->causer->uuid ) }}">
                {{ $data->causer->username }}
            </a>
            <b>
                <em>
                    {{ $data->description }}
                </em>
            </b> for an
            <a href="{{ route('admin.activities.show', $data->subject->activity_id ) }}">
                Activity
            </a>
            {{ $data->created_at->diffForHumans() }}
            @else
            @endif
            @endif
            @endif
        </li>
        @endforeach
    </ul>

</div>

@endsection
@section('script')

@endsection
