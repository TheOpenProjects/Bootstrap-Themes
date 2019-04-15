<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Commercial Mortgage Calculator: Commercial Real Estate Property Analysis</title>		
        <meta name="description" content="">
		<meta name="author" content="Trey Conway">
		<link href='https://fonts.googleapis.com/css?family=Gudea:400,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
		<link href="https://www.mortgagecalculator.biz/css/hsm-meanmenu.css" rel="stylesheet">
		<link href="https://www.mortgagecalculator.biz/css/hsm-style.css" rel="stylesheet">
		<link href="https://www.mortgagecalculator.biz/css/hsm-layout.css" rel="stylesheet">
		<!--[if lt IE 9]>
		<script src="https://www.mortgagecalculator.biz/scripts/html5shiv.js"></script>
		<script src="https://www.mortgagecalculator.biz/scripts/respond.min.js"></script>
		<![endif]-->
<link rel="apple-touch-icon" sizes="180x180" href="https://www.mortgagecalculator.biz/iconset/apple-touch-icon.png">
<link rel="icon" type="image/png" href="https://www.mortgagecalculator.biz/iconset/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="https://www.mortgagecalculator.biz/iconset/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="https://www.mortgagecalculator.biz/iconset/manifest.json">
<link rel="mask-icon" href="https://www.mortgagecalculator.biz/iconset/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="https://www.mortgagecalculator.biz/iconset/favicon.ico">
<meta name="msapplication-config" content="https://www.mortgagecalculator.biz/iconset/browserconfig.xml">
<meta name="theme-color" content="#ffffff">	
        <link rel="canonical" href="https://www.mortgagecalculator.biz/commercial-loan.php" />




<script Language='JavaScript'>

function computeMonthlyPayment(prin, numPmts, intRate) {

var pmtAmt = 0;

if(intRate == 0) {
   pmtAmt = prin / numPmts;
} else {
     intRate = intRate / 100.0 / 12;

   var pow = 1;
   for (var j = 0; j < numPmts; j++)
      pow = pow * (1 + intRate);

   pmtAmt = (prin * pow * intRate) / (pow - 1);

}

return pmtAmt;

}




function sn(num) {

   num=num.toString();


   var len = num.length;
   var rnum = "";
   var test = "";
   var j = 0;

   var b = num.substring(0,1);
   if(b == "-") {
      rnum = "-";
   }

   for(i = 0; i <= len; i++) {

      b = num.substring(i,i+1);

      if(b == "0" || b == "1" || b == "2" || b == "3" || b == "4" || b == "5" || b == "6" || b == "7" || b == "8" || b == "9" || b == ".") {
         rnum = rnum + "" + b;

      }

   }

   if(rnum == "" || rnum == "-") {
      rnum = 0;
   }

   rnum = Number(rnum);

   return rnum;

}



function fns(num, places, comma, type, show) {

    var sym_1 = "$";
    var sym_2 = ""; 

    var isNeg=0;

    if(num < 0) {
       num=num*-1;
       isNeg=1;
    }

    var myDecFact = 1;
    var myPlaces = 0;
    var myZeros = "";
    while(myPlaces < places) {
       myDecFact = myDecFact * 10;
       myPlaces = Number(myPlaces) + Number(1);
       myZeros = myZeros + "0";
    }
    
	onum=Math.round(num*myDecFact)/myDecFact;
		
	integer=Math.floor(onum);

	if (Math.ceil(onum) == integer) {
		decimal=myZeros;
	} else{
		decimal=Math.round((onum-integer)* myDecFact)
	}
	decimal=decimal.toString();
	if (decimal.length<places) {
        fillZeroes = places - decimal.length;
	   for (z=0;z<fillZeroes;z++) {
        decimal="0"+decimal;
        }
     }

   if(places > 0) {
      decimal = "." + decimal;
   }

   if(comma == 1) {
	integer=integer.toString();
	var tmpnum="";
	var tmpinteger="";
	var y=0;

	for (x=integer.length;x>0;x--) {
		tmpnum=tmpnum+integer.charAt(x-1);
		y=y+1;
		if (y==3 & x>1) {
			tmpnum=tmpnum+",";
			y=0;
		}
	}

	for (x=tmpnum.length;x>0;x--) {
		tmpinteger=tmpinteger+tmpnum.charAt(x-1);
	}


	finNum=tmpinteger+""+decimal;
   } else {
      finNum=integer+""+decimal;
   }

    if(isNeg == 1) {
       if(type == 1 && show == 1) {
          finNum = "-" + sym_1 + "" + finNum + "" + sym_2;
       } else {
          finNum = "-" + finNum;
       }
    } else {
       if(show == 1) {
          if(type == 1) {
             finNum = sym_1 + "" + finNum + "" + sym_2;
          } else
          if(type == 2) {
             finNum = finNum + "%";
          }

       }

    }

	return finNum;
}


