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
  user: 'arroyojose29.1996@gmail.com',
  pass: 'josearroyo'
  }
 }); 


app.get('/', (req, res) => {
    credentials.createDisclosureRequest({
      verified: ['Certificado de Titulo'],
      callbackUrl: endpoint + '/callback'
    }).then(requestToken => {
      console.log(decodeJWT(requestToken))  //log request token to console
      const uri = message.paramsToQueryString(message.messageToURI(requestToken), {callback_type: 'post'})
      const qr =  transports.ui.getImageDataURI(uri)
      res.send(`<div><img src="${qr}"/></div>`)
    })
  })

  app.post('/callback', (req, res) => {
    const jwt = req.body.access_token
    console.log(req)
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