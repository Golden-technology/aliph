<div class="modal fade" id="unitModal" tabindex="-1" aria-labelledby="unitModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="unitModalLabel">{{ translate('اضافة وحدة') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('units.store') }}" method="POST">
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
    $('.unit').click(function () {
        if($(this).hasClass('update')) {

            $('#unitModal form').attr('action', $(this).data('action'))
            $('#unitModal form').append('<input type="hidden" name="_method" value="put">')
            $('#unitModal #unitModalLabel').text("{{ translate('تعديل وحدة') }}")

            $('#unitModal form input[name="name"]').val($(this).data('name'))
        }
        else {
            $('#unitModal form').attr('action', '{{ route("units.store") }}')
            $('#unitModal form input[name="_method"]').remove()
            $('#unitModal #unitModalLabel').text("{{ translate('اضافة وحدة') }}")


            $('#unitModal form input[name="name"]').val('')
        }
    })
</script>
@endpush