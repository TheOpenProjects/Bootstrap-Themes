<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Basic Mortgage Calculator With Taxes &amp; PMI</title>
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

   var Vprincipal = sn(document.calc.principal.value);
   var VintRate = sn(document.calc.intRate.value);
   var VnumYears = sn(document.calc.numYears.value);

   if(Vprincipal == 0) {
   } else
   if(VintRate == 0) {
   } else
   if(VnumYears == 0) {
   } else {

      var VannualTax = sn(document.calc.annualTax.value);
      var VmonthlyTax =0;
      VmonthlyTax = VannualTax / 12;
      VmonthlyTax *= 100;
      VmonthlyTax = Math.round(VmonthlyTax);
      VmonthlyTax /= 100;

      var VannualInsurance = sn(document.calc.annualInsurance.value);
      var VmonthlyInsurance = 0;
      VmonthlyInsurance = VannualInsurance / 12;
      VmonthlyInsurance *= 100;
      VmonthlyInsurance = Math.round(VmonthlyInsurance);
      VmonthlyInsurance /= 100;

      var VmonthlyPMI = sn(document.calc.monthlyPMI.value) * Vprincipal / 1200;

      var VotherPmts = Number(VmonthlyTax) + Number(VmonthlyInsurance) + Number(VmonthlyPMI);

      var VnumPmts = VnumYears * 12;

      var VpmtAmt = computeMonthlyPayment(Vprincipal, VnumPmts, VintRate);
      var VtotalMtgPmt = Number(VpmtAmt) + Number(VotherPmts);

      document.calc.monthlyPI.value = fns(VpmtAmt,2,1,1,1);
      document.calc.otherPmts.value = fns(VotherPmts,2,1,1,1);
      document.calc.monthlyPmt.value = fns(VtotalMtgPmt,2,1,1,1);

   }

}



