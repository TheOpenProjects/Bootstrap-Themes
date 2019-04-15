<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>The High Cost of Making Minimum Payments on Your Credit Cards</title>
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


var pmt_num_arr = new Array();
var pmt_amt_arr = new Array();
var int_port_arr = new Array();
var prin_port_arr = new Array();
var prin_arr = new Array();


function computeForm(form) {

   var Vprincipal = sn(document.calc.principal.value);
   var Vinterest = sn(document.calc.interest.value);
   var Vfixed_pmt = sn(document.calc.fixed_pmt.value);

   if(Vprincipal == 0) {
   } else
   if(Vinterest == 0) {
   } else
   if(document.calc.pmtMethod[1].checked && Vfixed_pmt == 0) {
   } else {


      var i = Vinterest;
      if(Vinterest >= 1) {
         i /= 100;
      }
      i /= 12;

      var Vminpayperc = document.calc.minpayperc.options[document.calc.minpayperc.selectedIndex].value;
      var Vmin_pmt = Vminpayperc * Vprincipal;

      var Vpmt_amt = 0;
      var Vpmt_method = 0;

      if(document.calc.pmtMethod[0].checked) {
         Vpmt_amt = Vmin_pmt;
         Vpmt_method = 0;
      } else {
         Vpmt_amt = Vfixed_pmt;
         Vpmt_method = 1;
      }

      var prin = Vprincipal;
      var count = 0;
      var int_port = 0;
      var prin_port = 0;
      var accum_int = 0;

      var Vpmt_rows = "";

      while(prin > 0) {

         count += 1;

         if(Vpmt_method == 0) {
            Vpmt_amt = Vminpayperc * prin;
            if(Vpmt_amt < 10) {
               Vpmt_amt = 10;
            }
         }



         if((prin * (Number(1) + Number(i))) > Vpmt_amt) {

            int_port = i * prin;
            prin_port = Number(Vpmt_amt) - Number(int_port);
            accum_int += int_port;
            prin = Number(prin) - Number(prin_port);

         } else {

            int_port = i * prin;
            prin_port = prin;
            Vpmt_amt = Number(prin) + Number(int_port);
            accum_int += int_port;
            prin = 0;

         }

         pmt_num_arr[count] = count;
         pmt_amt_arr[count] = fns(Vpmt_amt,2,1,1,1);
         int_port_arr[count] = fns(int_port,2,1,1,1);
         prin_port_arr[count] = fns(prin_port,2,1,1,1);
         prin_arr[count] = fns(prin,2,1,1,1);

         if(count > 1200) {
            alert("At the terms you entered your balance will never be paid off. Please increase the payment amount until this alert does not show up.");

            return;
            break;
         }


      }


      document.calc.num_pmts.value = count;

      var Vnum_years = count / 12;
      document.calc.num_years.value = fns(Vnum_years,0,0,0,0);

      document.calc.int_paid.value = fns(accum_int,2,1,1,1);
      document.calc.prin_paid.value = fns(Vprincipal,2,1,1,1);

      var v_summary = "";

      if(Vpmt_method == 0) {
         v_summary += "If you make the " + fns(Vminpayperc * 100,1,1,2,1) + " minimum payments per month, ";
         v_summary += "it will take you " + count + " months to pay off your existing balance.  You will ";
         v_summary += "pay " + fns(accum_int,2,1,1,1) + " in interest while paying off this balance.";

      } else {
         
         v_summary += "If you make " + fns(Vfixed_pmt,2,1,1,1) + " payments per month, it will take ";
         v_summary += "you " + count + " months to pay off your existing balance.  You will ";
         v_summary += "pay " + fns(accum_int,2,1,1,1) + " in interest while paying off this balance.";

      }

      var v_summary_cell = document.getElementById("summary");
      v_summary_cell.innerHTML = "<font face='arial'><small><strong>Summary:</strong> " + v_summary + "</small></font>";


   }
}

