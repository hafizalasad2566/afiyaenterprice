<x-admin-layout title="Dashboard">
    <x-slot name="subHeader">
        <x-admin.sub-header headerTitle="Dashboard">
            <x-admin.breadcrumbs>
                    <x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
            </x-admin.breadcrumbs>
            <x-slot name="toolbar">
            </x-slot>
        </x-admin.sub-header>
</x-slot>

<div class="kt-portlet">
    <div class="kt-portlet__body kt-portlet__body--fit">
        <div class="row row-no-padding row-col-separator-xl">
            <div class="col-md-6 col-lg-6 col-xl-6">
                <x-admin.dashboard-count-widget>
                    <x-admin.dashboard-count-widget-item title="Total Users" description="Total user available in this system
                    " :count="$count['userCount']" href="{{ route('users.index') }}"/>
                </x-admin.dashboard-count-widget>
            </div>
            {{-- <div class="col-md-6 col-lg-6 col-xl-6">
                <x-admin.dashboard-count-widget>
                    <x-admin.dashboard-count-widget-item title="title updated" description="updated description" count="100" />
                    <x-admin.dashboard-count-widget-item title="title updated" description="updated description" count="100" />
                </x-admin.dashboard-count-widget>
            </div> --}}
        </div>
    </div>
</div>

</x-admin-layout>