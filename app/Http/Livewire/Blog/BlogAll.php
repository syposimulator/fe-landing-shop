<?php

namespace App\Http\Livewire\Blog;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use App\Models\Blog;

class BlogAll extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $blog = Blog::orderBy('id','DESC')->paginate();
        return view('livewire.blog.blog-all',compact('blog'));
    }

    public function delete($id){
        $blog = Blog::where('id',$id)->first();
        if($blog){
            !is_null($blog->image) && Storage::disk('public')->delete($blog->image);
            $blog->delete();
        }
    }
}
