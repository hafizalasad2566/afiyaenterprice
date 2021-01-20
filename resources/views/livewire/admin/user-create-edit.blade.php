<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">
                    <x-admin.form-group>
                        <x-admin.lable value="Name" />
                        <x-admin.input type="text" wire:model.defer="name" placeholder="Full Name"  class="{{ $errors->has('name') ? 'is-invalid' :'' }}" />
                        <x-admin.input-error for="name" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="Email" />
                        <x-admin.input type="text" wire:model.defer="email" placeholder="Email" autocomplete="off" class="{{ $errors->has('email') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="email" />
                    </x-admin.form-group>
                    @if(!$isEdit)
                    <x-admin.form-group>
                        <x-admin.lable value="Password" />
                        <x-admin.input type="password" wire:model.defer="password" placeholder="Password" autocomplete="off" class="{{ $errors->has('password') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="password" />
                    </x-admin.form-group>

                    <x-admin.form-group>
                        <x-admin.lable value="Confirm Password" />
                        <x-admin.input type="password" wire:model.defer="password_confirmation" placeholder="Reenter Password" autocomplete="off" class="{{ $errors->has('password_confirmation') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="password_confirmation" />
                    </x-admin.form-group>
                     @endif
            </div>
            <br>
    </x-slot>
    <x-slot name="actions">
        <x-admin.button type="submit" color="success" wire:loading.attr="disabled">Save</x-admin.button>
        <x-admin.link :href="route('users.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
</x-form-section>