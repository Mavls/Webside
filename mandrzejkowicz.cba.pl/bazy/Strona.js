function adres_validation()
{
	var name = document.forms["form"]["name"].value;
	var error = document.getElementById("name_error");
	if(name == "")  
	{
	error.innerHTML = '<p class="text-warning">Nazwa jest pusta!</p>';return -1;
    }
	else if (/[^a-zA-Z]/.test(name))
	 {
	 error.innerHTML = '<p class="text-warning">Podana nazwa jest niepoprawna!</p>';return -1;
	 }   
    else
	{
		error.innerHTML="";return 1;
	}
}

function projektant_validation()
{
	var name = document.forms["form"]["projektant"].value;
	var error = document.getElementById("projektant_error");
	if(name == "")  
	{
	error.innerHTML = '<p class="text-warning">Nazwa jest pusta!</p>';return -1;
    }
	else if (/[^a-zA-Z]/.test(name))
	 {
	 error.innerHTML = '<p class="text-warning">Podana nazwa jest niepoprawna!</p>';return -1;
	 }   
    else
	{
		error.innerHTML="";return 1;
	}
}

function Prestiz_validation()
{
	var price = document.getElementById("Prestiz").value;
	var error = document.getElementById("Prestiz_error");
	if(price == "")
	{
	error.innerHTML = '<p class="text-warning">Podane pole jest pusta!</p>';
	}
    else if(/[a-zA-Z]/.test(price))
	{
		error.innerHTML='<p class="text-warning">Zly format!</p>';
		return -1;
	}
	else
	{
		error.innerHTML="";return 1;
	}
}



function mname_validation()
{
	var name = document.forms["formm"]["mname"].value;
	var error = document.getElementById("mname_error");
	if(name == "")  
	{
	error.innerHTML = '<p class="text-warning">Nazwa jest pusta!</p>';return -1;
    }
	else if (/[^a-zA-Z]/.test(name))
	 {
	 error.innerHTML = '<p class="text-warning">Podana nazwa jest niepoprawna!</p>';return -1;
	 }   
    else
	{
		error.innerHTML="";return 1;
	}
}





/*===================================================================*/





function mfname_validation()
{
	var name = document.forms["formm"]["modelka_nazwisko"].value;
	var error = document.getElementById("fname_error");
	if(name == "")  
	{
	error.innerHTML = '<p class="text-warning">Nazwa jest pusta!</p>';return -1;
    }
	else if (/[^a-zA-Z]/.test(name))
	 {
	 error.innerHTML = '<p class="text-warning">Podana nazwa jest niepoprawna!</p>';return -1;
	 }   
    else
	{
		error.innerHTML="";return 1;
	}
}


function wiek_validation()
{
	var price = document.getElementById("modelka_wiek").value;
	var error = document.getElementById("modelka_wiek_error");
	if(price == "")
	{
	error.innerHTML = '<p class="text-warning">Podane pole jest puste!</p>';
	}
    else if(/[a-zA-Z]/.test(price))
	{
		error.innerHTML='<p class="text-warning">Zly format!</p>';
		return -1;
	}
	else
	{
		error.innerHTML="";return 1;
	}
}


function email_validation()
{
	var name = document.forms["formm"]["modelka_email"].value;
	var error = document.getElementById("email_error");
	if(name == "")  
	{
	error.innerHTML = '<p class="text-warning">Pole jest pusta!</p>';return -1;
    } 
    else
	{
		error.innerHTML="";return 1;
	}
}

function ocena_validation()
{
	var price = document.getElementById("modelka_ocena").value;
	var error = document.getElementById("modelka_ocena_error");
	if(price == "")
	{
	error.innerHTML = '<p class="text-warning">Podane pole jest puste!</p>';
	}
    else if(/[a-zA-Z]/.test(price))
	{
		error.innerHTML='<p class="text-warning">Zly format!</p>';
		return -1;
	}
	else
	{
		error.innerHTML="";return 1;
	}
}




/*===================================================================*/





