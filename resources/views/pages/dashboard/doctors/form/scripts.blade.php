@section('extra-scripts')
	<script src="{{ asset('themes/js-default/inputMask-5x.js') }}"></script>
	<script src="{{ asset('themes/dashboard/plugins/select2/select2.min.js') }}"></script>
	<script src="{{ asset('themes/dashboard/plugins/multi-select/js/jquery.multi-select.js') }}"></script>
	<script src="{{ asset('js/postcode.js') }}"></script>
	<script type="text/javascript">
        let urlPostcode = '{{ route('dashboard.address.showByPostcode') }}';
        let token = "{{ csrf_token() }}";
        $(function () {
            $('.select2').select2();
        });
        $('[data-mask]').inputmask();
        $('#cpf').inputmask({
            mask: [
                '999.999.999-99',
            ],
            keepStatic: true,
        });
        $('#cellphone').inputmask({
            mask: [
                '(99)9999-9999',
                '(99)99999-9999',
            ],
            keepStatic: true,
        });
        $('#days_week').multiSelect({
            selectableHeader: "<div class='text-center bg-green'>Selecione os dias da semana</div>",
            selectionHeader: "<div class='text-center bg-green'>Dias da semana selecionados</div>",
        });
	</script>
@endsection
