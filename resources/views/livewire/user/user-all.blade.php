<div>
    <div class="box box-primary">
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tr>
                    <th style="width: 10px">No</th>
                    <th>Title</th>
                    <th>Email</th>
                    <th style="width: 15px" class="text-center">Status</th>
                    <th style="width: 15%" class="text-center">Action</th>
                </tr>
                @foreach ($user as $k => $v)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$v->name}}</td>
                        <td>{{$v->email}}</td>
                        <td>
                            @if ($v->email_verified_at != NULL)
                                <span class="label label-success">Active</span>
                            @else
                                <span class="label label-danger">Inactive</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{route('user.edit',$v->id)}}" class="margin" >Edit</a>
                            <a href="javascript:void(0)" wire:loading.remove wire:target="delete({{$v->id}})" wire:click="delete({{$v->id}})" onclick="confirm('Remove {{$v->name}} ?') || event.stopImmediatePropagation()" class="text-danger margin">Delete</a>
                            <div wire:loading.inline wire:target="delete({{$v->id}})">
                                <span class="loader-1"></span>
                            </div>    
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="card-footer">
            {{ $user->onEachSide(1)->links() }}
        </div>
    </div>
</div>