function monthlyAmortSched(form) {

   var Vprincipal = sn(document.calc.principal.value);
   var VintRate = sn(document.calc.intRate.value);
   var VnumYears = sn(document.calc.numYears.value);

   if(Vprincipal == 0) {
   } else
   if(VintRate == 0) {
   } else
   if(VnumYears == 0) {
   } else {

      var VannualTax = sn(document.calc.annualTax.value);
      var VmonthlyTax =0;
      VmonthlyTax = VannualTax / 12;
      VmonthlyTax *= 100;
      VmonthlyTax = Math.round(VmonthlyTax);
      VmonthlyTax /= 100;

      var VannualInsurance = sn(document.calc.annualInsurance.value);
      var VmonthlyInsurance = 0;
      VmonthlyInsurance = VannualInsurance / 12;
      VmonthlyInsurance *= 100;
      VmonthlyInsurance = Math.round(VmonthlyInsurance);
      VmonthlyInsurance /= 100;

      var VmonthlyPMI = sn(document.calc.monthlyPMI.value) * Vprincipal / 1200;

      var VotherPmts = Number(VmonthlyTax) + Number(VmonthlyInsurance) + Number(VmonthlyPMI);

      var VnumPmts = VnumYears * 12;

      var pmtAmt = computeMonthlyPayment(Vprincipal, VnumPmts, VintRate);
      var VtotalMtgPmt = Number(pmtAmt) + Number(VotherPmts);

      var prin = Vprincipal;
      var Vint = VintRate;
      if(Vint >= 1) {
         Vint /= 100;
         }
      Vint /= 12;

      var nPer = VnumPmts;
      var intPort = 0;
      var accumInt = 0;
      var prinPort = 0;
      var accumPrin = 0;
      var count = 0;
      var pmtRow = "";
      var pmtNum = 0;

      var today = new Date();
      var dayFactor = today.getTime();
      var pmtDay = today.getDate();
      if(pmtDay > 28) {
         pmtDay = 28;
      }
      var loanMM = today.getMonth() + 1;
      var pmtMonth = loanMM;
      var loanYY = today.getFullYear();
      if(loanYY < 1900) {
         loanYY += 1900;
      }
      var pmtYear = loanYY;

      var loanDate = (loanMM + "/" + pmtDay + "/" + loanYY);
      var pmtDate = 0;
      var displayPmtAmt = 0;
      var accumYearPrin = 0;
      var accumYearInt = 0;

      while(count < nPer) {

         if(count < (nPer - 1)) {

            intPort = prin * Vint;
            intPort *= 100;
            intPort = Math.round(intPort);
            intPort /= 100;

            accumInt = Number(accumInt) + Number(intPort);
            accumYearInt = Number(accumYearInt) + Number(intPort);

            prinPort = Number(pmtAmt) - Number(intPort);
            prinPort *= 100;
            prinPort = Math.round(prinPort);
            prinPort /= 100;

            accumPrin = Number(accumPrin) + Number(prinPort);
            accumYearPrin = Number(accumYearPrin) + Number(prinPort);

            prin = Number(prin) - Number(prinPort);

            displayPmtAmt = Number(prinPort) + Number(intPort);

         } else {

            intPort = prin * Vint;
            intPort *= 100;
            intPort = Math.round(intPort);
            intPort /= 100;

            accumInt = Number(accumInt) + Number(intPort);
            accumYearInt = Number(accumYearInt) + Number(intPort);

            prinPort = prin;

            accumPrin = Number(accumPrin) + Number(prinPort);
            accumYearPrin = Number(accumYearPrin) + Number(prinPort);

            prin = 0;

            //pmtAmt = Number(intPort) + Number(prinPort);
            displayPmtAmt = Number(prinPort) + Number(intPort);
         }

         count = Number(count) + Number(1);

         pmtNum = Number(pmtNum) + Number(1);

         pmtMonth = pmtMonth + 1;

         if(pmtMonth > 12) {
            pmtMonth = 1;
            pmtYear += 1;
         }




         pmtString = (pmtMonth + "/" + pmtDay + "/" + pmtYear);

         pmtRow += "<tr><td align='right'><font face='arial'><small>" + pmtNum + "</small>";
         pmtRow += "</td><td align='right'><font face='arial'><small>" + pmtString + "</small>";
         pmtRow += "</td><td align='right'><font face='arial'>";
         pmtRow += "<small>" + fns(prinPort,2,1,1,1) + "</small></td>";
         pmtRow += "<td align='right'><font face='arial'>";
         pmtRow += "<small>" + fns(intPort,2,1,1,1) + "</small></td>";
         pmtRow += "<td align='right'><font face='arial'>";
         pmtRow += "<small>" + fns(displayPmtAmt,2,1,1,1) + "</small></td>";
         pmtRow += "<td align='right'><font face='arial'>";
         pmtRow += "<small>" + fns(prin,2,1,1,1) + "</small></td></tr>";

         if(pmtMonth == 12 || count == nPer) {

            pmtRow += "<tr bgcolor='#dddddd'><td align='right'><font face='arial'><small>Total</small>";
            pmtRow += "</td><td align='right'><font face='arial'><small>" + pmtYear + "</small>";
            pmtRow += "</td><td align='right'><font face='arial'>";
            pmtRow += "<small>" + fns(accumYearPrin,2,1,1,1) + "</small></td>";
            pmtRow += "<td align='right'><font face='arial'>";
            pmtRow += "<small>" + fns(accumYearInt,2,1,1,1) + "</small></td>";
            pmtRow += "<td align='right'><font face='arial'><small> </small></td>";
            pmtRow += "<td align='right'><font face='arial'><small> </small></td></tr>";

            accumYearPrin = 0;
            accumYearInt = 0;

         }

         if(count > 600) {
         alert("Using your current entries you will never pay off this loan.");
            break;
         } else {
            continue;
         }

      }

      var part1 = "<html><head><title>Amortization Schedule</title></head>";
      part1 += "<b";
      part1 += "od";
      part1 += "y bgcolor= '#FFFFFF'>";
      part1 += "<br /><br /><center><font face='arial'><big><strong>";
      part1 += "Amortization Schedule</strong></big></center>";

      var part2 = "<center><table border=1 cellpadding=2 cellspacing=0><tr>";
      part2 += "<td colspan=6><font face='arial'><small><strong>Loan ";
      part2 += "Date: " + loanDate + "<br />Principal: " + fns(Vprincipal,2,1,1,1) + "<br />";
      part2 += "# of Payments: " + nPer + "<br />Interest Rate: " + fns(VintRate,3,0,2,1) + "";
      part2 += "<br />Payment: " + fns(pmtAmt,2,1,1,1) + "</strong></small></td></tr>";
      part2 += "<tr><td colspan=6><center><font face='arial'><strong>Schedule of Payments</strong>";
      part2 += "<br /><font face='arial'><small><small>Please allow for slight ";
      part2 += "rounding differences.</small></small></center></td></tr>";
      part2 += "<tr bgcolor='silver'><td align='center'><font face='arial'><small>";
      part2 += "<strong>Pmt #</strong></small></td><td align='center'><font face='arial'>";
      part2 += "<small><strong>Date</strong></small></td><td align='center'>";
      part2 += "<font face='arial'><small><strong>Principal</strong></small></td>";
      part2 += "<td align='center'><font face='arial'><small><strong>Interest</strong></small>";
      part2 += "</td><td align='center'><font face='arial'><small><strong>Payment</strong>";
      part2 += "</small></td><td align='center'><font face='arial'><small>";
      part2 += "<strong>Balance</strong></small></td></tr>";

      var totalPmts = Number(accumPrin) + Number(accumInt);

      var part4 = "<tr><td colspan='2'><font face='arial'><small><strong>Grand Total</strong>";
      part4 += "</small></td><td align='right'><font face='arial'><small>";
      part4 += "<strong>" + fns(accumPrin,2,1,1,1) + "</strong></small></td>";
      part4 += "<td align='right'><font face='arial'><small>";
      part4 += "<strong>" + fns(accumInt,2,1,1,1) + "</strong></small></td>";
      part4 += "<td><font face='arial'><small>";
      part4 += "<strong>" + fns(totalPmts,2,1,1,1) + "</strong></small></td>";
      part4 += "<td> </td></tr></table><br /><center><form method='post'>";
      part4 += "<input type='button' value='Close Window' onClick='window.close()'>";
      part4 += "</form></center></body></html>";

      var schedule = (part1 + "" + part2 + "" + pmtRow + "" + part4 + "");

      reportWin = window.open("","","width=500,height=400,toolbar=yes,menubar=yes,scrollbars=yes");
      reportWin.document.write(schedule);
      reportWin.document.close();

   }

}

function help(help_id,txt) {

   var help_cell = document.getElementById("help_" + help_id + "");
   help_cell.innerHTML = "<font face='arial'><small>" + txt + "</small>";

   for(var i = 1; i<3; i++) {

      if(i != help_id) {

         var clear_cell = document.getElementById("help_" + i + "");
         clear_cell.innerHTML = "";
      }
   }

}


function clear_results(form) {


   document.calc.monthlyPI.value = "";
   document.calc.otherPmts.value = "";
   document.calc.monthlyPmt.value = "";

}

