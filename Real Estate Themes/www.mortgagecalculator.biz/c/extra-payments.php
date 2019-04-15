<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Early Mortgage Repayment Calculator: Paying Extra on Your Home Loan with Bi-weekly Payments</title>		
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




function computeFixedInterestCost(principal, intRate, pmtAmt) { 

   var i = eval(intRate);
   i /= 100;
   i /= 12;

   var prin = eval(principal);
   var intPort = 0;
   var accumInt = 0;
   var prinPort = 0;
   var pmtCount = 0;
   var testForLast = 0;


   //CYCLES THROUGH EACH PAYMENT OF GIVEN DEBT
   while(prin > 0) {

      testForLast = (prin * (1 + i));

      if(pmtAmt < testForLast) {
         intPort = prin * i;
         accumInt = eval(accumInt) + eval(intPort);
         prinPort = eval(pmtAmt) - eval(intPort);
         prin = eval(prin) - eval(prinPort);
      } else {
      //DETERMINE FINAL PAYMENT AMOUNT
      intPort = prin * i;
      accumInt = eval(accumInt) + eval(intPort);
      prinPort = prin;
      prin = 0;
      }

      pmtCount = eval(pmtCount) + eval(1);

      if(pmtCount > 1000 || accumInt > 1000000000) {
         prin = 0;

      }

   }

return accumInt;

}




