/**
 * Created by delphinsagno on 04/07/15.
 */

app.directive('orgchart',['$compile','Postes','$timeout',function($compile,Postes,$timeout) {
    return {
        restrict: 'EA',
        //priority: 2000,
        scope: {
            source : '@',
            container  : '=',
            stack      : '=',
            depth      : '=',
            interactive: '=',
            showLevels : '=',
            clicked    : '=',
            postes     : '='
        },
        templateUrl: 'views/templateOrganigramme.html',
        link: function(scope, element, attrs) {
            scope.postes = Postes.getList().$object;
                var target = $(element);
                var source = $('#' + scope.source);
                var options = {
                    container  : target,
                    nodeClicked: scope.clicked,
                    stack      : scope.stack,
                    depth      : scope.depth,
                    interactive: scope.interactive,
                    showLevels : scope.showLevels
                };
/*
            scope.$watch(scope.postes,function(newValue,oldValue){
                source.orgChart(options);
            });
*/
/*
            $timeout(function(){
                source.orgChart(options);
            },3000);
*/

        }
    }
}]);