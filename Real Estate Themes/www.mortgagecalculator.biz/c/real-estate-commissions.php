<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Real Estate Commission Rebate Calculator</title>		
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

   var Vprice = sn(document.calc.price.value);

   if(Vprice == 0) {
      alert("Please enter the selling price of your property.");
      document.calc.price.focus();
   } else {

      var Vpercent = sn(document.calc.percent.value);
      if(Vpercent >= 1.0) {
         Vpercent = Vpercent / 100.0;
      }

      var Vrebate_perc = sn(document.calc.rebate_perc.value);
      if(Vrebate_perc >= 1.0) {
         Vrebate_perc = Vrebate_perc / 100.0;
      }

      var Vadvert_cost = sn(document.calc.advert_cost.value);

      var Vcommission = (Vprice * Vpercent);
      document.calc.commission.value = fns(Vcommission,2,1,1,1);

      var Vrebate = 0;
      if(document.calc.base.selectedIndex == 0) {
         Vrebate = (Vprice * Vrebate_perc);
      } else {
         Vrebate = (Vcommission * Vrebate_perc);
      }
      document.calc.rebate.value = fns(Vrebate,2,1,1,1);

      var Vnet_commission = Number(Vcommission) - Number(Vrebate);
      document.calc.net_commission.value = fns(Vnet_commission,2,1,1,1);

      var Vtotal_cost = Number(Vadvert_cost) + Number(Vnet_commission);
      document.calc.total_cost.value = fns(Vtotal_cost,2,1,1,1);

   }
}

