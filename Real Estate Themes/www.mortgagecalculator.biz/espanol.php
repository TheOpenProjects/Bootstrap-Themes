<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Calculadora de hipotecas con PMI, impuestos y Seguro</title>
		<link rel="canonical" href="https://www.mortgagecalculator.biz/espanol.php">
        <link rel="alternate" hreflang="en" href="https://www.mortgagecalculator.biz/" />
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
	
	 var Vclosingcosts = document.calc.closingcosts.value; 
	 if(Vclosingcosts == 0 || Vclosingcosts == "") {
  Vclosingcosts = 0;
 }	 
 var Vdownpayment = sn(document.calc.downpayment.value);
 var Vprincipal =sn(parseFloat(document.calc.homevalue.value) + parseFloat(Vclosingcosts) - parseFloat(Vdownpayment));
 var VintRate = sn(document.calc.intRate.value);
 var VnumYears = sn(document.calc.numYears.value);
 var VannualTax = document.calc.annualTax.value;
 var VmonthlyTax =0;
 if(VannualTax == 0 || VannualTax == "") {
  VannualTax = 0;
  VmonthlyTax =0;
 } else {
  VannualTax = sn((VannualTax * document.calc.homevalue.value)/100);
  VmonthlyTax = VannualTax / 12;
  VmonthlyTax *= 100;
  VmonthlyTax = Math.round(VmonthlyTax);
  VmonthlyTax /= 100;
 }

 var VannualInsurance = document.calc.annualInsurance.value;
 var VmonthlyInsurance = 0;
 if(VannualInsurance == 0 || VannualInsurance == "") {
  VannualInsurance = 0;
  VmonthlyInsurance = 0;
 } else {
  VannualInsurance = sn((VannualInsurance * document.calc.homevalue.value)/100);
  VmonthlyInsurance = VannualInsurance / 12;
  VmonthlyInsurance *= 100;
  VmonthlyInsurance = Math.round(VmonthlyInsurance);
  VmonthlyInsurance /= 100;
 }
 
	 var Vhomevalue = document.calc.homevalue.value;
 var VmonthlyPMI = document.calc.monthlyPMI.value;

 if(VmonthlyPMI == 0 || VmonthlyPMI == "" || Vhomevalue > 1.249999999*Vprincipal ) {
  VmonthlyPMI = 0;
 }	 
	 else {
  VmonthlyPMI = sn((VmonthlyPMI * Vprincipal)/100);
		 VmonthlyPMI = VmonthlyPMI / 12;
  VmonthlyPMI *= 100;
  VmonthlyPMI = Math.round(VmonthlyPMI);
  VmonthlyPMI /= 100;
 }

 var VmonthlyHOA = document.calc.monthlyHOA.value;

 var VotherPmts = Number(VmonthlyTax) + Number(VmonthlyInsurance) + Number(VmonthlyPMI) + Number(VmonthlyHOA);

 var VnumPmts = VnumYears * 12;

 var VpmtAmt = computeMonthlyPayment(Vprincipal, VnumPmts, VintRate);
 var VtotalMtgPmt = Number(VpmtAmt) + Number(VotherPmts);
 var Vloanamount =sn(parseFloat(document.calc.homevalue.value) + parseFloat(Vclosingcosts) - parseFloat(Vdownpayment));
 var Vtotalinterest =  sn(parseFloat(VnumPmts) * parseFloat(VpmtAmt) - parseFloat(Vloanamount));

 document.calc.monthlyPI.value = "$" + fn(VpmtAmt,2,1);
 document.calc.otherPmts.value = "$" + fn(VotherPmts,2,1);
 document.calc.monthlyPmt.value = "$" + fn(VtotalMtgPmt,2,1);
 document.calc.loanamount.value = "$" + fn(Vloanamount,0,1);
 document.calc.totalinterest.value = "$" + fn(Vtotalinterest,0,1);
  
}


