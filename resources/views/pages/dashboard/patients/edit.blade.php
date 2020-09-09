@extends('layouts.dashboard.page')
@include('pages.dashboard.patients.form.breadcrumbs')
@section('content-page')
	<div class="card">
		<form action="{{ route('dashboard.patients.update', $patient->uuid) }}"
			  method="POST">
			@csrf
			<input name="_method"
				   type="hidden"
				   value="PATCH">
			<input type="hidden"
				   name="id"
				   value="{{ $patient->id }}" />
			<div class="header">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<button type="submit"
								class="btn bg-teal btn-icon float-right text-white"
								data-toggle="tooltip"
								title="@lang('system.edit', ['value' => trans('system.patient')])">
							<span class="ti-save font-bold"></span>
						</button>
					</div>
				</div>
				<h2>
					<strong>@lang('system.edit', ['value' => trans('system.patient')]) {{ $patient->name }}</strong>
				</h2>
			</div>
			@include('pages.dashboard.patients.form.inputs')
		</form>
	</div>
@endsection
@include('pages.dashboard.patients.form.styles')
@include('pages.dashboard.patients.form.scripts')