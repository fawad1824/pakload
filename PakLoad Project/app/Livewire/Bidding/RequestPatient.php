<?php

namespace App\Livewire\Bidding;

use App\Models\BiddingLoad;
use App\Models\Loading;
use App\Models\LoadingRatting;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RequestPatient extends Component
{

    public $results;
    public $model = '';
    public $status;
    public $comment, $star;
    public $editID;
    public $statusEi = "pending";
    public $modelstatus;

    public function closeModel()
    {
        $this->getDataStatus();
        $this->model = false;
    }
    public function booking($id)
    {
        $this->getDataStatus();
        $this->model = true;
        $this->editID = $id;
    }
    public function StatusChangeData($status)
    {
        $this->statusEi = $status;
        $this->getDataStatus();
    }

    public function closeModelStatus()
    {
        $this->getDataStatus();
        $this->modelstatus = false;
    }

    public function StatusMAChangesModel($status)
    {
        $this->modelstatus = true;
        $this->editID = $status;
    }
    public function StatusMAChanges()
    {
        $this->validate([
            'status' => ['required'],
        ]);


        BiddingLoad::where('id', '=', $this->editID)->update([
            'status' => $this->status,
        ]);
        $this->model = false;
        $this->reset();
        $this->getDataStatus();

        session()->flash('success', 'Data Updated Successfully');
    }

    public function StatusChanges()
    {
        $this->validate([
            'comment' => 'required',
            'star' => 'required',
        ]);

        $biddingLoad = BiddingLoad::where('id', '=', $this->editID)->first();

        LoadingRatting::insert([
            'truck_id' => $biddingLoad->truck_id,
            'load_id' => $biddingLoad->id,
            'user_id' => $biddingLoad->mani_id,
            'comment' => $this->comment,
            'star' => $this->star,
        ]);
        $this->model = false;
        $this->reset();
        $this->getDataStatus();

        session()->flash('success', 'Data Updated Successfully');
    }

    public function getDataStatus()
    {
        $this->results = Loading::with('users')
            ->leftJoin('bidding_loads', 'loadings.id', '=', 'bidding_loads.load_id')
            ->where('bidding_loads.status', $this->statusEi)
            ->where('bidding_loads.truck_id', Auth::user()->id)
            ->select(
                '*',
                'loadings.origin_lng',
                'loadings.id as LoadingID',
                'bidding_loads.status',
                'loadings.origin_lat',
                'loadings.destination_lng',
                'loadings.destination_lat',
                'bidding_loads.origin as bidders_origin',
                'bidding_loads.destinations as bidders_destinations',
                'bidding_loads.origin_lat as bidders_origin_lat',
                'bidding_loads.origin_lng as bidders_origin_lng',
                'bidding_loads.destination_lat as bidders_destination_lat',
                'bidding_loads.destination_lng as bidders_destination_lng'
            )
            ->get();

        // Loop through the results and calculate distances
        foreach ($this->results as $result) {
            // Get coordinates from loadings
            $loadingOriginLat = $result->origin_lat;
            $loadingOriginLng = $result->origin_lng;
            $loadingDestLat = $result->destination_lat;
            $loadingDestLng = $result->destination_lng;

            // Get coordinates from bidding_loads
            $biddingOriginLat = $result->bidders_origin_lat;
            $biddingOriginLng = $result->bidders_origin_lng;
            $biddingDestLat = $result->bidders_destination_lat;
            $biddingDestLng = $result->bidders_destination_lng;

            // Calculate distances using the Haversine formula
            $distanceFromLoadingOriginToBiddingDestination = $this->haversineDistance(
                $loadingOriginLat,
                $loadingOriginLng,
                $biddingDestLat,
                $biddingDestLng
            );

            $distanceFromLoadingDestinationToBiddingOrigin = $this->haversineDistance(
                $loadingDestLat,
                $loadingDestLng,
                $biddingOriginLat,
                $biddingOriginLng
            );

            // Add the calculated distances to the result object
            $result->distance_from_loading_origin_to_bidding_destination = $distanceFromLoadingOriginToBiddingDestination;
            $result->distance_from_loading_destination_to_bidding_origin = $distanceFromLoadingDestinationToBiddingOrigin;
        }

        return $this->results; // Return the modified results
    }


    public static function haversineDistance($lat1, $lng1, $lat2, $lng2)
    {
        $earthRadius = 6371; // Earth's radius in kilometers

        // Convert degrees to radians
        $lat1 = deg2rad($lat1);
        $lng1 = deg2rad($lng1);
        $lat2 = deg2rad($lat2);
        $lng2 = deg2rad($lng2);

        // Differences in coordinates
        $dLat = $lat2 - $lat1;
        $dLng = $lng2 - $lng1;

        // Haversine formula
        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos($lat1) * cos($lat2) * sin($dLng / 2) * sin($dLng / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        // Distance in kilometers
        return $earthRadius * $c;
    }

    public function render()
    {
        $this->getDataStatus();
        return view('livewire.bidding.request-patient');
    }
}