function computeIntRate(myNumPmts, myPrin, myPmtAmt, myGuess) {

var myDecRate = 0;

if(myGuess.length == 0 || myGuess == 0) {
   var myDecGuess = 10;
   } else {
   var myDecGuess = myGuess;
   if(myDecGuess >= 1) {
      myDecGuess = myDecGuess /100;
      }
   }

var myDecRate = myDecGuess / 12;
var myNewPmtAmt = 0;
var pow = 1;
var j = 0;

for (j = 0; j < myNumPmts; j++) {
   pow = pow * (eval(1) + eval(myDecRate));
}

myNewPmtAmt = (myPrin * pow * myDecRate) / (pow - 1);

//2 DEC PLACE AMOUNT
var decPlace2Rate = (eval(myDecGuess) + eval(.01)) / 12;
var decPlace2Amt = 0;
pow = 1;
j=0;
for (j = 0; j < myNumPmts; j++) {
   pow = pow * (eval(1) + eval(decPlace2Rate));
}
var decPlace2PmtAmt = (myPrin * pow * decPlace2Rate) / (pow - 1);
decPlace2Amt = eval(decPlace2PmtAmt) - eval(myNewPmtAmt);

//3 DEC PLACE AMOUNT
var decPlace3Rate = (eval(myDecGuess) + eval(.001)) / 12;
var decPlace3Amt = 0;
pow = 1;
j=0;
for (j = 0; j < myNumPmts; j++) {
   pow = pow * (eval(1) + eval(decPlace3Rate));
}
var decPlace3PmtAmt = (myPrin * pow * decPlace3Rate) / (pow - 1);
decPlace3Amt = eval(decPlace3PmtAmt) - eval(myNewPmtAmt);

//4 DEC PLACE AMOUNT
var decPlace4Rate = (eval(myDecGuess) + eval(.0001)) / 12;
var decPlace4Amt = 0;
pow = 1;
j=0;
for (j = 0; j < myNumPmts; j++) {
   pow = pow * (eval(1) + eval(decPlace4Rate));
}
var decPlace4PmtAmt = (myPrin * pow * decPlace4Rate) / (pow - 1);
decPlace4Amt = eval(decPlace4PmtAmt) - eval(myNewPmtAmt);

//5 DEC PLACE AMOUNT
var decPlace5Rate = (eval(myDecGuess) + eval(.00001)) / 12;
var decPlace5Amt = 0;
pow = 1;
j=0;
for (j = 0; j < myNumPmts; j++) {
   pow = pow * (eval(1) + eval(decPlace5Rate));
}
var decPlace5PmtAmt = (myPrin * pow * decPlace5Rate) / (pow - 1);
decPlace5Amt = eval(decPlace5PmtAmt) - eval(myNewPmtAmt);

var myPmtDiff = 0;

if(myNewPmtAmt < myPmtAmt) {

   while(myNewPmtAmt < myPmtAmt) {

      myPmtDiff = eval(myPmtAmt) - eval(myNewPmtAmt);
      if(myPmtDiff > decPlace2Amt) {
         myDecRate = eval(myDecRate) + eval(.01 / 12);
      } else
      if(myPmtDiff > decPlace3Amt) {
         myDecRate = eval(myDecRate) + eval(.001 / 12);
      } else
      if(myPmtDiff > decPlace4Amt) {
         myDecRate = eval(myDecRate) + eval(.0001 / 12);
      } else
      if(myPmtDiff > decPlace5Amt) {
         myDecRate = eval(myDecRate) + eval(.00001 / 12);
      } else {
         myDecRate = eval(myDecRate) + eval(.000001 / 12);
      }

      pow = 1
      j = 0;
      
      for (j = 0; j < myNumPmts; j++) {
         pow = pow * (eval(1) + eval(myDecRate));
      }
      myNewPmtAmt = (myPrin * pow * myDecRate) / (pow - 1);
   }

} else {


   while(myNewPmtAmt > myPmtAmt) {

      myPmtDiff = eval(myNewPmtAmt) - eval(myPmtAmt);
      if(myPmtDiff > decPlace2Amt) {
         myDecRate = eval(myDecRate) - eval(.01 / 12);
      } else
      if(myPmtDiff > decPlace3Amt) {
         myDecRate = eval(myDecRate) - eval(.001 / 12);
      } else
      if(myPmtDiff > decPlace4Amt) {
         myDecRate = eval(myDecRate) - eval(.0001 / 12);
      } else
      if(myPmtDiff > decPlace5Amt) {
         myDecRate = eval(myDecRate) - eval(.00001 / 12);
      } else {
         myDecRate = eval(myDecRate) - eval(.000001 / 12);
      }

      pow = 1
      j = 0;
      
      for (j = 0; j < myNumPmts; j++) {
         pow = pow * (eval(1) + eval(myDecRate));
      }
      myNewPmtAmt = (myPrin * pow * myDecRate) / (pow - 1);
   }


}

myDecRate = myDecRate * 12 * 100;

return myDecRate;

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

   var Vprincipal = sn(document.calc.principal.value);
   var VintRate = sn(document.calc.intRate.value);
   var Vmonths = sn(document.calc.months.value) * 12;

   var Voexpenses = sn(document.calc.oexpenses.value);

   var Vpayment = sn(document.calc.payment.value);

   var int_test = VintRate / 100 / 12 * Vprincipal;
   
   var Vextrapayment = sn(document.calc.extrapayment.value);

   if(Vprincipal == 0) {

   } else
   if(Vmonths == 0) {

   } else
   if(Vpayment > 0 && int_test > Vpayment) {

   } else {

      if(Vpayment == 0) {
         Vpayment = computeMonthlyPayment(Vprincipal, Vmonths, VintRate);
      }

      var VpmtsMade = sn(document.calc.pmtsMade.value);

      //COMPUTE CURRENT MORTGAGE
      document.calc.curPrincipal.value = fns(Vprincipal,2,1,1,1);
      document.calc.curRate.value = fns(VintRate,2,1,2,1) + "";
      document.calc.curPmt.value = fns(Vpayment,2,1,1,1);
	  var VcurPmtTotal = Voexpenses + Vpayment;
      document.calc.curPmtTotal.value = fns(VcurPmtTotal,2,1,1,1);

	  var VbiWeekPmtTotal = (Vpayment/2) + (Voexpenses * 12/26);
      document.calc.biWeekPmtTotal.value = fns(VbiWeekPmtTotal,2,1,1,1);

	  var VTotalbiWeek25Pmt = VbiWeekPmtTotal + (Vextrapayment/2);
      document.calc.TotalbiWeek25Pmt.value = fns(VTotalbiWeek25Pmt,2,1,1,1);

	  var VTotalbiWeek50Pmt = VbiWeekPmtTotal + Vextrapayment;
      document.calc.TotalbiWeek50Pmt.value = fns(VTotalbiWeek50Pmt,2,1,1,1);






      var VcurIntPaid = computeFixedInterestCost(Vprincipal, VintRate, Vpayment);
      document.calc.curIntPaid.value = fns(VcurIntPaid,0,1,1,1);
   
      var VorigPayoff = Vmonths / 12;
      document.calc.origPayoff.value = fns(VorigPayoff,1,0,0,0) + " Years";

      var VcurPayoff = (Vmonths / 12) - (VpmtsMade / 12);
      document.calc.curPayoff.value = fns(VcurPayoff,1,0,0,0) + " Years";

      //COMPUTE REMAINING BALANCE OF ORIGINAL MORTGAGE
      var VpmtsMade = sn(document.calc.pmtsMade.value);

      var prinLeft = Vprincipal;
      var pmtsPrinPort = 0;
      var pmtsIntPort = 0;
      var pmtsAccumInt = 0;
      var pmtsMadeCnt = 0;

      var pmtsMadeRate = VintRate;
      if(pmtsMadeRate >= 1) {
         pmtsMadeRate /= 100;
      }
      pmtsMadeRate /= 12;

      while(pmtsMadeCnt < VpmtsMade) {

         pmtsIntPort = prinLeft * pmtsMadeRate;
         pmtsAccumInt = pmtsAccumInt + pmtsIntPort;
         pmtsPrinPort = Vpayment - pmtsIntPort;
         prinLeft = prinLeft - pmtsPrinPort;
         pmtsMadeCnt += 1;

         if(pmtsMadeCnt > 600) {
            break;
         } else {
            continue;
         }
      }

      //COMPUTE BIWEEKLY PLAN

      var VbiWeekPmt = Vpayment / 2;
      document.calc.biWeekPmt.value = fns(VbiWeekPmt,2,1,1,1);

      var VbiWeekIntPaid = computeBiWeekInt(prinLeft,Vpayment,VintRate,0,1);
      VbiWeekIntPaid = VbiWeekIntPaid + pmtsAccumInt;
      document.calc.biWeekIntPaid.value = fns(VbiWeekIntPaid,0,1,1,1);

      var VbiWeekIntSaved = VcurIntPaid - VbiWeekIntPaid;
      document.calc.biWeekIntSaved.value = fns(VbiWeekIntSaved,0,1,1,1);

      var VbiWeekNPRs = computeBiWeekInt(prinLeft,Vpayment,VintRate,0,2);
      VbiWeekNPRs = VbiWeekNPRs + pmtsMadeCnt;
      var VbiWeekPayOff = VbiWeekNPRs / 12;
      document.calc.biWeekPayOff.value = fns(VbiWeekPayOff,1,1,0,0) + " Years";

      var VbiWeekPmtsSaved = Vmonths - (VbiWeekNPRs);
      document.calc.biWeekPmtsSaved.value = fns(VbiWeekPmtsSaved,0,0,0,0);

      var VbiWeekMonths = VbiWeekNPRs;

      var VbiWeekTotPaid = prinLeft + VbiWeekIntPaid;
      var VbiWeekEquivPmt = VbiWeekTotPaid / Vmonths;

      var VbiWeekEquivRate = computeIntRate(Vmonths, prinLeft, VbiWeekEquivPmt, VintRate);
      document.calc.biWeekEquivRate.value = fns(VbiWeekEquivRate,2,0,2,1) + "";

      var v_summary = "You Could Save " + fns(VbiWeekIntSaved,0,1,1,1) + " &amp; ";
      v_summary += "Have " + fns(VbiWeekPmtsSaved,0,1,0,0) + " fewer ";
      v_summary += "Payments by Using Biweekly Payments";

      var v_summary_cell = document.getElementById("summary");
      v_summary_cell.innerHTML = "<h4>" + v_summary + "</h4><p>And you can save even more time &amp; money by <a href='#viewrates'><strong>locking in today's low rates</strong></a>.<p>  <a href='#viewrates'><h1>SEE TODAY's BEST RATES</h1></a> ";

      //COMPUTE BIWEEKLY PLAN - PLUS $25

      var VbiWeek25Pmt = (Vpayment / 2) + (Vextrapayment / 2);
      document.calc.biWeek25Pmt.value = fns(VbiWeek25Pmt,2,1,1,1);

      var VbiWeek25IntPaid = computeBiWeekInt(prinLeft,Vpayment,VintRate,Vextrapayment/2,1);
      VbiWeek25IntPaid = VbiWeek25IntPaid + pmtsAccumInt;
      document.calc.biWeek25IntPaid.value = fns(VbiWeek25IntPaid,0,1,1,1);

      var VbiWeek25IntSaved = VcurIntPaid - VbiWeek25IntPaid;
      document.calc.biWeek25IntSaved.value = fns(VbiWeek25IntSaved,0,1,1,1);

      var VbiWeek25NPRs = computeBiWeekInt(prinLeft,Vpayment,VintRate,Vextrapayment/2,2);
      VbiWeek25NPRs = VbiWeek25NPRs + pmtsMadeCnt;
      var VbiWeek25PayOff = VbiWeek25NPRs / 12;
      document.calc.biWeek25PayOff.value = fns(VbiWeek25PayOff,1,1,0,0) + " Years";

      var VbiWeek25PmtsSaved = Vmonths - (VbiWeek25NPRs);
      document.calc.biWeek25PmtsSaved.value = fns(VbiWeek25PmtsSaved,0,0,0,0);

      var VbiWeek25Months = VbiWeek25NPRs;

      var VbiWeek25TotPaid = prinLeft + VbiWeek25IntPaid;
      var VbiWeek25EquivPmt = VbiWeek25TotPaid / Vmonths;

      var VbiWeek25EquivRate = computeIntRate(Vmonths, prinLeft, VbiWeek25EquivPmt, VintRate);
      document.calc.biWeek25EquivRate.value = fns(VbiWeek25EquivRate,2,0,2,1) + "";

      //COMPUTE BIWEEKLY PLAN - PLUS $50

      var VbiWeek50Pmt = (Vpayment / 2) + Vextrapayment;
      document.calc.biWeek50Pmt.value = fns(VbiWeek50Pmt,2,1,1,1);

      var VbiWeek50IntPaid = computeBiWeekInt(prinLeft,Vpayment,VintRate,Vextrapayment,1);
      VbiWeek50IntPaid = VbiWeek50IntPaid + pmtsAccumInt;
      document.calc.biWeek50IntPaid.value = fns(VbiWeek50IntPaid,0,1,1,1);

      var VbiWeek50IntSaved = VcurIntPaid - VbiWeek50IntPaid;
      document.calc.biWeek50IntSaved.value = fns(VbiWeek50IntSaved,0,1,1,1);
   
      var VbiWeek50NPRs = computeBiWeekInt(prinLeft,Vpayment,VintRate,Vextrapayment,2);
      VbiWeek50NPRs = VbiWeek50NPRs + pmtsMadeCnt;
      var VbiWeek50PayOff = VbiWeek50NPRs / 12;
      document.calc.biWeek50PayOff.value = fns(VbiWeek50PayOff,1,1,0,0) + " Years";

      var VbiWeek50PmtsSaved = Vmonths - (VbiWeek50NPRs);
      document.calc.biWeek50PmtsSaved.value = fns(VbiWeek50PmtsSaved,0,0,0,0);

      var VbiWeek50Months = VbiWeek50NPRs;

      var VbiWeek50TotPaid = prinLeft + VbiWeek50IntPaid;
      var VbiWeek50EquivPmt = VbiWeek50TotPaid / Vmonths;

      var VbiWeek50EquivRate = computeIntRate(Vmonths, prinLeft, VbiWeek50EquivPmt, VintRate);
      document.calc.biWeek50EquivRate.value = fns(VbiWeek50EquivRate,2,0,2,1) + "";



      var v_halfextra = "" + fns(Vextrapayment/2,2,1,1,1) + " ";
      var v_halfextra_cell = document.getElementById("halfextra");
      v_halfextra_cell.innerHTML = "" + v_halfextra + " ";

      var v_fullextra = "" + fns(Vextrapayment,2,1,1,1) + " ";
      var v_fullextra_cell = document.getElementById("fullextra");
      v_fullextra_cell.innerHTML = "" + v_fullextra + " ";
   
   }
		
}

