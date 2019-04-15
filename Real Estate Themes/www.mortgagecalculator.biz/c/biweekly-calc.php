<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Biweekly Mortgage Calculator: Save Money With Bi-weekly Mortgage Payments</title>		
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

   var pmt1 = sn(document.calc.payment.value);
   var prin1 = sn(document.calc.principal.value);
   var rate = sn(document.calc.intRate.value);
   var alert_txt = "";

   if(pmt1 == 0) {
      alert("Please enter the amount of your mortgage payment.");
      document.calc.payment.focus();
   } else 
   if(prin1 == 0) {
      alert("Please enter the your mortgage's current principal balance.");
      document.calc.principal.focus();
   } else
   if(rate == 0) {
      alert("Please enter your mortgage's annual interest rate.");
      document.calc.intRate.focus();
   } else
   if(rate/100/12*prin1 >= pmt1) {
      alert_txt = "The mortgage terms you have entered are incompatable with each other. Please either ";
      alert_txt += "decrease the principal, decrease the interest rate, or increase the payment ";
      alert_txt += "amount until this alert message no longer appears.";
      alert(alert_txt);
      document.calc.payment.focus();
   } else {

      var pmt2 = pmt1;
      var origPrin = prin1;

      var prin2 = prin1;

      var intPort1 = 0;
      var intPort2 = 0;

      var prinPort1 = 0;
      var prinPort2 = 0;

      var accumInt1 = 0;
      var accumPrin1 = 0;

      var accumInt2 = 0;
      var accumPrin2 = 0;

      var i = rate;

      if (i >= 1.0) {
          i = i / 100.0;
      }

      var i1  = i  / 12;
      var i2 = i / 12;

      var count1 = 0;
      var count2 = 0;

      var Vwithout_equity_5 = 0;
      var Vwith_equity_5 = 0;

      var Vwithout_equity_10 = 0;
      var Vwith_equity_10 = 0;

      //document.calc.origInt.value = fns(accumInt1,2,1,1,1);


      while(prin2 > 0) {

         intPort2 = prin2 * i2;
         prinPort2 = pmt2 - intPort2;
         prin2 = prin2 - prinPort2;
         accumPrin2 = accumPrin2 + prinPort2;
         accumInt2 = accumInt2 + intPort2;

         if(count2 / 12 == 5) {
            Vwith_equity_5 = Number(origPrin) - Number(prin2);
         }
         if(count2 / 12 == 10) {
            Vwith_equity_10 = Number(origPrin) - Number(prin2);
         }

         if(count2 % 12 == 0) {
            prin2 = Number(prin2) - Number(pmt2);
         }

         count2 = count2 + 1;

         if(count2 > 600) {break; } else {continue; }

      }

      var Vwith_years = count2 / 12;
      document.calc.with_years.value = fns(Vwith_years,2,0,0,0);
      document.calc.without_after_bal.value = fns(Vwith_years,2,0,0,0);

      var bal_loaded = 0;
      var Vwithout_bal_due = 0;

      while(prin1 > 0) {

         intPort1 = prin1 * i1;
         prinPort1 = pmt1 - intPort1;
         prin1 = prin1 - prinPort1;
         accumPrin1 = accumPrin1 + prinPort1;
         accumInt1 = accumInt1 + intPort1;

         if(count1 / 12 > Vwith_years && bal_loaded == 0) {
            Vwithout_bal_due = prin1;
            bal_loaded = 1;
         }

         if(count1 / 12 == 5) {
            Vwithout_equity_5 = Number(origPrin) - Number(prin1);
         }
         if(count1 / 12 == 10) {
            Vwithout_equity_10 = Number(origPrin) - Number(prin1);
         }

         count1 = count1 + 1;

         if(count1 > 600) {break; } else {continue; }

      }
    
      //document.calc.biwkInt.value = fns(accumInt2,2,1,1,1);

      var Vwithout_years = count1 / 12;
      document.calc.without_years.value = fns(Vwithout_years,2,0,0,0);
      document.calc.without_cash_avail_yrs.value = fns(Vwithout_years,2,0,0,0);

      var Vwith_pmts_elim = (Number(Vwithout_years) - Number(Vwith_years)) * 12;
      document.calc.with_pmts_elim.value = Math.round(Vwith_pmts_elim);
      document.calc.without_pmts_elim.value = "0";

      var Vwith_pmt_savings = Vwith_pmts_elim * pmt1;
      document.calc.with_pmt_savings.value = fns(Vwith_pmt_savings,2,1,1,1);
      document.calc.without_pmt_savings.value = "$0.00";

      var Vwith_int_savings = Number(accumInt1) - Number(accumInt2);
      document.calc.with_int_savings.value = fns(Vwith_int_savings,2,1,1,1);
      document.calc.without_int_savings.value = "$0.00";

      document.calc.without_equity_5.value = fns(Vwithout_equity_5,2,1,1,1);
      document.calc.with_equity_5.value = fns(Vwith_equity_5,2,1,1,1);
      document.calc.without_equity_10.value = fns(Vwithout_equity_10,2,1,1,1);
      document.calc.with_equity_10.value = fns(Vwith_equity_10,2,1,1,1);

      document.calc.without_bal_due.value = fns(Vwithout_bal_due,2,1,1,1);
      document.calc.with_bal_due.value = "$0.00";

      var Vwith_avg_ann_save = Vwith_int_savings / Vwith_years;
      document.calc.with_avg_ann_save.value = fns(Vwith_avg_ann_save,2,1,1,1);
      document.calc.without_avg_ann_save.value = "$0.00";
    
      var Vwith_avg_mon_save = Vwith_avg_ann_save / 12;
      document.calc.with_avg_mon_save.value = fns(Vwith_avg_mon_save,2,1,1,1);
      document.calc.without_avg_mon_save.value = "$0.00";

      var i3 = .10 / 12;
      var Vfv = pmt1;
      var count3 = 1;
      while(count3 < Vwith_pmts_elim) {
         Vfv  = Number(Vfv  * i3) + Number(Vfv  + pmt1);
         count3 = Number(count3) + Number(1);
      }

      document.calc.without_cash_avail_30.value = "$0.00";
      document.calc.with_cash_avail_30.value = fns(Vfv,2,1,1,1);

   }
		
}

