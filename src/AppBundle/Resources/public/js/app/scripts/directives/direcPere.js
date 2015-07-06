/**
 * Created by delphinsagno on 05/07/15.
 */

app.directive('direcPere',function(){
   return {
      restrict : 'EA',
       templateUrl : 'views/pere.html',
       scope: {
           peres : '='
       }
   } ;
});