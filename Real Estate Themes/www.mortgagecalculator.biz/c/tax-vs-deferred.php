<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Compound Return Rates on Taxable vs Tax-deferred Investment Transactions</title>		
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

function ATEarnSingleDep(prin, intRate, numMonths, numCompPerYr, fedStTaxRate) {

var i = 0;
var intEarn = 0;
var singleFV = prin;

if(intRate >= 1) {
   intRate /= 100;
}

if(fedStTaxRate == "" || fedStTaxRate == 0) {
   fedStTaxRate = 0;
} else {
   if(fedStTaxRate >= 1) {
      fedStTaxRate /= 100;
   }
}

if(numCompPerYr == "" || numCompPerYr == 0) {
   numCompPerYr = 12;
}
intRate /= numCompPerYr;

var numPeriods = numMonths / 12 * numCompPerYr;

var accumAnnInt = 0;
var accumTotEarn = 0;
var tax = 0;

for(i=1; i <= numPeriods; i++) {
   intEarn = singleFV * intRate;
   accumAnnInt = eval(accumAnnInt) + eval(intEarn);
   accumTotEarn = eval(accumTotEarn) + eval(intEarn);
   singleFV = eval(singleFV) + eval(intEarn);

   if(i % numCompPerYr == 0) {
      tax = fedStTaxRate * accumAnnInt;
      accumTotEarn = eval(accumTotEarn) - eval(tax);
      singleFV = eval(singleFV) - eval(tax);
      accumAnnInt = 0;
   }
   
}

return accumTotEarn;

}



function ATPEarnSingleDep(prin, intRate, numMonths, numCompPerYr, fedStTaxRate, percTaxable) {

var i = 0;
var intEarn = 0;
var singleFV = prin;

var rate = intRate / 100;

var tax_rate = fedStTaxRate;
if(fedStTaxRate == "" || fedStTaxRate == 0) {
   tax_rate = 0;
} else {
   tax_rate /= 100;
}

var perc_taxable = percTaxable;
if(percTaxable == "" || percTaxable == 0) {
   perc_taxable = 0;
} else {
   perc_taxable /= 100;
}

if(numCompPerYr == "" || numCompPerYr == 0) {
   numCompPerYr = 12;
}
rate /= numCompPerYr;

var numPeriods = numMonths / 12 * numCompPerYr;

var accumAnnInt = 0;
var accumTotEarn = 0;
var tax = 0;
var taxable = 0;

for(i=1; i <= numPeriods; i++) {
   intEarn = singleFV * rate;
   accumAnnInt = eval(accumAnnInt) + eval(intEarn);
   accumTotEarn = eval(accumTotEarn) + eval(intEarn);
   singleFV = eval(singleFV) + eval(intEarn);

   if(i % numCompPerYr == 0) {
      taxable = accumAnnInt * perc_taxable;
      tax = tax_rate * taxable;
      accumTotEarn = eval(accumTotEarn) - eval(tax);
      singleFV = eval(singleFV) - eval(tax);
      accumAnnInt = 0;
   }
   
}

return accumTotEarn;

}