function computeBiWeekInt(bwPrin,bwOrigPmt,bwRate,bwPmtAdd,retVar) {

   var FbwPrin = bwPrin - (bwPmtAdd * 5);
   var FbwPmt = bwOrigPmt / 2;
   var FbwRate = bwRate;
   if(FbwRate >= 1) {
      FbwRate /= 100;
   }
   FbwRate /= 12;

   var FbwIntPort = 0;
   var FbwPrinPort = 0;
   var FbwAccumInt = 0;
   var FbwNPR = 0;
   var FbwMoEscrowAmt = (FbwPmt / 6) + (bwPmtAdd * 26 / 12);
   var FbwAccumEscrow = 0;

   while(FbwPrin > 0) {

      FbwAccumEscrow += FbwMoEscrowAmt;

      if(FbwPrin > ((bwOrigPmt - (FbwPrin * FbwRate)) + FbwMoEscrowAmt)) {
         FbwIntPort = FbwPrin * FbwRate;
         FbwAccumInt = FbwAccumInt + FbwIntPort;
         FbwPrinPort = bwOrigPmt - FbwIntPort;
         FbwPrin = FbwPrin - FbwPrinPort;
         FbwNPR += 1;
      } else {
         FbwIntPort = FbwPrin * FbwRate;
         FbwAccumInt = FbwAccumInt + FbwIntPort;
         FbwPrin = 0;
         FbwNPR += 1;
      }

      if(FbwNPR % 6 == 0) {
         FbwPrin = FbwPrin - FbwAccumEscrow;
         FbwAccumEscrow = 0;
      }

      if(FbwNPR > 600) {
         break;
      } else {
         continue;
      }

   }

   if(retVar == 1) {
      return FbwAccumInt;
   } else
   if(retVar == 2) {
      return FbwNPR;
   }

}

