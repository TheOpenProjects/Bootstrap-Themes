<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Balloon Mortgage Calculator</title>		
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




function nominalToEffective(numPmtsPerYear, nominalRate) {

   myNominalRate = nominalRate;
   if(myNominalRate >= 1) {
      myNominalRate /= 100;
   }

   var myPeriodRate = myNominalRate / numPmtsPerYear;

   var myPeriodFact = Number(numPmtsPerYear) - Number(2);
   var myRateFact = Number(myPeriodRate) + Number(1);

   var myCount = 0;
   var myEffRate = myRateFact * myRateFact;

   while(myCount < myPeriodFact) {

      myEffRate = myEffRate * myRateFact;

      myCount = Number(myCount) + Number(1);
   }

   myEffRate = Number(myEffRate) - Number(1);

   return myEffRate;
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


function PVsingleAmt(f_fv, f_rate, f_npr) {

   var f_prin = f_fv;
   var f_i = f_rate;
   var f_count = 0;
   var f_factor = 1;
   
   f_i /= 100;
   f_i /= 12;
   var f_pow = Number(1) + Number(f_i);

   while(f_count < f_npr) {
     f_factor = f_factor * f_pow;
     f_count += 1;
   }

   f_prin = f_fv / f_factor;
   return f_prin;

}

function computeForm(form) {

   if(document.calc.principal.value == "" || document.calc.principal.value == 0) {
   } else
      if(document.calc.intRate.value == "" || document.calc.intRate.value == 0) {
   } else
      if(document.calc.numMonths.value == "" || document.calc.numMonths.value == 0) {
   } else {

      var Vprincipal = sn(document.calc.principal.value);

      var VintRate = sn(document.calc.intRate.value);

      var VnumMonths = sn(document.calc.numMonths.value)*12;
      var VnumPmts =  VnumMonths;
      
      var Vballoon = sn(document.calc.balloon.value);
      var VballoonPV = 0;
      var Vfinal_prin = Vprincipal;
      var Vballoon_int = 0;
      if(Vballoon > 0) {
         VballoonPV = PVsingleAmt(Vballoon, VintRate, VnumMonths);
         Vfinal_prin -= VballoonPV;
         Vballoon_int = Vballoon - VballoonPV;
      }
      
      var Vupfront = sn(document.calc.upfront.value);
      Vfinal_prin -= Vupfront;
      
      var Vfees = sn(document.calc.fees.value);
      if(document.calc.plus_fees.checked) {
         Vfinal_prin += Vfees;
      }

      var pmtAmt = computeMonthlyPayment(Vfinal_prin, VnumPmts, VintRate);
      document.calc.moPmt.value = fns(pmtAmt,2,1,1,1);
      
      var Vtotal_pmts = pmtAmt * VnumMonths;
      document.calc.total_pmts.value = fns(Vtotal_pmts,2,1,1,1);
      
      document.calc.upfront_out.value = fns(Vupfront,2,1,1,1);
      
      document.calc.balloon_out.value = fns(Vballoon,2,1,1,1);
      
      var Vtotal_paid = Vtotal_pmts + Vballoon + Vupfront;
      document.calc.total_paid.value = fns(Vtotal_paid,2,1,1,1);
      
      var Vinterest_cost = computeFixedInterestCost(Vfinal_prin, VintRate, pmtAmt);
      Vinterest_cost += Vballoon_int;
      document.calc.interest_cost.value = fns(Vinterest_cost,2,1,1,1);

      var Veff_rate = nominalToEffective(12, VintRate);
      document.calc.eff_rate.value = fns(Veff_rate*100,2,0,2,1);
   }
    
}


function createReport(form) {

   if(document.calc.principal.value == "" || document.calc.principal.value == 0) {
   } else
      if(document.calc.intRate.value == "" || document.calc.intRate.value == 0) {
   } else
      if(document.calc.numMonths.value == "" || document.calc.numMonths.value == 0) {
   } else {

      var Vprincipal = sn(document.calc.principal.value);
      var Vrep_prin = Vprincipal;

      var VintRate = sn(document.calc.intRate.value);

      var VnumMonths = sn(document.calc.numMonths.value)*12;
      var VnumPmts =  VnumMonths;
      
      var Vballoon = sn(document.calc.balloon.value);
      var VballoonPV = 0;
      var Vfinal_prin = Vprincipal;
      var Vballoon_int = 0;
      if(Vballoon > 0) {
         VballoonPV = PVsingleAmt(Vballoon, VintRate, VnumMonths);
         Vfinal_prin -= VballoonPV;
         Vballoon_int = Vballoon - VballoonPV;
      }
      
      var Vupfront = sn(document.calc.upfront.value);
      Vfinal_prin -= Vupfront;
      Vrep_prin -= Vupfront;
      
      var Vfees = sn(document.calc.fees.value);
      if(document.calc.plus_fees.checked) {
         Vfinal_prin += Vfees;
         Vrep_prin += Vfees;
      }
      
      var pmtAmt = computeMonthlyPayment(Vfinal_prin, VnumPmts, VintRate);

      var prin = Vfinal_prin;
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


      var Vmonth = Number(document.calc.month.selectedIndex) + Number(1);
      var Vday = Number(document.calc.day.selectedIndex) + Number(1);
      if(Vday > 28) {
         Vday = 28;
      }
      var Vyear = sn(document.calc.year.value);
	  var loanDate = (Vmonth + "/" + Vday + "/" + Vyear);

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

         Vmonth = Number(Vmonth) + Number(1);
         if(Vmonth == 13) {
            Vmonth = 1;
            Vyear = Number(Vyear) + Number(1);
         } else {
            Vmonth = Vmonth;
            Vyear = Vyear;
         }

         pmtString = (Vmonth + "/" + Vday + "/" + Vyear);

         pmtRow += "<tr><td style='border: 1px solid #eee; text-align: right'>" + pmtNum + "</td>";
         pmtRow += "<td style='border: 1px solid #eee; text-align: right'>" + pmtString + "</td>";
         pmtRow += "<td style='border: 1px solid #eee; text-align: right'>" + fns(prinPort,2,1,1,1) + "</td>";
         pmtRow += "<td style='border: 1px solid #eee; text-align: right'>" + fns(intPort,2,1,1,1) + "</td>";
         pmtRow += "<td style='border: 1px solid #eee; text-align: right'>" + fns(displayPmtAmt,2,1,1,1) + "</td>";
         pmtRow += "<td style='border: 1px solid #eee; text-align: right'>" + fns(prin,2,1,1,1) + "</td></tr>";
         
         if(count > 600) {
            alert("Using your current entries you will never pay off this loan.");
            break;
         } else {
            continue;
         }

      }

      var part1 = "<head><title>Amortization Schedule</title></head>";
      part1 += "<b";
      part1 += "od";
      part1 += "y bgcolor= '#FFFFFF'><br /><br /><center>";
      part1 += "<font face='arial'><big><strong>Amortization Schedule</strong></big></font></center>";


      var part2 = "<center><table style='border-collapse: collapse; width: 90%'>";
      part2 += "<tr><td colspan=6><font face='arial'><small><strong>Loan ";
      part2 += "Date: " + loanDate + "<br />Principal: " + fns(Vrep_prin,2,1,1) + "<br /># of ";
      part2 += "Payments: " + nPer + "<br />Interest Rate: " + fns(VintRate,2,1,2,1) + "<br />";
      part2 += "Monthly Payment: " + fns(pmtAmt,2,1,1,1) + "<br />";
      part2 += "Balloon Payment: " + fns(Vballoon,2,1,1,1) + "</strong></small></font></td>";
      part2 += "</tr><tr><td colspan=6 style='text-align: center;'><strong>Schedule of Payments<br />";
      part2 += "<small>Please allow for slight ";
      part2 += "rounding differences.</small></td></tr>";
      part2 += "<tr style='background-color: #ccc'>";
      part2 += "<td style='text-align: center; width: 10%;'><strong>Pmt #</strong></td>";
      part2 += "<td style='text-align: center; width: 15%;'><strong>Date</strong></td>";
      part2 += "<td style='text-align: center; width: 15%;'><strong>Principal</strong></td>";
      part2 += "<td style='text-align: center; width: 15%;'><strong>Interest</strong></td>";
      part2 += "<td style='text-align: center; width: 15%;'><strong>Payment</strong></td>";
      part2 += "<td style='text-align: center; width: 15%;'><strong>Balance</strong></td></tr>";

      var part3 = "" + pmtRow + "";
      var part4 = "";
      if(Vballoon > 0) {
         part4 += "<tr><td colspan='2' style='border: 1px solid #eee; text-align: right'><strong>Balloon</strong></td>";
         part4 += "<td style='border: 1px solid #eee; text-align: right'>" + fns(Vballoon,2,1,1,1) + "</td>";
         part4 += "<td style='border: 1px solid #eee; text-align: right'>------</small></font></td>";
         part4 += "<td style='border: 1px solid #eee; text-align: right'>" + fns(Vballoon,2,1,1,1) + "</td>";
         part4 += "<td style='border: 1px solid #eee; text-align: right'>" + fns(Vballoon,2,1,1,1) + "</td>";
         part4 += "</tr>";
      }
      part4 += "</table><br /><center><form method='post'>";
      part4 += "<input type='button' value='Close Window' onClick='window.close()'></form></center>";
      part4 += "</body></html>";

      var schedule = ("" + part1 + "" + part2 + "" + part3 + "" + part4 + "");

      reportWin = window.open("","","width=700,height=600,toolbar=yes,menubar=yes,scrollbars=yes");

      reportWin.document.write(schedule);

      reportWin.document.close();

   }

}

