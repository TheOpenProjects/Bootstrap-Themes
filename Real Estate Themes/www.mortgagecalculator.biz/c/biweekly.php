<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Biweekly Mortgage Payment Calculator</title>		
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
   var i = sn(document.calc.intRate.value);

   if(prin1 == 0) {
      alert("Please enter the your mortgage's current principal balance.");
      document.calc.principal.focus();
   } else
   if(pmt1 == 0) {
      alert("Please enter the amount of your mortgage payment.");
      document.calc.payment.focus();
   } else 
   if(i == 0) {
      alert("Please enter your mortgage's annual interest rate.");
      document.calc.intRate.focus();
   } else {

      var pmt2 = pmt1 / 2;

      var prin2 = prin1;

      var intPort1 = 0;
      var intPort2 = 0;

      var prinPort1 = 0;
      var prinPort2 = 0;

      var accumInt1 = 0;
      var accumPrin1 = 0;

      var accumInt2 = 0;
      var accumPrin2 = 0;


      if (i >= 1.0) {
         i = i / 100.0;
      }

      var i1  = i  / 12;
      var i2 = i / 26;

      var count1 = 0;
      var count2 = 0;

      while(prin1 > 0) {

         intPort1 = prin1 * i1;
         prinPort1 = Number(pmt1) - Number(intPort1);
         prin1 = Number(prin1) - Number(prinPort1);
         accumPrin1 = Number(accumPrin1) + Number(prinPort1);
         accumInt1 = Number(accumInt1) + Number(intPort1);

         count1 = Number(count1) + Number(1);

         if(count1 > 600) {break; } else {continue; }

      }

      document.calc.origInt.value = fns(accumInt1,2,1,1,1);

      while(prin2 > 0) {

         intPort2 = prin2 * i2;
         prinPort2 = Number(pmt2) - Number(intPort2);
         prin2 = Number(prin2) - Number(prinPort2);
         accumPrin2 = Number(accumPrin2) + Number(prinPort2);
         accumInt2 = Number(accumInt2) + Number(intPort2);
         count2 = Number(count2) + Number(1);

         if(count1 > 600) {break; } else {continue; }

      }
    
      document.calc.biwkInt.value = fns(accumInt2,2,1,1,1);

      var VintSave = Number(accumInt1) - Number(accumInt2);

      document.calc.intSave.value = fns(VintSave,2,1,1,1);

      var v_summary = "<p>&nbsp;</p><blockquote></strong>Summary: In essence, what you are really doing is adding a 13th payment to your ";
      v_summary += "annual number of payments, and splitting it up between 26 bi-weekly ";
      v_summary += "payments. In your this case means that by paying an ";
      v_summary += "extra " + fns(pmt1 / 26,2,1,1,1) + " every two weeks you will pay off ";
      v_summary += "your mortgage in " + parseInt(count2 /26*12,10) + " months instead of ";
      v_summary += "the current " + count1 + " months, and ";
      v_summary += "save " + fns(accumInt1 - accumInt2,2,1,1,1) + " in ";
      v_summary += "mortgage interest in the process.</strong></blockquote>";


      var v_summary_cell = document.getElementById("summary");
      v_summary_cell.innerHTML = " " + v_summary + " ";

   }
		
}

