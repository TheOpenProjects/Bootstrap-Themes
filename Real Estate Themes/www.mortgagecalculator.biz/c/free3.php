<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Free Dynamic HTML Mortgage Calculator Script for Realtors: Javascript Iframe Mortgage Calculator Widgets &amp; Plug Ins With Variables</title>
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
							<a href="https://www.mortgagecalculator.biz/"> <img src="https://www.mortgagecalculator.biz/img/logo.png" alt="MorgageCalculator logo." /> </a>
						</div>
						<nav>

                    <div class="holder" style="width:280px;"><br /></div>

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
											<li><a href="https://www.mortgagecalculator.biz/c/amoritization-calc.php">Explainer Calculator</a></li>
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
					<div class="image-block">
                    </div>
					<div class="mlogo">
					</div>

					<div class="bottom-links">
					</div>
				</div>

                 
                  
                
                
				<div class="page-right">
			<div class="heading-block">
				<div class="main-heading"><h1>Free Real Estate Calculators for Webmasters</h1>
</div>
                    <ul id="breadcrumbs">
                        <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
                        <li><a href="https://www.mortgagecalculator.biz/c/free.php">Free Calculators</a></li>
                        <li>Dynamic Variables</li>
                    </ul>
                </div>
                
                <div class="bottom-section">
<h2>Many FREE Options to Choose From</h2>
<h3>Dynamically Pass Variables</h3>
<p>These calculation tools are similar to those offered <a href="https://www.mortgagecalculator.biz/c/free.php">on our basic calculators page</a>, however there is another advanced feature in that all the calculators on this page allow you to dynamically pass variables based on a listing's home price, loan amount, interest rates, and loan term.</p> 

     <p>We offer a variety of advertisement-free mortgage calculation tools for real estate professionals. For our general mortgage calculator we coded it up with a number of different style and format options:</p>
<ul class="arrow">
<li><strong>Full-sized wide calculator</strong> - great for if you want to feature a full sized calculator in the body content area of your website & create a page specifically devoted to featuring it.</li>
<li><strong>Narrow sidebar calculator</strong> - still offers all the functionality of the full sized calculator, but in a condensed narrow format, so it can fit in the sidebar of a Wordpress blog using their built-in custom widget app feature.</li>
<li><strong>Basic narrow calculator </strong> - similar to the above apps, however this application aims to be a simple &amp; fast estimation tool that<em> uses minimal space</em>. This basic calculator is tiny. To achieve that small size, it excludes things like: closing costs, PMI &amp; homeowner's insurance. This app works great on sites that get significant mobile traffic &amp; for people who want a quick at-a-glance estimate.</li>
<li><strong>HTML link</strong> - while all these calculators are easy to install, we off this option for those who prefer to link to our site rather than add a calculator to their site.</li>
</ul>
                    
                  <h3 id="youroptions">Easy to Install - 4 Quick Steps</h3>
                    <ul class="arrow">
<li><strong>Choose Your Calculator:</strong> Pick your  calculator from the options in the tabs below.</li>
<li><strong>Copy It:</strong> Click in the text box where the source code is displayed and it will automatically highlight it. Then hit Control-C to copy it.</li>
<li><strong>Paste It:</strong> Use your HTML editor or content management system to select where you want the calculator to appear on your site, then hit Control-V to paste the code into your website template.</li>
<li><strong>Save &amp; Review It:</strong> Save your changed file &amp; view your website to confirm the calculator is where you want it.</li>
</ul>                    
                    
                    <h3>Choose Your FREE Calculator</h3>


					<div class="tabs_table">
						<ul class="tabs">
						 <li><a rel="tab_1" class="selected">Simple Calculator</a></li>
						 <li><a rel="tab_2" class="">Narrow Sidebar Calculator</a></li>
						 <li><a rel="tab_3" class="">Large Calculator</a></li>
						 <li><a rel="tab_4" class="">Link to Us</a></li>
						</ul>
						<div class="panes">
						 <div class="tab-content" id="tab_1" style="display: block; clear:both; width:100%;">
                                 <h2>Here's Your Embed Code</h2>