function computeAnnYieldSS(myYears, myPrin, myFV, myGuess, myCPY) {

var myDecRate = 0;

if(myGuess.length == 0 || myGuess == 0) {
   var myDecGuess = 6;
   } else {
   var myDecGuess = myGuess;
   if(myDecGuess >= 1) {
      myDecGuess = myDecGuess /100;
      }
   }

var myDecRate = myDecGuess / myCPY;
var myNewFV = 0;
var pow = 1;
var j = 0;

var myNPR = myYears * myCPY;

for (j = 0; j < myNPR; j++) {
   pow = pow * (eval(1) + eval(myDecRate));
}

myNewFV = (myPrin * pow);

//2 DEC PLACE AMOUNT
var decPlace2Rate = (eval(myDecGuess) + eval(.01)) / myCPY;
var decPlace2Amt = 0;
pow = 1;
j=0;
for (j = 0; j < myNPR; j++) {
   pow = pow * (eval(1) + eval(decPlace2Rate));
}
var decPlace2FV = (myPrin * pow);
decPlace2Amt = eval(decPlace2FV) - eval(myNewFV);

//3 DEC PLACE AMOUNT
var decPlace3Rate = (eval(myDecGuess) + eval(.001)) / myCPY;
var decPlace3Amt = 0;
pow = 1;
j=0;
for (j = 0; j < myNPR; j++) {
   pow = pow * (eval(1) + eval(decPlace3Rate));
}
var decPlace3FV = (myPrin * pow);
decPlace3Amt = eval(decPlace3FV) - eval(myNewFV);

//4 DEC PLACE AMOUNT
var decPlace4Rate = (eval(myDecGuess) + eval(.0001)) / myCPY;
var decPlace4Amt = 0;
pow = 1;
j=0;
for (j = 0; j < myNPR; j++) {
   pow = pow * (eval(1) + eval(decPlace4Rate));
}
var decPlace4FV = (myPrin * pow);
decPlace4Amt = eval(decPlace4FV) - eval(myNewFV);

//5 DEC PLACE AMOUNT
var decPlace5Rate = (eval(myDecGuess) + eval(.00001)) / myCPY;
var decPlace5Amt = 0;
pow = 1;
j=0;
for (j = 0; j < myNPR; j++) {
   pow = pow * (eval(1) + eval(decPlace5Rate));
}
var decPlace5FV = (myPrin * pow);
decPlace5Amt = eval(decPlace5FV) - eval(myNewFV);

var myPmtDiff = 0;

if(myNewFV < myFV) {

   while(myNewFV < myFV) {

      myPmtDiff = eval(myFV) - eval(myNewFV);
      if(myPmtDiff > decPlace2Amt) {
         myDecRate = eval(myDecRate) + eval(.01 / myCPY);
      } else
      if(myPmtDiff > decPlace3Amt) {
         myDecRate = eval(myDecRate) + eval(.001 / myCPY);
      } else
      if(myPmtDiff > decPlace4Amt) {
         myDecRate = eval(myDecRate) + eval(.0001 / myCPY);
      } else
      if(myPmtDiff > decPlace5Amt) {
         myDecRate = eval(myDecRate) + eval(.00001 / myCPY);
      } else {
         myDecRate = eval(myDecRate) + eval(.000001 / myCPY);
      }

      pow = 1
      j = 0;
      
      for (j = 0; j < myNPR; j++) {
         pow = pow * (eval(1) + eval(myDecRate));
      }
      myNewFV = (myPrin * pow);
   }

} else {


   while(myNewFV > myFV) {

      myPmtDiff = eval(myNewFV) - eval(myFV);
      if(myPmtDiff > decPlace2Amt) {
         myDecRate = eval(myDecRate) - eval(.01 / myCPY);
      } else
      if(myPmtDiff > decPlace3Amt) {
         myDecRate = eval(myDecRate) - eval(.001 / myCPY);
      } else
      if(myPmtDiff > decPlace4Amt) {
         myDecRate = eval(myDecRate) - eval(.0001 / myCPY);
      } else
      if(myPmtDiff > decPlace5Amt) {
         myDecRate = eval(myDecRate) - eval(.00001 / myCPY);
      } else {
         myDecRate = eval(myDecRate) - eval(.000001 / myCPY);
      }

      pow = 1
      j = 0;
      
      for (j = 0; j < myNPR; j++) {
         pow = pow * (eval(1) + eval(myDecRate));
      }
      myNewFV = (myPrin * pow);
   }


}

myDecRate = myDecRate * myCPY * 100;

return myDecRate;

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
   var Vyears = sn(document.calc.years.value);

   if(Vprincipal == 0) {
      alert("Please enter the amount invested.");
      document.calc.principal.focus();
   } else 
   if(VintRate == 0) {
      alert("Please enter the expected annual rate of return.");
      document.calc.intRate.focus();
   } else
   if(Vyears == 0) {
      alert("Please enter the number of years the amount will be invested for.");
      document.calc.years.focus();
   } else
   if(document.calc.taxRate.value == "") {
      alert("Please enter your marginal tax rate.");
      document.calc.taxRate.focus();
   } else
   if(document.calc.percentTaxable.value == "") {
      alert("Please enter the percentage of the tax-deferred earnings that will be taxable.");
      document.calc.percentTaxable.focus();
   } else {


      var Vmonths = Vyears * 12;
      var VnumCompPerYr = 1;
      var VtaxRate = sn(document.calc.taxRate.value);
      var VpercentTaxable = sn(document.calc.percentTaxable.value);

      var VtaxableEarnings = ATEarnSingleDep(Vprincipal, VintRate, Vmonths, VnumCompPerYr, VtaxRate);

      var VtaxableFV = Number(Vprincipal) + Number(VtaxableEarnings);
      document.calc.taxableFV.value = fns(VtaxableFV,2,1,1,1);


      var VdeferredEarnings = ATPEarnSingleDep(Vprincipal, VintRate, Vmonths, VnumCompPerYr, VtaxRate, VpercentTaxable);

      var VdeferredFV = Number(Vprincipal) + Number(VdeferredEarnings);

      document.calc.deferredFV.value = fns(VdeferredFV,2,1,1,1);

      var VtaxableAnnYield = computeAnnYieldSS(Vyears, Vprincipal, VtaxableFV, 6, 1);
      document.calc.taxableAnnYield.value = fns(VtaxableAnnYield,2,0,2,1) + "";

      var VdeferredAnnYield = computeAnnYieldSS(Vyears, Vprincipal, VdeferredFV, 6, 1);
      document.calc.deferredAnnYield.value = fns(VdeferredAnnYield,2,0,2,1) + "";


   }

}

