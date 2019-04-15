<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Mortgage Qualification Guidelines: VA &amp; FHA Home Loan Qualification Ratios &amp; Criteria</title>		
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

   //get loan variables


   var VpurchaseAmt = sn(document.calc.purchaseAmt.value);
   if(VpurchaseAmt == "" || VpurchaseAmt == 0) {
      VpurchaseAmt = 60000;
   }

   var VdownPayPercAmt = sn(document.calc.downPayPercAmt.value);
   var VdownPayAmt = 0;
   var VdownPayMethod = document.calc.downPayMethod.selectedIndex;
   if(VdownPayMethod == 0) {
   //CONVERT FRACTION TO DECIMAL POINT IF NECESSARY
   if(VdownPayPercAmt >= 1) {
      VdownPayPercAmt /= 100;
   }
      VdownPayAmt = VdownPayPercAmt * VpurchaseAmt;
   } else {
      VdownPayAmt = VdownPayPercAmt;
   }

   if(VdownPayAmt < 1) {
      VdownPayAmt = 0;
   }
   document.calc.downPayAmt.value = fns(VdownPayAmt,2,1,1,1);

   //CALCULATE LOAN AMOUNT
   var VloanAmt = 0;
   var VloanAmt = Number(VpurchaseAmt) - Number(VdownPayAmt);
   document.calc.loanAmt.value = fns(VloanAmt,2,1,1,1);

   //ADD LOAN AMOUNT TO HIDDEN AMORT FIELD
   document.calc.Hprincipal.value = VloanAmt;

   //GET INTEREST RATE AND CONVERT TO FRACTION IF NEC
   var VintRate = sn(document.calc.intRate.value);
   if(VintRate == "" || VintRate == 0) {
      VintRate = 8;
   }
   if(VintRate >= 1) {
      VintRate /= 100;
   }
   VintRate /= 12;

   //GET YEARS AND CONVERT TO MONTHS
   var VnoYears = sn(document.calc.noYears.value);
   var VnoMonths = VnoYears * 12;

   //ADD NPER TO HIDDEN AMORT FIELD
   document.calc.HaNPer.value = VnoMonths;

   //COMPUTE PRINCIPAL AND INTEREST MONTHLY PAYMENT AMOUNT
   var factor = 1;
   for (var j = 0; j < VnoMonths; j++) {
      factor = factor * (Number(1) + Number(VintRate));
   }
   var VpmtPI = (VloanAmt * factor * VintRate) / (Number(factor) - Number(1));

   //document.calc.pmtPI.value = VloanAmt;
   document.calc.pmtPI.value = fns(VpmtPI,2,1,1,1);

   //ADD PAYMENT TO HIDDEN AMORT FIELD
   document.calc.HmoPmt.value = VpmtPI;

   //COMPUTE MONTHLY PROPERTY TAX PAYMENT
   var VpropTaxPercAmt = sn(document.calc.propTaxPercAmt.value);
   var VpropTaxAmt = 0;
   var VpropTaxMethod = document.calc.propTaxMethod.selectedIndex;
   if(VpropTaxMethod == 0) {
      VpropTaxPercAmt /= 100;
      VpropTaxAmt = VpropTaxPercAmt * VpurchaseAmt;
   } else {
      VpropTaxAmt = VpropTaxPercAmt;
   }

   if(VpropTaxAmt / 12 < 1) {
      VpropTaxAmt = 0;
   } else {
      VpropTaxAmt = parseInt(VpropTaxAmt / 12,10);
   }

   document.calc.propTaxAmt.value = fns(VpropTaxAmt,2,1,1,1);

   //COMPUTE MONTHLY INSURANCE PAYMENT
   var VinsPercAmt = sn(document.calc.insPercAmt.value);
   var VinsAmt = 0;
   var VinsMethod = document.calc.insMethod.selectedIndex;
   if(VinsMethod == 0) {
      VinsPercAmt /= 100;
      VinsAmt = VinsPercAmt * VpurchaseAmt;
   } else {
      VinsAmt = VinsPercAmt;
   }

   if(VinsAmt / 12 < 1) {
      VinsAmt = 0;
   } else {
      VinsAmt = parseInt(VinsAmt / 12,10);
   }

   document.calc.insAmt.value = fns(VinsAmt,2,1,1,1);

   //COMPUTE PRIVATE MORTGAGE INSURANCE (PMI) PAYMENT
   var VpmiPercAmt = sn(document.calc.pmiPercAmt.value);
   var VpmiAmt = 0;
   var VpmiMethod = document.calc.pmiMethod.selectedIndex;
   if(VpmiMethod == 0) {
      VpmiPercAmt /= 100;
      VpmiAmt = VpmiPercAmt * VpurchaseAmt;
   } else {
      VpmiAmt = VpmiPercAmt;
   }

   if(VpmiAmt / 12 < 1) {
      VpmiAmt = 0;
   } else {
      VpmiAmt = parseInt(VpmiAmt / 12,10);
   }

   document.calc.pmiAmt.value = fns(VpmiAmt,2,1,1,1);

   //GET MONTHLY ASSOCIATION FEES
   VassocAmt = sn(document.calc.assocAmt.value/12);
   if(VassocAmt == "" || VassocAmt == 0) {
      VassocAmt = 0;
      document.calc.assocAmt.value = 0;
   }
   
     document.calc.associationfeeAmt.value = fns(VassocAmt,2,1,1,1);

   //COMPUTE MONTHLY PITI (PRIN, INT, TAX, INS)
   var VpmtPITI = Number(VpmtPI) + Number(VpropTaxAmt) + Number(VinsAmt) + Number(VpmiAmt) + Number(VassocAmt);

   document.calc.pmtPITI.value = fns(VpmtPITI,2,1,1,1);

   //COMPUTE TAX DEDUCTABLE PORTION OF PAYMENT
   var VintDeduct = VintRate * VloanAmt;
   var VpropTaxDeduct = VinsAmt;
   var VdeductAmt = Number(VintDeduct) + Number(VpropTaxDeduct);
   document.calc.deductAmt.value = fns(VdeductAmt,2,1,1,1);

   //GET GROSS PAY AND CONVERT TO MONTHLY
   var VgrossPay = sn(document.calc.grossPay.value);
   if(document.calc.payMethod.selectedIndex == 0) {
      var VmoPay = VgrossPay / 12;
   } else {
      var VmoPay = VgrossPay;
   }

   //GET MONTHLY DEBTS
   var VmoDebts = sn(document.calc.moDebts.value);
   if(VmoDebts == "" || VmoDebts == 0) {
      VmoDebts = 0;
      document.calc.moDebts.value = 0;
   }

   //CALCULATE PITI TO MONTHLY INCOME RATIO (28% max)
   var VratioIncome = VpmtPITI / VmoPay;
   if(VratioIncome < .01) {
      document.calc.ratioIncome.value = fns(VratioIncome *100,2,0,2,1) + "";
   } else {
      document.calc.ratioIncome.value = fns(VratioIncome *100,2,0,2,1) + "";
   }

   //CALCULATE PITI + DEBT TO MONTHLY INCOME RATIO (36% max)
   var VratioDebt = (Number(VpmtPITI) + Number(VmoDebts)) / VmoPay ;
   if(VratioDebt < .01) {
      document.calc.ratioDebt.value = fns(VratioDebt * 100,2,0,2,1) + "";

   } else {
      document.calc.ratioDebt.value = fns(VratioDebt * 100,2,0,2,1) + "";
   }

   //CALCULATE MAXIMUM LOAN AMOUNT
   var VmaxPmtIncome = VmoPay * .28;
   var VmaxPmtDebt = Number(VmoPay  * .36) - Number(VmoDebts);

   if(VmaxPmtIncome > VmaxPmtDebt) {
      var maxPmt = Number(VmaxPmtDebt) - (Number(VpropTaxAmt) + Number(VinsAmt) + Number(VpmiAmt) + Number(VassocAmt));
      var prin = Number(VmaxPmtDebt ) - Number(Number(VmaxPmtDebt  * VintRate));
      var intPort = 0;
      var prinPort =0;
      var count = 1;

      while(count < VnoMonths) {
         intPort = prin * VintRate;
         prinPort = Number(maxPmt) - Number(intPort);
         prin = Number(prin) + Number(prinPort);
         count = count + 1;
         if(count > 360) {break; } else {continue; }
      }

      var VmaxLoanAmt = prin;
      if(VmaxLoanAmt < 0) {
         document.calc.qualifyMax.value =  0;
      } else {
         document.calc.qualifyMax.value = fns(VmaxLoanAmt,2,1,1,1);
      }

   } else {
      var maxPmt = Number(VmaxPmtIncome) - Number(Number(VpropTaxAmt) + Number(VinsAmt) + Number(VpmiAmt) + Number(VassocAmt));
      var prin = Number(VmaxPmtIncome) - (Number(VmaxPmtIncome  * VintRate));
      var intPort = 0;
      var prinPort =0;
      var count = 1;

      while(count < VnoMonths) {
         intPort = prin * VintRate;
         prinPort = Number(maxPmt) - Number(intPort);
         prin = Number(prin) + Number(prinPort);
         count = count + 1;
         if(count > 360) {break; } else {continue; }
      }

      var VmaxLoanAmt = prin;
      if(VmaxLoanAmt < 0) {
         document.calc.qualifyMax.value =  0;
      } else {
         document.calc.qualifyMax.value = fns(VmaxLoanAmt,2,1,1,1);
      }
   }


   //DETERMINE IF QUALIFY
   if(VratioIncome > .40 || VratioDebt > .50) {
      document.calc.qualifyYN.value = "No";
   } else {
      document.calc.qualifyYN.value = "Yes";
   }

} //End of function


