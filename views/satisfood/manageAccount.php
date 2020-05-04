<?php
  $this->load->view('satisfood/component/header');
?>
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

<?php
  $this->load->view('satisfood/component/sidebar');
?>
 
  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
    <?php
      $this->load->view('satisfood/component/topbar');
    ?>
      <!-- Begin Page Content -->
      <div class="container-fluid overflow-auto">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Manage Account</h1>
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
                                <button class="btn btn-primary">ACTIVE</button>
                                <button class="btn btn-default active ">IDLE</button>
                            <?php } else { ?>
                                <button class="btn btn-default">ACTIVE</button>
                                <button class="btn btn-primary active">IDLE</button>
                            <?php } ?>
                        </div>
                    </td>
                    <td>
                        <div class="btn-group btn-toggle"> 
                            <button  data-value='<?php echo $value['lname'].', '.$value['fname']; ?>' type="button" id='action' class="btn btn-secondary">Action</button>
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
<script>
    $(document).ready(function() {
        $.noConflict();
    $('#example').DataTable();
} );

$('.btn-toggle').click(function() {
    $(this).find('.btn').toggleClass('active');  
    
    if ($(this).find('.btn-primary').length>0) {
    	$(this).find('.btn').toggleClass('btn-primary');
    }
});
$('#action').click(function() {
    alert($('#action').data('value'));
});
</script>
<?php
  $this->load->view('satisfood/component/footer');
?>