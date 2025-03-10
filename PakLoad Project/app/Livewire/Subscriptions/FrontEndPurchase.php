<?php

namespace App\Livewire\Subscriptions;

use Livewire\Component;

class FrontEndPurchase extends Component
{
    public $plans;
    public $model;



    public function storeCity()
    {
        $this->model = true;
        dd($this->model);
    }

    public function render()
    {
        return view('livewire.subscriptions.front-end-purchase');
    }
}
