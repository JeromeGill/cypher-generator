(function (Cypher) {
    "use strict";
    $(document)
        .on('submit', '#CypherSelector',
            function (event) {
                event.preventDefault();
                $.ajax({
                    type: "POST",
                    url: Cypher.baseUrl + '/',
                    data: Cypher.formHandler.formToJson($(this)),
                    success: Cypher.formHandler.successCallback,
                    error: Cypher.formHandler.errorCallback
                });
            });
}(Cypher));