<div class="modal fade" id="barcodeModal" tabindex="-1" aria-labelledby="barcodeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="barcodeModalLabel">{{ translate('باركود') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div id="barcode" class="modal-body">
                    <div class="row">
                        @for ($i = 0; $i < 12; $i++)
                            <div class="col-md-4">
                                <div class="barcode">
                                    <h3>
                                        {!! DNS1D::getBarcodeHTML($item->barcode, "C128",1.4,44) !!}
                                    </h3>
                                    <p class="text-center">{{ $item->barcode }}</p>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                    <button type="button" onclick="$('#barcode').print()" class="btn btn-primary">{{ translate('طباعة') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('js')
    <script src="{{ asset('js/jQuery.print.min.js') }}"></script>
@endpush