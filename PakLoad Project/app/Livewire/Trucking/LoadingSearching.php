<?php

namespace App\Livewire\Trucking;

use App\Models\BiddingLoad;
use App\Models\EquipmentType;
use App\Models\Loading;
use App\Models\LoadingRatting;
use App\Models\LoadinType;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class LoadingSearching extends Component
{
    public $heading = "Search Loads";
    public $origin;
    public $destinations;
    public $sqr1;
    public $weight;
    public $length;
    public $sqr2;
    public $origin_lat;
    public $origin_lng;
    public $destination_lat;
    public $destination_lng;
    public $results;
    public $bidprice;
    public $eqtype;
    public $lotype;
    public $equipment_type;
    public $load_type;
    public $date;
    public $time;
    public $model = '';
    public $modelReview = '';
    public $dataD;
    public $dataT;
    public $editData;
    public $rattingView;
    public $dataID;


    public function render()
    {
        $this->eqtype = EquipmentType::all();
        $this->lotype = LoadinType::all();
        return view('livewire.trucking.loading-searching');
    }
    public function Review($id)
    {
        $this->modelReview = true;
        $this->dataID = $id;
        // $this->rattingView = LoadingRatting::where('load_id', $id)->with('user')->get();
        // dd($this->rattingView);
    }
    public function closeModelmodelReview()
    {
        $this->modelReview = false;
    }
    public function closeModel()
    {
        $this->model = false;
        $this->bidprice = '';
    }

    public function search()
    {
        // dd($this->all());
        $this->dataD = substr($this->date, 0, 10);  // "2025-01-25"
        $this->dataT = substr($this->date, 11, 5);  // "20:18"

        $this->validate([
            'origin_lat' => 'required|numeric',
            'origin_lng' => 'required|numeric',
            'destination_lat' => 'required|numeric',
            'destination_lng' => 'required|numeric',
            'sqr1' => 'nullable|numeric',
            'sqr2' => 'nullable|numeric',
        ]);


        // Perform a database search
        $query = Loading::query()->with('users', 'bidding');



        if ($this->origin_lat && $this->origin_lng && $this->destination_lat && $this->destination_lng) {

            $query->selectRaw('*, ( 6371 * acos( cos( radians(?) ) * cos( radians( origin_lat ) ) * cos( radians( origin_lng ) - radians(?) ) + sin( radians(?) ) * sin( radians( origin_lat ) ) ) ) AS distance', [
                $this->origin_lat,
                $this->origin_lng,
                $this->origin_lat
            ]);
            $query->orderByDesc('distance');

            if ($this->sqr1) {
                $query->having('distance', '<=', $this->sqr1);
            }

            if ($this->sqr2) {
                $query->having('distance', '<', $this->sqr2);
            }
        }

        if (isset($this->equipment_type)) {
            $query->where('equipment', $this->equipment_type);
        }
        if (isset($this->load_type)) {
            $query->where('loadtype', $this->load_type);
        }
        if (isset($this->date)) {
            $query->where("delivery_date", $this->dataD);
        }
        if (isset($this->length)) {
            $query->where("length", '=', $this->length);
        }

        if (isset($this->weight)) {
            $query->where("weight", '=', $this->weight);
        }
        // Fetch results from the database
        $this->results = $query->get();


        // Optionally, calculate and display distance for each result as well
        foreach ($this->results as $result) {
            $result->user_distance = $this->calculateDistance($this->destination_lat, $this->destination_lng, $result->destination_lat, $result->destination_lng);
        }
    }



    public function booking($id)
    {
        $this->model = true;
        $this->editData = Loading::where('id', $id)->first();
    }


    public function storeBidAmount()
    {
        $trackingNumber = Str::upper(Str::random(3)) . rand(100000000, 999999999);

        $bidding = new BiddingLoad();
        $bidding->load_id = $this->editData->id;
        $bidding->truck_id = Auth::user()->id;
        $bidding->mani_id = $this->editData->user_id;
        $bidding->amount = $this->bidprice;
        $bidding->origin = $this->origin;
        $bidding->destinations = $this->destinations;
        $bidding->status = "pending";
        $bidding->trackingnumber = $trackingNumber;
        $bidding->payment_status = "pending";
        $bidding->origin_lng = $this->origin_lng;
        $bidding->origin_lat = $this->origin_lat;
        $bidding->destination_lng = $this->destination_lng;
        $bidding->destination_lat = $this->destination_lat;
        $bidding->save();
        $this->model = false;
        $this->reset();
        session()->flash('success', 'Load Bidded Successfully');
    }

    // Calculate the distance between two lat/lng coordinates using the Haversine formula
    public function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371;  // Radius of Earth in kilometers
        $dLat = deg2rad($lat2 - $lat1);  // Difference in latitudes in radians
        $dLon = deg2rad($lon2 - $lon1);  // Difference in longitudes in radians
        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return $earthRadius * $c;  // Returns the distance in kilometers
    }
}
