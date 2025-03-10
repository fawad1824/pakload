<?php

namespace App\Livewire\Tracking;

use App\Models\BiddingLoad;
use App\Models\Loading;
use App\Models\User;
use Livewire\Component;

class TrackLoad extends Component
{
    public $trackID;
    public $truckUser;
    public function TrackLoad()
    {
        $trac = BiddingLoad::where('trackingnumber', $this->trackID)->first();
        $this->truckUser = User::where('id', $trac->truck_id)->first();

    }
    public function render()
    {
        return view('livewire.tracking.track-load');
    }
}
