<div>
    <div class="box box-primary">
        <form role="form" wire:submit.prevent="save">
            <div class="box-body">
                <div class="form-group @error('title') has-error @enderror">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" wire:model.defer="title" placeholder="Title">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="content" wire:model.defer="content" rows="3" placeholder="content"></textarea>
                </div>
                <div class="form-group @error('image') has-error @enderror">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" wire:model="image" placeholder="image">
                </div>
                <div class="form-group" wire:ignore>
                    <label>
                        <input type="radio" name="r3" value="1" class="flat-red" wire:model="status">
                        Active
                    </label>
                    <label>
                        <input type="radio" name="r3" value="0" class="flat-red" wire:model="status">
                        Inactive
                    </label>
                </div>
                
            </div>
            <div class="box-footer">
                <button wire:loading.remove wire:target="save,image" type="submit" class="btn btn-primary pull-right">Save</button>
                <div wire:loading.inline wire:target="save,image">
                    <button type="button" class="btn btn-primary pull-right" disabled>Loading...</button>
                </div>
            </div>
        </form>
    </div>
    @push('scripts')
        <script type="text/javascript">
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass   : 'iradio_flat-green'
            });
        </script>
    @endpush
</div>