function calcMonths(form) {

   var VnumMonths = document.calc.getMonths.options[document.calc.getMonths.selectedIndex].value;
   document.calc.months.value = VnumMonths;

   clear_results(document.calc);

}

function clear_results(form) {

   var v_summary_cell = document.getElementById("summary");
   v_summary_cell.innerHTML = "";

   var v_halfextra_cell = document.getElementById("halfextra");
   v_halfextra_cell.innerHTML = "";

   var v_fullextra_cell = document.getElementById("fullextra");
   v_fullextra_cell.innerHTML = "";

   document.calc.curPrincipal.value = "";
   document.calc.curRate.value = "";
   document.calc.curPmt.value = "";
   document.calc.curIntPaid.value = "";
   document.calc.curPayoff.value = "";
   document.calc.biWeekPmt.value = "";
   document.calc.biWeekIntPaid.value = "";
   document.calc.biWeekIntSaved.value = "";
   document.calc.biWeekPayOff.value = "";
   document.calc.biWeekPmtsSaved.value = "";
   document.calc.biWeekEquivRate.value = "";
   document.calc.biWeek25Pmt.value = "";
   document.calc.biWeek25IntPaid.value = "";
   document.calc.biWeek25IntSaved.value = "";
   document.calc.biWeek25PayOff.value = "";
   document.calc.biWeek25PmtsSaved.value = "";
   document.calc.biWeek25EquivRate.value = "";
   document.calc.biWeek50Pmt.value = "";
   document.calc.biWeek50IntPaid.value = "";
   document.calc.biWeek50IntSaved.value = "";
   document.calc.biWeek50PayOff.value = "";
   document.calc.biWeek50PmtsSaved.value = "";
   document.calc.biWeek50EquivRate.value = "";

}

