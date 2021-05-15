@extends('dashboard.layouts.app')


@section('content')
<form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="card card-outline card-primary collapsed">
			<div class="card-header">
		
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="maximize"><i
							class="fas fa-expand"></i></button>
					<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
				</div>
				<!-- /.card-tools -->
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<div class="form-group">
					<label>الاسم</label>
					<input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="الاسم" required>
				</div>

				<div class="white-box">
					<div class="accordion" id="accordionExample">
						
						<div style="line-height: 2.5" class="accordion-item">
							<h2 class="accordion-header" id="headingTwo">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
									data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									الصلاحيات
								</button>
							</h2>
							<div style="padding-right: 10px" id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
								data-bs-parent="#accordionExample">
								<div class="row">
									@foreach ($permissions as $permission)
									<div class="col-md-4">
										<input type="checkbox" name="permissions[]"> {{ $permission->display_name }}
									</div>
									@endforeach
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<!-- /.card-body -->
			<div class="card-footer">
				<div class="row">
					<div class="col-md-6">
						<label>
							<input type="radio" name="next" value="back" checked="checked" />
							<span>حفظ و اضافة جديد</span>
						</label>
						<label>
							<input type="radio" name="next" value="list">
							<span>حفظ و عرض على القائمة</span>
						</label>
					</div>
					<div class="col-md-6">
						<button type="submit" class="btn btn-primary btn-submit"><i class="fa fa-plus"></i> إضافة</button>
					</div>
				</div>
			</div>
			<!-- /.card-footer -->
		</div>
    </form>
@endsection
@push('foot')
	<script>
		$(function(){
			$('.all-permissions').change(function(){
				if($(this).data('permission') == 'all-' + $(this).data('module')){
					$('.permission-' + $(this).data('module')).prop('checked', $(this).prop('checked'))
				}else{
					$('.permission-' + $(this).data('permission')).prop('checked', $(this).prop('checked'))
				}
			})
			$('.permission-group').change(function(){
				$('.permission-' + $(this).data('group')).prop('checked', $(this).prop('checked'))
			})
		})
	</script>
@endpush