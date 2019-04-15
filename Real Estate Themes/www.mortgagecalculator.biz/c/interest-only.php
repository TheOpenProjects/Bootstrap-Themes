<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Interest Only Mortgage Calculator: Interest vs Amoritizing Home Loan Repayment</title>		
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

   var v_prin = sn(document.calc.principal.value);
   var v_rate = sn(document.calc.intRate.value);
   var v_years = sn(document.calc.numYears.value);

   if(v_prin == 0) {
   } else
   if(v_rate == 0 || v_rate > 50) {
   } else
   if(v_years == 0 || v_years > 100) {
   } else {

      var v_ann_tax = sn(document.calc.annualTax.value);

      var v_mo_tax =0;
      if(v_ann_tax == 0) {
         v_ann_tax = 0;
         v_mo_tax =0;
      } else {
         v_ann_tax = v_ann_tax;
         v_mo_tax = v_ann_tax / 12;
         v_mo_tax *= 100;
         v_mo_tax = Math.round(v_mo_tax);
         v_mo_tax /= 100;
      }

      var v_ann_ins = sn(document.calc.annualIns.value);
      var v_mo_ins =0;
      if(v_ann_ins == 0) {
         v_ann_ins = 0;
         v_mo_ins =0;
      } else {
         v_ann_ins = v_ann_ins;
         v_mo_ins = v_ann_ins / 12;
         v_mo_ins *= 100;
         v_mo_ins = Math.round(v_mo_ins);
         v_mo_ins /= 100;
      }

      var v_mo_PMI = sn(document.calc.monthlyPMI.value) * v_prin / 1200;
      var v_mo_assoc = sn(document.calc.monthlyAssoc.value);

      var v_other_pmts = Number(v_mo_tax) + Number(v_mo_ins) + Number(v_mo_PMI) + Number(v_mo_assoc);

      var v_npr = v_years * 12;

      var v_pi_pmt = computeMonthlyPayment(v_prin, v_npr, v_rate);

      var v_tot_pi_pmt = Number(v_pi_pmt) + Number(v_other_pmts);

      document.calc.monthlyPI.value = fns(v_pi_pmt,2,1,1,1);
      document.calc.otherPmtsPI.value = fns(v_other_pmts,2,1,1,1);
      document.calc.monthlyPmtPI.value = fns(v_tot_pi_pmt,2,1,1,1);

      var io_rate_perc = v_rate;
      if(io_rate_perc >= 1) {
         io_rate_perc /= 100;
      }
      io_rate_perc /= 12;
      var v_io_pmt = v_prin * io_rate_perc;
      var v_tot_io_pmt = Number(v_io_pmt) + Number(v_other_pmts);

      document.calc.monthlyIO.value = fns(v_io_pmt,2,1,1,1);
      document.calc.otherPmtsIO.value = fns(v_other_pmts,2,1,1,1);
      document.calc.monthlyPmtIO.value = fns(v_tot_io_pmt,2,1,1,1);

   }

}


function clear_results(form) {

   document.calc.monthlyPI.value = "";
   document.calc.otherPmtsPI.value = "";
   document.calc.monthlyPmtPI.value = "";

   document.calc.monthlyIO.value = "";
   document.calc.otherPmtsIO.value = "";
   document.calc.monthlyPmtIO.value = "";

}


