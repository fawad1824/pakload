<?php

namespace App\Livewire\Shipper;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;  // Use Auth for login
use Livewire\WithFileUploads;

class Register extends Component
{

    use WithFileUploads;

    public $name,
        $email,
        $password,
        $phone,
        $address,
        $agreement,
        $typeuser,
        $companyRegistration,
        $companyInsurance,
        $company,
        $FBRTax,
        $CNIC,
        $profile,
        $drivingL;

    // Validation rules
    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'typeuser' => 'required',
        'password' => 'required|min:6',
        'phone' => 'required',
        'address' => 'required|string|max:500',
        'agreement' => 'accepted',
        'profile' => 'required',
    ];

    public function removePhotomanufacturer()
    {
        $this->companyRegistration = null;
        session()->flash('message', 'Photo removed successfully!');
    }

    public function companyInsuranceremovePhoto()
    {
        $this->companyInsurance = null;
        session()->flash('message', 'Photo removed successfully!');
    }

    public function companyFBRTaxremovePhoto()
    {
        $this->FBRTax = null;
        session()->flash('message', 'Photo removed successfully!');
    }
    public function companyCNICremovePhoto()
    {
        $this->CNIC = null;
        session()->flash('message', 'Photo removed successfully!');
    }

    public function companyDrivingLremovePhoto()
    {
        $this->drivingL = null;
        session()->flash('message', 'Photo removed successfully!');
    }
    public function selectedtypeuser($name)
    {
        $this->typeuser = $name;
    }
    // Method to handle registration
    public function removePhotoProfile()
    {
        $this->profile = '';
    }
    public function register()
    {

        $this->validate();
        // if ($this->typeuser == 'trucking') {
        //     $this->validate([
        //         'company' => 'required',
        //         'companyRegistration' => 'required',
        //         'companyInsurance' => 'required',
        //         'FBRTax' => 'required',
        //     ]);
        // } elseif ($this->typeuser == 'manufacturer') {
        //     $this->validate([
        //         'drivingL' => 'required',
        //         'companyRegistration' => 'required',
        //         'companyInsurance' => 'required',
        //     ]);
        // } elseif ($this->typeuser == 'household') {
        //     $this->validate([
        //         'CNIC' => 'required',
        //     ]);
        // }

        if (isset($this->profile)) {
            $this->profile =  $this->profile->storePublicly('company_registration', 'public');
        }
        if (isset($this->companyRegistration)) {
            $this->companyRegistration = $this->companyRegistration->storePublicly('company_registration', 'public');
        }
        if (isset($this->companyInsurance)) {
            $this->companyInsurance = $this->companyInsurance->storePublicly('company_insurance', 'public');
        }
        if (isset($this->FBRTax)) {
            $this->FBRTax = $this->FBRTax->storePublicly('FBRTax', 'public');
        }
        if (isset($this->CNIC)) {
            $this->CNIC = $this->CNIC->storePublicly('CNIC', 'public');
        }

        if (isset($this->drivingL)) {
            $this->drivingL = $this->drivingL->storePublicly('drivingL', 'public');
        }


        // Registration logic here
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'phone' => $this->phone,
            'address' => $this->address,
            'agreement' => $this->agreement,
            'typeuser' => $this->typeuser,
            'role' => $this->typeuser,
            'company' => $this->company,
            'status' => "pending",
            'profile_image' => $this->profile,
            'company_registration' => $this->companyRegistration,
            'company_insurance' => $this->companyInsurance,
            'fbrtax' => $this->FBRTax,
            'cnic' => $this->CNIC,
            'drivingl' => $this->drivingL,
        ]);


        // Automatically log the user in after registration
        // Auth::login($user);
        $this->reset();  // Resets all properties bound to the Livewire component

        // Redirect to the dashboard (or any page after registration)
        // Flash the success message
        session()->flash('message', 'Registration successful!');
        session()->flash('status', 'Your account is under review.');

        return $this->redirectIntended(default: route('register', absolute: false), navigate: true);

        if ($user->role == 'trucking') {
            $this->redirectIntended(default: route('searchLoading', absolute: false), navigate: true);
        }
        if ($user->role == 'manufacturer') {
            $this->redirectIntended(default: route('addLoading', absolute: false), navigate: true);
        }
        if ($user->role == 'household') {
            $this->redirectIntended(default: route('searchLoading', absolute: false), navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.shipper.register');
    }
}