function monthlyAmortSched(form) {

 {

	 var Vclosingcosts = document.calc.closingcosts.value; 
	 if(Vclosingcosts == 0 || Vclosingcosts == "") {
  Vclosingcosts = 0;
 }	 
 var Vdownpayment = sn(document.calc.downpayment.value);	 
 var Vprincipal = sn(parseFloat(document.calc.homevalue.value) + parseFloat(Vclosingcosts) - parseFloat(Vdownpayment));
 var VintRate = sn(document.calc.intRate.value);
 var VnumYears = sn(document.calc.numYears.value);
 var VannualTax = document.calc.annualTax.value;
 var VmonthlyTax =0;
 if(VannualTax == 0 || VannualTax == "") {
  VannualTax = 0;
  VmonthlyTax =0;
 } else {
  VannualTax = sn(VannualTax);
  VmonthlyTax = VannualTax / 12;
  VmonthlyTax *= 100;
  VmonthlyTax = Math.round(VmonthlyTax);
  VmonthlyTax /= 100;
 }

 var VannualInsurance = document.calc.annualInsurance.value;
 var VmonthlyInsurance = 0;
 if(VannualInsurance == 0 || VannualInsurance == "") {
  VannualInsurance = 0;
  VmonthlyInsurance = 0;
 } else {
  VannualInsurance = sn(VannualInsurance);
  VmonthlyInsurance = VannualInsurance / 12;
  VmonthlyInsurance *= 100;
  VmonthlyInsurance = Math.round(VmonthlyInsurance);
  VmonthlyInsurance /= 100;
 }

 var VmonthlyPMI = document.calc.monthlyPMI.value;
 if(VmonthlyPMI == 0 || VmonthlyPMI == "") {
  VmonthlyPMI = 0;
 } else {
  VmonthlyPMI = sn(VmonthlyPMI);
 }

 var VotherPmts = Number(VmonthlyTax) + Number(VmonthlyInsurance) + Number(VmonthlyPMI);

 var VnumPmts = VnumYears * 12;

 var pmtAmt = computeMonthlyPayment(Vprincipal, VnumPmts, VintRate);
 var VtotalMtgPmt = Number(pmtAmt) + Number(VotherPmts);

 var prin = Vprincipal;

 var Vint = VintRate;

 if(Vint >= 1) {
  Vint /= 100;
  }
 Vint /= 12;

 var nPer = VnumPmts;

 var intPort = 0;
 var accumInt = 0;
 var prinPort = 0;
 var accumPrin = 0;
 var count = 0;
 var pmtRow = "";
 var pmtNum = 0;
 var accumTotal = 0;

 var today = new Date();
 var dayFactor = today.getTime();
 var pmtDay = today.getDate();
 var loanMM = today.getMonth() + 1;
 var loanYY = today.getFullYear();
 if(loanYY < 1900) {
  loanYY += 1900;
 }
 var loanDate = (loanMM + "/" + pmtDay + "/" + loanYY);
 var monthMS = 86400000 * 30.4375;
 var pmtDate = 0;
 var displayPmtAmt = 0;
 var accumYearPrin = 0;
 var accumYearInt = 0;

 while(count < nPer) {

  if(count < (nPer - 1)) {

  intPort = prin * Vint;
  intPort *= 100;
  intPort = Math.round(intPort);
  intPort /= 100;

  accumInt = Number(accumInt) + Number(intPort);
  accumYearInt = Number(accumYearInt) + Number(intPort);

  prinPort = Number(pmtAmt) - Number(intPort);
  prinPort *= 100;
  prinPort = Math.round(prinPort);
  prinPort /= 100;

  accumPrin = Number(accumPrin) + Number(prinPort);
  accumYearPrin = Number(accumYearPrin) + Number(prinPort);
  
  prin = Number(prin) - Number(prinPort);

  displayPmtAmt = Number(prinPort) + Number(intPort);

  } else {

  intPort = prin * Vint;
  intPort *= 100;
  intPort = Math.round(intPort);
  intPort /= 100;

  accumInt = Number(accumInt) + Number(intPort);
  accumYearInt = Number(accumYearInt) + Number(intPort);

  prinPort = prin;

  accumPrin = Number(accumPrin) + Number(prinPort);
  accumYearPrin = Number(accumYearPrin) + Number(prinPort);

  prin = 0;

  //pmtAmt = Number(intPort) + Number(prinPort);
  displayPmtAmt = Number(prinPort) + Number(intPort);
  }

  count = Number(count) + Number(1);

  pmtNum = Number(pmtNum) + Number(1);

  dayFactor = Number(dayFactor) + Number(monthMS);

  pmtDate = new Date(dayFactor);

  pmtMonth = pmtDate.getMonth();

  pmtMonth = pmtMonth + 1;

  pmtYear = pmtDate.getFullYear();
  if(pmtYear < 1900) {
  pmtYear += 1900;
  }

  accumTotal = Number(accumPrin) + Number(accumInt);

  pmtString = (pmtMonth + "/" + pmtDay + "/" + pmtYear);

  pmtRow += "<tr><td align=right><font face='arial'><small>" + pmtNum + "</small></td>";
  pmtRow += "<td align=right><font face='arial'><small>" + pmtString + "</small></td>";
  pmtRow += "<td align=right><font face='arial'><small>" + "$" + fn(prinPort,2,1) + "</small></td>";
  pmtRow += "<td align=right><font face='arial'><small>" + "$" + fn(intPort,2,1) + "</small></td>";
  pmtRow += "<td align=right><font face='arial'><small>" + "$" + fn(displayPmtAmt,2,1) + "</small></td>";
  pmtRow += "<td align=right><font face='arial'><small>" + "$" + fn(prin,2,1) + "</small></td></tr>";
 

  if(pmtMonth == 12 || count == nPer) {

  pmtRow += "<tr bgcolor='#dddddd'><td align=right><font face='arial'><small>Total</small></td>";
  pmtRow += "<td align=left><font face='arial'><small>" + pmtYear + "</small></td>";
  pmtRow += "<td align=right><font face='arial'><small>" + "$" + fn(accumYearPrin,2,1) + "</small></td>";
  pmtRow += "<td align=right><font face='arial'><small>" + "$" + fn(accumYearInt,2,1) + "</small></td>";
  pmtRow += "<td align=right><font face='arial'><small> </small></td>";
  pmtRow += "<td align=right><font face='arial'><small> </small></td></tr>";


  accumYearPrin = 0;
  accumYearInt = 0;

  }

  if(count > 2400) {
  alert("Using your current entries you will never pay off this loan.");
  break;
  } else {
  continue;
  }

 }



      var part1 = "<head><title>Calendario de amortizaciones</title></head>";
      part1 += "<body bgcolor= '#FFFFFF'><br /><br /><center><font face='arial'>";
      part1 += "<big><strong>Calendario de amortizaciones</strong></big></center>";


      var part2 = "<center><table border=1 cellpadding=2 cellspacing=0>";
      part2 += "<tr><td colspan=6><font face='arial'><small><strong>Loan ";
      part2 += "Fecha del préstamo: " + loanDate + "<br />Principal: $" + fn(Vprincipal,2,1) + "<br /># of ";
      part2 += "Serie de pagos: " + nPer + "<br />Tasa de Interés: " + fn(VintRate,3,0) + "%<br />";
      part2 += "Pago: $" + fn(pmtAmt,2,1) + "</strong></small></td></tr><tr><td colspan=6>";
      part2 += "<center><font face='arial'><strong>Horario de Pagos</strong><br /><font face='arial'>";
      part2 += "<small><small>Por favor, tenga en cuenta las pequeñas diferencias de redondeo.</small></small></center></td></tr>";
      part2 += "<tr bgcolor='silver'><td align='center'><font face='arial'><small><strong>Pmt #</strong></small></td>";
      part2 += "<td align='center'><font face='arial'><small><strong>La Fecha</strong></small></td>";
      part2 += "<td align='center'><font face='arial'><small><strong>Principal</strong></small></td>";
      part2 += "<td align='center'><font face='arial'><small><strong>Interesar</strong></small></td>";
      part2 += "<td align='center'><font face='arial'><small><strong>Pago</strong></small></td>";
      part2 += "<td align='center'><font face='arial'><small><strong>Equilibrar</strong></small></td></tr>";

      var part3 = ("" + pmtRow + "");

      var part4 = "<tr><td colspan='2'><font face='arial'><small><strong>Gran Total</strong></small></td>";
      part4 += "<td align=right><font face='arial'><small><strong>" + "$" + fn(accumPrin,2,1) + "</strong></small></td>";
      part4 += "<td align=right><font face='arial'><small><strong>" + "$" + fn(accumInt,2,1) + "</strong></small></td>";
      part4 += "<td> </td><td> </td></tr></table><br /><center><form method='post'>";
      part4 += "<input type='button' value='Cerrar Ventana' onClick='window.close()'></form>";
      part4 += "</center></body></html>";


      var schedule = (part1 + "" + part2 + "" + part3 + part4 + "");
      reportWin = window.open("","","width=500,height=400,toolbar=yes,menubar=yes,scrollbars=yes");
      reportWin.document.write(schedule);
      reportWin.document.close();


 }

}


