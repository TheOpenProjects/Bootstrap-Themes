<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Debt Investment Calculator With Printable Loan Amortization Schedule</title>
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
function fn(num, places, comma) {

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
       finNum = "-" + finNum;
    }

	return finNum;
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

function computeForm(form) {

if(document.debt.principal.value == "" || document.debt.principal.value == 0) {
} else
if(document.debt.interest.value == "" || document.debt.interest.value == 0) {
} else
if(document.debt.origPmt.value == "" || document.debt.origPmt.value == 0) {
} else {

   var i = sn(document.debt.interest.value);
   var display_rate = i;

    if (i >= 1.0) {
       i = i / 100.0;
    }

    i /= 12;

   var prin1 = sn(document.debt.principal.value);
   if(prin1 == "") {
      prin1 = 0;
   } else {
      prin1 = prin1;
   }

   var prin2 = sn(document.debt.principal.value);
   if(prin2 == "") {
      prin2 = 0;
   } else {
      prin2 = prin2;
   }

   var prin3 = sn(document.debt.principal.value);
   if(prin3 == "") {
      prin3 = 0;
   } else {
      prin3 = prin3;
   }

   var pmt1 = sn(document.debt.origPmt.value);
   if(pmt1 == "") {
      pmt1 = 0;
   } else {
      pmt1 = pmt1;
   }

   var VpmtAdd = sn(document.debt.pmtAdd.value);
   if(VpmtAdd == "") {
      VpmtAdd = 0;
   } else {
      VpmtAdd = VpmtAdd;
   }

   var pmt2 = Number(pmt1) + Number(VpmtAdd);
  
   var prinPort1 = 0;
   var prinPort2 = 0;
   var intPort1 = 0;
   var intPort2 = 0;
   var count1 = 0;
   var count2 = 0;
   var accumInt1 = 0;
   var accumInt2 = 0;
    
   while(prin1 > 0) {
      intPort1 = i * prin1;
      accumInt1 = Number(accumInt1) + Number(intPort1);
      prinPort1 = Number(pmt1) - Number(intPort1);
      prin1 = Number(prin1) - Number(prinPort1);
      count1 = count1 + 1
      if(count1 > 600) { break; } else { continue;}
                    
   }

   while(prin2 > 0) {
      intPort2 = Number(i * prin2);
      accumInt2 = Number(accumInt2) + Number(intPort2);
      prinPort2 = Number(pmt2 - intPort2);
      prin2 = Number(prin2 - prinPort2);
      count2 = count2 + 1
      if(count2 > 600) { break; } else { continue;}
   }

   var VoldNPR = count1;
   document.debt.oldNPR.value = fn(VoldNPR,0,0);

   var VnewNPR = count2;
   document.debt.newNPR.value = fn(VnewNPR,0,0);

   var timSave = (count1 - count2);
   document.debt.timeSave.value = fn(timSave,0,0);

   var VoldIntCost = Number(accumInt1);
   document.debt.oldIntCost.value = "$" + fn(VoldIntCost,2,1);

   var VnewIntCost = Number(accumInt2);
   document.debt.newIntCost.value = "$" + fn(VnewIntCost,2,1);


   var VintSave = Number(accumInt1) - Number(accumInt2);
   document.debt.intSave.value = "$" + fn(VintSave,2,1);


   var Vroi = 0;
   if(VintSave > 0) {
      Vroi = (VintSave / (count2 / 12)) / (VpmtAdd * 12);
   } else {
      Vroi = 0;
   }
   document.debt.roi.value = fn(display_rate,2,0) + "%";



   var yearSave = 0;

   if(timSave / 12 < 1) {
      yearSave = 0;
   } else {
      yearSave = timSave / 12;
   }

   var sum_cell = document.getElementById("summary");
   var v_summary = "<p>&nbsp;</p><blockquote><strong>If you add $" + fn(VpmtAdd,2,1) + " to your monthly payment, you will pay off this ";
   v_summary += "debt in " + count2 + " payments instead of " + count1 + ", and you will ";
   v_summary += "save $" + fn(VintSave,2,1) + " in interest charges.  This savings ";
   v_summary += "translates into a guaranteed, tax-free, average annual return ";
   v_summary += "of " + fn(display_rate,2,0) + "%.  And that's not even considering ";
   v_summary += "the emotional returns you'll get when you pay off this ";
   v_summary += "debt " + timSave + "-months (" + fn(yearSave,2,0) + " ";
   v_summary += "years, " + (timSave %12) + " months) ahead of schedule!</strong></blockquote>";


   sum_cell.innerHTML = " " + v_summary + " ";

   document.debt.Hprin.value = prin3;
   document.debt.HintRate.value = i;
   document.debt.Hpmt2.value = pmt2;

   }

}

