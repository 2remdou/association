/**
 * Created by delphinsagno on 28/06/15.
 */

app.config(['RestangularProvider',function(RestangularProvider){
    //RestangularProvider.setBaseUrl('/association/web/api');
    RestangularProvider.setBaseUrl('app_dev.php/api/');
    RestangularProvider.setRequestInterceptor(function(elem, operation,path) {
        path = path.substr(0,path.length-1);//supprimer le / à la fin

        if (operation === "put" || operation === "post") {
            delete elem.id;
            if(path==="communes"){
                delete elem.quartiers;
            }
            else if(path==="quartiers"){
                var idCommune = elem.commune.id;
                delete elem.commune;
                elem.commune= idCommune;
            }
            else if(path==="membres"){
                var idQuartier = elem.quartier.id;
                var idPoste = elem.poste.id;

                delete elem.quartier;
                delete elem.poste;

                elem.quartier=idQuartier;
                elem.poste=idPoste;
            }
            else if(path==='postes'){
                if(elem.superieur){
                    var idSuperieur = elem.superieur.id;

                    delete elem.superieur;
                    delete elem.ordreHierarchie;
                    delete elem.subordonnees;
                    delete elem.membres;

                    elem.superieur=idSuperieur;

                }
            }
        }
        return elem;
    });

/*
    RestangularProvider.setErrorInterceptor(function(response, deferred, responseHandler){
        var rootScope = angular.element(document).injector().get('$rootScope');
        rootScope.displayMessage=true;
    });
*/
}]);
app.run(function($injector,Restangular,$timeout){
    Restangular.setErrorInterceptor(function(response, deferred, responseHandler) {
        var rootScope = $injector.get('$rootScope');
        rootScope.displayMessage=true;
        rootScope.content = response.data.message;
        rootScope.type = "danger";
        $timeout(function(){
            rootScope.displayMessage=false;
            rootScope.content = "";
        },2000)

    });
});
