<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">
                    <x-admin.form-group>
                        <x-admin.lable value="First Name" required />
                        <x-admin.input type="text" wire:model.defer="first_name" placeholder="First Name"  class="{{ $errors->has('first_name') ? 'is-invalid' :'' }}" />
                        <x-admin.input-error for="first_name" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="Last Name"  required />
                        <x-admin.input type="text" wire:model.defer="last_name" placeholder="Last Name"  class="{{ $errors->has('last_name') ? 'is-invalid' :'' }}" />
                        <x-admin.input-error for="last_name" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="Phone" required />
                        <x-admin.input type="text" wire:model.defer="phone" placeholder="Phone" autocomplete="off" class="{{ $errors->has('phone') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="phone" />
                    </x-admin.form-group>

                    {{-- <x-admin.form-group>
                        <x-admin.lable value="Status" />
                        <x-admin.dropdown  wire:model.defer="active" placeHolderText="Please select one" autocomplete="off" class="{{ $errors->has('active') ? 'is-invalid' :'' }}">
                                @foreach ($statusList as $status)
                                    <x-admin.dropdown-item  :value="$status['value']" :text="$status['text']"/>                          
                                @endforeach
                        </x-admin.dropdown>
                        <x-admin.input-error for="active" />
                    </x-admin.form-group> --}}

                    <x-admin.form-group class="col-lg-6" >
                    <x-admin.lable value="Profile Image" />
                    @if($model_image)
                    <img src="{{ $model_image->getUrl() }}" style="width: 100px; height:100px;" /><br/>
                    @endif
                    <x-admin.filepond wire:model="photo" class="{{ $errors->has('photo') ? 'is-invalid' :'' }}"
                    allowImagePreview
                    imagePreviewMaxHeight="50"
                    allowFileTypeValidation
                    acceptedFileTypes="['image/png', 'image/jpg', 'image/jpeg']"
                    allowFileSizeValidation
                    maxFileSize="4mb"/>
                    <x-admin.input-error for="photo" />
                    </x-admin.form-group>

                    <x-admin.form-group class="col-lg-12" wire:ignore>
                    <x-admin.lable value="Address" />
                    <textarea
                    x-data x-init="editor = CKEDITOR.replace('address');
                    editor.on('change', function(event){
                        @this.set('address', event.editor.getData());
                    })" wire:model.defer="address" id="address" class="form-control {{ $errors->has('address') ? 'is-invalid' :'' }}"></textarea>
                    </x-admin.form-group>
                    
                    </div>
                    <br/>
    </x-slot>
    <x-slot name="actions">
        <x-admin.button type="submit" color="success" wire:loading.attr="disabled">Save</x-admin.button>
        <x-admin.link :href="route('users.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
</x-form-section>
