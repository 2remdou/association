/**
 * Created by delphinsagno on 27/06/15.
 */

app.controller('CommuneController', ['$scope','Communes',function ($scope,Communes) {

    $scope.communes = Communes.getList().$object;

    $scope.save = function(){
        if($scope.method === "PUT"){
            $scope.newCommune.put().then(function(c){
                $scope.newCommune = {};
            });

            $scope.method = "POST";
        }
        else{
            Communes.post($scope.newCommune).then(function(c){
                $scope.communes.push($scope.newCommune);
                $scope.newCommune = {};
            });
        }

    };

    $scope.editCommune= function(commune){
        $scope.newCommune = commune;
        $scope.method = "PUT";
    };

    $scope.deleteCommune = function(commune){
        commune.remove();

        $scope.communes.splice($scope.communes.indexOf(commune),1);
    }
}]);