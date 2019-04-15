<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Car Lease or Buy Calculator</title>
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




function FVsingleDep(prin, intRate, numMonths, numCompPerYr) {

var i = 0;
var intEarn = 0;
var singleFV = prin;

intRate /= 100;

if(numCompPerYr == "" || numCompPerYr == 0) {
   numCompPerYr = 12;
}
intRate /= numCompPerYr;

var numPeriods = numMonths / 12 * numCompPerYr;

singleFV = Math.pow((eval(1) + eval(intRate)), numPeriods) * singleFV;

return singleFV;

}



function fn(num, places, comma) {

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
       finNum = "-" + finNum;
    }

	return finNum;
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

function computeForm(form) {

   if(document.calc.lsCost.value == "" || document.calc.lsCost.value == 0) {
   } else
   if(document.calc.lnCost.value == "" || document.calc.lnCost.value == 0) {
   } else
   if(document.calc.lsTaxRate.value == "" || document.calc.lsTaxRate.value == 0) {
   } else
   if(document.calc.lnTaxRate.value == "" || document.calc.lnTaxRate.value == 0) {
   } else
   if(document.calc.lsMonths.value == "" || document.calc.lsMonths.value == 0) {
   } else
   if(document.calc.lnMonths.value == "" || document.calc.lnMonths.value == 0) {
   } else
   if((document.calc.lnPmt.value == "" || document.calc.lnPmt.value == 0) && (document.calc.lnIntRate.value == "" || document.calc.lnIntRate.value == "")) {
   } else
   if((document.calc.lsPmt.value == "" || document.calc.lsPmt.value == 0) && (document.calc.lsIntRate.value == "" || document.calc.lsIntRate.value == "")) {
   } else {

      //CALC BUY COSTS

      var VlnCost = sn(document.calc.lnCost.value);
      var VlnTaxRate = sn(document.calc.lnTaxRate.value);
      var VlnSalesTax = 0;

      if(VlnTaxRate >= 1) {
         VlnTaxRate /= 100;
      }
      VlnSalesTax = VlnTaxRate * VlnCost;

      var VlnFees = sn(document.calc.lnFees.value);

      var VlnGrossPurchase = Number(VlnCost) + Number(VlnSalesTax) + Number(VlnFees);

      //Initialize value to accumulate prin for forgone int calc
      var VlnUpFrontFVamt = 0;

      var VlnDownPay = sn(document.calc.lnDownPay.value);
      //Add downpayment to amount for figuring forgone interest
      VlnUpFrontFVamt = Number(VlnUpFrontFVamt) + Number(VlnDownPay);

      VlnFinanceAmt = Number(VlnCost) - Number(VlnDownPay);

      var VlnTradeIn = sn(document.calc.lnTradeIn.value);
      //Subtract tradein allowance from amount to finance.
      VlnFinanceAmt = Number(VlnFinanceAmt) - Number(VlnTradeIn);

      var VlnRebate = sn(document.calc.lnRebate.value);
      //Subtract from amount to figure forgone interest
      VlnUpFrontFVamt = Number(VlnUpFrontFVamt) - Number(VlnRebate);

      //Add Sales tax amount to figure forgone interest
      VlnUpFrontFVamt = Number(VlnUpFrontFVamt) + Number(VlnSalesTax);

      //Add Fees amount to figure forgone interest
      VlnUpFrontFVamt = Number(VlnUpFrontFVamt) + Number(VlnFees);


      var VlnMonths = sn(document.calc.lnMonths.value);
      var VlnPmt = 0;
      var VlnIntRate = document.calc.lnIntRate.value;
      if(VlnIntRate == "") {
         VlnPmt = sn(document.calc.lnPmt.value);
      } else {
         VlnIntRate = sn(VlnIntRate);
         VlnPmt = computeMonthlyPayment(VlnFinanceAmt, VlnMonths, VlnIntRate);
      }

      document.calc.lnMoPmt.value = "$" + fn(VlnPmt,2,1);

      var VlnTotPmt = VlnMonths * VlnPmt;
      document.calc.lnTotPmt.value = "$" + fn(VlnTotPmt,2,1);

      var VlnIntExp = Number(VlnTotPmt) - Number(VlnFinanceAmt);
      document.calc.lnIntExp.value = "$" + fn(VlnIntExp,2,1);

      var VlnUpFront = Number(VlnSalesTax) + Number(VlnFees) - Number(VlnRebate);
      document.calc.lnUpFront.value = "$" + fn(VlnUpFront,2,1);

      var VlnResale = document.calc.lnResale.value;
      var VlnDeprecExp = 0;
      if(VlnResale == "") {
         VlnDeprecExp = getDeprec(VlnCost,VlnMonths);
      } else {
         VlnResale = sn(VlnResale);
         VlnDeprecExp = Number(VlnCost) - Number(VlnResale);
      }
      document.calc.lnDeprecExp.value = "$" + fn(VlnDeprecExp,2,1);

      //Compute forgone interest if upfront cash less rebate > 0
      var VannSaveRate = sn(document.calc.annSaveRate.value);
      var VlnUpFrontFV = 0;
      var VlnForgoneInt = 0;
      if(VlnUpFrontFVamt > 0) {
         VlnUpFrontFV = FVsingleDep(VlnUpFrontFVamt, VannSaveRate, VlnMonths, 12);
         VlnForgoneInt = Number(VlnUpFrontFV) - Number(VlnUpFrontFVamt);
      }
      document.calc.lnForgoneInt.value = "$" + fn(VlnForgoneInt,2,1);

      var VlnTotCost = Number(VlnIntExp) + Number(VlnUpFront) + Number(VlnDeprecExp) + Number(VlnForgoneInt);
      document.calc.lnTotCost.value = "$" + fn(VlnTotCost,2,1);

      var VlnAvgAnnCost = VlnTotCost / (VlnMonths / 12);
      document.calc.lnAvgAnnCost.value = "$" + fn(VlnAvgAnnCost,2,1);

      //CALC LEASE COSTS

      var VlsCost = sn(document.calc.lsCost.value);

      var VlsGrossCapCost = VlsCost;

      var VlsDownPay = sn(document.calc.lsDownPay.value);

      var VlsTradeIn = sn(document.calc.lsTradeIn.value);

      var VlsRebate = sn(document.calc.lsRebate.value);

      var VlsTotCapCostReduct = Number(VlsDownPay) + Number(VlsTradeIn) + Number(VlsRebate);

      var VlsNetCapCost = Number(VlsGrossCapCost) - Number(VlsTotCapCostReduct);

      var VlsMonths = sn(document.calc.lsMonths.value);

      var VlsResale = document.calc.lsResale.value;
      var VlsDeprecExp = 0;
      if(VlsResale == "") {
         VlsDeprecExp = getDeprec(VlsCost,VlsMonths);
      } else {
         VlsResale = sn(VlsResale);
         VlsDeprecExp = Number(VlsCost) - Number(VlsResale);
      }
      //document.calc.lsDeprecExp.value = "$" + fn(VlsDeprecExp,2,1);

      var VlsTaxRate = sn(document.calc.lsTaxRate.value);
      VlsTaxRate /= 100;

      var VlsPmt = document.calc.lsPmt.value;
      var VlsIntRate = sn(document.calc.lsIntRate.value);
      VlsIntRate /= 100;

      var VlsResidual = 0;
      var VlsMonthlyDeprec = 0;
      var VlsMoneyFactor = 0;
      var VlsLeaseRate = 0;
      var VlsMoPmt = 0;
      if(VlsPmt == 0 || VlsPmt == "") {
         VlsResidual = Number(VlsCost) - Number(VlsDeprecExp);
         VlsMonthlyDeprec = (Number(VlsNetCapCost) - Number(VlsResidual)) / VlsMonths;
         VlsMoneyFactor = VlsIntRate / 24;
         VlsLeaseRate = (Number(VlsNetCapCost) + Number(VlsResidual)) * VlsMoneyFactor;
         VlsMoPmt = Number(VlsMonthlyDeprec) + Number(VlsLeaseRate);
         VlsMoPmt = VlsMoPmt * (Number(1) + Number(VlsTaxRate))
      } else {
        VlsMoPmt = sn(VlsPmt);
      }
      document.calc.lsMoPmt.value = "$" + fn(VlsMoPmt,2,1);

      var VlsTotPmt = VlsMoPmt * VlsMonths;
      document.calc.lsTotPmt.value = "$" + fn(VlsTotPmt,2,1);

      //Calc sales tax on cap reduction
      var VlsCapReductTax = VlsTotCapCostReduct * VlsTaxRate;

      var VlsFees = sn(document.calc.lsFees.value);

      var VlsUpFront = Number(VlsCapReductTax) + Number(VlsFees);
      document.calc.lsUpFront.value = "$" + fn(VlsUpFront,2,1);

      var VlsUpFrontFVamt = 0;
      VlsUpFrontFVamt = Number(VlsDownPay) + Number(VlsTradeIn) + Number(VlsUpFront) - Number(VlsRebate);

      //Compute forgone interest if upfront cash less rebate > 0
      var VlsUpFrontFV = 0;
      var VlsForgoneInt = 0;
      if(VlsUpFrontFVamt > 0) {
         VlsUpFrontFV = FVsingleDep(VlsUpFrontFVamt, VannSaveRate, VlsMonths, 12);
         VlsForgoneInt = Number(VlsUpFrontFV) - Number(VlsUpFrontFVamt);
      }
      document.calc.lsForgoneInt.value = "$" + fn(VlsForgoneInt,2,1);

      var VlsTotCost = Number(VlsTotPmt) + Number(VlsUpFront) + Number(VlsForgoneInt);
      document.calc.lsTotCost.value = "$" + fn(VlsTotCost,2,1);

      var VlsAvgAnnCost = VlsTotCost / (VlsMonths / 12);
      document.calc.lsAvgAnnCost.value = "$" + fn(VlsAvgAnnCost,2,1);


      //END VARIFICATION IF STATEMENT
   }
    
}

