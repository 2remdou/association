/**
 * Created by delphinsagno on 27/06/15.
 */

app.controller('OrganigrammeController', ['$scope','Postes',function ($scope,Postes) {
    $scope.postes = Postes.getList().$object;

/*
    Postes.getList().then(function(postes){
        $scope.postes = postes;
        console.log($scope.postes);
    });
    console.log('out'+$scope.postes);
*/
}]);