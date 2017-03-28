var express = require('express');
var app = express();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var fs = require('fs');
var mysql = require('mysql');

var contenu;
var p_email;

server.listen(3000, function () {
    console.log('MAP started on port: 3000');
});
app.get('/', function (req, res) {
    res.sendFile(__dirname + '\\map\\index.html');
    app.use(express.static('.'));
});
app.get('/patient', function (req, res) {
    res.sendFile(__dirname + '\\map\\patient.html');
    app.use(express.static('.'));
});
app.get('/infirmier', function (req, res) {
    res.sendFile(__dirname + '\\map\\infirmier.html');
    app.use(express.static('.'));
});
app.get('/rendez-vous', function (req, res) {
    res.sendFile(__dirname + '\\map\\liste_rende_vous.html');
    p_email = req.param('email');
    app.use(express.static('.'));
});

var visitors = {};
var sockets = {};
var liste = [];




//Pour la connection a la base de données

var mysql = require('mysql');
var connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'ouinflib'
});





io.on('connection', function (socket) {
    
    socket.emit('connecter', "Vous êtes maintenant connecter ! ");

    socket.on('new_user', function (data) {
        console.log(data.nom + " est connecter ! ");
        if (parseInt(Object.keys(visitors).length) > 0)
            socket.emit('already', {visitors: visitors});       //Envoie les listes des visiteurs
        socket.email = data.email;
        visitors[socket.email] = data;                              //Ajout de l'utilisateur dans la listes
        sockets[socket.email] = socket;                             //Enregistre le socket de l'utilisateur
        socket.user = data;                                         //Notre session         
        io.emit('connected', {user: data, users_count: Object.keys(visitors).length});
    });
    
    //Lire le fichier json
    socket.on('data_patient', function (data) {
        contenu = fs.readFileSync(__dirname + '/map/map/data_patient.json');
        fs.writeFileSync(__dirname + '/map/map/data_patient.json', '', 'UTF-8');		//Vider le fichier json
        if(contenu != null)
            socket.emit('data_patient', JSON.parse(contenu));
        else
             console.log("ERREUR : le contenue du fichier est null ! ");
    });

    socket.on('data_infirmier', function (data) {
        contenu = fs.readFileSync(__dirname + '/map/map/data_infirmier.json');
        fs.writeFileSync(__dirname + '/map/map/data_infirmier.json', '', 'UTF-8');		//Vider le fichier json
        if(contenu != null)
            socket.emit('data_infirmier', JSON.parse(contenu));
        else 
            console.log("ERREUR : le contenue du fichier est null ! ");
    });





    socket.on('deconnexion', function (data) {
        if (visitors[data.email]) {
            var todel = visitors[data.email];
            delete visitors[data.email];
            socket.emit('deconnecter', data.email);
            socket.broadcast.emit('deconnecter', data.email);
            console.log(data.email + " est deconnecter ! ");
        }
    });



    //Recevoir un rendez vous
    socket.on('rendez-vous', function (data) {
        if(typeof(data.commentaire) != "undefined"){
            socket.user.commentaire = data.commentaire;
            console.log(data.commentaire);
        }
        sockets[data.email].emit('rendez-vous', {user: socket.user});
        lister(socket);             
    });


    //Ajout de commande dans la liste
    socket.on('ajout_liste', function (data) {
        liste[data.email] = data;
        sockets[socket.email].liste = liste;
        
        var typesoin = data.typesoin1 +" - "+ data.typesoin2 +" - "+ data.typesoin3 +" - "+ data.typesoin4;
        var heure = data.heure1 +" - "+ data.heure2 +" - "+ data.heure3 +" - "+ data.heure4;

        connection.query('INSERT INTO liste_demande (emailI, nomP, prenomP, telP, typeSoinP, commentaire, date, status, emailP) VALUES ("' + socket.email + '", "' + data.nom + '", "' + data.prenom + '", "' + data.tel + '", "' + typesoin + '", "'+data.commentaire+'", "' + data.heure1 + '", "attente", "' + data.email + '")', function (err, result, fields) {
            if (err)
                throw err;
            else
                console.log(data.nom + " est ajouter dans la base !  ");
            lister(socket);
        });
    });




    //Pour la requete GET du page 
    socket.on('rendez_vous_de', function (email) {
        if (typeof (p_email) != "undefined") {
            
            //On recupere tous les listes dans la base de données
            console.log(p_email + " a demander un liste de rendez-vous ! ");
            
            lister(socket);
            

            //Lorsque la demande est accepter ou refuser
            socket.on('accept', function (email) {
                console.log("La demande de "+ email +" est accepter ! ");
                
                if (typeof (sockets[email]) != "undefined")
                    sockets[email].emit('dmd_accepter', "votre demande vient d'être accepter ! ");

                
                connection.query('UPDATE liste_demande SET status="accepter" WHERE emailP="' + email + '" AND emailI="' + p_email + '"', function (err, result, fields) {
                    if (err)
                        throw err;
                    else {
                        lister(socket);
                    }
                });
                
                //Ouvrir une discussion
            
            });


            socket.on('refus', function (email) {
                console.log("La demande "+ email +" vient d'être refuser ! ");

                if (typeof (sockets[email]) != "undefined")
                    sockets[email].emit('dmd_refus', "votre demande vient d'être refuser ! ");

                console.log("EmailP : " + email + " emailI : " + p_email);

                connection.query('UPDATE liste_demande SET status="refuser" WHERE emailP="' + email + '" AND emailI="' + p_email + '"', function (err, result, fields) {
                    if (err)
                        throw err;
                    else {
                        lister(socket);
                    }
                });

            });


        }
    });
});

function lister(socket) {
    connection.query('SELECT * FROM liste_demande WHERE emailI="' + p_email + '" and status="attente" ORDER BY id DESC', function (err, result, fields) {
        if (err) {
            throw err;
        } else {
            if (typeof (sockets[p_email]) != "undefined") {
                sockets[p_email].liste = result;
                var listeUser = sockets[p_email].liste;                 //Contient les listes des utilisateurs qui commande
            }
            //Lister les demandes
            if (typeof (listeUser) != "undefined") {
                socket.emit('vider', "Vider le champt");
                for (var key in listeUser) {
                    socket.emit('liste_user', listeUser[key]);
                }
            } else {
                console.log("La liste est encore vide :  " + p_email);  
            }
        }
    });
}