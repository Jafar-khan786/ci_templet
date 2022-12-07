
<?php   $this->view('comman/admin_header'); ?>

<style>
.table td {
    padding: 5px 1px 6px 0px;
    border: 1px solid #9f9f9f !important;
}
.fade:not(.show) {
    opacity: 1 !important;
}
#datatable_paginate{
    margin-top: 5%;
}
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<body>

<div id="wrapper">
	<div class="content-page">
		<div class="container-fluid">
<div id="wrapper">
<div class="content-page" style="margin-top: 33px!important;background: white;">
<div class="container-fluid">


    
  <div class="row">
     <div class="col-lg-12 text-center">
         <div class="que-header tab_2">
            <h4>User Management </h4>
         </div>
     </div>   
   </div>
         
 <div class="row">
            <div class="card-body" style="border: 1px solid #1b1a1a1a;margin-top: 14px;margin-bottom: 20px;">
              <div class="row justify">
                <div class="">
                         <h4 class="reportset">Upload User</h4>
                      </div>
                    </div>
                    <div class="row   justify">
    				     <form  id="blk_form" enctype="multipart/form-data">
                            <div class="col-lg-3" style="float: left; max-width: 42%;">
                                <label class="m-b-5">
                                 <input type="file" id="file" aria-label="File browser example" name="image" required="" accept=".csv" class="form-control" 
                                    style="padding-top: 3px;">
                                 </label>
                            </div>
                            <label for="cname" class="col-lg-2" style="float: left;">
                                <input type="submit" value="Submit" id = "file_sub_btn" class="btn tab_2 makebton" style="width: 100%;">
                            </label>
    						<label for="cname" class="col-lg-4" style="float: left; margin-top: 7px;">
    					        <span class="dndsmp"><a  href="<?= base_url('upload/csv_farmet/UserBase.csv') ?>" style="color:red;">Download Sample CSV </a></span>
                            </label>
    					</form>           
    					
                    </div>
                   
                     
                    
                </div>
                
                </div>

    <div class="row justify" style="margin-top: -50px;">
        <ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist" style="width: 100%; margin-top: 3rem; width: 75%;">
  <li class="col-lg-6 tab_2 nav-item  pd-0 tab_5">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href=" #pills-home" role="tab"
    aria-controls="pills-home" aria-selected="true" style="line-height: 35px!important;">Add User</a>
  </li>
  <li class="col-lg-6 tab_2 nav-item pd-0">
    <a class="nav-link my_list " id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" 
    aria-controls="pills-profile" aria-selected="false" style="line-height: 35px!important;">User List</a>
  </li>
</ul>