function clear_results(form) {

 document.calc.monthlyPI.value = "";
 document.calc.otherPmts.value = "";
 document.calc.monthlyPmt.value = "";
 document.calc.loanamount.value = "";
 document.calc.totalinterest.value = "";
 
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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/espanol.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				  <h1>Calculadora de pago de hipoteca en línea gratis con tablas de amortización</h1></div>
    <ul id="breadcrumbs">
    <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
    <li>Español</li>
    </ul>
   </div>
   			<div class="bottom-section">
				<!-- <div class="info-block">
					<label class="text-lbl"><strong>Are you using a cell phone?</strong></label>
					<p><a href="https://www.mortgagecalculator.biz/m/" class="click_btn">Click here</a> for the mobile friendly version of this page.</p>
				</div> -->

   				<div class="table-block">
<form name="calc" method="post" action="#">
 
 <table>
 <tbody>

 <tr>
 <td class="first-column">
 Valor de la casa:
 </td>
 <td align="center">
 <input name="homevalue" type="number" onKeyUp="clear_results(this.form);computeForm(this.form)" value="300000" size="10" onfocus="this.value = this.value=='300000'?'':this.value;" onblur="this.value = this.value==''?'300000':this.value;" /> 
 
 </td>
 </tr>


 <tr>
 <td class="first-column">
 Pago inicial:
 </td>
 <td align="center">
 <input name="downpayment" type="number" onKeyUp="clear_results(this.form);computeForm(this.form)" value="40000" size="10" onfocus="this.value = this.value=='40000'?'':this.value;" onblur="this.value = this.value==''?'40000':this.value;" /> 
 
 </td>
 </tr>

 <tr>
 <td class="first-column">
 <a href="#viewrates"><strong>Tasa de Interés</strong></a> (% APR):
 </td>
 <td align="center">
 <input name="intRate" type="number" step="0.01" onKeyUp="clear_results(this.form);computeForm(this.form)" value="5" size="10" onfocus="this.value = this.value=='5'?'':this.value;" onblur="this.value = this.value==''?'5':this.value;" />
 </td>
 </tr>

 <tr>
 <td class="first-column">
 Término (años):
 </td>
 <td align="center">
 <input name="numYears" type="number" onKeyUp="clear_results(this.form);computeForm(this.form)" value="30" size="10" onfocus="this.value = this.value=='30'?'':this.value;" onblur="this.value = this.value==''?'30':this.value;" />
 </td>
 </tr>

 <tr>
 <td class="first-column">
 Impuestos anuales de Propiedad (%):
 </td>
 <td align="center">
 <input name="annualTax" type="number" onKeyUp="clear_results(this.form);computeForm(this.form)" value="1.38" size="10" onfocus="this.value = this.value=='1.38'?'':this.value;" onblur="this.value = this.value==''?'1.38':this.value;" step="0.01" />
 </td>
 </tr>

 <tr>
 <td class="first-column">
 Seguro anual de la casa (%):
 </td>
 <td align="center">
 <input name="annualInsurance" type="number" onKeyUp="clear_results(this.form);computeForm(this.form)" value="0.5" step=0.01 size="10" onfocus="this.value = this.value=='0.5'?'':this.value;" onblur="this.value = this.value==''?'0.5':this.value;" />
 </td>
 </tr>

 <tr>
 <td class="first-column">
Seguro hipotecario privado <acronym title="Private Mortgage Insurance">PMI</acronym> (%): </td>
 <td align="center">
 <input name="monthlyPMI" type="number" onKeyUp="clear_results(this.form);computeForm(this.form)" value="0.5" step=0.01 size="10" onfocus="this.value = this.value=='0.5'?'':this.value;" onblur="this.value = this.value==''?'0.5':this.value;" />
 </td>
 </tr>

 <tr>
 <td class="first-column">
Tarifas mensuales de la asociación de propietarios ($): </td>
 <td align="center">
 <input name="monthlyHOA" type="number" onKeyUp="clear_results(this.form);computeForm(this.form)" value="0" step=0.01 size="10" onfocus="this.value = this.value=='0'?'':this.value;" onblur="this.value = this.value==''?'0':this.value;" />
 </td>
 </tr>

 
 <tr>
 <td class="first-column">
 Los costos de cierre ($0 si no está en préstamo):
 </td>
 <td align="center">
 <input name="closingcosts" type="number" onKeyUp="clear_results(this.form);computeForm(this.form)" value="3700" size="10" onfocus="this.value = this.value=='3700'?'':this.value;" onblur="this.value = this.value==''?'3700':this.value;" step="any" />
 </td>
 </tr>

 

 <tr>
 <td colspan="2" align="center">
<input type="button" class="table-btn" name="compute" value="Calcule pagos mensuales" onClick="computeForm(this.form)" /> 
 </td>
 </tr>

 <tr>
 <td class="first-column"> Total de los Pagos Mensuales: </td>
 <td align="center">
 <input type="text" class="text-bg" name="monthlyPmt" size="10" readonly />
 </td>
 </tr>

 <tr>
 <td class="first-column">Principal e intereses:</td>
 <td align="center">
 <input type="text" class="text-bg" name="monthlyPI" size="10" readonly />
 </td>
 </tr>

 <tr>
 <td class="first-column">Impuestos, su seguro, y su PMI (PITI):</td>
 <td align="center">
 <input type="text" class="text-bg" name="otherPmts" size="10" readonly />
 </td>
 </tr>
 
 <tr>
 <td class="first-column">
 Cantidad de la hipoteca:
 </td>
 <td align="center">
 <input type="text" class="text-bg" name="loanamount" size="10" readonly />
 </td>
 </tr>

 <tr>
 <td class="first-column">
 
gasto de interés total:
 </td>
 <td align="center">
 <input type="text" class="text-bg" name="totalinterest" size="10" readonly />
 </td>
 </tr>


 <tr>
 <td align='center'>
 <input type="button" class="table-btn" name="sched" value="Crear Programa de Amortización" onClick="monthlyAmortSched(this.form)" />
 </td>
 <td align='center'>
<input type="reset" class="table-btn" value="Claro" />
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