function createReport(form) {

   //GRAB VARIABLES
   
   if((document.calc.Hprincipal.value == "" || document.calc.Hprincipal.value == 0) || (document.calc.HmoPmt.value == "" || document.calc.HmoPmt.value == 0) || (document.calc.HaNPer.value == "" || document.calc.HaNPer.value == 0) || (document.calc.intRate.value == "" || document.calc.intRate.value == 0)) {
      alert("Please compute the payment before creating the schedule.");
   } else {

      var Vprincipal = sn(document.calc.Hprincipal.value);

      var VintRate = sn(document.calc.intRate.value);

      var VnumPmts = sn(document.calc.HaNPer.value);

      var pmtAmt = sn(document.calc.HmoPmt.value);

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


         pmtString = (pmtMonth + "/" + pmtDay + "/" + pmtYear);

         pmtRow += "<tr><td align=right><font face='arial'><small>" + pmtNum + "</small></td>";
         pmtRow += "<td align=right><font face='arial'><small>" + pmtString + "</small></td>";
         pmtRow += "<td align=right><font face='arial'><small>" + fns(prinPort,2,1,1,1) + "</small></td>";
         pmtRow += "<td align=right><font face='arial'><small>" + fns(intPort,2,1,1,1) + "</small></td>";
         pmtRow += "<td align=right><font face='arial'><small>" + fns(displayPmtAmt,2,1,1,1) + "</small></td>";
         pmtRow += "<td align=right><font face='arial'><small>" + fns(prin,2,1,1,1) + "</small></td></tr>";

         if(pmtMonth == 12 || count == nPer) {

            pmtRow += "<tr bgcolor='#dddddd'><td align=right><font face='arial'><small>Total</small></td>";
            pmtRow += "<td align=left><font face='arial'><small>" + pmtYear + "</small></td>";
            pmtRow += "<td align=right><font face='arial'><small>" + fns(accumYearPrin,2,1,1,1) + "</small></td>";
            pmtRow += "<td align=right><font face='arial'><small>" + fns(accumYearInt,2,1,1,1) + "</small></td>";
            pmtRow += "<td align=right><font face='arial'><small> </small></td>";
            pmtRow += "<td align=right><font face='arial'><small> </small></td></tr>";

            accumYearPrin = 0;
            accumYearInt = 0;

         }

         if(count > 600) {

            alert("Using your current entries you will never pay off this loan.");

            break;

         } else {

            continue;

         }

      }

      var part1 = "<head><title>Amortization Schedule</title></head>";
      part1 += "<b";
      part1 += "od";
      part1 += "y><br /><br /><center>";
      part1 += "<font face='arial'><big><strong>Amortization Schedule</strong></big></center>";

      var part2 = "<center><table border=1 cellpadding=2 cellspacing=0>";
      part2 += "<tr><td colspan=6><font face='arial'><small><strong>Loan Date: " + loanDate + "<br />";
      part2 += "Principal: " + fns(Vprincipal,2,1,1,1) + "<br />";
      part2 += "# of Payments: " + nPer + "<br />";
      part2 += "Interest Rate: " + fns(VintRate,2,0,2,1) + "<br />";
      part2 += "Payment: " + fns(pmtAmt,2,1,1,1) + "</strong></small></td></tr>";
      part2 += "<tr><td colspan='6'><center><font face='arial'><strong>Schedule of Payments</strong>";
      part2 += "<br /><font face='arial'><small><small>";
      part2 += "Please allow for slight rounding differences.</small></small></center></td>";
      part2 += "</tr><tr bgcolor='silver'><td align='center'>";
      part2 += "<font face='arial'><small><strong>Pmt #</strong></small></td>";
      part2 += "<td align='center'><font face='arial'><small><strong>Date</strong></small></td>";
      part2 += "<td align='center'><font face='arial'><small><strong>Principal</strong></small></td>";
      part2 += "<td align='center'><font face='arial'><small><strong>Interest</strong></small></td>";
      part2 += "<td align='center'><font face='arial'><small><strong>Payment</strong></small></td>";
      part2 += "<td align='center'><font face='arial'><small><strong>Balance</strong></small></td></tr>";

      var part3 = ("" + pmtRow + "");

      var part4 = "<tr><td colspan='2'><font face='arial'>";
      part4 += "<small><strong>Grand Total</strong></small></td>";
      part4 += "<td align=right><font face='arial'><small><strong>" + fns(accumPrin,2,1,1,1) + "</strong></small></td>";
      part4 += "<td align=right><font face='arial'><small><strong>" + fns(accumInt,2,1,1,1) + "</strong></small></td>";
      part4 += "<td> </td><td> </td></tr></table><br /><center>";
      part4 += "<form method='post'>";
      part4 += "<input type='button' value='Close Window' onClick='window.close()'>";
      part4 += "</form></center></body></html>";

      var schedule = ("" + part1 + "" + part2 + "" + pmtRow + "" + part4 + "");

      reportWin = window.open("","","width=500,height=400,toolbar=yes,menubar=yes,scrollbars=yes");

      reportWin.document.write(schedule);

      reportWin.document.close();

   }

}
</script>


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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/qualification.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				<div class="main-heading"><h1>Home Loan Qualification Calculator</h1>
</div>
                    <ul id="breadcrumbs">

                        <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
                        <li><a href="https://www.mortgagecalculator.biz/c/budget-planner.php">Budget Planning</a></li>
                        <li>Mortgage Qualification</li>  
                  </ul>
                </div>
                <div class="bottom-section">
