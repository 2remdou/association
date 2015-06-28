/**
 * Created by delphinsagno on 27/06/15.
 */

app.controller('PosteController', ['$scope','Postes',function ($scope,Postes) {
    $scope.postes = Postes.getList().$object;

    $scope.save = function(){
        if($scope.method === "PUT"){
            $scope.newPoste.put().then(function(c){
                $scope.newPoste = {};
            });

            $scope.method = "POST";
        }
        else{
            Postes.post($scope.newPoste).then(function(c){
                $scope.postes.push($scope.newPoste);
                $scope.newPoste = {};
            });
        }

    };

    $scope.editPoste= function(poste){
        $scope.newPoste = poste;
        $scope.method = "PUT";
    };

    $scope.deletePoste = function(poste){
        poste.remove();

        $scope.postes.splice($scope.postes.indexOf(poste),1);
    }

}]);