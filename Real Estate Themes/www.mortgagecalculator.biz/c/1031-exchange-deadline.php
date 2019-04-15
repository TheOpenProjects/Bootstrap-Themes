<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>1031 Exchange Deadline Dates: Calculate Deadlines at 45 &amp; 180 Days</title>		
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

function computeFutureDate(now_mo, now_day, now_yr, days_to_add, dt_format) {

   var dbl_dgt = new Array("00", "01", "02", "03", "04", "05", "06", "07", "08", "09");

   var day_str = new Array("Sun", "Mon", "Tues", "Wed", "Thur", "Fri", "Sat");

   var day_str_abrev = new Array("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");

   var month_str = new Array("Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", 

"Oct", "Nov", "Dec");

   var month_str_abrev = new Array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", 

"Dec");



   var now_date_str = month_str[now_mo-1] + " " + now_day + ", " + now_yr + " 12:00:00";
   var now_date = new Date(now_date_str);
   var now_ms = now_date.getTime();
   var now_year = now_date.getFullYear();

   var future_ms = eval(now_ms) + eval(days_to_add * 86400000);

   var future_date = new Date(future_ms);
   //var future_date = future_date.setTime(future_ms);

   var future_mo = eval(future_date.getMonth()) + eval(1);
   var future_day = future_date.getDate();
   var future_wkday = future_date.getDay();
   var future_yr = future_date.getFullYear();



   var future_mo_str = future_mo.toString();
   var future_day_str = future_day.toString();
   var future_yr_str = future_yr.toString();
   var future_date_str = "";

   if(dt_format == 0) {
      future_date_str = future_mo + "/" + future_day + "/" + future_yr;
   } else

   if(dt_format == 1) {

      if(future_mo < 10) {
         future_mo_str = dbl_dgt[future_mo];
      }
      if(future_day < 10) {
         future_day_str = dbl_dgt[future_day];
      }
      if(future_yr_str.length == 4) {
         future_yr_str = future_yr_str.substring(2,4);
      }

      future_date_str = future_mo_str + "/" + future_day_str + "/" + future_yr_str;

   } else

   if(dt_format == 2) {

      if(future_mo < 10) {
         future_mo_str = dbl_dgt[future_mo];
      }
      if(future_day < 10) {
         future_day_str = dbl_dgt[future_day];
      }
      future_date_str = future_mo_str + "/" + future_day_str + "/" + future_yr;

   } else

   if(dt_format == 3) {
      if(future_mo < 10) {
         future_mo_str = dbl_dgt[future_mo];
      }
      if(future_day < 10) {
         future_day_str = dbl_dgt[future_day];
      }
      future_date_str = future_yr + "-" + future_mo_str + "-" + future_day_str;

   } else

   if(dt_format == 4) {
      future_date_str = month_str_abrev[future_mo-1] + " " + future_day + ", " + future_yr;
   } else
   if(dt_format == 5) {
      future_date_str = month_str[future_mo-1] + " " + future_day + ", " + future_yr;
   } else
   if(dt_format == 6) {
      future_date_str = day_str_abrev[future_wkday] + " " + month_str_abrev[future_mo-1] + " " + future_day + ", " + 

future_yr;

   } else

   if(dt_format == 7) {
      future_date_str = day_str[future_wkday] + " " + month_str[future_mo-1] + " " + future_day + ", " + future_yr;

   }


   return future_date_str;

}

function calc_days(form) {

   var v_month = document.calc.month.options[document.calc.month.selectedIndex].value;
   var v_day = document.calc.day.options[document.calc.day.selectedIndex].value;
   var v_year = document.calc.year.options[document.calc.year.selectedIndex].value;

   var v_day_45 = computeFutureDate(v_month, v_day, v_year, 45, 7);
   document.calc.day_45.value = v_day_45;

   var v_day_180 = computeFutureDate(v_month, v_day, v_year, 180, 7);
   document.calc.day_180.value = v_day_180;

}

