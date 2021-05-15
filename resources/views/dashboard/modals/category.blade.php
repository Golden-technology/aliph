<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryModalLabel">{{ translate('اضافة قسم') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('categories.store') }}" method="POST">
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
    $('.category').click(function () {
        if($(this).hasClass('update')) {

            $('#categoryModal form').attr('action', $(this).data('action'))
            $('#categoryModal form').append('<input type="hidden" name="_method" value="put">')
            $('#categoryModal #categoryModalLabel').text("{{ translate('تعديل قسم') }}")

            $('#categoryModal form input[name="name"]').val($(this).data('name'))
        }
        else {
            $('#categoryModal form').attr('action', '{{ route("categories.store") }}')
            $('#categoryModal form input[name="_method"]').remove()
            $('#categoryModal #categoryModalLabel').text("{{ translate('اضافة قسم') }}")


            $('#categoryModal form input[name="name"]').val('')
        }
    })
</script>
@endpush