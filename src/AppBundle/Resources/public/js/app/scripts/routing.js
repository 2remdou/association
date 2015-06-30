/**
 * Created by delphinsagno on 28/06/15.
 */


app.config(function ($routeProvider) {
    $routeProvider
        .when('/', {
            templateUrl: '../views/main.html',
            controller: 'MainController'
        })
        .when('/communes', {
            templateUrl: '../views/commune.html',
            controller: 'CommuneController'
        })
        .when('/quartiers', {
            templateUrl: '../views/quartier.html',
            controller: 'QuartierController'
        })
        .when('/postes', {
            templateUrl: '../views/poste.html',
            controller: 'PosteController'
        })
        .when('/membres', {
            templateUrl: '../views/membre.html',
            controller: 'MembreController'
        })
        .when('/membreByLocalite', {
            templateUrl: '../views/membreByLocalite.html',
            controller: 'MembreByLocaliteController'
        })

        .otherwise({
            redirectTo: '/'
        });
});
