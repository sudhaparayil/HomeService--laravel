<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ServiceCategory;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminEditServiceCategory extends Component
{
   
    use WithFileUploads;
    public $category_id;
    public $name;
    public $slug;
    public $image;
    public $newimage;
    

    public function mount($category_id)
    {
        $category = ServiceCategory::find($category_id);
        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->image = $category->image;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required',      
        ]);
        if ($this->newimage) {
            $this->validateOnly($fields,[
                'newimage' => 'required|mimes:jpeg,png'   
            ]);
        }
    }

    public function updateServicecategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        if ($this->newimage) {
            $this->validate([
                'newimage' => 'required|mimes:jpeg,png'
            ]);
        }

        $category = ServiceCategory::find($this->category_id);
        
         $category->name = $this->name ;
         $category->slug = $this->slug ;
         if($this->newimage)
         {
            $imageName = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('categories',$imageName);
            $category->image = $imageName;
    
         }
         $category->save();

         session()->flash('message','Service Category has been updated successfully');

    }


    
    public function render()
    {
        return view('livewire.admin.admin-edit-service-category')->layout('layouts.base');
    }
}