function clear_results(form) {

   document.calc.with_years.value = "";
   document.calc.without_after_bal.value = "";
   document.calc.without_years.value = "";
   document.calc.without_cash_avail_yrs.value = "";
   document.calc.with_pmts_elim.value = "";
   document.calc.without_pmts_elim.value = "";
   document.calc.with_pmt_savings.value = "";
   document.calc.without_pmt_savings.value = "";
   document.calc.with_int_savings.value = "";
   document.calc.without_int_savings.value = "";
   document.calc.without_equity_5.value = "";
   document.calc.with_equity_5.value = "";
   document.calc.without_equity_10.value = "";
   document.calc.with_equity_10.value = "";
   document.calc.without_bal_due.value = "";
   document.calc.with_bal_due.value = "";
   document.calc.with_avg_ann_save.value = "";
   document.calc.without_avg_ann_save.value = "";
   document.calc.with_avg_mon_save.value = "";
   document.calc.without_avg_mon_save.value = "";
   document.calc.without_cash_avail_30.value = "";
   document.calc.with_cash_avail_30.value = "";

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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/biweekly-calc.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				<div class="main-heading"><h1>Bi-Weekly Mortgage Payment Calculator</h1>
</div>
                    <ul id="breadcrumbs">

                      <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
                        <li><a href="https://www.mortgagecalculator.biz/c/term-comparison.php">Compare Loans</a></li>
                        <li>Biweekly Payments</li>
                    </ul>
                </div>   			<div class="bottom-section">
<p><img src="https://www.mortgagecalculator.biz/img/house-in-hands.jpg" alt="house" width="130" class="alignright" />    This free online calculator will show you how much you will save in interest expenses if you make 1/2 of your mortgage payment every two weeks instead of making a full mortgage payment once monthly.</p>
                <p> In effect, you will be making one extra mortgage payment per year, leading to significantly faster amortization -- without hardly noticing the additional cash outflow from the small overpayment. But, as you're about to discover, you will certainly notice the "increased" cash flow that will occur when you pay your mortgage off way ahead of schedule!             </p>

<div class="table-block">
<form name="calc" method="post" action="#">

 <table>
 <tbody>
 <tr>
 <td colspan="2">
 
 Enter the principal balance of your mortgage:<br />
 <small>(call your mortgage lender and ask for the current payoff amount)</small>
 
 </td>
 <td align="center">
 <input type="number" step="any" name="principal" size="15" value="250000" onKeyUp="clear_results(this.form)" onclick="this.value=''"/>
 </td>
 </tr>

 <tr>
 <td colspan="2">
 
 Your monthly mortgage payment:
 
 </td>
 <td align="center">
 <input type="number" step="any" name='payment' size="15" value="1373" onKeyUp="clear_results(this.form)" onclick="this.value=''"/>
 </td>
 </tr>

 <tr>
 <td colspan="2">
 
 Your mortgage's <a href="#viewrates"><strong>current interest rate</strong></a>:
 
 </td>
 <td align="center">
 <input type="number" step="any" name='intRate' size="15" value="5.2" onKeyUp="clear_results(this.form)" onclick="this.value=''"/>
 </td>
 </tr>

 <tr>
 <td align="center" colspan="2">
 <input type="reset" class="table-btn" value="Reset" />
 </td>
 <td align="center" colspan="1">
 <input type="button" class="table-btn" value="Compute" onClick="computeForm(this.form)" />
 </td>
 </tr>

 <tr>
 <td align="left">&nbsp;</td>
 <td align="left">
 <strong>
 Monthly</strong>
 </td>
 <td align="center">
 <strong>Biweekly
 </strong>
 </td>
 </tr>

 <tr>
 <td>
 
 Years to pay off:
 
 </td>
 <td align="center">
 <input type="text" name='without_years' size="15">
 </td>
 <td align="center">
 <input type="text" name='with_years' size="15">
 </td>
 </tr>

 <tr>
 <td>
 
 Interest savings:
 
 </td>
 <td align="center">
 <input type="text" name='without_int_savings' size="15" />
 </td>
 <td align="center">
 <input type="text" name='with_int_savings' size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Monthly payments eliminated:
 
 </td>
 <td align="center">
 <input type="text" name='without_pmts_elim' size="15" />
 </td>
 <td align="center">
 <input type="text" name='with_pmts_elim' size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Total payment savings:
 
 </td>
 <td align="center">
 <input type="text" name='without_pmt_savings' size="15" />
 </td>
 <td align="center">
 <input type="text" name='with_pmt_savings' size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Equity after 5 years:
 
 </td>
 <td align="center">
 <input type="text" name='without_equity_5' size="15" />
 </td>
 <td align="center">
 <input type="text" name='with_equity_5' size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Equity after 10 years:
 
 </td>
 <td align="center">
 <input type="text" name='without_equity_10' size="15" />
 </td>
 <td align="center">
 <input type="text" name='with_equity_10' size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Balance due after <input type="text" name="without_after_bal" size="6" /> years:
 
 </td>
 <td align="center">
 <input type="text" name='without_bal_due' size="15" />
 </td>
 <td align="center">
 <input type="text" name='with_bal_due' size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Average monthly savings:
 
 </td>
 <td align="center">
 <input type="text" name='without_avg_mon_save' size="15" />
 </td>
 <td align="center">
 <input type="text" name='with_avg_mon_save' size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Average annual savings:
 
 </td>
 <td align="center">
 <input type="text" name='without_avg_ann_save' size="15" />
 </td>
 <td align="center">
 <input type="text" name='with_avg_ann_save' size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Cash available after <input type="text" name="without_cash_avail_yrs" size="6" /> years:*
 
 </td>
 <td align="center">
 <input type="text" name='without_cash_avail_30' size="15" />
 </td>
 <td align="center">
 <input type="text" name='with_cash_avail_30' size="15" />
 </td>
 </tr>

 <tr>
 <td colspan='3'> 
 <small>*Based upon a 10% yield of the money saved over the life of the loan.</small>
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

 
 <h2>How to Save Money on Your Mortgage</h2>
<p> Usually coming in at around 30 percent of their income, a mortgage   loan payment is the largest payment most people make each month. Not   only is it often a large payment, but it is also a lengthy payment,   often taking homeowners most of their adult life to pay off. If they   only had to pay the purchase price of their homes, mortgage costs would   not be so burdensome, but the added interest can often cause people to   end up paying twice the purchase amount or more by the time they have   paid off their mortgage. </p>
<p>
  With this in mind, you may want to look for ways to spend less on your   mortgage. While buying a smaller house is always one option, the best   option is simply to make your money spread as far as possible by paying   more money towards your principle amount and wasting less money on   interest. Preparing ahead of time for homeownership, understanding your   loan and payment, paying ahead on your loan and refinancing to get the   best interest rate available are all ways to reduce your interest   payment and free yourself from your mortgage debt faster. </p>
<h3>Preparing Yourself Financially for Homeownership</h3>
<p>
  The first steps to homeownership actually begin long before you even   start looking at houses. You should begin by establishing a good credit   score, saving up money for a down payment and setting aside money in an   emergency fund. </p>
<h4>Establishing Your Credit Score</h4>
<p>
  Your credit score is a number assigned to you based on your past credit   history. It is based on factors such as whether you have always made   your bill payments on time, how much debt you owe, and how many   different companies you have credit accounts with such as banks, credit   card companies and utility companies. Companies use this number, which   represents their risk in lending you money, to determine if they should   approve you for things such as auto loans, credit cards and rental   agreements.</p>
<p>
  There are three main consumer credit reporting agencies: Equifax,   Experian and TransUnion. Every American citizen of working age who   possesses a social security number is entitled to one free credit report   from each of these agencies one time per calendar year. Obtaining your   actual credit score (the number) costs a small fee, but it is often   worth it. The official website to obtain copies of your credit reports   is: <a href="https://www.annualcreditreport.com/">AnnualCreditReport.com</a>. </p>
<p>
  It is essential that you view your credit reports regularly to make sure   that the reports do not contain any misinformation that could lower   your credit score. Your credit score is what qualifies your for credit.   If you have a high credit score, you should get approved easily and   receive an excellent interest rate. If you have a low credit score, you   may either receive high interest rates or you may not be approved at   all. </p>
<p>
  If you are looking to buy a home in the near future, you should first   check to make sure your credit report only contains accurate   information. You should check far enough in advance so there is time to   fix any errors or raise your credit score if it is too low to get a   favorable interest rate. If you find any inaccurate information on your   report, you should immediately call and have the information corrected.   If all the information in correct, but your scores are low, you should   immediately set out to improve your credit score by lowering your debt,   catching up on late payments or opening a greater variety of accounts to   establish more lines of credit. A high credit score can easily save you   thousands or even tens or hundreds of thousands of dollars by allowing   you to get a better interest rate on your home loan. </p>
<h4>Saving Up a Down Payment</h4>
<p><img src="../img/house-design.png" width="630" height="364" alt="House Design." /> </p>
<p>While you certainly do not have to have all the money upfront, buying a   home usually does require a rather large down payment. The typical down   payment required for a conventional bank loan is between five and 20   percent of the home's value. For a $300,000 home, a five percent down   payment would be $15,000, while a 20 percent down payment would be   $60,000. </p>
<p>
  There are other options available for some people, however. Veterans are   able to get a zero down payment veteran's loan backed by the federal   government. Veteran's loans are exempt from private mortgage insurance,   but they are not dischargeable in bankruptcy. The USDA Rural Development   Loan is available to people with an income below 115 percent of the   median income in their area who wish to buy a home in certain designated   rural areas. FHA loans allow people to purchase a home with only three   and half percent down. There are limits on FHA loan amounts, but people   are allowed to use gifts and donations from charities to help them make   their down payments. Many communities also have charities or   organizations that can help people finance homeownership. </p>
<p>
  Even if you are able to buy a home with a small down payment, you may   want to make a larger down payment anyway. Making a larger down payment   can lower your interest rate, help you afford a larger house or   eliminate the need to pay private mortgage insurance, a fee homeowners   pay as part of their mortgage amount when they have less than 20 percent   of their home's value in equity. You should not make a larger payment   than you need to if it will take away from your emergency fund, however.   You will want to make sure that you have a financial safety net in case   the unforeseeable happens. </p>
<p>
  Do be aware that the down payment amount does not include closing costs   such as fees for obtaining a mortgage, title insurance and transfer   taxes, which are due at closing and can cost you between two and seven   percent of the sale price. </p>
<h4>Setting Aside an Emergency Fund</h4>
<p>
  In addition to saving up a large down payment, you should also set money   aside in an emergency fund. Whether you buy a new house or an older   house, all homes will need some routine maintenance and repair at some   point. You will want to have the money set aside for this as repairs   such as roof replacements and basement leaks can be very costly.   Furthermore, a well-funded emergency fund will help protect you from   losing your home in a situation such as illness, accident, divorce or   job loss where you may have trouble making mortgage payments. Financial   guru Suze Orman recommends having an emergency fund equal to eight   month's income.</p>
<h3>Beginning Your Search</h3>
<h4>Get Prequalified for a Loan</h4>
<p>
  Once you have established a good credit score, saved up a down payment   and set aside money in an emergency fund, you are ready to start   searching for your dream home. Begin by getting prequalified for a loan.   This will let you know what price range you should look in and it shows   real estate agents and sellers that you are serious about buying a   home. Plus, it will speed up the process once you are ready to put in an   offer on a home you love. It is generally recommended that housing   payments be around 30 percent of a person's income, though the actual   amount people can comfortably afford will depend on factors such as how   much other debt they have and how reliable their income is.</p>
<h4>Start Looking at Houses in Your Price Range</h4>
<p>
  Now you are finally ready to start looking for houses in your price   range. It is best to look at a large number of homes in a variety of   locations, since the home you end up loving may not be the same as the   home you start off looking for. Tell your real estate agent what you   love and do not love about every home you see; he or she can help you   find a home that meets your dreams and expectations. Do not be surprised   if you cannot afford everything on your home wish list. Factors such as   location, number of bedrooms and bathrooms, updates and upgrades, and   nearby schools can all affect a home's value. Determine which features   are must-haves and find the home that is the best fit for you and your   family. Choosing a home in your price range is important in getting a   home with affordable payments</p>
<h4>Options for a Tight Budget</h4>
<p>
  If your budget is too small for the type of home you want or need, there   are options you can explore. If you are fairly handy, or know someone   who is, you may consider buying a fixer-upper. While you will want the   general structure of the house to be in good shape, a house that only   has cosmetic damage can be bought for less and fixed up easily and   affordably. You may also consider renting out part of your home either   to a roommate who lives with you or a renter who lives in a separate   part of your home. Having another person living in your home can really   help you afford your mortgage payments. You may also choose a smaller   home, a home with fewer features or a home in a less expensive   neighborhood.</p>
<h3>Shopping for a Mortgage Company</h3>
<p>
  When shopping for a mortgage company, you have two options: you can   either use a mortgage broker to find a mortgage lender for you or you   can find a lender yourself. While mortgage brokers do charge you for   their services, they do the work of finding a great rate for you, saving   you plenty of time and money. It can also be nice to have a   knowledgeable person available to help you through the sometimes   confusing home buying process. If you choose to shop for a mortgage   yourself, be aware that too many inquiries into your credit report by   various lenders may make it look as though you cannot get approved for   credit and may consequently lower your score. It will not hurt your   score if you shop around within a small time frame, such as a two week   span, however, so plan accordingly.</p>
<p>
  If there is a particular mortgage company you want to use but their   rates are not competitive, you may try bringing a competitor's rate   quote to them to see if they will match it. Some banks will be willing   to do this for you in an effort to get your business. </p>
<h3>Choosing a Loan</h3>
<p>
  When choosing your mortgage loan, it is essential that you understand   the various terms used. Understanding these terms will help you choose   the right loan for you. </p>
<h4>Loan Amount</h4>
<p>
  The loan amount is the amount of money you need to borrow to purchase   your house. The larger your down payment, the smaller the amount you   will need to borrow. Your loan amount is limited by the amount that you   qualify for based on your credit score. On the other hand, some banks   have minimum lending amounts, so you may not be able to obtain a very   small mortgage either. </p>
<h4>Interest Rate</h4>
<p>
  The interest rate is a percentage of the loan banks and other financial   institutions charge when they lend you money. This is how they make   money from your loan. With a lower interest rate, you can benefit from   smaller mortgage payments or you can make larger payments and pay less   interest over time. The interest rate you qualify for is based on   current housing market conditions, your credit score and the amount of   money you can put down on a house. If you do not qualify for a favorable   interest rate when you first buy your house, you may refinance for a   better interest rate later. </p>
<h4>Length of the Loan</h4>
<p>
  The length of a loan is how long it takes to pay off the loan. A 30 year   mortgage loan is typical, though 15 and 20 year loans are common as   well. Choosing to pay your mortgage off over a longer length of time   will result in smaller monthly payments, but more interest paid over   time. A shorter loan term will result in a slightly higher monthly   payment, but less interest paid over time. For example, a $300,000 loan   at a four percent interest rate will cost you $215,609 over 30 years,   but only $99,431 in interest over 15 years. If you can afford the higher   payment that comes with a shorter loan term, you can save yourself   hundreds of thousands of dollars with a shorter loan term.</p>
<h4>Points</h4>
<p>
  Mortgage &ldquo;points&rdquo; are an upfront amount you pay in order to lower your   interest rate. One point is equal to one percent of your loan, so if you   pay one point on a $300,000 loan, it will cost you $3,000. Every point   you purchase lowers your interest rate between 1/8 and 1/4 percent. You   can generally buy between one and three points. </p>
<p>
  Whether or not you buy any points is a personal decision. It can be   advantageous to purchase them if you can only get a high interest rate   and you plan on paying off your mortgage over a long period of time. It   is generally not advantageous to purchase them if you will not stay in   the home long enough to recoup the cost, or if buy them will prevent you   from putting down a large enough payment to avoid paying private   mortgage insurance.</p>
<h4>Types of Loans</h4>
<p>
  There are two main types of loan interest rates: fixed and adjustable   (also referred to as variable). With a fixed interest rate, you pay the   same interest rate throughout the life of the loan and your required   payment amount never changes. Thirty year fixed rate mortgages used to   be the only type of mortgage available and they are still the most   common today. Fixed rate mortgages protect people from unpredictable   interest rate fluctuations. They also allow people to lock in a low   interest rate that they will maintain until their loan is paid off.</p>
<p>
  With an adjustable interest rate mortgage (ARM), your interest rate   changes at set times throughout the term of your mortgage. While   adjustable rate mortgages may offer attractively low interest rates to   begin with, interest rates and payments can increase or decrease   dramatically with market conditions. They do always have a floor cap,   payment cap and life cap, which helps give homeowners some security.   ARMs are best for people who plan on taking advantage of temporarily low   interest rates and payments and then paying off their mortgages or   refinancing quickly, before interest rates climb. </p>
<h4>Prepayment Penalties</h4>
<p>
  When choosing a loan, you will very likely want to choose one that does   not have prepayment penalties, which are penalties homeowners incur by   paying ahead on their mortgages or paying off their mortgages early.   While these are relatively rare, they do still exist. Prepayment   penalties may decrease the further into the loan term you get, but they   can negate the benefits of paying off a mortgage early if they are too   high. You should always ask if your loan comes with prepayment before   signing on the dotted line.</p>
<h4>Other Factors</h4>
<p>
  A few other factors you may want to consider when shopping for a home   loan include the methods of payment allowed, the company's rating with   the Better Business Bureau and the company's branch availability, in   case you need to talk to someone in person. While these factors may not   directly affect you much financially, details like these could make your   life much easier or more difficult. If one bank only accepts checks and   you always forget to mail them in on time, finding a bank that does   auto-debits can save you a substantial amount in fees and penalties.</p>
<h3>Understanding Your Mortgage Payment</h3>
<p>
  Your mortgage payment does not go entirely and directly towards paying   down the amount you own. A mortgage payment may include payments for up   to five different things: principle, interest, private mortgage   insurance, property taxes and homeowner's insurance, each of which are   explained below.</p>
<h3>Principle</h3>
<p>
  The principle amount is the amount of your loan before interest is   applied. When you make a mortgage payment, some of the funds go to   interest and some goes to pay down the principle, or loan balance.</p>
<h3>Interest</h3>
<p>
  The interest on your loan is the amount the bank charges you to lend you   money. It is calculated as a percentage of your loan such as five   percent. This is how banks make money from your loan. The higher your   interest rate, the larger amount of money you will pay over the term of   your loan. The average interest rate available is published in the   newspaper and online, though you will soon get a sense of what is   available by shopping around at various banks and lending institutions.   Remember that the interest rates you qualify for will be based on your   credit score. If you have an unfavorable credit score, you should not   expect to receive the rates advertised, as those are often saved for   those with the best credit scores. A trusted banker can help you   determine what sort of rate you should expect based on your individual   credit score.</p>
<h4>Private Mortgage Insurance</h4>
<p>
  Private mortgage insurance, or PMI, is a fee you pay as part of your   mortgage if you make a down payment of less than 20 percent or if you   have less than 20 percent equity in your home. This fee helps to protect   the lender in the event that you default on your loan. Fees usually   range from 0.3 to 1.15 percent and are currently tax deductible through   2013. </p>
<p>
  You can avoid paying PMI by putting a down payment of 20 percent down or   greater when you buy your home. If you are unable to put this much down   when you first buy your home, you can request that your PMI payments be   discontinued once you have 20 percent equity built up in your home.   Lenders are required by federal law to discontinue charging you PMI once   your loan-to-value ratio hits 78 percent. Refinancing, having your home   appraised at a lower value, and taking out a home equity loan can all   cause you to need to pay PMI again.</p>
<h4>Property Taxes</h4>
<p>
  Homeowners can either pay property taxes by paying the tax collecting   agency directly or by paying into an escrow account each month and   having their taxes automatically paid. Property taxes are based on a   property's assessed value and are not negotiable. They pay for community   services such as schools, libraries, road work and emergency services. </p>
<h4>Homeowner's Insurance</h4>
<p>
  Homeowner's insurance is insurance that covers home repairs if your home   is damaged due to weather or fire, replacement of personal items that   are lost or stolen, and liability for damages or injuries caused by you,   your family or your pets. Nearly all lenders require you to show proof   of homeowner's insurance before they will give you a mortgage loan   because it protects them if something happens to your home. You can shop   around to find the best policy to meet your family's individual needs   to make sure you get the right amount of coverage for the right price.   Homeowner's insurance is often paid into the same escrow account as   property taxes are, and then both bills are paid automatically when they   become due. You can save money on your homeowner's insurance by   obtaining it from the same company where you have your car insurance or   life insurance. </p>
<h4>Fixed Rate Mortgage Payments</h4>
<p>
  If you have a fixed rate mortgage, your monthly payment for your   principle and interest will stay the same over the life of the loan   until your entire loan balance is paid off. (Your property taxes and   homeowner's insurance will likely vary slightly, however, usually going   up each year to account for inflation.) The first few payments you make   will go almost entirely to interest as your large balance will result in   a large amount of interest to be paid. As your loan balance is paid   down over time, less of your payment goes to interest and more of it   goes to paying off the principle.</p>
<h4>Adjustable Rate Mortgage Payments</h4>
<p>
  With an adjustable rate mortgage (ARM), your payment can fluctuate   widely due to changes in interest rate. Like with a fixed rate mortgage   payment, ARM payments largely go to interest in the beginning of the   loan term and are gradually put more towards the principle as the loan   amount decreases and less interest is accrued each month.</p>
<p>
  An exact breakdown of how much money goes to each of these five   categories (or four, if taxes and homeowner's insurance are lumped   together into a single escrow account) can be found on your monthly   mortgage statement or from your lending institution upon request. </p>
<h3>Should You Pay Off Your Mortgage Early?</h3>
<p>
  If you read the paperwork when signing papers at closing, you may have   noticed that over the life of the loan you can end up paying twice the   amount you are buying the home for once you factor in interest payments.   Opinions differ on whether or not paying off a mortgage early is the   best financial move, so you will have to weigh the options and decide   for yourself if it is the right move for your family.</p>
<h4>Reasons to Pay Off Your Mortgage Early</h4>
<p>
  Paying off your mortgage early means you will have one less bill due   each month. A mortgage is often a homeowner's largest monthly bill, and   having it paid off can free up a substantial amount of money for other   endeavors, whether you want to put the money towards investments,   traveling or just having more of a financial cushion each month. Many   people nearing retirement age especially want to get rid of their   mortgages since they will soon have little to no income coming in to pay   the mortgage bill every month. Paying off the mortgage also gives   people the peace of mind that comes with being completely debt free and   the security of knowing that no matter what happens, they will always   have a roof over their heads at night. </p>
<h4>Reasons to Not Pay Off Your Mortgage Early</h4>
<p>
  On the other hand, paying off your mortgage early does not always make   the best financial sense. If you are struggling to make ends meet as it   is, paying ahead on your mortgage will not give you any immediate   benefit. If you do not have an emergency fund and you come upon hard   times, all the money you poured into your mortgage is now gone and you   have nothing to fall back on. Things like basic living expenses and   medical bills should be the first priority. </p>
<p>
  Even if you do have extra funds each month, there may be better ways to   put your money to work for you. If you have high interest credit cards,   auto loans, department store credit cards or gas credit cards, those   should be paid off entirely before a mortgage with a low interest rate.   Also, it may be a smart financial move to put your extra money into   investments that can offer you a higher payout than a low-interest   mortgage. Furthermore, mortgage interest is tax deductible, so you get   some of it back at tax time anyway. </p>
<h3>Reducing Your Mortgage Payment</h3>
<p>
  The decision of whether or not you should pay off your mortgage early is   one that only you can make. It really depends on your current financial   situation---whether you have an emergency fund and/or other debts—and   what you think your financial situation will be like in the future. If   you decide that paying down your mortgage is the best move for you,   there are a few different ways to do so.</p>
<h4>Paying Ahead on Your Loan</h4>
<p><strong>Round Up Your Monthly Payments</strong></p>
<p>
  One very simply method of paying off your mortgage a little earlier is   simply to round up your monthly payments. For example, if you have a   $350,000 30-year mortgage at five percent, your monthly principle and   interest payment will be $1878.88. Without making any extra payments,   your mortgage will be paid off in 30 years and you will have paid   $326,395.24 in interest over the life of the loan. If you round up your   payments only $21.12 each month to make an even $1900 payment, your   mortgage will be paid off nine months earlier and you will have paid   $9,679.35 less in interest over the life of the loan. That is a savings   of almost $10,000 with only a little more than $20 extra a month.</p>
<p><strong>Pay Extra Each Month</strong></p>
<p>
  If, instead of rounding up your payments a little, you want to add a   more significant boost to your monthly mortgage payments, you can reduce   your loan term and amount of interest paid by even more. Using the   above example, if you add an extra $100 each month, your loan will be   paid off three years and two months earlier and you will have paid   $40,846.42 less in interest over the life of the loan. You do not need   to add the same amount to your payments every month or even add extra   every month. Anytime that you can add a little extra to your mortgage   payments, no matter the amount, it will help bring down your balance   faster.</p>
<p><strong>Make Biweekly Payments</strong></p>
<p>
  Mortgages are typically paid monthly, for a total of 12 payments each   calendar year. If you were to make a half-payment twice a month, you   would make 24 half-payments, or 12 full payments in a year. However, if   you were to pay bi-weekly, every other week, you would end up making 26   half-payments, or 13 full payments, in a year. In other words, by making   biweekly half-payments to your mortgage, you are essentially adding an   extra payment each year. </p>
<p>Using the same $350,000 mortgage as above as an example, your   half-payment amount would be $939.44—exactly half of your monthly   payment amount. By making half-payments instead of monthly payments,   however, your mortgage would be paid off in 25.3 years instead of 30 and   you would save $58,396 in interest over the life of your loan. This is a   great option for people who are paid bi-weekly anyways as they can just   set something aside from every paycheck.</p>
<p><strong>Make the Equivalent of 13 Payments a Year</strong></p>
<p>
  If you want to pay the equivalent of 13 payments in a year without going   to the hassle of writing 26 checks each year, you can also just add   enough to each monthly payment to equal an extra payment each year. By   dividing one payment by 12, you will get the amount that you need to add   each month to effectively make 13 payments each year. Sticking with our   same example, adding $156.57 extra to each monthly payment will result   in your loan being paid off the same four years and eight months sooner   with an interest savings of $59,382.51 over the course of the loan.</p>
<p><strong>Set Aside a Lump Sum</strong></p>
<p>
  You can also reduce your mortgage by making an extra payment if you find   yourself with an extra lump sum of money, such as at tax time. Making   an extra yearly payment of $1,000 will reduce your loan term by two   years and eight months and your total interest paid over the life of the   loan by $33,517.86. Money received as an inheritance, gift, work bonus   or legal payout can be used for the same purpose. </p>
<p>
  When you pay extra towards your mortgage payment, make sure you have the   extra amounts applied to the principal if you want to pay off your   balance faster. Otherwise the payments may simply be applied to the next   month's payment, resulting in you receiving a smaller bill next month   but not reducing your loan balance.</p>
<p>
  There are many good mortgage payment calculators available online that   you can use to see how payment changes you make can affect your loan's   length and amount. To see how adding additional money to your principle   each month can shorten and reduce your loan, use our <a href="https://www.mortgagecalculator.biz/c/extra-payments.php">extra payment calculator</a>.   To see how making bi-weekly payments can shorten and reduce your loan,  use the calculator at the top of this page.   If you have a specific pay-off date in mind and want to know what   payments you need to make to meet your goal, use our <a href="https://www.mortgagecalculator.biz/c/early-payoff.php">early payoff calculator</a>.</p>
<h3>Refinancing</h3>
<p>
  In addition to paying extra towards your mortgage, refinancing is   another method of helping you pay down your mortgage faster. Refinancing   offers people several benefits, such as lower interest rates, shorter   loan terms and modifications to loan terms and conditions.</p>
<p><strong>Lower Interest Rate</strong></p>
<p>
  If you obtained a home loan with a poor credit score or at a time when   interest rates were high, you may be able to obtain a lower interest   rate by refinancing. With a lower interest rate, less of your payment   goes to paying interest each month so more of your money is freed up to   pay off your principle amount faster. </p>
<p><strong>Shorter Term</strong></p>
<p>
  When you refinance your mortgage, you have the ability to choose any   loan length you wish for your new loan. Choosing a longer loan term   gives you smaller monthly payments, which is good for people struggling   to make their mortgage payments, but choosing a smaller loan term will   help you pay off your loan faster. If you are already seven years into a   30 year mortgage when you refinance, you may wish to make your new loan   term 23 years to stay on track, or 15 or 20 years to try to pay it off   faster. Because loans with shorter terms usually come with lower   interest rates, the difference in the payments for 15, 20 and 30 year   loans may not be all that different. </p>
<p><strong>Switch to a Fixed Rate or Adjustable Rate Mortgage</strong></p>
<p>
  Refinancing also allows you to change the type of mortgage you have. If   you have a fixed rate mortgage but interest rates are going down,   switching to an adjustable rate mortgage can help you get a more   favorable interest rate. While ARMs do carry more risk, if you plan on   only having the loan for a short time, the risk can be worth taking. On   the other hand, if interest rates are going up, you may find yourself   wanting to switch from an ARM to a fixed rate mortgage with more   affordable payments. </p>
<p><strong>Roll Other Debts into your Mortgage</strong></p>
<p>
  With a refinance loan through the federal Home Affordable Refinance   Program, homeowners can refinance at up to 125 percent of their home's   value. This extra money is paid to the homeowner in cash at closing and   the homeowner is free to spend it however he or she pleases, including   making other purchases or paying down other debts at higher interest   rates. While consolidating debts into one payment with a low interest   rate can save people trouble and money, you should be careful about   exchanging unsecured debt such as credit card debt for secured debt such   as a mortgage. If you miss credit card payments, you will lower your   credit score but not actually lose anything. If you miss house payments,   you may lose your home. </p>
<h4>When Refinancing Does Not Make Financial Sense</h4>
<p>
  While refinancing can be a great way to reduce your interest rate, pay   off your mortgage faster and save money over the life of your loan,   there are a couple times when refinancing does not make financial sense.   First of all, you should probably not refinance if a required appraisal   raises your home's value and reduces your equity-to-value ratio,   causing you to have to pay private mortgage insurance you were not   required to pay before. Any savings you would get from a lowered   interest rate would still end up going right to the bank as PMI   payments.</p>
<p>
  Secondly, refinancing might not be the right move for you if you do not   plan on staying in your home long enough to recoup the costs you pay at   closing. If refinancing costs you $2,000 and saves you $100 every month   on your mortgage payment, you will need to live in your home at least 20   months in order to recoup the costs and make refinancing worth it.   Furthermore, that $100 must be money that is actually saved in interest,   not just a payment that is reduced because it is spread out over a   longer period of time.</p>
<h4>Downsizing</h4>
<p>
  If you are serious about getting out of mortgage debt and living in a   house that is bigger than you need, you may want to consider downsizing.   By trading in your larger house for a smaller one, you can   significantly reduce or possibly even eliminate your mortgage payments   if the equity you have in your current home is enough to purchase a   smaller home outright. Downsizing also reduces your property taxes and   your homeowner's insurance, both of which are based in part on your   home's value or size. Downsizing can also reduce your electric, gas and   water bills as well. The money that you save with smaller payments in   each of these areas can be put towards paying ahead on your mortgage so   you can pay it off faster. </p>
<p>
  Do note that even after your mortgage is completely gone, you will   likely never be completely done spending money on your home. You will   still always have property taxes and homeowner's insurance to pay. You   will also want to put some money into home repairs and upgrades over   time. Eliminating your monthly principle and interest payments can be   very freeing, however. </p>
<h3>Saving Money on Homeownership</h3>
<p>
  In addition to saving money on your mortgage, there are a large number   of ways to save money as a homeowner. Whether these methods are used to   put more money in your pocket each month or to free up additional funds   to pay off your mortgage faster, they are worth looking into. </p>
<p><strong>Have a licensed inspector inspect your home before you move in.</strong> By having your home inspected before you buy it, you can save yourself   the trouble and hassle of buying a home with a number of problems you   may not know to look for. Home inspectors can let you know if home   wiring is out of date, if the roof desperately needs replacing, if the   home foundation is cracking or if there are carpenter ants in the walls. </p>
<p><strong>Keep up on home maintenance.</strong> Homes required a lot of upkeep.   Gutters need cleared out, furnace filters need changed and drier vents   need cleaned. Procrastinating on routine home maintenance tasks can end   up causing you many expensive problems later on. It is much easier and   cheaper to simply keep up with home maintenance from the time you move   in.</p>
<p><strong>Learn how to complete home improvement tasks yourself.</strong> Every so   often, homes need work done to them. While bigger jobs often require   trained professionals, there are many jobs around the house that you can   do yourself if you are handy. You can learn how to complete tasks such   as adding attic insulation or replacing broken electrical plugs easily   simply by reading how-to guides or watching youtube videos. Completing   small home tasks yourself can save you hundreds of dollars. Large,   complicated tasks really should be left to professionals, however.</p>
<p><strong>Sign up for budget plans.</strong> Many people may not know that   electric and utility companies often offer budget payment plans to help   homeowners average out their monthly payments. Instead of charging you   based on how much electricity you actually used for the month, some   electricity companies will charge you based on your average usage over   the past 12 months. This reduces the tendency for people to owe very   little in the winter and very large payments in the summer. </p>
<p>
  Setting out to pay off your mortgage early can be a lofty but incredibly   satisfying goal. While it is not for everyone, those who manage to free   themselves from mortgage debt can breathe a sigh of relief knowing that   they will always have a place to sleep at night no matter what   unforeseen financial obstacles come their way. Paying off a mortgage   early takes a great deal of hard work and determination, but it can be   entirely worth it to have that weightless, debt-free peace of mind that   comes with owning your home outright.</p>


				<div class="accordion accordion-close" id="section1">Sources &amp; Further Reading</div>
				<div class="accordion-content">


<p class="l-child">  http://cgi.money.cnn.com/tools/houseafford/houseafford.html<br>
  https://www.annualcreditreport.com/<br>
  https://www.bankofamerica.com/home-loans/mortgage/buying-vs-renting/understanding-mortgage-options.go<br>
  http://www.bankrate.com/finance/mortgages/4-ways-to-pay-off-your-mortgage-earlier-1.aspx<br>
  http://www.bankrate.com/finance/mortgages/down-payment-1.aspx<br>
  http://www.bankrate.com/finance/mortgages/pay-off-new-mortgage-in-four-years.aspx<br>
  http://www.bankrate.com/finance/mortgages/save-money-by-paying-off-mortgage-early-1.aspx<br>
  http://www.bankrate.com/finance/mortgages/the-basics-of-private-mortgage-insurance-pmi.aspx<br>
  http://www.bankrate.com/finance/mortgages/when-to-refinance-your-mortgage-1.aspx<br>
  http://www.bankrate.com/finance/refinance/types-of-refinance-loans.aspx<br>
  http://www.johnnymoneyseed.com/mortgage/paying-off-your-mortgage-early-is-silly/<br>
  http://www.realtor.com/home-finance/homebuyer-information/closing-costs-buyers-and-sellers-must-pay.aspx?source=web<br>
  http://www.realtor.com/home-finance/homebuyer-information/understanding-mortgage-loan-points.aspx?source=web</p>
                        </div>
 
 
                
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

