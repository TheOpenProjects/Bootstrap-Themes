<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Mortgage Affordability Calculator: What Mortgage Can I Afford?</title>		
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

   var VmonthlyRent = sn(document.calc.monthlyRent.value);
   var VintRate = sn(document.calc.intRate.value);
   var VnumYears = sn(document.calc.numYears.value);

   if(VmonthlyRent == 0) {
      alert("Please enter your monthly rent payment.");
      document.calc.monthlyRent.focus();
   } else
   if(VintRate == 0) {
      alert("Please enter the expected mortgage interest rate.");
      document.calc.intRate.focus();
   } else
   if(VnumYears == 0) {
      alert("Please enter the number of years you will finance the home for.");
      document.calc.numYears.focus();
   } else {

      var i = VintRate;
      if (i >= 1.0) {
         i = i / 100.0;
      }
      i /= 12;

      var noMonths = VnumYears * 12;
      var pow = 1;

      for (var j = 0; j < noMonths; j++) {
         pow = pow * (1 + i);
      }

      var Rprincipal = ((pow - 1) * VmonthlyRent) / (pow * i);
      document.calc.mortgageSize.value = fns(Rprincipal,2,1,1,1);

      var VdownPayment = Number(Rprincipal / .90) - Number(Rprincipal);
      document.calc.downPayment.value = fns(VdownPayment,2,1,1,1);
	  
	  var VdownPayment20 = Number(Rprincipal / .80) - Number(Rprincipal);
      document.calc.downPayment20.value = fns(VdownPayment20,2,1,1,1);

      var VhomePrice = Number(Rprincipal) + Number(VdownPayment);
      document.calc.homePrice.value = fns(VhomePrice,2,1,1,1);

      var VhomePrice20 = Number(Rprincipal) + Number(VdownPayment20);
      document.calc.homePrice20.value = fns(VhomePrice20,2,1,1,1);

   }

}


