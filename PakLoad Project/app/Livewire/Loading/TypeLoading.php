<?php

namespace App\Livewire\Loading;

use App\Models\LoadinType;
use Livewire\Component;

class TypeLoading extends Component
{
    public $name;
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
        'name' => 'required|string|max:255'
    ];


    public function storeCity()
    {
        $this->validate();

        // Perform your database operation here
        if ($this->is_edit) {
            $this->model = false;
            LoadinType::where('id', $this->is_edit)->update(['name' => $this->name]);
            $this->is_edit = false;
            $this->name = '';
            session()->flash('message', 'Data has been updated successfully.');

        } else {
            LoadinType::create(['name' => $this->name]);
            $this->model = false;
            $this->name = '';
            session()->flash('message', 'Data has been created successfully.');

        }
    }

    public function EditCity($id)
    {
        $this->model = true;
        $this->title = 'Edit';
        $name = LoadinType::where('id', $id)->first();
        $this->name = $name->name;
        $this->is_edit = $id;
    }

    public function deleteCity($cityId)
    {
        LoadinType::where('id', $cityId)->delete();
    }

    public function render()
    {
        $this->citys = LoadinType::orderBy('id', 'DESC')->get();

        return view('livewire.loading.type-loading');
    }
}
