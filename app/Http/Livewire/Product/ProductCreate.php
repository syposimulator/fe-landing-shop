<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Http\Controllers\Palintang;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductCreate extends Component
{
    use WithFileUploads;

    public $product,$productHash;
    public $name,$desc,$content,$keywords,$harga_asli,$harga_diskon,$link_checkout=[],$media=[],$hash,$status=true;
    public $link_checkout_name,$link_checkout_link;
    public $media_1,$media_2,$media_3,$media_4;

    protected $queryString = ['productHash'];

    public function mount(){
        if($this->productHash){
            $product = Product::whereRaw("BINARY `hash`= ?",$this->productHash)->first();
            $this->name = $product->name;
            $this->desc = $product->desc;
            $this->content = $product->content;
            $this->keywords = $product->keywords;
            $this->harga_asli = $product->harga_asli;
            $this->harga_diskon = $product->harga_diskon;
            $this->link_checkout = $product->link_checkout;
            $this->status = $product->status;
            $this->media = $product->media;
            $this->product = $product;
        }
    }

    public function render()
    {
        return view('livewire.product.product-create');
    }

    public function updated(){
        if($this->productHash == NULL){
            $this->save();
        }

        if($this->media_1){
            $this->media[0] = $this->media_1->store('product', 'public');
            $this->save();
        }
        
        if($this->media_2){
            $this->media[1] = $this->media_2->store('product', 'public');
            $this->save();
        }
        if($this->media_3){
            $this->media[2] = $this->media_3->store('product', 'public');
            $this->save();
        }
        if($this->media_4){
            $this->media[3] = $this->media_4->store('product', 'public');
            $this->save();
        }
    }

    public function save(){

        $this->validate([
            'name' => 'required',
        ],[
            'name.required' => 'Nama wajib di isi',
        ]);

        $product = Product::whereRaw("BINARY `hash`= ?",($this->productHash == '' ? '0':$this->productHash))->first();

        $this->product = $product;

        if($product != NULL){
            if($this->link_checkout_name && $this->link_checkout_link){
                $this->link_checkout[] = (['name'=>$this->link_checkout_name,'link'=>$this->link_checkout_link]);
                $this->link_checkout_name = '';
                $this->link_checkout_link = '';
            }

            DB::beginTransaction();

            try {
                $product->update([
                    'name' => $this->name,
                    'desc' => $this->desc,
                    'content' => $this->content,
                    'keywords' => $this->keywords,
                    'harga_asli' => ($this->harga_asli == null? 0:$this->harga_asli),
                    'harga_diskon' => ($this->harga_diskon == null? 0:$this->harga_diskon),
                    'media' => $this->media,
                    'link_checkout' => $this->link_checkout,
                    'status' => $this->status,
                ]);

                $status = TRUE;
                $message = 'Product updated.!';
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                $status = false;
                $message = $e->getMessage();
            }
        }else{
            if($this->link_checkout_name && $this->link_checkout_link){
                $this->link_checkout[] = (['name'=>$this->link_checkout_name,'link'=>$this->link_checkout_link]);
                $this->link_checkout_name = '';
                $this->link_checkout_link = '';
            }

            DB::beginTransaction();
            try {
                $product = Product::create([
                    'name' => $this->name,
                    'desc' => $this->desc,
                    'content' => $this->content,
                    'keywords' => $this->keywords,
                    'harga_asli' => ($this->harga_asli == null? 0:$this->harga_asli),
                    'harga_diskon' => ($this->harga_diskon == null? 0:$this->harga_diskon),
                    'link_checkout' => $this->link_checkout,
                    'status' => $this->status,
                    'hash' =>Palintang::makeHash($this->name.'-'.time(),5),
                ]);
                $this->productHash = $product->hash;
                $status = TRUE;
                $msg = 'Product created.!';
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                $status = false;
                $message = $e->getMessage();
            }
        }

        $this->media_1 = '';
        $this->media_2 = '';
        $this->media_3 = '';
        $this->media_4 = '';
    }

    public function deleteMedia($key){
            Storage::disk('public')->delete($this->media[$key]);
            $m = $this->media;
            unset($this->media[$key]);
            $this->product->update(['media'=>$this->media]);
            return redirect(route('product.create',['productHash'=>$this->product->hash]));
    }

    public function deleteLink($key){
        unset($this->link_checkout[$key]);
    }

}
