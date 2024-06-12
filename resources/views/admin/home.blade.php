 @include('admin.home-top')
   <div class="row" id="row">
    <div class="col offset-xxl-0 text-start" id="left-nav">
   @include('admin.home-left')
</div> 
<div class="col" id="main-container">
    @yield('content')
</div>
</div>
    