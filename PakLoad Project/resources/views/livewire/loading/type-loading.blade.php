<div>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
        <div class="mr-6">
            <h1 class="text-4xl font-semibold mb-2">Load Type</h1>
        </div>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10">
        @if (session()->has('message'))
            <div class="p-4 mb-4 text-green-700 bg-green-100 border border-green-300 rounded">
                {{ session('message') }}
            </div>
        @endif
        <!-- Add Search Bar and Button -->
        <div class="flex justify-end items-end mb-4 mt-2 m-10">

            <!-- Add Product Button -->
            <button wire:click="AddCity"
                class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Add New
            </button>
        </div>
        <!-- Table -->
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($citys as $index => $city)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $index + 1 }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $city->name }}
                        </td>

                        <td class="px-10 py-10 flex gap-4">
                            <button wire:click="EditCity({{ $city->id }})"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                Edit
                            </button>
                            <button type="button" onclick="confirmDelete({{ $city->id }})"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                Delete
                            </button>

                            <!-- Hidden button for triggering Livewire's wire:click -->
                            <button id="delete-button-{{ $city->id }}" wire:click="deleteCity({{ $city->id }})"
                                style="display: none;">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal with Left-side positioning and full width -->
    <div x-show="$wire.model" class="fixed inset-0 flex items-center justify-end bg-gray-800 bg-opacity-50"
        style="display: none;">
        <div class="w-65 h-full max-w-xs md:max-w-none bg-white p-6 rounded-r-lg shadow-lg">
            <!-- Modal Content -->
            <h3 class="text-xl font-semibold">{{ $title }} a New </h3>
            <form wire:submit.prevent="storeCity" class="w-full mt-10">
                <input type="text" wire:model="name" placeholder="Name" class="mt-4 p-2 w-full border rounded">
                @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror
                <button type="submit" class="mt-4 px-6 py-2 text-white bg-blue-600 rounded-lg w-full">Save
                </button>
            </form>
            <button wire:click="$set('model', false)"
                class="mt-4 px-6 py-2 text-white bg-red-600 rounded-lg w-full">Close</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(cityId) {
            // Ensure the hidden button exists before calling click()
            const deleteButton = document.getElementById('delete-button-' + cityId);

            // Check if the button exists before triggering the click
            if (deleteButton) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Trigger the Livewire method by clicking the hidden button
                        deleteButton.click(); // Only trigger if the button exists
                        Swal.fire(
                            'Deleted!',
                            'The city has been deleted.',
                            'success'
                        );
                    }
                });
            } else {
                console.error("Delete button not found for cityId: " + cityId);
            }
        }
    </script>
</div>
