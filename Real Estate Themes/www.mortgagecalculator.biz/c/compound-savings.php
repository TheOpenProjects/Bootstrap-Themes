<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Compound Savings Calculator</title>
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

function computeForm(form)  {

   if(document.calc.interest.value == "") {
      alert("Please enter the Interest Rate.");
   } else 
   if(document.calc.moAdd.value == "") {
      alert("Please enter the Monthly Addition.");
   } else
   if(document.calc.payments.value == "") {
      alert("Please enter the Number of Years.");
   } else {
  
      var i = sn(document.calc.interest.value);
      i /= 100

      var VcompDays = 0;
      var maxCompsPerYr = 0;

      if(document.calc.compInt.selectedIndex == 0) {
         i /= 365;
         VcompDays = 1;
         maxCompsPerYr = 365;
      } else
      if(document.calc.compInt.selectedIndex == 1) {
         i /= 52;
         VcompDays = 7;
         maxCompsPerYr = 52;
      } else
      if(document.calc.compInt.selectedIndex == 2) {
         i /= 12;
         VcompDays = 30;
         maxCompsPerYr = 12;
      } else
      if(document.calc.compInt.selectedIndex == 3) {
         i /= 4;
         VcompDays = 91;
         maxCompsPerYr = 4;
      } else
      if(document.calc.compInt.selectedIndex == 4) {
         i /= 2;
         VcompDays = 182;
         maxCompsPerYr = 2;
      } else
      if(document.calc.compInt.selectedIndex == 5) {
         i /= 1;
         VcompDays = 365;
         maxCompsPerYr = 1;
      }

      var ma = sn(document.calc.moAdd.value);

      var VperiodDays = 0;
      var maxAddsPerYr = 0;

      if(document.calc.period.selectedIndex == 0) {
         VperiodDays = 1;
         maxAddsPerYr = 365;
      } else
      if(document.calc.period.selectedIndex == 1) {
         VperiodDays = 7;
         maxAddsPerYr = 52;
      } else
      if(document.calc.period.selectedIndex == 2) {
         VperiodDays = 14;
         maxAddsPerYr = 26;
      } else
      if(document.calc.period.selectedIndex == 3) {
         VperiodDays = 15;
         maxAddsPerYr = 24;
      } else
      if(document.calc.period.selectedIndex == 4) {
         VperiodDays = 30;
         maxAddsPerYr = 12;
      } else
      if(document.calc.period.selectedIndex == 5) {
         VperiodDays = 61;
         maxAddsPerYr = 6;
      } else
      if(document.calc.period.selectedIndex == 6) {
         VperiodDays = 91;
         maxAddsPerYr = 4;
      } else
      if(document.calc.period.selectedIndex == 7) {
         VperiodDays = 182;
         maxAddsPerYr = 2;
      } else
      if(document.calc.period.selectedIndex == 8) {
         VperiodDays = 365;
         maxAddsPerYr = 1;
      }

      //IF DEPOSIT FREQUENCY EQUALS COMPOUNDING FREQUENCY
      if(VperiodDays == VcompDays) {

         var ma = sn(document.calc.moAdd.value);
         var prin = sn(document.calc.principal.value);
         var origPrin = prin;
         var pmts = sn(document.calc.payments.value);
         pmts = Number(pmts * maxCompsPerYr);
         var count = 0;
    
         while(count < pmts) {

            newprin = prin + ma;
            prin = (newprin * i) + Number(prin + ma);
            count = count + 1;

         }

         var Vfv = prin;
         document.calc.fv.value = "$" + fn(prin,2,1);

         var totinv = Number(count * ma) + Number(origPrin);
         document.calc.totDeposits.value = "$" + fn(totinv,2,1);

         var Vtotalint = Number(prin - totinv);
         document.calc.totalint.value = "$" + fn(Vtotalint,2,1);


      //IF DEPOSITS ARE LESS FREQUENT THAN COMPOUNDING FREQUENCY
      } else
      if(VperiodDays > VcompDays) {
 
         var prin = sn(document.calc.principal.value);
         var origPrin = prin;

         var pmts = sn(document.calc.payments.value);
         pmts = pmts * 365;

         var maxComps = Number(pmts * maxCompsPerYr);
         var maxAdds = Number(pmts * maxAddsPerYr);

         var count = 0;
         var accumAdd = Number(ma);
         var numAdds = 1;
         var countAddDays = 0;
         var countCompDays = 0;
         var numComps = 0;
         var accumComp = 0;
         var currentInt = 0;
         prin =  Number(prin) + Number(ma);
    
         while(count < pmts) {

            //Add Addition if interval is met
            if(countAddDays == VperiodDays && numAdds < maxAdds) {
               prin = Number(prin) + Number(ma);
               accumAdd = Number(accumAdd) + Number(ma);
               accumPrin = Number(accumPrin) + Number(prin);
               numAdds = Number(numAdds) + Number(1);
               countAddDays = 1;
            } else {
               countAddDays = Number(countAddDays) + Number(1);
            }

            //Compound interest if interval is met
            if(countCompDays == VcompDays && numComps < maxComps) {
               accumComp = Number(accumComp) + Number(prin * i)
               prin = Number(prin * i) + Number(prin);
               currentInt = Number(prin * i);
               numComps = Number(numComps) + Number(1);
               countCompDays = 1;
            } else {
               countCompDays = Number(countCompDays) + Number(1);
            }

            count = Number(count) + Number(1);

         }

         var Vfv = prin;
         document.calc.fv.value = "$" + fn(prin,2,1);

         var totinv = Number(accumAdd) + Number(origPrin);
         document.calc.totDeposits.value = "$" + fn(totinv,2,1);

         var Vtotalint = Number(prin - totinv);
         document.calc.totalint.value = "$" + fn(Vtotalint,2,1);

      //IF DEPOSITS ARE MORE FREQUENT THAN COMPOUNDING FREQUENCY
      } else {

         if(document.calc.period.selectedIndex == 5) {
            VperiodDays = 60;
         }
 
         var prin = sn(document.calc.principal.value);
         var origPrin = prin;

         var pmts = sn(document.calc.payments.value);
         pmts = pmts * 365;

         var maxComps = Number(pmts * maxCompsPerYr);
         var maxAdds = Number(pmts * maxAddsPerYr);

         var count = 0;
         var accumAdd = 0;
         var numAdds = 0;
         var countAddDays = 0;
         var countCompDays = 0;
         var numComps = 0;
         var accumComp = 0;
         var depositIntervalDays = 0;
         var periodsPast = 0;
         var accumPrin = 0;
         var prinAvg = 0;

         var periodsPerComp = parseInt(VcompDays / VperiodDays,0);
    
         while(count < pmts) {
            //while(count < document.calc.testNum.value) {

            depositIntervalDays = Number(depositIntervalDays) + Number(1);

            //Accumulate period balances to figure average balance
            if(depositIntervalDays == VperiodDays || countCompDays == VcompDays) {
               periodsPast = Number(periodsPast) + Number(1);
               depositIntervalDays = 0;
            }

            //Add Addition if interval is met
            if(countAddDays == VperiodDays && numAdds < maxAdds) {
               prin = Number(prin) + Number(ma);
               accumAdd = Number(accumAdd) + Number(ma);
               accumPrin = Number(accumPrin) + Number(prin);
               prinAvg = accumPrin / periodsPast;
               numAdds = Number(numAdds) + Number(1);
               countAddDays = 1;
            } else {
               countAddDays = Number(countAddDays) + Number(1);
            }

            //Compound interest if interval is met
            if(countCompDays == (VcompDays - 1) && numComps < maxComps) {
               periodsPast = 0;
               prin = Number(prinAvg * i) + Number(prin);
               accumPrin = 0;
               accumComp = Number(accumComp) + Number(prinAvg * i)
               numComps = Number(numComps) + Number(1);
               countCompDays = 1;
            } else {
               countCompDays = Number(countCompDays) + Number(1);
            }

            count = Number(count) + Number(1);

         }

         var Vfv = prin;
         document.calc.fv.value = "$" + fn(prin,2,1);

         var totinv = Number(accumAdd) + Number(origPrin);
         document.calc.totDeposits.value = "$" + fn(totinv,2,1);

         var Vtotalint = Number(prin - totinv);
         document.calc.totalint.value = "$" + fn(Vtotalint,2,1);


      //END IF ELSE STATEMENT THAT DETERMINES WHICH ROUTINE TO RUN
      }

   //END NESTED IF TO CHECK FOR NON-NUMERIC ENTRIES
   }

}

