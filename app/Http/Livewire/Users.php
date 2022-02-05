<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public $data, $email, $name, $id;
    public $updateMode = false;

    public function render()
    {
        $this->data = User::all();
        return view('livewire.users');
    }

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->email = '';
        $this->name = '';
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $validatedDate = $this->validate([
            'email' => 'required',
            'name' => 'required',
            'password' => 'required',
        ]);
  
        User::create($validatedDate);
  
        session()->flash('message', 'User Created Successfully.');
  
        $this->resetInputFields();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->id = $id;
        $this->name = $user->name;
        $this->country_id = $user->country_id;
  
        $this->updateMode = true;
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function update()
    {
        $this->validate([
            'name' => 'required',
            'country_id' => 'required',
        ]);
  
        $this->data = User::find($this->id);
        $this->data->update([
            'name' => $this->title,
            'country_id' => $this->body,
        ]);
  
        $this->updateMode = false;
  
        session()->flash('message', 'User Updated Successfully.');
        $this->resetInputFields();
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('message', 'User Deleted Successfully.');
    }
}
