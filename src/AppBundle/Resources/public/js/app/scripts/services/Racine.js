/**
 * Created by delphinsagno on 28/06/15.
 */

app.factory('Racine',['Restangular',function(Restangular){
    return Restangular.service('postes/node/');

}]);