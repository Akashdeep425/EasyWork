<!DOCTYPE html>
<html>
<?php session_start();
     if(isset($_SESSION["activeuser"])==false)
    {
        header("location:index.php");
    }?>

<head>
    <title>Worker</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="https://use.fontawesome.com/fe7390102d.js"></script>
    <link rel="stylesheet" href="css/dash-worker.css">
    <script>
        $(document).ready(function() {

            $("#requestbtn").click(function() {
                var citizen = $("#citUid").val();
                var worker = $("#worUid").val();

                var url = "rating-process.php?citizen=" + citizen + "&worker=" + worker;

                $.get(url, function(response) {
                    $("#requestS").html(response);

                });
            });
            $("#btnPass").click(function() {
                var pwd = $("#txtPWD").val();
                var uid = $("#txtUID").val();
                var url = "change-password.php?pwd=" + pwd + "&uid=" + uid;
                $.get(url, function(response) {
                    $("#pass").html(response);
                });
            });

        });

    </script>
</head>

<body>
    <div class="pageback"></div>
    <nav class="navbar navbar-light navbar-expand-lg pb-5">
        <div class="container-lg">
            <span class="navbar-brand h1" style="color:white;font-size: 30px">EasyWork</span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto" style="padding: 5px">
                    <li class="nav-item">
                        <a href="logout.php" class="btn nav-link" style="color:white;font-size: 17px"><i class="fa fa-sign-out"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <center class="pb-5">
        <span style="color:white;font-size: 30px;text-transform:uppercase;word-spacing:18px">Welcome <?php echo $_SESSION['activeuser']; ?></span>
    </center>
    <div class="container">
        <div class="row">

            <div class="col-lg-3 pb-5" style="width:18rem;">
                <a href="worker-profile-front.php" style="text-decoration: none;color: black">
                    <div class="card cd">
                        <img src="pics/undraw_male_avatar_323b.svg" class="card-img-top" alt="...">
                        <center>
                            <div class="card-body">
                                <h4><b>Profile Form</b></h4>
                                <p>Save or Update Profile</p>
                            </div>
                        </center>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 pb-5" style="width:18rem;">
                <a href="" data-toggle="modal" data-target="#rateModal" style="text-decoration: none;color: black">
                    <div class="card cd">
                        <img src="pics/rating.jpg" class="card-img-top" alt="...">
                        <center>
                            <div class="card-body">
                                <h4><b>Request Rating</b></h4>
                                <p>Request rating from customer</p>
                            </div>
                        </center>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 pb-5" style="width:18rem;">
                <a href="worker-search-citizen.php" style="text-decoration: none;color: black">
                    <div class="card cd">
                       
                        <img src="pics/tool2%20-%20Copy.jpg" class="card-img-top" alt="...">
                        <center>
                            <div class="card-body">
                               
                                <h4><b>Find Work</b></h4>
                                <p>Search for work.</p>
                            </div>
                        </center>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 pb-3" style="width:18rem;">
                <a href="#" data-toggle="modal" data-target="#passwordModal" style="text-decoration: none;color: black">
                    <div class="card cd">
                       
                        <img src="pics/password.jpg" class="card-img-top" alt="...">
                        <center>
                            <div class="card-body">
                               
                                <h4><b>Change Password</b></h4>
                                <p>Change your password here.</p>
                            </div>
                        </center>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- rating modal -->
    <div class="modal fade" id="rateModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #4f40ff">
                    <h5 class="modal-title" style="color: white;font-size:23px">Request rating</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background-color: #f0f0f0;">
                    <div class="form-group">
                        <label>User Id</label>
                        <input type="text" class="form-control" id="worUid" name="worUid" readonly value="<?php echo $_SESSION['activeuser']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Citizen User Id</label>
                        <input type="text" class="form-control" id="citUid" name="citUid">
                    </div>
                </div>
                <div class="modal-footer" style="background-color: #f0f0f0;">
                    <span id="requestS"></span>
                    <button type="button" class="btn btn-primary" id="requestbtn">Request</button>
                </div>
            </div>
        </div>
    </div>
    <!-- password change modal -->
    <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #4f40ff">
                    <h5 class="modal-title" style="color: white;font-size:23px">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background-color: #f0f0f0;">
                    <div class="form-group">
                        <label for="">User Id</label>
                        <input type="text" class="form-control" readonly id="txtUID" value="<?php echo $_SESSION['activeuser']; ?>">
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control" id="txtPWD" name="txtPWD">
                    </div>
                </div>
                <div class="modal-footer" style="background-color: #f0f0f0;">
                    <span id="pass"></span>
                    <button type="button" class="btn btn-primary" id="btnPass">Change</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
