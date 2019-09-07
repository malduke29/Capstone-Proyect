const express = require('express');
const bodyParser = require('body-parser');
const ngrok= require('ngrok');
const decodeJWT = require('did-jwt').decodeJWT
const {Credentials} = require('uport-credentials');
const transports = require('uport-transports').transport
const message = require('uport-transports').message.util

let endpoint = ''
const app = express();
app.use(bodyParser.json({type: '*/*'}))
//arriba es lo de uport


var querystring = require("querystring");

function iniciar(res, postData){
 console.log("manipulador de peticion 'iniciar' ha sido llamado."); 
 var body = '<html>'+
  '<head>'+
  '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />'+
  '</head>'+
  '<body>'+ 
  '<form action="/certificado" method="post">'+
  '<textarea name="text" rows="20" cols="60"></textarea>'+
  '<input type="submit" value= "Enviar Texto" />'+
  '</form>'+
  '</body>'+
  '</html>';

 res.writeHead(200,{"Content-Type":"text/html"});
 res.write(body);
 res.end();
 
}
 

function subir(res,dataPosteada){
 console.log("manipulador de peticion 'subir' ha sido llamado.");
 res.writeHead(200,{"Content-Type":"text/html"});
 res.write("Tu enviaste: " + querystring.parse(dataPosteada)["text"]);
 res.end();
}

function certificado(res,dataPosteada){
 console.log("manipulador de peticion 'certificado' ha sido llamado.");
 const credentials = new Credentials({
 	 appName:"App Certificados acadèmicos",
  	 did: "did:ethr:0x7ee3afa669b1f808a45779e9a6e30904cdab7996",
  	 privateKey:
   "082a03a87e094eaba2f73bb6d4c6c37e31fa8452d13552c8886c316203ab6001"
 })


//Envía el código QR para hacer el "login". para la emisión de la credencial
 app.get('/', (req,res)=> {
  	 credentials.createDisclosureRequest({
		 notifications: true,
		 callbackUrl: endpoint +'/callback'
	 }).then(requestToken => {
		 console.log(decodeJWT(requestToken))
		 const uri = 
 message.paramsToQueryString(message.messageToURI(requestToken),
			 {callback_type: 'post'})
		 const qr = transports.ui.getImageDataURI(uri)
		 res.send(`<div><img src="${qr}"/></div>`)
	 })
 } )


//Envia el codigo QR a una cuenta de uport para solicitar su certificado "Certificado de Título", y devuelve el JWT de la transacció
// Es decir, el archivos json firmado digitalmente con el emisor (en este caso la universidad)
 app.get('/request', (req, res) => {
   credentials.createDisclosureRequest({
     // ¿Que es verified?
     verified: ['Certificado de Título22'],
     callbackUrl: endpoint + '/callbackRequest'
   }).then(requestToken => {
     console.log(decodeJWT(requestToken))  //log request token to console
     const uri =  
message.paramsToQueryString(message.messageToURI(requestToken), {callback_type: 'post'})
     const qr =  transports.ui.getImageDataURI(uri)
     res.send(`<div><img src="${qr}"/></div>`)
   })
 })

 app.get('/transaction', (req, res) => {
   credentials.createDisclosureRequest({
     notifications: true,
     accountType: 'keypair',
    // aquí es donde se va kaleido?? -> NO esto es la red rinkeby (por el momento solo haremos pruebas con las testnet, en este caso rinkeby)
     network_id: '0x4',
     callbackUrl: endpoint + '/callbackTransaction'
   }).then(requestToken => {
     console.log(requestToken)
     console.log(decodeJWT(requestToken))  //log request token to console
     const uri =  message.paramsToQueryString(message.messageToURI(requestToken), {callback_type: 'post'})
     const qr =  transports.ui.getImageDataURI(uri)
     res.send(`<div><img src="${qr}"/></div>`)
   })
 })

 app.post('/callbackTransaction', (req, res) => {
   console.log("Callback hit")
   const jwt = req.body.access_token
   credentials.authenticateDisclosureResponse(jwt).then(creds => {
    // take this time to perform custom authorization steps... then,
    // set up a push transport with the provided 
    // push token and public encryption key (boxPub)
     const push = transports.push.send(creds.pushToken, creds.boxPub)

     const txObject = {
       to: creds.mnid,
       value: '10000000000000000',
     }

     credentials.createTxRequest(txObject, {callbackUrl: `${endpoint}/ 
txcallback`, callback_type: 'post'}).then(attestation => {
       console.log(`Encoded JWT sent to user: ${attestation}`)
       return push(attestation)  // *push* the notification to the user's uPort mobile app.
     }).then(res => {
       console.log(res)
       console.log('Push notification sent and should be recieved any moment...')
       console.log('Accept the push notification in the uPort mobile application')
     })
   })
 })

 app.post('/callbackRequest', (req, res) => {
   const jwt = req.body.access_token
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

 app.post('/callback', (req, res) => {
   const jwt = req.body.access_token
   credentials.authenticateDisclosureResponse(jwt).then(creds => {
    // take this time to perform custom authorization steps... then,
    // set up a push transport with the provided 
    // push token and public encryption key (boxPub)
     const push = transports.push.send(creds.pushToken, creds.boxPub)

     credentials.createVerification({
       sub: creds.did,
       exp: Math.floor(new Date().getTime() / 1000) + 30 * 24 * 60 * 60,
       claim: {'Certificado de Título' : {
         'Universidad': 'Universidad Adolfo Ibáñez',
         'Sede': 'Santiago',
         'Título': 'Ingeniería Civil Industrial',
         'Mención':  ' ' +querystring.parse(dataPosteada)["text"] ,
         'Fecha': '20/01/2019',
         'Rut': '18403529-4',
         'Nombre': "Julio Latorre"
      }}
      // Note, the above is a complex (nested) claim. 
      // Also supported are simple claims:  claim: {'Key' : 'Value'}
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
 const server = app.listen(8088, () => {
   ngrok.connect(8088).then(ngrokUrl => {
     endpoint = ngrokUrl
     res.writeHead(200,{"Content-Type":"text/html"});
     res.write(endpoint);
     res.end();
   })
 })


}



exports.iniciar=iniciar; //exporta las funciones para su uso
exports.subir=subir;
exports.certificado=certificado;
