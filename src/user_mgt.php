<?php 

    include('includes/header.php');
    include('includes/menubar.php');

    $sql = "SELECT * FROM `systemusertb` WHERE `userDeleted`='0'";
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
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">You Are Currently In</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="dashboard.php">User Management Section</a>
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
                        <h4 class="card-title">Add New User</h4>
                        <hr>
                        <form class="form-body" action="" method="POST" id="user_form" name="user_form"
                            enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <select class="custom-select custom-select-set form-control border-2 custom-radius"
                                        id="selectedRole">
                                        <option selected value="none" id="none">Select User Role</option>
                                        <option value="Admin" id="admin">Admin</option>
                                        <option value="Cashier" id="cashier">Cashier</option>
                                    </select>
                                </div>
                                <script>
                                    function GetSelectedText() {
                                        var e = document.getElementById("selectedRole");
                                        var role = e.options[e.selectedIndex].text;

                                        document.getElementById("selectedRole").selectedRole = role;
                                    }
                                </script>
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
                                                id="userFirstName" name="userFirstName">
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
                                                id="userLastName" name="userLastName">
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
                                                id="userName" name="userName">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text border-0 custom-shadow custom-radius"
                                                    id="inputGroup-sizing-default">Password</span>
                                            </div>
                                            <input type="text" class="form-control border-1 custom-shadow custom-radius"
                                                id="userPassword" name="userPassword">
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
                                                id="userNo" name="userNo">
                                            <input type="hidden" class="form-control" id="userDateCreated"
                                                name="userDateCreated" value="<?php echo date('Y-m-d H:i:s');?>"
                                                readOnly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="text-right">
                                <?php
                                    if (isset($_SESSION['selectedRole'])) {
                                        if ($_SESSION['selectedRole'] === "Admin") {
                                            echo '<button type="reset" class="btn btn-dark" id="reset_ui_btn">Reset</button>
                                            <button type="submit" class="btn btn-info" id="add_user_btn">Save</button>';
                                        } else {
                                            echo '<button type="reset" disabled class="btn btn-dark" id="reset_ui_btn">Reset</button>
                                            <button type="submit" disabled class="btn btn-info" id="add_user_btn">Save</button>';
                                        }
                                    } 
                                    ?>                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- *************************************************************** -->
        <!-- User Input Form Cards Ends Here -->
        <!-- *************************************************************** -->

        <!-- *************************************************************** -->
        <!-- Start User Table -->
        <!-- *************************************************************** -->
        <!-- <div class="row"> -->
        <!-- <div class="col-12"> -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-4">
                    <h4 class="card-title">User Table</h4>
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
                                        <td>".$userNo."</td>
                                        <td>".$userDateCreated."</td>
                                        <td><button type='button' class='btn btn-danger user_delBtn btn-sm' data-placement='top' title='Delete User' id='$userId' Tooltip on top><i class='fas fa-trash'></i></button></td>
                                        </tr>" ;
                                } else {
                                    
                                    echo "<tr>
                                                <td>".$userId."</td>
                                                <td>".$selectedRole."</td>
                                                <td>".$userFirstName."</td>
                                                <td>".$userLastName."</td>
                                                <td>".$userName."</td>
                                                <td>".$userNo."</td>
                                                <td>".$userDateCreated."</td>
                                                <td><button type='button' disabled class='btn btn-danger user_delBtn btn-sm' data-placement='top' title='Delete User' id='$userId' Tooltip on top><i class='fas fa-trash'></i></button>
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
                        <h5 class="modal-title text-primary" id="exampleModalLabel" style="font-weight:bold;">UPDATE USER</h5>
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
                                    <input type="text" class="custom-select custom-select-set form-control border-2 custom-radius" id="selectedRole_v">
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
                                                id="userFirstName_v" name="userFirstName_v">
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
                                                id="userLastName_v" name="userLastName_v">
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
                                                id="userName_v" name="userName_v">
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-6">
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text border-0 custom-shadow custom-radius"
                                                    id="inputGroup-sizing-default">Password</span>
                                            </div>
                                            <input type="text" class="form-control border-1 custom-shadow custom-radius"
                                                id="userPassword_v" name="userPassword_v">
                                        </div>
                                    </div> -->
                                    <div class="col-md-6">
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text border-0 custom-shadow custom-radius"
                                                    id="inputGroup-sizing-default">User
                                                    Mobile</span>
                                            </div>
                                            <input type="text" class="form-control border-1 custom-shadow custom-radius"
                                                id="userNo_v" name="userNo_v">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="text-right">
                                    <button type="button" class="btn btn-outline-danger"
                                        data-dismiss="modal">Close</button>
                                    <?php
                                    if (isset($_SESSION['selectedRole'])) {
                                        if ($_SESSION['selectedRole'] === "Admin") {
                                            echo '<button type="submit" class="btn btn-info" id="update_user_btn">Update</button>';
                                        } else {
                                            echo '<button type="submit" disabled class="btn btn-info" id="update_user_btn">Update</button>';
                                        }
                                    } 
                                    ?>
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