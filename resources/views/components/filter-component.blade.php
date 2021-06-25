<div>
    <div class="form-group">
        <button id="filter" type="button" class="btn btn-primary btn-sm"><i class="fa fa-filter"></i></button>
    </div>
    <form action="#" method="get">
        <div id="filter-body" class="card">
            <div class="card-header">
                <h3>
                    {{ translate('فلتر') }}
                    <button type="submit" class="btn btn-primary float-left">{{ translate('بحث') }}</button>
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @isset($id)
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="form-group row">
                                    <label for="number" class="col-sm-4 col-form-label">{{ translate(' الفاتورة') }}</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="number" placeholder="{{ translate('رقم الفاتورة') }}" value="{{ request()->number }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endisset
                    @isset($customers)
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="form-group row">
                                    <label for="customers" class="col-sm-4 col-form-label">{{ translate('العميل') }}</label>
                                    <div class="col-sm-8">
                                        <select style="width: 100%" name="customer" class="custom-select">
                                            <option value="all">الكل</option>
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}" {{ $customer->id ==  request()->customer ? 'selected' : '' }} >{{ $customer->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endisset
                    @isset($vendors)
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="form-group row">
                                    <label for="vendors" class="col-sm-4 col-form-label">{{ translate('المورد') }}</label>
                                    <div class="col-sm-8">
                                        <select style="width: 100%" name="vendor" class="custom-select">
                                            <option value="all">الكل</option>
                                            @foreach ($vendors as $vendor)
                                                <option value="{{ $vendor->id }}" {{ $vendor->id ==  request()->vendor ? 'selected' : '' }} >{{ $vendor->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endisset
                    @isset($date)
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label for="date" class="col-sm-2 col-form-label">{{ translate('من') }}</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="from" id="date" value="{{ request()->from }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label for="date" class="col-sm-3 col-form-label">{{ translate('الى') }}</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" name="to" id="date" value="{{ request()->to }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endisset
                    
                </div>
                
            </div>
        </div>
    </form>
</div>



{{-- styles --}}
@push('css')
    <style>
        #filter-body {
            display: none
        }

    </style>
@endpush


{{-- scripts --}}

@push('js')
    <script>
        $('#filter').click(function () {
            $('#filter-body').fadeToggle("slow", "linear");
        })

    </script>
@endpush
