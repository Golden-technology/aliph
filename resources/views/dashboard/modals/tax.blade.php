<div class="modal fade" id="taxModal" tabindex="-1" aria-labelledby="taxModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taxModalLabel">{{ translate('اضافة قيمة ضريبية') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('taxes.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">{{ translate('القيمة') }} : </label>
                        <input type="number" max="100" class="form-control" name="value">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('js')
<script>
    $('.tax').click(function () {
        if($(this).hasClass('update')) {

            $('#taxModal form').attr('action', $(this).data('action'))
            $('#taxModal form').append('<input type="hidden" name="_method" value="put">')
            $('#taxModal #taxModalLabel').text("{{ translate('تعديل قيمة ضريبية') }}")

            $('#taxModal form input[name="value"]').val($(this).data('value'))
        }
        else {
            $('#taxModal form').attr('action', '{{ route("taxes.store") }}')
            $('#taxModal form input[name="_method"]').remove()
            $('#taxModal #taxModalLabel').text("{{ translate('اضافة قيمة ضريبية') }}")

            $('#taxModal form input[name="value"]').val('')
        }
    })
</script>
@endpush