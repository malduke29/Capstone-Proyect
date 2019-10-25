var http =require("http"); //creamos variable para el servidor
var url  =require("url"); //creamos variable para las peticiones

function iniciar(route,handle){       //funcion que el index llamara
 function onRequest(req,res){ 
  var dataPosteada ="";
  var pathname= url.parse(req.url).pathname;
  console.log("Peticion para "+ pathname +" recibida.");

  req.setEncoding("utf8");

  req.addListener("data", function(trozoPosteado){
   dataPosteada += trozoPosteado;
   console.log("Recibido trozo Post '" + trozoPosteado + "'.");
  });
 
  req.addListener("end", function(){
   route(handle, pathname,res, dataPosteada);
  });

 }
  
 http.createServer(onRequest).listen(8888);   //inicia el servidor
 console.log("Servidor Iniciado"); 

}

exports.iniciar=iniciar;  //exporta la funcion para que otros archivos la usen



