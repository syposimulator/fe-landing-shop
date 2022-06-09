<?php

namespace App\Http\Livewire\Page;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use App\Models\Page;

class PageAll extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $pages = Page::orderBy('id','DESC')->paginate();
        return view('livewire.page.page-all',compact('pages'));
    }

    public function delete($id){
        $page = Page::where('id',$id)->first();
        if($page){
            !is_null($page->image) && Storage::disk('public')->delete($page->image);
            $page->delete();
        }
    }
}
