<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>10 Year Home Loan Payment Calculator: 10 YR Fixed Rate Mortgage Calculator With Current Rates</title>
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
 var Vfinanceclose = document.calc.financeclose.options[document.calc.financeclose.selectedIndex].value;
 var Vprincipal =sn(parseFloat(document.calc.homevalue.value) + parseFloat(Vclosingcosts)*Vfinanceclose - parseFloat(Vdownpayment));
 var VintRate = sn(document.calc.intRate.value);
 var VnumYears = sn(document.calc.numYears.value);
 var VannualTax = document.calc.annualTax.value;
 var Vannualrepairs = document.calc.annualrepairs.value;

 var VmonthlyTax =0;
 if(VannualTax == 0 || VannualTax == "") {
  VannualTax = 0;
  VmonthlyTax =0;
 } else {
//  VannualTax = sn((VannualTax * document.calc.homevalue.value)/100); //
  VannualTax = sn(VannualTax); 
  VmonthlyTax = VannualTax / 12;
  VmonthlyTax *= 100;
  VmonthlyTax = Math.round(VmonthlyTax);
  VmonthlyTax /= 100;
 }

 var Vmonthlyrepairs = 0;
 if(Vannualrepairs == 0 || Vannualrepairs == "") {
  Vannualrepairs = 0;
  Vmonthlyrepairs =0;
 } else {
  Vannualrepairs = sn(Vannualrepairs); 
  Vmonthlyrepairs = Vannualrepairs / 12;
  Vmonthlyrepairs *= 100;
  Vmonthlyrepairs = Math.round(Vmonthlyrepairs);
  Vmonthlyrepairs /= 100;
 }

 var VannualInsurance = document.calc.annualInsurance.value;
 var VmonthlyInsurance = 0;
 if(VannualInsurance == 0 || VannualInsurance == "") {
  VannualInsurance = 0;
  VmonthlyInsurance = 0;
 } else {
//  VannualInsurance = sn((VannualInsurance * document.calc.homevalue.value)/100); //
  VannualInsurance = sn(VannualInsurance);
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

 var VotherPmts = Number(VmonthlyTax) + Number(VmonthlyInsurance) + Number(VmonthlyPMI) + Number(VmonthlyHOA) + Number(Vmonthlyrepairs);

 var VnumPmts = VnumYears * 12;

 var Vloanamount =sn(parseFloat(document.calc.homevalue.value) + parseFloat(Vclosingcosts)*Vfinanceclose - parseFloat(Vdownpayment));

   var closeCostPerc = sn(document.calc.closingCost.value);
      if(document.calc.ptsDol.selectedIndex == 0) {
         // if(closeCostPerc >= 1) {
         closeCostPerc = closeCostPerc / 100;
      // } else {
      //    closeCostPerc = closeCostPerc;
      // }
    closeCostAmt = Vloanamount * closeCostPerc;
      } else {
         closeCostAmt = sn(document.calc.closingCost.value);
      }

Vloanamount = Vloanamount + closeCostAmt*Vfinanceclose;

 var VpmtAmt = computeMonthlyPayment(Vloanamount, VnumPmts, VintRate);
 var VtotalMtgPmt = Number(VpmtAmt) + Number(VotherPmts);

 var Vtotalinterest =  sn(parseFloat(VnumPmts) * parseFloat(VpmtAmt) - parseFloat(Vloanamount));

 var Vclosingtotal = Number(closeCostAmt) + Number(Vclosingcosts);
 document.calc.closingtotal.value = "$" + fn(Vclosingtotal,2,1);
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
 var Vhomevalue = sn(document.calc.homevalue.value);
 var Vfinanceclose = document.calc.financeclose.options[document.calc.financeclose.selectedIndex].value;
 var Vprincipal = sn(parseFloat(document.calc.homevalue.value) + parseFloat(Vclosingcosts)*Vfinanceclose - parseFloat(Vdownpayment));
var closeCostAmt = 0;
   var closeCostPerc = sn(document.calc.closingCost.value);
      if(document.calc.ptsDol.selectedIndex == 0) {
         // if(closeCostPerc >= 1) {
         closeCostPerc = closeCostPerc / 100;
      // } else {
      //    closeCostPerc = closeCostPerc;
      // }
    closeCostAmt = Vprincipal * closeCostPerc;
      } else {
         closeCostAmt = sn(document.calc.closingCost.value);
      }

 var Vclosingtotal = Number(closeCostAmt) + Number(Vclosingcosts);


Vprincipal = Vprincipal + closeCostAmt*Vfinanceclose;
 var VintRate = sn(document.calc.intRate.value);
 var VnumYears = sn(document.calc.numYears.value);
 var VannualTax = document.calc.annualTax.value;
 var Vannualrepairs = document.calc.annualrepairs.value;
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

 var Vmonthlyrepairs = 0;
 if(Vannualrepairs == 0 || Vannualrepairs == "") {
  Vannualrepairs = 0;
  Vmonthlyrepairs =0;
 } else {
  Vannualrepairs = sn(Vannualrepairs); 
  Vmonthlyrepairs = Vannualrepairs / 12;
  Vmonthlyrepairs *= 100;
  Vmonthlyrepairs = Math.round(Vmonthlyrepairs);
  Vmonthlyrepairs /= 100;
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
 var VPMIrate = document.calc.monthlyPMI.value;

 if(VmonthlyPMI == 0 || VmonthlyPMI == "" || Vhomevalue > 1.249999999*Vprincipal) {
  VmonthlyPMI = 0;
 } else {
  VmonthlyPMI = sn((VmonthlyPMI * Vprincipal)/100);
		 VmonthlyPMI = VmonthlyPMI / 12;
  VmonthlyPMI *= 100;
  VmonthlyPMI = Math.round(VmonthlyPMI);
  VmonthlyPMI /= 100;
 }

 var VotherPmts = Number(VmonthlyTax) + Number(VmonthlyInsurance) + Number(VmonthlyPMI) + Number(Vmonthlyrepairs);

 var Vpmipermonth = Number(VmonthlyPMI);

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


var Vyear = Number(document.calc.originationyear.value);
var Vyear1 = Vyear;
var Vday = Number(document.calc.originationday.selectedIndex) + Number(1);
var Vday1 = Vday;
if(Vday > 28) {
         Vday = 28;
      }
var Vmonth = Number(document.calc.originationmonth.selectedIndex);
var Vmonth1 = Vmonth;
if (Vmonth > 12) {
	Vmonth = 0;
	Vyear = Vyear + 1;
	}

var loanDate = (Vmonth1 + "/" + Vday1 + "/" + Vyear1);
var monthArr = new Array("blank","January","February","March","April","May","June","July","August","September","October","November","December","January");

// var today = new Date();
 var thedate = new Date(Vyear, Vmonth, Vday);
 var dayFactor = thedate.getTime();
 var pmtDay = Vday;
 var loanMM = Vmonth;
 var loanYY = Vyear;
 if(loanYY < 1900) {
  loanYY += 1900;
 }
//  var loanDate = (loanMM + "/" + pmtDay + "/" + loanYY);
// var today = new Date();
//  var dayFactor = today.getTime();
//  var pmtDay = today.getDate();
//  var loanMM = today.getMonth() + 1;
//  var loanYY = today.getFullYear();
//  if(loanYY < 1900) {
//   loanYY += 1900;
//  }
//  var loanDate = (loanMM + "/" + pmtDay + "/" + loanYY);
 var monthMS = 86400000 * 30.4375;

 var pmtDate = 0;
 var displayPmtAmt = 0;
 var accumYearPrin = 0;
 var accumYearInt = 0;
 var VcurrentLTV = 0;
 var Vpmithismonth = 0;
 var Vpmipaymentcount = 0;
 
  dayFactor = Number(dayFactor) - Number(monthMS);

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
  VcurrentLTV =  100 * prin / Vhomevalue;
   if (VcurrentLTV < 78 || (Vprincipal * 1.25) < Vhomevalue) {
	   Vpmipermonth = 0;
	   }
   if (VcurrentLTV > 78 && (Vprincipal * 1.25) > Vhomevalue) {
//	   Vpmithismonth = prin * VPMIrate / 1200;
	   Vpmipaymentcount = Vpmipaymentcount + 1;
	   }


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
  VcurrentLTV =  100 * prin / Vhomevalue;
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
  pmtRow += "<td align=right><font face='arial'><small>" + "$" + fn(prin,2,1) + "</small></td>";
  pmtRow += "<td align=right><font face='arial'><small>" + " " + fn(VcurrentLTV,2,1) + "%</small></td>";
  pmtRow += "<td align=right><font face='arial'><small>" + "$" + fn(Vpmipermonth,2,1) + "</small></td></tr>";
 

  if(pmtMonth == 12 || count == nPer) {

  pmtRow += "<tr bgcolor='#F1FDEB'><td align=right><font face='arial'><strong>Total</strong></td>";
  pmtRow += "<td align=center><font face='arial'><strong>" + pmtYear + "</strong></td>";
  pmtRow += "<td align=right><font face='arial'><strong>" + "$" + fn(accumYearPrin,2,1) + "</strong></td>";
  pmtRow += "<td align=right><font face='arial'><strong>" + "$" + fn(accumYearInt,2,1) + "</strong></td>";
  pmtRow += "<td align=right><font face='arial'><small> </small></td>";
  pmtRow += "<td align=right><font face='arial'><small> </small></td><td align=right><font face='arial'><small> </small></td><td align=right><font face='arial'><small> </small></td></tr>";


  accumYearPrin = 0;
  accumYearInt = 0;

  }

  if(count > 1200) {
  alert("Using your current entries you will never pay off this loan.");
  break;
  } else {
  continue;
  }

 }



 var part1 = "<head><title>Amortization Schedule</title></head>";
 part1 += "<body bgcolor= '#FFFFFF'><br /><br /><center><font face='arial'>";
 part1 += "<a href='https://www.mortgagecalculator.biz/' target='_blank'><img alt='MorgageCalculator logo.' src='https://www.mortgagecalculator.biz/img/logo.png' border='0'/></a></center><br /> ";
 part1 += "<center><font face='arial'><big><strong>Your Home Loan Amortization Schedule</strong></big></center>";

 var part2 = "<center><table border=1 cellpadding=2 cellspacing=0>";
 part2 += "<tr><td colspan=8><font face='arial'><small><b>Loan ";
 part2 += "Date: " + loanDate + "<br />Principal: $" + fn(Vprincipal,2,1) + "<br />Number of ";
 part2 += "Payments: " + nPer + "<br />Interest Rate: " + fn(VintRate,3,0) + "%<br />";
 part2 += "P&amp;I Payment: $" + fn(pmtAmt,2,1) + "<br />Taxes, Insurance &amp; HOA: $" + fn(VotherPmts,2,1) + "<br />Total Monthly Payment: $" + fn(VtotalMtgPmt,2,1) + "<br/> Total Closing Costs: $"+ fn(Vclosingtotal,2,1) +"</small></td></tr><tr><td colspan=8>";
 part2 += "<center><font face='arial'><strong>Schedule of Principal &amp; Interest Payments</font></strong><br /><font face='arial'>";
 part2 += "<small>This table reflects the P&amp;I portion of the mortgage. An extra $" + fn(VotherPmts,2,1) + " is added to each monthly payment to cover other fees, making $" + fn((VotherPmts+pmtAmt),2,1) + " the all-in monthly payment. ";
if (VmonthlyPMI > 0) { 
 part2 += "Borrowers who put less than 20% down are required to pay for Property Mortgage Insurance (PMI). Lenders typically automatically remove PMI when the Loan-to-Value (LTV) falls to 78%.  Based on our calculations you will be required to make "+ Vpmipaymentcount +" monthly PMI payments. After "+ Vpmipaymentcount +" months your overall monthly payment will drop by " + "$" + fn(VmonthlyPMI,2,1) + " to $" + fn((VtotalMtgPmt-VmonthlyPMI),2,1) +" to reflect the removal of PMI. ";
	} else {
 part2 += "Borrowers who put less than 20% down are typically required to pay for Property Mortgage Insurance (PMI). Lenders usually automatically remove PMI when the Loan-to-Value (LTV) falls to 78%. According to the date you entered you are not required to pay for PMI. ";		
		}
 part2 += "</small></center></td></tr> <tr bgcolor='#8FD36F'><td align='center'><font face='arial'><strong>Pmt</strong></td>";
 part2 += "<td align='center'><font face='arial'><strong>Date</strong></td>";
 part2 += "<td align='center'><font face='arial'><strong>Principal</strong></td>";
 part2 += "<td align='center'><font face='arial'><strong>Interest</strong></td>";
 part2 += "<td align='center'><font face='arial'><strong>Payment</strong></td>";
 part2 += "<td align='center'><font face='arial'><strong>Balance</strong></td><td align='center'><font face='arial'><strong>LTV</strong></td><td><font face='arial'><strong>PMI</strong></td></tr>";

 var part3 = ("" + pmtRow + "");

 var part4 = "<tr><td colspan='2'><font face='arial'><small><b>Grand Total</b></small></td>";
 part4 += "<td align=right><font face='arial'><small><b>" + "$" + fn(accumPrin,2,1) + "</b></small></td>";
 part4 += "<td align=right><font face='arial'><small><b>" + "$" + fn(accumInt,2,1) + "</b></small></td>";
 part4 += "<td align=right><font face='arial'><small><b>" + "$" + fn(accumTotal,2,1) + "</b></small></td><td> </td><td> </td><td> </td></tr></table><br /><center><form method='post'>";
 part4 += "<input type='button' value='Close Window' onClick='window.close()'></form>";
 part4 += "</center></body></html>";


 var schedule = (part1 + "" + part2 + "" + part3 + part4 + "");
 reportWin = window.open("","","width=600,height=400,toolbar=yes,menubar=yes,scrollbars=yes");
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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/10yr.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				  <h1>10 Year Mortgage Calculator With Taxes</h1></div>
    <ul id="breadcrumbs">
    <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
    <li><a href="https://www.mortgagecalculator.biz/c/term-comparison.php">Term</a></li>
    <li>10 Year PITI Mortgages</li>
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
<td colspan="2"><h3>Home Loan Information</h3></td>
</tr>

 <tr>
 <td class="first-column">
 Loan Term (Years):
 </td>
 <td align="center">
 <input name="numYears" type="number" onKeyUp="clear_results(this.form);computeForm(this.form)" value="10" size="10" onfocus="this.value = this.value=='10'?'':this.value;" onblur="this.value = this.value==''?'10':this.value;" />
 </td>
 </tr>

 <tr>
 <td class="first-column">
 Home Value:
 </td>
 <td align="center">
 <input name="homevalue" type="number" onKeyUp="clear_results(this.form);computeForm(this.form)" value="250000" size="10" onfocus="this.value = this.value=='250000'?'':this.value;" onblur="this.value = this.value==''?'250000':this.value;" /> 
 
 </td>
 </tr>


 <tr>
 <td class="first-column">
 Downpayment:
 </td>
 <td align="center">
 <input name="downpayment" type="number" onKeyUp="clear_results(this.form);computeForm(this.form)" value="50000" size="10" onfocus="this.value = this.value=='50000'?'':this.value;" onblur="this.value = this.value==''?'50000':this.value;" /> 
 
 </td>
 </tr>

 <tr>
 <td class="first-column">
 <acronym title="Private Mortgage Insurance">PMI</acronym> (%): </td>
 <td align="center">
 <input name="monthlyPMI" type="number" onKeyUp="clear_results(this.form);computeForm(this.form)" value="0.5" step=0.01 size="10" onfocus="this.value = this.value=='0.5'?'':this.value;" onblur="this.value = this.value==''?'0.5':this.value;" />
 </td>
 </tr>


 <tr>
 <td class="first-column">
 Interest rate (<a href="#viewrates"><strong>% APR</strong></a>):
 </td>
 <td align="center">
 <input name="intRate" type="number" step="0.01" onKeyUp="clear_results(this.form);computeForm(this.form)" value="3.9" size="10" onfocus="this.value = this.value=='3.9'?'':this.value;" onblur="this.value = this.value==''?'3.9':this.value;" />
 </td>
 </tr>

 <tr>
 <td colspan="2" align="center">
<input type="button" class="table-btn" name="getbest" value="See Local Rates" onClick="location.href='#viewrates'" /> 
 </td>
 </tr>

<tr>
<td colspan="2"><h3>Other Home Ownership Expenses</h3></td>
</tr>

 <tr>
 <td class="first-column">
 Annual Property Taxes ($):
 </td>
 <td align="center">
 <input name="annualTax" type="number" onKeyUp="clear_results(this.form);computeForm(this.form)" value="2400" size="10" onfocus="this.value = this.value=='2400'?'':this.value;" onblur="this.value = this.value==''?'2400':this.value;" step="0.01" />
 </td>
 </tr>

 <tr>
 <td class="first-column">
 Homeowners Insurance ($/Yr):
 </td>
 <td align="center">
 <input name="annualInsurance" type="number" onKeyUp="clear_results(this.form);computeForm(this.form)" value="1200" step=0.01 size="10" onfocus="this.value = this.value=='1200'?'':this.value;" onblur="this.value = this.value==''?'1200':this.value;" />
 </td>
 </tr>


 <tr>
 <td class="first-column">
 Monthly <acronym title="Homeowner's association dues">HOA</acronym> Fees ($): </td>
 <td align="center">
 <input name="monthlyHOA" type="number" onKeyUp="clear_results(this.form);computeForm(this.form)" value="0" step=0.01 size="10" onfocus="this.value = this.value=='0'?'':this.value;" onblur="this.value = this.value==''?'0':this.value;" />
 </td>
 </tr>

 <tr>
 <td class="first-column">
 Annual Home Repairs ($):
 </td>
 <td align="center">
 <input name="annualrepairs" type="number" onKeyUp="clear_results(this.form);computeForm(this.form)" value="2400" size="10" onfocus="this.value = this.value=='2400'?'':this.value;" onblur="this.value = this.value==''?'2400':this.value;" step="0.01" />
 </td>
 </tr>

<tr>
<td colspan="2"><h3>Closing Costs</h3></td>
</tr>

<tr>
<td class="first-column">Discount Points  <select name="ptsDol" size="1" onChange="clear_results(this.form);computeForm(this.form)">
<option value="points" selected>points</option>
<option value="dollar">dollars</option>
</select> :</td>
<td align="center">
<input name="closingCost" type="number" step="any" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" onKeyUp="clear_results(this.form);computeForm(this.form)" value="1" size="10" />
</td>
</tr>

 
 <tr>
 <td class="first-column">
 Other Closing Costs:
 </td>
 <td align="center">
 <input name="closingcosts" type="number" onKeyUp="clear_results(this.form);computeForm(this.form)" value="1200" size="10" onfocus="this.value = this.value=='1200'?'':this.value;" onblur="this.value = this.value==''?'1200':this.value;" step="any" />
 </td>
 </tr>

 <tr>
 <td class="first-column">
 Finance Loan Closing Costs?
 </td>
 <td align="center">
 <select name="financeclose" size="1" onChange="clear_results(this.form);computeForm(this.form)">
 <option value="0">No</option>
 <option value="1">Yes</option>
 </select>
 </td>
 </tr>

 
  <tr>
 <td class="first-column">
 Loan Origination Date:
 </td>
 <td align="center">
 <select name="originationmonth" id="originationmonth" size="1" onChange="clear_results(this.form);computeForm(this.form)">
 <option value="0">Month</option>
 <option value="1">Jan</option>
 <option value="2">Feb</option>
 <option value="3">Mar</option>
 <option value="4">Apr</option>
 <option value="5">May</option>
 <option value="6">Jun</option>
 <option value="7">Jul</option>
 <option value="8">Aug</option>
 <option value="9">Sep</option>
 <option value="10">Oct</option>
 <option value="11">Nov</option>
 <option value="12">Dec</option>
 </select>
<select name="originationday" id="originationday" size="1">
 <option value = "1" selected> 1</option>
 <option value = "2"> 2</option>
 <option value = "3"> 3</option>
 <option value = "4"> 4</option>
 <option value = "5"> 5</option>
 <option value = "6"> 6</option>
 <option value = "7"> 7</option>
 <option value = "8"> 8</option>
 <option value = "9"> 9</option>
 <option value = "10"> 10</option>
 <option value = "11"> 11</option>
 <option value = "12"> 12</option>
 <option value = "13"> 13</option>
 <option value = "14"> 14</option>
 <option value = "15"> 15</option>
 <option value = "16"> 16</option>
 <option value = "17"> 17</option>
 <option value = "18"> 18</option>
 <option value = "19"> 19</option>
 <option value = "20"> 20</option>
 <option value = "21"> 21</option>
 <option value = "22"> 22</option>
 <option value = "23"> 23</option>
 <option value = "24"> 24</option>
 <option value = "25"> 25</option>
 <option value = "26"> 26</option>
 <option value = "27"> 27</option>
 <option value = "28"> 28</option>
 <option value = "28"> 29</option>
 <option value = "28"> 30</option>
 <option value = "28"> 31</option>
 </select>

 <input name="originationyear" id="originationyear" type="number" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value='';" value="2019"  size="4" width="40px"/>

<script type="text/javascript">
var date = new Date();
var day1 = date.getDate();
var month1 = date.getMonth() + 1;
var year1 = date.getFullYear();
if (day1 > 28) day1 = 28;
// var today = year + "-" + month + "-" + day;       
document.getElementById("originationyear").value = year1;
document.getElementById("originationday").value = day1;
document.getElementById("originationmonth").value = month1;
</script>
 </td>
 </tr>
 
 

 <tr>
 <td colspan="2" align="center">
<input type="button" class="table-btn" name="compute" value="Figure Mortgage Payment" onClick="computeForm(this.form)" /> 
 </td>
 </tr>

 <tr>
 <td class="first-column"> Total monthly payment: </td>
 <td align="center">
 <input type="text" class="text-bg" name="monthlyPmt" size="10" readonly />
 </td>
 </tr>

 <tr>
 <td class="first-column">Principal &amp; Interest:</td>
 <td align="center">
 <input type="text" class="text-bg" name="monthlyPI" size="10" readonly />
 </td>
 </tr>

 <tr>
 <td class="first-column">Taxes, Ins., PMI &amp; HOA:</td>
 <td align="center">
 <input type="text" class="text-bg" name="otherPmts" size="10" readonly />
 </td>
 </tr>

 <tr>
 <td class="first-column">
 Total Closing Costs:
 </td>
 <td align="center">
 <input type="text" class="text-bg" name="closingtotal" size="10" readonly />
 </td>
 </tr>
 
 <tr>
 <td class="first-column">
 Loan Amount:
 </td>
 <td align="center">
 <input type="text" class="text-bg" name="loanamount" size="10" readonly />
 </td>
 </tr>

 <tr>
 <td class="first-column">
 Total Interest Expense:
 </td>
 <td align="center">
 <input type="text" class="text-bg" name="totalinterest" size="10" readonly />
 </td>
 </tr>


 <tr>
 <td align='center'>
 <input type="button" class="table-btn" name="sched" value="Create Amortization Schedule" onClick="computeForm(this.form);monthlyAmortSched(this.form)" />
 </td>
 <td align='center'>
<input type="reset" class="table-btn" value="Clear" />
 </td>
 </tr>
 </tbody>
 </table>
 </form>
 </div>
 
 
<p>&nbsp;</p>
<a name="viewrates"></a>
<h3>Mortgage Rates</h3>
<div class="myFinance-widget" data-widget-id="0e398780-2190-4caf-9640-aecf30df3c9c" data-show-filters="true" data-product="10 year fixed" data-property-value="250000" data-purchase-price="250000" data-percent="20" data-current-loan-balance="200000"  data-table-title="Save Money With Today's Best 10-year Fixed Mortgage Rates" data-campaign="mortcalcbiz_fulltable_mortgage"></div>

 <p>Want to compare multiple loan terms side-by-side on a single page? If so, check out the <a href="https://www.mortgagecalculator.biz/c/term-comparison.php">loan term comparison calculator</a>.</p>

<p>&nbsp;</p>
<p><img src="../img/buying-a-home.png" width="1250" height="1082" alt="Buying a Home."></p>
<p>&nbsp;</p>
    
    

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