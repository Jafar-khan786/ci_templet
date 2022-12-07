  <?php 
       error_reporting(0);
       $admin_id = $this->session->userdata['id']['id'];
      $admin_name = $this->session->userdata['name']['name']; 
      $admin_email= $this->session->userdata['email']['email']; 
    
      if($admin_id==""){?><script>alert('Please Login to your account'); window.location.assign('<?php echo base_url();?>Login/logout'); </script><?php }

     ?>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="">
    <title>YQ Admin | Home</title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>material/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>material/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>material/dist/css/style.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>material/assets/libs/select2/dist/css/select2.min.css">
      
     
   
</head>

<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>



  
  <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                
    
    
  
  <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="<?php echo base_url()?>Home">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                          
                             Doctors
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                           
                            
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- mega menu -->
                    
                       
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                        
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown"> 
             <style>
             .badge-notify{
   background:orange;
   position:absolute;
   top:6px !important;;
   margin-left:15px !important;
   border-radius:50px !important;;
   font-size:12px !important;;
  }
  
             .badges-notifys{
   background:orange;
   position: relative;
   top:0px !important;;
   margin-left:15px !important;
   border-radius:50px !important;;
   font-size:12px !important;;
  }
             </style>           
   


                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="yes();"><i class="mdi mdi-bell font-24">
                             <span class="badge badge-notify noticediv"></span>
                             </i>
                           
                                
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                <span class="with-arrow"><span class="bg-primary"></span></span>
                                <ul class="list-style-none">
                                    <li>
                                        <div class="drop-title bg-primary text-white">
                                            <h4 class="m-b-0 m-t-5"> New</h4>
                                            <span class="font-light">Notifications</span>
                                        </div>
                                    </li>
                                    <li>
                                
                                    </li>
                                    <li>
<a class="nav-link text-center m-b-5 text-dark" href="<?php echo base_url();?>Home/notification"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
   <a class="nav-link dropdown-toggle waves-effect waves-dark" href="<?php echo base_url()?>Home/chat" id="2"> <i class="font-24 mdi mdi-comment-processing"></span></i>
                                
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2">
                                <span class="with-arrow"><span class="bg-danger"></span></span>
                                
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url();?>material/assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow"><span class="bg-primary"></span></span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class=""><img src="<?php echo base_url();?>material/assets/images/users/1.jpg" alt="user" class="img-circle" width="60"></div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0"><?php 
                            $sqllad = $this->db->query("select * from admin where id = '$admin_id'");
                                   foreach($sqllad->result_array() as $rrd)
                                          {
                                            echo  $adname = $rrd['name'];
                                          }
                                       
                                        ?></h4>
                                        <p class=" m-b-0"><?php
                                         echo $admin_email;
                                         ?></p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="<?php echo base_url();?>Profile/myprofile"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url();?>Profile/myprofile"><i class="ti-settings m-r-5 m-l-5"></i> Password Change</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url();?>Login/logout"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                                <div class="p-l-30 p-10"><a href="<?php echo base_url();?>Profile/myprofile" class="btn btn-sm btn-success btn-rounded">View Profile</a></div>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
  <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile d-flex no-block dropdown m-t-20">
                                <div class="user-pic">

                                    <img src="<?php echo base_url();?>material/assets/images/users/1.jpg" alt="users" class="rounded-circle" width="40" /></div>
                                <div class="user-content hide-menu m-l-10">
                                    <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <h5 class="m-b-0 user-name font-medium"><?php $sqllad = $this->db->query("select * from admin where id = '$admin_id'");
                                   foreach($sqllad->result_array() as $rrd)
                                          {
                                            echo  $adname = $rrd['name'];
                                          }
                                       ?> <i class="fa fa-angle-down"></i></h5>
                                        <span class="op-5 user-email"><?php echo $admin_email;?></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                                        <a class="dropdown-item" href="<?php echo base_url();?>Profile/myprofile"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                        
                                        
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo base_url();?>Profile/myprofile"><i class="ti-settings m-r-5 m-l-5"></i> Password Change</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo base_url();?>Login/logout"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
                        <li class="p-15 m-t-10"><a href="javascript:void(0)" class="btn btn-block create-btn text-white no-block d-flex align-items-center"><i class="fa fa-plus-square"></i> <span class="hide-menu m-l-5">
                            <?php 
                            if($admin_id=='1'){ echo "Admin"; }
                            else { echo "Subadmin"; } 
                            ?>
                        </span> </a></li>
                        <!-- User Profile-->

                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Personal</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Home </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url();?>Home" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Dashboard </span></a></li>
                                                               
                            </ul>
                        </li>
                       



                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-multiple-plus"></i><span class="hide-menu">Doctors </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url();?>Doctors" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> View </span></a></li>

                                <li class="sidebar-item"><a href="<?php echo base_url();?>Doctors/add_doctor" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Add </span></a></li>
                                
                             
                                
                                
                            </ul>
                        </li>

                        <li class="sidebar-item">  <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Users </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url();?>User" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> View User </span></a></li>

                              <!--  <li class="sidebar-item"><a href="<?php echo base_url();?>User/add_user" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Add User </span></a></li>-->
                                
                             
                                
                                
                            </ul>
                        </li>
                        <li class="sidebar-item"> 
                           
                         <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-gamepad"></i><span class="hide-menu">Hospital </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url();?>Hospital" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> View </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url();?>Hospital/add_hospital" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Add </span></a></li>                                                                 
                            </ul>
                         </li>



                         <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-stadium"></i><span class="hide-menu">Speciality Master </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url();?>Specialist" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> View</span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url();?>Specialist/add_specialist" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Add</span></a></li>
                   
                            </ul>
                         </li>

                           <li class="sidebar-item">
                           
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-arrange-send-to-back"></i><span class="hide-menu">Hospital Category Master</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                              
                                 <li class="sidebar-item"><a href="<?php echo base_url();?>Hospital_Category" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> View</span></a></li>
                                  <li class="sidebar-item"><a href="<?php echo base_url();?>Hospital_Category/add_hospital_category" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Add </span></a></li>
                                                                                                
                            </ul>
                         </li>
                    
                   <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-camcorder-box"></i><span class="hide-menu">Receptionist </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url();?>Receptionist" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> View  </span></a></li>
                                
                               <li class="sidebar-item"><a href="<?php echo base_url();?>Receptionist/add_receptionist" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Add </span></a></li>
                                
                            </ul>
                        </li>

                        <li class="sidebar-item"> 
                           
                         <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-gamepad"></i><span class="hide-menu">Enquiry </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url();?>Enquiry" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> View Enquiry </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url();?>Enquiry/view_reply" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> View Reply </span></a></li>                                                                 
                            </ul>
                         </li>
                    

                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        
       