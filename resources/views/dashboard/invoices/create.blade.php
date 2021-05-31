@extends('dashboard.layouts.master')

@section('title')
{{ translate('اضافة فاتورة مبيعات') }}
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <form action="{{ route('initials.store') }}" method="POST" enctype="multipart/form-data">
                <div class="card-header">
                    <h3>{{ translate('اضافة فاتورة مبيعات') }}
                    </h3>
                </div>
                <div class="card-body">
                    <div>
                        @csrf
                        <div class="row">
                            <div class="col-md-10">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="recipient-name"
                                                class="col-form-label">{{ translate('المخزن') }}
                                                :</label>
                                            <select id="store" class="form-control"
                                                name="store_id">
                                                <option disabled selected value="">
                                                    {{ translate('اختار المخزن') }}
                                                </option>
                                                @foreach($stores as $store)
                                                    <option value="{{ $store->id }}">{{ $store->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="recipient-name"
                                                class="col-form-label">{{ translate('العميل') }}
                                                :</label>
                                            <select class="form-control" name="customer_id">
                                                <option disabled selected value="">
                                                    {{ translate('اختار العميل') }}
                                                </option>
                                                @foreach($customers as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label
                                                class="col-form-label">{{ translate('الحالة') }}
                                                :</label>
                                            <select name="status" class="form-control">
                                                <option disabled selected value="">
                                                    {{ translate('اختار الحالة') }}
                                                </option>
                                                <option>
                                                    {{ translate('مسودة') }}
                                                </option>
                                                <option>
                                                    {{ translate('ارسلت') }}
                                                </option>
                                                <option>
                                                    {{ translate('شوهدت') }}
                                                </option>
                                                <option>
                                                    {{ translate('تمت الموافقة') }}
                                                </option>
                                                <option>
                                                    {{ translate('مرفوضة') }}
                                                </option>
                                                <option>
                                                    {{ translate('ملغاة') }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="recipient-name"
                                                class="col-form-label">{{ translate('الضريبة') }}
                                                :</label>
                                            <select class="form-control" name="tax">
                                                <option disabled selected value="">
                                                    {{ translate('اختار الضريبة') }}
                                                </option>
                                                @foreach($taxes as $tax)
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
                                                    <th>{{ translate('المنتج') }}
                                                    </th>
                                                    <th>{{ translate('الوحدة') }}
                                                    </th>
                                                    <th>{{ translate('الكمية') }}
                                                    </th>
                                                    <th>{{ translate('السعر') }}
                                                    </th>
                                                    <th>{{ translate('الضريبة') }}
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                        <tfoot>
                                            <button type="button" id="add-item" class="btn btn-primary "><i
                                                    class="fa fa-plus"></i>
                                                {{ translate('اضافة') }}
                                            </button>
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
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                        {{ translate('حفظ') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')

    <script>

        let items;

        async function seandRequest(url , method = 'GET' , result = null) {
            let data = await fetch(url)
            return await data.json();
        }

        async function getItems(id) {
            items = await seandRequest("{{ url('store/items') }}" + '/' + id , 'GET')
            items.forEach(item => {
                // let option = `<option value="`+ item.id +`">`+ item.name +`</option>`
                // $('select.items').append(option);
                console.log(item)
            });
        }
            

        $(function () {
            let count = 0

            $('#add-item').click(function () {
                count++ 

                $('select.items').removeClass('items');

                row = `
                <tr>
                    <td>` + count + `</td>
                    <td>
                        <select class="form-control items" name="items[]">
                            <option disabled selected value="">{{ translate('اختار المنتج') }}</option>
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="units[]">
                            <option disabled selected value="">{{ translate('اختار الوحدة') }}</option>
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
            let store = $('#store').val()
            getItems(store)

            })

        })

    </script>
@endpush
