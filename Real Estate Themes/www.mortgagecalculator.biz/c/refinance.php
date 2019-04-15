<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Home Loan Consolidation Vs Mortgage Refinancing Calculator</title>		
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

   var VprincipalFirst = sn(document.calc.principalFirst.value);
   var prinFirst = sn(document.calc.principalFirst.value);
   var pmtFirst = sn(document.calc.paymentFirst.value);
   var iFirst = sn(document.calc.intRateFirst.value);

   var iTestFirst = iFirst / 100 / 12 * VprincipalFirst;

   var VprincipalSec = sn(document.calc.principalSec.value);
   var pmtSec = sn(document.calc.paymentSec.value);
   var prinSec = sn(document.calc.principalSec.value);
   var iSec = sn(document.calc.intRateSec.value);

   var iTestSec = iSec / 100 / 12 * VprincipalSec;

   var iRefin = sn(document.calc.intRateRefin.value);
   var VnperRefin = sn(document.calc.nperRefin.value);
   var closeCostPerc = sn(document.calc.closingCost.value);

   if(VprincipalFirst == 0) {
   } else
   if(pmtFirst == 0) {
   } else
   if(iFirst == 0) {
   } else
   if(iTestFirst > pmtFirst) {
   } else
   if(VprincipalSec > 0 && pmtSec == 0) {
   } else 
   if(VprincipalSec > 0 && iSec == 0) {
   } else
   if(VprincipalSec > 0 && iTestSec > pmtSec) {
   } else
   if(iRefin == 0) {
   } else
   if(VnperRefin == 0) {
   } else
   if(closeCostPerc == 0) {
   } else {


      var VprinCombo = Number(VprincipalFirst) + Number(VprincipalSec);
      var closeCostAmt = 0;
      var numMtgs = 1;
      if(VprincipalSec > 0) {
         numMtgs = 2;
      }

      if(document.calc.ptsDol.selectedIndex == 0) {
         // if(closeCostPerc >= 1) {
         closeCostPerc = closeCostPerc / 100;
      // } else {
      //    closeCostPerc = closeCostPerc;
      // }
    closeCostAmt = closeCostPerc * VprinCombo;
      } else {
         closeCostAmt = sn(document.calc.closingCost.value);
      }

      //CALCULATE FIRST MORTGAGE
      var intPortFirst = 0;
      var prinPortFirst = 0;
      var accumIntFirst = 0;
      var accumPrinFirst = 0;

      if (iFirst >= 1.0) {
         iFirst = iFirst / 100.0;
         var sumiFirst = iFirst;
      }
      var iFirst  = iFirst  / 12;

      var countFirst = 0;

      while(prinFirst > 0) {
         intPortFirst = prinFirst * iFirst;
         prinPortFirst = pmtFirst - intPortFirst;
         prinFirst = prinFirst - prinPortFirst;
         accumPrinFirst = accumPrinFirst + prinPortFirst;
         accumIntFirst = accumIntFirst + intPortFirst;

         countFirst = countFirst + 1;
         if(countFirst > 1200) {break; } else {continue; }
      }

      var VorigInt = accumIntFirst;

      //CALCULATE SECOND MORTGAGE IF APPLICABLE

      var intPortSec = 0;
      var prinPortSec = 0;
      var accumIntSec = 0;
      var accumPrinSec = 0;

      if(numMtgs == 2) {

         if (iSec >= 1.0) {
            iSec = iSec / 100.0;
            var sumiSec = iSec;
         }
         var iSec  = iSec  / 12;

         var countSec = 0;

         while(prinSec > 0) {
            intPortSec = prinSec * iSec;
            prinPortSec = pmtSec - intPortSec;
            prinSec = prinSec - prinPortSec;
            accumPrinSec = accumPrinSec + prinPortSec;
            accumIntSec = accumIntSec + intPortSec;

            countSec = countSec + 1;
            if(countSec > 1200) {break; } else {continue; }
         }

      }

      var VorigInt = Number(VorigInt) + Number(accumIntSec);

      document.calc.origInt.value = fns(VorigInt,2,1,1,1);
      //document.calc.origInt.value = fns(accumIntFirst,2,1,1,1);

      var VpaymentFirst = sn(document.calc.paymentFirst.value);
      var VpaymentSec = sn(document.calc.paymentSec.value);
      var VpmtCombo = Number(VpaymentFirst) + Number(VpaymentSec);

      //CALCULATE REFINANCING

      if (iRefin >= 1.0) {
         iRefin = iRefin / 100.0;
         var sumiRefin = iRefin;   
      }
      var iRefin  = iRefin  / 12;

      var prinRefin = 0;

      if(document.calc.yesNo.selectedIndex == 0) {
         prinRefin = VprinCombo;
      } else {
         prinRefin = Number(VprinCombo) + Number(closeCostAmt);
      }

      var pow = 1;

      for (var j = 0; j < VnperRefin *12; j++) {
         pow = pow * (1 + iRefin);
      }

      var pmtRefin = (prinRefin * pow * iRefin) / (pow - 1);

      document.calc.paymentRefin.value = fns(pmtRefin,2,1,1,1);

      var VmoSave = Number(VpmtCombo) - Number(pmtRefin);
      if(VmoSave < 0) {
         VmoSave = VmoSave * -1;
         document.calc.moSave.value = fns(VmoSave,2,1,1,1) + "";
      } else {
         document.calc.moSave.value = "(" + fns(VmoSave,2,1,1,1) + ")";
      }

      var VtotIntRefin = (pmtRefin * VnperRefin *12) - prinRefin;
      document.calc.totIntRefin.value = fns(VtotIntRefin,2,1,1,1);

      var VintSave = VorigInt - VtotIntRefin;
         if(VintSave <= 0) {
            document.calc.intSave.value = "$0.00";
         } else {
            document.calc.intSave.value = fns(VintSave,2,1,1,1);
         }

      //CALCULATE NUMBER OF MONTHS FOR SAVINGS TO OFFSET CLOSING COSTS

      var prinFirst2 = sn(document.calc.principalFirst.value);
      var prinSec2 = sn(document.calc.principalSec.value);
      var prinRefin2 = Number(VprincipalFirst) + Number(VprincipalSec);

      var intPortFirst2 = 0;
      var intPortSec2 = 0;
      var intPortRefin = 0;

      var prinPortFirst2 = 0;
      var prinPortSec2 = 0;
      var prinPortRefin2 = 0;

      var accumIntFirst2 = 0;
      var accumIntSec2 = 0;
      var accumIntRefin2 = 0;

      var accumPrinFirst2 = 0;
      var accumPrinSec2 = 0;
      var accumPrinRefin2 = 0;

      var amortIntSave = 0;

      var count3 = 0;

      while(amortIntSave < closeCostAmt) {

         intPortFirst2 = prinFirst2 * iFirst;
         intPortRefin2 = prinRefin2 * iRefin;

         prinPortFirst2 = pmtFirst - intPortFirst2;
         prinPortRefin2 = pmtRefin - intPortRefin2;

         prinFirst2 = prinFirst2 - prinPortFirst2;
         prinRefin2 = prinRefin2 - prinPortRefin2;

         accumPrinFirst2 = accumPrinFirst2 + prinPortFirst2;
         accumPrinRefin2 = accumPrinRefin2 + prinPortRefin2;

         accumIntFirst2 = accumIntFirst2 + intPortFirst2;
         accumIntCombo2 = accumIntFirst2 + accumIntSec2;

         //IF CONSOLIDATIING 2 MORTGAGES
         if(numMtgs == 2) {
            intPortSec2 = prinSec2 * iSec;
            prinPortSec2 = pmtSec - intPortSec2;
            prinSec2 = prinSec2 - prinPortSec2;
            accumPrinSec2 = accumPrinSec2 + prinPortSec2;
            accumIntSec2 = accumIntSec2 + intPortSec2;
         }

         accumIntRefin2 = accumIntRefin2 + intPortRefin2;


         amortIntSave = accumIntCombo2 - accumIntRefin2;

         count3 = count3 + 1;

         if(count3 > 600) {break; } else {continue; }

      }

      if(VintSave <= 0) {
         document.calc.closeMo.value = "N/A";
      } else {
         document.calc.closeMo.value = count3;
      }

      var fnetSave = Number(VintSave) - Number(closeCostAmt);

      var pmtUpDown = "";
      if(pmtRefin > VpmtCombo) {
         pmtUpDown = "increase by " + fns(Number(pmtRefin) - Number(VpmtCombo),2,1,1,1) + "";
      } else {
         pmtUpDown = "decrease by " + fns(Number(VpmtCombo) - Number(pmtRefin),2,1,1,1) + "";
      }

      var intSaveYesNo = "";
      if(VorigInt < VtotIntRefin) {
         intSaveYesNo = "pay an additional " + fns(Number(VtotIntRefin) - Number(VorigInt),2,1,1,1) + " in ";
         intSaveYesNo += "interest charges over the life of the mortgage.";
      } else {
         intSaveYesNo = "save " + fns(Number(VorigInt) - Number(VtotIntRefin),2,1,1,1) + " in interest ";
         intSaveYesNo += "charges over the life of the mortgage. However, in order for this refinancing to yield ";
         intSaveYesNo += "any savings at all you will need to stay in your current home for ";
         intSaveYesNo += "at least " + count3 + " months.  That's how long it will take for the monthly interest savings ";
         intSaveYesNo += "to offset the closing costs attributable to refinancing.";
      }

      if(fnetSave <= 0) {
         document.calc.netSave.value = "$0.00";
      } else {
         document.calc.netSave.value = fns(fnetSave,2,1,1,1);
      }

      var intOneDisplay = sn(document.calc.intRateFirst.value);
      var intTwoDisplay = sn(document.calc.intRateSec.value);
      var intThreeDisplay = sn(document.calc.intRateRefin.value);

      var secMtgText = "";
      if(numMtgs ==2) {
         secMtgText = " and your current " + fns(intTwoDisplay,3,0,2,1) + " mortgage";
      }

      var v_summary = "If you refinance your current " + fns(intOneDisplay,3,0,2,1) + " mortgage" + secMtgText + " into ";
      v_summary += "a single " + fns(intThreeDisplay,3,0,2,1) + " mortgage, your monthly payment ";
      v_summary += "will " + pmtUpDown + " and you will " + intSaveYesNo + "";

      var v_summary_cell = document.getElementById("summary");
      v_summary_cell.innerHTML = "<p>&nbsp;</p><blockquote><strong> " + v_summary + " </strong></blockquote>";
   }

}


