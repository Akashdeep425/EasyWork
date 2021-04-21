<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/angular.min.js"></script>
    <script src="js/jquery-1.8.2.min.js"></script>
    <link rel="stylesheet" href="css/manage-users-front.css">
    <script>
    var module = angular.module("module", []);
        module.controller("control", function($scope, $http) {
            $scope.catArray;
            $scope.fetchAll = function() {
              
                $http.get("manage-users-fetch.php").then(okA, notA);

                function okA(response) {
                    $scope.catArray = response.data;
                    $scope.cobject = $scope.catArray[1];
                }

                function notA(response) {
                    alert(response.data);
                }
            }
            $scope.doFetchSelected = function() {
                $http.get("fetch-users-admin.php?category=" + $scope.cobject.category).then(okfx, notokfx);

                function okfx(response) {
                    $scope.array = response.data;
                }

                function notokfx(response) {
                    alert(response.data);
                }
            }
            $scope.doBlock=function(index){
                $http.get("block-user.php?uid="+$scope.array[index].uid).then(oK,nOK);
                function oK(response){
                   alert("success");
                    $scope.doFetchSelected();
                }
                function nOK(response){
                    alert();
                }
            }
            $scope.doResume=function(index){
                $http.get("resume-user.php?uid="+$scope.array[index].uid).then(oK,nOK);
                function oK(response){
                   alert("success");
                    $scope.doFetchSelected();
                }
                function nOK(response){
                    alert();
                }
            }
            $scope.doDelete=function(index){
                $http.get("delete-user.php?uid="+$scope.array[index].uid).then(oK,nOK);
                function oK(response){
                   alert("success");
                    $scope.array.splice(index,1);
                }
                function nOK(response){
                    alert();
                }
            }
        });

    </script>
   
</head>
<body ng-app="module" ng-controller="control" ng-init="fetchAll();">
    <div class="pageback"></div>
    <nav class="navbar navbar-light navbar-expand-lg">
       <div class="container-lg">
        <span class="navbar-brand h1" style="color:white;font-size: 30px">EasyWork</span>
        </div>
    </nav>
    <div class="container pt-5 pb-3">
        <div class="form-row">
            <div class="col-md-6 form-group">
                <label for="">Category</label>
                <select name="" id="" ng-model="cobject" class="form-control" ng-options="obj.category for obj in catArray"></select>
            </div>
           <div class="col-md-6 form-group">
              <label for="">&nbsp;</label>
              <center>
                  <div class="form-control btn btn-success" ng-click="doFetchSelected();" style="width:150px">Fetch</div>
           </center></div>
        </div>
        
    </div>
    <!--  table  -->
    <div class="container-xl" style="font-family:cursive">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>S. No.</th>
                    <th>User Id</th>
                    <th>Password</th>
                    <th>Mobile</th>
                    <th>Date of Signup</th>
                    <th>Status</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tr ng-repeat="obj in array">
                <td>
                    {{$index+1}}
                </td>
                <td>
                    {{obj.uid}}
                </td>
                <td>
                    {{obj.pwd}}
                </td>
                <td>
                    {{obj.mobile}}
                </td>
                <td>
                    {{obj.dos}}
                </td>
                <td>
                    {{obj.status}}
                </td>
                <td><input type="button" ng-click="doBlock($index);" class="btn btn-primary" value="Block"></td>
                <td><input type="button" ng-click="doResume($index);" class="btn btn-primary" value="Resume"></td>
                <td><input type="button" ng-click="doDelete($index);" class="btn btn-primary" value="Delete"></td>
            </tr>
        </table>
    </div>
</body>
</html>