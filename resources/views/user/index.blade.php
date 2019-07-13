@extends('user.layouts.app')

@section('content')

<!-- contest list start -->
<section class="list-contests" id="list-contests">


</section>
<div class="ajax-loading m-t-10"> <center> <img src="{{asset('user/images/loader2.gif')}}" class="img-responsive" width="50px"> </center> </div>
<div class="viewmore-box t-c">
  <button class="view-btn f14">View More</button>
</div>

@endsection

@push('scripts')
<!-- <script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script> -->
<script src="{{ asset('user/js/jquery-3.3.1.js') }}"></script>

<script>
var page = 1; 
load_more(page); 
$('.view-btn').click(function() { 
        page++; 
        load_more(page); //load content   
      });     
function load_more(page){
  $.ajax({
    url: '?page=' + page,
    type: "get",
    datatype: "html",
    beforeSend: function()
    {
      $('.ajax-loading').show();
    }
  })
  .done(function(data)
  {
    if(data.length == 0){
      console.log(data.length);

      $('.viewmore-box').html("No More Contests...");
      $('.ajax-loading').hide();
      return;
    }
            $('.ajax-loading').hide(); //hide loading animation once data is received
            $("#list-contests").append(data); //append data into #results element          
          })
  .fail(function(jqXHR, ajaxOptions, thrownError)
  {
    alert('No response from server');
  });
}
</script>
@endpush