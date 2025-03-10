<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class UserList extends Component
{
    public $results;
    public $editID;
    public $model = false;
    public $status;
    public $statusEi = 'pending';

    public function StatusChangeModel($id)
    {
        $this->editID = $id;
        $this->model = true;
    }
    public function closeModel()
    {

        $this->editID = "";
        $this->model = false;
    }

    public function StatusChangesSave()
    {
        // dd($this->all());
        $this->validate([
            'status' => 'required',
        ]);

        User::where('id', $this->editID)->update(['status' => $this->status]);
        session()->flash('message', 'Users Status Change successful!');

        $this->model = false;
    }

    public function deleteCity($id)
    {
        User::where('id', $id)->delete();
        session()->flash('message', 'Users Deleted successful!');
    }

    public function StatusChangeData($status)
    {
        $this->statusEi = $status;
    }
    public function render()
    {
        $this->results = User::where('status', $this->statusEi)->where('role','!=','admin')->get();
        return view('livewire.admin.user-list');
    }
}