<p><textarea wrap='on' onclick="this.select()" style="width: 80%; height: 200px; overflow: auto;"><div style="width:185px; text-align:center;"><p style="text-align:center;"><a href="https://www.mortgagecalculator.biz" target="_blank"><img src="https://www.mortgagecalculator.biz/img/mlogo.gif" border="0" alt="Mortgage Calculator.biz."/></a><br/><iframe src="https://www.mortgagecalculator.biz/c/variables.php?loan=258678&rate=4.1&years=30" frameborder="0" width="185px" height="240px" scrolling="no"></iframe><br/><a href="https://www.mortgagecalculator.biz/c/free.php" target="_blank"><font size="1" color="#000000">HTML Mortgage Calculators</font></a></p></div></textarea>	
    <h2>Example Calculator Layout</h2>
<p style="width:185px;"><img src="https://www.mortgagecalculator.biz/img/mlogo.gif" border="0" alt="Mortgage Calculator.biz."/><br/><iframe src="https://www.mortgagecalculator.biz/c/variables.php" frameborder="0" width="185px" height="240px" scrolling="no"></iframe></p>
</div>
						 <div class="tab-content" id="tab_2" style="display: none;">
<h2>Here's Your Embed Code</h2>
<p><textarea wrap='on' onclick="this.select()" style="width: 80%; height: 200px; overflow: auto;"><div style="width:192px; text-align:center;"><p style="text-align:center;"><a href="https://www.mortgagecalculator.biz" target="_blank"><img src="https://www.mortgagecalculator.biz/img/mclogo.png" border="0" alt="Mortgage Caluculator.biz."/></a><br/><iframe src="https://www.mortgagecalculator.biz/c/narrowvarc.php?homeprice=300000&downpayment=60000&rate=4.1&years=30&ptax=2400&insure=1200&pmi=0.5&closing=3700&monthlyhoa=0" frameborder="0" width="192px" height="670px" scrolling="no"></iframe><br/><a href="https://www.mortgagecalculator.biz/c/free.php" target="_blank"><font size="1" color="#000000">Real Estate Calculator</font></a></div></textarea>	
    <h2>Example Calculator Layout</h2>
    <p style="width:192px; text-align:center;"><img src="https://www.mortgagecalculator.biz/img/mclogo.png" border="0" alt="Mortgage Caluculator.biz."/><br/><iframe src="https://www.mortgagecalculator.biz/c/narrowvarc.php" frameborder="0" width="192px" height="670px" scrolling="no"></iframe></p>                                
				  </div>

						 <div class="tab-content" id="tab_3" style="display: none;">
                                <h2>Here's Your Embed Code</h2>
<p><textarea wrap='on' onclick="this.select()" style="width: 80%; height: 200px; overflow: auto;"><div style="width:430px; text-align:center;"><p style="text-align:center;"><a href="https://www.mortgagecalculator.biz" target="_blank"><img src="https://www.mortgagecalculator.biz/img/logo.png" border="0" alt="Mortgage Caluculator.biz."/></a><br/><iframe src="https://www.mortgagecalculator.biz/c/appvarc.php?homeprice=300000&downpayment=60000&rate=4.1&years=30&ptax=2400&insure=1200&pmi=0.5&closing=3700&monthlyhoa=0" frameborder="0" width="430px" height="790px" scrolling="no"></iframe><br/><a href="https://www.mortgagecalculator.biz/c/free.php" target="_blank"><font size="1" color="#000000">Home Loan Calculator</a></font></div></textarea>	
    <h2>Example Calculator Layout</h2>
    <p style="width:430px; text-align:center;"><img src="https://www.mortgagecalculator.biz/img/logo.png" border="0" alt="MortgageCaluculator.biz."/><br/><iframe src="https://www.mortgagecalculator.biz/c/appvarc.php" frameborder="0" width="430px" height="790px" scrolling="no"></iframe></p>                                
                        </p>


						 </div>
						 <div class="tab-content" id="tab_4" style="display: none;">
<p>                                If you are having trouble installing a calculator or working with the dynamic variables, please try <a href="https://www.mortgagecalculator.biz/c/free.php">our basic calculators</a> or email <script type="text/javascript">
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
</script> for help. Alternatively, you can use a regular HTML link. The following code is set to open in a new window, so you keep your visitors on your website.

<h2>Here's Your HTML Link Code</h2>                                
<textarea wrap='on' onclick="this.select()" style="width: 80%; height: 60px; overflow: auto;"><a href="https://www.mortgagecalculator.biz/" target="_blank">Mortgage Calculator</a></textarea>	
   <h2>What Your Link Will Look Like</h2>
    <a href="https://www.mortgagecalculator.biz/" target="_blank">Mortgage Calculator</a>
                        </p>
						 </div></div>

