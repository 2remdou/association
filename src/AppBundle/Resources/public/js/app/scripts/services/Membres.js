/**
 * Created by delphinsagno on 28/06/15.
 */

app.factory('Membres',['Restangular',function(Restangular){
    return Restangular.service('membres/');

}]);