function pmtSchedule(form) {

   var pmt_count = sn(document.calc.num_pmts.value);

   if(pmt_count == 0) {
   } else {

      var row_count = 0;
      var Vpmt_rows = "";

      var today = new Date();
      var loanMM = today.getMonth() + 1;
      var loanYY = today.getFullYear();
      if(loanYY < 1900) {
         loanYY += 1900;
      }

      while(row_count < pmt_count) {

         row_count += 1;

         Vpmt_rows += "<tr>\n";
         Vpmt_rows += "<td align='right'><font face='arial'><small>" + loanMM + "/" + loanYY + "</small></font></td>\n";
         Vpmt_rows += "<td align='right'><font face='arial'><small>" + row_count + "</small></font></td>\n";
         Vpmt_rows += "<td align='right'><font face='arial'><small>" + pmt_amt_arr[row_count] + "</small></font></td>\n";
         Vpmt_rows += "<td align='right'><font face='arial'><small>" + int_port_arr[row_count] + "</small></font></td>\n";
         Vpmt_rows += "<td align='right'><font face='arial'><small>" + prin_port_arr[row_count] + "</small></font></td>\n";
         Vpmt_rows += "<td align='right'><font face='arial'><small>" + prin_arr[row_count] + "</small></font></td>\n";
         Vpmt_rows += "</tr>\n";

         loanMM += 1;
         if(loanMM == 13) {
            loanMM = 1;
            loanYY += 1;
         }

      }


      var part1 = "<html><head><title>Amortization Schedule</title></head>";
      part1 += "<b";
      part1 += "od";
      part1 += "y bgcolor= '#FFFFFF'><br /><br /><center>";
      part1 += "<font face='arial'><big><strong>Amortization Schedule</strong></big></font></center>";

      var Vminpayperc = document.calc.minpayperc.options[document.calc.minpayperc.selectedIndex].value;
      var Vpmt_text = "";
      if(document.calc.pmtMethod[0].checked) {
         Vpmt_text = fns(Vminpayperc * 100,1,0,2,1) + " of balance";
      } else {
         Vpmt_text = fns(document.calc.fixed_pmt.value,2,1,1,1);
      }

      var part2 = "<center><table border=1 cellpadding=2 cellspacing=0 bordercolor='#CCCCCC'><tr>";
      part2 += "<td colspan=6><font face='arial'><small>Principal: " + fns(document.calc.principal.value,2,1,1,1) + "<br />";
      part2 += "# of Payments: " + pmt_count + "<br />Interest Rate: " + fns(document.calc.interest.value,3,0,2,1) + "<br />";
      part2 += "Payment: " + Vpmt_text + "</strong></small></font></td></tr><tr><td colspan=6><center>";
      part2 += "<font face='arial'><strong>Schedule of Payments</strong></font><br />";
      part2 += "<font face='arial'><small><small>Please allow for slight rounding differences.";
      part2 += "</small></small></font></center></td></tr><tr><td align='center'>";
      part2 += "<font face='arial'><small><strong>Pmt Date</strong></small></font></td>";
      part2 += "<td align='center'><font face='arial'><small><strong>Pmt #</strong></small></font></td>";
      part2 += "<td align='center'><font face='arial'><small><strong>Pmt Amt</strong></small></font></td>";
      part2 += "<td align='center'><font face='arial'><small><strong>Interest</strong></small></font></td>";
      part2 += "<td align='center'><font face='arial'><small><strong>Principal</strong></small></font></td>";
      part2 += "<td align='center'><font face='arial'><small><strong>Balance</strong></small></font></td></tr>";

      var part4 = "</table><br /><center><form method='post'>";
      part4 += "<input type='button' value='Close Window' onClick='window.close()'></form></center></body></html>";

      var schedule = (part1 + "" + part2 + "" + Vpmt_rows + "" + part4 + "");

      reportWin = window.open("","","width=500,height=400,toolbar=yes,menubar=yes,scrollbars=yes");

      reportWin.document.write(schedule);

      reportWin.document.close();

   }

}

