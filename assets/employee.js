$(document).ready(function() {


     //Fetch Table Data 

     $.ajax({
        url:"api/api.php", //the page containing php script
        type: "POST", //request type,
        data: {'req': '1', 'param':'1'},
        dataType:"json",
        success:function(result)
        { 
           $("#employeeData").html(result);
        }
     });

     //insert data to database

     $('#form_data').submit(function (event)
     {
         event.preventDefault();
         $.ajax({
             data: $('form').serialize(),
             url:"controller/insert_employee.php", //php page URL where we post this data to save in database
             type: 'POST',
             success: function (result) {
                 alert('Success');
                 $.ajax({
                    url:"api/api.php", //the page containing php script
                    type: "POST", //request type,
                    data: {'req': '1', 'param':'1'},
                    dataType:"json",
                    success:function(result)
                    { 
                       $("#employeeData").html(result);
                    }
                 });
             }
         });
         $("#form_data")[0].reset();
         $('#exampleModal').modal('hide');
     });

   // fetch single modal_data

     $("#emp_table").on('click', '#view_id',function(e)
      {
         var eid = $(this).attr('data-id');
         $("#emp_id").val(eid);
         $("#viewSinglemodal").modal('show');
      });

     $("#viewSinglemodal").on('show.bs.modal', function(event)
      {  
         var eid = $("#emp_id").val();
         $.ajax({
            url:"api/api.php",
            type: "POST",
            data: {'req': '1', 'param': '2', 'data': 'id = '+eid},
            dataType:"json",
            success:function(result)
            { 
              $("#modal_det").html(result);
            }
         });
      });


     // Edit_modal_data

     $("#emp_table").on('click', '#edit_id',function(e)
      {
         var eid = $(this).attr('data-id');
         $("#fetch_edit_id").val(eid);
         $("#editModal").modal('show');
      });

    
     $("#editModal").on('show.bs.modal', function(event)
      {  
         var edit = $("#fetch_edit_id").val();
         $.ajax({
            url:"api/api.php",
            type: "POST",
            data: {'req': '1', 'param': '3', 'data': 'id = '+edit},
            dataType:"json",
            success:function(result)
            { 
              var dval = result[0];
              // alert(result['name']);
              $("#fetch_edit_id").val(edit);
              $("#edit_name").val(dval['name']);
              $("#edit_email").val(dval['email']);
              $("#edit_contact").val(dval['contact']);
            }
         });
      });

    //update data to database

     $('#form_Edit_data').submit(function (event)
     {
         event.preventDefault();
         $.ajax({
             data: $('form').serialize(),
             url:"controller/update_employee.php", //php page URL where we post this data to save in database
             type: 'POST',
             success: function (result) {
                 // alert('Success');
                 $.ajax({
                    url:"api/api.php", //the page containing php script
                    type: "POST", //request type,
                    data: {'req': '1', 'param':'1' },
                    dataType:"json",
                    success:function(result)
                    { 
                       $("#employeeData").html(result);
                     
                    $('#editModal').modal('hide');
                    }
                 });
             }
         });
       
         
     });


     // Delete Data 

     $("#emp_table").on('click', '#delete_id',function(e)
      {
         var eid = $(this).attr('data-id');
         event.preventDefault();


           Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                  if (result.isConfirmed) {

                    $.ajax({
                        url:"controller/delete_employee.php",
                        type: "POST",
                        data: {'data': eid},
                        success:function()
                        { 
                            $.ajax({
                            url:"api/api.php", //the page containing php script
                            type: "POST", //request type,
                            data: {'req': '1', 'param':'1'},
                            dataType:"json",
                            success:function(result)
                            { 
                               $("#employeeData").html(result);
                            }
                         });
                        }
                     });
                        Swal.fire(
                         'Deleted!',
                         'Your file has been deleted.',
                         'success'
                            )
                    }
              })
      });
    });


