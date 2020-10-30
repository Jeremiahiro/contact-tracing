jQuery(document).ready(function ($) {

    var trackedData = [];
    const expires = new Date();
    const expires_at = expires.setHours(expires.getHours() + 36); // 48 hours from now

    if (localStorage.hasOwnProperty('trackedLocations')) {
        var
            storedLocation = JSON.parse(localStorage.getItem('trackedLocations')); // get data from local storage
    } else {
        var
            storedLocation = []; // get data from local storage
    }

    var address; // street_address
    var street; // street
    var city; // locality
    var state; // administrative_area_level_1
    var country; // country

    if (navigator.geolocation) {
        navigator.geolocation.watchPosition(onLocationChange, onGeolocateError);
    } else {
        console.log("OOPS! Access to users location denied")
    }

    /**
     * Get location information from google watchLocation.
     * 
     * @param coordinates Location data.
     */
    function onLocationChange(coordinates) {
        // console.log('check 1', coordinates)
        const latLng = {
            lat: coordinates.coords.latitude, // LatA
            lng: coordinates.coords.longitude, // LongA
        }
        const created_at = coordinates.timestamp;

        // if (localStorage.hasOwnProperty('trackedLocations')) {

        if (storedLocation.length > 0) {

            // console.log('check 2', storedLocation)

            // Get last saved location from local strage
            const lastLoc = storedLocation.reverse()[0];

            const oldLatLng = {
                lat: lastLoc.location.lat, // LatB
                lng: lastLoc.location.lng, // LongB
            }

            // Obtain the distance in meters using the haversine formula
            var distanceInMeters = getDistanceBetweenPoints(
                latLng.lat, // LatA
                latLng.lng, // LongA
                oldLatLng.lat, // LatB
                oldLatLng.lng, // LongB
            );

            // console.log('check 3', distanceInMeters)

            // Output from Distance in Meters: distanceInMeters
            // Output from Distance in Kilometers: distanceInMeters * 0.001
            if (distanceInMeters >= 200) {
                saveLocationToLocalStorage(latLng, created_at);
                // console.log('check 4', "saved Loc")
            }

        } else {
            saveLocationToLocalStorage(latLng, created_at);
            // console.log('check 5', "save new Loc")
        }
        // } 
    }

    /**
     * log error from google watchLocation.
     * 
     * @param error Error message.
     */
    function onGeolocateError(error) {
        console.warn(error.code, error.message);

        if (error.code === 1) {
            // they said no
            console.log("Unable to access users location", error.message)
        } else if (error.code === 2) {
            // position unavailable
            console.log("Position unavailable", error.message)
        } else if (error.code === 3) {
            // timeout
            console.log("Timeout", error.message)
        }
    }

    /**
     * Converts degrees to radians.
     * 
     * @param degrees Number of degrees.
     */
    function degreesToRadians(degrees) {
        return degrees * Math.PI / 180;
    }

    /**
     * Returns the distance between 2 points of coordinates in Google Maps
     * 
     * @see https://stackoverflow.com/a/1502821/4241030
     * @param lat1 Latitude of the point A
     * @param lng1 Longitude of the point A
     * @param lat2 Latitude of the point B
     * @param lng2 Longitude of the point B
     */
    function getDistanceBetweenPoints(lat1, lng1, lat2, lng2) {
        // The radius of the planet earth in meters
        let R = 6378137;
        let dLat = degreesToRadians(lat2 - lat1);
        let dLong = degreesToRadians(lng2 - lng1);
        let a = Math.sin(dLat / 2) *
            Math.sin(dLat / 2) +
            Math.cos(degreesToRadians(lat1)) *
            Math.cos(degreesToRadians(lat1)) *
            Math.sin(dLong / 2) *
            Math.sin(dLong / 2);

        let c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        let distance = R * c;

        return distance;
    }

    /**
     * Save yser location to local storage
     * 
     * @param latLng Latitude and Longitude data.
     * @param created_at timestamp for location change.
     * @param geocoder google map function to decode latitude and longitude.
     * @param expires_at time a local storage data is supposed to expire.
     * @param address provided from geocoder.
     * @param street provided from geocoder.
     * @param city provided from geocoder.
     * @param state provided from geocoder.
     * @param country provided from geocoder.
     * 
     */
    function saveLocationToLocalStorage(latLng, created_at) {

        const geocoder = new google.maps.Geocoder();



        geocoder.geocode({
            location: latLng
        }, (result, status) => {
            if (status === "OK") {
                address = result[0].formatted_address;

                if (storedLocation.length > 0) {
                    var lastAddress = storedLocation.reverse()[0].address;

                    if (lastAddress != address) {
                        // console.log('check 10', "check if address exists")
                        persistData(result, address, created_at, latLng)
                    }
                } else {
                    // console.log('check 11', "save new Loc")
                    persistData(result, address, created_at, latLng)
                }

            }
        });
    }

    /**
     * 
     * @param {*} result 
     * @param {*} address 
     */
    function persistData(result, address, created_at, latLng) {
        for (const component of result[0].address_components) {
            const addressType = component.types[0]

            // console.log('check 6', addressType)
            if (addressType == 'route') {
                street = component['long_name'];
            }

            if (addressType == 'locality') {
                city = component['long_name'];
            }

            if (addressType == 'administrative_area_level_1') {
                state = component['long_name'];
            }

            if (addressType == 'country') {
                country = component['long_name'];
            }
        }

        var data = {
            'expires_at': expires_at,
            'created_at': created_at,
            'location': latLng,
            'address': address,
            'street': street,
            'city': city,
            'state': state,
            'country': country,
        }

        // + 88 hours = 1603438044575
        // - 48 hours = 1602948470357

        // market square lat= 4.785717; lng = 7.041944


        trackedData = storedLocation;
        trackedData.push(data);
        localStorage.setItem('trackedLocations', JSON.stringify(trackedData));

        // console.log('check 7', "success")
    }

    // Clear Local Storage data every 48 hours
    function checkExpiration() {

        //check if past expiration date
        if (localStorage.hasOwnProperty('trackedLocations')) {
            for (var i = 0; i < storedLocation.length; i++) {

                const expires_at_timestamp = storedLocation[i].expires_at
                const getCurrentTime = new Date();

                if (getCurrentTime.valueOf() > expires_at_timestamp) {
                    var index = storedLocation.indexOf(storedLocation[i]);
                    storedLocation.splice(index, 1);
                    localStorage.setItem('trackedLocations', JSON.stringify(storedLocation));
                }

            }
        }
    }

    setTimeout(checkExpiration(), 600000); // check every 10 minutes
});
