/**
 * Created by delphinsagno on 05/07/15.
 */

app.directive('direcFils',['$compile',function($compile){
    var i = 0;
   return {
       restrict: 'EA',
       templateUrl: 'views/fils.html',
       scope: {
           fils: '='
       },
       link : function(scope,element,attr){

           if(scope.fils.length !== 0){
               console.log(scope.fils);
               var html = "<ul direc-pere='' peres='scope.fils'></ul>";
               var template = angular.element(html);
               var elem = $compile(template)(scope);
               element.append(elem);
           }
       }
/*
       compile : function compile(element,attr){
           return {
               post : function postLink(scope,elem){
                   if(scope.fils.length !== 0){
                       angular.forEach(scope.fils,function(fil){
                           console.log(fil);
                       });

                   }
               }
           }
       }
*/
   }
}]);