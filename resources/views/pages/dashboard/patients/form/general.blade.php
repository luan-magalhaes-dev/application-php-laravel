<div class="row clearfix">
	<div class="col-lg-6 col-md-6 col-sm-12">
		<label for="name">@lang('system.name')</label>
		<div class="form-group">
			<input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
				   type="text"
				   id="name"
				   placeholder="@lang('system.inform_the_m', ['value' => trans('system.name')])"
				   value="{{ !is_null($patient) ? $patient->name : old('name') }}"
				   name="name" />
			@if ($errors->has('name'))
				<label id="name-error"
					   class="error"
					   for="name"><strong>{{ $errors->first('name') }}</strong></label>
			@endif
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-12">
		<label for="email">@lang('system.email')</label>
		<div class="form-group">
			<input class="form-control"
				   type="email"
				   id="email"
				   placeholder="@lang('system.inform_the_m', ['value' => trans('system.email')])"
				   value="{{ !is_null($patient) ? $patient->email : old('email') }}"
				   name="email" />
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-12">
		<label for="cpf">@lang('system.cpf')</label>
		<div class="form-group">
			<input class="form-control {{ $errors->has('cpf') ? 'is-invalid' : '' }}"
				   type="text"
				   id="cpf"
				   placeholder="@lang('system.inform_the_m', ['value' => trans('system.cpf')])"
				   value="{{ !is_null($patient) ? $patient->cpf : old('cpf') }}"
				   name="cpf" />
			@if ($errors->has('cpf'))
				<label id="cpf-error"
					   class="error"
					   for="cpf"><strong>{{ $errors->first('cpf') }}</strong></label>
			@endif
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-12">
		<label for="birth">@lang('system.birth')</label>
		<div class="form-group">
			<input class="form-control {{ $errors->has('birth') ? 'is-invalid' : '' }}"
				   type="date"
				   id="birth"
				   placeholder="@lang('system.inform_the_m', ['value' => trans('system.birth')])"
				   value="{{ !is_null($patient) ? $patient->birth : old('birth') }}"
				   name="birth" />
			@if ($errors->has('birth'))
				<label id="birth-error"
					   class="error"
					   for="birth"><strong>{{ $errors->first('birth') }}</strong></label>
			@endif
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-12">
		<div class="form-group">
			<label for="cellphone">@lang('system.cellphone')</label>
			<input class="form-control {{ $errors->has('cellphone') ? 'is-invalid' : '' }}"
				   type="tel"
				   id="cellphone"
				   placeholder="@lang('system.inform_the_m', ['value' => trans('system.cellphone')])"
				   value="{{ !is_null($patient) ? $patient->cellphone : old('cellphone') }}"
				   name="cellphone" />
			@if ($errors->has('cellphone'))
				<label id="cellphone-error"
					   class="error"
					   for="cellphone"><strong>{{ $errors->first('cellphone') }}</strong></label>
			@endif
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-12">
		<label for="sex">@lang('system.sex')</label>
		<div class="form-group">
			<select class="form-control show-tick ms select2"
					name="sex"
					id="sex"
					data-placeholder="Selecione">
				@if (!is_null($patient))
					<option value="M" {{ $patient->sex == 'M' ? 'selected="selected"' : '' }}>
						@lang('system.male')
					</option>
					<option value="F" {{ $patient->sex == 'F' ? 'selected="selected"' : '' }}>
						@lang('system.female')
					</option>
				@else
					<option value="M" {{ old('sex') == 'M' ? 'selected="selected"' : '' }}>
						@lang('system.male')
					</option>
					<option value="F" {{ old('sex') == 'F' ? 'selected="selected"' : '' }}>
						@lang('system.female')
					</option>
				@endif
			</select>
		</div>
	</div>
</div>