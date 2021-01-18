<x-admin-layout title="User list">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Dashboard">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="List" />
				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:admin.user-create-edit :user="$user"/>
</x-admin-layout>