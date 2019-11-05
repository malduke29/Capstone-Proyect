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

app.get('/', (req,res)=> {
 var url_parts = urllib.parse(req.url, true);
 var query = url_parts.query;

	credentials.createDisclosureRequest({
    notifications: true,
    callbackUrl: endpoint +'/callback?rut_alumno='+query.rut_alumno+"&nombre_titulo="+query.nombre_titulo+"&fecha="+query.fecha+"&nombre_alumno="+query.nombre_alumno+ "&email_alumno="+query.email_alumno
  }).then(requestToken => {
		console.log(decodeJWT(requestToken))
		const uri = message.paramsToQueryString(message.messageToURI(requestToken),
			{callback_type: 'post'})
		const qr = transports.ui.getImageDataURI(uri)
		res.send(`<div><img src="${qr}"/></div>`)
  })
  var titulo = encodeURIComponent(query.nombre_titulo);
  var alumno = encodeURIComponent(query.nombre_alumno);
  var mailOptions= {
    from: 'registrosacademicos.uai@gmail.com',
    to: query.email_alumno,
    subject: 'Emisión de su Certificado de Título',
    html: '<!DOCTYPE html>'+
          '<html>'+
          '<body>'+
    '<p>Sr(a) '+query.nombre_alumno+ ':</p>'+
    '<p>Por medio del presente, confirmamos que la emisión de su certificado fue exitosa, se adjunta el codigo QR para ser escaneado con su aplicación Uport. No responda este e-mail, ya que, es generado automáticamente.</p>'+
    '<p>Si no sabe como escanear el código QR con su aplicación Uport puede seguir <a href="">este</a> tutorial.</p>'+ 
          '<img src='+endpoint+'?nombre_titulo='+titulo+'&fecha='+query.fecha+'&rut_alumno='+query.rut_alumno+ '&nombre_alumno='+alumno+ '&email_alumno=' + query.email_alumno+' alt="Si la imagen no aparece, click" width="500" height="500" >'+         
          '<p><a href='+endpoint+'?nombre_titulo='+titulo+'&fecha='+query.fecha+'&rut_alumno='+query.rut_alumno+ '&nombre_alumno='+alumno+ '&email_alumno=' + query.email_alumno+'>AQUI.</a></p>'+
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
  credentials.authenticateDisclosureResponse(jwt).then(creds => {
    // take this time to perform custom authorization steps... then,
    // set up a push transport with the provided 
    // push token and public encryption key (boxPub)
    const push = transports.push.send(creds.pushToken, creds.boxPub)

    credentials.createVerification({
      sub: creds.did,
      exp: Math.floor(new Date().getTime() / 1000) + 30 * 24 * 60 * 60,
      claim: {'Certificado de Titulo' : {
        'Universidad': 'Universidad Adolfo Ibáñez',
         'Sede': 'Santiago',
         'Título': query.nombre_titulo ,
         'Fecha': query.fecha ,
         'Rut': query.rut_alumno,
         'Nombre': query.nombre_alumno
      }}
      
    }).then(attestation => {
      console.log(`Encoded JWT sent to user: ${attestation}`)
      console.log(`Decodeded JWT sent to user: ${JSON.stringify(decodeJWT(attestation))}`)
      return push(attestation)  // *push* the notification to the user's uPort mobile app.
    }).then(res => {
      console.log(res)
      console.log('Push notification sent and should be recieved any moment...')
      console.log('Accept the push notification in the uPort mobile application')
      ngrok.disconnect()
    })
  })
})

// run the app server and tunneling service
const server = app.listen(8081, () => {
  ngrok.connect(8081).then(ngrokUrl => {
    endpoint = ngrokUrl
    console.log(`Login Service running, open at ${endpoint}`)
  })
})