</div>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

  	<form  id = "FormData" >

     <div class="row justify new_drop mt-3">
	    <div class="col-lg-3">
	    <h6>Full Name</h6>
	    <input type="text" name="f_name" value=""  placeholder="Full Name">
      </div> 

      <div class="col-lg-3">
	    <h6>LDAP</h6>
	    <input type="text" name="ladp" value=""  placeholder="LADP">
      </div> 

       <div class="col-lg-3">
	    <h6>Email</h6>
	    <input type="email" name="email" value=""  placeholder="Email">
      </div>

       </div>

   <div class="row justify new_drop mt-3">
	      <div class="col-lg-3">
				<h6>Employee Category</h6>
				<!-- <select class="selectpicker form-control" name = "emp_cat"  data-container="body" data-live-search="true" title="-----Select---" data-hide-disabled="true">
				<option>1</option>
				<option>2</option>
				 </select> -->

			<input type="text" name="emp_cat" value=""  placeholder="Employee Category">	
			 </div>
			 <div class="col-lg-3"></div><div class="col-lg-3"></div>
   </div>

   <div class="row justify new_drop mt-3">
	      <div class="col-lg-3">
				<h6>Site</h6>
				<!-- <select class="selectpicker form-control"  name = "site"  data-container="body" data-live-search="true" title="-----Select---" data-hide-disabled="true">
				<?php if(isset($site_list)) {
				    
				    foreach($site_list as $val){
				        if(in_array($val['name'],$my_fltr_1 )){echo "<option selected >$val->site</option>" ; }else{
				            echo "<option>".$val['name']."</option>" ;
				       
				        }
				    } } ?>
				</select> -->
			  <input type="text" name="site" value=""  placeholder="Site">	


			 </div>
			<div class="col-lg-3">
				<h6>SME</h6>
				<select class="selectpicker form-control" name = "sme"  data-container="body" data-live-search="true" title="-----Select---" data-hide-disabled="true">
				<option>1</option>
				<option>NA</option>
				 </select>
			</div> 
			<div class="col-lg-3">
				<h6>Supervisor</h6>
				<!-- <select class="selectpicker form-control" name = "supervisor"  data-container="body" data-live-search="true" title="-----Select---" data-hide-disabled="true">
				<option>1</option>
				<option>Saurabh Trikha</option>
				 </select> -->

			    <input type="text" name="supervisor" value=""  placeholder="supervisor">		 

		        </div>
   </div>

   <div class="row justify new_drop mt-3">
	      <div class="col-lg-3">
				<h6>Service Line</h6>
				<!-- <select class="selectpicker form-control" name = "service_line"  data-container="body" data-live-search="true" title="-----Select---" data-hide-disabled="true">
				<option>1</option>
				<option>Retention</option>
				 </select> -->
 					<input type="text" name="supervisor" value=""  placeholder="supervisor">		


			 </div>
			<div class="col-lg-3">
				<h6>Phase</h6>
				<!-- <select class="selectpicker form-control" name = "phase"  data-container="body" data-live-search="true" title="-----Select---" data-hide-disabled="true">
				<option>1</option>
				<option>Production</option>
				 </select> -->
	           <input type="text" name="phase" value=""  placeholder="phase">	

			</div> 
			<div class="col-lg-3">
				<h6>Status</h6>
				<select class="selectpicker form-control" name = "status"   data-container="body" data-live-search="true" title="-----Select---" data-hide-disabled="true">
				<option>Active</option>
				<option>Inactive</option>
				 </select>
		        </div>
   </div>


   <div class="row justify new_drop mt-3">
	      <div class="col-lg-3">
				<h6>Queue</h6>
				<!-- <select class="selectpicker form-control" name = "queue"  data-container="body" data-live-search="true" title="-----Select---" data-hide-disabled="true">
				<option>1</option>
				<option>Ret CCT</option>
				 </select> -->

			 <input type="text" name="queue" value=""  placeholder="queue">	 
			 </div>
			<div class="col-lg-3">
				<h6>Agent Group</h6>
				<select class="selectpicker form-control" name = "agent_group"  data-container="body" data-live-search="true" title="-----Select---" data-hide-disabled="true">
				<option>1</option>
				<option>Others</option>
				 </select>
			</div> 
			<div class="col-lg-3">
				<h6>Workday ID</h6>
				<input type="text" name = "workday_id" placeholder="Workday ID">
		        </div>
   </div>


   <div class="row justify new_drop mt-3">
	     <div class="col-lg-3">
			<h6>BP#</h6>
				<input type="text" name="bp" placeholder="BP#">
		    </div>
			<div class="col-lg-3">
				<h6>GEO</h6>
				<select class="selectpicker form-control" name = "geo"  data-container="body" data-live-search="true" title="-----Select---" data-hide-disabled="true">
				<option>1</option>
				<option>NAM</option>
				 </select>
			</div> 
			<div class="col-lg-3">
				<h6>Language</h6>
					<select class="selectpicker form-control"  name = "language" data-container="body" data-live-search="true" title="-----Select---" data-hide-disabled="true">
					<option>1</option>
					<option>English</option>
				 </select>
		        </div>
   </div>


   <div class="row justify new_drop mt-3">
	     <div class="col-lg-3">
			<h6>Inbound_OutBound</h6>
			<select class="selectpicker form-control"  name = "Inbound_OutBound"  data-container="body" data-live-search="true" title="-----Select---" data-hide-disabled="true">
				<option>1</option>
				<option>Inbound</option>
				 </select>
		    </div>
			<div class="col-lg-3">
				<h6>Attrition processed by Adobe </h6>
				<select class="selectpicker form-control"  name = "attrition_processedByAdobe"  data-container="body" data-live-search="true" title="-----Select---" data-hide-disabled="true">
				<option>1</option>
				<option>NAM</option>
				 </select>
			</div> 
			<div class="col-lg-3">
				<h6>Supervisor LDAP</h6>
				<input type="text" name="supervisor_ldap" placeholder="Supervisor LDAP">
		        </div>
   </div>


   <div class="row justify new_drop mt-3">
	     <div class="col-lg-3">
			<h6>Supervisor Workday ID</h6>
				<input type="text" name="Supervisor_workday_id" placeholder="Supervisor Workday ID">
		        </div>
			<div class="col-lg-3">
				<h6>Line of Business</h6>
				<select class="selectpicker form-control" name="LineOfBusiness"  data-container="body" data-live-search="true" title="-----Select---" data-hide-disabled="true">
				<option>1</option>
				<option>CCI</option>
				 </select>
			</div> 
			<div class="col-lg-3">
				<h6>Support Type</h6>
				<select class="selectpicker form-control" name="SupportType"  data-container="body" data-live-search="true" title="-----Select---" data-hide-disabled="true">
				<option>1</option>
				<option>Mgt</option>
				 </select>
		    </div>
   </div>


   <div class="row justify new_drop mt-3 mb-4">
	     <div class="col-lg-3">
			<h6>Business Owner</h6>
				<select class="selectpicker form-control"  name="businessOwner"  data-container="body" data-live-search="true" title="-----Select---" data-hide-disabled="true">
				<option>1</option>
				<option>Saurabh Trikha</option>
				 </select>
		        </div>
			<div class="col-lg-3">
				<h6>Channel</h6>
				<select class="selectpicker form-control"  name="channel"  data-container="body" data-live-search="true" title="-----Select---" data-hide-disabled="true">
				<option>1</option>
				<option>Chat</option>
				 </select>
			</div> 
			<div class="col-lg-3">
				<h6>DOB</h6>
				<input type="text" name="DOB" id="datepicker" autocomplete="off" placeholder="Select DOB">
		    </div>
   </div>


   <div class="row justify new_drop mt-3 mb-5">
	     <div class="col-lg-5 text-center mb-3">
			<button type = "submit" id = "submit" class="btn btn-save tab_2">Save</button>
			<button type="reset" class="btn btn-reset tab_2">Reset</button>
			 </div>
           <div class="col-lg-7"></div> 
   </div>
