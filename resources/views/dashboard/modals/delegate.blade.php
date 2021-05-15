<div class="modal fade" id="delegateModal" tabindex="-1" aria-labelledby="delegateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delegateModalLabel">اضافة مندوب</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('delegates.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">الاسم :</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">رقم الهاتف :</label>
                        <input type="number" class="form-control" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">العنوان:</label>
                        <input type="text" class="form-control" name="address">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">الشركة:</label>
                        <select class="form-control" name="company_id">
                            @foreach (\App\Models\Company::all() as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
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
    $('.delegate').click(function () {
        if($(this).hasClass('update')) {
            
            $('#delegateModal form').attr('action', $(this).data('action'))
            $('#delegateModal form').append('<input type="hidden" name="_method" value="put">')

            $('#delegateModal form input[name="name"]').val($(this).data('name'))
            $('#delegateModal form input[name="phone"]').val($(this).data('phone'))
            $('#delegateModal form input[name="address"]').val($(this).data('address'))
        }
        else {
            $('#delegateModal form').attr('action', '{{ route("delegates.store") }}')
            $('#delegateModal form input[name="_method"]').remove()

            $('#delegateModal form input[name="name"]').val('')
            $('#delegateModal form input[name="phone"]').val('')
            $('#delegateModal form input[name="address"]').val('')
        }
    })
</script>
@endpush