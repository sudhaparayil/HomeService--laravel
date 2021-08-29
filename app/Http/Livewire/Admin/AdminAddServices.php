<?php

namespace App\Http\Livewire\Admin;

use App\Models\ServiceCategory;
use App\Models\Service;
use Livewire\Component;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminAddServices extends Component
{
    protected $paginationTheme = 'bootstrap';
    use WithFileUploads;
    public $name;
    public $slug;
    public $tagline;
    public $service_category_id;
    public $price;
    public $description;
    public $discount;
    public $discount_type;
    public $image;
    public $thumbnail;
    public $inclusion;
    public $exclusion;

    public function generateSlug(){
        $this->slug = Str::slug($this->name,'-');
    }


    public function updated($fields)
    {
        $this->validateOnly($fields,[

            'name'=>'required',
            'slug'=>'required',
            'tagline'=>'required',
            'service_category_id'=>'required',
            'price'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:jpeg,png',
            'thumbnail'=>'required|mimes:jpeg,png',
            'inclusion'=>'required',
            'exclusion'=>'required'
        ]);
    }

  public function createNewService(){

    $this->validate([

        'name'=>'required',
        'slug'=>'required',
        'tagline'=>'required',
        'service_category_id'=>'required',
        'price'=>'required',
        'description'=>'required',
        'image'=>'required|mimes:jpeg,png',
        'thumbnail'=>'required|mimes:jpeg,png',
        'inclusion'=>'required',
        'exclusion'=>'required'
    ]);

    $service = new Service();
    $service->name = $this->name;
    $service->slug = $this->slug;
    $service->tagline = $this->tagline;
    $service->service_category_id = $this->service_category_id;
    $service->price = $this->price;
    $service->discount = $this->discount;
    $service->discount_type = $this->discount_type;
    $service->description = $this->description;
    $service->inclusion = str_replace("\n",'|',trim($this->inclusion));
    $service->exclusion =  str_replace("\n",'|',trim($this->exclusion));

    $thumbName = Carbon::now()->timestamp.'.'.$this->thumbnail->extension();
    $this->thumbnail->storeAs('services/thumbnails',$thumbName);
    $service->thumbnail = $thumbName;

    $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
    $this->image->storeAs('services',$imageName);
    $service->image = $imageName;

    $service->save();

    session()->flash('message','Service  add successfully');
    return redirect()->to('/admin/all-services');
    }

    public function render()
    {
        $categories = ServiceCategory::all();
        return view('livewire.admin.admin-add-services',compact('categories'))->layout('layouts.base');
    }
}
