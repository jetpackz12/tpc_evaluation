 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #00563B;">
   <!-- Brand Logo -->
   <a href="<?php echo ROOT; ?>adminDashboard" class="brand-link">
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
           <a href="<?php echo ROOT; ?>adminDashboard" class="nav-link d-flex justify-content-start align-items-center" id="dashboard">
             <i class="nav-icon fas fa-tachometer-alt mr-2" style="font-size: 20px;"></i>
             <p>
               Dashboard
             </p>
           </a>
         </li>
         <li class="nav-item" id="studentManagement">
            <a href="#" class="nav-link d-flex justify-content-start align-items-center" id="studentManagementLink">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Student Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo ROOT; ?>pendingAccount" class="nav-link" id="pendingAccount">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending Account</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo ROOT; ?>approvedAccount" class="nav-link" id="approvedAccount">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approved Account</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo ROOT; ?>cancelledAccount" class="nav-link" id="cancelledAccount">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cancelled Account</p>
                </a>
              </li>
            </ul>
          </li>
         <li class="nav-item">
           <a href="<?php echo ROOT; ?>teacherManagement" class="nav-link d-flex justify-content-start align-items-center" id="teacherManagement">
             <i class="fa fa-chalkboard-teacher mr-2" style="font-size: 20px;"></i>
             <p>
              Teacher Management
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="<?php echo ROOT; ?>programManagement" class="nav-link d-flex justify-content-start align-items-center" id="programManagement">
             <i class="fa fa-clipboard-list mr-2" style="font-size: 25px;"></i>
             <p>
              Program Management
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="<?php echo ROOT; ?>subjectManagement" class="nav-link d-flex justify-content-start align-items-center" id="subjectManagement">
             <i class="fa fa-clipboard-list mr-2" style="font-size: 25px;"></i>
             <p>
              Subject Management
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="<?php echo ROOT; ?>categoryManagement" class="nav-link d-flex justify-content-start align-items-center" id="categoryManagement">
             <i class="fa fa-clipboard-list mr-2" style="font-size: 25px;"></i>
             <p>
              Category Management
             </p>
           </a>
         </li>
         <li class="nav-item" id="evaluationManagement">
            <a href="#" class="nav-link d-flex justify-content-start align-items-center" id="evaluationManagementLink">
              <i class="fa fa-comments mr-2" style="font-size: 20px;"></i>
              <p>
              Evaluation Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo ROOT; ?>faceToFaceQuestion" class="nav-link" id="faceToFaceQuestion">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Face To Face Question</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo ROOT; ?>onlineQuestion" class="nav-link" id="onlineQuestion">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Online Question</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo ROOT; ?>subjectMatterQuestion" class="nav-link" id="subjectMatterQuestion">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subject Matter Question</p>
                </a>
              </li>
            </ul>
          </li>
         <li class="nav-item">
           <a href="<?php echo ROOT; ?>evaluationResult" class="nav-link d-flex justify-content-start align-items-center" id="evaluationResult">
             <i class="fa fa-chart-line mr-2" style="font-size: 20px;"></i>
             <p>
              Evaluation Result
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