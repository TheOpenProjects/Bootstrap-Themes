<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Home Mortgage Interest Deduction Calculator</title>		
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

   var Vprop_value = sn(document.calc.prop_value.value);
   var Vprincipal = sn(document.calc.principal.value);
   var Vrate = sn(document.calc.rate.value);
   var Vterm = sn(document.calc.term.value);
   var Vtax_rate = sn(document.calc.tax_rate.value);
   var Vsave_years = sn(document.calc.save_years.value);


   if(Vprop_value == 0) {
   } else
   if(Vprincipal == 0) {
   } else
   if(Vrate == 0) {
   } else
   if(Vterm == 0) {
   } else
   if(Vtax_rate == 0) {
   } else
   if(Vsave_years == 0) {
   } else {

      var Vpoints = sn(document.calc.points.value);
      var Vclose_costs = sn(document.calc.close_costs.value);
      var Vprop_tax_rate = sn(document.calc.prop_tax_rate.value);

      var months = Vterm * 12;

      var Vmonthly_pmt = computeMonthlyPayment(Vprincipal, months, Vrate);
      document.calc.monthly_pmt.value = fns(Vmonthly_pmt,2,1,1,1);

      document.calc.ann_prop_tax.value = fns(Vprop_tax_rate,2,1,1,1);

      var prin = Vprincipal;
      var i = Vrate;
      if(i >= 1) {
         i /=100;
      }
      i /= 12;
      var int_port = 0;
      var accum_int = 0;
      var prin_port = 0;
      var save_months = 0;
      if(Vsave_years > Vterm) {
         save_months = months;
      } else {
         save_months = Vsave_years * 12;
      }
      var cnt = 0;

      while(cnt < save_months) {

         cnt += 1;

         int_port = prin * i;
         accum_int += int_port;
         prin_port = Number(Vmonthly_pmt) - Number(int_port);
         prin = Number(prin) - Number(prin_port);

      }

      var points_perc = Vpoints;
      points_perc /= 100;
      var points_amt = points_perc * Vprincipal;

      var tax_perc = Vtax_rate;
      tax_perc /= 100;

      var total_deduct = Number(accum_int) + Number(points_amt) + Number(Vsave_years * Vprop_tax_rate);
      var Vtax_savings = total_deduct * tax_perc;
      document.calc.tax_savings.value = fns(Vtax_savings,2,1,1,1);


   }

}

function clear_results(form) {

   document.calc.monthly_pmt.value = "";
   document.calc.ann_prop_tax.value = "";
   document.calc.tax_savings.value = "";


}

