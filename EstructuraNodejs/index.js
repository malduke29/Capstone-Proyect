var server = require("./server");
var router = require("./router");
var requestHandlers = require("./requestHandlers")

var handle={}     //lo que manipula las funciones
handle["/"] = requestHandlers.iniciar;
handle["/iniciar"] = requestHandlers.iniciar;
handle["/subir"] = requestHandlers.subir;
handle["/certificado"]=requestHandlers.certificado;

server.iniciar(router.route,handle);
