<?php

namespace App\Http\Livewire\Banner;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Controllers\Palintang;
use Livewire\WithPagination;
use App\Models\Banner;

class BannerAll extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $banner = Banner::orderBy('id','DESC')->paginate();
        return view('livewire.banner.banner-all',compact('banner'));
    }

    public function delete($id){
        $banner = Banner::where('id',$id)->first();
        if($banner){
            !is_null($banner->image) && Storage::disk('public')->delete($banner->image);
            $banner->delete();
        }
    }
    
}
