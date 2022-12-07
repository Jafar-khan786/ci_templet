<!DOCTYPE html>
<html dir="ltr" lang="en">

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



<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
    <?php include("header.php");?>
      
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
       
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                           
                            
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            
                            <!-- ============================================================== -->
                            <!-- Info Box -->
                            <!-- ============================================================== -->
                            <div class="card-body border-top">
                                <div class="row m-b-0">
                                    <!-- col -->
                                    <div class="col-lg-3 col-md-6">
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10"><span class="text-orange display-5"><i class="mdi mdi-wallet"></i></span></div>
                                          <a href="<?php echo base_url();?>Doctors">  <div><span>Doctors</span>
                                                        
  <h3 class="font-medium m-b-0"><?php
                        $sql = $this->db->query("select * from user_management where user_type = '1'");
                         echo $cnt =  $sql->num_rows();
            ?>
                         </h3>
                                            </div></a>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <!-- col -->
                                     <div class="col-lg-3 col-md-6">
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10"><span class="text-cyan display-5"><i class="fab fa-ioxhost"></i></span></div>
                                          <a href="<?php echo base_url();?>Hospital">  <div><span>Hospitals</span>
                                                <h3 class="font-medium m-b-0"><?php
                             $sqlm = $this->db->query("select * from hospital_tbl");
                         echo $cntm =  $sqlm->num_rows();
?></h3>
                                            </div></a>
                                        </div>
                                    </div> 
                                    <!-- col -->
                                    <!-- col -->
                                    <div class="col-lg-3 col-md-6">
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10"><span class="text-info display-5"><i class="fas fa-users"></i></span></div>
                                           <a href="<?php echo base_url();?>Specialist">  <div><span>Speciality</span>
  <h3 class="font-medium m-b-0"><?php
       $sqlms = $this->db->query("select * from specialist_tbl");
                         echo $cntms =  $sqlms->num_rows();
  
?></h3></div></a>
                                        </div>
                                    </div> 
                                    <!-- col -->
                                    <!-- col -->
                                    <div class="col-lg-3 col-md-6">
                                        
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10"><span class="text-primary display-5"><i class="fab fa-connectdevelop"></i></span></div>
                                            <a href="<?php echo base_url();?>Hospital_Category"> <div><span>Categories</span>
   <h3 class="font-medium m-b-0"><?php 
        $sqlmsn = $this->db->query("select * from hospital_category");
                         echo $cntmsn =  $sqlmsn->num_rows();
   
 ?></h3> 
                                            </div></a>
                                        </div>
                                       
                                    </div> 
                                    <!-- col -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Email campaign chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-8 col-xl-6">
                       
                          
                                    <div class="row">
                            
                            <div class="col-lg-4 col-md-6">
                                <div class="card border-bottom border-cyan">
                                    <div class="card-body">
                                        <div class="d-flex no-block align-items-center">
                                             <a href="<?php echo base_url();?>Receptionist">
                                            <div>
                                                <h2>
                                                <?php 
                                                $sqlmsnc = $this->db->query("SELECT * FROM user_management WHERE doc_recep_name != ''");
                         echo $cntmsnc =  $sqlmsnc->num_rows();
                                              
                                               
?></h2></h2>
                                                <h6 class="text-cyan">Receptionists</h6>
                                            </div> </a>
                                            <div class="ml-auto">
                                                <span class="text-cyan display-6"><i class="fas fa-user-secret"></i>
                                               
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card border-bottom border-success">
                                    <div class="card-body">
                                        <div class="d-flex no-block align-items-center">
                                         <a href="<?php echo base_url();?>User">   <div>
                                                <h2>
<?php
  $sqlmsg = $this->db->query("select * from user_management where user_type = '2'");
                         echo $cntmsncs =  $sqlmsg->num_rows();

 ?></h2>
                                                <h6 class="text-success">Users</h6>
                                            </div></a>
                                            <div class="ml-auto">
                                                <span class="text-success display-6"><i class="fas fa-user-circle"></i>
                                                    <?php  ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card border-bottom border-orange">
                                    <div class="card-body">
                                        <div class="d-flex no-block align-items-center">
                                             <a href="<?php echo base_url();?>Enquiry"> <div>
                                                <h2><?php
                                                $sqlmsgm = $this->db->query("select * from enquiry_tbl");
                         echo $cntmsncsm =  $sqlmsgm->num_rows();
                                             
 ?></h2>
                                                <h6 class="text-orange">Enquiry</h6>
                                            </div> </a>
                                            <div class="ml-auto">
                                                <span class="text-orange display-6"><i class="fab fa-adversal"></i>
                                                    <?php 
                                                  

                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                        
                         
                            <div class="col-sm-12 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-row">
                                            <div class="round align-self-center round-danger"><i class="ti-calendar"></i></div>
                                            <div class="m-l-10 align-self-center">
                                                <h4 class="m-b-0">Total Received Amount</h4>
                                                <span class="text-muted">Include All Type Amount Received</span>
                                            </div>
                                            <div class="ml-auto align-self-center">
                                                <h2 class="font-medium m-b-0">
                                                <i class="fas fa-rupee-sign"></i> <?php 
                                            
        ?>
        </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <!-- Column -->
                            <div class="col-sm-12 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-row">
                                            <div class="round align-self-center round-warning"><i class="ti-settings"></i></div>
                                            <div class="m-l-10 align-self-center">
                                                <h4 class="m-b-0">Total Paid Amount</h4>
                                                <span class="text-muted">Include All Paid Amount</span>
                                            </div>
                                            <div class="ml-auto align-self-center">
                                              <h2 class="font-medium m-b-0"><i class="fas fa-rupee-sign"></i> <?php
 
        ?> </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                           
                           
                       
                    </div>
                    <div class="col-lg-4 col-xl-6">
                        <div class="card card-hover">
                            <div class="card-body" style="background:url(<?php echo base_url();?>material/assets/images/background/active-bg.png) no-repeat top center;">
                                <div class="p-t-20 text-center">
                                    <i class="mdi mdi-file-chart display-4 text-orange d-block"></i>
                             <span class="display-4 d-block font-medium">

                            <?php 
                                                                    
                             ?>
                              </span>
                                    <span>Active Users on Site </span>
                                    <!-- Progress -->
                                    <div class="progress m-t-40" style="height:4px;">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-orange" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 65%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <!-- Progress -->
                                    <!-- row -->
                                    <div class="row m-t-30 m-b-20">
                                        <!-- column -->
                                        <div class="col-6 border-right text-left">
                                            <h3 class="m-b-0 font-medium">
                                            <?php 
                                        
?></h3>Desktop</div>
                                        <!-- column -->
                                        <div class="col-6 border-right">
                                            <h3 class="m-b-0 font-medium">  <?php
                                          
?></h3>Mobile</div>
                                        <!-- column -->
                                        
                                    </div>
                                    <a href="<?php echo base_url();?>User" target="_blank" class="waves-effect waves-light m-t-20 btn btn-lg btn-info accent-4 m-b-20">View More Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">

</footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->
  <?php include("footer.php"); ?>
</body>

</html>