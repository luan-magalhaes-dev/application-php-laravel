@extends('layouts.dashboard.page')
@include('pages.dashboard.doctors.form.breadcrumbs')
@section('content-page')
	<div class="card">
		<form action="{{ route('dashboard.doctors.update', $doctor->uuid) }}"
			  method="POST">
			@csrf
			<input name="_method"
				   type="hidden"
				   value="PATCH">
			<input type="hidden"
				   name="id"
				   value="{{ $doctor->id }}" />
			<div class="header">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<button type="submit"
								class="btn bg-teal btn-icon float-right text-white"
								data-toggle="tooltip"
								title="@lang('system.edit', ['value' => trans('system.doctor')])">
							<span class="ti-save font-bold"></span>
						</button>
					</div>
				</div>
				<h2>
					<strong>@lang('system.edit', ['value' => trans('system.doctor')]) {{ $doctor->name }}</strong>
				</h2>
			</div>
			@include('pages.dashboard.doctors.form.inputs')
		</form>
	</div>
@endsection
@include('pages.dashboard.doctors.form.styles')
@include('pages.dashboard.doctors.form.scripts')