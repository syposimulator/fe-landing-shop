<?php

namespace App\Http\Livewire\Blog;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Blog;

class BlogEdit extends Component
{
    use WithFileUploads;
    public $blog;
    public $title,$desc,$keywords,$content,$status=true,$image=NULL;

    public function mount($blog){
        $this->blog = $blog;
        $this->title = $blog->title;
        $this->desc = $blog->desc;
        $this->keywords = $blog->keywords;
        $this->content = $blog->content;
        $this->status = $blog->status;
    }

    public function render()
    {
        return view('livewire.blog.blog-edit');
    }

    public function save(){
        $this->validate([
            'title' => 'required',
        ]);

        DB::beginTransaction();

        try {

            if($this->image != NULL){
                $image = $this->image->store('blog', 'public');
                !is_null($this->blog->image) &&Storage::disk('public')->delete($this->blog->image);
            }else{
                $image = $this->blog->image;
            }
            
            $this->blog->update([
                'title' => $this->title,
                'desc' => $this->desc,
                'keywords' => $this->keywords,
                'content' => $this->content,
                'image' => $image,
                'status' => $this->status,
            ]);

            $status = TRUE;
            $message = 'Blog updated.!';
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
