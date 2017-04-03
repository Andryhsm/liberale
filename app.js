var express = require('express');
var app = express();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var fs = require('fs');
var mysql = require('mysql');

var contenu;
var p_email, p_email2;

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

app.get('/carnet', function (req, res) {
    res.sendFile(__dirname + '\\map\\carnet-de-rendez-vous.html');
    p_email2 = req.param('email');
    app.use(express.static('.'));
});


var visitors = {};
var sockets = {};
var liste = [], liste_rdv = [], liste_dmd_accpter = [];




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
        console.log("INFO : one user connected nb : " + Object.keys(sockets).length);
        io.emit('connected', {user: data, users_count: Object.keys(visitors).length});
    });

    //Lire le fichier json
    socket.on('data_patient', function (data) {
        contenu = fs.readFileSync(__dirname + '/map/map/data_patient.json');
        fs.writeFileSync(__dirname + '/map/map/data_patient.json', '', 'UTF-8');		//Vider le fichier json
        if (contenu != null)
            socket.emit('data_patient', JSON.parse(contenu));
        else
            console.log("ERREUR : le contenue du fichier est null ! ");
    });

    socket.on('data_infirmier', function (data) {
        contenu = fs.readFileSync(__dirname + '/map/map/data_infirmier.json');
        fs.writeFileSync(__dirname + '/map/map/data_infirmier.json', '', 'UTF-8');		//Vider le fichier json
        if (contenu != null)
            socket.emit('data_infirmier', JSON.parse(contenu));
        else
            console.log("ERREUR : le contenue du fichier est null ! ");
    });


    socket.on('new_pos', function(data){
       console.log(data); 
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

    socket.on('rendez-vous', function (data) {      //Infirmier comme parametre

        if (typeof (data.commentaire) != "undefined") {
            socket.user.commentaire = data.commentaire;
        }
        sockets[data.email].emit('rendez-vous', {user: socket.user});
        lister(socket);
    });


    //Ajout de commande dans la liste

    socket.on('ajout_liste', function (data) {          //Information du patient
        if (liste.hasOwnProperty(data.email)) {
            sockets[data.email].emit("info_dmd", "Vous aver deja envoyer une demande à <strong>" + socket.user.prenom + " " + socket.user.nom + "</strong>! ");
        } else {
            sockets[data.email].emit("info_dmd", "Votre demande a été bien envoyer ! ");
            sockets[socket.email].emit("info_dmd_inf", "<strong>" + data.nom + " " + data.prenom + "</strong> vous a envoyer une demande !")
         
            liste[data.email] = data;
            sockets[socket.email].liste = liste;

            var typesoin = data.typesoin1 + " - " + data.typesoin2 + " - " + data.typesoin3 + " - " + data.typesoin4;
            var heure = data.heure1 + " - " + data.heure2 + " - " + data.heure3 + " - " + data.heure4;
            var frequencesoin = data.frequence_soin1 + " - " + data.frequence_soin2 + " - " + data.frequence_soin3 + " - " + data.frequence_soin4 + " - ";

            connection.query('INSERT INTO liste_demande (emailI, nomP, prenomP, telP, typeSoinP, commentaire, date,frequenceSoin, status, emailP) VALUES ("' + socket.email + '", "' + data.nom + '", "' + data.prenom + '", "' + data.tel + '", "' + typesoin + '", "' + data.commentaire + '", "' + heure + '","' + frequencesoin + '", "attente", "' + data.email + '")', function (err, result, fields) {
                if (err)
                    throw err;
                else
                    console.log(data.nom + " est ajouter dans la base !  ");
                lister(socket);
            });
        }
    });




    //Pour la requete GET du page 
    socket.on('rendez_vous_de', function (email) {
        if (typeof (p_email) != "undefined") {

            //On recupere tous les listes dans la base de données
            //    console.log(p_email + " a demander un liste de rendez-vous ! ");

            lister(socket);
            console.log("INFO: reinitialiser liste ");


            //Lorsque la demande est accepter ou refuser
            socket.on('accept', function (email) {
                console.log("INFO : La demande de " + email + " est accepter ! ");

                if (typeof (sockets[email]) != "undefined")
                    sockets[email].emit('info_dmd', "<strong> " + socket.user.prenom + " " + socket.user.nom + "</strong> a acceptée le rendez-vous du <strong>" + sockets[email].user.heure1 + "</strong> que vous avez proposé !");


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
                connection.query('UPDATE liste_demande SET status="refuser" WHERE emailP="' + email + '" AND emailI="' + p_email + '"', function (err, result, fields) {
                    if (err)
                        throw err;
                    else {
                        lister(socket);
                        if (typeof (sockets[email]) != "undefined")
                            sockets[email].emit('info_dmd', "Votre demande avec <strong> " + socket.user.prenom + " " + socket.user.nom + "</strong> a été refuser !");
                        console.log('INFO: demande refuser');
                    }
                });
                //Suppression de l'utilisateur dans la liste
                delete liste[email];
            });


        }
    });


  
  
    //Carnet de rendez-vous
   socket.on('carnet', function(){
       socket.emit('carnet', "Carnet d'addresse ! ");
        lister_rendez_vous(socket);
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
                    liste[listeUser[key].emailP] = listeUser[key];
                }
            } else {
                console.log("La liste est encore vide :  " + p_email);
            }
        }
    });
}

function lister_rendez_vous(socket) {
    connection.query('SELECT * FROM liste_demande WHERE emailI="' + p_email2 + '" and status="accepter" ORDER BY id DESC', function (err, result, fields) {
        if (err) {
            throw err;
        } else {
            if (typeof (sockets[p_email2]) != "undefined") {
                sockets[p_email2].liste = result;
                var listeUser = sockets[p_email2].liste;                 //Contient les listes des utilisateurs qui commande
            }
            //Lister les rendez-vous en envoyant une a une
            if (typeof (listeUser) != "undefined") {
                socket.emit('vider', "Vider le champt");
                for (var key in listeUser) {
                    socket.emit('liste_rdv', listeUser[key]);
                    liste[listeUser[key].emailP] = listeUser[key];
                }
            } else {
                console.log("La liste est encore vide :  " + p_email);
            }
        }
    });
}
