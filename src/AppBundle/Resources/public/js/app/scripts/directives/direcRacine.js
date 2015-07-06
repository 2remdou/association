/**
 * Created by delphinsagno on 05/07/15.
 */

app.directive('direcRacine',['$compile','$timeout',function($compile,$timeout){
   return {
      restrict : 'EA',
       scope: {
           racine : '='
       },
       link : function(scope,element,attrb){
           console.log('direcRacine');
           $timeout(function(){
               if(angular.isArray(scope.racine.subordonnees)){
                   element.append("<li ng-repeat='p in racine.subordonnees'>{{p.libellePoste}}<ul direc-node=''  items='p.subordonnees'></ul></li>")
               }
               $compile(element.contents())(scope);
           },1000);

/*

*/
       }
   } ;
}]);