<div>
    <div class="box box-primary">
        <form role="form" wire:submit.prevent="save">
            <div class="box-body">
                <div class="form-group @error('title') has-error @enderror">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" wire:model.defer="title" placeholder="Title">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="desc" wire:model.defer="desc" rows="3" placeholder="Desc"></textarea>
                </div>
                <div class="form-group" wire:ignore>
                    <textarea id="content">
                    </textarea>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="keywords" wire:model.defer="keywords" rows="3" placeholder="keywords"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group @error('image') has-error @enderror">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" wire:model="image" placeholder="image">
                        </div>
                    </div>
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
            
            tinymce.init({
            selector: '#content',
            height : 500,
            menubar: false,
            content_css : '/css/tinymce.css',
            relative_urls: false,
            remove_script_host: false,
            plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount pagebreak code'
            ],
            toolbar_mode: 'Sliding',
            toolbar: 'undo redo | formatselect | ' +
            'bold italic | alignleft aligncenter alignright alignjustify | table tabledelete | ' +
            'outdent indent bullist numlist | link pagebreak | fullscreen  preview save print | addImage readMore embedSosmed code',
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
                editor.on('blur', function (e) {
                    @this.set('content', editor.getContent());
                });
                editor.ui.registry.addButton('addImage', {
                    icon: 'image',
                    tooltip: 'Add image',
                    disabled: false,
                    onAction: function () {
                        alert('this feature under building');
                    },
                });
                editor.ui.registry.addButton('embedSosmed', {
                    icon: 'language',
                    tooltip: 'Embed',
                    disabled: false,
                    onAction: function () {
                        tinymce.activeEditor.windowManager.open({
                            title: 'Embed Social ',
                            size:'medium',
                            body: {
                                type: 'panel',
                                items: [
                                {
                                    type: 'textarea',
                                    name: 'embedSosmed',
                                    label: 'Custom data',
                                    flex: true,
                                }
                                ]
                            },
                            buttons: [{
                                type: 'submit',
                                text: 'OK'
                            }
                            ],
                            onSubmit: function (api) {
                                var data = api.getData();
                                editor.insertContent(data.embedSosmed);
                                api.close();
                              }
                        });
                    },
                });
            },
            content_style: 'body { font-family:Roboto,sans-serif; font-size:14px }'
        });
        </script>
    @endpush
</div>
