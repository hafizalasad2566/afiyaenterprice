<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">
                    <x-admin.form-group>
                        <x-admin.lable value="Amount" required />
                        <x-admin.input type="text" wire:model.defer="amount" placeholder="Amount" autocomplete="off" class="{{ $errors->has('amount') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="amount" />
                    </x-admin.form-group>

                    <x-admin.form-group>
                        <x-admin.lable value="Debit Or Credit" required />
                        <x-admin.dropdown  wire:model.defer="debit_or_credit" placeHolderText="Please select one" autocomplete="off" class="{{ $errors->has('debit_or_credit') ? 'is-invalid' :'' }}">
                                @foreach ($debitCreditList as $debitCredit)
                                    <x-admin.dropdown-item  :value="$debitCredit['value']" :text="$debitCredit['text']"/>                          
                                @endforeach
                        </x-admin.dropdown>
                        <x-admin.input-error for="debit_or_credit" />
                    </x-admin.form-group>
                    
                    {{-- <x-admin.form-group class="col-lg-12" wire:ignore>
                    <x-admin.lable value="Address" />
                    <textarea
                    x-data x-init="editor = CKEDITOR.replace('address');
                    editor.on('change', function(event){
                        @this.set('address', event.editor.getData());
                    })" wire:model.defer="address" id="address" class="form-control {{ $errors->has('address') ? 'is-invalid' :'' }}"></textarea>
                    </x-admin.form-group> --}}

                    </div>
                    <br/>
    </x-slot>
    <x-slot name="actions">
        <x-admin.button type="submit" color="success" wire:loading.attr="disabled">Save</x-admin.button>
        <x-admin.link :href="route('users.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
</x-form-section>
