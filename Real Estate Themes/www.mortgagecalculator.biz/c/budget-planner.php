<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Free Family Budget Planner: Simple Budget Plan Template</title>		
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


function compute(form)  {

   var Vincome = sn(document.calc.income.value);

   if(Vincome == 0) {
      alert("Please enter an income amount.");
      document.calc.income.focus();
   } else {


      document.calc.char1.value = fns(Vincome * .10,2,1,1,1);
      document.calc.char2.value = fns(Vincome * .15,2,1,1,1);

      document.calc.savi1.value = fns(Vincome * .05,2,1,1,1);
      document.calc.savi2.value = fns(Vincome * .10,2,1,1,1);

      document.calc.hous1.value = fns(Vincome * .25,2,1,1,1);
      document.calc.hous2.value = fns(Vincome * .35,2,1,1,1);

      document.calc.util1.value = fns(Vincome * .05,2,1,1,1);
      document.calc.util2.value = fns(Vincome * .10,2,1,1,1);

      document.calc.food1.value = fns(Vincome * .05,2,1,1,1);
      document.calc.food2.value = fns(Vincome * .15,2,1,1,1);

      document.calc.tran1.value = fns(Vincome * .10,2,1,1,1);
      document.calc.tran2.value = fns(Vincome * .15,2,1,1,1);

      document.calc.clot1.value = fns(Vincome * .02,2,1,1,1);
      document.calc.clot2.value = fns(Vincome * .07,2,1,1,1);

      document.calc.medi1.value = fns(Vincome * .05,2,1,1,1);
      document.calc.medi2.value = fns(Vincome * .10,2,1,1,1);

      document.calc.pers1.value = fns(Vincome * .05,2,1,1,1);
      document.calc.pers2.value = fns(Vincome * .10,2,1,1,1);

      document.calc.recr1.value = fns(Vincome * .05,2,1,1,1);
      document.calc.recr2.value = fns(Vincome * .10,2,1,1,1);

      document.calc.debt1.value = fns(Vincome * .05,2,1,1,1);
      document.calc.debt2.value = fns(Vincome * .10,2,1,1,1);

   }
} 