function createReport(form) {

   var alert_txt = "";

   if(document.calc.monthlyPI.value == 0 || document.calc.monthlyPI.value == "") {
   } else {

      var v_prin = sn(document.calc.principal.value);
      var v_rate = sn(document.calc.intRate.value);
      if(v_rate < 1) {
         v_rate *= 100;
      }
      var v_years = sn(document.calc.numYears.value);

      var v_ann_tax = sn(document.calc.annualTax.value);

      var v_mo_tax =0;
      if(v_ann_tax == 0) {
         v_ann_tax = 0;
         v_mo_tax =0;
      } else {
         v_ann_tax = v_ann_tax;
         v_mo_tax = v_ann_tax / 12;
         v_mo_tax *= 100;
         v_mo_tax = Math.round(v_mo_tax);
         v_mo_tax /= 100;
      }

      var v_ann_ins = sn(document.calc.annualIns.value);
      var v_mo_ins =0;
      if(v_ann_ins == 0) {
         v_ann_ins = 0;
         v_mo_ins =0;
      } else {
         v_ann_ins = v_ann_ins;
         v_mo_ins = v_ann_ins / 12;
         v_mo_ins *= 100;
         v_mo_ins = Math.round(v_mo_ins);
         v_mo_ins /= 100;
      }

      var v_mo_PMI = sn(document.calc.monthlyPMI.value) * v_prin / 1200;
      var v_mo_assoc = sn(document.calc.monthlyAssoc.value);

      var rows = "";

      var head = "<html><head><title>Interest-Only Vs. Principal Interest Mortgage ";
      head += "Payment Comparison</title></head>";
      head += "<b";
      head += "od";
      head += "y bgcolor= '#FFFFFF'><br />";
      head += "<br /><center><font face='arial'><strong>Interest-Only Vs. ";
      head += "Principal-Interest<br />Mortgage Payment Comparison</strong></center><br />";

      var titles = "<center><table border=1 cellpadding=2 cellspacing=0><tr>";
      titles += "<td colspan=3><font face='arial'><small><strong>Principal: ";
      titles += "" + fns(v_prin,2,1,1,1) + "<br />Interest ";
      titles += "Rate: " + fns(v_rate,3,0,2,1) + "<br />";
      titles += "Term: " + v_years + " years</strong></small></td></tr>";
      titles += "<tr bgcolor='silver'><td align='center'><font face='arial'><small>";
      titles += "<strong>Descriptions</strong></small></td><td align='center'>";
      titles += "<font face='arial'><small><strong>Interest<br />Only</strong></small>";
      titles += "</td><td align='center'><font face='arial'><small><strong>Principal";
      titles += "<br />& Interest</strong></small></td></tr>";

      rows += "<tr><td align='left'><font face='arial'><small>Mortgage payment</small></td>";
      rows += "<td align=right><font face='arial'>";
      rows += "<small>" + document.calc.monthlyIO.value + "</small></td>";
      rows += "<td align=right><font face='arial'>";
      rows += "<small>" + document.calc.monthlyPI.value + "</small>";
      rows += "</td></tr>";

      rows += "<tr><td align='left'><font face='arial'><small>Monthly property taxes</small>";
      rows += "</td><td align=right><font face='arial'>";
      rows += "<small>" + fns(v_mo_tax,2,1,1,1) + "</small></td>";
      rows += "<td align=right><font face='arial'>";
      rows += "<small>" + fns(v_mo_tax,2,1,1,1) + "</small></td></tr>";

      rows += "<tr><td align='left'><font face='arial'><small>Monthly insurance</small>";
      rows += "</td><td align=right><font face='arial'>";
      rows += "<small>" + fns(v_mo_ins,2,1,1,1) + "</small></td>";
      rows += "<td align=right><font face='arial'>";
      rows += "<small>" + fns(v_mo_ins,2,1,1,1) + "</small></td></tr>";

      rows += "<tr><td align='left'><font face='arial'><small>Monthly PMI ";
      rows += "(Private Mortgage Insurance)</small></td><td align=right>";
      rows += "<font face='arial'><small>" + fns(v_mo_PMI,2,1,1,1) + "</small>";
      rows += "</td><td align=right><font face='arial'>";
      rows += "<small>" + fns(v_mo_PMI,2,1,1,1) + "</small></td></tr>";

      rows += "<tr><td align='left'><font face='arial'><small>Monthly association dues</small>";
      rows += "</td><td align=right><font face='arial'>";
      rows += "<small>" + fns(v_mo_assoc,2,1,1,1) + "</small></td>";
      rows += "<td align=right><font face='arial'>";
      rows += "<small>" + fns(v_mo_assoc,2,1,1,1) + "</small></td></tr>";

      rows += "<tr><td align='left'><font face='arial'><small>Total monthly payments</small>";
      rows += "</td><td align=right><font face='arial'>";
      rows += "<small>" + document.calc.monthlyPmtIO.value + "</small></td>";
      rows += "<td align=right><font face='arial'>";
      rows += "<small>" + document.calc.monthlyPmtPI.value + "</small></td></tr>";

      var foot = "</table><br /><center><form method='post'>";
      foot += "<input type='button' value='Print Report' onClick='window.print()' /><br />";
      foot += "<br /><input type='button' value='Close Window' onClick='window.close()' />";
      foot += "</form></center></body></html>";

      var schedule = (head + "" + titles + "" + rows + "" + foot);


      reportWin = window.open("","","width=500,height=500,toolbar=yes,menubar=yes,scrollbars=yes,resizable=yes");
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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/interest-only.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				<div class="main-heading"><h1>Interest Only vs. Principal & Interest Payments</h1>
</div>
                    <ul id="breadcrumbs">

                        <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
                        <li><a href="https://www.mortgagecalculator.biz/c/arm.php">ARM</a></li>
                        <li>Interest-Only Loans</li>
                    </ul>
                </div>   			
                <div class="bottom-section">
<p><!-- pmms -->   This calculator will help you to compare the monthly payment amounts for an interest-only mortgage and a principal-interest mortgage. Also included are optional fields for taxes, insurance, PMI, and association dues.
             </p>
             
             <p>With mortgage rates near their historic lows, fixed rate home mortgages are likely going to be a much better deal if you plan on living in the house for an extended period of time, as when rates reset on ARM loans the prior short-term savings will likely be more than offset by the higher rates for the duration of the loan, which can cause the interest-only loan payment to exceed the amoritizing 30 year fixed rate payments if mortgage rates spike high enough. For your conveniene, Freddie Mac's PMMS rates have been included to the right.</p>

<div class="table-block">
<form name="calc" method="post" action="#">

 <table>
 <tbody>

 <tr>
 <td colspan="2" nowrap>
 Mortgage loan amount:
 </td>
 <td align="center">
 <input name="principal" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="250000" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td colspan="2" nowrap>
 <a href="#viewrates"><strong>Mortgage interest rate</strong></a> (%):
 </td>
 <td align="center">
 <input name="intRate" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="5" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td colspan="2" nowrap>
 Mortgage loan term (# years):
 </td>
 <td align="center">
 <input name="numYears" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="30" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td colspan="2" nowrap>
 Optional: Annual real estate taxes:
 </td>
 <td align="center">
 <input name="annualTax" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="2600" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td colspan="2" nowrap>
 Optional: Annual homeowners insurance:
 </td>
 <td align="center">
 <input name="annualIns" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="1200" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td colspan="2" nowrap>
 Optional: Private Mortgage Insurance (PMI %):
 </td>
 <td align="center">
 <input name="monthlyPMI" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="0.6" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td colspan="2" nowrap>
 Optional: Monthly association dues:
 </td>
 <td align="center">
 <input name="monthlyAssoc" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="0" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td colspan='1' align='center'>
 <input type="reset" class="table-btn"  value="Reset" />
 </td>
 <td colspan='2' align='center'>
 <input type="button" class="table-btn"  name="calc_button" value="Compute Mortgage Payments" onClick="computeForm(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 <strong>
 Results
 </strong>
 </td>
 <td align="center">
 <strong>
 Interest Only
 </strong>
 </td>
 <td align="center">
 <strong>
 Principal & Interest
 </strong>
 </td>
 </tr>


 <tr>
 <td nowrap>
 Monthly Principal and Interest Payment:
 </td>
 <td align="center">
 <input type="text" name="monthlyIO" size="15" />
 </td>
 <td align="center">
 <input type="text" name="monthlyPI" size="15" />
 </td>
 </tr>

 <tr>
 <td nowrap>
 Monthly Taxes, Insurance, PMI and dues:
 </td>
 <td align="center">
 <input type="text" name="otherPmtsIO" size="15" />
 </td>
 <td align="center">
 <input type="text" name="otherPmtsPI" size="15" />
 </td>
 </tr>

 <tr>
 <td nowrap>
 Total monthly mortgage payment:
 </td>
 <td align="center">
 <input type="text" name="monthlyPmtIO" size="15" />
 </td>
 <td align="center">
 <input type="text" name="monthlyPmtPI" size="15" />
 </td>
 </tr>

 <tr>
 <td colspan="3" align='center'>
 <input type="button" class="table-btn"  name="compute" value="Create Printer Friendly Report" onClick="computeForm(this.form);createReport(this.form)" />
 </td>
 </tr>



 </tbody>
 </table>
 </form>
 </div>

<p>&nbsp;</p>
<a name="viewrates"></a> 
<h3>Mortgage Rates</h3>
<div class="myFinance-widget" data-widget-id="0e398780-2190-4caf-9640-aecf30df3c9c" data-show-filters="true" data-product="5/1 arm" data-property-value="250000" data-purchase-price="250000" data-percent="20" data-current-loan-balance="200000"  data-table-title="Save Money With Today's Low Adjustable Mortgage Rates" data-campaign="mortcalcbiz_fulltable_mortgage"></div>
 
 <h2>Interest-Only Mortgages</h2>
<p>Mortgages are long term loans for the purpose of buying a home.  An   Interest-Only mortgage is a new twist to an old procedure.  For years   those who were falling behind with their mortgage payments would reach   an agreement with the lender to pay only the interest for an established   period of time during which the principal would not be reduced.    Interest-only mortgages are designed from the beginning to allow the   purchaser to pay only the interest for a limited time while the   principal remains unchanged.  These mortgages are designed to allow the   purchaser to establish their legal connection to a particular home, have   smaller house payments for a specified time and thereafter start paying   down the principal.</p>
<p>This type of mortgage appeals to persons who want to purchase a   particular home yet have a temporary cash flow problem or wish to hold   back their funds for investments.  An example of such a home buyer would   be someone who is relocating to the area and needs their ready cash for   relocation costs, utility deposits, furniture, etc.  Other such buyers   could be persons who are starting a business and need their funds for   business start-up expenses, with the hope that when the business gets   going the cash flow will improve.  Persons who are learned concerning   investments or those expecting imminent inheritances or annuity returns   may also find interest-only mortgages attractive.</p>
<p>Although the payment process of interest-only mortgages may favor that   of rentals, these obligatory agreements are much different.  Those who   rent have no legal claim to the property while those who obtain an   interest-only mortgage do.  For example, a person who agrees to the   terms of an interest-only loan would pay only the interest part for a   period of time, usually 5 or 10 years.  At the end of this introductory   period, both interest and principal payments are made.  The interest   rate can be less during the introductory period; however at this point,   interest rates can change dramatically.  A person who does not plan to   stay in an area for long may choose to rent rather than buy eliminating   the process of buying and selling a home.</p>
<p><img src="../img/house-balance.png" width="630" height="446" alt="House Balance." /></p>
<h3>Understanding Home Loans</h3>
<p>The complexities of mortgages are difficult to understand.  Yet, because   of the significant cost of real estate most people cannot afford to   make an outright purchase of a home.  They must borrow the funds needed   for the purchase and pay for them over an extended period of time.    Prospective homeowners apply for loans from banks, mortgage companies or   other lending facilities. </p>
<p>The lending institution prepares a mortgage agreement that certifies and   legalizes the loan.  The lender accepts the property as collateral for   the mortgage loan with the understanding that should the purchaser   default, the bank processes a foreclosure and eventually the ownership   of the property reverts to the bank. </p>
<p>Mortgages are typically designed to cover a 30-year payback period;   however, shorter periods may be offered, requested or required.    Interest is a fee charged by the lending institution for the use of the   funds.   The terms of mortgage agreements vary greatly from lender to   lender.  In addition, most lenders require the home insurance and the   taxes to be included in the monthly payments.  They are held in escrow   and paid by the lender when due.  The purchaser does not take full title   to the home until the loan is completely paid off. </p>
<p>Other types of mortgages include Two-part mortgages that allow for the   repayment for the home loan to be paid back in two parts.  Two-part   mortgages usually have a set interest rate for part one and at the point   that part two begins, the interest rate is adjusted.  The second rate   stays in effect for the remainder of the contract.</p>
<p>There are also Reverse Mortgages that are designed to allow persons 62   years of age or older to receive a line of credit based on the equity   they have in their home.  These loans do not require repayment while the   owner is still living in the home.</p>
<h4>Fixed-Rate Mortgages (FRM)</h4>
<p>Fixed-rate mortgages are the most typical mortgage agreement.  These   loans are made for a specified amount, at a specified rate and for a   specified time.  This agreement stays constant throughout the life of   the loan repayment. </p>
<p>An example of a fixed rate mortgage would be a home purchased for   $200,000, at a rate of 3% for a period of 30 years.  With monthly   payments of $843.21, at the end of the 30 years, this home will have   cost the homeowner $303,355.60. </p>
<p>Mortgage agreements can also vary in the way in which the loans can be   paid off early.  Some lending institutions allow &ldquo;principal only&rdquo;   payments in addition to regular principal/interest payments.  This type   of action reduces the overall cost of the real estate and loans can be   paid back much faster.  Other lenders impose penalties for early   payoffs.</p>
<p>An example of a fixed-rate mortgage for which the home purchases pays   principal-only payments would be the home mentioned above.  If this   person pays an additional $100 per month as principal-only, the house   would be paid off in approximately 25 years and cost approximately   $282,470.00. </p>
<p>For this same $200,000 home, if the first 10 years were classified as   interest-only, the payments would be $500 per month for the first 10   years.  After 10 years, the payments would be $1,109.20 per month,   assuming the interest rate stays the same, resulting in the total price   of the home at $326,208.00. </p>
<h4>Adjustable Rate Mortgages (ARM)</h4>
<p>Some purchasers prefer mortgage agreements with rates that are   adjustable.  They prefer to take the risk of interest rates not   increasing enormously, thereby for a period of time holding the payments   of larger loans to a minimum.  Adjustable rate mortgages usually allow   for a lower rate for a fixed period of time followed by rates that   adjust for the remainder of the time. </p>
<p>This type of financing may prove beneficial for those who do not plan to   live in the home for an extended period of time.  Those who wish to buy   and sell can benefit from ARM mortgages because the initial period of   repayment reflects a lower interest rate.</p>
<p>Interest-only mortgages differ from adjustable rate mortgages.  When the   purchaser makes a payment to an adjustable rate mortgage, his payments   are for both interest and principal.</p>
<p>Adjustable rate mortgages can be of any combination of fixed   rate/adjustable rate positioning.  For example a 1/1 ARM would have a   fixed rate for the first year with the interest thereafter being   adjustable on an annual basis.  A 5/1 ARM would have a fixed rate for   the first five years with the interest thereafter being adjustable on an   annual basis.  A 5/5 ARM would have a fixed rate for the first five   years with the interest thereafter being adjustable every five years. </p>
<h3>Other Types of Mortgages</h3>
<h4>Two-Part Mortgages</h4>
<p>Two-part mortgages are loans that allow for the repayment of home loans   to be repaid in two sections.  Two-part mortgages usually have a set   interest rate for part one and at the point that part two begins, the   interest rate is adjusted.  The second rate stays in effect for the   remainder of the contract.  This type of financing has the appearance of   being two completely different mortgages rather than one with two   separate pay-back procedures.</p>
<h4>Reverse Mortgages</h4>
<p>Reverse Mortgages are designed to allow persons 62 years of age or older   to receive a line of credit based on the equity they have built up in   their home.  These loans do not require repayment while the borrower   still owns the home and while the borrower still lives in the home. </p>
<p>These mortgages are intended to establish a line of credit for the owner   to be drawn upon for the remainder of the owner&rsquo;s life.  Thereafter,   the financial institution would hold a lien on the property for the   outstanding balance which would become an encumbrance on the owner&rsquo;s   estate.  If the borrower should pay the loan off, no liability for   repayment would be applicable to the owner&rsquo;s estate.</p>
<h3>Renting vs Buying a Home</h3>
<p>Not everyone wants the responsibility of owning their own home.  Some   people like to rent property that is owned, insured and maintained by   someone else.  Property that is time-shared, designated as a condominium   or even some apartments takes on the characteristics of renting but is   actually purchased.  With time-shared property, the group of purchasers   divides the usage of the property by weeks or months allowing usage only   to the joint owners.  Additional fees are imposed for taxes, insurance,   maintenance, etc.</p>
<p>A renter has no legal claim to the property.  Even after renting for a   long time, the renter has no equity built up in the property.  By the   same token, a purchaser using an interest-only mortgage does not build   up equity until the time the principal payments begin.</p>
<p>According to an article in the New York Times, if a person plans to stay   in their home for more than five years, buying is better than renting.    The prices of homes increase an average of 2% per year while rent   prices increase an average of 3% per year.  Even taking into   consideration the additional ownership costs of taxes, insurance,   maintenance, etc., buying will cost less than renting.    Though if there is a wild shift in real estate prices like what happened in 2008, that can certainly change outcomes significantly. (www.nytimes.com)</p>
<p>There are, however, a good number of mortgage loans that have fallen   into foreclosure.  Per information made available by the Federal Reserve   of St. Louis, the percentage of mortgage loans that have gone into   default have drastically increased during the past few years.  According   to their findings, in 1995, 2% of mortgages were in default.  These   percentages varied only slightly until 2010 when they increased to over   11 percent.  (www.stlouisfed.org) </p>
<p>Interest-only mortgages allow for a period in the beginning of the   contract for the buyer to pay only the interest due at that time;   however the principal is not reduced.  These mortgages appear similar to   renting, but the interest-only mortgage grants the purchaser a buyer&rsquo;s   interest in the home while renting does not.</p>
<p>Purchasing a home and assuming a mortgage is a very big step.  Some   people fear the idea of being in debt for such a long time.  Some fear   not being able to sell the home if their employer transfers them to   another city.  Some fear the repercussions if they should default.  But   most people dream of having their own home, to put down roots and to   make some long-term memories.  Somehow they manage to jump any hurdles   that come their way, to pay off their mortgage and to know at last that   their home is truly theirs. </p>
 
                
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

