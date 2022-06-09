<?php

namespace App\Http\Livewire\Banner;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Banner;

class BannerEdit extends Component
{
    use WithFileUploads;
    public $banner;
    public $title,$content,$image,$status=true;

    public function mount($banner){
        $this->banner = $banner;
        $this->title = $banner->title;
        $this->content = $banner->content;
        $this->status = $banner->status;
    }
    public function render()
    {
        return view('livewire.banner.banner-edit');
    }

    public function save(){
        $this->validate([
            'title' => 'required',
        ]);

        DB::beginTransaction();

        try {

            if($this->image != NULL){
                $image = $this->image->store('banner', 'public');
                !is_null($this->banner->image) &&Storage::disk('public')->delete($this->banner->image);
            }else{
                $image = $this->banner->image;
            }
            
            $this->banner->update([
                'title' => $this->title,
                'content' => $this->content,
                'image' => $image,
                'status' => $this->status,
            ]);

            \Http::get($this->banner->shop->domain->name.'/api/clear-cache/banner')->json();

            $status = TRUE;
            $message = 'banner updated.!';
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            $status = false;
            $message = $e->getMessage();
        }

        if($status){
            $this->emit('alert',['status'=>'success','message'=>$message]);
        }else{
            $this->emit('alert',['status'=>'error','message'=>$message]);
        }

    }
}