<p><img src="https://www.mortgagecalculator.biz/img/house-in-hands.jpg" alt="house" width="130" class="alignright" />        This calculator will help you to determine how much house you can afford and/or qualify for.        Complete or change the entry fields in the "Input" column of all three sections. The calculator will automatically recalculate anytime you press the Tab key after making a change to an input field.</p>
                <p>See also:</p>
                <ul class="arrow">
                        <li><a href="https://www.mortgagecalculator.biz/c/rent-or-buy.php">rent or buy calculator</a></li>
                        <li><a href="https://www.mortgagecalculator.biz/c/affordability.php">home affordability calculator</a></li>
 </ul>

<div class="table-block"> 
<form name="calc" method="post" action="#">

 <table>
 <tbody>

 <tr>
 <td align="center" colspan="2">
   <h3>Purchase Information</h3>
 </td>
 </tr>

 <tr>
 <td>
 
 Purchase price:
 
 </td>
 <td align="center">
 <input type="number" step="any" name="purchaseAmt" size="15" value="250000" onChange="computeForm(this.form)" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='250000'?'':this.value;" onblur="this.value = this.value==''?'250000':this.value;" />
 </td>
 </tr>

 <tr>
 <td>
 
 Down payment:
 
 </td>
 <td align="center">
 <select name="downPayMethod" size="1" onChange="computeForm(this.form)" width="50" style="width: 50px">
 <option value="0" selected>%</option>
 <option value="1">$</option>
 </select>
 <input type="number" step="any" name="downPayPercAmt" size="6" value="10" onChange="computeForm(this.form)" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='10'?'':this.value;" onblur="this.value = this.value==''?'10':this.value;"/>
 </td>
 </tr>

 <tr>
   <td>
     
     <a href="#viewrates"><strong>APR</strong></a>:
     
     </td>
   <td align="center">
     <input type="number" step="any" name="intRate" size="15" value="6" onChange="computeForm(this.form)" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='6'?'':this.value;" onblur="this.value = this.value==''?'6':this.value;"/>
     </td>
 </tr>

 <tr>
 <td>
 
 Loan term (years):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="noYears" size="15" value="30" onChange="computeForm(this.form)" />
 </td>
 </tr>

 <tr>
 <td align="center" colspan="2">
   <h3>Annual Payment Info</h3>
 </td>
 </tr>


 <tr>
 <td>
 
 Property taxes:
 
 </td>
 <td align="center">
 <select name="propTaxMethod" size="1" onChange="computeForm(this.form)" width="50" style="width: 50px">
 <option value="0">%</option>
 <option value="1" selected>$</option>
 </select>
 <input type="number" step="any" name="propTaxPercAmt" size="6" value="1020" onChange="computeForm(this.form)" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='1020'?'':this.value;" onblur="this.value = this.value==''?'1020':this.value;" />
 </td>
 </tr>

 <tr>
 <td>
 
 Insurance:
 
 </td>
 <td align="center">
 <select name="insMethod" size="1" onChange="computeForm(this.form)" width="50" style="width: 50px">
 <option value="0">%</option>
 <option value="1" selected>$</option>
 </select>
 <input type="number" step="any" name="insPercAmt" size="6" value="900" onChange="computeForm(this.form)" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='900'?'':this.value;" onblur="this.value = this.value==''?'900':this.value;" />
 </td>
 </tr>

 <tr>
 <td>
 
 PMI:
 
 </td>
 <td align="center">
 <select name="pmiMethod" size="1" onChange="computeForm(this.form)" width="50" style="width: 50px">
 <option value="0" selected>%</option>
 <option value="1">$</option>
 </select>
 <input type="number" step="any" name="pmiPercAmt" size="6" value=".5" onChange="computeForm(this.form)" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='.5'?'':this.value;" onblur="this.value = this.value==''?'.5':this.value;"/>
 </td>
 </tr>

 <tr>
 <td>
 
 Association fees:
 
 </td>
 <td align="center">
 <input name="assocAmt" type="number" step="any" onChange="computeForm(this.form)" value="0" size="15" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='0'?'':this.value;" onblur="this.value = this.value==''?'0':this.value;" />
 </td>
 </tr>

 <tr>
 <td align="center" colspan="2">
   <h3>Debt &amp; Income Info</h3>
 </td>
 </tr>

 <tr>
 <td>
 
 Gross income:
 <select name="payMethod" size="1" onChange="computeForm(this.form)" width="80" style="width: 80px"> />
 <option value="0" selected>Annually</option>
 <option value="1">Monthly</option>
 </select>
 
 </td>
 <td align="center">
 <input type="number" step="any" name="grossPay" size="15" value="80000" onChange="computeForm(this.form)" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='80000'?'':this.value;" onblur="this.value = this.value==''?'80000':this.value;" />
 </td>
 </tr>

 <tr>
 <td>
 
 Monthly debt payments:
 
 </td>
 <td align="center">
 <input name="moDebts" type="number" step="any" onChange="computeForm(this.form)" value="500" size="15" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='500'?'':this.value;" onblur="this.value = this.value==''?'500':this.value;" />
 </td>
 </tr>


 <tr>
 <td align="center">
 <input type="reset" class="table-btn"  value="Reset" />
 </td>
 <td align="center">
 <input type="button"  class="table-btn" value="Calculate" onClick="computeForm(this.form)" />
 </td>
 </tr>
 
  <tr>
 <td align="center" colspan="2">
   <h3>Your Results</h3>
 </td>
 </tr>


 <tr>
 <td>
 
 Down payment:
 
 </td>
 <td align="center">
 <input type="text" name="downPayAmt" size="15" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='25000'?'':this.value;" onblur="this.value = this.value==''?'25000':this.value;" class="text-bg" />
 </td>
 </tr>

 <tr>
 <td>
 
 Loan amount:
 
 </td>
 <td align="center">
 <input type="text" name="loanAmt" size="15" class="text-bg"/>
 </td>
 </tr>

 <tr>
 <td align="center" colspan="2">
   <h3>Monthly Payments</h3>
 </td>
 </tr>

 <tr>
 <td>
 
 Total monthly (PITI):
 
 </td>
 <td align="center">
 <input type="text" name="pmtPITI" size="15" class="text-bg"/>
 </td>
 </tr>


 <tr>
 <td>
 
 Principal & interest:
 
 </td>
 <td align="center">
 <input type="text" name="pmtPI" size="15" class="text-bg"/>
 </td>
 </tr>
 
  <tr>
 <td>
 
 Property taxes:
 
 </td>
 <td align="center">
 <input type="text" name="propTaxAmt" size="15" class="text-bg"/>
 </td>
 </tr>

 <tr>
 <td>
 
 Insurance:
 
 </td>
 <td align="center">
 <input type="text" name="insAmt" size="15" class="text-bg"/>
 </td>
 </tr>

 <tr>
 <td>
 
 PMI:
 
 </td>
 <td align="center">
 <input type="text" name="pmiAmt" size="15" class="text-bg"/>
 </td>
 </tr>

 <tr>
 <td>
 
 Association fee:
 
 </td>
 <td align="center">
 <input type="text" name="associationfeeAmt" size="15" class="text-bg"/>
 </td>
 </tr>

 <tr>
 <td>
 
 Tax deductable portion:
 
 </td>
 <td align="center">
 <input type="text" name="deductAmt" size="15" class="text-bg"/>
 </td>
 </tr>

 <tr>
 <td align="center" colspan="2">
 <h3>Do You Qualify?</h3>
 </td>
 </tr>

 
  <tr>
 <td>
 
 Qualify for loan?:
 
 </td>
 <td align="center">
 <input type="text" name="qualifyYN" class="text-bg" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Max qualifying loan amount:
 
 </td>
 <td align="center">
 <input type="text" name="qualifyMax" class="text-bg" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Income to payment ratio (ideally below 28%):
 
 </td>
 <td align="center">
 <input type="text" name="ratioIncome" class="text-bg" size="15" />
 </td>
 </tr>

 <tr>
 <td nowrap>
 