function createReport(form) {

   var Prin3 = Number(document.debt.Hprin.value);
   var i = Number(document.debt.HintRate.value);
   var pmt2 = Number(document.debt.Hpmt2.value);

   var intPort3 = 0;
   var accumInt3 = 0;
   var prinPort3 = 0;
   var accumPrin3 = 0;
   var count3 = 0;
   var pmtRow = "";
   var pmtNum = 0;
   var nowPmt = 0;

   var today = new Date();
   var dayFactor = today.getTime();
   var pmtDay = today.getDate();
   var loanMM = today.getMonth() + 1;
   var loanYY = today.getFullYear();
   var loanDate = (loanMM + "/" + pmtDay + "/" + loanYY);
   var monthMS = 86400000 * 30.4375;
   var pmtDate = 0;

   while(Prin3 > 0) {
      if(Prin3 < pmt2) {
         intPort3 = Prin3 * i;
         accumInt3 = Number(accumInt3) + Number(intPort3);
         prinPort3 = Number(Prin3);
         accumPrin3 = Number(accumPrin3) + Number(prinPort3);
         Prin3 = 0;
      } else {
         intPort3 = Prin3 * i;
         accumInt3 = Number(accumInt3) + Number(intPort3);
         prinPort3 = Number(pmt2) - Number(intPort3);
         accumPrin3 = Number(accumPrin3) + Number(prinPort3);
         Prin3 = Number(Prin3) - Number(prinPort3);
      }
      pmtNow = Number(intPort3) + Number(prinPort3);
      count3 = Number(count3) + Number(1);
      pmtNum = Number(pmtNum) + Number(1);
      dayFactor = Number(dayFactor) + Number(monthMS);
      pmtDate = new Date(dayFactor);
      pmtMonth = pmtDate.getMonth();
      pmtMonth = pmtMonth + 1;
      pmtYear = pmtDate.getFullYear();
      pmtString = (pmtMonth + "/" + pmtDay + "/" + pmtYear);
      pmtRow += "<TR><TD ALIGN=RIGHT><font face='arial'><small>" + pmtNum + "</small></font></TD>";
      pmtRow += "<TD ALIGN=RIGHT><font face='arial'><small>" + pmtString + "</small></font></TD>";
      pmtRow += "<TD ALIGN=RIGHT><font face='arial'><small>" + fn(pmtNow,2,1) + "</small></font></TD>";
      pmtRow += "<TD ALIGN=RIGHT><font face='arial'><small>" + fn(prinPort3,2,1) + "</small></font></TD>";
      pmtRow += "<TD ALIGN=RIGHT><font face='arial'><small>" + fn(intPort3,2,1) + "</small></font></TD>";
      pmtRow += "<TD ALIGN=RIGHT><font face='arial'><small>" + fn(Prin3,2,1) + "</small></font></TD></TR>";
      if(count3 > 600) {
         alert("Using your current entries you will never pay off this loan.");
         break;
      } else {
         continue;
      }
    }

   var part1 = "<head><title>Amortization Schedule</title></head>";

   part1 += "<";
   part1 += "bo";
   part1 += "d";
   part1 += "y ";
   part1 += "bgcolor = '#FFFFFF'>";
   part1 += "<br /><br /><center><font face='arial'><big><strong>";


   part1 += "Amortization Schedule</strong></big></FONT></CENTER>";

   var part2 = "<CENTER><TABLE BORDER=1 CELLPADDING=4 CELLSPACING=0><TR>";
   part2 += "<TD COLSPAN=6><font face='arial'><small><B>Loan Date: " + loanDate + "";
   part2 += "<BR />Principal: $" + fn(document.debt.Hprin.value,2,1) + "";
   part2 += "<BR /># of Payments: " + count3 + "";
   part2 += "<BR />Interest Rate: " + fn(i * 12 * 100,2,0) + "%";
   part2 += "<BR />Payment: $" + fn(pmt2,2,1) + "</B></small></font></TD></TR>";
   part2 += "<TR><TD COLSPAN=6><CENTER><font face='arial'>Schedule of Payments</FONT>";
   part2 += "<BR /><font face='arial'><small><small>Please allow for slight rounding differences.";
   part2 += "</small></small></FONT></CENTER></TD></TR>";
   part2 += "<TR><TD><font face='arial'><small><B>Pmt #</B></small></font></TD>";
   part2 += "<TD ALIGN=CENTER><font face='arial'><small><B>Date</B></small></font></TD>";
   part2 += "<TD ALIGN=CENTER><font face='arial'><small><B>Payment</B></small></font></TD>";
   part2 += "<TD><font face='arial'><small><B>Principal</B></small></font></TD>";
   part2 += "<TD><font face='arial'><small><B>Interest</B></small></font></TD>";
   part2 += "<TD><font face='arial'><small><B>Balance</B></small></font></TD></TR>";

   var part3 = ("" + pmtRow + "");

   var part4 = "<TR><TD><font face='arial'><small><B>Totals</B></small></font></TD>";
   part4 += "<TD> </TD><TD> </TD><TD ALIGN=RIGHT><font face='arial'><small>";
   part4 += "<B>" + fn(accumPrin3,2,1) + "</B></small></font></TD>";
   part4 += "<TD><font face='arial'><small><B>" + fn(accumInt3,2,1) + "</B>";
   part4 += "</small></font></TD><TD> </TD></TR></TABLE><br><center>";
   part4 += "<form method='post'><input type='button' value='Close Window' onClick='window.close()' />";
   part4 += "</form></center></BODY></HTML>";

   var schedule = (part1 + "" + part2 + "" + part3 + part4 + "");

   reportWin = window.open("","","width=500,height=300,toolbar=yes,menubar=yes,scrollbars=yes");
   reportWin.document.write(schedule);
   reportWin.document.close();

}

