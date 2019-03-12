@extends('admin.layouts.app')

@section('content')

<section class="content-header">
	<h1>
		Create Contest
	</h1>  
</section>

<!-- Main content -->
<section class="content container-fluid">

   <div class="row">
      <div class="col-md-12">

        @if(session()->has('message'))
        <div class="alert {{session('class')}}"><center>{{session('message')}}</center></div>
        @endif

        <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Contests</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="contestTable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID#</th>
                  <th>Active</th>
                  <th>Type</th>
                  <th>Map</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Prize Pool</th>
                  <th>Entry Fee</th>
                  <th>Per Kill</th>
                  <th>Rank#1</th>
                  <th>Rank#2</th>
                  <th>Rank#3</th>
                  <th>Rank#4</th>
                  <th>Rank#5</th>
                  <th>No of Teams</th>
                  <th>Total Collection</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                
                @foreach( $contests as $contest )
                <tr class="@if( Carbon\Carbon::parse($contest->contest_date)->format('d-m-Y') == Carbon\Carbon::parse(now())->format('d-m-Y') ) bg-green @endif ">
                  <td> {{$contest->id}} </td>
                  <td>
                      @if( $contest->is_active == 1 )
                        <label class="label label-success">Active</label>
                      @else
                        <label class="label label-danger">Closed</label>
                      @endif
                  </td>
                  <td>{{$contest->type}}</td>
                  <td>{{$contest->map}}</td>
                  <td>{{ Carbon\Carbon::parse($contest->contest_date)->format('d-m-Y') }}</td>
                  <td>{{ Carbon\Carbon::parse($contest->contest_time)->format('h:i A') }}</td>
                  <td>Rs. {{$contest->prize_pool}}</td>
                  <td>Rs. {{$contest->entry_fee}}</td>
                  <td>Rs. {{$contest->per_kill}}</td>
                  <td>Rs. {{$contest->rank_1}}</td>
                  <td>Rs. {{$contest->rank_2}}</td>
                  <td>Rs. {{$contest->rank_3}}</td>
                  <td>Rs. {{$contest->rank_4}}</td>
                  <td>Rs. {{$contest->rank_5}}</td>
                  <td>{{$contest->no_of_teams}}</td>
                  <td>Rs. {{$contest->total_collection}}</td>
                  <td>

                      <a href="../admin/contest/edit/{{$contest->id}}" class="btn btn-info @if($contest->is_active == 0) disabled @endif"> <i class="fa fa-edit"></i> </a>
                  </td>
                  <td>

                      <a href="../admin/contest/delete/{{$contest->id}}" class="btn btn-warning @if($contest->is_active == 0) disabled @endif"> <i class="fa fa-trash-o"></i> </a>
                  </td>
                </tr>
                @endforeach
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

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

        $('#contestTable').dataTable({
          "aaSorting": []
        });

    })


</script>
@endpush