Debt to income ratio (ideally below 36%, can touch 50%):
 
 </td>
 <td align="center">
 <input type="text" name="ratioDebt" class="text-bg" size="15" />
 </td>
 </tr>

 <tr>
 <td align="center" colspan="2">
 <small>Longer term loans may take a few moments for amortization schedules to be generated.</small><br />
 <input type="button"  class="table-btn" value="Create Amortization Schedule" onClick="createReport(this.form)" />
 <input type="hidden" name="HmoPmt" value="0" />
 <input type="hidden" name="Hprincipal" value="0" />
 <input type="hidden" name="HaNPer" value="0" />
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


 
<h2>Home Mortgage Qualification Guidelines</h2>
<p> Qualifying for a mortgage is one of the biggest steps that a person   takes towards owning a home. There are various steps and questions to   consider when purchasing a home such as how much you can afford,   shopping for a loan, home buying programs and much more. This guide   includes all of the information that you'll need to shop, compare and   negotiate mortgages while also looking for homes that meet your   qualifications and budget. </p>
<p><img src="../img/dream-home.png" width="630" height="418" alt="Dream Home." /></p>
<h3>To Rent or Buy: That's the Question</h3>
  <p>
  Many individuals and families go through the same quandary, but what it   boils down to is the location. Renting often makes more sense within a   city, but it's also about the length of time you plan on staying in one   place. The local market also plays a large role in whether you should   rent or buy. </p>
<h4>Do Research on Your Target Area</h4>
  <p>
  When deciding whether to rent or buy, you should first look into the   details of the local market. There are certain parts of the country that   have better housing markets for buyers such as Toledo, Cleveland and   Detroit. You can also look at Zillow's Breakeven Horizon Index, which   also looks at the average cost of down payment, purchase price and   maintenance costs in different cities. This will give you a better   figure as to what it would cost to live in a certain local market. The   index will break it down for you in terms of years on a map of the   United States. For instance, it would take a short amount of time for   buying to become a better option if you wanted to live in   Orlando-Kissimee in Florida, where the break even index is at 1.7 years. </p>
<h4>Your Length of Stay</h4>
  <p>
  One factor really comes down to the length of time you want to live in   one area. If you think that you'll live in a location longer than five   years, it may be better to buy a home. However there are also housing   markets which have made it easier to purchase a home and pay it off in   less than three. In terms of investment, you have to decide if it's   worth the cost to purchase a house. </p>
<h4>Predicting Future Value and Rental Prices</h4>
  <p>
  This part requires more research into the housing market where you want   to live. If you expect the price of rent to go up drastically, it may be   a better time to buy a home, but only if your home will maintain or   increase in value. If you can find a cheap investment that is worth the   cost, then you may be able to increase its value if the housing market   is on the rise. </p>
<h4>Utility and Maintenance Costs</h4>
  <p>
  There are certain areas where it simply costs more to live based on   energy prices. Homes may also have additional maintenance costs such as   landscaping, homeowner's association fees, pool maintenance and much   more. When you rent, your landlord typically takes care of maintenance   costs, but you can still pay a lot in utility bills. On the other hand,   you can upgrade your home, remodel, paint, hang pictures and own as many   pets as you want to in your own home. </p>
<h4>Upfront Costs and Monthly Payments</h4>
  <p>
  Renting is much cheaper in terms of upfront costs. Usually you have to   pay a security deposit, first month's and last month's rent. With buying   a home, you have to come up with a sizable down payment to qualify for a   mortgage in most cases. There are other costs as well when purchasing a   home such as loan setup fees, property inspections, escrow or title   company fees, homeowner's insurance and other costs that may be tacked   on. You have to decide if it's worth the investment over time. </p>
