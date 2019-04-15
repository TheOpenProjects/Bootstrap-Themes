<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Mortgage Refinancing Calculator: Home Loan Refinance Rates</title>		
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

      if(pmtCount > 1200 || accumInt > 1000000000) {
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

      if(pmtCount > 1200 || accumInt > 1000000) {
         prin = 0;
      }

   }

return pmtCount;

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

   var alert_txt = "";
   var sum_cell = document.getElementById("summary");

   var pmt1 = sn(document.calc.payment.value);
   var prin = sn(document.calc.principal.value);
   var i1 = sn(document.calc.intRate.value);

   if(document.calc.principal.value == "") {
   } else
   if(document.calc.payment.value == "") {
   } else 
   if(document.calc.intRate.value == "") {
   } else 
   if((prin * (i1/100/12)) > pmt1) {
   } else
   if(document.calc.intRate2.value == "") {
   } else
   if(document.calc.nper2.value == "") {
   } else
   if(document.calc.closingCost.value == "") {
   } else
   if(sn(document.calc.intRate2.value) > sn(document.calc.intRate.value)) {
   } else {





      var prin1 = prin;

      var closeCostAmt = 0;
      var VcloseCost = sn(document.calc.closingCost.value);
      if(document.calc.ptsDol.selectedIndex == 0) {
         var closeCostPerc = Number(VcloseCost) / 100;
         closeCostAmt = closeCostPerc * prin;
      } else {
         closeCostAmt = VcloseCost;
      }

      var i2 = sn(document.calc.intRate2.value);

      var v_orgInt = computeFixedInterestCost(prin, i1, pmt1);
      document.calc.origInt.value = "$" + fn(v_orgInt,2,1);

      var prin2 = 0;

      if(document.calc.yesNo.selectedIndex == 0) {
         prin2 = prin;
      } else {
         prin2 = Number(prin) + Number(closeCostAmt);
      }

      var v_years_2 = sn(document.calc.nper2.value);
      var Vnper2 = v_years_2 * 12;

      var fpayment2 = computeMonthlyPayment(prin2, Vnper2, i2);
      fpayment2 = Math.round(fpayment2*100)/100;
      document.calc.payment2.value = "$" + fn(fpayment2,2,1);


      var fmoSave = Number(pmt1) - Number(fpayment2);

      document.calc.moSave.value = "$" + fn(fmoSave,2,1);
		
      var ftotInt2 = computeFixedInterestCost(prin2, i2, fpayment2);
      document.calc.totInt2.value = "$" + fn(ftotInt2,2,1);

      var fintSave = Number(v_orgInt) - Number(ftotInt2);

      if(fintSave <= 0) {
         document.calc.intSave.value = "$0.00";
      } else {
         document.calc.intSave.value = "$" + fn(fintSave,2,1);
      }

      var prin3 = prin2;
      var prin4 = prin;

      var intPort3 = 0;
      var intPort4 = 0;

      var prinPort3 = 0;
      var prinPort4 = 0;

      var accumInt3 = 0;
      var accumInt4 = 0;

      var accumPrin3 = 0;
      var accumPrin4 = 0;

      var amortIntSave = 0;

      var count3 = 0;

      while(amortIntSave < closeCostAmt) {

         intPort3 = prin3 * (i2/100/12);
         intPort4 = prin4 * (i1/100/12);

         prinPort3 = Number(fpayment2) - Number(intPort3);
         prinPort4 = Number(pmt1) - Number(intPort4);

         prin3 = Number(prin3) - Number(prinPort3);
         prin4 = Number(prin4) - Number(prinPort4);

         accumPrin3 = Number(accumPrin3) + Number(prinPort3);
         accumPrin4 = Number(accumPrin4) + Number(prinPort4);

         accumInt3 = Number(accumInt3) + Number(intPort3);
         accumInt4 = Number(accumInt4) + Number(intPort4);

         amortIntSave = Number(accumInt4) - Number(accumInt3);

         count3 = Number(count3) + Number(1);

         if(count3 > 1200) {break; } else {continue; }

      }


      document.calc.closeMo.value = count3;

      var fnetSave = Number(fintSave) - Number(closeCostAmt);
   
      var pmtUpDown = "";
      if(fpayment2 > pmt1) {
         pmtUpDown = "increase by $" + fn(Number(fpayment2) - Number(pmt1),2,1) + "";
      } else {
         pmtUpDown = "decrease by $" + fn(Number(pmt1) - Number(fpayment2),2,1) + "";
      }

      var intSaveYesNo = "";
      if(v_orgInt < ftotInt2) {
         intSaveYesNo = "pay an additional $" + fn(Number(ftotInt2) - Number(v_orgInt),2,1) + " in";
         intSaveYesNo += " interest charges over the life of the mortgage.";
      } else {
         intSaveYesNo = "save $" + fn(Number(v_orgInt) - Number(ftotInt2),2,1) + " in ";
         intSaveYesNo += "interest charges over the life of the mortgage. However, in order ";
         intSaveYesNo += "for this refinancing to yield any savings at all you will need to ";
         intSaveYesNo += "stay in your current home for at least " + count3 + " months.  ";
         intSaveYesNo += "That's how long it will take for the monthly interest savings to ";
         intSaveYesNo += "offset the closing costs attributable to refinancing.";
      }

      if(fnetSave <= 0) {
         document.calc.netSave.value = "$0.00";
      } else {
         document.calc.netSave.value = "$" +fn(fnetSave,2,1);
      }

      var v_summary = "If you refinance your current " + fn(i1,2,0) + "% ";
      v_summary += "mortgage to a " + fn(i2,2,0) + "% mortgage, your ";
      v_summary += "monthly payment will " + pmtUpDown + " and you will " + intSaveYesNo + "";

      sum_cell.innerHTML = "<p>&nbsp;</p><blockquote><strong> " + v_summary + " </strong></blockquote>";

   }
		
}


