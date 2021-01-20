
@props(['search'=>null])
<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__body">
        @if($search)
        <div class="kt-form kt-form--label-right  kt-margin-b-10">
            {{-- kt-margin-t-20 --}}
            <div class="row align-items-center">
                <div class="col-xl-8 order-2 order-xl-1">
                    <div class="row align-items-center">
                        <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                            <div class="kt-input-icon kt-input-icon--left">
                                {{ $search }}
                                <span class="kt-input-icon__icon kt-input-icon__icon--left">
                                    <span><i class="la la-search"></i></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                            <!-- <div class="kt-form__group kt-form__group--inline">
                                <div class="kt-form__label">
                                    <label>Status:</label>
                                </div>
                                <div class="kt-form__control">
                                    <div class="dropdown bootstrap-select form-control"><select class="form-control bootstrap-select" id="kt_form_status" tabindex="-98">
                                        <option value="">All</option>
                                        <option value="1">Pending</option>
                                        <option value="2">Delivered</option>
                                        <option value="3">Canceled</option>
                                        <option value="4">Success</option>
                                        <option value="5">Info</option>
                                        <option value="6">Danger</option>
                                    </select><button type="button" class="btn dropdown-toggle bs-placeholder btn-light" data-toggle="dropdown" role="button" data-id="kt_form_status" title="All"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">All</div></div> </div></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                                </div>
                            </div> -->
                        </div>
                        <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                            <!-- <div class="kt-form__group kt-form__group--inline">
                                <div class="kt-form__label">
                                    <label>Type:</label>
                                </div>
                                <div class="kt-form__control">
                                    <div class="dropdown bootstrap-select form-control"><select class="form-control bootstrap-select" id="kt_form_type" tabindex="-98">
                                        <option value="">All</option>
                                        <option value="1">Online</option>
                                        <option value="2">Retail</option>
                                        <option value="3">Direct</option>
                                    </select><button type="button" class="btn dropdown-toggle bs-placeholder btn-light" data-toggle="dropdown" role="button" data-id="kt_form_type" title="All"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">All</div></div> </div></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <!-- <div class="col-xl-4 order-1 order-xl-2 kt-align-right">
                    <a href="#" class="btn btn-default kt-hidden">
                        <i class="la la-cart-plus"></i> New Order
                    </a>
                    <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg d-xl-none"></div>
                </div> -->
            </div>
        </div>
        @endif

        <!--begin: Datatable -->
        <table class="table table-striped- table-bordered table-hover table-checkable table-striped" >
                <thead>
                    {{ $thead }}    
                </thead>
                <tbody>
                    {{ $tbody }}
                </tbody>
        </table>
                <div>
                    {{ $pagination }}
                </div>
    </div>
</div>