<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Mortgage Comparison Calculator: Current 10, 15, 20 &amp; 30 Year Fixed Mortgage Rates </title>		
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


function computeForm(form) {

   var Vprin = sn(document.calc.principal.value);

   if(Vprin == 0) {
   } else
   if(document.calc.intRate.value == "") {
   } else {

      var VintRate = sn(document.calc.intRate.value);

      var VmoPmt_10 = computeMonthlyPayment(Vprin, 120, VintRate);
      document.calc.moPmt_10.value = fns(VmoPmt_10,0,1,1,1);

      var VmoPmt_15 = computeMonthlyPayment(Vprin, 180, VintRate);
      document.calc.moPmt_15.value = fns(VmoPmt_15,0,1,1,1);

      var VmoPmt_20 = computeMonthlyPayment(Vprin, 240, VintRate);
      document.calc.moPmt_20.value = fns(VmoPmt_20,0,1,1,1);

      var VmoPmt_25 = computeMonthlyPayment(Vprin, 300, VintRate);
      document.calc.moPmt_25.value = fns(VmoPmt_25,0,1,1,1);

      var VmoPmt_30 = computeMonthlyPayment(Vprin, 360, VintRate);
      document.calc.moPmt_30.value = fns(VmoPmt_30,0,1,1,1);


      var VtotPrin_10 = Vprin;
      document.calc.totPrin_10.value = fns(VtotPrin_10,0,1,1,1);

      var VtotPrin_15 = Vprin;
      document.calc.totPrin_15.value = fns(VtotPrin_15,0,1,1,1);

      var VtotPrin_20 = Vprin;
      document.calc.totPrin_20.value = fns(VtotPrin_20,0,1,1,1);

      var VtotPrin_25 = Vprin;
      document.calc.totPrin_25.value = fns(VtotPrin_25,0,1,1,1);

      var VtotPrin_30 = Vprin;
      document.calc.totPrin_30.value = fns(VtotPrin_30,0,1,1,1);


      var VtotInt_10 = computeFixedInterestCost(Vprin, VintRate, VmoPmt_10);
      VtotInt_10 = Math.round(VtotInt_10);
      document.calc.totInt_10.value = fns(VtotInt_10,0,1,1,1);

      var VtotInt_15 = computeFixedInterestCost(Vprin, VintRate, VmoPmt_15);
      VtotInt_15 = Math.round(VtotInt_15);
      document.calc.totInt_15.value = fns(VtotInt_15,0,1,1,1);

      var VtotInt_20 = computeFixedInterestCost(Vprin, VintRate, VmoPmt_20);
      VtotInt_20 = Math.round(VtotInt_20);
      document.calc.totInt_20.value = fns(VtotInt_20,0,1,1,1);

      var VtotInt_25 = computeFixedInterestCost(Vprin, VintRate, VmoPmt_25);
      VtotInt_25 = Math.round(VtotInt_25);
      document.calc.totInt_25.value = fns(VtotInt_25,0,1,1,1);

      var VtotInt_30 = computeFixedInterestCost(Vprin, VintRate, VmoPmt_30);
      VtotInt_30 = Math.round(VtotInt_30);
      document.calc.totInt_30.value = fns(VtotInt_30,0,1,1,1);


      var VtotPmts_10 = Number(VtotPrin_10) + Number(VtotInt_10);
      document.calc.totPmts_10.value = fns(VtotPmts_10,0,1,1,1);

      var VtotPmts_15 = Number(VtotPrin_15) + Number(VtotInt_15);
      document.calc.totPmts_15.value = fns(VtotPmts_15,0,1,1,1);

      var VtotPmts_20 = Number(VtotPrin_20) + Number(VtotInt_20);
      document.calc.totPmts_20.value = fns(VtotPmts_20,0,1,1,1);

      var VtotPmts_25 = Number(VtotPrin_25) + Number(VtotInt_25);
      document.calc.totPmts_25.value = fns(VtotPmts_25,0,1,1,1);

      var VtotPmts_30 = Number(VtotPrin_30) + Number(VtotInt_30);
      document.calc.totPmts_30.value = fns(VtotPmts_30,0,1,1,1);

   }
}


