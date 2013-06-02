controllers.controller('MenuCtrl', ["$scope", "$location", "config", function ($scope, $location, config) {
    console.log(config);
    $scope.navClass = function (page) {
        var currentRoute = $location.path().substring(1) || 'summary';
        return  page === currentRoute ? 'active' : '';
    };
}]);

controllers.controller('TransactionsCtrl', ["$scope", "$location", function ($scope, $location) {
}]);

controllers.controller('SummaryCtrl', ["$scope", "$location", function ($scope, $location) {
}]);

controllers.controller('BudgetCtrl', ["$scope", "$location", function ($scope, $location) {
}]);

controllers.controller('GraphsCtrl', ["$scope", "$location", function ($scope, $location) {
}]);

controllers.controller('BudgetCtrl', ["$scope", "$location", function ($scope, $location) {
}]);

controllers.controller('AccountCtrl', ["$scope", "$location","account", function ($scope, $location, account) {
    $scope.account = account.get();
}]);
