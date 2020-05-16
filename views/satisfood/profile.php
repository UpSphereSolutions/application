
<!------ Include the above in your HEAD tag ---------->

<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="http://ghd.qqt.mybluehost.me/satisfood/ikyang.png" alt=""/>
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
            </form>           
        </div>
        <script>
$('#search').show();
  $(".loading").modal('hide');
</script>