function getDeprec(p,m) {

   var numYrs = m / 12;

   var deprec = 0;
   var accumDeprec = 0;
   var deprecPerc = 0;
   var dYrCnt = 0;

   var ageFact = new Array(0,24,16,12,8,6,5,4,3,2,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1);

   while(dYrCnt < numYrs) {
      dYrCnt = Number(dYrCnt) + Number(1);
      deprecPerc = sn(document.getElementById("yr" + dYrCnt + "").value);
      if(deprecPerc == 0) {
         deprecPerc = ageFact[dYrCnt];
      }
      deprec = deprecPerc / 100 * p;
      accumDeprec = Number(accumDeprec) + Number(deprec);
   
   }

   return accumDeprec;

}

function help(help_id,txt) {

   var help_cell = document.getElementById("help_" + help_id + "");
   help_cell.innerHTML = "<font face='arial'><small>" + txt + "</small></font>";

   for(var i = 1; i<3; i++) {

      if(i != help_id) {

         var clear_cell = document.getElementById("help_" + i + "");
         clear_cell.innerHTML = "";
      }
   }

}


function clear_results(form) {

      document.calc.lnMoPmt.value = "";
      document.calc.lnTotPmt.value = "";
      document.calc.lnIntExp.value = "";
      document.calc.lnUpFront.value = "";
      document.calc.lnDeprecExp.value = "";
      document.calc.lnForgoneInt.value = "";
      document.calc.lnTotCost.value = "";
      document.calc.lnAvgAnnCost.value = "";
      document.calc.lsMoPmt.value = "";
      document.calc.lsTotPmt.value = "";
      document.calc.lsUpFront.value = "";
      document.calc.lsForgoneInt.value = "";
      document.calc.lsTotCost.value = "";
      document.calc.lsAvgAnnCost.value = "";

}

