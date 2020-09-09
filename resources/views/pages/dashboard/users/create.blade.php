@extends('layouts.dashboard.page')
@include('pages.dashboard.users.form.breadcrumbs')
@section('content-page')
	<div class="card">
		<form action="{{ route('dashboard.users.store') }}"
			  method="POST">
			@csrf
			<div class="header">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<button type="submit"
								class="btn bg-teal btn-icon float-right text-white"
								data-toggle="tooltip"
								title="@lang('system.store', ['value' => trans('system.user')])">
							<span class="ti-save font-bold"></span>
						</button>
					</div>
				</div>
				<h2><strong>@lang('system.create_m', ['value' => trans('system.user')])</strong></h2>
			</div>
			<div class="body">
				@include('pages.dashboard.users.form.inputs')
			</div>
		</form>
	</div>
@endsection
@include('pages.dashboard.users.form.styles')
@include('pages.dashboard.users.form.scripts')
