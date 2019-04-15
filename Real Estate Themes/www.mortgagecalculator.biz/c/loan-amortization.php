<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Loan Calculator With Printable Amortization Schedule</title>
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
function computeIntervalPayment(prin, numPmts, intRate, pmtInt) {

if (intRate > 1.0) {
  intRate = intRate / 100.0;
}
intRate /= pmtInt;

var pow = 1;
for (var j = 0; j < numPmts; j++)
   pow = pow * (1 + intRate);

var pmtAmt = (prin * pow * intRate) / (pow - 1);

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


function calc_down_1(form) {

   document.lpc_5.Hdown_type.value = 1;

   var v_price = sn(document.lpc_5.price.value);
   var v_down = sn(document.lpc_5.down.value);
   if(v_down < 25) {
      v_down = v_down / 100 * v_price;
      document.lpc_5.down.value = fns(v_down,2,0,0,0);
   }
   var v_principal = 0;
   if(v_price > 0 && v_down > 0) {
      v_principal = Number(v_price) - Number(v_down);
   }

   document.lpc_5.principal.value = fns(v_principal,2,1,0,0);

   clear_results(document.lpc_5);

}

function calc_down_2(form) {

   document.lpc_5.Hdown_type.value = 2;

   var v_price = sn(document.lpc_5.price.value);
   var v_down = sn(document.lpc_5.down.value);
   if(v_down > 25) {
      v_down = v_down / v_price * 100;
      document.lpc_5.down.value = fns(v_down,2,0,0,0);
   }
   var v_principal = 0;
   if(v_price > 0 && v_down > 0) {
      v_principal = Number(v_price) - Number(v_down / 100 * v_price);
   }

   document.lpc_5.principal.value = fns(v_principal,2,1,0,0);

   clear_results(document.lpc_5);

}

function calc_prin(form) {

   var v_price = sn(document.lpc_5.price.value);
   var v_down = sn(document.lpc_5.down.value);
   var v_principal = 0;

   if(document.lpc_5.Hdown_type.value == 1) {
      v_principal = Number(v_price) - Number(v_down);
   } else {
      v_principal = Number(v_price) - Number(v_down / 100 * v_price);
   }

   document.lpc_5.principal.value = fns(v_principal,2,1,0,0);

   clear_results(document.lpc_5);
}

function computeForm(form) {

   if(document.lpc_5.principal.value == "" || document.lpc_5.principal.value == 0) {
   } else
      if(document.lpc_5.rate.value == "" || document.lpc_5.rate.value == 0) {
   } else {

      var v_principal = sn(document.lpc_5.principal.value);
      document.lpc_5.r_principal.value = fns(v_principal,2,1,1,1);

      var v_rate = sn(document.lpc_5.rate.value);
      document.lpc_5.r_rate.value = fns(v_rate,2,0,2,1);

      var v_term = sn(document.lpc_5.term.value);
      document.lpc_5.r_term.value = sn(document.lpc_5.term.value) + " Years";

      var v_interval = document.lpc_5.interval.options[document.lpc_5.interval.selectedIndex].value;
      document.lpc_5.r_type.value = document.lpc_5.interval.options[document.lpc_5.interval.selectedIndex].text;

      var  v_npr =  v_term * v_interval;

      var r_payment = computeIntervalPayment(v_principal, v_npr, v_rate, v_interval);
      document.lpc_5.r_payment.value = fns(r_payment,2,1,1,1);


   }
    
}


function clear_results(form) {

   document.lpc_5.r_principal.value = "";
   document.lpc_5.r_rate.value = "";
   document.lpc_5.r_term.value = "";
   document.lpc_5.r_type.value = "";
   document.lpc_5.r_payment.value = "";


}


function createReport(form) {

   if(document.lpc_5.r_principal.value == "" || document.lpc_5.r_principal.value == 0) {
   } else {

      var v_principal = sn(document.lpc_5.r_principal.value);
      var v_rate = sn(document.lpc_5.r_rate.value);
      var v_term = sn(document.lpc_5.term.value);
      var v_interval = document.lpc_5.interval.options[document.lpc_5.interval.selectedIndex].value;

      var v_npr =  v_term * v_interval;

      var v_payment = sn(document.lpc_5.r_payment.value);

      var v_prin = v_principal;
      var v_int = v_rate;
      if(v_int >= 1) {
         v_int /= 100;
      }
      v_int /= v_interval;

      var v_int_port = 0;
      var v_accum_int = 0;
      var v_prin_port = 0;
      var v_accum_prin = 0;
      var v_count = 0;
      var v_pmt_row = "";
      var v_pmt_num = 0;


      var v_display_pmt_amt = 0;

      var v_accum_year_prin = 0;
      var v_accum_year_int = 0;

      var v_year = 1;



      while(v_count < v_npr) {

         if(v_count < (v_npr - 1)) {

            v_int_port = v_prin * v_int;
            v_int_port *= 100;
            v_int_port = Math.round(v_int_port);
            v_int_port /= 100;

            v_accum_int = Number(v_accum_int) + Number(v_int_port);
            v_accum_year_int = Number(v_accum_year_int) + Number(v_int_port);

            v_prin_port = Number(v_payment) - Number(v_int_port);
            v_prin_port *= 100;
            v_prin_port = Math.round(v_prin_port);
            v_prin_port /= 100;

            v_accum_prin = Number(v_accum_prin) + Number(v_prin_port);
            v_accum_year_prin = Number(v_accum_year_prin) + Number(v_prin_port);

            v_prin = Number(v_prin) - Number(v_prin_port);

            v_display_pmt_amt = Number(v_prin_port) + Number(v_int_port);

         } else {

            v_int_port = v_prin * v_int;
            v_int_port *= 100;
            v_int_port = Math.round(v_int_port);
            v_int_port /= 100;

            v_accum_int = Number(v_accum_int) + Number(v_int_port);
            v_accum_year_int = Number(v_accum_year_int) + Number(v_int_port);

            v_prin_port = v_prin;

            v_accum_prin = Number(v_accum_prin) + Number(v_prin_port);
            v_accum_year_prin = Number(v_accum_year_prin) + Number(v_prin_port);

            v_prin = 0;

      //pmtAmt = Number(intPort) + Number(prinPort);
            v_display_pmt_amt = Number(v_prin_port) + Number(v_int_port);
   }

   v_count = Number(v_count) + Number(1);

   v_pmt_num = Number(v_pmt_num) + Number(1);

   v_pmt_row += "<tr><td align=right><font face='arial'>";
   v_pmt_row += "<small>" + v_pmt_num + "</small></font></td>";
   v_pmt_row += "<td align=right><font face='arial'><small>" + fns(v_display_pmt_amt,2,1,0,0) + "</small>";
   v_pmt_row += "</font></td><td align=right><font face='arial'><small>" + fns(v_prin_port,2,1,0,0) + "</small>";
   v_pmt_row += "</font></td><td align=right><font face='arial'>";
   v_pmt_row += "<small>" + fns(v_int_port,2,1,0,0) + "</small>";
   v_pmt_row += "</font></td><td align=right><font face='arial'>";
   v_pmt_row += "<small>" + fns(v_prin,2,1,0,0) + "</small></font></td></tr>";


   if(v_pmt_num % v_interval == 0) {

      v_pmt_row += "<tr bgcolor='#dddddd'><td align=left>";
      v_pmt_row += "<font face='arial'><small>Year " + v_year + "</small>";
      v_pmt_row += "</font></td><td align=right><font face='arial'>";
      v_pmt_row += "<small> </small>";
      v_pmt_row += "</font></td><td align=right><font face='arial'>";
      v_pmt_row += "<small>" + fns(v_accum_year_prin,2,1,0,0) + "</small>";
      v_pmt_row += "</font></td><td align=right><font face='arial'>";
      v_pmt_row += "<small>" + fns(v_accum_year_int,2,1,0,0) + "</small></font></td>";
      v_pmt_row += "<td align=right><font face='arial'>";
      v_pmt_row += "<small> </small></font></td></tr>";

      v_year += 1;
      v_accum_year_prin = 0;
      v_accum_year_int = 0;

   }

      if(v_count > 100 * v_interval) {

         alert("Using your current entries you will never pay off this loan.");

         break;

         } else {

         continue;

         }

    }

   var v_int_text = "";

   if(v_interval == 12) {
      v_int_text = "Monthly";
   } else
   if(v_interval == 4) {
      v_int_text = "Quarterly";
   } else
   if(v_interval == 2) {
      v_int_text = "Semi-Annually";
   } else
   if(v_interval == 1) {
      v_int_text = "Annually";
   }

   var part1 = "<head><title>Amortization Schedule</title></head>";

   part1 += "<";
   part1 += "bo";
   part1 += "d";
   part1 += "y ";
   part1 += "bgcolor= '#FFFFFF'>";


   part1 += "<br /><br /><center><font face='arial'><big><strong>";
   part1 += "Amortization Schedule</strong></big></font></center>";

   var part2 = "<center><table border=1 cellpadding=2 cellspacing=0><tr><td colspan=5>";
   part2 += "<font face='arial'><small>Principal: " + fns(v_principal,2,1,1,1) + "<br>";
   part2 += "Interest Rate: " + fns(v_rate,2,0,2,1) + "<br>";
   part2 += "Payment Interval: " + v_int_text + "<br>";
   part2 += "# of Payments: " + v_npr + "<br>";
   part2 += "Payment: " + fns(v_payment,2,1,1,1) + "</b></small></font></td></tr>";
   part2 += "<tr><td colspan=5><center><font face='arial'><b>Schedule of Payments</b></font><br>";
   part2 += "<font face='arial'><small><small>Please allow for slight rounding differences.";
   part2 += "</small></small></font></center></td></tr>";
   part2 += "<tr bgcolor='silver'><td align='center'><font face='arial'><small><b>Pmt #</b>";
   part2 += "</small></font></td>";
   part2 += "<td align='center'><font face='arial'><small><b>Payment</b></small></font></td>";
   part2 += "<td align='center'><font face='arial'><small><b>Principal</b></small></font></td>";
   part2 += "<td align='center'><font face='arial'><small><b>Interest</b></small></font></td>";
   part2 += "<td align='center'><font face='arial'><small><b>Balance</b></small></font></td></tr>";

   var part3 = ("" + v_pmt_row + "");

   var part4 = "<tr><td><font face='arial'><small><b>Grand Total</b></small></font></td><td> </td>";
   part4 += "<td align=right><font face='arial'><small><b>" + fns(v_accum_prin,2,1,0,0) + "</b>";
   part4 += "</small></font></td><td align=right><font face='arial'>";
   part4 += "<small><b>" + fns(v_accum_int,2,1,0,0) + "</b></small>";
   part4 += "</font></td><td> </td></tr></table><br><center>";
   part4 += "<form method='post'><input type='button' value='Close Window' onClick='window.close()'></form>";
   part4 += "</center></body></html>";

   var schedule = (part1 + "" + part2 + "" + part3 + part4 + "");

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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/loan-amortization.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				  <h1>Loan Calculator With Printable Amortization Table</h1></div>
    <ul id="breadcrumbs">
    <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
    <li><a href="https://www.mortgagecalculator.biz/c/loan.php">Loan</a></li>
    <li>Amortization</li>
    </ul>
   </div>
   			<div class="bottom-section">

   				<div class="table-block">


<p>The folloiwing calculator makes it easy to estimate monthly loan payments for any fixed-rate loan. Once you enter the loan term, amount borrowed &amp; interest rate you can then create a printable amortization chart for your loan. For your convenience a table listing <a href="#viewrates"><strong>current local interest rates for home loans</strong></a> is displayed below the calculator. Other common loan rates are displayed in the left sidebar of the desktop version of this site.</p>

<form name="lpc_5" method="post" action="#">
<table>
<tbody>
 <tr>
 <td>Purchase Price:</td>
 <td align="center">
 <input name="price" type="number" step="any" onKeyUp="calc_prin(this.form);computeForm(this.form)" value="250000" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>Down Payment:
 <input type="radio" style="-moz-appearance:radio; -webkit-appearance:radio; appearance:radio;" name="down_type" value="dollar" onClick="calc_down_1(this.form);computeForm(this.form)"  checked/>$
 <input type="radio" style="-moz-appearance:radio; -webkit-appearance:radio; appearance:radio;" name="down_type" value="percent" onClick="calc_down_2(this.form);computeForm(this.form)" />%
 <input type="hidden" name="Hdown_type" value="1" /></td>
 <td align="center">
 <input name="down" type="text" onKeyUp="calc_prin(this.form);computeForm(this.form)" value="50000" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>Amount to Finance:</td>
 <td align="center">
 <input type="text" name="principal" value="200000" size="15" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td><a href="#viewrates"><strong>Annual Interest Rate</strong></a> (APR %):</td>
 <td align="center">
 <input name="rate" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="6" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>Loan term in years:</td>
 <td align="center">
 <input type="number" step="any" name="term" value="30" size="15" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>Payment Type:</td>
 <td align="center">
 <select name="interval" size="1" onChange="clear_results(this.form);computeForm(this.form)">
 <option value="52">Weekly</option>
 <option value="26">Biweekly</option>
 <option value="12" selected>Monthly</option>
 <option value="6">Bimonthly</option>
 <option value="4">Quarterly</option>
 <option value="2">Semi-Annually</option>
 <option value="1">Annually</option>
 </select>
 </td>
 </tr>


 <tr>
 <td align="center" colspan="2">
<input type="reset" value="Reset" class="table-btn"/> <input type="button" value="Create Amortization Schedule" onClick="computeForm(this.form);createReport(this.form)" class="table-btn"/>
 </td>
 </tr>


<!--  <tr>
 <td align="center" colspan="2">
 <input type="button" value="Calculate" onClick="calc_prin(this.form);computeForm(this.form)" class="table-btn"/>
 <input type="reset" value="Reset" class="table-btn"/>
 </td>
 </tr> -->

 <tr>
 <td>Principal:</td>
 <td align="center">
 <input type="text" name="r_principal" size="15" />
 </td>
 </tr>

 <tr>
 <td>Interest Rate:</td>
 <td align="center">
 <input type="text" name="r_rate" size="15" />
 </td>
 </tr>

 <tr>
 <td>Term:</td>
 <td align="center">
 <input type="text" name="r_term" size="15" />
 </td>
 </tr>

 <tr>
 <td>Payment Type:</td>
 <td align="center">
 <input type="text" name="r_type" size="15" />
 </td>
 </tr>

 <tr>
 <td>Payment:</td>
 <td align="center">
 <input type="text" name="r_payment" size="15" />
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

 
 
<p>&nbsp;</p>
<p><img src="../img/loan-amortization.png" width="1250" height="998" alt="Loan Amortization."></p>
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