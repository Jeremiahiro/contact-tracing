<div class="form-group">
    <div class="d-flex justify-content-between">
        <div class="">
            <label for="who" class="m-0 f-24 text-md-right">
                {{ __('Who') }}
            </label>
        </div>
        <div class="align-items-end mb-0 mt-3 f-12">
            <span class="bold text-primary tourStep2" id="tab1Label">Existing</span>
            <span class="">|</span>
            <span class="light text-primary tourStep3" id="tab2Label">New
                <span class="">( <span class="form-dup-counter">0</span> )</span>
            </span>
        </div>
    </div>

    <div class="" id="tab1">
        <div class="form-group">
            <input type="search" class="user-data blue-input input" name="user" id="user" value="" autocomplete="off"
                placeholder="People you met">
        </div>
        <div id="user_list" class="search-result">
        </div>

        <div class="form-group">
            <input type="text" class="" name="tags" id="tags" value="" placeholder="" />
        </div>
    </div>

    <div class="" id="tab2">
        <div id="">
            <fieldset class="form-dup mb-3" data-step="1">
                <input style="display:none">
                <input type="password" style="display:none">
                <div class="form-group mb-1">
                    <input type="text" class="input blue-input" name="name[]" placeholder="Name" autocomplete="nope"
                        value="" />
                </div>
                <div class="form-group mb-1">
                    <input type="email" class="input blue-input" name="email[]" placeholder="Email" autocomplete="yepee"
                        value="" />
                </div>
                <div class="form-group mb-1">
                    <input type="tel" class="input blue-input" name="phone[]" placeholder="Phone Number"
                        autocomplete="dont" />
                </div>
            </fieldset>
        </div>
        <div class="buttonBox">
            <div class="pull-left">
                <button type="button" class="btn add m-0 p-0"><img src="{{ asset('/frontend/img/svg/addbtn.svg') }}" alt="add"></button>
                <button type="button" class="btn remove m-0 p-0"><img src="{{ asset('/frontend/img/svg/removebtn.svg') }}" alt="remove"></button>
            </div>
        </div>
    </div>
</div>
