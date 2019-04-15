<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Additional Payment Calculator: Extra Principal Payments on Mortgage</title>		
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




function FVmonDep(prin,intRate,monDep,numMonths) {

var i = 0;
var int = 0;

intRate /= 100;
intRate /= 12;

if(prin == "" || prin == 0) {
   prin = 0;
}

for(i=1; i <= numMonths; i++) {
   int = prin * intRate;
   prin = eval(prin) + eval(int);
   prin = eval(prin) + eval(monDep);
}

return prin;

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


function calcMonths(form) {

   var VnumMonths = document.calc.getMonths.options[document.calc.getMonths.selectedIndex].value;
   document.calc.months.value = VnumMonths;

   clear_results(form);

}

function calc_pmts_made(my_bal, my_rate, my_pmt, my_pmts, my_type) {

   var my_dec_rate = my_rate;
   if(my_dec_rate >= 1) {
      my_dec_rate /= 100;
   }
   my_dec_rate /= 12;

   var my_prin = my_bal;
   var my_int_port = 0;
   var my_print_port = 0;
   var my_accum_int = 0;
   var my_pmt_cnt = 0;
   
   while(my_pmt_cnt < my_pmts) {

      my_pmt_cnt = Number(my_pmt_cnt) + Number(1);

      my_int_port = my_prin * my_dec_rate;
      my_accum_int = Number(my_accum_int) + Number(my_int_port);
      my_prin_port = Number(my_pmt) - Number(my_int_port);
      my_prin = Number(my_prin) - Number(my_prin_port);

   }

   if(my_type == 0) {
      return my_prin;
   } else {
      return my_accum_int;
   }

}


function calc_loan(my_bal, my_rate, my_pmt, my_pmts, my_ppy, my_type) {

   var my_dec_rate = my_rate;
   if(my_dec_rate >= 1) {
      my_dec_rate /= 100;
   }
   my_dec_rate /= my_ppy;

   var my_prin = my_bal;
   var my_int_port = 0;
   var my_print_port = 0;
   var my_accum_int = 0;
   var my_pmt_cnt = 0;

   //0 = pmts_left;
   //1 = interest_left;
   //2 = balance after my_pmts;

   if(my_type < 2) {
   
      while(my_prin > 0) {

         my_pmt_cnt = Number(my_pmt_cnt) + Number(1);

         if(my_pmt < (my_prin * (1 + my_dec_rate))) {
            my_int_port = my_prin * my_dec_rate;
            my_accum_int = Number(my_accum_int) + Number(my_int_port);
            my_prin_port = Number(my_pmt) - Number(my_int_port);
            my_prin = Number(my_prin) - Number(my_prin_port);
         } else {
            my_int_port = my_prin * my_dec_rate;
            my_accum_int = Number(my_accum_int) + Number(my_int_port);
            my_prin_port = Number(my_prin);
            my_prin = 0;
         }

      }

   } else {

      while(my_pmt_cnt < my_pmts) {

         my_pmt_cnt = Number(my_pmt_cnt) + Number(1);

         if(my_pmt < (my_prin * (1 + my_dec_rate))) {
            my_int_port = my_prin * my_dec_rate;
            my_accum_int = Number(my_accum_int) + Number(my_int_port);
            my_prin_port = Number(my_pmt) - Number(my_int_port);
            my_prin = Number(my_prin) - Number(my_prin_port);
         } else {
            my_int_port = my_prin * my_dec_rate;
            my_accum_int = Number(my_accum_int) + Number(my_int_port);
            my_prin_port = Number(my_prin);
            my_prin = 0;
         }

      }


   }

   if(my_type == 0) {
      return my_pmt_cnt;
   } else
   if(my_type == 1)  {
      return my_accum_int;
   } else {
      return my_prin;
   }

}

function computeForm(form) {

   if(document.calc.orig_prin.value == "") {

   } else 
   if(document.calc.int_rate.value == "") {

   } else
   if(document.calc.months.value == "") {

   } else
   if(document.calc.pmts_made.value == "") {

   } else {

      var Vorig_prin = sn(document.calc.orig_prin.value);
      var Vint_rate = sn(document.calc.int_rate.value);
      var Vmonths = sn(document.calc.months.value)*12;
      var Vpmts_made = sn(document.calc.pmts_made.value);
      var Vmo_add = sn(document.calc.mo_add.value);
      var Voexpenses = sn(document.calc.oexpenses.value);

      var Vwithout_pmt = computeMonthlyPayment(Vorig_prin, Vmonths, Vint_rate);
      document.calc.without_pmt.value = fns(Vwithout_pmt,2,1,1,1);
      document.calc.without_pmt_col.value = fns(Vwithout_pmt,2,1,1,1);
	  var Vwithout_pmt_col_total = Vwithout_pmt + Voexpenses;
      document.calc.without_pmt_col_total.value = fns(Vwithout_pmt_col_total,2,1,1,1);

      var Vwithout_x_pmt = Number(Vwithout_pmt) + Number(Vmo_add);
      document.calc.without_x_pmt_col.value = fns(Vwithout_x_pmt,2,1,1,1);
	  var Vwithout_x_pmt_col_total = Vwithout_x_pmt + Voexpenses;
      document.calc.without_x_pmt_col_total.value = fns(Vwithout_x_pmt_col_total,2,1,1,1);

      var Vwith_pmt = Vwithout_pmt / 2;
      document.calc.with_pmt_col.value = fns(Vwith_pmt,2,1,1,1);
	  var Vwith_pmt_col_total = Vwith_pmt + (Voexpenses*12/26);
      document.calc.with_pmt_col_total.value = fns(Vwith_pmt_col_total,2,1,1,1);

      var Vwith_x_pmt = (Number(Vwithout_pmt) + Number(Vmo_add)) / 2;
      document.calc.with_x_pmt_col.value = fns(Vwith_x_pmt,2,1,1,1);
	  var Vwith_x_pmt_col_total = Vwith_x_pmt + (Voexpenses*12/26);
      document.calc.with_x_pmt_col_total.value = fns(Vwith_x_pmt_col_total,2,1,1,1);

      var Vint_paid = calc_pmts_made(Vorig_prin,Vint_rate, Vwithout_pmt, Vpmts_made, 1);
      document.calc.int_paid.value = fns(Vint_paid,2,1,1,1);

      var Vcur_bal = calc_pmts_made(Vorig_prin,Vint_rate, Vwithout_pmt, Vpmts_made, 0);
      document.calc.cur_bal.value = fns(Vcur_bal,2,1,1,1);

      //YEARS TO PAY OFF
      var Vwithout_years =(Number( Vmonths) - Number(Vpmts_made)) / 12;
      document.calc.without_years.value = fns(Vwithout_years,1,0,0,0);

      var without_x_pmts = calc_loan(Vcur_bal, Vint_rate, Vwithout_x_pmt, 0, 12, 0);
      var Vwithout_x_years = without_x_pmts / 12;
      document.calc.without_x_years.value = fns(Vwithout_x_years,1,0,0,0);

      var with_pmts = calc_loan(Vcur_bal, Vint_rate, Vwith_pmt, 0, 26, 0);
      var Vwith_years = with_pmts / 26;
      document.calc.with_years.value = fns(Vwith_years,1,0,0,0);

      var with_x_pmts = calc_loan(Vcur_bal, Vint_rate, Vwith_x_pmt, 0, 26, 0);
      var Vwith_x_years = with_x_pmts / 26;
      document.calc.with_x_years.value = fns(Vwith_x_years,1,0,0,0);

      //INTEREST SAVINGS
      var without_int_cost = calc_loan(Vcur_bal, Vint_rate, Vwithout_pmt, 0, 12, 1);
      var Vwithout_int_savings = 0;
      document.calc.without_int_savings.value = "0";

      var without_x_int_cost = calc_loan(Vcur_bal, Vint_rate, Vwithout_x_pmt, 0, 12, 1);
      var Vwithout_x_int_savings = Number(without_int_cost) - Number(without_x_int_cost);
      document.calc.without_x_int_savings.value = fns(Vwithout_x_int_savings,2,1,1,1);

      var with_int_cost = calc_loan(Vcur_bal, Vint_rate, Vwith_pmt, 0, 26, 1);
      var Vwith_int_savings = Number(without_int_cost) - Number(with_int_cost);
      document.calc.with_int_savings.value = fns(Vwith_int_savings,2,1,1,1);

      var with_x_int_cost = calc_loan(Vcur_bal, Vint_rate, Vwith_x_pmt, 0, 26, 1);
      var Vwith_x_int_savings = Number(without_int_cost) - Number(with_x_int_cost);
      document.calc.with_x_int_savings.value = fns(Vwith_x_int_savings,2,1,1,1);

      //MONTHLY PAYMENTS ELIMINATED
      var Vwithout_pmts_elim = 0;
      document.calc.without_pmts_elim.value = "0";

      var Vwithout_x_pmts_elim = (Number(Vwithout_years) - Number(Vwithout_x_years)) * 12;
      document.calc.without_x_pmts_elim.value = fns(Vwithout_x_pmts_elim,1,0,0,0);

      var Vwith_pmts_elim = (Number(Vwithout_years) - Number(Vwith_years)) * 12;
      document.calc.with_pmts_elim.value = fns(Vwith_pmts_elim,1,0,0,0);

      var Vwith_x_pmts_elim = (Number(Vwithout_years) - Number(Vwith_x_years)) * 12;
      document.calc.with_x_pmts_elim.value = fns(Vwith_x_pmts_elim,1,0,0,0);

      //TOTAL PMT SAVINGS
      var Vwithout_pmt_savings = 0;
      document.calc.without_pmt_savings.value = "0";

      var Vwithout_x_pmt_savings = Vwithout_x_pmts_elim * Vwithout_pmt;
      document.calc.without_x_pmt_savings.value = fns(Vwithout_x_pmt_savings,2,1,1,1);

      var Vwith_pmt_savings = Vwith_pmts_elim * Vwithout_pmt;
      document.calc.with_pmt_savings.value = fns(Vwith_pmt_savings,2,1,1,1);

      var Vwith_x_pmt_savings = Vwith_x_pmts_elim * Vwithout_pmt;
      document.calc.with_x_pmt_savings.value = fns(Vwith_x_pmt_savings,2,1,1,1);

      //EQUITY AFTER 5 YEARS
      var Vwithout_bal_5 = calc_loan(Vcur_bal, Vint_rate, Vwithout_pmt, 60, 12, 2);
      var Vwithout_equity_5 = Number(Vorig_prin) - Number(Vwithout_bal_5);
      document.calc.without_equity_5.value = fns(Vwithout_equity_5,2,1,1,1);

      var Vwithout_x_bal_5 = calc_loan(Vcur_bal, Vint_rate, Vwithout_x_pmt, 60, 12, 2);
      var Vwithout_x_equity_5 = Number(Vorig_prin) - Number(Vwithout_x_bal_5);
      document.calc.without_x_equity_5.value = fns(Vwithout_x_equity_5,2,1,1,1);

      var Vwith_bal_5 = calc_loan(Vcur_bal, Vint_rate, Vwith_pmt, 130, 26, 2);
      var Vwith_equity_5 = Number(Vorig_prin) - Number(Vwith_bal_5);
      document.calc.with_equity_5.value = fns(Vwith_equity_5,2,1,1,1);

      var Vwith_x_bal_5 = calc_loan(Vcur_bal, Vint_rate, Vwith_x_pmt, 130, 26, 2);
      var Vwith_x_equity_5 = Number(Vorig_prin) - Number(Vwith_x_bal_5);
      document.calc.with_x_equity_5.value = fns(Vwith_x_equity_5,2,1,1,1);

      //EQUITY AFTER 10 YEARS
      var Vwithout_bal_10 = calc_loan(Vcur_bal, Vint_rate, Vwithout_pmt, 120, 12, 2);
      var Vwithout_equity_10 = Number(Vorig_prin) - Number(Vwithout_bal_10);
      document.calc.without_equity_10.value = fns(Vwithout_equity_10,2,1,1,1);

      var Vwithout_x_bal_10 = calc_loan(Vcur_bal, Vint_rate, Vwithout_x_pmt, 120, 12, 2);
      var Vwithout_x_equity_10 = Number(Vorig_prin) - Number(Vwithout_x_bal_10);
      document.calc.without_x_equity_10.value = fns(Vwithout_x_equity_10,2,1,1,1);

      var Vwith_bal_10 = calc_loan(Vcur_bal, Vint_rate, Vwith_pmt, 260, 26, 2);
      var Vwith_equity_10 = Number(Vorig_prin) - Number(Vwith_bal_10);
      document.calc.with_equity_10.value = fns(Vwith_equity_10,2,1,1,1);

      var Vwith_x_bal_10 = calc_loan(Vcur_bal, Vint_rate, Vwith_x_pmt, 260, 26, 2);
      var Vwith_x_equity_10 = Number(Vorig_prin) - Number(Vwith_x_bal_10);
      document.calc.with_x_equity_10.value = fns(Vwith_x_equity_10,2,1,1,1);

      //BALANCE DUE AFTER X YEARS
      document.calc.without_after_bal.value = fns(Vwith_x_years,1,0,0,0);

      var Vwithout_bal_pmts = Math.round(Vwith_x_years * 12);
      var Vwithout_bal_due = calc_loan(Vcur_bal, Vint_rate, Vwithout_pmt, Vwithout_bal_pmts, 12, 2);
      document.calc.without_bal_due.value = fns(Vwithout_bal_due,2,1,1,1);

      var Vwithout_x_bal_pmts = Math.round(Vwith_x_years * 12);
      var Vwithout_x_bal_due = calc_loan(Vcur_bal, Vint_rate, Vwithout_x_pmt, Vwithout_x_bal_pmts, 12, 2);
      document.calc.without_x_bal_due.value = fns(Vwithout_x_bal_due,2,1,1,1);

      var Vwith_bal_pmts = Math.round(Vwith_x_years * 26);
      var Vwith_bal_due = calc_loan(Vcur_bal, Vint_rate, Vwith_pmt, Vwith_bal_pmts, 26, 2);
      document.calc.with_bal_due.value = fns(Vwith_bal_due,2,1,1,1);

      var Vwith_x_bal_pmts = Math.round(Vwith_x_years * 26);
      var Vwith_x_bal_due = calc_loan(Vcur_bal, Vint_rate, Vwith_x_pmt, Vwith_x_bal_pmts, 26, 2);
      document.calc.with_x_bal_due.value = fns(Vwith_x_bal_due,2,1,1,1);

      //AVERAGE ANNUAL SAVINGS
      var Vwithout_avg_ann_save = 0;
      document.calc.without_avg_ann_save.value = "0";

      var Vwithout_x_avg_ann_save = Vwithout_x_int_savings / Vwithout_x_years;
      document.calc.without_x_avg_ann_save.value = fns(Vwithout_x_avg_ann_save,2,1,1,1);

      var Vwith_avg_ann_save = Vwith_int_savings / Vwith_years;
      document.calc.with_avg_ann_save.value = fns(Vwith_avg_ann_save,2,1,1,1);

      var Vwith_x_avg_ann_save = Vwith_x_int_savings / Vwith_x_years;
      document.calc.with_x_avg_ann_save.value = fns(Vwith_x_avg_ann_save,2,1,1,1);

      //AVERAGE MONTHLY SAVINGS
      var Vwithout_avg_mon_save = 0;
      document.calc.without_avg_mon_save.value = "0";

      var Vwithout_x_avg_mon_save = Vwithout_x_avg_ann_save / 12;
      document.calc.without_x_avg_mon_save.value = fns(Vwithout_x_avg_mon_save,2,1,1,1);

      var Vwith_avg_mon_save = Vwith_avg_ann_save / 12;
      document.calc.with_avg_mon_save.value = fns(Vwith_avg_mon_save,2,1,1,1);

      var Vwith_x_avg_mon_save = Vwith_x_avg_ann_save / 12;
      document.calc.with_x_avg_mon_save.value = fns(Vwith_x_avg_mon_save,2,1,1,1);

      //EQUIVALENT INTEREST RATE
      document.calc.without_equiv_rate.value = fns(Vint_rate,2,0,2,1);

      var without_x_total_paid = Number(Vcur_bal) + Number(without_x_int_cost);
      var without_x_equiv_pmt = without_x_total_paid / Vmonths;
      var Vwithout_x_equiv_rate = computeIntRate(Vmonths, Vcur_bal, without_x_equiv_pmt, Vint_rate);
      document.calc.without_x_equiv_rate.value = fns(Vwithout_x_equiv_rate,2,0,2,1);

      var with_total_paid = Number(Vcur_bal) + Number(with_int_cost);
      var with_equiv_pmt = with_total_paid / Vmonths;
      var Vwith_equiv_rate = computeIntRate(Vmonths, Vcur_bal, with_equiv_pmt, Vint_rate);
      document.calc.with_equiv_rate.value = fns(Vwith_equiv_rate,2,0,2,1);

      var with_x_total_paid = Number(Vcur_bal) + Number(with_x_int_cost);
      var with_x_equiv_pmt = with_x_total_paid / Vmonths;
      var Vwith_x_equiv_rate = computeIntRate(Vmonths, Vcur_bal, with_x_equiv_pmt, Vint_rate);
      document.calc.with_x_equiv_rate.value = fns(Vwith_x_equiv_rate,2,0,2,1);

      //CASH AVAILABLE AFTER X YEARS
      document.calc.without_cash_avail_yrs.value = fns(Vwithout_years,1,0,0,0);

      var Vwithout_cash_avail_30 = 0;
      document.calc.without_cash_avail_30.value = "0";

      var Vwithout_x_cash_avail_30 = FVmonDep(0, Vint_rate, Vwithout_x_pmt, Vwithout_x_pmts_elim);
      document.calc.without_x_cash_avail_30.value = fns(Vwithout_x_cash_avail_30,2,1,1,1);

      var Vwith_cash_avail_30 = FVmonDep(0, Vint_rate, Vwithout_pmt, Vwith_pmts_elim);
      document.calc.with_cash_avail_30.value = fns(Vwith_cash_avail_30,2,1,1,1);

      var Vwith_x_cash_avail_30 = FVmonDep(0, Vint_rate, Vwithout_pmt, Vwith_x_pmts_elim);
      document.calc.with_x_cash_avail_30.value = fns(Vwith_x_cash_avail_30,2,1,1,1);


   }
		
}

function createReport(col) {

   if(document.calc.cur_bal.value == "" || document.calc.cur_bal.value == 0) {
      alert("Please compute the top section of the form before attempting to create the payment schedule.");
      document.calc.cur_bal.focus();
   } else
      if(document.calc.int_rate.value == "" || document.calc.int_rate.value == 0) {
      alert("Please compute the top section of the form before attempting to create the payment schedule.");
      document.calc.int_rate.focus();
   } else
      if(document.calc.without_pmt_col.value == "" || document.calc.without_pmt_col.value == 0) {
      alert("Please compute the top section of the form before attempting to create the payment schedule.");
      document.calc.without_pmt_col.focus();
   } else
      if(document.calc.with_pmt_col.value == "" || document.calc.with_pmt_col.value == 0) {
      alert("Please compute the top section of the form before attempting to create the payment schedule.");
      document.calc.with_pmt_col.focus();
   } else
      if(document.calc.with_x_pmt_col.value == "" || document.calc.with_x_pmt_col.value == 0) {
      alert("Please compute the top section of the form before attempting to create the payment schedule.");
      document.calc.with_x_pmt_col.focus();
   } else {

      var Vprincipal = sn(document.calc.cur_bal.value);
      var VintRate = sn(document.calc.int_rate.value);

      var pmtAmt = 0;
      if(col == 1) {
         pmtAmt = sn(document.calc.without_pmt_col.value);
      } else
      if(col == 2) {
         pmtAmt = sn(document.calc.without_x_pmt_col.value);
      } else
      if(col == 3) {
         pmtAmt = sn(document.calc.with_pmt_col.value);
      } else {
         pmtAmt = sn(document.calc.with_x_pmt_col.value);
      }

      var prin = Vprincipal;
      var Vint = VintRate;
      if(Vint >= 1) {
         Vint /= 100;
      }

      var periodText = "";
      if(col > 2) {
         Vint /= 26;
         periodText = "Biweekly";
      } else {
         Vint /= 12;
         periodText = "Monthly";
      }

      var intPort = 0;
      var accumInt = 0;
      var prinPort = 0;
      var accumPrin = 0;
      var count = 0;
      var pmtRow = "";
      var pmtNum = 0;
      var reportStartDate = "";


      var Vmonth = Number(document.calc.month.selectedIndex) + Number(1);
      var Vday = Number(document.calc.day.selectedIndex) + Number(1);
      if(Vday > 28) {
         Vday = 28;
      }
      if(Vday < 1) {
         Vday = 1;
      }
      var Vyear = document.calc.year.value;
      var loanDate = (Vmonth + "/" + Vday + "/" + Vyear);

      var monthArr = new Array("blank","January","February","March","April","May","June","July","August","September","October","November","December","January");

      var biwkStrDate = monthArr[Vmonth] + " " + Vday + ", " + Vyear;

      var biwkDate = new Date(biwkStrDate);
      var biwkDay = biwkDate.getDay();
      //biwkDate = biwkDate.setDay(Vday);
      //biwkDate = biwkDate.setMonth(Vmonth);
      //biwkDate = biwkDate.setYear(Vyear);
      var biwkTime = biwkDate.getTime();
      //set to next Friday
      biwkTime = biwkTime + ((5 - biwkDay) * 86400000) - (86400000 * 14);

      //ADDED TO GO BACK TO LAST PAYMENT
      Vmonth = Number(Vmonth) - Number(1);
      if(Vmonth == 0) {
         Vmonth = 12;
         Vyear = Number(Vyear) - Number(1);
      }

      var newBiwkTime = 0;
      var nextBiwkDate = new Date();
      var nextBiwkTime = 0;
      var newNextBiwkTime = 0;
      var nextYear = 0;
      //biwkDate.setYear(Vyear);
      //biwkDate.setMonth(Vmonth);
      //biwkDate.setDate(Vday);

      var displayPmtAmt = 0;

      var accumYearPrin = 0;
      var accumYearInt = 0;

      while(prin > 0) {

         if(pmtAmt < (prin * (1 + Vint))) {

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

         if(col < 3) {
            Vmonth = Number(Vmonth) + Number(1);
            if(Vmonth == 13) {
               Vmonth = 1;
               Vyear = Number(Vyear) + Number(1);
            } else {
               Vmonth = Vmonth;
               Vyear = Vyear;
            }

         } else {

            biwkTime = biwkTime + (86400000 * 14);
            newBiwkTime = biwkDate.setTime(biwkTime);
            Vmonth = biwkDate.getMonth() + 1;
            Vday = biwkDate.getDate();
            Vyear = biwkDate.getFullYear();
            if(Vyear < 0) {
               Vyear += 0
            }

            nextBiwkTime = biwkTime + (86400000 * 14);
            newNextBiwkTime = nextBiwkDate.setTime(nextBiwkTime);
            nextYear = nextBiwkDate.getFullYear();
            if(nextYear < 0) {
               nextYear += 0;
            }

         }

         pmtString = (Vmonth + "/" + Vday + "/" + Vyear);

         //IF FIRST ITERATION, SET HIDDEN START DATE
         if(pmtNum == 1) {
            reportStartDate = pmtString;
         }

         pmtRow += "<tr><td align=right><font face='arial'><small>" + pmtNum + "</small></td>";
         pmtRow += "<td align=right><font face='arial'><small>" + pmtString + "</small></td>";
         pmtRow += "<td align=right><font face='arial'><small>" + fns(prinPort,2,1,1,1) + "</small></td>";
         pmtRow += "<td align=right><font face='arial'><small>" + fns(intPort,2,1,1,1) + "</small></td>";
         pmtRow += "<td align=right><font face='arial'><small>" + fns(displayPmtAmt,2,1,1,1) + "</small></td>";
         pmtRow += "<td align=right><font face='arial'><small>" + fns(prin,2,1,1,1) + "</small></td></tr>";

         if(col < 3 && Vmonth == 12) {

            pmtRow += "<tr bgcolor='#dddddd'><td align=right><font face='arial'><small>Total</small></td>";
            pmtRow += "<td align=left><font face='arial'><small>" + Vyear + "</small></td>";
            pmtRow += "<td align=right><font face='arial'><small>" + fns(accumYearPrin,2,1,1,1) + "</small></td>";
            pmtRow += "<td align=right><font face='arial'><small>" + fns(accumYearInt,2,1,1,1) + "</small></td>";
            pmtRow += "<td align=right><font face='arial'><small> </small></td>";
            pmtRow += "<td align=right><font face='arial'><small> </small></td></tr>";
            pmtRow += "";

            accumYearPrin = 0;
            accumYearInt = 0;

         }

         if(col > 2 && nextYear > Vyear) {

            pmtRow += "<tr bgcolor='#dddddd'><td align=right><font face='arial'><small>Total</small></td>";
            pmtRow += "<td align=left><font face='arial'><small>" + Vyear + "</small></td>";
            pmtRow += "<td align=right><font face='arial'><small>" + fns(accumYearPrin,2,1,1,1) + "</small></td>";
            pmtRow += "<td align=right><font face='arial'><small>" + fns(accumYearInt,2,1,1,1) + "</small></td>";
            pmtRow += "<td align=right><font face='arial'><small> </small></td>";
            pmtRow += "<td align=right><font face='arial'><small> </small></td></tr>";
            pmtRow += "";
            pmtRow += "";
            pmtRow += "";

            accumYearPrin = 0;
            accumYearInt = 0;

         }

         if(count > 780) {
            alert("Using your current entries you will never pay off this loan.");
            break;
         } else {
            continue;
         }

      }

      var part1 = "<head><title>Amortization Schedule</title></head>";
      part1 += "<b";
      part1 += "od";
      part1 += "y bgcolor= '#FFFFFF'><br /><br /><center>";
      part1 += "<font face='arial'><big><strong>Amortization Schedule</strong></big></center>";

      var newEffectiveRate = "";
      var interestSavings = "";
      var yearSavings = 0;
      if(col == 1) {
         newEffectiveRate = document.calc.without_equiv_rate.value;
         interestSavings = document.calc.without_int_savings.value;
         yearSavings = Number(document.calc.without_years.value) - Number(document.calc.without_years.value);
      } else
      if(col == 2) {
         newEffectiveRate = document.calc.without_x_equiv_rate.value;
         interestSavings = document.calc.without_x_int_savings.value;
         yearSavings = Number(document.calc.without_years.value) - Number(document.calc.with_x_years.value);
      } else
      if(col == 3) {
         newEffectiveRate = document.calc.with_equiv_rate.value;
         interestSavings = document.calc.with_int_savings.value;
         yearSavings = Number(document.calc.without_years.value) - Number(document.calc.with_years.value);
      } else {
         newEffectiveRate = document.calc.with_x_equiv_rate.value;
         interestSavings = document.calc.with_x_int_savings.value;
         yearSavings = Number(document.calc.without_years.value) - Number(document.calc.with_x_years.value);
      }

      var part2 = "<center><table border=1 cellpadding=2 cellspacing=0>";
      part2 += "<tr><td colspan=6><font face='arial'><small><strong>Start Date: " + reportStartDate + "<br />";
      part2 += "Principal: " + fns(Vprincipal,2,1,1,1) + "<br />";
      part2 += "# of " + periodText + " Payments: " + count + "<br />";
      part2 += "Current Interest Rate: " + fns(VintRate,2,1,2,1) + "<br />";
      part2 += "New Effective Interest Rate: " + newEffectiveRate + "<br />";
      part2 += "Payment: " + fns(pmtAmt,2,1,1,1) + "<br />";
      part2 += "Interest Savings: " + interestSavings + "<br />";
      part2 += "Paying Off Your Mortgage " + fns(yearSavings,1,0,0,0) + " Years Sooner</strong></small></td></tr>";
      part2 += "<tr><td colspan=6><center><font face='arial'><strong>Schedule of " + periodText + " Payments</strong><br />";
      part2 += "<font face='arial'><small><small>Please allow for slight rounding differences.";
      part2 += "</small></small></center></td></tr>";
      part2 += "<tr bgcolor='silver'><td align='center'><font face='arial'><small><strong>Pmt #</strong></small></td>";
      part2 += "<td align='center'><font face='arial'><small><strong>Date</strong></small></td>";
      part2 += "<td align='center'><font face='arial'><small><strong>Principal</strong></small></td>";
      part2 += "<td align='center'><font face='arial'><small><strong>Interest</strong></small></td>";
      part2 += "<td align='center'><font face='arial'><small><strong>Payment</strong></small></td>";
      part2 += "<td align='center'><font face='arial'><small><strong>Balance</strong></small></td></tr>";

      var part4 = "<tr><td colspan='2'><font face='arial'><small><strong>Grand Total</strong></small></td>";
      part4 += "<td align=right><font face='arial'><small><strong>" + fns(accumPrin,2,1,1,1) + "</strong></small></td>";
      part4 += "<td align=right><font face='arial'><small><strong>" + fns(accumInt,2,1,1,1) + "</strong></small></td>";
      part4 += "<td> </td><td> </td></tr></table><br /><center>";
      part4 += "<form method='post'><input type='button' value='Close Window' onClick='window.close()'>";
      part4 += "</form></center></body></html>";


      var schedule = (part1 + "" + part2 + "" + pmtRow + "" + part4 + "");

      reportWin = window.open("","","width=500,height=400,toolbar=yes,menubar=yes,scrollbars=yes");

      reportWin.document.write(schedule);

      reportWin.document.close();

   }

}


function clear_results(form) {

   document.calc.without_pmt.value = "";
   document.calc.int_paid.value = "";
   document.calc.cur_bal.value = "";

   document.calc.without_pmt_col.value = "";
   document.calc.without_x_pmt_col.value = "";
   document.calc.with_pmt_col.value = "";
   document.calc.with_x_pmt_col.value = "";

   document.calc.without_years.value = "";
   document.calc.without_x_years.value = "";
   document.calc.with_years.value = "";
   document.calc.with_x_years.value = "";

   document.calc.without_int_savings.value = "";
   document.calc.without_x_int_savings.value = "";
   document.calc.with_int_savings.value = "";
   document.calc.with_x_int_savings.value = "";

   document.calc.without_pmts_elim.value = "";
   document.calc.without_x_pmts_elim.value = "";
   document.calc.with_pmts_elim.value = "";
   document.calc.with_x_pmts_elim.value = "";

   document.calc.without_pmt_savings.value = "";
   document.calc.without_x_pmt_savings.value = "";
   document.calc.with_pmt_savings.value = "";
   document.calc.with_x_pmt_savings.value = "";

   document.calc.without_equity_5.value = "";
   document.calc.without_x_equity_5.value = "";
   document.calc.with_equity_5.value = "";
   document.calc.with_x_equity_5.value = "";

   document.calc.without_equity_10.value = "";
   document.calc.without_x_equity_10.value = "";
   document.calc.with_equity_10.value = "";
   document.calc.with_x_equity_10.value = "";

   document.calc.without_after_bal.value = "";


   document.calc.without_bal_due.value = "";
   document.calc.without_x_bal_due.value = "";
   document.calc.with_bal_due.value = "";
   document.calc.with_x_bal_due.value = "";

   document.calc.without_avg_ann_save.value = "";
   document.calc.without_x_avg_ann_save.value = "";
   document.calc.with_avg_ann_save.value = "";
   document.calc.with_x_avg_ann_save.value = "";

   document.calc.without_avg_mon_save.value = "";
   document.calc.without_x_avg_mon_save.value = "";
   document.calc.with_avg_mon_save.value = "";
   document.calc.with_x_avg_mon_save.value = "";

   document.calc.without_equiv_rate.value = "";
   document.calc.without_x_equiv_rate.value = "";
   document.calc.with_equiv_rate.value ="";
   document.calc.with_x_equiv_rate.value = "";

   document.calc.without_cash_avail_yrs.value = "";

   document.calc.without_cash_avail_30.value = "";
   document.calc.without_x_cash_avail_30.value = "";
   document.calc.with_cash_avail_30.value = "";
   document.calc.with_x_cash_avail_30.value = "";

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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/additional-payments.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				<div class="main-heading"><h1>Additional Mortgage Payment Calculator</h1>
</div>
                    <ul id="breadcrumbs">

                        <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
                        <li><a href="https://www.mortgagecalculator.biz/c/term-comparison.php">Compare Loans</a></li>
                        <li>Overpayment Calculation</li>
                    </ul>
                </div>   			<div class="bottom-section">
<p><img src="https://www.mortgagecalculator.biz/img/house-in-hands.jpg" alt="house" width="130" class="alignright" />            This free online calculator will show you how much you will save if you make 1/2 of your mortgage payment every two weeks instead of making a full mortgage payment once a month. In effect, you will be making one extra mortgage payment per year -- without hardly noticing the additional cash outflow. But, as you're about to discover, you will certainly notice the "increased" cash flow that will occur when you pay your mortgage off way ahead of schedule! But wait, this calculator will even show you what will happen if you go one step further by adding an additional amount of money to the monthly amount you're currently paying.
     </p>
<p><strong>This calculator allows you to figure the savings by adding an extra amount to your fixed monthly payments &amp; the potential savings by making biweekly payments. </strong>Enter your loan details, the extra monthly payment amount you would like to make &amp; click calculate.</p>

   				<div class="table-block">
<form name="calc" method="post" action="#">

 <table>
 <tbody>

 <tr>
 <td colspan="4">
 
 Original loan term (years):

 
 </td>
 <td align="center">
 <input type="number" name='months' size='12' value="30" onKeyUp="clear_results(this.form)" onfocus="this.value = this.value=='30'?'':this.value;" onblur="this.value = this.value==''?'30':this.value;"/>
 </td>
 </tr>

 <tr>
 <td colspan="4">
 
 Current mortgage's beginning loan amount:
 
 </td>
 <td align="center">
 <input type="number" step="any" name="orig_prin" size="7" value="250000" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='250000'?'':this.value;" onblur="this.value = this.value==''?'250000':this.value;" />
 </td>
 </tr>

 <tr>
 <td colspan="4">
 
Current interest rate (APR%)  <a href="#viewrates"><strong>Save More Locking in Low Rates</strong></a>:
 
 </td>
 <td align="center">
 <input type="number" step="any" name='int_rate' size='12' value="6" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='6'?'':this.value;" onblur="this.value = this.value==''?'6':this.value;"/>
 </td>
 </tr>

 <tr>
 <td colspan="4">
 
 Number of payments already made:
 
 </td>
 <td align="center">
 <input type="number" step="any" name="pmts_made" size="7" value="36" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='36'?'':this.value;" onblur="this.value = this.value==''?'36':this.value;"/>
 </td>
 </tr>

 <tr>
 <td colspan="3">
 
 Date next payment due:
 
 </td>
 <td align="center" colspan="2">
 <select name="month" id="month" size="1">
 <option value = "0">Jan</option>
 <option value = "1">Feb</option>
 <option value = "2">Mar</option>
 <option value = "3">Apr</option>
 <option value = "4">May</option>
 <option value = "5">Jun</option>
 <option value = "6">Jul</option>
 <option value = "7">Aug</option>
 <option value = "8">Sep</option>
 <option value = "9">Oct</option>
 <option value = "10">Nov</option>
 <option value = "11">Dec</option>
 </select>
 
  <script>
   document.getElementById('month').value = (new Date().getMonth());
</script>
 
 <select name="day" id="day" size="1">
 <option value = "1"> 1</option>
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
 <option value = "28" selected> 30</option>
 <option value = "28"> 31</option>
 </select>
 <script>
   document.getElementById('day').value = (new Date().getDate());
</script>

 <input name="year" type="number" id="year" value="2017" size="4" onclick="this.value=''">
 <script>
   document.getElementById('year').value = (new Date().getFullYear());
</script>
 </td>
 </tr>

 <tr>
 <td colspan="4">
 
 Extra amount you could comfortably add to the payment each month:
 
 </td>
 <td align="center">
 <input type="number" step="any" name='mo_add' size='12' value="200.00" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='200.00'?'':this.value;" onblur="this.value = this.value==''?'200.00':this.value;"/>
 </td>
 </tr>


 <tr>
 <td colspan="4">
 
 Other monthly homeownership expenses (taxes, insurance, maintenance, HOA, etc.):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="oexpenses" size="15" value="300"  tabindex="4"  onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='300'?'':this.value;" onblur="this.value = this.value==''?'300':this.value;"  />
 </td>
 </tr>

 <tr>
 <td align="center" colspan="3">
 <input type="reset" class="table-btn" value="Reset" />
 </td>
 <td align="center" colspan="2">
 <input type="button" class="table-btn" value="Calculate" onClick="computeForm(this.form)" />
 </td>

 </tr>

 <tr>
 <td colspan="4">
 
 Current mortgage payment less escrow:
 
 </td>
 <td align="center">
 <input type="text" name='without_pmt' size="7" />
 </td>
 </tr>

 <tr>
 <td colspan="4">
 
 Interest you've already paid:
 
 </td>
 <td align="center">
 <input type="text" name='int_paid' size="7" />
 </td>
 </tr>

 <tr>
 <td colspan="4">
 
 Current approximate balance of your mortgage:
 
 </td>
 <td align="center">
 <input type="text" name='cur_bal' size="7" />
 </td>
 </tr>

 <tr>
 <td align="center">
 <strong>
 Results
 
 </td>
 <td align="center">
 <strong>
 Current
 
 </td>
 <td align="center">
 <strong>
 Current Plus Extra
 
 </td>
 <td align="center">
 <strong>
 Bi-Weekly
 
 </td>
 <td align="center">
 <strong>
 Bi-Weekly plus Extra
 
 </td>
 </tr>

 <tr>
 <td>
 
 Mortgage P&amp;I payment:
 
 </td>
 <td align="center">
 <input type="text" name='without_pmt_col' size="7" />
 </td>
 <td align="center">
 <input type="text" name='without_x_pmt_col' size="7" />
 </td>
 <td align="center">
 <input type="text" name='with_pmt_col' size="7" />
 </td>
 <td align="center">
 <input type="text" name='with_x_pmt_col' size="7" />
 </td>
 </tr>

 <tr>
 <td>
 
 Total payment w other expenses:
 
 </td>
 <td align="center">
 <input type="text" name='without_pmt_col_total' size="7" />
 </td>
 <td align="center">
 <input type="text" name='without_x_pmt_col_total' size="7" />
 </td>
 <td align="center">
 <input type="text" name='with_pmt_col_total' size="7" />
 </td>
 <td align="center">
 <input type="text" name='with_x_pmt_col_total' size="7" />
 </td>
 </tr>


 <tr>
 <td>
 
 Years to pay off:
 
 </td>
 <td align="center">
 <input type="text" name='without_years' size="7" />
 </td>
 <td align="center">
 <input type="text" name='without_x_years' size="7" />
 </td>
 <td align="center">
 <input type="text" name='with_years' size="7" />
 </td>
 <td align="center">
 <input type="text" name='with_x_years' size="7" />
 </td>
 </tr>

 <tr>
 <td>
 
 Interest savings:
 
 </td>
 <td align="center">
 <input type="text" name='without_int_savings' size="7" />
 </td>
 <td align="center">
 <input type="text" name='without_x_int_savings' size="7" />
 </td>
 <td align="center">
 <input type="text" name='with_int_savings' size="7" />
 </td>
 <td align="center">
 <input type="text" name='with_x_int_savings' size="7" />
 </td>
 </tr>

 <tr>
 <td>
 
 Monthly payments eliminated:
 
 </td>
 <td align="center">
 <input type="text" name='without_pmts_elim' size="7" />
 </td>
 <td align="center">
 <input type="text" name='without_x_pmts_elim' size="7" />
 </td>
 <td align="center">
 <input type="text" name='with_pmts_elim' size="7" />
 </td>
 <td align="center">
 <input type="text" name='with_x_pmts_elim' size="7" />
 </td>
 </tr>

 <tr>
 <td>
 
 Total payment savings:
 
 </td>
 <td align="center">
 <input type="text" name='without_pmt_savings' size="7" />
 </td>
 <td align="center">
 <input type="text" name='without_x_pmt_savings' size="7" />
 </td>
 <td align="center">
 <input type="text" name='with_pmt_savings' size="7" />
 </td>
 <td align="center">
 <input type="text" name='with_x_pmt_savings' size="7" />
 </td>
 </tr>

 <tr>
 <td>
 
 Equity after 5 years:
 
 </td>
 <td align="center">
 <input type="text" name='without_equity_5' size="7" />
 </td>
 <td align="center">
 <input type="text" name='without_x_equity_5' size="7" />
 </td>
 <td align="center">
 <input type="text" name='with_equity_5' size="7" />
 </td>
 <td align="center">
 <input type="text" name='with_x_equity_5' size="7" />
 </td>
 </tr>

 <tr>
 <td>
 
 Equity after 10 years:
 
 </td>
 <td align="center">
 <input type="text" name='without_equity_10' size="7" />
 </td>
 <td align="center">
 <input type="text" name='without_x_equity_10' size="7" />
 </td>
 <td align="center">
 <input type="text" name='with_equity_10' size="7" />
 </td>
 <td align="center">
 <input type="text" name='with_x_equity_10' size="7" />
 </td>
 </tr>

 <tr>
 <td>
 
 Balance due after <input type="text" name="without_after_bal" size="6" /> years:
 
 </td>
 <td align="center">
 <input type="text" name='without_bal_due' size="7" />
 </td>
 <td align="center">
 <input type="text" name='without_x_bal_due' size="7" />
 </td>
 <td align="center">
 <input type="text" name='with_bal_due' size="7" />
 </td>
 <td align="center">
 <input type="text" name='with_x_bal_due' size="7" />
 </td>
 </tr>

 <tr>
 <td align="center">
 <strong>
 Results (continued)
 
 </td>
 <td align="center">
 <strong>
 Current
 
 </td>
 <td align="center">
 <strong>
 Current plus Extra
 
 </td>
 <td align="center">
 <strong>
 Bi-Weekly
 
 </td>
 <td align="center">
 <strong>
 Bi-Weekly plus Extra
 
 </td>
 </tr>

 <tr>
 <td>
 
 Average monthly savings:
 
 </td>
 <td align="center">
 <input type="text" name='without_avg_mon_save' size="7" />
 </td>
 <td align="center">
 <input type="text" name='without_x_avg_mon_save' size="7" />
 </td>
 <td align="center">
 <input type="text" name='with_avg_mon_save' size="7" />
 </td>
 <td align="center">
 <input type="text" name='with_x_avg_mon_save' size="7" />
 </td>
 </tr>

 <tr>
 <td>
 
 Average annual savings:
 
 </td>
 <td align="center">
 <input type="text" name='without_avg_ann_save' size="7" />
 </td>
 <td align="center">
 <input type="text" name='without_x_avg_ann_save' size="7" />
 </td>
 <td align="center">
 <input type="text" name='with_avg_ann_save' size="7" />
 </td>
 <td align="center">
 <input type="text" name='with_x_avg_ann_save' size="7" />
 </td>
 </tr>

 <tr>
 <td>
 
 Equivalent interest rate:
 
 </td>
 <td align="center">
 <input type="text" name='without_equiv_rate' size="7" />
 </td>
 <td align="center">
 <input type="text" name='without_x_equiv_rate' size="7" />
 </td>
 <td align="center">
 <input type="text" name='with_equiv_rate' size="7" />
 </td>
 <td align="center">
 <input type="text" name='with_x_equiv_rate' size="7" />
 </td>
 </tr>

 <tr>
 <td>
 
 Cash available after <input type="text" name="without_cash_avail_yrs" size="6" /> years:*
 
 </td>
 <td align="center">
 <input type="text" name='without_cash_avail_30' size="7" />
 </td>
 <td align="center">
 <input type="text" name='without_x_cash_avail_30' size="7" />
 </td>
 <td align="center">
 <input type="text" name='with_cash_avail_30' size="7" />
 </td>
 <td align="center">
 <input type="text" name='with_x_cash_avail_30' size="7" />
 </td>
 </tr>


 <tr>
 <td>
 
 Payment Schedules:**
 
 </td>
 <td align="center">
 <input type="button" value="Create" class="table-btn" onClick="createReport(1)" />
 </td>
 <td align="center">
 <input type="button" value="Create" class="table-btn" onClick="createReport(2)" />
 </td>
 <td align="center">
 <input type="button" value="Create" class="table-btn" onClick="createReport(3)" />
 </td>
 <td align="center">
 <input type="button" value="Create" class="table-btn" onClick="createReport(4)" />
 </td>
 </tr>

 <tr>
 <td colspan="5">
 
 <small>*Based upon a 10% yield of the money saved over the life of the loan.</small>
  
 </td>
 </tr>

 <tr>
 <td colspan="5">
 
 <small>**Payment schedules may take a while to appear -- depending on the speed of your computer and the number of payments remaining.</small>
  
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



<h2>Retiring a Mortgage with Extra Payments</h2>
<p> Many homeowners invest in home security systems to protect their   property and personal assets.  However, a security system will not   protect the homeowner against financial disaster or bankruptcy.  Making   additional mortgage payments will shrink the total amount of interest   paid over the life of the loan, and the borrower will pay off the debt   more quickly. In addition, the home equity will grow at a faster pace   when extra payments are applied to the loan.  This provides for a margin   of protection by lowering the interest costs. This method gives the   property owner a home free and clear of debt.  More payments on the   principal of the loan equate to assets earning interest at the same rate   as the interest rate on the loan.</p>
<p><img src="../img/additional-payments.png" width="630" height="472" alt="Additional Payments." /></p>
<h3>15 Year vs 30 Year Loans</h3>
<p>
  If a borrower makes an extra annual payment, the savings on interest can   be quite substantial.  On a 30-year mortgage with the original   principal total of $250,000 and an interest rate of 6.5 percent, the   monthly payment is $1,580, including both principal and interest.  By   making the scheduled payments over the life of the loan, the total   amount paid in interest will be $319,000.  However, if the homeowner   pays one additional monthly payment per year, the total interest paid   declines to $249,000, a difference of $70,000.  This payment strategy   shortens the loan from 30 years to just over 24 years.</p>
<p>
  An alternative to making one extra monthly payment per year is to make a   higher monthly payment.  For example, on a 15-year loan of $300,000 at 5   percent interest, adding $200 to each monthly payment reduces the   interest costs substantially.  If the monthly payment is $2,372, making a   payment of $2,572 saves $15,376 in interest over the life of the loan.    The loan is paid in full in 13.4 years instead of 15 years. </p>
<h3>Mortgage Cycling</h3>
<p>
  Borrowers have a variety of options for paying off home loans prior to   the maturity date.  One popular method is called mortgage cycling.    Although the concept may be new to some homeowners, the strategy has a   proven record of accomplishment when followed correctly.  The basic   strategy is easy to understand.  However, some methods of mortgage   cycling may involve higher risk to reward ratios. These techniques   include taking out short term home equity loans to make payments towards   the principal of the original mortgage.  Without an accurate analysis   of the borrower's financial situation, it is possible that the riskier   techniques can lead to higher interest costs and the prospect of   foreclosure.</p>
<p>
  The basic method of mortgage cycling pays down the principal balance   faster than scheduled.  Borrowers make the standard mortgage payment.    Then at regular intervals from once a year to every month, the homeowner   pays an additional amount towards the principal balance.  Frequently,   the recommended method suggests making an extra payment equal to the   principal amount owed on each monthly bill.  For a $100,000 loan at 6   percent interest for 30 years, the monthly payment is $599.55.  This   breaks down to a payment of $500 towards interest and $99.55 towards the   principal.  With mortgage cycling, the borrower sends in an additional   payment of $99.55 to be applied to the principal. </p>
<p>
  While not every borrower can schedule extra payments with standard   frequency, extra payments can come from other sources.  Even bi-annual   payments of significant size can reduce the term of the loan and the   total interest paid.  Consumers without a regular source of additional   funds have other options for taking advantage of mortgage cycling, such   as using tax refunds or cutting back on luxuries.</p>
<h3>Bi-weekly Payments</h3>
<p>Bi-weekly payments are another popular way to pay extra on a mortgage. Given that there are 12 months  and 52 weeks in a year, paying 26 bi-weekly payments is like paying 13 monthly payments, with the 13th payment going entirely toward the principal of the loan.</p>
<h3>Finding the Extra Funds</h3>
<p>
  Many homeowners do not consider making additional payments because they   believe their budgets will not provide for extra funds.  Yet, these same   individuals may use credit cards to purchase big-ticket items such as   televisions or the latest smart phone.  They may not stop to calculate   the monthly expense of a morning latte and scone.  $6.00 spent every day   on the way to work totals $120 monthly.  A thorough analysis of the   monthly budget can reveal many ways to save money that may be applied to   the mortgage.</p>
<p>Tax refunds represent another source of additional funds to make   payments on a home loan.  Many taxpayers receive sizable refunds.  These   funds can be dedicated to the loan easily.  Other sources can come from   financial awards or settlements from insurance companies.</p>
<p>
  The speed at which a home loan can be retired varies depending on the   extra amount paid and when it is applied to the principal. Making larger   payments earlier in the term will save the borrower a considerable   amount of interest.  For example, for a $160,000 loan with 7 percent   interest for 30 years, the payment would be $1064.40.  Of that, only   $131.83 is principal, and $932.57 is interest.  If the consumer pays an   additional amount equal to the principal, an entire month of the   duration of the loan is eliminated.</p>
<p>Practicing this discipline on a monthly basis would reduce the standard   30-year loan to 15 years.  However, as the loan progresses, the ratio of   interest and principal inverts so that eventually the principal   represents the majority of the payment.  A borrower continues to match   the principal amount with an additional payment. In the example above,   after one year of additional payments, the principal amount would   increase to $137.00.  Thus, most homeowners should plan to adjust the   budget as the loan matures. </p>
<p>
  While analyzing the various methods of making extra mortgage payments,   consumers should consider their individual financial status.  Some   consumers may find that withdrawing large amounts from savings accounts   can save thousands of dollars in interest expense on the mortgage.  Yet,   many financial advisors would caution against an overly aggressive   application of this approach.  Having a cushion of savings protects   against unforeseen expenses and can provide financial security during   times of economic difficulties.  Stocks, bonds and other liquid assets   can be sold to make additional mortgage payments.  A careful analysis of   the lost return on investment in comparison to the savings in interest   should be taken into account.  In addition, a consumer may wish to pay   off high interest credit cards prior to applying additional funds to a   mortgage.  This may prove to be a better strategy as interest on   mortgages is tax deductible whereas interest on unsecured credit is not   tax deductible. </p>
<p>
  If the borrower cannot count on steady sources of additional funds,   simply setting aside extra cash throughout the month for extra payments   will still lower the total cost of interest paid.  The amount can   fluctuate from month to month.</p>
<h3>Consider Taxes</h3>
<p>
  Borrowers considering a strategy to pay off a home loan early using   additional payments will need to calculate the effect on taxes as well.    Interest paid on mortgages can be tax deductible.  Thus, the government   helps the homeowner make the payments by reducing taxes.  On a 30-year   loan with a 7 percent interest rate, the government pitches in 1.89   percent of the cost of interest through the tax deduction.  This equates   to 27 percent of the 7 percent rate on the loan.  With the tax   deduction, the effective mortgage rate is 5.11 percent.  Depending on   the economy and investment opportunities, the homeowner may be able to   invest the additional money in higher yielding ventures.  However, the   rate of return on other investments will be taxed.</p>
<p>
  There are many reasons why homeowners may want to retire a mortgage   early. For strictly financial reasons, a borrower will want to compare   investment return rates after taxes.  The effective rate includes actual   tax benefits from the interest deduction.  An interest rate of 4.5   percent may be much lower after the tax deduction.  One key to making   the early payment strategy work is to be consistent.  One payment   towards the principal will make a small dent in the balance due.    However, when paid consistently over time, those payments will save the   homeowner thousands of dollars in interest payments. </p>



                
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

