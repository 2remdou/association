/**
 * Created by delphinsagno on 28/06/15.
 */

app.factory('Communes',['Restangular',function(Restangular){
    return Restangular.service('communes/');
}]);