/**
 * Created by delphinsagno on 28/06/15.
 */

app.config(function(RestangularProvider){
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
                var idSuperieur = elem.superieur.id;

                delete elem.superieur;
                delete elem.ordreHierarchie;
                delete elem.subordonnees;
                delete elem.membres;

                elem.superieur=idSuperieur;
            }
        }
/*
        else if (operation === "post"){

            if(path==="quartiers"){
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
        }
*/
        return elem;
    })
});