<h3>Price-to-Rent and Debt-to-Income</h3>
  <p>
  These are two terms to remember when deciding whether a home is a good   purchase or not. Both price-to-rent and debt-to-income ratios concern   purchase price vs. income and rent vs. purchase price. Price-to-rent   evaluates mortgage principal and interest, property taxes, insurance,   closing costs, HOA dues if appropriate and mortgage insurance if   applicable. In addition, tax advantages, rent payments and renter's   insurance are also considered as the total cost of renting. </p>
<h4>Price-to-Rent</h4>
  <p>
  To use the price-to-rent ratio, you need to have the average list price   with the average yearly rent for homes in that area. Then you calculate   the price-to-rent ratio by dividing the average list price by the   average yearly rent price or as follows:</p>
  <ul class="arrow">
    <li> Average List Price / (Average Monthly Rent x 12) = Price-to-Rent Ratio;      or</li>
    <li>$160,000 / ($1,050 x 12) = 12.6</li>
  </ul>
<p>
  Any time you get a price-to-rent number that is less than 15, you should   buy. In the example above, this is a home that would be worth   purchasing. Any time it is over 15, it's better to rent. </p>
<h4>Debt-to-Income</h4>
  <p>
  The other ratio to remember is debt-to-income. This measures the total   housing cost plus other debt against your income to determine if you can   actually afford a home. All lenders use the debt-to-income ratio to   qualify you for a loan. It's also used by some rental managers to   understand if you can afford the monthly costs. To calculate this   number, you divide debt by income to get a percentage. While this   doesn't seem complex, it depends on how much debt and income that you   have. </p>
<p>
  Debt covers monthly housing and non-housing debt payments, which   includes mortgage payments, property taxes, homeowners insurance,   mortgage insurance, student loans, car loans, credit cards, child   support and other factors. While not all of these will be present on   your credit report, it's important to understand how to calculate this   percentage for your home buying purposes. Lenders are much more   restrictive in the percentages that they use to determine what interest   and principal you qualify for--if at all. </p>
<p>
  Using an example, you can understand how this ratio works for determining whether to buy a home. </p>
<p>
  A family wants to buy a small home in San Diego for $500,000 with a   sizable down payment of 25% ($125,000) to get a $375,000 loan. </p>
<h4>  Calculate Debt-to-Income Ratio</h4>
<ul class="arrow">
  <li>Total monthly housing costs: $2,415 ($1,736 mortgage, $100 insurance, $579 taxes)</li>
  <li>Total non-housing debt: $100 (credit card) </li>
  <li>Monthly income: $9,000 </li>
  <li>Debt-to-income ratio = ($2,415 + $100) / $9,000 = 27.9% </li>
</ul>
<p>
  This is an excellent position to be in for buying this home. The ratio is quite low that they can afford the home. </p>
<h4>Using Price-to-Rent and Debt-to-Income</h4>
  <p>
  You can simply look up the rent values for the area to determine whether   it's worth it to buy or rent a home. Using the above example of the San   Diego home, there are parts of San Diego where the rent is as low as   $1,000 a month for a single family home and as high as $15,000 per   month. </p>
<p>
  Another thing to consider is housing tax deductions. A home may be   cheaper after you calculate the annual mortgage interest and property   tax paid by an average tax bracket of 30 percent. You'll get the yearly   tax savings, which you can then divide by 12 and subtract from monthly   housing costs to see if it's lower than monthly rent. </p>
<p>
  Whenever a monthly housing cost to buy is lower than rent, you should   purchase a home as it will save you money, and homes can also increase   in value. However all of this is also dependent on the local housing   market. </p>
<h3>Understanding Local Market Conditions</h3>
  <p>
  When you listen to the news make a comment about housing markets being   up, that may have nothing to do with your local housing market.   Everything is local when it comes to real estate markets. National   numbers typically don't matter for your region. There are ways to better   understand a local housing market and decide if it's worth buying a   home. </p>
<p>
  Understanding a local housing market is more about looking at the way   property values increase or decrease. Areas with a lot of commercial   property nearby or smaller lot sizes are not going to be in the best   housing market. There should complete residential areas where commercial   properties don't exist. If you look at the property sizes, where do   homes with the largest lot sizes reside? Best of all, you have to talk   to local people if you are new to an area. They will be able to tell you   the better neighborhoods to pick. There are also some amazing free   tools online to help you look at local housing markets. </p>
<p>
  For example, Zillow has an automated home model that allows users to   evaluate the value of different properties in a local area. You can get   detailed market information including home valuation and recent sales.   You can separate values by town, community, neighborhood, subdivision or   zip code. </p>
<p>
  You can also use Trulia for its "hot market" or heat maps, which are a great source of graphic presentation of housing markets. </p>
<p>
  With Google maps, you can look at certain neighborhoods, find the larger   property sizes and choose residential areas that are in more pristine   areas. </p>
<p>
  Of course you can always hire a real estate agent to help you find the   better housing markets and offer the best view of the local area. </p>
<h3>Guide to Financial Preparation</h3>
  <p>
  With any home mortgage, you have to understand the costs to owning a   home. Preparing yourself financially means that you meet the criteria   above for a good debt-to-income percentage and you can make an upfront   down payment. There are some programs that will help provide a chunk of a   down payment, but it won't pay the full amount necessary. These are   some things to consider when preparing yourself to purchase a home. </p>
<h4>Saving for Down Payment</h4>
  <p>
  One of the key things that you have to do is save up for a sizable down   payment. The down payment typically has to be worth between 20 and 25   percent of the home price. If you don't have the best credit, the down   payment may have to be more. There are ways to get a lower down payment   or even pay nothing upfront, but these methods typically cost more in   the long run because they include piggyback loans and private mortgage   insurance that have higher interest rates. There are also closing costs   which add up to 6 percent of the total purchase price in some cases. You   also have to include property taxes, remodeling work, moving expenses   and decorating costs. To</p>
<h4>Check Credit Score and Report</h4>
  <p>
  Your credit history and FICA credit score will play a large role in   determining your down payment, interest rate and mortgage loan terms.   You should check your credit score a year a few months in advance to   looking for a home. Credit scores should be above 700 if you want to get   the better interest rates. You also should add up all of your debt on   your credit report. If you have a higher debt-to-income ratio, you won't   be a quality buyer for a lender. </p>
<h4>Reliable Source of Income</h4>
  <p>
  In addition to the above, you need to have a reliable source of provable   income to purchase a home. If you own your business, you may need to   prove its reliability. If you've only been at a job for six months, you   may need employment verification. Lenders really want to make sure that   you'll be able to pay the monthly housing costs and that you won't be   stuck with a monthly housing payment you can't afford because you lost   your job. </p>