function clear_results(form) {

   var v_summary_cell = document.getElementById("summary");
   v_summary_cell.innerHTML = "";

   document.calc.origInt.value = "";
   document.calc.biwkInt.value = "";
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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/biweekly.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				<div class="main-heading"><h1>Bi-Weekly Mortgage Calculator</h1>
</div>
                    <ul id="breadcrumbs">

                        <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
                        <li><a href="https://www.mortgagecalculator.biz/c/budget-planner.php">Budget Planning</a></li>
                        <li>Biweekly Payments</li> 
                  </ul>
                </div>   			<div class="bottom-section">
<p><img src="https://www.mortgagecalculator.biz/img/house-in-hands.jpg" alt="house" width="130" class="alignright" />    This calculator will show you how much you will save if you make 1/2 of your mortgage payment every two weeks instead of making a full mortgage payment once a month. In effect, you will be making one extra mortgage payment per year -- without hardly noticing the additional cash outflow. But, as you're about to discover, you will certainly notice the "increased" cash flow that will occur when you pay your mortgage off way ahead of schedule!            </p>

<div class="table-block">
<form name="calc" method="post" action="#">

 <table>
 <tbody>

 <tr>
 <td>
 
  Remaining Mortgage Balance:<br /></td>
 <td align="center">
 <input name="principal" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="200000" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>
 
 Monthly Principal &amp; Interest Payment:
 
 </td>
 <td align="center">
 <input name="payment" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="1500" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>
 
 Your mortgage's <a href="#viewrates"><strong>current interest rate</strong></a>:
 
 </td>
 <td align="center">
 <input name="intRate" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="6" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td align="center">
 <input type="button" class="table-btn" value="Reset" onClick="reset_calc(this.form)" />
 </td>
 <td align="center">
 <input type="button" class="table-btn" value="Calculate" onClick="computeForm(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 
 Interest you will pay under your current monthly payment plan:
 
 </td>
 <td align="center">
 <input type="text" name="origInt" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Interest you will pay if you switch to a bi-weekly mortgage payment plan:
 
 </td>
 <td align="center">
 <input type="text" name="biwkInt" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Bi-weekly Mortgage Interest Savings:
 
 </td>
 <td align="center">
 <input type="text" name="intSave" size="15" />
 </td>
 </tr>

 </tbody>
 </table>
 </form>

<div style="clear:both;"></div>
<div id="summary"> </div>


 </div>
 
<p>&nbsp;</p>
<a name="viewrates"></a>
<h3>Current Mortgage Rates</h3>
<div class="myFinance-widget" data-show-filters="true" data-widget-id="0e398780-2190-4caf-9640-aecf30df3c9c" data-property-value="250000" data-purchase-price="250000" data-percent="20" data-current-loan-balance="200000"  data-table-title="Save Money With Today's Best Fixed Mortgage Rates" data-campaign="mortcalcbiz_fulltable_mortgage"></div>

 
<h2>Save Money With Biweekly Payments &amp; General Home Buying Advice</h2>
<p>A home purchase is the biggest investment the average consumer will make   in their lifetime. Many go into the process unprepared, and it costs   them in higher interest rates and other miscellaneous expenses. With   mortgage rates changing every day and every company offering a different   price for mortgage products and services, one must shop around and do   their research. With that being said, here is a guide for a person   looking to save money on their mortgage.</p>
<h3>
Preparation</h3> 
<p>Ideally, a potential buyer should start the process well   before buying their house. In fact, one should start doing a few things   about a year in advance so they can make sure they do not forget   anything. Without this, one can see the process delayed for months as   they may have to clean up their credit score, fix any other issues or   pay down old debts. To get the most out of the experience and avoid   missing anything, a buyer should use an Excel sheet or a simple piece of   paper where they can note all the information to the house and their   income.</p>
<p><img src="../img/pool.png" width="630" height="420" alt="Pool." /></p>
<h3>Down Payment</h3> 
<p>Most consumers like to save for a down payment as it will   make it easier to negotiate and show the seller and bank that they they   are serious and want to spend money. Now, in the past, people would try   to save 20 percent of the purchasing price as a way to avoid private   mortgage insurance. This is not practical for everyone especially in   areas of the world where houses cost a lot of money. However, when   saving up for a down payment, one should try to offer, at minimum, a   five percent down payment. This will show the bank that the buyer wants   the house and has the necessary financial resources.</p>
<h3>Credit Score</h3> 
<p>Now, some buyers, without knowing their credit score, walk   into a bank and ask for a home loan. Some people can get away with this   provided they have perfect credit. This is a rarity as many people have   a sub-standard credit score caused by late payments, too much debt or   incorrect items on the report. To prepare for the borrowing process, one   should check their credit score, ideally, one year before buying a   house. While this might seem like overkill, this will allow a person to   clean up their score and fix any small errors on their report. A   borrower must understand that the difference between a 650 and 750   credit score is huge, and it will have a huge effect on the interest   rate the borrower pays. Furthermore, with a high score, one can walk   into a bank or lending institution and command respect from bank   employee's. On the other hand, when going to the bank with a 650 credit   score, one will struggle to convince the loan officer that they are a   good borrower.</p>
<h3>Pay Off Bills</h3> 
<p>When buying a home, many feel that they will only have   one more expense to deal with, and they will have no problem paying off   the debt. Any first year homeowner would laugh at this as a new   homeowner will have to spend plenty of cash cleaning up the house,   making insurance payments and dealing with the unexpected. To avoid   financial problems, one should pay off their small bills before taking   on a mortgage. For example, one can pay down, or off, their car loans,   credit cards or other personal loans. By removing a monthly payment from   one's budget, a consumer can free up cash flow so they can make their   mortgage payments with ease.</p>
<h3>Affordability</h3> 
<p>In the past, many bought homes they could not afford and   they lost their homes and suffered from financial ruin. Now, most banks   are stringent and require a lot more information and paperwork to offer a   loan. However, it is still up to the consumer to decide how much loan   they can afford since they are the one making the payments. There is no   set formula as everyone's financial situation is unique; some people   will not have kids while others will have high car payments or student   loans. One rule that many financial planners use is simple. A   prospective homeowner should look for a loan that is <a href="http://www.investopedia.com/articles/pf/05/030905.asp">two to three times</a> his or her annual gross income.  Again, this amount will vary as some   people will have a lot of other debts while other people may have no   other financial expenses. When looking at the situation, one should sit   down with their financial planner or loan officer who can determine a   good ratio. Ultimately, the decision is up to the consumer as he or she   will need to make the payments for years. Remember, when looking at the   monthly cost of the loan, one must consider all costs such as private   mortgage insurance, HOA fees, property taxes and any other expenses.</p>
<h3>Take Time</h3> 
<p>Often, a buyer will fall in love with one house or   neighborhood, and they will waste their money on something they do not   need. To find the best hour or area, a consumer should start looking at   houses a couple of months before he or she wants to buy. When learning   about houses and neighborhoods in advance, one can make a rational   decision and avoid buying a house that does not fit their needs.   Furthermore, after choosing a house, the buyer should negotiate and have   a person inspect the house thoroughly. One must realize that they are   in control and a buyer should try to negotiate and ask for extras from   the seller.</p>
<h3>PMI</h3> 
<p>When hearing the term PMI,   most people do not have a clue what this truly means. In reality, it is   not hard to understand; a person who cannot make a 20 percent down   payment must pay private mortgage insurance to the lender. This is   protection for the bank since many people who put down a small down   payment end up defaulting on their home. PMI is nothing to scoff at as   it can cost a homeowner a couple hundred dollars a month on a 200,000   dollar loan. Unfortunately, without a large down payment, one will have a   hard time escaping this cost. For this reason, a buyer who has nearly   20 percent saved should try to save a little more or find the extra cash   to bump their down payment up and avoid PMI. Luckily, as a house value   rises and a person pays down their mortgage, they can refinance and save   plenty of cash as they can remove the PMI payments.</p>
<h3>Methods to Pay Off Early</h3> 
<p>A mortgage is for 15 or 30 years, but most   people do not want to carry it this long. In the beginning, one is   paying mostly interest as that is the nature of a long-term loan.   However, after a few years, a consumer will see their balance go down,   even if it is marginal. Unless a buyer does not see their financial   outlook get better as they age, they should develop a payoff plan.</p>
<h3>Pay Extra Early</h3> 
<p>As mentioned, the first few years of a loan, a borrower   will pay a lot of interest fees. To avoid this, a consumer must pay   more than the minimum on his or her loan. When chipping away at 50 to   100 dollars a month on the principal, one can knock off a couple of   years at the end of the loan. This is a great investment to make as one   will enjoy a return with no risk. Ideally, a consumer should add any   extra money into this such as unexpected bonuses or other cash. Not only   that, when getting a raise or a second income, one should put their   money into paying off their mortgage. The trick here is simple as a   person should pay down their principal before caving in and spending the   money on something they do not need.</p>
<h3>Biweekly</h3> 
<p>When making two mortgage payments a month, one can, effectively, pay off their mortgage <a href="http://www.nytimes.com/2011/07/03/realestate/the-benefits-of-a-biweekly-mortgage-plan-mortgages.html?_r=0">six to eight years early</a>.   Most banks offer this program and will gladly accept biweekly payments   as they get their money early. Since most people receive a paycheck   every two weeks, this is an easy option one should consider as it can,   without work, help a person eliminate years off their mortgage.   Essentially, a borrower using this option will pay down their principal   faster as they will have two more payments going towards the principal   each year. In reality, a smart consumer who has a stable and reliable   income should use this option as it is an easy way to cut down the   principal without effort.</p>
<h3>New Income Goes to House</h3> 
<p>Inevitably, most working age people will see   their incomes rise over time. Now, some people, when getting a rise,   will up their lifestyle and buy a new car or take on more loans.   Instead, when looking to pay off the mortgage early, a person should put   their new income towards paying off the mortgage earlier. This can help   a person knock years off their loan since a person can devote a large   amount of their paycheck towards the mortgage. Remember, most people   will make a lot more money in 15 years, and they should take advantage   of this by throwing more money at their mortgage.</p>
<h3>Emergency Fund</h3> 
<p>While it is beneficial to pay off a loan early, one   should exercise caution and not put themselves out on the street to save   a few bucks. To avoid issues after a job loss or financial problem, one   should set up an emergency fund with six months living expenses,   including mortgage payments and other loan costs. While this will slow   down one's payoff plan, it will enable a person to avoid a catastrophe   should they experience a job loss or serious sickness in the family. One   must remember,it is smart to have a lot of cash saved up in case of   emergency.</p>
<p>
When understanding these tricks, one can save money on their mortgage   and pay it off years in advance. Fortunately, none of these methods will   cost a borrower a lot of money as they are easy to follow. One must   realize that a home purchase is a huge investment and it is vital the   new buyer take their time in choosing the right house. Without a doubt,   when taking the time to look for the perfect home, one will enjoy their   investment for a long time.</p>

                
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

