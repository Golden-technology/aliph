@extends('dashboard.layouts.master', ['modals' => ['customer', 'store', 'tax'] ])

@section('title')
{{ translate('اضافة فاتورة مبيعات') }}
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <form action="{{ route('invoices.store') }}" method="POST" enctype="multipart/form-data">
                <div class="card-header">
                    <h3>{{ translate('اضافة فاتورة مبيعات') }}</h3>
                </div>
                <div class="card-body">
                    <div>
                        @csrf
                        <div class="row">
                            <div class="col-md-10">
                                <div class="row">

                                

                                    <div class="col-md-4">
                                        <label for="recipient-name"
                                                class="col-form-label">{{ translate('المخزن') }}
                                                :</label>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button"
                                                 data-toggle="modal" 
                                                 data-target="#storeModal"
                                                >
                                                +</button>
                                            </div>
                                            <select id="store" class="form-control"
                                                name="store_id" onchange="getItems(this.value)">
                                                <option disabled selected value="">
                                                    {{ translate('اختار المخزن') }}
                                                </option>
                                                @foreach($stores as $store)
                                                    <option value="{{ $store->id }}">{{ $store->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- <div class="form-group">
                                            
                                            <select id="store" class="form-control"
                                                name="store_id" onchange="getItems(this.value)">
                                                <option disabled selected value="">
                                                    {{ translate('اختار المخزن') }}
                                                </option>
                                                @foreach($stores as $store)
                                                    <option value="{{ $store->id }}">{{ $store->name }} </option>
                                                @endforeach
                                            </select>
                                        </div> -->
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="recipient-name"
                                                class="col-form-label">{{ translate('العميل') }}
                                                :</label>
                                                <div class="input-group">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" type="button"
                                                         data-toggle="modal" 
                                                         data-target="#customerModal"
                                                        >
                                                        +</button>
                                                    </div>
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
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="recipient-name"
                                                class="col-form-label">{{ translate('الضريبة') }}
                                                :</label>
                                                <div class="input-group">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" type="button"
                                                         data-toggle="modal" 
                                                         data-target="#taxModal"
                                                        >
                                                        +</button>
                                                    </div>
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
            $('.items').html(`<option disabled selected value="">{{ translate('اختار المنتج') }}</option>`);
            items.forEach(item => {
                let option = `<option value="`+ item.item.id +`">`+ item.item.name +`</option>`
                $('.items').append(option);
            });
        }

        // async function getUnits(id) {
        //     units = await seandRequest("{{ url('item/units') }}" + '/' + id , 'GET')
        //     $('.units').html(`<option disabled selected value="">{{ translate('اختار الوحدة') }}</option>`);
        //     units.forEach(unit => {
        //         let option = `<option value="`+ unit.unit.id +`">`+ unit.unit.name +`</option>`
        //         $('.units').append(option);
        //     });
        // }


        $(function () {
            let count = 0

            $('#add-item').click(function () {
                if($('#store').val() == null) {
                    alert('اختار المخزن')
                }else {
                    
                    count++ 

                    // $('select.items').removeAttr('onchange');
                    // $('select.items').removeClass('items');
                    // $('select.units').removeClass('units');

                    row = `
                    <tr>
                        <td>` + count + `</td>
                        <td>
                            <select class="form-control items" name="items[]">
                                <option disabled selected value="">{{ translate('اختار المنتج') }}</option>
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
                getItems($('#store').val())
            }
            // getItems(store)

            })

        })

    </script>
@endpush
