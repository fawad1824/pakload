<?php

namespace App\Livewire\Bidding;

use App\Models\BiddingLoad;
use App\Models\Insurance;
use App\Models\Loading;
use App\Models\LoadingRatting;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;


class Request extends Component
{
    use WithFileUploads; // To handle file uploads

    public $results;
    public $model = '';
    public $status;
    public $images = [];
    public $editID;
    public $star;
    public $modelRatting = '';
    public $modelPayment = '';
    public $modelInsurance = '';
    public $statusEi = "pending";
    public $comment;
    public $commentInsurance;  // Define the comment property


    public function closeModel()
    {
        $this->getDataStatus();
        $this->model = false;
    }

    public function bookingApprovedImage()
    {

        $this->validate([
            'commentInsurance' => 'required',
            'images' => 'required|array|min:1|max:5',  // Ensure at least 1 and at most 5 images are uploaded
            'images.*' => 'image|max:2048', // Each image must be a valid image file, with a max size of 2MB
        ]);

        // Store images in the 'images' directory
        $imagePaths = [];
        foreach ($this->images as $image) {
            $imagePaths[] = $image->storePublicly('drivingL', 'public');
        }

        $biddingLoad = BiddingLoad::where('id', $this->editID)->first();
        foreach ($imagePaths as $imagePath) {
            $insura = new Insurance();
            $insura->load_id = $biddingLoad->id;
            $insura->truck_id = $biddingLoad->truck_id;
            $insura->maui_id = Auth::id();
            $insura->name = $this->commentInsurance;
            $insura->image = $imagePath;
            $insura->status = 'pending';
            $insura->date = date('Y-m-d H:i:s');
            $insura->save();
        }


        session()->flash('success', 'Insurance Claim successfully.');

        // Reset the form fields
        $this->reset();
    }

    public function closeModelRatting()
    {
        $this->getDataStatus();
        $this->modelRatting = false;
    }
    public function bookingApproved()
    {
        $this->validate([
            'comment' => 'required',
            'star' => 'required',
        ]);

        $biddingLoad = BiddingLoad::where('id', '=', $this->editID)->first();

        LoadingRatting::insert([
            'truck_id' => $biddingLoad->truck_id,
            'load_id' => $biddingLoad->load_id,
            'user_id' => $biddingLoad->mani_id,
            'comment' => $this->comment,
            'star' => $this->star,
        ]);
        $this->modelRatting = false;
        $this->reset();
        $this->getDataStatus();

        session()->flash('success', 'Rating Added Successfully');
    }

    public function InsuranceModel($id)
    {
        $this->getDataStatus();
        $this->modelInsurance = true;
        $this->editID = $id;
    }

    public function closeModelInsurance()
    {
        $this->modelInsurance = false;
    }

    public function bookingModel($id)
    {
        $this->getDataStatus();
        $this->modelRatting = true;
        $this->editID = $id;
        $d = LoadingRatting::where('load_id', '=', $id)->first();
        // dd($d);
        if ($d) {
            $this->comment = $d->comment;
            $this->star = $d->star;
        }
    }

    public function PaymentModel($id)
    {
        $d = new Payment();
        $Bidding = BiddingLoad::where('id', '=', $id)->first();
        $Bidding->payment_status = "completed";
        $Bidding->save();
        $d->user_id = Auth::user()->id;
        $d->load_id = $id;
        $d->amount =  $Bidding->amount;
        $d->payment_type = "Completed";
        $d->payment_status = "Completed";
        $d->payment_date = date('Y-m-d H:i:s');
        $d->save();
        session()->flash('success', 'Payment Completed Successfully');
        $this->getDataStatus();
        $this->reset();
    }

    public function booking($id)
    {
        $this->getDataStatus();
        $this->model = true;
        $this->editID = $id;
        $d = BiddingLoad::where('id', '=', $this->editID)->first();
        if ($d) {
            $this->status = $d->status;
        }
    }
    public function StatusChangeData($status)
    {
        $this->statusEi = $status;
        $this->getDataStatus();
    }

    public function StatusChanges()
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

        session()->flash('success', 'Bidding added Successfully');
    }

    public function getDataStatus()
    {
        $this->results = Loading::with('users')
            ->leftJoin('bidding_loads', 'loadings.id', '=', 'bidding_loads.load_id')
            ->where('bidding_loads.status', $this->statusEi)
            ->where('bidding_loads.mani_id', Auth::user()->id)
            ->select(
                '*',
                'loadings.origin_lng',
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
        return view('livewire.bidding.request');
    }
}