function reset_calc(form) {

   var v_summary_cell = document.getElementById("summary");
   v_summary_cell.innerHTML = "";

   var v_halfextra_cell = document.getElementById("halfextra");
   v_halfextra_cell.innerHTML = "";

   var v_fullextra_cell = document.getElementById("fullextra");
   v_fullextra_cell.innerHTML = "";

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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/extra-payments.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				  <h1>Extra Payment Mortgage Calculator with Biweekly Payments</h1>
</div>
                    <ul id="breadcrumbs">

                        <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
                        <li><a href="https://www.mortgagecalculator.biz/c/budget-planner.php">Budget Planning</a></li>
                        <li>Early Loan Payoff Bi-weekly Payment Plan </li> 
                    </ul>
                </div>   			<div class="bottom-section">
<p><img src="https://www.mortgagecalculator.biz/img/house-in-hands.jpg" alt="house" width="130" class="alignright" />       This calculator will show you how much you will save if you pay 1/2 of your mortgage payment every two weeks instead of making a full mortgage payment once a month. In effect, you will be making one extra mortgage payment per year -- without hardly noticing the additional cash outflow. But, as you're about to discover, you will certainly notice the "increased" cash flow that will occur when you pay your mortgage off way ahead of schedule! Below the bi-weekly payment results are two additional sets of results for how much faster the loan will be paid off by adding an extra $25 or $50 to each biweekly payment.</p>
<p><strong>The below calculator shows biweekly payment plan savings, if you want to make monthly payments &amp; have a specific amount you would like to add to each monthly payment, please use <a href="https://www.mortgagecalculator.biz/c/additional-payments.php">this calculator</a> instead.</strong></p> 
<P>
 Instructions: Complete the top 4 fields and click the "Calculate" button. The calculator automatically figures your monthly principal and interest payments for you based on the other data you enter, then it uses that to help figure out how much more you can save by paying biweekly or paying biweekly while adding extra to each payment..</P>


<div class="table-block">
<form name="calc" method="post" action="#">

 <table>
 <tbody> 

 <tr>
 <td>
 
Original loan term in years:
   
 
 </td>
 <td align="center">
<!-- <select name="getMonths-org" size="1" onChange="calcMonths(this.form)" width="150" style="width: 150px">
 <option value="360">30 years</option>
 <option value="300">25 years</option>
 <option value="240">20 years</option>
 <option value="180">15 years</option>
 <option value="120">10 years</option>
 <option value="60">5 years</option>
 </select>
  
 <input name="months-org" size="15" value="" onKeyUp="clear_results(this.form)" type="hidden"/> -->


<input name="months" type="number" value="30" size="15"  tabindex="3"  onKeyUp="clear_results(this.form)" onfocus="this.value = this.value=='30'?'':this.value;" onblur="this.value = this.value==''?'30':this.value;" >



 </td>
 </tr>


 <tr>
 <td>
 
 Dollar amount of your mortgage:

 
 </td>
 <td align="center">
 <input type="number" step="any" name="principal" size="15" value="225000" tabindex="1"  onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='225000'?'':this.value;" onblur="this.value = this.value==''?'225000':this.value;" />
 </td>
 </tr>



 <tr>
 <td>
 
Current loan interest rate (or, <a href="#viewrates"><strong>Save More</strong></a> locking in a lower rate):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="intRate" size="15" value="4.5" tabindex="2"  onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='4.5'?'':this.value;" onblur="this.value = this.value==''?'4.5':this.value;" />
 </td>
 </tr>




<!--  <tr>
 <td>
 
 Current monthly mortgage payment:
 
 </td>
 <td align="center">
 </td>
 </tr> -->

 <input type="hidden" step="any" name="payment" value="0" onKeyUp="clear_results(this.form)" />


 <tr>
 <td>
 
 Number of monthly payments you have already paid:
 
 </td>
 <td align="center">
 <input type="number" step="any" name="pmtsMade" size="15" value="24"  tabindex="4"  onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='24'?'':this.value;" onblur="this.value = this.value==''?'24':this.value;"  />
 </td>
 </tr>

 <tr>
 <td>
 
 Extra payment you can afford to make:
 
 </td>
 <td align="center">
 <input type="number" step="any" name="extrapayment" size="15" value="50"  tabindex="4"  onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='50'?'':this.value;" onblur="this.value = this.value==''?'50':this.value;"  />
 </td>
 </tr>

 <tr>
 <td>
 
 Other monthly homeownership expenses (taxes, insurance, maintenance, HOA, etc.):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="oexpenses" size="15" value="300"  tabindex="4"  onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='300'?'':this.value;" onblur="this.value = this.value==''?'300':this.value;"  />
 </td>
 </tr>


 <tr>
 <td align="center">
 <input type="button" class="table-btn"  value="Reset" onClick="reset_calc(this.form)" />
 </td>
 <td align="center">
 <input type="button" class="table-btn"  value="Calculate" onClick="computeForm(this.form)" tabindex="5" />
 </td>
 </tr>

 <tr>
 <td colspan="2" id="summary">
 </td>
 </tr>


 <tr>
 <td colspan="2" align="center">
 <h3>
 Your Current Mortgage Payment
 </h3>
 </td>
 </tr>

 <tr>
 <td>
 
 Dollar amount of your mortgage:
 
 </td>
 <td align="center">
 <input type="text" name="curPrincipal" size="15" />
 </td>
 </tr>


 <tr>
 <td>
 
 Percentage rate of your mortgage:
 
 </td>
 <td align="center">
 <input type="text" name="curRate" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Your current monthly payment (P&amp;I portion):
 
 </td>
 <td align="center">
 <input type="text" name="curPmt" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Total monthly cost of ownership (with escrow):
 
 </td>
 <td align="center">
 <input type="text" name="curPmtTotal" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Total interest paid:
 
 </td>
 <td align="center">
 <input type="text" name="curIntPaid" size="15" />
 </td>
 </tr>

 <tr>
 <td>Original loan term:</td>
 <td align="center">
 <input type="text" name="origPayoff" size="15" />
 </td>
 </tr>

 <tr>
 <td>Years remaining on original loan:</td>
 <td align="center">
 <input type="text" name="curPayoff" size="15" />
 </td>
 </tr>


 <tr>
 <td colspan="2" align="center">
 <h3>
 With the Bi-Weekly Plan
 </h3>
 </td>
 </tr>

 <tr>
 <td>
 
 Your bi-weekly P&amp;I payment:
 
 </td>
 <td align="center">
 <input type="text" name="biWeekPmt" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Total bi-weekly payment with escrow:
 
 </td>
 <td align="center">
 <input type="text" name="biWeekPmtTotal" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Total interest paid:
 
 </td>
 <td align="center">
 <input type="text" name="biWeekIntPaid" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Total interest savings:
 
 </td>
 <td align="center">
 <input type="text" name="biWeekIntSaved" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Total loan duration:
 
 </td>
 <td align="center">
 <input type="text" name="biWeekPayOff" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Number of payments saved:
 
 </td>
 <td align="center">
 <input type="text" name="biWeekPmtsSaved" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Equivalent interest rate:
 
 </td>
 <td align="center">
 <input type="text" name="biWeekEquivRate" size="15" />
 </td>
 </tr>

 <tr>
 <td colspan="2" align="center">
 <h3>
 If You Pay an Additional <span id="halfextra"></span> Every Biweekly Payment
 </h3>
 </td>
 </tr>

 <tr>
 <td>
 
 Your bi-weekly P&amp;I payment:
 
 </td>
 <td align="center">
 <input type="text" name="biWeek25Pmt" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Your bi-weekly payment with escrow:
 
 </td>
 <td align="center">
 <input type="text" name="TotalbiWeek25Pmt" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Total interest paid:
 
 </td>
 <td align="center">
 <input type="text" name="biWeek25IntPaid" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Total interest savings:
 
 </td>
 <td align="center">
 <input type="text" name="biWeek25IntSaved" size="15" />
 </td>
 </tr>

 <tr>
 <td>Total loan duration:</td>
 <td align="center">
 <input type="text" name="biWeek25PayOff" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Number of payments saved:
 
 </td>
 <td align="center">
 <input type="text" name="biWeek25PmtsSaved" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Equivalent interest rate:
 
 </td>
 <td align="center">
 <input type="text" name="biWeek25EquivRate" size="15" />
 </td>
 </tr>

 <tr>
 <td colspan="2" align="center">
 <h3>Save  More by Paying an Additional <span id="fullextra"></span> Every Biweekly Payment</h3>
 </td>
 </tr>

 <tr>
 <td>
 
 Your bi-weekly P&amp;I payment:
 
 </td>
 <td align="center">
 <input type="text" name="biWeek50Pmt" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Your bi-weekly payment with escrow:
 
 </td>
 <td align="center">
 <input type="text" name="TotalbiWeek50Pmt" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Total interest paid:
 
 </td>
 <td align="center">
 <input type="text" name="biWeek50IntPaid" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Total interest savings:
 
 </td>
 <td align="center">
 <input type="text" name="biWeek50IntSaved" size="15" />
 </td>
 </tr>

 <tr>
 <td>Total loan duration:</td>
 <td align="center">
 <input type="text" name="biWeek50PayOff" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Number of payments saved:
 
 </td>
 <td align="center">
 <input type="text" name="biWeek50PmtsSaved" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Equivalent interest rate:
 
 </td>
 <td align="center">
 <input type="text" name="biWeek50EquivRate" size="15" />
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

 
 <h2>Getting Ahead With Extra Payments</h2>
<p> Extra payments on your mortgage can help you gain control over your   finances, save money and give you peace of mind. This is a great way to   reduce the long-term cost of your mortgage. When homeowners calculate   how much they will pay over the life of their housing loan, they will   find that they may be paying two to three times the cost of the original   property.</p>
<p>
  While your home is a necessity for shelter, there is no reason why you   can't save money on your mortgage. There is a multiplier effect where   $100 in extra payments will lead to more than $100 in savings on your   mortgage. Couldn't you make a couple of extra payments each year over   the life of a 30-year mortgage? Here is a description of what a mortgage   is, history of the market and reasons why it pays to make extra   payments on your mortgage [a glossary of terms is listed at the end of   this article.]</p>
<h3>Mortgage Basics</h3>
<p>
  Most people do not have a lot of money in cash or savings to purchase an   expensive piece of land. A mortgage (also called a "deed of trust") is a   way for people to live on a property while paying off the loan received   from a bank or financial institution. Every nation has its own special   characteristics for the mortgage.</p>
<p>
  The origin of the word "mortgage" is French meaning "dead pledge." This   "dead pledge" is used to "encumber" real property - immovable land, dirt   and soil. The mortgage is both a promissory note and security   instrument. The promissory note is from the mortgagor (homeowner) to the   mortgagee (the bank) promising repayment of the loan detailing the   principal, interest rate and term.</p>
<p>
  With a traditional loan, the debtor is required to repay it no matter   what happens. English Jurist Sir Edward Coke noted that if the property   is foreclosed upon with a mortgage - the pledge is dead. If the mortgage   is paid off - the pledge is dead. The property is the pledge (or   collateral). Banks know that a fixed piece of land is the most secure   form of a financial asset.</p>
<p>
  The mortgage is actually made from the debtor to the creditor. The bank   gives the loan to the debtor for purchasing the property, the debtor   gives the mortgage to the lender to pay for the loan. The debtor gets   rights to the property as long as monthly payments are made.</p>
  <h4>Fixed versus Adjustable Rates</h4>
<p>
  A fixed-rate mortgage (FRM) has the same interest rate over the life of   the mortgage. An adjustable-rate mortgage (ARM) has a rate fluctuating   due to some benchmark rate. Having an FRM is easier for budgeting   purposes.</p>
<p>
  So why would anyone want an adjustable-rate mortgage? There are three   primary advantages to an ARM: 1) it may allow people with bad credit to   qualify, 2) some of these loans have an FRM for the first couple of   years resetting to an ARM thereafter and 3) if interest rates go down,   then an ARM might be more affordable.</p>