<p>&nbsp;</p>
<h2>Instructions For Dynamically Passing Variables</h2>
<h3>Instructions for Basic Calculator</h3>
<p>Some real estate brokers with advanced CMS tools may want the ability to dynamically pass the home loan amount to automatically set calculation defaults on their listing pages. We created an easy-to-integrate simplified calculator which makes it easy to automatically pass loan amount, interest rate and loan term.</p>
<p>Copy the above code into your site &amp; then edit the variables to adjust them. For example, on the basic calculator edit the <strong>loan=300000</strong> part to set the loan amount.</p>
<p>If you do not want to dynamically set the loan term or interest rates you would simply drop the associated variables from the iframe embed. So you would copy and paste the associated code from above, but then remove this part: <strong>&rate=4.1&years=30</strong> </p>
<p>Here are the variables used in the basic calculator.</p>
<ul>
  <li><strong>rate=<font color="red">[YourVar]</font></strong> the interest rate on the loan, expressed as a percent (APR %)</li>
  <li><strong>years=<font color="red">[YourVar]</font></strong> the term of the loan in years</li>
  <li><strong>loan=<font color="red">[YourVar]</font></strong> (in Dollars) the loan amount </li>
  </ul>
<p>The basic calculator gives an at-a-glance cost of monthly principal and interest payments, but does not include things like PMI, property taxes, home insurance, etc. </p>
<h3>Instructions for Advaced Calculators</h3>
<p>The advanced calculators use the rate &amp; years variables which are used in the basic calculator, however the loan variable is not used, as the loan amount is automatically calculated based on the homeprice &amp; downpayment variables. </p><ul>
  <li><strong>rate=<font color="red">[YourVar]</font></strong> the interest rate on the loan, expressed as a percent (APR %)</li>
  <li><strong>years=<font color="red">[YourVar]</font></strong> the term of the loan in years</li>
  <li><strike><strong>loan=<font color="red">[YourVar]</font></strong> (in Dollars) the loan amount</strike> (VARIABLE ONLY USED IN BASIC CALCULATOR)</li>
  <li><strong>homeprice=<font color="red">[YourVar]</font></strong> (in Dollars) the price of the home, which is used in part to compute if PMI is needed on the loan.</li>
  <li><strong>downpayment=<font color="red">[YourVar]</font></strong> (in Dollars) downpayment, which will automatically be used to calculate the loan amount as the home price less this amount. </li>
  <li><strong>ptax=<font color="red">[YourVar]</font></strong> (in Dollars) annual property tax assessment.  </li>
  <li><strong>insure=<font color="red">[YourVar]</font></strong> (in Dollars) property insurance, which is typically required on financed homes </li>
  <li><strong>pmi=<font color="red">[YourVar]</font></strong> Property Mortgage Insurance. No matter what is entered, this will automatically be computed as zero if their down payment is 20% or more / if their LTV is below 80%. If they have a lower down payment then this can range from 0.3% to 1.5%.</li>
  <li><strong>closing=<font color="red">[YourVar]</font></strong> (in Dollars) set this to zero if the closing costs are not rolled into the loan.  </li>
  <li><strong>monthlyhoa=<font color="red">[YourVar]</font></strong> (in Dollars) the monthly homeowner's association dues</li>
</ul>

<h2>What You Get...</h2>
<h3 id="features">Great Features &amp; Flexibility</h3>
<p>All of these calculators are ad-free &amp; keep your visitors on your site to continue the real estate buying process.</p>
<p>In addition to being ad free, these calculators take advantage of Javascript / Jquery capabilities such that the results change on the fly without even needing to click the calculate button &mdash; changing between payment scenarios is lightning quick. Put these calculators on your MLS listing pages and homebuyers can calculate their monthly house payments quickly while looking at the property. Agents can  take advantage of the mobile friendly design to estimate payments with home buyers on their cell phones without having to install any bulky apps.</p>
<p>Further, the larger calculators include a button in them which allows users to quickly view &amp; print their loan amortization schedules &mdash; all without leaving your website.</p>
<h3>Works Across Any CMS &amp; Programming Language</h3>
<p>The calculators install as an HTML inline frame (or iframe), so they will work with sites that use any sort of CMS (Wordpress, Joomla, Drupal, Blogger, Typepad, MovableType, ExpressionEngine, custom CMS tools &amp; smarty templating, etc.) &amp; sites programmed in any web language (eg: PHP, ASP, ASPX, Coldfusion, Ruby on Rails, Python, etc.). The embed code includes set width and height settings that are easily adjustible if you want to modify the look and feel.</p>
<h4>Wordpress</h4>
<p>You can insert our calculator into your sidebar or footer by <a href="http://codex.wordpress.org/WordPress_Widgets#Installing_Widgets" target="_blank">using the built in widget feature</a>. One of the default widgets is Text, allowing you to paste in arbitrary HTML code like our above calculator options. Select your sidebar or footer area, select the text widget option &amp; drop it into that menu, drop our above code into that widget, then click save.</p>
<p>The other option would be to embed it within an HTML page to make a page focsed specifically on offering the calculator. If you embed our calculator inside of a Wordpress post or page, make sure to do either of the following:</p>
<ul>
  <li>when editing the page or post click on the &quot;text&quot; option (rather than the &quot;visual&quot; option) so you can paste HTML into it</li>
  <li>disable the Wordpress rich text editor<br /> (checkbox setting at yoursite.com/wp-admin/profile.php then hit save) </li>
