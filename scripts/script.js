

$(document).ready(function() {
   $('#nav').localScroll({duration:800});
});

	function register()
	{
		var numeechipa=document.getElementsByName("nume")[0].value;
		var numarpart=document.getElementById("inputnumar").value;
		var univ=document.getElementById("facultate").value;
		var nrtel=document.getElementById("numar").value;
		var mail=document.getElementById("mailreprezentant").value;
		var reprezentant=document.getElementsByName("reprezentant")[0].value;
		var participanti=document.getElementById("numesiprenumepart").value;
		var rezultate=document.getElementById("rezultate").value;
		var limbaje=document.getElementById("limbaje").value;
		var motivatie=document.getElementById("motivatie").value;
		var p=document.getElementsByName("radioinp");
		var i;
		var participare;
		for (i=0;i<p.length;i++)
		{
			if (p[i].checked)
			{
				participare=p[i].value;
			}
		}
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
			var x=document.getElementById("rezultatinregistrare");
			x.innerHTML=xhttp.responseText;
			}
		};
		xhttp.open("POST", "register.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("participare="+participare+"&numeechipa="+numeechipa+"&numarpart="+numarpart+"&univ="+univ+"&nrtel="+nrtel+"&mail="+mail+"&reprezentant="+reprezentant+"&participanti="+participanti+"&rezultate="+rezultate+"&limbaje="+limbaje+"&motivatie="+motivatie);;
	}	
	
	function contact()
	{
		var nume=document.getElementsByName("numecontact")[0].value;
		var subiect=document.getElementsByName("subiectcontact")[0].value;
		var email=document.getElementsByName("mailcontact")[0].value;
		var mesaj=document.getElementsByName("mesajcontact")[0].value;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
			var x=document.getElementById("rezultatcontact");
			x.innerHTML=xhttp.responseText;
			}
		};
		xhttp.open("POST", "contact.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("nume="+nume+"&subiect="+subiect+"&mail="+email+"&mesaj="+mesaj);
	}
	
function fillField(input,val) {
      if(input.value == "")
         input.value=val;
};

function clearField(input,val) {
      if(input.value == val)
         input.value="";
};

	function showparticipare()
	{
		var x=document.getElementById("rezultatee");
		x.style.visibility="visible";
	}
	
	function hideparticipare()
	{
		var x=document.getElementById("rezultatee");
		x.style.visibility="hidden";
	}