function saveReport(form) {

   var Vmonthly_pmt = sn(document.calc.monthly_pmt.value);
   var Vann_prop_tax = sn(document.calc.ann_prop_tax.value);

   if(Vmonthly_pmt == 0 || Vann_prop_tax == 0 || document.calc.tax_savings.value.length == 0) {

   } else {


      var Vprop_value = sn(document.calc.prop_value.value);
      var Vprincipal = sn(document.calc.principal.value);
      var Vrate = sn(document.calc.rate.value);
      var Vterm = sn(document.calc.term.value);
      var Vpoints = sn(document.calc.points.value);
      var Vclose_costs = sn(document.calc.close_costs.value);
      var Vprop_tax_rate = sn(document.calc.prop_tax_rate.value);
      var Vtax_rate = sn(document.calc.tax_rate.value);
      var Vsave_years = sn(document.calc.save_years.value);

      var points_perc = Vpoints;
      points_perc /= 100;
      var points_amt = points_perc * Vprincipal;

      var tax_perc = Vtax_rate;
      tax_perc /= 100;

      var months = Vterm * 12;

      var prin = Vprincipal;
      var i = Vrate;
      if(i >= 1) {
         i /=100;
      }
      i /= 12;
      var int_port = 0;
      var accum_int = 0;
      var accum_ann_int = 0;
      var prin_port = 0;
      var save_months = 0;
      if(Vsave_years > Vterm) {
         save_months = months;
      } else {
         save_months = Vsave_years * 12;
      }
      var cnt = 0;
      var yr_cnt = 0;
      var accum_pmts = 0;
      var ann_pmts = Vmonthly_pmt * 12 + Vann_prop_tax;

      var report_rows = "";

      var ann_tax_deduct = 0;
      var accum_tax_deduct = 0;
      var ann_tax_save = 0;
      var accum_tax_save = 0;

      while(cnt < save_months) {

         cnt += 1;

         int_port = prin * i;
         accum_int += int_port;
         accum_ann_int += int_port;
         prin_port = Number(Vmonthly_pmt) - Number(int_port);
         prin = Number(prin) - Number(prin_port);

         if(cnt % 12 == 0) {
            yr_cnt += 1;

            accum_pmts += ann_pmts;

            report_rows += "<tr><td align='right'><font face='arial'><small>" + yr_cnt + "</td>";
            report_rows += "<td align='right'><font face='arial'><small>" + fns(ann_pmts,2,1,1,1) + "</td>";
            report_rows += "<td align='right'><font face='arial'><small>" + fns(accum_ann_int,2,1,1,1) + "</td>";

           ann_tax_deduct = Number(accum_ann_int) + Number(Vann_prop_tax);
           if(yr_cnt == 1) {
              ann_tax_deduct += points_amt;
           }
           ann_tax_save = ann_tax_deduct * tax_perc;
           accum_tax_save += ann_tax_save;

           report_rows += "<td align='right'><font face='arial'><small>" + fns(ann_tax_save,2,1,1,1) + "</td></tr>";

           accum_ann_int = 0;
           ann_tax_save = 0;

         }

      }

      var part1 = "<html><head><title>Annual Tax Savings Report</title></head>";
      part1 += "<b";
      part1 += "od";
      part1 += "y bgcolor= '#FFFFFF'><br /><br /><center>";
      part1 += "<font face='arial'><big><strong>Annual Tax Savings Report</strong></big>";
      part1 += "</center>";
      part1 += "";
      part1 += "";
      part1 += "";

      var part2 = "<center><table border='1' cellpadding='2' cellspacing='0'><tr bgcolor='silver'>";
      part2 += "<td align='center'><font face='arial'><small><strong>Year</strong></small></td>";
      part2 += "<td align='center'><font face='arial'><small><strong>Mortgage &<br />Property Tax<br />";
      part2 += "Payment</strong></small></td>";
      part2 += "<td align='center'><font face='arial'><small><strong>Interest<br />Paid</strong></small></td>";
      part2 += "<td align='center'><font face='arial'><small><strong>Tax<br />Savings</strong></small></td></tr>";

      var part4 = "<tr><td align='right'><font face='arial'><small><strong>Total:</strong></small></td>";
      part4 += "<td align=right><font face='arial'><small><strong>" + fns(accum_pmts,2,1,1,1) + "</strong></small></td>";
      part4 += "<td align=right><font face='arial'><small><strong>" + fns(accum_int,2,1,1,1) + "</strong></small></td>";
      part4 += "<td align=right><font face='arial'><small><strong>" + fns(accum_tax_save,2,1,1,1) + "</strong></small></td>";
      part4 += "</tr></table><br /><center><form method='post'>";
      part4 += "<input type='button' value='Close Window' onClick='window.close()' />";
      part4 += "</form></center></body></html>";

      var schedule = (part1 + "" + part2 + "" + report_rows + "" + part4 + "");

      reportWin = window.open("","","width=500,height=400,toolbar=yes,menubar=yes,scrollbars=yes");
      reportWin.document.write(schedule);
      reportWin.document.close();

   }

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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/tax-savings.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				<div class="main-heading"><h1>Mortgage Tax-Savings Calculator</h1></div>
                    <ul id="breadcrumbs">
                        <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
                        <li><a href="https://www.mortgagecalculator.biz/c/rent-or-buy.php">Rent vs Buy</a></li> 
                        <li>Income Tax Deduction Savings</li> 
                  </ul>
                </div>
                <div class="bottom-section">
<p><img src="https://www.mortgagecalculator.biz/img/house-in-hands.jpg" alt="house" width="130" class="alignright" />  Inside the United States, homeowners are allowed to deduct their fixed-rate and adjustable rate mortgage (ARM) interest payments &amp; property mortgage insurance (PMI) from their income, subjet to <a href="http://www.irs.gov/uac/Form-1098,-Mortgage-Interest-Statement">the IRS form 1098 limits</a>. </p>
                <p>This calculator will help you to estimate the tax savings that you will realize due to the deductable interest and property tax payments you will make on your mortgage. </p>
<p>The tentative new Republican party tax plan for 2018 intends to reduce the home mortgage interest deduction from $1,000,000 in mortgage debt to $500,000 in mortgage debt, while also signficantly increasing the standard deduction to $12,000 for individuals and $24,000 for couples. People with pre-existing mortgage debt will have the old $1,000,000 of mortgage debt interest deduction limit grandfathered in. If you lock in current rates you also lock in the interest deduction, though <a href="#viewrates"><strong>with rates around 4%</strong></a> a married couple would need over $600,000 in mortgage debt for the itemized interest-deduction to exceed the new standard deduction, while an individual would need over $300,000 in mortgage debt for the itemized interest-deduction to exceed the new standard deduction.</p>
                <p>See also: </p>
                <ul class="arrow">
                        <li><a href="https://www.mortgagecalculator.biz/c/rent-or-buy.php">rent or buy calculator</a></li>
                        <li><a href="https://www.mortgagecalculator.biz/c/affordability.php">home affordability calculator</a></li>
                        <li><a href="https://www.mortgagecalculator.biz/c/tax-benefits.php">tax benefits estimator</a></li>
 </ul>

<div class="table-block">
<form name="calc" method="post" action="#">
 <table>
 <tbody>

 <tr>
 <td>
 Property value:
 </td>
 <td>
 <input type="number" step="any" name="prop_value" value="250000" size="15" onKeyUp="clear_results(this.form);computeForm(this.form)"  onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>
 <tr>
 <td>
 Loan amount:
 </td>
 <td>
 <input type="number" step="any" name="principal" value="50000" size="15" onKeyUp="clear_results(this.form);computeForm(this.form)"  onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>
 <a href="#viewrates"><strong>Annual interest rate</strong></a> (%):
 </td>
 <td>
 <input type="number" step="any" name="rate" value="5" size="15" onKeyUp="clear_results(this.form);computeForm(this.form)"  onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>
 Loan term (years):
 </td>
 <td>
 <input type="number" step="any" name="term" value="30" size="15" onKeyUp="clear_results(this.form);computeForm(this.form)"  onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>
 Points (%):
 </td>
 <td>
 <input type="number" step="any" name="points" value="0" size="15" onKeyUp="clear_results(this.form);computeForm(this.form)"  onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>
 Loan closing costs:
 </td>
 <td>
 <input type="number" step="any" name="close_costs" value="1500" size="15" onKeyUp="clear_results(this.form);computeForm(this.form)"  onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>
 Annual property taxes ($):
 </td>
 <td>
 <input type="number" step="any" name="prop_tax_rate" value="2500" size="15" onKeyUp="clear_results(this.form);computeForm(this.form)"  onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>
 Your state and federal tax rate (%):
 </td>
 <td>
 <input type="number" step="any" name="tax_rate" value="30" size="15" onKeyUp="clear_results(this.form);computeForm(this.form)"  onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>
 Years to calculate savings for:
 </td>
 <td>
 <input type="number" step="any" name="save_years" value="7" size="15" onKeyUp="clear_results(this.form);computeForm(this.form)"  onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td colspan="2" align="center">
 <input type="button" class="table-btn"  name="compute" value="Calculate Tax Savings" onClick="computeForm(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 Monthly Principal and Interest Payment:
 </td>
 <td>
 <input type="text" name="monthly_pmt" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 Annual property tax amount:
 </td>
 <td>
 <input type="text" name="ann_prop_tax" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 Tax savings for entered period:
 </td>
 <td>
 <input type="text" name="tax_savings" size="15" />
 </td>
 </tr>

 <tr>
 <td align="center">
 <input type="button"  class="table-btn" name="compute" value="Annual Savings Report" onClick="computeForm(this.form);saveReport(this.form)" />
 </td>
 <td align="center">
 <input type="reset"  class="table-btn" value="Reset" />
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

 
<h2>All About Mortgage Income Tax Deductions</h2>
<p> When making the decision to rent or purchase a home, you must first   consider the obvious financial aspects of your current living situation   as well as a variety of emotional and personal factors. Many potential   buyers favor homeownership instead of renting due to the alleged tax   benefits. However, there is more to owning a home than simply writing   off the cost on a tax return.</p>
<h3>To Rent or To Buy?</h3>
<p>The first step in the process is to determine whether or not you have   the financial means to purchase a home. Consider your ability to make a   down payment, typically between five percent and 20 percent of the   purchase price of the home as well as any closing costs, typically an   additional five percent. The costs are most likely to exceed the initial   payment and security deposit that you would need to put down if you   were to decide to rent a home. Of course, having enough money to   purchase the home is only half of the battle.</p>
<p>Before you move into your home, you will need to consider how much it   will cost you every year after you take up residence. Financial experts   suggest not to obtain a loan or a mortgage payment that will exceed 28   percent of your gross monthly income; additionally, your total monthly   debt payments should not exceed 36 percent of your grossly month income.   If you believe you will go beyond these limits, you may find yourself   in financial trouble; in addition to paying the mortgage every month,   you will need to also consider home maintenance. New appliances, window   coverings, a new roof and carpet all cost money; nothing lasts forever.</p>
<p>Renting a home may be easier on your pocketbook because you can expect   fixed-dollar costs for these expenditures that you simply pay with the   rent. While the rent may increase slightly from year to year, depending   on the landlord and location, there is also a good chance that it will   remain steady. Additionally, should you encounter any maintenance   issues, a landlord should be held responsible for the necessary repairs.   In other words, instead of spending money on a new roof, you can spend   it or invest it as you wish.</p>
<p>If you have calculated the math and believe you can afford to service   the ongoing debt and make the initial purchase, you must also consider   whether the purchase will financially benefit you as a homeowner. A   place in a suburban location outside of a major city or a   rent-controlled apartment in New York City may change less than a   monthly mortgage payments within the city itself. Even if the cost of   renting is less than buying, there are still long-term considerations to   take into account.</p>
<p>Those who consider buying homes often cite the ability to build equity,   the investment values and tax breaks as solid reasons to purchase a home   instead of rent. While these arguments do hold merit, there are also   drawbacks to each of them. </p>

<h3>Equity</h3>
<p>  Some of the money homeowners pay for their mortgages goes directly   toward building equity into the property. If you rent your home, you   will never again see any of the rent money. Home equity can also serve   as collaterals for loans, enabling homeowners to essentially convert the   equity into cash. <br /> <br />
  On the other hand, equity is not established overnight; it takes time to   build. Payments that you make during the first few years of holding a   mortgage should primarily go toward paying the interest on the loan.   Should you move after living in your home for only several years, you   may have little or no equity. After the costs of selling your property,   you may actually lose money in the process.</p>

<h3>Investment</h3>
<p>  Whether you are a general homeowner or a professional real estate   investor, properties in the form of your primary residence is most   likely the largest asset in your portfolio. Over time, the price   appreciation on the home may become significant. Many homeowners   downsize their primary residences after retirement; they sell the home   at a profit, purchase a less expensive home and subsequently use the   profits they earn to supplement their income during retirement.<br /><br />
  While history shows that it is likely that your home will increase in   value over time, there are often no guarantees that this will be the   case when it comes time to sell your home. There are always areas   throughout the country where properties have lost value, and owners find   themselves unable to sell their homes at a price equal to or higher   than the original purchase price.</p>
  
<h3>Tax Breaks</h3>
<p>  Unlike the money that is used for rent, the property taxes and mortgage   interest are deductible on federal income tax returns. If you sell your   residence and make a profit, your gain is likely to be exempt from your   federal tax return. If you take out a home equity loan, all or some of   the interest that you have paid may also be deductible.<br /><br />
  However, tax breaks on property taxes and interest only apply if the   amount of the homeowner's itemized deductions is greater than the   standard deduction. In other words, if a homeowner has a standard   deduction of $9,700 and his or her itemized deductions total $8,000, he   or she is better choosing the standard deduction because it is higher   than the itemized amount. However, in that case, a homeowner will not   receive a tax break on the interest that was already paid.<br /><br />
  Even when itemization indicates a greater tax break than the standard   deduction, a homeowner is only allowed to deduct a portion of the   interest payments. For instance, if a taxpayer is in the 33 percent tax   bracket, he is entitled to a $0.33 tax deduction for every $1.00 spent   on interest payments. While some feel that a small tax break is better   than nothing, potential homeowners should ask themselves if it makes   sense to spend the whole dollar just to receive $0.33 back.<br /><br />
  The benefit of the tax break does not always exceed the benefit of   paying for a home in cash, if and when it's possible, and foregoing the   tax break altogether. Instead, every dollar you spend in interest adds   to the amount above the total purchase price of the home that you will   need to make back just to break even when you decide to sell the   property. Additionally, owning a home means having an obligation to pay   real estate taxes each year; even after you finish paying off your   mortgage, you will still need to keep making those payments to someone   else while you continue to reside at the property.</p>
  
<h3>How are Mortgage Interest and PMI Treated for Income Tax Purposes?</h3>
<p>Many current homeowners know of the tax breaks related to their home   that they are entitled to claim each filing season. However, for those   still on the fence, there are also many added costs that can come from   purchasing a home. For buyers unable to pay a down payment of 20 percent   of the purchase price of the home, a private mortgage insurance (PMI)   cost may be added to their monthly rate. A PMI policy is coverage that   you pay for yet it also protects the lending institution in case you are   unable to make payments and end up defaulting on the loan. However,   some homeowners who pay PMI may be entitled to use those payments as a   tax deduction on their federal returns.</p>
<p>Created as part of the Tax Relief and Health Care Act of 2006, the PMI   tax deduction originally applied only to PMI policies issued in 2007.   However, because the recovery of the housing market has been slow,   lawmakers have extended the tax break and is in effect for PMI premiums   paid through 2013.</p>
<p>Homeowners may use the PMI deduction for policies issued either by the   Federal Housing Administration, the Department of Agriculture's Rural   Housing Service, the Department of Veterans Affairs or those issued by   private insurers. Many homeowners itemize their deductions because their   property tax and mortgage interest payments exceed the standard   deduction amount to which they are entitled to claim. You may look in   the &ldquo;Interest You Paid&rdquo; section of your Schedule A tax return to find   the PMI deduction. </p>
<p>While it is easy to claim the deduction, there are certain requirements   that homeowners must meet. You must first know when you paid the   mortgage insurance; you are only allowed to take the deduction if you   took out the loan on which you pay PMI either on or after January 1,   2007; you are ineligible to deduct your PMI premiums if they were made   on a home loan purchased before that date. Any new mortgages and PMI   premiums issued through 2013 will qualify.</p>
<p>Additionally, if you have refinanced your home since the start date, you   may also qualify for a deduction. Be careful how you structure your   refinancing, however; the deduction applies to refinances up to the   original amount of the loan, but not to any extra finances you may have   obtained with the new loan.</p>
<p>You may also be entitled to deduct PMI payments on additional mortgage   loans. As is the case with your primary residence, the loan on the   second residence must have been issued in 2007 or through 2013 to be   considered deductible. The additional property must also be a vacation   home or for your personal use. If you rent additional properties, you   could pay PMI without any aid from the Internal Revenue Service (IRS)   unless you successfully claim other tax breaks on the property as a   rental.</p>
<p>While there is no limit on the amount of PMI payments homeowners may   deduct, the amount may be reduced based on your monthly income, also   known as an income phaseout. The deduction begins to be phased out when   your adjusted gross income (AGI) is greater than $100,000. The limit   applies to married filing jointly, head of household, or single   taxpayers. For married persons filing separate returns, the phaseout   starts at $50,000 AGI.</p>
<p>The deduction is reduced by 10 percent for every $1,000 your income is   over the AGI limit. In other words, if your AGI is greater than $109,000   as a single taxpayer or $54,000 for taxpayers married filing   separately, you can expect that your deductions will disappear   completely.</p>
<h3>Is There a Potential for Capital Gains on the Sale of a Primary Residence?</h3>
<p><img src="../img/nice-house.png" width="630" height="448" alt="Nice House." /> </p>
<p>While there are often generous exclusions allowed in terms of capital   gains on the sale of a primary residence, the clock is always ticking;   time is crucial. Under current laws, if homeowners sell their primary   homes and make a profit, they are entitled to exclude $250,000 of that   profit from their taxable income; that amount is solely for individuals.   If both spouses each meet the ownership requirements, married couples   may be entitled to exclude $500,000 from their income. Depending how   much of a profit you make on the sale of your home, spouses could   potentially receive no capital gains tax bill whatsoever.</p>
<p>In order to claim the maximum exclusion, homeowners are required to pass   what the IRS labels as &ldquo;ownership and use tests.&rdquo; According to federal   law, the homeowner must have been in possession of and lived in the home   for at least two years, and the homeowners must have had lived in the   house as his or her principal or primary residence for two out of the   past five years, ending on the date that he or she sold the home.</p>
<p>However, there are exceptions to these rules. If you had to move away   from the property before owning the home for two years due to an   unforeseen circumstance such as a natural disaster or divorce or you   were forced to leave due to a job change, the IRS will allow you to   prorate the exclusion. Additionally, the two year timeframe does not   need to be consecutive; as long as you lived in the home for 24 months   out of the five years before the sale of the home, you are eligible to   exclude your profit from your taxable income.</p>
<p>To determine potential capital gains on the sale of the property,   subtract the cost basis from the selling price. The cost basis is not   only the purchase price, but it includes specific fees and costs   associated with the purchase such as commissions, closing costs,   settlement fees and the cost for improvements such as plumbing,   landscaping, roofing, additions and upgrades. The total number is your   cost basis.</p>
<p>You can estimate your sale price and subtract this total. For example,   if you purchased your home for $350,000, paid $50,000 in material   improvements, invested $25,000 in related fees and costs, your cost   basis is $415,000. If you expect to sell your home for $850,000 your   potential capital gain would be $435,000. In this example, a married   couple could exclude the entire profit from their taxable income; they   would not be required to report the sale on their tax returns. If the   capital gain increased to $525,000, they would need to report the sale   and would be required to pay long-term capital gains on $25,000.</p>
<h3>What is a 1031 Exchange or Other Tax Advantages of Homeownership?</h3>
<p>A &ldquo;Section 1031&rdquo; is making its way into daily conversation for   professional tax investors, although the term has a long way to go   before it can compete with the popular 401(k) plan. A 1031 exchange is a   trading of one investment asset or business for another. Although most   of these trades are taxable as sales, if you fall within 1031, you will   either have limited tax or no tax due at the time of the swap.</p>
<p>In other words, you can change your investment without recognizing a   capital gain or cashing out; your investment can continue to grow tax   deferred. There is also no limit on how many times or how often   homeowners can do a 1031. You may roll over the gain from one piece of   real estate to another and another. While you may obtain a profit on   each trade, you can avoid paying tax until you actually sell the   property for cash years down the road. If you have succeeded in swapping   smartly, you will only pay one, long-term capital gain rate.</p>
<p>Buying a home is usually the largest purchase and among the most   important financial decisions a family can make. While there are   numerous factors that can influence the choice to buy a home, the   potential tax benefits can make or break the decision. Aside from the   deductibility of PMI and mortgage interest and the potential for capital   gain tax exclusion, some homeowners also consider purchasing homes for   the possible deduction of real estate taxes.</p>
<p>Calculating the net benefits of homeownership may seem straightforward   but can lead to overestimation if not calculated in the context of   current income tax rules. At first glance, a monetary value of   deductions is equal to the marginal tax rate times the sum of the   deductions. For example, a homeowner who deducts $10,000 of real estate   tax and mortgage interest deductions and who falls in the 25 percent tax   bracket could expect a savings of $2,500 on his or her tax return.</p>
<p>However, this example overstates the average benefit by failing to   account for the fact that a typical taxpayer must itemize his deductions   in order to receive a benefit. Unless the sum of the itemized   deductions exceed the standard deduction, it may not be in the   taxpayer's best interest to itemize. Additionally, a tax incentive that   became available in 2009 provides first-time home buyers with an $8,000   tax credit, increasing the tax savings of the first five years of which   you own a home.</p>
<p>Whether you currently own your home or are seeking to purchase a   property for the first time, there are certain financial benefits and   drawbacks of homeownership that you must consider before taking the   first step. Savings of thousands of dollars are possible, but only if   you and your spouse fall into the right category and research your   options prior to selling your home. </p>

 
    
    

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