<p>
  If you don't have a reliable source of income, it's essential that you   start looking for something that will make triple or quadruple the   amount of your monthly housing costs. For instance, if the typical   mortgage costs are $2,000 a month, then you have to be making between   $6,000 and $8,000 a month at minimum. </p>
<h4>Emergency Savings Fund</h4>
  <p>
  In addition to the down payment, you should have at least six months of   cash on hand to cover living expenses and monthly housing costs. This   means that you can cover your monthly mortgage, property taxes, debts,   food, transportation and insurance for 6 month. Using the above example,   you should have $18,000 to $23,000 in your emergency savings fund   before buying a home. </p>
<h4>Pay Off Your Debts</h4>
  <p>
  It's important to pay down your debt before getting into a home, and   typically you need to have paid off your debts at the minimum of six   months to a year before you start looking for a home. Lenders want to   see impeccable credit history, but they will accept credit scores and   credit histories that are less than perfect if you make payments on time   and your entire debt is low compared to your income. In addition,   paying down your debt or becoming current on your payments will lift   your credit score up over time. </p>
<h4>Budget Your Monthly Home and Maintenance Costs</h4>
  <p>
  If you decide to buy a home, you'll need to cover home and maintenance   costs in addition to living expenses. Your home may require some repairs   or remodeling before it's ready for move in. You may also want to   purchase new furniture or look into landscaping and pool maintenance   services. You should also check the typical utility costs for the area   and see how much other services will cost such as Internet, cable and   phone. When you have fully budgeted your monthly costs and it's still   well within your means, that means you're financially prepared and ready   to buy a home. </p>
<h3>Incentives for Buying</h3>
  <p>
  There are a lot of incentives for buying a home including asset   appreciation, tax incentives and equity. When you have a lot of   different reasons for purchasing a home, it may be the best time to get   into a new property, but you also have to consider your financial   situation. These are just a few incentives for buying a new home. </p>
<h4>Asset Appreciation</h4>
  <p>
  Over time, the value of your property may increase. You can also remodel   and upgrade your property so that it has a higher value over time. This   really depends on the housing market. If you purchase a home at an   affordable price is a rising housing market, you'll likely be able to   get a sizable return on your investment and even negotiate lower   interest rates in the future. </p>
<h4>Mortgage Interest Deductions</h4>
  <p>
  If your mortgage balance is less than the price of your home, you can   deduct mortgage interest on your tax return. The interest is the largest   part of a mortgage payment. In other cases, you can add homeowners   association fees and property taxes as part of your deductions. </p>
<h4>Property Tax Deductions</h4>
  <p>
  Real estate property taxes paid for a first home or vacation home are   also deductible on your income taxes. However there are some states with   limitations. For example, California's Prop 12 limits property tax   increases to 2 percent per year or a rate of inflation if it is less   than 2 percent. </p>
<h4>Capital Gain Exclusion</h4>
  <p>
  If you have lived in your house for two out of five years consecutively,   you can also exclude up to $250,000 for an individual or up to $500,000   if married per couple of profit for capital gains. </p>
<h4>Preferential Tax Treatment</h4>
  <p>
  If you receive get a higher return on investment when you sell your home   than the allowed exclusion, it will be considered a capital asset if   you owned the home for more than a year. </p>
<h4>Equity Incentives</h4>
  <p>
  Owning a home also allows you to build equity over time. You can fund   your home improvements or pay off other high interest debts like credit   cards, medical bills and student loans. </p>
<h3>Risks of Purchasing a Home</h3>
  <p>
  As the previous housing market crash showed, there are some risks as   well as rewards to owning a home. While homes can increase in value,   they can also plunge. After the crash in 2010, 11 million homeowners   were feeling the pain of owing more than their properties were worth   according to <em>Forbes</em>. However home prices have dropped   considerably in certain housing markets, and there are areas where it   makes sense to own rather than rent. When it comes to assessing a risk,   the price-to-rent and debt-to-income ratios play a huge role. </p>
<p>
  There are a variety of factors that show owning a home in this market   isn't as risky as it once was. There have been several housing market   recessions over the years, and it's still one of the more solid   investments that has the potential for a big return. However you have to   be able to not take on an excessive amount of debt in order to afford a   home. These are few of the risks that buyers face when getting into a   new home. </p>
<h4>Housing Market Stability</h4>
  <p>
  Housing markets are always rising and falling. When homeowners purchased   homes at the peak of the housing market only to find themselves at the   bottom a few years later, it seemed like a major kick in the teeth.   These homeowners took on an excessive amount of debt in order to   purchase their homes. When you place that kind of risk on an investment,   there are a lot of factors that can cause problems. </p>
<p>
  That's why it's important to always consider your debt, income and   financial preparation before buying a home. You should also do   considerable research on several housing markets even if some of the   housing markets aren't where you wanted to live in the first place. You   may find that there are equally rewarding areas to live with lower   purchase prices and stable housing markets that will provide a better   investment. </p>
<h4>Why House Inspections are Crucial</h4>
  <p>
  Risks for owning a home aren't just based on the housing market. You may   think a home looks great on the surface, but there could be a lot of   problems. When you get a home inspection, it should give you a better   idea of what's going on with the house. There could be internal   problems, leaks, structure instability or radon gas poisoning, which is   invisible and usually only appears on housing inspection reports. In   addition, home inspections are necessary for mortgage and insurance   purposes. </p>
<p>
  When you get the housing inspection, there are a few things to look out   for. If a home has radon gas, it will need proofing and protection,   which costs about $10,000 on average. In addition, if improvements were   made to the home, you must check if permits were pulled in order to make   these changes. Homeowners often go through several do-it-yourself   projects and don't pay the fees for permits in order to get their work   inspected. If electrical, piping or major reconstruction of the house   has been performed, you'll want to see those permits as well. </p>
<h4>"As Is" Properties</h4>
  <p>
  There's some confusion as to whether this is a good term for a low   purchase price home with a lot of rewards or if it spells trouble.   Oftentimes there will be homes being sold "as is," which means that   there could be a lot of repairs or clean out involved. It most likely   means that a homeowner won't be providing any upgrades, changes, repairs   or credits for any issues with the property. Mostly this means that the   seller could be a little difficult to work with, but if the purchase   price is low and the home inspection doesn't reveal major problems, you   may be able to take advantage of a lower purchase price for a higher   return. </p>