function clear_results(form) {

   document.calc.origInt.value = "";
   document.calc.paymentRefin.value = "";
   document.calc.moSave.value = "";
   document.calc.totIntRefin.value = "";
   document.calc.intSave.value = "";
   document.calc.closeMo.value = "";
   document.calc.netSave.value = "";
 
}

function reset_calc(form) {

   var v_summary_cell = document.getElementById("summary");
   v_summary_cell.innerHTML = "";

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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/refinance.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				<div class="main-heading"><h1>Home Loan Consolidation vs Refinancing</h1>
</div>
                    <ul id="breadcrumbs">

                        <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
                        <li><a href="https://www.mortgagecalculator.biz/c/refinancing.php">Refinancing</a></li>
                        <li>Compare Consolidation vs Morgage Refinance</li>
                    </ul>
                </div>
                <div class="bottom-section">
<p><!-- pmms --> 
 This calculator will help you to decide whether or not it would be advantageous for you to refinance either a single mortgage, or the consolidation of a first and second mortgage, into a single mortgage. Not only will this calculator calculate the monthly payment and net interest savings (if applicable), but it will also calculate how many months it will take to break even on the closing costs (if applicable).              </p>
 
 <P>
 Note: Be sure to only include the principal and interest portion of your monthly mortgage payment, i.e., do not include any escrow portions (property taxes, insurance, etc.).</P>

<div class="table-block"> 
<form name="calc" method="post" action="#">
 <table>
 <tbody>

 <tr>
 <td colspan="2" align="center"><strong>First Mortgage</strong></td>
 </tr>

 <tr>
 <td>
 
 Enter the principal balance of your first mortgage ($):<br />
 <small>(call your mortgage lender and ask for the current payoff amount)</small>
 
 </td>
 <td align="center">
 <input name="principalFirst" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="200000" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>
 
 Enter the amount of your monthly mortgage payment ($):<br />
 <small>(principal and interest portion only)</small>
 
 </td>
 <td align="center">
 <input name="paymentFirst" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="1600" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>
 
 Enter your first mortgage's current interest rate (%):
 
 </td>
 <td align="center">
 <input name="intRateFirst" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="7" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td colspan="2" align="center"><strong>Second Mortgage (Optional)</strong></td>
 </tr>

 <tr>
 <td>
 
 Enter the principal balance of your second mortgage ($):<br />
 <small>(call your mortgage lender and ask for the current payoff amount)</small>
 
 </td>
 <td align="center">
 <input name="principalSec" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="50000" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>
 
 Enter the amount of your monthly mortgage payment ($):<br />
 <small>(principal and interest portion only)</small>
 
 </td>
 <td align="center">
 <input name="paymentSec" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="500" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>
 
 Enter your second mortgage's current interest rate (%):
 
 </td>
 <td align="center">
 <input name="intRateSec" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="8" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td colspan="2" align="center"><strong>Refinancing</strong></td>
 </tr>

 <tr>
 <td>
 
 Enter <a href="#viewrates"><strong>interest rate you will be refinancing at</strong></a> (%):
 
 </td>
 <td align="center">
 <input name="intRateRefin" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="5.5" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>
 
 Enter the number of years you will be refinancing for (#):
 
 </td>
 <td align="center">
 <input name="nperRefin" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="15" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>
 
 Enter the closing costs: <select name="ptsDol" size="1" onChange="clear_results(this.form);computeForm(this.form)" width="130" style="width: 130px">
 <option value="points">percentage points</option>
 <option value="dollar">dollar amount</option>
 </select>
 <small>(Typically, # of points is "2" or dollar amount is .02 times the principal)</small>
 
 </td>
 <td align="center">
 <input name="closingCost" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="2" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>
 
 Would you like to finance the closing costs?
 
 </td>
 <td align="center">
 <select name="yesNo" size="1" onChange="clear_results(this.form);computeForm(this.form)" width="130" style="width: 130px">
 <option value="No">No</option>
 <option value="Yes">Yes</option>
 </select>
 </td>
 </tr>

 <tr>
 <td align="center">
 <input type="button" class="table-btn"  value="Reset" onClick="reset_calc(this.form)" />
 </td>
 <td align="center">
 <input type="button" class="table-btn"  value="Calculate" onClick="computeForm(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 
 This is how much your monthly payment will be if you refinance:
 
 </td>
 <td align="center">
 <input type="text" name="paymentRefin" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Monthly payment (decrease)/increase:
 
 </td>
 <td align="center">
 <input type="text" name="moSave" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Number of months for interest savings to offset closing costs:
 
 </td>
 <td align="center">
 <input type="text" name="closeMo" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 This is how much interest you will pay under your current monthly payment plan:
 
 </td>
 <td align="center">
 <input type="text" name="origInt" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 This is how much interest you will pay under your refinanced monthly payment plan:
 
 </td>
 <td align="center">
 <input type="text" name="totIntRefin" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 This is how much interest you will save if you refinance:
 
 </td>
 <td align="center">
 <input type="text" name="intSave" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Net Refinancing Savings (interest savings less closing costs):
 
 </td>
 <td align="center">
 <input type="text" name="netSave" size="15" />
 </td>
 </tr>
 </tbody>
 </table>
<div style="clear:both;"></div>
 <div id="summary"></div>


 </form>
 </div>
 
<p>&nbsp;</p>
<a name="viewrates"></a>
<h3>Current Mortgage Refinance Rates</h3>
<div class="myFinance-widget" data-widget-id="0e398780-2190-4caf-9640-aecf30df3c9c" data-show-filters="true" data-property-value="250000" data-purchase-price="250000" data-loan-type="refi" data-percent="20" data-current-loan-balance="200000"  data-table-title="Refinance & Save With Today's Best Fixed Mortgage Rates" data-campaign="mortcalcbiz_fulltable_mortgage"></div>


 <h2>Home Loan Consolidation vs Mortgage Refinancing</h2>
<p> For many Americans, a home mortgage is the biggest expense they   have.  Housing costs take up an estimated thirty three percent of a   family budget in this country, and the interest and principal on a   mortgage are estimated to take up over three-fourths of that amount (www.bankrate.com).  Of course, all that money is going to pay for the   largest asset that most American families own; their home.</p>
<p>
  Because of this, many people assume that the money they spend on their   monthly mortgage payment is both a payment for a place to live and an   investment.  As such, they usually assume that there is no real way to   save money on their monthly payment unless they get the mortgage paid   off early.  While paying off a mortgage early can be a good option for   some people,  a lot of people can save some money and get a better   return on their investment by refinancing their home mortgage and/or   using the mortgage to consolidate debt.</p>
<p><img src="../img/consolidation.png" width="630" height="427" alt="Loan Consolidation." /></p>
<h3>
  How it Works</h3>
<p>
  Of course, in order to do this correctly, a person has to understand how   each of these processes work and how they can use them to benefit   themselves and their family.  The truth is, both of these options have   been around for decades, but they were misused and misrepresented in the   past several years.  Many people believe that this was one of the main   factors leading to the financial crisis.  Because of this, a lot of   people have simply decided that they will not even explore these options   for themselves.  The truth is that these options can save a person or   family thousands of dollars, but they have to be used correctly. </p>
<p>
  Take a home refinance, for example.  Banks have been refinancing loans   for centuries, yet only a small percentage of homeowners go through the   process every year.  Essentially, a home loan refinance allows a   homeowner to pay a lower interest rate than the one he or she is   currently paying.  There are many different ways to refinance a   mortgage, however, and many different reason to want to do it.</p>
<p>
  To start, a home mortgage refinance is a long process.  Unlike a credit   card application or car loan that can be approved in minutes, a mortgage   can take over a month to process.  In addition, there are often costs   that are associated with a refinance that are equivalent to anywhere   between two and four percent of the amount being refinanced. </p>
<p>Historically, a home loan refinance begins with the home being   refinanced getting appraised.  This is done by a professional who gives a   assessment of the value of the home.  The volatile housing market,   however, has made it difficult for many banks to believe that these   assessments are accurate.  This means that there are a lot of loans   available that are not requiring an appraisal.</p>
<p>
  The refinancing process will also usually include an examination of the   applicant's credit.  While the exact factors that are considered from   these reports vary from year to year, it's generally a good idea to have   as high a credit score as possible if you decide to apply.</p>
<p>
  Before starting the process, of course, a homeowner has to decide what   his or her goals are with refinancing.  Typically, a refinancing is done   to reduce an interest rate, save money on a monthly payment, pull cash   out of a home, and/or get the loan paid off faster.</p>
<h3>
  Reducing Interest Rates</h3>
<p>
  Today, nearly everyone who refinances a home is able to get a lower   interest rate.  Because the federal government has kept interest rates   for the federal bank at record low levels, banks are offering mortgage   rates at record low levels.  Historically, refinanced mortgages are   considered to be fairly safe investments for banks, allowing them to   offer rates that only a few points above what they would get by   investing their money with the government.</p>
<p>
  Many people have discovered that they qualify for rates on their primary   residence that are less than five percent.  In many cases, homeowners   have discovered that they qualify for rates that are several points   lower than what they currently have.  While this might not sound like a   lot, remember that even a one percent reduction in interest can save a   homeowner over a hundred dollars a month, depending on the amount that   he or she has financed.  Keep in mind that this savings is all interest.</p>
<h3>
  Saving Money on a Monthly Payment</h3>
<p>
  If the interest rate is lowered, there will most likely be some savings   every month.  In addition, the term of the mortgage is often extended   during a refinance.  For example, if a homeowner has a mortgage with   twenty years left on it, he or she can refinance into a loan with a new   thirty year term.  Since only the amount that is still owed on the home   is refinanced, many homeowners see their monthly payment significantly   reduced. </p>
<p>For a homeowner or family that needs to save money every month, this   option is one of the main reasons why they choose to refinance.  It   should be noted, however, that not everyone will save a lot of money by   doing this.  If the mortgage is less than three years old, odds are the   amount of fees that a homeowner will pay to refinance will replace any   potential savings that he or she would have seen.</p>
<p>
  In fact, there have been a spate of media stories about families who   went through the entire refinancing process just to find out that the   new loan would only save them a few dollars a month.  For this reason,   it is usually recommended that a homeowner who wants to refinance find   out the terms and conditions of the new loan.  If you are a homeowner   that needs a drastically lower payment or even the ability to skip a few   payments, be upfront with the mortgage broker about this.  Having a   couple thousand dollars added to your loan balance just to save a few   bucks a month won't help you in the long term or the short term.</p>
<p>
  The most important thing to keep in mind is that a refinance is not a   magic bullet fix for long-term financial problems.  As a result of the   recent recession, many families have come across ads promising to cut   mortgage payments through refinancing.  While many of these ads are from   legitimate companies, a family or individual has to really consider if   refinancing will help them keep their house out of foreclosure and if   the house is really worth saving.  If you have recently lost a job or   are going through some other temporary financial difficulty, make a   budget that includes the new mortgage payment before agreeing to a   refinance.  On the other hand, if your financial problems are not   temporary, it might just make the most sense to sell the home.</p>
<h3>
  Getting a Loan Paid Off Faster</h3>
<p>
  Perhaps the second most common reason people look into refinancing a   home is to get out of debt faster.  By having an interest rate reduced   and nothing else change about the loan terms, the loan payment will   drop.  If a homeowner doesn't need a lower payment, however, it is   possible to keep making the same payment every month and use the   additional cash towards paying down the principal of the loan.  For   example, a mortgage for $140,000 at 6% will have a monthly payment   around $900 over thirty years.  About ten years into the loan, the   homeowner will owe about $120,000.  By refinancing this amount at 4%   over twenty years, the payment drops to around $700.  That means the   homeowner could pocket $200 a month, or use that money to pay off the   loan balance.</p>
<p>
  Because many banks offer lower interest rates for loan terms that are   less than thirty years, many people who plan on keeping their homes for a   long time are willing to pay a little more each month to get the home   paid off years earlier than they otherwise would have.  With a lower   interest rate, many of these people have seen their payment remain   virtually the same, but they are able to shave five or more years of   payments off their loan term. </p>
<h3>
  Cash-out Refinancing</h3>
<p>
  One of the most confusing things that people can do with a refinance is   take cash out of their home, but this is also one of the most useful   features of a new mortgage if it is used correctly.  Essentially, the   process for this type of refinance is very similar to that of a regular   refinance, but there is an emphasis on determining the fair market value   of the home and comparing it to the amount that is still owed on the   home.  The difference between these two numbers is the equity in the   home.  This equity can be borrowed against as part of a mortgage   refinance.</p>
<p>For example, assume a homeowner purchased a home for $200,000 several   years ago.  Over this time, he or she has paid down the balance to   $150,000.  As he or she goes through the process of  refinancing, the   bank (with the help of a professional appraiser), is able to determine   that the house could sell for $225,000 today.  This means that the   homeowner has equity worth $75,000.</p>
<p>
  Of course, it should be noted that in many cases today a homeowner   actually owes more on the house than it could be sold for.  This is   referred to as negative equity or being underwater on the house.  There   are very few cases in which a bank is willing to offer a cash out   refinance to someone who is underwater on his or her home.</p>
<p>
  For people who have lived in their home for a long time, however, the   fact that they have equity will enable them to have access to a low   interest loan that can be used for many different purposes.  Because   interest rates on home loans are often a lot lower than the interest   rates offered on car loans, private student loans, credit cards, and   personal loans, many people choose to pull out the equity from their   home and use the cash to pay off their other debts.  This essentially   erases the balance of every loan they pay off, leaving them with only   one loan left to pay; their new mortgage. </p>
<p>
  We can use the previous example to see how this could work.  Let's   assume that the new interest rate on the refinanced mortgage is 4%.  The   homeowner also has a car loan for $25,000 at 8%, a student loan for   $10,000 at 6%, and several credit cards with balances totaling $15,000   all at double-digit interest rates. </p>
<p>The homeowner would take out a new mortgage on his or her home for   $225,000.  This is essentially the equivalent of purchasing a new house   for this amount, but the owner doesn't have to move.  The first $150,000   of the loan is used to pay off the old mortgage.  This will leave the   homeowner with $75,000 in cash and a single mortgage payment.</p>
<p>
  The homeowner can them use the cash he or she has received to pay off   his or her student loan, car loan, and credit cards.  The car would be   fully paid off, the student loan would be paid off, and the credit cards   would show a $0 balance on the next statement.  Unless the homeowner   continues to charge on the credit cards, he or she will no longer have   any bills arriving from these companies.  Instead, he or she will only   have to make the payment on his or her new mortgage every month.</p>
<p>
  Because the mortgage has a lower interest rate than any of the loans   that he or she paid off, odds are the homeowner will pay a lot less in   interest over the life of the loan.  Furthermore, he or she does not   have to worry about the car being repossessed, his or her wages being   garnished to pay for the student loan, or the credit cards falling into   collections.</p>
<p>
  Of course, in this example, the homeowner would have $25,000 left over   in cash.  There are a lot of options for what to do with this money.  A   homeowner could create an emergency fund, contribute to a retirement or   other savings account, pay higher education costs, make home   improvements, or even give the money back to the bank in exchange for a   reduction in the balance owed on the loan. </p>

 
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

