@extends('layouts.dashboard.page')
@include('pages.dashboard.doctors.index.breadcrumbs')

@section('content-page')
	<div class="card project_list">
		<div class="header">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<a class="btn bg-teal btn-icon float-right text-white"
					   href="{{ route('dashboard.doctors.create') }}"
					   title="@lang('system.create_m', ['value' => trans('system.doctor')])">
						<em class="zmdi zmdi-plus"></em>
					</a>
				</div>
			</div>
			<h2><strong>@lang('system.index', ['value' => trans('system.doctors')])</strong></h2>
		</div>
		@if ($doctors)
			@include('pages.dashboard.doctors.index.table')
		@else
			<div class="alert alert-dismissible alert-danger text-center"
				 role="alert">
				<div class="container">
					<strong>@lang('system.no_results_m', ['value' => trans('system.doctor')])</strong>
					<button class="close"
							type="button"
							data-dismiss="alert"
							aria-label="Close">
						<span aria-hidden="true"><em class="zmdi zmdi-close"></em></span>
					</button>
				</div>
			</div>
		@endif
	</div>
@endsection

@section('extra-styles')
	<link href="{{ asset('themes/dashboard/plugins/sweetalert/sweetalert.css') }}"
		  rel="stylesheet" />
@endsection
@section('extra-scripts')
	<script src="{{ asset('themes/js-default/sweetalert.min.js') }}"></script>
@endsection
