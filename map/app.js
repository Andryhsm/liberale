var express = require('express');
var app = express();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var fs = require('fs');
var contenu;

server.listen(3000, function(){
	console.log('MAP started on port: 3000');
});
app.get('/', function(req, res){
	res.sendFile(__dirname + '\\index.html');
	app.use(express.static('.'));
});
app.get('/patient', function(req, res){
	res.sendFile(__dirname + '\\patient.html');
	app.use(express.static('.'));
});
app.get('/infirmier', function(req, res){
	res.sendFile(__dirname + '\\infirmier.html');
	app.use(express.static('.'));
});
var visitors = {};

/*
	visitors  id: : user : 	nom
							ville
							pos : lat
					  			  lng
*/


io.on('connection', function(socket){
    console.log("Je suis le serveur ! ");
	socket.on('new_user', function(data){
			
		if(parseInt(Object.keys(visitors).length) > 0)
			socket.emit('already', {visitors: visitors});
		
		visitors[socket.id] = data;

		io.emit('connected', { user: data, users_count: Object.keys(visitors).length});
	
	});


	//Lire le fichier json
	socket.on('data_patient', function(data){
		contenu = fs.readFileSync(__dirname+'/map/data_patient.json');
		fs.writeFileSync(__dirname+'/map/data_patient.json', '', 'UTF-8');		//Vider le fichier json
		socket.emit('data_patient', JSON.parse(contenu));
	});
	socket.on('data_infirmier', function(data){
		console.log("Un infirmier est connecter ! ");
		contenu = fs.readFileSync(__dirname+'/map/data_infirmier.json');
		fs.writeFileSync(__dirname+'/map/data_infirmier.json', '', 'UTF-8');		//Vider le fichier json
		socket.emit('data_infirmier', JSON.parse(contenu));
	});


	socket.on('disconnect', function(){
		if(visitors[socket.id]){
			var todel = visitors[socket.id];
			delete visitors[socket.id];
			io.emit('disconnected', todel); 	
		}
	});

}); 