function createReport(form) {

   if(document.calc.principal.value.length == 0) {
      alert("Please enter the amount of the mortgage.");
      document.calc.principal.focus();
   } else
   if(document.calc.intRate.value == "") {
      alert("Please enter mortgage's annual interest rate.");
      document.calc.intRate.focus();
   } else {

      computeForm(form);

      var Vprin = sn(document.calc.principal.value);
      var VintRate = sn(document.calc.intRate.value);

      var termRows = "";

      termRows += "<tr><td><font face='arial'><small>Monthly payment:</small></td>";
      termRows += "<td align=right><font face='arial'><small>" + document.calc.moPmt_10.value + "</small>";
      termRows += "</td><td align=right><font face='arial'>";
      termRows += "<small>" + document.calc.moPmt_15.value + "</small></td><td align=right>";
      termRows += "<font face='arial'><small>" + document.calc.moPmt_20.value + "</small></td>";
      termRows += "<td align=right><font face='arial'><small>" + document.calc.moPmt_25.value + "</small>";
      termRows += "</td><td align=right><font face='arial'>";
      termRows += "<small>" + document.calc.moPmt_30.value + "</small></td></tr>";

      termRows += "<tr><td><font face='arial'><small>Principal payments:</small></td>";
      termRows += "<td align=right><font face='arial'>";
      termRows += "<small>" + document.calc.totPrin_10.value + "</small></td><td align=right>";
      termRows += "<font face='arial'><small>" + document.calc.totPrin_15.value + "</small></td>";
      termRows += "<td align=right><font face='arial'><small>" + document.calc.totPrin_20.value + "</small>";
      termRows += "</td><td align=right><font face='arial'>";
      termRows += "<small>" + document.calc.totPrin_25.value + "</small></td><td align=right>";
      termRows += "<font face='arial'><small>" + document.calc.totPrin_30.value + "</small></td></tr>";

      termRows += "<tr><td><font face='arial'><small>Interest payments:</small></td>";
      termRows += "<td align=right><font face='arial'><small>" + document.calc.totInt_10.value + "</small>";
      termRows += "</td><td align=right><font face='arial'>";
      termRows += "<small>" + document.calc.totInt_15.value + "</small></td><td align=right>";
      termRows += "<font face='arial'><small>" + document.calc.totInt_20.value + "</small></td>";
      termRows += "<td align=right><font face='arial'><small>" + document.calc.totInt_25.value + "</small>";
      termRows += "</td><td align=right><font face='arial'>";
      termRows += "<small>" + document.calc.totInt_30.value + "</small></td></tr>";

      termRows += "<tr><td><font face='arial'><small>Total payments:</small></td>";
      termRows += "<td align=right><font face='arial'><small>" + document.calc.totPmts_10.value + "</small>";
      termRows += "</td><td align=right><font face='arial'>";
      termRows += "<small>" + document.calc.totPmts_15.value + "</small></td><td align=right>";
      termRows += "<font face='arial'><small>" + document.calc.totPmts_20.value + "</small></td>";
      termRows += "<td align=right><font face='arial'><small>" + document.calc.totPmts_25.value + "</small>";
      termRows += "</td><td align=right><font face='arial'>";
      termRows += "<small>" + document.calc.totPmts_30.value + "</small></td></tr>";

      var part1 = "<head><title>Mortgage Term Comparison</title></head>";
      part1 += "<b";
      part1 += "od";
      part1 += "y bgcolor= '#FFFFFF'>";
      part1 += "<br /><br /><center><font face='arial'><big><strong>Mortgage Term Comparison</strong>";
      part1 += "</big></center>";

      var part2 = "<center><table border=1 cellpadding=2 cellspacing=0><tr><td colspan=6>";
      part2 += "<font face='arial'><small><strong>Principal: " + fns(Vprin,0,1,1,1) + "<br />";
      part2 += "Interest Rate: " + fns(VintRate,3,1,2,1) + "</strong></small></td>";
      part2 += "</tr><tr bgcolor='silver'><td align='center'><font face='arial'><small><strong>";
      part2 += "Description</strong></small></td><td align='center'><font face='arial'>";
      part2 += "<small><strong>10 Years</strong></small></td><td align='center'><font face='arial'>";
      part2 += "<small><strong>15 Years</strong></small></td><td align='center'><font face='arial'>";
      part2 += "<small><strong>20 Years</strong></small></td><td align='center'><font face='arial'>";
      part2 += "<small><strong>25 Years</strong></small></td><td align='center'><font face='arial'>";
      part2 += "<small><strong>30 Years</strong></small></td></tr>";

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

   document.calc.moPmt_10.value = "";
   document.calc.moPmt_15.value = "";
   document.calc.moPmt_20.value = "";
   document.calc.moPmt_25.value = "";
   document.calc.moPmt_30.value = "";
   document.calc.totPrin_10.value = "";
   document.calc.totPrin_15.value = "";
   document.calc.totPrin_20.value = "";
   document.calc.totPrin_25.value = "";
   document.calc.totPrin_30.value = "";
   document.calc.totInt_10.value = "";
   document.calc.totInt_15.value = "";
   document.calc.totInt_20.value = "";
   document.calc.totInt_25.value = "";
   document.calc.totInt_30.value = "";
   document.calc.totPmts_10.value = "";
   document.calc.totPmts_15.value = "";
   document.calc.totPmts_20.value = "";
   document.calc.totPmts_25.value = "";
   document.calc.totPmts_30.value = "";

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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/term-comparison.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				<div class="main-heading"><h1>Mortgage Term Comparison Calculator</h1>
</div>
                    <ul id="breadcrumbs">

                        <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
                        <li><a href="https://www.mortgagecalculator.biz/c/term-comparison.php">Compare Loans</a></li>
                        <li>Mortgage Length</li>
                    </ul>
                </div>
                <div class="bottom-section">
<p><img src="https://www.mortgagecalculator.biz/img/house-in-hands.jpg" alt="house" width="130" class="alignright" />       This calculator that will help you to compare monthly payments and interest costs of home mortgages at various loan term lengths.          </p>
                <p>Shorter mortgages generally come with higher payments, but they also have lower interest rates &amp; cost far less in interest due to the loan having a much shorter duration. <a href="https://www.mortgagecalculator.biz/resources/graphics/15-vs-30-year.php">This infographic</a> compares the advantages of 15 year mortgages over 30 year mortgages. </p>

<div class="table-block">
<form name="calc" method="post" action="#">
 <table>
 <tbody>

 <tr>
 <td colspan="6" align="right">
  Loan principal (<acronym title="Remaining loan amount after down payment">$</acronym>):
  <input name="principal" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="250000" size="6" onfocus="this.value = this.value=='250000'?'':this.value;" onblur="this.value = this.value==''?'250000':this.value;" />
 </td>
 </tr>

 <tr>
 <td colspan="6" align="right"> 
 <a href="#viewrates"><strong>Expected <acronym title="annual interest rate">APR</acronym></strong></a> (%):
 <input name="intRate" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="5" size="6" onfocus="this.value = this.value=='5'?'':this.value;" onblur="this.value = this.value==''?'5':this.value;" />
 </td>
 </tr>

 <tr>
 <td colspan="6" align="right">
 <input type="button" value="Calculate" class="table-btn" onClick="computeForm(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 <strong>
 Term
 </strong>
 </td>
 <td align="center">
 <strong>
 10 Years
 </strong>
 </td>
 <td align="center">
 <strong>
 15 Years
 </strong>
 </td>
 <td align="center">
 <strong>
 20 Years
 </strong>
 </td>
 <td align="center">
 <strong>
 25 Years
 </strong>
 </td>
 <td align="center">
 <strong>
 30 Years
 </strong>
 </td>
 </tr>

 <tr>
 <td>
 
 Monthly</td>
 <td align="center">
 <input type="text" name="moPmt_10" size="6" />
 </td>
 <td align="center">
 <input type="text" name="moPmt_15" size="6" />
 </td>
 <td align="center">
 <input type="text" name="moPmt_20" size="6" />
 </td>
 <td align="center">
 <input type="text" name="moPmt_25" size="6" />
 </td>
 <td align="center">
 <input type="text" name="moPmt_30" size="6" />
 </td>
 </tr>

 <tr>
 <td>
 
 Principal
 
 </td>
 <td align="center">
 <input type="text" name="totPrin_10" size="6" />
 </td>
 <td align="center">
 <input type="text" name="totPrin_15" size="6" />
 </td>
 <td align="center">
 <input type="text" name="totPrin_20" size="6" />
 </td>
 <td align="center">
 <input type="text" name="totPrin_25" size="6" />
 </td>
 <td align="center">
 <input type="text" name="totPrin_30" size="6" />
 </td>
 </tr>

 <tr>
 <td>
 
 Interest</td>
 <td align="center">
 <input type="text" name="totInt_10" size="6" />
 </td>
 <td align="center">
 <input type="text" name="totInt_15" size="6" />
 </td>
 <td align="center">
 <input type="text" name="totInt_20" size="6" />
 </td>
 <td align="center">
 <input type="text" name="totInt_25" size="6" />
 </td>
 <td align="center">
 <input type="text" name="totInt_30" size="6" />
 </td>
 </tr>

 <tr>
 <td>
 
 Total
 
 </td>
 <td align="center">
 <input type="text" name="totPmts_10" size="6" />
 </td>
 <td align="center">
 <input type="text" name="totPmts_15" size="6" />
 </td>
 <td align="center">
 <input type="text" name="totPmts_20" size="6" />
 </td>
 <td align="center">
 <input type="text" name="totPmts_25" size="6" />
 </td>
 <td align="center">
 <input type="text" name="totPmts_30" size="6" />
 </td>
 </tr>

 <tr>
 <td align="center" colspan="5">
 <input type="button" class="table-btn" value="Printer Friendly Report" onClick="createReport(this.form)" />
 </td>
 <td align="center" colspan="1">
 <input type="reset" class="table-btn" value="Reset" />
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



 <h2>(Almost) Everything You Should Know About Mortgage Rates</h2>
<p> Buying a house is one of the biggest and most important decisions   that a person can make in their lives.  For the majority of Americans, a   mortgage is the only option they have to their first home or any   subsequent homes afterwards.  To mortgage a house, banks often   require down payments that are around 10% of the total amount depending   on your credit score, ability to repay and other important factors.The information below   consists of the difference between fixed and adjustable rate mortgages,   what mortgage rates are indexed to, the benefits and downsides to long   or short term mortgages, how to prepare your finances to buy a home, how   to successfully afford your mortgage, how often people move and have to   switch mortgage terms around, incentives for buying, risks associated   with home ownership and trivia facts that are focused on home mortgages. </p>
<p><img src="../img/building-equity.jpg" width="630" height="420" alt="Building Home Equity." /></p>
<h2>Fixed Rate vs Adjustable Rate</h2>
<p>
  With any loan the two most popular terms that people will hear are fixed   rate and adjustable rate.  Mortgages are not much different from other   loans in this aspect.  Fixed rate mortgages allow the buyer to have one   interest rate throughout the entire term of their mortgage.  The rate   does not change ever and will often be somewhat higher than an   adjustable rate mortgage.  With adjustable rate mortgages your rates   will fluctuate depending on the economy and where you are at in the life   of your mortgage.  These rates often start out much lower than a fixed   rate mortgage but can go up months or years after the mortgage loan   starts.  Both of these types carry their own benefits and disadvantages.    It is important that remember a few key points when you decide whether   you want a fixed rate mortgage or an adjustable rate mortgage.</p>
<p>
  <strong>Benefits of a fixed rate mortgage:</strong></p>
<ul class="arrow">
    <li>They are extremely easy to understand, very good for first time   buyers that are not familiar with mortgages or any of the language that a   loan officer may be using.</li>
    <li>Budgeting is very easy to figure out.  This is also great for first   time buyers or people who are new to maintaining a budget.  Since your   monthly payment will not change, you will always know how to budget it   in.</li>
    <li>Your mortgage payment will be consistent no matter what.  Even if   there is a surge or crash in the economy, you can be sure that your   mortgage payment will not change.  With a fixed rate, there are no   surprises.</li>
</ul>
<p>
  <strong>Benefits of an adjustable rate mortgage:</strong></p>
<ul class="arrow">
    <li>These loans are easy to begin with.  The rates are often much   lower in the beginning and begin to rise over time.  Since rates are   lower, payments are also lower.</li>
    <li>People are able to buy homes that they normally wouldn't be able to.    Adjustable rates allow loan officers to quality people at a lower rate   which will directly affect what they will be able to afford on paper.</li>
    <li>Give buyers financial freedom when there are lower interest rates   available.  If the current rates are lowered, the amount that is paid on   the loan for that particular period is also lower.</li>
    <li>Money can be saved during lower rate periods to prepare for the   times when the rates are higher.  Often times it evens out to around the   same amount when you figure an average between lower and higher rates.</li>
</ul>
<p>
  <strong>Disadvantages of fixed rate mortgages:</strong></p>
<ul class="arrow">
    <li>Can be too expensive for many buyers especially if your area has higher rates or rates that are harder to obtain.</li>
    <li>Homeowners cannot take advantage of falling rates unless they   refinance their home.  This process can take a long time, be somewhat   costly and very frustrating to homeowners.</li>
    <li>Fixed rate mortgages can often not be customized to the individual   home buyer.  Most lenders opt to sell the mortgages to a secondary   lender that does not allow the home to be financed on an individual   basis.  Having a second party loan holder can be beneficial for some   home buyers but can also make it hard to find everything you need in a   mortgage.</li>
</ul>
<p>
  <strong>Disadvantages of adjustable rate mortgages:</strong></p>
<ul class="arrow">
    <li>Rates can fluctuate greatly.  They have been shown to increase as much as 5% in the short span of only 3 years.</li>
    <li>An adjustable rate can be very hard for home owners to understand.    Lenders are able to customize and individualize mortgage options for   specific homeowners and this can create a lot of language that buyers   don't understand and end up getting them into financial peril.</li>
    <li>Since rates can change quickly, it is hard to estimate what monthly   payments will be.  The rate could jump as much as twice after the   closing of the mortgage which can be a very big shock when it comes to   monthly payments.</li>
</ul>
<h2>What Mortgage Rates are Based On</h2>
<p>
  Mortgage rates are something that fluctuate greatly depending on the   economy and other issues that are happening within the specific   location.  Many lenders are able to figure out which way mortgage rates   are headed with the use of an important tool called a mortgage rate   index.  The index rate is often a formula that determines the amount of   interest rates through a certain period.  It consists of an index value   along with a margin.  The index value is what is consistently changing   depending on the market while the margin is generally the constant in   the equation that does not change no matter what is going on within the   economy. </p>
<p>
  The information that is contained in these mortgage indexes enable   buyers and lenders to predict what the rates are going to be for a   specified period of time.  The shorter the period of time that the rates   are being projected for, the more accurate the rate estimation and the   index will be.  Using this tool is a great way for lenders to begin   advertising lower rates as well for buyers to know that there are lower   payments coming.</p>
<p>
  A mortgage index is often exclusive to home owners who have an   adjustable rate mortgage.  The adjustable rate changes as the index   does.  If the index value dips or soars, the rates and payments that   home owners are paying will often increase or decrease depending on what   the index has done.  If mortgage rates are increasing, lenders will often not be very   interested in advertising the rates as it will occasionally deter buyers   from wanting to begin a mortgage at that time.  It is important for all   buyers that have used an adjustable rate mortgage remember that their   rates are greatly influenced by the index value.</p>
<p>
  Because of the various issues with an index value and the greatly   varying rates that accompany it, many buyers choose to open a fixed rate   mortgage.  This type allows them to never have to worry about the index   value of mortgages or having a fluctuating payment.  Fixed rate   mortgages allow the homeowner to have a fixed payment that will remain   steady and constant no matter what the economy or the mortgage index   value is doing.  For this reason, many buyers believe that fixed rate   mortgages are better. While fixed rate 30-year mortgages are fixed for 30-years, their rates tend to be based off of some spread above the 10-year U.S. Treasury bond, as homeowners tend to move roughly ever 5 to 7 years &amp; tying yield to the 10-year Treasury yield matches duration risk.</p>
<p>
  When you are choosing an adjustable rate mortgage, one of the most   important factors to work out between you and your lender is your margin   rate.  This is the rate that will remain steady while the index value   changes depending on outside factors.  It is important to find a lender   that will be able to work with you on the margin rate and choose one   that offers a fair marginal rate.  Work with your lender to determine   what a good margin is to work with.  Most times, lenders will have   information concerning the upcoming index values which will better help   you determine what a margin rate is that will work for you. ARMs are often tied to tracking moves in LIBOR.</p>
<p>
  While all of this information may seem very confusing to a new home   buyer or one who is not experienced with mortgage terminology, it is   important to remember that margin rates and other things that lenders do   are only there to help you find the most affordable and doable option   for your future home.  A fair and legitimate lender will be able to   spell all of their terminology out for you and let you know exactly how   your adjustable rate mortgage will work.  They will also be able to   explain to you what an index value is as well as what the index trends   have been.</p>
<h2>Long Term vs Short Term Mortgage</h2>
<p>
  When you are deciding on your mortgage, you will probably come across   the question of whether you want a long term (30 years) or short term   (15 years) mortgage.  Both of these options can be appealing for   different reasons and to different financial situations.  Long term   mortgages will often have a lower monthly payment, but you may end up   paying more in interest.  Short term mortgage payments are higher and   the interest does not build up as much on these types of mortgages.  It   is important to find out all of the information you can on interest   rates, term agreements and any other stipulations to both of these   mortgages before you make your final decision on which one is better for   your family. Both long term and short term mortgages <a href="http://www.realtor.com/home-finance/mortgages/basics-pros-and-cons-of-fixed-rate-mortgage-1.aspx">have advantages and   disadvantages</a> that could directly affect which one you decide is best   for yourself and your family.</p>
<p>
  <strong>Advantages of a long term mortgage:</strong></p>
<ul class="arrow">
    <li>Monthly payments are often lower than short term because the interest rates are spread out over a 30 year period.</li>
    <li>The mortgage has more interest.  This may seem like a bad thing to   some buyers, but smart buyers will know that payments made on strictly   interest can be deducted when it comes time to do taxes for the year.</li>
    <li>These lower monthly payments will be able to help homeowners with   other expenses or to make more investments that could potentially yield   more money than the amount that would be poured into the home with a   short term mortgage.</li>
</ul>
<p>
  <strong>Advantages of a short term mortgage:</strong></p>
<ul class="arrow">
    <li>Homeowners that opt for a short term- or 15 year- mortgage are   often offered lower interest rates by the lender.  This is an incentive   for getting buyers to go with a mortgage that is quicker to pay off. </li>
    <li>The short term mortgage allows borrowers to build greater amounts of   equity because their mortgage term is spread over a period of 15 years   as opposed to 30 years.  This is a great way to improve credit and   financial standing.</li>
    <li>The interest bills on short term mortgages can be up to 50% less   than the interest that is paid on a long term mortgage over the life of   the entire loan.  Short term mortgages are great for people who do not   want to "throw away" money with interest.</li>
</ul>
<p>
  <strong>Disadvantages of a long term mortgage:</strong></p>
<ul class="arrow">
    <li>Equity that is built over the term of the mortgage takes a very   long time because the life of the loan is much longer than that of a   short term mortgage.</li>
    <li>Equity, especially in the first few years, is built at a very slow   rate if at all because most of the payments are made toward the interest   of the loan.</li>
    <li>The interest bill on the loan is much higher.  While this can be   considered good for tax purposes it is also a disadvantage because a lot   of your money goes to interest only.</li>
    <li>Interest rates are much higher than the rates on a short term mortgage.</li>
</ul>
<p>
  <strong>Disadvantages of a short term mortgage:</strong></p>
<ul class="arrow">
    <li>The actual monthly payments on these loans can be around double   of what they would be on a 30 year mortgage.  This is because buyers   have a shorter amount off time to pay off the mortgage, making it higher   and occasionally more difficult to pay off.</li>
    <li>Short term mortgages often restrict borrowers to what they can buy.    They may need to decide on a smaller house to be able to afford a   larger monthly payment.  In contrast, long term mortgages often allow   buyers to purchase a larger or more expensive house because the amount   is spread out over 30 years and the payments are much lower.</li>
</ul>
<h2>Preparing Your Finances to Buy a Home</h2>
<p>
  Most potential home buyers know that <a href="http://samwrealestate.com/7-ways-you-can-prepare-your-finances-to-buy-a-home/">there is a lot involved in the   process of home buying</a>.  They should understand that past financial   records along with consumer reports and credit scores will be   scrutinized by lenders and other loan officers.  It is also important   for people who are trying to buy a home to prepare for their home buying   experience ahead of time.  This will ensure that even years before,   their financial records are in good standing and look good to banks   which will show their responsibility and ability to pay off any future   mortgages.  The following are some ways to be ready to buy your home   confidently.
</p>
<ul class="arrow">
    <li>Make sure that you know exactly how much you can afford.    Knowing this before you attempt to purchase a home or even apply for a   mortgage will help you be prepared as possible.  Decide what your budget   is and use a hypothetical situation to determine the amount you would   be able to afford.  Do your research and find out what current and   projected future interest rates are to help you determine better.</li>
    <li>Keep your credit in good standing.  In the years leading up to   purchasing a home, make sure that you are consistently improving your   score.  Make all of your monthly payments on time and do not accrue too   much debt at once.  Be sure that you can handle all of your monthly   payments before getting into a new obligation.  Keeping your credit   score as high as possible during your entire adult life is one of the   best ways to successfully obtain a mortgage.</li>
    <li>Starting months before you apply for your mortgage, do not open any   new lines of credit apply for any new lines of credit.  Opening more   credit and having hard inquires on your credit score can directly impact   your number.  Having recently opened accounts or many different   inquires about your credit score can greatly increase your potential   interest rates and occasionally prevent you from getting a mortgage at   all.  Save all of your large credit purchases for after you obtain your   mortgage and close on the house or simply pay cash for the majority of   your major purchases.</li>
    <li>Eliminate debt before attempting to obtain a mortgage.  Most of the   people who are living in the United States do carry some sort of debt   around with them.  Whether it is in the form of school loans or large   limit credit cards, it is important to consistently be paying on all of   these debts.  While it may not reasonable to completely get rid of all   of your debt, it is important to reduce it.  Begin by getting rid of any   credit cards you do not absolutely need and try to consolidate some of   your monthly payments.  It is also very important that you pay more than   the monthly minimum on any of your charges or payments.  This will show   potential lenders that you put more effort into your debts than what is   required of you.</li>
    <li>Show lenders that you are prepared by having all of your bank   accounts and other resources in order before you apply for the mortgage.    You should have a monthly breakdown of all of your expenses and all of   your resources before you even begin thinking about a mortgage.  Have   proof of these resources when you visit a lender in the form of bank   statements, pay stubs and even employer or bank staff letters.</li>
    <li>Having a pre approved loan is a great way to be confident in your   mortgage preparation.  Visit a lender before you decide to actually   begin a mortgage and have the institution pre approve you for the   mortgage.  This will increase your chances for better interest rates and   will often help speed up the entire process.</li>
</ul>
<h2>All About Affording Your Mortgage</h2>
<p>
  Everyone's financial situation is different.  Some people are able to   afford a lot of money on a mortgage payment while others are not able to   afford very much.  If your credit is good, you have been approved for a   mortgage and you have a secure job you should be able to make the   mortgage payment that the lender has suggested to you.  This is a   generalized assumption and should not be taken as a rule or as the only   thing you take into consideration.  To be sure that you can afford a   specific loan make sure that you're payments are a fair balance of   interest and principal, your monthly payments are not more than 1/3 of   your monthly income, you have done your research and found out different   loan rates from different companies and that you are not in danger of   losing any resources within the foreseeable future. </p>
<p>
  A good example of an affordable mortgage is one that has a fair balance   between the principal and the interest.  The principal is the original   amount that you financed while the interest is the amount you have   accrued over the term of the loan.  While your first few years of   payments will generally be exclusively on interest- depending on whether   you have a fixed or adjustable rate or a 15 year or 30 year mortgage-   the payments should not always be interest.  While you are paying on the   interest charges, the loan should also allow you to slowly chip away at   the principal amount and build equity on the home.  This, in essence,   is a very fair loan.</p>
<p>
  Most lenders, along with other companies that allow you to finance or   pay off a loan, will require you to have a certain income.  Different   companies use different methods for determining the income requirements   of their borrowers depending on their company's specific policies.    While every company is different it can be assumed that 1/3 of your   income is a good amount to be paying for a mortgage.  Even if your   lender does not require this, it is something that you should seriously   consider.  This way of figuring out affordability allows you to use 1/3   of your income towards mortgage, 1/3 towards other bills and 1/3 towards   expenses and savings.</p>
<p>
  At their core, lenders are essentially sales people.  They will make a   mortgage payment or interest rates sound very good to you without   backing it up or informing you of all the disadvantages.  Before you   attempt to obtain a mortgage, make sure you do as much research as   possible.  Once you have researched and found what good rates are in   your area, visit several different lenders and get an idea of the   different things they offer in their mortgages and interest rates.    Doing this will allow you to compare and contrast all of the pros and   cons to each company's mortgage options before you make the final   decision on what mortgage company you will be choosing.</p>
<p>
  Sometimes when a person gets a new job or a great raise, they suddenly   think they are able to afford a lot more than what they are able to.    This causes them to live above their means, end up in debt and   potentially lose everything if their resources suddenly become   unavailable.  Before you open a mortgage, or any type of loan, be sure   that your monthly payments are something you will be able to manage in   the long run, not just for now.  It is also important before obtaining a   mortgage, to completely secure your place of employment.  This may mean   creating a contract or signing documents that legally bind you to the   employer.  While it may seem like a difficult decision to do, it will   help you be able to make your monthly payments on your mortgage.</p>
<h2>How Often You Move and Your Mortgage</h2>
 <p> Moving is something that happens to most Americans at least once in   their lifetime.  Whether it is due to a job, financial distress or other   reasons the average American citizen will move <a href="http://www.census.gov/prod/2001pubs/p20-538.pdf">once every 5 years</a>.    This means that throughout the life of a short term mortgage- 15   years, an average American will move 3 times.  The average will move 6   times during the life of a 30 year long term mortgage.  These moves   could have different impacts and consequences on the amount of interest   and the different rates you are paying for your mortgage due to   different locations and different economies.  An important face to   consider when opening a mortgage is your ability or inability to move   throughout the term of the mortgage.  A mortgage is essentially a loan   and should be treated as such when you are thinking of moving or   changing homes.  Be sure that you sell your home for a fair amount that   you can pay onto your mortgage, make sure you are not upgrading to a   home you do not need and if you are moving out of state or to a   different location in your state, find out their mortgage rates and   different economies before you make the move. </p>
<p>
  Depending on the real estate market and different economic aspects,   selling your home right when you want to may not be a good idea.  It is   important to find out what kind of market you are trying to sell in to   ensure that you get a fair price for your home.  If you have done   upgrades or improvements to your home, you should generally get back   what you paid for it- you will not do this if the market is not right.    If you absolutely need to sell your home at the specified time, make   sure that the buyer is offering you a fair price and one that you will   be able to pay towards your existing mortgage before adding to it with a   new home.  Often, when you sell your home, you will not be able to pay   all of the mortgage including interest.</p>
<p>
  For whatever psychological reasons, people believe that they need bigger   homes.  It is important to be practical when considering upgrading your   home.  Make sure you ask yourself questions such as "do I really need   this extra room?" "how much will I use the pool outside?" and "am I   going to be able to afford this home for the next 15 or 20 years?"  Take   time to consider the upgrade and judge if you really need it.  It is a   fact that many people who upgrade their home, actually lose money   because of the mortgage payments and interest rates even if they have   gotten back their principal amount from selling.  Before you sell your   home to upgrade, consider other options like renovating or improving the   home that you are already living in.  This can often be more affordable   than upgrading to an entirely new home.</p>
<p>
  If you have decided that you absolutely need a new home in a new area,   make sure that the area is one that is affordable to you.  This can   sometimes be unavoidable for people who are relocating because of a job,   but can often be avoidable with different options that your employer   supplies for relocation.  The area you are moving to should have   interest rates and other mortgage fees that are similar to your original   area.  This will ensure that your interest rates and monthly payments   will not greatly increase just because you have moved to a new location.    To be sure that you can afford the monthly payments, make sure that   the living costs in the area are the same or similar to your current   area.  This will allow you to continue living like you had been, even if   you must relocate. </p>
<h2>Why You Should Buy a Home</h2>
<p>
  Many different lending companies offer different incentives and perks   for buying a home with them.  These incentives can include lower   interest rates, decreased monthly payments and even free gifts.  While   these incentives are often helpful, they are generally lender specific.    Aside from the lender incentives, there are many different <a href="http://online.wsj.com/article/SB10001424052748703376504575492023471133674.html">incentives   that come with owning your own home</a> that do not require you to go with a   specific lender or company to get your mortgage.  The following 10   points are incentives for owning your own home: </p>
<ul class="arrow">
    <li>You do not have to worry about reporting to a landlord or following   rules that you do not agree with.  The only rules you must abide by are   laws and rules that have been set forth by your lender (which are often   few to none).  You can paint your walls any color you like and own a pet   without having to pay a deposit on it.</li>
    <li>You can choose from what you like.  Often times areas are very   limited in what is available to rent.  With home ownership, you can take   your time and find a home that really suits your personality and your   needs.  There is a lot of variety in almost all parts of the United   States when it comes to owning your own home.</li>
    <li>Getting a good deal is every home buyers dream.  It is important to   remember, though, that buying a home is a good deal in and of itself.    This means that you would pay far less for a mortgage than you would to   rent the home for the number of years that your mortgage term is.</li>
    <li>Buying a home allows you to save money.  It may be more expensive   for you to buy your home at the beginning, but in the long run it will   pay off.  A home is an investment that you will be able to sell once you   have paid for it.  It can earn you a lot of money when you take   inflation and market values into consideration.</li>
    <li>At the current time, interest rates are at the lowest they've been   in a long time.  This is a fact that is true for most areas.  Choosing   to buy a home when rates are good will allow you to get a very cheap   mortgage with great terms and rates.  Speak with a financial expert to   find out when is the perfect time to open your mortgage.</li>
    <li>Buying a home can actually help you if the economy starts to   improve.  When the economy goes up, so does real estate value and   different aspects of the real estate market.  When the real estate   market improves, if you have taken care of your home and done necessary   upgrades, you can potentially sell it for up to three times what you   paid for it.</li>
    <li>Having something that is their own is very important to many   Americans.  Owning a home is one of the ultimate American dreams and it   can be something you will call your own as long as you continue to pay   your mortgage and keep the home in good condition.  A home that you can   call your own is a great way to take pride in what you do and how you   live.</li>
    <li>With home ownership, you can protect yourself somewhat from   inflation.  Studies have shown that inflation is often beat by a few   points in the housing market.  This means, for you, that you will have a   sound investment even if the inflation prices continue to fluctuate in   the coming years no matter what your principal on your home originally   was.</li>
    <li>Many homeowners chose to purchase the home they are currently in   just because of tax reasons.  Home ownership costs can be deducted from   yearly taxes and can often help with the amount of taxes that has to be   paid.  Recently, the government has offered tax credits to people that   purchased or built a new home.</li>
    <li>It is often hard to find a very nice rental that suits all of your   needs.  Most areas have a lot of limits when it comes to the rentals   that are available and you may not be able to find one with everything   that you need.  Sometimes these rentals are not the best places to live   because of previous tenants or landlords who do not care.  Even if you   purchase a used home, the majority of homes that are for sale are   considerably better than homes that are available as rentals.</li>
</ul>
<h2>There Are Some Risks to Owning a Home</h2>
<p>
  After reading about all of the great benefits and incentives to owning a   home, it can be hard for some people to believe that there could be   anything bad about owning a home.   For the most part, owning a home   comes with many rewards and very few risks but <a href="http://www.forbes.com/2010/04/06/buy-or-rent-a-home-entrepreneurs-finance-wharton.html">there are still risks   involved</a>.  Before purchasing a home or getting interested in the hype of   owning one and opening a mortgage, it is important to understand all of   the risks that come with owning your own home.  While the risks are   minimal, they can actually be very detrimental to your lifestyle and   your family.  The risks that are often associated with owning a home   include various things from costly repairs to repayment problems but all   the risks have the capability to cause you and your family a lot of   stress and hardship.  Risks that can accompany home ownership and   mortgages include:</p>
<ul class="arrow">
    <li><strong>Repairs:</strong> when you own your own home, you have to do all of your   home repairs yourself.  These can be very costly and often take a lot   of your time while they are sometimes not worth what you pay for them.    This differs from renting a home in that a landlord generally takes care   of all major- and sometimes minor- repairs.</li>
    <li><strong>Home Market Value:</strong> if the market continues to not do well and   completely crashes, it can be very difficult if not impossible to resell   your home.  Any person that invests money, takes the risk of having a   market crash or a market that continues to go downhill.</li>
    <li><strong>You Don't Own It:</strong> when you finance your home with a mortgage, you do   not actually own the home, the lender that you financed with does.    Your home ownership depends on your ability to repay the bank or lender   that you worked with.  The home is not completely yours until the   mortgage is completely paid off.</li>
    <li><strong>Your Income Isn't Guaranteed:</strong> especially in today's market and   difficult times, not every person is guaranteed a job.  You can get laid   off or fired as easily as the next person and this can gravely affect   your ability to repay.  When you mortgage a home, you risk not being   able to live in it if you are not able to pay for it.</li>
    <li><strong>Your Real Estate May Not Appreciate:</strong> most people believe that as   time goes on, their home will only increase in value.  This is true in   many different cases, but there are still some cases where homes have   significantly decreased in value as time went on.  Be sure that you are   getting a home during a time when homes are increasing and not   decreasing.</li>
    <li><strong>Not Many Moving Opportunities:</strong> when you are mortgaging a home or   purchasing a home that is financed, there is often not many options for   you to move or relocate.  This means that, for the most part, you must   stay in the same home for the life of the mortgage, whether 15 or 30   years.  You do have the option to move but you will likely lose money   have to endure a lot of hassle.</li>
    <li><strong>Interest:</strong> when you purchase a home using a mortgage, the majority of   what you pay is actually interest.  Especially in the beginning, you   will pay very little to no money on the principal of the home.  This is a   bad idea for people who do not enjoy throwing money away towards   interest or other things they will not get benefits out of.</li>
    <li><strong>Homeowner's Insurance:</strong> when you rent a home, you have the option of   obtaining renter's insurance.  It is not a necessity.  Homeowner's   insurance is a necessity.  It will be able to cover you if anything out   of your control happens to the home and will protect you from having to   pay exorbitant amounts.  The downside to homeowner's insurance is the   premiums.  You may pay thousands of dollars per year for the insurance   when you might not ever even have to use it.</li>
    <li><strong>You're Your Own Landlord:</strong> with rentals, landlords take care of   keeping their homes up to code and enforcing their tenants to obey by   certain city and town laws.  When you own your own home, you do not have   anyone to help enforce you to do these things and you may become   completely irresponsible and disregard laws.  This can put you at risk   for fines, losing rights to your home and &mdash; in some extreme cases &mdash; getting arrested because of your home.</li>
 </ul>
<p>When you rent you are still paying many of the above costs, but you pay for them indirectly through your rent payments. If you calculate a home purchase without considering those other incremental expenses then it is easy to under-estimate the true cost of the mortgage.</p>
<h2>Facts About Home Ownership</h2>
<ul class="arrow">
    <li>Rent payments can often be as high, if not higher than a monthly   mortgage payment.  This is true especially if you live in an area where   more people rent than buy.  It is important to do research in your area   to find out if you are paying more by renting your house than you would   owning your own home.</li>
    <li>The government will actually pay you for purchasing a home.    Especially in the last few years, there have been tax credit   opportunities to people who purchased a home at some point throughout   the year that they are filing taxes in.</li>
    <li>Having a down payment will give you a good start with your home.    This down payment will go toward equity, which is the portion of the   home that you actually own separate from the bank.  Even if your down   payment seems small to you, it can actually make a big difference in   your mortgage payments and the amount of equity you have.</li>
    <li>Getting pre approved is one of the fastest ways to get yourself on   track to home ownership.  Even if you are not 100% sure that you want to   purchase a home right at that time, pre approval will be able to tell   you what you can afford in a home and give you a better idea of what   your mortgage will be.</li>
    <li>Property taxes can be one of the biggest expenses that homeowners   incur.  Like any other type of tax, a property tax is unavoidable for   homeowners.  This extra tax may come as a surprise to first time   homeowners because in a rental situation all of the property tax is   taken care of by the landlord (that may be the reason for your   outrageously high rental costs!)</li>
    <li>Interest is tax deductible.  While you cannot write your home off on   your taxes completely you can write off the interest you pay on your   mortgage.  Be sure to keep detailed records and ask your lender for an   itemized statement that shows exactly how much of your mortgage payment   goes to interest and how much goes towards your principal.</li>
    <li>You can achieve one of the top American dreams.  This means that you   could eventually own a home that is completely yours while you do not   have to a landlord or any other person that is controlling you.</li>
</ul>


 
 
 
 
 
 
 
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

