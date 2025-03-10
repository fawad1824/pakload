    <div class="container mt-5">
        <h2 class="text-center mb-4">Registration Form</h2>

        <div class="row justify-content-center">
            <div class="col-md-6">

                <div>
                    <form wire:submit.prevent="register">

                        @if (session()->has('message'))
                            <div class="p-4 mb-4 text-green-700 bg-green-100 border border-green-300 rounded">
                                {{ session('message') }}
                                <br>
                                {{ session('status') }}
                            </div>
                        @endif


                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" wire:model="name" class="form-control"
                                placeholder="Enter your name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        @if ($profile)
                            <button type="button"
                                style="border-radius: 29px;     border-radius: 29px;
    padding: 1px 7px;
    font-size: 14px;"
                                wire:click="removePhotoProfile" class="btn btn-danger">X
                            </button>
                            <br>
                            <img style="width: 100px;" src="{{ $profile->temporaryUrl() }}" class="accept="image/*,.pdf"
                                mt-3 rounded-full shadow-lg">
                        @else
                            <div class="mb-3">

                                <label for="country">Profile</label>

                                <input type="file" wire:model="profile" class="form-control" accept="image/*,.pdf">
                                @error('profile')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        @endif


                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" wire:model="email" class="form-control"
                                placeholder="Enter your email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" id="password" wire:model="password" class="form-control"
                                placeholder="Enter your password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="mb-3">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" wire:model="phone" class="form-control"
                                placeholder="Enter your phone number">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label for="address">Address</label>
                            <textarea id="address" wire:model="address" class="form-control" placeholder="Enter your address"></textarea>
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="country">Type Of User</label>
                            <select id="country" wire:change="selectedtypeuser($event.target.value)"
                                class="form-control">
                                <option value="">Select a Type User</option>
                                <option value="manufacturer">As a manufacturer</option>
                                <option value="trucking">As a Trucking</option>
                                <option value="household">As a HouseHold</option>
                            </select>
                            @error('typeuser')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        @if ($typeuser == 'manufacturer')

                            <div class="mb-3">
                                <label for="company">Company Name</label>
                                <input id="company" wire:model="company" class="form-control"
                                    placeholder="Enter your company Name" />
                                @error('company')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            @if ($companyRegistration)
                                <button wire:click="removePhotomanufacturer" class="btn btn-danger">X</button>
                                <br>
                                @if (in_array(strtolower($companyRegistration->extension()), ['jpg', 'jpeg', 'png', 'gif']))
                                    <!-- Display image preview -->
                                    <img style="width: 200px;" src="{{ $companyRegistration->temporaryUrl() }}"
                                        class="w-40 h-40 mt-3 rounded-full shadow-lg">
                                @elseif(strtolower($companyRegistration->extension()) == 'pdf')
                                    <!-- Display PDF preview link -->
                                    <a href="{{ $companyRegistration->temporaryUrl() }}" target="_blank"
                                        class="text-blue-500 mt-3">View PDF</a>
                                @else
                                    <!-- Handle other file types -->
                                    <p class="text-danger mt-3">Unsupported file type.</p>
                                @endif
                            @else
                                <div class="mb-3">
                                    <label for="companyRegistration">Company Registration</label>
                                    <input type="file" wire:model="companyRegistration" class="form-control"
                                        accept="image/*,.pdf">
                                    @error('companyRegistration')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endif

                            @if ($companyInsurance)
                                <br>
                                <br>
                                <button wire:click="companyInsuranceremovePhoto" class="btn btn-danger">X</button>
                                <br>
                                @if (in_array(strtolower($companyInsurance->extension()), ['jpg', 'jpeg', 'png', 'gif']))
                                    <!-- Display image preview -->
                                    <img style="width: 200px;" src="{{ $companyInsurance->temporaryUrl() }}"
                                        class="w-40 h-40 mt-3 rounded-full shadow-lg">
                                @elseif(strtolower($companyInsurance->extension()) == 'pdf')
                                    <!-- Display PDF preview link -->
                                    <a href="{{ $companyInsurance->temporaryUrl() }}" target="_blank"
                                        class="text-blue-500 mt-3">View PDF</a>
                                @else
                                    <!-- Handle other file types -->
                                    <p class="text-danger mt-3">Unsupported file type.</p>
                                @endif
                            @else
                                <div class="mb-3">
                                    <label for="companyInsurance">Company Insurance</label>
                                    <input type="file" wire:model="companyInsurance" class="form-control"
                                        accept="image/*,.pdf">
                                    @error('companyInsurance')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endif

                            @if ($FBRTax)
                                <button wire:click="FBRTaxremovePhoto" class="btn btn-danger">X</button>
                                <br>
                                @if (in_array(strtolower($FBRTax->extension()), ['jpg', 'jpeg', 'png', 'gif']))
                                    <!-- Display image preview -->
                                    <img style="width: 200px;" src="{{ $FBRTax->temporaryUrl() }}"
                                        class="w-40 h-40 mt-3 rounded-full shadow-lg">
                                @elseif(strtolower($FBRTax->extension()) == 'pdf')
                                    <!-- Display PDF preview link -->
                                    <a href="{{ $FBRTax->temporaryUrl() }}" target="_blank"
                                        class="text-blue-500 mt-3">View PDF</a>
                                @else
                                    <!-- Handle other file types -->
                                    <p class="text-danger mt-3">Unsupported file type.</p>
                                @endif
                            @else
                                <div class="mb-3">
                                    <label for="FBRTax">Company FBR Tax</label>
                                    <input type="file" wire:model="FBRTax" class="form-control"
                                        accept="image/*,.pdf">
                                    @error('FBRTax')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endif
                        @elseif ($typeuser == 'trucking')
                            @if ($drivingL)
                                <button wire:click="companyDrivingLremovePhoto" class="btn btn-danger">X</button>
                                <br>
                                @if (in_array(strtolower($drivingL->extension()), ['jpg', 'jpeg', 'png', 'gif']))
                                    <!-- Display image preview -->
                                    <img style="width: 200px;" src="{{ $drivingL->temporaryUrl() }}"
                                        class="w-40 h-40 mt-3 rounded-full shadow-lg">
                                @elseif(strtolower($drivingL->extension()) == 'pdf')
                                    <!-- Display PDF preview link -->
                                    <a href="{{ $drivingL->temporaryUrl() }}" target="_blank"
                                        class="text-blue-500 mt-3">View PDF</a>
                                @else
                                    <!-- Handle other file types -->
                                    <p class="text-danger mt-3">Unsupported file type.</p>
                                @endif
                            @else
                                <div class="mb-3">
                                    <label for="drivingL">Company Driving License</label>
                                    <input type="file" wire:model="drivingL" class="form-control"
                                        accept="image/*,.pdf">
                                    @error('drivingL')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endif

                            @if ($companyRegistration)
                                <button wire:click="removePhotomanufacturer" class="btn btn-danger">X</button>
                                <br>
                                @if (in_array(strtolower($companyRegistration->extension()), ['jpg', 'jpeg', 'png', 'gif']))
                                    <!-- Display image preview -->
                                    <img style="width: 200px;" src="{{ $companyRegistration->temporaryUrl() }}"
                                        class="w-40 h-40 mt-3 rounded-full shadow-lg">
                                @elseif(strtolower($companyRegistration->extension()) == 'pdf')
                                    <!-- Display PDF preview link -->
                                    <a href="{{ $companyRegistration->temporaryUrl() }}" target="_blank"
                                        class="text-blue-500 mt-3">View PDF</a>
                                @else
                                    <!-- Handle other file types -->
                                    <p class="text-danger mt-3">Unsupported file type.</p>
                                @endif
                            @else
                                <div class="mb-3">
                                    <label for="companyRegistration">Company Registration</label>
                                    <input type="file" wire:model="companyRegistration" class="form-control"
                                        accept="image/*,.pdf">
                                    @error('companyRegistration')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endif

                            @if ($companyInsurance)
                                <br>
                                <br>
                                <button wire:click="companyInsuranceremovePhoto" class="btn btn-danger">X</button>
                                <br>
                                @if (in_array(strtolower($companyInsurance->extension()), ['jpg', 'jpeg', 'png', 'gif']))
                                    <!-- Display image preview -->
                                    <img style="width: 200px;" src="{{ $companyInsurance->temporaryUrl() }}"
                                        class="w-40 h-40 mt-3 rounded-full shadow-lg">
                                @elseif(strtolower($companyInsurance->extension()) == 'pdf')
                                    <!-- Display PDF preview link -->
                                    <a href="{{ $companyInsurance->temporaryUrl() }}" target="_blank"
                                        class="text-blue-500 mt-3">View PDF</a>
                                @else
                                    <!-- Handle other file types -->
                                    <p class="text-danger mt-3">Unsupported file type.</p>
                                @endif
                            @else
                                <div class="mb-3">
                                    <label for="companyInsurance">Company Insurance</label>
                                    <input type="file" wire:model="companyInsurance" class="form-control"
                                        accept="image/*,.pdf">
                                    @error('companyInsurance')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endif
                        @elseif ($typeuser == 'household')
                            @if ($CNIC)
                                <button wire:click="CNICremovePhoto" class="btn btn-danger">X</button>
                                <br>

                                @if (in_array(strtolower($CNIC->extension()), ['jpg', 'jpeg', 'png', 'gif']))
                                    <!-- Display image preview -->
                                    <img style="width: 200px;" src="{{ $CNIC->temporaryUrl() }}"
                                        class="w-40 h-40 mt-3 rounded-full shadow-lg">
                                @elseif(strtolower($CNIC->extension()) == 'pdf')
                                    <!-- Display PDF preview link -->
                                    <a href="{{ $CNIC->temporaryUrl() }}" target="_blank"
                                        class="text-blue-500 mt-3">View PDF</a>
                                @else
                                    <!-- Handle other file types -->
                                    <p class="text-danger mt-3">Unsupported file type.</p>
                                @endif
                            @else
                                <div class="mb-3">
                                    <label for="country">Company CNIC</label>
                                    <input type="file" wire:model="CNIC" class="form-control"
                                        accept="image/*,.pdf">
                                    @error('CNIC')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endif

                        @endif


                        <!-- Terms & Conditions -->
                        <div class="form-check mb-3">
                            <input type="checkbox" id="agreement" wire:model="agreement" class="form-check-input">
                            <label class="form-check-label" for="agreement">
                                I agree to the <a href="/terms">Terms and Conditions</a>
                            </label>
                            <br>
                            @error('agreement')
                                <span class="text-danger">
                                    The agreement must be accepted
                                </span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
