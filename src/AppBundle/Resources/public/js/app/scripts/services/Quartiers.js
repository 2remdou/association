/**
 * Created by delphinsagno on 28/06/15.
 */

app.factory('Quartiers',['Restangular',function(Restangular){
    return Restangular.service('quartiers/');

}]);