function reset_calc(form) {

   for(var i = 1; i<3; i++) {

      var clear_cell = document.getElementById("help_" + i + "");
      clear_cell.innerHTML = "";
    
   }

   document.calc.reset();

}
</script>
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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/auto-lease-buy.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				<div class="main-heading">
				  <h1>Vehicle Lease vs Buy</h1></div>
    <ul id="breadcrumbs">
    <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
    <li><a href="https://www.mortgagecalculator.biz/c/car.php">Car</a></li>
    <li>Lease vs Buy</li>
    </ul>
   </div>
   			<div class="bottom-section">

   				<div class="table-block">

<p>This tool helps vehicle shoppers compare estimates of the total financial costs of leasing or buying a car throughout the duration of the contract. This tool figures both the direct costs of financing as well as indirect costs of depreciation &amp; lost interest on money spent upfront. The table underneath the calculator lists current locally available <a href="#viewrates"><strong>auto loan rates</strong></a> for new &amp; used vehicles. </p> 

<form name="calc" method="post" action="#">
 <table>
 <thead>
 <tr>
 <th align="center"><strong> Description </strong></th>
 <th align="center"><strong> (A) Lease:</strong></th>
 <th align="center"><strong> (B) Loan:</strong></th>
 <th width="125" align="center"><strong> Advice </strong></th>
 </tr>
 </thead>
 <tbody>
 <tr>
 <td nowrap>Purchase price:</font>
 </td>
 <td align="center">
 <input type="number" step="any" name="lsCost" size="10" value="30000" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #1A: ENTER: The negotiated purchase price of the car you are thinking of leasing.');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" tabIndex="1" />
 </td>
 <td align="center">
 <input type="number" step="any" name="lnCost" size="10" value="30000" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #1B: ENTER: The negotiated purchase price of the car you are thinking of buying.');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" tabIndex="2" />
 </td>
 <td width="125" align="center" valign="top" rowspan="12">

 <div id="help_1" style="height: 120px; text-align: left;">
 </div>

 </td>
 </tr>

 <tr>
 <td nowrap>Sales tax rate:</td>
 <td align="center">
 <input type="number" step="any" name="lsTaxRate" size="10" value="3" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #2A: ENTER: The applicable sales tax rate, expressed as a percentage (enter 6.5 for 6.5%).');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" tabIndex="3" />
 </td>
 <td align="center"> 
 <input type="number" step="any" name="lnTaxRate" size="10" value="3" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #2B: ENTER: The applicable sales tax rate, expressed as a percentage (enter 6.5 for 6.5%).');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" tabIndex="4" />
 </td>
 </tr>

 <tr>
 <td nowrap> Fees:</td>
 <td align="center">
 <input type="number" step="any" name="lsFees" size="10" value="350" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #3A: ENTER: The combined total of the lease aquisition and title/registration fees.');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" tabIndex="5" />
 </td>
 <td align="center">
 <input type="number" step="any" name="lnFees" size="10" value="350" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #3B: ENTER: The vehicle title/registration fees.');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" tabIndex="6" />
 </td>
 </tr>



 <tr>
 <td nowrap>Cash Down payment:</td>
 <td align="center">
 <input type="number" step="any" name="lsDownPay" size="10" value="2000" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #4A: ENTER: The amount of your cash down payment, if any.');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" tabIndex="7" />
 </td>
 <td align="center">
 <input type="number" step="any" name="lnDownPay" size="10" value="2000" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #4B: ENTER: The amount of your cash down payment, if any.');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" tabIndex="8" />
 </td>
 </tr>

 <tr>
 <td nowrap>Net Trade-in allowance:</td>
 <td align="center">
 <input type="number" step="any" name="lsTradeIn" size="10" value="0" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #5A: ENTER: The amount of your net trade-in allowance, if any.');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" tabIndex="9" />
 </td>
 <td align="center">
 <input type="number" step="any" name="lnTradeIn" size="10" value="0" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #5B: ENTER: The amount of your net trade-in allowance, if any.');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" tabIndex="10" />
 </td>
 </tr>

 <tr>
 <td nowrap>Rebates:</td>
 <td align="center">
 <input type="number" step="any" name="lsRebate" size="10" value="0" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #6A: ENTER: The total amount of any rebates you have coming.');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" tabIndex="11" />
 </td>
 <td align="center">
 <input type="number" step="any" name="lnRebate" size="10" value="0" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #6B: ENTER: The total amount of any rebates you have coming.');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" tabIndex="12" />
 </td>
 </tr>



 <tr>
 <td nowrap>Term (in months):</td>
 <td align="center">
 <input type="number" step="any" name="lsMonths" size="10" value="60" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #7A: ENTER: The term of the lease expressed in number of months.');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" tabIndex="13" />
 </td>
 <td align="center">
 <input type="number" step="any" name="lnMonths" size="10" value="60" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #7B: ENTER: The term of the loan expressed in number of months.');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" tabIndex="14" />
 </td>
 </tr>

 <tr>
 <td nowrap><a href="#viewrates"><strong>Interest rate</strong></a> (APR):</td>
 <td align="center">
 <input type="number" step="any" name="lsIntRate" size="10" value="5" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #8A: ENTER: If you would like the calculator to figure your monthly lease payment for you, enter the lease stated annual interest rate, expressed as a percentage. Otherwise, if you know the monthly lease payment amount, leave this field blank.');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" tabIndex="15" />
 </td>
 <td align="center">
 <input type="number" step="any" name="lnIntRate" size="10" value="5" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #8B: ENTER: If you would like the calculator to figure your monthly loan payment for you, enter the loan annual interest rate, expressed as a percentage. Otherwise, if you know the monthly loan payment amount, leave this field blank.');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" tabIndex="16" />
 </td>
 </tr>



 <tr>
 <td nowrap>Monthly payment:</td>
 <td align="center">
 <input type="number" step="any" name="lsPmt" size="10" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #9A: ENTER: If you know what your lease monthly payment will be, enter the monthly payment amount. Otherwise, leave this field blank and the calculator will estimate your lease monthly payment for you.');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" tabIndex="17" />
 </td>
 <td align="center">
 <input type="number" step="any" name="lnPmt" size="10" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #9B: ENTER: If you know what your loan monthly payment will be, enter the monthly payment amount. Otherwise, leave this field blank and the calculator will compute your loan monthly payment for you.');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" tabIndex="18" />
 </td>
 </tr>

 <tr>
 <td nowrap> Security deposit:</td>
 <td align="center">
 <input type="number" step="any" name="lsSecurityDeposit" size="10" value="1500" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #10A: ENTER: Enter the lease security deposit amount.');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" tabIndex="19" />
 </td>
 <td>

 </td>
 </tr>


 <tr>
 <td nowrap>Estimated resale value:</td>
 <td align="center">
 <input type="number" step="any" name="lsResale" size="10" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #11A: ENTER: The vehicle estimated resale value (residual) at the end of the lease (varies by model, mileage and other factors). If you want the calculator to estimate the resale value for you using the annual depreciation percentages on line #13, leave this field blank.');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" tabIndex="20" />
 </td>
 <td align="center">
 <input type="number" step="any" name="lnResale" size="10" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #11B: ENTER: The vehicle estimated resale value (residual) at the end of the loan (varies by model, mileage and other factors). If you want the calculator to estimate the resale value for you using the annual depreciation percentages on line #13, leave this field blank.');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" tabIndex="21" />
 </td>
 </tr>

 <tr>
 <td nowrap>Annual Savings Interest Rate:</td>
 <td align="center" colspan="2">
 <input type="number" step="any" name="annSaveRate" size="5" value="3" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #12: ENTER: Annual interest rate at which you expect your savings to grow, expressed as a percentage.');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" tabIndex="22" />
 </td>
 </tr>
