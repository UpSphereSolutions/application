        <!-- Page Heading -->
    <div class="container-fluid overflow-auto">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Merchant Account</h1>
          <a href="#"  data-toggle="modal" data-target="#createAccount" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Create Account</a>
        </div>

        <!-- Content Row -->
        <div class="row-2">
        <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
              <th>Merchant Name</th>
              <th>Fund</th>
              <th>Owner</th>
              <th>Address</th>
              <th>Contact No.</th>
              <th>Email</th>
              <th>Status</th>
              <th>Username</th> 
              <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userlist as $value) { ?>
                <tr>
                    <td><?php echo $value['name']; ?></td>
                    <td><?php echo $value['fund']; ?></td>
                    <td><?php echo $value['owner']; ?></td>
                    <td><?php echo $value['address']; ?></td>
                    <td><?php echo $value['contactNo']; ?></td>
                    <td><?php echo $value['email']; ?></td> 
                    <td>
                        <div class="btn-group btn-toggle"> 
                            <?php if($value['status'] == 'ONLINE') { ?>
                                <a class="btn-sm btn-primary active">ACTIVE</a>
                                <a class="btn-sm btn-default">IDLE</a>
                                <a class="btn-sm btn-default">BLOCKED</a>
                            <?php } elseif($value['status'] == 'OFFLINE') { ?>
                                <a class="btn-sm btn-default">ACTIVE</a>
                                <a class="btn-sm btn-secondary active">IDLE</a>
                                <a class="btn-sm btn-default">BLOCKED</a>
                            <?php } else{?>
                                <a class="btn-sm btn-default">ACTIVE</a>
                                <a class="btn-sm btn-secondary">IDLE</a>
                                <a class="btn-sm btn-danger active">BLOCKED</a>
                            <?php } ?>
                        </div>
                    </td>
                    <td><?php echo $value['username']; ?></td> 
                    <td>
                        <div class="btn-group btn-toggle"> 
                            <a href='' data-toggle="modal" data-target="#exampleModal" class="btn btn-secondary active" onclick="msg('<?php echo $value['name']; ?>', '<?php echo $value['id']; ?>')">ACTION</a>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Merchant Name</th>
                <th>Fund</th>
                <th>Owner</th>
                <th>Address</th>
                <th>Contact No.</th>
                <th>Email</th>
                <th>Status</th>
                <th>Username</th> 
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
        </div>

        <!-- Content Row -->
    <!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ACTION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form> 
            <div class="form-group">
                <input type="text" hidden class="form-control" id="accountId">
                <label for="recipient-name" class="col-form-label">Name:</label>
                <input type="text" class="form-control" id="accountName">
            </div>
            <button type="button" id='activate' class="btn btn-success">Activate</button>
            <button type="button" id='deactivate' class="btn btn-danger">Deactivate</button>
            <button type="button" id='logout' class="btn btn-warning">Logout</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<!-- create account -->
<div class="modal fade" id="createAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CREATE ACCOUNT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Merchant Name:</label>
                <input type="text" class="form-control" id="name">
                <label for="recipient-name" class="col-form-label">Owner:</label>
                <input type="text" class="form-control" id="owner">
                <label for="recipient-name" class="col-form-label">Address:</label>
                <input type="text" class="form-control" id="address">
                <label for="recipient-name" class="col-form-label">Contact No.:</label>
                <input type="text" class="form-control" id="contactno">
                <label for="recipient-name" class="col-form-label">Email:</label>
                <input type="text" class="form-control" id="email">
                <label for="recipient-name" class="col-form-label">Username:</label>
                <input type="text" class="form-control" id="username">
                <label for="recipient-name" class="col-form-label">Password:</label>
                <input type="text" class="form-control" id="password">
            </div>
            
            <button type="button" onClick="createMerchant()" id='activate' class="btn btn-success">Save</button>
            <button type="button" id='deactivate' class="btn btn-danger">Cancel</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<script>
  function createMerchant(){
    $.ajax({
      type: 'POST',
      url: '<?php echo base_url();?>Satisfood/createMerchant',
      data: { 
        name:$("#name").val(),
        owner:$("#owner").val(),
        address:$("#address").val(),
        contactno:$("#contactno").val(),
        email:$("#email").val(),
        username:$("#username").val(),
        password:$("#password").val()
        },
      success: function(res) { 
        alert(res);
      }
    });
  }
</script>
<script>
$('#search').show();
  $(".loading").modal('hide');
</script>