function computeForm(form) {


   var v_principal = sn(document.calc.principal.value);
   var v_rate = sn(document.calc.rate.value);
   var v_term = sn(document.calc.term.value);
   var v_months = sn(document.calc.months.value);

   if(v_principal == 0) {
      alert("Please enter the loan's principal.");
      document.calc.principal.focus();
   } else
      if(v_rate == 0) {
      alert("Please enter the annual interest rate as a percentage.");
      document.calc.rate.focus();
   } else
      if(v_term == 0) {
      alert("Please enter term of the loan in number of years.");
      document.calc.term.focus();
   } else
      if(v_months == 0) {
      alert("Please enter the number of months before the loan maturity date.");
      document.calc.months.focus();
   } else {

      var v_pmt_months = v_term * 12;

      var v_pi_pmt = computeMonthlyPayment(v_principal, v_pmt_months, v_rate);
      document.calc.pi_pmt.value = fns(v_pi_pmt,2,1,1,1);

      var v_int_only_pmt = v_rate / 100 / 12 * v_principal;
      document.calc.int_only_pmt.value = fns(v_int_only_pmt,2,1,1,1);

      var v_prin = v_principal;
      var v_int_port = 0;
      var v_prin_port = 0;
      var v_i = v_rate / 100 / 12;

      for(var i=0; i<v_months; i++) {

         v_int_port = Math.round(v_prin * v_i * 100) / 100;
         v_prin_port = Number(v_pi_pmt) - Number(v_int_port);
         v_prin = Number(v_prin) - Number(v_prin_port);

      }

      var v_balloon_pmt = v_prin;
      if(v_balloon_pmt < 0) {
         v_balloon_pmt = 0;
      }
      document.calc.balloon_pmt.value = fns(v_balloon_pmt,2,1,1,1);

   }
    
}


function createReport(form) {

   if(document.calc.amort_chk.value == 1) {
      clear_amort(document.calc);
   } else {
      document.calc.amort_chk.value = 1;
   }

   var v_principal = sn(document.calc.principal.value);
   var v_rate = sn(document.calc.rate.value);
   var v_term = sn(document.calc.term.value);
   var v_months = sn(document.calc.months.value);

   if(v_principal == 0) {
      alert("Please enter the loan's principal.");
      document.calc.principal.focus();
   } else
      if(v_rate == 0) {
      alert("Please enter the annual interest rate as a percentage.");
      document.calc.rate.focus();
   } else
      if(v_term == 0) {
      alert("Please enter term of the loan in number of years.");
      document.calc.term.focus();
   } else
      if(v_months == 0) {
      alert("Please enter the number of months before the loan maturity date.");
      document.calc.months.focus();
   } else {

      var v_pmt_months = v_term * 12;

      var v_pi_pmt = computeMonthlyPayment(v_principal, v_pmt_months, v_rate);

      var v_prin = v_principal;
      var v_int = v_rate;
      if(v_int >= 1) {
         v_int /= 100;
      }
      v_int /= 12;

      var npr = v_pmt_months;

      var v_int_port = 0;
      var v_accum_int = 0;
      var v_prin_port = 0;
      var v_accum_prin = 0;
      var v_count = 0;
      var v_pmt_row = "";
      var v_pmt_num = 0;

      var v_display_pmt_amt = 0;

      var v_accum_year_prin = 0;
      var v_accum_year_int = 0;

      while(v_count < npr) {

         if(v_count < (npr - 1)) {

            v_int_port = Math.round(v_prin * v_int * 100) / 100;
            v_accum_int = Number(v_accum_int) + Number(v_int_port);
            v_accum_year_int = Number(v_accum_year_int) + Number(v_int_port);

            v_prin_port = Number(v_pi_pmt) - Number(v_int_port);
            v_accum_prin = Number(v_accum_prin) + Number(v_prin_port);
            v_accum_year_prin = Number(v_accum_year_prin) + Number(v_prin_port);

            v_prin = Number(v_prin) - Number(v_prin_port);

            v_display_pmt_amt = Number(v_prin_port) + Number(v_int_port);

         } else {

            v_int_port = Math.round(v_prin * v_int * 100) / 100;
            v_accum_int = Number(v_accum_int) + Number(v_int_port);
            v_accum_year_int = Number(v_accum_year_int) + Number(v_int_port);

            v_accum_int = Number(v_accum_int) + Number(v_int_port);
            v_accum_year_int = Number(v_accum_year_int) + Number(v_int_port);

            v_prin_port = v_prin;

            v_accum_prin = Number(v_accum_prin) + Number(v_prin_port);
            v_accum_year_prin = Number(v_accum_year_prin) + Number(v_prin_port);

            v_prin = 0;
            v_display_pmt_amt = Number(v_prin_port) + Number(v_int_port);
         }

         v_count = Number(v_count) + Number(1);

         v_pmt_num = Number(v_pmt_num) + Number(1);

         var tbody = document.getElementById('amort_sched');

         var row = document.createElement('tr');
         var cell1 = document.createElement('td');
         cell1.style.textAlign = "right";
         cell1.style.fontSize = "small";
         cell1.innerHTML = '' + v_count + '';
         row.appendChild(cell1);
         var cell2 = document.createElement('td');
         cell2.style.textAlign = "right";
         cell2.style.fontSize = "small";
         cell2.innerHTML = '' + fns(v_display_pmt_amt,2,1,1,1) + '';
         row.appendChild(cell2);
         var cell3 = document.createElement('td');
         cell3.style.textAlign = "right";
         cell3.style.fontSize = "small";
         cell3.innerHTML = '' + fns(v_prin_port,2,1,1,1) + '' ;
         row.appendChild(cell3);
         var cell4 = document.createElement('td');
         cell4.style.textAlign = "right";
         cell4.style.fontSize = "small";
         cell4.innerHTML = '' + fns(v_int_port,2,1,1,1) + '';
         row.appendChild(cell4);
         var cell5 = document.createElement('td');
         cell5.style.textAlign = "right";
         cell5.style.fontSize = "small";
         cell5.innerHTML = '' + fns(v_prin,2,1,1,1) + '';
         row.appendChild(cell5);
         tbody.appendChild(row);

      }
   }
}