<p>
  The danger of an ARM is the human nature of consumption. Most people   will tend to maximize their consumption and have very little in savings.   When an adjustable-rate mortgage increases, most people are not able to   make their monthly payments and default.</p>
<h3>History of Mortgages</h3>
<p>
  Every nation has different guidelines and laws governing mortgages based   on culture and history. The United States has had a very robust banking   system providing capital to its citizens. According to   "http://www.randomhistory.com/1-50/037mortgage.html", mortgages in the   1700s and 1800s were only six years comprising 40 percent of the   property value. American homeowners "typically renegotiated their loans   every year." </p>
<p>
  The mortgages of the 1900s had "variable interest rates, high down   payments, and short maturities." Before the 1930s, most people did not   have high levels of debt - they owned few valuable assets and did not   have access to loans. The mortgage debt related to total income was   about 20% and the percentage of household assets represented by a home   was about 15%.</p>
<h4>More Capital for Home Loans</h4>
<p>
  During the Great Depression, the American government realized that it   needed to intervene in the economy to a large extent to keep it running.   The United States government used five primary ways to influence   mortgages: 1) regulations, 2) monetary policy, 3) insurance to protect   against bank defaults, 4) pseudo-government agencies and 5) government   departments. These actions helped the American mortgage market to   develop.</p>
<p>
  In 1936, the Federal Housing Administration (FHA) was started according   to "http://en.wikipedia.org/wiki/Mortgage_loan". The Federal National   Mortgage Association (Fannie Mae) was started in 1938. After World War   II, the G.I. Bill created the Veterans Administration (VA) leading to   higher loan-to-value ratios up to 95 percent and terms extended to 30   years. Mortgage debt compared to total income increased to 73% during   this time. The percentage of total assets comprised of a home increased   to 41%.</p>
<p>
  The Government National Mortgage Association (Ginnie Mae) created   uniformity in the mortgage market. The 1980s saw the adjustable-rate   mortgage gain prominence as a way to price risk to those in the   sub-prime market. The LTV ratio increased - if a homeowner borrowed   $175,000 for a house worth $200,000, then the LTV ratio was 150,000   divided by 200,000 or 75%.</p>
<p>
  In the 1990s, the United States used its Freddie Mac and Fannie Mae   pseudo-government institutions to make it easier for poor people to get a   mortgage. Many of these poor people had not been able to qualify   previously because they had bad credit, unsteady employment or low   income. The goal was to increase home-ownership rates.</p>
<p>
  Banks also started to bundle mortgages into "mortgage-backed securities"   (MBS) for resale to investors. This created a secondary market for   mortgages. Many times, your mortgage will be "owned" by a financial   entity or individual different from the original bank.</p>
<h4>Natural Housing Development</h4>
<p>
  The natural economic progression of housing starts with cities   anticipating the growth of their communities by granting permits to   developers. The government will provide sewer and water lines and roads   for these housing developments. A town may have plenty of apartments   available, but sees strong demand for homes. As income rises, people can   move into more expensive houses.</p>
<p>
  After World War II, returning soldiers could get a decent job with no   education. When they get married, they wanted to move their family into a   nice home with a two-car garage. Rising incomes are essential to a   healthy housing market. But as the supply of houses increased, the price   of the existing housing stock would decline.</p>
<h2>Housing Market is Based on Supply and Demand</h2>
<p>
  The housing market matches the supply and demand of houses with those of   people who need a place to stay. There are many factors involved,   including income growth, neighborhood development, family structure and   access to capital. These are all important factors in determining the   characteristics of your mortgage.</p>
<p>
  For most individuals, the home is the largest purchase they will make.   It satisfies the essential need for a roof over your head. Most people   don't spend a lot of time calculating the cost of the mortgage in the   long run. If they did, they would understand the benefits of extra   payments.</p>
<h3>Creditworthiness</h3>
<p>
  When you apply for a loan, the bank will collect information on your job   income, length of time at the job and financial assets. It will use   this data and your credit score to determine your "creditworthiness."   Your "creditworthiness" determines the odds of you repaying your loan.</p>
