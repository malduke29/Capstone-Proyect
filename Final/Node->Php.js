var data = {                    //se define la info que se quiere pasar, aqui seria el JWT o el  JWT decodificado
   var1:"something", 
   var2:"something else"
};


var querystring = require("querystring");
var qs = querystring.stringify(data);
var qslength = qs.length;
var options = {            //aqui vendria las datos de donde quieres enviar la info
    hostname: "example.com",
    port: 80,
    path: "some.php",
    method: 'POST',
    headers:{
        'Content-Type': 'application/x-www-form-urlencoded',
        'Content-Length': qslength
    }
};

var buffer = ""; //se define la varibale que se enviara
var req = http.request(options, function(res) {     //se realiza una request con los datos especificados anteriormente y la siguiente funcion
    res.on('data', function (chunk) {      //la funcion toma la info de la variable data y la coloca en buffer
       buffer+=chunk;
    });
    res.on('end', function() {
        console.log(buffer);
    });
});

req.write(qs);
req.end();
