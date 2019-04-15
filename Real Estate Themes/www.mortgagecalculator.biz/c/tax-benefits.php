<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Mortgage Tax Benefits : Home Loan Interest Income Tax Deductions</title>		
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

   var Vloan_amount = sn(document.calc.loan_amount.value);
   var Vinterest_rate = sn(document.calc.interest_rate.value);
   var Vloan_term = sn(document.calc.loan_term.value);

   if(document.calc.home_value.value == "") {
      alert("Please enter the home value.");
      document.calc.home_value.focus();
   } else
   if(Vloan_amount == 0) {
      alert("Please enter the loan amount.");
      document.calc.loan_amount.focus();
   } else 
   if(Vinterest_rate == 0) {
      alert("Please enter the annual interest rate.");
      document.calc.interest_rate.focus();
   } else 
   if(Vloan_term == 0) {
      alert("Please enter the term of the loan in years.");
      document.calc.loan_term.focus();
   } else {

      //MORTGAGE PAYMENT

      var Vnum_pmts = Vloan_term * 12;

      var Vpayment = computeMonthlyPayment(Vloan_amount, Vnum_pmts, Vinterest_rate);
      document.calc.payment.value = fns(Vpayment,2,1,1,1);

      //POINTS COST
      var Vpoints = sn(document.calc.pts.value);
      if(Vpoints >= 1) {
         Vpoints /= 100;
      }
      var Vloan_points = Vloan_amount * Vpoints;
      document.calc.loan_points.value = fns(Vloan_points,2,1,1,1);
      
      //INTEREST PAID
      var i = Vinterest_rate;
      if(i >= 1) {
         i /=100;
      }
      i /=12;
      var first_period_int = Vloan_amount * i;
      var Vpurchase_month = document.calc.purchase_month.options[document.calc.purchase_month.selectedIndex].value;
      var Vinterest_paid = 0;
      var period_int = 0;
      var interest_bal = 12;
      var count = 0;
      var Vtest = 0;
      while(count <=12) {
         count += 1;
         if(count == 1) {
            period_int = first_period_int * 12 * .958333594;
            interest_bal = period_int;
         } else
         if(count == 12) {
            interest_bal = first_period_int * .6;
         } else {
            interest_bal = Number(interest_bal) - Number(first_period_int);
         }
   
         if(count == Vpurchase_month) {
            Vinterest_paid = interest_bal;
         }
      }

      document.calc.interest_paid.value =  fns(Vinterest_paid,2,1,1,1);

      //STANDARD DEDUCTION
      var Vstandard_deduction = 0;
      var Vfiling_status = document.calc.filing_status.options[document.calc.filing_status.selectedIndex].value;
      if(Vfiling_status == 1) {
         Vstandard_deduction = 5700;
      } else {
         Vstandard_deduction = 11400;
      }
      document.calc.standard_deduction.value =  fns(Vstandard_deduction,2,1,1,1);


      //INTEREST & POINTS
      var Vinterest_points = Number(Vloan_points) + Number(Vinterest_paid);
      document.calc.interest_points.value =  fns(Vinterest_points,2,1,1,1);

      //REAL ESTATE TAXES
      var Vtotal_taxes = sn(document.calc.real_estate_taxes.value);
      document.calc.total_taxes.value =  fns(Vtotal_taxes,2,1,1,1);

      //OTHER DEDUCTIONS
      var Vmedical_dental = sn(document.calc.medical_dental.value);
      var Vgifts_charity = sn(document.calc.gifts_charity.value);
      var Vtheft_losses = sn(document.calc.theft_losses.value);
      var Vjob_expenses = sn(document.calc.job_expenses.value);

      var Vother_deductions = Number(Vmedical_dental) + Number(Vgifts_charity) + Number(Vtheft_losses) + Number(Vjob_expenses);
      document.calc.other_deductions.value =  fns(Vother_deductions,2,1,1,1);

      //ITEMIZED DEDUCTIONS
      var Vitemized_deductions = Number(Vinterest_points) + Number(Vtotal_taxes) + Number(Vother_deductions);
      document.calc.itemized_deductions.value =  fns(Vitemized_deductions,2,1,1,1);

      //ADDITIONAL
      var Vadditional = Number(Vitemized_deductions) - Number(Vstandard_deduction);
      document.calc.additional.value =  fns(Vadditional,2,1,1,1);

      //TAX BENEFIT
      var Vtax_rate = document.calc.tax_rate.options[document.calc.tax_rate.selectedIndex].value;
      var Vstate_tax_rate = sn(document.calc.state_tax_rate.value);
      if(Vstate_tax_rate >= 1) {
         Vstate_tax_rate /= 100;
      }
      var total_tax_rate = Number(Vtax_rate) + Number(Vstate_tax_rate);
      var Vtax_benefit = Vadditional * total_tax_rate;
      document.calc.tax_benefit.value =  fns(Vtax_benefit,2,1,1,1);

      //AFTER TAX PAYMENT
      var monthly_tax_reduct = 0;
      if(Vpurchase_month < 12) {
         monthly_tax_reduct = Vtax_benefit / (Number(12) - Number(Vpurchase_month));
      } else {
         monthly_tax_reduct = Vtax_benefit * 10;
      }
      var Vafter_tax_pmt = Number(Vpayment) - Number(monthly_tax_reduct);
      document.calc.after_tax_pmt.value =  fns(Vafter_tax_pmt,2,1,1,1);

   }
		
}

