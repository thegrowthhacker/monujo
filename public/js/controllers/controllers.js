controllers.controller("MenuCtrl", ["$scope", "$location", function ($scope, $location) {
    $scope.navClass = function (page) {
        var currentRoute = $location.path().substring(1) || "summary";
        return  page === currentRoute ? "active" : "";
    };
}]);

controllers.controller("TransactionsCtrl", ["$scope", "$location", function ($scope, $location) {
}]);

controllers.controller("SummaryCtrl", ["$scope", "$location", function ($scope, $location) {
}]);

controllers.controller("BudgetCtrl", ["$scope", "$location", function ($scope, $location) {
}]);

controllers.controller("GraphsCtrl", ["$scope", "$location", function ($scope, $location) {
}]);

controllers.controller("BudgetCtrl", ["$scope", "$location", function ($scope, $location) {
}]);

controllers.controller("AccountCtrl", ["$scope", "$location", "account", "notification", function ($scope, $location, account, notification) {
    account.get().then(function (data) {
        $scope.account = data;
    });

    $scope.updateProfile = function () {
        account.update($scope.account).then(function (data) {
            $scope.account = data;
            notification.success("Profile updated :)");
        });
    }
}]);