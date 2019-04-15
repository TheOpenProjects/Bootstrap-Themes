<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Best Mortgage Rates Today: Current Home Mortgage APR Trends &amp; Rate Predictions</title>		
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




function computeFixedInterestCost(principal, intRate, pmtAmt) { 

   var i = eval(intRate);
   i /= 100;
   i /= 12;

   var prin = eval(principal);
   var intPort = 0;
   var accumInt = 0;
   var prinPort = 0;
   var pmtCount = 0;
   var testForLast = 0;


   //CYCLES THROUGH EACH PAYMENT OF GIVEN DEBT
   while(prin > 0) {

      testForLast = (prin * (1 + i));

      if(pmtAmt < testForLast) {
         intPort = prin * i;
         accumInt = eval(accumInt) + eval(intPort);
         prinPort = eval(pmtAmt) - eval(intPort);
         prin = eval(prin) - eval(prinPort);
      } else {
      //DETERMINE FINAL PAYMENT AMOUNT
      intPort = prin * i;
      accumInt = eval(accumInt) + eval(intPort);
      prinPort = prin;
      prin = 0;
      }

      pmtCount = eval(pmtCount) + eval(1);

      if(pmtCount > 1000 || accumInt > 1000000000) {
         prin = 0;
      }

   }

return accumInt;

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


function fillRates(form) {

   if(document.calc.startRate.value.length == 0) {
      alert("Please enter a starting interest before selecting the increment factor.");
      document.calc.startRate.focus();
   } else {

      var VstartRate = sn(document.calc.startRate.value);
      if(VstartRate < 1) {
        VstartRate = VstartRate * 100;
      }

      var Vincrement = document.calc.increment.options[document.calc.increment.selectedIndex].value;

      var Vrate_1 = VstartRate;
      document.calc.rate_1.value = fns(Vrate_1,3,2,0);

      var Vrate_2 = Number(Vrate_1) + Number(Vincrement);
      document.calc.rate_2.value = fns(Vrate_2,3,2,0);

      var Vrate_3 = Number(Vrate_2) + Number(Vincrement);
      document.calc.rate_3.value = fns(Vrate_3,3,2,0);

      var Vrate_4 = Number(Vrate_3) + Number(Vincrement);
      document.calc.rate_4.value = fns(Vrate_4,3,2,0);

      var Vrate_5 = Number(Vrate_4) + Number(Vincrement);
      document.calc.rate_5.value = fns(Vrate_5,3,2,0);

      computeForm(form);

   }

}
      

function computeForm(form) {

   var Vprin = sn(document.calc.principal.value);
   var VnumYears = sn(document.calc.numYears.value);

   if(Vprin == 0) {
      alert("Please enter the amount of the mortgage.");
      document.calc.principal.focus();
   } else
   if(VnumYears == 0) {
      alert("Please enter mortgage's term in years.");
     document.calc.numYears.focus();
   } else {


      var Vrate_1 = sn(document.calc.rate_1.value);
      var Vrate_2 = sn(document.calc.rate_2.value);
      var Vrate_3 = sn(document.calc.rate_3.value);
      var Vrate_4 = sn(document.calc.rate_4.value);
      var Vrate_5 = sn(document.calc.rate_5.value);

      var Vmonths = VnumYears * 12;

      var VmoPmt_1 = computeMonthlyPayment(Vprin, Vmonths, Vrate_1);
      document.calc.moPmt_1.value = fns(VmoPmt_1,0,1,1,1);

      var VmoPmt_2 = computeMonthlyPayment(Vprin, Vmonths, Vrate_2);
      document.calc.moPmt_2.value = fns(VmoPmt_2,0,1,1,1);

      var VmoPmt_3 = computeMonthlyPayment(Vprin, Vmonths, Vrate_3);
      document.calc.moPmt_3.value = fns(VmoPmt_3,0,1,1,1);

      var VmoPmt_4 = computeMonthlyPayment(Vprin, Vmonths, Vrate_4);
      document.calc.moPmt_4.value = fns(VmoPmt_4,0,1,1,1);

      var VmoPmt_5 = computeMonthlyPayment(Vprin, Vmonths, Vrate_5);
      document.calc.moPmt_5.value = fns(VmoPmt_5,0,1,1,1);


      var VtotPrin_1 = Vprin;
      document.calc.totPrin_1.value = fns(VtotPrin_1,0,1,1,1);

      var VtotPrin_2 = Vprin;
      document.calc.totPrin_2.value = fns(VtotPrin_2,0,1,1,1);

      var VtotPrin_3 = Vprin;
      document.calc.totPrin_3.value = fns(VtotPrin_3,0,1,1,1);

      var VtotPrin_4 = Vprin;
      document.calc.totPrin_4.value = fns(VtotPrin_4,0,1,1,1);

      var VtotPrin_5 = Vprin;
      document.calc.totPrin_5.value = fns(VtotPrin_5,0,1,1,1);


      var VtotInt_1 = computeFixedInterestCost(Vprin, Vrate_1, VmoPmt_1);
      VtotInt_1 = Math.round(VtotInt_1);
      document.calc.totInt_1.value = fns(VtotInt_1,0,1,1,1);

      var VtotInt_2 = computeFixedInterestCost(Vprin, Vrate_2, VmoPmt_2);
      VtotInt_2 = Math.round(VtotInt_2);
      document.calc.totInt_2.value = fns(VtotInt_2,0,1,1,1);

      var VtotInt_3 = computeFixedInterestCost(Vprin, Vrate_3, VmoPmt_3);
      VtotInt_3 = Math.round(VtotInt_3);
      document.calc.totInt_3.value = fns(VtotInt_3,0,1,1,1);

      var VtotInt_4 = computeFixedInterestCost(Vprin, Vrate_4, VmoPmt_4);
      VtotInt_4 = Math.round(VtotInt_4);
      document.calc.totInt_4.value = fns(VtotInt_4,0,1,1,1);

      var VtotInt_5 = computeFixedInterestCost(Vprin, Vrate_5, VmoPmt_5);
      VtotInt_5 = Math.round(VtotInt_5);
      document.calc.totInt_5.value = fns(VtotInt_5,0,1,1,1);


      var VtotPmts_1 = Number(VtotPrin_1) + Number(VtotInt_1);
      document.calc.totPmts_1.value = fns(VtotPmts_1,0,1,1,1);

      var VtotPmts_2 = Number(VtotPrin_2) + Number(VtotInt_2);
      document.calc.totPmts_2.value = fns(VtotPmts_2,0,1,1,1);

      var VtotPmts_3 = Number(VtotPrin_3) + Number(VtotInt_3);
      document.calc.totPmts_3.value = fns(VtotPmts_3,0,1,1,1);

      var VtotPmts_4 = Number(VtotPrin_4) + Number(VtotInt_4);
      document.calc.totPmts_4.value = fns(VtotPmts_4,0,1,1,1);

      var VtotPmts_5 = Number(VtotPrin_5) + Number(VtotInt_5);
      document.calc.totPmts_5.value = fns(VtotPmts_5,0,1,1,1);

   }
}


function createReport(form) {

   if(document.calc.principal.value.length == 0) {
      alert("Please enter the amount of the mortgage.");
      document.calc.principal.focus();
   } else
   if(document.calc.numYears.value == "") {
      alert("Please enter mortgage's term in years.");
      document.calc.numYears.focus();
   } else {

      computeForm(form);

      var Vprin = sn(document.calc.principal.value);
      var VnumYears = sn(document.calc.numYears.value);

      var termRows = "";

      termRows += "<tr><td><font face='arial'><small>Monthly payment:</small></td>";
      termRows += "<td align='right'><font face='arial'><small>" + document.calc.moPmt_1.value + "</small>";
      termRows += "</td><td align='right'><font face='arial'>";
      termRows += "<small>" + document.calc.moPmt_2.value + "</small></td>";
      termRows += "<td align='right'><font face='arial'><small>" + document.calc.moPmt_3.value + "</small>";
      termRows += "</td><td align='right'><font face='arial'>";
      termRows += "<small>" + document.calc.moPmt_4.value + "</small></td>";
      termRows += "<td align='right'><font face='arial'>";
      termRows += "<small>" + document.calc.moPmt_5.value + "</small></td></tr>";

      termRows += "<tr><td><font face='arial'><small>Principal payments:</small></td>";
      termRows += "<td align='right'><font face='arial'>";
      termRows += "<small>" + document.calc.totPrin_1.value + "</small></td>";
      termRows += "<td align='right'><font face='arial'>";
      termRows += "<small>" + document.calc.totPrin_2.value + "</small></td>";
      termRows += "<td align='right'><font face='arial'>";
      termRows += "<small>" + document.calc.totPrin_3.value + "</small></td>";
      termRows += "<td align='right'><font face='arial'>";
      termRows += "<small>" + document.calc.totPrin_4.value + "</small></td>";
      termRows += "<td align='right'><font face='arial'>";
      termRows += "<small>" + document.calc.totPrin_5.value + "</small></td></tr>";

      termRows += "<tr><td><font face='arial'><small>Interest payments:</small></td>";
      termRows += "<td align='right'><font face='arial'><small>" + document.calc.totInt_1.value + "</small>";
      termRows += "</td><td align='right'><font face='arial'>";
      termRows += "<small>" + document.calc.totInt_2.value + "</small></td><td align='right'>";
      termRows += "<font face='arial'><small>" + document.calc.totInt_3.value + "</small>";
      termRows += "</td><td align='right'><font face='arial'>";
      termRows += "<small>" + document.calc.totInt_4.value + "</small></td>";
      termRows += "<td align='right'><font face='arial'>";
      termRows += "<small>" + document.calc.totInt_5.value + "</small></td></tr>";

      termRows += "<tr><td><font face='arial'><small>Total payments:</small></td>";
      termRows += "<td align='right'><font face='arial'><small>" + document.calc.totPmts_1.value + "</small>";
      termRows += "</td><td align='right'><font face='arial'>";
      termRows += "<small>" + document.calc.totPmts_2.value + "</small></td>";
      termRows += "<td align='right'><font face='arial'><small>" + document.calc.totPmts_3.value + "</small>";
      termRows += "</td><td align='right'><font face='arial'>";
      termRows += "<small>" + document.calc.totPmts_4.value + "</small></td><td align='right'>";
      termRows += "<font face='arial'><small>" + document.calc.totPmts_5.value + "</small></td></tr>";

      var part1 = "<html><head><title>Mortgage Rate Comparison</title></head>";
      part1 += "<b";
      part1 += "od";
      part1 += "y bgcolor= '#FFFFFF'>";
      part1 += "<br /><br /><center><font face='arial'>";
      part1 += "<big><strong>Mortgage Rate Comparison</strong></big></center>";

      var part2 = "<center><table border=1 cellpadding=2 cellspacing=0><tr><td colspan=6>";
      part2 += "<font face='arial'><small><strong>Principal:";
      part2 += " " + fns(Vprin,0,1,1,1) + "<br />Term: " + VnumYears + " years</strong>";
      part2 += "</small></td></tr><tr bgcolor='silver'><td><font face='arial'><small>";
      part2 += "<strong>Interest Rate</strong></small></td><td align='center'><font face='arial'>";
      part2 += "<small><strong>" + document.calc.rate_1.value + "%</strong></small></td><td align='center'>";
      part2 += "<font face='arial'><small><strong>" + document.calc.rate_2.value + "%</strong></small></td>";
      part2 += "<td align='center'><font face='arial'><small><strong>" + document.calc.rate_3.value + "%</strong>";
      part2 += "</small></td><td align='center'><font face='arial'><small>";
      part2 += "<strong>" + document.calc.rate_4.value + "%</strong></small></td><td align='center'>";
      part2 += "<font face='arial'><small><strong>" + document.calc.rate_5.value + "%</strong></small>";
      part2 += "</td></tr>";

      var part3 = ("" + termRows + "");

      var part4 = "</table><br /><center><form method='post'>";
      part4 += "<input type='button' value='Close Window' onClick='window.close()'>";
      part4 += "</form></center></body></html>";

      var schedule = (part1 + "" + part2 + "" + part3 + part4 + "");

      reportWin = window.open("","","width=500,height=400,toolbar=yes,menubar=yes,scrollbars=yes");

      reportWin.document.write(schedule);

      reportWin.document.close();

   }

}


function clear_results(form) {

   document.calc.moPmt_1.value = "";
   document.calc.moPmt_2.value = "";
   document.calc.moPmt_3.value = "";
   document.calc.moPmt_4.value = "";
   document.calc.moPmt_5.value = "";
   document.calc.totPrin_1.value = "";
   document.calc.totPrin_2.value = "";
   document.calc.totPrin_3.value = "";
   document.calc.totPrin_4.value = "";
   document.calc.totPrin_5.value = "";
   document.calc.totInt_1.value = "";
   document.calc.totInt_2.value = "";
   document.calc.totInt_3.value = "";
   document.calc.totInt_4.value = "";
   document.calc.totInt_5.value = "";
   document.calc.totPmts_1.value = "";
   document.calc.totPmts_2.value = "";
   document.calc.totPmts_3.value = "";
   document.calc.totPmts_4.value = "";
   document.calc.totPmts_5.value = "";

}</script>

<!-- analytic -->
</head>
 	<body class="hsm">

		<section id="content" class="content-block-outer" role="main">
			<div class="wrapper-new">
				<div class="content-out">
					<div class="content-outer">
				<div class="sidebar-left">
					<div class="sidebar-top">
						</div>
					<header id="header">
						<div class="logo">
							<a href="https://www.mortgagecalculator.biz/"> <img src="https://www.mortgagecalculator.biz/img/logo.png" alt="MorgageCalculator logo." width="280px" height="185px"/> </a>
						</div>
						<nav>
							<div id="main-nav">
								<ul>
									<li class="item-with-ul">
										<a href="https://www.mortgagecalculator.biz/c/rent-or-buy.php">Rent or Buy?</a>
										<ul>
											<li><a href="https://www.mortgagecalculator.biz/c/affordability.php">Renter Home Affordability</a></li>
											<li><a href="https://www.mortgagecalculator.biz/c/tax-savings.php">Tax-Savings</a></li>
										</ul>
									</li>
									<li class="item-with-ul">
										<a href="https://www.mortgagecalculator.biz/c/budget-planner.php">Budgeting</a>
										<ul>
											<li><a href="https://www.mortgagecalculator.biz/c/budget-planner.php">Budget Planning</a></li>
											<li><a href="https://www.mortgagecalculator.biz/c/qualification.php">Mortgage Qualification</a></li>
											<li><a href="https://www.mortgagecalculator.biz/c/balance.php">Loan Balance</a></li>
											<li><a href="https://www.mortgagecalculator.biz/c/early-payoff.php">Mortgage Payoff Goal</a></li>
											<li><a href="https://www.mortgagecalculator.biz/c/tax-benefits.php">Tax Benefits</a></li>
											<li><a href="https://www.mortgagecalculator.biz/c/biweekly.php">Bi-Weekly Payments</a></li>
											<li><a href="https://www.mortgagecalculator.biz/c/extra-payments.php">Extra Payments</a></li>
											<li><a href="https://www.mortgagecalculator.biz/c/purchase-money-balance.php">Purchase Money Loan Balance</a></li>
											<li><a href="https://www.mortgagecalculator.biz/c/canadian.php">Canadian Qualification</a></li>
										</ul>
									</li>
									<li class="item-with-ul">
										<a href="https://www.mortgagecalculator.biz/c/term-comparison.php">Compare Loans</a>
										<ul>
											<li><a href="https://www.mortgagecalculator.biz/c/amortization-calc.php">Explainer Calculator</a></li>
											<li><a href="https://www.mortgagecalculator.biz/c/apr.php">APR Calculator</a></li>
											<li><a href="https://www.mortgagecalculator.biz/c/term-comparison.php">Term Comparison</a></li>
											<li><a href="https://www.mortgagecalculator.biz/c/rate-comparison.php">Rate Comparison</a></li>
											<li><a href="https://www.mortgagecalculator.biz/c/biweekly-calc.php">Bi-Weekly Savings</a></li>
											<li><a href="https://www.mortgagecalculator.biz/c/additional-payments.php">Additional Payments</a>
											</li>
										</ul>
									</li>
									<li class="item-with-ul">
										<a href="https://www.mortgagecalculator.biz/c/arm.php">Adjustable Rates</a>
										<ul>
											<li><a href="https://www.mortgagecalculator.biz/c/arm-vs-fixed-rates.php">ARM vs Fixed Rates</a></li>
											<li><a href="https://www.mortgagecalculator.biz/c/arm-apr.php">ARM APR</a></li>
											<li><a href="https://www.mortgagecalculator.biz/c/interest-only.php">Interest Only vs. Principal</a></li>
										</ul>
									</li>
									<li class="item-with-ul">
										<a href="https://www.mortgagecalculator.biz/c/refinancing.php">Refinance</a>
										<ul>
											<li><a href="https://www.mortgagecalculator.biz/c/refinance.php">Consolidation vs Refinancing</a></li>
										</ul>
									</li>
									<li class="item-with-ul">
										<a href="https://www.mortgagecalculator.biz/c/home-sellers.php">Sellers</a>
										<ul>
											<li><a href="https://www.mortgagecalculator.biz/c/tax-vs-deferred.php">Taxable Vs. Tax-deferred</a></li>
											<li><a href="https://www.mortgagecalculator.biz/c/commissions.php">Real Estate Commissions</a></li>
											<li><a href="https://www.mortgagecalculator.biz/c/real-estate-commissions.php">Commission Rebates</a></li>
											<li><a href="https://www.mortgagecalculator.biz/c/canadian-estate.php">Canadian Estate Planning</a></li>
										</ul>
									</li>
									<li class="item-with-ul">
										<a href="https://www.mortgagecalculator.biz/c/investors.php">Investors</a>
										<ul>
											<li><a href="https://www.mortgagecalculator.biz/c/commercial-loan.php">Commercial Loans</a></li>
											<li><a href="https://www.mortgagecalculator.biz/c/property-analysis.php">Residential Income Analysis</a></li>
											<li><a href="https://www.mortgagecalculator.biz/c/ror-calc.php">Portfolio Rate of Return</a></li>
											<li><a href="https://www.mortgagecalculator.biz/c/1031-exchange.php">1031 Exchange</a></li>
											<li><a href="https://www.mortgagecalculator.biz/c/1031-exchange-deadline.php">1031 Exchange Deadline</a></li>
										</ul>
									</li>
									<li>
										<a href="https://www.mortgagecalculator.biz/resources/">Resources</a>
									</li>
								</ul>
							</div>
						</nav>
					</header>
                    
                    <div class="holder" style="width:280px;"><br /></div>

					<div class="sidebar-calculator-block">
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/rate-comparison.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
					</div>
                    
					<div class="image-block">
                    </div>
					<div class="mlogo"> <a href="https://www.mortgagecalculator.biz/c/free.php"><img src="https://www.mortgagecalculator.biz/img/free-calculators.gif" alt="" /></a>
					</div>
					<div class="mlogo">
						<img src="https://www.mortgagecalculator.biz/img/mlogo.gif" alt="" />
					</div>

					<div class="sidebar-calculator-block">
						<iframe width="300px" height="240px" frameborder="0" scrolling="no" src="https://www.mortgagecalculator.biz/c/mini.php"></iframe>
					</div>
					<div class="get-yours-link">
					<a href="https://www.mortgagecalculator.biz/c/free.php">
					
					Get Yours Here</a></div>

					<div class="bottom-links">
						<h3>Helpful Real Estate Links</h3>
						<ul>
							<li><a href="http://www.makinghomeaffordable.gov/" target="_blank">MakingHomeAffordable.gov</a></li>
							<li><a href="https://www.nar.realtor/" target="_blank">NAR</a></li>
							<li><a href="https://www.fhfa.gov/" target="_blank">FHFA.gov</a></li>
							<li><a href="http://www.nahb.org/" target="_blank">NAHB.org</a></li>
							<li><a href="http://www.reri.org/" target="_blank">RERI.org</a></li>
							<li><a href="http://www.areuea.org/" target="_blank">AREUEA.org</a></li>
							<li><a href="http://naeba.org/" target="_blank">NAEBA.org</a></li>
							<li><a href="http://www.cre.org/" target="_blank">CRE.org</a></li>
							<li><a href="http://www.inman.com/" target="_blank">Inman News</a></li>
							<li><a href="http://realtytimes.com/" target="_blank">Realty Times</a></li>
						</ul>
					</div>
				</div>

				<div class="page-right">
			<div class="heading-block">
				<div class="main-heading"><h1>Mortgage Interest Rate Comparison Calculator</h1>
</div>
                    <ul id="breadcrumbs">

                      <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
                        <li><a href="https://www.mortgagecalculator.biz/c/term-comparison.php">Compare Loans</a></li>
                        <li>Lowest Mortgage Rates</li>
                    </ul>
                </div>   			<div class="bottom-section">
<p>                 
<!-- pmms -->
                
                   This calculator will help you to compare monthly payments and interest costs of home mortgages at up to five interest rates simultaneously.             </p> <p>
 Enter the mortgage principal amount and the length of the mortgage in years. 30 years is the most popular term in the United States, though the 15 year mortgage is also becoming more popular. In countries such as Canada 5 year and 10 year mortgages are more common. </p>
                <p>Then, either enter a starting interest rate and select the percentage to increment the comparison rates, or enter a rate for each of the five "Interest Rate" fields.
                You can find the current APR by visiting your bank, or looking them up on Freddie Mac's weekly mortgage survey. For your convenience, to the right we have synidicated Freddie Mac's current rates.</p>

<div class="table-block">
<form name="calc" method="post" action="#">
 <table>
 <tbody>

 <tr>
 <td colspan="5">
 
 Mortgage principal ($):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="principal" size="6" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td colspan="5">
 
 Term of the mortgage in years:
 
 </td>
 <td align="center">
 <input type="number" step="any" name="numYears" size="6" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td colspan="5">
 
 <a href="#viewrates"><strong>Starting interest rate</strong></a> (%):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="startRate" size="6" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td colspan="5">
 
 Increment comparison rates by:
 
 </td>
 <td>
 <select name="increment" size="1" onChange="fillRates(this.form)" width="80" style="width: 80px">
 <option value="0">Select</option>
 <option value=".125">1/8 %</option>
 <option value=".25">1/4 %</option>
 <option value=".375">3/8 %</option>
 <option value=".50">1/2 %</option>
 <option value=".625">5/8 %</option>
 <option value=".75">3/4 %</option>
 <option value=".875">7/8 %</option>
 <option value="1">1 %</option>
 </select>
 </td>
 </tr>

 <tr>
 <td colspan="6" align="center">
 <input type="button"  class="table-btn" value="Compute" onClick="computeForm(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 <strong>
 Interest Rate
 </strong>
 </td>
 <td align="center">
 <strong>
 <input type="text" name="rate_1" size="6" />
 </strong>
 </td>
 <td align="center">
 <strong>
 <input type="text" name="rate_2" size="6" />
 </strong>
 </td>
 <td align="center">
 <strong>
 <input type="text" name="rate_3" size="6" />
 </strong>
 </td>
 <td align="center">
 <strong>
 <input type="text" name="rate_4" size="6" />
 </strong>
 </td>
 <td align="center">
 <strong>
 <input type="text" name="rate_5" size="6" />
 </strong>
 </td>
 </tr>

 <tr>
 <td>
 
 Monthly payment:
 
 </td>
 <td align="center">
 <input type="text" name="moPmt_1" size="6" />
 </td>
 <td align="center">
 <input type="text" name="moPmt_2" size="6" />
 </td>
 <td align="center">
 <input type="text" name="moPmt_3" size="6" />
 </td>
 <td align="center">
 <input type="text" name="moPmt_4" size="6" />
 </td>
 <td align="center">
 <input type="text" name="moPmt_5" size="6" />
 </td>
 </tr>

 <tr>
 <td>
 
 Total principal:
 
 </td>
 <td align="center">
 <input type="text" name="totPrin_1" size="6" />
 </td>
 <td align="center">
 <input type="text" name="totPrin_2" size="6" />
 </td>
 <td align="center">
 <input type="text" name="totPrin_3" size="6" />
 </td>
 <td align="center">
 <input type="text" name="totPrin_4" size="6" />
 </td>
 <td align="center">
 <input type="text" name="totPrin_5" size="6" />
 </td>
 </tr>

 <tr>
 <td>
 
 Total interest:
 
 </td>
 <td align="center">
 <input type="text" name="totInt_1" size="6" />
 </td>
 <td align="center">
 <input type="text" name="totInt_2" size="6" />
 </td>
 <td align="center">
 <input type="text" name="totInt_3" size="6" />
 </td>
 <td align="center">
 <input type="text" name="totInt_4" size="6" />
 </td>
 <td align="center">
 <input type="text" name="totInt_5" size="6" />
 </td>
 </tr>

 <tr>
 <td>
 
 Total payments:
 
 </td>
 <td align="center">
 <input type="text" name="totPmts_1" size="6" />
 </td>
 <td align="center">
 <input type="text" name="totPmts_2" size="6" />
 </td>
 <td align="center">
 <input type="text" name="totPmts_3" size="6" />
 </td>
 <td align="center">
 <input type="text" name="totPmts_4" size="6" />
 </td>
 <td align="center">
 <input type="text" name="totPmts_5" size="6" />
 </td>
 </tr>

 <tr>
 <td align="center" colspan="4">
 <input type="button" class="table-btn"  value="Printer Friendly Report" onClick="createReport(this.form)" />
 </td>
 <td align="center" colspan="2">
 <input type="reset" class="table-btn"  value="Reset" />
 </td>
 </tr>



 </tbody>
 </table>
 </form>
 </div>

<p>&nbsp;</p>
<a name="viewrates"></a>
<h3>Current Mortgage Rates</h3>
<div class="myFinance-widget" data-show-filters="true" data-widget-id="0e398780-2190-4caf-9640-aecf30df3c9c" data-property-value="250000" data-purchase-price="250000" data-percent="20" data-current-loan-balance="200000"  data-table-title="Save Money With Today's Best Fixed Mortgage Rates" data-campaign="mortcalcbiz_fulltable_mortgage"></div>


 
 <h2>Comparing Mortgage Rates</h2>
<p> Whether you are a first-time homebuyer or you are seeking to   refinance your property, mortgages and interest rates can be   overwhelming if you do not understand the basics of these concepts. To   ensure you obtain the best mortgage to meet your needs and your budget,   there are a few factors you must first consider.</p>
<h3>
  How Mortgage Rates Impact Loan Costs and Real Estate Values</h3>
<p>
  Mortgage rates change daily based on both international and national   economic factors. However, regardless of the specific rates, mortgages   greatly impact real estate values and loan costs for potential   homebuyers.</p>
<p>
  Nearly all repayment schedules are calculated based on a compound   interest formula. In the beginning of the repayment period, you are   paying little on the principal so your annual interest rate is added to   the balance on your mortgage every month; your principal balance does   not go down much, if at all. However, by paying a lump sum, one point   for every one percent, to the lender at the time you obtain the loan,   you can expect a lower interest rate. </p>
<p>
  For most types of loans, lending institutions offer mortgages with   combinations of interest rates and points. Typically, the lower your   interest rate, the more points you can expect to pay at settlement.   Interest rates specifically affect your monthly payment, while points   affect the amount of money you will be required to pay for closing and   settlement costs.</p>
<p>
  Additionally, while some may believe that the prices of homes will fall   after mortgage rates rise because fewer people may qualify for   mortgages, such as not been the case throughout the history of the   housing market. Interest rates on mortgages are determined by economic   growth and inflation expectations, two factors that combine to set the   supply and demand for credit. Mortgage rates typically rise when   consumers feel confident about buying homes; inflation is increasing   real estate values and more consumers have solid employment.</p>
<p>
  However, when interest rates fall, real estate prices increase. More   people are seeking opportunity to capitalize on the lower interest rates   and may be more willing to pay a higher price for their homes. If   potential homebuyers are in a sufficient state to purchase a mortgage,   few will care about the total cost of the home if they can obtain a   lower interest rate.</p>
<h3>
  How to Prepare Your Financial Situation for Buying</h3>
<p><img src="../img/loan.png" width="300" height="320" alt="Home Loan." align="right"/>  Roughly 25 percent of Americans plan to purchase a home in the next   decade and 56 percent currently own a home, according to <a href="http://www.gallup.com/poll/161975/american-dream-owning-home-lives-even-young.aspx">Gallup's annual   Economy and Personal Finance survey</a>. However, sometimes potential   buyers fall in love with a residence only to find out that they are not   in the correct financial situation to qualify for the home; some may   barely qualify but obtain a sky-high interest rate.</p>
<p>
  To prepare yourself for buying a home, you must be in good fiscal shape   or appear well-rounded on paper. You want to avoid any surprises when a   loan officer pulls your credit report, and you may qualify for a better   mortgage rate, allowing you to save money over the life of the loan.   Also consider having a savings account to cover both the closing costs   and any unexpected repairs.</p>
<p>
  Before applying for a home, you will want to meet with a mortgage   official to receive pre-approval to learn where you stand. You will want   to obtain a copy of your credit report so that you see what is holding   you back and to look for items that you did not know existed. Should you   find that your credit needs improving, do your best to settle or pay   off any debts that may have been sent to collections. If you know that   some debts are no longer valid, write to the creditor and ask for   validation. However, even if you pay the account, it may still remain on   your report for five or seven years, depending on the type of debt. </p>
<p>
  Additionally, consider using a mortgage calculate to show you how much   home you can purchase based on the average interest rate, your income   and the length of the loan. A debt-to-income ratio calculator that shows   how much of your income will go to paying the debts is also helpful; if   the ratio is greater than 36 percent, you may want to consider   resolving your debts prior to applying for a mortgage.</p>
<p>
  You will also want to pay every bill on time, especially if you are   moving. You do not want to miss out on a final electric bill by   neglecting to provide a forwarding address; this will harm your credit   and set you back, preventing you from obtaining a competitive mortgage   rate.</p>
<p>
  Potential buyers should try to stay in the black; even overdraft fees   are red flags to underwriters. Although the lender may only pull your   two most recent bank statements when you physically apply for the loan,   if you cannot stay in the black, you most likely are not ready to   purchase a property anyway.</p>
<p>
  Your financial situation also includes job stability. Banks look   unfavorably on those who switch jobs at the same time they are hunting   for a home or applying for a loan. Even if you find a job that pays more   than your current employer, the lender may not allow you to switch   companies before the loan closes. If you are thinking of finding another   job, try to do so well before you apply for a loan. Otherwise, you may   have to wait until after the closing process is finished.</p>
<p>
  Finally, start saving money as soon as you are first considering   purchasing a home, and save more money than you think you will need.   After you speak to a lender, you will have an idea of how much house you   can buy with the finances you have available, as well as the   requirements for the down payment on that particular loan.</p>
<h3>
  Where to Find the Best Mortgage Rates</h3>
<p>
  To obtain the most competitive rates, contact a variety of financial   institutions. Interest rates fluctuate constantly, sometimes because a   financial institution is promoting a particular loan product. For   example, some lenders who are eager to generate more purchase loans may   offer better mortgage rates for homebuyers but not for those seeking to   refinance their current property. Additionally, sometimes a bank or   credit union will introduce a new product and offer more competitive   rates in order to entice new borrowers to sue their services. Diversify   your search and try a variety of places including a national bank, a   community bank, a credit union, a regional bank and a direct lender. </p>
<h3>
  How Much Down Payment is Needed </h3>
<p>
  Whether a lender requires homeowners to pay for private mortgage   insurance (PMI), the specific type of loan and your interest rate will   all affect how much you will need to borrow and the amount of down   payment that you will need to pay before purchasing the home. The down   payment itself reduces the amount of the loan in relation to the home's   purchase price. A homebuyer may obtain a conventional mortgage with the   less-than-traditional 20 percent through PMI or government programs that   exist to help low income buyers or those in dire financial situations.   However, the smaller the percentage of the down payment, the larger the   monthly payment will be.</p>
<p>
  For conventional financing, if you are looking at a down payment lower   than 20 percent, your loan-to-value ratio will be 80 percent or higher.   In these cases, the lending institution may require you to pay PMI   because they are increasing their potential risk of loss if you should   go into default; they are lending you more money so that you may   purchase the home. However, PMI also increases your monthly mortgage   payments. You must consider if it is worth it to pay PMI each month to   receive other benefits of homeownership or if it would be in your best   interest to save up for a few more months and put a larger down payment   on the property.</p>
<p>
  Homeowners can pay 3.5 percent on an FHA loan with higher mortgage   insurance costs while a down payment of between five and 10 percent on a   conforming loan will mean lower PMI payments. However, a down payment   of 20 percent will completely eliminate the cost of PMI. </p>
<h3>
  What Mortgage Rates are Set Against as a Baseline</h3>
<p>
  When lending institutions advertise the interest rate for their mortgage   products, many factors play into the calculation of the rate. Banks use   the federal funds rate, the discount rate, the prime rate, the bank's   necessary profit margin and the risk associated with each individual   borrower to determine the amount of the interest rate.</p>
<p>
  The two Federal Reserve rates impact how the government prices the prime   rate; many banks and mortgage lenders use the prime rate as a basis for   pricing their mortgage products. In other words, the prime rate is the   index or the baseline for setting each individual mortgage rate. The   lender then adds a margin to index to determine the final, fully-indexed   mortgage rate. While the margin amount is completely up to the bank,   the institution often adds enough of a margin so that it can still make a   profit on the product but stay competitive with other lenders at the   same time.</p>
<h3>
  Why Mortgage Rates are Different for Different Loan Types </h3>
<p>
  There is no one-size-fits-all mortgage loan. Each scenario is different   and is priced accordingly to factor in risk-based pricing or the chance   that the homeowner will default on the loan. Banks and lenders begin   with a base interest rate and lower it or raise it based on the   criteria. Loan pricing adjustments include:</p>
<ul class="arrow">
  <li> Occupancy</li>
  <li> Credit score</li>
  <li> Documentation</li>
  <li> Loan amount</li>
  <li> Loan purpose such as refinance or purchase</li>
  <li> Debt-to-income ratio</li>
  <li> Loan-to-value</li>
  <li> Property type</li>
</ul>
<p>
  The more that the companies have to handle in terms of mortgages, the   higher your rate may be. Additionally, different mortgages rest largely   on economic developments and come in many forms with different   conditions and terms. Combined, the variables result in different   mortgages with varying interest rates.</p>
<p>
  Rates depend largely on when in the economy you wish to purchase a home.   Timing is important for both you and the lender to help maximize the   return on the investment. For instance, you may prefer to finance your   home with a low interest rate to keep the financing cost low for the   duration of the loan. On the other hand, a lending institution may   prefer to charge higher rates to obtain a higher return on the loan. </p>
<p>
  Generally, purchasing a home during periods of economic growth may lead   to a higher interest rate. However, rates during a slower economy may be   lower because of diminished activity and the downward pressure that is   often placed on interest rates as the public's demand for investing,   borrowing and money generally slows down.</p>
<p>
  Secondly, both the 10-year Treasury Bond yield and the Consumer Price   Index (CPI) are two interest rates that will influence mortgage rate   changes. An increase in cost of these items will indicate higher   pressure on the economy; the CPI helps lending institutions adjust their   interest rates to ward off inflation. By the same token, the   10-year-Treasure Bond is often looked at as a reliable measure of   long-term interest rates. As the yield fluctuates, lenders adjust their   rates accordingly so that they remain profitably in the long run while   offering a variety of rates over time.</p>
<h3>
  The Major Differences Between Fixed and Adjustable Rates </h3>
<p>
  Before approaching a lender and beginning the process of applying for a   mortgage, it is important to understand what types of mortgages are   available and the disadvantages and advantages of each of them. </p>
<p>
  A fixed rate mortgage is one in which the interest rate remains the same   for the duration of the loan. The interest rate does not change for a   set amount of time; almost 75 percent of all home loans are fixed rate   mortgages. These rates typically come in increments of 10, 15 or 30   years.</p>
<p>
  The advantage to having a fixed rate mortgage is that you know exactly   what the principal and interest payments will be for the life of the   loan, allowing you to budget easier because you know that the rate will   never change. These rates are predictable in that the rate is agreed   upon at the beginning of the loan. Your monthly payments will remain the   same. However, if you purchase a fixed mortgage rate when rates are   high, you may be eligible to refinance once the rates go down again, but   the rates are typically higher so your monthly payment will be higher.</p>
<p>
  An adjustable rate mortgage (ARM) is a mortgage loan in which the rate   changes based on a schedule or after a fixed period of time. These loans   are often riskier because the payment may increase significantly when   the rate is scheduled to change. However, to help level the risk,   homeowners are rewarded with a lower interest rate spread.</p>
<p>
  Obtaining an ARM may allow you to qualify for a higher loan amount and a   more valuable home. Those with large mortgages can receive an ARM and   refinance the loan every year; the lower rates allow you to buy a more   costly home yet you pay a lower mortgage payment than a fixed mortgage   rate. However if rates increase significantly at any point during the loan, the homebuyer may quickly find themselves unable to make the increased interest payments at the new higher rate.</p>
<p>
  By understanding the different types of loans, how to prepare yourself   for the loan application and to purchase a home, you can increase your   chances of obtaining a competitive mortgage and interest rate. It is   vital to make sure that you have all the necessary items in place before   applying for a mortgage so that you do not encounter any surprises   along the way.</p>
 
                
<div id="mortcalcbiz-endcontent"></div>

<div class="myFinance-widget" data-type="horizontal" data-campaign="mortcalcbiz-cru-eoc"></div>


 <h3>Key Tips &amp; Advice</h3>
                    <p>Things to consider when buying a home:</p>
                    <ul class="arrow">
                        <li>While the 30-year mortgage is the most popular term in the United States, a 15-year term builds equity much quicker;</li>
                        <li>Home buyers in the US move on average of once every 5 to 7 years;</li>
                        <li>Early mortgage payments apply primarily to interest rather than the principal;</li>
                        <li>Using a <a href="https://www.mortgagecalculator.biz/c/term-comparison.php">shorter loan term</a>, <a href="https://www.mortgagecalculator.biz/c/extra-payments.php">paying extra</a> &amp; making <a href="https://www.mortgagecalculator.biz/c/biweekly.php">bi-weekly payments</a> can better help offset any transaction-based expenses.</li>
                    </ul>
                    					<h3>Do Home Prices Always Go Up?</h3>
					<div class="tabs_table">
						<ul class="tabs">
						 <li><a rel="tab_1" class="selected">Yes, mostly</a></li>
						 <li><a rel="tab_2" class="">But why?</a></li>
						</ul>
						<div class="panes">
						 <div class="tab-content" id="tab_1" style="display: block;">
						  <p class="l-child">In the United States real estate prices have went up about 6-fold since 1970.</p>
						 </div>
						 <div class="tab-content" id="tab_2" style="display: none;">
						  <p class="l-child">Our monetary policy is biased toward inflation. If you back out general inflation, outside of during market bubbles, real estate typically performs roughly inline with general inflation. Rather than looking at raw prices, better metrics to use for analyzing real estate prices are:
						  </p><ul>
						<li>Home price vs median income.</li>
						<li>Purchase price vs rent.</li>
						</ul>
						<p></p>						 </div>
						</div>
					</div>
				</div>
    

			<div class="share-block">

			<!--	<a href="#"><img src="img/share.png" alt="" /></a> -->
			</div>

		</div>
			</div>
			</div>
			</div>
		</section>
		<footer id="footer" class="footer-content-block">
			<div class="wrapper-new">
				<div class="footer-container">
					<div id="f-left-col">
						<div id="sidebar-end">
                 
                </div>
						<div id="copyright">
							&copy; 2013 &mdash; 2019 MortgageCalculator.biz
						</div>
					</div>
					<div id="f-main-col">
						<div class="widget col-25">
							<h5 class="w-title">About Us:</h5>
							<ul>
								<li>
									<a href="https://www.mortgagecalculator.biz/about.php">About Us</a>
								</li>
								<li>
									<a href="https://www.mortgagecalculator.biz/c/free.php">Free Calculators</a>
								</li>
							</ul>
						</div>
						<div class="widget col-25">
                    <h5 class="w-title">Follow Us:</h5>
                    <ul>
                        <li><a href="https://twitter.com/mortcalcbiz">Twitter</a></li>
                       <li><a href="https://www.facebook.com/mortgagecalculator.biz">Facebook</a></li>
                    </ul>
                </div>
                <div class="widget col-50 c-last">
                    <h5 class="w-title">Contact Us:</h5>
                    <script type="text/javascript">
//<![CDATA[
<!--
var x="function f(x,y){var i,o=\"\",l=x.length;for(i=0;i<l;i++){if(i<5)y++;y" +
"%=127;o+=String.fromCharCode(x.charCodeAt(i)^(y++));}return o;}f(\"`}dozf\\" +
"177\\1772u<m?lnxh;u1q\\\"\\002\\003\\016LH\\030^\\tDLDLXE\\002C\\r^^\\010C]" +
"_[]\\021B\\025_U_M\\003.&&\\0051n+gxybmpw}y*&!-..|e!a7w`2d\\035\\002\\003\\" +
"027\\007\\rN\\002A\\022\\027\\026\\n\\002\\034G\\031L\\036^EN\\037IEIA\\022" +
"QPW{n)>|+eoi{K\\177$d'4mcwgagx7w7in~njm\\010\\021\\016LH\\014\\035ZN\\001\\" +
"010\\002\\033\\031\\002s\\022\\013\\002v`ks\\004\\013\\tfgjyLc\\034vqs\\030" +
"\\031qux\\025\\026\\021}}~\\023\\014dac\\010\\tcgh\\005\\006jnm\\002\\003SQ" +
"R?8VUW45\\\\Z\\\\12_@A./\\032)*\\003$%NJL!\\\"702_X367TU;;<QR>\\\"!NO\\\"'&" +
"KD-++@A).\\020}~\\002\\027\\025\\026{t\\033J\\034\\033\\034rs\\000\\001\\00" +
"2oh\\035\\031N\\024\\r\\r\\032\\006\\001\\017Ltpr\\037\\0307mfp\\025h\\027\\"+
"020s'%cbb\\017\\010javnjurknn\\003<+<>+10<_[Z70)4/\\\"/6 7:8CII&'206ORVIM35" +
"7TU\\\\IIxrg\\1775rcn,rmxkd\\177o~q!\\031\\035\\031\\035\\010\\000\\037\\03" +
"7\\034\\033\\032wp\\035\\021D\\017\\nn\\021hi\\022\\032\\036Q\\017\\t\\014a" +
"bJabuo'f;%\\177{z\\027\\020\\035\\037\\026\\037\\002\\031\\034eff\\013\\004" +
"\\033\\001\\n\\002\\032\\014\\000+=@K\\002\\030]\\010H\\007\\030\\036\\030\\"+
"010\\034\\022KX[X_\\014^)Q\\020R\\017=\\030\\032oBpblf(\\177 lndO\\177ogS|}" +
"ar;qyqknH!6q$\\027\\023\\023\\036\\001\\\\\\035N\\025\\002S\\002\\033\\031\\"+
"023\\022Y\\031TZO\\034\\035\\034Q\\002V\\007U\\006\\016\\002)i0,\\\"~.3/'/'" +
"b5s#|\\rp\\017vh9{1y(:*&w&L\\031J\\005D\\013\\t\\016\\034\\n\\004\\036\\nOG" +
"\",5)"                                                                       ;
while(x=eval(x));
//-->
//]]>
</script>
                    <div class="w-content">
                        <a href="https://www.mortgagecalculator.biz/"><img width="80" height="53" class="alignright" src="https://www.mortgagecalculator.biz/img/colors/primary-blue/logo.png"></a>
                        </div>
                        </div>
					</div>
				</div>
			</div>
		</footer>

<script async type='text/javascript' id="myFinance-widget-script">
!function(){function e(){var e=document.createElement("script"),n=document.getElementById("myFinance-widget-script"),a=t+"static/widget/myFinance.js";e.type="text/javascript",e.async=!0,e.src=a,n.parentNode.insertBefore(e,n);var c="myFinance-widget-css";if(!document.getElementById(c)){var d=document.getElementsByTagName("head")[0],i=document.createElement("link");i.id=c,i.rel="stylesheet",i.type="text/css",i.href=t+"static/widget/myFinance.css",i.media="all",d.appendChild(i)}}var t="https://www.myfinance.com/";document.attachEvent?document.attachEvent("onreadystatechange",function(){"complete"===document.readyState&&e()}):document.addEventListener("DOMContentLoaded",e,!1)}();
</script>



		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster --> 
		<script src="https://www.mortgagecalculator.biz/scripts/jquery-1.11.2.min.js"></script>
		<script src="https://www.mortgagecalculator.biz/scripts/jquery-migrate-1.2.1.min.js"></script>
		<script src="https://www.mortgagecalculator.biz/scripts/jquery.accordion.js"></script>
		<script src="https://www.mortgagecalculator.biz/scripts/jquery.meanmenu.js"></script>
		<script src="https://www.mortgagecalculator.biz/scripts/hsm-main.js"></script>
		<script src="https://www.mortgagecalculator.biz/mint/?js" type="text/javascript"></script>
		<script type="text/javascript" async defer  data-pin-color="red" data-pin-height="28" data-pin-hover="true" src="//assets.pinterest.com/js/pinit.js"></script>
        <script src="//static.getclicky.com/js" type="text/javascript"></script>
<script type="text/javascript">try{ clicky.init(100990531); }catch(e){}</script>
<noscript><p><img alt="Clicky" width="1" height="1" src="//in.getclicky.com/100990531ns.gif" /></p></noscript>



</body>
</html>