<h4>Unpaid Real Estate Taxes</h4>
  <p>
  There are a lot of properties out there that are being sold because the   local government wasn't able to collect property taxes from homeowners.   In this case, the home is auctioned off publicly. When a person wins the   auction, they become the new owner of the land and property deed, which   doesn't have any mortgages or liens. However the purchasing process   takes a much longer time when buying these homes. You also can't examine   the property before winning an auction. While you can sometimes walk   around the property and guess what it looks like on the inside, there   isn't a way of knowing how well it's been maintained. This means that   home improvement costs can exceed the actual value of the property, and   while you may win an auction, you might not be able to move in right   away. In some cases, it takes over a year. Title companies don't always   want to give title insurance until they know that all liens are cleared,   which takes up to 12 months. </p>
<h4>Investment Property Risks</h4>
  <p>
  If you are purchasing a home as an investment property that will become a   home for renters, you also have to consider how much the upkeep and   maintenance will cost. You may have to make considerable repairs after   tenants leave. There is a bigger chance that property will be damaged.   There may also be legal costs. If you don't get a tenant right away, you   could also have a loss of income. If a property is in a declining   property market, your rental price may also suffer.  Maintenance and   landlord duties may also become a considerable drain on your time and   resources. </p>
<h4>Wasting Your Time</h4>
  <p>
  The home buying process doesn't take a day or a week. It usually takes   months to find the right property that meets all of the criteria, passes   inspections and gets approved for a mortgage with the right lender.   When you don't have all of your finances in line, you may just be   wasting your time. In addition, if you choose to go with a real estate   agent that doesn't show you the right properties or doesn't fully   understand your financial situation, it could be even more of a   disaster. It's important to come up with a plan before purchase a home   so that you understand all of the risks and don't waste your time   looking for a home that you can't purchase. </p>
<h3>Ways to Overcome Risks</h3>
  <p>
  Whether you are purchasing a new home for yourself, a family or as an   investment property, it's important to consider the risks and warning   signs before getting into a home. Financial risks are just part of the   issue. There are also liabilities and a lack of mobility. If you want to   overcome these risks, you have to consider all the factors and come up   with an intelligent plan. When you've considered all of the risks and   come up with a solution, then you'll be able to more efficiently find   the best property. </p>
<h4>Home Buying Outline</h4>
  <p>
  You should create a list of different personal and financial risks for   buying a home. For each risk, you should come up with a viable solution.   For example if you have a great job but your local housing market isn't   the best, then it's a risk to buy in this housing market for you. It   may be possible to get transferred or look outside of your local housing   market for a more appropriate area. Your outline should cover personal   risks, financial risks and property valuation risks. Some solutions are   listed as follows: </p>
  <ul class="arrow">
    <li> <strong>Risk: High Amount of Debt</strong> - Look for properties with   lower purchase prices and assess if the risk is worth the reward. If the   housing market has been stable over the past 10 years, and the home is   located in a perfect area, it may be worth a higher amount of debt if   your budget can afford the expense. </li>
    <li><strong> Risk: House Inspection Failed</strong> - A house inspection is the   first step to overcoming the major risk of buying an overvalued   property. Evaluate the cost of upgrades and upkeep for the home. Are the   problems minor or major? For example, is there radon gas? Are the pipes   leaking? Are their structural problems? Perhaps the home needs a few   replacements, but if it has a good foundation and the seller is willing   to work with you, then the home may actually increase in value. </li>
    <li> <strong>Risk: Monthly Housing Expenses Increase</strong> - If the housing   market does dip or crash, you may end up paying more than the house is   worth. In addition, living costs may also go up in the area where you   purchased a home. There are also tax credits that can offset the monthly   payments for your home. The key here is to look at the housing market   and also assess the living area where the property is located. </li>
    <li><strong> Risk: Selling Your Home in the Future</strong> - You may decide that   you don't want to live in an area anymore or you get a job transfer, in   which case you'll need to sell your home. If that day comes, you may   find that it's a difficult process, and you also may lose money on your   investment. That's why people have to be sure that they are purchasing a   home at the right time. </li>
    <li><strong> Risk: Natural Disaster</strong> - Nothing is worse than losing a home   to a natural disaster. Home insurance covers most of the natural   disasters that can affect your home, so it's important to cover this   risk as soon as you purchase a new home. </li>
    <li><strong> Risk: Negative Tenant Behavior</strong> - If you purchase a property   as an investment, you may open the door to a whole new set of risks.   However you can hire a property management firm to handle the necessary   expenses and upkeep of the property. You can also vet your prospective   tenants very closely to determine their financial situation and prior   rental history. </li>
    <li><strong> Risk: Loss of Income</strong> - Job security goes hand in hand with   buying a home. If you know that you love your job, your job loves you   and you don't see any transfers or departments closing down in the near   future, then you're probably safe. However if you feel any kind of   inkling that you may not have a job in a year or two, it's best to hold   off in investing in a property until you know that you can afford it. </li>
    <li><strong> Risk: Financial Overextension</strong> - If you already have a ton of   debt, you may have to wait a few years and pay down your debts before   getting into a property. If you budget properly and still find that   you're not able to meet triple or quadruple the mortgage payment in a   month with debt and living cost payments, then it's likely not a good   time to buy. </li>
  </ul>
<p>
  If you plan for all the risks and are able to find solutions or mitigate   the risks with reasonable logic, then owning a home may still be in the   cards. In addition you should consider that there are home buying   programs to help home buyers. These can help you with down payments and   overall house payments. </p>
<h3>Government Home Buying Programs and Down Payments</h3>
  <p>
  There are all kinds of home buying programs and incentives that the   government offers. Most of these home buying programs are local to your   state. There are also local agencies that assist people who help buying a   home for the first time including help with a down payment. There are a   few resources to help you make sense of each program. </p>
<h4>Local Home Buying Programs</h4>
  <p>
  Every state has a variety of its own programs for home buyers. You can find a list of states at <a href="http://www.hud.gov/buying/localbuying.cfm">HUD.gov</a>.   This list details all programs for each state. There will be several   programs in state and local governments to help you, but there are also   organizations. </p>
<h4>Federal Housing Administration (FHA) Mortgage Loans</h4>
 <p>
  These are mortgages overseen by the US Department of Housing and Urban   Development. They are government-insured loans that have very low down   payments, which can often be borrowed. These loans come with lower   interest rates, and the qualification process isn't as difficult as with   a bank or private lender because credit isn't a major factor. HUD homes   can also be assumed or taken over. However, a cap has been placed on   how much can be borrowed. Appraisal guidelines are also more strict. For   example the house has to be worth the selling price. FHA mortgages are   also not limited to first time borrowers. </p>
 <h4>
  Related Question: What are "HUD homes, and are they worth the trouble? </h4>
