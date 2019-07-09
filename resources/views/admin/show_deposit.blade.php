@extends('admin.layouts.app')

@section('content')

<section class="content-header">
	<h1>
		Deposit Requests
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
                  <th>User Mobile A/C</th>
                  <th>Deposit Amount</th>
                  <th>Transaction ID</th>
                  <th>Created On</th>
                  <th>Status</th>
                  <th>Updated On</th>
                  <th>User Message</th>
                  <th>Admin Message</th>
                  <th>Action</th>

                </tr>
                </thead>
                <tbody>
                
                @foreach( $deposits as $deposit )
                <tr>
                  <td> {{$deposit->id}} </td>
                  <td> {{$deposit->user_id}} </td>
                  <td> {{$deposit->user->name}} <span class="label label-primary"> {{$deposit->user->nick}} </span> </td>
                  <td> {{$deposit->user->mobile}} </td>
                  <td>Rs. {{$deposit->amount}} </td>
                  <td> {{$deposit->transaction_id}} </td>
                  <td> {{$deposit->created_at}} </td>
                  <td> 
                        @if( $deposit->approve_status == 0 )
                        <label class="label label-warning">Pending</label>
                        @elseif( $deposit->approve_status == 1 )
                        <label class="label label-success">Credited</label>
                        @elseif( $deposit->approve_status == 2 )
                        <label class="label label-danger">Rejected</label>
                        @endif
                  </td>
                  <td> {{$deposit->updated_at}} </td>
                  <td> {{$deposit->user_message}} </td>
                  <td> {{$deposit->admin_message}} </td>
                  <td> 
                    <button class="btn btn-success de-action" data-deposit-id="{{$deposit->id}}" data-amount="{{$deposit->amount}}" data-user-id="{{$deposit->user_id}}" data-toggle="modal" data-target="#depositActionModal" @if($deposit->approve_status != 0) disabled @endif> Action </button>
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
<div class="modal fade" id="depositActionModal" tabindex="-1" role="dialog" aria-labelledby="withdrawActionModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deposit Action</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{ route('admin.deposit.status') }}" method="POST">
      <div class="modal-body"> 
          @csrf
          <input type="hidden" name="deposit_id" id="deposit_id" value="" required>
          <input type="hidden" name="user_id" id="user_id" value="" required>

        <div class="form-group">
          <label for="message">Amount to credit in User's A/c</label>
          <input type="text" class="form-control" name="amount" id="amount" placeholder="Enter message..." required>
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <input type="text" class="form-control" name="admin_message" id="admin_message" placeholder="Enter message..." required>
        </div>
        <div class="form-group">
          <label for="status">Status</label>
          <select class="form-control" name="status" id="status" required>
            <option value="">select status</option>
            <option value="1">Credit</option>
            <option value="2">Reject</option>
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


        $('.de-action').click(function(){
          var deposit_id = $(this).data('deposit-id');
          var amount = $(this).data('amount');
          var user_id = $(this).data('user-id');
          $('#deposit_id').val(deposit_id);
          $('#amount').val(amount);
          $('#user_id').val(user_id);

        })

        $('#status').change(function(){
          if( $(this).val() == '2' ) {
            $('#amount').attr('disabled',true);
          } else {
            $('#amount').attr('disabled',false);
          }
        })

    })


</script>
@endpush
