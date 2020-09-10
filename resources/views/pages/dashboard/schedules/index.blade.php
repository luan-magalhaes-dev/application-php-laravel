@extends('layouts.dashboard.page')
@include('pages.dashboard.schedules.index.breadcrumbs')
@section('content-page')
	<div class="card project_list">
		<div class="header">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<a class="btn bg-teal btn-icon float-right text-white"
					   href="{{ route('dashboard.schedules.create') }}"
					   title="@lang('system.create_m', ['value' => trans('system.scheduling')])">
						<em class="zmdi zmdi-plus"></em>
					</a>
				</div>
			</div>
			<h2><strong>@lang('system.scheduling')</strong></h2>
		</div>
		@if ($schedules)
			@include('pages.dashboard.schedules.index.table')
		@else
			<div class="alert alert-dismissible alert-danger text-center"
				 role="alert">
				<div class="container">
					<strong>@lang('system.no_results_m', ['value' => trans('system.scheduling')])</strong>
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
