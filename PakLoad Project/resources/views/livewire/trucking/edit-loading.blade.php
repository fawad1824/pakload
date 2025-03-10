<div class="w-full bg-white p-6 h-full rounded-r-lg shadow-lg">
    <!-- Modal Content -->
    <h3 class="text-xl font-semibold text-gray-800">Edit Load</h3>
    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    @if (session()->has('message'))
        <div class="p-4 mb-4 text-green-700 bg-green-100 border border-green-300 rounded">
            {{ session('message') }}
        </div>
    @endif

    <style>
        .gm-style-iw-chr {
            display: none;
        }
    </style>

    <form wire:submit.prevent="storeCity" class="mt-6 grid grid-cols-3 gap-4">
        <!-- City Name Input -->
        {{-- <div class="col-span-1">
            <label for="city" class="block text-gray-700 font-medium">City</label>
            <select id="city" wire:model="city"
                class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="" selected>Select a city</option>
                @foreach ($cityList as $item)
                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                @endforeach
            </select>
            @error('city')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div> --}}

        {{-- <div class="col-span-1">
            <label for="goodtype" class="block text-gray-700 font-medium">Good type</label>
            <input type="text" id="goodtype" wire:model="goodtype" placeholder="Enter goodtype"
                class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('goodtype')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-span-1">
            <label for="weighted_types" class="block text-gray-700 font-medium">weighted types</label>
            <input type="text" id="weighted_types" wire:model="weighted_types" placeholder="Enter weighted_types"
                class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('weighted_types')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div> --}}

        <div class="col-span-1">
            <label for="load_date" class="block text-gray-700 font-medium">Load Date</label>
            <input type="date" id="load_date" wire:model="load_date" placeholder="Enter load_date"
                class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('load_date')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-span-1">
            <label for="load_time" class="block text-gray-700 font-medium">Load Time</label>
            <input type="time" id="load_time" wire:model="load_time" placeholder="Enter load_time"
                class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('load_time')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-span-1">
            <label for="price" class="block text-gray-700 font-medium">Load Price</label>
            <input type="text" id="price" wire:model="price" placeholder="Enter price"
                class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('price')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Origin Input -->
        <div class="col-span-1">
            <label for="origin" class="block text-gray-700 font-medium">Origin</label>
            <input type="text" id="origin" wire:model="origin" placeholder="Enter city name"
                class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('origin')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Destination Input -->
        <div class="col-span-1">
            <label for="destinations" class="block text-gray-700 font-medium">Destination</label>
            <input type="text" id="destinations" wire:model="destinations" placeholder="Enter city name"
                class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('destinations')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- <div class="col-span-1">
            <label for="priority" class="block text-gray-700 font-medium">Priority</label>
            <select id="priority" wire:model="priority"
                class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="" selected>Select a priority</option>
                <option value="high">High</option>
                <option value="medium">Medium</option>
                <option value="low">Low</option>
            </select>
            @error('priority')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div> --}}

        <div class="col-span-1">
            <label for="comment" class="block text-gray-700 font-medium">Comment</label>
            <input type="text" id="comment" wire:model="comment" placeholder="Enter Comment"
                class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('comment')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-span-1">
            <label for="equipment" class="block text-gray-700 font-medium">Equipment Type</label>

            <select id="equipment" wire:model="equipment"
                class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="" selected>Select a Equipment Type</option>
                @foreach ($equipmenttypeList as $item)
                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                @endforeach
            </select>
            @error('equipment')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-span-1">
            <label for="equipment" class="block text-gray-700 font-medium">Loading Type</label>

            <select id="loadtype" wire:model="loadtype"
                class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="" selected>Select a Loading Type</option>
                @foreach ($loadtypeList as $item)
                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                @endforeach
            </select>
            @error('loadtype')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-span-1">

        </div>

        <!-- Submit Button -->
        <div class="row flex">
            <button type="submit"
                class="mt-4 py-2 px-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                update
            </button>

            <!-- Close Button -->
            <a href="/addLoading" wire:navigate
                class="mt-4 py-2 ml-10 px-4 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                Close
            </a>
        </div>
    </form>

    <!-- Google Map Container -->
    <div id="map" class="mt-4 w-full h-96" wire:ignore></div> <!-- Map div with fixed height -->

    <!-- Google Maps API -->
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzf7KnzVx3iLASRh25OP_bYgTpUD-dIW8&libraries=places&callback=initMap"
        async defer></script>

    <script>
        let autocompleteOrigin, autocompleteDest, map, markerOrigin, markerDest, infoWindowOrigin, infoWindowDest;

        function initMap() {
            // Map initialization
            map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: 31.5497,
                    lng: 74.3436
                }, // Default center (Lahore, Pakistan)
                zoom: 6 // Default zoom level
            });

            // Initialize the Autocomplete functionality for origin and destination
            const originInput = document.getElementById('origin');
            const destInput = document.getElementById('destinations');

            // Create autocomplete objects for both inputs, restricted to Pakistan
            const options = {
                componentRestrictions: {
                    country: 'pk'
                } // Restrict search to Pakistan
            };

            autocompleteOrigin = new google.maps.places.Autocomplete(originInput, options);
            autocompleteDest = new google.maps.places.Autocomplete(destInput, options);

            // Initialize the info windows for origin and destination
            infoWindowOrigin = new google.maps.InfoWindow({
                disableAutoPan: true,
                pixelOffset: new google.maps.Size(0, -30)
            });
            infoWindowDest = new google.maps.InfoWindow({
                disableAutoPan: true,
                pixelOffset: new google.maps.Size(0, -30)
            });

            // Add event listeners to handle place selection for origin
            autocompleteOrigin.addListener('place_changed', function() {
                const place = autocompleteOrigin.getPlace();
                if (place.geometry) {
                    // Place origin marker

                    // Get the full address from the API
                    const fullAddress = place.formatted_address;

                    const lat = place.geometry.location.lat();
                    const lng = place.geometry.location.lng();
                    // Pass the coordinates to Livewire
                    @this.set('origin_lat', lat);
                    @this.set('origin_lng', lng);

                    // Set the input value to the full address
                    document.getElementById('origin').value = fullAddress;

                    // Now pass the full address to Livewire
                    @this.set('origin', fullAddress);

                    if (!markerOrigin) {
                        markerOrigin = new google.maps.Marker({
                            map: map,
                            icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png' // Red icon for origin
                        });
                    }
                    markerOrigin.setPosition(place.geometry.location);
                    console.log('Origin selected:', place);

                    // Open info window at the origin marker
                    infoWindowOrigin.setContent(place.name); // Display the place name
                    infoWindowOrigin.open(map, markerOrigin);

                    // Center map to fit both origin and destination
                    updateMapBounds();
                }
            });

            // Add event listeners to handle place selection for destination
            autocompleteDest.addListener('place_changed', function() {
                const place = autocompleteDest.getPlace();
                if (place.geometry) {
                    // Place destination marker

                    // Get the full address from the API
                    const fullAddress = place.formatted_address;

                    const lat = place.geometry.location.lat();
                    const lng = place.geometry.location.lng();
                    // Pass the coordinates to Livewire
                    @this.set('destination_lat', lat);
                    @this.set('destination_lng', lng);

                    // Set the input value to the full address
                    document.getElementById('destinations').value = fullAddress;

                    // Now pass the full address to Livewire
                    @this.set('destinations', fullAddress);

                    if (!markerDest) {
                        markerDest = new google.maps.Marker({
                            map: map,
                            icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png' // Blue icon for destination
                        });
                    }
                    markerDest.setPosition(place.geometry.location);
                    console.log('Destination selected:', place);

                    // Open info window at the destination marker
                    infoWindowDest.setContent(place.name); // Display the place name
                    infoWindowDest.open(map, markerDest);

                    // Center map to fit both origin and destination
                    updateMapBounds();
                }
            });

            // Check if origin and destination are set, then place markers
            if ("{{ $origin }}" !== "") {
                const geocoder = new google.maps.Geocoder();
                geocoder.geocode({
                    address: "{{ $origin }}"
                }, function(results, status) {
                    if (status === google.maps.GeocoderStatus.OK) {
                        markerOrigin = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location,
                            icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png'
                        });
                        infoWindowOrigin.setContent("Origin: " + results[0].formatted_address);
                        infoWindowOrigin.open(map, markerOrigin);
                        map.setCenter(results[0].geometry.location);
                    }
                });
            }

            if ("{{ $destinations }}" !== "") {
                const geocoder = new google.maps.Geocoder();
                geocoder.geocode({
                    address: "{{ $destinations }}"
                }, function(results, status) {
                    if (status === google.maps.GeocoderStatus.OK) {
                        markerDest = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location,
                            icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png'
                        });
                        infoWindowDest.setContent("Destination: " + results[0].formatted_address);
                        infoWindowDest.open(map, markerDest);
                        updateMapBounds();
                    }
                });
            }
        }

        function updateMapBounds() {
            if (markerOrigin && markerDest) {
                const bounds = new google.maps.LatLngBounds();
                bounds.extend(markerOrigin.getPosition());
                bounds.extend(markerDest.getPosition());
                map.fitBounds(bounds);
            }
        }
    </script>
</div>