function clear_results(form) {

   var sum_cell = document.getElementById("summary");
   sum_cell.innerHTML = "";

   document.calc.origInt.value = "";
   document.calc.payment2.value = "";
   document.calc.moSave.value = "";
   document.calc.totInt2.value = "";
   document.calc.intSave.value = "";
   document.calc.closeMo.value = "";
   document.calc.netSave.value = "";

}

function reset_calc(form) {
      clear_results(document.calc);
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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/refinancing.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				<div class="main-heading"><h1> Mortgage Refinance Calculator</h1>
</div>
                    <ul id="breadcrumbs">

                        <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
                        <li>Refinancing</li>
                    </ul>
                </div>   			<div class="bottom-section">
<p> <!-- pmms --> This calculator will help you to decide whether or not you should refinance your current mortgage at a lower interest rate. </p>
                <p>Not only will this calculator calculate the monthly payment and net interest savings, but it will also calculate how many months it will take to break even on the closing costs. </p>
                <p>For your convenience, a table listing <a href="#viewrates"><strong>current mortgage refinancing rates</strong></a> is displayed beneath this calculator.. </p>

<div class="table-block">
<form name="calc" method="post" action="#">
 <table>
 <tbody>
 <tr>
 <td>Remaining Mortgage Balance:<br />
 <small>(call your mortgage lender and ask for the current payoff amount)</small>
 </td>
 <td align="center">
 <input type="number" step="any" name="principal" value="150000" size="15" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>Monthly Mortgage Payment (Principal & Interest Only):</td>
 <td align="center">
 <input type="number" step="any" name="payment" value="997.96" size="15" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>Your Current Mortgage Interest Rate:</td>
 <td align="center">
 <input align="center" type="number" step="any" name="intRate" value="7" size="15" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td><a href="#viewrates"><strong>Refinancing Interest Rate</strong></a>:</td>
 <td align="center">
 <input type="number" step="any" name="intRate2" value="6" size="15" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>Years You Will Refinance For:</td>
 <td align="center">
 <input type="number" step="any" name="nper2" value="30" size="15" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td valign="top">Closing Costs: 
   <select name="ptsDol" size="1" onChange="clear_results(this.form);computeForm(this.form)" width="150" style="width: 150px">
 <option value="points">percentage points</option>
 <option value="dollar">dollar amount</option>
 </select> 
 <small>(Typically, # of points is "2" or dollar amount is .02 times the principal)</small>
 
 </td>
 <td align="center">
 <input type="number" step="any" name="closingCost" size="15" value="2" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>Finance Closing Costs in Loan?</td>
 <td align="center">
 <select name="yesNo" size="1" onChange="clear_results(this.form);computeForm(this.form)" width="80" style="width: 80px">
 <option value="No">No</option>
 <option value="Yes">Yes</option>
 </select>
 </td>
 </tr>

 <tr>
 <td align="center">
 <input type="reset" class="table-btn"  value="Reset" onClick="reset_calc(this.form)" />
 </td>
 <td align="center">
 <input type="button" class="table-btn"  value="Calculate" onClick="computeForm(this.form)" />
 </td>
 </tr>

 <tr>
 <td>Monthly Payment if You Refinance:</td>
 <td align="center">
 <input type="text" name="payment2" size="15" />
 </td>
 </tr>

 <tr>
 <td>Monthly Payment Reduction:</td>

 <td align="center">
 <input type="text" name="moSave" size="15" />
 </td>
 </tr>

 <tr>
 <td>Months Needed for Interest Savings to Offset Closing Costs: </td>
 <td align="center">
 <input type="text" name="closeMo" size="15" />
 </td>
 </tr>

 <tr>
 <td>Total Interest Under Current Payment Plan: </td>
 <td align="center">
 <input type="text" name="origInt" size="15" />
 </td>
 </tr>

 <tr>
 <td>Total Interest if You Refinance: </td>
 <td align="center">
 <input type="text" name="totInt2" size="15" />
 </td>
 </tr>

 <tr>
 <td>Interest Saved by Refinancing:</td>
 <td align="center">
 <input type="text" name="intSave" size="15" />
 </td>
 </tr>

 <tr>
 <td>Net Refinancing Savings (interest savings less closing costs):</td>
 <td align="center">
 <input type="text" name="netSave" size="15" />
 </td>
 </tr>
 </tbody>
 </table>
 </form>
<div style="clear:both;"></div>
 <div id="summary"></div>

 </div>

<p>&nbsp;</p>
<a name="viewrates"></a>
<h3>Current Mortgage Refinance Rates</h3>
<div class="myFinance-widget" data-widget-id="0e398780-2190-4caf-9640-aecf30df3c9c" data-show-filters="true" data-property-value="250000" data-purchase-price="250000" data-loan-type="refi" data-percent="20" data-current-loan-balance="200000"  data-table-title="Refinance & Save With Today's Best Fixed Mortgage Rates" data-campaign="mortcalcbiz_fulltable_mortgage"></div>


 
 <h2>Mortgage Refinancing in Today's Economy</h2>
<p>Mortgage refinancing is available for several types of mortgage loans.    Mortgage loans have become volatile in today's economy due to numerous   economic and political factors that are unpredictable and significant.    Certain international mortgage markets have been negatively affected by   political unrest within certain sovereign jurisdictions.  Interest rates   for U.S. mortgage markets have been subsequently changed.  These   volatile price decreases and financial changes have critically affected   today's mortgage lending institutions.  Mortgage refinancing has been   changed as well.  Refinancing in today's mortgage market may be the   combination of several economic factors.</p>
<h3>Economic Factors Affecting Mortgage Refinancing</h3>
<p>Economic instability has changed today's employment market in the U.S.   and abroad.  Long term employees are being asked to retire early or are   being suddenly laid off.  These lay offs are the result of the economic   instability within the US. and the subsequent shifts to gain public   support for certain products and services.  Companies have elected to   lay off workers in order to preserve various cash reserves or to save on   employee benefit expenses.  The massive employment change in the U.S.   means that many home owners may not be able to keep their houses or may   need refinancing.  Refinancing often is a step towards regaining a   positive cash flow within a family unit. </p>
<h3>Why Refinancing Is a Current Option</h3>
<p>Some home owners are considering refinancing a mortgage because of other   cash flow concerns.  These cash flow deficits may have resulted from a   job lay off or a current employment position that makes less money.  The   job markets within the U.S. and abroad have shifted towards a global   economy and towards a digital one.  These critical changes are positive   in the long run but can be destructive for any short term gain.  Global   business employees can bring in added job skills that may not be   available within a domestic employment market.  These global companies   are investing in the U.S at a rapid pace, and this international   investment can bring about sustained business ventures within the U.S.   economy.  This type of global economic shift can mean that current U.S.   employment or domestic employment has diminished for once in demand   workers.  Loss of employment usually means that an individual's housing   is at stake since most workers are paying for a housing mortgage.    Refinancing is often an option for the employed worker who is working at   a lower paying job but has a good payment history.</p>
<h3>The Global Crisis and Investing in the Housing Market</h3>
<p>The global crisis of 2008 created many concerns about the housing   market.  The wealthier home owners saw this situation as an opportunity   to diversify into other housing markets and into other investment plans.    The newly displaced in other global economies chose to move to areas   that had stable financial and political environments.  This movement and   shift occurred frequently within the European housing market.  Many   wealthy home owners in these jurisdictions elected to move to the areas   that did not have critical change demands.  The wealthier homeowner paid   cash for a new house in another political jurisdiction.  Other   investment strategies were used as well.  This section of homeowners   chose to invest in cash assets that included residential resale housing   and other types of liquid investments such as derivatives and precious   metals. </p>
<h4>Refinancing as a Viable Option</h4>
<p><img src="../img/refinancing.png" width="630" height="473" alt="Refinancing." /></p>
<p>Refinancing became a viable option for those workers who were able to   gain other employment.  These job positions paid less but were adequate   for housing payments and daily expenses.  Refinance became a part of the   U.S. economy during the 2008 economic crisis and has become a viable   part of the economy today.  Refinancing means that the current mortgage   on the house is financed again, and this refinancing option is usually   at a lower interest rate.  There may be additional features that can be   included in a refinancing package for a homeowner.  A homeowner may   elect to add other debt into a refinance mortgage monthly payment.  This   allows the homeowner to pay back other expenses including credit cards   and car payments within a one payment mortgage loan.  This type of   refinancing can assist the individual or couple in paying only one   payment for several types of debts and paying these debts back at a   lower interest rate. </p>
<h4>Explaining Mortgage Refinancing</h4>
<p>There are several methods of refinancing a house.  Certain   jurisdictional expectations and rules are a part of any type of   financing or refinancing and can be further explained through an   Internet presentation with www.hud.gov.  Each new mortgage refinance has   a critical number of regulations that should be followed.  These   regulations include those that concern the current provider of the   mortgage loan, the expected APR, the costs of refinancing, the choices   of refinancing or consolidating certain loans, an individual's credit   score that is required to lend out today, the length of the refinance   agreement selected, the extra payment options that are available instead   of refinancing, and additional rules and regulations for each new   refinancing applicant.  The following are several tips that may be used   in order to gain the best refinancing plan for a home that is being kept   and refinanced:</p>
<p>The current provider of the housing mortgage has certain rules and   regulations that need to be followed in order to successfully close a   new refinancing house loan.  A current provider may have several options   available. The types of lending products may be important if the home   owner has certain limitations or expectations that are critical.  A deal   from the current lender may include a refinance on the primary   residence or a refinance on a second home or investment property.  A   primary residence will have certain exclusionary options since the home   owner is the full time resident there.  A full time resident may choose   better interest rates usually and may have a lower down payment amount   for the new refinanced mortgage.  There are additional exclusionary   options for the primary residence that is refinanced.  These refinancing   options may not be available for second home refinancing or vacation or   investment properties. </p>
<p>Certain refinancing packages are available for the primary residence as   well.  These lending options for a refinanced mortgage include a FHA   refinance that is government sponsored.  A homeowner who qualifies for   an FHA refinance loan needs to have a certain income within a restricted   range, and the other assets of the homeowner are restricted as well.    The U.S. government sponsors these loans and will pay these loans back   to the mortgage institution if the borrower defaults under certain   conditions.  These default conditions have a planned insurance program   that allows the U.S. government to use certain funds to pay back the   defaulted refinance loan for the borrower under certain circumstances.    These circumstances may include loss of job, health problems,   bankruptcy, unforeseen events that qualify, and additional situations.</p>
<p>A current provider may choose to offer fixed rate refinance loans,   adjustable rate refinance loans, a type of home equity refinance loan, a   second mortgage loan, a qualifying veteran's refinance loan, and a USDA   refinance loan.  There are loan down payment assistance programs for   those refinance loans that need a certain amount of security down   payment. </p>
<p>The APR that is quoted for a home refinance loan may not be the same as   the APR that is the final settlement amount.  This type of interest rate   will change as additional fees are added for the loan to close.  The   closing amount of the APR will be based on the interest rate that is   available for refinance loans the day of the loan closing.  This is a   part of the www.hud.gov package program that is available to all new   refinance customers.  Certain regulations that are part of the lending   industry are discussed with business administration experts, and their   Internet presentations are found with www.exec.hbs.edu. </p>
<p>The costs of any refinancing package include the points or fees that the   lending institution charges to process the new loan.  Costs for   refinance can include a down payment or a portion of the mortgage paid   back before the new loan is issued.  Costs are frequently listed out for   the new borrower in order to describe each cost.  A new refinanced   mortgage may have closing costs that are similar in amount to the   original mortgage.  A refinancing loan is another mortgage loan, and   these costs are similar.  A new borrower may look at the original loan   expenses to get an idea of what to expect for the closing costs of the   refinance loan.  The refinance loan is usually higher in interest rate   and can have additional closing costs and fees as well. </p>
<p>A borrower who is thinking about refinancing and keeping an upside down   housing property may look at various consolidation plans as well.    Consolidation plans include home equity loans, second mortgages for the   amount of the available equity, electing to only consolidate certain   debts, and choosing a reversed mortgage for those home owners who are at   least 62 years of age.  Consolidation can mean that the house has two   mortgages or an original mortgage and a line of credit lending product. </p>
<p>A credit score is important for a refinance loan.  The lending   institution looks at this credit score to see how the individual has   paid back any previous loans.  Previous lending needs to be current and   relevant.  Paying on several small and minimally used credit cards can   be a positive profile for borrowing.  Credit balances cannot be high   since this usually means that the borrower is overspending.  Credit   scores cannot be excessively low.  A good credit score is around 700 or   higher, and this level of credit is seen as a good risk by lending   institutions.  Lending institutions have certain safeguards in place   that are meant to protect them from defaulted loans.  This use of credit   protection does not mean that a defaulted loan is productive for a   lending institution, however.  Most banking companies want these   refinance loans paid back on time since these loans were approved for a   certain reason. </p>
<p>The length of the refinance loan can vary from half of the original loan   time to an increase in the number of months to repay the refinance   loan.  The length of the lending arrangements may be shortened in order   to pay back the house mortgage at an earlier time.  This shorter loan   payback time can allow a couple to retire earlier, for example.  A   longer time to repay a refinance loan from the original loan term can   provide a lower monthly payment for the displaced worker with the lower   paying job position.</p>
<h3>APR, What Is This?</h3>
<p>APR is the annual percentage rate or a finance charge for the mortgage   loan.  The finance charge is expressed as an annual rate.  There are   several ways to calculate the interest rate that is charged by a   financial institution for a mortgage.  A banking institution may present   the interest rate on a loan as a nominal amount.  The loan interest   rate may be expressed as an effective APR rate as well.  The annual   percentage rate for a lending product of any kind is an important   comparison factor for the loan.  This interest rate may be compared to   other loans of similar amounts as a method of choosing the best loan,   for example.  The APR is a commercial factor for the lending product   that is critical. </p>
<h4>The APR and the Economy</h4>
<p>The lending APR is directly related to how the banking industry is   performing at that moment in time.  This lending factor is directly   related to other financial markets as well.  It can be presented as an   adjustable and critical factor for the banking and financial markets in   general.  This rate may change as the additional investment markets are   enhanced.  The interest rates for certain derivatives products may vary   according to how these products are being bought and sold.  The   derivatives markets and equity markets may change as these products are   bought and sold on the open exchange markets.  These financial products   are local, but they are international as well.  The global financial   world is directly related on a large scale, and world events usually   affect each of these specific product markets.  The adjusted exchange   rates may cause certain lending products to have a higher interest rate   (APR) or a lower interest rate (APR).</p>
<h4>The Global Crisis and the APR </h4>
<p>The recent global economic crisis that began in 2008 has continued even   until today.  There are several financial repercussions from this type   of severe financial downfall.  Several international countries have gone   into debt in order to weather this credit crisis storm.  The heavy debt   has created other problems for these particular countries.  The global   financial markets have paid some of the consequences of defaulted   sovereign debt.  The local APR charged by a lending institution is   significantly tied to this type of sovereign debt default and other   credit issues that have occurred.  The international housing market has   been at the center of several of these economic storms as well.  The   local lender who takes an individual's mortgage application is well   aware of any significant problems with any of its borrowers.  The local   mortgage lender has consequences to consider after taking any   application for refinance.  The APR value charged by the local county   bank is significantly affected by any and all of these credit and debt   default concerns.</p>
<h3>Refinance Loan Costs</h3>
<p>Refinance loan costs may be expensive.  Some refinancing products have a   higher simple APR that is presented to a refinance customer.  A   refinance for a customer may mean a riskier lending arrangement for the   lending institution.  Refinancing may mean that the customer has other   debt that needs to be included in the refinance product, may have a   lower paying current job that has decreased the original ability to   repay the loan, has certain family or personal circumstances that have   required a refinancing of the house, and other changes that may be   riskier for a lending bank.  A mortgage lender usually looks at the   reasons for the refinancing need.  Some customers may want a lower   interest rate for their mortgage, but the underlying reason is often   critical for a refinance lender.</p>
<h4>Comparing APR Rates</h4>
<p> A current mortgage broker may have a finance charge that is expressed as   a nominal APR simple interest rate.  This simple interest rate is   presented as a yearly rate, and this is a standard method of describing a   mortgage product.  A simple annual percentage rate for one banking   institution may be compared to a banking product of another one.  A   current lender's simple APR may be compared to a local lender's APR, for   example.  One bank may have a better package than the other and may   have a lower interest rate for the refinance product.  A lower APR may   mean that the refinance loan is less expensive.  Usually a lower   interest rate that is charged is a positive and critical factor for any   refinance loan.</p>
<h4>Simple APR and Effective APR</h4>
<p>The simple annual percentage rate is used to compare the commercial   lending products available.  This may be the starting point for a   refinance customer.  The refinance customer may choose one or two   additional lenders to speak with about a loan.  The next steps are   important as well.</p>
<p>The simple APR includes the interest rate that is charged for a fiscal   year.  The effective APR is the actual rate that may be paid.  The   effective rate is the fee plus any compound interest that may be   calculated across a fiscal year.  A compound interest amount is taking   the next month and calculating the interest costs and taking the next   month and calculating the interest costs and so on.</p>
<p>The legal definition of the effective annual percentage rate that is   actually paid on a refinance loan may vary greatly in each jurisdiction   where the lending originated.  There are several additional fees that   may be added to the simple interest rate of a refinance product. </p>
<p>A participation fee may be added to the original lending product   expense.  A loan origination fee may be added to the lending product.    These fees are banker and banking fees that are a part of any banker's   income. </p>
<p>There are monthly service charges that assist in paying for the various   tasks needed to keep up with the refinance loan.  Late fees accrue when   the borrower is late with the repayments.  Late fees and penalties are   compounded and can become large over time.  The loan is serviced by the   back office staff that manages the timely payments of the refinance   loans and makes the collection calls to the late paying customer.    Collection letters are sent out by this staff, and the service fees and   monthly service charges pay for these upkeep charges. </p>
<h4>Mathematically True Interest</h4>
<p>The mathematically true interest rate is the effective APR.  The   effective or mathematically true number is the actual amount that is   paid each year on the refinance loan. In some jurisdictions it is   legally required to disclose the additional costs or fees that are a   part of any lending product.  This legal requirement may be standard for   any type of debt that originates within that particular country.  This   lending requirement is a safeguard for borrowers who may be considering a   certain refinance banking product.  This customer disclosure is in   place in order to protect the borrowers against committing to a lending   product that is impossible to pay back. </p>
<h4>Safeguarding for the Customer</h4>
<p>The new refinance customer usually receives a set of lending   instructions and certain loan disclosures.  These lending documents may   be read or taken to a legal professional for further analysis and   explanation.  The effective APR is usually a factor in any of these   lending disclosure documents.  The effective annual percentage rate may   be compared against other banking offers as well.  Displaying the   effective annual percentage rate is intended to make it easier to   compare lenders and loan options.</p>
<h4>Comparative Standard</h4>
<p>This lending rate is a comparative standard that is used by most   lenders.  The effective APR may be used to make important decisions   about any loan option and to choose the best refinance loan for that   particular customer. </p>
<h4>Other Lending Products</h4>
<p>There are other lending products that use an effective annual percentage   rate comparison.  Interest only loans may be researched, and the   particular interest rates offered for the refinance loans may be   compared effectively. </p>
<h4>Dependence on Loan Period</h4>
<p>The loan period that is chosen for the refinance loan is critical.  The   longer repayment periods are usually more expensive and can have a   higher interest rate or interest cost.  The shorter pay back times are   usually less expensive, and the interest rates or expense rates for   these loans are less. </p>
<h4>Making Extra Payments</h4>
<p> Making extra payments on any type of debt can allow for an early pay out   of the original loan.  The original mortgage loan may be paid back   early by making two mortgage payments per month instead of one payment.    Double mortgage payments are often used for an early pay off.  This   option may be chosen instead of refinancing, and the low original   interest rates will continue to apply as well.  This type of financing   is often recommended by business administration divisions of major   universities and can be researched further through   www.johnson.cornell.edu.</p>
<h4>Borrowing from a Community Bank</h4>
<p> Borrowing from a local lender has several factors to consider.  A   community lender is usually the first point of a refinance journey.    Borrowing from the current lender may make sense as well.  These two   banks may be the same.  The first order of business for a refinance   customer may be deciding where to apply for a refinance product.  Other   lenders are available, and one of these choices is the local mortgage   bank.  Whether to continue either of these choices may be an important   decision.  The APR or annual percentage rate is usually where a new   refinance borrower starts during this decision process.</p>
<h4>Other Options My Be Considered</h4>
<p>Other options may be considered.  The debt may be consolidated into a   single loan for a borrower.  Credit card debt, car loans, and personal   loans may be consolidated into a single pay back amount for each month.    The original mortgage product may stand as is, and the additional   credit card debts may be consolidated into a separate loan.  This can   save on high credit card debt fees as well.</p>
<h3>Mortgage Refinancing and the Obama Administration</h3>
<p>There are currently several approved refinancing programs that have been   authorized through the Obama Administration.  These refinance programs   are focused on helping underwater homeowners and providing an   historically low interest rate for these refinance products.  These   approved refinance and government authored programs usually do not   require a house appraisal and may apply to all loan types.  These   refinance loan programs were offered in 2013.</p>
<p>The FHA streamline finance product is a refinance loan that is available   to the current FHA mortgage holders.  The FHA or fair housing authority   endorsed this streamline refinance program May 31, 2009.  The   requirements to meet this type of lending refinance product are   available to read through for the general public.  The FHA rates or   interest charges for these lending refinance products are relatively low   in comparison to other standard lending refinance loans.  The PMI rates   are low as well.  The PMI or private mortgage insurance fee is an   insurance fee that is added to the monthly loan amount that needs to be   paid back on time each month.  The private mortgage insurance is   purchased for the lending institution on the loan as an assurance   against any loan defaults.  The PMI amount can be waived if the loan   amount has been paid down to a certain percentage of the total amount   due.  A large down payment on a refinance loan can allow the private   mortgage insurance fee to be waived.</p>
<h4>Appraisal Not Required for FHA Streamline Refinance</h4>
<p>An appraisal for the refinance loan is usually not required for an FHA   streamline refinance product.  An appraisal for the house can be   expensive and time consuming.  There can be certain requirements that   need to be met before the house appraisal can be completed as well.  Any   structural damage to the house or a leaky roof will be noted on any   house appraisal.  The house repairs may need to be completed before the   appraisal can be successfully filed with the bank. </p>
<h4>Primary Residence Waiver</h4>
<p>The house that is being refinanced through an FHA streamline refinance   program does not need to be the owner's primary residence.  The borrower   may own the house as an investment property and qualify for this type   of government sponsored refinance program.  The Obama Administration has   sponsored programs for underwater homeowners who may have a second   home, and this general information can be further research through   www.hud.gov.</p>
<h4>VA Loan Refinance</h4>
<p>A VA loan refinance is available for those military veterans who wish to   refinance an underwater real estate property.  The VA offers interest   rate reduction refinance (IRRR) plans for veteran homeowners who want to   reduce their interest rate on their home mortgage.  No appraisal is   required for a VA loan refinance.  This type of Obama Administration   refinance lending is available to qualified veterans who no longer live   in the property but wish to refinance a second home.  The lending   product is available to those military veterans who wish to refinance a   house that is not their primary residence.</p>
<p>These military veteran loans may be used by active military who are now   living overseas.  Deployed military can use this type of government   sponsored lending to refinance a residence that is currently being   rented as well. </p>
<h4>HARP Refinance</h4>
<p>HARP refinance is the home affordable refinance program (HARP).  This   particular home refinance lending program was launched in 2009 and was   designed to help homeowners with underwater mortgages.  The HARP plan   was created to assist with lower monthly payments and lower interest   rates or loan expenses.  The first version of the program helped some   homeowners but did not reached as many underwater owners as the plan   originally intended.  A new and improved version of this refinance plan   was released and called HARP 2.  This second plan revised the problems   that were noted with this first home affordable refinance program.  The   first plan was noted to have several complications.  The second home   affordable refinance program does not cap the loan to value at 125   percent but allows any loan to value.  The second home affordable plan   accepts more underwater loan scenarios and tends to be more   encompassing.</p>
<h4>USDA Home Loans</h4>
<p>The USDA home loan does not require a house appraisal, but the current   residence must be in a USDA footprint area and currently insured under   the USDA program.  The loan refinancing from a conventional loan or an   FHA loan does not qualify with this type of government sponsored   refinance loan.  The conventional original loan or the FHA original loan   must use other government sponsored lending products for refinancing   purposes. </p>
<h4>USDA Loans and No Credit Report Required</h4>
<p>No credit report is required for a USDA footprint area refinance.  The   current mortgage payments must be current, and all previous mortgage   payments for the last twelve months need to be paid on time.  An   employment verification is required for these loans.  An employment   verification means that the employer may be contacted in order to verify   that an applicant works there, what the salary is, and how long the   employee has been at the particular job location.  This lending product   requires that the borrower make enough money each month to easily pay   back the refinance loan on time.  Certain underwater property guidelines   apply as well.  There is no cash out option for this refinance lending   offer.  This type of refinance loan will finance a current mortgage   amount and a new guarantee fee (USDA PMI) which is usually 1.5 percent. </p>
<h4>Obama Administration Underwater Loans</h4>
<p>The Obama Administration began a series of refinance lending products in   2009 after the credit crisis and housing crisis of 2008 and afterwards.    The government sponsored refinance programs were developed to assist   those underwater homeowners refinance their mortgages into more   appropriate lending products.  The credit crisis tended to create   certain lending restrictions associated with traditional lending.  The   local banks or original mortgage holders may have developed additional   lending qualifications.  The government sponsored programs targeted   certain demographic populations that included  FHA mortgages, VA   mortgages, military housing, and USDA home loans.  These programs   continue today and are available to these particular lending   populations.  The home affordable refinance program began on a good note   but needed further revision as some of the lending requirements seemed   to be too complicated or restrictive.  Underwater housing has gained   successful assistance throughout the various economic challenges that   have existed since 2008. </p>
<h4>Obama Administration and Waivers</h4>
<p>Several of the lending products that are a part of the Obama   Administration refinance program have various requirement waivers.  The   FHA streamline refinance does not require a house appraisal, and the   borrower does not need to live in the property in order to qualify for   an FHA refinance.  No appraisal is required for the VA loan refinance   program as well.  This lending program is available to veterans who no   longer live in the property as a primary residence.  The HARP 2   refinance plan does not require the original 125 percent loan to value.    The USDA home loan program has waived the appraisal for the house but   does require that the residence be in a USDA footprint area and be   currently insured under the USDA program.  No credit report is required   for the USDA home refinance loan, but the borrower needs to verify   employment. </p>
<h3>Tips about the Application Process</h3>
<p>The refinance application process can be simplified by using several   tips and strategies.  Finding the right lender is the first step in any   loan process.  The lender is important because this banking institution   will determine the interest charges for the refinance loan, will   determine the collection process if the loan is in default, and will   determine the servicing benefits for the refinance product.</p>
<p>The original lender for the house mortgage is a good place to start.    The banking methods and benefits are already known to the borrower.  The   current lender has certain methods of communication with the borrower   that may be beneficial.  Online servicing of the refinance product can   allow for several payment options and account options that a borrower   may be looking for.  The current lender has certain banking personnel   that may be helpful to the current borrower.  There may be negative   features of the current mortgage that the borrower would like to   replace.  The banking representatives may be hard to reach, for example.    Calls may not be returned quickly, or there may be other negative   features for the current mortgage.  The interest rates for the current   loan may be high.</p>
<p>The length of the current loan may be inappropriate for the borrower's   financial needs.  The length of the new refinanced mortgage can be   shorter and can allow for an early retirement plan, for example.  The   interest charges for a new lender may be more appropriate as well.  The   length of the pay back for a new loan is critical since this pay back   term usually is an important determinant for the interest rate charged   for the refinance loan.  A shorter pay back period can have a lower   interest charge from the bank. </p>
<p>The amount of down payment for the new refinanced mortgage is critical.    A large down payment on a mortgage can result in lower interest   charges, a waiver of a PMI requirement fee, and a waiver of other   surcharges as well.  A sizable down payment can result in the loan being   paid back with smaller monthly payments, and the length of the    refinance loan may be shortened. </p>
<p>The type of loan that is selected is critical.  There are certain   refinance loan plans available for FHA customers, USDA customers, and VA   military personnel.  Other government sponsored programs are available   for those who have more traditional original loans.  The type of loan   selected may result in certain fee waivers and waivers of other   expensive requirements as well.  The government sponsored programs are   available for analysis through their website www.hud.gov.</p>
<p>The cost of refinancing can be reduced by selecting certain sponsored   programs that allow for qualified fees to be waived.  Other loan costs   can be reduced by choosing a lender who offers better interest rates or   charges for the loan.  Refinance costs can be lowered by looking at   several lending options before selecting the final lending product.</p>
<p>Other lending options are available for the homeowner who wishes to   refinance an existing house mortgage.  Loan consolidation is available.    The present credit cards, automobile loans, and personal loans may be   consolidated into a separate personal loan that is paid back in a   separate payment.  This banking institution may be chosen locally as   well.  There are national lenders who offer loan consolidation plans.    Doubling a current monthly payment on a house mortgage can provide a   quicker mortgage pay back.  This will keep the original mortgage but pay   back two payments monthly until the full loan is paid out.  This plan   helps to avoid certain refinancing fees and refinancing down payment   requirements. </p>
<p>There are cash out loans that may be chosen.  A cash out refinance loan   first pays out the original mortgage and pays out a cash amount as well.    The cash amount is taken from any equity that has accumulated in the   house value.  This type of refinance loan usually requires a house   appraisal in order to determine the amount of equity that the home owner   may have accumulated.  Some residential properties have equity   accumulated because of a sizable original down payment for the home.    Other home properties are currently underwater and may not have an   equity value.  A current appraisal usually determines this residential   value for the lending institution. </p>
<p>Interest only loans are possible.  This type of refinancing can bring   about a low monthly down payment because only the interest is paid back   each month.  Those home owners looking for a low monthly payment may   find that this type of lending is attractive.  Interest only loans   usually have a balloon payment later on in several years, however.  A   large balloon payment will be required in 5 to 7 years, for example.    These large payments can be refinanced, or the house may be sold at this   juncture. </p>
<h4>Tax Implications</h4>
<p>There may be certain tax implications to consider.  Taxes my be due on   the cash out funds that are taken from the home equity, for example.    Refinancing will allow certain fees to be deducted as homeowner fees as   well.  The lower mortgage payment may reduce the price of the home.  A   current house appraisal may find that the home is worth less in the   current economic market.  A reduced house price can bring about lower   property taxes for the house.  Any upgrades or repairs to the house can   be used as tax deductions for the year that these alterations occurred.    Some jurisdictions may allow certain types of amortization for the   house upgrades as well. </p>
<p>Rental income from the residential properties should be listed as income   for the appropriate tax year.  Rental properties can create home repair   tax deductions for the homeowner.  A rental property in a jurisdiction   that is outside of a city limit can have fewer tax bills.  A homeowner   who lives in the rental property for a portion of the fiscal year can   have tax savings for this property.  The refinance bills for this rental   property can be used as property deductions in some jurisdictions. </p>
<p>A resale of a home with a refinance mortgage can have several   implications.  The sold property will need to pay back any mortgage   liens that have additionally been placed on the residential property.  A   cash out refinance loan may have a lien that is similar to a second   mortgage and may need to be paid out in a certain order of value.    Second mortgage liens tend to have their own rules and regulations.    This type of lending should be reviewed by legal counsel before being   finalized.  Interest only loans will need to be satisfied as well.  The   interest payments include a lien for the balance of the refinance loan   on the property.  This type of refinancing loan may have certain   implications at closing, and there may be additional closing cost fees   to consider.  Certain of the refinance loan products have their own   rules and regulations and should be researched thoroughly if the home   owner plans to resale the property later on.  Staying in the property   for the duration of the refinance loan may be simpler, and these added   lending requirements would not apply in specific circumstances.  Legal   counsel may be necessary in order to successfully refinance several of   these exotic lending products. </p>
<h4>Closing on a Refinance Loan</h4>
<p>Closing on a refinance loan may be similar to the original loan closing.    The homeowner who uses the original lender may not have any surprises.    A different refinance lender may have other methods that are   unfamiliar.  The new lender should send certain details about what to   expect at closing.  These refinance closings are performed in an   attorney's office and take only a short time.  The documents are signed,   and any closing cost fees are paid at that time.  The attorney gives   the new borrower a copy of what has been signed.  A cash out refinance   loan will have a bank check from the attorney's trust fund.  The cash   out check is picked up at the refinance loan closing meeting. </p>
<h4>Summary</h4>
<p>Refinancing in today's financial market has several options available.    There are certain government sponsored refinance programs for the   homeowner who may be underwater and have negative equity in a   residential property.  There are several tips to follow to ensure that a   refinance lending process is successful and seamless.  Finding the   right refinance lender is important.  Each lender has certain   refinancing products available.  There are several government sponsored   programs that most commercial banks should have in their product plans.    The type of loan chosen is critical.  There are certain advantages to   gain by choosing a VA loan for a military residence, for example.    Certain requirements may be waived under various and specific   circumstances.  The amount of the mortgage down payment is important,   and the length of the loan is a significant determinant of the cost of   the residential refinance loan.  </p>
 
 
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

