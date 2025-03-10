<div>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
        <div class="mr-6">
            <h1 class="text-4xl font-semibold mb-2">{{ $heading }}</h1>
        </div>
    </div>
    <style>
        td.px-6.py-0 {
            font-size: 11px;
        }
    </style>

    @if (session()->has('error'))
        <div class="p-4 mb-4 text-green-700 bg-green-100 border border-green-300 rounded">
            {{ session('error') }}
        </div>
    @endif
    @if (session()->has('success'))
        <div class="p-4 mb-4 text-green-700 bg-green-100 border border-green-300 rounded">
            {{ session('success') }}
        </div>
    @endif
    <!-- Add grid container for select dropdowns -->
    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mt-6 text-sm">
        <div class="flex flex-col">
            <label for="origin" class="block text-gray-700 font-medium">Origin</label>
            <input type="text" id="origin" wire:model="origin" placeholder="Enter Origin"
                class="mt-2 p-1 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('origin')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex flex-col ml-2" style="width: 90px;">
            <label for="sqr1" class="block text-gray-700 font-medium">DH-O</label>
            <input type="text" id="sqr1" wire:model="sqr1" placeholder="Enter DH-O"
                class="mt-2 p-1 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="flex flex-col">
            <label for="destinations" class="block text-gray-700 font-medium">Destination</label>
            <input type="text" id="destinations" wire:model="destinations" placeholder="Enter Destination"
                class="mt-2 p-1 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('destinations')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex flex-col ml-2" style="width: 90px;">
            <label for="sqr2" class="block text-gray-700 font-medium">DH-D</label>
            <input type="text" id="sqr2" wire:model="sqr2" placeholder="Enter DH-D"
                class="mt-2 p-1 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="flex flex-col">
            <button wire:click="search"
                class="mt-8 bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-1 rounded-md">
                Search
            </button>
        </div>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mt-2">
        <div class="flex flex-col">
            <label for="equipment_type" class="block text-gray-700 font-medium">Equipment Type</label>
            <select id="equipment_type" wire:model="equipment_type"
                class="mt-2 p-1 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="" selected>Select an equipment type</option>
                @foreach ($eqtype as $item)
                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex flex-col">
            <label for="load_type" class="block text-gray-700 font-medium">Load Type</label>
            <select id="load_type" wire:model="load_type"
                class="mt-2 p-1 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="" selected>Select a load type</option>
                @foreach ($lotype as $item)
                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>


        <div class="flex flex-col">
            <label for="weight" class="block text-gray-700 font-medium">Weight</label>
            <input type="text" id="weight" wire:model="weight" placeholder="Enter weight"
                class="mt-2 p-1 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="flex flex-col">
            <label for="length" class="block text-gray-700 font-medium">Length</label>
            <input type="text" id="length" wire:model="length" placeholder="Enter length"
                class="mt-2 p-1 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="flex flex-col">
            <label for="date" class="block text-gray-700 font-medium">Date</label>
            <input type="date" id="date" wire:model="date" placeholder="Enter date"
                class="mt-2 p-1 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

    </div>

    <div class="mt-5 relative flex flex-col w-full h-full text-slate-700 bg-white shadow-md rounded-xl bg-clip-border">
        <div class="overflow-x-auto ">
            <table
                class=" relative table-auto w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Rates
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Trip
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Origin
                        </th>
                        <th scope="col" class="px-6 py-3">
                            DH-O
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Destination
                        </th>
                        <th scope="col" class="px-6 py-3">
                            DH-D
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pick Up
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Company Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Weight
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Length
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Comment
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Contact
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @if ($results && $results->isNotEmpty())
                        @foreach ($results as $index => $result)
                            @php
                                $pj = DB::table('bidding_loads')
                                    ->where('load_id', $result->id)
                                    ->where('truck_id', Auth::user()->id)
                                    ->where('status', 'pending')
                                    ->first();

                                $UserID = DB::table('users')
                                    ->where('id', Auth::user()->id)
                                    ->first();
                            @endphp
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-0">
                                    {{ $index + 1 }}
                                </td>
                                <td class="px-6 py-0">
                                    {{ $result->price }} PKR
                                </td>
                                <td class="px-6 py-0">
                                    {{ $result->id }}
                                </td>
                                <td class="px-6 py-0">
                                    {{ $result->origin }}
                                </td>
                                <td class="px-6 py-0">
                                    {{ number_format($result->distance, 2) }} km
                                </td>
                                <td class="px-6 py-0">
                                    {{ $result->destination }}
                                </td>
                                <td class="px-6 py-0">
                                    {{ number_format($result->user_distance, 2) }} km
                                </td>
                                <td class="px-6 py-0">
                                    {{ $result->delivery_date }}
                                </td>
                                <td class="px-6 py-0 ">
                                    @if (isset($result->users))
                                        {{ $result->users->company }}
                                    @endif
                                </td>
                                <td class="px-6 py-0 ">
                                    @if (isset($result->weight))
                                        {{ $result->weight }} KG
                                    @endif
                                </td>
                                <td class="px-6 py-0 ">
                                    @if (isset($result->length))
                                        {{ $result->length }}
                                    @endif
                                </td>
                                <td class="px-6 py-0 ">
                                    {{ $result->comment }}
                                </td>
                                <td class="px-6 py-0 ">
                                    @if (isset($result->users))
                                        Email: {{ $result->users->email }}
                                        <br>
                                        Phone: {{ $result->users->phone }}
                                    @endif
                                </td>
                                <td class="px-6 py-0">
                                    @if (!$pj)
                                        @if ($UserID->role != 'manufacturer')
                                            <button wire:click="booking({{ $result->id }})"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-1 rounded-md">
                                                Book
                                            </button>
                                        @endif
                                    @endif
                                    <button wire:click="Review({{ $result->id }})"
                                        class="bg-blue-500 mt-1 hover:bg-blue-700 text-white font-bold py-1 px-1 rounded-md">
                                        Reviews
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr
                            class="bg-white dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-5" colspan="12">
                                <p class="">No results found within the specified distance.</p>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>


    @if ($editData)
        <!-- Modal with Left-side positioning and full width -->
        <div x-show="$wire.model" class="fixed inset-0 flex items-end justify-end bg-gray-800 bg-opacity-50"
            style="display: none;">
            <div style="width: 300px;"
                class="text-sm h-full max-w-xs md:max-w-none bg-white p-6 rounded-r-lg shadow-lg">
                <!-- Modal Content -->
                <h3 class="text-xl font-semibold">Bid Load Now</h3>
                <form wire:submit.prevent="storeBidAmount" class="w-full mt-10">
                    <p>Rates</p>
                    <p class="text-4xl font-bold">{{ $editData->price }} PKR</p>
                    <br>
                    <p>{{ $editData->origin }}</p>
                    <br>
                    <br>
                    <br>
                    <p>{{ $editData->destination }}</p>
                    <p class="mt-2 font-bold">Enter Your Bid Price</p>
                    <input type="text" wire:model="bidprice" placeholder="Enter Your Bid Price"
                        class="mt-2 p-2 w-full border rounded">
                    @error('bidprice')
                        <span class="error">{{ $message }}</span>
                    @enderror
                    <button type="submit"
                        class="mt-4 px-6 py-2 text-white bg-blue-600 rounded-lg w-full">Save</button>
                </form>
                <button wire:click="closeModel"
                    class="mt-4 px-6 py-2 text-white bg-red-600 rounded-lg w-full">Close</button>
            </div>
        </div>
    @endif

    <!-- Modal with Left-side positioning and full width -->
    <div x-show="$wire.modelReview" class="fixed inset-0 flex items-end justify-end bg-gray-800 bg-opacity-50"
        style="display: none;">
        <div style="width: 300px;" class="text-sm h-full max-w-xs md:max-w-none bg-white p-6 rounded-r-lg shadow-lg">
            <!-- Modal Content -->
            <h3 class="text-xl font-semibold">Reviews</h3>
            @php
                $da = DB::table('loading_rattings')->where('load_id', $dataID)->get();
            @endphp

            @if ($da && $da->isNotEmpty())
                @foreach ($da as $d)
                    <div class="border mt-3 border-b p-2">
                        @php
                            $user = DB::table('users')->where('id', $d->user_id)->first();
                        @endphp
                        <b>Manufacturer:</b> {{ $user->name }}
                        <br>
                        <b>Company: </b> {{ $user->company }}
                        <br>
                        <b>Comment:</b> {{ $d->comment }}
                        <br>

                        @if ($d->star == '1')
                            <i class="fas fa-star"></i>
                        @elseif ($d->star == '2')
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        @elseif ($d->star == '3')
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        @elseif ($d->star == '4')
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        @elseif ($d->star == '5')
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        @endif
                    </div>
                @endforeach
            @else
                <p class="mt-3">Not Found</p>
            @endif


            <button wire:click="closeModelmodelReview"
                class="mt-4 px-6 py-2 text-white bg-red-600 rounded-lg w-full">Close</button>
        </div>
    </div>



