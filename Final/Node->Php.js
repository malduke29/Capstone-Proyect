var data = {
   var1:"something", 
   var2:"something else"
};
var querystring = require("querystring");
var qs = querystring.stringify(data);
var qslength = qs.length;
var options = {
    hostname: "example.com",
    port: 80,
    path: "some.php",
    method: 'POST',
    headers:{
        'Content-Type': 'application/x-www-form-urlencoded',
        'Content-Length': qslength
    }
};

var buffer = "";
var req = http.request(options, function(res) {
    res.on('data', function (chunk) {
       buffer+=chunk;
    });
    res.on('end', function() {
        console.log(buffer);
    });
});

req.write(qs);
req.end();
