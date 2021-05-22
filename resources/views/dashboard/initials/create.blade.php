@extends('dashboard.layouts.master')

@section('title')
    {{ translate('اضافة عرض') }}
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <form action="{{ route('initials.store') }}" method="POST" enctype="multipart/form-data">
                <div class="card-header">
                    <h3>{{ translate('اضافة عرض') }}</h3>
                </div>
                <div class="card-body">
                    <div>
                        @csrf
                        <div class="row">
                            <div class="col-md-10">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">{{ translate('العميل') }} :</label>
                                            <select class="form-control"  name="customer_id">
                                                <option disabled selected value="">{{ translate('اختار العميل') }}</option>
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">{{ translate('الحالة') }} :</label>
                                            <select name="status" class="form-control">
                                                <option disabled selected value="">{{ translate('اختار الحالة') }}</option>
                                                <option>{{ translate('مسودة') }}</option>
                                                <option>{{ translate('ارسلت') }}</option>
                                                <option>{{ translate('شوهدت') }}</option>
                                                <option>{{ translate('تمت الموافقة') }}</option>
                                                <option>{{ translate('مرفوضة') }}</option>
                                                <option>{{ translate('ملغاة') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">{{ translate('الضريبة') }} :</label>
                                            <select class="form-control" name="tax">
                                                <option disabled selected value="">{{ translate('اختار الضريبة') }}</option>
                                                @foreach ($taxes as $tax)
                                                    <option value="{{ $tax->id }}">{{ $tax->value }}%</option>
                                                @endforeach
                                            </select>
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
                                                    <th>{{ translate('الوحدة') }}</th>
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
    $(function () {
        let count = 0
        $('#add-item').click(function () {
            count++

            row = `
                <tr>
                    <td>`+ count +`</td>
                    <td>
                        <select class="form-control" name="items[]">
                            <option disabled selected value="">{{ translate('اختار المنتج') }}</option>
                            @foreach($items as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="units[]">
                            <option disabled selected value="">{{ translate('اختار الوحدة') }}</option>
                            @foreach($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
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
                        <select class="form-control" name="taxes[]">
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