@extends('layouts.dashboard.page')
@include('pages.dashboard.schedules.form.breadcrumbs')
@section('content-page')
	<div class="card">
		<form action="{{ route('dashboard.schedules.update', $scheduling->uuid) }}"
			  method="POST">
			@csrf
			<input name="_method"
				   type="hidden"
				   value="PATCH">
			<input type="hidden"
				   name="id"
				   value="{{ $scheduling->id }}" />
			<div class="header">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<button type="submit"
								class="btn bg-teal btn-icon float-right text-white"
								data-toggle="tooltip"
								title="@lang('system.update', ['value' => trans('system.scheduling')])">
							<span class="ti-save font-bold"></span>
						</button>
					</div>
				</div>
				<h2><strong>@lang('system.edit', ['value' => trans('system.scheduling')]) {{ $scheduling->id }}</strong>
				</h2>
			</div>
			<div class="body">
				@include('pages.dashboard.schedules.form.inputs')
			</div>
		</form>
	</div>
@endsection
@include('pages.dashboard.schedules.form.styles')
@include('pages.dashboard.schedules.form.scripts')
