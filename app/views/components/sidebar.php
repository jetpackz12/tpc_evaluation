 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #00563B;">
   <!-- Brand Logo -->
   <a href="<?php echo ROOT; ?>studentDashboard" class="brand-link">
     <img src="<?php echo ROOT . BOOTSTRAP; ?>img/tpc_logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     <span class="brand-text font-weight-light text-white">Teacher Evaluation</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">

     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item d-flex justify-content-center">
           <a href="<?php echo ROOT; ?>studentDashboard" class="nav-link d-flex justify-content-start align-items-center" id="dashboard">
             <i class="nav-icon fas fa-tachometer-alt mr-2" style="font-size: 20px;"></i>
             <p>
               Dashboard
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="<?php echo ROOT; ?>studentEvaluation" class="nav-link d-flex justify-content-start align-items-center" id="evaluation">
             <i class="fa fa-chalkboard mr-2" style="font-size: 20px;"></i>
             <p>
               Evaluation
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="<?php echo ROOT; ?>studentHistory" class="nav-link d-flex justify-content-start align-items-center" id="history">
             <i class="fa fa-address-book mr-2" style="font-size: 28px;"></i>
             <p>
               History
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="<?php echo ROOT; ?>studentProfile" class="nav-link d-flex justify-content-start align-items-center" id="profile">
             <i class="nav-icon far fa-user mr-2" style="font-size: 28px;"></i>
             <p>
               Profile
             </p>
           </a>
         </li>
         <li class="nav-item">
           <hr class="border border-secondary border-2">
           <a href="#" class="nav-link d-flex justify-content-start align-items-center" data-toggle="modal" data-target="#modal-logout">
             <i class="fa fa-arrow-circle-right mr-2" style="font-size: 25px;"></i>
             <p>
               Logout
             </p>
           </a>
         </li>
       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>

 <!-- Logout Modal -->
 <div class="modal fade" id="modal-logout">
   <div class="modal-dialog modal-dialog-centered">
     <div class="modal-content">
       <div class="modal-header bg-success d-flex justify-content-center align-content-center">
         <h4 class="modal-title d-flex justify-content-center align-items-center">
           <i class="fa fa-arrow-circle-right mr-1" style="font-size: 25px;"></i>
           Logout
         </h4>
       </div>
       <form action="<?php echo ROOT; ?>logout" method="POST">
        <div class="modal-body">
          <p class="text-danger text-lg">Are your sure you want to log out?</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="width: 100px;">No</button>
          <button type="submit" class="btn btn-primary" style="width: 100px;">Yes</button>
        </div>
       </form>
     </div>
     <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
 </div>
 <!-- /.modal -->