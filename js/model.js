window.Model = (function () {

    const API_GETALL_URL = `api/get.php`;

    function ajax (reqObj) {
        return new Promise((resolve, reject) => {
            var req = new XMLHttpRequest();
            var data;

            req.onreadystatechange = function (ev) {
                var xhrObj = ev.target;
                if (xhrObj.readyState == XMLHttpRequest.DONE) {
                    if (xhrObj.status == 200) {
                        resolve(JSON.parse(xhrObj.responseText));
                    } else {
                        reject({
                            status: xhrObj.status,
                            statusText: xhrObj.statusText
                        });
                    }
                }
            };

            req.open(reqObj.method || "GET", reqObj.url);

            if (reqObj.method && reqObj.method.toUpperCase() == "POST") {
                req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                let urlParams = new URLSearchParams();
                if (reqObj.data) {
                    for (let k in reqObj.data) {
                        if (reqObj.data.hasOwnProperty(k)) {
                            urlParams.set(k, reqObj.data[k]);
                        }
                    }
                }
                data = urlParams.toString();
            }

            req.send(data);
        });
    }

    function add(todoObj) {
        return ajax({
            url: 'api/add.php',
            method: "POST",
            data: {
                value: todoObj.value
            }
        });
    }

    function del() {

    }

    function getById () {

    }

    function getAll () {
        return ajax({
            url: API_GETALL_URL
        });
    }

    return {
        add, del, getById, getAll, ajax
    }

}());