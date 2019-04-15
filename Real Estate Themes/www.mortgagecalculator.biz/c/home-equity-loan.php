<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Cash Out &amp; Debt Consolidation Home Equity Loans</title>		
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




function computeNPR(principal, intRate, pmtAmt) {

   var i = eval(intRate);
   if(i >= 1) {
   i /= 100;
   }
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

      if(pmtCount > 1000 || accumInt > 1000000) {
         prin = 0;
      }

   }

return pmtCount;

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


function calc_line(ln) {

   clear_results(document.calc);

   var v_prin_fld = document.getElementById("prin" + ln);
   var v_intRate_fld = document.getElementById("intRate" + ln);
   var v_pmt_fld = document.getElementById("pmt" + ln);
   var v_pmtLeft_fld = document.getElementById("pmtLeft" + ln);
   var v_intLeft_fld = document.getElementById("intLeft" + ln);

   var v_prin = sn(v_prin_fld.value);
   var v_intRate = sn(v_intRate_fld.value);
   var rate_val = v_intRate / 100 / 12;
   var v_pmt = sn(v_pmt_fld.value);

   if(v_prin == 0 || v_intRate == 0 || v_pmt == 0 || (rate_val * v_prin) > v_pmt) {
      v_pmtLeft_fld.value = "";
      v_intLeft_fld.value = "";
   } else {

      var v_pmtLeft = computeNPR(v_prin, v_intRate, v_pmt);

      if(v_pmtLeft >= 600) {
          alert("The payment amount entered on line #" + ln + " is not large enough to cover the monthly interest being charged.  Please increase that payment amount and try again.");
          v_pmtLeft_fld.value = "";
          v_intLeft_fld.value = "";
      } else {

          v_pmtLeft_fld.value = fns(v_pmtLeft,1,0,0,0);
          var v_intLeft = computeFixedInterestCost(v_prin, v_intRate, v_pmt);

          v_intLeft_fld.value = fns(v_intLeft,2,1,1,1);

          total_debts(document.calc);

      }
    
   }

}


function total_debts(form) {

   var accumTotBal = 0;
   var accumTotInt = 0;
   var accumTotPmt = 0;
   var accumCount = 0;
   var accumRate = 0;

   for(var i = 1; i<11; i++) {

      var v_prin_fld = document.getElementById("prin" + i);
      var v_intRate_fld = document.getElementById("intRate" + i);
      var v_pmt_fld = document.getElementById("pmt" + i);
      var v_pmtLeft_fld = document.getElementById("pmtLeft" + i);
      var v_intLeft_fld = document.getElementById("intLeft" + i);

      var v_prin = sn(v_prin_fld.value);
      var v_intRate = sn(v_intRate_fld.value);
      var v_pmt = sn(v_pmt_fld.value);
      var v_pmtLeft = sn(v_pmtLeft_fld.value);
      var v_intLeft = sn(v_intLeft_fld.value);

      if(v_intLeft > 0) {
         accumCount = Number(accumCount) + Number(1);
      }

      accumRate = Number(accumRate) + Number(v_intRate);
      accumTotBal = Number(accumTotBal) + Number(v_prin);
      accumTotPmt = Number(accumTotPmt) + Number(v_pmt);
      accumTotInt = Number(accumTotInt) + Number(v_intLeft);


   }

   //TOTALS
   document.calc.totalBal.value = fns(accumTotBal,2,1,1,1);
   document.calc.totalpmt.value = fns(accumTotPmt,2,1,1,1);
   document.calc.totalint.value = fns(accumTotInt,2,1,1,1);
   document.calc.accumRate.value = accumRate;
   document.calc.accumCount.value = accumCount;

}