</table>


 <table border="0" cellpadding="2">
<thead>
<tr>
<th colspan="5">
% Depreciation By Year
</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>2</td>
<td>3</td>
<td>4</td>
<td>5</td>
</tr>

 <tr>
 <td><input type="number" step="any" id="yr1" name="yr1" size="2" value="24" tabIndex="23" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #13: ENTER: This line shows the typical falling depreciation percentages that occur in the 1st year following the purchase/lease of a new vehicle. If you think the default amounts are not reflective of your particular vehicles depreciation, feel free to alter the percentages as you see fit.');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue"/></td>
 <td><input type="number" step="any" id="yr2" name="yr2" size="2" value="16" tabIndex="24" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #13: ENTER: This line shows the typical falling depreciation percentages that occur in the 2nd each year following the purchase/lease of a new vehicle. If you think the default amounts are not reflective of your particular vehicles depreciation, feel free to alter the percentages as you see fit.');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue"/></td>
 <td><input type="number" step="any" id="yr3" name="yr3" size="2" value="12" tabIndex="25" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #13: ENTER: This line shows the typical falling depreciation percentages that occur in the 3rd each year following the purchase/lease of a new vehicle. If you think the default amounts are not reflective of your particular vehicles depreciation, feel free to alter the percentages as you see fit.');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue"/></td>
 <td><input type="number" step="any" id="yr4" name="yr4" size="2" value="8" tabIndex="26" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #13: ENTER: This line shows the typical falling depreciation percentages that occur in the 4th each year following the purchase/lease of a new vehicle. If you think the default amounts are not reflective of your particular vehicles depreciation, feel free to alter the percentages as you see fit.');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue"/></td>
 <td><input type="number" step="any" id="yr5" name="yr5" size="2" value="6" tabIndex="27" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #13: ENTER: This line shows the typical falling depreciation percentages that occur in the 5th each year following the purchase/lease of a new vehicle. If you think the default amounts are not reflective of your particular vehicles depreciation, feel free to alter the percentages as you see fit.');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue"/></td>
