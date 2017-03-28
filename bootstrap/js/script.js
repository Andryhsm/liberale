$(document).ready(function() 
{

	$('#envoyer').click(function(e) {
		e.preventDefault();

		var typediabete = $('input[name=typediabete]:checked').val();
		var datediagnostic = $('#datediagnostic').val();
		var circonstancedecouverte= $('#circonstancedecouverte').val();
		var antecedentfamiliaux= $('#antecedentfamiliaux').val();
		var datepremieremisesouspompe= $('#datepremieremisesouspompe').val();
		var hba1c= $('#hba1c').val();
		var poidsactuel= $('#poidsactuel').text();
		var poidsforme= $('#poidsforme').text();
		var taille= $('#taille').text();
		var imc= $('#imc').text();
		var nombreglycemieparjour= $('#nombreglycemieparjour').val();
		var typelecteur= $('#typelecteur').val();
		var dateprescription= $('#dateprescription').val();
		var styloautopiqueur= $('#styloautopiqueur').val();
		var nombreinjectionjour= $('#nombreinjectionjour').val();
		var schemamultiinjection= $('#schemamultiinjection').val();
		var stylo= $('#stylo').val();
		var autrestylo= $('#autrestylo').val();
		var aiguillestylo= $('#aiguillestylo').val();
		var autreaiguille= $('#autreaiguille').val();
		var insulinelentematin= $('#insulinelentematin').text();
		var insulinerapidematin= $('#insulinerapidematin').text();
		var quantitetotal= $('#quantitetotal').text();
		var insulinelentemidi= $('#insulinelentemidi').text();
		var insulinerapidemidi= $('#insulinerapidemidi').text();
		var insulinelentesoir= $('#insulinelentesoir').text();
		var insulinerapidesoir= $('#insulinerapidesoir').text();
		var totalinsulinelente= $('#totalinsulinelente').text();
		var totalinsulinerapide= $('#totalinsulinerapide').text();
		var specialite1= $('#specialite1').text();
		var posologie1= $('#posologie1').text();
		var specialite2= $('#specialite2').text();
		var posologie2= $('#posologie2').text();
		var specialite3= $('#specialite3').text();
		var posologie3= $('#posologie3').text();
		var specialite4= $('#specialite4').text();
		var posologie4= $('#posologie4').text();
		var horaire1= $('#horaire1').text();
		var debit1= $('#debit1').text();

		var horaire2= $('#horaire2').text();
		var debit2= $('#debit2').text();
		var horaire3= $('#horaire3').text();
		var debit3= $('#debit3').text();
		var horaire4= $('#horaire4').text();
		var debit4= $('#debit4').text();
		var horaire5= $('#horaire5').text();
		var debit5= $('#debit5').text();
		var horaire6= $('#horaire6').text();
		var debit6= $('#debit6').text();
		var horaire7= $('#horaire7').text();
		var debit7= $('#debit7').text();
		var horaire8= $('#horaire8').text();
		var debit8= $('#debit8').text();
		var horaire9= $('#horaire9').text();
		var debit9= $('#debit9').text();
		var horaire10= $('#horaire10').text();
		var debit10= $('#debit10').text();
		var horaire11= $('#horaire11').text();
		var debit11= $('#debit11').text();
		var horaire12= $('#horaire12').text();
		var debit12= $('#debit12').text();
		var horaire13= $('#horaire13').text();
		var debit13= $('#debit13').text();
		var horaire14= $('#horaire14').text();
		var debit14= $('#debit14').text();
		var horaire15= $('#horaire15').text();
		var debit15= $('#debit15').text();
		var horaire16= $('#horaire16').text();
		var debit16= $('#debit16').text();
		var horaire21= $('#horaire21').text();

		var debit21= $('#debit21').text();
		var horaire22= $('#horaire22').text();
		var debit22= $('#debit22').text();
		var horaire23= $('#horaire23').text();
		var debit23= $('#debit23').text();
		var horaire24= $('#horaire24').text();
		var debit24= $('#debit24').text();
		var horaire25= $('#horaire25').text();
		var debit25= $('#debit25').text();
		var horaire26= $('#horaire26').text();
		var debit26= $('#debit26').text();
		var horaire27= $('#horaire27').text();
		var debit27= $('#debit27').text();
		var horaire28= $('#horaire28').text();
		var debit28= $('#debit28').text();
		var horaire29= $('#horaire29').text();
		var debit29= $('#debit29').text();
		var horaire210= $('#horaire210').text();
		var debit210= $('#debit210').text();
		var horaire211= $('#horaire211').text();
		var debit211= $('#debit211').text();
		var horaire212= $('#horaire212').text();
		var debit212= $('#debit212').text();
		var horaire213= $('#horaire213').text();
		var debit213= $('#debit213').text();
		var horaire214= $('#horaire214').text();
		var debit214= $('#debit214').text();
		var horaire215= $('#horaire215').text();
		var debit215= $('#debit215').text();
		var horaire216= $('#horaire216').text();
		var debit216= $('#debit216').text();

		var dataString = "typediabete="+typediabete+"&datediagnostic="+datediagnostic+"&circonstancedecouverte="+circonstancedecouverte+"&antecedentfamiliaux="+antecedentfamiliaux+"&datepremieremisesouspompe="+datepremieremisesouspompe+"&hba1c="+hba1c+"&poidsactuel="+poidsactuel+"&poidsforme="+poidsforme+"&taille="+taille+"&imc="+imc+"&nombreglycemieparjour="+nombreglycemieparjour+"&typelecteur="+typelecteur+"&dateprescription="+dateprescription+"&styloautopiqueur="+styloautopiqueur+"&nombreinjectionjour="+nombreinjectionjour+"&schemamultiinjection="+schemamultiinjection+"&stylo="+stylo+"&autrestylo="+autrestylo+"&aiguillestylo="+aiguillestylo+"&autreaiguille="+autreaiguille+"&insulinelentematin="+insulinelentematin+"&insulinerapidematin="+insulinerapidematin+"&quantitetotal="+quantitetotal+"&insulinelentemidi="+insulinelentemidi+"&insulinerapidemidi="+insulinerapidemidi+"&insulinelentesoir="+insulinelentesoir+"&insulinerapidesoir="+insulinerapidesoir+"&totalinsulinelente="+totalinsulinelente+"&totalinsulinerapide="+totalinsulinerapide+"&specialite1="+specialite1+"&posologie1="+posologie1+"&specialite2="+specialite2+"&posologie2="+posologie2+"&specialite3="+specialite3+"&posologie3="+posologie3+"&specialite4="+specialite4+"&posologie4="+posologie4+"&horaire1="+horaire1+"&debit1="+debit1+"&horaire2="+horaire2+"&debit2="+debit2+"&horaire3="+horaire3+"&debit3="+debit3+"&horaire4="+horaire4+"&debit4="+debit4+"&horaire5="+horaire5+"&debit5="+debit5+"&horaire6="+horaire6+"&debit6="+debit6+"&horaire7="+horaire7+"&debit7="+debit7+"&horaire8="+horaire8+"&debit8="+debit8+"&horaire9="+horaire9+"&debit9="+debit9+"&horaire10="+horaire10+"&debit10="+debit10+"&horaire11="+horaire11+"&debit11="+debit11+"&horaire12="+horaire12+"&debit12="+debit12+"&horaire13="+horaire13+"&debit13="+debit13+"&horaire14="+horaire14+"&debit14="+debit14+"&horaire15="+horaire15+"&debit15="+debit15+"&horaire16="+horaire16+"&debit16="+debit16+"&horaire21="+horaire21+"&debit21="+debit21+"&horaire22="+horaire22+"&debit22="+debit22+"&horaire23="+horaire23+"&debit23="+debit23+"&horaire24="+horaire24+"&debit24="+debit24+"&horaire25="+horaire25+"&debit25="+debit25+"&horaire26="+horaire26+"&debit26="+debit26+"&horaire27="+horaire27+"&debit27="+debit27+"&horaire28="+horaire28+"&debit28="+debit28+"&horaire29="+horaire29+"&debit29="+debit29+"&horaire210="+horaire210+"&debit210="+debit210+"&horaire211="+horaire211+"&debit211="+debit211+"&horaire212="+horaire212+"&debit212="+debit212+"&horaire213="+horaire213+"&debit213="+debit213+"&horaire214="+horaire214+"&debit214="+debit214+"&horaire215="+horaire215+"&debit215="+debit215+"&horaire216="+horaire216+"&debit216="+debit216;

		if(confirm("Voulez vous enregistrer les données ?"))
		{
			console.log(dataString); 
			    $.ajax({
			       url : 'core/insertDonneMedicale.php', // La ressource ciblée
			       type : 'POST', // Le type de la requête HTTP.
			       data : dataString,

			       success: function(server_response)
					{
						alert(server_response);
					}
			    });
			   
		}
	});
		
});