function clear_results(form) {

   document.calc.moPmt.value = "";
   document.calc.total_pmts.value = "";
   document.calc.upfront_out.value = "";
   document.calc.balloon_out.value = "";
   document.calc.total_paid.value = "";
   document.calc.interest_cost.value = "";
   document.calc.eff_rate.value = "";


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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/balloon.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				<div class="main-heading"><h1>Balloon Loan Calculator</h1>
</div>
                    <ul id="breadcrumbs">

                        <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
						<li><a href="https://www.mortgagecalculator.biz/c/loan.php">Loans</a></li> 
                        <li>Balloon</li> 
                  </ul>
                </div>
                <div class="bottom-section">

   				<div class="table-block">

<p>This calculator enables borrowers to quickly see their estimated monthly loan payments for a balloon loan, along with how much they will owe in a lump sum payment at the end of the loan term. A table listing <a href="#viewrates"><strong>current mortgage rates</strong></a> is displayed under the calculator.</p>
<form name="calc" method="post" action="#">
<table>
<tbody>
 <tr>
 <td>Amount Borrowed:</td>
 <td align="center">
 <input type="number" step="any" name="principal" size="15" value="500000" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td><a href="#viewrates"><strong>Annual Interest Rate</strong></a> (APR %)</td>
 <td align="center">
 <input type="number" step="any" name="intRate" size="15" value="8" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>Loan Term in Years</td>
 <td align="center">
 <input type="number" step="any" name="numMonths" size="15" value="10" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>


 <tr>
 <td>Date of First Payment: </td>
 <td align="center">
 <select name="month" id="month" size="1" onChange="clear_results(this.form);computeForm(this.form)">
 <option value = "1">January</option>
 <option value = "2">February</option>
 <option value = "3">March</option>
 <option value = "4">April</option>
 <option value = "5">May</option>
 <option value = "6">June</option>
 <option value = "7">July</option>
 <option value = "8">August</option>
 <option value = "9">September</option>
 <option value = "10">October</option>
 <option value = "11">November</option>
 <option value = "12">December</option>
 </select>
 <select name="day" id="day" size="1" onChange="clear_results(this.form);computeForm(this.form)">
 <option value = "1" selected> 1</option>
 <option value = "2"> 2</option>
 <option value = "3"> 3</option>
 <option value = "4"> 4</option>
 <option value = "5"> 5</option>
 <option value = "6"> 6</option>
 <option value = "7"> 7</option>
 <option value = "8"> 8</option>
 <option value = "9"> 9</option>
 <option value = "10"> 10</option>
 <option value = "11"> 11</option>
 <option value = "12"> 12</option>
 <option value = "13"> 13</option>
 <option value = "14"> 14</option>
 <option value = "15"> 15</option>
 <option value = "16"> 16</option>
 <option value = "17"> 17</option>
 <option value = "18"> 18</option>
 <option value = "19"> 19</option>
 <option value = "20"> 20</option>
 <option value = "21"> 21</option>
 <option value = "22"> 22</option>
 <option value = "23"> 23</option>
 <option value = "24"> 24</option>
 <option value = "25"> 25</option>
 <option value = "26"> 26</option>
 <option value = "27"> 27</option>
 <option value = "28"> 28</option>
 <option value = "29"> 29</option>
 <option value = "30"> 30</option>
 <option value = "31"> 31</option>
 </select>

 <input type="number" id="year" name="year" size="5" value="" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />

<script>
function getDate(){
   var todaydate = new Date();
   var day = todaydate.getDate();
   var month = todaydate.getMonth() + 1;
   var year = todaydate.getFullYear();
   var datestring = day + "/" + month + "/" + year;
   document.getElementById("day").value = day;
   document.getElementById("month").value = month;
   document.getElementById("year").value = year;
  } 
getDate(); 
</script>



 </td>
 </tr>

 <tr>
 <td>Optional Upfront Payment</td>
 <td align="center">
 <input type="number" step="any" name="upfront" size="15" value="0" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>Optional Loan Fees <input name="plus_fees" type="checkbox" onClick="clear_results(this.form);computeForm(this.form)" value="yes" checked="CHECKED" /> Add to loan?</td>
 <td align="center">
 <input type="text" name="fees" size="15" value="0" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>Optional Ending Balloon Payment</td>
 <td align="center">
 <input type="number" step="any" name="balloon" size="15" value="200000" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td align="center" colspan="2">
 <input type="button" value="Calculate" onClick="computeForm(this.form)" class="table-btn" />
 <input type="reset" value="Reset" class="table-btn"/>
 </td>
 </tr>

 <tr>
 <td>Monthly Payment Amount:</td>
 <td align="center">
 <input type="text" name="moPmt" size="15" />
 </td>
 </tr>

 <tr>
 <td>Total Monthly Payments:</td>
 <td align="center">
 <input type="text" name="total_pmts" size="15" />
 </td>
 </tr>

 <tr>
 <td>Paid Upfront:</td>
 <td align="center">

 <input type="text" name="upfront_out" size="15" />
 </td>
 </tr>

 <tr>
 <td>Balloon Payment Due at End:</td>
 <td align="center">
 <input type="text" name="balloon_out" size="15" />
 </td>
 </tr>

 <tr>
 <td>Total of All Payments:</td>
 <td align="center">
 <input type="text" name="total_paid" size="15" />
 </td>
 </tr>

 <tr>
 <td>Total interest cost:</td>
 <td align="center">
 <input type="text" name="interest_cost" size="15" />
 </td>
 </tr>

 <tr>
 <td>Effective APR:</td>
 <td align="center">
 <input type="text" name="eff_rate" size="15" />
 </td>
 </tr>


 <tr>
 <td align="center"colspan="2">
 <input type="button" value="Create Amortization Schedule" onClick="createReport(this.form)" class="table-btn"/>
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
<p><img src="../img/funding-business-growth.png" width="1250" height="1099" alt="Funding Business Growth."></p> 
<p>&nbsp;</p> 
    
    

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
