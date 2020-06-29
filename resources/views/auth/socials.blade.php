<div class="form-group">

    <label for="name" class="col-md-4 control-label">Login With</label>

    <div class="col-md-6">

        <a href="{{ route('social.login', 'facebook') }}" class="btn btn-social-icon btn-facebook">facebook</a>

        <a href="{{ route('social.login', 'twitter') }}" class="btn btn-social-icon btn-twitter">Twitter</a>

        <a href="{{ route('social.login', 'google') }}" class="btn btn-social-icon btn-google-plus">Google</a>

        <a href="{{ route('social.login', 'github') }}" class="btn btn-social-icon btn-github">Github</a>

    </div>

</div>
