<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->

<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name', 'Laravel') }} | {{$title}}</title>
    <meta name="description" content="Page with empty content">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <style>
        .is-invalid {
            border-color: #fd397a !important;
        }

        .logo_text_custom {
            text-decoration: none;
            color: #fff;
            font-size: 20px;
        }

        .label-required:after {
            content: "*";
            color: red;
        }
        .align-center{
            text-align: center;
        }
        @media only screen and (max-width: 1024px) {
            .kt-wrapper{
                margin-top: 0px!important;
            }
        }
    </style>
    <!--end::Fonts -->

    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="{{asset('admin_assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.min.rtl.css')}}" rel="stylesheet" type="text/css" />
    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->
    <link href="{{asset('admin_assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin_assets/vendors/general/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="{{asset('admin_assets/vendors/general/animate.css/animate.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin_assets/vendors/general/toastr/build/toastr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin_assets/vendors/general/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin_assets/vendors/general/socicon/css/socicon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin_assets/vendors/custom/vendors/line-awesome/css/line-awesome.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin_assets/vendors/custom/vendors/flaticon/flaticon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin_assets/vendors/custom/vendors/flaticon2/flaticon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin_assets/vendors/custom/vendors/fontawesome5/css/all.min.css')}}" rel="stylesheet" type="text/css" />
    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{asset('admin_assets/demo/default/base/style.bundle.min.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{asset('admin_assets/demo/default/skins/header/base/light.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin_assets/demo/default/skins/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin_assets/demo/default/skins/brand/dark.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin_assets/demo/default/skins/aside/dark.css')}}" rel="stylesheet" type="text/css" />
    <livewire:styles />
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    
    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="{{asset('admin_assets/media/logos/favicon.ico')}}" />

</head>

<!-- end::Head -->

<!-- begin::Body -->

<body class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

    <!-- begin:: Page -->
    <x-admin-mobile-header />
    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">


        <x-admin-left-bar />



            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper" style="margin-top: -20px;">


            <x-admin-header  :title="$title" />

                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

                   {{$subHeader}}

                    <!-- begin:: Content -->
                    <div class="kt-content  kt-grid__item kt-grid__item--fluid" style="margin-top:15px">
                    {{ $slot }}
                    </div>

                    <!-- end:: Content -->
                </div>

            <x-admin-footer/>
            
            </div>
        </div>
    </div>

    <!-- end:: Page -->
    <!-- begin::Scrolltop -->
    <div id="kt_scrolltop" class="kt-scrolltop">
        <i class="fa fa-arrow-up"></i>
    </div>

    <!-- end::Scrolltop -->

    <!--begin::Modal-->
    <div class="modal fade" id="delete_confirm_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    You will not be able to recover this record!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="deleteConfirm()" data-dismiss="modal">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <!--end::Modal-->
    <!-- end::Demo Panel -->

    <!-- begin::Global Config(global config for global JS sciprts) -->
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <livewire:scripts />
    <script>
        var KTAppOptions = {
            "colors": {
                "state": {
                    "brand": "#5d78ff",
                    "dark": "#282a3c",
                    "light": "#ffffff",
                    "primary": "#5867dd",
                    "success": "#34bfa3",
                    "info": "#36a3f7",
                    "warning": "#ffb822",
                    "danger": "#fd3995"
                },
                "base": {
                    "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                    "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
                }
            }
        };
    </script>

    <!-- end::Global Config -->

    <!--begin:: Global Mandatory Vendors -->
    <script src="{{asset('admin_assets/vendors/general/jquery/dist/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin_assets/vendors/general/popper.js/dist/umd/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin_assets/vendors/general/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin_assets/vendors/general/js-cookie/src/js.cookie.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin_assets/vendors/general/moment/min/moment.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin_assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin_assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin_assets/vendors/general/sticky-js/dist/sticky.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin_assets/vendors/general/wnumb/wNumb.js')}}" type="text/javascript"></script>

    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->
    <script src="{{asset('admin_assets/vendors/general/owl.carousel/dist/owl.carousel.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin_assets/vendors/general/toastr/build/toastr.min.js')}}" type="text/javascript"></script>

    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Bundle(used by all pages) -->
    <script src="{{asset('admin_assets/demo/default/base/scripts.bundle.min.js')}}" type="text/javascript"></script>

    <!--end::Global Theme Bundle -->

    <!--begin::Page Vendors(used by this page) -->
    <!-- <script src="{{asset('admin_assets/vendors/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript"></script>
    <script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
    <script src="{{asset('admin_assets/vendors/custom/gmaps/gmaps.js')}}" type="text/javascript"></script> -->

    <!--end::Page Vendors -->

    <!--begin::Page Scripts(used by this page) -->
    <script src="{{asset('admin_assets/app/custom/general/dashboard.min.js')}}" type="text/javascript"></script>

    <!--end::Page Scripts -->

    <!--begin::Global App Bundle(used by all pages) -->
    <script src="{{asset('admin_assets/app/bundle/app.bundle.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin_assets/app/custom/general/components/extended/toastr.js')}}" type="text/javascript"></script>
    
    <script type="text/javascript">
	
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": true,
    //   "positionClass": "toast-bottom-center",
      "preventDuplicates": false,
      "onclick": null,
     "showDuration": "300",
     "hideDuration": "1000",
      "timeOut": "9000",
     "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
</script>

<script type="text/javascript">
		
		function deleteConfirm(){
			window.livewire.emit('deleteConfirm')
		}
</script>
    <script type="text/javascript">
        @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
        @endif


        @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
        @endif


        @if(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}");
        @endif


        @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
        @endif

        window.addEventListener('modal-open', event  => {
                $('#delete_confirm_modal').modal('show');
		});

        window.addEventListener('exist-warning', event  => {
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "You can't not delete this effect as it contains few strain options in it." 
		    });
         });


        window.addEventListener('toastr', event  => {
                console.info("event",event);
				alertMsg(event.detail.msg,event.detail.type);
		});

        function alertMsg($msg,$type){
				switch($type){
			case 'success':
				toastr.success($msg);
				break;
			case 'info':
				toastr.info($msg);
				break;
			case 'warning':
				toastr.warning($msg);
				break;
			case 'error':
				toastr.error($msg);
				break;
		}
        }
		

    </script>
    
    <!--end::Global App Bundle -->
</body>

<!-- end::Body -->

</html>
