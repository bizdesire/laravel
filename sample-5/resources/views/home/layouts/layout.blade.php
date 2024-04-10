<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
.custom-loading.loader {
    position: fixed;
    background: #ffffffa8;
    height: 100%;
    width: 100%;
    top: 0;
    z-index: 999;
    display:none;
}
      </style>
  </head>
  <body style="background:#f3f3f3">

  <div class="custom-loading loader">
      <img src="{{url('ajax-loader.gif')}}">
    </div>
   @include('home.includes.topbar')
  <div class="container" style="margin-top:50px">
   <div class="row"> @yield('content')</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
 @yield('scripts')
 
    <script>
        $(document).ready(function(){
            $("#copyButton").click(function(){
                var url = $(this).data('url');
                copyToClipboard(url);
                alert("URL copied to clipboard: " + url);
            });
        });

        function copyToClipboard(text) {
            var dummy = document.createElement("textarea");
            document.body.appendChild(dummy);
            dummy.value = text;
            dummy.select();
            document.execCommand("copy");
            document.body.removeChild(dummy);
        }
    </script>
 
  </body>
</html>