function clear_amort(form) {

   document.calc.amort_chk.value = 0;

   var tbody = document.getElementById('amort_sched');
   var v_years = sn(document.calc.term.value);
   var v_months = v_years * 12;
   for(var i=0; i< v_months; i++) {
      tbody.deleteRow(-1);
   }


}

function clear_results(form) {

   var v_amort_chk = sn(document.calc.amort_chk.value);

   if(v_amort_chk == 1) {
      clear_amort(document.calc);
   } else {
      document.calc.amort_chk.value = 0;
   }

   document.calc.pi_pmt.value = "";
   document.calc.int_only_pmt.value = "";
   document.calc.balloon_pmt.value = "";

}

function clear_form(form) {

   if(document.calc.amort_chk.value == 1) {
      clear_amort(document.calc);
   } else {
      document.calc.amort_chk.value = 0;
   }

   document.calc.principal.value = "";
   document.calc.rate.value = "";
   document.calc.term.value = "";
   document.calc.months.value = "";
   document.calc.pi_pmt.value = "";
   document.calc.int_only_pmt.value = "";
   document.calc.balloon_pmt.value = "";

}</script>


<!-- analytic -->
</head>
 	<body class="hsm" style="background-color:#FFF;">
		<section id="content" class="content-block-outer" role="main">
			<div class="wrapper-new">
				<div class="content-out">
					<div class="content-outer">


				<div class="page-right">

<div class="table-block">
<form name="calc" method="post" action="#">

 <table>
 <tbody>

 <tr>
 <td>
 
 Amount of the loan ($):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="principal" value="" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 
 Annual interest rate (%):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="rate" value="" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 
 Amortization term (# of years):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="term" value="" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 
 Loan due term in months(#):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="months" value="" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td align="center">
 <input type="button" class="table-btn"  value="Clear" onClick="clear_form(this.form)" />
 </td>
 <td align="center">
 <input type="button" class="table-btn"  value="Compute" onClick="computeForm(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 
 P & I payment:
 
 </td>
 <td align="center">
 <input type="text" name="pi_pmt" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Interest-Only payment:
 
 </td>
 <td align="center">
 <input type="text" name="int_only_pmt" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Balloon payment:
 
 </td>
 <td align="center">
 <input type="text" name="balloon_pmt" size="15" />
 </td>
 </tr>


 <tr>
 <td align="center">
 <input type="button" class="table-btn"  value="Clear Schedule" onClick="clear_amort(this.form)" />
 <input type="hidden" name="amort_chk" value="0" />
 </td>
 <td align="center">
 <input type="button" class="table-btn"  value="Create Amortization Schedule" onClick="createReport(this.form)" />
 </td>
 </tr>


 </tbody>
 </table>
 <br />
 <br />
 <table border="1" cellpadding="2" cellspacing="0" bordercolor="#EEEEEE" id="tableName" width="500">
 <tbody>
 <tr>
 <th scope="col"><strong>Month</strong></th>
 <th scope="col"><strong>Payment</strong></th>
 <th scope="col"><strong>Principal</strong></th>
 <th scope="col"><strong>Interest</strong></th>
 <th scope="col"><strong>Balance</strong></th>
 </tr>
 </tbody>
 <tbody id="amort_sched">
 </tbody>
 </table>
 </form>
 <p>&nbsp;</p> <p>&nbsp;</p> <p>&nbsp;</p> <p>&nbsp;</p>
 </div>
 </div>
 </div>
</div>
 </div>
</section>


</body>
</html>
