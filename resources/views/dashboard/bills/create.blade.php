@extends('dashboard.layouts.master', ['modals' => ['vendor', 'tax'] ])

@section('title')
    {{ translate('اضافة فاتورة مشتريات') }}
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <form action="{{ route('bills.store') }}" method="POST" enctype="multipart/form-data">
                <div class="card-header">
                    <h3>{{ translate('اضافة فاتورة مشتريات') }}</h3>
                </div>
                <div class="card-body">
                    <div>
                        @csrf
                        <div class="row">
                            <div class="col-md-10">
                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">{{ translate('المخزن') }} :</label>
                                            <select class="form-control"  name="store_id">
                                                <option disabled selected value="">{{ translate('اختار المخزن') }}</option>
                                                @foreach ($stores as $store)
                                                    <option value="{{ $store->id }}">{{ $store->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">{{ translate('المورد') }} :</label>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary vendor" type="button"
                                                     data-toggle="modal" 
                                                     data-target="#vendorModal"
                                                    >
                                                    +</button>
                                                </div>
                                                <select class="form-control"  name="vendor_id">
                                                    <option disabled selected value="">{{ translate('اختار المورد') }}</option>
                                                    @foreach ($vendors as $vendor)
                                                        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            
                                        </div>
                                    </div>
    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="col-form-label">{{ translate('الحالة') }} :</label>
                                            <select name="status" class="form-control">
                                                <option disabled selected value="">{{ translate('اختار الحالة') }}</option>
                                                <option>{{ translate('فتح') }}</option>
                                                <option>{{ translate('مدفوعة') }}</option>
                                                <option>{{ translate('ملغاة') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">{{ translate('الضريبة') }} :</label>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary tax" type="button"
                                                     data-toggle="modal" 
                                                     data-target="#taxModal"
                                                    >
                                                    +</button>
                                                </div>
                                                <select class="form-control" name="tax">
                                                    <option disabled selected value="">{{ translate('اختار الضريبة') }}</option>
                                                    @foreach ($taxes as $tax)
                                                        <option value="{{ $tax->value }}">{{ $tax->value }}%</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <br>
                                    <h4>المنتجات</h4>
                                        <table id="items" class="table table-bordered table-hover text-center">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{ translate('المنتج') }}</th>
                                                    <th>{{ translate('الكمية') }}</th>
                                                    <th>{{ translate('السعر') }}</th>
                                                    <th>{{ translate('الضريبة') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                        <tfoot>
                                            <button type="button" id="add-item" class="btn btn-primary " ><i class="fa fa-plus"></i> {{ translate('اضافة') }} </button>
                                        </tfoot>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> {{ translate('حفظ') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')

<script>

        async function seandRequest(url , method = 'GET' , result = null) {
            let data = await fetch(url)
            return await data.json();
        }

        async function getUnits(id) {
            $('select#units').html(`<option disabled selected value="">{{ translate('اختار الوحدة') }}</option>`)
            units = await seandRequest("{{ url('item/units') }}" + '/' + id , 'GET')
            units.forEach(unit => {
                let option = `<option value="`+ unit.unit.id +`">`+ unit.unit.name +`</option>`
                $('select#units').append(option);
            });
        }

    $(function () {
        let count = 0
        $('#add-item').click(function () {
            count++
            $('select#items').removeAttr('onchange');
            $('select#items').removeAttr('id');
            $('select#units').removeAttr('id');
            row = `
                <tr>
                    <td>`+ count +`</td>
                    <td>
                        <select id="items" onchange="getUnits(this.value)" class="custom-select" name="items[]">
                            <option disabled selected value="">{{ translate('اختار المنتج') }}</option>
                            @foreach($items as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="number" class="form-control" name="quantity[]" />
                    </td>
                    <td>
                        <input type="number" class="form-control" name="price[]" />
                    </td>
                    <td>
                        <select class="custom-select" name="taxes[]">
                            <option disabled selected value="">{{ translate('اختار الضريبة') }}</option>
                            @foreach($taxes as $tax)
                                <option value="{{ $tax->id }}">{{ $tax->value }}%</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            `

            $('#items tbody').append(row)
        })

        })
</script>
@endpush