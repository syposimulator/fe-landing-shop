<?php

namespace App\Http\Livewire\Page;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Page;

class PageEdit extends Component
{
    use WithFileUploads;
    public $page;
    public $title,$desc,$keywords,$content,$status=true,$image=NULL;

    public function mount($page){
        $this->page = $page;
        $this->title = $page->title;
        $this->desc = $page->desc;
        $this->keywords = $page->keywords;
        $this->content = $page->content;
        $this->status = $page->status;
    }

    public function render()
    {
        return view('livewire.page.page-edit');
    }

    public function save(){
        $this->validate([
            'title' => 'required',
        ]);

        DB::beginTransaction();

        try {

            if($this->image != NULL){
                $image = $this->image->store('page', 'public');
                !is_null($this->page->image) && Storage::disk('public')->delete($this->page->image);
            }else{
                $image = $this->page->image;
            }
            
            $this->page->update([
                'title' => $this->title,
                'desc' => $this->desc,
                'keywords' => $this->keywords,
                'content' => $this->content,
                'image' => $image,
                'status' => $this->status,
            ]);

            $status = TRUE;
            $message = 'Page updated.!';
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
