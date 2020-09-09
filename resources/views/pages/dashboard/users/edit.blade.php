@extends('layouts.dashboard.page')
@include('pages.dashboard.users.form.breadcrumbs')
@section('content-page')
	<div class="card">
		<form action="{{ route('dashboard.users.update', $user->uuid) }}"
			  method="POST">
			@csrf
			<input name="_method"
				   type="hidden"
				   value="PATCH">
			<input type="hidden"
				   name="id"
				   value="{{ $user->id }}" />
			<div class="header">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<button type="submit"
								class="btn bg-teal btn-icon float-right text-white"
								data-toggle="tooltip"
								title="@lang('system.update', ['value' => trans('system.user')])">
							<span class="ti-save font-bold"></span>
						</button>
					</div>
				</div>
				<h2><strong>@lang('system.edit', ['value' => trans('system.user')]) {{ $user->name }}</strong>
				</h2>
			</div>
			<div class="body">
				@include('pages.dashboard.users.form.inputs')
			</div>
		</form>
	</div>
@endsection
@include('pages.dashboard.users.form.styles')
@include('pages.dashboard.users.form.scripts')
