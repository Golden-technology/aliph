<div class="modal fade" id="storeModal" tabindex="-1" aria-labelledby="storeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="storeModalLabel">{{ translate('اضافة مخزن') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('stores.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">{{ translate('الاسم') }} : </label>
                        <input type="text" class="form-control" name="name">
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
    $('.store').click(function () {
        if($(this).hasClass('update')) {

            $('#storeModal form').attr('action', $(this).data('action'))
            $('#storeModal form').append('<input type="hidden" name="_method" value="put">')
            $('#storeModal #storeModalLabel').text("{{ translate('تعديل مخزن') }}")

            $('#storeModal form input[name="name"]').val($(this).data('name'))
        }
        else {
            $('#storeModal form').attr('action', '{{ route("stores.store") }}')
            $('#storeModal form input[name="_method"]').remove()
            $('#storeModal #storeModalLabel').text("{{ translate('اضافة مخزن') }}")


            $('#storeModal form input[name="name"]').val('')
        }
    })
</script>
@endpush