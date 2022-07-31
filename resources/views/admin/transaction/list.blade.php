<x-admin-layout title="Transaction Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Transaction List">
				<x-admin.breadcrumbs>
					<x-admin.breadcrumbs-item href="{{ route('transactions.index') }}" value="Transaction List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					{{-- <a href="{{route('transactions.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						Add New Transaction
					</a> --}}
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:admin.transaction.transaction-list :user_id="$user_id"/>
</x-admin-layout>