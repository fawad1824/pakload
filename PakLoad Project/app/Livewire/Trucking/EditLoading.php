<?php

namespace App\Livewire\Trucking;

use App\Models\City;
use App\Models\EquipmentType;
use App\Models\Loading;
use App\Models\LoadinType;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditLoading extends Component
{
    public $id, $city, $comment, $loadtype, $equipment, $cityList, $equipmenttypeList, $loadtypeList, $origin, $destinations, $goodtype, $weighted_types, $load_date, $load_time, $price;
    public $destination_lat, $destination_lng, $origin_lat, $origin_lng;

    public $equipmentNameadd;
    public $LoadingNameadd;

    public function mount($id)
    {
        $this->id = $id;
        $loading = Loading::find($this->id); // Use `find` for simplicity
        // dd($loading);
        $this->cityList = City::all();

        $this->equipmenttypeList = EquipmentType::all();
        $this->loadtypeList = LoadinType::all();

        if ($loading) {
            // Assign the existing data to the component's properties
            $this->city = $loading->city;
            $this->loadtype = $loading->loadtype;
            $this->equipment = $loading->equipment;
            $this->origin = $loading->origin;
            $this->destinations = $loading->destination;
            $this->goodtype = $loading->good_types;
            $this->weighted_types = $loading->weighted_types;
            $this->load_date = $loading->delivery_date;
            $this->comment = $loading->comment;
            $this->load_time = $loading->delivery_time;
            $this->price = $loading->price;
            // $this->priority = $loading->priority;
        } else {
            // Handle if the `Loading` is not found (optional)
            session()->flash('message', 'Load not found!');
        }
    }

    public function storeCity()
    {
        $this->validate([
            // 'city' => 'required',
            'origin' => 'required',
            'destinations' => 'required',
            // 'goodtype' => 'required',
            // 'weighted_types' => 'required',
            'load_date' => 'required',
            'load_time' => 'required',
            'price' => 'required|numeric',
            // 'priority' => 'required',
        ]);
        // Store the data to the database or wherever you want it to be stored

        $loading = Loading::find($this->id); // Use `find` for simplicity
        $loading->city = $this->city;
        $loading->user_id = Auth::user()->id;
        $loading->origin = $this->origin;
        $loading->destination = $this->destinations;
        $loading->comment = $loading->comment;

        // $loading->good_types = $this->goodtype;
        // $loading->weighted_types = $this->weighted_types;
        $loading->delivery_date = $this->load_date;
        $loading->delivery_time = $this->load_time;
        $loading->price = $this->price;
        // $loading->priority = $this->priority;
        $loading->status = "Pending";

        $loading->destination_lat = $this->destination_lat;
        $loading->destination_lng = $this->destination_lng;
        $loading->origin_lat = $this->origin_lat;
        $loading->origin_lng = $this->origin_lng;
        $loading->save();
        session()->flash('message', 'Load has been created successfully.');

        // Emit an event to trigger Toastr notification
        // $this->reset(['city', 'origin', 'destinations', 'goodtype', 'weighted_types', 'load_date', 'load_time', 'price', 'priority']);
    }
    public function render()
    {
        return view('livewire.trucking.edit-loading');
    }
}
