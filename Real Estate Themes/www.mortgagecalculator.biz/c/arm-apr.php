<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>ARM APR Calculator: Calculate Your Effective Annual Interest Rate</title>		
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


function computeForm(report) {

   var Vprincipal = sn(document.calc.principal.value);
   var Vstart_rate = sn(document.calc.start_rate.value);
   var Vcur_index = sn(document.calc.cur_index.value);
   var Vpeak_index = sn(document.calc.peak_index.value);
   var Vmargin = sn(document.calc.margin.value);
   var Vstart_months = sn(document.calc.start_months.value);
   var Vadjust_months = sn(document.calc.adjust_months.value);
   var Vadjust_amt = sn(document.calc.adjust_amt.value);

   var alert_txt = "";

   if(Vprincipal == 0) {
   } else
   if(Vstart_rate == 0) {
   } else
   if(Vcur_index == 0) {
   } else
   if(Vmargin == 0) {
   } else
   if(Vstart_months == 0) {
   } else
   if(Vadjust_months == 0) {
   } else
   if(Vadjust_amt == 0) {
   } else {


      var Vrate_cap = Number(Vpeak_index) + Number(Vmargin);

      var VnumYears = sn(document.calc.numYears.value)
      var term_months = VnumYears * 12;

      var Vstart_pmt = computeMonthlyPayment(Vprincipal, term_months, Vstart_rate);



      var Vorig_fee_perc = sn(document.calc.orig_fee_perc.value);
      var Vpoints = sn(document.calc.points.value);
      var Vfees = sn(document.calc.fees.value);

      if(Vstart_rate > 25) {
      } else
      if(Vprincipal < 100) {
      } else
      if(Vprincipal > 100000000) {
      } else
      if(Vstart_months > 120) {
      } else
      if(Vadjust_months > 60) {
      } else
      if(Vadjust_amt > 5) {
      } else
      if(Vadjust_amt < -5) {
      } else {

         document.calc.start_pmt.value = fns(Vstart_pmt,2,1,1,1);

         var Vtotal_close = Number(Vorig_fee_perc / 100 * Vprincipal) + Number(Vpoints / 100 * Vprincipal) + Number(Vfees);
         document.calc.total_close.value = fns(Vtotal_close,2,1,1,1);

         var rate = Vstart_rate;
         var old_rate = Vstart_rate;
         var pmt = Vstart_pmt;
         var accum_pmts = 0;
         var new_rate = 0;
         var prin = Vprincipal;
         var int_port = 0;
         var accum_int = 0;
         var prin_port = 0;
         var accum_prin = 0;
         var cnt = 0;
         var adjust_nprs = 0;
         var new_term_months = 0;
         var i = 0;

         var pmtRows = "";

         while(cnt < term_months) {

            cnt += 1;

            if(cnt <= Vstart_months) {
               rate = Vstart_rate;
            } else {
               if((Number(cnt)-Number(1)-Number(Vstart_months)) % Vadjust_months == 0) {
                  adjust_nprs += 1;
                  new_term_months = Number(term_months) - Number(cnt) + Number(1);
                  rate = Number((adjust_nprs - 1) * Vadjust_amt) + Number(Vcur_index) + Number(Vmargin);
                  if(rate < 0) {
                     rate = 0;
                  }
                  if(rate > Vrate_cap) {
                     rate = Vrate_cap;
                  }
                  pmt = computeMonthlyPayment(prin, new_term_months, rate);
               }
            }

            i = rate / 100 / 12;

            if(cnt < term_months) {

               int_port = Math.round(prin * i * 100) / 100;
               accum_int += int_port;
               prin_port= Number(pmt) - Number(int_port);
               accum_prin = Number(accum_prin) + Number(prin_port);
               prin = Number(prin) - Number(prin_port);

            } else {

               int_port = Math.round(prin * i * 100) / 100;
               accum_int += int_port;
               prin_port= prin;
               accum_prin = Number(accum_prin) + Number(prin_port);
               prin = Number(prin) - Number(prin_port);
               pmt = Number(prin_port) + Number(int_port);
            }

            accum_pmts += pmt;
         
            if(report == 1) {
               pmtRows += "<tr><td align='right'><font face='arial'><small>" + cnt + "</small>";
               pmtRows += "</td><td align='right'><font face='arial'>";
               pmtRows += "<small>" + fns(rate,2,1,2,1) + "</small></td>";
               pmtRows += "<td align='right'><font face='arial'><small>" + fns(pmt,2,1,1,1) + "</small>";
               pmtRows += "</td><td align='right'><font face='arial'>";
               pmtRows += "<small>" + fns(prin_port,2,1,1,1) + "</small></td>";
               pmtRows += "<td align='right'><font face='arial'>";
               pmtRows += "<small>" + fns(int_port,2,1,1,1) + "</small></td>";
               pmtRows += "<td align='right'><font face='arial'>";
               pmtRows += "<small>" + fns(prin,2,1,1,1) + "</small></td></tr>";
            }

         }


         document.calc.total_pmts.value = fns(accum_pmts,2,1,1,1);
         document.calc.total_int.value = fns(accum_int,2,1,1,1);


         if(pmt > Vstart_pmt) {
            document.calc.full_pmt.value = fns(pmt,2,1,1,1);
         } else {
            document.calc.full_pmt.value = fns(Vstart_pmt,2,1,1,1);
         }

         var Vtot_repay = Number(Vprincipal) - Number(Vtotal_close);
         var Vavg_pmt = accum_pmts / term_months;

         var Vapr = computeIntRate(term_months, Vtot_repay, Vavg_pmt, rate)
         document.calc.apr.value = fns(Vapr,3,0,2,1);


         if(report == 1) {

            var part1 = "<html><head><title>Amortization Schedule</title></head>";
            part1 += "<b";
            part1 += "od";
            part1 += "y bgcolor= '#FFFFFF'>";
            part1 += "<br /><br /><center><font face='arial'><big>";
            part1 += "<strong>Adjustable Rate Mortgage Summary</strong></big></center><br />";


            var part2 = "<center><table border=1 cellpadding=2 cellspacing=0 bordercolor='#EEEEEE'>";
            part2 += "<tr><td colspan=4><font face='arial'><small>Mortgage loan amount:</small></td>";
            part2 += "<td colspan='2' align='right'><font face='arial'>";
            part2 += "<small>" + fns(Vprincipal,2,1,1,1) + "</small></td></tr>";
            part2 += "<tr><td colspan=4><font face='arial'><small>Mortgage term:</small></td>";
            part2 += "<td colspan='2' align='right'><font face='arial'><small>" + VnumYears + " years</small>";
            part2 += "</td></tr><tr><td colspan=4><font face='arial'><small>Beginning interest rate:";
            part2 += "</small></td><td colspan='2' align='right'><font face='arial'>";
            part2 += "<small>" + fns(Vstart_rate,3,0,2,1) + "</small></td></tr>";
            part2 += "<tr><td colspan=4><font face='arial'><small>Beginning monthly payment:";
            part2 += "</small></td><td colspan='2' align='right'><font face='arial'>";
            part2 += "<small>" + fns(Vstart_pmt,2,1,1,1) + "</small></td></tr>";
            part2 += "<tr><td colspan=4><font face='arial'><small>Fully indexed rate:</small>";
            part2 += "</td><td colspan='2' align='right'><font face='arial'>";
            part2 += "<small>" + fns(Vrate_cap,3,0,2,1) + "</small></td></tr>";
            part2 += "<tr><td colspan=4><font face='arial'><small>Average adjustment:";
            part2 += "</small></td><td colspan='2' align='right'><font face='arial'>";
            part2 += "<small>" + fns(Vadjust_amt,2,0,2,1) + "</small></td></tr>";
            part2 += "<tr><td colspan=4><font face='arial'><small>Initial fixed rate period:</small>";
            part2 += "</td><td colspan='2' align='right'><font face='arial'>";
            part2 += "<small>" + Vstart_months + " months</small></td></tr><tr>";
            part2 += "<td colspan=4><font face='arial'><small>";
            part2 += "Adjustment period:</small></td><td colspan='2' align='right'>";
            part2 += "<font face='arial'><small>" + Vadjust_months + " months</small>";
            part2 += "</td></tr><tr><td colspan=4><font face='arial'><small>Total of all";
            part2 += " monthly payments:</small></td><td colspan='2' align='right'>";
            part2 += "<font face='arial'><small>" + fns(accum_pmts,2,1,1,1) + "</small>";
            part2 += "</td></tr><tr><td colspan=4><font face='arial'><small>Total interest:";
            part2 += "</small></td><td colspan='2' align='right'><font face='arial'>";
            part2 += "<small>" + fns(accum_int,2,1,1,1) + "</small></td></tr>";
            part2 += "<tr><td colspan=6><center><font face='arial'><strong>Schedule of Payments</strong>";
            part2 += "<br /><font face='arial'><small><small>Please allow for slight ";
            part2 += "rounding differences.</small></small></center></td></tr>";
            part2 += "<tr bgcolor='silver'><td align='center'><font face='arial'><small>";
            part2 += "<strong>Pmt #</strong></small></td><td align='center'><font face='arial'>";
            part2 += "<small><strong>Rate</strong></small></td><td align='center'>";
            part2 += "<font face='arial'><small><strong>Payment</strong></small></td>";
            part2 += "<td align='center'><font face='arial'><small><strong>Principal</strong></small>";
            part2 += "</td><td align='center'><font face='arial'><small><strong>Interest</strong>";
            part2 += "</small></td><td align='center'><font face='arial'><small>";
            part2 += "<strong>Balance</strong></small></td></tr>";

            var part3 = ("" + pmtRows + "");

            var part4 = "<tr><td colspan='2'><font face='arial'><small><strong>Grand Total</strong></small>";
            part4 += "</td><td align='right'><font face='arial'><small>";
            part4 += "<strong>" + fns(accum_pmts,2,1,1,1) + "</strong></small>";
            part4 += "</td><td align='right'><font face='arial'><small>";
            part4 += "<strong>" + fns(accum_prin,2,1,1,1) + "</strong></small></td>";
            part4 += "<td align='right'><font face='arial'><small>";
            part4 += "<strong>" + fns(accum_int,2,1,1,1) + "</strong></small></td>";
            part4 += "<td> </td></tr></table><br /><center><form method='post'>";
            part4 += "<input type='button' value='Close Window' onClick='window.close()'>";
            part4 += "</form></center></body></html>";

            var schedule = (part1 + "" + part2 + "" + part3 + "" + part4 + "");

            reportWin = window.open("","","width=500,height=400,toolbar=yes,menubar=yes,scrollbars=yes");
            reportWin.document.write(schedule);
            reportWin.document.close();

         }

      }

   }

}