function clear_results(form) {

   document.debt.oldNPR.value = "";
   document.debt.newNPR.value = "";
   document.debt.timeSave.value = "";
   document.debt.oldIntCost.value = "";
   document.debt.newIntCost.value = "";
   document.debt.intSave.value = "";
   document.debt.roi.value = "";

   var sum_cell = document.getElementById("summary");
   sum_cell.innerHTML = " ";

}


function clearForm(form) {
   document.debt.oldNPR.value = "";
   document.debt.newNPR.value = "";
   document.debt.timeSave.value = "";
   document.debt.oldIntCost.value = "";
   document.debt.newIntCost.value = "";
   document.debt.intSave.value = "";
   document.debt.roi.value = "";

   var sum_cell = document.getElementById("summary");
   sum_cell.innerHTML = " ";


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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/debt-investment.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				  <h1>Debt Investment Return Calculator</h1></div>
    <ul id="breadcrumbs">
    <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
    <li><a href="https://www.mortgagecalculator.biz/c/debt.php">Debt</a></li>
    <li>Investment Returns</li>
    </ul>
   </div>
   			<div class="bottom-section">

   				<div class="table-block">


<h2>FANG, Bitcoin &amp; Bull Markets</h2>
<p>Top performing stocks in a bull market are frequently touted as a great investment. During different cycles different classes outperform. The <a href="https://www.usatoday.com/story/money/business/2014/04/01/ozy-nifty-50-stocks/7156447/" target="_blank">Nifty 50</a> becomes <a href="http://www.nytimes.com/2000/10/08/opinion/reckonings-create-and-destroy.html" target="_blank">the four horsemen</a> then <a href="http://thereformedbroker.com/2017/05/16/american-gods/" target="_blank">FANG</a>. By the time an investment thesis has been named &amp; widely marketed (like <a href="https://qz.com/544410/the-brics-era-is-over-even-at-goldman-sachs/" target="_blank">BRICS</a>) the easy gains have already been made. Those who invest near the top risk buying into the momentum right before the market tanks. Worse yet, many investors are emotionally driven and liquidate their positions, selling out at the bottom in a panic which locks in their losses.</p>
<h3>A Lower Risk Approach</h3>
<p>An easier way to achieve guaranteed risk-free &amp; <em>often above market</em> returns is to invest in paying down your debts.</p>
<p>For example, consider a credit card which has an annual interest expense of 23.8%. If you pay that debt down quickly you are not only guaranteed a 23.8% return, but the returns on debt payment are tax-free. To obtain a similar 23.8% return in the stock market you would need a far higher rate of return, because stock market returns are taxed. If your marginal tax rate is 25% then you would need to achieve a 31.73% return in the markets to have a similar after-tax impact as paying off your credit card.</p>

<form name="debt" method="post" action="#">
 <table>
 <tbody>
 <tr>
 <td>Amount Owed:</td>
 <td align="center">
 <input name="principal" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="20000" size="12" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>Annual Interest Rate:</td>
 <td align="center">
 <input name="interest" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="12" size="12" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>Current Monthly Payment:</td>
 <td align="center">
 <input name="origPmt" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="250" size="12" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>Extra Monthly Payment (to pay down debt faster):</td>
 <td align="center">
 <input name="pmtAdd" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="150" size="12" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td align="center" colspan="2">
 <input type="button" value="Calculate Returns" onClick="computeForm(this.form)" class="table-btn"/>
 <input type="button" value="Reset" onClick="clearForm(this.form)" class="table-btn"/>
 </td>
 </tr>

 <tr>
 <td>Old Payoff Term (in Months):</td>
 <td align="center">
 <input type="text" name="oldNPR" size="12" />
 </td>
 </tr>

 <tr>
 <td>New Payoff Term (in Months):</td>
 <td align="center">
 <input type="text" name="newNPR" size="12" />
 </td>
 </tr>

 <tr>
 <td>Time Saved (Months):</td>
 <td align="center">
 <input type="text" name="timeSave" size="12" />
 </td>
 </tr>

 <tr>
 <td>Old Interest Expense:</td>
 <td align="center">
 <input type="text" name="oldIntCost" size="12" />
 </td>
 </tr>

 <tr>
 <td>New Interest Expense:</td>
 <td align="center">
 <input type="text" name="newIntCost" size="12" />
 </td>
 </tr>

 <tr>
 <td>Total Interest Savings (ROI):</td>
 <td align="center">
 <input type="text" name="intSave" size="12" />
 </td>
 </tr>

 <tr>
 <td>Guaranteed Annual Return:</td>
 <td align="center">
 <input type="text" name="roi" size="12" />
 </td>
 </tr>


 <tr>
 <td align="center" colspan="2">
 <input type="button" value="Create Printable Payment Schedule" onClick="createReport(this.form)" class="table-btn"/>
 <input type="hidden" name="Hprin" value="0" />
 <input type="hidden" name="HintRate" value="0" />
 <input type="hidden" name="Hpmt2" value="0" />
 </td>
 </tr>
 </tbody>
 </table>
<div style="clear:both;"></div>

 <div id="summary"></div>
  
</form>
 
 </div>
 
 <p>&nbsp;</p> 
<a name="viewrates"></a>

<div id="mortcalcbiz-fulltable"></div>

 
<p>&nbsp;</p>
<p><img src="../img/debt-problems.png" width="1250" height="962" alt="Debt Problems."></p>
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