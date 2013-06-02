//version 1.0.0
var app = angular.module('app', ['filters', 'services', 'directives', 'controllers']),
    services = angular.module("services", []),
    controllers = angular.module("controllers", []),
    directives = angular.module("directives", []),
    filters = angular.module("filters", []);


app.config(function ($routeProvider) {
    $routeProvider
        .when('/', {
            templateUrl: 'views/summary.html',
            controller: 'SummaryCtrl'
        })
        .when('/transactions', {
            templateUrl: 'views/transactions.html',
            controller: 'SummaryCtrl'
        })
        .when('/graphs', {
            templateUrl: 'views/graphs.html',
            controller: 'GraphsCtrl'
        })
        .when('/transactions', {
            templateUrl: 'views/transactions.html',
            controller: 'TransactionsCtrl'
        })
        .when('/budget', {
            templateUrl: 'views/budget.html',
            controller: 'BudgetCtrl'
        })
        .when('/account', {
            templateUrl: 'views/account.html',
            controller: 'AccountCtrl'
        })
        .otherwise({
            redirectTo: '/'
        });
}).constant("config", window.APP.config);
