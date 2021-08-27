<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ServiceCategory; 

class ServiceByCategoryComponent extends Component
{
    public $category_slug;

    public function mount($category_slug)
    {
        $this->category_slug = $category_slug;
    }


    public function render()
    {
        $scategory = ServiceCategory::where('slug',$this->category_slug)->first();
        //echo $scategory->services;
        //die;
      
        return view('livewire.service-by-category-component',['scategory'=>$scategory])->layout('layouts.base');
    }
}
