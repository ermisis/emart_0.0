<?php 

    include('includes/header.php');
    include('includes/menubar.php');

    $sql = "SELECT * FROM `systemusertb` WHERE `userId`='".$_SESSION['userId']."'";
	$fetch_user = mysqli_query($conn,$sql);
	
    // $rowcount=mysqli_num_rows($fetch_user);
    
    while ($row = mysqli_fetch_assoc($fetch_user)) {

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
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">You Are Currently In</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="dashboard.php">User Profile</a>
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
        <!-- User Input Form Cards Starts Here-->
        <!-- *************************************************************** -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"></h4>
                        <hr>

                        <form class="form-body" action="" method="POST" id="user_form" name="user_form"
                            enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-0 custom-shadow custom-radius"
                                                id="inputGroup-sizing-default">Your Role</span>
                                        </div>
                                        <input type="hidden" id="userId_p" name="userId_p" value="<?= $row['userId']; ?>" readOnly>
                                        <input type="text" class="form-control border-1 custom-shadow custom-radius"
                                            id="selectedRole_p" name="selectedRole_p" value="<?= $row['selectedRole']; ?>" readOnly>
                                    </div>
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
                                                id="userFirstName_p" name="userFirstName_p" value="<?= $row['userFirstName']; ?>" readOnly>
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
                                                id="userLastName_p" name="userLastName_p" value="<?= $row['userLastName']; ?>" readOnly>
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
                                                id="userName_p" name="userName_p" value="<?= $row['userName']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text border-0 custom-shadow custom-radius"
                                                    id="inputGroup-sizing-default">Password</span>
                                            </div>
                                            <input type="text" class="form-control border-1 custom-shadow custom-radius"
                                                id="userPassword_p" name="userPassword_p">
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
                                                id="userNo_p" name="userNo_p" value="<?= $row['userNo']; ?>">
                                            <input type="hidden" class="form-control" id="userDateCreated_p"
                                                name="userDateCreated_p" value="<?php echo date('Y-m-d H:i:s');?>"
                                                readOnly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="text-right">
                                    <button type="reset" class="btn btn-dark" id="reset_ui_btn">Reset</button>
                                    <button type="submit" class="btn btn-info" id="update_profile">Update</button>
                                </div>
                            </div>
                        </form>
                        <?php 
    }
    ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- *************************************************************** -->
        <!-- User Input Form Cards Ends Here -->
        <!-- *************************************************************** -->

        <!-- *************************************************************** -->
        <!-- End User Table -->
        <!-- *************************************************************** -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->


    <?php

include('includes/scripts.php');
include('includes/footer.php');

?>