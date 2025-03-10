<div>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="mb-4 border-b border-gray-200 dark:border-gray-700 mt-5">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
            data-tabs-toggle="#default-tab-content" role="tablist">
            <li class="me-2" role="presentation">
                <button wire:click="StatusChangeData('pending')"
                    class="{{ $statusEi == 'pending' ? 'bg-blue-800 text-white' : '' }} inline-block p-4 border-b-2 rounded-t-lg">
                    Pending
                </button>
            </li>
            <li class="me-2" role="presentation">
                <button wire:click="StatusChangeData('approved')"
                    class="{{ $statusEi == 'approved' ? 'bg-blue-800 text-white' : '' }} inline-block p-4 border-b-2 rounded-t-lg">
                    Approved</button>
            </li>
        </ul>
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
                            Profile
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Phone
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3">
                            documents
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Address
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($results && $results->isNotEmpty())
                        @foreach ($results as $index => $result)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-0">
                                    {{ $index + 1 }}
                                </td>
                                <td style="height:90px" class="px-6 py-0">
                                    <img wire:ignore style="width: 80px;"
                                        src="{{ Storage::url($result->profile_image) }}" alt=""
                                        onerror="this.onerror=null; this.src='{{ asset('/assets/CYWH8m1zYetD1Qd0Dlf6eWPxnR97xP284toE508Y.webp') }}'">

                                </td>
                                <td class="px-6 py-0">
                                    {{ $result->name }}
                                </td>
                                <td class="px-6 py-0">
                                    {{ $result->email }}
                                </td>
                                <td class="px-6 py-0">
                                    {{ $result->phone }}
                                </td>

                                <td class="px-6 py-0">
                                    @if ($result->role == 'admin')
                                        Admin
                                    @elseif($result->role == 'manufacturer')
                                        Manufacturer
                                    @elseif($result->role == 'trucking')
                                        Trucking
                                    @elseif($result->role == 'household')
                                        Household
                                    @endif
                                </td>

                                <td class="px-6 py-0">
                                    @if ($result->role == 'manufacturer')
                                        <div class="gap-6" style="line-height: 2;">
                                            <!-- View Insurance Link -->

                                            <!-- View Registration Link -->
                                            <a href="{{ Storage::url($result->company_registration) }}" target="_blank"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-1 rounded-md">
                                                View Registration
                                            </a>

                                            <a href="{{ Storage::url($result->company_insurance) }}" target="_blank"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-1 rounded-md">
                                                View Insurance
                                            </a>

                                            <!-- View License Link -->
                                            <a href="{{ Storage::url($result->fbrtax) }}" target="_blank"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-1 rounded-md">
                                                View FBR Tax
                                            </a>
                                        </div>
                                    @elseif($result->role == 'trucking')
                                        <div class="gap-6" style="line-height: 2;">
                                            <!-- View Insurance Link -->
                                            <a href="{{ Storage::url($result->company_insurance) }}" target="_blank"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-1 rounded-md">
                                                View Insurance
                                            </a>

                                            <!-- View Registration Link -->
                                            <a href="{{ Storage::url($result->company_registration) }}" target="_blank"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-1 rounded-md">
                                                View Registration
                                            </a>

                                            <!-- View License Link -->
                                            <a href="{{ Storage::url($result->drivingL) }}" target="_blank"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-1 rounded-md">
                                                View License
                                            </a>
                                        </div>
                                    @elseif($result->role == 'household')
                                        <div class="gap-6" style="line-height: 2;">
                                            <!-- View Insurance Link -->

                                            <!-- View Registration Link -->
                                            <a href="{{ Storage::url($result->cnic) }}" target="_blank"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-1 rounded-md">
                                                View Registration
                                            </a>

                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-0">
                                    {{ $result->address }}
                                </td>
                                <td class="px-6 py-0">
                                    {{ $result->status }}
                                </td>

                                <td class="px-6 py-0">

                                    <button wire:click="StatusChangeModel({{ $result->id }})"
                                        class="bg-blue-500 mt-1 hover:bg-blue-700 text-white font-bold py-1 px-1 rounded-md">
                                        Status
                                    </button>
                                    <button type="button" onclick="confirmDelete({{ $result->id }})"
                                        class="bg-red-500 mt-1 hover:bg-red-700 text-white font-bold py-1 px-1 rounded-md">
                                        Delete
                                    </button>
                                    <button id="delete-button-{{ $result->id }}"
                                        wire:click="deleteCity({{ $result->id }})" style="display: none;">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-0" colspan="12">
                                <p>No results found within the specified distance.</p>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>


    <div x-show="$wire.model" class="fixed inset-0 flex items-end justify-end bg-gray-800 bg-opacity-50"
        style="display: none;">
        <div style="width: 300px;" class="text-sm h-full max-w-xs md:max-w-none bg-white p-6 rounded-r-lg shadow-lg">
            <!-- Modal Content -->
            <h3 class="text-xl font-semibold">User Status</h3>
            <form wire:submit.prevent="StatusChangesSave" class="w-full mt-10">

                <label for="equipment" class="block text-gray-700 font-medium">Status</label>

                <select id="status" wire:model="status"
                    class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" selected>Select a status</option>
                    <option value="approved">Approved</option>
                    <option value="Rejected">Rejected</option>
                </select>

                @error('status')
                    <span class="error text-red-500">{{ $message }}</span>
                @enderror
                <button type="submit" class="mt-4 px-6 py-2 text-white bg-blue-600 rounded-lg w-full">Save</button>
            </form>
            <button wire:click="closeModel"
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
