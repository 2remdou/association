/**
 * Created by delphinsagno on 27/06/15.
 */

app.controller('MembreController',['$scope','Quartiers','Postes','Membres','Communes',function ($scope,Quartiers,Postes,Membres,Communes) {
        $scope.postes = Postes.getList().$object;
        //$scope.quartiers = Quartiers.getList().$object;
        $scope.membres = Membres.getList().$object;
        $scope.communes = Communes.getList().$object;

    
    $scope.save = function(method){
        if($scope.method === "PUT"){

            angular.copy($scope.newMembre).put().then(function(c){
                $scope.newMembre = {};
            });

            $scope.method = "POST";
        }
        else{
            Membres.post(angular.copy($scope.newMembre)).then(function(m){
                $scope.membres.push($scope.newMembre);
                $scope.newMembre = {};
            });
        }

    };

    $scope.editMembre= function(membre){
        $scope.newMembre = membre;
        $scope.commune = membre.quartier.commune;
        $scope.method = "PUT";
    };

    $scope.deleteMembre = function(membre){
        membre.remove();

        $scope.membres.splice($scope.membres.indexOf(membre),1);
    }

    $scope.selectCommune=function(commune){
        $scope.quartiers = commune.quartiers;
    };

}]);