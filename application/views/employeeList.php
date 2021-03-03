<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Employee List</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
   
    <link href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
     
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="" style="overflow: hidden;margin-top: 5%;">
    <div class="container">
      <div class="row">
        
      <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add</button>

         <table class="table table-bordered table-hover" id="datatable">
                                                            <thead>
                                                                <tr>
                                                                    <th> S.No </th>
                                                                    <th>Name</th>
                                                                    <th>Email</th>
                                                                    <th>Phone</th>
                                                                    <th>DOB</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                  <?php if(!empty($empDetails)){  
                                                       // echo"<pre>";print_r($allstuds);echo"</pre>";?>
                                                                <?php $i=1;

                                                                
                                                                 foreach($empDetails as $all){ 
                                                                        

                                                                       ?>
                                                                <tr> 
                                                                    <td><?=$i?></td>
                                                                    <td><?=$all->emp_name;?></td>
                                                                    <td><?=$all->email_id;?></td>
                                                                    <td><?=$all->phone_number;?></td>
                                                                    <td><?=$all->dob;?></td>
                                                                    <td><button class="btn btn-primary" onclick="update_delete(1,<?=$all->emp_id?>)">Edit</button><button class="btn btn-danger" onclick="update_delete(2,<?=$all->emp_id?>)">Delete</button></td>

                                                                  
                                                                </tr>
                                                                <?php $i++; }} ?>
                                                            
                                                      
                                                            </tbody>
                                                        </table> 
                                                      </div>
  </div>
   <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span id="title">Add Employee</span></h4>
        </div>
        <div class="modal-body">
           
            <div class="row">
                <input type="hidden" id="emp_id" name="id">
               
                <div class="col-md-6">
                                                  <label class="control-label">Employee Name *</label>
                                                    <div class="form-group">
                                                    
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emp_name" name="emp_name"  placeholder=" Name" required="">
                                                            <!--<p>Name followed by Initial Eg. Ganesh R</p>-->
                                                             
                                                        </div>
                                                    </div> 
                                        </div>
                                        <div class="col-md-6">
                                                  <label class="control-label">Email Id *</label>
                                                    <div class="form-group">
                                                    
                                                        <div class="">
                                                            <input type="email" class="form-control" id="email" name="email"  placeholder=" Email" required="">
                                                            <!--<p>Name followed by Initial Eg. Ganesh R</p>-->
                                                             
                                                        </div>
                                                    </div> 
                                        </div>
                                        <div class="col-md-6">
                                                  <label class="control-label">Phone No *</label>
                                                    <div class="form-group">
                                                    
                                                        <div class="">
                                                            <input type="text" class="form-control" id="mobile_no" name="mobile_no"  placeholder=" Mobile No" required="" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10">
                                                            <!--<p>Name followed by Initial Eg. Ganesh R</p>-->
                                                             
                                                        </div>
                                                    </div> 
                                        </div>
                                        <div class="col-md-6">
                                                  <label class="control-label">DOB *</label>
                                                    <div class="form-group">
                                                    
                                                        <div class="">
                                                            <input type='date' name="dob" id="dob" class="form-control" />
                      
                                                            <!--<p>Name followed by Initial Eg. Ganesh R</p>-->
                                                             
                                                        </div>
                                                    </div> 
                                        </div>
                                       
            </div> 
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" onclick="saveData();"class="btn btn-primary" id="confirm">Save</button>
          <div id="err_msg_save"></div>
        </div>
                
      </div>
    </div>
  </div>
</div>
  </body>

 


  <script src=" https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap.min.js"></script>

 <script type="text/javascript">
  // alert();
    $('#myModal').on('hidden.bs.modal', function () {
 location.reload();
    })

    var employeeDetails = <?php echo json_encode($empDetails);?>;

  $(function () {
  
   $('#datatable').DataTable({
     "paging": true,
     "lengthChange": true,
     "searching": true,
     "ordering": true,
     "info": true,
     "autoWidth": true
      
   }); 
   
 });

  function saveData()
  {
    var emp_id = getValue("emp_id");
    var emp_name = getValue("emp_name")
    var phone_number = getValue("mobile_no");
    var email_id = getValue("email");
    var dob = getValue("dob");
    var msg = '';
    if(emp_id !='')
    {
        msg = 'Updated';
    }else
    {
        msg = 'Created';
    }
    $("#err_msg_save").html('');
    if(emp_name =='' || phone_number =='' || email_id =='' || dob ==''){
        $("#err_msg_save").html('<p style="color:red">Please Enter All Field</p>');
            return false;
        }else{
      var data = {'records':{'emp_id':emp_id,'emp_name':emp_name,'phone_number':phone_number,'email_id':email_id,'dob':dob}};
      $("#confirm").html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:16px"></i>');
              $.ajax({
                method:"post",
                url:"<?=base_url().'employee/save_employee'?>",
                dataType:'JSON',
                data:data,
                success:function(res)
                {
                   alert(msg+" Successfully")
                                window.location.reload();
                            
                }

              })
    }

  }

  function update_delete(flag,emp_id)
  {
    var empDetail = employeeDetails.filter(emp=>emp.emp_id==emp_id)[0];
        
      if(flag==1) //update
      {
        setValue('emp_id',emp_id);
        setValue('emp_name',empDetail.emp_name);
        setValue('mobile_no',empDetail.phone_number);
        setValue('email',empDetail.email_id);
        setValue('dob',empDetail.dob);

        $("#myModal").modal('show');
      }else //delete
      {
        var data = {'records':{'emp_id':emp_id,'status':0}};
        $.ajax({
                method:"post",
                url:"<?=base_url().'employee/save_employee'?>",
                dataType:'JSON',
                data:data,
                success:function(res)
                {
                   alert("deleted Successfully")
                                window.location.reload();
                            
                }

              })
      }   
  }
      
  function getValue(id)
  {
    return $("#"+id).val();
  }

  function setValue(id,value)
  {
      $("#"+id).val(value);
  }
  </script>
</html>