function computeForm(form) {

   //BEGIN NEW LOAN CALC
   var accumTotBal = sn(document.calc.totalBal.value);
   var accumTotPmt = sn(document.calc.totalpmt.value);
   var accumTotInt = sn(document.calc.totalint.value);
   var accumRate = sn(document.calc.accumRate.value);
   var accumCount = sn(document.calc.accumCount.value);

   if(accumTotInt == 0) {
      alert("Please complete and compute the top section of this form before attempting to calculate the new loan information.");
   } else {

      var bal_perc = 0;
      var w_rate = 0;
      var accum_w_rate = 0;

      for(var i = 1; i<11; i++) {

         var v_prin_fld = document.getElementById("prin" + i);
         var v_intRate_fld = document.getElementById("intRate" + i);
         var v_pmt_fld = document.getElementById("pmt" + i);
         var v_pmtLeft_fld = document.getElementById("pmtLeft" + i);
         var v_intLeft_fld = document.getElementById("intLeft" + i);

         var v_prin = sn(v_prin_fld.value);
         var v_intRate = sn(v_intRate_fld.value);
         var v_pmt = sn(v_pmt_fld.value);
         var v_pmtLeft = sn(v_pmtLeft_fld.value);
         var v_intLeft = sn(v_intLeft_fld.value);

         if(v_intLeft > 0) {
            bal_perc = v_prin / accumTotBal;
            w_rate = bal_perc * v_intRate;
            accum_w_rate = Number(accum_w_rate) + Number(w_rate);
         }

      }


      //PLACE TOTAL OF CURRENT DEBT BALANCES
      document.calc.totCur.value = fns(accumTotBal,2,1,1,1);

      //PLACE TOTAL OF CURRENT DEBT PAYMENTS
      document.calc.totPmtCur.value = fns(accumTotPmt,2,1,1,1);

      //PLACE CURRENT EFFECTIVE RATE BEFORE TAX
      //var VeffRateCur = accumRate / accumCount;
      var VeffRateCur = accum_w_rate;
      document.calc.effRateCur.value = fns(VeffRateCur,2,0,2,1);

      //PLACE CURRENT EFFECTIVE RATE AFTER TAX
      document.calc.effRateCurTax.value = fns(VeffRateCur,2,0,2,1);

      //PLACE PROPOSED NEW LOAN AMOUNT
      var VcashOut = sn(document.calc.cashOut.value);
      var VcloseCost = sn(document.calc.closeCost.value);
      var proposed = Number(accumTotBal) + Number(VcashOut) + Number(VcloseCost);
      document.calc.totProp.value = fns(proposed,2,1,1,1);

      //PLACE PROPOSED EFFECTIVE RATE BEFORE TAX
      var VpropIntRate = sn(document.calc.newRate.value);
      document.calc.effRateProp.value = fns(VpropIntRate,2,0,2,1);

      //PLACE PROPOSED EFFECTIVE RATE AFTER TAX
      var taxPercent = sn(document.calc.incomeTax.value);
      if(taxPercent > 1) {
         taxPercent = taxPercent / 100;
      } else {
         taxPercent = taxPercent;
      }

      var VnewRate = sn(document.calc.newRate.value);
      var VpropIntRateTax = Number(VnewRate) - (taxPercent * VnewRate);
      document.calc.effRatePropTax.value = fns(VpropIntRateTax,2,0,2,1);

      //CONVERT SELECTED TERM TO MONTHS

      var VnewTerm = document.calc.newTerm.options[document.calc.newTerm.selectedIndex].value;

      //COMPUTE NEW LOAN PAYMENT BASED ON NEW TERMS
      var VtotPmtProp = computeMonthlyPayment(proposed, VnewTerm, VpropIntRate);
      document.calc.totPmtProp.value = fns(VtotPmtProp,2,1,1,1);

      Vsavings = Number(accumTotPmt) - Number(VtotPmtProp);
      if(Vsavings < 0) {
         document.calc.savings.value = 0;
      } else {
         document.calc.savings.value = fns(Vsavings,2,1,1,1);
      }

      //COMPUTE FIRST YEAR MONTHLY TAX SAVINGS

      VtaxSavings = 0;

      taxRate = (taxPercent * VnewRate) / 100 / 12;
      taxIntPort = 0;
      taxAccumInt = 0;
      taxPrinPort = 0;
      taxCount = 0;
      taxPrin = proposed;
      taxPmt = VtotPmtProp;

      while(taxCount < 12) {
         taxIntPort = taxPrin * taxRate;
         taxAccumInt = taxAccumInt + taxIntPort;
         taxPrinPort = taxPmt - taxIntPort;
         taxPrin = taxPrin - taxPrinPort;
         taxCount = taxCount + 1
      }

      var moTaxSave = taxAccumInt / 12;
      document.calc.taxSave.value = fns(moTaxSave,2,1,1,1);

      //COMPUTE TOTAL MONTHLY SAVINGS

      var VtotMoSave = Number(moTaxSave) + Number(Vsavings);
      if(VtotMoSave > 0) {

         document.calc.totMoSave.value = fns(VtotMoSave,2,1,1,1);
      } else {
         document.calc.totMoSave.value = 0;
      }

   }

}

