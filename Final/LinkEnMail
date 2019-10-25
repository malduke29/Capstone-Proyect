
//esto va fuera de las funciones, define la variable htmlTemplate para ser un formato mail.

const htmlTemplate = (qrImageUri, mobileUrl) => `<div><img src="${qrImageUri}" /></div><div><a href="${mobileUrl}">Click here if on mobile</a></div>`
let endpoint = ''
const messageLogger = (message, title) => {
  const wrapTitle = title ? ` \n ${title} \n ${'-'.repeat(60)}` : ''
  const wrapMessage = `\n ${'-'.repeat(60)} ${wrapTitle} \n`
  console.log(wrapMessage)
  console.log(message)
}

//Luego en mailOptions colocas la variable con el qr y el uri

var mailOptions={
	  from: 'mailEmitente',
	  to: "MailReceptor",
	  subject: 'Emision de Certificado',
	  html: htmlTemplate(qr, uri)
	 }; 
   
   //se mantienen las demas funciones para el mail
   
   transporter.sendMail(mailOptions,function(error,info){
	  if(error){  
	   console.log(error);
	  }
	  else{
	   console.log('Email sent: '+ info.response);
	  }
	 });
   
  var transporter = nodemailer.createTransport({
	 service:'gmail',
	 auth:{
	  user: 'aquivaelmail@gmail.com',
	  pass: 'contraseña'
	 }
	});
