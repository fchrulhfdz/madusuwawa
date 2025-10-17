<?php

namespace App\Livewire\Admin;

use App\Models\Location;
use Livewire\Component;
use Livewire\WithPagination;

class LocationManagement extends Component
{
    use WithPagination;

    public $name, $address, $phone, $email, $maps_url, $city, $opening_hours, $latitude, $longitude, $is_active = true;
    public $locationId;
    public $isModalOpen = false;
    public $search = '';

    protected $rules = [
        'name' => 'required|min:3',
        'address' => 'required',
        'phone' => 'nullable|string',
        'email' => 'nullable|email',
        'maps_url' => 'nullable|url',
        'latitude' => 'nullable|numeric',
        'longitude' => 'nullable|numeric',
        'city' => 'nullable|string',
        'opening_hours' => 'nullable|string',
        'is_active' => 'boolean'
    ];

    public function render()
    {
        $locations = Location::where('name', 'like', '%'.$this->search.'%')
            ->orWhere('city', 'like', '%'.$this->search.'%')
            ->latest()
            ->paginate(10);

        return view('livewire.admin.location-management', [
            'locations' => $locations
        ]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->isModalOpen = true;
    }

    public function store()
    {
        $this->validate();

        Location::create([
            'name' => $this->name,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
            'maps_url' => $this->maps_url,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'city' => $this->city,
            'opening_hours' => $this->opening_hours,
            'is_active' => $this->is_active,
        ]);

        session()->flash('message', 'Location created successfully.');
        $this->closeModal();
    }

    public function edit($id)
    {
        $location = Location::findOrFail($id);
        $this->locationId = $id;
        $this->name = $location->name;
        $this->address = $location->address;
        $this->phone = $location->phone;
        $this->email = $location->email;
        $this->maps_url = $location->maps_url;
        $this->latitude = $location->latitude;
        $this->longitude = $location->longitude;
        $this->city = $location->city;
        $this->opening_hours = $location->opening_hours;
        $this->is_active = $location->is_active;

        $this->isModalOpen = true;
    }

    public function update()
    {
        $this->validate();

        Location::find($this->locationId)->update([
            'name' => $this->name,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
            'maps_url' => $this->maps_url,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'city' => $this->city,
            'opening_hours' => $this->opening_hours,
            'is_active' => $this->is_active,
        ]);

        session()->flash('message', 'Location updated successfully.');
        $this->closeModal();
    }

    public function delete($id)
    {
        Location::find($id)->delete();
        session()->flash('message', 'Location deleted successfully.');
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->address = '';
        $this->phone = '';
        $this->email = '';
        $this->maps_url = '';
        $this->latitude = '';
        $this->longitude = '';
        $this->city = '';
        $this->opening_hours = '';
        $this->is_active = true;
        $this->locationId = null;
    }
}