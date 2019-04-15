<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Canadian Mortgage Qualification Calculator</title>		
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
   document.calc.downPayAmt.value = fns(VdownPayAmt,0,1,1,1);

   //B
   //CALCULATE LOAN AMOUNT
   var VloanAmt = 0;

   //RESULT OF DOWNPAYAMT / PURCHASEAMT
   var downPayFactor1 = VdownPayAmt / VpurchaseAmt;

   //RESULT OF PURCHASE PRICE MINUS DOWNPAYAMT
   var purchLessDown = Number(VpurchaseAmt) - Number(VdownPayAmt)

   //IF DOWNPAYMENT SELECTION IS DOLLAR AMOUNT
   if(downPayFactor1 >= .25) {
      VloanAmt = purchLessDown;
   } else
   if(downPayFactor1 < .25 && downPayFactor1 >= .20) {
      VloanAmt = purchLessDown * 1.0125;
   } else
   if(downPayFactor1 < .20 && downPayFactor1 >= .15) {
      VloanAmt = purchLessDown * 1.0200;
   } else
   if(downPayFactor1 < .15 && downPayFactor1 >= .10) {
      VloanAmt = purchLessDown * 1.0250;
   } else
   if(downPayFactor1 < .10 && downPayFactor1 >= .05) {
      VloanAmt = purchLessDown * 1.0375;
   } else
   if(downPayFactor1 < .05) {
      VloanAmt = 0;
   }

   if(VloanAmt < 0 ) {
      VloanAmt = 0;
   }

   document.calc.loanAmt.value = fns(VloanAmt,0,1,1,1);

   //GET DESIRED LOAN AMT
   VdesLoanAmt = sn(document.calc.desLoanAmt.value);
   if(VdesLoanAmt == "" || VdesLoanAmt == 0) {
      VloanAmt == fns(VloanAmt,0,1,1,1);
      document.calc.desLoanAmt.value = fns(VloanAmt,0,1,1,1);
   } else {
      VloanAmt = VdesLoanAmt;
   }


   //ADD LOAN AMOUNT TO HIDDEN AMORT FIELD
   document.calc.Hprincipal.value = VloanAmt;

   //COMPUTE MIF
   var annInt = sn(document.calc.intRate.value);
   if(annInt < 1) {
      annInt = annInt * 100;
   } else {
      annInt = annInt;
   }
   var MIFfactor1 = 2 * 100;
   var MIFfactor2 = annInt / MIFfactor1;
   var MIFfactor3 = Number(MIFfactor2) + Number(1);
   var MIFfactor4 = Math.pow(MIFfactor3,2);
   var MIFfactor5 = 1 /12;
   var MIFfactor6 = Math.pow(MIFfactor4,MIFfactor5);
   var MIFfactor7 = Number(MIFfactor6) - Number(1);
   var MIF = MIFfactor7;
   document.calc.HMIF.value = MIF;

   //COMPUTE NEW PIP
   var prin = VloanAmt;
   var noYrs = sn(document.calc.noYears.value);
   var PIPfactor1 = Number(MIF) + Number(1);
   var PIPfactor2 = Number(noYrs) - Number(noYrs * 2);
   var PIPfactor3 = PIPfactor2 * 12;
   var PIPfactor4 = Math.pow(PIPfactor1,PIPfactor3);
   var PIPfactor5 = Number(1) - Number(PIPfactor4);
   var PIPfactor6 = prin * MIF;
   var PIPfactor7 = PIPfactor6 / PIPfactor5;
   var PIP = PIPfactor7;

   //GET YEARS AND CONVERT TO MONTHS
   var VnoYears = noYrs;
   var VnoMonths = VnoYears * 12;

   //ADD NPER TO HIDDEN AMORT FIELD
   document.calc.HaNPer.value = VnoMonths;

   //COMPUTE PRINCIPAL AND INTEREST MONTHLY PAYMENT AMOUNT
   var VpmtPI = PIP;

   //document.calc.pmtPI.value = VloanAmt;
   document.calc.pmtPI.value = fns(VpmtPI,0,1,1,1);

   //ADD PAYMENT TO HIDDEN AMORT FIELD
   document.calc.HmoPmt.value = VpmtPI;

   //GET GROSS PAY AND CONVERT TO MONTHLY
   var VgrossPay = sn(document.calc.grossPay.value);
   if(document.calc.payMethod.selectedIndex == 0) {
      var VmoPay = VgrossPay / 12;
   } else {
      var VmoPay = VgrossPay;
   }


   //COMPUTE MONTHLY PROPERTY TAX PAYMENT
   var VpropTaxPercAmt = sn(document.calc.propTaxPercAmt.value);
   var VpropTaxAmt = 0;
   var VpropTaxMethod = document.calc.propTaxMethod.selectedIndex;
   if(VpropTaxMethod == 0) {
      VpropTaxPercAmt /= 100;
      VpropTaxAmt = VpropTaxPercAmt * VloanAmt;
   } else {
      VpropTaxAmt = VpropTaxPercAmt;
   }

   if(VpropTaxAmt / 12 < 1) {
      VpropTaxAmt = 0;
   } else {
      VpropTaxAmt = VpropTaxAmt / 12;
   }

   document.calc.propTaxAmt.value = fns(VpropTaxAmt,0,1,1,1);

   //COMPUTE MONTHLY HEATING PAYMENT
   var VhtgPercAmt = sn(document.calc.htgPercAmt.value);
   var VhtgAmt = 0;
   var VhtgMethod = document.calc.htgMethod.selectedIndex;
   if(VhtgMethod == 0) {
      VhtgPercAmt /= 100;
      VhtgAmt = VhtgPercAmt * VloanAmt;
   } else {
      VhtgAmt = VhtgPercAmt;
   }

   if(VhtgAmt / 12 < 1) {
      VhtgAmt = 0;
   } else {
      VhtgAmt = VhtgAmt / 12;
   }

   document.calc.htgAmt.value = fns(VhtgAmt,0,1,1,1);

   //GET MONTHLY CONDO FEE
   var VcondoFee = sn(document.calc.condoFee.value);
   if(VcondoFee == "" || VcondoFee == 0) {
      VcondoFee = 0;
      document.calc.condoFee.value = 0;
   }

   //GET MONTHLY DEBTS
   var VmoDebts = sn(document.calc.moDebts.value);
   if(VmoDebts == "" || VmoDebts == 0) {
      VmoDebts = 0;
      document.calc.moDebts.value = 0;
   }

   //F: COMPUTE MONTHLY PITH (PRIN, INT, TAX, HTG)
   var VpmtPITH = Number(VpmtPI) + Number(VpropTaxAmt) + Number(VhtgAmt) + Number(VcondoFee);

   //CALCULATE PITH TO MONTHLY INCOME RATIO (32% max)
   var VratioIncome = VpmtPITH / VmoPay;
   var intIncome = VratioIncome * 100;

   document.calc.ratioIncome.value = fns(intIncome,3,0,2,1) + "";

   //CALCULATE PITH + DEBT TO MONTHLY INCOME RATIO (40% max)
   var VratioDebt = (Number(VpmtPITH) + Number(VmoDebts)) / VmoPay ;
   var intDebt = VratioDebt * 100;

   document.calc.ratioDebt.value = fns(intDebt,3,0,2,1) + "";

   //DETERMINE IF QUALIFY
   if(VratioIncome <= .3205 && VratioDebt <= .4005) {
      document.calc.qualifyYN.value = "Yes";
   } else {
      document.calc.qualifyYN.value = "No";
   }

   //CALCULATE MAXIMUM LOAN AMOUNT
   var VmaxPmtIncome = Number(VmoPay * .32);
   var VmaxPmtDebt = Number(VmoPay * .40) - Number(VmoDebts);

   if(VmaxPmtIncome > VmaxPmtDebt) {
      var maxPmt = Number(VmaxPmtDebt) - (Number(VpropTaxAmt) + Number(VhtgAmt));
   
      //COMPUTE MAXIMUM LOAN AMOUNT GIVEN MAX PMT
      var PRINpmt = maxPmt;
      var PRINnoYrs = sn(document.calc.noYears.value);
      var PRINfactor1 = Number(MIF) + Number(1);
      var PRINfactor2 = Number(PRINnoYrs) - Number(noYrs * 2);
      var PRINfactor3 = PRINfactor2 * 12;
      var PRINfactor4 = Math.pow(PRINfactor1,PRINfactor3);
      var PRINfactor5 = Number(1) - Number(PRINfactor4);
      var PRINfactor6 = PRINpmt * PRINfactor5;
      var PRINfactor7 = PRINfactor6 / MIF;
      var PRIN = PRINfactor7;

      var VmaxLoanAmt = PRIN;
      if(VmaxLoanAmt < 0) {
         document.calc.qualifyMax.value =  "$0";
      } else {
         document.calc.qualifyMax.value = fns(VmaxLoanAmt,0,1,1,1);
      }
   } else {
      var maxPmt = Number(VmaxPmtIncome) - Number(Number(VpropTaxAmt) + Number(VhtgAmt));
   
      //COMPUTE MAXIMUM LOAN AMOUNT GIVEN MAX PMT
      var PRINpmt = maxPmt;
      var PRINnoYrs = sn(document.calc.noYears.value);
      var PRINfactor1 = Number(MIF) + Number(1);
      var PRINfactor2 = Number(PRINnoYrs) - Number(noYrs * 2);
      var PRINfactor3 = PRINfactor2 * 12;
      var PRINfactor4 = Math.pow(PRINfactor1,PRINfactor3);
      var PRINfactor5 = Number(1) - Number(PRINfactor4);
      var PRINfactor6 = PRINpmt * PRINfactor5;
      var PRINfactor7 = PRINfactor6 / MIF;
      var PRIN = PRINfactor7;

      var VmaxLoanAmt = PRIN;
      if(VmaxLoanAmt < 0) {
         document.calc.qualifyMax.value =  "$0";
      } else {
         document.calc.qualifyMax.value = fns(VmaxLoanAmt,0,1,1,1);
      }
   }

   //document.calc.pmtPITH.value = parseInt(VpmtPITH);

} //End of function



