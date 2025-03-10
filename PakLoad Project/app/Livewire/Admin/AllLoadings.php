<?php

namespace App\Livewire\Admin;

use App\Models\City;
use App\Models\Loading;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AllLoadings extends Component
{
    public $title = 'Add Load';
    public $heading = 'Posted Load';
    public $model = '';
    public $is_edit = '';
    public $loadings = '';
    public $city = '';


    public function AddCity()
    {
        $this->model = true;
        $this->title = 'Add';
    }

    public function EditCity($id)
    {
        $this->model = true;
        $this->title = 'Edit';
        $this->is_edit = $id;
    }


    public function deleteCity($cityId)
    {
        Loading::where('id', $cityId)->delete();
    }

    public function render()
    {
        $this->loadings = Loading::orderBy('id', 'DESC')->get();
        $this->city = City::all();
        return view('livewire.admin.all-loadings');
    }
}
