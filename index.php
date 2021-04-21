<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="https://use.fontawesome.com/fe7390102d.js"></script>
    <link rel="stylesheet" href="css/index.css">
    <script>
        $(document).ready(function() {
            $("#txtUid").blur(function() {
                //used for AJAX request
                var uid = $("#txtUid").val();
                var url = "check-uid.php?uid=" + uid;
                $.get(url, function(response) {
                    $("#errUid").html(response);
                });
            });
            $("#signupbtn").click(function() {
                var uid = $("#txtUid").val();
                var pwd = $("#txtPwd").val();
                var mobile = $("#txtMob").val();
                var category = $("#txtCat").val();
                var url = "signup-process.php?uid=" + uid + "&pwd=" + pwd + "&mobile=" + mobile + "&category=" + category;
                $.get(url, function(response) {
                    $("#signRes").html(response);
                });
            });
            $("#login").click(function() {
                var uid = $("#txtUID").val();
                var pwd = $("#txtPWD").val();
                var url = "login-process.php?uid=" + uid + "&pwd=" + pwd;
                $.get(url, function(response) {
                    if (response == "Citizen") {
                        location.href = "dash-citizen.php";
                    } else
                    if (response == "Worker") {
                        location.href = "dash-worker.php"
                    } else {
                        $("#loginRes").html(response);
                    }
                });
            });
            $("#forgot").click(function() {
                var uid = $("#uid").val();
                var url = "sms-send.php?uid=" + uid;
                $.get(url, function(response) {
                    alert(response);
                });
            });
        });

    </script>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-light fixed-top navbar-expand-lg" style="background: #515AE0">
        <div class="container-lg">
            <a class="navbar-brand pl-5" href="#">
                <img src="pics/undraw_QA_engineers_dg5p.svg" style="width:40px;height:40px;background:white" alt="" class="d-inline-block align-top">
                <span style="color:white;font-size: 30px;word-spacing:10px" class="pl-1">EasyWork</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto pt-2">
                    <li class="nav-item pb-2 pr-3">
                        <a style="color:white;font-size: 17px" class="btn nav-link" data-toggle="modal" data-target="#signupModal"><i class="fa fa-user-plus"></i> Signup</a>
                    </li>
                    <li class="nav-item pb-2 pr-3">
                        <a class="btn nav-link" style="color:white;font-size: 17px" data-toggle="modal" data-target="#loginModal"><i class="fa fa-sign-in"></i> Login</a>
                    </li>
                    <li class="nav-item pb-2">
                        <a class="btn nav-link" style="color:white;font-size: 17px" data-toggle="modal" data-target="#fModal"> Forgot Password</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- carousel -->
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner" style="margin-top:77px">
            <div class="carousel-item active">
                <img src="pics/craftsman.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="pics/Stonemason.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="pics/electricianengineer.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="pics/Reliable-Plumber.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- services -->
    <div class="stripe"></div>
    <div class="container mt-5 mb-5" style="padding-top:20px">
        <div class="row mt-2">
            <div class="col-md-4 pl-5 pb-3">
                <div class="card cd" style="padding:15px;">
                    <img src="pics/profile.png" alt="" class="card-img-top">
                    <center>
                        <div class="card-body">
                            <p style="font-size:30px;font-weight:bolder">Upload Profile</p>
                            <p style="font-size:20px">
                                Save, Update your profile with one click.
                            </p>
                        </div>
                    </center>
                </div>
            </div>
            <div class="col-md-4 pl-5 pb-3">
                <div class="card cd" style="padding:15px;">
                    <img src="pics/undraw_QA_engineers_dg5p.svg" alt="" class="card-img-top">
                    <center>
                        <div class="card-body">
                           <br>
                            <p style="font-size:30px;font-weight:bolder">Find Worker</p>
                            <p style="font-size:20px">
                                Find Suitable Worker for yourself near you.
                            </p>
                        </div>
                    </center>
                </div>
            </div>
            <div class="col-md-4 pl-5 pb-3">
                <div class="card cd" style="padding:15px;">
                    <img src="pics/find-job.png" alt="" class="card-img-top">
                    <center>
                        <div class="card-body">
                            <p style="font-size:30px;font-weight:bolder">Find Job</p>
                            <p style="font-size:20px">
                                Find Job according to your SkillSet.
                            </p>
                        </div>
                    </center>
                </div>
            </div>
        </div>
        <div class="row mt-4 mb-4">
            <div class="col-md-4 pl-5 pb-3">
                <div class="card cd" style="padding:15px;">
                    <img src="pics/post-work.jpg" alt="" class="card-img-top">
                    <center>
                        <div class="card-body">
                            <p style="font-size:30px;font-weight:bolder">Post Work</p>
                            <p style="font-size:20px">
                                Post your work and get a suitable worker.
                            </p>
                        </div>
                    </center>
                </div>
            </div>
            <div class="col-md-4 pl-5 pb-3">
                <div class="card cd" style="padding:15px;">
                    <img src="pics/giving-five-star.jpg" alt="" class="card-img-top">
                    <center>
                        <div class="card-body">
                            <p style="font-size:30px;font-weight:bolder">Give Rating</p>
                            <p style="font-size:20px">
                                Give rating to the worker based on your experience.
                            </p>
                        </div>
                    </center>
                </div>
            </div>
            <div class="col-md-4 pl-5 pb-3">
                <div class="card cd" style="padding:15px;">
                    <img src="pics/manage.jpg" alt="" class="card-img-top">
                    <center>
                        <div class="card-body">
                            <p style="font-size:30px;font-weight:bolder">Manage</p>
                            <p style="font-size:20px">
                                Manage your requirement posts easily.
                            </p>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <!-- developer -->
    <div class="container">
        <div class="dev"></div>
        <br><br><br><br>
        <center>
            <span>Meet the</span>
        </center>
        <div class="row mt-3" style="padding:20px">
            <div class="col-md-6">
                <center><span>Developer</span></center>
                <center><img src="pics/img_avatar.png" alt="" class="dev_img">
                </center>
                <table class="table mt-4" cellpadding="15px">
                    <tbody>
                        <tr>
                            <th scope="row"> Name </th>
                            <td> Akashdeep Goyal</td>
                        </tr>
                        <tr>
                            <th scope="row"> Class </th>
                            <td>B.Tech</td>
                        </tr>
                        <tr>
                            <th scope="row">College</th>
                            <td>Guru Nanak Dev University</td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td>goyalakash385@gmail.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <center><span>Mentor</span></center>
                <center><img src="pics/sir.jpg" alt="" class="dev_img">
                </center>
                <table class="table mt-4" cellpadding="15px">
                    <tbody>
                        <tr>
                            <th scope="row"> Name </th>
                            <td>Rajesh Bansal</td>
                        </tr>
                        <tr>
                            <th scope="row">Experience</th>
                            <td>19 years</td>
                        </tr>
                        <tr>
                            <th scope="row">Book</th>
                            <td>Real Java</td>
                        </tr>
                        <tr>
                            <th scope="row">Institute</th>
                            <td>Banglore Computer Education</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
       
    </div>
    <!-- reach us -->
    <div class="container pb-5">
        <div class="reach"></div>
        <br><br><br><br><br><br><br><br>
        <div class="row pb-5">
           <div class="col-md-12">
               <center>
                   <h1>Reach Us</h1>
               </center>
           </div>
        </div>
        <div class="row">
            <div class="col-md-12">
               <center>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3447.8807337916082!2d74.95013941496228!3d30.211951281821708!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391732a4f07278a9%3A0x4a0d6293513f98ce!2sBanglore%20Computer%20Education%20(C%20C%2B%2B%20Android%20J2EE%20PHP%20Python%20AngularJs%20Spring%20Java%20Training%20Institute)!5e0!3m2!1sen!2sin!4v1594713856563!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </center>
            </div>
        </div>
    </div>
    
    <!-- signup modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #4f40ff">
                    <h5 class="modal-title" style="color: white;font-size:23px">Signup</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background-color: #f0f0f0;">
                   <center> <img src="pics/undraw_sign_in_e6hj.svg" style="margin-top: 10px;" class="img"></center>
                    <div class="form-group">
                        <label>User Id</label>
                        <input type="text" class="form-control" id="txtUid" name="txtUid">
                        <span id="errUid">*</span>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="txtPwd" name="txtPwd">
                    </div>
                    <div class="form-group">
                        <label>Mobile</label>
                        <input type="text" class="form-control" id="txtMob" name="txtMob">
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" id="txtCat" name="txtCat">
                            <option value="none">--Select Category--</option>
                            <option value="Worker">Worker</option>
                            <option value="Citizen">Citizen</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer" style="background-color: #f0f0f0;">
                    <span id="signRes"></span>
                    <button type="button" class="btn btn-primary" id="signupbtn">Signup</button>
                </div>
            </div>
        </div>
    </div>
    <!-- login modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #4f40ff">
                    <h5 class="modal-title" style="color: white;font-size:23px">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background-color: #f0f0f0;">
                    <center> <img src="pics/undraw_Login_v483.svg" style="margin-top: 10px;" class="img"></center>
                    <div class="form-group">
                        <label>User Id</label>
                        <input type="text" class="form-control" id="txtUID" name="txtUID">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="txtPWD" name="txtPWD">
                    </div>
                </div>
                <div class="modal-footer" style="background-color: #f0f0f0;">
                    <span id="loginRes" style="font-size:20px"></span>
                    <button type="button" class="btn btn-primary" id="login">Login</button>
                </div>
            </div>
        </div>
    </div>
    <!-- forgot password modal -->
    <div class="modal fade" id="fModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #4f40ff">
                    <h5 class="modal-title" style="color: white;font-size:23px">Forgot Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background-color: #f0f0f0;">
                   <center> <img src="pics/undraw_forgot_password_gi2d.svg" style="margin-top: 10px;" class="img"></center>
                    <div class="form-group">
                        <label>User Id</label>
                        <input type="text" class="form-control" id="uid" name="uid">
                    </div>
                    <div class="form-group">
                        <label for="">Click to receive your Password on registered mobile.</label>
                    </div>
                </div>
                <div class="modal-footer" style="background-color: #f0f0f0;">
                    <span id="loginRes" style="font-size:20px"></span>
                    <button type="button" class="btn btn-primary" id="forgot">Send SMS</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
