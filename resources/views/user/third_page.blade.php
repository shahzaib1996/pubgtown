@extends('user.layouts.app')

@section('content')
<!-- contest list start -->
<section class="list-menu">
  <div class="contest-box border-text p-20 wb" style="margin:20px;background: #fff !important;">
    <!-- <div style="position:absolute;height:50px;width: 85%;background:#fff;bottom: 45px;"></div> -->
   <div class='sk-ww-youtube-channel-videos' data-embed-id='26144'></div><script src='https://www.sociablekit.com/app/embed/youtube-channel-videos/widget.js'></script>

  </div>
</section>
@endsection

@push('scripts')
   <script>
     setTimeout(function(){
      $('.wb').append('<div style="position:absolute;height:50px;width: 85%;background:#fff;margin-top:-45px;"></div>');
      }, 3000);
   </script>
@endpush