function clear_results(form)  {

   document.calc.char1.value = "";
   document.calc.char2.value = "";
   document.calc.savi1.value = "";
   document.calc.savi2.value = "";
   document.calc.hous1.value = "";
   document.calc.hous2.value = "";
   document.calc.util1.value = "";
   document.calc.util2.value = "";
   document.calc.food1.value = "";
   document.calc.food2.value = "";
   document.calc.tran1.value = "";
   document.calc.tran2.value = "";
   document.calc.clot1.value = "";
   document.calc.clot2.value = "";
   document.calc.medi1.value = "";
   document.calc.medi2.value = "";
   document.calc.pers1.value = "";
   document.calc.pers2.value = "";
   document.calc.recr1.value = "";
   document.calc.recr2.value = "";
   document.calc.debt1.value = "";
   document.calc.debt2.value = "";

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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/budget-planner.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				<div class="main-heading"><h1>Household Budget Planning Calculator</h1>
</div>
                    <ul id="breadcrumbs">

                        <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
                        <li>Free Monthly Personal Budget Planner</li>
                    </ul>
                </div>   			<div class="bottom-section">
<p><img src="https://www.mortgagecalculator.biz/img/house-in-hands.jpg" alt="house" width="130" class="alignright" />    Here are suggested percentage guidelines based on net income compiled by <a href="http://www.daveramsey.com/">Dave Ramsey</a>, author of <A HREF="http://www.amazon.com/Financial-Peace-Revisited-Dave-Ramsey/dp/0670032085"><I>Financial Peace</I></A> (Viking, 1997, $21.95) which he says are only recommended percentages and will change dramatically if you have a very high or very low income. For instance, if you have a very low income your necessities percentages will be high. If you have a high income, your necessities will be a lower percentage or income and hopefully savings (not debt) will be higher than recommended.             </p>

<div class="table-block">
<form name="calc" method="post" action="#">

 <table>
 <tbody>
 <tr>
 <td colspan="3">
 
 Enter your net-income for whichever period of time you would like to translate the percentages into:
 
 </td>
 <td align="center">
 <input type="number" step="any" name="income" size="12" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td align="center" colspan="2">
 <input type="reset" class="table-btn" value="Reset" />
 </td>
 <td align="center" colspan="2">
 <input type="button" class="table-btn" value="Convert to $ Amounts" onClick="compute(this.form)" />
 </td>
 </tr>

 <tr>
 <td align="center">
 <strong>
 Expense
 </strong>
 </td>
 <td align="center">
 <strong>
 Range
 </strong>
 </td>
 <td align="center">
 <strong>
 Low End
 </strong>
 </td>

 <td align="center">
 <strong>
 High End
 </strong>
 </td>
 </tr>


 <tr>
 <td>
 
 Charitable gifts
 
 </td>
 <td align="right">
 
 10-15%
 
 </td>
 <td align="center"><input type="text" name="char1" size="12" /></td>
 <td align="center"><input type="text" name="char2" size="12" /></td>
 </tr>

 <tr>
 <td>
 
 Saving
 
 </td>
 <td align="right">
 
 5-10%
 
 </td>
 <td align="center"><input type="text" name="savi1" size="12" /></td>
 <td align="center"><input type="text" name="savi2" size="12" /></td>
 </tr>

 <tr>
 <td>
 
 Housing
 
 </td>
 <td align="right">
 
 25-35%
 
 </td>
 <td align="center"><input type="text" name="hous1" size="12" /></td>
 <td align="center"><input type="text" name="hous2" size="12" /></td>
 </tr>

 <tr>
 <td>
 
 Utilities
 
 </td>
 <td align="right">
 
 5-10%
 
 </td>
 <td align="center"><input type="text" name="util1" size="12" /></td>
 <td align="center"><input type="text" name="util2" size="12" /></td>
 </tr>

 <tr>
 <td>
 
 Food
 
 </td>
 <td align="right">
 
 5-15%
 
 </td>
 <td align="center"><input type="text" name="food1" size="12" /></td>
 <td align="center"><input type="text" name="food2" size="12" /></td>
 </tr>

 <tr>
 <td>
 
 Transportation
 
 </td>
 <td align="right">
 
 10-15%
 
 </td>
 <td align="center"><input type="text" name="tran1" size="12" /></td>
 <td align="center"><input type="text" name="tran2" size="12" /></td>
 </tr>

 <tr>
 <td>
 
 Clothing
 
 </td>
 <td align="right">
 
 2-7%
 
 </td>
 <td align="center"><input type="text" name="clot1" size="12" /></td>
 <td align="center"><input type="text" name="clot2" size="12" /></td>
 </tr>

 <tr>
 <td>
 
 Medical/Health
 
 </td>
 <td align="right">
 
 5-10%
 
 </td>
 <td align="center"><input type="text" name="medi1" size="12" /></td>
 <td align="center"><input type="text" name="medi2" size="12" /></td>
 </tr>

 <tr>
 <td>
 
 Personal
 
 </td>
 <td align="right">
 
 5-10%
 
 </td>
 <td align="center"><input type="text" name="pers1" size="12" /></td>
 <td align="center"><input type="text" name="pers2" size="12" /></td>
 </tr>

 <tr>
 <td>
 
 Recreation
 
 </td>
 <td align="right">
 
 5-10%
 
 </td>
 <td align="center"><input type="text" name="recr1" size="12" /></td>
 <td align="center"><input type="text" name="recr2" size="12" /></td>
 </tr>

 <tr>
 <td>
 
 Debts
 
 </td>
 <td align="right">
 
 5-10%
 
 </td>
 <td align="center"><input type="text" name="debt1" size="12" /></td>
 <td align="center"><input type="text" name="debt2" size="12" /></td>
 </tr>



 </tbody>
 </table>
 </form>
 </div>

<p>&nbsp;</p>
<a name="viewrates"></a>
<h3>Current Mortgage Rates</h3>
<div class="myFinance-widget" data-show-filters="true" data-widget-id="0e398780-2190-4caf-9640-aecf30df3c9c" data-property-value="250000" data-purchase-price="250000" data-percent="20" data-current-loan-balance="200000"  data-table-title="Save Money With Today's Best Fixed Mortgage Rates" data-campaign="mortcalcbiz_fulltable_mortgage"></div>


 
 <h2>How to Create and Stick to the Family Budget and Still Survive</h2>
<p> In today's uncertain economic climate, creating and sticking to a   budget is more important than ever before.  As prices for groceries,   gas, clothing and more continue to spiral out of control, it becomes   harder and harder for families to make ends meet.  With finances being   one of it not the most stressful issue in most families, it's imperative   that families be able to sit down together and develop a game plan for   how the family finances will be handled.  For many families, the hardest   part is not necessarily preparing a budget, but rather sticking to it.    Tracking how the money is spent each month is the only way to get an   idea of what cuts can be made and when they can be made.  The best way   to accomplish this is to begin by putting everything down on paper.  A   spreadsheet can be used, but many experts recommend the physical act of   writing down one's expenses on paper as a way to remember how it felt   when you realized how much you're spending at Starbucks each month for   that morning cup of coffee. </p>
<h3>
  Setting Goals</h3>
<p>
  The formation of any good family budget begins with setting goals.  The   types of goals can vary, from just wanting to save $20 per month to   saving hundreds of dollars per month to put toward a new home or   vehicle.  Some families want to save enough money to take a long-awaited   vacation, while others want to make home improvements such as a new   kitchen or deck.  Whatever the goals may be, they should be agreed upon   by all family members.  A budget has very little chance of succeeding if   one part of the family has one set of goals, while the other faction   has an entirely different view of how the savings should be spent.  This   is often the part where negotiation and compromise come into play, and   finding middle ground can sometimes be tougher than anticipated.  Adults   usually go for the more practical ideas, while the younger family   members have their sights set on things that offer a bit more fun. </p>
<p>
  Whatever goals are eventually agreed upon, it's important that the needs   of all family members are met along the way.  The adults should monitor   the spending, but the kids should also have a say in what they are   allowed to spend money on.  Kids need to be kids, and all work and no   play can make any child very discouraged very quickly.  When   constructing the budget, try to allow for some fun time for the kids.    This could be as little as treating them to something off a dollar menu   at the local burger joint or perhaps buying an inexpensive toy at the   store.  Often, it will take very little to make the kids feel like their   interests are being protected during this stressful time.  So long as   they feel included in the plan, they will usually hop on board with   everyone else.</p>
<h3>
  Keeping it Simple</h3>
<p>
  Many times when families are preparing a budget, they get too caught up   in trying to make it as fancy and structured as possible.  They will   want to use the latest budgeting software, use fancy terms to describe   their spending or other methods that actually draw everyone's attention   away from the budget process.  The old adage "keep it simple" is a great   phrase to keep in mind when planning a budget.  By keeping a budget   straightforward and simplistic, it's easier for all family members to   understand.  One thing to keep in mind today is families may be   comprised of several generations living under the same roof.  Parents   may have their parents living with them, or they may have adult children   moving back home after a divorce or job loss and bringing the grandkids   with them.  This can lead to great divides in how a budget should look,   for grandparents have far different priorities that grandkids.    Grandparents often have Social Security income, work pensions and other   sources of income that are included in the family budget, while   grandkids may have income from part-time jobs. </p>
<p>
  Whatever the situation, keeping a budget in simple terms can make   everyone happy.  After all, a budget is simply trying to figure out how   to spend less and save more.  The basic concept is so easy it's almost   too easy, which is why many times people insist on making it harder than   it has to be.  Keeping the proper perspective and explaining the budget   in terms everyone can understand can go far toward keeping all family   members focused not only on the short-term plan, but the long-term as   well.  Grandparents living in the home may have more long-term goals,   while the kids think they will live forever and may want to address some   short-term goals that equal far more fun than saving money for a rainy   day and being told they can buy a fancy umbrella to protect themselves   from the storm. </p>
<h3>
  Honesty is the Best Policy</h3>
<p>
  When it comes to preparing a budget, honesty has been and always will be   the best policy.  If a family is ever going to get its spending under   control, all members have to be honest about their spending habits.    This starts with all members who have income to contribute bringing   their paystubs to the table and being willing to admit just how much   that money will buy in today's world.  When it comes time to talk money,   all the pay stubs, receipts and anything else that has figures on it   needs to be included in the planning process.  When it comes to   spending, most people tend to underestimate how much they spend on food,   gas and other items.  They also tend to leave out expenses for such   items as gifts, clothing, haircuts or school supplies.  When this   happens, they wind up running out of money before the next payday and   then wondering what happened.  By gathering receipts from the past few   months of shopping and compiling an average amount spent, planning the   budget around these expenses will be much easier.</p>
<p>
  When money problems arise in a household, many people have a tendency to   ignore the problem in hopes it will go away.  As we all know, not only   does it not go away, but usually gets worse instead.  As bills mount and   pressure increases, going to the mailbox each day can become a   stressful occasion.  Pretending bills don't exist simply because you   refuse to look at them is a surefire way of spelling financial doom for   any budget.  Sometimes, it may take a talk with a close friend, a   minister, teacher or someone else whose opinion is trusted to make a   person see how damaging this behavior can be to managing and defeating   destructive spending habits.  One way people get into financial trouble   is by failing to pay their most important bills first.  A mortgage or   rent payment, groceries and utilities should always be the first bills   paid, but sometimes are the last ones if they are paid at all.  Failing   to follow a budget is bad enough without losing one's home because the   rent money got spent on a new outfit or weekend getaway. </p>
<h3>
  Use Automated Tracking Services</h3>
<p>
  In today's world of androids, tablets and smart phones there is   practically nothing that can't be done with these devices, and that   includes planning and sticking with a budget.  One of the most popular   tools for tracking your spending habits is Mint.com.   It's a free   service, which is especially good for those facing financial problems.    Creating an account is fast and easy, allowing users to go high-tech   while still keeping things simple and straightforward.  Mint makes it   easy for people to see where their money is being spent, and is able to   organize and categorize spending to make it easy to follow the money   trail.  One of the best features of Mint is its security.  Because the   program only "reads" the information, there's virtually no chance of   identity theft or any other problems arising.  No money can be   transferred through Mint, which is one less way a person can get into   trouble by spending money they either don't have or transferring money   in order to make an impulse purchase.</p>
<p>
  People who are very visual may enjoy using Mint for their budgeting   purposes.  Using lots of pie charts, tables and other graphics makes   Mint a very appealing option for the folks who use their smart phones   and tablets for nearly every aspect of their lives.  All spending is   organized into various categories including rent, gas and clothing to   show where the money is going.  It's then on to the pie charts and other   graphics to present a very visual picture based on proportions, letting   a person see the vast differences between categories.  One advantage of   using Mint is the ability to set goals with it, while Mint in return   offers free advice on goal-setting and other topics along with reminders   and encouraging words.  So, if the computer wants you to watch your   spending, imagine how the family feels.  For those who don't feel   comfortable creating a budget or just don't know how, Mint will create a   budget based on the information provided.  It will also send its users   email updates about upcoming payments and bill reminders to keep you on   course rather than drowning in debt for years to come.  For those   interested in using this service, visit <a href="http://www.mint.com/">Mint.com</a> for more information.</p>
<h3>
  Be Good to Yourself</h3>
<p>
  Sometimes it's hard to stay motivated with almost anything, especially   when it comes to limiting the amount of money you'll be spending.  One   of the best ways to do so is by using rewards to treat yourself.  For   those who have sworn off ice cream, late summer is a great time to treat   yourself to a cone after you've met some goals you set for yourself,   such as saving $10 for the week by brown-bagging your lunch to work   rather than going out. Of course, rewarding yourself for a job well-done   saving money doesn't have to cost anything.  Taking a nice drive to a   favorite spot or riding a bike through a pretty park can also be rewards   for showing self-restraint.  It's often the little things in life that   make us feel our best, so simply taking a walk with a good friend or   significant other and discussing the day can put the money worries to   rest temporarily. </p>
<p>
  Using rewards to motivate yourself can also apply to the kids in the   family as well.  Kids who have shown financial restraint by sticking   with the family budget for the whole month can find themselves getting   rewarded with a new toy or a meal at their favorite restaurant.  Leaving   some room in the budget for these small, inexpensive rewards now and   then can make the difference between both adults and kids being willing   to make sacrifices for the good of family finances or constantly going   over budget each week.  By establishing a rewards system early on at   family meetings, everyone involved will know what's expected of them in   order to get the reward they want.</p>
<h3>
  Emergency Funds</h3>
<p>
  <img src="../img/piggy.png" width="300" height="342" alt="Rainy Day Fund." align="right" />Unfortunately in life, we never know when an emergency will strike next.    If we are not somewhat prepared for it, it can quickly devastate the   family budget.  Some emergencies that can quickly decimate the savings   include:</p>
<ul class="arrow">
  <li>Medical bills</li>
    <li>Car repairs </li>
    <li>Vet bills</li>
    <li>Home repairs</li>
</ul>
<p>
  Any of these unexpected surprises can quickly turn a well thought out   and carefully planned budget into a mess.  To make sure an unexpected   emergency doesn't bust the budget, it's a good idea to start an   emergency savings fund that is only added to and not withdrawn from for   anything other than true emergencies.  Most budget experts suggest   having a fund that can last for a minimum of six months in case of a job   loss or medical emergency.  However, trying to establish an emergency   fund while also trying to save money is no easy task.</p>
<p> If there is one   part of a home budget plan that requires dedication and determination,   it's getting an emergency fund established.  Most of the time, to get   this established means other areas have to be sacrificed.  For example,   fewer movies may need to be attended or other more pressing bills will   need to be paid first.  To have plenty of reasons to celebrate the   formation of the family emergency fund, all family members need to know   its importance.  Kids need to be aware Mom and Dad may not always have   the same jobs they do now, while Mom and Dad need to think about the   same thing and understand the fund's importance.  All too often, it's   easy to dip into this fund when wanting something new or a night out on   the town.  By realizing this fund can mean the difference in keeping   one's home, car and other possessions it's possible to start a fund that   is strictly hands-off except in dire circumstances. </p>
<h3>
  Cash or Credit?</h3>
<p>
  After focusing so much on saving money, it always feels good to treat   yourself to a shopping trip every once in awhile.  However, as with most   times when a person hasn't been able to do something for quite some   time, there is a tendency to go overboard.  Once a budget has been   worked out, it will do no good to blow all that hard work by spending   too much money while shopping.  The key to everything is moderation, and   there are ways to keep yourself from splurging too much with either   cash or credit cards.  To keep from using the credit cards, the simplest   and most effective thing to do is leave them at home.  If you don't   have them with you, they can't be used to purchase anything.  Some   people go to great lengths to keep from using credit cards, including:</p>
<ul class="arrow">
    <li>Cutting them up</li>
    <li>Locking them in a box</li>
    <li>Giving them to another family member</li>
    <li>Cancelling the accounts</li>
</ul>
  <p>
  Hopefully by now, after learning how to properly budget your money you   won't need to go to these extremes to manage your spending habits.    However, for most people it comes down to whatever works best for them.    For some people, it's just a matter of leaving the cards at home, while   for others cancelling the accounts may be the only viable option.  So   long as the budget isn't busted, any of these options, no matter how   extreme they may sound, are good ideas. </p>
<p>
  While the credit cards can be left at home, the cash needed to pay for   things cannot.  So how do you keep from spending too much cash on a   shopping trip?  Actually, it's very similar to how the credit cards are   managed.  Before leaving home, simply decide how much you can afford to   spend and take only that amount with you.  If you don't have the cash   with you and need to visit the ATM, keep the willpower intact and draw   out only what you had previously agreed upon.  Set yourself up on an   allowance plan, only giving yourself so much money per week to spend on   shopping for clothing and other items.  If necessary, let your spouse or   significant other hold on to most of the cash and only give you what   you absolutely need.  Whatever needs to be done to keep the budget   intact, do it and you will certainly not regret it later on when the ol'   savings account starts to grow.</p>
<h3>
  Paycheck to Paycheck</h3>
<p>
  Most families today are living paycheck to paycheck, and are always   trying to figure out ways to make the budget stretch from one payday to   the next. One way to do so is by posting the finished budget in a   central location, such as on the refrigerator, and crossing off items as   they are paid.  Keeping a running total of how much money is left to   spend on groceries, gas, clothing and other items is also recommended,   letting everyone see where the money is going and how to best save as   much as possible.   Another thing to do is to allot an amount to be   spent on miscellaneous items such as haircuts, gifts and other expenses.    These types of expenses will eat away at even the best of budgets, and   are often the reason people run out of money before they run out of   month.  Also, be sure to give a realistic estimate of how much money is   spent on groceries each month.  Most people tend to greatly   underestimate what they spend at the grocery store, and it's the one   area that gives people the most problems when it comes to preparing and   sticking to a budget. </p>
<p>
  When doing the grocery shopping, there are several things that can be   done to make sure the money stretches out as long as needed such as:</p>
<ul class="arrow">
    <li>Avoid impulse buying</li>
    <li>Make a list and stick to it</li>
    <li>Never go shopping when hungry</li>
    <li>Use your coupons</li>
</ul>
<p>
  When strolling through the store, avoid standing too long and looking at   the toys, magazines and other items located at the end of aisles or   near the cash registers.  These products are put there because stores   know they will get the attention of customers, possibly persuading them   to buy.  Before going to the grocery store, eat a good meal and bring a   concise list with you.  Never go shopping on an empty stomach, as it   will have you buying everything in the store that looks good.  Having a   list with you and approaching the trip with an all-business attitude   will help you stick to the planned purchases only, helping you stay on   budget.  Finally, take advantage of store and manufacturer coupons   offered in the Sunday newspaper and online.  By using double coupons on   sale items, it's possible to save tens, perhaps hundreds of dollars per   trip.  In fact, some smart shoppers have been able to use so many   coupons they had the store paying them at the checkout line!  Imagine   being able to go grocery shopping and being paid to do so.  A few trips   like that will help any family's budget over the course of a few months   or a year. </p>
<h3>
  Earning Some Extra Cash </h3>
<p>
  Of course, the best friend of any budget is more money.  Having a good,   steady cash flow means progress is being made on the budget.  To help   make ends meet, many people are turning to finding ways of making extra   money to make sure there's more money than month.  Some of the ways   people are earning extra money to help out include:</p>
<ul class="arrow">
    <li>Selling unwanted items on Ebay or Craigslist</li>
    <li>Finding a second job</li>
    <li>Starting a sideline business</li>
    <li>Having yard sales</li>
    <li>Recycling materials </li>
</ul>
<p>
  Many people make good second incomes selling their unwanted items on   Ebay or Craigslist.  One man's junk is another man's treasure, and when   you find enough people to take your treasures you've got a good amount   of money in your hand.  Others choose to take on a second job at a local   store or restaurant, while some decide to unleash the entrepreneur   within them and start a business on evenings and weekends.  Lawn care,   pet sitting and catering are just some examples of successful businesses   many people have started and turned into additional sources of income.    For more ideas on how to start a business, go to <a href="http://www.entrepreneur.com/">Entreprenuer.com</a>to   take a look at the many articles on specific businesses.  If you're in   need of quick cash, having a yard sale on a weekend or gathering up some   tin cans for recycling can put a few dollars in your pocket.  Whatever   way you decide to earn extra money, it can do nothing but help improve a   financial situation and begin the process of digging out of the debt   trap.</p>
<h3>
  Cut that Expense!</h3>
<p>
  Besides doing things to make money such as taking on another job or   starting a business, finding easy ways to cut expenses can also help   save money.  Some things that can be done include:</p>
<ul class="arrow">
    <li>Carpooling </li>
    <li>Brown bag your lunch to work</li>
    <li>Shop the thrift stores</li>
</ul>
  <p>
  Carpooling is a great way to cut expenses while also being good to the   environment.  With gas prices being so high, riding with others to work   or other places can help to drastically cut fuel expenses. Taking your   lunch to work instead of going out to expensive restaurants can also add   up to substantial savings over the course of several months or a year.    Fixing your own sandwich and eating a piece of fruit is not only   cheaper that fast food, but healthier for you as well.  Finally,   shopping the local thrift stores such as Goodwill or Salvation Army can   produce savings that often have to be seen to be believed.  Clothing,   appliances, toys and more can be found in these stores, often in   excellent condition and at low, low prices. </p>
<p>
  Planning and sticking to a budget can be lots of hard work, and is   sometimes not the most pleasant of tasks.  However, once you and your   family can get into the habit of saving money it will become a way of   life.  Psychologists say it takes 21 days to establish a new habit, so   if you can plan a budget and stick to it for three weeks there's a good   chance a new habit of saving money will begin to take hold.  So make   your plans, have a family meeting to get everyone on board and start   thinking about how good it will feel to say you created a budget, stuck   with it and lived to tell about it.</p>

 
                  <h3>Key Tips &amp; Advice</h3>
                    <p>Things to consider when budgeting:</p>
                    <ul class="arrow">
                        <li>If you have poor credit your interest rates &amp; cost of debt will be significantly higher;</li>
                        <li>If you are able to aggressively pay down debt, you should pay off the highest interest loans most aggressively first. If you need to see a strong sense of progress you may want to start conquering smaller balances first as you tackle your debt mountain.</li>
                        <li>While donating to charity is important for adding a sense of purpose &amp; meaning to life, if you are heavily in debt you are better off digging out of the hole quickly so that you may help others more later. Fixing your own debt issues releaves stress &amp; adds enjoyment to life. </li>
                        </ul>
                      <!-- Tabs -->
 <h3>Recommended Personal Finance Blogs &amp; Websites</h3> 
						<ul class="arrow">
                        	<li><a href="http://www.mrmoneymustache.com/">Mr. Money Mustache</a></li>
                        	<li><a href="http://www.daveramsey.com/">Dave Ramsey</a></li>
                        	<li><a href="http://www.suzeorman.com/">Suze Orman</a></li>
                        </ul>					
                        

    
    
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
