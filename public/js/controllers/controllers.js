controllers.controller('MenuCtrl', ["$scope", "$location", function ($scope, $location) {
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

controllers.controller('AccountCtrl', ["$scope", "$location", function ($scope, $location) {
}]);