<p>
  If you have more money for a down payment, then this will lower your   interest rate. Many lenders use a Loan-to-Value (LTV) ratio of 80% as   the standard. Above that, the lender may charge a higher interest rate   due to the increased risk for default.</p>
<h2>Rising House Prices Encourage Speculation</h2>
<p>
  Governments, banks and homeowners all benefit from rising house prices.   Most localities depend upon real estate prices to raise property tax   revenue. There is an in-built self-interest to see higher home   appraisal. In the end, supply and demand will determine the price for a   home.</p>
<p>
  As the American government helped strengthen the banking system, there   was more access to capital. This fueled speculation by some who thought   they could buy a house and "flip it" in five years to make a profit.   This led to higher prices. In 2008, the sub-prime mortgage crisis   destroyed this speculative bubble.</p>
<p>
  In the United States, any individual can look up any address on web   sites, like "Zillow.com". This freedom of information has created a very   robust housing market.</p>
<p>
  Other countries do not permit housing prices to be freely advertized. In   many African nations, it is difficult simply to get a map, let alone   real estate valuations. This has created a more restricted housing   market.</p>
<h3>Why Does it Take So Long to Pay Off Mortgages?</h3>
<p>
  If you do the math, then paying $1,000 every month on a home worth   $200,000 should have it paid off within less than 20 years. But most   mortgages are 30 years, aren't they? Why does it take so long to pay off   these mortgages?</p>
<p>
  Most mortgages front-load charges and interest at the beginning of the   payment schedule. You aren't paying off much of the principal. Your   first monthly payments might have 80% going towards interest and fees   with only 20% allotted to paying off the principal. It is like boxing   with shadows.</p>
<h4>Compound Interest Adds up Quickly</h4>
<p>
  Many housing experts estimate that most homeowners will spend two to   three times the value of their house when they complete a traditional   30-year mortgage. One reason why it takes so long to pay off a mortgage   is because of compound interest. Compound interest it like a treadmill -   it is very difficult to keep up.</p>
<p>
  Banks are in the business of making money. They have deposits and turn   these into revenue-generating loans with mortgages. While you receive   the property, many banks are receiving 10 extra years of you paying off a   loan or 33 percent of the mortgage time period.</p>
<p>
  Consider "P" as representing the principle and "I" as representing the   interest on your mortgage. The first month, you pay P + I. But every   month, interest is being added to your balance. Thus, the second month,   you owe P + I + I. This is how compound interest works. The longer it   takes you to repay your mortgage, the more interest will accrue.</p>
<h4>Can You Afford Your Loan?</h4>
<p>
  Due to more capital available, governments and banks offered more loans   to people who could not afford them. The extreme was the NINJA loan,   which stands for "No Income, No Job." Because of their surplus capital,   banks actually made loans to debtors who had no real way or repaying   their loans.</p>
<p>
  Banks have traditionally had very strict guidelines for who would   qualify for mortgages. With the sub-prime mortgage crisis, financial   institutions lowered these standards to make home loan available to more   borrowers. Unfortunately, some debtors could not keep up with their   monthly mortgage payments.</p>
<p>
  The term, "sub-prime" was a designation for a high risk debtor. The   financial institutions are uncertain if they will get their money back   from customers in this category. The reasons for this wariness is based   on simple math, actuarial data and number-crunching. Most bankers   estimate that 40% of monthly income should go towards mortgage payments.   A debtor cannot afford his loan if it absorbs too much of his income.</p>
<p>
  In some Scandinavian countries, a mortgage does not have a set term.   This has been discussed on the site - "http://www.fi.se" - in its review   of the Swedish Mortgage Market for 2013. "In the sample of new loans   only four out of ten households with a loan-to-value ratio of less than   75 per cent amortize. In addition, the average actual repayment period   for first mortgages that are being amortized is very long (more than 140   years)." The longest that most humans live is for 120 years.</p>
<p>
  If a mortgage is going for 140 years and humans live to be 120, then   obviously the mortgage is not expected to be paid off. Then, it is not   really a mortgage is it? It is more like renting. If parents had repaid   their entire mortgage, then they could sell the property, which would   net them more money in the long run.</p>
  <h4>Your Mortgage is a Banking Cash Cow</h4>
<p>
  So why are banks making mortgages that are impossible to pay off? It is   because mortgages make these financial institutions a lot of money. Each   monthly payment is revenue for a bank. If they could, they would have   you indebted forever.</p>
<p>
  The concept of "amortization" is simply the gradual repayment of your   mortgage. In order for a mortgage to be amortized, the monthly payments   must be high enough to reduce the overall principal within the allotted   time of the agreement.</p>
<p>
  Some banks will go so far as charging "prepayment penalties" to keep you   enslaved to debt. These are fees for making "extra payments" on your   mortgage. Carefully read your mortgage to see if these apply. It does   not mean you "cannot" make extra payments, it only means that you will   be "financially penalized" for doing so. If you do the math, sometimes   extra payments with prepayment penalties will still save you money in   the long run.</p>
<h3>Housing is Expensive</h3>
<p>
  If you make a down payment of 20% for a home, then you have the   principal of the loan to repay, add closing costs, insurance and   property taxes. Add in furniture, cleaning, painting, heating   air-conditioning ventilation (HVAC) and woodwork. Once you pay off your   mortgage, you will have more money for important repairs. You can also   deduct mortgage interest, home-equity debt, vacation homes and mortgage   points on your taxes.</p>
<h4>Why Are Extra Mortgage Payments So Valuable?</h4>
<p><img src="../img/paying-extra.jpg" width="630" height="441" alt="Paying Extra." /> </p>
<p>During times of economic troubles, it makes sense to make sure your   financial ship is in order. If you need extra money for an emergency,   then having an unwieldy mortgage payment only gets in the way. In 2013,   interest rates are at record lows in many parts of the world. But it   cannot stay this way forever. Wise consumers are considering ways to   gain control, save money and plan for the future by making extra   payments on their mortgage today.</p>
<p>
  Extra mortgage payments are so valuable because they reduce the   principal and interest. A lower principal will mean that the next   interest rate charged will be added to a lower base figure. In the   extreme, an extra payment could be the difference between foreclosure   and paying off your mortgage.</p>
