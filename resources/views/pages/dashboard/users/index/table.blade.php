<div class="table-responsive">
	<table class="table table-hover c_table"
		   aria-describedby="@lang('system.create_m', ['value' => trans('system.user')])">
		<thead class="thead-dark">
		<tr>
			<td class="text-center">#</td>
			<td class="text-left">@lang('system.name')</td>
			<td class="text-left">@lang('system.email')</td>
			<td class="text-center">@lang('system.created_at')</td>
			<td class="text-center">@lang('system.actions')</td>
		</tr>
		</thead>
		<tbody>
		@foreach($users as $user)
			<tr>
				<th class="text-center"
					id="{{ $user->id }}">{{ $user->id }}</th>
				<td class="text-left">{{ $user->name }}</td>
				<td class="text-left">{{ $user->email }}</td>
				<td class="text-center">{{ date('d/m/Y H:i:s', strtotime($user->created_at)) }}</td>
				<td class="text-center">
					<a href="{{ route('dashboard.users.edit', $user->uuid) }}"
					   class="btn btn-warning btn-icon text-white"
					   data-toggle="tooltip"
					   title="@lang('system.edit', ['value' => trans('system.user')])">
						<em class="zmdi zmdi-edit"></em>
					</a>
					<a class="btn bg-deep-orange btn-icon text-white"
					   data-toggle="tooltip"
					   title="@lang('system.destroy', ['value' => trans('system.user')])"
					   onclick="swalDestroy('{{ $user->uuid }}', '@lang('system.destroy_cancel_m', ['value' => trans('system.user')])')">
						<em class="zmdi zmdi-delete"></em>
						<form style="display:none;"
							  action="{{ route('dashboard.users.destroy', $user->uuid) }}"
							  method="post"
							  id="form-destroy-{{ $user->uuid }}">
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