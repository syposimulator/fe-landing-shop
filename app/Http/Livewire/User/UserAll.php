<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use App\Models\User;

class UserAll extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $user = User::orderBy('id','DESC')->paginate();
        return view('livewire.user.user-all',compact('user'));
    }

    public function delete($id){
        $user = User::where('id',$id)->first();
        if($user){
            !is_null($user->image) && Storage::disk('public')->delete($user->image);
            $user->delete();
        }
    }
}
