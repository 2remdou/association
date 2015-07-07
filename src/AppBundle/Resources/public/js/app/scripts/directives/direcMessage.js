/**
 * Created by delphinsagno on 05/07/15.
 */

app.directive('direcMessage',['$rootScope',function($rootScope){
   return {
      restrict : 'EA',
       scope: {
       },
       link : function(scope,element,attr){
            $rootScope.displayMessage = false;
            $rootScope.type = "";
            $rootScope.content = "";
            $rootScope.header ="";
       }
   } ;
}]);