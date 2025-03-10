<div>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
        <div class="mr-6">
            <h1 class="text-4xl font-semibold mb-2">{{ $heading }}</h1>
        </div>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10">

        <!-- Add Search Bar and Button -->
        <div class="flex justify-end items-end mb-4 mt-2 m-10">
            <!-- Search Bar -->


            <!-- Add Product Button -->
            <a href="/storeLoading" wire:navigate
                class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Add {{ $heading }}
            </a>
        </div>
        {{-- {{ $loadings }} --}}
        <!-- Table -->
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        origin
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Destination
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Equipment
                    </th>
                    <th scope="col" class="px-6 py-3">
                        load types
                    </th>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        delivery date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        delivery time
                    </th>
                    <th scope="col" class="px-6 py-3">
                        weight
                    </th>
                    <th scope="col" class="px-6 py-3">
                        length

                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        comment
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($loadings as $index => $city)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $index + 1 }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $city->origin }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $city->destination }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $city->equipment }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $city->loadtype }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $city->delivery_date }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $city->delivery_time }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $city->weight }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $city->length }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $city->price }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $city->comment }}
                        </td>


                        <td class="px-10 py-10 flex items-center justify-center gap-4">
                            <a href="/editLoading/{{ $city->id }}" wire:navigate
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                Edit
                            </a>

                            <button type="button" onclick="confirmDelete({{ $city->id }})"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                Delete
                            </button>

                            <!-- Hidden button for triggering Livewire's wire:click -->
                            <button id="delete-button-{{ $city->id }}"
                                wire:click="deleteCity({{ $city->id }})" style="display: none;">
                                Delete
                            </button>
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>
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
