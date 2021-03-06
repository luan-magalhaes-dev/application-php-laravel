@extends('layouts.dashboard.page')
@include('pages.dashboard.users.index.breadcrumbs')
@section('content-page')
	<div class="card project_list">
		<div class="header">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<a class="btn bg-teal btn-icon float-right text-white"
					   href="{{ route('dashboard.users.create') }}"
					   title="@lang('system.create_m', ['value' => trans('system.user')])">
						<em class="zmdi zmdi-plus"></em>
					</a>
				</div>
			</div>
			<h2><strong>@lang('system.index', ['value' => trans('system.users')])</strong></h2>
		</div>
		@if ($users)
			@include('pages.dashboard.users.index.table')
		@else
			<div class="alert alert-dismissible alert-danger text-center"
				 role="alert">
				<div class="container">
					<strong>@lang('system.no_results_m', ['value' => trans('system.user')])</strong>
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