</tr>
<tr>
<td>6</td>
<td>7</td>
<td>8</td>
<td>9</td>
<td>10</td>
</tr>
<tr>
 <td><input type="number" step="any" id="yr6" name="yr6" size="2" value="5" tabIndex="28" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #13: ENTER: This line shows the typical falling depreciation percentages that occur in the 6th each year following the purchase/lease of a new vehicle. If you think the default amounts are not reflective of your particular vehicles depreciation, feel free to alter the percentages as you see fit.');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue;"/></td>
 <td><input type="number" step="any" id="yr7" name="yr7" size="2" value="4" tabIndex="29" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #13: ENTER: This line shows the typical falling depreciation percentages that occur in the 7th each year following the purchase/lease of a new vehicle. If you think the default amounts are not reflective of your particular vehicles depreciation, feel free to alter the percentages as you see fit.');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue"/></td>
 <td><input type="number" step="any" id="yr8" name="yr8" size="2" value="3" tabIndex="30" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #13: ENTER: This line shows the typical falling depreciation percentages that occur in the 8th each year following the purchase/lease of a new vehicle. If you think the default amounts are not reflective of your particular vehicles depreciation, feel free to alter the percentages as you see fit.');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue"/></td>
 <td><input type="number" step="any" id="yr9" name="yr9" size="2" value="2" tabIndex="31" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #13: ENTER: This line shows the typical falling depreciation percentages that occur in the 9th each year following the purchase/lease of a new vehicle. If you think the default amounts are not reflective of your particular vehicles depreciation, feel free to alter the percentages as you see fit.');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue"/></td>
 <td><input type="number" step="any" id="yr10" name="yr10" size="2" value="1" tabIndex="32" onKeyUp="clear_results(this.form);computeForm(this.form)" onFocus="help(1,'Line #13: ENTER: This line shows the typical falling depreciation percentages that occur in the 10th each year following the purchase/lease of a new vehicle. If you think the default amounts are not reflective of your particular vehicles depreciation, feel free to alter the percentages as you see fit.');if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue"/></td>
 </tr>
