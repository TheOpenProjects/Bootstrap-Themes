<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Mortgage Qualification Guidelines: VA &amp; FHA Home Loan Qualification Ratios &amp; Criteria</title>
    <meta http-equiv="Cache-control" content="public"/>
    <META NAME="ROBOTS" CONTENT="NOINDEX"/>
        <link rel="canonical" href="https://www.mortgagecalculator.biz/c/qualification.php" />				
        <meta name="description" content="">
		<meta name="author" content="Trey Conway">
		<link href='https://fonts.googleapis.com/css?family=Gudea:400,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="https://www.mortgagecalculator.biz/css/stylemin.css" />
    
    <!-- JavaScript -->
    <script type="text/javascript" src="https://www.mortgagecalculator.biz/js/jquery-1.6.2.min.js"></script>
    <script type="text/javascript" src="https://www.mortgagecalculator.biz/js/superfish.js"></script>
    <script type="text/javascript" src="https://www.mortgagecalculator.biz/js/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript" src="https://www.mortgagecalculator.biz/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="https://www.mortgagecalculator.biz/js/main.js"></script>

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
   VassocAmt = sn(document.calc.assocAmt.value);
   if(VassocAmt == "" || VassocAmt == 0) {
      VassocAmt = 0;
      document.calc.assocAmt.value = 0;
   }

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
 	<body>

<div class="table-block"> 
<form name="calc" method="post" action="#">

 <table>
 <tbody>

 <tr>
 <td align="center">
 <strong>Purchase Information</strong>
 </td>
 <td align="center">
 <strong>Inputs</strong>
 </td>
 <td align="center">
 <strong>Outputs</strong>
 </td>
 </tr>

 <tr>
 <td>
 
 Purchase price:
 
 </td>
 <td align="center">
 <input type="number" step="any" name="purchaseAmt" size="15" value="60000" onChange="computeForm(this.form)" />
 </td>
 <td > </td>
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
 <input type="number" step="any" name="downPayPercAmt" size="6" value="10" onChange="computeForm(this.form)" />
 </td>
 <td align="center">
 <input type="text" name="downPayAmt" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Loan amount:
 
 </td>
 <td> </td>
 <td align="center">
 <input type="text" name="loanAmt" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Annual interest rate:
 
 </td>
 <td align="center">
 <input type="number" step="any" name="intRate" size="15" value="8" onChange="computeForm(this.form)" />
 </td>
 <td> </td>
 </tr>

 <tr>
 <td>
 
 Length of the mortgage in years:
 
 </td>
 <td align="center">
 <input type="number" step="any" name="noYears" size="15" value="30" onChange="computeForm(this.form)" />
 </td>
 <td> </td>
 </tr>

 <tr>
 <td align="center">
 <strong>Payment Information</strong>
 </td>
 <td align="center">
 <strong>Inputs</strong>
 </td>
 <td align="center">
 <strong>Outputs (Monthly)</strong>
 </td>
 </tr>

 <tr>
 <td>
 
 Monthly principal & interest payment:
 
 </td>
 <td> </td>
 <td align="center">
 <input type="text" name="pmtPI" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Annual property taxes:
 
 </td>
 <td align="center">
 <select name="propTaxMethod" size="1" onChange="computeForm(this.form)" width="50" style="width: 50px">
 <option value="0">%</option>
 <option value="1" selected>$</option>
 </select>
 <input type="number" step="any" name="propTaxPercAmt" size="6" value="1020" onChange="computeForm(this.form)" />
 </td>
 <td align="center">
 <input type="text" name="propTaxAmt" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Annual insurance:
 
 </td>
 <td align="center">
 <select name="insMethod" size="1" onChange="computeForm(this.form)" width="50" style="width: 50px">
 <option value="0">%</option>
 <option value="1" selected>$</option>
 </select>
 <input type="number" step="any" name="insPercAmt" size="6" value="300" onChange="computeForm(this.form)" />
 </td>
 <td align="center">
 <input type="text" name="insAmt" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Annual PMI:
 
 </td>
 <td align="center">
 <select name="pmiMethod" size="1" onChange="computeForm(this.form)" width="50" style="width: 50px">
 <option value="0" selected>%</option>
 <option value="1">$</option>
 </select>
 <input type="number" step="any" name="pmiPercAmt" size="6" value=".5" onChange="computeForm(this.form)" />
 </td>
 <td align="center">
 <input type="text" name="pmiAmt" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Monthly association fees:
 
 </td>
 <td align="center">
 <input type="number" step="any" name="assocAmt" size="15" onChange="computeForm(this.form)" />
 </td>
 <td> </td>
 </tr>

 <tr>
 <td>
 
 Monthly payment (PITI):
 
 </td>
 <td> </td>
 <td align="center">
 <input type="text" name="pmtPITI" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Tax deductable portion of payment:
 
 </td>
 <td> </td>
 <td align="center">
 <input type="text" name="deductAmt" size="15" />
 </td>
 </tr>

 <tr>
 <td align="center">
 <strong>Qualifying Information</strong>
 </td>
 <td align="center">
 <strong>Inputs</strong>
 </td>
 <td align="center">
 <strong>Outputs</strong>
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
 <input type="number" step="any" name="grossPay" size="15" value="40000" onChange="computeForm(this.form)" />
 </td>
 <td> </td>
 </tr>

 <tr>
 <td>
 
 Monthly debt payments:
 
 </td>
 <td align="center">
 <input type="number" step="any" name="moDebts" size="15" onChange="computeForm(this.form)" />
 </td>
 <td> </td>
 </tr>

 <tr>
 <td>
 
 Qualify for loan?:
 
 </td>
 <td> </td>
 <td align="center">
 <input type="text" name="qualifyYN" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Maximum qualifying loan amount:
 
 </td>
 <td> </td>
 <td align="center">
 <input type="text" name="qualifyMax" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Current Income to payment ratio (ideally 28%, can go higher):
 
 </td>
 <td> </td>
 <td align="center">
 <input type="text" name="ratioIncome" size="15" />
 </td>
 </tr>

 <tr>
 <td nowrap>
 
 Current debt to income ratio (max = 50%):
 
 </td>
 <td> </td>
 <td align="center">
 <input type="text" name="ratioDebt" size="15" />
 </td>
 </tr>


 <tr>
 <td align="center" colspan="2">
 <input type="reset" class="table-btn"  value="Reset" />
 </td>
 <td align="center" colspan="1">
 <input type="button"  class="table-btn" value="Calculate" onClick="computeForm(this.form)" />
 </td>
 </tr>

 <tr>
 <td align="center" colspan="3">
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

</body>
</html>