</form>
</div>


<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
	<form id = 'filterForm' action ="<?= base_url('HomeController/user_manage') ?>" method= "POST">		        
      <div class="row justify new_drop mt-3">
	    <div class="col-lg-3 co-3">
	    	<h6>Site (<span style = "color:green;"> <?= (isset($my_fltr_1))? count($my_fltr_1): '' ?> </span>) </h6>
	    	<select class="selectpicker form-control fltr_1"  name ="site[]" data-container="body" data-live-search="true" multiple
	    	title="Select Site" data-hide-disabled="true">
	    		<?php if(isset($site_list)) {
				    
				    foreach($site_list as $val){
				         if (in_array($val['name'], $my_fltr_1))
    				      {
    				           echo "<option selected >".$val['name']."</option>" ; 
    				      }else{ echo "<option>".$val['name']."</option>" ; } 
				     
				    } } ?>
	        </select>
	    	</div>
	         
				<div class="col-lg-3 co-3">
				   	      <h6>Status(<span style = "color:green;"> <?= (isset($my_fltr_2))? count($my_fltr_2): '' ?> </span>) </h6>
					    	<select class="selectpicker form-control fltr_2" id="basic" multiple  name ="status[]" data-container="body" data-live-search="true" title="Select Status" data-hide-disabled="true">
					    	<?php 
					    	        if (in_array('Active', $my_fltr_2))
                				      {  echo "<option selected>Active</option>";}else{ echo "<option >Active</option>";}
					     if (in_array('Inactive', $my_fltr_2))
                				      {  echo "<option selected>Inactive</option>";}else{ echo "<option >Inactive</option>";}
					    ?>		
					    	  
					          
					        </select>
				</div>


				<div class="col-lg-3 co-3">
				        	  <h6>Queue (<span style = "color:green;"> <?= (isset($my_fltr_3))? count($my_fltr_3): '' ?> </span>)</h6>
					    	<select class="selectpicker form-control fltr_3 arr_count"  name ="queue[]" data-container="body"
					    	    multiple data-live-search="true" title="Select Queue" data-hide-disabled="true" value = '' >
					    
					    		<?php if(isset($queue_list)) {
				    
            				    foreach($queue_list as $val){
            				        if (in_array($val['name'], $my_fltr_3))
                				      {
                				           echo "<option selected >".$val['name']."</option>" ; 
                				      }else{ echo "<option>".$val['name']."</option>" ; }
            				    } } ?>
					    	
					          </select>
                     </div> 

	    </div>
	    <div class="row justify new_drop mt-3">
	        
     <div class="col-lg-3 co-3">
	        	<h6>Employee Category (<span style = "color:green;"> <?= (isset($my_fltr_4))? count($my_fltr_4): '' ?> </span>) </h6>
		    	<select class="selectpicker form-control fltr_4" name ="emp_cat[]"  data-container="body" multiple  data-live-search="true" title="Employee Category" data-hide-disabled="true">
		    	<!--<option>1</option>
		    	<option>2</option>-->     
		    	
		    		<?php if(isset($emp_cat_list)) {
				    
				    foreach($emp_cat_list as $val){
				         if (in_array($val['name'], $my_fltr_4))
    				      {
    				           echo "<option selected >".$val['name']."</option>" ; 
    				      }else{ echo "<option>".$val['name']."</option>" ; }
                				      
				     
				    } } ?>     
		         </select>             
	</div>       

 <div class="col-lg-1">
	    	     <button type="submit" name="" class="btn tab_2 makebton mt-2">
	    	     	Submit
	    	     </button>
	    	 </div>
	    	 
	  <div class="col-lg-1">
	   <a href="<?= base_url('HomeController/user_manage/2') ?>"  class="btn tab_2 btn-reset mt-2" >Reset</a>
	    	     	
	    	 </div>
	 
	        </div>
	</form>

	    <div class="row justify mt-4 mb-4">
	    <div class="col-lg-12 col-12" style="padding: 0px 30px;">
	   <table id="datatable" class="table text-center">
	  <thead>
	   
	   
	    <tr class="bc_th">
	      <th scope="col">Employee Name</th>
	      <th scope="col">LDAP</th>
	      <th scope="col">Supervisor</th>
	      <th scope="col">Phase</th>  
	       <th scope="col">Channel</th> 
	        <th scope="col">
               <input type="checkbox"  class="form-check-input" id = "all_chack_btn">
               <i class="fa fa-trash-o " type = "submit" id = "chack_dtl"  style = "color: red" title ="Delete All Select chack-box"
                aria-hidden="true"></i> Delete 
            </th>
	       
	        <th scope="col">Edit</th>   
	    </tr>
	  </thead>
	  <tbody>
	     <?php if(isset($user_list)){
	   
	      foreach($user_list as $val) {?>   
	     
	     <tr class="tr-bc1">
		  <td><?= $val->f_name ?> </td> 
		  <td><?= $val->ldap ?></td>
		  <td> <?= $val->supervisor ?></td>
		   <td><?= $val->phase ?></td>
		   <td><?= $val->channel ?></td>
		   
		   <td class="w-9">
                 <input type="checkbox" class="form-check-input S_chack "  name ="id_arr[]" value="<?php echo $val->_id; ?>"> 
                </td>  
		   
		    <td>
		    <div class="div_flex">
		       <a href="<?= base_url('HomeController/edit_user_manage').'/'. $val->_id ?>"   class="btn_edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
	          </div>
			</td>           
	  </tr> 
        <?php }} ?>
    </tbody>
	</table>     
	   </div> 
		</div>
	        </div>
	       </div>
	    </div>
	   </div>
	 </div>
   </div>
