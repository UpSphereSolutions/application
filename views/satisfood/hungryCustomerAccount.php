<div class="container-fluid overflow-auto">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Hungry Customer Account</h1>
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Create Account</a>
        </div>

        <!-- Content Row -->
        <div class="row-2">
        <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Birth Date</th>
                <th>Address</th>
                <th>Contact No.</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userlist as $value) { ?>
                <tr>
                    <td><?php echo $value['lname'].', '.$value['fname']; ?></td>
                    <td><?php echo $value['bdate']; ?></td>
                    <td><?php echo $value['street'].', '.$value['city'].', '.$value['country']; ?></td>
                    <td><?php echo $value['contactno']; ?></td>
                    <td><?php echo $value['email']; ?></td>
                    <td><?php echo $value['gender']; ?></td> 
                    <td>
                        <div class="btn-group btn-toggle"> 
                            <?php if($value['status'] == 'ACTIVE') { ?>
                                <a class="btn btn-primary active">ACTIVE</a>
                                <a class="btn btn-default">IDLE</a>
                            <?php } else { ?>
                                <a class="btn btn-default">ACTIVE</a>
                                <a class="btn btn-danger active">IDLE</a>
                            <?php } ?>
                        </div>
                    </td>
                    <td>
                        <div class="btn-group btn-toggle"> 
                            <a href='' data-toggle="modal" data-target="#exampleModal" class="btn btn-secondary active" onclick="msg('<?php echo $value['lname'].', '.$value['fname']; ?>', '<?php echo $value['id']; ?>')">ACTION</a>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Birth Date</th>
                <th>Address</th>
                <th>Contact No.</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Status</th>
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
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form> 
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">id:</label>
                <input type="text" class="form-control" id="accountId">
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
<script>
$('#search').show();
  $(".loading").modal('hide');
</script>
