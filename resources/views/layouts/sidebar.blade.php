<?php $name = Request::path(); ?>
<div class="sidebar" data-color="white" data-active-color="danger">
   <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
      -->
   <div class="logo">
      
      <a href="<?php echo url('/'); ?>" class="simple-text logo-normal">
         <div class="logo-image-big text-center">
            <img src="{{asset('images/concreteasap-logo.png')}}" alt="Concrete ASAP" title="Concrete ASAP" style="max-width: 225px">
         </div>
      </a>
   </div>
   <div class="sidebar-wrapper ps-container ps-theme-default ps-active-x" data-ps-id="bd18f92f-90ed-1128-56bf-1f8f1ebb91b6">
      <ul class="nav">
         <li class="<?php echo $name === "home" ? "active" : ""; ?>">
            <a href="/home">
               <i class="nc-icon nc-shop"></i>
               <p>Dashboard</p>
            </a>
         </li> 
         <li class="<?php echo $name === "contractor" ? "active" : ""; ?>">
            <a href="/contractor">
               <i class="nc-icon nc-single-02"></i>
               <p>Contractor</p>
            </a>
         </li>
         <li class="<?php echo $name === "rep" ? "active" : ""; ?>">
            <a href="/rep">
               <i class="nc-icon nc-single-02"></i>
               <p>REP</p>
            </a>
         </li>
         <li class="<?php echo $name === "order" ? "active" : ""; ?>">
            <a href="/order">
               <i class="nc-icon nc-single-copy-04"></i>
               <p>Posted Jobs</p>
            </a>
         </li>
         <li class="<?php echo $name === "bids" ? "active" : ""; ?>">
            <a href="/bids">
               <i class="nc-icon nc-single-copy-04"></i>
               <p>Bids</p>
            </a>
         </li>
         <li  class="<?php echo $name === "completed-jobs" ? "active" : ""; ?>">
            <a href="/completed-jobs">
               <i class="nc-icon nc-single-copy-04"></i>
               <p>Completed Jobs</p>
            </a>
         </li>
      </ul>
      <div class="ps-scrollbar-x-rail" style="width: 260px; left: 0px; bottom: 0px;">
         <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 258px;"></div>
      </div>
      <div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;">
         <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
      </div>
   </div>
</div>