function clear_results(form) {

   document.calc.commission.value = "";
   document.calc.rebate.value = "";
   document.calc.net_commission.value = "";
   document.calc.total_cost.value = "";


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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/real-estate-commissions.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				<div class="main-heading"><h1> Real Estate Commission Calculator with Rebate</h1>
</div>
                    <ul id="breadcrumbs">

                        <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
                        <li><a href="https://www.mortgagecalculator.biz/c/home-sellers.php">Home Sellers</a></li>
                        <li><a href="https://www.mortgagecalculator.biz/c/commissions.php">Commissions</a></li>
                        <li>Rebates</li>
                    </ul>
                </div>
                <div class="bottom-section">
<p> This calculator will help you to estimate the cost of selling your home -- including the factoring in of the agent's advertised rebate.              </p>

<div class="table-block">
<form name="calc" method="post" action="#">
 <table>
 <tbody>

 <tr>
 <td>
 
 Sale price ($):
 
 </td>
 <td align="center">
 <input name="price" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="400000" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" /> 
 </td>
 </tr>

 <tr>
 <td>
 
 Commission percentage (%):
 
 </td>
 <td align="center">
 <input name="percent" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="6" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" /> 
 </td>
 </tr>

 <tr>
 <td>
 
 Commission rebate (% of):
   <select name="base" size="1" onChange="clear_results(this.form);computeForm(this.form)" width="150" style="width: 150px">
 <option value="1">Selling price</option>
 <option value="2">Gross commission</option>
 </select>
 
 </td>
 <td align="center">
 <input name="rebate_perc" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="3" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>
 
 Advertising cost ($):
 
 </td>
 <td align="center">
 <input name="advert_cost" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="500" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td align="center">
 <input type="reset" class="table-btn" value="Reset" />
 </td>
 <td align="center">
 <input type="button" class="table-btn" value="Calculate" onClick="computeForm(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 
 Commission before rebate:
 
 </td>
 <td align="center">
 <input type="text" name="commission" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Commission rebate:
 
 </td>
 <td align="center">
 <input type="text" name="rebate" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Net commission cost:
 
 </td>
 <td align="center">
 <input type="text" name="net_commission" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Total cost (net-commission plus advertising):
 
 </td>
 <td align="center">
 <input type="text" name="total_cost" size="15" />
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

 

<h2>Understanding Real Estate Commissions</h2>
<p> Selling a home can be one of the most stressful things that a family   or individual goes through, but it doesn't have to be a horrendous   process.  In fact, many people are able to make a lot of money by   selling real estate.  In order to be successful however, a person or   family has to understand the process of selling, make a decision about   using a realtor, prepare their home to be sold, and actually complete   the selling process.</p>
<h3>
  How Realtors Work</h3>
<p>
  Many people assume that they have to go through a realtor when selling   their home.  While this isn't necessarily true, a good realtor can get   more money for the home and help it to sell faster.  The reasons for   this, however, can be complicated.  Realtors have the experience to deal   with a wide variety of properties, and they're able to bring in a lot   more potential customers than most people who try to sell on their own.    They're also good at dealing with properties with liens, that are going   through a short sale, and/or have structural and cosmetic issues.</p>
<p>
  In exchange, a realtor typically charges the seller a commission based   on the selling price of the home.  Typically, this rate is six percent,   but in certain circumstances and locations it can go as high as ten   percent (note that this is very rare).  A lot of people are surprised to   learn that their particular agent is not pocketing the whole amount,   however.</p>
<p>
  In fact, the commission is split between several different agents and   companies.  To start, the commission is split between the buyer's agent   and the seller's agent.  The exact formula for this can vary based on a   number of factors, including the location of the property, the customs   of the area, and the market conditions.  When a house has been on the   market for a long time, many realtors are willing to sacrifice more of   their share of the commission to get a place sold.</p>
<p>
  After splitting with the buyer's realtor, however, the seller's portion   of the commission is split between the agent and the company that the   agent works for.  Typically the split is 50/50.  The company uses their   share to cover the advertising and overhead costs, while the agent uses   his or her share of the commission as salary.  Portions of the agent's   commission can also be shared with professionals who stage the home and   other agents who assisted in the sale.  Nonetheless, a typical seller's   agent will get a payday of about 1.5% of the total selling price of the   house.</p>
<p><img src="../img/rebate.jpg" width="630" height="288" alt="Rebate." /></p>
<p>
  A very limited number of agents work on a flat fee scale.  These agents   charge a flat amount of money for each service they provide.  Because it   can be so difficult for realtors to parse out their individual   services, however, very few realtors will charge customers in this   manner.</p>
<p>
  Because their pay is tied to the selling price of the home, a realtor is   very motivated to get the highest price possible.  Because they do not   get any money until a home sells, however, they can also be very   motivated to simply get a home sold at any price. </p>
<h4>
  What Happens if a Realtor Can't Sell My House?</h4>
<p>
  Of course, hiring a realtor is not a guarantee that a home will get   sold.  Despite their experience, a realtor cannot guarantee a sale, and   they certainly cannot guarantee the price it will be sold at.  In fact,   it's common for some properties to not get sold in every kind of market.    In these cases, a realtor has invested time and money into getting a   property sold, and will expect some kind of compensation.</p>
<p>
  In fact, most realtor contracts specify a flat fee that a seller has to   pay in the event that a house does not sell.  Depending on the area and   market conditions, this fee will usually range between several hundred   and a thousand dollars.  While this can seem like a lot to pay, it   generally just covers the basic services a realtor provides.    Advertising on the MLS (the listing service for real estate) can cost   several hundred dollars alone.</p>
<p>
  In cases when the market is particularly bad, a realtor might demand   this fee upfront before starting to list and market the property.  If   the house sells, the fee is then subtracted from the total amount of   commission paid.</p>
<p>
  Also, if a house does not sell by the end of the contract period   (typically six months), a seller and a realtor can choose to renew the   contract.  Keep in mind that the realtor might not always choose to   renew.  This is often the case when a seller will not work with the   realtor to make his or her home sellable.</p>
<h4>
  Should I Use a Realtor?</h4>
<p>
  One of the biggest decisions that everyone has to make when   they decide to sell their home is whether or not to use a realtor.    While there are many factors involved in the decision, ask yourself the   following questions when trying to decide.</p>
<p>
  Do I know what my home is worth?  Staging a home is helpful, but the   truth is that your price is what will really sell your home.  Until   recently, all homeowners had to go on was the word-of-mouth price quotes   they heard from friends and neighbors.  Today,  however, there are a   number of websites that promise to give you the fair market value of   your home in minutes.  If you live in an area with a fairly active real   estate market, electronic property records, and your home is very   similar to a lot of other ones, these websites can be a good resource.    Many people who houses with unusual features, however, will probably   discover that these websites aren't as accurate as they need.</p>
<p>
  Does my home have any special features?  Everyone thinks that their home   is special, but homes in unusual locations (on the beach, next to a   highway, etc.) will probably need some marketing help to get top dollar   and the right buyer.  If your home has any special construction   features, such as being handicap accessible or having a secret   passageway (don't laugh, we've seen it), you'll also want some   professional help to find a buyer that will see these features as an   asset.</p>
<p>
  Am I selling under special circumstances?  If you can be available to   show the home at any time and have a long time frame (several months or   more) in which to get the home sold, you might do really well by trying   to sell on your own.  People who need to sell quickly or who live far   away from the property are going to need some help, however.</p>
<p>
  Are you able to prepare the home to be shown on your own?  A house that   is in great condition will typically sell a lot faster than a house that   isn't.  &ldquo;Great condition&rdquo; can mean a lot of different things.  Visit a   few open houses and see how realtors present the home.  Be honest, can   you get your house in similar condition?  If you're working a lot and   can't declutter, and/or if you're helping an elderly relative sell a   home who can't really get ready for potential buyers at a moment's   notice, you'll probably do better by going with a relator.</p>
<p>
  Can you afford to pay a commission?  This might be the biggest factor   for many people trying to sell a home.  After talking with a realtor and   determining a good selling price for your home, figure out how much you   will have to pay in commission if the home sells for that much.  With   so many homeowners underwater or owing very close to what their home is   worth, many people are discovering that they cannot afford a realtor to   sell their home.  If this is true for you, really consider if now is a   good time to sell, if you can sell on your own, or if you want to rent   the property while waiting for the market value of the home to increase.</p>
<h3>
  Preparing to Sell</h3>
<p>
  After deciding how you want to sell your home, it's time to get a plan   into place.  Ideally, you'll give yourself several months to prepare a   home to be shown, although this can vary a lot based on the condition of   the home and the amount of time you have.  Whether you're using a   realtor or trying FSBO, make sure you cover these basics.</p>
<p>
  Clean up your yard.  Curb appeal is one of the biggest selling points of   a home.  Mow the grass, trim back anything overgrown, and make sure   there is no trash.  Also remove anything dead or dying and if necessary   replace it.  This includes sod.  In the backyard, make sure all ponds,   waterfalls, and pools are working properly and clean.  If you live in a   flood zone, plant grass or other plants in any area with standing water.    Finally, be sure that your water, sewer, and other utility equipment   is easily accessible and visible.  A lot of potential buyers will want   to check the condition of these gauges.</p>
<p>
  Clear the clutter.  For some people, this can be the hardest and most   time-consuming part of selling a home.  If you have lived in your home   for years, it can be hard to see clutter when you see artwork, useful   items, and beloved objects.  Try to stick to a rule of no more than one   object on any surface.  That means no more than one flower arrangement,   sculpture, utensil, etc on every kitchen counter, table, and floor.</p>
<p>
  Rearrange the furniture if you need to.  If you have rooms that are   stuffed with pieces that make it difficult to move around (or that block   access to a door or hallway) you'll need to move them somewhere else   for a while.  Don't rearrange furniture to hide spots on the carpet or   other damage unless it looks natural.  No one is fooled by an armchair   in the middle of a playroom, and it will probably cause buyers to wonder   what else is being hidden.</p>
<p>
  Make small cosmetic repairs, especially if they could be taken as signs   of a bigger problem. For example, replace any cracked floor tiles.    While these are common in houses as they settle and people set down   heavy furniture, they are often taken as a sign of foundation problems,   causing buyers to flee.  Fortunately, this is a cheap and simple repair   to make.  If you have any tape line cracks in the drywall, make sure   these are fixed as well.  You'll probably have to do it when the home is   sold, anyway.</p>
<p>
  Clean everything.  Keep your home spotless.  Some people hire a   housekeeping service for this task, while others just develop a daily   routine that makes it easier to keep the house show-ready.  If you have   kids, this can be a big chore, but a clean house will sell faster and   for more money.  Also make sure that the house smells fresh.  Avoid very   strong scented candles (you never know what people won't like), but do   try simple, clean scents.</p>
<p>
  Get your paperwork in order.  Take some time now to make sure you have   all the deeds and other ownership documents you'll need when it comes   time to close.  Also go ahead and assemble your last month or two of   utility and insurance bills.  A lot of buyers will want to know their   potential costs to own the home.</p>
<p>
  If you are selling on your own, also make sure you get the following items in order.</p>
<p>
  Hire a real estate attorney to guide you through the selling process.    It's rare that a person can figure this out on their own, and you'll   want the protection for what is most likely going to be your biggest   financial transaction.</p>
<p>
  Make signs and set up advertising.  While a yard sign and an ad on   craigslist might be enough to attract buyers in some areas, most people   will need to add their home to several online registries, post multiple   signs, and advertise in newspapers and/or local real estate magazines.   Also be sure to schedule several open houses and make sure the home is   ready for them.</p>
<p>
  Depending on your area and market conditions, you might have several   weeks to several months of showings before your home is sold.  A realtor   can show you how long homes that are similar to yours have been on the   market and how long they took to sell.</p>
<h4>
  Once you Get an Offer</h4>
<p>
  After going through the entire showing process, getting an offer can be   very exciting.  Be careful not to get carried away, however, since this   is the part where the real work begins.  If you're working with a   realtor, you'll get a call as soon as he or she receives the paperwork   for the offer.  After you calm down, sit down and really read through   the offer.</p>
<p>
  To many people, the most important part of the offer is the price the   seller gives, but there are many other important details.  Be sure to   pay attention to the repairs that they want made and the schedule they   want to move in.  Consider the price of the repairs they want to have   made, and compare it to the amount they want to pay you for your home.    Keep in mind that you will be charged a commission on every dollar of   the offer amount while the repairs are coming out of your own pocket.    Make sure to consider the move-in schedule in conjunction with your own   schedule and the time it will take to make the necessary repairs.  In   other words, if you need a new roof and have to paint five rooms, you   probably can't let the buyer move in next week. </p>
<p>
  After reading through the offer, you will either accept or provide a   counter-offer.  Keep in mind that most buyers expect a counter-offer, so   the initial offer will probably be low and include a lot of items that   they want fixed.  Also remember that a realtor can often informally ask   about details such as a move-in schedule before submitting a   counter-offer, but he or she cannot negotiate without any paperwork.</p>
<p>
  In your counteroffer, feel free to ask for more money, the removal of   certain items from the repair list, and/or a change in schedule.  In   many cases, offers and counteroffers will go through several rounds of   negotiations before everyone reaches an agreement.</p>
<p>
  As soon as an agreement is reached, the buyer will put down a deposit,   known as &ldquo;earnest money&rdquo; and the house will go under contract.  This   ensures that the buyer will purchase the house at closing, and will   close the home to any further bids.  In very rare instances, a buyer can   request that the seller put forth earnest money as well.  Typically the   amount of earnest money is between 0.5% and 2% of the home's value.    The money goes into an escrow account, and will later be returned to the   buyer or put directly towards the closing costs of the loan.</p>
<h4>
  Getting Ready to Move</h4>
<p>
  After this, the buyer will begin working on finishing up his or her   mortgage paperwork while the seller works on completing the items on the   repair list and packing up his or her belongings.  During this process,   the home might need to be made available to a home inspector and other   professionals as outlined in the contract. </p>
<p>
  As you make repairs, be sure to document that the repair was made.  Take   before and after photos if you're doing any work yourself, and save all   of your receipts for any supplies and tools purchased.  If you hire   contractors, save copies of their contracts, invoices, receipts, and   warranties. </p>
<p>
  As you pack, be careful not to damage anything, and be sure not to take   anything that was specified in the contract as conveying with the house.    After both sides have completed their paperwork, a final walk through   of the home will be completed by the buyer and any last minute repairs   will have to be done or compensated for.  Closing will typically take   place with a real estate attorney. </p>		
  

  

    
    
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
