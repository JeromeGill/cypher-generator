var Cypher = (function () {
    'use strict';
    return {
        pathArray : '',
        baseUrl : '',
        formHandler : {}
    };
}());

Cypher.pathArray = window.location.href.split('/');
Cypher.baseUrl = Cypher.pathArray[0] + '//' + Cypher.pathArray[2];

Cypher.formHandler = (function () {
    "use strict";
    var responseDiv = $("p#response-message");
    return {
        formToJson : function (form) {
            return {'formData': JSON.stringify(form.serializeArray())};
        },

        successCallback : function (response) {
            responseDiv.text(response);
            responseDiv.show();
        },

        errorCallback : function (response) {
            responseDiv.text(response.responseText);
            responseDiv.show();
        }
    };
}());
