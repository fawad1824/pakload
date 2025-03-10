<div class="w-full">
    @if (session()->has('success'))
        <div class="p-4 mb-4 text-green-700 bg-green-100 border border-green-300 rounded">
            {{ session('success') }}
        </div>
    @endif
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Modal Content -->
    <h3 class="text-xl font-semibold text-gray-800">My Request</h3>
    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>



    <style>
        td.px-6.py-0 {
            font-size: 11px;
        }
    </style>


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
                <button wire:click="StatusChangeData('Accept')"
                    class="{{ $statusEi == 'Accept' ? 'bg-blue-800 text-white' : '' }} inline-block p-4 border-b-2 rounded-t-lg">
                    Accepted</button>
            </li>

            <li class="me-2" role="presentation">
                <button wire:click="StatusChangeData('Rejected')"
                    class="{{ $statusEi == 'Rejected' ? 'bg-blue-800 text-white' : '' }} inline-block p-4 border-b-2 rounded-t-lg">
                    Rejected</button>
            </li>

            <li class="me-2" role="presentation">
                <button wire:click="StatusChangeData('Delivered')"
                    class="{{ $statusEi == 'Delivered' ? 'bg-blue-800 text-white' : '' }} inline-block p-4 border-b-2 rounded-t-lg">
                    Delivered</button>
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
                            Your Rates
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Bidding Rates
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Origin
                        </th>
                        <th scope="col" class="px-6 py-3">
                            DH-0
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Destination
                        </th>
                        <th scope="col" class="px-6 py-3">
                            DH-0
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Company Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Contact
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Comment
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
                                class="bg-white  dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-0">
                                    {{ $index + 1 }}
                                </td>

                                <td class="px-6 py-0">
                                    {{ $result->price }} PKR
                                </td>
                                <td class="px-6 py-0">
                                    {{ $result->amount }} PKR
                                </td>

                                <td class="px-6 py-0">
                                    {{ $result->origin }}
                                </td>
                                <td class="px-6 py-0">
                                    {{ number_format($result->distance_from_loading_origin_to_bidding_destination, 2) }}
                                    km
                                </td>
                                <td class="px-6 py-0">
                                    {{ $result->destinations }}
                                </td>
                                <td class="px-6 py-0">
                                    {{ number_format($result->distance_from_loading_destination_to_bidding_origin, 2) }}
                                    km
                                </td>

                                <td class="px-6 py-0 ">
                                    @if (isset($result->users))
                                        {{ $result->users->company }}
                                    @endif
                                </td>
                                <td class="px-6 py-0 ">
                                    @if (isset($result->users))
                                        Email: {{ $result->users->email }}
                                        <br>
                                        Phone: {{ $result->users->phone }}
                                    @endif
                                </td>
                                <td class="px-6 py-0 ">
                                    {{ $result->status }}
                                </td>
                                <td class="px-6 py-0 ">
                                    {{ $result->comment }}
                                </td>
                                <td class="px-6 py-0">
                                    @php
                                        $ds = DB::table('loading_rattings')
                                            ->where('load_id', $result->LoadingID)
                                            ->where('user_id', Auth::user()->id)
                                            ->first();
                                    @endphp

                                    {{-- @if ($result->status == 'Delivered')
                                        @if (!$ds)
                                            <button wire:click="booking({{ $result->id }})"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-1 rounded-md">
                                                Ratting
                                            </button>
                                        @endif
                                    @endif --}}

                                    @if ($result->status == 'Accept')
                                        <button type="button" wire:click="StatusMAChangesModel({{ $result->id }})"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-1 rounded-md">
                                            Status Change
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr
                            class="text-center bg-white  dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-2" colspan="12">
                                <p>No Data Found</p>
                            </td>
                        </tr>
                    @endif

                </tbody>

            </table>
        </div>
    </div>


    <div x-show="$wire.modelstatus" class="fixed inset-0 flex items-end justify-end bg-gray-800 bg-opacity-50"
        style="display: none;">
        <div style="width: 300px;" class="text-sm h-full max-w-xs md:max-w-none bg-white p-6 rounded-r-lg shadow-lg">
            <!-- Modal Content -->
            <h3 class="text-xl font-semibold">Bid Status</h3>
            <form wire:submit.prevent="StatusMAChanges" class="w-full mt-10">

                <label for="equipment" class="block text-gray-700 font-medium">Status</label>

                <select id="status" wire:model="status"
                    class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" selected>Select a status</option>
                    @if ($status == 'pending')
                        <option value="Accept">Accept</option>
                        <option value="Rejected">Rejected</option>
                    @else
                        <option value="Delivered">Delivered</option>
                    @endif
                </select>

                @error('status')
                    <span class="error text-red-500">{{ $message }}</span>
                @enderror
                <button type="submit" class="mt-4 px-6 py-2 text-white bg-blue-600 rounded-lg w-full">Save</button>
            </form>
            <button wire:click="closeModelStatus"
                class="mt-4 px-6 py-2 text-white bg-red-600 rounded-lg w-full">Close</button>
        </div>
    </div>

    <div x-show="$wire.model" class="fixed inset-0 flex items-end justify-end bg-gray-800 bg-opacity-50"
        style="display: none;">
        <div style="width: 300px;" class="text-sm h-full max-w-xs md:max-w-none bg-white p-6 rounded-r-lg shadow-lg">
            <!-- Modal Content -->
            <h3 class="text-xl font-semibold">Bid Review</h3>
            <form wire:submit.prevent="StatusChanges" class="w-full mt-10">

                <label for="equipment" class="block text-gray-700 font-medium mt-2">Comment</label>
                <input type="text" wire:model="comment" placeholder="comment"
                    class="mt-1 p-2 w-full border rounded">
                @error('comment')
                    <span class="error text-red-500">{{ $message }}</span>
                @enderror

                <label for="equipment" class="block text-gray-700 font-medium mt-2">Status</label>

                <select id="star" wire:model="star"
                    class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" selected>Select a ratting</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>

                @error('star')
                    <span class="error text-red-500">{{ $message }}</span>
                @enderror
                <button type="submit" class="mt-4 px-6 py-2 text-white bg-blue-600 rounded-lg w-full">Save</button>
            </form>
            <button wire:click="closeModel"
                class="mt-4 px-6 py-2 text-white bg-red-600 rounded-lg w-full">Close</button>
        </div>
    </div>


    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
</div>
