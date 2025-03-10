<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>


<aside class="flex flex-col w-64" style="width: 200px;">
    <a href="#" wire:navigate
        class="inline-flex items-center justify-center h-20 w-full bg-blue-600 hover:bg-blue-500 focus:bg-blue-500">


        <img style="width: 121px; margin: -19px;" src="{{ asset('assets/img/logo.png') }}" alt="">
        <span class="text-white text-1xl ml-2" x-show="menu">Pak Load Board</span>
    </a>
    <div class="flex-grow flex flex-col justify-between text-gray-500 bg-gray-800">
        <nav class="flex flex-col mx-1 mt-4">
            @if (Auth::check())
                @php
                    $active = DB::table('users')
                        ->where('id', auth()->user()->id)
                        ->first();
                @endphp

                @if ($active->role == 'admin')
                    <a href="{{ route('loading-type') }}" wire:navigate
                        class="inline-flex items-center py-3 {{ Request::is('loading-type') ? 'text-blue-600 bg-gray-200' : '' }} rounded-lg px-2">
                        <span class="ml-2" x-show="menu">Load Type</span>
                    </a>
                    <a href="{{ route('equipment-type') }}" wire:navigate
                        class="inline-flex items-center py-3 {{ Request::is('equipment-type') ? 'text-blue-600 bg-gray-200' : '' }} rounded-lg px-2">
                        <span class="ml-2" x-show="menu">Equipment Type</span>
                    </a>
                    <a href="{{ route('admin-user-laod') }}" wire:navigate
                        class="inline-flex items-center py-3 {{ Request::is('admin-user-laod') ? 'text-blue-600 bg-gray-200' : '' }} rounded-lg px-2">
                        <span class="ml-2" x-show="menu">Users Bidding</span>
                    </a>
                    <a href="{{ route('admin-user-laod-list') }}" wire:navigate
                        class="inline-flex items-center py-3 {{ Request::is('admin-user-laod-list') ? 'text-blue-600 bg-gray-200' : '' }} rounded-lg px-2">
                        <span class="ml-2" x-show="menu">Posted load</span>
                    </a>
                    <a href="{{ route('admin-user-check') }}" wire:navigate
                        class="inline-flex items-center py-3 {{ Request::is('admin-user-check') ? 'text-blue-600 bg-gray-200' : '' }} rounded-lg px-2">
                        <span class="ml-2" x-show="menu">All Users</span>
                    </a>
                    <a href="{{ route('subscriptions') }}" wire:navigate
                        class="inline-flex items-center py-3 {{ Request::is('subscriptions') ? 'text-blue-600 bg-gray-200' : '' }} rounded-lg px-2">
                        <span class="ml-2" x-show="menu">Subscriptions</span>
                    </a>
                    <a href="{{ route('city') }}" wire:navigate
                        class="inline-flex items-center py-3 {{ Request::is('city') ? 'text-blue-600 bg-gray-200' : '' }} rounded-lg px-2">
                        <span class="ml-2" x-show="menu">All City</span>
                    </a>
                @endif


                @if ($active->role == 'trucking')
                    <a href="{{ route('searchLoading') }}" wire:navigate
                        class="inline-flex items-center py-3 {{ Request::is('searchLoading') ? 'text-blue-600 bg-gray-200' : '' }} rounded-lg px-2">
                        <span class="ml-2" x-show="menu">Search Loads </span>
                    </a>
                    <a href="{{ route('bidding-request-mani') }}" wire:navigate
                        class="inline-flex items-center py-3 {{ Request::is('bidding-request-mani') ? 'text-blue-600 bg-gray-200' : '' }} rounded-lg px-2">
                        <span class="ml-2" x-show="menu">My Request</span>
                    </a>
                @endif
                @if ($active->role == 'manufacturer')
                    <a href="{{ route('addLoading') }}" wire:navigate
                        class="inline-flex items-center py-3 {{ Request::is('addLoading') ? 'text-blue-600 bg-gray-200' : '' }} rounded-lg px-2">
                        <span class="ml-2" x-show="menu">Posted load</span>
                    </a>

                    <a href="{{ route('bidding-request') }}" wire:navigate
                        class="inline-flex items-center py-3 {{ Request::is('bidding-request') ? 'text-blue-600 bg-gray-200' : '' }} rounded-lg px-2">
                        <span class="ml-2" x-show="menu">My Request</span>
                    </a>

                    <a href="{{ route('getLocation') }}" wire:navigate
                        class="inline-flex items-center py-3 {{ Request::is('getLocation') ? 'text-blue-600 bg-gray-200' : '' }} rounded-lg px-2">
                        <span class="ml-2" x-show="menu">Track Your Load</span>
                    </a>
                @endif

                @if ($active->role == 'household')
                    <a href="{{ route('addLoading') }}" wire:navigate
                        class="inline-flex items-center py-3 {{ Request::is('addLoading') ? 'text-blue-600 bg-gray-200' : '' }} rounded-lg px-2">
                        <span class="ml-2" x-show="menu">Posted loads</span>
                    </a>

                    <a href="{{ route('bidding-request') }}" wire:navigate
                        class="inline-flex items-center py-3 {{ Request::is('bidding-request') ? 'text-blue-600 bg-gray-200' : '' }} rounded-lg px-2">
                        <span class="ml-2" x-show="menu">My Request</span>
                    </a>

                    <a href="{{ route('getLocation') }}" wire:navigate
                        class="inline-flex items-center py-3 {{ Request::is('getLocation') ? 'text-blue-600 bg-gray-200' : '' }} rounded-lg px-2">
                        <span class="ml-2" x-show="menu">Track Your Load</span>
                    </a>
                @endif


                <a href="{{ route('profile') }}" wire:navigate
                    class="inline-flex items-center py-3 {{ Request::is('profile') ? 'text-blue-600 bg-gray-200' : '' }} rounded-lg px-2">
                    <span class="ml-2" x-show="menu">My Profile</span>
                </a>



                <button wire:click="logout"
                    class="inline-flex items-center py-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg px-2"
                    :class="{ 'justify-start': menu, 'justify-center': menu == false }">

                    <span class="ml-2" x-show="menu">Logout</span>
                </button>


                <!-- Livewire Map -->
                {{-- <div id="map" class="w-full h-96"></div> --}}

                {{-- <div hidden id="map"></div> --}}

                {{-- <script>
                    let map;
                    let userMarker;
                    let destinationMarker;
                    let userLocation = null;
                    let destinationLocation = null;
                    let totalDistance = 0; // To store total distance covered
                    let directionsService;
                    let directionsRenderer;

                    let locationUpdateInterval = null; // Variable to store the interval

                    // Initialize and add the map
                    function initMap() {
                        const defaultLocation = {
                            lat: -34.397,
                            lng: 150.644
                        }; // Default location



                        // Initialize Directions services
                        directionsService = new google.maps.DirectionsService();
                        directionsRenderer = new google.maps.DirectionsRenderer();

                        // Try to get the current location once when the map loads
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(function(position) {
                                userLocation = {
                                    lat: position.coords.latitude,
                                    lng: position.coords.longitude,
                                };

                                if (!userMarker) {
                                    userMarker = new google.maps.Marker({
                                        position: userLocation,
                                        title: "You are here!",
                                        icon: {
                                            path: google.maps.SymbolPath.CIRCLE,
                                            scale: 10,
                                            fillColor: "blue",
                                            fillOpacity: 0.5,
                                            strokeWeight: 0,
                                        },
                                    });
                                } else {
                                    userMarker.setPosition(userLocation);
                                }
                                // Start updating location every second
                                locationUpdateInterval = setInterval(updateLocation, 8000);
                            });
                        }

                    }

                    // Function to update user location every second
                    function updateLocation() {
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(function(position) {
                                userLocation = {
                                    lat: position.coords.latitude,
                                    lng: position.coords.longitude,
                                };

                                if (userMarker) {
                                    userMarker.setPosition(userLocation);
                                } else {
                                    userMarker = new google.maps.Marker({
                                        position: userLocation,
                                        title: "You are here!",
                                        icon: {
                                            path: google.maps.SymbolPath.CIRCLE,
                                            scale: 10,
                                            fillColor: "blue",
                                            fillOpacity: 0.5,
                                            strokeWeight: 0,
                                        },
                                    });
                                }

                                // map.setCenter(userLocation);

                                console.log(userLocation, "map");
                                $.ajax({
                                    url: '/save-location',
                                    type: 'POST',
                                    data: {
                                        _token: '{{ csrf_token() }}', // Laravel CSRF token
                                        lat: userLocation.lat,
                                        lng: userLocation.lng
                                    },
                                    success: function(response) {
                                        console.log('Location saved:', response);
                                    }
                                });

                                if (destinationLocation) {
                                    const distance = calculateDistance(userLocation, destinationLocation);
                                    totalDistance = distance;
                                    document.getElementById("distance").textContent =
                                        `Distance: ${totalDistance.toFixed(2)} km`;
                                    showRoute(userLocation, destinationLocation);
                                }
                            });
                        }
                    }
                </script>

                <script
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzf7KnzVx3iLASRh25OP_bYgTpUD-dIW8&libraries=places&callback=initMap"
                    async defer></script> --}}
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


            @endif

        </nav>

    </div>
</aside>


{{-- <ul class="space-y-4 space">
    <div class="shrink-0 flex items-center">
        <a href="{{ route('dashboard') }}" wire:navigate>
            Dashboard
        </a>
    </div>
    <div class="shrink-0 flex items-center">
        <a href="{{ route('city') }}" wire:navigate>
            City
        </a>
    </div>
    <div class="shrink-0 flex items-center">
        <a href="{{ route('profile') }}" wire:navigate>
            Profile
        </a>
    </div>

    <button wire:click="logout" class="w-full text-start">
        {{ __('Log Out') }}
    </button>
</ul> --}}
