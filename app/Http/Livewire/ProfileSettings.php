<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileSettings extends Component
{
    public $name;
    public $email;
    public $date;
    public $phone;
    public $address;
    public $city;
    public $state;
    public $current_password;

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->date = auth()->user()->birthday;
        $this->phone = auth()->user()->contact_no;
        $this->address = auth()->user()->address;
        $this->city = auth()->user()->city;
        $this->state = auth()->user()->state;
    }

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'date' => 'required|date',
        'phone' => 'required|regex:/(09)[0-9]{9}/',
        'address' => 'required',
        'city' => 'required',
        'state' => 'required',
    ];

    public function updated($propertyName)
    {
        $user = User::findOrFail(auth()->user()->id);
        if($this->email == auth()->user()->email)
        {
            $this->validateOnly($propertyName, [
                'name' => 'required',
                'email' => 'required|email',
                'date' => 'required|date',
                'phone' => 'required|regex:/(09)[0-9]{9}/',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required'
            ]);
        }else{
            if (Hash::make($this->current_password) != auth()->user()->password) {
                $this->validateOnly($propertyName, [
                    'name' => 'required',
                    'email' => 'required|email',
                    'date' => 'required|date',
                    'phone' => 'required|regex:/(09)[0-9]{9}/',
                    'address' => 'required',
                    'city' => 'required',
                    'state' => 'required',
                    'current_password' => ['required', 'customPassCheckHashed:'.$user->password]
                ]);
            }
            $this->validateOnly($propertyName);
        }
    }

    public function save()
    {
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'contact_no' => $this->phone,
            'birthday' => $this->date,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
        ];
        $user = User::findOrFail(auth()->user()->id);

        if($this->email == auth()->user()->email){
            $this->validate([
                'name' => 'required',
                'email' => 'required|email',
                'date' => 'required|date',
                'phone' => 'required|regex:/(09)[0-9]{9}/',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
            ]);
        }else{
            $this->validate();
        }

        if(!empty($this->current_password)){
            $this->validate([
                'current_password' => ['required', 'customPassCheckHashed:'.$user->password],
            ]);

            // $data = array_merge($data, [
            //     'password' => Hash::make($this->password)
            // ]);
        }

        $user->update($data);

        $this->dispatchBrowserEvent('close-modal');
        $this->emit('refreshParent');
    }

    public function render()
    {
        return view('livewire.profile-settings');
    }
}
