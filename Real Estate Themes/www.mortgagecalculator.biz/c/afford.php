<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Mortgage Affordability Calculator: What Mortgage Can I Afford?</title>		
    <meta http-equiv="Cache-control" content="public"/>
    <META NAME="ROBOTS" CONTENT="NOINDEX"/>
        <link rel="canonical" href="https://www.mortgagecalculator.biz/c/affordability.php" />		
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

   var VmonthlyRent = sn(document.calc.monthlyRent.value);
   var VintRate = sn(document.calc.intRate.value);
   var VnumYears = sn(document.calc.numYears.value);

   if(VmonthlyRent == 0) {
      alert("Please enter your monthly rent payment.");
      document.calc.monthlyRent.focus();
   } else
   if(VintRate == 0) {
      alert("Please enter the expected mortgage interest rate.");
      document.calc.intRate.focus();
   } else
   if(VnumYears == 0) {
      alert("Please enter the number of years you will finance the home for.");
      document.calc.numYears.focus();
   } else {

      var i = VintRate;
      if (i >= 1.0) {
         i = i / 100.0;
      }
      i /= 12;

      var noMonths = VnumYears * 12;
      var pow = 1;

      for (var j = 0; j < noMonths; j++) {
         pow = pow * (1 + i);
      }

      var Rprincipal = ((pow - 1) * VmonthlyRent) / (pow * i);
      document.calc.mortgageSize.value = fns(Rprincipal,2,1,1,1);

      var VdownPayment = Number(Rprincipal / .90) - Number(Rprincipal);
      document.calc.downPayment.value = fns(VdownPayment,2,1,1,1);
	  
	  var VdownPayment20 = Number(Rprincipal / .80) - Number(Rprincipal);
      document.calc.downPayment20.value = fns(VdownPayment20,2,1,1,1);

      var VhomePrice = Number(Rprincipal) + Number(VdownPayment);
      document.calc.homePrice.value = fns(VhomePrice,2,1,1,1);

      var VhomePrice20 = Number(Rprincipal) + Number(VdownPayment20);
      document.calc.homePrice20.value = fns(VhomePrice20,2,1,1,1);

   }

}


function clear_results(form) {

      document.calc.mortgageSize.value = "";
      document.calc.downPayment.value = "";
      document.calc.homePrice.value = "";
}</script>

<!-- analytic -->
</head>
 	<body>

   				<div class="table-block">
<form name="calc" method="post" action="#">

 <table>
 <tbody>
 </td>
 </tr>

 <tr>
 <td nowrap>
 Your monthly rent payment:
 </td>
 <td align="center">
 <input type="number" step="any" name="monthlyRent" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td nowrap>
 Mortgage interest rate:
 </td>
 <td align="center">
 <input type="number" step="any" name="intRate" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td nowrap>
 Mortgage term (years):
 </td>
 <td align="center">
 <input type="number" step="any" name="numYears" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td align="center">
 <input type="reset" value="Clear" class="table-btn" />
 </td>
 <td align="center">
 <input type="button" name="compute" class="table-btn" value="Estimate Mortgage Size" onClick="computeForm(this.form)" />
 </td>
 </tr>

 <tr>
 <td nowrap>
 Size mortgage you could afford:
 </td>
 <td align="center">
 <input type="text" name="mortgageSize" size="15"  class="results" readonly />
 </td>
 </tr>

 <tr>
 <td colspan="2" align="center"><strong>10% Down Payment &amp; Associated Home Value</strong>
 </td>
 </tr>


 <tr>
 <td nowrap>
 10% down payment:
 </td>
 <td align="center">
 <input type="text" name="downPayment" size="15"  class="results" readonly />
 </td>
 </tr>

 <tr>
 <td nowrap>
 Home price:
 </td>
 <td align="center">
 <input type="text" name="homePrice" size="15"  class="results" readonly />
 </td>
 </tr>





 <tr>
 <td colspan="2" align="center"><strong>20% Down Payment &amp; Associated Home Value</strong>
 </td>
 </tr>

 <tr>
 <td nowrap>
 20% down payment:
 </td>
 <td align="center">
 <input type="text" name="downPayment20" size="15"  class="results" readonly />
 </td>
 </tr>

 <tr>
 <td nowrap>
 Home price:
 </td>
 <td align="center">
 <input type="text" name="homePrice20" size="15"  class="results" readonly />
 </td>
 </tr>
 </tbody>
 </table>
 </form>
 </div>
  

</body>
</html>
