@section('extra-scripts')
    <script src="{{ asset('themes/dashboard/jquery.autocomplete.min.js') }}"></script>
	<script type="text/javascript">
        $('#doctor').blur(function () {
            if (!$(this).val().length) {
                $(`input[name="doctor_id"]`).val('');
            }
        });
        $('#doctor').autocomplete({
            triggerSelectOnValidInput: false,
            minChars: 2,
            lookupLimit: 10,
            lookup: function (query, done) {
                $.ajax({
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    url: "{{ route('dashboard.doctors.json') }}",
                    dataType: "json",
                    type: "POST",
                    data: {name: query}
                }).done((response) => {
                    done({suggestions: response.map(dataItem => ({value: `${dataItem.name}`, ...dataItem}))});
                }).fail((xhr, textStatus, errorThrown) => {
                    console.log(textStatus);
                });
            },
            onSelect: function (suggestion) {
                const {id} = suggestion;
                $(`input[name="doctor_id"]`).val(id);
            }
        });

        $('#patient').blur(function () {
            if (!$(this).val().length) {
                $(`input[name="patient_id"]`).val('');
            }
        });
        $('#patient').autocomplete({
            triggerSelectOnValidInput: false,
            minChars: 2,
            lookupLimit: 10,
            lookup: function (query, done) {
                $.ajax({
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    url: "{{ route('dashboard.patients.json') }}",
                    dataType: "json",
                    type: "POST",
                    data: {name: query}
                }).done((response) => {
                    done({suggestions: response.map(dataItem => ({value: `${dataItem.name}`, ...dataItem}))});
                }).fail((xhr, textStatus, errorThrown) => {
                    console.log(textStatus);
                });
            },
            onSelect: function (suggestion) {
                const {id} = suggestion;
                $(`input[name="patient_id"]`).val(id);
            }
        });
	</script>
@endsection