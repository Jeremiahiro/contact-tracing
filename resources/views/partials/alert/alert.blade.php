<div id="alert">
    @if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close text-success" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="text-success">&times;</span>
        </button>
        <strong class="text-success regular">{{ $message }}!</strong>
    </div>
    @endif

    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block" role="alert">
        <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="text-danger">&times;</span>
        </button>
        <strong class="text-danger regular">{{ $message }}!</strong>
    </div>
    @endif

    @if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block" role="alert">
        <button type="button" class="close text-warning" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="text-warning">&times;</span>
        </button>
        <strong class="text-warning regular">{{ $message }}!</strong>
    </div>
    @endif

    @if ($message = Session::get('info'))
    <div class="alert alert-info alert-block" role="alert">
        <button type="button" class="close text-info" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="text-info">&times;</span>
        </button>
        <strong class="text-info">{{ $message }}!</strong>
    </div>
    @endif

    {{-- @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="text-danger">&times;</span>
        </button>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}
</div>
