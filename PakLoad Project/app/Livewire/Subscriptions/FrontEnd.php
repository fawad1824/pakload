<?php

namespace App\Livewire\Subscriptions;

use App\Models\Subscriptions;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FrontEnd extends Component
{
    public $subscriptions;
    public $selectPlan;
    public $plans;
    public $model = '';

    public function submitForm()
    {
        dd("Subscriptions");
        $this->plans = Subscriptions::where('id', '=', $a)->first();
        $this->model = true;
        dd($a);
    }
    public function StatusChangeData($a)
    {
        $this->selectPlan = Subscriptions::where('id', '=', $a)->first();
        $this->plans = Subscriptions::where('id', '=', $a)->first();
        $this->model = true;
        // dd($a);
    }
    public function selectPlan($plan) {}
    public function render()
    {
        $this->subscriptions = Subscriptions::all();
        return view('livewire.subscriptions.front-end');
    }
}