</ul>
<h3 id="friendly">Real Estate Agent &amp; Broker Friendly</h3>
<p>Some widely known real estate listing aggregation sites like Zillow and Trulia offer free widgets which then link into their large portals, which then outrank REALTORS® in search engines like Google, Bing, and Yahoo! Search <a href="http://www.realgeeks.com/blog/how-youre-helping-zillow-and-trulia-outrank-you/" target="_blank">on local search queries</a>:</p> 
<blockquote><p>As an independent real estate agent, you most likely work in a relatively small area, whether it's the little town you live in, or the San Antonio metro area, which is small relative to the country. But sites like Zillow and Trulia are accessible to anyone anywhere in the country, including those people who may be moving to your local area.

<p><strong>By including a backlink to its own listings in your city, Zillow is basically horning in on <u><em>your</em></u> local search action</strong>. And it's not just the link itself, but the text that is linked, which is called anchor text. When this text is optimized, it helps to target specific searches. In this backlink, the optimized anchor text is: "Homes for sale in San Antonio," meaning it's meant to target people searching for that specific item with those specific words.</blockquote>
<p>Our site's content is strictly focused on  helping people buy homes  &mdash; we do not compete against local real estate agents by publishing geo-focused real estate listings.</p>
<p>We can't, don't &amp; won't try to push you down the search page <strong>unlike the big guys</strong>.</p>
<p><img src="../img/sanantonio.gif" width="620" height="325" alt="Search results pages for San Antonio real estate searches."></p>
<h3>International Friendly</h3>
<p>While the full-page &amp; extended calculators include United States (US) based defaults on PMI, taxes &amp; closing costs, the basic calculator was designed to be friendly to all international markets. It does not contain any specific currency units or region-specific features, such that you don't have to worry about US-specific charges in Canada or a Dollar symbol in the UK.</p>

<h3>Security &amp; Encryption Come Standard: HTTPS Implementation</h3>
<p>Our site uses a Let's Encyrpt security certificate to load our content in a secured manner. This means when you embed our widget codes in your site, they are embedded in a secured manner. Our widgets work in any HTTP or HTTPS website. And, more importantly, you keep your client's information secured!</p>

<h3>You're in Great Company</h3>
<p>Many REALTORS®, real estate brokers &amp; home builders leverage our calculators to add functionality to their websites, helping them sell more homes. </p>
<table border="0">
  <tr>
    <td><a href="http://www.worthingtonhomesltd.com/tools.php" target="_blank"><img src="../img/worthingtonhomes.gif" width="240" height="65" border="0"/></a>&nbsp;</td>
    <td><a href="http://www.manufacturedhomesbychoice.com/listings" target="_blank"><img src="../img/choicegrouplogo.jpg" width="138" height="65" border="0"/></a>&nbsp;</td>
    <td><a href="http://www.phillipjohnsongroup.com/concierge/mortgage-rates/" target="_blank"><img src="../img/pjglogo.png" width="195" height="65" border="0" /></a></td>
  </tr>
</table>

<h3>Need Help?</h3>
<p>If you would like us to change the loan term or any other setting in any of the calculators, contact us at the below email with your request &amp; we can make a custom calculator for your website.</p>
<p>If you need help, please email <script type="text/javascript">
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
</script> &amp; we will try our best to help you. </p>
                            
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
