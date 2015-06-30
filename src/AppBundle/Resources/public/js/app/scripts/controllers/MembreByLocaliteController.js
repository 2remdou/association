/**
 * Created by delphinsagno on 27/06/15.
 */

app.controller('MembreByLocaliteController', ['$scope','Communes',function ($scope,Communes) {

    $scope.communes = Communes.getList().$object;

    $scope.selectCommune=function(commune){
        $scope.quartiers = commune.quartiers;
    };


}]);