@include('frontend.layouts.head')
<body>
@include('frontend.layouts.main_nav')

<div class="container push-down" style="padding-bottom:50px">       
     <div class="row push-down-thin">        
        <div class="col-sm-12"> 
        @yield('content','<h1>You forgot Content yield Dude??</h1>')
        </div>
       
    </div>
</div>
@include('frontend.layouts.footer')