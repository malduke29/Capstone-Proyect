var mysql = require('mysql');
const express = require('express');
const bodyParser = require('body-parser');
const ngrok= require('ngrok');
const decodeJWT = require('did-jwt').decodeJWT
const {Credentials} = require('uport-credentials');
const transports = require('uport-transports').transport;
const message = require('uport-transports').message.util;
const urllib = require('url');
var nodemailer = require('nodemailer');
const normalizeWhitespace = require('normalize-html-whitespace');

let endpoint = ''
const app = express();
app.use(bodyParser.json({type: '*/*'}));

app.all('/', function(req, res, next) {
  res.header("Access-Control-Allow-Origin", "*");
  res.header("Access-Control-Allow-Headers", "X-Requested-With");
  next();
 });

 var connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'universidad',
  debug: false,
});
connection.connect();
console.log("Connected to Mysql");

const credentials = new Credentials({
  appName:"APP Certificados Académicos UAI",
 did: 'did:ethr:0xcb29ab583d6214779e8c09a5ebb7796533a598bd',
  privateKey: '2d158cde38b7e1594286c41b3d442d1b2e926cb07c1abe94c4df1554e6c509e2' 
})

var transporter = nodemailer.createTransport({
  service:'gmail',
  auth:{
  user: 'registrosacademicos.uai@gmail.com',
  pass: 'Hola123489'
  }
 }); 

app.get('/', (req, res) => {
var url_parts = urllib.parse(req.url, true);
var query = url_parts.query;
console.log(query.tipo_de_certificado);
    credentials.createDisclosureRequest({
      verified: ['Certificado'],
      callbackUrl: endpoint + '/callback'
    }).then(requestToken => {
      console.log(decodeJWT(requestToken))  //log request token to console
      const uri = message.paramsToQueryString(message.messageToURI(requestToken), {callback_type: 'post'})
      const qr =  transports.ui.getImageDataURI(uri)
      res.send(`<div><img src="${qr}"/></div>`)
    })
    
    var mailOptions= {
      from: 'registrosacademicos.uai@gmail.com',
      to: query.email_alumno,
      subject: 'Solicitud de Certificado de la empresa',
      html: '<!DOCTYPE html>'+
            '<html>'+
            '<body>'+
      '<p>Sr(a) '+query.nombre_alumno+ ':</p>'+
      '<p>Por medio del presente, le comunicamos que la empresa IBM está solicitando su '+query.tipo_de_certificado+'. Se adjunta el código QR para ser escaneado con su aplicación Uport. No responda este e-mail, ya que, es generado automáticamente.</p>'+
      '<p>Si no sabe como escanear el código QR con su aplicación Uport puede seguir <a href="">este</a> tutorial.</p>'+ 
       '<p><a href='+endpoint+'>AQUI.</a></p>'+
      '<p>Atentamente, le saluda,<br/>Secretaría General. </p>'+
            '</body>'+
            '</html>'
          };

      transporter.sendMail(mailOptions,function(error,info){
        if(error){  
        console.log(error);
        }
        else{
        console.log('Email sent: '+ info.response);
        }
      });
          
       })

  app.post('/callback', (req, res) => {
    var url_parts = urllib.parse(req.url, true);
    var query = url_parts.query;
    const jwt = req.body.access_token
    const decodificado = decodeJWT(jwt);
    var sql = "UPDATE solicitud set jwt =? WHERE id = ?";
    var query = connection.query(sql, [jwt, 8], function(err, result) {
  });
    console.log(jwt)
    console.log(decodeJWT(jwt))
    credentials.authenticateDisclosureResponse(jwt).then(creds => {
      //validate specific data per use case
      console.log(creds)
      console.log(creds.verified[0])
    }).catch( err => {
      console.log("oops")
    })
  })

  const server = app.listen(8088, () => {
    ngrok.connect(8088).then(ngrokUrl => {
      endpoint = ngrokUrl
      console.log(`Login Service running, open at ${endpoint}`)
    })
  })