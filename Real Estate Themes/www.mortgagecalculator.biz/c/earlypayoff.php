<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Early Mortgage Payoff Calculator: Repay Your Home Loan Early</title>		
    <meta http-equiv="Cache-control" content="public"/>
    <META NAME="ROBOTS" CONTENT="NOINDEX"/>
        <link rel="canonical" href="https://www.mortgagecalculator.biz/c/early-payoff.php" />		
        <meta name="description" content="">
		<meta name="author" content="Trey Conway">
		<link href='https://fonts.googleapis.com/css?family=Gudea:400,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
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

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="https://www.mortgagecalculator.biz/css/stylemin.css" />
    
    <!-- JavaScript -->
    <script type="text/javascript" src="https://www.mortgagecalculator.biz/js/jquery-1.6.2.min.js"></script>
    <script type="text/javascript" src="https://www.mortgagecalculator.biz/js/superfish.js"></script>
    <script type="text/javascript" src="https://www.mortgagecalculator.biz/js/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript" src="https://www.mortgagecalculator.biz/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="https://www.mortgagecalculator.biz/js/main.js"></script>


<script Language='JavaScript'>

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
   var i = sn(document.calc.interest.value);
   v_noYears = sn(document.calc.noYears.value);
   v_origPmt = sn(document.calc.origPmt.value);

   var alert_txt = "";

   if(v_principal == 0) {
      alert("Please enter the principal balance of your current mortgage.");
      document.calc.principal.focus();
   } else
      if(i == 0) {
      alert("Please enter the interest rate of your current mortgage.");
      document.calc.interest.focus();
   } else
   if(v_origPmt == 0) {
      alert_txt = "Please enter your current monthly mortgage payment ";
      alert_txt += "(principal and interest portion only).";
      alert(alert_txt);
      document.calc.origPmt.focus();
   } else
   if(v_noYears == 0) {
      alert_txt = "Please enter the number of years you would ";
      alert_txt += "like to pay off your mortgage in.";
      alert(alert_txt);
      document.calc.noYears.focus();
   } else {

      if (i >= 1.0) {
        i = i / 100.0;
      }

      i /= 12;

      var noMonths = v_noYears * 12;

      var pow = 1;

      for (var j = 0; j < noMonths; j++) {

        pow = pow * (1 + i);

      }

      var newPmt = (v_principal * pow * i) / (pow - 1);

      if(newPmt <= v_origPmt) {
         alert_txt = "Given the terms you entered your mortgage is already scheduled ";
         alert_txt += "to be paid off in less than " + v_noYears + " years.";
         alert(alert_txt);
         return;

      } else {

         var v_pmtAdd = Number(newPmt) - Number(v_origPmt);

         document.calc.pmtAdd.value = fns(v_pmtAdd,2,1,1,1);

         var prin = sn(document.calc.principal.value);
         var count = 0;
         var prinPort = 0;
         var intPort = 0;
         var accumInt = 0;
         var pmt = sn(document.calc.origPmt.value);

         while(Number(prin) > Number(pmt)) {
            intPort = prin * i;
            accumInt = Number(accumInt) + Number(intPort)
            prinPort = Number(pmt) - Number(intPort);
            prin = Number(prin) - Number(prinPort);
            count = Number(count) + Number(1);

            if(count > 600) {
               alert_txt = "At the terms you entered your mortgage will never be paid off. Please ";
               alert_txt += "either decrease the principal or increase the monthly payment amount.";
               alert(alert_txt);
               clear_results(form);
               return;
               break;
            }
         }


         var v_origInt = accumInt;
         var v_newInt = (Number(newPmt * noMonths)) - Number(v_principal);
         var v_intSave = Number(v_origInt) - Number(v_newInt);
		 var fml = Number(document.calc.origPmt.value) + Number(v_pmtAdd,2,1,1,1);

         document.calc.intSave.value = fns(v_intSave,2,1,1,1);

         var v_summary = "If you would like to pay off your mortgage ";
         v_summary += "in " + v_noYears + " years instead of the ";
         v_summary += "current " + fns(count / 12,1,0,0,0) + " years, you will ";
         v_summary += "need to start making a second monthly mortgage payment ";
         v_summary += "in the amount of " + fns(v_pmtAdd,2,1,1,1) + ", <strong>bringing your total monthly payment ";
         v_summary += " to " + fns(fml,2,1,1,1) + "</strong>. This would ";
         v_summary += "cut your current mortgage interest cost ";
         v_summary += "from " + fns(accumInt,2,1,1,1) + " down ";
         v_summary += "to " + fns(v_newInt,2,1,1,1) + ", a savings ";
         v_summary += "of " + fns(v_intSave,2,1,1,1) + " in interest charges.";

         var v_summary_cell = document.getElementById("summary");
         v_summary_cell.innerHTML = "<font face='arial'><small><strong>Summary:</strong> " + v_summary + "</small>";


      }

   }

}

function clear_results(form) {

   var v_summary_cell = document.getElementById("summary");
   v_summary_cell.innerHTML = "";

   document.calc.pmtAdd.value = "";
   document.calc.intSave.value = "";

}

function reset_calc(form) {

   var v_summary_cell = document.getElementById("summary");
   v_summary_cell.innerHTML = "";

   document.calc.reset();

}</script>


<!-- analytic -->
</head>
 	<body">
 

<div class="table-block">
<form name="calc" method="post" action="#">

 <table>
 <tbody>
 <tr>
 <td>
 
 Principal balance owed:
 
 </td>
 <td align="center">
 <input type="number" step="any" name="principal" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 
 Annual interest rate:
 
 </td>
 <td align="center">
 <input type="number" step="any" name="interest" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 
 Current monthly payment (principal & interest):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="origPmt" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 
 Years you want to pay off your loan in:
 
 </td>
 <td align="center">
 <input type="number" step="any" name="noYears" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td align="center">
 <input type="button"  class="table-btn" value="Reset" onClick="reset_calc(this.form)" />
 </td>
  <td align="center">
 <input type="button"  class="table-btn" value="Compute" onClick="computeForm(this.form)" />
 </td></tr>


 <tr>
 <td>
 
 Additional monthly payment required:
 
 </td>
 <td align="center">
 <input type="text" name="pmtAdd" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Interest savings:
 
 </td>
 <td align="center">
 <input type="text" name="intSave" size="15" />
 </td>
 </tr>

 <tr>
 <td colspan="2" id="summary">
 </td>
 </tr>




 </tbody>
 </table>
 </form>
 </div>
  
</body>
</html>