function projektant_name_validation()
{
	var name = document.forms["formmm"]["projektant_name"].value;
	var error = document.getElementById("projektant_name_error");
	if(name == "")  
	{
	error.innerHTML = '<p class="text-warning">Nazwa jest pusta!</p>';return -1;
    }
	else if (/[^a-zA-Z]/.test(name))
	 {
	 error.innerHTML = '<p class="text-warning">Podana nazwa jest niepoprawna!</p>';return -1;
	 }   
    else
	{
		error.innerHTML="";return 1;
	}
}



function projektant_fname_validation()
{
	var name = document.forms["formmm"]["projektant_fname"].value;
	var error = document.getElementById("projektant_fname_error");
	if(name == "")  
	{
	error.innerHTML = '<p class="text-warning">Nazwa jest pusta!</p>';return -1;
    }
	else if (/[^a-zA-Z]/.test(name))
	 {
	 error.innerHTML = '<p class="text-warning">Podana nazwa jest niepoprawna!</p>';return -1;
	 }   
    else
	{
		error.innerHTML="";return 1;
	}
}


function projektant_tytul_validation()
{
	var name = document.forms["formmm"]["Tytul"].value;
	var error = document.getElementById("projektant_tytul_error");
	if(name == "")  
	{
	error.innerHTML = '<p class="text-warning">Nazwa jest pusta!</p>';return -1;
    }
	else if (/[^a-zA-Z]/.test(name))
	 {
	 error.innerHTML = '<p class="text-warning">Podana nazwa jest niepoprawna!</p>';return -1;
	 }   
    else
	{
		error.innerHTML="";return 1;
	}
}


function projektant_stopien_validation()
{
	var price = document.getElementById("Stopien").value;
	var error = document.getElementById("projektant_stopien_error");
	if(price == "")
	{
	error.innerHTML = '<p class="text-warning">Podane pole jest puste!</p>';
	}
    else if(/[a-zA-Z]/.test(price))
	{
		error.innerHTML='<p class="text-warning">Zly format!</p>';
		return -1;
	}
	else
	{
		error.innerHTML="";return 1;
	}
}









/*===================================================================*/


function Prowadzacy_validation()
{
	var name = document.forms["formmmm"]["Prowadzacy"].value;
	var error = document.getElementById("Prowadzacy_error");
	if(name == "")  
	{
	error.innerHTML = '<p class="text-warning">Nazwa jest pusta!</p>';return -1;
    }
	else if (/[^a-zA-Z]/.test(name))
	 {
	 error.innerHTML = '<p class="text-warning">Podana nazwa jest niepoprawna!</p>';return -1;
	 }   
    else
	{
		error.innerHTML="";return 1;
	}
}


function Jury_validation()
{
	var name = document.forms["formmmm"]["Jury"].value;
	var error = document.getElementById("Jury_error");
	if(name == "")  
	{
	error.innerHTML = '<p class="text-warning">Nazwa jest pusta!</p>';return -1;
    }
	else if (/[^a-zA-Z]/.test(name))
	 {
	 error.innerHTML = '<p class="text-warning">Podana nazwa jest niepoprawna!</p>';return -1;
	 }   
    else
	{
		error.innerHTML="";return 1;
	}
}


function data_validation()
{
	var id_name = document.forms["formmmm"]["Data"].value;
	var error = document.getElementById("Data_error");
	if(id_name == "")
	{
	error.innerHTML = '<p class="text-warning">Podane pole jest puste!</p>';
	}
    else if(!/^[0-9a-zA-Z]{2}-[0-9a-zA-Z]{2}-[0-9a-zA-Z]{4}$/.test(id_name))
	{
		error.innerHTML='<p class="text-warning">Błędny format daty!</p>';return -1;
	}
	else
	{
		error.innerHTML="";return 1;
	}
}