</div>


  <?php   $this->view('comman/footer'); ?>
     
          
       <!-- ===================== msg model start ====================-->
            <div class="modal fade" id="msg_Modal" role="dialog" style ="margin-top: 10%;" >
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header" style ="text-align: center;" >
            <h5 class="modal-title text-white msg text-center"></h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            
            </div>
            </div>
            </div>
            </div>
       <!-- ===================== msg model end ====================-->
            
       <!-- ===================== loader model start ====================-->
                     
  <div class="modal fade" id="loader_Modal" role="dialog" >
          
            <div class="modal-dialog" style="margin-top: 10%;">
             <center>
            <!-- Modal content-->
           
                    
                <div class="loader" style="margin: 0px!important;"></div>
</center>
          
            </div>
            
            </div>
       <!-- ===================== loader model end ====================-->
            
  



     <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.print.min.js"></script>
  
        <!-- Datatable init js -->
        <script src="<?php echo base_url(); ?>assets/pages/datatables.init.js"></script>
    <script>
            $(document).ready(function() {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable( { keys: true } );
                $('#datatable-responsive').DataTable();
                
            } );
            TableManageButtons.init();
        </script>


      
    <script>
     $(document).ready(function() {
         var tab = "<?= $tab_no ?>";      
        
        
         if(tab == '2'){
         $("#pills-home-tab").removeClass('active');
         $("#pills-home").removeClass('active');
         
         $("#pills-profile-tab").addClass('active');
         $("#pills-profile").addClass('active');
       
        
         }
         
        
        
     });
     
       $('body').on('click','.btn_edit',function(e){
                e.preventDefault();  
            var url = $(this).attr('href');
               if(url){
                $("#filterForm").attr('action',url);
               }else{
                   return false;
               }
               $("#filterForm").submit();
               
              
        
        
          });
          
     
       $('body').on('submit','#blk_form',function(e){
           
                  $('#loader_Modal').modal('show');   
                e.preventDefault();  

               
                 $('#file_sub_btn').prop('disabled', true);
                    
                      $.ajax({
                                    url: "<?= base_url('UserController/bulk_User_add') ?>",
                                    type: 'POST',
                                    data: new FormData(this),
                                    contentType: false,
                                    processData: false,     
                                    cache: false,
                                    success: function (response) {
                                        console.log(response);
                                          var res =  $.parseJSON(response);          
                                      if(res.status)
                                        {
                                              $('.msg').parent().css('background-color', 'green');
                                                $('.msg').html(res.msg);
                                                  $('#loader_Modal').modal('hide');  
                                                $('#msg_Modal').modal('show');     
                                                
                                                   setTimeout(function(){$('#msg_Modal').modal('hide'); window.location.reload();   return false;},2000); 
                                        }else{
                                                 $('.msg').parent().css('background-color', 'red');   
                                                 $('.msg').html(res.msg);
                                                  $('#loader_Modal').modal('hide'); 
                                                $('#msg_Modal').modal('show');
                                                   // $('#msg_Modal').modal();
                                                  setTimeout(function(){$('#msg_Modal').modal('hide');   return false;},2000); 
                                                }
                                        
               
                                    },
                                   
                                });
                             
                           
             setTimeout(function(){  $('#file_sub_btn').prop('disabled', false); }, 8000);
                             return false;
           
        });
    
    
         $('body').on('submit','#FormData',function(e){
                
                   e.preventDefault();
                 $('#submit').prop('disabled', true);
                    
                      $.ajax({
                                    url: "<?= base_url('UserController/one_User_add') ?>",
                                    type: 'POST',
                                    data: new FormData(this),
                                    contentType: false,
                                    processData: false,     
                                    cache: false,
                                    async : false,
                                    success: function (response) {
                                        console.log(response);
                                          var res =  $.parseJSON(response);          
                                      if(res.status)
                                        {
                                              $('.msg').parent().css('background-color', 'green');
                                                $('.msg').html(res.msg);
                                                $('#msg_Modal').modal('show');     
                                                
                                                   setTimeout(function(){$('#msg_Modal').modal('hide'); window.location.reload();   return false;},2000); 
                                        }else{
                                                 $('.msg').parent().css('background-color', 'red');   
                                                 $('.msg').html(res.msg);
                                                $('#msg_Modal').modal('show');
                                                   // $('#msg_Modal').modal();
                                                  setTimeout(function(){$('#msg_Modal').modal('hide');   return false;},2000); 
                                                }
                                        
               
                                    },
                                   
                                });
                             
                           
             setTimeout(function(){  $('#submit').prop('disabled', false); }, 8000);
                             return false;
           
        });
        
       $('body').on('click','#chack_dtl',function(e){
                e.preventDefault();  
                  
                  var mode = [];
                  
                 
                  
        
            	let rk = 0;
             	$(".S_chack:checked").each(function() {
					    mode.push(this.value);
					    	rk++;
					     });


             if (!confirm('Are you sure you want to delete this  checked box ?'))
           {
               return false;
            } 
            
            
                     $.ajax({
                                    url: "<?= base_url('UserController/delete_user_data') ?>",
                                    type: 'POST',
                                     data:{ids:mode},
                                    async: false,
                                    success: function (response) {
                                    
                                        
                                    }
                                    
                                   });
                      
                       window.location.reload();
                      return false;
                      
                      });
    
    
    
    
    
     $('body').on('click','#all_chack_btn',function(){
            
         if(this.checked){
            $('.S_chack').each(function(){
                this.checked = true;
            });
        }else{
             $('.S_chack').each(function(){
                this.checked = false;
            });
        } 
         console.log('run check box');   
     });
     
     $('body').on('click','.S_chack',function(){
        if($('.S_chack:checked').length == $('.S_chack').length){
            $('#all_chack_btn').prop('checked',true);
        }else{
            $('#all_chack_btn').prop('checked',false);
        }
    });    
        
    
       $('body').on('click','.tab_5',function(){  
           window.location.href = "<?= base_url('HomeController/user_manage') ?>";
           
       });       
       
     
         $('body').on('change','.arr_count',function(){              
            
      
                     
           var a = $(this).val();           
          // var a = a.split(",");
           var b = a.length;           
          
            $('#q_count').html(b);          
                 
       }); 
       
     </script>
     









<!-------------------datepicker-------------->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      
      <!-- Javascript -->
   <script>
                 
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
</body>
