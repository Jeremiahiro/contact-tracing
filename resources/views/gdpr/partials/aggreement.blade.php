<div class="">
    <div class="text-center py-3">
        <h5 class="">I-AMVOCAL Data Agreement</h5>
        <h6 class="pt-1 text-muted">GDPR Adjustment & Cookie Consent</h6>
    </div>
    <p class="text-left regular">
        We use cookies to enhance your experience, conduct analysis, research, and analytics.
        In addition to cookies, we may use other features such as offline data, device location,
        and geographical data to help us improve our services.
        For more information on the cookies we use and what information is collected,
        please see our <a href="{{ route('privacy') }}" class="text-primary"><u>Privacy Policy</u></a> and 
        <a href="{{ route('gdpr.dpa') }}" class="text-primary"><u>GDPR / DPA</u></a>.
    </p>
    <div class="d-flex justify-content-around">
        <div class="form-group">
            <form class="form-inline" role="form" method="POST" action="{{ route('logout') }}">
                {{ csrf_field() }}
                <button type="submit" class="btn red-btn text-uppercase px-4 text-white">{{ __('Deny') }}</button>
            </form>
        </div>
        <div class="form-group">
            <form class="form-inline" role="form" method="POST" action="{{ route('gdpr-terms-accepted') }}">
                {{ csrf_field() }}
                <button type="submit" class="btn blue-btn text-uppercase text-white">{{ __('Accept') }}</button>
            </form>
        </div>
    </div>
</div>
