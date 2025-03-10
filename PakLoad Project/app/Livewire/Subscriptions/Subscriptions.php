<?php

namespace App\Livewire\Subscriptions;

use App\Models\Subscriptions as ModelsSubscriptions;
use Livewire\Component;

class Subscriptions extends Component
{
    public $name;
    public $description;
    public $price;
    public $citys;
    public $is_edit = '';
    public $title = '';

    public $model = '';
    public function AddCity()
    {
        $this->model = true;
        $this->title = 'Add Subscriptions';
    }
    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'price' => 'required|string|max:255',
    ];

    public function deleteCity($cityId)
    {
        // dd($cityId);
        ModelsSubscriptions::where('id', $cityId)->delete();
        session()->flash('message', 'Data has been deleted successfully.');
    }


    public function storeCity()
    {
        $this->validate();

        // Perform your database operation here
        if ($this->is_edit) {
            $this->model = false;
            ModelsSubscriptions::where('id', $this->is_edit)->update([
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price
            ]);
            $this->is_edit = false;
            $this->name = '';
            $this->description = '';
            $this->price = '';
            session()->flash('message', 'Data has been updated successfully.');
        } else {
            ModelsSubscriptions::create([
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price
            ]);
            $this->is_edit = false;
            $this->model = false;
            $this->name = '';
            $this->description = '';
            $this->price = '';
            session()->flash('message', 'Data has been created successfully.');
        }
    }

    public function EditCity($id)
    {
        $this->model = true;
        $this->title = 'Edit Subscriptions';
        $cityName = ModelsSubscriptions::where('id', $id)->first();
        $this->name = $cityName->name;
        $this->description = $cityName->description;
        $this->price = $cityName->price;
        $this->is_edit = $id;
    }

    public function render()
    {
        $this->citys = ModelsSubscriptions::orderBy('id', 'DESC')->get();
        return view('livewire.subscriptions.subscriptions');
    }
}
