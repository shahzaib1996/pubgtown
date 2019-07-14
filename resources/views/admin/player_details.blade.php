@extends('admin.layouts.app')


@section('content')

<section class="content-header">
	<h1>
		Player Details (ID: {{$player->id}})
	</h1>  
</section>

<!-- Main content -->
<section class="content container-fluid">

 <div class="row">
  <div class="col-md-12">

    @if(session()->has('message'))
    <div class="alert {{session('class')}}"><center>{{session('message')}}</center></div>
    @endif

    @if($player)
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab">
          Player Details 
        </a></li>
        <li><a href="#tab_2" data-toggle="tab">Contests Joined</a></li>

      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1">

          <div class="box-body">

            <div class="box box-solid">

              <!-- /.box-header -->
              <div class="box-body">
                <dl class="dl-horizontal" style="font-size: 16px;font-weight: normal !important;">
                  <dt>ID</dt>
                  <dd>{{$player->id}}</dd>

                  <dt>Name</dt>
                  <dd>{{$player->name}}</dd>

                  <dt>Nick</dt>
                  <dd>{{$player->nick}}</dd>

                  <dt>Balance</dt>
                  <dd>{{$player->balance}}</dd>

                  <dt>Email</dt>
                  <dd> {{$player->email}} </dd>

                  <dt>Joined On</dt>
                  <dd>{{$player->created_at}}</dd>

                  <dt>Contest Joined</dt>
                  <dd>{{count($player->contest_player)}}</dd>


                </dl>
              </div>
              <!-- /.box-body -->

            </div>
          </div>

        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">

          <div class="box-body">
            <table id="pc" class="table table-bordered table-hover f16">
              <thead>
                <tr>
                  <th width="5%">S.No</th>
                  <th width="5%">ID</th>
                  <th>User Join Nick</th>
                  <th>Type</th>
                  <th>Map</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>View</th>
                </tr>
              </thead>
              <tbody>
                @php $count=1; @endphp
                
                @foreach($player->contest_player as $contest)
                <tr>
                  <td> {{$count}} </td>
                  <td> {{$contest->contest_id}} </td>
                  <td> {{$contest->user_join_nick}} </td>
                  <td> {{$contest->contest->type}} </td>
                  <td> {{$contest->contest->map}} </td>
                  <td> {{Carbon\Carbon::parse($contest->contest->contest_date)->isoformat('MMM D,Y (dddd)')}} <br> {{$contest->contest->contest_date}} </td>
                  <td> {{Carbon\Carbon::parse($contest->contest->contest_time)->isoformat('h:mm a')}} </td>
                  <td> <a href="{{route('admin.contest',[ 'id' => $contest->contest_id ])}}" class="btn btn-info"> <i class="fa fa-list"></i> </a> </td>
                </tr>
                @php $count++ @endphp

                @endforeach
                
              </tbody>
            </table>
          </div>

        </div>
        <!-- /.tab-pane -->

      </div>
      <!-- /.tab-content -->
    </div>
    @endif




  </div> <!-- Col end -->

</section>
@endsection

@push('css')

<style type="text/css">
.table>thead>tr>th {
  vertical-align: middle;
  white-space: nowrap; overflow: hidden; text-overflow:ellipsis;
}
dt,dd {
  font-weight: normal !important;
  line-height: 40px; 
}
.f16 {
  font-size: 16px !important;
}
.red {
  color: red !important;
}
.green{
  color: green !important;
}
</style>

@endpush

@push('scripts')


<!-- <script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> -->
<script src="{{ asset('admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}" ></script>
<!-- bootstrap time picker -->
<!-- <script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script> -->
<script src="{{ asset('admin/plugins/timepicker/bootstrap-timepicker.min.js') }}" ></script>


<script>
  $(function () {

    $('#pc').dataTable({
      "aaSorting": []
    });

    // $('.pay-btn').click(function(){
    //   var contest_id = parseInt(''); //$contest->id
    //   var player_id = $(this).attr('id');
    //   var that = $(this);

    //   $.post("{{url('/admin/contest/player/pay')}}",
    //   {
    //    "_token": "{{ csrf_token() }}",
    //    contest_id: contest_id,
    //    player_id: player_id

    //  },
    //  function(data,status) {

    //   if(data === "1") {
    //     that.parent().prev().html('');
    //     that.parent().prev().html('<label class="label label-success">Paid</label>');
    //     // alert(that.attr('id'));
    //   } else {
    //     alert("Failed to Pay");
    //   } 

    //  } 

    //  );

    // }); //end click event

  })


</script>
@endpush
