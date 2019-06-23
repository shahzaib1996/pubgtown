@extends('admin.layouts.app')

@section('content')

<section class="content-header">
	<h1>
		Withdraw Requests
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
              <table id="withdrawTable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID#</th>
                  <th>User ID</th>
                  <th>User Name</th>
                  <th>User Mobile Acc</th>
                  <th>Withdraw Amount</th>
                  <th>Requested On</th>
                  <th>Status</th>
                  <th>Updated On</th>
                  <th>Message</th>
                  <th>Action</th>

                </tr>
                </thead>
                <tbody>
                
                @foreach( $withdraws as $withdraw )
                <tr>
                  <td> {{$withdraw->id}} </td>
                  <td> {{$withdraw->user_id}} </td>
                  <td> {{$withdraw->user->name}} <span class="label label-primary"> {{$withdraw->user->nick}} </span> </td>
                  <td> {{$withdraw->user->mobile}} </td>
                  <td>Rs. {{$withdraw->amount}} </td>
                  <td> {{$withdraw->created_at}} </td>
                  <td> 
                        @if( $withdraw->status == 0 )
                        <label class="label label-warning">Pending</label>
                        @elseif( $withdraw->status == 1 )
                        <label class="label label-success">Completed</label>
                        @elseif( $withdraw->status == 2 )
                        <label class="label label-danger">Refunded</label>
                        @endif
                  </td>
                  <td> {{$withdraw->updated_at}} </td>
                  <td> {{$withdraw->transaction_id}} </td>
                  <td> 
                    <button class="btn btn-success wd-action" data-withdraw-id="{{$withdraw->id}}" data-amount="{{$withdraw->amount}}" data-user-id="{{$withdraw->user_id}}" data-toggle="modal" data-target="#withdrawActionModal" @if($withdraw->status != 0) disabled @endif> Action </button>
                  </td>
                  
                  
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

<!-- Modal -->
<div class="modal fade" id="withdrawActionModal" tabindex="-1" role="dialog" aria-labelledby="withdrawActionModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Withdraw Action</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{ route('admin.withdraw.status') }}" method="POST">
      <div class="modal-body"> 
          @csrf
          <input type="hidden" name="withdraw_id" id="withdraw_id" value="" required>
          <input type="hidden" name="amount" id="amount" value="" required>
          <input type="hidden" name="user_id" id="user_id" value="" required>
        <div class="form-group">
          <label for="message">Message</label>
          <input type="text" class="form-control" name="message" id="message" placeholder="Enter message..." required>
        </div>
        <div class="form-group">
          <label for="status">Status</label>
          <select class="form-control" name="status" id="status" required>
            <option value="">select status</option>
            <option value="1">Complete</option>
            <option value="2">Refund</option>
          </select>
        </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
        </form>
    </div>
  </div>
</div>


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

        $('#withdrawTable').dataTable({
          "aaSorting": []
        });


        $('.wd-action').click(function(){
          var withdraw_id = $(this).data('withdraw-id');
          var amount = $(this).data('amount');
          var user_id = $(this).data('user-id');
          $('#withdraw_id').val(withdraw_id);
          $('#amount').val(amount);
          $('#user_id').val(user_id);

        })

    })


</script>
@endpush