function clear_results(form) {

   document.calc.total_close.value = "";
   document.calc.start_pmt.value = "";
   document.calc.total_pmts.value = "";
   document.calc.total_int.value = "";
   document.calc.full_pmt.value = "";
   document.calc.apr.value = "";
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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/arm-apr.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				<div class="main-heading"><h1>Adjustable Rate Mortgage APR Calculator</h1>
</div>
                    <ul id="breadcrumbs">

                        <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
                        <li><a href="https://www.mortgagecalculator.biz/c/arm.php">ARM</a></li>
                        <li>Annual Percentage Rates</li>
                    </ul>
                </div>   			
                <div class="bottom-section">
<p><!-- pmms -->This calculator will help you to determine the effective interest rate (APR) of your adjustable rate mortgage (ARM) when including the upfront closing costs in the ARM mortgage calculations.              </p>
  
  <p>With mortgage rates near their historic lows, fixed rate home mortgages are likely going to be a much better deal if you plan on living in the house for an extended period of time, as when rates reset on ARM loans the prior short-term savings will likely be more than offset by the higher rates for the duration of the loan, which can cause the interest-only loan payment to exceed the amoritizing 30 year fixed rate payments if mortgage rates spike high enough. For your conveniene, Freddie Mac's PMMS rates have been included to the right.</p>

   				<div class="table-block">
<form name="calc" method="post" action="#">

 <table>
 <tbody>
 <tr>
 <td colspan="2">
 <strong>Loan information </strong>
 </td>
 </tr>

 <tr>
 <td>
 Mortgage loan amount:
 </td>
 <td align="center">
 <input type="number" step="0.01" name="principal" size="15" value="200000" onKeyUp="clear_results(this.form);computeForm(0)" onfocus="if(this.value==this.defaultValue)this.value=''" onblur="if(this.value=='')this.value=this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>
 <a href="#viewrates"><strong>Beginning interest rate</strong></a> (%):
 </td>
 <td align="center">
 <input type="number" step="any" name="start_rate" size="15" value="4.7" onKeyUp="clear_results(this.form);computeForm(0)" onfocus="if(this.value==this.defaultValue)this.value=''" onblur="if(this.value=='')this.value=this.defaultValue"/>
 </td>
 </tr>

 <tr>
 <td>
 Current index (%):
 </td>
 <td align="center">
 <input type="number" step="any" name="cur_index" size="15" value="3.5" onKeyUp="clear_results(this.form);computeForm(0)" onfocus="if(this.value==this.defaultValue)this.value=''" onblur="if(this.value=='')this.value=this.defaultValue"/>
 </td>
 </tr>

 <tr>
 <td>
 Margin (%):
 </td>
 <td align="center">
 <input type="number" step="any" name="margin" size="15" value="2.500" onKeyUp="clear_results(this.form);computeForm(0)" onfocus="if(this.value==this.defaultValue)this.value=''" onblur="if(this.value=='')this.value=this.defaultValue"/>
 </td>
 </tr>

 <tr>
   <td>Anticipated peak future index value (%):</td>
   <td align="center"><input type="number" step="any" name="peak_index" size="15" value="8" onKeyUp="clear_results(this.form);computeForm(0)" onfocus="if(this.value==this.defaultValue)this.value=''" onblur="if(this.value=='')this.value=this.defaultValue"/></td>
 </tr>
 <tr>
 <td>
 Mortgage loan term:
 </td>
 <td align="center">
 <input type="number" step="any" name="numYears" size="15" value="30" onKeyUp="clear_results(this.form);computeForm(0)" onfocus="if(this.value==this.defaultValue)this.value=''" onblur="if(this.value=='')this.value=this.defaultValue"/>
 </td>
 </tr>

 <tr>
 <td colspan="2">
 <strong>Adjustments </strong>
 </td>
 </tr>

 <tr>
 <td>
 Months before first rate adjustment:
 </td>
 <td align="center">
 <input type="number" name="start_months" size="15" value="12" onKeyUp="clear_results(this.form);computeForm(0)" onfocus="if(this.value==this.defaultValue)this.value=''" onblur="if(this.value=='')this.value=this.defaultValue"/>
 </td>
 </tr>

 <tr>
 <td>
 Months between adjustments:
 </td>
 <td align="center">
 <input type="number" name="adjust_months" size="15" value="12" onKeyUp="clear_results(this.form);computeForm(0)" onfocus="if(this.value==this.defaultValue)this.value=''" onblur="if(this.value=='')this.value=this.defaultValue"/>
 </td>
 </tr>

 <tr>
 <td>
 Typical anticipated adjustment (%):
 </td>
 <td align="center">
 <input type="number" step="any" name="adjust_amt" size="15" value="0.25" onKeyUp="clear_results(this.form);computeForm(0)" onfocus="if(this.value==this.defaultValue)this.value=''" onblur="if(this.value=='')this.value=this.defaultValue"/>
 </td>
 </tr>

 <tr>
 <td colspan="2">
 <strong>Closing Costs </strong>
 </td>
 </tr>

 <tr>
 <td>
 Origination fee percent (%):
 </td>
 <td align="center">
 <input type="number" step="any" name="orig_fee_perc" size="15" value="1" onKeyUp="clear_results(this.form);computeForm(0)" onfocus="if(this.value==this.defaultValue)this.value=''" onblur="if(this.value=='')this.value=this.defaultValue"/>
 </td>
 </tr>

 <tr>
 <td>
 Points paid (%):
 </td>
 <td align="center">
 <input type="number" step="any" name="points" size="15" value="1" onKeyUp="clear_results(this.form);computeForm(0)" onfocus="if(this.value==this.defaultValue)this.value=''" onblur="if(this.value=='')this.value=this.defaultValue"/>
 </td>
 </tr>

 <tr>
 <td>
 Other fees to include:
 </td>
 <td align="center">
 <input type="number" step="0.01" name="fees" size="15" value="1000" onKeyUp="clear_results(this.form);computeForm(0)" onfocus="if(this.value==this.defaultValue)this.value=''" onblur="if(this.value=='')this.value=this.defaultValue"/>
 </td>
 </tr>

 <tr>
 <td align='center'>
 <input type="reset" class="table-btn"  value="Reset" />
 </td>
 <td align='center'>
 <input type="button" name="compute" class="table-btn"  value="Calculate Payments" onClick="computeForm(0)" />
 </td>
 </tr>

 <tr>
 <td>
 Total closing costs:
 </td>
 <td align="center">
 <input type="text" name="total_close" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 Beginning monthly principal and interest payment:
 </td>
 <td align="center">
 <input type="text" name="start_pmt" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 Fully indexed payment:
 </td>
 <td align="center">
 <input type="text" name="full_pmt" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 Total monthly payments:
 </td>
 <td align="center">
 <input type="text" name="total_pmts" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 Total interest:
 </td>
 <td align="center">
 <input type="text" name="total_int" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 Adjustable rate mortgage APR:
 </td>
 <td align="center">
 <input type="text" name="apr" size="15" />
 </td>
 </tr>


 <tr>
 <td colspan="2" align="center">
 <input type="button" name="compute" class="table-btn"  value="Create P&I Amortization Schedule" onClick="computeForm(1)" />
 </td>
 </tr>



 </tbody>
 </table>
 </form>
 </div>

<p>&nbsp;</p>
<a name="viewrates"></a> 
<h3>Mortgage Rates</h3>
<div class="myFinance-widget" data-widget-id="0e398780-2190-4caf-9640-aecf30df3c9c" data-show-filters="true" data-product="5/1 arm" data-property-value="250000" data-purchase-price="250000" data-percent="20" data-current-loan-balance="200000"  data-table-title="Save Money With Today's Low Adjustable Mortgage Rates" data-campaign="mortcalcbiz_fulltable_mortgage"></div>


<h2>Adjustable Rates &amp; The Mortgage Marketplace</h2>
<p>When it's time to buy a house, there are several things to take into   consideration. It isn't all "location, location, location" as the old   real estate adage goes. </p>
<p>
Not only does a perspective home owner have to determine how many   bedrooms, bathrooms and square footage they want, or can afford, there   is also the matter of how to pay for the home.</p>
<p>
Looking as various ways to buy a house, at getting a mortgage, there are   fewer choices available than there were a few years ago. During the   days of the real estate boom, lenders across the country were more   willing to give out loans that were out of the ordinary, and based on   risky terms. Since the housing market collapse, however, mortgage   lenders have returned to safe and traditional forms of home financing.</p>
<p>
People interested in purchasing a home will find three basic types of   mortgage loans: fixed rate, adjustable rate and interest only loans.</p>
<p>
As with any loan, mortgages of each type include interest. Monthly   payments will be based the type of loan, the terms of the loan and the   interest rate the home buyer is able to get from the lender.</p>
<p>
Mortgage interest rates go up and down in concert with the stock market.   When the stock market is strong, interest rates are higher. When the   stock market slows down, interest rates drop. </p>
<p>
As a rule, all mortgage lenders have the capability to offer the same   rates. When a perspective home buyer shops for rates, they need to make   sure they compare rates on the same day, at the same time, on the same   program to get a true picture of what is available. </p>
<p>
Mortgage rates most closely follow the 10 year Treasury bond, but this   is not an exact science. This is only used as a benchmark.</p>
<p>
Benchmarks are customarily used to set mortgage rates. The benchmark   rate is the rate mortgage lenders must use to qualify mortgage borrowers   who want a variable rate mortgage or a fixed rate mortgage of less than   5 years.</p>
<p>
As a rule, the benchmark rate is about 1.50 percent higher than a mortgage broker's best rates</p>
<p><img src="../img/house-drawing.png" width="630" height="425" alt="Drawing of a House." /></p>
<h3>
  Fixed-Rate Mortgages</h3>
<p>
A fixed-rate mortgage (FRM) is a loan where the interest rate on the   note remains the same through the life of the loan. The amount of the   loan plus interest is broken into equal monthly payments. As a result,   payment amounts and the duration of the loan are fixed and the person   who is making the payments on the loan gets the benefit of having a   consistent, single payment and is able to plan a budget based on a fixed   cost for a specific number of years.</p>
<p>
With a FRM, the interest payments are added to the front of the loan.   Because of this, for the first several years of the mortgage, only a   small portion of each monthly payment goes to paying off the principal.   The majority of the payment pays the interest.</p>
<p>
Fixed rate mortgages are the most common form of home loans in the   United States.  Fixed-rate mortgages can be for 10 years, 15 years or   20, but most popular is the 30-year because that makes payments the   lowest.</p>
<p>
An extremely long mortgage term offers few advantages to consumers. On a   fully amortized 30-year fixed-rate loan at 5.25 percent for $250,000,   the payments would be $1,380 per month. When the same interest rate and   principal are drawn out for another 10 years, to a 40-year note, the   payments drop to $1,247 per month. The home buyer saves $133 per month   but it adds 10 years to their mortgage with a net cost of an additional   $100,000.</p>
<p>
It should be kept in mind that the interest rate for the loan is   'floating' until the home buyer locks it in with their lender. Once the   rate is locked in, the lender will provide the borrower with a   disclosure statement showing that the rate is set. Once this is done,   the lender has set aside the mortgage money for the home buyer and is   has the agreed upon rate locked in. The borrower is then protected if   rates go up.</p>
<p>
Mortgage interest rates are different for adjustable rate mortgages and fixed rate mortgages</p>
<p>
Unlike adjustable rate mortgages, fixed rate mortgages are not connected   to an index. Instead, the interest rate is set (or "fixed") in advance   to a publicized rate. Interest rates are usually shown in increments of   1/4 or 1/8 percent.</p>
<p>
The fixed monthly payment for a fixed-rate mortgage is the amount paid   by the borrower every month that ensures that the loan is paid off in   full with interest by the end of its term.</p>
<p>
A fixed rate mortgage usually costs the borrower more than an adjustable   rate mortgage does. Because of the intrinsic interest rate risk, long   term fixed rate loans will usually to have a higher interest rate than a   short term loan. The relationship between interest rates for short term   and long term loans is expressed by the yield curve, which generally   slopes upward with longer term loans being more expensive. For the short   term loans, the curve slopes down and is known as an inverted yield   curve. This occurs less often.</p>
<p>
Just because a fixed rate mortgage has a higher starting interest rate   does not mean that it is a worse form of borrowing as compared to an   adjustable rate mortgage. If interest rates go up, adjustable rate   mortgage rates and payments will also go up while the FRM will remain   the same.</p>
<p>
What this mean is that, in effect, the lender is to taking the interest   rate risk on a fixed rate loan. There are studies which show that the   majority of home buyers with adjustable rate mortgages tend to save   money in the long term, but that some others will end up paying more.   The potential to save money is offset by the risk of possibly higher   costs. In each case, home buyers will need to make a loan choice based   on the length of the loan, the current available interest rates, and the   odds that the rates will go up or down during the life of the loan.</p>
<p>
Longer term fixed rate mortgages are a better deal for consumers as a   rule.  If interest rates go down, a home buyer can refinance their   mortgage at the new lower rate. If interest rates go up, the home buyer   is protected with a fixed rate that it locked in.</p>
<p>
The biggest differences between 15- and 30-year loans are obvious.   Fifteen-year loans have higher monthly payments, but the home buyer pays   less interest, while 30-year mortgages may have lower monthly payments,   but the home buyer will pay more for the house over the length of the   loan. There are other important things to consider when deciding which   loan to go for, such as retirement savings, how much financial risk the   borrower is willing to take, and the ability to sustain the payment. As   with most other areas of personal finance, this decision is about more   than just the math.</p>
<h4>
  Advantages</h4>
<ul class="arrow">
  <li>
    	Rates and payments stay the same for the life of the loan. There   won't be any surprises even if interest rates rise out of control and   mortgage rates head to 20 percent.</li>
  <li> Loan stability makes it easier for setting a budget. People can   manage their money with more certainty because their house payments   don't change.</li>
  <li> FRM loans are easy to understand, so they're good for first-time   buyers who wouldn't know a 7/1 ARM with 2/6 caps if it jumped up and bit   them in the nose.</li>
</ul>
<h4>
  Disadvantages </h4>
<ul class="arrow">
  <li>
    	In order for borrowers to take advantage of falling rates, these   mortgage holders would have to refinance their mortgage. That could mean   as much as a few thousand dollars in closing costs, another trip to the   title company's office and several hours spent digging up financial   information the lender needs.</li>
  <li> Refinancing can be too expensive for some borrowers, especially in   high-rate environments, because there is no early on payment and rate   break.</li>
  <li> FRMs are pretty much identical from lender to lender. While lenders   have many types of ARMs available, most lending institutions sell their   fixed rate mortgages on the secondary mortgage market. As a result, ARMs   can be made to fit for any individual borrower, while most fixed rate   mortgages cannot.</li>
</ul>
<h3>
  Adjustable Rate Mortgage</h3>
<p>
Unlike a fixed rate home loan, which has a fixed interest rate for the   life of the loan, the interest rate on an adjustable rate mortgage, or   ARM, changes at contracts, agreed upon intervals. </p>
<p>
After the initial, fixed rate period, most ARMs adjust every year on the   anniversary of the mortgage. In reality, the new rate is set about 45   days before the anniversary date, based on the specified index used. But   some rates adjust as often as every month. If that's too much risk for a   home buyer, a fixed rate mortgage is the better choice.</p>
<p>
The essential features of ARMs include:</p>
<ul class="arrow">
  <li><strong>
    	Initial interest rate.</strong> This is the interest rate that is used at the beginning of the ARM.</li>
  <li><strong>The adjustment period.</strong> This is the number of years that the interest   rate on an ARM will stay unchanged. The interest rate is reset at the   end of this period, and the monthly loan payments are recalculated.</li>
  <li><strong>The index rate.</strong> Most lenders connect ARM interest rate changes to   changes in a common index rate. Mortgage lenders base ARM rates on a   variety of indices, the most common being on one-, three-, or five-year   Treasury securities. Another common index is the national or regional   average cost of funds to savings and loans.</li>
  <li><strong>The margin.</strong> This is the percentage points that mortgage lenders add   on to the index rate to determine the ARM's initial interest rate.</li>
  <li><strong>Interest rate caps.</strong> These are contracted limits stating on how much   the interest rate or the monthly payment can be changed at the end of   each adjustment period or over the life of the loan.</li>
  <li><strong>Initial discounts.</strong> These are special interest rates, often used to   entice customers, offered for the first year or more of a loan. They   lower the interest rate below the prevailing rate, which is the index   plus the margin.</li>
  <li><strong> Negative amortization. </strong>This is defined as the increasing of the   mortgage balance. This happens when the monthly payments are not enough   to pay all of the interest due on the mortgage. This may happen when the   payment cap negotiated in the ARM is so low that the principal plus   interest payment required is greater than the payment cap allows.</li>
  <li><strong> Conversion.</strong> This is an agreement with between the lender and the home   buyer that allows the buyer to convert the ARM to a fixed-rate mortgage   at specific times during the life of the mortgage.</li>
  <li><strong> Prepayment.</strong> Some loan contracts may require the home buyer to pay   special fees or penalties if the ARM is paid off early. Prepayment terms   are usually negotiable.</li>
</ul>
<p>
Any mortgage loan where monthly payments made by the home buyer may   increase over time brings with it the inherent risk of financial   hardship.  To reduce this risk, limitations on charges - known as caps -   are common features of adjustable rate mortgages.  Caps normally apply   to three characteristics of the mortgage:</p>
<ul class="arrow">
  <li> When the interest change can be made </li>
  <li>How often the interest rate can be changed</li>
  <li>How much the interest rate can be changed over the life of the loan, often called life cap.</li>
</ul>
<p>
For example, on one ARM, there might be the following types of interest rate caps:</p>
<ul class="arrow">
  <li>
    Changes in the interest rate may be made every six months, usually a 1 percent per adjustment, 2 percent total per year</li>
  <li>Changes in the interest rate may only be made once a year, usually a 2 percent maximum change</li>
  <li> Changes in the interest rate may be no more than 1 percent in a year</li>
  <li>Life of the loan interest rate adjustment caps:
    <ul class="arrow">
      <li>The total interest rate adjustment on an ARM is usually limited to 5 or 6 percent for the life of the loan.</li>
      <li>Caps on how often the interest rate can be changed may be broken up into   one limit for the first interest rate change and a different limit on   following  periodic changes, for example a 5 percent change on the first   adjustment and the 2 percent change on ensuing adjustments.</li>
    </ul>
  </li>
</ul>
<p>
Interest rate changes are part of the risk inherent in an adjustable   rate mortgage.  The interest rate and the payment based on that rate are   fixed for a specific number of years. Because the payment is usually be   based on only the interest, the borrower is not paying down on the   principal. When the interest rate it resets, the payment can go up   pretty significantly, even if the interest rate doesn't change very   much.</p>
<h4>
  Advantages</h4>
<ul class="arrow">
  <li>
    	 Features lower rates and payments at the beginning of the loan term.   Because lenders can use the lower payment when qualifying borrowers,   borrowers can often buy a larger home than they could otherwise afford.</li>
  <li>Allows borrowers to benefit from falling rates without having to   refinance their mortgage. Instead of having to pay closing costs and   fees for refinancing, ARM borrowers just sit back and watch the rates -   and their monthly payments – go down with the interest rates.</li>
  <li>Helps borrowers save more money and invest it. Borrowers who have a   payment that is $100 less can save that money and earn more off it in an   investment.</li>
  <li> Offers a less expensive way for borrowers who don't plan on living in one place for very long to buy a house.</li>
</ul>
<h4>
  Disadvantages</h4>
<ul class="arrow">
  <li>
    	Interest rates and borrower payments can rise drastically over the   life of the mortgage. A 6 percent ARM could end up being an 11 percent   ARM in just three years if interest rates rise sharply.</li>
  <li>The first adjustment can be dramatic because some annual caps don't   apply to the first adjustment. A borrower with an annual cap of 2   percent and a lifetime cap of 6 percent could, theoretically, see the   interest rate shoot from 6 percent to 12 percent a year if rates   everywhere skyrocket.</li>
  <li>ARMs are very involved and hard to understand. Lenders have a lot of   flexibility when setting margins, caps, adjustment indexes and other   things, so uneducated borrowers can get confused easily or taken   advantage of by less than honest mortgage companies.</li>
  <li> On certain ARMs, called negative amortization loans, mortgagees can   end up owing more money than they did when they took out the loan.   That's because the payments on this type of loan are set so low to make   them even more affordable that they cover only part of the interest that   is due. The unpaid portion of the interest gets rolled into the   principal balance.</li>
</ul>
<h3>
  Interest Only Mortgage</h3>
<p>
An interest only mortgage is one in which the borrower only has to pay   off the interest that accrues on the money that is borrowed. Because   only the interest is being paid, the interest payments remain fairly   constant throughout the term of the mortgage. However, interest-only   mortgages do not last forever.  The borrower will eventually have to pay   off the principal of the loan.</p>
<p>
Interest only mortgages can be a good choice for first-time home buyers   because it lets young people to put off large payments until their   incomes grow and they become more stable.  At the end of the interest   only mortgage term, the home buyer can do a couple of different things.   They can either renew the interest only mortgage for another set term or   they can repay the loan it through standard means, such as entering   into a fixed rate or an adjustable rate mortgage.</p>
<p>
There are several things to do to prepare a perspective home buyers'   financial situation to make it ready for getting a mortgage. Saving up   money for a down payment and closing costs, making sure the borrowers'   credit score is high enough and credit report is in good shape are   necessary steps to take to buy a home.</p>
<h3>Credit Costs &amp; Limitations</h3>
<h4>
  Cleaning Up Credit Ratings</h4>
<p>
The higher a credit score a person has, the easier it will be to borrow   money at a low interest rate. To make sure a home buyer can get the best   possible deal, they should check out their credit score by ordering a   copy of their full credit report. A free credit reports that they can   get will list all of their creditors but it doesn't necessarily give   them their numerical credit score, often referred to as a FICO score. </p>
<p>
Home buyers should check their credit score well in advance of when they   are ready to get a loan, so that they will have time to take any   necessary steps to repair any identified problems on their credit report   before applying for a mortgage.</p>
<p>
If the credit score is low, the future home buyer should spend at least   six months making all loan payments on time, paying down or paying off   the balances on their credit cards, closing cards that aren't used, and   not opening new cards or getting into any other kind of debt. Always   remember that good credit is not built in a short amount of time. It is   best to show lenders a longer time frame to look at: a substantial   history of good credit is always better than a short period of good   history.</p>
<p>
It is advised that borrowers should check their credit reports each year   from the three major credit reporting agencies, Experian®, Equifax® and   TransUnion®. Mistakes on a person's credit report can pull down their   credit score and need to be addressed. </p>
<p>
If a person's bad money habits are pulling down their credit scores, now   is the time to change the. If someone is considering getting a   mortgage, they need to understand that their FICO score cannot be   repaired in 90 days. It can take anywhere from six months to a year.</p>
<p>
So, what credit score does a person need to get a mortgage? Following   the collapse of the housing market and in the wake of the mortgage   foreclosure crisis, lenders have raised their minimum credit score   requirements. </p>
<p>
The government-sponsored enterprises (GSEs) Fannie Mae and Freddie Mac,   for example, don't just have minimum credit score requirements: for   every twenty points that an applicant's credit score falls below 740,   they have to pay equally incremental higher fees. Yet many lending   experts have stated that credit scoring is highly unreliable and is not   really a good predictor of the whether or not a home buyer can afford a   mortgage.</p>
<h4>
  Credit Reporting is Not Always Reliable</h4>
<p>
Fannie Mae and Freddie Mac will provide a mortgage to someone with a 620   credit score, although they will probably require the borrower to have a   big income, lots of assets, and a huge down payment.  On the other   hand, Fannie Mae and Freddie Mac won't touch someone with a 619 score.</p>
<p>
So is giving a mortgage to someone with a 619 score a greater risk than   giving one to someone with a 620 score? Is the credit scoring model that   precise? No, it isn't.</p>
<p>
A person needs to consider the information that goes into how the credit   score is arrived at. Almost everyone's credit report contains errors,   through no fault of their own. Some creditors update their accounts   immediately; some can take months; some creditors don't update their   accounts at all. Some credit reporting firms are accurate; others are   sloppy. </p>
<p>
If, for example, a person shops for a mortgage or car loan, all of the   credit score inquiries requested in a 30-day period are supposed to   count as just one inquiry for credit scoring purposes - but that doesn't   always happen. If the lender doesn't input a specific code showing the   reason for the inquiry, each request can deduct five points from a   person's score. </p>
<p>
Other common errors include not reporting a person's high credit limit.   Using the high limit is 35% of a person's score and not using it hurts   the overall score.  Reporting home equity loans as revolving accounts   like credit cards can make it look like a person has too much revolving   credit, which, again, hurts someone's credit score. </p>
<h4>
  What can be done </h4>
<p>
One good thing about the way mortgages are priced is that bringing up a   credit score by even a few points can save a home buyer thousands in   fees. For example, if a home buyer is applying for a 95 percent loan,   improving their credit score from 679 to 680 drops 1.5 points from their   fees. That's a $3,000 savings on a $200,000 loan.</p>
<p>
Unfortunately, the burden is on the borrower to find and correct credit   report errors. If a person is applying for a mortgage and needs to get   their report fixed fast, there is hope. The perspective home buyer will   need proof that the erroneous information is incorrect. They then   provide this proof to their mortgage lender, and it employs a rapid   re-scorer to fix the borrower's credit report. Rapid re-scorers will   only work with mortgage lenders. Borrowers can't go to rapid re-scorers   directly for help. </p>
<p>
Another option that may be available to the borrower is re-aging. If a   person has a good payment history with a creditor, and then makes a late   payment, the creditor may agree to re-age the account. That means the   payment is not considered as late.</p>
<h3>   VA Mortgages </h3>
<p>
The VA home loan program was established in 1944 when the Servicemen's   Readjustment Act added a group of benefits to eligible service members.   It is over seen by the US Department of Veterans Affairs - the VA.</p>
<p>
The VA does not actually lend people money; it guarantees reimbursement   to VA mortgage lenders if the borrower fails to repay a VA home loan.   Because of this guaranty, it reduces the monetary risk to mortgage   lenders, making VA home loans widely available at reasonable interest   rates. VA mortgage lenders offer a wide scope of home loans designed to   meet the needs of veterans, including:</p>
<ul class="arrow">
  <li>
    	Money to build a single family home</li>
  <li>Money for buying a single family home, a condominium unit in a VA-approved development, or a co-op unit</li>
  <li> Money to repair, renovate or upgrade a veteran's primary residence</li>
  <li>Money to refinance an existing mortgage</li>
  <li> Money to buy a manufactured home and/or lot</li>
  <li> Money to install energy-efficient improvements like solar heating or cooling systems to an existing home</li>
</ul>
<p>
VA home loans are especially fitting for eligible veterans and their   families who need to a mortgage for more than 80 percent of a home's   appraised value or purchase price, because mortgage insurance is not   required. </p>
<h3>
  FHA Mortgages</h3>
<p>
FHA does not add extra charges for lower credit scores, so if a home   buyer's  FICO is lower than 740, they won't have to pay extra if they   choose FHA financing. FHA also sets its minimum credit scores at 580 for   a home loan with a 3.5 percent down payment and 500 for a mortgage with   10 percent down payment. </p>
<p>
That's the ideal "on paper" requirements. In actuality, though, it's   extremely difficult o get a mortgage with very low credit scores. FHA   may agree to issue a mortgage that way, but 80 percent of other mortgage   lenders have more strict requirements, including having a minimum   credit scores ranging from 600 to 660. </p>
<p>
The FHA ranks participating banks on how well their insured loans do.   Poorer-than-average performance can mean that a lender may lose its FHA   approval. Because of this, banks have almost no reason to give a   mortgage to someone with a lower than 580 FICO. Low FICO loans are just   as profitable as high FICO loans but they are also much riskier.  That's   just one of the reasons that the average credit score for successful   FHA borrowers is over 700.</p>
<h3>
  Pre-Qualification and Pre-Approval </h3>
<p>
A lender can give a perspective home buyer an idea of how much they can   borrow by pre-qualifying them for a mortgage. To pre-qualify, a borrower   will meet with a lender and give them information about their assets,   income and other monies they have going out.</p>
<p>
Based on the information the borrower provides, the lender can give them   an estimate how much money they will be able to borrow. Knowing this   amount beforehand will allow the perspective home buyer to have an idea   of the price range of homes they can afford before they go looking for a   house. </p>
<p>
The pre-qualification process is not as formal as applying for a   mortgage. The lender does not check out all of the information the   borrower provides, does not charge a fee and does not actually agree to   approve a mortgage application in the amount the home buyer is   pre-qualified for. </p>
<p>
However, if someone is serious about wanting to buy a house, they will   need to get pre-approved for a loan. With a pre-approval, the lender   checks the borrower's credit, verifies their financial and employment   information and confirms the borrower's ability to get a mortgage.   Pre-approval makes the home buyer's position stronger when they make an   offer on a house that they find and want to buy. Sellers are usually   more willing to consider an offer from someone who has been   pre-approved, because it usually means that the buyer actually is   financially able to purchase the house.</p>
<h3>
  Mortgages for the Self-Employed</h3>
<p>
As the real estate industry struggles to recover, self-employed people   and others with an irregular income could be caught in a squeeze as   mortgage lenders continue tightening up on lending requirements. </p>
<p>
IF lenders only look at self-employed people and owners of micro   businesses with 10 or fewer employees on paper, they can look like bad   risks. Their income can differ greatly from year to year. Many do not   get a standard W-2 tax form, making their income very hard to   substantiate. And after having their taxes done and deducting business   expenses, it can seem to appear that they make little to no money. </p>
<h4>
  Keep Good Records </h4>
<p>
Self-employed individuals and small business owners need to keep good   financial records. Lenders may require mortgage applicants to provide   both personal and business tax returns when applying for a home loan. </p>
<p>
If someone is considering applying for a mortgage in the next year or   two, they may want to consider deducting fewer expenses to increase   their net income. Lenders usually require self-employed people and small   business owners to provide copies of their last two years' tax returns. </p>
<p>
Lenders now have greater expectations for self-employed people and small   business owners to prove their income. If tax returns can't do it, they   may want to consider providing an audited financial statement even   though getting a certified public accountant to prepare the statement   can cost several hundred dollars. </p>
<p>
Despite the greater requirements, small-business owners and   self-employed people who handle their finances carefully will still be   able to get mortgages. </p>
<p>
A mortgage lender will want to know a lot about the borrower before   approving a loan application, and justifiably so. The lender will want   to be guaranteed that the borrower meets their minimum level requirement   for being able to pay back the loan before lending money.</p>
<h4>Common Questions to Expect</h4>
<p>
Here are the general areas of questioning a loan applicant can expect from a lender:</p>
<p>
<strong>Employment and Income:</strong></p>
<ul class="arrow">
  <li>
    Where does the borrower work? </li>
  <li>How much does the borrower make? </li>
  <li> How long has the borrower been at their job? </li>
  <li> How is the borrower's income derived - steady salary or irregular income? </li>
  <li>If it's the latter, the borrower may need to provide more details to obtain a favorable interest rate. </li>
</ul>
<p>
<strong>Outstanding Debts:</strong></p>
<ul class="arrow">
  <li>
    What recurring debts does the borrower have? </li>
  <li>How much does the borrower pay a month for auto loans? </li>
  <li> How many credit cards does the borrower have and how much is owed on each?</li>
  <li> How much of the borrower's monthly income do these debts account for?</li>
</ul>
<p>
<strong>Cash Reserves and Assets:</strong></p>
<ul class="arrow">
  <li>
    How much money does the borrower have in the bank? </li>
  <li> How much will be left after the borrower makes a down payment and pays closing costs? </li>
</ul>
<p>
<strong>Down Payment:</strong></p>
<ul class="arrow">
  <li>
    How much money is the borrower putting down? </li>
  <li>Is this the borrower's own money? </li>
  <li>If not, is it a gift from the borrower's parents? </li>
  <li>If not, is it a nonprofit agency grant? </li>
</ul>
<p>
<strong>Loan Purpose:</strong></p>
<ul class="arrow">
  <li>
    	Is this mortgage for a home purchase or for a refinancing? </li>
  <li>If it's a refinance, does the borrower want to take cash out at closing to pay off other debts? </li>
  <li> If the borrower does, how much does the borrower want? </li>
</ul>
<p>
<strong>Property Use:</strong></p>
<ul class="arrow">
  <li>
    	Does the borrower plan to live in the house? </li>
  <li>Is it investment property? </li>
</ul>
<p>
<strong>Property Type:</strong></p>
<ul class="arrow">
  <li>
    Is it a condominium? </li>
  <li>Is it a duplex? </li>
  <li>Is it a single family home?</li>
  <li>Is it a second home?</li>
</ul>
<h4>Know Your Strengths &amp; Weaknesses</h4>
<p>The following responses tend to work in borrower's favor:</p>
<ul class="arrow">
  <li>
    The borrower has had steady employment of two or more years with the same employer or in same line of work.</li>
  <li> The borrower has low debt: no recent major buys and has a debt-to-income ratio of 36 percent or less.</li>
  <li> The loan is for a straight home purchase or rate-and-term refinance.</li>
  <li> The property is a detached single-family home to be used by the borrower as primary residence.</li>
  <li> The borrower has a down payment of at least 5 percent of the sales price with their own money.</li>
  <li>The borrower will have at least two months' worth of mortgage payments in the bank after closing.</li>
</ul>
<p>
These responses tend to work against the borrower:</p>
<ul class="arrow">
  <li>
    	The borrower is self-employed or a contract worker.</li>
  <li>The borrower has high debt: their credit cards maxed out or total debt-to-income ratio is more than 36 percent.</li>
  <li>The property is a duplex or condominium or to be used as a vacation home or rental.</li>
  <li>The borrower has no cash left after the down payment and closing costs.</li>
  <li>The borrower's down payment is 3 percent or less of the purchase price and the money is borrowed.</li>
</ul>
<p>
Once the borrower has narrowed the lender field to a short list of finalists, it's time to compare their offers.</p>
<h3>10 Questions for Banks</h3>
<p>
Here are some questions to ask to help the borrower find the best mortgage lender.</p>
<ul class="arrow">
  <li>
    <strong>What is the interest rate on this mortgage?</strong> To determine exactly what   the borrower will pay over the term of the loan, they need to know the   rate. Rates change quickly, and if their credit is less than perfect,   they may not be offered the lender's lowest figure. To effectively compare different lenders' programs, ask for the annual   percentage rate (APR) of the mortgage interest, which is usually higher   than the initial quoted rate because it also includes some fees. But   borrowers need to realize that the APR found in advertisements can be   misleading. Mortgage lenders don't always include all their in the   advertizing APR, so customers who use that figure to shop may end up   comparing bananas to basketballs.</li>
  <li> <strong>How many discount and origination points will the borrower pay?</strong> Lenders may charge prepaid mortgage interest points to lower the   interest rate or other points that have no benefit. Find out how many   the borrower will be expected to pay and which kind of points they will   be.</li>
  <li><strong> What are the closing costs?</strong> Mortgages come with fees for various   services provided by lenders and other parties involved in the   transaction. The borrower will want to know what those fees will be as   early as possible. Lenders are required to provide a written good-faith   estimate of closing costs within three days of receiving a loan   application.</li>
  <li><strong> When can the home buyer lock in the interest rate, and what will it   cost them to do so?</strong> The interest rate might fluctuate between the time   of applying and closing. To prevent it from going up, the borrower may   want to lock in the rate for a specified period. Ask the lender if lock   fees apply. </li>
  <li><strong>Is there an early pay off penalty on this loan?</strong> Some penalties are 1   percent of the loan amount, others are equal to six months' interest,   some apply only when the borrower refinances or reduces the principal   balance by more than 20 percent. </li>
  <li> <strong>What is the minimum down payment required for this loan?</strong> The rate and terms of the loan will be based on a down payment figure,   typically 3 percent to 20 percent of the price of the house. If the   borrower can put more money down, they may be able to lower their   interest rate and improve the terms or the loan.</li>
  <li><strong>What are the qualifying guidelines of this loan?</strong> These requirements   have to do with income, employment, assets, liabilities and credit   history. First time homebuyer programs, VA loans and other government   sponsored mortgage programs offer easier qualifying guidelines.</li>
  <li><strong> What documents must be provided?</strong> Most lenders will require proof of   income and assets, and may require other documents as well.</li>
  <li><strong>How long will it take to process the loan application?</strong> The answer   will depend on a number of variables. When the loan business is brisk,   underwriters get backed up, verification takes longer, appraisals move   slower and other bottlenecks develop along the loan pipeline. Lenders   may say two weeks, but 45 to 60 days is probably more realistic. </li>
  <li><strong> What might delay approval of the loan?</strong> If the borrower provides the   lender with complete, accurate information, the loan process should run   smoothly. If the underwriter discovers credit problems, however, there   could be delays. </li>
</ul>
<h3>
  Finding a Lender</h3>
<p>
Everywhere a person turns there are advertisements for businesses that   want to provide future home buyers with a mortgage. Banks, mortgage   brokers and online vendors are all striving to capture mortgage   shoppers' attention and offer the borrowers' with the opportunity to   borrow some cash from them.</p>
<p>
Banks are usually the first and the most traditional source of mortgage   funding people think of. They offer face-to-face personal service,   recognized name-brands and loan fees that are usually competitive with   every other lender. They may lack the same a broad variety of loan   programs others offer, however, which may mean that they are not able to   offer the lowest interest rates or the lowest fees.</p>
<p>
Conversely, mortgage brokers can generally offer a large variety of   loans, which includes loans for people with bad credit. That variety   often results in being able to provide the lowest interest rates and the   most convenient one-stop-shopping for comparison purposes. Because a   borrower can sit down with a mortgage broker face-to-face, that personal   service is another plus. On the downside, however, is the fact that   mortgage broker's fees are usually higher, making them more expensive   than other funding sources.</p>
<p>
Buying a house can be complicated, involved process. But, like most big   tasks, it's much easier to understand - and accomplish – when it is   broken down into smaller, easier to accomplish steps.</p>
<p>
The first step is figuring out what kind of mortgage is the best fit for   the borrower, determining how much they can afford and anticipating   what other steps are involved. The second step is learning how to shop   for a mortgage and deal with lenders and loan brokers. The third step is   determining what's involved in finalizing the deal.</p>
<p>
Shopping for a house is the first step toward fulfilling the American   dream of owning a home. Homeownership is so American owners can even   deduct the interest paid on as mortgage off their federal income tax.   But remember: until the mortgage is paid off &mdash; for up to 30 years in   most cases &mdash; the bank really owns the house, not the home owner, so   careful consideration should be taken before jumping into the real   estate market.</p>

                
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