<p>HUD stands for the US Department of Housing and Urban Development. There   are a number of HUD homes on the HUD Home Store, which are REO or real   estate owned properties. these are typically smaller, single family   homes that were acquired through foreclosure on FHA mortgages.   Registered real estate brokers and other organizations are able to bid   on properties on behalf of clients who want to buy a HUD property.   however anyone can buy a HUD home if they have cash or qualify for a   loan. However you can't purchase a HUD home to become an investment   property. There are risks to purchasing these properties, so it's   essential that you get a house inspection. </p>
<h4>US Department of Veterans Affairs Home Loan Guaranty Service</h4>
  <p>
  VA mortgages are guaranteed loans by the government that are only   available to veterans, active duty service men and women or those who   are in the reserve. Widows and widowers also qualify for guaranteed home   loans. VA loans also have guidelines that allow people to qualify for   loans when they otherwise would not with a private lender. In some   cases, you don't even have to make a down payment with a VA loan. While   there are some limits on the amount of the loan, you typically find that   VA-guaranteed home loans are large enough to purchase competitively   priced homes all over the country. The guaranty in this situation is   that the VA will protect the lender in case there is a loss if the   veteran or owner fails to pay off the loan. </p>
<h4>US Department of Agriculture Rural Development Housing and Community Facilities Program</h4>
  <p>
  If you have a very low income in a rural area, you may qualify for this   type of loan. If you are a farmer or you have lived in a rural area for   some time, you can ask mortgage lenders if you quality. The Rural   Housing Service (RHS) offers a variety of homeownership opportunities to   those who live in rural parts of the country. There are also programs   for home renovations and repair if you qualify for this loan. Direct   loan and grant income have limits that can be found in your state. </p>
<h4>Reverse Mortgages or Home Equity Conversion Mortgages</h4>
  <p>
  These were designed for older borrowers who have substantial equity in   their homes. They can increase the monthly income if retired or elderly.   You can use the equity in your home without selling or moving. The   owner receives a payment each month that slowly reduces the equity. If   you decide to move or sell, then you have to repay the loan. You also   have to pay the loan if you die. </p>
<h4>American Dream Downpayment Assistance Initiative</h4>
  <p>
  This program offers $200 million annually around the country for   downpayment assistance. To be eligible for ADDI, you have to be a   first-time buyer that wants a single family home. You must be an   individual and a spouse who have never owned a home during the   three-year period prior to the purchase of a home with ADDI. You can   purchase 1 to 4 unit family homes, which can be single family houses,   condominiums or town homes. All states are eligible to receive this   financial help. </p>
<h4>Zero Downpayment Act</h4>
  <p>
  Zero Downpayment Act makes it so that you don't have to pay a down   payment if you are an individual or family who bought a home with   FHA-insured mortgages. This program offers more opportunities to first   time home buyers who do not have enough savings for a sizable down   payment. This is a different program than American Dream Downpayment   Act, which gives you money to afford a home's down payment. FHA will   charge a higher insurance premium to lenders with zero down loans. </p>
<h4>Energy Efficient Mortgage Program</h4>
  <p>
  FHA's Energy Efficient Mortgage program allows homeowners to save money   on their utility bills by offering assistance to add energy efficiency   features to new or older homes as part of an FHA-insured home. EEM   programs provide mortgage insurance for a person to purchase or   refinance a home and include the price of energy efficient improvements.   The funding comes from a lender such as a bank, company or savings and   loan business, but the mortgage is still insured by HUD. </p>
<h4>Teacher Next Door Program</h4>
  <p>
  HUD created this assistance for teachers to buy homes in low to moderate   income areas. The program is specifically for teachers who work full   time in public schools private schools, but they can also work in   federal, state, county or city educational agencies. The teacher has be   certified by the state and teach in a classroom, or you can be an   administrator in grades K thru 12. You also have to be in good standing   with your employer in order to qualify, which means that the employer   must certify that you work full time as a teacher or administrator. With   this program, you don't have to be a first-time home buyer, but you   can't own any other home at the time you close on your new property. You   also have to live in the new HUD property for three years. </p>
<h4>Finding Local Government Programs</h4>
  <p>
  There are special programs administered by state and local housing   finance administrations. You can call the local government housing   office or go to HUD.gov and search for programs in your state. Every   community has a variety of assistance for first-time home buyers and   down payment assistance. </p>
<h4>Non-Profit Programs for Housing</h4>
  <p>
  There are a number of non-profit organizations that work with HUD in order to help people afford a new home. You can use the <a href="https://entp.hud.gov/idapp/html/f17npdata.cfm">non-profit search</a> on HUD.gov in order to find a list of organizations in your area that   can help. Most of these organizations are listed by state. They provide   financial assistance, guidance and even real estate agent services. </p>
<h4>Habitat for Humanity Programs</h4>
  <p>
  The non-profit organization Habitat for Humanity is well known for being   a nondenominational Christian housing organization that places low   income people in quality homes. There are usually three similarities to   properties allowed for Habitat for Humanities. </p>
<ul class="arrow"><li>Houses are sold at a no profit with no interest charged on the mortgage.</li>
<li>Home buyers and volunteers build the house while under professional supervision.</li>
<li>Corporations, small businesses, individuals and faith groups come together to provide support. </li></ul>
<p>
  Home buyers are typically chosen by their need and ability to repay the   no-profit, no-interest mortgage. They may also have to volunteer or work   with Habitat for Humanity. The average cost for these homes is $50,000   to $70,000. Mortgage lengths also may be as little as 7 years but go up   to 30 years. </p>
<h3>Make an Offer</h3>
  <p>
  Once you have considered all of the possible risks, evaluated your   income, planned a budget and looked at the housing market where you want   to live, you should have a good idea whether you can make an offer or   not. You need the capacity to make current and future payments, which   comes down to health, income and job security. You also need capital to   afford a down payment, initial moving costs and savings. If you have a   lot of debts, you may want to pay these down before trying to purchase a   home. </p>
<p>
  Before you make an offer, you can go to a lender and talk about   pre-approval to see what amount you are working with. To get a   pre-approval, you'll need to know what's in your credit report and prove   that you can make a sizable down payment, or you need to be approved   for a HUD loan. Once you are ready to make an offer, you'll sign a   purchase agreement, and the lender will have the home appraised for its   market value. A commitment letter will detail the terms of your home   approval if the home is inspected and appraised as valuable by your   lender.</p>
<p>
  Owning a home is a great responsible. Once you understand all of the   risks and adequately prepare, you're at a better advantage over other   buyers who are going in blind. Mortgage loans are great resources for   people who want to get into a home in a rising housing market. Before   you purchase, consider all of the risks and outline a plan that looks at   your finances, government programs, possible rewards and income   requirements. </p>
 
 
 
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

