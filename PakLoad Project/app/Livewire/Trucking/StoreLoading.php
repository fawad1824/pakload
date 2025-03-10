<?php

namespace App\Livewire\Trucking;

use App\Models\City;
use App\Models\EquipmentType;
use App\Models\Loading;
use App\Models\LoadinType;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StoreLoading extends Component
{
    public $city, $origin, $destinations, $goodtype, $weighted_types, $load_date, $load_time, $price;
    public $cityList;
    public $loadtype, $loadtypeList;
    public $equipment, $equipmenttypeList;
    public $destination_lat, $destination_lng, $origin_lat, $origin_lng;
    public $modelcity, $title, $cityNameadd;
    public $modelequipment, $equipmentNameadd;
    public $modelLoading, $LoadingNameadd;
    public $length,$comment,
        $weight;

    public function AddCity()
    {
        $this->title = "Add City";
        $this->modelcity = true;
    }

    public function AddEquipment()
    {
        $this->title = "Add Equipment";
        $this->modelequipment = true;
    }

    public function AddLoading()
    {
        $this->title = "Add Load";
        $this->modelLoading = true;
    }

    public function AddCityList()
    {
        $this->validate([
            'cityNameadd' => 'required',
        ]);
        $city = new City();
        $city->name = $this->cityNameadd;
        $city->save();
        $this->modelcity = false;
        $this->cityNameadd = '';
        $this->cityList = City::all();
        session()->flash('message', 'Data has been created successfully.');
    }

    public function AddEquipmentList()
    {
        $this->validate([
            'equipmentNameadd' => 'required',
        ]);
        $city = new EquipmentType();
        $city->name = $this->equipmentNameadd;
        $city->save();
        $this->modelequipment = false;
        $this->equipmentNameadd = '';
        $this->cityList = EquipmentType::all();
        session()->flash('message', 'Data has been created successfully.');
    }

    public function AddLoadingList()
    {
        $this->validate([
            'LoadingNameadd' => 'required',
        ]);
        $city = new LoadinType();
        $city->name = $this->LoadingNameadd;
        $city->save();
        $this->modelLoading = false;
        $this->LoadingNameadd = '';
        $this->cityList = LoadinType::all();
        session()->flash('message', 'Data has been created successfully.');
    }
    public function storeCity()
    {
        $this->validate([
            // 'city' => 'required',
            'origin' => 'required',
            'destinations' => 'required',
            'weight' => 'required',
            'length' => 'required',
            'load_date' => 'required',
            'load_time' => 'required',
            'price' => 'required|numeric',
            // 'priority' => 'required',
            'loadtype' => 'required',
            'equipment' => 'required',
        ]);
        // dd($this->all());
        // Store the data to the database or wherever you want it to be stored
        $loading = new Loading();
        // $loading->city = $this->city;
        $loading->user_id = Auth::user()->id;
        $loading->origin = $this->origin;
        $loading->destination = $this->destinations;
        $loading->length = $this->length;
        $loading->weight = $this->weight;
        $loading->delivery_date = $this->load_date;
        $loading->delivery_time = $this->load_time;
        $loading->comment = $this->comment;
        $loading->price = $this->price;
        // $loading->priority = $this->priority;
        $loading->loadtype = $this->loadtype;
        $loading->equipment = $this->equipment;
        $loading->status = "Pending";
        $loading->destination_lat = $this->destination_lat;
        $loading->destination_lng = $this->destination_lng;
        $loading->origin_lat = $this->origin_lat;
        $loading->origin_lng = $this->origin_lng;
        $loading->save();
        session()->flash('message', 'Load has been posted successfully.');

        // Emit an event to trigger Toastr notification
        $this->reset(['origin', 'destinations', 'goodtype', 'weighted_types', 'load_date', 'load_time', 'price']);
    }


    public function render()
    {
        // $this->cityList = City::all();
        $this->equipmenttypeList = EquipmentType::all();
        $this->loadtypeList = LoadinType::all();
        return view('livewire.trucking.store-loading');
    }
}
