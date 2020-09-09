@extends('layouts.dashboard.page')

@section('page-title')
	<h2>@lang('system.home')</h2>
	<p>@lang('system.subtitle')</p>
@endsection

@section('breadcrumbs')
	<li class="breadcrumb-item">
		<a href="{{ config('custom.url_panel') }}"
		   data-toggle="tooltip"
		   title=""
		   data-original-title="@lang('system.home')">
			<i class="zmdi zmdi-home zmdi-hc-lg"></i> @lang('system.home')
		</a>
	</li>
@endsection

@section('content-page')
	<div class="card">
		<div class="header">
			<h2><strong>Dashboard</strong></h2>
		</div>
		<div class="body">
			@if (session('status'))
				<div class="alert alert-success"
					 role="alert">
					{{ session('status') }}
				</div>
            @endif
            Você está logado!
		</div>
	</div>
@endsection

@section('extra-script')
	<script>
        $('.bs-component [data-toggle="tooltip"]').tooltip();
	</script>
@endsection
