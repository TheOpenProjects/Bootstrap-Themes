<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Early Mortgage Payoff Calculator: Repay Your Home Loan Early</title>		
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

   var v_principal = sn(document.calc.principal.value);
   var i = sn(document.calc.interest.value);
   v_noYears = sn(document.calc.noYears.value);
   v_origPmt = sn(document.calc.origPmt.value);

   var alert_txt = "";

 {

      if (i >= 1.0) {
        i = i / 100.0;
      }

      i /= 12;

      var noMonths = v_noYears * 12;

      var pow = 1;

      for (var j = 0; j < noMonths; j++) {

        pow = pow * (1 + i);

      }

      var newPmt = (v_principal * pow * i) / (pow - 1);

      if(newPmt <= v_origPmt) {
         alert_txt = "Given the terms you entered your mortgage is already scheduled ";
         alert_txt += "to be paid off in less than " + v_noYears + " years.";
         alert(alert_txt);
         return;

      } else {

         var v_pmtAdd = Number(newPmt) - Number(v_origPmt);

         document.calc.pmtAdd.value = fns(v_pmtAdd,2,1,1,1);

         var prin = sn(document.calc.principal.value);
         var count = 0;
         var prinPort = 0;
         var intPort = 0;
         var accumInt = 0;
         var pmt = sn(document.calc.origPmt.value);

         while(Number(prin) > Number(pmt)) {
            intPort = prin * i;
            accumInt = Number(accumInt) + Number(intPort)
            prinPort = Number(pmt) - Number(intPort);
            prin = Number(prin) - Number(prinPort);
            count = Number(count) + Number(1);

            if(count > 1200) {
               clear_results(form);
               return;
               break;
            }
         }


         var v_origInt = accumInt;
         var v_newInt = (Number(newPmt * noMonths)) - Number(v_principal);
         var v_intSave = Number(v_origInt) - Number(v_newInt);
		 var fml = Number(document.calc.origPmt.value) + Number(v_pmtAdd,2,1,1,1);

         document.calc.intSave.value = fns(v_intSave,2,1,1,1);

         var v_summary = "If you would like to pay off your mortgage ";
         v_summary += "in " + v_noYears + " years instead of the ";
         v_summary += "current " + fns(count / 12,1,0,0,0) + " years, you will ";
         v_summary += "need to start making a second monthly mortgage payment ";
         v_summary += "in the amount of " + fns(v_pmtAdd,2,1,1,1) + ", <strong>bringing your total monthly payment ";
         v_summary += " to " + fns(fml,2,1,1,1) + "</strong>. This would ";
         v_summary += "cut your current mortgage interest cost ";
         v_summary += "from " + fns(accumInt,2,1,1,1) + " down ";
         v_summary += "to " + fns(v_newInt,2,1,1,1) + ", a savings ";
         v_summary += "of " + fns(v_intSave,2,1,1,1) + " in interest charges.";

         var v_summary_cell = document.getElementById("summary");
         v_summary_cell.innerHTML = "<p>&nbsp;</p><blockquote><strong>  " + v_summary + " </strong></blockquote>";

      }

   }

}

