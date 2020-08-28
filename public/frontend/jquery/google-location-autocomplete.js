function initialize() {
    var options = {
        types: ['(cities)'],
    };
    var fromLoc = document.getElementById('address_1');
    var getFromLoc = new google.maps.places.Autocomplete(fromLoc);
    getFromLoc.addListener('place_changed', function () {
        var place = getFromLoc.getPlace();
        if (!place.geometry) {
            window.alert("'" + place.name + "' not available on Google Map");
            fromLoc.value = "";
            return;
        } else {
            $('#location_1').val(place.name);
            $('#latitude_1').val(place.geometry['location'].lat());
            $('#longitude_1').val(place.geometry['location'].lng());
        }
    });

    var toLoc = document.getElementById('address_2');
    var getToLoc = new google.maps.places.Autocomplete(toLoc);
    getToLoc.addListener('place_changed', function () {
        var place = getToLoc.getPlace();
        if (!place.geometry) {
            window.alert("'" + place.name + "' not available on Google Map");
            toLoc.value = "";
            return;
        } else {
            $('#location_2').val(place.name);
            $('#latitude_2').val(place.geometry['location'].lat());
            $('#longitude_2').val(place.geometry['location'].lng());
        }
    });
}