function clear_results(form) {

   document.calc.fv.value = "";
   document.calc.totDeposits.value = "";
   document.calc.totalint.value = "";

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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/compound-savings.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				  <h1>Calculate Your Compounded Savings</h1></div>
    <ul id="breadcrumbs">
    <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
    <li><a href="https://www.mortgagecalculator.biz/c/savings.php">Savings</a></li>
    <li>Variable Compounding Rate</li>
    </ul>
   </div>
   			<div class="bottom-section">

   				<div class="table-block">

<h2>Getting the Rate You Deserve</h2>
<p>Saving money is important, but so is making sure your savings are working hard for you. Financial institutions not only offer different rates of interest on deposits, but they also compound savings at different frequencies. For any given rate of interest, the more frequently interest compounds the more money you will have saved up. In fact, the power of frequent compounding is so important that a 4.9% return which compounds daily will offer a greater return than a 5% rate which compounds annually.</p>
<h3>See Current Savings &amp; CD Rates</h3>
<p>Are you curious if your bank is offering you a good deal on your money? You can use the table beneath the calculator to <a href="#viewrates"><strong>see current rates</strong></a> for savings &amp; Certificate of Deposit products available.</p>
<blockquote>Compound interest is the eighth wonder of the world. He who understands it, earns it ... he who doesn't ... pays it. Compound interest is the most powerful force in the universe. Compound interest is the greatest mathematical discovery of all time." - Albert Einstein </blockquote>
<h2>Reviewing Your Bank Statements</h2>
<p>The Truth in Savings Act of 1991 requires banks to adhere to precise calculations and accounting methods to determine how much interest is earned. Both the daily balance &amp; average daily balance methods calculate how much interest should be paid at the end of each day. Your savings account statements should highlight which accounting method is used. The compounding frequency for your account should also be listed on your monthly statements. No matter which compounding frequency is used, most banks typically make monthly payments near the beginning of each month.</p>

<form name="calc" method="post" action="#">
 <table>
 <tbody>
 <tr>
 <td>Initial Savings:</td>
 <td align="center">
 <input type="number" step="any" name="principal" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td>Each <select name="period" size="1" onChange="clear_results(this.form)">
 <option value="0">Daily</option>
 <option value="1">Weekly</option>
 <option value="2">Bi-weekly</option>
 <option value="3">Half-monthly</option>
 <option value="4" selected>Monthly</option>
 <option value="5">Bi-monthly</option>
 <option value="6">Quarterly</option>
 <option value="7">Semi-annual</option>
 <option value="8">Annual</option>
 </select>
 I Will Add $:</td>
 <td align="center">
 <input type="number" step="any" name="moAdd" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td><a href="#viewrates"><strong>Interest Rate</strong></a> (APR %):</td>
 <td align="center">
 <input type="number" step="any" name="interest" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td>Compounding Frequency:</td>
 <td align="center">
 <select name="compInt" size="1" onChange="clear_results(this.form)">
 <option value="0">Daily</option>
 <option value="1">Weekly</option>
 <option value="2" selected>Monthly</option>
 <option value="3">Quarterly</option>
 <option value="4">Semi-annual</option>
 <option value="5">Annual</option>
 </select>
 </td>
 </tr>

 <tr>
 <td>Number of Years:</td>
 <td align="center">
 <input type="number" step="any" name="payments" size="15" onKeyUp="clear_results(this.form)"/>
 </td>
 </tr>

 <tr>
 <td align="center" colspan="2">
 <input type="button" value="Compute" onClick="computeForm(this.form)" class="table-btn"/>
 <input type="reset" value="Reset"  class="table-btn"/>
 </td>
 </tr>

 <tr>
 <td>Future Savings Value:</td>
 <td align="center">
 <input type="text" name="fv" size="15" />
 </td>
 </tr>

 <tr>
 <td>Total Deposits:</td>
 <td align="center">
 <input type="text" name="totDeposits" size="15" />
 </td>
 </tr>

 <tr>
 <td>Interest Earned:</td>
 <td align="center">
 <input type="text" name="totalint" size="15" />
 </td>
 </tr>
 </tbody>
 </table>
 </form>

 </div>
 
 <p>&nbsp;</p>
<a name="viewrates"></a>
<h3>Savings Rates</h3>
<div class="myFinance-widget" data-widget-id="b5781fc1-0381-4f5f-b9d0-70cfe2c67850" data-campaign="mortcalcbiz_fulltable_savings"></div>
 
<p>&nbsp;</p>
<p><img src="../img/growth-of-savings.png" width="1250" height="1098" alt="Growth of Savings."></p>
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