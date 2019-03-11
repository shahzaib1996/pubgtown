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

        <div class="alert alert-success">Success! Contest Created.</div>

 		<div class="box box-info">
 			<div class="box-header with-border">
 				<h3 class="box-title">New Contest</h3>
 			</div>
 			<!-- /.box-header -->
 			<!-- form start -->
 			<form action="/createcontest" method="POST" class="form-horizontal">
 				<div class="box-body">
 					@csrf
 					<div class="form-group">
 						<label class="col-sm-2 control-label">Type</label>

 						<div class="col-sm-10">
 							<select name="type" class="form-control">
 								<option value="solo">Solo</option>
 							</select>
 						</div>
 					</div>

 					<div class="form-group">
 						<label class="col-sm-2 control-label">Map</label>

 						<div class="col-sm-10">
 							<select name="map" class="form-control">
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
 								<div class="input-group-addon">
 									<i class="fa fa-calendar"></i>
 								</div>
 								<input type="text" name="date" class="form-control pull-right" id="datepicker">
 							</div>
 						</div>
 					</div>

 					<div class="form-group">
 						<label class="col-sm-2 control-label">Time of Contest</label>

 						<div class="col-sm-10">
 							<div class="input-group">
 								<input type="text" name="time" class="form-control timepicker">

 								<div class="input-group-addon">
 									<i class="fa fa-clock-o"></i>
 								</div>
 							</div>
 						</div>
 					</div>

 					<div class="form-group">
 						<label class="col-sm-2 control-label">Prize Pool</label>

 						<div class="col-sm-10">
 							<input type="number" name="prizePool" class="form-control" placeholder="Email">
 						</div>
 					</div>

 					<div class="form-group">
 						<label class="col-sm-2 control-label">Entry Fee</label>

 						<div class="col-sm-10">
 							<input type="number" name="entryFee" class="form-control" placeholder="Email">
 						</div>
 					</div>

 					<div class="form-group">
 						<label class="col-sm-2 control-label">Per Kill</label>

 						<div class="col-sm-10">
 							<input type="number" name="perKill" class="form-control" placeholder="Email">
 						</div>
 					</div>

 					<div class="form-group">
 						<label class="col-sm-2 control-label">Rank #1</label>

 						<div class="col-sm-10">
 							<input type="number" name="rank1" class="form-control" placeholder="Email">
 						</div>
 					</div>

 					<div class="form-group">
 						<label name="rank2" class="col-sm-2 control-label">Rank #2</label>

 						<div class="col-sm-10">
 							<input type="number" class="form-control" placeholder="Email">
 						</div>
 					</div>

 					<div class="form-group">
 						<label class="col-sm-2 control-label">Rank #3</label>

 						<div class="col-sm-10">
 							<input type="number" name="rank3" class="form-control" placeholder="Email">
 						</div>
 					</div>

 					<div class="form-group">
 						<label class="col-sm-2 control-label">Rank #4</label>

 						<div class="col-sm-10">
 							<input type="number" name="rank4" class="form-control" placeholder="Email">
 						</div>
 					</div>

 					<div class="form-group">
 						<label class="col-sm-2 control-label">Rank #5</label>

 						<div class="col-sm-10">
 							<input type="number" name="rank5" class="form-control" placeholder="Email">
 						</div>
 					</div>

 					<div class="form-group">
 						<label class="col-sm-2 control-label">No of Teams</label>

 						<div class="col-sm-10">
 							<input type="number" name="noOfTeams" class="form-control" placeholder="Email">
 						</div>
 					</div>

 					


 				</div>
 				<!-- /.box-body -->
 				<div class="box-footer">
 					<button type="submit" class="btn btn-info pull-right">Create</button>
 				</div>
 				<!-- /.box-footer -->
 			</form>
 		</div>
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
    $('.timepi