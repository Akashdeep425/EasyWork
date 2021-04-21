<!DOCTYPE html>
<html lang="en">
<?php  session_start();
     if(isset($_SESSION["activeuser"])==false)
    {
        header("location:index.php");
    }?>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/angular.min.js"></script>
    <script src="https://use.fontawesome.com/fe7390102d.js"></script>
    <link rel="stylesheet" href="css/worker-search-citizen.css">
    <script>
        var module = angular.module("mymodule", []);
        module.controller("mycontrol", function($scope, $http) {
            $scope.catArry;
            $scope.cityArry;
            $scope.selectArry;
            $scope.details;
            $scope.doFetchAll = function() {
                $http.get("worker-category-fetch.php").then(okA, notokA);

                function okA(responseA) {
                    $scope.catArry = responseA.data;
                    $scope.catObject = $scope.catArry[1];
                }

                function notokA(responseA) {
                    alert(responseA.data);
                }
                $http.get("worker-city-fetch.php").then(okB, notokB);

                function okB(responseB) {

                    $scope.cityArry = responseB.data;
                    $scope.cityObject = $scope.cityArry[1];
                }

                function notokB(responseB) {
                    alert(responseB.data);
                }
            }
            $scope.doFetchSelected = function() {
                $http.get("worker-city-category-fetch.php?category=" + $scope.catObject.category + "&city=" + $scope.cityObject.city).then(okfx, notokfx);

                function okfx(response) {
                    $scope.selectArry = response.data;
                    if(response.data==""){
                        alert("No Jobs Found");
                    }
                }

                function notokfx(response) {
                    alert(response.data);
                }
            }
            $scope.showDetails = function(index) {
                
                $http.get("citizen-detail-fetch.php?uid=" + $scope.selectArry[index].citizenuid).then(fxA, fxB);

                function fxA(res) {
                    $scope.details=res.data;
                   
                }

                function fxB(res) {
                    alert(res.data);
                }
            }

        });

    </script>
   
</head>

<body ng-app="mymodule" ng-controller="mycontrol" ng-init="doFetchAll();">
    <div class="pageback"></div>
    <nav class="navbar navbar-light navbar-expand-lg">
       <div class="container-lg">
        <span class="navbar-brand h1" style="color:white;font-size: 30px">EasyWork</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto" style="padding: 5px">
                   <li class="nav-item pr-2">
                        <a href="dash-worker.php" class="btn nav-link" style="color:white;font-family: sans-serif;font-size: 17px">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="btn nav-link" style="color:white;font-family: sans-serif;font-size: 17px"><i class="fa fa-sign-out"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <center>
        <span style="color:white;font-size: 30px;"> Find Work</span>
    </center>
    <div class="container pt-5 pb-3">
        <div class="form-row">
            <div class="col-md-6 form-group">
                <label for="">Category</label>
                <select name="" id="" ng-model="catObject" class="form-control" ng-options="obj.category for obj in catArry"></select>
            </div>
            <div class="col-md-6 form-group">
                <label for="">City</label>
                <select name="" id="" class="form-control" ng-model="cityObject" ng-options="obj.city for obj in cityArry"></select>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <center>
                    <div class="btn btn-primary" ng-click="doFetchSelected();">Search</div>
                </center>
            </div>
        </div>
    </div>
    <!--  table  -->
    <div class="container" style="font-family:cursive">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>S. No.</th>
                    <th>Name</th>
                    <th>Task</th>
                    <th>Address</th>
                    <th></th>
                </tr>
            </thead>
            <tr ng-repeat="obj in selectArry">
                <td>
                    {{$index+1}}
                </td>
                <td>
                    {{obj.citizenuid}}
                </td>
                <td>
                    {{obj.problem}}
                </td>
                <td>
                    {{obj.address}}
                </td>
                <td>
                    <div class="btn btn-primary" data-toggle="modal" data-target="#citizenModal" ng-click="showDetails($index);">Details</div>
                </td>

            </tr>
        </table>
    </div>
    <!-- modal  -->
    <div class="modal fade" id="citizenModal" tabindex="-1" role="dialog" aria-labelledby="Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #4f40ff">
                    <h5 class="modal-title" id="Label" style="color: white">Citizen Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background:#f0f0f0" ng-repeat="obj in details">
                    <center> <img src="uploads/{{details[0].pic}}" style="margin-top: 10px;" class="img"></center>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <center>
                                    <th>Name</th>
                                    <td>{{details[0].name}}</td>
                                </center>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Mobile</th>
                                <td>{{details[0].mobile}}</td>
                            </tr>
                            
                            <tr>
                                <th>Address</th>
                                <td colspan="3">{{details[0].address}}</td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
