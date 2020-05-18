
<!------ Include the above in your HEAD tag ---------->
<!-- <div class="toast" id="myToast" style="position: absolute; top: 10%; right: 0;">
        <div class="toast-header">
            <strong class="mr-auto"><i class="fa fa-grav"></i>Message</strong> -->
            <!-- <small>11 mins ago</small> -->
            <!-- <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <div><label style='width: 100%' text='Message' id="toastMessage"></label></div>
            <p class="nav-link fas fa-refresh pointer" onclick="navigate('profile')"     aria-selected="false">reload</p>
        </div>
    </div>
</div> -->

<div class="container emp-profile">

            
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img" style="position: relative;text-align: center;">
                            <img style="border-radius: 10px" src="http://<?php echo $this->user['image']; ?>" alt=""/>
                        <!-- <a style="position: absolute;top: 80%;left: 50%;transform: translate(-50%, -50%);">asdasdas</a> -->
                        <div>
                        <label  for="upload" style="color:blue;position: absolute;top: 90%;left: 50%;font-size:10px;transform: translate(-50%, -50%);" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Upload</small></label>
                        <input id="upload" name='uploadprofilepic' hidden type="file" onchange="readURL(this);" class="form-control border-0">
                        </div>
                        <!-- <form action="satisfood/do_upload" method='post' enctype='multipart/form-data'>
                                <input type='file' accept="image/x-png,image/gif,image/jpeg" name='userfile'  />
                                <input type='submit' name='fname'  />
                        </form> -->
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                    <?php echo strtoupper($this->user['fname']. " ". $this->user['lname']); ?>
                                    <a style="font-size:13px" onclick="collapseEdit();" class="fa fa-pencil-square-o px-2"  data-toggle="collapse" href="#editProfileName" role="button" aria-expanded="false" aria-controls="editProfileName"></a>
                                    </a>
                                    </h5>
                                    <h6>
                                       ADMIN
                                    </h6>
                                    <!-- <p class="proile-rating">RANKINGS : <span>8/10</span></p> -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                </li> -->
                                <li class="nav-item">
                                    <p class="nav-link fas fa-refresh pointer" onclick="navigate('profile')"     aria-selected="false"></p>
                                </li> 
                                <div class="toast" id="myToast" role="alert">
                                    <strong><label style='width: 100%' text='Message' id="toastMessage"></label></strong>
                                    <button type="button" class="close" data-dismiss="toast" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="col-md-2">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <!-- <div class="profile-work">
                            <p>WORK LINK</p>
                            <a href="">Website Link</a><br/>
                            <a href="">Bootsnipp Profile</a><br/>
                            <a href="">Bootply Profile</a>
                            <p>SKILLS</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>
                        </div> -->
                    </div>
                    <div class="col-md-8">
                        
                    <div class="bs-example">
  
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <!-- <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Kshiti123</p>
                                            </div>
                                        </div> -->
                                             
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo ucfirst($this->user['fname']). " ". ucfirst($this->user['lname']); ?>
                                                <a style="font-size:13px" onclick="collapseEdit();" class="fa fa-pencil-square-o px-2"  data-toggle="collapse" href="#editProfileName" role="button" aria-expanded="false" aria-controls="editProfileName"></a></p>
                                                
                                                <div class="collapse" id="editProfileName">
                                                    <div class="card card-body">
                                                        <div style="font-size:10px" class="row">
                                                            <div class="form-group col-md-12"> 
                                                                <div class=col-10>
                                                                    <a style="font-size:10px">First:
                                                                    <input style="font-size:10px" class="form-control input-sm" id="pfname" type="text" value = '<?php echo ucfirst($this->user['fname']); ?>'>
                                                                    </a>
                                                                </div>
                                                             </div>
                                                            <div class="form-group col-md-12">
                                                                <div class=col-10>
                                                                    <a style="font-size:10px">Middle:
                                                                    <input style="font-size:10px" class="form-control input-sm" id="pmname" type="text" value = '<?php echo ucfirst($this->user['mname']); ?>'>
                                                                    </a>
                                                                </div>    
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <div class=col-10>
                                                                    <a style="font-size:10px">Last:
                                                                    <input style="font-size:10px" class="form-control input-sm" id="plname" type="text" value = '<?php echo ucfirst($this->user['lname']); ?>'>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <div class=col-10>
                                                                <div class="modal-footer">
                                                                    <button style="font-size:10px" type="button"  onclick="collapseEdit();" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button style="font-size:10px" type="button" onclick="update('profilename');" class="btn btn-primary">Save</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $this->user['email'];?><a style="font-size:13px" class="fa fa-pencil-square-o px-2" onclick="collapseEdit();" data-toggle="collapse" href="#editProfileEmail" role="button" aria-expanded="false" aria-controls="editProfileEmail"></a></p>
                                                <div class="collapse" id="editProfileEmail">
                                                    <div class="card card-body">
                                                        <div class="row">
                                                            <div class="form-group col-md-12"> 
                                                                <div class=col-10>
                                                                    <a style="font-size:10px">Email:
                                                                        <input style="font-size:10px" class="form-control input-sm" id="inputProfileEmail" type="email" value = '<?php echo ucfirst($this->user['email']); ?>'>
                                                                    </a>
                                                                </div>
                                                             </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <div class=col-10>
                                                                <div class="modal-footer">
                                                                    <button style="font-size:10px" type="button"  onclick="collapseEdit();" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button style="font-size:10px" type="button" onclick="update('email');" class="btn btn-primary">Save</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                            <p><?php echo $this->user['contactno'];?><a style="font-size:13px" class="fa fa-pencil-square-o px-2" onclick="collapseEdit();" data-toggle="collapse" href="#editProfileContactNo" role="button" aria-expanded="false" aria-controls="editProfileEmail"></a></p>
                                                <div class="collapse" id="editProfileContactNo">
                                                    <div class="card card-body">
                                                        <div class="row">
                                                            <div class="form-group col-md-12"> 
                                                                <div class=col-10>
                                                                    <a style="font-size:10px">Phone No.:
                                                                        <input style="font-size:10px" class="form-control input-sm" id="inputProfileContactNo" type="text" required value = '<?php echo ucfirst($this->user['contactno']); ?>'>
                                                                    </a>
                                                                </div>
                                                             </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <div class=col-10>
                                                                <div class="modal-footer">
                                                                    <button style="font-size:10px" type="button"  onclick="collapseEdit();" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button style="font-size:10px" type="button" onclick="update('contactno');" class="btn btn-primary">Save</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Gender</label>
                                            </div>
                                            <div class="col-md-6">
                                            <p><?php echo $this->user['gender'];?><a style="font-size:13px" class="fa fa-pencil-square-o px-2" onclick="collapseEdit();" data-toggle="collapse" href="#editProfileGender" role="button" aria-expanded="false" aria-controls="editProfileEmail"></a></p>
                                                <div class="collapse" id="editProfileGender">
                                                    <div class="card card-body">
                                                        <div class="row">
                                                            <div class="form-group col-md-12"> 
                                                                <div class=col-10>
                                                                    <a style="font-size:10px">Gender: 
                                                                    <div class="radio">
                                                                    <label><input type="radio" name="optradio" id='isMale' checked>Male</label>
                                                                    </div>
                                                                    <div class="radio">
                                                                    <label><input type="radio" id='isFemale' name="optradio">Female</label>
                                                                    </div>
                                                                    </a>
                                                                </div>
                                                             </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <div class=col-10>
                                                                <div class="modal-footer">
                                                                    <button style="font-size:10px" type="button"  onclick="collapseEdit();" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button style="font-size:10px" type="button" onclick="update('gender');" class="btn btn-primary">Save</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Experience</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Hourly Rate</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>10$/hr</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Total Projects</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>230</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>English Level</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Availability</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>6 months</p>
                                            </div>
                                        </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Your Bio</label><br/>
                                        <p>Your detail description</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>        
        </div>

<div class="modal fade" id="uploadProfileImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Profile Picture?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div id='alertUpload'>
      </div>
            <div class="profile-img col-md-12" >
               <img height="200px" width="100%" class="img-responsive img-portfolio img-hover" id="changeProfile"  src="" alt=""/>
                        <!-- <a style="position: absolute;top: 80%;left: 50%;transform: translate(-50%, -50%);">asdasdas</a> -->
            <div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button"  onclick="saveProfilepic()" class="btn btn-primary">Save changes</button>
        <input type="text" value='' hidden id='img'>
    </div>
    </div>
  </div>
</div>
<script>
$('#search').show();
  $(".loading").modal('hide');
</script>