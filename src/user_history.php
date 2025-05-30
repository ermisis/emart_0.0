<?php 

    include('includes/header.php');
    include('includes/menubar.php');

    $sql = "SELECT * FROM `systemusertb` WHERE `userDeleted`='1'";
	$user_list = mysqli_query($conn,$sql);
	
	$rowcount=mysqli_num_rows($user_list);

?>


<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Users History</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="">Deleted Users Section</a>
                            </li>
                        </ol>
                    </nav>
                </div>
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
        <!-- *************************************************************** -->
        <!-- Start User Table -->
        <!-- *************************************************************** -->
        <!-- <div class="row"> -->
        <!-- <div class="col-12"> -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-4">
                    <h4 class="card-title">User Archive</h4>
                    <div class="ml-auto">
                        <h5><span class="badge badge-secondary float-left">Total List <span
                                    class="badge badge-light"><?php echo $rowcount;?></span></span></h5>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" width="100%" cellspacing="0"
                        style="text-align: center;" id="userTable">
                        <thead class="bg-primary text-white">
                            <tr class="border-1">
                                <th>ID</th>
                                <th>USER ROLE</th>
                                <th>FIRST NAME</th>
                                <th>LAST NAME</th>
                                <th>USERNAME</th>
                                <th>PASSOWRD</th>
                                <th>NUMBER</th>
                                <th>DATE CREATED</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
				  
                                while($row = mysqli_fetch_array($user_list)){
                                    
                                $userId = $row['userId'];
                                $selectedRole = $row['selectedRole'];
                                $userFirstName = $row['userFirstName'];
                                $userLastName = $row['userLastName'];
                                $userName = $row['userName'];
                                $userPassword = $row['userPassword'];
                                $userNo = $row['userNo'];
                                $userDateCreated = $row['userDateCreated'];
                                
                        
                            if (isset($_SESSION['selectedRole'])) {
                                        if ($_SESSION['selectedRole'] === "Admin") {
                            
                                    echo "<tr>
                                        <td>".$userId."</td>
                                        <td>".$selectedRole."</td>
                                        <td>".$userFirstName."</td>
                                        <td>".$userLastName."</td>
                                        <td>".$userName."</td>
                                        <td>".$userPassword."</td>
                                        <td>".$userNo."</td>
                                        <td>".$userDateCreated."</td>
                                        <td><button type='button' class='btn btn-info user_RestBtn btn-sm' data-placement='top' title='Restore User' id='$userId' Tooltip on top><i class='fas fa-redo-alt'></i></button></td>
                                        </tr>" ;
                                } else {
                                    
                                    echo "<tr>
                                                <td>".$userId."</td>
                                                <td>".$selectedRole."</td>
                                                <td>".$userFirstName."</td>
                                                <td>".$userLastName."</td>
                                                <td>".$userName."</td>
                                                <td>".$userPassword."</td>
                                                <td>".$userNo."</td>
                                                <td>".$userDateCreated."</td>
                                                <td><button type='button' disabled class='btn btn-info user_RestBtn btn-sm' data-placement='top' title='Restore User' id='$userId' Tooltip on top><i class='fas fa-redo-alt'></i></button>
                                                </td>
                                                </tr>" ;
                                }
                                
                                
                                        }
                                }
                                                                
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- </div> -->
        <!-- </div> -->
        <!-- *************************************************************** -->
        <!-- End User Table -->
        <!-- *************************************************************** -->
        <!-- *************************************************************** -->
        <!-- User Modal Starts Here -->
        <!-- *************************************************************** -->
        <div class="modal fade" id="userEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content modal-lg">
                    <div class="modal-header modal-lg">
                        <h5 class="modal-title text-primary" id="exampleModalLabel" style="font-weight:bold;">UPDATE
                            USER</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-body" action="" method="POST" id="user_form_v" name="user_form_v"
                            enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" id="userId_v" name="userId_v">
                                    <input type="text"
                                        class="custom-select custom-select-set form-control border-2 custom-radius"
                                        id="selectedRole_v" readOnly>
                                </div>
                            </div>
                            <hr>
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text border-0 custom-shadow custom-radius"
                                                    id="inputGroup-sizing-default">First
                                                    Name</span>
                                            </div>
                                            <input type="text" class="form-control border-1 custom-shadow custom-radius"
                                                id="userFirstName_v" name="userFirstName_v" readOnly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text border-0 custom-shadow custom-radius"
                                                    id="inputGroup-sizing-default">Last
                                                    Name</span>
                                            </div>
                                            <input type="text" class="form-control border-1 custom-shadow custom-radius"
                                                id="userLastName_v" name="userLastName_v" readOnly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text border-0 custom-shadow custom-radius"
                                                    id="inputGroup-sizing-default">Username</span>
                                            </div>
                                            <input type="text" class="form-control border-1 custom-shadow custom-radius"
                                                id="userName_v" name="userName_v" readOnly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text border-0 custom-shadow custom-radius"
                                                    id="inputGroup-sizing-default">Password</span>
                                            </div>
                                            <input type="text" class="form-control border-1 custom-shadow custom-radius"
                                                id="userPassword_v" name="userPassword_v" readOnly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text border-0 custom-shadow custom-radius"
                                                    id="inputGroup-sizing-default">User
                                                    Mobile</span>
                                            </div>
                                            <input type="text" class="form-control border-1 custom-shadow custom-radius"
                                                id="userNo_v" name="userNo_v" readOnly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="text-right">
                                    <button type="button" class="btn btn-outline-danger"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" disabled class="btn btn-info"
                                        id="update_user_btn">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- *************************************************************** -->
        <!-- User Modal Ends Here -->
        <!-- *************************************************************** -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->


    <?php

include('includes/scripts.php');
include('includes/footer.php');

?>