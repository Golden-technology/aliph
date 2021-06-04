<div class="modal fade" id="methodModal" tabindex="-1" aria-labelledby="methodModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="methodModalLabel">{{ translate('اضافة طريقة دفع') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('methods.store') }}" method="POST">
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
    $('.method').click(function () {
        if($(this).hasClass('update')) {

            $('#methodModal form').attr('action', $(this).data('action'))
            $('#methodModal form').append('<input type="hidden" name="_method" value="put">')
            $('#methodModal #methodModalLabel').text("{{ translate('تعديل طريقة دفع') }}")

            $('#methodModal form input[name="name"]').val($(this).data('name'))
        }
        else {
            $('#methodModal form').attr('action', '{{ route("methods.store") }}')
            $('#methodModal form input[name="_method"]').remove()
            $('#methodModal #methodModalLabel').text("{{ translate('اضافة طريقة دفع') }}")


            $('#methodModal form input[name="name"]').val('')
        }
    })
</script>
@endpush