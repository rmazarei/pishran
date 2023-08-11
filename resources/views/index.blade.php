@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-2">
            	<input type="text" name="date-from" id="date-from" class="datepicker">
            </div>
            <div class="col-md-2">
            	<input type="text" name="date-to" id="date-to" class="datepicker">
            </div>
            <div class="col-md-2">
            	<button class="btn btn-default get-data">Get Data</button>
            </div>
        </div>
    </div>
@endsection


@section('script')
	<script type="text/javascript">
		$(function(){
			$(".datepicker").persianDatepicker({
				    formatter: function(unix){
				        return unix; 
				    },
				    autoClose: true
			})

			$(".get-data").on('click', function(){
				$.ajax({
					type: "POST",
					url: '/getData',
					data: {
						_token: "{{ csrf_token() }}",
						date_from: $("#date-from").val(),
						date_to: $("#date-to").val()
					},
					success: function(data){
						console.log(data)
					},
                    error: function (xhr, status, error) {
                        console.log(error);
                    }
				});
			})

		})
	</script>
@endsection