@extends('admin.layouts.app')

@section('content')

<section class="content-header">
	<h1>
		Create Contest
	</h1>  
</section>

<!-- Main content -->
<section class="content container-fluid">

<!--------------------------
 | Your Page Content Here |
 -------------------------->
 <div class="row">
 	<div class="col-md-8 col-md-offset-2">
        @if(session()->has('message'))
        <div class="alert {{session('class')}}"><center>{{session('message')}}</center></div>
        @endif

        @if($contest)
 		<div class="box box-success">
 			<div class="box-header with-border">
 				<h3 class="box-title">Edit Contest</h3>
 			</div>
 			<!-- /.box-header -->
 			<!-- form start -->
 			<form action="/admin/contest/update" method="POST" class="form-horizontal">
 				<div class="box-body">
 					@csrf

                    <div class="form-group">
                        <label class="col-sm-2 control-label">ID</label>

                        <div class="col-sm-10">
                            <input type="text" name="id" value="{{$contest->id}}" class="form-control" required readOnly>
                        </div>
                    </div>

 					<div class="form-group">
 						<label class="col-sm-2 control-label">Type</label>

 						<div class="col-sm-10">
 							<select name="type" id="type" class="form-control" required>
                                <option value="solo">Solo</option>
 								<option value="squad">Squad</option>
 							</select>
 						</div>
 					</div>

 					<div class="form-group">
 						<label class="col-sm-2 control-label">Map</label>

 						<div class="col-sm-10">
 							<select name="map" id="map" class="form-control" required>
 								<option value="erangel">Erangel</option>
 								<option value="miramar">Miramar</option>
 								<option value="sanhok">Sanhok</option>
 								<option value="vikindi">Vikindi</option>
 							</select>
 						</div>
 					</div>

 					<div class="form-group">
 						<label class="col-sm-2 control-label">Date of Contest</label>
 						<div class="col-sm-10">
 							<div class="input-group date">
                                <input type="date" name="contestDate" value="{{$contest->contest_date}}" class="form-control pull-right" required>
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
 							</div>
 						</div>
 					</div>

 					<div class="form-group">
 						<label class="col-sm-2 control-label">Time of Contest</label>
 						<div class="col-sm-10">
 							<div class="input-group">
 								<input type="text" name="contestTime" value="{{$contest->time}}" class="form-control timepicker" required>
 								<div class="input-group-addon">
 									<i class="fa fa-clock-o"></i>
 								</div>
 							</div>
 						</div>
 					</div>

 					<div class="form-group">
 						<label class="col-sm-2 control-label">Prize Pool</label>
 						<div class="col-sm-10">
 							<input type="number" name="prizePool" id="prizePool" value="{{$contest->prize_pool}}" class="form-control calculate" placeholder="" required readOnly>
 						</div>
 					</div>

 					<div class="form-group">
 						<label class="col-sm-2 control-label">Entry Fee</label>

 						<div class="col-sm-10">
 							<input type="number" name="entryFee" id="entryFee" value="{{$contest->entry_fee}}" class="form-control tc" placeholder="" required>
 						</div>
 					</div>

 					<div class="form-group">
 						<label class="col-sm-2 control-label">Per Kill</label>

 						<div class="col-sm-10">
 							<input type="number" name="perKill" id="perKill" value="{{$contest->per_kill}}" class="form-control calculate" placeholder="" required>
 						</div>
 					</div>

 					<div class="form-group">
 						<label class="col-sm-2 control-label">Rank #1</label>

 						<div class="col-sm-10">
 							<input type="number" name="rank1" id="rank1" value="{{$contest->rank_1}}" class="form-control calculate" placeholder="" required>
 						</div>
 					</div>

 					<div class="form-group">
 						<label class="col-sm-2 control-label">Rank #2</label>

 						<div class="col-sm-10">
 							<input type="number" name="rank2" id="rank2" value="{{$contest->rank_2}}" class="form-control calculate" placeholder="" required>
 						</div>
 					</div>

 					<div class="form-group">
 						<label class="col-sm-2 control-label">Rank #3</label>

 						<div class="col-sm-10">
 							<input type="number" name="rank3" id="rank3" value="{{$contest->rank_3}}" class="form-control calculate" placeholder="" required>
 						</div>
 					</div>

 					<div class="form-group">
 						<label class="col-sm-2 control-label">Rank #4</label>

 						<div class="col-sm-10">
 							<input type="number" name="rank4" id="rank4" value="{{$contest->rank_4}}" class="form-control calculate" placeholder="" required>
 						</div>
 					</div>

 					<div class="form-group">
 						<label class="col-sm-2 control-label">Rank #5</label>

 						<div class="col-sm-10">
 							<input type="number" name="rank5" id="rank5" value="{{$contest->rank_5}}" class="form-control calculate" placeholder="" required>
 						</div>
 					</div>

 					<div class="form-group">
 						<label class="col-sm-2 control-label">No of Teams</label>

 						<div class="col-sm-10">
 							<input type="number" name="noOfTeams" id="noOfTeams" value="{{$contest->no_of_teams}}" class="form-control tc calculate" placeholder="" required>
 						</div>
 					</div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Total Collection</label>

                        <div class="col-sm-10">
                            <input type="number" name="totalCollection" id="totalCollection" value="{{$contest->total_collection}}" class="form-control" placeholder="" required readOnly>
                        </div>
                    </div>


 				</div>
 				<!-- /.box-body -->
 				<div class="box-footer">
 					<button type="submit" class="btn btn-success btn-lg pull-right">Update</button>
 				</div>
 				<!-- /.box-footer -->
 			</form>
 		</div>
        @endif
 	</div>
 </div>

</section>
@endsection

@push('scripts')


<!-- <script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> -->
<script src="{{ asset('admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}" ></script>
<!-- bootstrap time picker -->
<!-- <script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script> -->
<script src="{{ asset('admin/plugins/timepicker/bootstrap-timepicker.min.js') }}" ></script>


<script>
$(function () {

    //Date picker
    $('#datepicker').datepicker({
    	autoclose: true
    })

    //Timepicker
    $('.timepicker').timepicker({
    	showInputs: false
    })

    $('.tc').keyup(function(){
        let ef = $('#entryFee').val();
        let not = $('#noOfTeams').val();
        $('#totalCollection').val(ef*not);
    });

    $('.calculate').keyup(function(){
        let pk = parseInt($('#perKill').val());
        let r1 = parseInt($('#rank1').val());
        let r2 = parseInt($('#rank2').val());
        let r3 = parseInt($('#rank3').val());
        let r4 = parseInt($('#rank4').val());
        let r5 = parseInt($('#rank5').val());
        let not = parseInt($('#noOfTeams').val());
        $('#prizePool').val(r1+r2+r3+r4+r5+(pk*not));
    });

    $('#map').val('{{$contest->map}}');
    $('#type').val('{{$contest->type}}');

})


</script>
@endpush