function clear_results(form) {

   var v_summary_cell = document.getElementById("summary");
   v_summary_cell.innerHTML = "";

   document.calc.num_pmts.value = "";
   document.calc.num_years.value = "";
   document.calc.int_paid.value = "";
   document.calc.prin_paid.value = "";
   document.calc.pmt_rows.value = "";


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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/fixed-vs-minimum.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				<div class="main-heading">
				  <h1>Minimum Balance Due vs Fixed Credit Card Repayment Calculator</h1></div>
    <ul id="breadcrumbs">
    <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
    <li><a href="https://www.mortgagecalculator.biz/c/credit-cards.php">Credit Cards</a></li>
    <li>Minimum Limit vs Fixed Repayments</li>
    </ul>
   </div>
   			<div class="bottom-section">

   				<div class="table-block">


<p>Making minimum credit card payments is an expensive way to go through life! Use this calculator to see just how much money you can save by paying higher fixed monthly payments.</p>
<blockquote>Compound interest is the eighth wonder of the world. He who understands it, earns it ... he who doesn't ... pays it. Compound interest is the most powerful force in the universe. Compound interest is the greatest mathematical discovery of all time." - Albert Einstein </blockquote>
<form name="calc" method="post" action="#">
<table>
<tbody>
 <tr>
 <td nowrap>Principal Balance:</td>
 <td align="center">
 <input type="number" step="any" name="principal" size="15" value="10000" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td NOWRAP>Credit Card Interest Rate (APR%):</td>
 <td align="center">
 <input type="number" step="any" name="interest" value="18.000"size="15" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td nowrap><input type="radio" style="-moz-appearance:radio; -webkit-appearance:radio; appearance:radio;" name="pmtMethod" value="percent" checked onClick="clear_results(this.form);computeForm(this.form)" /> Minimum payment percentage:</td>
 <td align="center">
 <select name="minpayperc" size="1" onChange="clear_results(this.form);computeForm(this.form)">
 <option value=".015">1.5%</option>
 <option value=".02" selected>2%</option>
 <option value=".025">2.5%</option>
 <option value=".03">3%</option>
 <option value=".035">3.5%</option>
 <option value=".04">4%</option>
 <option value=".045">4.5%</option>
 <option value=".05">5%</option>
 </select>
 </tr>

 <tr>
 <td nowrap><input type="radio" style="-moz-appearance:radio; -webkit-appearance:radio; appearance:radio;" name="pmtMethod" value="fixed" onClick="clear_results(this.form);computeForm(this.form)" /> Fixed payment amount you could afford each month ($):</td>
 <td align="center">
 <input type="number" step="0.01" name="fixed_pmt" size="15" value="250.00" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td colspan="2" align="center">
 <input type="button" value="Calculate" onClick="computeForm(this.form)" class="table-btn"/>
 <input type="button" value="Reset" onClick="reset_calc(this.form)" class="table-btn"/>
 </td>
 </tr>

 <tr>
 <td colspan="2"><strong>Your Results</strong></td>
 </tr>

 <tr>
 <td>Months Making Payments:</td>
 <td align="center">
 <input type="text" name="num_pmts" size="15" />
 </td>
 </tr>

 <tr>
 <td>Years to Pay Off Existing Balance:</td>
 <td align="center">
 <input type="text" name="num_years" size="15" />
 </td>
 </tr>

 <tr>
 <td>Interest Paid:</td>
 <td align="center">
 <input type="text" name="int_paid" size="15" />
 </td>
 </tr>

 <tr>
 <td>Principal Paid:</td>
 <td align="center">
 <input type="text" name="prin_paid" size="15" />
 </td>
 </tr>

 <tr>
 <td colspan="2" id="summary">
 </td>
 </tr>


 <tr>
 <td align="center" colspan="2">
 <input type="button" value="Create Payment Schedule" onClick="pmtSchedule(this.form)" class="table-btn"/>
 <input type="hidden" name="pmt_rows" value="" /><br />
 <font face="arial"><small><small>Long payment schedules make take 15 seconds to appear on your screen.</small></small></font> 
 </td>
 </tr>



 </tbody>
 </table>
 </form>
 
 </div>
 
 <p>&nbsp;</p> 
<a name="viewrates"></a>

<div id="mortcalcbiz-fulltable"></div>

 
<p>&nbsp;</p>
<p><img src="../img/credit-card-debt.png" width="1250" height="1250" alt="Credit Card Debt."></p>
<p>&nbsp;</p>

    
    
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