function clear_results(form) {

   document.calc.day_45.value = "";
   document.calc.day_180.value = "";

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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/1031-exchange-deadline.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				<div class="main-heading"><h1>1031 Exchange Deadline Calculator</h1>
</div>
                    <ul id="breadcrumbs">

                        <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>  
                        <li><a href="https://www.mortgagecalculator.biz/c/investors.php">Investors</a></li> 
                        <li><a href="https://www.mortgagecalculator.biz/c/1031-exchange.php">1031 Exchange</a></li> 
                        <li>Deadlines</li>
                    </ul>
                </div>   			<div class="bottom-section">
<p><img src="https://www.mortgagecalculator.biz/img/house-in-hands.jpg" alt="house" width="130" class="alignright" />    This calculator will help you to determine the 45 and 180 day deadlines when performing a 1031 tax exchange.
 <p>
 <strong>45 Day Deadline:</strong> You must identify your potential like-kind replacement properties to your qualified intermediary no later than midnight of the 45th calendar day following the close of the relinquished property sale transaction.
 </p>
 <p>
 <strong>180 Day Deadline:</strong> You must complete your 1031 Exchange transaction, which includes the conveyance of title to all of your like-kind replacement properties that you intend to acquire, no later than the earlier of:
 <ol>
 <li> midnight of the 180th calendar day following the close of the relinquished property sale transaction, or 
 </li>
 </p>
 <p>
 <li> the due date of your Federal income tax return for the tax year in which the relinquished property was sold, including any extensions of time to file.
 </li>
 </p>
 </ol>
 <p>      </p>

<div class="table-block">
<form name="calc" method="post" action="#">

 <table>
 <tbody>

 <tr>
 <td>
 Date of transfer of your relinquished property:
 </td>
 <td align='center' nowrap>

 <select name='month' size='1' onChange='clear_results(this.form)'>

 <script language="javascript">

 var now_date = new Date();
 var now_year = now_date.getFullYear();
 var now_month = now_date.getMonth()+1;
 var now_day = now_date.getDate();
 var month_arr = new Array("blank", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");

 var i = 0;


 for(i = 1; i<13; i++) {
 if(i == now_month) {
 document.write("<option value='" + i + "' selected>" + month_arr[i] + "</option>\n");
 } else {
 document.write("<option value='" + i + "'>" + month_arr[i] + "</option>\n");
 }

 }
 document.write("</select> \n");
 document.write("<select name='day' size='1' onChange='clear_results(this.form)'>\n");
 for(i = 1; i<32; i++) {
 if(i == now_day) {
 document.write("<option value='" + i + "' selected>" + i + "</option>\n");
 } else {
 document.write("<option value='" + i + "'>" + i + "</option>\n");
 }
 }
 document.write("</select> \n");
 document.write("<select name='year' size='1' onChange='clear_results(this.form)'>\n");
 var year_ago = Number(now_year) - Number(1);
 var years_ahead = Number(year_ago) + Number(6);
 for(i = year_ago; i<years_ahead; i++) {
 if(i == now_year) {
 document.write("<option value='" + i + "' selected>" + i + "</option>\n");
 } else {
 document.write("<option value='" + i + "'>" + i + "</option>\n");
 }
 }

 </script>
 </select>
 </td>
 </tr>

 <tr>
 <td align="center">
 <input type="reset" class="table-btn" value="Reset" />
 </td>
 <td align="center">
 <input type="button" class="table-btn" value="Calculate Deadlines" onClick="calc_days(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 
 45th day:
 
 </td>
 <td align='center'>
 <input type="text" name="day_45" size="40" />
 </td>
 </tr>

 <tr>
 <td>
 
 180th day:
 
 </td>
 <td align='center'>
 <input type="text" name="day_180" size="40" />
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

 
 <h2>Everything You Need to Know About 1031 Exchanges</h2>
<p> 1031 exchanges are a special and potentially lucrative IRS service   code that allows investors to trade up their investment properties.   Allowing purchasers to invest their capital gains on a previously owned   property into a new property, 1031 exchanges are an important tool for   investors to understand and use to their advantage. This guide provides a   quick overview 1031 exchanges and how they can benefit the savvy   investor. </p>
<h3> What is a 1031 Exchange? </h3>
<p>
  A 1031 exchange refers to Internal Revenue Service Code 1031 which   allows like-kind exchanges on properties. This exchange defers capital   gains on the property during the exchange and allows properties to be   purchased temporarily tax-free with the capital gains on both   investments to be collected when the second property is sold. </p>
<p>
  The theory behind the code is when one property has been exchanged for   another, the owner has not actually realized any gain or loss on the   property in the form of taxable funds. The owner essentially just   transfers the investment into another form. The IRS determined it would   be unfair to tax these transactions since no money is being generated on   the property exchange. </p>
<h3>The Basics of a 1031 Exchange</h3>
<p>
  A 1031 exchange must start with a qualifying property. Anything not   specifically addressed by the IRS as excluded is up for use in a 1031   exchange so long as it is an investment. Most properties are rental or   industrial properties with the accompanying personal property. A primary   residence is not considered a qualifying property because it is not a   business investment. The property eligible for a 1031 exchange must also   have a proper purpose. A proper purpose means the property was   generating income through rent or inventory. </p>
<p>
  The exchange takes place for like-kind replacement property. The new   property must be of equal or greater value, equity, and debt to the   primary property or a boot may apply. Any net gains on the primary   property must be used for purchase of the new property. A 1031 exchange   defers all taxes with the exception of monetary gains which are taxed as   capital gains. </p>
<p><img src="../img/property-exchange.png" width="630" height="420" alt="Property Exchange." /></p>
<h3>Definition of Property </h3>
<p>
  The term property in a 1031 exchange is not limited simply to real   estate. In fact, most 1031 exchanges are multi-asset exchanges that   involve actual property and personal property. For example, a purchaser   might sell a single-family rental to purchase a multi-unit apartment   building in a 1031 exchange. The purchaser would expect not only the   building and the land but any furnishing and equipment used in the   upkeep of the apartment building. The additional personal property would   be separated during the sale to identify it as a multi-asset exchange. </p>
<p>
  While personal property, such as furnishing, can be a part of the 1031   exchange, real estate properties may not be exchanged solely for   personal property or vice versa. A piece of land or a building is not   considered like-kind to personal properties under a 1031 exchange. Real   estate must be exchanged for real estate and personal property for   personal property.</p>
<h3>Type of Exchanges</h3>
<p>
  There are five basic types of exchanges. Depending on the property sold   and new property being purchased, the type of exchange can vary.</p>
<ul class="arrow">
  <li>
    <strong>Simultaneous exchange:</strong> This exchange occurs when the primary   property is sold and the second property is purchased immediately. This   exchange still requires a qualified intermediary to handle the   transaction so the purchaser does not come into contact with the capital   gains of the transaction. </li>
  <li><strong>Delayed exchange:</strong> This exchange occurs when the first property is   sold but there is not an immediate second property for purchase.   Instead, the funds are held with a intermediary until a second property   is purchased. Treasury Regulations require this transaction to be   completed within 180 days of the sale of the first property and   replacement properties to be identified within 45 days. </li>
  <li><strong>Build-to-Suit Exchange:</strong> Also known as an Improvement or   Construction Exchange, this exchange allows the initial property to be   sold to provide improvements or replacements on a new property with the   money gained from the exchange. The improvements can only be made on the   replacement property, not any currently owned properties. This is is   beneficial to investors who want to complete a 1031 exchange for a lower   cost property that needs work. </li>
  <li><strong>Reverse Exchange:</strong> Also known as a parking arrangement, this   exchange occurs when the secondary property has already been purchased   and the proceeds from the primary property are retroactively applied to   the 1031 exchange purchase property. The purchaser cannot hold the   primary property and the secondary property simultaneously for a reverse   exchange. Instead, an Exchange Accommodation Titleholder (EAT) holds   the replacement property until the purchaser sells the initial property.   Like the delayed exchange, the entire process needs to take place   within 180 days to be protected.</li>
  <li><strong>Personal Property Exchange:</strong> This exchange does not involve actual   real estate property. Instead this is the exchange of personal goods   used for investment purposes. As was previously mentioned, personal   property may not be exchanged for real estate but this exchange may be   used for investors who want to sell older machinery to upgrade to a   newer model. </li>
</ul>
<h3>Time Limitations</h3>
<p>
  Most 1031 exchanges do not occur as a simultaneous exchange. Finding a   like-kind property can take time and most sellers are only comfortable   when the potential buyer has the funds for purchase available. The IRS   allows 45 days after selling the primary property to identify the a   potential replacement property and 180 days for the transfer to   complete. </p>
<p>
  If a replacement property is not identified within 45 days, the exchange   fails and taxes will need to be paid on the primary property&rsquo;s capital   gains. Even if the 45 day deadline is met, if the replacement property   is not purchased within the 180 days, capital gains taxes must be paid   and the 1031 exchange is null. </p>
<p>
  These deadlines are steadfast except in the event of a natural disaster when the IRS may grant an extension. </p>
<h3>Using a Qualified Intermediary (QI)</h3>
<p>
  Qualified intermediaries, also known as accommodators or exchange   facilitators, are independent parties who facilitate the tax-deferred   exchange by holding the funds during the interim of the 1031 exchange.   Once the new property is purchased, the QI is responsible for acquiring   the purchase and transferring the property to the homeowner within the   IRS time limits. </p>
<p>
  The QI becomes the receiver of the gains on the 1031 exchange and holds   those gains in productive use until a like-kind transaction can be made.   This releases the purchaser from claiming the funds and allows the   funds to be deferred under IRS source code 1031. The QI holds the   capital gains until a new property is purchased which is when they   release the funds for the purchase. </p>
<p>
  A QI relieves the seller from explaining the transaction as anything but   a 1031 from the IRS. If a QI is not used, the IRS may not recognize the   transaction as a 1031 exchange because the seller would receive capital   gains from the initial property sale before completing the second   transaction into a new property. Under no circumstances can the   purchaser act as their own QI. A qualified professional who is well   versed in the ins and outs of IRS source code 1031 is the best way to   complete a 1031 exchange. </p>
<h3>Rules for Identifying a Replacement Property</h3>
<p>
  For property to qualify for a 1031 exchange, it must be &ldquo;like-kind&rdquo;.   This means the properties being exchanged must be similar. Before   revisions to the 1031 exchange service code, the IRS only accepted   like-kind exchanges by a very narrow definition. If a purchaser wanted   to exchange a three unit apartment building, they would need to exchange   it for a similar three unit apartment. This is no longer the case. </p>
<p>
  The definition of like-kind exchange has expanded to include most any   real estate property for another. Currently, condition does not matter   when making a like-kind exchange so a dilapidated building can qualify   for exchange with a nicer building so long as the replacement property   rules are met. In addition, like-kind can also encompass developed   property exchanged for undeveloped land. An apartment unit could be   like-kind exchanged for acreage. So long as both properties in the   exchange can be used for investment and contain some amount of real   estate, they will qualify for exchange.</p>
<p>
  The exemption for this allowance is international property. The IRS will   not allow 1031 exchanges for any property outside of the United States   on either end of the exchange. Regardless of the investment, should an   international property be bought or sold, capital gains taxes must be   paid. </p>
<p>
  As was mentioned previously, the exchange must be made for a property   that is equal or greater in equity and value to the primary property.   When identifying potential replacement properties during the 45 day   grace period, there are three rules that limit which properties the   purchaser can request for the exchange. The purchaser must meet the   requirements from one of the three rules to have the exchange approved.</p>
<ul class="arrow">
  <li>
    <strong>3-property Rule:</strong> This rule simply states that the purchaser   identifies three properties they would be willing to purchase under the   exchange. From these three properties, they can purchase any or all with   the monetary gains from the primary investment property sale. </li>
  <li><strong>200% Rule:</strong> This rule allows the purchaser to identify any number   of properties with a total value no more than twice the primary property   value. </li>
  <li><strong>95% rule:</strong> The purchaser identifies as many replacement properties   as they are interested in but agree that before the end of the 45 day   exchange period, they will acquire a replacement property that is 95% or   greater of the aggregate fair market value for all the identified   properties. </li>
</ul>
<p>
  Once a rule is chosen and the appropriate amount of replacement   properties identified, the purchaser must sign and notify in writing   their intent to a &ldquo;disqualified person&rdquo;. This is a party that has a   relationship with the purchaser, such as a blood relative, a realtor, or   an attorney. A qualified intermediary may also assume this role.</p>
<h3>Taxing the Boot</h3>
<p>
  Extra cash or equity available at the end of a 1031 exchange is known as   a &ldquo;boot&rdquo;. This income is taxed the same as capital gains. A cash boot   is any extra money returned to the purchaser after the completion of the   exchange. If the purchaser sells their first property for significantly   more than the exchange property, they may still receive cash at the end   of the exchange. Ideally, this cash boot could be negated by purchasing   additional property under the 1031 exchange or applying the cash boot   to improvements on the new property to avoid being taxed on the gains. </p>
<p>
  A equity boot is also taxed during a 1031 exchange. If the replacement   property decreases the purchaser&rsquo;s liability, for example exchanging a   home with a $500,000 mortgage for a home with a $400,000 mortgage, the   decrease in liability is taxed as capital gains. In this example,   $100,000 would be taxed as a gain. Like a cash boot, this cost can be   decreased or negated by purchasing more property to increase the   purchaser's liability or taking out more equity for improvements on the   new property. Ideally, a 1031 exchange will not result in a boot to   avoid unnecessary taxes. </p>
<h3>Reporting a 1031 Exchange </h3>
<p>
  A Section 1031 Like-Kind Exchange must be reported to the IRS on a Form   8824 and filed with the tax return for the year the exchange was   performed. The form asks the purchaser to describe the properties   exchange, identify when properties were identified and transferred, the   relationship between the parties who exchanged property, values of both   properties, the net gain or loss on both properties, the persons who   received the cash and who accepted liability for the exchange and   finally the realized gain for the exchange. Properly filling out the   paperwork is imperative as a denied 1031 exchange form will result in   the payment of taxes on the initial property plus penalties and   interest. In addition to facilitating and determining the legality of   the exchange, a qualified intermediary can help the purchaser complete   the paperwork to ensure the IRS recognizes the exchange. </p>
<h3>Benefits of a 1031 Exchange</h3>
<p>
  A 1031 exchange is the only IRS techniques to defer taxes during a   property sale. This is a boon to property purchasers because instead of   losing money to taxes during an exchange, they can keep the capital   gains for a larger, more profitable purchase. With no other IRS source   code is there an option to upgrade property on a tax-deferred basis. </p>
<p>
  Those using a 1031 exchange can also reallocate assets in their   investment portfolio without paying taxes on capital gains. Since the   1031 exchange only requires like-kind replacement properties, purchasers   are able to diversify their portfolio through a simple exchange of   property. If an investor has a portfolio heavy with single family units,   the ability to exchange those for a hotel property or land for   development helps investors branch out into new industry. </p>
<h3>Limitations on 1031 Exchanges</h3>
<p>
  1031 exchanges exclude the sale of properties held specifically for   sale, inventory, stocks, bonds or notes. Debt and interests in a   business cannot be exchanged. A primary residence also cannot be used   for a 1031 exchange as it is not an investment vehicle. </p>
<p>
  1031 exchanges also cannot be used to purchase a new primary residence.   While the exchange property may eventually be converted to the owner&rsquo;s   primary residence, the property must be used for proper use for at least   two years to safely be considered an investment property. Owners   wishing to take advantage of the homeowner's capital gains exemption   have a five year holding period before it is applied. </p>
<p>
  While developed properties may be exchanged for undeveloped land under a   1031 exchange, depreciation recapture is taxed when completing a 1031   exchange. The depreciation recapture is taxed like normal income and it   essentially recollects the offset money previously gained on taxes from   depreciation on the first property. </p>
<h3>1031 Exchanges for Second Homes</h3>
<p>
  Vacation or second homes are commonly not included in a 1031 exchange   because listing them for sale would exclude the residence under IRS   codes. Still, there are exceptions that allow second homes to convert to   investment properties and exchange properties to be used as the   purchaser&rsquo;s primary residence. </p>
<p>
  Prior to 2004, a loophole was available for second homeowners which   allowed them to offer the second property as a rental but not actually   rent the space and still claim the property as an investment, making it   available for a 1031 exchange. That loophole was closed but purchasers   with second homes can still utilize a 1031 exchange. The primary   vacation home must be actively rented out to qualify as an investment   property. While the IRS does not specify an amount of time the home must   be an investment property, the longer the property qualifies as an   investment, the better. One year is considered to be the minimum time   with active renters using the property and paying rent. </p>
<p>
  Once an exchange takes place, the second home must adhere to the 2008   IRS safe harbor rule. This rule states that the IRS will not challenge   any investment property turned second home gained from a 1031 exchange   if two criteria were met. First, in the two years following the purchase   of the second property, it must be rented out for fourteen days or   greater as a fair rental market. Second, the investment property may not   be used by the purchaser for greater than fourteen days or more than   10% of the number of days the investment property is rented during each   year period. </p>
<p>
  Those hoping to exploit the $500,000 capital gains exclusion on primary   residence will be disappointed to learn that the IRS made this process   longer and more difficult with the changes to 1031 exchanges in 2004.   Before the change, homeowners could convert their 1031 exchange   investment property into a primary residence and shield all capital   gains under the exclusion, effectively turning the 1031 exchange   tax-deferral into a tax-free transaction after just a few short years.   Now, purchasers must adhere to the two year plan set by the IRS to   ensure the property remains an investment. In addition, capital gains   will be collected for five years following the 1031 exchange regardless   of property use and the primary homeowner exclusion will not apply   within this time frame. While it is still possible to use shield the   capital gains through primary home ownership, it takes much longer. </p>
<h3> Conclusion </h3>
<p>
  With the help of a qualified intermediary and a grasp of IRS source code   1031, investors can make strategic gains with their investments. While   not all investment opportunities will benefit from a 1031 exchange, any   like-kind exchange should at least explore the 1031 exchange option for   maximum investing savings.</p>
 
                  <h3>1031 Resoures</h3>
                    <p>Resources to consider when obtaining a section 1031 tax-deferred exchange:</p>
                    <ul class="arrow">
                        <li><a href="http://www.irs.gov/uac/Like-Kind-Exchanges-Under-IRC-Code-Section-1031">IRS.gov: Like-Kind Exchanges</a></li>
                        <li><a href="http://www.1031.org/about1031/faq.htm">1031.org: FAQs</a></li>
                        <li><a href="http://www.realtor.org/field-guides/field-guide-to-1031-exchanges">Realtor.org: 1031 NAR Field Guide</a></li>
                        <li><a href="http://www.forbes.com/2010/01/26/capital-gains-tax-1031-vacation-home-personal-finance-robert-wood.html">Forbes: 1031 Tips</a></li>
                        <li><a href="https://www.mortgagecalculator.biz/c/1031-exchange.php">1031 exchange calculator</a></li>
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
