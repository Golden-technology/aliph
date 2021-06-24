@extends('dashboard.layouts.master')

@section('title')
    {{ translate('اضافة منتج') }}
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                <div class="card-header">
                    <h3>{{ translate('اضافة منتج') }}</h3>
                </div>
                <div class="card-body">
                    <div>
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <h4>{{ translate('المعلومات الاساسية') }}</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">{{ translate('اسم المنتج') }} :</label>
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">{{ translate(' الباركود') }} :</label>
                                            <input type="text" class="form-control" name="barcode" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">{{ translate('القسم') }} :</label>
                                            <select class="form-control" name="category_id">
                                                <option value="">{{ translate('اختار القسم') }}</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">{{ translate('سعر الشراء') }} :</label>
                                            <input type="number" class="form-control" name="price_sale" step="0.1">
                                        </div>
                                    </div>
    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">{{ translate('سعر البيع') }} :</label>
                                            <input type="number" class="form-control" name="price_purchase" step="0.1">
                                        </div>
                                    </div>
    
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">{{ translate('المورد') }} :</label>
                                            <select class="form-control" name="vendor_id">
                                                @foreach ($vendors as $vendor)
                                                    <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">{{ translate('الضريبة') }} :</label>
                                            <select class="form-control" name="tax_id">
                                                @foreach ($taxes as $tax)
                                                    <option value="{{ $tax->id }}">{{ $tax->value }}%</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="units" class="col-form-label">{{ translate('الوحدات') }} :</label>
                                            <select class="form-control" id="units" name="unit_id" >
                                                @foreach ($units as $unit)
                                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="units" class="col-form-label">{{ translate('المخزن') }} :</label>
                                            <select class="form-control" id="stores" name="store_id" >
                                                @foreach ($stores as $store)
                                                    <option value="{{ $store->id }}">{{ $store->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> -->

                                </div>
                            </div>
                            <div class="col-md-4">
                                <h4>{{ translate('صورة المنتج') }}</h4>
                                <hr>
                                <div class="form-group">
                                    <label for="image" class="col-form-label btn btn-primary btn-block">
                                        {{ translate('الصورة') }} :
                                        <input type="file" class="form-control d-none" id="image" name="image" >
                                    </label>
                                </div>
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
    {{-- <script src="{{ asset('js/dashboard/items.js') }}"></script> --}}

    <script>
        $(function () {
            let count = 0
            $('#add-store').click(function () {
                count++

                row = `
                    <tr>
                        <td>`+ count +`</td>
                        <td>
                            <select class="form-control" name="stores[]">
                                @foreach($stores as $store)
                                    <option value="{{ $store->id }}">{{ $store->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="units[]">
                                @foreach($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="number" class="form-control" name="quantity[]" />
                        </td>
                    </tr>
                `

                $('#stores tbody').append(row)
            })

            })
    </script>
@endpush