<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajax || MVC </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- sweet alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" integrity="sha512-gOQQLjHRpD3/SEOtalVq50iDn4opLVup2TF8c4QPI3/NmUPNZOk2FG0ihi8oCU/qYEsw4P6nuEZT2lAG0UNYaw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
   <div class="container mt-4">
     <div class="row bg-secondary text-white p-2">
       <div class="col-md-4">
          <p class="text-uppercase">Employee Information</p>
        </div>
        <div class="col-md-4 mx-auto text-end"> 
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Employee
       </button>
        </div>
       </div>
     </div>
  
  <!-- Modal for employee form  -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" id="form_data">
      <div class="modal-body">
        <div class="mb-3">
          <label for="" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" >
        </div>
         <div class="mb-3">
          <label for="" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" name="email">
        </div>
         <div class="mb-3">
          <label for="" class="form-label">Contact</label>
          <input type="text" class="form-control" id="contact" name="contact">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-primary">Save</button>
      </div>
     </form>
    </div>
  </div>
</div>

<!-- view data in table -->

 <div class="container mt-4">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card rounded-0">
                   
                    <div class="card-body">
                        <div class="show-message">

                        </div>
                        <table class="table table-bordered table-striped" id="emp_table">
                            <thead>
                                <tr class="text-center m-2 text-uppercase">
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="employeeData">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.5/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- sweet alert -->
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript" src="assets/employee.js"></script>
  </body>
</html>


<!-- single view employee view -->


<div class="modal fade" id="viewSinglemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Employee Infos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="emp_id">
          <div id="modal_det">
         
          </div>
      </div>
    </div>
  </div>
</div>


<!-- Edit Employee  Modal -->

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel4677563" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel4677563">Edit Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <form method="POST" id="form_Edit_data">
        <div class="modal-body">
          <input type="hidden" id="fetch_edit_id" name="fetch_edit_id">
          <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" id="edit_name" name="edit_name" >
          </div>
           <div class="mb-3">
            <label for="" class="form-label">Email address</label>
            <input type="email" class="form-control" id="edit_email" name="edit_email">
          </div>
           <div class="mb-3">
            <label for="" class="form-label">Contact</label>
            <input type="text" class="form-control" id="edit_contact" name="edit_contact">
          </div>
         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="update" class="btn btn-primary">Update</button>
        </div>
       </form>
      </div>
    </div>
  </div>