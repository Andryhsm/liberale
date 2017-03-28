$(document).ready(function() {
	$(function () {
        $('#datepicker').hide();
		$('#datepicker').datepicker({
        	dateFormat: 'yy-mm-dd',
        	minDate: 0,										
		});

        var value = 0;

        function changeFormat(date) {
            var day = date.getDay();
					    //console.log('day ='+day);
			var i;
			var tab = document.getElementsByName('livreur');
				for (i=0;i<tab.length;i++)
				{
					if(tab[i].checked)
					{
						var s = tab[i].value;
						    //alert(s);
						break;
					}
				}
					    
				if (s == "Transporteur - 24h France express" || s == "Transporteur - (24h) Chronopost" || s == "Transporteur - voie postale (48h - Colissimo)" || s == "Chrono Relais (Relais colis près de votre domicile)" || s == "Courrier") 
				{
					$('#heureL').show(500);
					$('#livreur').show(500);
					return [(day == 1 || day == 2 || day == 3 || day == 4 || day == 5 || day == 6), ''];
				}
				else
				{
					    
                    if (value == "Paris 75") 
                    {
						$('#heureL').show(500);
						$('#livreur').show(500);	
                        return [(day == 1 || day == 2 ||day == 3 || day == 4 || day == 5), ''];
                    }
                    else if (value == "Seine-et-Marne 77") 
                    {
						$('#heureL').show(500);
						$('#livreur').show(500);	
                        return [(day == 2)];
                    }
                    else if (value == "Yvelines 78") 
                    {
						$('#heureL').show(500);
						$('#livreur').show(500);	
                        return [(day == 4)];
                    }
                    else if (value == "Essone 91") 
                    {
						$('#heureL').show(500);
						$('#livreur').show(500);	
                        return [(day == 2 || day == 5), ''];
                    }
					else if (value == "Hauts-de-Seine 92") 
					{
						$('#heureL').show(500);
						$('#livreur').show(500);	
                        return [(day == 1 || day == 4), ''];
					}
                    else if (value == "Seine-Saint-Denis 93") 
                    {
						$('#heureL').show(500);
						$('#livreur').show(500);	
                        return [(day == 1 || day == 3), ''];
                    }
                    else if (value == "Val-de-Marne 94") 
                    {
						$('#heureL').show(500);
						$('#livreur').show(500);	
                        return [(day == 1 || day == 5), ''];
                    }
                    else if (value == "Val d'Oise 95") 
                    {
						$('#heureL').show(500);
						$('#livreur').show(500);	
                        return [(day == 3)];
                    }
					else if (value == "hors ile de france") {
						$('#heureL').show(500);
						$('#livreur').show(500);	
                        return [(day == 1 || day == 2 || day == 3 || day == 4 || day == 5 || day == 6 ), ''];
                    }
                    else if (value == "bureaux") 
                    {
						$('#livreur').hide();
						$('#heureL').show(500);
						return [(day == 1 || day == 2 || day == 3 || day == 4 || day == 5), ''];
						
					}
                    else if (value == 13) 
                    {
						$('#heureL').show(500);
						$('#livreur').show(500);	
                        return [(day == 1 || day == 2 || day == 3 || day == 4 || day == 5 || day == 6 ), ''];						
                    }
				}
                                                   					
        }

        $('#selectRegion').change(function () 
        {
            value = $(this).val();
                                            //console.log('changement ' + value);
					    
			var t =($('input[name="livreur"]:checked', '#formulaire').val());
					    //alert(t);
					    
			
			if ( t == "Transport_postale") 
			{
						//console.log('s eto = '+s);
				$('#datepicker').datepicker("option", "minDate", 2, "beforeShowDay", changeFormat);
						
			}
			else if (value != 0) 
			{
				$('#datelivraison').removeClass('hide');
                    $('#datepicker').show();
                    $('#datepicker').datepicker("option", "beforeShowDay", changeFormat);

            }
			else if (value == 13) 
			{
				alert('Veuillez nous contacter au 01 46 72 10 43 ou par 00 33 146 72 10 43 si vous etes à l\'etranger');
			}
			else 
			{
                $('#datepicker').hide();
				$('#datepicker').datepicker("option", "beforeShowDay", changeFormat);
            }
											
        });
    });
});