function createReport(form) {

   //GRAB VARIABLES

   if((document.calc.Hprincipal.value == "" || document.calc.Hprincipal.value == 0) || (document.calc.HmoPmt.value == "" || document.calc.HmoPmt.value == 0) || (document.calc.HaNPer.value == "" || document.calc.HaNPer.value == 0) || (document.calc.intRate.value == "" || document.calc.intRate.value == 0) || (document.calc.HMIF.value == "" || document.calc.HMIF.value == 0)) {
      alert("Please compute the payment before creating the schedule.");
   } else {

      //CALCULATE AMORT
      var aPrin = document.calc.Hprincipal.value;

      var aIntRate = document.calc.HMIF.value;

      var aNPer = document.calc.HaNPer.value;

      var aPmt = document.calc.HmoPmt.value;

      var aIntPort = 0;
      var aAccumInt = 0;
      var aPrinPort = 0;
      var aAccumPrin = 0;
      var aCount = 0;
      var aPmtRow = "";
      var aPmtNum = 0;

      var today = new Date();
      var dayFactor = today.getTime();
      var pmtDay = today.getDate();
      var loanMM = today.getMonth() + 1;
      var loanYY = today.getFullYear();

      var Vmonth = loanMM;

      var Vday = pmtDay;
      if(Vday > 28) {
         Vday = 28;
      }
      var Vyear = loanYY;
      if(Vyear < 1900) {
         Vyear = Number(Vyear) + Number(1900);
      }

      var loanDate = (Vmonth + "/" + Vday + "/" + Vyear);
      //var monthMS = 86400000 * 30.4375;
      //var pmtDate = 0;

      //ADDED 5/29/02
      var displayPmtAmt = 0;
      var accumYearPrin = 0;
      var accumYearInt = 0;

      while(aCount < aNPer) {
         if(aCount < (Number(aNPer) - Number(1))) {

            aIntPort = aPrin * aIntRate;
            aIntPort *= 100;
            aIntPort = Math.round(aIntPort);
            aIntPort /= 100;

            aAccumInt = Number(aAccumInt) + Number(aIntPort);
            accumYearInt = Number(accumYearInt) + Number(aIntPort);

            aPrinPort = Number(aPmt) - Number(aIntPort);
            aPrinPort *= 100;
            aPrinPort = Math.round(aPrinPort);
            aPrinPort /= 100;

            aAccumPrin = Number(aAccumPrin) + Number(aPrinPort);
            accumYearPrin = Number(accumYearPrin) + Number(aPrinPort);

            aPrin = Number(aPrin) - Number(aPrinPort);

            displayPmtAmt = Number(aPrinPort) + Number(aIntPort);

         } else {
            aIntPort = aPrin * aIntRate;
            aIntPort *= 100;
            aIntPort = Math.round(aIntPort);
            aIntPort /= 100;

            aAccumInt = Number(aAccumInt) + Number(aIntPort);
            accumYearInt = Number(accumYearInt) + Number(aIntPort);

            aPrinPort = aPrin;

            aAccumPrin = Number(aAccumPrin) + Number(aPrinPort);
            accumYearPrin = Number(accumYearPrin) + Number(aPrinPort);

            aPrin = 0;

            displayPmtAmt = Number(aPrinPort) + Number(aIntPort);
         }


         aCount = Number(aCount) + Number(1);
         aPmtNum = Number(aPmtNum) + Number(1);
         Vmonth = Vmonth + 1;
         if(Vmonth == 13) {
            Vmonth = 1;
            Vyear = Vyear + 1;
         } else {
            Vmonth = Vmonth;
            Vyear = Vyear;
         }
         pmtString = (Vmonth + "/" + Vday + "/" + Vyear);
         aPmtRow += "<tr><td align='right'><font face='arial'><small>" + aPmtNum + "</small></font></td>";
         aPmtRow += "<td align='right'><font face='arial'><small>" + pmtString + "</small></font></td>";
         aPmtRow += "<td align='right'><font face='arial'><small>" + fns(aPrinPort,2,1,1,1) + "</small></font></td>";
         aPmtRow += "<td align='right'><font face='arial'><small>" + fns(aIntPort,2,1,1,1) + "</small></font></td>";
         aPmtRow += "<td align='right'><font face='arial'><small>" + fns(displayPmtAmt,2,1,1,1) + "</small></font></td>";
         aPmtRow += "<td align='right'><font face='arial'><small>" + fns(aPrin,2,1,1,1) + "</small></font></td>";
         aPmtRow += "</tr>";
         aPmtRow += "";
         aPmtRow += "";
         aPmtRow += "";


         if(Vmonth == 12 || aCount == aNPer) {

            aPmtRow += "<tr bgcolor='#dddddd'><td align='right'><font face='arial'><small>Total</small></font></td>";
            aPmtRow += "<td align='right'><font face='arial'><small>" +Vyear + "</small></font></td>";
            aPmtRow += "<td align='right'><font face='arial'><small>" + fns(accumYearPrin,2,1,1,1) + "</small></font></td>";
            aPmtRow += "<td align='right'><font face='arial'><small>" + fns(accumYearInt,2,1,1,1) + "</small></font></td>";
            aPmtRow += "<td align='right'><font color='#dddddd'>-</font></td>";
            aPmtRow += "<td align='right'><font color='#dddddd'>-</font></font></td></tr>";

            accumYearPrin = 0;
            accumYearInt = 0;

         }

         if(aCount > 600) {
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
      part1 += "<font face='arial'><big><strong>Loan Amortization Schedule</strong></big></font></center>";
      part1 += "";


      var part2 = "<center><table border=1 cellpadding=4 cellspacing=0><tr>";
      part2 += "<td colspan='6'><font face='arial'><small><strong>Loan Date: " + loanDate + "<br />";
      part2 += "Principal: " + fns(document.calc.Hprincipal.value,2,1,1,1) + "<br />";
      part2 += "# of Payments: " + aNPer + "<br />";
      part2 += "Interest Rate: " + fns(document.calc.intRate.value,3,0,2,1) + "<br />";
      part2 += "Payment: " + fns(document.calc.HmoPmt.value,2,1,1,1) + "</strong></small></font></td></tr>";
      part2 += "<tr><td colspan='6'><center><font face='arial'>";
      part2 += "Schedule of Payments</font><br />";
      part2 += "<font face='arial'><small><small>Please allow for slight rounding differences.</small></small></font>";
      part2 += "</center></td></tr><tr>";
      part2 += "<td><font face='arial'><small><strong>Pmt #</strong></small></font></td>";
      part2 += "<td><font face='arial'><small><strong>Date</strong></small></font></td>";
      part2 += "<td><font face='arial'><small><strong>Principal</strong></small></font></td>";
      part2 += "<td><font face='arial'><small><strong>Interest</strong></small></font></td>";
      part2 += "<td><font face='arial'><small><strong>Payment</strong></small></font></td>";
      part2 += "<td><font face='arial'><small><strong>Balance</strong></small></font></td></tr>";
      part2 += "";
      part2 += "";

      var part4 = "<tr><td colspan='2'><font face='arial'>";
      part4 += "<small><strong>Grand Total</strong></small></font></td>";
      part4 += "<td align='right'><font face='arial'><small><strong>" + fns(aAccumPrin,2,1,1,1) + "</strong></small></font></td>";
      part4 += "<td><font face='arial'><small><strong>" + fns(aAccumInt,2,1,1,1) + "</strong></small></font></td>";
      part4 += "<td><font color='#FFFFFF'>-</font></td><td><font color='#FFFFFF'>-</font></td>";
      part4 += "</tr></table><br /><center><form method='post'>";
      part4 += "<input type='button' value='Close Window' onClick='window.close()'>";
      part4 += "</form></center></body></html>";

      var schedule = (part1 + "" + part2 + "" + aPmtRow + "" + part4 + "");

      reportWin = window.open("","","width=500,height=300,toolbar=yes,menubar=yes,scrollbars=yes");
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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/canadian.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				<div class="main-heading"><h1> Canada Mortgage Calculator </h1>
</div>
                    <ul id="breadcrumbs">

                        <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
                        <li>Canada Mortgages</li>
                    </ul>
                </div>   			
                <div class="bottom-section">
<p>This calculator will help you to determine how much house you can afford and/or qualify for.
<p>
Complete or change the entry fields in the "Input" column of all three sections. The calculator will automatically recalculate anytime you press the Tab key after making a change to an input field.</p>


<h3>Usage Tips &amp; Advice</h3>
<ul class="arrow">
<li>This is a simplified mortgage calculator and should be used for general information purposes only.</li>
<li>If your Downpayment is less than 25% the loan will have to be insured. Insurance premiums are charged at loan initiaion and can vary depending upon the Insurer used and the amount of your Downpayment. Your Downpayment cannot be less than 5% fo the Purchase Price.</li>
<li>You should allow for closing costs approximately 1.5% of the Pruchase Price over and above the amount of your Downpayment.</li>
<li>The term of your loan will normally not equal your desired Amortization Period and as a result your Interest Rate will likely change during the Amortization Period. This will impact the amount of your Principal and Interest payment over the life of the loan.</li>
</ul>
          
            
<div class="table-block">                 
<form name="calc" method="post" action="#">

<table>
<tbody>
<tr>
<td align="center">
  <strong>Purchase Information </strong></td>
<td align="center">
  <strong>Inputs </strong></td>
<td align="center">
  <strong>Outputs </strong></td>
</tr>

<tr>
<td>
Purchase price / property value:
</td>
<td align="center">
<input type="number" step="any" name="purchaseAmt" size="15" value="400000" onChange="computeForm(this.form)" onclick="this.value=''"/>
</td>
<td bgcolor="#cccccc"> </td>
</tr>

<tr>
<td>
Down payment / equity:
</td>
<td align="center">
<select name="downPayMethod" size="1" onChange="computeForm(this.form)"  width="120" style="width: 120px">
<option value="0" selected>%</option>
<option value="1">$</option>
</select>
<input type="text" name="downPayPercAmt" size="6" value="10" onChange="computeForm(this.form)" onclick="this.value=''"/>
</td>
<td align="center">
<input type="text" name="downPayAmt" size="15" />
</td>
</tr>

<tr>
<td>

Loan amount:

</td>
<td bgcolor="#cccccc"> </td>
<td align="center">
<input type="text" name="loanAmt" size="15" />
</td>
</tr>

<tr>
<td align="center">
  <strong>Loan Information </strong></td>
<td align="center">
  <strong>Inputs </strong></td>
<td align="center">
  <strong>Outputs (Monthly) </strong></td>
</tr>

<tr>
<td>
Desired loan amount:
</td>
<td align="center">
<input type="number" step="any" name="desLoanAmt" size="15" value="" onChange="computeForm(this.form)" />
</td>
<td bgcolor="#cccccc"> </td>
</tr>

<tr>
<td>
Annual interest rate:
</td>
<td align="center">
<input type="number" step="any" name="intRate" size="15" value="8" onChange="computeForm(this.form)" onclick="this.value=''"/>
</td>
<td bgcolor="#cccccc"> </td>
</tr>

<tr>
<td>

Amortization period in years:

</td>
<td align="center">
<input type="number" step="any" name="noYears" size="15" value="30" onChange="computeForm(this.form)" onclick="this.value=''"/>
</td>
<td bgcolor="#cccccc"> </td>
</tr>

<tr>
<td>

Monthly principal & interest payment:

</td>
<td bgcolor="#cccccc"> </td>
<td align="center">
<input type="text" name="pmtPI" size="15" />
</td>
</tr>

<tr>
<td align="center">
  <strong>Income, Property, and Debt Information</strong></td>
<td align="center">
  <strong>Inputs </strong></td>
<td align="center">
  <strong>Outputs (Monthly) </strong></td>
</tr>

<tr>
<td>

Gross income:
<select name="payMethod" size="1" onChange="computeForm(this.form)"  width="120" style="width: 120px">
<option value="0" selected>Annually</option>
<option value="1">Monthly</option>
</select>

</td>
<td align="center">
<input type="number" step="any" name="grossPay" size="15" value="70000" onChange="computeForm(this.form)" onclick="this.value=''"/>
</td>
<td bgcolor="#cccccc"> </td>
</tr>

<tr>
<td>

Annual property taxes:

</td>
<td align="center">
<select name="propTaxMethod" size="1" onChange="computeForm(this.form)"  width="120" style="width: 120px">
<option value="0">%</option>
<option value="1" selected>$</option>
</select>
<input type="number" step="any" name="propTaxPercAmt" size="6" value="2000" onChange="computeForm(this.form)" onclick="this.value=''"/>
</td>
<td align="center">
<input type="text" name="propTaxAmt" size="15" />
</td>
</tr>

<tr>
<td>

Annual heating:

</td>
<td align="center">
<select name="htgMethod" size="1" onChange="computeForm(this.form)"  width="120" style="width: 120px">
<option value="0">%</option>
<option value="1" selected>$</option>
</select>
<input type="number" step="any" name="htgPercAmt" size="6" value="1200" onChange="computeForm(this.form)" onclick="this.value=''"/>
</td>
<td align="center">
<input type="text" name="htgAmt" size="15" />
</td>
</tr>

<tr>
<td>

Monthly condominium fees:

</td>
<td align="center">
<input type="number" step="any" name="condoFee" size="15" />
</td>
<td bgcolor="#cccccc"> </td>
</tr>

<tr>
<td>

Other monthly debt payments:

</td>
<td align="center">
<input type="number" step="any" name="moDebts" size="15"/>
</td>
<td bgcolor="#cccccc"> </td>
</tr>

<tr>
<td align="center">
  <strong>Qualifying Information </strong></td>
<td align="center">
  <strong>Inputs</strong></td>
<td align="center">
  <strong>Outputs </strong></td>
</tr>

<tr>
<td>

Qualify for loan?:

</td>
<td bgcolor="#cccccc"> </td>
<td align="center">
<input type="text" name="qualifyYN" size="15" />
</td>
</tr>

<tr>
<td>

Maximum qualifying loan amount:

</td>
<td bgcolor="#cccccc"> </td>
<td align="center">
<input type="text" name="qualifyMax" size="15" />
</td>
</tr>

<tr>
<td>

Gross debt to income ratio (GDSR):

</td>
<td bgcolor="#cccccc"> </td>
<td align="center">
<input type="text" name="ratioIncome" size="15" />
</td>
</tr>

<tr>
<td nowrap>

Total debt to income ratio (tdSR):

</td>
<td bgcolor="#cccccc"> </td>
<td align="center">
<input type="text" name="ratioDebt" size="15" />
</td>
</tr>


<tr>
<td align="center">
<input type="button" class="table-btn"  value="Create Amortization Schedule" onClick="createReport(this.form)" />
<input type="hidden" name="HmoPmt" value="0" />
<input type="hidden" name="Hprincipal" value="0" />
<input type="hidden" name="HaNPer" value="0" />
<input type="hidden" name="HMIF" value="0" />
</td>
<td align="center">
<input type="reset" class="table-btn"  value="Reset" />
</td>
<td align="center">
<input type="button" class="table-btn"  value="Calculate" onClick="computeForm(this.form)" />
</td>
</tr>
</tbody>
</table>
</form>
</div>

<p>&nbsp;</p>
<p><img src="../img/canadian-currency.png" width="630" height="465" alt="Canadian Currency House." /></p>				

    
    
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
