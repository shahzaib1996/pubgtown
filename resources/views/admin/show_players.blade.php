@extends('admin.layouts.app')

@section('content')

<section class="content-header">
	<h1>
		Players
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
              <h3 class="box-title">Players</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="contestTable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID#</th>
                  <th>Name</th>
                  <th>Nick</th>
                  <th>Email</th>
                  <th>Join Date</th>
                  <th>View</th>
                  <th>Contests Joined</th>
                </tr>
                </thead>
                <tbody>
                
                @foreach( $players as $player )
                <tr>
                  <td> {{$player->id}} </td>
                  <td> {{$player->name}} </td>
                  <td> {{$player->nick}} </td>
                  <td> {{$player->email}} </td>
                  <td> {{$player->created_at}} </td>
                  
                  <td>
                      <a href="{{route('admin.player',[ 'id' => $player->id ])}}" class="btn btn-info"> <i class="fa fa-list"></i> </a>
                  </td>
                  <td> {{count($player->contest_player)}} </td>
                  
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

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