function clear_results(form) {

   var v_summary_cell = document.getElementById("summary");
   v_summary_cell.innerHTML = "";

   document.calc.pmtAdd.value = "";
   document.calc.intSave.value = "";

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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/early-payoff.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				<div class="main-heading"><h1> Home Loan Payoff Calculator</h1>
</div>
                    <ul id="breadcrumbs">

                        <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
                        <li><a href="https://www.mortgagecalculator.biz/c/budget-planner.php">Budget Planning</a></li>
                        <li>Early Payoff Goals</li> 
                  </ul>
                </div>
                <div class="bottom-section">
<p><img src="https://www.mortgagecalculator.biz/img/house-in-hands.jpg" alt="house" width="130" class="alignright" />   
 This calculator will show you the additional extra monthly payment you will need to make on your current mortgage or car loan in order to pay it off within a specified number of years. It will also show you how much interest you will save if you make the calculated additional payment each month, from now until your mortgage is paid off.              </p><p>
 Note: When entering your current monthly loan payment amount, be sure to enter only the principal and interest portion of your payment &amp; do not include ancilary expenses like insurance.
 </p>

<div class="table-block">
<form name="calc" method="post" action="#">

 <table>
 <tbody>
 <tr>
 <td>
 
 Current loan balance:
 
 </td>
 <td align="center">
 <input name="principal" type="number" step="any" value="200000" size="15" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='200000'?'':this.value;" onblur="this.value = this.value==''?'200000':this.value;"/>
 </td>
 </tr>

 <tr>
 <td>
 
 <a href="#viewrates"><strong>APR</strong></a>:
 
 </td>
 <td align="center">
 <input name="interest" type="number" step="any" value="6" size="15" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='6'?'':this.value;" onblur="this.value = this.value==''?'6':this.value;"/>
 </td>
 </tr>

 <tr>
 <td>
 
 Current monthly payment (principal & interest):
 
 </td>
 <td align="center">
 <input name="origPmt" type="number" step="any" value="1400" size="15" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='1400'?'':this.value;" onblur="this.value = this.value==''?'1400':this.value;"/>
 </td>
 </tr>

 <tr>
 <td>
 
 Years you would like to pay off your loan in:
 
 </td>
 <td align="center">
 <input name="noYears" type="number" step="any" value="10" size="15" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='10'?'':this.value;" onblur="this.value = this.value==''?'10':this.value;"/>
 </td>
 </tr>

 <tr>
 <td align="center">
 <input type="button"  class="table-btn" value="Reset" onClick="reset_calc(this.form)" />
 </td>
  <td align="center">
 <input type="button"  class="table-btn" value="Calculate" onClick="computeForm(this.form)" />
 </td></tr>


 <tr>
 <td>
 
 Additional monthly payment required:
 
 </td>
 <td align="center">
 <input type="text" name="pmtAdd" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Interest savings:
 
 </td>
 <td align="center">
 <input type="text" name="intSave" size="15" />
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
<h3>Current Mortgage Rates</h3>
<div class="myFinance-widget" data-show-filters="true" data-widget-id="0e398780-2190-4caf-9640-aecf30df3c9c" data-property-value="250000" data-purchase-price="250000" data-percent="20" data-current-loan-balance="200000"  data-table-title="Save Money With Today's Best Fixed Mortgage Rates" data-campaign="mortcalcbiz_fulltable_mortgage"></div>


 
 <h2>Tips to Pay Off Your Mortgage Early</h2>
<p> In a macroeconomic environment that is full of insecurity, home   owners have a special responsibility and opportunity. Although it is   true that many people found their houses to be a financial burden during   the thick of the 2008 worldwide crisis, those that were able to stay on   top of their payments actually found that their real estate was more of   an asset than ever before.</p>
<p>
  It behooves the smart home owner to find ways to pay off a mortgage as   early as possible in times of economic volatility. In a situation where a   house is paid off or at least has some positive equity in it, the real   estate can serve as an added buffer against any other financial troubles   that a home owner may face. </p>
<p>
  Below are just a few of the best tried and true ways to pay off a   mortgage early, improving your current financial standing and your long   term credit score as well as your leverage for business and retirement.</p>
<h3>Shorten The Loan Term  </h3>
<p>Shorten the time frame of the loan with your financial institution. No matter what other conditions are in your financial contract with your   financial institution, shortening the time frame will almost always   help your chances of paying off your loan early. Not only will a shorter   time frame allow less interest on the loan to accrue, but it also tends   to focus the efforts of the individual who is paying off the loan to   fit within the structure that he or she has set for the transaction.</p>
<p>
  If you notice, the foxed interest rate for 15 year mortgage loans is   usually much lower than the 30 year fixed interest rate for any given   piece of real estate. In some cases, the difference in interest rates   can reach above a full percentage point. A quick calculation on any of   the free mortgage calculators around the Internet  will show you that   you can literally save hundreds of thousands of dollars simply by   taking this one tip to heart.</p>
<p>
  Most banks consider individuals who take on a shorter time frame much   less of a risk than those who take a conventional 30 year mortgage loan.   They assume that you must have some extra funds available; they are   therefore much more likely to offer you better interest rates as well as   deals that you simply may not get if you only consider the norm. If you   have not yet settled on a financial institution to bankroll your real   estate purchase, try negotiating with bankers based on a 15 year   mortgage plan rather than a 30 year mortgage plan. The respect and the   benefits that they will offer you may surprise you, especially if they   know that you have not yet committed yourself to a bank yet.</p>
<p>
  The downside to this strategy is that the payments for a 15 year fixed   rate mortgage will always be substantially higher because of the shorter   time frame. However, with proper budgeting and a few renegotiation   techniques (some of which are discussed in this article), most home   owners are actually able to save themselves this money despite their   best efforts to convince themselves otherwise.</p>
<p>
  First of all, make sure that you did not sign a contract that penalizes   you for paying off your house early. If you have yet to sign the   documents that solidify the terms of your loan with your financial   institution, make sure that this provision is not included in the   wording. This can be tricky; a reputable real estate lawyer without ties   to your financial institution should be consulted in order to make sure   that this is the case. If you have already signed financial documents   with this early bird provision, you should do your absolute best to   renegotiate your agreement so that it is taken out.</p>
<p>
  In many cases, a financial institution will negotiate an early bird   payoff clause out of a real estate agreement in exchange for a higher   interest rate on the loan. Although they believe that they will be   getting more money out of you because of this, you can turn the tables   on them if you wait to renegotiate until you have enough money to pay   off your mortgage early, thereby shortening the time frame that the   interest has to accumulate on your loan. Under no circumstances should   you let your bank know that you have additional funds to pay off your   loan early if you are trying to renegotiate an early bird clause out of   your financial contract. Keep that extra money in another financial   institution.</p>
<p><img src="../img/amortization.png" width="630" height="363" alt="Amortization." /></p>
<h3>Bi-weekly Payments  </h3>
<p>Pay your mortgage biweekly instead of monthly. More frequent payments means less time for interest to accrue on the   principal balance of a loan. Alone, taking this tip into account can   save you tens of thousands of dollars on the purchase of an average   piece of real estate. Combined with a short time frame, a home owner can   save six digits easily.</p>
<p>
  Biweekly payments are also considered less risky to a banker than   monthly payments. The more often that a banker receives money from you,   the happier that he or she will be. Keep in mind that the immediacy of   money has a value that is just as important, if not more, than the face   value of that money. If your bank receives your money two weeks in   advance for the life of your loan, then they can begin earning interest   on that money and investing it two weeks earlier. Accrued over the   lifetime of a mortgage loan, this adds up to a considerable profit for a   bank. You should have this knowledge on hand when they try to distract   you by saying that receiving your money more quickly does them no good,   as many bankers will. If you are paying off your mortgage in a biweekly   fashion rather than monthly, then you have a great deal of leverage when   it comes to negotiating a fixed interest rate that is at the bottom of   the range that your banker gives you for your credit score.</p>
<h3>Refinance at a Lower Rate  </h3>
<p> If you have the chance, refinance. However, make sure that it is advantageous to you to do so. Contrary to popular belief, refinancing is not always to the advantage   of the home owner. If you are in a good position (your payments have   been made on time and your house has positive equity), then you owe it   to yourself to research the benefits of refinancing with your financial   institution at a time that is convenient to you, not them.</p>
<p>
  As this article is written, both variable as well as fixed rate mortgage   interest rates around the industrial First World are at all time lows   based on the actions of the Federal Reserve or central banks in those   countries. However, this nearly free money will not last. At some point,   the central banks will have to inflate the currency in order to avoid   other financial problems that are sure to occur with the quantitative   easing that has been occurring in response to the dual housing and   banking crises of 2008. Although there are many people who can make a   good educated guess, the actions of the central banks in these countries   are not regulated by any governmental body. Basically, they can change   the interest rate whenever they want.</p>
<p>
  Because the interest rate is not in your hands, you should consult a   highly reputable and trusted financial expert before you undertake any   sort of variable refinancing plan. Fixed rate refinancing is safer   because the rate is locked in no matter what happens to the outside   economy. </p>
<p>
  If, after consulting with a legal, financial, real estate and accounting   professional you believe that interest rates will remain where they are   within the time frame that you plan to pay back your loan to your bank,   then you may safely consider a variable rate refinance. This will allow   you to take advantage of the absolute lowest interest rates that are   available on the market, as the variable interest rates are always lower   than fixed interest rates on a piece of real estate, all else being   equal.</p>
<p>
  If, after the same consultations, you believe that interest rates will   rise significantly within the time frame that you plan to pay off your   loan to your financial institution, then you should renegotiate a fixed   rate mortgage with your bank - but only if you determine with your team   that you will actually be paying less money overall for your house.   Banks have armies of lawyers and accountants working on their side for   one reason: to increase their profits. The process is much more complex   than simply looking at an interest rate number. Be sure to consult your   team before making a final decision on a renegotiation. Remember that   you can incorporate quicker payments or bigger payments at any time in   order to save money and pay back a loan more quickly.</p>
<h3>Variable Interest Rate Considerations  </h3>
<p>Consider variable rates if you have a timeline to pay your house off completely before a shift in the economic climate. As mentioned before, variable interest rates provide a home owner with a   good team and a personal handle on the economy the ability to save even   more money on the purchase of a home. Therefore, under the correct   circumstances, a variable rate purchase or renegotiation should   definitely be considered.</p>
<p>
  This tip deserves its own subheading because of the evil rap that the   variable rate gets. Variable rates are not evil in and of themselves;   home owners simply get themselves in trouble by focusing only on the low   interest rate rather than the plan to actually pay back the loan before   the bank raises the rate or the market changes cause an increase in the   monthly payments of a home owner.</p>
<p>
  In order to take full advantage of a variable rate, a home owner should   have a definite time line for paying back a home loan. This timeline   should usually be shorter than 15 years. This will usually require a   great deal of additional capital that is stowed away specifically for   the purpose of paying back the home loan. Only under these circumstances   should a variable loan be seriously considered; however, it is a great   way to save a large amount of money on a home loan.</p>
<h3>Leverage Income Tax Refunds  </h3>
<p>Use any tax refunds that you receive to pay off the debt more quickly. Tax refunds can certainly be repurposed in order to pay off your   mortgage more quickly. On top of that, the mortgage deduction will help   to reduce your tax burden for the following year as well.</p>
<p>
  Many banks actually have programs that offer additional incentives for   home owners who are willing to immediately repurpose their tax refund   back into the bank in order to pay back a mortgage loan. Be sure to ask   about and take advantage of any financial institutions that offer these   kinds of benefits, and be sure to ask if you are still in the   negotiation stage.</p>
<h2>Budget for Other Extra Payments</h2>
<p>
  Budget more money every month with each payment to make sure that   you are paying the principal off as well as interest. Make sure that   these extra payments are going towards the principal on the house if at   all possible. Although making larger payments every month is one way to definitely   decrease the amount of time that you take to pay off a home loan, the   way that money is purposed is just as important as the money itself. To   be most effective, any extra payments that are made each month or   biweekly should be directed towards the principal on the home loan   rather than the interest.</p>
<p>
  The reason that banks are able to make nearly $200,000 on a $500,000   home loan in a 30 year period is because of the way that interest and   principal payments are structured within the average contract that is   signed by a borrower. The first few years that a home owner pays his or   her mortgage payment, he or she is paying almost strictly interest. This   means that the underlying principal on the home is still there accruing   more interest that must be paid off as well as the interest that is   being paid currently. However, if a home owner repurposed that same   money that was paying off the interest to the principal, the bank would   not be able to take advantage of this little scheme.</p>
<p>
  Unless you have a great deal of leverage within a financial institution,   you will probably not be able to negotiate a new schedule of interest   vs principal payments. However, under no circumstances should you accept   a financial arrangement that causes any money that you pay above and   beyond the minimum monthly (or biweekly) mortgage payment to the   interest on the loan. That money should be directed towards the   principal, and if you are in good financial shape, you can hold out for a   bank that allows this type of arrangement.</p>
<p>
  Be incredibly wary as well of interest only loans. Interest only loans   take the interest vs principal scheduling scheme of the banks to a   heightened level, creating a situation where a home owner is paying back   virtually none of the principal for the majority of the time that he or   she is paying off the loan. Banks try to hide these arrangements behind   too good to be true interest rates. Remember that you want to pay off   the principal as well as the interest and do not allow yourself to be   enticed by a low interest rate or other goodies that leave the principal   of the home loan there to invisibly suck your pockets dry while you pay   your money into a black hole of interest and fees.</p>
<h3>Monitor &amp; Improve Your Credit Score  </h3>
<p>If your credit score changes significantly to your advantage,   you can always try to renegotiate with your lending institution based on   this new information. Before you first go into the office of a banking agent to get a home   loan, you should check your credit score for mistakes and attempt to   correct them. Like it or not, many banks will offer different tiers of   interest rates based solely on the credit score that you have when you   first walk in the door. It behooves you to make sure that this initial   impression is as good as it can be.</p>
<p>
  Although there are three major credit reporting companies, all of whom   use completely different methods to calculate a credit score, you never   know which one a bank will use in relation to you. Credit scores are   known to vary wildly between companies, and there is nothing that says   that a bank cannot take the lowest of those scores as a justification to   charge you a higher interest rate when you come in for a home loan. For   this reason, get your free credit report from all three agencies,   Experian, TransUnion and Equifax, and compare the scores for   discrepancies. </p>
<p>
  Should you find an extremely large difference between the scores on your   three credit reports, or should you find charges on your accounts or   other potential fraud on any of the three reports, consult a reputable   financial professional in order to get these problems fixed before   entering a negotiation with bankers or a renegotiation for financing on   your own behalf. Fixing a credit score is a long process and will likely   require a great deal of your own time even with the assistance of a   financial professional. Many companies that claim to be able to fix your   credit score instantaneously are simply too good to be true. Stay away   from companies that employ sketchy methods such as tampering with your   social security number in order to fix your credit. These methods   usually just end up causing many more problems than they solve.</p>
<p>
  If you have already made your real estate purchase, do not be afraid to   have your credit scores fixed and then enter a renegotiation with your   bank. They will renegotiate if they sense that you may try to move your   loan to another bank and you have been a good customer so far. If you   have made all of your payments, banks certainly do not want to lose out   on the interest that your loan is generating. They will usually be open   to negotiation in order to keep your business when your credit score   improves.</p>
<p>
  Keep in mind that you may have to leverage your position in order to get   a positive response out of a bank. You will need to keep records of the   financial institutions that you have been to and what they are offering   you because of your improved credit score. You will need to show hard   evidence that you can get a better deal elsewhere and show that you are   perfectly willing to make the move. In order to do this seriously, you   must consider the short term fees that are always imposed with a move   such as this and be ready to pay them. You can also make an issue out of   the fact that you have extra money saved up in order to pay off your   loan early.</p>
<h3>
  Bringing it All Together</h3>
<p>
  In short, keep yourself in good standing by paying your home loan on   time every month. Solidify your record within your current bank if you   have already signed financial documents and put your best financial foot   forward if you have yet to choose a bank for your mortgage. Keep   abreast of the market as a whole and make sure that your banker knows   that you know he is not the only game in town. You must make them work   in order to keep your business and you must make sure that your business   is worth keeping. Keep these tips in mind and you are sure to find a   great deal when it comes to renegotiating your mortage or getting a   great home loan contract so that you can pay off your home loan as   quickly as possible. </p>

 
 
                
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

