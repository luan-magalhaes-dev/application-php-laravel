<div class="table-responsive">
	<table class="table table-hover c_table"
		   aria-describedby="@lang('system.create_m', ['value' => trans('system.doctor')])">
		<thead class="thead-dark">
		<tr>
			<td class="text-center">#</td>
			<td class="text-left">@lang('system.name')</td>
			<td class="text-left">@lang('system.email')</td>
			<td class="text-center">@lang('system.crm')</td>
			<td class="text-center">@lang('system.created_at')</td>
			<td class="text-center">@lang('system.actions')</td>
		</tr>
		</thead>
		<tbody>
		@foreach($doctors as $doctor)
			<tr>
				<th class="text-center">{{ $doctor->id }}</th>
				<td class="text-left">
					{{ $doctor->name }}
				</td>
				<td class="text-left">{{ $doctor->email }}</td>
				<td class="text-center">{{ $doctor->crm }}</td>
				<td class="text-center">{{ date('d/m/Y H:i:s', strtotime($doctor->created_at)) }}</td>
				<td class="text-center">
					<a href="{{ route('dashboard.doctors.edit', $doctor->uuid) }}"
					   class="btn btn-warning btn-icon text-white"
					   data-toggle="tooltip"
					   title="@lang('system.edit', ['value' => trans('system.doctor')])">
						<em class="zmdi zmdi-edit"></em>
					</a>
					<a class="btn bg-deep-orange btn-icon text-white"
					   data-toggle="tooltip"
					   title="@lang('system.destroy', ['value' => trans('system.doctor')])"
					   onclick="swalDestroy('{{ $doctor->uuid }}', '@lang('system.destroy_cancel_m', ['value' => trans('system.doctor')])')">
						<em class="zmdi zmdi-delete"></em>
						<form style="display:none;"
							  action="{{ route('dashboard.doctors.destroy', $doctor->uuid) }}"
							  method="post"
							  id="form-destroy-{{ $doctor->uuid }}">
							@csrf
							<input name="_method"
								   type="hidden"
								   value="DELETE">
						</form>
					</a>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>