<?php

namespace App\Http\Livewire\Page;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Controllers\Palintang;
use App\Models\Page;

class PageCreate extends Component
{
    use WithFileUploads;
    public $title,$desc,$keywords,$content,$status=true,$image=NULL,$hash;

    public function render()
    {
        return view('livewire.page.page-create');
    }

    public function save(){
        $this->validate([
            'title' => 'required',
        ]);

        DB::beginTransaction();

        try {

            if($this->image != NULL){
                $image = $this->image->store('page', 'public');
            }else{
                $image = NULL;
            }
            
            $save = Page::create([
                'title' => $this->title,
                'desc' => $this->desc,
                'keywords' => $this->keywords,
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
            return redirect(route('page.edit',$save->hash))->with('success',$message);
        }else{
            $this->emit('alert',['status'=>'error','message'=>$message]);
        }

    }

}