function Projektancik_validation()
{
	var name = document.forms["formmmm"]["Projektancik"].value;
	var error = document.getElementById("Projektancik_error");
	if(name == "")  
	{
	error.innerHTML = '<p class="text-warning">Nazwa jest pusta!</p>';return -1;
    }
	else if (/[^a-zA-Z]/.test(name))
	 {
	 error.innerHTML = '<p class="text-warning">Podana nazwa jest niepoprawna!</p>';return -1;
	 }   
    else
	{
		error.innerHTML="";return 1;
	}
}












/*===================================================================*/


function id_validation()
{
	var id_name = document.forms["form"]["product_id"].value;
	var error = document.getElementById("id_empty_error");
	if(id_name == "")
	{
	error.innerHTML = '<p class="text-warning">Podane ID jest puste!</p>';
	}
    else if(!/^[0-9a-zA-Z]{2}-[0-9a-zA-Z]{2}$/.test(id_name))
	{
		error.innerHTML='<p class="text-warning">Błędny format ID!</p>';return -1;
	}
	else
	{
		error.innerHTML="";return 1;
	}
}



function vat_empty_validation()
{
	var vat = document.getElementById("vat").value;
	var error = document.getElementById("vat_empty_error");
	if(vat == "")
	{
	error.innerHTML = '<p class="text-warning">Podana stawka vat jest pusta!</p>';
	}
    else if (/[a-zA-Z]/.test(vat))
	 {
	 error.innerHTML = '<p class="text-warning">Podana stawka vat jest niepoprawna!</p>';return -1;
	 }
     else
	{
		error.innerHTML="";
		vat_empty_validation();return 1;
	}
}

function brutto_price()
{
    var z = document.getElementById("product_price").value;
    var x = document.getElementById("vat").value;
    x = Number(x);
	document.getElementById("product_brutto").value = String( z * (100.00 + x)/100 );	
}

function final_validation()
{
     
var flag = false;
	if(name_validation()==-1)
		flag=true;
	if(id_validation()==-1)
		flag=true;
	
	if(price_empty_validation()==-1)
		flag=true;
	if(vat_empty_validation()==-1)
		flag=true;
	if(document.querySelectorAll('input[type="checkbox"]:checked').length < 2)
	{
		document.getElementById("checkbox_error").innerHTML='<p class="text-warning">Zaznacz dwie opcje!</p>';
		flag = true;
	}
	if(document.querySelectorAll('input[type="radio"]:checked').length != 1)
	{
		document.getElementById("option_error").innerHTML="Musi być zaznaczona tylko jedna opcja";
		flag = true;
	}
	if(!flag)
	{
        
		document.getElementById("checkbox_error").innerHTML="";
		document.getElementById("option_error").innerHTML="";
		var html = '<tr> <td>';
		var nazwa = document.getElementById("name").value;
		if($('#table_div tr > td:contains('+nazwa+')').length>0)
		{
			alert("Taka wartość już jest");
			return;
		}
		html += nazwa;
		html += '</td><td>';
		var kod = document.getElementById("product_id").value;
		html += kod;
		html += '</td><td>';
		var netto = document.getElementById("product_price").value;
		html += netto;
		html += '</td><td>';
		var vat = document.getElementById("vat").value;
		html += vat;
		html += '</td><td>';
		var brutto = document.getElementById("product_brutto").value;
		html += brutto;
		html += '</td><td>';
		var e = document.getElementById("mySelect");
		var strUser = e.options[e.selectedIndex].value;
		html += strUser;
		html += '</td><td>';
		
		if(document.getElementById('inlineCheckbox1').checked)
			html+="1";
		if(document.getElementById('inlineCheckbox2').checked)
			html+="2";
		if(document.getElementById('inlineCheckbox3').checked)
			html+="3";
		if(document.getElementById('inlineCheckbox4').checked)
			html+="4";
		if(document.getElementById('inlineCheckbox5').checked)
			html+="5";
		html += '</td><td>';
		var radio = $('input[name=inlineRadioOptions]:checked', '#myForm').val();
		html += radio;
		html += '</td></tr>';
		$("table tbody").append(html); 
            // let the plugin know that we made a update 
        $("table").trigger("update"); 
        alert("Dane poprawne");
		
	}}