function clear_results(form) {

      document.calc.totCur.value = "";
      document.calc.totPmtCur.value = "";
      document.calc.effRateCur.value = "";
      document.calc.effRateCurTax.value = "";
      document.calc.totProp.value = "";
      document.calc.effRateProp.value = "";
      document.calc.effRatePropTax.value = "";
      document.calc.totPmtProp.value = "";
      document.calc.savings.value = "";
      document.calc.taxSave.value = "";
      document.calc.totMoSave.value = "";

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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/home-equity-loan.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				<div class="main-heading"><h1>Debt Consolidation Home Equity Loan Calculator</h1>
</div>
                    <ul id="breadcrumbs">

                        <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
                        <li><a href="https://www.mortgagecalculator.biz/c/budget-planner.php">Budget Planning</a></li>
                        <li>Debt Consolidation via Home Equity Loans &amp; HELOC</li> 
                    </ul>
                </div>
                <div class="bottom-section">


   				<div class="table-block">


<p>Do you have many debts to pay each month? If you have credit cards or other high interest unsecured loans you may be able to lower your overall interest expense &amp; monthly payments by taking out a home equity loan to repay the other debts. What's more, interest on mortgage debt is tax deductible, which can further enhance your savings &amp; help you pay down your debts even faster.</p>
<p>Enter one debt on each row, the amount of additional cash you would like to withdraw &amp; this tool will calculate your monthly home equity loan payment and total interest savings.</p>

<form name="calc" method="post" action="#">
 <table>
 <tbody>
 <tr>
 <td align="center"><strong>Payment<br />Description</strong></td>
 <td align="center"><strong>Principal<br />Balance</strong></td>
 <td align="center"><strong>Interest<br />Rate</strong></td>
 <td align="center"><strong>Payment<br />Amount</strong></td>
 <td align="center"><strong>Payments<br />Left</strong></td>
 <td align="center"><strong>Interest<br />Left</strong></td>
 </tr>

 <tr>
 <td><select tabindex="1" size="1" name="debt01">
 <option>Credit Card</option>
 <option>Auto Loan</option>
 <option>Student Loan</option>
 <option>Other</option></select></td>
 <td align="center"><input type="number" step="any" tabindex="2" id="prin1" name="prin1" size="9" onKeyUp="calc_line(1)" /></td>
 <td align="center"><input type="number" step="any" tabindex="3" id="intRate1" name="intRate1" size="5" onKeyUp="calc_line(1)" /></td>
 <td align="center"><input type="number" step="any" tabindex="4" id="pmt1" name="pmt1" size="9" onKeyUp="calc_line(1)" /></td>
 <td align="center"><input type="text" readonly id="pmtLeft1" name="pmtLeft1" size="9" /></td>
 <td align="center"><input type="text" readonly id="intLeft1" name="intLeft1" size="9" /></td>
 </tr>

 <tr>
 <td><select tabindex="5" size="1" name="debt02">
 <option>Credit Card</option>
 <option>Auto Loan</option>
 <option>Student Loan</option>
 <option>Other</option></select></td>
 <td align="center"><input type="number" step="any" tabindex="6" id="prin2" name="prin2" size="9" onKeyUp="calc_line(2)" /></td>
 <td align="center"><input type="number" step="any" tabindex="7" id="intRate2" name="intRate2" size="5" onKeyUp="calc_line(2)" /></td>
 <td align="center"><input type="number" step="any" tabindex="8" id="pmt2" name="pmt2" size="9" onKeyUp="calc_line(2)" /></td>
 <td align="center"><input type="text" readonly id="pmtLeft2" name="pmtLeft2" size="9" /></td>
 <td align="center"><input type="text" readonly id="intLeft2" name="intLeft2" size="9" /></td>
 </tr>

 <tr>
 <td><select tabindex="9" size="1" name="debt03">
 <option>Credit Card</option>
 <option>Auto Loan</option>
 <option>Student Loan</option>
 <option>Other</option></select></td>
 <td align="center"><input type="number" step="any" tabindex="10" id="prin3" name="prin3" size="9" onKeyUp="calc_line(3)" /></td>
 <td align="center"><input type="number" step="any" tabindex="11" id="intRate3" name="intRate3" size="5" onKeyUp="calc_line(3)" /></td>
 <td align="center"><input type="number" step="any" tabindex="12" id="pmt3" name="pmt3" size="9" onKeyUp="calc_line(3)" /></td>
 <td align="center"><input type="text" readonly id="pmtLeft3" name="pmtLeft3" size="9" /></td>
 <td align="center"><input type="text" readonly id="intLeft3" name="intLeft3" size="9" /></td>
 </tr>

 <tr>
 <td><select tabindex="13" size="1" name="debt04">
 <option>Credit Card</option>
 <option>Auto Loan</option>
 <option>Student Loan</option>
 <option>Other</option></select></td>
 <td align="center"><input type="number" step="any" tabindex="14" id="prin4" name="prin4" size="9" onKeyUp="calc_line(4)" /></td>
 <td align="center"><input type="number" step="any" tabindex="15" id="intRate4" name="intRate4" size="5" onKeyUp="calc_line(4)" /></td>
 <td align="center"><input type="number" step="any" tabindex="16" id="pmt4" name="pmt4" size="9" onKeyUp="calc_line(4)" /></td>
 <td align="center"><input type="text" readonly id="pmtLeft4" name="pmtLeft4" size="9" /></td>
 <td align="center"><input type="text" readonly id="intLeft4" name="intLeft4" size="9" /></td>
 </tr>

 <tr>
 <td><select tabindex="17" size="1" name="debt05">
 <option>Credit Card</option>
 <option>Auto Loan</option>
 <option>Student Loan</option>
 <option>Other</option></select></td>
 <td align="center"><input type="number" step="any" tabindex="18" id="prin5" name="prin5" size="9" onKeyUp="calc_line(5)" /></td>
 <td align="center"><input type="number" step="any" tabindex="19" id="intRate5" name="intRate5" size="5" onKeyUp="calc_line(5)" /></td>
 <td align="center"><input type="number" step="any" tabindex="20" id="pmt5" name="pmt5" size="9" onKeyUp="calc_line(5)" /></td>
 <td align="center"><input type="text" readonly id="pmtLeft5" name="pmtLeft5" size="9" /></td>
 <td align="center"><input type="text" readonly id="intLeft5" name="intLeft5" size="9" /></td>
 </tr>

 <tr>
 <td><select tabindex="21" size="1" name="debt06">
 <option>Credit Card</option>
 <option>Auto Loan</option>
 <option>Student Loan</option>
 <option>Other</option></select></td>
 <td align="center"><input type="number" step="any" tabindex="22" id="prin6" name="prin6" size="9" onKeyUp="calc_line(6)" /></td>
 <td align="center"><input type="number" step="any" tabindex="23" id="intRate6" name="intRate6" size="5" onKeyUp="calc_line(6)" /></td>
 <td align="center"><input type="number" step="any" tabindex="24" id="pmt6" name="pmt6" size="9" onKeyUp="calc_line(6)" /></td>
 <td align="center"><input type="text" readonly id="pmtLeft6" name="pmtLeft6" size="9" /></td>
 <td align="center"><input type="text" readonly id="intLeft6" name="intLeft6" size="9" /></td>
 </tr>

 <tr>
 <td><select tabindex="25" size="1" name="debt07">
 <option>Credit Card</option>
 <option>Auto Loan</option>
 <option>Student Loan</option>
 <option>Other</option></select></td>
 <td align="center"><input type="number" step="any" tabindex="26" id="prin7" name="prin7" size="9" onKeyUp="calc_line(7)" /></td>
 <td align="center"><input type="number" step="any" tabindex="27" id="intRate7" name="intRate7" size="5" onKeyUp="calc_line(7)" /></td>
 <td align="center"><input type="number" step="any" tabindex="28" id="pmt7" name="pmt7" size="9" onKeyUp="calc_line(17)" /></td>
 <td align="center"><input type="text" readonly id="pmtLeft7" name="pmtLeft7" size="9" /></td>
 <td align="center"><input type="text" readonly id="intLeft7" name="intLeft7" size="9" /></td>
 </tr>

 <tr>
 <td><select tabindex="29" size="1" name="debt08">
 <option>Credit Card</option>
 <option>Auto Loan</option>
 <option>Student Loan</option>
 <option>Other</option></select></td>
 <td align="center"><input type="number" step="any" tabindex="30" id="prin8" name="prin8" size="9" onKeyUp="calc_line(8)" /></td>
 <td align="center"><input type="number" step="any" tabindex="31" id="intRate8" name="intRate8" size="5" onKeyUp="calc_line(8)" /></td>
 <td align="center"><input type="number" step="any" tabindex="32" id="pmt8" name="pmt8" size="9" onKeyUp="calc_line(8)" /></td>
 <td align="center"><input type="text" readonly id="pmtLeft8" name="pmtLeft8" size="9" /></td>
 <td align="center"><input type="text" readonly id="intLeft8" name="intLeft8" size="9" /></td>
 </tr>

 <tr>
 <td><select tabindex="33" size="1" name="debt09">
 <option>Credit Card</option>
 <option>Auto Loan</option>
 <option>Student Loan</option>
 <option>Other</option></select></td>
 <td align="center"><input type="number" step="any" tabindex="34" id="prin9" name="prin9" size="9" onKeyUp="calc_line(9)" /></td>
 <td align="center"><input type="number" step="any" tabindex="35" id="intRate9" name="intRate9" size="5" onKeyUp="calc_line(9)" /></td>
 <td align="center"><input type="number" step="any" tabindex="36" id="pmt9" name="pmt9" size="9" onKeyUp="calc_line(9)" /></td>
 <td align="center"><input type="text" readonly id="pmtLeft9" name="pmtLeft9" size="9" /></td>
 <td align="center"><input type="text" readonly id="intLeft9" name="intLeft9" size="9" /></td>
 </tr>

 <tr>
 <td><select tabindex="37" size="1" name="debt10">
 <option>Credit Card</option>
 <option>Auto Loan</option>
 <option>Student Loan</option>
 <option>Other</option></select></td>
 <td align="center"><input type="number" step="any" tabindex="38" id="prin10" name="prin10" size="9" onKeyUp="calc_line(10)" /></td>
 <td align="center"><input type="number" step="any" tabindex="39" id="intRate10" name="intRate10" size="5" onKeyUp="calc_line(10)" /></td>
 <td align="center"><input type="number" step="any" tabindex="40" id="pmt10" name="pmt10" size="9" onKeyUp="calc_line(10)" /></td>
 <td align="center"><input type="text" readonly id="pmtLeft10" name="pmtLeft10" size="9" /></td>
 <td align="center"><input type="text" readonly id="intLeft10" name="intLeft10" size="9" /></td>
 </tr>

 <tr>
 <td>Totals >>></td>
 <td align="center"><input type="text" name="totalBal" size="9" /></td>
 <td align="center"><input type="hidden" name="accumRate" /></td>
 <td align="center"><input type="text" name="totalpmt" size="9" /></td>
 <td align="center"><input type="hidden" name="accumCount" /></td>
 <td align="center"><input type="text" name="totalint" size="9" /></td>
 </tr>


 <tr>
 <td colspan=6 align="center">
 <strong>New Loan Information</strong>
 </td>
 </tr>

 <tr>
 <td colspan="2" align="center"><strong>Need Additional<br />Cash? If So<br />Enter Amount Here</strong></td>
 <td align="center"><strong>Interest<br />Rate</strong></td>
 <td align="center"><strong>Number<br />of Years</strong></td>
 <td align="center"><strong>Estimated<br />Closing Costs</strong></td>
 <td align="center"><strong>Fed & St.<br />Tax Rate</strong></td>
 </tr>

 <tr>
 <td align="center" colspan="2"><input type="number" step="any" name="cashOut" value="0" tabindex="41" size="9" onKeyUp="clear_results(this.form)" /></td>
 <td align="center"><input type="number" step="any" name="newRate" value="12" tabindex="42" size="9" onKeyUp="clear_results(this.form)" /></td>
 <td align="center">
 <select name="newTerm" size="1" tabindex="43" onChange="clear_results(this.form)">
 <option value="60">5 Years</option>
 <option value="120">10 Years</option>
 <option value="180">15 Years</option>
 <option value="240">20 Years</option>
 <option value="300">25 Years</option>
 </select>
 </td>
 <td align="center"><input type="number" step="any" name="closeCost" value="0" tabindex="44" size="9" onKeyUp="clear_results(this.form)" /></td>
 <td align="center"><input type="number" step="any" name="incomeTax" value="36" tabindex="45" size="9" onKeyUp="clear_results(this.form)" /></td>
 </tr>

 <tr>
 <td align="center" colspan="6">
 <input type="button" value="Calculate New" tabindex="46" onClick="computeForm(this.form)" class="table-btn"/>
 <input type="reset" tabindex="47" value="Reset" class="table-btn"/>
 </td>
 </tr>


 <tr>
 <td colspan="4"><strong>Results</strong></td>
 <td align="center"><strong>Current</strong></td>
 <td align="center"><strong>New Loan</strong></td>
 </tr>

 <tr>
 <td colspan="4">Total Principal Balance:</td>
 <td align="center"><input type="text" name="totCur" size="9" /></td>
 <td align="center"><input type="text" name="totProp" size="9" /></td>
 </tr>

 <tr>
 <td colspan="4">Effective Rate Before Taxes:</td>
 <td align="center"><input type="text" name="effRateCur" size="9" /></td>
 <td align="center"><input type="text" name="effRateProp" size="9" /></td>
 </tr>

 <tr>
 <td colspan="4">Effective Rate After Taxes:</td>
 <td align="center"><input type="text" name="effRateCurTax" size="9" /></td>
 <td align="center"><input type="text" name="effRatePropTax" size="9" /></td>
 </tr>

 <tr>
 <td colspan="4">Total of Monthly Payments:</td>
 <td align="center"><input type="text" name="totPmtCur" size="9" /></td>
 <td align="center"><input type="text" name="totPmtProp" size="9" /></td>
 </tr>

 <tr>
 <td colspan="5">Monthly Tax Savings:</td>
 <td align="center"><input type="text" name="taxSave" size="9" /></td>
 </tr>

 <tr>
 <td colspan="5">Monthly Payment Reduction:</td>
 <td align="center"><input type="text" name="savings" size="9" /></td>
 </tr>

 <tr>
 <td colspan="5">Total Monthly Savings:</td>
 <td align="center" ><input type="text" name="totMoSave" size="9" /></td>
 </tr>

 </tbody>
 </table>
 </form>

 </div>

 <p>&nbsp;</p>
<a name="viewrates"></a>
<h3>Current Home Equity Loan Rates</h3>
<div id="mortcalcbiz-fulltable"></div>



    <p>&nbsp;</p>
                  <p><img src="../img/leveraging-home-equity.png" width="1250" height="1250" alt="Leveraging Home Equity."></p>
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
