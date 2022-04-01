<x-admin-layout title="Dashboard">
    <x-slot name="subHeader">
        <x-admin.sub-header headerTitle="Dashboard">
            {{-- <x-admin.breadcrumbs>
                    <x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
            </x-admin.breadcrumbs> --}}
            <x-slot name="toolbar">
            </x-slot>
        </x-admin.sub-header>
</x-slot>
<div class="kt-portlet">
    <div class="kt-portlet__body  kt-portlet__body--fit">
        <div class="row row-no-padding row-col-separator-xl">
            <div class="col-md-12 col-lg-6 col-xl-3">
                <div class="kt-widget24">
                    <div class="kt-widget24__details">
                        <div class="kt-widget24__info">
                            <h4 class="kt-widget24__title">
                                Total Users
                            </h4>
                            <span class="kt-widget24__desc">
                                Total user available in this system
                            </span>
                        </div>
                        <span class="kt-widget24__stats kt-font-brand">
                            {{$count['userCount']}}
                        </span>
                    </div>
                    <div class="progress progress--sm">
                        <div class="progress-bar kt-bg-brand" role="progressbar" style="width: {{$count['userCount']}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                        <div class="kt-widget24__action">
                        <a class="kt-widget24__change" href="{{ route('users.index') }}">
                            View
                        </a>
                    </div> 
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3">
                <div class="kt-widget24">
                    <div class="kt-widget24__details">
                        <div class="kt-widget24__info">
                            <h4 class="kt-widget24__title">
                                Total Blocked Users
                            </h4>
                            <span class="kt-widget24__desc">
                                Total blocked user available in this system
                            </span>
                        </div>
                        <span class="kt-widget24__stats kt-font-warning">
                            {{$count['blockedUserCount']}}
                        </span>
                    </div>
                    <div class="progress progress--sm">
                        <div class="progress-bar kt-bg-warning" role="progressbar" style="width: {{$count['blockedUserCount']}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="kt-widget24__action">
                        <a class="kt-widget24__change" href="{{ route('users.index') }}">
                            View
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3">
                <div class="kt-widget24">
                    <div class="kt-widget24__details">
                        <div class="kt-widget24__info">
                            <h4 class="kt-widget24__title">
                               Total Active Users
                            </h4>
                            <span class="kt-widget24__desc">
                                Total active user available in this system
                            </span>
                        </div>
                        <span class="kt-widget24__stats kt-font-danger">
                            {{$count['activeUserCount']}}
                        </span>
                    </div>
                    <div class="progress progress--sm">
                        <div class="progress-bar kt-bg-danger" role="progressbar" style="width: {{$count['activeUserCount']}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="kt-widget24__action">
                        <a class="kt-widget24__change" href="{{ route('users.index') }}">
                            View
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3">
                <div class="kt-widget24">
                    <div class="kt-widget24__details">
                        <div class="kt-widget24__info">
                            <h4 class="kt-widget24__title">
                                Total Plans
                            </h4>
                            <span class="kt-widget24__desc">
                                Total plan available in this system
                            </span>
                        </div>
                        <span class="kt-widget24__stats kt-font-success">
                            10
                        </span>
                    </div>
                    <div class="progress progress--sm">
                        <div class="progress-bar kt-bg-success" role="progressbar" style="width: 10%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="kt-widget24__action">
                        <a class="kt-widget24__change" href="#">
                            view
                        </span>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="kt-portlet kt-portlet--height-fluid ">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Analytics
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body kt-portlet__body--fluid kt-portlet__body--fit">
                <div class="kt-widget4 kt-widget4--sticky">
                    <div class="kt-widget4__items kt-portlet__space-x kt-margin-t-15">
                        <div class="kt-widget4__item">
                            <span class="kt-widget4__icon">
                                <i class="flaticon2-graphic  kt-font-brand"></i>
                            </span>
                            <a href="#" class="kt-widget4__title">
                                Invites Sent
                            </a>
                            <span class="kt-widget4__number kt-font-brand">30</span>
                        </div>
                        <div class="kt-widget4__item">
                            <span class="kt-widget4__icon">
                                <i class="flaticon2-analytics-2  kt-font-success"></i>
                            </span>
                            <a href="#" class="kt-widget4__title">
                                Invites Accepted
                            </a>
                            <span class="kt-widget4__number kt-font-success">25</span>
                        </div>
                        <div class="kt-widget4__item">
                            <span class="kt-widget4__icon">
                                <i class="flaticon2-drop  kt-font-danger"></i>
                            </span>
                            <a href="#" class="kt-widget4__title">
                                Invites Resulting In A Match
                            </a>
                            <span class="kt-widget4__number kt-font-danger">24</span>
                        </div>
                        <div class="kt-widget4__item">
                            <span class="kt-widget4__icon">
                                <i class="flaticon2-pie-chart-4 kt-font-warning"></i>
                            </span>
                            <a href="#" class="kt-widget4__title">
                                Feedback Received
                            </a>
                            <span class="kt-widget4__number kt-font-warning">35</span>
                        </div>
                        <div class="kt-widget4__item">
                            <span class="kt-widget4__icon">
                                <i class="flaticon2-analytics-2  kt-font-success"></i>
                            </span>
                            <a href="#" class="kt-widget4__title">
                                Feedback Approved
                            </a>
                            <span class="kt-widget4__number kt-font-success">20</span>
                        </div>
                    </div>
                        <div class="kt-widget4__chart kt-margin-t-15">
                        <!-- <canvas id="kt_chart_latest_updates" style="height: 150px;"></canvas> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="kt-portlet kt-portlet--height-fluid ">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Cohorts
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body kt-portlet__body--fluid kt-portlet__body--fit">
                <div class="kt-widget4 kt-widget4--sticky">
                    <div class="kt-widget4__items kt-portlet__space-x kt-margin-t-15">
                        <div class="kt-widget4__item">
                            <span class="kt-widget4__icon">
                                <i class="flaticon2-graphic  kt-font-brand"></i>
                            </span>
                            <a href="#" class="kt-widget4__title">
                                Invites Sent
                            </a>
                            <span class="kt-widget4__number kt-font-brand">30</span>
                        </div>
                        <div class="kt-widget4__item">
                            <span class="kt-widget4__icon">
                                <i class="flaticon2-analytics-2  kt-font-success"></i>
                            </span>
                            <a href="#" class="kt-widget4__title">
                                Invites Accepted
                            </a>
                            <span class="kt-widget4__number kt-font-success">25</span>
                        </div>
                        <div class="kt-widget4__item">
                            <span class="kt-widget4__icon">
                                <i class="flaticon2-drop  kt-font-danger"></i>
                            </span>
                            <a href="#" class="kt-widget4__title">
                                Invites Resulting In A Match
                            </a>
                            <span class="kt-widget4__number kt-font-danger">24</span>
                        </div>
                        <div class="kt-widget4__item">
                            <span class="kt-widget4__icon">
                                <i class="flaticon2-pie-chart-4 kt-font-warning"></i>
                            </span>
                            <a href="#" class="kt-widget4__title">
                                Feedback Received
                            </a>
                            <span class="kt-widget4__number kt-font-warning">35</span>
                        </div>
                        <div class="kt-widget4__item">
                            <span class="kt-widget4__icon">
                                <i class="flaticon2-analytics-2  kt-font-success"></i>
                            </span>
                            <a href="#" class="kt-widget4__title">
                                Feedback Approved
                            </a>
                            <span class="kt-widget4__number kt-font-success">20</span>
                        </div>
                    </div>
                        <div class="kt-widget4__chart kt-margin-t-15">
                        <!-- <canvas id="kt_chart_latest_updates" style="height: 150px;"></canvas> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-lg-6 col-xl-6">
        <div class="kt-portlet">
            <canvas id="myChart" style="width:100%;max-width:600px" width="703" height="351"></canvas>
        </div>
    </div>
    <div class="col-md-6 col-lg-6 col-xl-6">
        <div class="kt-portlet">
            <canvas id="myChart2" style="width:100%;max-width:600px" width="703" height="351"></canvas>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>


@push('scripts')
<script>
      var xValues = ['Event','Entertainment','Games','Outdoor'];
        var yValues = [1,3,2,3];
        var barColors = [
        "#b91d47",
        "#00aba9",
        "#2b5797",
        "#2b5707",
        ];

        new Chart("myChart", {
        type: "doughnut",
        data: {
            labels: xValues,
            datasets: [{
            backgroundColor: barColors,
            data: yValues
            }]
        },
        options: {
            title: {
            display: true,
            text: "Category Statistics"
            }
        }
        });
   
    var kValues = ["1 star", "2 star", "3 star", "4 star", "5 star"];
    var lValues = ["10", "12", "11", "14", "17"];
    var barColors = ["brown", "green","blue", "red", "purple"];

    new Chart("myChart2", {
    type: "bar",
    data: {
        labels: kValues,
        datasets: [{
        backgroundColor: barColors,
        data: lValues
        }]
    },
    options: {
        legend: {display: false},
        title: {
        display: true,
        text: "Feedback Statistics"
        }
    }
    });
</script>
@endpush

</x-admin-layout>