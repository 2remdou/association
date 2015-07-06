/**
 * Created by delphinsagno on 05/07/15.
 */

app.directive('direcNode',['$compile','$timeout',function($compile,$timeout){
   return {
      restrict : 'EA',
       scope: {
           items : '='
       },
       link : function(scope,element,attr){
               console.log(scope.items);
               if(angular.isArray(scope.items)){
                   element.append("<li ng-repeat='p in items'>{{p.libellePoste}}<ul direc-node=''  items='p.subordonnees'></ul></li>");
               }
               else{
                       element.append("<li>{{items.libellePoste}}</li>");
               }
               $compile(element.contents())(scope);
       }
   } ;
}]);