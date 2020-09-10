<div class="table-responsive">
	<table class="table table-hover c_table"
		   aria-describedby="@lang('system.create_m', ['value' => trans('system.scheduling')])">
		<thead class="thead-dark">
		<tr>
			<td class="text-center">#</td>
			<td class="text-left">@lang('system.doctor')</td>
			<td class="text-left">@lang('system.patient')</td>
			<td class="text-left">@lang('system.scheduling')</td>
			<td class="text-center">@lang('system.created_at')</td>
			<td class="text-center">@lang('system.actions')</td>
		</tr>
		</thead>
		<tbody>
		@foreach($schedules as $scheduling)
			<tr>
				<th class="text-center"
					id="{{ $scheduling->id }}">{{ $scheduling->id }}</th>
				<td class="text-left">{{ $scheduling->doctor->name }}</td>
				<td class="text-left">{{ $scheduling->patient->name }}</td>
				<td class="text-center">{{ date('d/m/Y H:i:s', strtotime($scheduling->schedule)) }}</td>
				<td class="text-center">{{ date('d/m/Y H:i:s', strtotime($scheduling->created_at)) }}</td>
				<td class="text-center">
					<a href="{{ route('dashboard.schedules.edit', $scheduling->uuid) }}"
					   class="btn btn-warning btn-icon text-white"
					   data-toggle="tooltip"
					   title="@lang('system.edit', ['value' => trans('system.scheduling')])">
						<em class="zmdi zmdi-edit"></em>
					</a>
					<a class="btn bg-deep-orange btn-icon text-white"
					   data-toggle="tooltip"
					   title="@lang('system.destroy', ['value' => trans('system.scheduling')])"
					   onclick="swalDestroy('{{ $scheduling->uuid }}', '@lang('system.destroy_cancel_m', ['value' => trans('system.scheduling')])')">
						<em class="zmdi zmdi-delete"></em>
						<form style="display:none;"
							  action="{{ route('dashboard.schedules.destroy', $scheduling->uuid) }}"
							  method="post"
							  id="form-destroy-{{ $scheduling->uuid }}">
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