</tbody>
 </table>


<table width="100%">
 <tr>
 <td align="center" colspan="4">
 <input type="button" class="table-btn" value="Calculate" onClick="computeForm(this.form)" tabIndex="33" /> 
 <input type="button" class="table-btn" value="Reset" onClick="reset_calc(this.form)" />
 </td>
 </tr>
</table>

<table>
<thead>
 <tr>
 <th align="center"><strong>Description</strong></th>
 <th align="center"><strong>(A) Lease:</strong></th>
 <th align="center"><strong>(B) Loan:</strong> </th>
 <th width="125" align="center"><strong>Advice</strong></th>
 </tr>
</thead>
<tbody>
 <tr>
 <td nowrap> Monthly payment:</td>
 <td align="center">
 <input type="text" name="lsMoPmt" size="10" onFocus="help(2,'Line #14A: RESULT: This is the amount of your monthly lease payment -- which includes depreciation expenses, finance charges and sales taxes.')" tabIndex="34" />
 </td>
 <td align="center">
 <input type="text" name="lnMoPmt" size="10" onFocus="help(2,'Line #14B: RESULT: This is the amount of your monthly loan payment.')" tabIndex="35" />
 </td>
 <td width="125" align="center" valign="top" rowspan="8">

 <div id="help_2" style="height: 120px; text-align: left;">
 </div>

 </td>
 </tr>


 <tr>
 <td nowrap> Total of payments:</td>
 <td align="center">
 <input type="text" name="lsTotPmt" size="10" onFocus="help(2,'Line #15A: RESULT: This is the total amount of your lease payments over the term of the lease.')" tabIndex="36" />
 </td>
 <td align="center">
 <input type="text" name="lnTotPmt" size="10" onFocus="help(2,'Line #15B: RESULT: This is the total amount of your loan payments over the term of the loan.')" tabIndex="37" />
 </td>
 </tr>

 <tr>
 <td nowrap>Total interest expense:</td>
 <td align="center">

 </td>
 <td align="center">
 <input type="text" name="lnIntExp" size="10" onFocus="help(2,'Line #16B: RESULT: This is the total interest you will pay by the time you pay off your loan.')" tabIndex="38" />
 </td>
 </tr>


 <tr>
 <td nowrap> Net upfront expenses:</td>
 <td align="center">
 <input type="text" name="lsUpFront" size="10" onFocus="help(2,'Line #17A: RESULT: This is the amount of your upfront lease expenses -- which includes aquisition and title/registrations fees, plus any applicable sales tax due at signing, less any applicable rebates.')" tabIndex="39" />
 </td>
 <td align="center">
 <input type="text" name="lnUpFront" size="10" onFocus="help(2,'Line #17B: RESULT: This is the amount of your upfront loan expenses -- which includes sales tax and title/registrations fees, less any applicable rebates.')" tabIndex="40" />
 </td>
 </tr>

 <tr>
 <td nowrap> Depreciation expense:</td>
 <td align="center">

 </td>
 <td align="center">
 <input type="text" name="lnDeprecExp" size="10" onFocus="help(2,'Line #18B: RESULT: This is the total amount your vehicles depreciation over the term of the loan.')" tabIndex="41" />
 </td>
 </tr>

 <tr>
 <td nowrap>Forgone Interest earnings:</td>
 <td align="center">
 <input type="text" name="lsForgoneInt" size="10" onFocus="help(2,'Line #19A: RESULT: This figure represents the interest you could have earned had you invested the leases net up-front costs for the term of the lease.')" tabIndex="42" />
 </td>
 <td align="center">
 <input type="text" name="lnForgoneInt" size="10" onFocus="help(2,'Line #19B: RESULT: This figure represents the interest you could have earned had you invested the loan downpayment, trade-in allowance and net up-front costs for the term of the loan.')" tabIndex="43" />
 </td>
 </tr>

 <tr>
 <td nowrap>Total cost:</td>
 <td align="center">
 <input type="text" name="lsTotCost" size="10" onFocus="help(2,'Line #20A: RESULT: This is your total cost over the term of the lease.')" tabIndex="44" />
 </td>
 <td align="center">
 <input type="text" name="lnTotCost" size="10" onFocus="help(2,'Line #20B: RESULT: This is your total cost over the term of the loan.')" tabIndex="45" />
 </td>
 </tr>

 <tr>
 <td nowrap>Average cost per year:</td>
 <td align="center">
 <input type="text" name="lsAvgAnnCost" size="10" onFocus="help(2,'Line #21A: RESULT: This is the average annual cost of leasing the vehicle (Total Cost divided by Lease Term years).')" tabIndex="46" />
 </td>
 <td align="center">
 <input type="text" name="lnAvgAnnCost" size="10" onFocus="help(2,'Line #21B: RESULT: This This is the average annual cost of buying the vehicle (Total Cost divided by Loan Term years).')" tabIndex="47" />
 </td>
 </tr>



 </tbody>
 </table>
 </form>
 
 </div>
 
 <p>&nbsp;</p>
<a name="viewrates"></a>
<h3>Auto Loan Rates</h3>
<div id="mortcalcbiz-fulltable"></div>
 
 
<p>&nbsp;</p>
<p><img src="../img/lease-or-buy.png" width="1250" height="729" alt="Lease or Buy."></p>
<p>&nbsp;</p>

    
    
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