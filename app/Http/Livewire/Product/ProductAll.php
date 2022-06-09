<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use App\Models\Product;

class ProductAll extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $product = Product::orderBy('id','DESC')->paginate();
        return view('livewire.product.product-all',compact('product'));
    }

    public function delete($id){
        $product = Product::where('id',$id)->first();
        if($product){
            !is_null($product->image) && Storage::disk('public')->delete($product->image);
            $product->delete();
        }
    }
}
