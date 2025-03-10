<?php

namespace App\Livewire\Admin;

use App\Models\City as ModelsCity;
use Livewire\Component;

class City extends Component
{
    public $cityName;
    public $citys;
    public $is_edit = '';
    public $title = '';

    public $model = '';
    public function AddCity()
    {
        $this->model = true;
        $this->title = 'Add';
    }
    protected $rules = [
        'cityName' => 'required|string|max:255'
    ];

    public function deleteCity($cityId)
    {
        // dd($cityId);
        ModelsCity::where('id', $cityId)->delete();
       session()->flash('message', 'Data has been deleted successfully.');

    }


    public function storeCity()
    {
        $this->validate();

        // Perform your database operation here
        if ($this->is_edit) {
            $this->model = false;
            ModelsCity::where('id', $this->is_edit)->update(['name' => $this->cityName]);
            $this->is_edit = false;
            $this->cityName = '';
            session()->flash('message', 'Data has been updated successfully.');

        } else {
            ModelsCity::create(['name' => $this->cityName]);
            $this->model = false;
            $this->cityName = '';
            session()->flash('message', 'Data has been created successfully.');

        }
    }

    public function EditCity($id)
    {
        $this->model = true;
        $this->title = 'Edit';
        $cityName = ModelsCity::where('id', $id)->first();
        $this->cityName = $cityName->name;
        $this->is_edit = $id;
    }

    public function render()
    {
        $this->citys = ModelsCity::orderBy('id', 'DESC')->get();
        return view('livewire.admin.city');
    }
}
