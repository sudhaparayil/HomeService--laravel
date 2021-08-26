<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ServiceCategory;
use Livewire\withPagination;

class AdminServiceCategory extends Component
{
    use withPagination;

    public function deleteServiceCategory($id)
    {
        $category = ServiceCategory::find($id);
        if ($category->image) {
            unlink('images/categories'.'/'.$category->image);
        }
        $category->delete();
        session()->flash('message','Service Category Delete successfully');
    }

    public function render()
    {
        $categories = ServiceCategory::paginate(5);
        return view('livewire.admin.admin-service-category',compact('categories'))->layout('layouts.base');
    }
}
