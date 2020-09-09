@extends('layouts.dashboard.page')
@include('pages.dashboard.doctors.form.breadcrumbs')
@section('content-page')
	<div class="card">
		<form action="{{ route('dashboard.doctors.store') }}"
			  method="POST">
			@csrf
			<div class="header">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<button type="submit"
								class="btn bg-teal btn-icon float-right text-white"
								data-toggle="tooltip"
								title="@lang('system.store', ['value' => trans('system.doctor')])">
							<span class="ti-save font-bold"></span>
						</button>
					</div>
				</div>
				<h2><strong>@lang('system.create_m', ['value' => trans('system.doctor')])</strong></h2>
			</div>
			@include('pages.dashboard.doctors.form.inputs')
		</form>
	</div>
@endsection
@include('pages.dashboard.doctors.form.styles')
@include('pages.dashboard.doctors.form.scripts')