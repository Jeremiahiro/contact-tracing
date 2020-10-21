jQuery(document).ready(function ($) {

    // function initialize() {
        const componentForm = {
            locality: "long_name", // city
            administrative_area_level_1: "long_name", // state
            country: "long_name", // country
        };

        const location_input = document.getElementById('address');
        const auto_complete_location = new google.maps.places.Autocomplete(location_input);
        auto_complete_location.addListener('place_changed', function () {
            const place = auto_complete_location.getPlace();
            for (const component of place.address_components) {
                const addressType = component.types[0];

                if (componentForm[addressType]) {
                    const val = component[componentForm[addressType]];
                    document.getElementById(addressType).value = val;
                }
            }

            if (!place.geometry) {
                window.alert("'" + place.name + "' not available on Google Map");
                location_input.value = "";
                return;
            } else {
                $('#street').val(place.name);
                $('#latitude').val(place.geometry['location'].lat());
                $('#longitude').val(place.geometry['location'].lng());
            }
        });
    // }
});
