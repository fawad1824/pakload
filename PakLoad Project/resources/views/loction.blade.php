<x-app-layout>
    <div>
        <style>
            /* Ensure the map takes up the full page */
            #map {
                height: 400px;
                width: 100%;
            }
        </style>

        <div class="flex space-x-4 mb-6">
            <form id="trackForm">
                <input type="text" id="trackID" class="form-input p-2 w-3/4 border rounded-md" placeholder="Enter Track ID">
                <button type="submit" class="bg-blue-500 text-white p-2 mt-2 rounded-md hover:bg-blue-600">Track Now</button>
            </form>
        </div>

        <!-- Map container (Initially hidden) -->
        <div id="map" wire:ignore style="display: none;"></div>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzf7KnzVx3iLASRh25OP_bYgTpUD-dIW8&libraries=places&callback=initMap" async defer></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            // This function initializes the map
            function initMap(lat, lng, destLat, destLng) {
                // Check if lat and lng are valid
                if (lat && lng && destLat && destLng) {
                    var truckLocation = { lat: lat, lng: lng };
                    var destinationLocation = { lat: destLat, lng: destLng };

                    // Show the map div when data is available
                    document.getElementById('map').style.display = 'block';

                    // Create the map, centered between the truck's location and the destination
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 10,
                        center: {
                            lat: (lat + destLat) / 2,
                            lng: (lng + destLng) / 2
                        },
                    });

                    // Add a marker at the truck's location
                    var truckMarker = new google.maps.Marker({
                        position: truckLocation,
                        map: map,
                        title: "Truck Location",
                        icon: {
                            url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
                        }
                    });

                    // Add a marker at the destination location
                    var destinationMarker = new google.maps.Marker({
                        position: destinationLocation,
                        map: map,
                        title: "Destination",
                        icon: {
                            url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png"
                        }
                    });

                    // Create a DirectionsService object to calculate the route
                    var directionsService = new google.maps.DirectionsService();
                    var directionsRenderer = new google.maps.DirectionsRenderer();
                    directionsRenderer.setMap(map);

                    // Calculate and display the route
                    var request = {
                        origin: truckLocation,
                        destination: destinationLocation,
                        travelMode: google.maps.TravelMode.DRIVING,
                    };

                    directionsService.route(request, function(result, status) {
                        if (status === google.maps.DirectionsStatus.OK) {
                            directionsRenderer.setDirections(result);
                        } else {
                            alert('Failed to find route: ' + status);
                        }
                    });
                }
            }

            $(document).ready(function() {
                $('#trackForm').on('submit', function(e) {
                    e.preventDefault(); // Prevent form submission

                    var trackID = $('#trackID').val();

                    if (trackID) {
                        // Make an AJAX request to get truck data
                        $.ajax({
                            url: '/get-truck-location', // Backend route that returns truck data
                            method: 'GET',
                            data: {
                                trackID: trackID
                            },
                            success: function(response) {
                                if (response.success && response.lat && response.lng && response.destination_lat && response.destination_lng) {
                                    // Initialize the map with the truck's location and destination
                                    initMap(response.lat, response.lng, response.destination_lat, response.destination_lng);
                                } else {
                                    alert('Truck not found or location data is missing.');
                                }
                            },
                            error: function() {
                                alert('An error occurred while fetching the truck data.');
                            }
                        });
                    } else {
                        alert('Please enter a Track ID.');
                    }
                });
            });
        </script>
    </div>
</x-app-layout>