function reset_calc(form) {

   var help_cell_1 = document.getElementById("help_1");
   help_cell_1.innerHTML = "";

   var help_cell_2 = document.getElementById("help_2");
   help_cell_2.innerHTML = "";

   document.calc.reset();

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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/amortization-calc.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				<div class="main-heading"><h1>Simple Amoritization Payment Calculator</h1>
</div>
                    <ul id="breadcrumbs">
                        <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
                        <li><a href="https://www.mortgagecalculator.biz/c/term-comparison.php">Compare Loans</a></li>
                        <li>Explanation Calculator</li>
                    </ul>
                </div>
                <div class="bottom-section">
       <p><img src="https://www.mortgagecalculator.biz/img/house-in-hands.jpg" alt="house" width="130" class="alignright" />          This free online calculator will compute a mortgage's monthly payment amount based on the principal amount borrowed, the length of the loan (term) and the annual interest rate (APR). </p>
                <p>This calculator will also compute your total monthly mortgage payment which will include your property tax, property insurance and PMI payments. Then, once you have computed the monthly payment, click on the "Create Amortization Schedule" button to create a report you can print out to look at your home loan repayment information.
                </p>

   				<div class="table-block">

<form name="calc" method="post" action="#">
 <table>
 <tbody>
 <tr>
 <td>
 Mortgage loan amount:
 </td>
 <td align="center">
 <input name="principal" type="number" step="any" onFocus="if (this.value==this.defaultValue) this.value = '';help(1,'ENTER: The total amount you would be borrowing to purchase the home.')" onKeyUp="clear_results(this.form);computeForm(this.form)" value="250000" size="15" onblur="if (this.value=='') this.value = this.defaultValue"/>
 </td>
 <td align="center">
 <strong>Explain/Instruct</strong>
 </td>
 </tr>

 <tr>
 <td>
 <a href="#viewrates"><strong>Annual interest rate</strong></a> (APR):
 </td>
 <td align="center">
 <input name="intRate" type="number" step="any" onFocus="if (this.value==this.defaultValue) this.value = '';help(1,'ENTER: The annual interest rate you expect to pay on this mortgage (e.g. enter 6% as 6).')" onKeyUp="clear_results(this.form);computeForm(this.form)" value="5.5" size="15" onblur="if (this.value=='') this.value = this.defaultValue"/>
 </td>
 <td rowspan="5" width="125" align="center" valign="top">

 <div id="help_1" style="width: 120px; text-align: left;">
 </div>

 </td>
 </tr>

 <tr>
 <td>
 Mortgage loan term (years):
 </td>
 <td align="center">
 <input name="numYears" type="number" step="any" onFocus="if (this.value==this.defaultValue) this.value = '';help(1,'ENTER: The number of years you will be financing the home loan for.')" onKeyUp="clear_results(this.form);computeForm(this.form)" value="30" size="15" onblur="if (this.value=='') this.value = this.defaultValue"/>
 </td>
 </tr>

 <tr>
 <td>
 Annual real estate taxes:
 </td>
 <td align="center">
 <input name="annualTax" type="number" step="any" onFocus="if (this.value==this.defaultValue) this.value = '';help(1,'The annual property tax payment you expect to pay.')" onKeyUp="clear_results(this.form);computeForm(this.form)" value="2600" size="15" onblur="if (this.value=='') this.value = this.defaultValue"/>
 </td>
 </tr>

 <tr>
 <td>
 Annual homeowners insurance:
 </td>
 <td align="center">
 <input name="annualInsurance" type="number" step="any" onFocus="if (this.value==this.defaultValue) this.value = '';help(1,'ENTER: The annual homeowner insurance payment you expect to pay. As a rule of thumb, you can expect to pay 1.5% (home price X .015) of the purchase price per year.')" onKeyUp="clear_results(this.form);computeForm(this.form)" value="1200" size="15" onblur="if (this.value=='') this.value = this.defaultValue"/>
 </td>
 </tr>

 <tr>
 <td>
 Private Mortgage Insurance (PMI):
 </td>
 <td align="center">
 <input name="monthlyPMI" type="number" step="any" onFocus="if (this.value==this.defaultValue) this.value = '';help(1,'ENTER: The Private Mortgage Insurance (PMI) rate you expect to pay. If your downpayment is less than 20% of the value of the home you are buying, you may be required to pay mortgage insurance of somewhere between 0.3% and 1.2% your principal balance each year.')" onKeyUp="clear_results(this.form);computeForm(this.form)" value="0.5" size="15" onblur="if (this.value=='') this.value = this.defaultValue"/>
 </td>
 </tr>
 <tr>
 <td colspan='3' align="center">
 <input type="button" name="compute" value="Compute Mortgage Payment" class="table-btn" onClick="computeForm(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 
 Monthly Principal and Interest Payment:
 
 </td>
 <td align="center">
 <input type="text" name="monthlyPI" size="15" onFocus="help(2,'RESULT: This how much your monthly principal and interest payment will be.')" />
 </td>
 <td align="center">
 <strong>Explain/Instruct</strong>
 </td>
 </tr>

 <tr>
 <td>
 
 Monthly Taxes, Insurance and PMI payment:
 
 </td>
 <td align="center">
 <input type="text" name="otherPmts" size="15" onFocus="help(2,'RESULT: This is the total of your other monthly payments (taxes, insurance & PMI).')" />
 </td>
 <td rowspan="2" width="125" align="center" valign="top">

 <div id="help_2" style="width: 120px; text-align: left;">
 </div>

 </td>
 </tr>

 <tr>
 <td>
 
 Total monthly mortgage payment:
 
 </td>
 <td align="center">
 <input type="text" name="monthlyPmt" size="15" onFocus="help(2,'RESULT: This the total of all monthly payments related to your mortgage.')" />
 </td>
 </tr>

 <tr>
 <td colspan='2' align="center">
 <input type="button" name="compute" class="table-btn" value="Create P&I Amortization Schedule" onClick="computeForm(this.form);monthlyAmortSched(this.form)" /> 
 </td>
 <td colspan='1' align="center">
 <input type="button" value="Reset" class="table-btn" onClick="reset_calc(this.form)" />
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


<p>&nbsp;</p>
<p><img src="../img/man-at-bank.png" width="1250" height="1369" alt="Man at Bank." /></p>
<p>&nbsp;</p>
 
 <h2>Things You Need to Know about Buying Your First Home</h2>
<p> So, you've finally gotten to the point where you're deciding whether   to rent or buy a home.  Truth is, both renting and buying have their   advantages.  Then again, they both have disadvantages too.  Over the   past decade or so, home ownership rates have dropped, but fortunately   for you, this has made purchasing a home very affordable.  Renting a   home just doesn't make financial-sense anymore.  Let's take a close look   at <a href="http://www.sellingcolumbiasc.com/rent-vs-buying/">ten excellent reasons</a> that will make you want to buy a home instead of throwing your money away every month renting one. </p>
<p><strong>Reason 1. You Get to Choose Your Updates</strong></p>
<p>When renting a home, you most likely aren't going to be able to carry   out updates to your residence.  Instead, you will have to get them   approved through your landlord first, and even after making them, once   you decide to move from the home, you don't get to take your investments   with you.  If you purchase a home, however, you can do all the updates   that you want, such as updating your appliances to those that are   energy-efficient; this can save you hundreds of dollars each year on   your utility bills.  And better yet, if you ever go to sell your home,   you will earn a pretty penny back on the updating-investments that you   made. </p>
<p><strong>Reason 2. Personalizing Your Space</strong></p>
<p>Do you want a fireplace in your living room?  If so, you better plan on   buying a home rather than renting one.  Landlords most times don't allow   for you to customize their properties to your specifications.  The best   way to go about doing this is to buy your own home.  How about   decorating your home with pictures?  Believe it or not, there are many   landlords who don't allow for pictures to be hung on the walls.  If you   are looking to personalize your living space, you should consider buying   rather than renting. </p>
<p><strong>Reason 3. Saving Money</strong></p>
<p>If you move around from one rented home to another, chances are you are   wasting lots of money on furniture pieces that fit into each home.  You   can save money by buying a house and purchasing only a few pieces of   furniture that fit well into the home.  This also goes for rugs and   other types of home-decor. </p>
<p><strong>Reason 4. Making a Smart Investment</strong></p>
<p>If you choose to rent, you are more likely to squander away some of your   hard-earned money.  When buying a home, your money will go towards a   monthly mortgage payment and any investments that you want to make into   the home.  In doing this, you are literally investing in your future   because your home will be with you as long as you choose not to go   delinquent on payments.  If you choose to sell your home, you will make   back the most of the money that you invested.</p>
<p><strong>Reason 5. Acquiring Extra Income</strong></p>
<p>If you choose to buy a house that has living quarters over a garage, you   can turn this space into a rental property.  In doing this, you can   earn yourself some extra money, possibly even enough to pay for more   than half of your monthly mortgage payment.  For example, if your   monthly payment is $725 and you rent your rental space for $375 a month,   all you have to come up with is $350 a month to make your payment. </p>
<p><strong>Reason 6. Don't Worry about Getting Kicked Out</strong></p>
<p>If you don't rent, then you won't have a landlord, meaning you don't run   the risk of getting get kicked out.  You in fact are your own landlord   when buying a home.  Only thing you have to worry about is making your   payments to your mortgage lender.  Worrying about things like if your   landlord is going to sell the property or rent to someone else is no   longer a factor when buying your own home. </p>
<p><strong>Reason 7. You Don't Have to Wait Around on a Landlord</strong></p>
<p>When renting, if something breaks down, it often takes a long time to   get it fixed.  When buying a home, if something breaks, it only takes as   long as you want for it to get fixed.  From a broken dishwasher to a   central heating and air unit that is in need of repairs, you control   when the appliances get fixed.  Better yet, you also control who fixes   them, allowing you to rest assured your repairs will be carried out by   someone you can trust. </p>
<p><strong>Reason 8. Resting Against a Fixed Mortgage</strong></p>
<p>In today's economy, it seems everything goes up in price due to   inflation.  Thankfully, if you buy a home with a fixed mortgage loan,   you don't have to worry about your mortgage payments going up--ever!    Instead, you can rest assured your payments will always stay the same,   which allows you to better prepare for the future because you will be   able to create a realistic and accurate budget. </p>
<p><strong>Reason 9. Enjoy Tax Deductions</strong></p>
<p>When it comes to tax benefits, home ownership definitely has its   advantages.  From deducting mortgage interest payments to earning money   back on the funds invested into energy-efficient appliances, owning a   home has a wide variety of ways in which tax benefits can be enjoyed.</p>
<p><strong>Reason 10. Tapping Into Equity</strong></p>
<p>If you choose to rent a home, you won't build up for yourself any type   of equity.  When purchasing a home, however, as soon as you make your   first payment, you will be well on your way to building up equity.    Having equity in your home can prove beneficial for a number of reasons,   with the more common being you can tap into the money to pay for home   improvements, children's college expenses and much more. </p>
<h3>Determining Local Real Estate Market Conditions</h3>
<p>Now that you've made the decision to buy a home rather than rent one, you need to understand how to <a href="http://homeguides.sfgate.com/determine-real-estate-market-price-1462.html">determine local real estate market conditions</a>.    Sure, a real estate agent can help you do this, but of course this   service will come with a fee.  By following some very simple steps, you   can be well on your way to saving a penny or two by determining local   real estate market conditions yourself.  Keep in mind, the real estate   market is one that fluctuates on a daily basis.  Just because you come   to the conclusion you can buy a house for a certain price this week does   not at all mean the same price will stick around next week. </p>
<p><strong>Step 1. Look For Similar Homes in the Same Area</strong></p>
<p>To get the most realistic price of a home, you need to compare it to   other homes that were sold in the past six months that had similar   square footage and are in the same or similar neighborhood.  The best   way to go about finding such homes is to do a quick Internet search. </p>
<p><strong>Step 2. Narrow Down the List</strong></p>
<p>Once you have found at least five sold properties, narrow down the list   to three homes that are most-similar to the home you are wanting to   purchase.  An ideal property that is of similarity will be within 200   square feet when it comes to overall square footage, it will be built in   almost the same year as the home you are wanting to buy, and it will   have the same number of bedrooms and bathrooms. </p>
<p><strong>Step 3. Start Doing the Math</strong></p>
<p>Now it's time to start doing the math.  If there are any significant   differences between your potential property and the ones you are   comparing it to, then you need to add or deduct the differences.  For   example, if you found a home that is almost exactly like the one you are   interested in and it sold for $200,000, yet the one you want to buy has   a swimming pool, then you need to deduct at least $20,000 from the   selling price, leaving its actual comparable price right at $180,000.    Do this to all three properties if applicable. </p>
<p><strong>Step 4. Keep Doing the Math</strong></p>
<p>After you get a final price for all three properties, add them together   and divide by three; the number that you end up with will determine your   estimated real estate market price for the home you are interested in.    For example, say the three totals were $180,000, $200,000 and $175,000.    After adding them up and dividing by three, you end up with a final   estimated real estate market price of $185,000 for the property you want   to buy.  Keeping this in mind, if the home you want to buy has an   asking price of more than $185,000, you should be able to talk the   seller down considerably because the local market conditions call for   it. </p>
<p><strong>Tip:</strong> When carrying out Step 3, take note that some   amenities won't actually raise the value of a home.  For example, a   swimming pool may or may not add value to a home.  In fact, in some   communities it will raise its value by $20,000 or more, while in others,   it will only decrease the value by the same amount. </p>
<h3>Preparing to Buy a Home</h3>
<p>You can never start too early to buy your first home.  In fact, as early   as high school is a great time to start.  So, how does a high schooler   start preparing to buy a home.  Well, for starters, if the parents allow   it, having a cell phone in his or her name and making on time payments   can be a great way to boost his or her credit score.  But, what about   you?  Are you already out of high school?  If so, don't fret.  You can   still <a href="http://www.moneyunder30.com/prepare-buy-first-home">start preparing to buy a home</a> too.  No matter your age, keep in mind, the best time to start   preparing is today.  Let's take an in-depth look at the things you can   do to adequately prepare yourself for purchasing your first house. </p>
<p><strong>Preparation Tip 1. Understanding Mortgage Rates</strong></p>
<p>When it comes to buying a home, you need to realize that there are   several types of mortgage loans for you to obtain.  The two most common   include adjustable rate mortgages and fixed mortgages.  Adjustable rate   mortgages often appeal to home buyers because they start out with   extremely low payments; however, over time, the payments increase.    Unfortunately, if you don't adequately prepare yourself financially,   when the bigger payments come around, you may have to end up foreclosing   on your home.  On the other hand, if you obtain a fixed rate mortgage,   you don't have to worry about your payments going up or down.  Instead,   you can rest assured your payments will stay the same throughout the   life of the loan. </p>
<p><strong>Preparation Tip 2. Have Patience</strong></p>
<p>Purchasing a home is huge investment.  You should never rush through the   process.  You most definitely should not feel pressured by a real   estate agent or broker to make a purchase.  Instead, take your time, and   never feel like you have to make purchase just because mortgage rates   are low. </p>
<p><strong>Preparation Tip 3. Know How Much You Can Afford</strong></p>
<p>If you don't know how much you can afford, you won't have a realistic   idea as to the home that you should purchase.  To effectively determine   how much you can afford, you need to sit down and develop a budget,   including all expenses that you are paying.  Furthermore, you need to   make sure that your sources of income are steady, meaning if there is a   good chance you won't keep your job for the next ten to thirty years,   don't count your income as steady.  Also, once you determine how much   you can afford, it's best to deduct ten to twenty thousand dollars off   of this amount.  For example, if you determine you can afford a $160,000   mortgage loan set up on a 20 year repayment schedule, don't spend more   than $140,000 on a house just to be on the safe side. </p>
<p><strong>Preparation Tip 4. Think About Condos</strong></p>
<p>Remember, buying a home doesn't always mean you have to buy an actual   home.  Condos have many advantages, including not having to worry about   yard work and much more. </p>
<p><strong>Preparation Tip 5. Get Your Credit in Shape</strong></p>
<p>Without decent credit, you probably won't qualify for a home loan; this   doesn't mean your credit score has to be 800 or above, but you most   likely will need a credit score of 620 or higher.  If you have a   cosigner, make sure his or her credit is also good.  When it comes to   getting your credit in good shape, you can never start too early.  With   less than decent credit, you need to prepare yourself for the fact that   it will take at least one to five years to get it in good shape. </p>
<p><strong>Preparation Tip 6. Save for a Down Payment</strong> </p>
<p>Your credit score will play a large role in the type of down payment   that you will need to have to qualify for a mortgage loan.  Of course   with a higher credit score, the lower the down payment will have to be.    With a great credit score, you may even luck out without having to put   any money down.  Nonetheless, a down payment is advantageous because you   won't have to pay interest on it.  Generally, your down payment should   be somewhere around six months worth of the mortgage payments that you   will be making.  For example, if your monthly payments are to be $650,   you should have a down payment of $3,900. </p>
<p><strong>Preparation Tip 7. Get Pre-Approved</strong></p>
<p>Before you go about shopping for your dream home, you need to get   pre-approved for a mortgage loan.  In doing this, you can determine the   amount of money that you will have to spend on a home, which will narrow   down your list of potential homes to buy.  When you go to get   pre-approved, check with two or more lenders so that you can obtain the   best rate possible. </p>
<h3>Knowing When Your Ready to Buy Your First Home</h3>
<p>There are several things you can look at to know whether or not you are ready to buy your first home.  Such things include:</p>
<ul class="arrow">
  <li>
    <strong> Sticking to a realistic budget:</strong> You will need good   money-management skills to buy a first home, and sticking to a realistic   budget is a sure-sign these skills are being mastered. </li>
  <li><strong> Emergency savings fund:</strong> If your emergency fund is   close to being empty, you may not be adequately prepared to buy a home.    You need to remember that your emergency fund should not be used to   make your home's down payment either.  Instead, this account should be   used for emergencies only. </li>
  <li><strong> No debt collector calls:</strong> If you have debt collectors   calling you on a regular basis, this is a good sign you aren't ready to   buy your first home.  Instead, you need to communicate with the   collectors, setting up your debts to be paid off in under a year's time   if possible.  After doing so, then continue on your road to purchasing a   house. </li>
  <li><strong> You want added responsibility:</strong> Owning your own home   comes with a lot of responsibility, including taking care of your own   lawn, paying for repairs and more.  If you aren't willing to do this,   you should consider whether or not it is best for you to be your own   landlord. </li>
</ul>
<h3>Factors to Consider When Purchasing a Home</h3>
<p>You've found the perfect home.  Its got more than the perfect price, and   it even has more room than you thought you could afford.  That's great,   but don't make the purchase just yet.  Instead, there are eight <a href="http://www.realtor.com/home-finance/mortgages/before-buying-home.aspx">things you need to consider</a> before closing the deal. </p>
<p><strong>Consideration 1. How's the Traffic?</strong></p>
<p>You need to visit your dream home several times throughout the day to   get an idea of how traffic is.  Sure, traffic may seem OK at 8:30 in the   morning, but what about three o'clock in the afternoon when you little   one is getting off the school bus.  Or, perhaps traffic is heavy at six   in the morning, right about the time you need to leave for work.  If so,   this could mean you have to leave for work an hour early every morning.    This type of traffic could be a deal breaker. </p>
<p><strong>Consideration 2. What's the Local Newspapers Reporting?</strong></p>
<p>Chances are, the sellers of your dream home aren't going to tell you   about any negatives the community suffers through.  For example, if   there are high levels of contaminants coming in through the water   system, the sellers are likely to leave this tid-bit of information out.    You need to check out local newspaper reports to determine whether   your dream home is actually a home of your dreams or a nightmare. </p>
<p><strong>Consideration 3. What Do the Neighbors Have to Say?</strong></p>
<p>The neighbors should play a big part in whether or not you want to buy a   particular home.  If you don't get along with your neighbors, this can   lead to huge problems.  So, how do you go about determining whether the   neighbors are good or not?  It's simple.  You talk to them.  After a few   quick conversations with them, you should be able to tell whether or   not you will enjoy living next door to them. </p>
<p><strong>Consideration 4. Does the Home Pass an Inspection?</strong></p>
<p>Even the best homes have their defects.  To identify these defects, it   is important to carry out a home inspection.  Although this type of   inspection can be quite costly, it is best to spend $500 on an   inspection than $250,000 on a home that falls apart after you buy it.    Plus, by identifying any defects, you can use this to your advantage   when it comes to negotiating the price of the home with the seller. </p>
<p><strong>Consideration 5. Are there Receipts?</strong> </p>
<p>If the sellers tell you about home improvements that they have carried   out, ask for receipts.  In doing this, you can identify the materials   that were used to complete the projects.  For example, if a seller   informs you that he or she just painted the exterior of the home, and   the paint receipt reflects a cheap type of paint, this may be a   sure-sign that you will be painting the home soon if you choose to buy   it. </p>
<p><strong>Consideration 6. Ask for Utility Bill Receipts</strong></p>
<p>If you are on a tight budget, your utility bills will play a large role   in your purchasing decision.  When you speak with the home's seller, ask   for the past six month's utility bill receipts.  If he or she doesn't   have them on hand, its simple to get them from the local utility   offices.  It is very important that you look into the utility costs of   owning your dream home.  If you don't, you very well may end up   purchasing a home that has higher energy expenses than your actual   mortgage payment. </p>
<p><strong>Consideration 7. What Do the Taxes Look Like?</strong></p>
<p>Another important factor to consider when buying your first home is the   taxes.  You very well may be able to afford a home's accompanying   mortgage payments, but can you afford the taxes?  If you are purchasing a   home in a community that uses local property taxes to fund its schools,   you may well plan on your taxes increasing year after year. </p>
<p><strong>Consideration 8. What Does the Home's Surroundings Include?</strong></p>
<p>Your home's surroundings are a large factor in whether or not you will   be happy.  If you want to live close to a park, you will of course want   to purchase a home that sits near a park.  If you have children, you   will want to consider your home's school zone as this will determine   where your children will go to school.  Other important things to look   for include nearby airports and railroads.  It would be bad for you to   move into your new home only to be woke up at two o'clock in the morning   to realize you live right beside a noisy railroad. </p>
<h3>Qualifying for a Mortgage Loan</h3>
<p><img src="../img/show-me-the-money.jpg" width="630" height="288" alt="Show Me The Money." /> </p>
<p>There are many factors that will determine your <a href="http://www.homeloanlearningcenter.com/mortgagebasics/qualifyingforamortgage.htm">eligibility to qualify for a mortgage loan</a>.    First of all, your household income and expenses will play a large   role.  If you have more money going out than you do coming in, this is   sure sign you won't qualify for a mortgage.  On the other hand, with   more money coming in and a good credit score, it is usually pretty   simple to acquire a mortgage loan.  One aspect that will determine the   rate you will qualify for is the downpayment that you can put towards   your purchase.  The higher the down payment, the lower your loan's   interest rate will be.  Your employment history will also affect your   ability to qualify for a good rate.  If you have several years of   employment under your belt, this will of course be very advantageous. </p>
<p>When it comes to your credit score, this is the main factor that will   decide your ability to obtain a mortgage loan.  Things that affect your   credit include:</p>
<ul class="arrow">
  <li>
    Bankruptcies in the past seven to ten years</li>
  <li> Credit card payments</li>
  <li> Excessive monthly debts</li>
</ul>
<p><strong>Using a Mortgage Calculator</strong></p>
<p>The best way to determine your monthly mortgage payment amount will be   to use a mortgage calculator.  When using one, you will enter the buying   amount of the home, the down payment you can put down, the length of   the loan and the interest rate.  Once calculated, you will be able to   view your monthly mortgage amount.  For example, a $300,000, 30-year   loan with a $60,000 down payment and a 4.376 percent interest rate will   cost you about $1,565 a month. </p>
<h3>Choosing the Length of Your Mortgage</h3>
<p>If you are on a tight budget, you may not have the option to choose   between a 20- or 30-year mortgage.  On the other hand, however, if you   do have the option, you should most definitely take on a shorter   mortgage.  Let's take a look at a <a href="http://finance.townhall.com/columnists/rogerschlesinger/2013/04/08/ten-reasons-to-avoid-a-30-year-mortgage-n1560810/page/full">couple of reasons</a> a 20-year or less mortgage loan is better than a 30-year. </p>
<ul class="arrow">
  <li>
    <strong>Reason 1.</strong> You can pay off 90 percent of a 20-year fixed loan before you pay off even half of a 30-year loan. </li>
  <li><strong>Reason 2.</strong> A 30-year loan has a much higher interest   rate than a 20-year loan.  When compared to a 15-year loan, the 30-year   has an interest rate that is 3/4 percent higher. </li>
</ul>
<p>No matter how you look at it, a shorter-term loan is financially better   than a longer-term loan; however, if you can't afford a shorter-term   loan, a 30-year may be the only option you have. </p>
<h3>The Benefits of Home Ownership</h3>
<p>When it comes to home ownership, there are some <a href="http://fearlesshomebuyer.com/lesson/top-9-benefits-of-homeownership/">definite advantages</a> that you will gain.  Eight of the more important benefits gained include:</p>
<p><strong>Benefit 1. You Get to Call It Yours</strong></p>
<p>When you buy a home, you get to call it your own.  You can do whatever   you want to the property, including landscaping, changing the decor as   often as you like, painting the walls whatever colors you prefer and   lots more. </p>
<p><strong>Benefit 2. Your Payments Count Towards a Savings Investment</strong></p>
<p>As you make payments, you will be building up equity into your home;   this translates into a savings account for you that you can borrow   against if a necessary circumstance arises in which you need cash. </p>
<p><strong>Benefit 3. Improving Your Credit</strong></p>
<p>There's no better way to improve your credit other than owning your own   home.  With each payment that you make on time, your credit score will   improve. </p>
<p><strong>Benefit 4. Tax Write-Offs</strong></p>
<p>There are many tax write-offs that you can take advantage of when owning your own home.</p>
<p><strong>Benefit 5. Community</strong></p>
<p>When you and your neighbors own your own homes, in a sense all of you   actually own the community you live in; this will give you a great sense   of pride. </p>
<p><strong>Benefit 6. A Great Way to Budget</strong></p>
<p>By obtaining a fixed mortgage loan, you can budget your lifestyle around   your mortgage payment without having to worry about a housing payment   that fluctuates. </p>
<p><strong>Benefit 7. Increased Sense of Stability</strong></p>
<p>When you know that your home is yours, you gain a sense of stability   because you don't have to worry about getting kicked out by a landlord. </p>
<p><strong>Benefit 8. Money to Gain</strong></p>
<p>When you buy a home, you make a great investment.  Over the past 50   years, home have increased in value by more than five percent. </p>
<h3>Understanding the Costs of Owning a Home</h3>
<p>It is very important that you understand the <a href="http://financialplan.about.com/od/realestatemortgages/a/homebuyingfees.htm">costs of owning a home</a>,   as this will help in making sure you can actually afford to go about   the home purchasing process.  Some of the more common expenses involved   in owning a home include:</p>
<p><strong> Expense 1. Homeowner's Insurance</strong></p>
<p>Unless you pay cash for your home, you will have to have homeowner's   insurance.  Even if you do pay cash, it is still wise to buy insurance   because this financially protects your home and your belongings.  Most   times, before you can close on a home purchase, you will be required to   purchase an insurance policy. </p>
<p><strong> Expense 2. Appraisal Fees</strong></p>
<p>For tax purposes, you will need to obtain an appraisal on the home you are interested in purchasing. </p>
<p><strong>Expense 3. Credit Report Fees</strong></p>
<p>Many lenders will require you to pay credit report fees so that they can   view your credit, which will be used to determine your mortgage loan   eligibility. </p>
<p><strong> Expense 4. Survey Fee</strong></p>
<p>If your property has to be surveyed, you will have to pay for the associated costs. </p>
<p><strong> Expense 5. Property Taxes</strong></p>
<p>On a yearly basis, you will have to pay property taxes on your home.  If   the previous owner of the home paid such fees in advance, you may luck   out and not have to pay them for a year or so. </p>
<p>  <strong> Expense 6. Maintenance Fees</strong></p>
<p>Because you are the home owner, you will be responsible for maintenance   fees, which include taking care of the lawn, repairing broken   appliances, updating plumbing and more. </p>
<h3>Advantages of Making Extra Mortgage Payments</h3>
<p>By <a href="http://homeguides.sfgate.com/advantageous-making-extra-mortgage-payment-2244.html">making extra payments</a> early in your loan, you can save a considerable amount of money.  Extra   payments of course means your loan will paid off sooner than expected,   and more importantly, it means that you won't have to pay as much in   interest. </p>
<p>There is one thing to take into consideration, however, when considering   extra payments.  If you plan on staying in your home for less than 10   years and then selling it, then extra payments won't benefit you.  On   the other hand, if you plan on keeping the home, extra payments can get   you out of your loan in anywhere from 10 to two years quicker, and the   money you can save in interest will oftentimes be somewhere between   $10,000 to $100,000.  The exact amount of money that you will save will   of course depend on your loan amount and how many extra payments you   make. </p>
<p>If you decide you want to make an extra payment each year, consider   making bi-weekly payments.  In doing this, you will make 13 payments   instead of only 12; therefore, making an extra payment without ever   noticing it. </p>
<h3>The Home Buying Process</h3>
<p>Don't let purchasing a home intimidate you.  Although it is somewhat of a <a href="http://www.zillow.com/wikipages/The-Home-Buying-Process--Step-by-Step/">complex process</a>,   there are millions of people who purchase their first home each year,   and this year, one of them can be you.  To make the process as easy as   possible to understand, it can be divided into eight steps.  Let's take a   closer look.</p>
<p><strong>Step 1. Take a Look at Your Credit Report</strong></p>
<p>Since your credit report plays a large role in your ability to obtain a   mortgage loan, it makes complete sense that you will want to make sure   it has no errors.  If you do notice any errors, you need to make sure   you have them corrected as soon as you can.  One major thing to look for   includes debts that have been paid off but aren't reflected as so.    Remember, the higher your credit score, the better the loan you will   qualify for. </p>
<p><strong>Step 2. Take a Look at Your Income and Expenses</strong></p>
<p>There are many online calculators you can use to determine the type of   loan that you can afford.  Keep in mind, when it comes to calculating   your mortgage affordability, you need to take into consideration any   future expenses that you may encounter, including children's college   expenses. </p>
<p><strong>Step 3. Search for a Lender</strong></p>
<p>Shopping around for the right lender can be one of the most stressful   parts of buying a home.  You need to obtain your mortgage loan through a   lender that you are comfortable with.  Generally speaking, you should   speak with at least three to four lenders before you choose one. </p>
<p>After choosing one, get pre-approved.  Although a pre-approval isn't the   same as actually closing a deal on a home, it will at least give you a   ballpark figure of the loan you will be eligible to qualify for.  Also,   pre-approval speeds up the process once you are ready to make an offer   on a home. </p>
<p><strong>Step 4. Start Shopping Around for a Home</strong></p>
<p>Now that you have been pre-approved, it's time to start shopping for a   home.  Before you go about on a shopping spree, make sure you write down   your wants and needs.  Such things include the amount of square footage   that you want, the number of bedrooms and bathrooms that you need and   any locality specifications.  Once you have your wants-and-needs list   made out, you can then starting scouting the area for homes that meet   your specifications.  When you shop around, remember to be patient.    Sometimes, it takes quite some time to find a home that meets your   preferences. </p>
<p><strong>Step 5. Make an Offer</strong></p>
<p>Once you find the home of your dreams, and you will with time and   patience, it then becomes time to make an offer on the home.  Don't fret   about offering a price well below the asking price.  In fact, most   sellers price their homes with the expectations that they will sell it   for a lower amount.  A good place to start is a price that sits about   five percent lower than the asking price.  Also, don't fret if the   seller doesn't accept your offer.  Many times, he or she will come back   with some type of counter-offer.  If you can't agree on a price after   two or three offers, you may want to consider moving on to a different   home, but hopefully, you and the seller can come to some type of   reasonable price. </p>
<p><strong>Step 6. Deciding on a Mortgage</strong></p>
<p>Now that you and the seller have agreed on a buying price, you now need   to secure your mortgage loan.  Go back to the lender through which you   were pre-approved and tell your loan officer that you are ready to buy a   home.  The officer will ask the type of mortgage you are interested in;   either a fixed-rate or adjustable-rate.  Remember, the most   advantageous type of loan will be one that has a fixed-rate, especially   if you are looking to stay in the home for the entirety of the loan.  On   the other hand, if you are looking to sell the home within the first   few years after moving in, an adjustable-rate does have its advantages   because payment amounts will be rather low during the first one to five   years.  It is very important for you to choose the loan that suits you   and your lifestyle.  If not, you may end up acquiring a loan that puts   you in much financial stress. </p>
<p><strong>Step 7. Closing the Purchase</strong></p>
<p>Once you have a mortgage loan, it is now time to close on the purchase.    Sometimes, a closing date can be somewhat tricky to secure because you   may have to wait until your current rental agreement is up, or perhaps   the sellers of the home have to find a new home to buy.  Make sure you   understand any associated fees that are accompanied with the closing;   this will help in making sure that there are no surprises.  Some of the   more common closing costs fees include:</p>
<ul class="arrow">
  <li>
    Attorney fees</li>
  <li> Inspection fees</li>
  <li> Down payment</li>
  <li> Appraisal fees</li>
  <li> Title fees</li>
</ul>
<p><strong>Step 8. Your're Ready to Move In</strong></p>
<p>Now that you've closed the deal, it's time to move in.  You can now call   yourself a first-time home buyer.  If you prefer, you can have movers   transport all of your belongings to your new home, or if you want, you   can do all of the moving yourself.  It's completely up to you. </p>
 
                <div id="mortcalcbiz-endcontent"></div>

<div class="myFinance-widget" data-type="horizontal" data-campaign="mortcalcbiz-cru-eoc"></div>

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

