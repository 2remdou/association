/**
 * Created by delphinsagno on 27/06/15.
 */

app.controller('MembreController',['$scope','Quartiers','Postes','Membres','Communes',function ($scope,Quartiers,Postes,Membres,Communes) {
        $scope.postes = Postes.getList().$object;
        //$scope.quartiers = Quartiers.getList().$object;
        $scope.membres = Membres.getList().$object;
        $scope.communes = Communes.getList().$object;

    
    $scope.save = function(method){
        var m = angular.copy($scope.newMembre);
        if($scope.method === "PUT"){
            delete $scope.newMembre.quartier;
            delete $scope.newMembre.poste;

            $scope.newMembre.quartier = m.quartier.id;
            $scope.newMembre.poste = m.poste.id;

            $scope.newMembre.put().then(function(c){
                $scope.newMembre = {};
            });

            $scope.method = "POST";
        }
        else{
            delete m.quartier; // car l'api n'a besoin que de l'id de la commune
            delete m.poste; // car l'api n'a besoin que de l'id du poste

            m.quartier=$scope.newMembre.quartier.id;
            m.poste=$scope.newMembre.poste.id;

            Membres.post(m).then(function(m){
                $scope.membres.push($scope.newMembre);
                $scope.newMembre = {};
            });
        }

    };

    $scope.editMembre= function(membre){
        $scope.newMembre = membre;
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