function clear_results(form) {

      document.calc.mortgageSize.value = "";
      document.calc.downPayment.value = "";
      document.calc.homePrice.value = "";
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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/affordability.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				<div class="main-heading"><h1>Renter Mortgage Affordability Calculator</h1>
</div>
                    <ul id="breadcrumbs">

                        <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
						<li><a href="https://www.mortgagecalculator.biz/c/rent-or-buy.php">Rent vs Buy</a></li> 
                        <li>Home Affordability</li> 
                  </ul>
                </div>
                <div class="bottom-section">
<p><img src="https://www.mortgagecalculator.biz/img/house-in-hands.jpg" alt="house" width="130" class="alignright" />   This calculator will estimate the size of a home mortgage loan you can afford to borrow based on the size of your current monthly rent payment.</p>
 <p>
 Note: This calculator assumes that your house's property tax, insurance and maintenace expenses will be offset by the appreciation of the value of your home. Depending on market conditions &amp; timing that may or may not be the case &mdash; as real estate prices change due to a wide array of local factors and broader macro-economic impacts like changes in mortgage rates.  </p>
 <p>See our full <a href="https://www.mortgagecalculator.biz/c/rent-or-buy.php">rent vs buy calculator</a> for more detailed calculations and look at <a href="http://info.trulia.com/rentvsbuy">Trulia's map for local market conditions</a>.  Frequently trading in and out of real estate can be stressful &amp; expensive. It is typically a large  transaction, and you may not beat transaction costs, particularly if you do not live in the house very long before selling it &amp; thus  do not build up much home equity to offset real estate commissions &amp; other transaction-based costs.</p>

   				<div class="table-block">
<form name="calc" method="post" action="#">

 <table>
 <tbody>
 </td>
 </tr>

 <tr>
 <td nowrap>
 Your monthly rent payment:
 </td>
 <td align="center">
 <input name="monthlyRent" type="number" step="any" value="1200" size="15"  onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='1200'?'':this.value;" onblur="this.value = this.value==''?'1200':this.value;"/>
 </td>
 </tr>

 <tr>
 <td nowrap>
 <a href="#viewrates"><strong>Mortgage interest rate</strong></a>:
 </td>
 <td align="center">
 <input name="intRate" type="number" step="any" value="6" size="15"  onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='6'?'':this.value;" onblur="this.value = this.value==''?'6':this.value;"/>
 </td>
 </tr>

 <tr>
 <td nowrap>
 Term of the mortgage (years):
 </td>
 <td align="center">
 <input name="numYears" type="number" step="any" value="30" size="15"  onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='30'?'':this.value;" onblur="this.value = this.value==''?'30':this.value;" />
 </td>
 </tr>

 <tr>
 <td align="center">
 <input type="reset" value="Clear" class="table-btn" />
 </td>
 <td align="center">
 <input type="button" name="compute" class="table-btn" value="Estimate Mortgage Size" onClick="computeForm(this.form)" />
 </td>
 </tr>

 <tr>
 <td nowrap>
 The size mortgage you could afford:
 </td>
 <td align="center">
 <input type="text" name="mortgageSize" size="15"  class="results" readonly />
 </td>
 </tr>

 <tr>
 <td colspan="2" align="center"><h3>10% Down Payment &amp; Associated Home Value</h3>
 </td>
 </tr>


 <tr>
 <td nowrap>
 10% down payment:
 </td>
 <td align="center">
 <input type="text" name="downPayment" size="15"  class="results" readonly />
 </td>
 </tr>

 <tr>
 <td nowrap>
 Price of home:
 </td>
 <td align="center">
 <input type="text" name="homePrice" size="15"  class="results" readonly />
 </td>
 </tr>





 <tr>
 <td colspan="2" align="center"><h3>20% Down Payment &amp; Associated Home Value</h3>
 </td>
 </tr>

 <tr>
 <td nowrap>
 20% down payment:
 </td>
 <td align="center">
 <input type="text" name="downPayment20" size="15"  class="results" readonly />
 </td>
 </tr>

 <tr>
 <td nowrap>
 Price of home:
 </td>
 <td align="center">
 <input type="text" name="homePrice20" size="15"  class="results" readonly />
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


 
 <h2>The Critical Importance of Understanding Home Affordability</h2>
<p> Deciding to purchase a home requires an enormous amount of   self-assessment and detailed planning before making this long-term   commitment. It is an individual choice that requires careful   consideration and an analysis of the realities associated with home   ownership. The great American dream of owning a home may not be for   everyone for a variety of reasons. It does require some lifestyle   changes that many people are not willing to make. Those who want to   fulfill the American dream of owning a home must make that their first   priority and begin to prepare for it. </p>
<h3>
  Early Financial Preparation Makes Buying a Home Easier</h3>
<p>
  Mortgage calculators help prospective home buys determine exactly how   much they can afford. They are tools that help determine how much home   is affordable based on income, interest rates and length of time for the   loan. Lenders are interested in calculating a person's debt-to-income   ratio during the loan approval process. Generally, if the debt-to-income   ratio is above thirty-six percent, chances of getting a loan are slim.   This is the time to begin the process of attempting to reduce the amount   of debt before applying for the loan. </p>
<h3>
  Credit Scores Play a Major Role in the Loan Approval Process</h3>
<p>
  Many people never think about their credit score until they apply for a   loan. Sometimes they are surprised to find that their scores are too   low, which disqualifies them to some loans. The three major   credit-reporting agencies keep track of all credit transactions and   assign a score based on the way credit is handled. Credit scores that   range between 700 and 770 are considered good, but it all depends on the   lender. Each one has their own set of criteria for approving loans.   Those with low credit scores cannot expect to get the best interest   rates on a home loan. These are reserved for those with the highest   scores. Those with low credit scores can fix their credit if they are   aware of it early enough in the home buying process. Since it may take   months to undo credit problems, checking early allows time to begin the   process of rebuilding credit before applying for a loan. Annual credit   reports are free and it pays to check early.</p>
<h3>
  Financial Requirements to Consider</h3>
<p>
  Purchasing a home is probably the largest purchase most people will make   during their lifetime, which makes being prepared even more critical.   It is imperative to evaluate all personal finances and determine how   much money will be available for a down payment. A good rule of thumb to   follow when trying to determine how much of a down payment will be   required is to decide on the amount of money that will be spent on a   house. Most loans require a twenty percent down payment. Most lenders   require this much down in order to provide better interest rates and   loan terms. Making a substantial down payment helps buyers avoid paying   private mortgage insurance and protects as decreased property values. In   addition to the cash needed for a down payment, there are some hidden   costs to consider. Extra funds will be needed to cover appraisal costs   and closing costs. This should be taken into account when evaluating the   affordability of a home purchase.</p>
<h3>
  The Inevitable Effects of Local Market Conditions</h3>
<p><img src="../img/housing-dominoes.png" width="630" height="420" alt="Housing Dominoes." /> </p>
<p>Market trends have an impact on what buyers and sellers can expect, but   national averages do not reflect local market norms. The local economic   conditions determine local market trends, which are much more reliable   gauges of market status. It is best to pay attention to some local   market indicators to help determine affordability in the housing market.   These markers provide a clearer picture of the local housing market   than national ones. Research the number of applications for new building   permits, real estate statistics showing the number of homes currently   listed, how long they have been on the market and median listing and   sales prices at the local level. </p>
<h3>
  The Importance of New Construction Permits</h3>
<p>
  This is a good indicator of market demand. Builders and developers will   not be building if there is no current demand. Cities and towns accept   applications for new construction permits. These are easily accessible   through city and county government offices. Supply and demand plays a   key role in new development. Building trends affect housing prices. </p>
<h3>
  Important Market Trend Indicators</h3>
<p>
  Several online real estate websites list houses for sale in a particular   region. Among these are Trulia and Zillow. Both of these sites allow a   prospective buyer to search for properties for sale in a selected area.   This is one way to determine the number of homes currently on the   market, how long they have been for sale and the listing prices. Another   way is to search real estate ads in the local newspaper. Many local   real estate brokers and agents maintain a website with their listings.   This is an excellent source of information regarding listing prices,   time properties have been on the market, detailed information such as   cost per square foot of homes and median price ranges in selected areas.   Some sites list the average sales per month. The softness of a market   is determined by inventory that is moving slowly or has remained level   for twelve months or longer. An indicator of an improving market is to   compare how long it took a house to sell six months to a year ago   compared to now. </p>
<h3>
  Employment Trends Play a Key Role in the Housing Market</h3>
<p>
  The local economy of any area is affected by current economic   conditions. In areas where new businesses are welcomed to the city,   those businesses bring a boost to the local economy. Big employers   sometimes transfer employees to the new locations. These employees must   find housing thus increasing the demand for more available existing   homes and new construction. If unemployment rates are  high in the area,   housing demand will decrease. New businesses will bring job offers and   help increase the population. A growing populace signals a future uptick   in the local real estate market.</p>
<h3>
  Determining Affordability Before Applying for a Loan</h3>
<p>
  In order to qualify for a mortgage on a median-priced home, a   prospective homeowner should understand that the monthly payment should   not exceed twenty-five percent of the gross monthly income. Using this   formula, the necessary monthly gross income should at least be equal to   the monthly payment multiplied by four. A review of a recent tax return   helps determine the annual gross and net income based on the W-2 tax   form. Keep all this financial information in a file for quick reference.   A factor that is as important in determining affordability of a   property is the current effective mortgage rate that is reported monthly   by the Federal Housing Finance Board. This rate allows homeowners to   calculate the additional costs associated with a mortgage besides the   basic monthly mortgage payment. Interest rates and fees associated with   owning a mortgage must be added into the equation when trying to   determine qualifications needed when applying for a mortgage loan and   ultimately servicing it. </p>
<h3>Reasons for Buying Instead of Renting</h3>
<p>
  Many benefits are derived from owning a home including a sense of   freedom and privacy. Renters must comply with rules set forth by the   landlord including noise restrictions and pet ownership. Homeowners have   the freedom to make any permanent changes to the property without   having to consult with anyone. Homes give owners the added benefit of   being in charge of an appreciating investment while enjoying living in   it. Market fluctuations have do not affect fixed mortgage payments,   unlike rent payments, which are volatile and can change whenever a lease   term ends. </p>
<h3>
  Tax Deductions</h3>
<p>
  Homeowners can deduct mortgage interest from their gross income to help   lower their taxable income when filing income tax forms. Being able to   itemize deductions helps with tax obligations depending on filing   status. All interest paid on a mortgage and accompanying costs   associated with owning a home are deductible. Even loan discount points   may be included in the deduction. </p>
<h3>
  Equity</h3>
<p>
  Purchasing a home gives the owner the distinct advantage of building   equity over a period of time. A home is a valuable asset that grows as   the mortgage is paid down. Equity is the difference between the total   mortgage amount and the current market value of the home. When the   housing market is favorable, the return on the initial investment can be   substantial. Many people choose to borrow against built-up equity. This   is known as a home equity loan that many people use to pay down   higher-interest loans, finance a college education or make home   improvements. </p>
<h3>
  Possible Reasons for Not Buying a Home</h3>
<p>
  Some people are not willing to take what they perceive as the risks   involved in buying a home. Even though owning a home provides stability,   many people are not willing to give up the perceived freedom from being   able to walk away from a rental. Renting provides more flexibility to   just pick up and move without the hassle of having to sell a property   first. Some may lack the confidence that is needed to commit to a   long-term debt knowing that the mortgage payment is not the only expense   involved in home ownership. Many are just not ready for this   commitment. Anyone who is in an unstable relationship may fear the   possibility of being left to handle the debt alone. For them, renting is   a much better choice.</p>
<h3>
  Financial Reasons for Renting Instead of Buying</h3>
<p>
  There are circumstances where renting is better for some people. Career   positions that require extensive traveling can limit an individual's   living choices. Being away from home for extended periods of time make   it almost impossible to maintain a home and yard. Many times those   people, who are in the process of building a career, only need a place   to stay when they are not on a trip. Renting works out better for them   especially when it is much cheaper to rent than to own. In some places,   rent can be as much as fifty percent cheaper than a comparable sized   house. The extra monthly expenses associated with home ownership are   eliminated with renting. Besides the monthly rental payment and possibly   utilities, there are no other costs associated with renting. Other than   adhering to required lease terms, it is simple to move whenever   necessary. </p>
<h3>
  Costs Directly Associated with Home Ownership</h3>
<p>
  When considering the possibility of purchasing a home, it is best to   deal with reality. Sometimes the purchase of a home is an emotional   decision rather than a sound financial one. It is much better to know   up-front the costs of owning a home and then decide whether buying it is   the best choice. Mortgage payments are only the beginning of the   expenses associated with owning and maintaining a home. The initial cost   of purchasing includes making a required down payment of between ten   and twenty percent of the purchase price. Inspection fees and closing   costs must be figured into the equation. Homeowner's insurance, property   taxes and utilities can be a major monthly expense that must be   factored into the overall cost. Landscaping and lawn maintenance are   additional expenses. Many neighborhood have a Homeowners Association   that requires an annual fee which is used to maintain streets and any   common areas.</p>
<h3>
  Making an Educated Decision to Purchase a Home</h3>
<p>
  People living in the United States are fortunate to be able to make   lifestyle choices. Some feel that home ownership is the fulfillment of   the American dream, while others prefer a much more flexible lifestyle.   For those who prefer owning instead of renting, purchasing a home is   probably the largest single investment they will ever make. For this   reason, it is important to understand everything involved in home   ownership before making the final commitment to buy. Those who research   the market, examine their own finances, and try to separate myths from   truths about home ownership are better prepared to make this serious   decision. If they conclude that their goal of achieving the great   American dream is an attainable one and understand everything associated   with this long-term commitment, they will reap the benefits of home   ownership. Understanding affordability of a home purchase helps   individuals make smart financial choices. Seeking professional   assistance is advisable for those with questions or concerns. Advance   preparation ensures a smoother transaction. </p>

 
                
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

