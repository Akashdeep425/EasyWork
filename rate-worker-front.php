<!DOCTYPE html>

<html lang="en">
<?php session_start();
     if(isset($_SESSION["activeuser"])==false)
    {
        header("location:index.php");
    }?>

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/angular.min.js"></script>
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="https://use.fontawesome.com/fe7390102d.js"></script>
    <link rel="stylesheet" href="css/rate-worker.css">
    <script>
        var module = angular.module("module", []);
        module.controller("control", function($scope, $http) {

            $scope.doFetch = function() {
                $http.get("rate-worker-process.php?uid=" + $scope.uid).then(okfx, notokfx);

                function okfx(response) {
                    $scope.rArray = response.data;
                    if(response.data==""){
                        alert("No Requests");
                    }
                }

                function notokfx(response) {
                    alert(response.data);
                }
            }
            $scope.doPost = function(index) {
                $scope.rated_index=document.getElementById("ind").value;
                $scope.rating=document.getElementById("rat").value;
                if($scope.rated_index!=0 && $scope.rating!=0){
                    document.getElementById("rat").value="";
                    document.getElementById("ind").value="";
                }
                $http.get("post-rating-process.php?rid=" + $scope.rArray[index].rid + "&uid=" + $scope.rArray[index].workeruid + "&rating=" + $scope.rating).then(oA, oB);

                function oA(response) {
                    alert("success");
                    $scope.doFetch();
                }

                function oB(response) {
                    alert(response.data);
                }
            }
            $scope.click_star=function(index,num){
                var all=document.querySelectorAll(".fa");
                for(i=0;i<all.length;i++)
                    {
                        all[i].setAttribute("class","fa fa-star-o");
                    }
                var row=index;
                var starting=row*5;
                var no;
                for(i=0;i<=parseInt(num);i++)
                    {
                        no=parseInt(starting)+i;
                        all[no].setAttribute("class","fa fa-star");
                    }
                document.getElementById("rat").value=num;
                document.getElementById("ind").value=index;
            }

        });

    </script>

</head>

<body ng-app="module" ng-controller="control">
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
                        <a href="dash-citizen.php" class="btn nav-link" style="color:white;font-family: sans-serif;font-size: 17px">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="btn nav-link" style="color:white;font-family: sans-serif;font-size: 17px"><i class="fa fa-sign-out"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container pt-5 pb-3">
        <div class="form-row">
            <div class="col-md-6 form-group">
                <label for="">User Id</label>
                <input type="text" class="form-control" ng-model="uid" readonly ng-init="uid='<?php echo $_SESSION['activeuser']; ?>'">
            </div>
            <div class="col-md-6 form-group">
                <label for="">&nbsp;</label>
                <center>
                    <div class="form-control btn btn-success" ng-click="doFetch();" style="width:180px">Fetch Requests</div>
                </center>
            </div>
        </div>
    </div>
    
    <div class="container" style="font-family:cursive">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>S. No.</th>
                    <th>Worker Id</th>
                    <th>Rating</th>
                    <th></th>
                </tr>
            </thead>
            <tr ng-repeat="obj in rArray">
                <td>
                    {{$index+1}}
                </td>
                <td>
                    {{obj.workeruid}}
                </td>
                <td class="star-box">
<!--               <input type="number" ng-model="obj.rating">-->
               <i class="fa fa-star-o" ng-click="click_star($index,'1')" aria-hidden="true"></i>
               <i class="fa fa-star-o" ng-click="click_star($index,'2')" aria-hidden="true"></i>
               <i class="fa fa-star-o" ng-click="click_star($index,'3')" aria-hidden="true"></i>
               <i class="fa fa-star-o" ng-click="click_star($index,'4')" aria-hidden="true"></i>
               <i class="fa fa-star-o" ng-click="click_star($index,'5')" aria-hidden="true"></i>
                </td>
                <td>
                    <input type="button" ng-click="doPost($index);" class="btn btn-primary" value="Rate">
                </td>
            </tr>
        </table>
    </div>
    <input type="hidden" id="rat">
    <input type="hidden" id="ind">
</body>

</html>