<h4>Control Your Mortgage or Be Controlled by It</h4>
<p>
  Banks are in the business of receiving payments for loans. They set up   mortgages that are extremely beneficial to their bottom line. By making   extra payments, you gain control of your mortgage repayment schedule, so   you can handle unforeseen circumstances.</p>
<p>
  If you receive a large sum of money, why not make an extra payment on   your mortgage? It will save you a lot of money in the long run. You can   consider it a retirement investment. By gaining control of your   mortgage, you increase your chances of being able to complete the   repayment schedule.</p>
<h4>Emergencies or Job Loss</h4>
<p>
  All lives are fraught with unforeseen dangers. What are the chances that   you will never experience any catastrophe or job loss during the 30   years of your mortgage? If you make extra payments on your mortgage, you   could be better situated financially to handle these challenges.</p>
<p>
  You must remember that your mortgage is based on your original income.   If you lose your job, then it will be very difficult to make your   present monthly payments unless you have numerous savings and assets   built up. With extra payments, you can be proactive and improve your   debt situation <u>before</u> any catastrophe occurs.</p>
<h4>Saving Money</h4>
<p>
  By reducing your mortgage, you will have more money for other purposes.   The secret to paying of a mortgage is paying off the principal first.   Extra mortgage payments have a multiplier effect. If you pay off $100   early, it could save you more than $100 in mortgage payments due to the   effects of compound interest. Just imagine what you could do with that   extra money the first month after your mortgage is paid off.</p>
<h3>Peace of Mind</h3>
<p>
  With your mortgage paid off, you have more money to be spend on other   elements of your life. You can consider selling your home and moving to a   bigger or smaller home as you near retirement. You will sleep better   with this debt repaid.</p>
<h4>Improve Your Net Worth</h4>
<p>
  Your mortgage is a liability – a continual drain every month. Paying off   your mortgage is a way to increase your net worth. Extra payments have a   double effect by increasing your equity (assets) and reducing your   mortgage balance (liabilities.) You are vastly improving your financial   well-being.</p>
<h4>Glossary of Mortgage Terms</h4>
<p>
  Here is a glossary of common mortgage terms:</p>
  <ul class="arrow">
    <li>100% Loan has no down payment.</li>
    <li>Adjustable-Rate Mortgage (ARM) (also called "floating" or "variable"   mortgage) has fluctuating interest rate a couple percentage points   above a benchmark rate.</li>
    <li>Amortization is the process of paying off the loan gradually with monthly payments.</li>
    <li>Annual Percentage Rate (APR) is how much interest is charged each year.</li>
    <li>Balloon Loan has one large payment occur during the life of the loan.</li>
    <li>Bridge Loan offers financing between sale of first home and purchase of second home.</li>
    <li>Conforming Loan satisfies government standards for acceptable risk.</li>
    <li>Credit Score is a number to measure a debtor's creditworthiness.</li>
    <li>Deed of Trust is a mortgage form with third-party trustee.</li>
    <li>Department of Veterans Affairs (VA) offers low-interest loans.</li>
    <li>Equity is the market value of your home minus what you owe.</li>
    <li>Federal Deposit Insurance Corporation (FDIC) guarantees bank accounts up to a certain limit.</li>
    <li>Federal Home Loan Mortgage Corporation (Freddie Mac) is a government-sponsored mortgage program.</li>
    <li>Federal National Mortgage Association (Fannie Mae)is a government-sponsored mortgage program.</li>
    <li>Fixed-Rate Mortgage (FRM) has set interest rate.</li>
    <li>Foreclosure is the legal process of the lender repossessing or seizing the property.</li>
    <li>Graduated-Payment Mortgage (GPM) is fixed-rate mortgage gradually   increasing. This is best for the young who expect to receive increasing   income over their lives.</li>
    <li>Home Equity Line of Credit (HELOC) is a loan a homeowner can make once he has built up equity in his property.</li>
    <li>House-Poor is a description of someone with a home who does not have much money left after making mortgage payments.</li>
    <li>Hybrid = Combination of ARM and FRM.</li>
    <li>Interest is the price of the loan.</li>
    <li>Jumbo Loan (also called "nonconforming" loan) does not meet federal loan guidelines.</li>
    <li>Loan-to-Value (LTV) ratio = Most property is purchased with a down   payment and mortgage. If the down payment is 20%, then the LTV is 80%.</li>
    <li>Mortgage Insurance pays balance if debtor defaults.</li>
    <li>Mortgage-Backed Securities (MBS) are bundles of mortgages resold by financial institutions to investors.</li>
    <li>Negative Amortization Loans have artificially low monthly payments   making it impossible for the homeowner to pay them off in a reasonable   period of time.</li>
    <li>No Income, No Job (NINJA) Loan where homeowner has no income or job.</li>
    <li>Option Adjustable Rate Mortgages (also known as payment option ARMs) have wide variety of lending terms.</li>
    <li>Piggybacking is creating a first loan below the jumbo limit and a second home-equity loan to pay for the rest of the mortgage.</li>
    <li>Prepayment penalties charge you fees for making extra payments on your mortgage.</li>
    <li>Principal is the original balance of the loan.</li>
    <li>Principal, interest, taxes and insurance (PITI) are the most common parts of a mortgage.</li>
    <li>Private Mortgage Insurance (PMI) covers costs of foreclosure if debtor defaults.</li>
    <li>Redemption is paying off the final balance of the mortgage.</li>
    <li> Reverse Mortgage is similar to an annuity paying senior citizens a steady stream of income for their home equity.</li>
    <li>Servicing a Loan is the procedure of collecting home payments.</li>
    <li>Short sale involves a homeowner in default to sell the property for less than it is worth to avoid foreclosure fees.</li>
    <li>Term is how long the mortgage runs (usually 15 or 30 years.)</li>
    <li>Underwater is when the principal on your mortgage is worth more than your home is worth due to falling prices.</li>
  </ul>


 
 
                
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