function clear_results(form) {

   document.calc.taxableFV.value = "";
   document.calc.deferredFV.value = "";
   document.calc.taxableAnnYield.value = "";
   document.calc.deferredAnnYield.value = "";

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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/tax-vs-deferred.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				<div class="main-heading"><h1>Taxable Vs. Tax-deferred Calculator</h1>
</div>
                    <ul id="breadcrumbs">

                        <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
                        <li><a href="https://www.mortgagecalculator.biz/c/home-sellers.php">Home Sellers</a></li>
                        <li>Taxable vs Tax-deferred</li>
                    </ul>
                </div>
                <div class="bottom-section">
<p><img src="https://www.mortgagecalculator.biz/img/house-in-hands.jpg" alt="house" width="130" class="alignright" />         This calculator will help you to compare the future value and annualized yield differences between a taxable and a tax-deferred investment.        </p>
                <p>Over extended period of times tax-deferred investments may vastly out-perform taxed investments because the compounded growth happens before taxes are applied.</p>
                <p>A <a href="https://www.mortgagecalculator.biz/c/1031-exchange.php">1031 exchange</a> is a popular way for real estate investors to reinvest their increased equity without being taxed on the gains. According to <a href="http://www.irs.gov/taxtopics/tc701.html">IRS topic 701</a>, homeowners may also qualify to exclude up to $250,000 in capital gains from a home sale ($500,000 if filing jointly) from being treated as ordinary taxable income:</p>
                <blockquote>In general, to qualify for the exclusion, you must meet both the ownership test and the use test. You are eligible for the exclusion if you have owned and used your home as your main home for a period aggregating at least two years out of the five years prior to its date of sale. Generally, you are not eligible for the exclusion if you excluded the gain from the sale of another home during the two-year period prior to the sale of your home. Refer to <a href="http://www.irs.gov/publications/p523/index.html">Publication 523</a> for the complete eligibility requirements, limitations on the exclusion amount, and exceptions to the two-year rule. </blockquote>
                                
<div class="table-block">
<form name="calc" method="post" action="#">
 <table>
 <tbody>

 <tr>
 <td colspan="2">
 
 Amount invested ($):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="principal" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td colspan="2">
 
 Expected annual rate of return (%):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="intRate" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td colspan="2">
 
 Number of years invested (#):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="years" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td colspan="2">
 
 Marginal tax rate (%):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="taxRate" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td colspan="2">
 
 Percent of growth that is taxable (%):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="percentTaxable" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td align="center" colspan="2">
 <input type="reset" class="table-btn" value="Reset" />
 </td>
 <td align="center" colspan="1">
 <input type="button" value="Compute" class="table-btn" onClick="computeForm(this.form)" />
 </td>

 </tr>

 <tr>
 <td>
 <strong>
 Results
 </strong>
 </td>
 <td align="center">
 <strong>
 Taxable
 </strong>
 </td>
 <td align="center">
 <strong>
 Tax-deferred
 </strong>
 </td>
 </tr>

 <tr>
 <td>
 
 Future value:
 
 </td>
 <td align="center">
 <input type="text" name="taxableFV" size="15" />
 </td>
 <td align="center">
 <input type="text" name="deferredFV" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Annualized yield:
 
 </td>
 <td align="center">
 <input type="text" name="taxableAnnYield" size="15" />
 </td>
 <td align="center">
 <input type="text" name="deferredAnnYield" size="15" />
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
                  <p><img src="../img/1040.jpg" width="630" height="420" alt="Tax Documents." /></p>
                
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

