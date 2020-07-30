<script>
    function initialize() {
        var options = {
            types: ['(cities)'],
        };
        var fromLoc = document.getElementById('from_address');
        var getFromLoc = new google.maps.places.Autocomplete(fromLoc);
        getFromLoc.addListener('place_changed', function () {
            var place = getFromLoc.getPlace();
            if (!place.geometry) {
                // $('#fromAlert').toggleClass('show hide');
                window.alert("'" + place.name + "' not available on Google Map");
                fromLoc.value = "";
                return;
            } else {
                $('#from_location').val(place.name);
                $('#from_latitude').val(place.geometry['location'].lat());
                $('#from_longitude').val(place.geometry['location'].lng());
            }
        });

        var toLoc = document.getElementById('to_address');
        var getToLoc = new google.maps.places.Autocomplete(toLoc);
        getToLoc.addListener('place_changed', function () {
            var place = getToLoc.getPlace();
            if (!place.geometry) {
                window.alert("'" + place.name + "' not available on Google Map");
                toLoc.value = "";
                return;
            } else {
                $('#to_location').val(place.name);
                $('#to_latitude').val(place.geometry['location'].lat());
                $('#to_longitude').val(place.geometry['location'].lng());
            }
        });
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API_KEY')}}&libraries=places&callback=initialize"type="text/javascript" async defer></script>
