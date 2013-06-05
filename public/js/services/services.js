services.factory("account", ["$http", "config", function ($http, config) {
    return{
        get: function () {
            return $http.get(config.baseUrl + "/account").then(function (res) {
                res.data.password = "";
                res.data.password_confirmation = "";
                return res.data
            });
        },
        update: function (params) {
            return $http.post(config.baseUrl + "/account", params).then(function (res) {
                res.data.password = "";
                res.data.password_confirmation = "";
                return res.data;
            });
        }
    }

}]);

services.factory("ls", function () {
    var STORAGE_ID = "app";
    return {
        get: function (key) {
            return JSON.parse(localStorage.getItem(STORAGE_ID + key) || false);
        },

        set: function (key, data) {
            localStorage.setItem(STORAGE_ID + key, JSON.stringify(data));
        }
    };
});


services.factory("loadingService", function () {
    var service = {
        requestCount: 0,
        isLoading: function () {
            return service.requestCount > 0;
        }
    };
    return service;
});

services.factory("onStartInterceptor", function (loadingService) {
    return function (data, headersGetter) {
        loadingService.requestCount++;
        return data;
    };
});

services.factory("onCompleteInterceptor", ["notification", "loadingService", "$q", function (notification, loadingService, $q) {
    return function (promise) {
        return promise.then(function (response) {
            loadingService.requestCount -= 1;
            return response;
        }, function (response) {
            loadingService.requestCount -= 1;
            notification.error("An error has occoured");
            return $q.reject(response);
        });
    }
}]);

services.factory("notification", function () {
    toastr.options.timeOut = 3000;
    toastr.options.positionClass = "toast-bottom-right";

    return {
        error: function (message) {
            toastr.error(message);
        },
        success: function (message) {
            toastr.success(message);
        },
        info: function (message) {
            toastr.info(message);
        },
        warning: function (message) {
            toastr.warning(message);
        }
    }

});
