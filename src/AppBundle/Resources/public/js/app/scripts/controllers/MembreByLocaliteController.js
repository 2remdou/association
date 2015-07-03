/**
 * Created by delphinsagno on 27/06/15.
 */

app.controller('MembreByLocaliteController', ['$scope','Communes','Membres','Restangular',function ($scope,Communes,Membres,Restangular) {

    $scope.communes = Communes.getList().$object;
    membres = Membres.getList().$object;
    $scope.selectCommune=function(commune){
        console.log("selectCommune");
        $scope.quartiers = commune.quartiers;

        $scope.membres=[];

        angular.forEach(membres,function(m){
            if(m.quartier.commune.id === commune.id){
                $scope.membres.push(angular.copy(m));
            }
        });
    };

    $scope.selectQuartier = function(quartier){
        if(!quartier)
        {
            return;
        }
        listes = Restangular.copy($scope.membres);
        $scope.membres=[];
        angular.forEach(membres,function(m){
            if(m.quartier.id === quartier.id){
                $scope.membres.push(angular.copy(m));
            }
        });


    };


}]);