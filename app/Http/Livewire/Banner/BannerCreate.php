<?php

namespace App\Http\Livewire\Banner;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Controllers\Palintang;
use App\Models\Banner;

class BannerCreate extends Component
{
    use WithFileUploads;
    public $title,$content,$image,$status=true;

    public function render()
    {
        return view('livewire.banner.banner-create');
    }

    public function save(){
        $this->validate([
            'title' => 'required',
        ],[
            'title.required' => 'wajib di isi', 
        ]);

        DB::beginTransaction();

        try {

            if($this->image != NULL){
                $image = $this->image->store('page', 'public');
            }else{
                $image = NULL;
            }
            
            $save = Banner::create([
                'title' => $this->title,
                'content' => $this->content,
                'image' => $image,
                'status' => $this->status,
                'hash' => Palintang::makeHash($this->title.'-'.time(),5),
            ]);

            $status = TRUE;
            $message = 'Page created.!';
            
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            $status = false;
            $message = $e->getMessage();
        }

        if($status){
            return redirect(route('banner.edit',$save->hash))->with('success',$message);
        }else{
            $this->emit('alert',['status'=>'error','message'=>$message]);
        }
    }
}
