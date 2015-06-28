/**
 * Created by delphinsagno on 28/06/15.
 */

app.factory('Postes',['Restangular',function(Restangular){
    return Restangular.service('postes/');

}]);