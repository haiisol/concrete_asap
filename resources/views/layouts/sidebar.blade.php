<?php $name = Request::path(); ?>
<div class="sidebar" data-color="white" data-active-color="danger">
   <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
      -->
   <div class="logo">
      <a href="<?php echo url('/'); ?>" class="simple-text logo-mini">
         <div class="logo-image-small">
            <i class="fa fa-user fa-2x"></i>
         </div>
      </a>
      <a href="<?php echo url('/'); ?>" class="simple-text logo-normal">
         Administrator
         <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
            </div> -->
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
         <li class="<?php echo $name === "order" ? "active" : ""; ?>">
            <a href="/order">
               <i class="nc-icon nc-cart-simple"></i>
               <p>Order</p>
            </a>
         </li>
         <li>
            <a href="/contractor">
               <i class="nc-icon nc-settings"></i>
               <p>Contractor</p>
            </a>
         </li>
         <li>
            <a href="/">
               <i class="nc-icon nc-single-02"></i>
               <p>REP</p>
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