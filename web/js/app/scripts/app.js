'use strict';

/**
 * @ngdoc overview
 * @name jsApp
 * @description
 * # jsApp
 *
 * Main module of the application.
 */
angular
  .module('jsApp', [
    'ngRoute'
  ])
  .config(function ($routeProvider) {
    $routeProvider
      .when('/', {
        templateUrl: 'views/main.html',
        controller: 'MainCtrl'
      })
      .when('/about', {
        templateUrl: 'views/about.html',
        controller: 'AboutCtrl'
      })
      .otherwise({
        redirectTo: '/'
      });
  });
