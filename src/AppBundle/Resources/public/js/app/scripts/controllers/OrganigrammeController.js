/**
 * Created by delphinsagno on 27/06/15.
 */

app.controller('OrganigrammeController', ['$scope','Racine','$timeout','Restangular',function ($scope,Racine,$timeout,Restangular) {
    //$scope.racine = Racine.getList().$object;
    Restangular.one('postes/node/',0).getList().then(function(r){
        $scope.racine = r[0];
    });

/*
    Postes.getList().then(function(postes){
        $scope.postes = postes;
        console.log($scope.postes);
    });
    console.log('out'+$scope.postes);
*/
}]);