function clear_results(form) {

   document.calc.payment.value = "";
   document.calc.loan_points.value = "";
   document.calc.interest_paid.value = "";
   document.calc.standard_deduction.value = "";
   document.calc.interest_points.value = "";
   document.calc.total_taxes.value = "";
   document.calc.other_deductions.value = "";
   document.calc.itemized_deductions.value = "";
   document.calc.additional.value = "";
   document.calc.tax_benefit.value = "";
   document.calc.after_tax_pmt.value = "";

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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/tax-benefits.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				<div class="main-heading"><h1> Mortgage Interest Tax Benefits Calculator</h1>
</div>
                    <ul id="breadcrumbs">

                        <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
                        <li><a href="https://www.mortgagecalculator.biz/c/budget-planner.php">Budget Planning</a></li>
                        <li>Tax Benefits</li> 
                  </ul>
                </div>   			
                <div class="bottom-section">
<p><img src="https://www.mortgagecalculator.biz/img/house-in-hands.jpg" alt="house" width="130" class="alignright" />     This calculator will help you to estimate the tax benefits of buying a home versus renting. </p>
                <p>While there may be income tax benefits of buying a home, these can be more than offset by the combination of maintenance, real estate taxes &amp; the costs associated with buying and selling a home (appraisal, inspection, real estate commissions, etc.); thus in most cases it only makes sense to purchase a home if you intend to live in it for many years &mdash; preferably for the period of the loan or longer.</p>
<p>The tentative new Republican party tax plan for 2018 intends to reduce the home mortgage interest deduction from $1,000,000 in mortgage debt to $500,000 in mortgage debt, while also signficantly increasing the standard deduction to $12,000 for individuals and $24,000 for couples. People with pre-existing mortgage debt will have the old $1,000,000 of mortgage debt interest deduction limit grandfathered in. If you lock in current rates you also lock in the interest deduction, though <a href="#viewrates"><strong>with rates around 4%</strong></a> a married couple would need over $600,000 in mortgage debt for the itemized interest-deduction to exceed the new standard deduction, while an individual would need over $300,000 in mortgage debt for the itemized interest-deduction to exceed the new standard deduction.</p>
                <p>See also: </p>
                <ul class="arrow">
                        <li><a href="https://www.mortgagecalculator.biz/c/rent-or-buy.php">rent or buy calculator</a></li>
                        <li><a href="https://www.mortgagecalculator.biz/c/affordability.php">home affordability calculator</a></li>
                        <li><a href="https://www.mortgagecalculator.biz/c/tax-savings.php">tax savings estimator</a></li>
 </ul>

<div class="table-block">
<form name="calc" method="post" action="#">
 <table>
 <tbody>

 <tr>
 <td>
 
 Home value:<br />
 
 </td>
 <td align="center">
 <input type="number" step="any" name="home_value" size="15" value="200000" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 
 Loan amount:
 
 </td>
 <td align="center">
 <input type="number" step="any" name="loan_amount" size="15" value="180000" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 
 <a href="#viewrates"><strong>Interest rate</strong></a> (%):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="interest_rate" size="15" value="6" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 
 Points:
 
 </td>
 <td align="center">
 <input type="number" step="any" name="pts" size="15" value="2" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 
 Loan term (# of years):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="loan_term" size="15" value="30" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 
 Month of Purchase:
 
 </td>
 <td align="center">
 <select id="purchase_month" name="purchase_month" size="1" onChange="clear_results(this.form)" width="180" style="width: 180px">
 <option value="1">January</option>
 <option value="2">February</option>
 <option value="3">March</option>
 <option value="4">April</option>
 <option value="5">May</option>
 <option value="6">June</option>
 <option value="7">July</option>
 <option value="8">August</option>
 <option value="9">September</option>
 <option value="10">October</option>
 <option value="11">November</option>
 <option value="12">December</option>
 </select>
 </td>
 </tr>

 <tr>
 <td>
 
 Filing status:
 
 </td>
 <td align="center">
 <select name="filing_status" size=1 onChange="clear_results(this.form)" width="180" style="width: 180px">
 <option value="1">Single</option>
 <option value="2" selected>Married</option>
 </select>
 </td>
 </tr>

 <tr>
 <td>
 
 Tax rate:
 
 </td>
 <td align="center">
 <select name="tax_rate" size=1 onChange="clear_results(this.form)" width="180" style="width: 180px">
 <option value=".10">10%</option>
 <option value=".15">15%</option>
 <option value=".25">25%</option>
 <option value=".28" selected>28%</option>
 <option value=".33">33%</option>
 <option value=".35">35%</option>
 <option value=".396">39.6%</option>
 </select>
 </td>
 </tr> 

 <tr>
 <td>
 
 State tax rate (%):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="state_tax_rate" size="15" value="5" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 
 Real estate taxes:
 
 </td>
 <td align="center">
 <input type="number" step="any" name="real_estate_taxes" size="15" value="1800" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 
 Medical & dental:
 
 </td>
 <td align="center">
 <input type="number" step="any" name="medical_dental" size="15" value="250" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 
 Gifts & charity:
 
 </td>
 <td align="center">
 <input type="number" step="any" name="gifts_charity" size="15" value="500" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 
 Thefts & losses:
 
 </td>
 <td align="center">
 <input type="number" step="any" name="theft_losses" size="15" value="100" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 
 Job expenses:
 
 </td>
 <td align="center">
 <input type="number" step="any" name="job_expenses" size="15" value="500" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>


 <tr>
 <td align="center">
 <input type="reset"  class="table-btn" value="Reset" />
 </td>
 <td align="center">
 <input type="button"  class="table-btn" value="Calculate" onClick="computeForm(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 
 Mortgage payment:
 
 </td>
 <td align="center">
 <input type="text" name="payment" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Loan points:
 
 </td>
 <td align="center">
 <input type="text" name="loan_points" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Interest paid:
 
 </td>
 <td align="center">
 <input type="text" name="interest_paid" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Standard deduction:
 
 </td>
 <td align="center">
 <input type="text" name="standard_deduction" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Interest & points:
 
 </td>
 <td align="center">
 <input type="text" name="interest_points" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Real estate taxes:
 
 </td>
 <td align="center">
 <input type="text" name="total_taxes" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Other deductions:
 
 </td>
 <td align="center">
 <input type="text" name="other_deductions" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Itemized deductions:
 
 </td>
 <td align="center">
 <input type="text" name="itemized_deductions" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Additional:
 
 </td>
 <td align="center">
 <input type="text" name="additional" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Tax benefit:
 
 </td>
 <td align="center">
 <input type="text" name="tax_benefit" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 After tax payment:
 
 </td>
 <td align="center">
 <input type="text" name="after_tax_pmt" size="15" />
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


 <h2>When Does It Make Financial Sense To Buy A Home?</h2>
<p> Home ownership is something that every American dreams about.   However, you have to think long and hard before determining if home   ownership is right for you at the moment. While you don't gain equity in   a property that you rent, you also avoid paying property taxes as well   as homeowners insurance. Renters also don't have to worry about   homeowners insurance premiums or making a sufficient down payment on a   property that they would like to rent. With that in mind, how do you   know when it is better to buy instead of rent?</p>
<h3>When Does It Make Sense To Buy Instead Of Rent?</h3>
<p>
  How do you know that it is better to buy instead of rent? Here are a few   questions that you should ask yourself if your lease is about to expire   and you want to buy instead of spend another year or two renting.</p>
<h4>
  Are You Going To Be Staying In The Area?</h4>
<p>
  It doesn't make sense to buy a home if you aren't sure that you will   still be in the area over the next five years. While it is relatively   easy to get out of your lease if you are renting an apartment, it is   almost impossible to sell your home if you are transferred to a new city   or accept a temporary assignment overseas. </p>
<h4>
  How Secure Are You In Your Employment?</h4>
<p>
  Do you see yourself working for the same company for the next year or   several years? At the very least, do you see yourself making roughly the   same salary over the next several years? If not, you may want to hold   off on buying a home and stick to renting.</p>
<h4>
  What Is The Cost Of Renting As Opposed To Buying A Home?</h4>
<p>
  There are several costs that you have to consider when buying a home   that you don't have to think about when renting an apartment. For   example, you will have to pay taxes, insurance and private mortgage   insurance if you don't have a down payment of at least 20 percent at   closing. These are all costs that can easily make it more expensive to   buy a home as opposed to renting. You also have to think about the   interest rate that you will pay to borrow money to buy your home. If the   interest rate is above 5 percent, you may want to wait until they come   back down.</p>
<h3>What Are The Tax Implications Of Buying A Home?</h3>
<p><img src="../img/house-and-keys.png" width="630" height="420" alt="Home with Keys." /> </p>
<p>One of the most appealing reasons to purchase a home is the mortgage   interest deduction that homeowners are entitled to. If you are currently   paying for private mortgage insurance, there is good news for you as   well if you started paying your current mortgage on or after January 1,   2007.</p>
<h4>
  Mortgage Interest Is Deductible To A Certain Extent</h4>
<p>
  The interest that you pay on your mortgage can be deducted under the following circumstances:</p>
<ul class="arrow"><li>You Are The Primary Borrower</li>
<li>You Are Deducting Interest Paid On A Principal Residence</li>
<li>Your Mortgages Must Not Exceed $1 Million</li>
<li>Interest On HELOC Loans Is Deductible For Balances Up To $100,000</li></ul>
<p>
  Homeowners who are thinking about taking the deduction need to itemize   it on their personal tax return. The only exception to that rule is if   proceeds from a home loan were used for business purposes. In that case,   you would deduct the interest on your business tax return.   Additionally, you are eligible to designate a second home as your   primary residence in a given year as long as it meets the guidelines set   forth by the IRS. </p>
<h4>
  How Is Private Mortgage Insurance Treated?</h4>
<p>
  Mortgage insurance policies are eligible for a deduction following many   of the rules set forth by the IRS to govern mortgage interest   deductions. To qualify for a deduction, the insurance must have been   paid on a primary residence for a loan that was originated between 2007 and 2013 as of the 2013 tax year. </p>
<h3>Are Your Newfound Tax Savings Offset By Additional Real Estate Taxes?</h3>
<p>
  The answer to that question is maybe. A potential homeowner isn't going   to know how much will be saved by deducting mortgage interest versus the   amount of property tax being paid until a house is purchased and the   loan is completed. </p>
<h4>
  Economically Healthy Areas Tend To Have Lower Property Taxes</h4>
<p>
  Generally, a city or town that is doing well economically is less   reliant on property taxes to put money in its coffers. Unfortunately,   the only way to know how much you will pay in property taxes is to look   up the actual number in the MLS or by asking a real estate agent. In   some cases, a house on one street could cost $2,000 a year in property   taxes while a house just a street over could cost $5,000 a year in   property taxes. </p>
<h4>
  Borrowers With Good Credit Pay Less Interest</h4>
<p>
  If you have good credit, a large down payment and have a stable   employment history, you will get a low interest rate. If you don't have   good credit or a large down payment, you will pay a higher interest rate   as well as mortgage insurance. In this scenario, being responsible with   money could cause you to lose out on the tax breaks that home ownership   offers you.</p>
<h4>
  What's The Verdict?</h4>
<p>
  Potential property owners who pay low property taxes and high interest   rates on their mortgage could benefit the most when it comes to the   mortgage interest deduction. Someone who pays $2,000 in property taxes   yearly while paying $5,000 a year in mortgage interest still nets $3,000   at the end of the year. On the flip side of the equation, someone who   paid $5,000 in property taxes and qualified for a $2,000 mortgage   interest deduction would actually lose $3,000 a year. </p>
<h3>You Can Reap The Rewards Of Selling Your Home In The Future</h3>
<p>
  Another appealing reason to buy a home is to sell it for a profit   several years down the road. Assuming that you got a good deal on your   home and the housing market stays relatively stable, you can sell your   home for as much as $50,000 or more in profit just a few years after you   buy it. </p>
<h4>
  Capital Gains Rules Are Different For Primary Residences </h4>
<p>
  Currently, you can avoid paying capital gains taxes on the first   $250,000 of profit from the sale of your principal residence. How does   this help you financially? Let's assume that you make $150,000 a year   and have owned your home for longer than a year. </p>
<p>
  On an ordinary investment, you would have to pay 15 percent on the   profit from the sale of your home. If you made $100,000 in profit, you   would have owed the government $15,000 in taxes. </p>
<p>
  However, in this case, you would owe the federal government nothing.   Depending on what state you live in, you may have to pay state capital   gains taxes from the sale of your home. Overall, you still come out   ahead by several thousands of dollars if you in the 25 percent tax   bracket or higher. </p>
<p>
  Borrowers in smaller tax brackets can come out ahead as well assuming   that they owned their home for less than a year. On a short-term capital   gain, those in the 10 or 15 percent tax bracket would have owed 15   percent on all capital gains. Assuming the same scenario as above, you   realize the same savings of $15,000 in federal taxes.</p>
<h4>
  Capital Gains Rules For Investors Putting Money Into A Retirement Account</h4>
<p>
  Investors who buy and sell real estate can avoid paying capital gains   taxes by investing through an IRA or any other self-directed retirement   account. Another benefit for investors is the ability to avoid paying   income tax on all rental receipts that are placed into a retirement   account. For those who are looking to diversify beyond stocks and bonds,   owning a rental property or two is a great way to accomplish that goal.   If you decide that you want to sell for a profit in the future, you   have the power to do so as the owner of the home.</p>
<h4>
  Capital Gains Rules For Investors Using A 1031 Exchange</h4>
<p>
  A <a href="http://www.1031.org/about1031/faq.htm">1031 Exchange</a> stipulates that a property owner can sell a property and invest that   profit into another like-kind property.  The new property must be used   to run a business or for some other productive activity. </p>
<p>
  The theory behind the rule is that an investor does not actually make a   profit if that money is then invested into another property. As long as   you follow the rules, you could potentially shelter yourself from   federal and state capital gains taxes indefinitely. </p>
<p>
  Fortunately, you don't need to be a professional real estate investor to   take advantage of this rule. If you are a homeowner who runs a daycare   from your home, you may be able to buy a larger house without paying   capital gains taxes if your run your daycare or other home business from   your new house as well.</p>
<p>
  There are many tax benefits to owning your own home. You can deduct   mortgage interest as well as private mortgage interest. The key is to   make sure that you are not having your interest deduction offset by the   amount of property tax that you must pay in a year. If you are making   less than $100,000 in a year, the mortgage interest deduction is your   best friend. If you are making more than $100,000 a year, you will   benefit in the long-run due to reductions in capital gains taxes.   Regardless of who you are, owning a home is a huge step in your life   that allows you to grow roots in the community while reducing your taxes   at the same time. </p>


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

