function initialize() {
        // var options = {
        //     types: ['(cities)'],
        // };
    const componentForm = {
            locality: "long_name",
            administrative_area_level_1: "long_name",
            country: "long_name",
        };

    const location_input = document.getElementById('address_1');
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
            $('#latitude_1').val(place.geometry['location'].lat());
            $('#longitude_1').val(place.geometry['location'].lng());
        }
    });

    // var toLoc = document.getElementById('address_2');
    // var getToLoc = new google.maps.places.Autocomplete(toLoc);
    // getToLoc.addListener('place_changed', function () {
    //     var place = getToLoc.getPlace();
    //     if (!place.geometry) {
    //         window.alert("'" + place.name + "' not available on Google Map");
    //         toLoc.value = "";
    //         return;
    //     } else {
    //         $('#location_2').val(place.name);
    //         $('#latitude_2').val(place.geometry['location'].lat());
    //         $('#longitude_2').val(place.geometry['location'].lng());
    //     }
    // });
}
