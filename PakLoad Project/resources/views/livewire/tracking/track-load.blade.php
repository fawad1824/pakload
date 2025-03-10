<div>

    <style>
        /* Ensure the map takes up the full page */
        #map {
            height: 400px;
            width: 100%;
        }
    </style>

    <div class="flex space-x-4 mb-6">
        <form wire:submit.prevent="TrackLoad">
            <input type="text" wire:model="trackID" id="location" class="form-input p-2 w-3/4 border rounded-md"
                placeholder="Enter Track ID">
            <button type="submit" class="bg-blue-500 text-white p-2 mt-2 rounded-md hover:bg-blue-600">Find Location</button>
        </form>
    </div>

    <!-- Map container (Initially hidden) -->
    <div wire:ignore id="map" style="display: none;"></div>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzf7KnzVx3iLASRh25OP_bYgTpUD-dIW8&libraries=places&callback=initMap"
        async defer></script>

    <script>
        // This function initializes the map
        function initMap() {
            // Retrieve lat and lng values from Livewire component
            var lat = {{ $truckUser ? $truckUser->lat : 'null' }};
            var lng = {{ $truckUser ? $truckUser->lng : 'null' }};

            // Ensure lat and lng are valid numbers before proceeding
            if (lat !== null && lat !== undefined && lng !== null && lng !== undefined) {
                // Create a LatLng object
                var truckLocation = { lat: lat, lng: lng };

                // Show the map div when data is available
                document.getElementById('map').style.display = 'block';

                // Create the map, centered at the truck's location
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 14,
                    center: truckLocation,
                });

                // Add a marker at the truck's location
                var marker = new google.maps.Marker({
                    position: truckLocation,
                    map: map,
                    title: "Truck Location"
                });
            } else {
                alert('Truck location data is missing. Please ensure the truck ID is correct.');
            }
        }
    </script>

</div>
