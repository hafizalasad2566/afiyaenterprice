<x-admin-layout title="Transaction Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $transaction ? 'Edit' : 'Add' }} transaction">
				<x-admin.breadcrumbs>
					<x-admin.breadcrumbs-item href="{{ route('users.index') }}" value="User List" />
					<x-admin.breadcrumbs-separator />
					<x-admin.breadcrumbs-item  value="{{ $transaction ? 'Edit' : 'Add' }} Transaction" />
				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:admin.transaction.transaction-create-edit :transaction="$transaction" :user_id="$user_id"/>
</x-admin-layout>