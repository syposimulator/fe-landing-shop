<div>
    <div class="box box-primary">
        <form role="form" wire:submit.prevent="save">
            <div class="box-body">
                <div class="form-group @error('name') has-error @enderror">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" wire:model="name" placeholder="name">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="desc" wire:model.defer="desc" rows="3" placeholder="desc"></textarea>
                </div>
                <div class="form-group" wire:ignore>
                    <textarea id="content">
                    </textarea>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group @error('harga_asli') has-error @enderror">
                            <label for="harga_asli">Harga Asli</label>
                            <input type="number" class="form-control" id="harga_asli" wire:model.defer="harga_asli" placeholder="harga_asli">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group @error('harga_diskon') has-error @enderror">
                            <label for="harga_diskon">Harga Diskon</label>
                            <input type="number" class="form-control" id="harga_diskon" wire:model.defer="harga_diskon" placeholder="harga_diskon">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="keywords" wire:model.defer="keywords" rows="3" placeholder="keywords"></textarea>
                </div>
                <div class="row">
                    @for($i = 1; $i < 5; $i++)
                    <div class="col-6 col-md-4 col-lg-3 mb-4">
                        <div class="card" wire:ignore>
                            @if(array_key_exists($i-1,$media))
                            <img src="{{asset('storage/'.$media[$i-1])}}" id="media_preview_{{$i}}" class="card-img-top img-rounded img-thumbnail" alt="">
                            @else
                            <img src="https://via.placeholder.com/854x500" id="media_preview_{{$i}}" class="card-img-top img-rounded img-thumbnail" alt="">
                            @endif
                            <div class="card-body p-2">
                                <a href="javascript:void(0)" onclick="media_{{$i}}()" class="card-link text-info">Product {{$i}}</a>
                                <a href="javascript:void(0)" wire:loading.remove wire:target="deleteMedia({{$i-1}})" wire:click="deleteMedia({{$i-1}})" onclick="confirm('Remove this photo?') || event.stopImmediatePropagation()" class="card-link text-danger pull-right">Delete</a>
                                <div wire:loading.inline wire:target="deleteMedia({{$i-1}})">
                                    <a href="javascript:void(0)" class="card-link text-muted float-end">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="file" name="media_{{$i}}" wire:model="media_{{$i}}" id='media_{{$i}}' style="display: none" onchange="document.getElementById('media_preview_{{$i}}').src = window.URL.createObjectURL(this.files[0])">
                    @endfor
                </div>
                <div class="table-responsive">
                    <h4>Link Checkout</h4>
                    <table class="table table-hover">
                        <tr>
                            <th>Nama</th>
                            <th style="width: 10%" class="text-center">Action</th>
                        </tr>
                        @if($link_checkout)
                            @foreach($link_checkout as $k => $v)
                            <tr>
                                <td>
                                    <a href="{{$v['link']}}" target="_blank">
                                    {{$v['name']}}
                                    </a>
                                </td>
                                <td class="text-end">
                                    <a href="javascript:void(0)" wire:loading.remove wire:target="deleteLink({{$k}})" wire:click="deleteLink({{$k}})" onclick="confirm('Remove {{$v['name']}}?') || event.stopImmediatePropagation()" class="text-danger">Delete</a>
                                    <div wire:loading.inline wire:target="deleteLink({{$k}})">
                                        <div class="spinner-border spinner-border-sm text-danger" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group @error('link_checkout_name') has-error @enderror">
                            <label for="link_checkout_name">Nama</label>
                            <input type="text" class="form-control" id="link_checkout_name" wire:model.defer="link_checkout_name" placeholder="Nama Marketplace">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group @error('link_checkout_link') has-error @enderror">
                            <label for="link_checkout_link">Link</label>
                            <input type="text" class="form-control" id="link_checkout_link" wire:model.defer="link_checkout_link" placeholder="Link">
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
                <button wire:loading.remove wire:target="save,media_1,media_2,media_3,media_4" type="submit" class="btn btn-primary pull-right">Save</button>
                <div wire:loading.inline wire:target="save,media_1,media_2,media_3,media_4">
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
                editor.on('init', function () {
                    editor.setContent(@this.content);
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
                            name: 'Embed Social ',
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
        });
        function media_1(){
            document.getElementById('media_1').click();
        }
        function media_2(){
            document.getElementById('media_2').click();
        }
        function media_3(){
            document.getElementById('media_3').click();
        }
        function media_4(){
            document.getElementById('media_4').click();
        }
        </script>
    @endpush
</div>
