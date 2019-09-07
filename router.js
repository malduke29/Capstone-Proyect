function route(handle,pathname, res, postData){
 console.log("a punto de rutear una peticion para "+ pathname);
 if(typeof handle[pathname]=== 'function'){
  handle[pathname](res,postData);
 }
 else{
 console.log("no se encontro manipulador para " + pathname);
 res.writeHead(404,{"Content-Type": "text/html"});
 res.write("404 no Encontrado");
 res.end();
 }
}

exports.route =route;
