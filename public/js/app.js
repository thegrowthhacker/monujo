var app = angular.module("app", ["filters", "services", "directives", "controllers", "ui", "providers"]),
    services = angular.module("services", []),
    controllers = angular.module("controllers", []),
    directives = angular.module("directives", []),
    filters = angular.module("filters", []),
    providers = angular.module("providers", []);


app.config(function ($routeProvider, $httpProvider) {
    $httpProvider.responseInterceptors.push("onCompleteInterceptor");

    $routeProvider
        .when("/", {
            templateUrl: "views/summary.html",
            controller: "SummaryCtrl"
        })
        .when("/transactions", {
            templateUrl: "views/transactions.html",
            controller: "SummaryCtrl"
        })
        .when("/graphs", {
            templateUrl: "views/graphs.html",
            controller: "GraphsCtrl"
        })
        .when("/transactions", {
            templateUrl: "views/transactions.html",
            controller: "TransactionsCtrl"
        })
        .when("/budget", {
            templateUrl: "views/budget.html",
            controller: "BudgetCtrl"
        })
        .when("/account", {
            templateUrl: "views/account.html",
            controller: "AccountCtrl"
        })
        .otherwise({
            redirectTo: "/"
        });
}).constant("config", window.APP.config).run(function ($http, onStartInterceptor, loadingService, $rootScope) {
        $http.defaults.transformRequest.push(onStartInterceptor);
        $rootScope.isLoading = loadingService.isLoading();
        $rootScope.$watch(loadingService.isLoading, function (value) {
            $rootScope.isLoading = value;
        });

    })
;


