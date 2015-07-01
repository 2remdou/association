/**
 * Created by delphinsagno on 27/06/15.
 */

app.controller('QuartierController', ['$scope','Communes','Quartiers',function ($scope,Communes,Quartiers) {
       $scope.communes = Communes.getList().$object;
       $scope.quartiers = Quartiers.getList().$object;


    $scope.save = function(){
        var q = angular.copy($scope.newQuartier);
        if($scope.method === "PUT"){
/*
            delete $scope.newQuartier.commune;
            $scope.newQuartier.commune = q.commune.id;
*/
            angular.copy($scope.newQuartier).put().then(function(c){
                $scope.newQuartier = {};
            });

            $scope.method = "POST";
        }
        else{

            Quartiers.post(angular.copy($scope.newQuartier)).then(function(c){
                $scope.quartiers.push($scope.newQuartier);
                $scope.newQuartier = {};
            });
        }

    };

    $scope.editQuartier= function(quartier){
        $scope.newQuartier = quartier;
        $scope.method = "PUT";
    };

    $scope.deleteQuartier = function(quartier){
        quartier.remove();

        $scope.quartiers.splice($scope.quartiers.indexOf(quartier),1);
    }

}]);