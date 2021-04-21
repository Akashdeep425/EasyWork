<!DOCTYPE html>
<html>
<?php  session_start();
    if(isset($_SESSION["activeuser"])==false)
    {
        header("location:index.php");
    }
    ?>

<head>
    <title>Citizen</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/angular.min.js"></script>
    <script src="https://use.fontawesome.com/fe7390102d.js"></script>
   <link rel="stylesheet" href="css/dash-citizen.css">
    <script>
        $(document).ready(function() {

            $("#workbtn").click(function() {
                var uid = $("#txtUid").val();
                var problem = $("#problem").val();
                var category = $("#category").val();
                var address = $("#address").val();
                var city = $("#city").val();
                var url = "requirement-process.php?uid=" + uid + "&problem=" + problem + "&category=" + category + "&address=" + address + "&city=" + city;
                $.get(url, function(response) {
                    $("#workRes").html(response);
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
    <script>
        var module = angular.module("mymodule", []);
        module.controller("mycontrol", function($scope, $http) {
            $scope.jsonArray;
            $scope.show = function() {
                $http.get("requirement-fetch-all.php?uid=" + $scope.uid).then(ok, not);

                function ok(response) {
                    $scope.jsonArray = response.data;
                }

                function not(response) {
                    alert(response.data);
                }
            }
            $scope.doDelete = function(index) {

                $http.get("delete-requirement.php?uid=" + $scope.uid + "&category=" + $scope.jsonArray[index].category).then(oK, nOK);

                function oK(response) {
                    $scope.jsonArray.splice(index, 1);
                }

                function nOK(response) {

                }
            }
        });

    </script>
</head>

<body ng-app="mymodule" ng-controller="mycontrol">
    <div class="pageback"></div>
    <nav class="navbar navbar-light navbar-expand-lg pb-5">
        <div class="container-lg">
            <span class="navbar-brand h1 pt-2" style="color:white;font-size: 30px">EasyWork</span>
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

            <div class="col-lg-3 pb-3" style="width:18rem;">
                <a href="citizen-profile-front.php" style="text-decoration: none;color: black">
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

            <div class="col-lg-3 pb-3" style="width:18rem;">
                <a href="" data-toggle="modal" data-target="#workModal" style="text-decoration: none;color: black">
                    <div class="card cd">
                        <img src="pics/tool2%20-%20Copy.jpg" class="card-img-top" alt="...">
                        <center>
                            <div class="card-body">
                               
                                <h4><b>Post Work</b></h4>
                                <p>Post your work here</p>
                            </div>
                        </center>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 pb-3" style="width:18rem;">
                <a href="" data-toggle="modal" data-target="#requireModal" style="text-decoration: none;color: black">
                    <div class="card cd">
                        <img src="pics/requirements1.png" class="card-img-top" alt="...">
                        <center>
                            <div class="card-body">
                                <h4><b>Work Manager</b></h4>
                                <p>Manage your work</p>
                            </div>
                        </center>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 pb-3" style="width:18rem;">
                <a href="citizen-search-worker.php" style="text-decoration: none;color: black">
                    <div class="card cd">
                       
                        <img src="pics/worker.jpg" class="card-img-top" alt="...">
                        <center>
                            <div class="card-body">
                               
                                <h4><b>Search Worker</b></h4>
                                <p>Find suitable worker for you.</p>
                            </div>
                        </center>
                    </div>
                </a>
            </div>

        </div>
        <div class="row pt-3 pb-5">

            <div class="col-lg-3 pb-3" style="width:18rem;">
                <a href="rate-worker-front.php" style="text-decoration: none;color: black">
                    <div class="card cd">
                        <img src="pics/star-rating-770x433.jpg" class="card-img-top" alt="...">
                        <center>
                            <div class="card-body">
                                <h4><b>Rate Worker</b></h4>
                                <p>Give rating to your worker</p>
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

    <!-- Post work modal -->
    <div class="modal fade" id="workModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #4f40ff">
                    <h5 class="modal-title" style="color: white;font-size:23px">Work Requirement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background-color: #f0f0f0;">
                    <div class="form-group">
                        <label>User Id</label>
                        <input type="text" class="form-control" readonly id="txtUid" name="txtUid" value="<?php echo $_SESSION['activeuser']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <input type="text" class="form-control" id="category" name="category">
                    </div>
                    <div class="form-group">
                        <label>Problem</label>
                        <input type="text" class="form-control" id="problem" name="problem">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" id="city" name="city">
                    </div>
                </div>
                <div class="modal-footer" style="background-color: #f0f0f0;">
                    <span id="workRes"></span>
                    <button type="button" class="btn btn-primary" id="workbtn">Post</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Requirement manager modal -->
    <div class="modal fade" id="requireModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #4f40ff">
                    <h5 class="modal-title" style="color: white;font-size:23px">Requirement Manager</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background-color: #f0f0f0;">
                    <div class="form-group">
                        <label for="">User Id</label>
                        <input type="text" class="form-control" ng-model="uid" readonly ng-init="uid='<?php echo $_SESSION['activeuser']; ?>'">
                    </div>
                    <div class="form-row pb-2">
                        <input type="button" value="Fetch" class="form-control btn btn-primary" ng-click="show();">
                    </div>
                    <table class="table table-striped" style="font-family:cursive">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Category</th>
                                <th scope="col">Problem</th>
                                <th scope="col">Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="obj in jsonArray">
                                <th scope="row">{{obj.category}}</th>
                                <td>{{obj.problem}}</td>
                                <td>{{obj.dop}}</td>
                                <td><input type="button" ng-click="doDelete($index);" class="btn btn-primary" value="Delete"></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Password change modal -->
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
                    <!--
                   <div class="form-group">
                        <label>Old Password</label>
                        <input type="password" class="form-control" id="txtPWD" name="txtPWD">
                    </div>
-->
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
