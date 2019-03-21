@extends('admin.layouts.app')


@section('content')

<section class="content-header">
	<h1>
		Closing Contest (ID: {{$contest->id}} )
	</h1>  
</section>

<!-- Main content -->
<section class="content container-fluid">

 <div class="row">

  <div class="col-md-12">
    @if(session()->has('message'))
    <div class="alert {{session('class')}}"><center>{{session('message')}}</center></div>
    @endif
    <!-- Custom Tabs -->
    @if($contest)
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab">
          Contest Details 
          @if($contest->is_active == 1 )
          <label class="label label-success">Active</label>
          @else
          <label class="label label-danger">Closed</label>
          @endif
        </a></li>
        <li><a href="#tab_2" data-toggle="tab">Players Joined</a></li>

      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1">

          <div class="box-body">

            <div class="box box-solid">

              <!-- /.box-header -->
              <div class="box-body">
                <dl class="dl-horizontal" style="font-size: 16px;font-weight: normal !important;">
                  <dt>Type</dt>
                  <dd>{{$contest->type}}</dd>

                  <dt>Map</dt>
                  <dd>{{$contest->map}}</dd>

                  <dt>Date</dt>
                  <dd>{{Carbon\Carbon::parse($contest->contest_date)->isoformat('MMM d,Y (dddd)')}}</dd>

                  <dt>Time</dt>
                  <dd>{{Carbon\Carbon::parse($contest->contest_time)->isoformat('h:mm a')}}</dd>

                  <dt>Prize Pool</dt>
                  <dd>{{$contest->prize_pool}}</dd>

                  <dt>Entry Fee</dt>
                  <dd>{{$contest->entry_fee}}</dd>

                  <dt>Per Kill</dt>
                  <dd>{{$contest->per_kill}}</dd>

                  <dt>Rank # 1</dt>
                  <dd>{{$contest->rank_1}}</dd>

                  <dt>Rank # 2</dt>
                  <dd>{{$contest->rank_2}}</dd>

                  <dt>Rank # 3</dt>
                  <dd>{{$contest->rank_3}}</dd>

                  <dt>Rank # 4</dt>
                  <dd>{{$contest->rank_4}}</dd>

                  <dt>Rank # 5</dt>
                  <dd>{{$contest->rank_5}}</dd>

                  <dt>No of Teams</dt>
                  <dd>{{$contest->no_of_teams}}</dd>

                  <dt>Total Collection</dt>
                  <dd>{{$contest->total_collection}}</dd>


                </dl>
              </div>
              <!-- /.box-body -->

            </div>
          </div>

        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">

          <div class="box-body">
            <form action="{{route('admin.contest.player.update',['id' => $contest->id])}}" method="POST">
              @csrf
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th width="5%">S.No</th>
                    <th width="10%">ID</th>
                    <th width="40%">Players</th>
                    <th width="15%">Rank</th>
                    <th width="15%">Kills</th>
                    <th width="15%">Prize (Rs.)</th>
                    <th width="15%">Total Prize (Rs.)</th>
                  </tr>
                </thead>
                <tbody>
                  @php $count=1 @endphp
                  @foreach($contest->contest_player as $player)
                  <tr>
                    <td> {{$count}} </td>
                    <td> <input type="number" name="user_id[]" value="{{$player->user_id}}" class="form-control" readOnly required> </td>
                    <td> {{$player->user->name}} <br><span class="red">{{$player->user->nick}}</span> </td>
                    <td> <input type="number" name="rank[]" value="{{$player->rank}}" class="form-control" required> </td>
                    <td> <input type="number" name="kills[]" value="{{$player->kills}}" class="form-control" required> </td>
                    <td> <input type="number" name="prize[]" value="{{$player->prize}}" class="form-control" readOnly required> </td>
                    <td> <input type="number" name="total_prize[]" value="{{$player->pay_total_prize}}" class="form-control" readOnly required> </td>
                  </tr>
                  @php $count++ @endphp
                  @endforeach
                </tbody>
              </table>
              <input type="submit" name="submit" value="Update" class="btn btn-success">
            </form>
          </div>

        </div>
        <!-- /.tab-pane -->

      </div>
      <!-- /.tab-content -->
    </div>
    @endif
    <!-- nav-tabs-custom -->
  </div>


</div>


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

    $('#contestTable').dataTable({
      "aaSorting": []
    });

  })


</script>
@endpush