</div>
<script>
    document.addEventListener('livewire:load', function() {
        setDefaultDate();
    });

    document.addEventListener('livewire:updated', function() {
        setDefaultDate();
    });

    function setDefaultDate() {
        const dateInput = document.getElementById('date');
        if (dateInput && dateInput.value === '') { // Only set default if not already set
            const now = new Date();
            const year = now.getFullYear();
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const day = String(now.getDate()).padStart(2, '0');
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const formattedDate = `${year}-${month}-${day}T${hours}:${minutes}`;

            // Set the default value in the input field
            dateInput.value = formattedDate;
        }
    }
</script>



<script>
    let autocompleteOrigin;
    let autocompleteDestination;

    // This function will be called once the Google Maps API has loaded
    function initMap() {
        // Initialize the autocomplete input fields for both origin and destination
        autocompleteOrigin = new google.maps.places.Autocomplete(document.getElementById('origin'), {
            componentRestrictions: {
                country: 'pk' // Restrict search to Pakistan
            }
        });

        autocompleteDestination = new google.maps.places.Autocomplete(document.getElementById('destinations'), {
            componentRestrictions: {
                country: 'pk' // Restrict search to Pakistan
            }
        });

        // Set up event listeners for when the user selects a place
        autocompleteOrigin.addListener('place_changed', function() {
            const place = autocompleteOrigin.getPlace();
            if (place.geometry) {
                const lat = place.geometry.location.lat();
                const lng = place.geometry.location.lng();
                const fullAddress = place.formatted_address;
                console.log(fullAddress);

                document.getElementById('origin').value = fullAddress;
                // Pass the coordinates to Livewire
                @this.set('origin_lat', lat);
                @this.set('origin_lng', lng);
                @this.set('origin', fullAddress);

            }
        });

        autocompleteDestination.addListener('place_changed', function() {
            const place = autocompleteDestination.getPlace();
            if (place.geometry) {
                const lat = place.geometry.location.lat();
                const lng = place.geometry.location.lng();
                const fullAddress = place.formatted_address;
                console.log(fullAddress);

                document.getElementById('destinations').value = fullAddress;
                // Now pass the full address to Livewire
                // Pass the coordinates to Livewire
                @this.set('destination_lat', lat);
                @this.set('destination_lng', lng);
                @this.set('destinations', fullAddress);

            }
        });
    }
</script>

<!-- Google Maps JavaScript API with correct callback -->
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzf7KnzVx3iLASRh25OP_bYgTpUD-dIW8&libraries=places&callback=initMap"
    async defer></script>
