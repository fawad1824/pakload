<div class="w-full bg-white p-6 h-full rounded-r-lg shadow-lg">
    <!-- Modal Content -->
    <h3 class="text-xl font-semibold text-gray-800">Add a New Load</h3>
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

        .w-65.h-full.max-w-xs.md\:max-w-none.bg-white.p-6.rounded-r-lg.shadow-lg.z-50 {
            width: 340px;
        }

        span.error {
            color: red;
        }
    </style>


    <form wire:submit.prevent="storeCity" class="mt-6 grid grid-cols-3 gap-4">
        <!-- City Name Input -->
        {{-- <div class="col-span-1">

            <div class="flex justify-between">
                <label for="equipment" class="block text-gray-700 font-medium">City</label>
                <button type="button" wire:click="AddCity"
                    class="px-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    +</button>

            </div>
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
        </div> --}}

        {{-- <div class="col-span-1">
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
            <label for="weight" class="block text-gray-700 font-medium">Weight</label>
            <input type="text" id="weight" wire:model="weight" placeholder="Enter weight"
                class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('weight')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-span-1">
            <label for="length" class="block text-gray-700 font-medium">Length</label>
            <input type="text" id="length" wire:model="length" placeholder="Enter length"
                class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('length')
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

        <div class="col-span-1">
            <label for="comment" class="block text-gray-700 font-medium">Comment</label>
            <input type="text" id="comment" wire:model="comment" placeholder="Enter Comment"
                class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('comment')
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
            <div class="flex justify-between">
                <label for="equipment" class="block text-gray-700 font-medium">Equipment Type</label>
                <button type="button" wire:click="AddEquipment"
                    class=" px-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    +</button>

            </div>
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
            <div class="flex justify-between">
                <label for="equipment" class="block text-gray-700 font-medium">Load Type</label>
                <button type="button" wire:click="AddLoading"
                    class=" px-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    +</button>

            </div>

            <select id="loadtype" wire:model="loadtype"
                class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="" selected>Select a Load Type</option>
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
        <div class="col-span-1">

        </div>

        <!-- Submit Button -->
        <div class="row flex">
            <button type="submit"
                class="mt-4 py-2 px-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Save
            </button>

            <!-- Close Button -->
            <a href="/addLoading" wire:navigate
                class="mt-4 py-2 ml-10 px-4 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                Close
            </a>
        </div>
    </form>

    <div x-show="$wire.modelcity" class="fixed inset-0 flex items-center justify-end bg-gray-800 bg-opacity-50 z-50"
        style="display: none;">
        <div class="w-65 h-full max-w-xs md:max-w-none bg-white p-6 rounded-r-lg shadow-lg z-50">
            <!-- Modal Content -->
            <h3 class="text-xl font-semibold">{{ $title }} </h3>
            <form wire:submit.prevent="AddCityList" class="w-full mt-10">
                <input type="text" wire:model="cityNameadd" placeholder="Enter City Name"
                    class="mt-4 p-2 w-full border rounded">
                @error('cityNameadd')
                    <span class="error">City field is required.</span>
                @enderror
                <button type="submit" class="mt-4 px-6 py-2 text-white bg-blue-600 rounded-lg w-full">Save
                </button>
            </form>
            <button wire:click="$set('modelcity', false)"
                class="mt-4 px-6 py-2 text-white bg-red-600 rounded-lg w-full">Close</button>
        </div>
    </div>


    <div x-show="$wire.modelequipment"
        class="fixed inset-0 flex items-center justify-end bg-gray-800 bg-opacity-50 z-50" style="display: none;">
        <div class="w-65 h-full max-w-xs md:max-w-none bg-white p-6 rounded-r-lg shadow-lg z-50">
            <!-- Modal Content -->
            <h3 class="text-xl font-semibold">{{ $title }} </h3>
            <form wire:submit.prevent="AddEquipmentList" class="w-full mt-10">
                <input type="text" wire:model="equipmentNameadd" placeholder="Enter Equipment Name"
                    class="mt-4 p-2 w-full border rounded">
                @error('equipmentNameadd')
                    <span class="error">Equipment Type field is required.</span>
                @enderror
                <button type="submit" class="mt-4 px-6 py-2 text-white bg-blue-600 rounded-lg w-full">Save
                </button>
            </form>
            <button wire:click="$set('modelequipment', false)"
                class="mt-4 px-6 py-2 text-white bg-red-600 rounded-lg w-full">Close</button>
        </div>
    </div>

    <div x-show="$wire.modelLoading"
        class="fixed inset-0 flex items-center justify-end bg-gray-800 bg-opacity-50 z-50" style="display: none;">
        <div class="w-65 h-full max-w-xs md:max-w-none bg-white p-6 rounded-r-lg shadow-lg z-50">
            <!-- Modal Content -->
            <h3 class="text-xl font-semibold">{{ $title }} </h3>
            <form wire:submit.prevent="AddLoadingList" class="w-full mt-10">
                <input type="text" wire:model="LoadingNameadd" placeholder="Enter Equipment Name"
                    class="mt-4 p-2 w-full border rounded">
                @error('LoadingNameadd')
                    <span class="error">Loading Type field is required.</span>
                @enderror
                <button type="submit" class="mt-4 px-6 py-2 text-white bg-blue-600 rounded-lg w-full">Save
                </button>
            </form>
            <button wire:click="$set('modelLoading', false)"
                class="mt-4 px-6 py-2 text-white bg-red-600 rounded-lg w-full">Close</button>
        </div>
    </div>


    <!-- Google Map Container -->
    <div id="map1" class="mt-4 w-full h-96" wire:ignore></div> <!-- Map div with fixed height -->

    <!-- Google Maps API -->
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzf7KnzVx3iLASRh25OP_bYgTpUD-dIW8&libraries=places&callback=initMap"
        async defer></script>

    <script>
        let autocompleteOrigin, autocompleteDest, map1, markerOrigin, markerDest, infoWindowOrigin, infoWindowDest;

        function initMap() {
            // Map initialization
            map1 = new google.maps.Map(document.getElementById('map1'), {
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
                disableAutoPan: true, // Prevent the X icon from appearing for origin
                pixelOffset: new google.maps.Size(0, -30) // Adjust the position of the info window
            });
            infoWindowDest = new google.maps.InfoWindow({
                disableAutoPan: true, // Prevent the X icon from appearing for destination
                pixelOffset: new google.maps.Size(0, -30) // Adjust the position of the info window
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
                            map1: map1,
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
                            map1: map1,
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
        }

        function updateMapBounds() {
            // Ensure both markers are within the map's viewport
            if (markerOrigin && markerDest) {
                const bounds = new google.maps.LatLngBounds();
                bounds.extend(markerOrigin.getPosition());
                bounds.extend(markerDest.getPosition());
                map1.fitBounds(bounds);
            }
        }
    </script>
</div>
