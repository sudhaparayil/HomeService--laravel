<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Service;
use Livewire\withPagination;

class AdminServices extends Component
{
    use withPagination;
    public function render()
    {
        $services = Service::orderBy('id','DESC')->paginate(5);
       // dd($services->category);
         // echo $services;
       // die;
        return view('livewire.admin.admin-services',compact('services'))->layout('layouts.base');
    }
}
