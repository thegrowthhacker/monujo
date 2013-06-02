services.factory('game', ["$http", function ($http) {
    return {
        loadCards: function () {
            return $http.get("conf/cards.json", { cache: true}).then(function (res) {
                return res.data
            });
        }
    };
}]);

services.factory('ls', function () {
    var STORAGE_ID = 'app';
    return {
        get: function (key) {
            return JSON.parse(localStorage.getItem(STORAGE_ID + key) || false);
        },

        set: function (key, data) {
            localStorage.setItem(STORAGE_ID + key, JSON.stringify(data));
        }
    };
});