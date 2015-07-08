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
           $timeout(function(){
               if(angular.isArray(scope.racine.subordonnees)){
                   element.append("<li ng-repeat='p in racine.subordonnees'>{{p.libellePoste}}" +
                   "<div><em>{{p.membres[0].nomMembre}} {{p.membres[0].prenomMembre}}</em></div>"+
                   "<ul direc-node=''  items='p.subordonnees'></ul></li>")
               }
               $compile(element.contents())(scope);
           },1000);

/*

*/
       }
   } ;
}]);