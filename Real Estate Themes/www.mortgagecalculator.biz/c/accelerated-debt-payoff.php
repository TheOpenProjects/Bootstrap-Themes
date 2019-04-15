<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Debt Snowball Calculator: Calculate Accelerated Debt Repayments</title>
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

function computeLoan(line) {


   var my_prin_cell = document.getElementById("prin" + line + "");
   var my_rate_cell = document.getElementById("intRate" + line + "");
   var my_pmt_cell = document.getElementById("pmt" + line + "");

   var my_prin = sn(my_prin_cell.value);
   var my_rate = sn(my_rate_cell.value);
   var my_pmt = sn(my_pmt_cell.value);

   var my_intLeft_cell = document.getElementById("intLeft" + line + "");
   var my_pmtLeft_cell = document.getElementById("pmtLeft" + line + "");


   var my_intPort = 0;
   var my_i = 0;
   var my_prinPort = 0;
   var my_accumInt = 0;
   var my_count = 0;

   if(my_prin > 0 && my_pmt > 0) {

      if(my_rate == 0) {
         my_i = 0;
      } else {
         my_i = my_rate;
         if(my_i >= 1) {
            my_i /= 100;
         }
         my_i /= 12;
      }

      while(my_prin > 0) {
         my_intPort = my_prin * my_i;
         my_accumInt = Number(my_accumInt) + Number(my_intPort);
         my_prinPort = Number(my_pmt) - Number(my_intPort);
         my_prin = Number(my_prin) - Number(my_prinPort);
         my_count = Number(my_count) + Number(1);
         if(my_count > 1000) {break; } else {continue; }
      }

      if(my_count >= 1000) {
         alert("At the terms you entered, debt #" + line + " will never be paid off. Please either decrease the balance, decrease the interest rate, or increase the payment amount until this message not longer pops up.");
         my_intLeft_cell.value = "ERROR";
         my_pmtLeft_cell.value = "ERROR";
      } else {
         my_intLeft_cell.value = "$" + fn(my_accumInt,2,1);
         my_pmtLeft_cell.value = my_count;
      }


   }

     clearResults(document.debts);

}

function computeForm(form)  {

   var debtCnt = 0;
   var i = 0;
   var totalDebtInt = 0;
   var totalDebtPmts = 0;
   var max_npr = 0;

   var name_arr = new Array()
   var prin_arr = new Array()
   var adp_bal_arr = new Array()
   var rate_arr = new Array()
   var pmt_arr = new Array()
   var adp_pmt_arr = new Array()
   var npr_arr = new Array()
   var cost_arr = new Array()
   var sum_rows_arr = new Array()


   var Vschedule_head = "<tr><td><font face='arial'><small><b>Pmt#</b></small></font></td>";

   var count = 0;
   var prinPort = 0;
   var intPort = 0;
   var name = "";
   var prin = 0;
   var intRate = 0;
   var intLeft = 0;
   var accumInt = 0;
   var accumPrin = 0;
   var pmt = 0;

   var Vtotalprin = 0;

   while(i < 10) {

      i = Number(i) + Number(1);

      var name_cell = document.getElementById("D" + i + "");
      var prin_cell = document.getElementById("prin" + i + "");
      var intRate_cell = document.getElementById("intRate" + i + "");
      var pmt_cell = document.getElementById("pmt" + i + "");
      var intLeft_cell = document.getElementById("intLeft" + i + "");
      var pmtLeft_cell = document.getElementById("pmtLeft" + i + "");

      name = name_cell.value;
      prin = sn(prin_cell.value);
      intRate = sn(intRate_cell.value);
      pmt = sn(pmt_cell.value);
      intLeft = sn(intLeft_cell.value);


      Vtotalprin = Number(Vtotalprin) + Number(prin);


      if(prin > 0 && pmt > 0) {

         debtCnt = Number(debtCnt) + Number(1);
         accumPrin = Number(accumPrin) + Number(prin);

         Vschedule_head = Vschedule_head + "<td align='center'><font face='arial'><small><b>" + debtCnt + "</b></small></font></td>\n";
         sum_rows_arr[i] = "<tr><td><font face='arial'><small>" + name + "</small></font></td>\n";

         accumInt = 0;
         count = 0;

         if(intRate == 0) {
            intRate = 0;
         } else {
            if(intRate >= 1) {
               intRate /= 100;
            }
            intRate /= 12;
         }

         name_arr[debtCnt] = name;
         prin_arr[debtCnt] = prin;
         adp_bal_arr[debtCnt] = prin;
         rate_arr[debtCnt] = intRate;
         pmt_arr[debtCnt] = pmt;
         adp_pmt_arr[debtCnt] = pmt;

      if(i == 1) {
         var test = prin_arr[1];
      }

         while(prin > 0) {
            intPort = prin * intRate;
            accumInt = Number(accumInt) + Number(intPort);
            prinPort = Number(pmt) - Number(intPort);
            prin = Number(prin) - Number(prinPort);
            count = Number(count) + Number(1);
            if(count > 1000) {break; } else {continue; }
         }
         totalDebtInt = Number(totalDebtInt) + (accumInt);
         totalDebtPmts = Number(totalDebtPmts) + Number(pmt);

         if(count > max_npr) {
            max_npr = count;
         }

         npr_arr[debtCnt] = count;
         cost_arr[debtCnt] = accumInt;

         pmtLeft_cell.value = count;
         intLeft_cell.value = "$" + fn(accumInt,2,1);
         

      } //if


    } //while

    document.debts.totalprin.value = "$" + fn(Vtotalprin,2,1);
    document.debts.adp_totalprin.value = "$" + fn(Vtotalprin,2,1);

    document.debts.totalint.value = "$" + fn(totalDebtInt,2,1);

    document.debts.totalnprs.value = max_npr;

    document.debts.totalpmt.value = "$" + fn(totalDebtPmts,2,1);

    Vschedule_head = Vschedule_head + "</tr>\n";
    document.debts.schedule_head.value = Vschedule_head;

    var Vaccel_pmt = sn(document.debts.accel_pmt.value);
    var Vadp_totalpmt = Number(totalDebtPmts) + Number(Vaccel_pmt);
    document.debts.adp_totalpmt.value = "$" + fn(Vadp_totalpmt ,2,1);

    var v_summary_cell = document.getElementById("summary");

    var v_summary_txt = "The total of your current monthly debt ";
    v_summary_txt += "payments ($" + fn(totalDebtPmts,2,1) + "), plus the ";
    v_summary_txt += "additional monthly amount of $" + fn(Vaccel_pmt,2,1) + ", is ";
    v_summary_txt += "equal to $" + fn(Vadp_totalpmt,2,1) + ".  This is how ";
    v_summary_txt += "much you will allocate to paying off your debts until ";
    v_summary_txt += "all of the above debts are paid off.";

    v_summary_cell.innerHTML = "<font face='arial'><small>" + v_summary_txt + "</small></font>";


    i = 0;
    var npr_cnt = 0;
    var adp_bal = 0;
    var adp_combo_prin = accumPrin;
    var debts_paid_off = 0;
    var next_debt_paid_off = 1;
    var Vadp_totalint = 0;
    var sum_col_print = 0;

    //VARIABLES FOR EACH PAYMENT ON EACH DEBT
    var adp_bal = 0;
    var adp_intPort = 0;
    var adp_prinPort = 0;
    var adp_rate = 0;
    var adp_excess_pmt = 0;
  

    //AMOUNT TO APPLY TO DEBT BEING FOCUSED ON
    var adp_pmt_amt = 0;

    //TOTAL OF ADP_PMTS PER PERIOD
    var tot_period_pmts = 0;

    //DEBT THAT EXTRA IS BEING APPLIED TO
    var cur_adp_debt = 1;

    //VARIEBLE TO COLLECT CHART ROWS
    var num_pmts = 0;
    var Vschedule_cols = "";
    var Vschedule_rows = "";
    var Vsummary_head = "<tr><td><font face='arial'><small><b>Name of Debt</b></small></font></td><td><font face='arial'><small><b>Begin<br>Bal:<br>Pmt:</b></small></font></td>";

    //DO UNTIL ALL DEBTS ARE PAID
    while(debts_paid_off< debtCnt) {

      npr_cnt = Number(npr_cnt) + Number(1);
      i = 0;
      adp_pmt_amt = Vaccel_pmt;

    

      //MAKE PMTS THIS PERIOD
      while(i < debtCnt) {

         //WHICH DEBTS ARE PAID OFF

         i = Number(i) + Number(1);
         num_pmts = Number(num_pmts) + Number(1);

         //GET THIS PAYMENTS CURRENT TERMS FROM ARRAY
         adp_bal = adp_bal_arr[i];
         adp_rate = rate_arr[i];
         adp_pmt = pmt_arr[i];

         if(npr_cnt == 1) {
            sum_rows_arr[i] = sum_rows_arr[i] + "<td><font face='arial'><small>$" + fn(adp_bal,0,1) + "<br>$" + fn(adp_pmt,0,1) + "</small></font></td>";
         }



         //IF THIS DEBT's BAL GREATER THAN ZERO, MAKE PMT
         if(adp_bal > 0) {
            adp_intPort = adp_bal * adp_rate;
            //adp_pmt = Number(adp_pmt) + Number(adp_pmt_amt);
            //adp_pmt_amt = 0;
            Vadp_totalint = Number(Vadp_totalint) + Number(adp_intPort);
            adp_prinPort = Number(adp_pmt) - Number(adp_intPort);
            adp_bal = Number(adp_bal) - Number(adp_prinPort);
            if(adp_bal <= 0) {
               adp_excess_pmt = Number(adp_bal * -1);
               adp_pmt = Number(adp_pmt) - Number(adp_excess_pmt);
               adp_prinPort = Number(adp_prinPort) - Number(adp_excess_pmt);
               //ADD EXCESS PMT AMT TO ACCELERATOR AMT
               adp_pmt_amt = Number(adp_pmt_amt) + Number(adp_excess_pmt);
               adp_bal = 0;
               debts_paid_off = Number(debts_paid_off) + 1;
               sum_col_print = 1;

            }
            adp_bal_arr[i] = adp_bal;
            adp_combo_prin = Number(adp_combo_prin) - Number(adp_prinPort);
         } else { //ADD PMT AMOUNT TO ACCELERATOR

            //INCREMENT NUMBER TO NEXT DEBT
            cur_adp_debt = Number(cur_adp_debt) + Number(1);

            //ADD UNEEDED PMT AMT TO ACCELERATOR AMT
            adp_pmt_amt = Number(adp_pmt_amt) + Number(adp_pmt);

            //SET THIS DEBT's PERIOD PAYMENT TO ZERO
           adp_pmt = 0;
         }

         adp_pmt_arr[i] = adp_pmt;

         if(i > 10) {
            break;
         } else {
            continue;
         }

      } //WHILE MAKING PATMENTS ON DEBTS THIS PERIOD



      i = 0;

      //IF EXCESS PAYMENT AMOUNT HAS NOT BEEN USED UP
      if(adp_pmt_amt > 0) {

         adp_combo_prin = Number(adp_combo_prin) - Number(adp_pmt_amt);

         while(i < debtCnt) {

            i = Number(i) + Number(1);

            if(adp_bal_arr[i] > 0) {

               adp_bal_arr[i] = Number(adp_bal_arr[i]) - Number(adp_pmt_amt);

               if(adp_bal_arr[i] > 0) {

                  adp_pmt_arr[i] = Number(adp_pmt_arr[i]) + Number(adp_pmt_amt);
                  adp_pmt_amt = 0;

               } else {

                  adp_pmt_arr[i] = Number(adp_pmt_arr[i]) + Number(adp_pmt_amt) + Number(adp_bal_arr[i]);
                  adp_pmt_amt = Number(adp_pmt_amt) - (Number(adp_pmt_amt) + Number(adp_bal_arr[i]));
                  if(npr_cnt == 6 && i == 1) {
                     //document.debts.test2.value = adp_pmt_amt;
                  }
                  adp_bal_arr[i] = 0;
                  debts_paid_off = Number(debts_paid_off) + 1;
                  sum_col_print = 1;

               }

            }


         }


      }

      i = 0;

      while(i < debtCnt) {

         i = Number(i) + Number(1);

         tot_period_pmts = Number(tot_period_pmts) + Number(adp_pmt_arr[i]);
         if(adp_pmt_arr[i] == 0) {
            Vschedule_cols = Vschedule_cols + "<td align='right'> </td>";
         } else {
            Vschedule_cols = Vschedule_cols + "<td align='right'><font face='arial'><small>" + fn(adp_pmt_arr[i],2,1) + "</small></font></td>";
         }

         if(adp_pmt_arr[debts_paid_off] == 0 && sum_col_print == 1 || debts_paid_off == debtCnt) {
            if(i ==1) {
               Vsummary_head = Vsummary_head + "<td><font face='arial'><small><b>Month " + npr_cnt + "<br>Bal:<br>Pmt:</b></small></font></td>";
            }

            if(adp_bal_arr[i] == 0) {
                sum_rows_arr[i] = sum_rows_arr[i] + "<td align='top'><font face='arial'><small>$0</small></font></td>";
            } else {
            sum_rows_arr[i] = sum_rows_arr[i] + "<td align='top'><font face='arial'><small>$" + fn(adp_bal_arr[i],0,1) + "<br>$" + fn(adp_pmt_arr[i],0,1) + "</small></font></td>";
            }

            if(i == debtCnt) {
               sum_col_print = 0;
            }
         }


      }



      //IF ACCUM UNEEDED AMT GREATER THAN ZERO, APPLY TO CURRENT DEBT's BALANCE
      //adp_bal_arr[cur_adp_debt] = Number(adp_bal_arr[cur_adp_debt]) - Number(adp_pmt_amt);
      //adp_combo_prin = Number(adp_combo_prin) - Number(adp_pmt_amt);

     Vschedule_rows = Vschedule_rows + "<tr><td align='right'><font face='arial'><small>" + npr_cnt + "</small></font></td>" + Vschedule_cols + "</tr>\r";
     tot_period_pmts = 0;
     Vschedule_cols = "";


      if(npr_cnt > 600) {
         break;
      } else {
         continue;
      }


   } //WHILE ALL DEBTS ARE NOT PAID OFF

   document.debts.adp_totalnprs.value = npr_cnt;
   document.debts.adp_totalint.value = "$" + fn(Vadp_totalint,2,1);

   var Vadp_npr_save = Number(max_npr) - Number(npr_cnt);
   document.debts.adp_npr_save.value = Vadp_npr_save;

   var Vadp_int_save = Number(totalDebtInt) - Number(Vadp_totalint);
   document.debts.adp_int_save.value = "$" + fn(Vadp_int_save,2,1);

   Vsummary_head = Vsummary_head + "</tr>";

   document.debts.schedule_rows.value = Vschedule_rows;
   document.debts.summary_head.value = Vsummary_head;

   i = 0;
   var Vsummary_rows = "";

   while(i < debtCnt) {

      i = Number(i) + Number(1);

      Vsummary_rows =  Vsummary_rows + "" + sum_rows_arr[i] + "</tr>";

   }

   document.debts.summary_rows.value = Vsummary_rows;


   } 


function createSchedule(form) {

   var Vschedule_head = document.debts.schedule_head.value;
   var Vschedule_rows = document.debts.schedule_rows.value;

   var adpPart1 = "<HEAD><TITLE>Accelerated Debt-Payoff Plan</TITLE></HEAD>";
   adpPart1 += "<";
   adpPart1 += "BO";
   adpPart1 += "DY ";
   adpPart1 += "BGCOLOR =  '#FFFFFF'>";
   adpPart1 += "<center><font face='arial'><big><strong>";


   adpPart1 += "Accelerated Debt-Payoff Plan</strong></big></font>";
   adpPart1 += "<p><font face='arial'><small><b>Payment Schedule</b></small></font></p>";
   adpPart1 += "<p></CENTER></p><p><center><table border='1' cellspacing='0' cellpadding='2'>";
   adpPart1 += "<tbody>" + Vschedule_head + "" + Vschedule_rows + "</tbody></table></center>";
   adpPart1 += "</p><p><center><font face='arial'><small>This report was created with ";
   adpPart1 += "<U>The Accelerated Debt Payoff Calculator</U><br />Written by Daniel C. Peterson";
   adpPart1 += "<BR />Calculator can be found at http://www.webwinder.com</small></font>";
   adpPart1 += "</p><p><form method='post'><input type='button' value='Close Window' onClick='window.close()'>";
   adpPart1 += "</form></p></center></body></html>";

   printWin = window.open("","","width=500,height=300,toolbar=yes,menubar=yes,scrollbars=yes");
   printWin.document.write(adpPart1);
   printWin.document.close();
}

function createSummary(form) {

   var Vsummary_head = document.debts.summary_head.value;
   var Vsummary_rows = document.debts.summary_rows.value;

   var adpPart1 = "<head><title>Accelerated Debt-Payoff Plan</title></head>";

   adpPart1 += "<";
   adpPart1 += "bo";
   adpPart1 += "d";
   adpPart1 += "y ";
   adpPart1 += "bgcolor='#FFFFFF'>";


   adpPart1 += "<center><font face='arial'><big><strong>Accelerated Debt-Payoff Plan</strong></big></font>";
   adpPart1 += "<p><font face='arial'><small><b>Payoff Summary</b></small></font></CENTER>";
   adpPart1 += "</p><p><center><table border='1' cellspacing='0' cellpadding='2'>";
   adpPart1 += "<tbody>" + Vsummary_head + "" + Vsummary_rows + "</tbody></TABLE></center>";
   adpPart1 += "</p><p><center><font face='arial'><small>This report was created with ";
   adpPart1 += "<U>The Accelerated Debt Payoff Calculator</U><br />Written by Daniel C. Peterson";
   adpPart1 += "<br />Calculator can be found at http://www.webwinder.com</small></font>";
   adpPart1 += "</p><p><form method='post'><input type='button' value='Close Window' onClick='window.close()'>";
   adpPart1 += "</form></p></center></body></html>";

   printWin = window.open("","","width=500,height=300,toolbar=yes,menubar=yes,scrollbars=yes");
   printWin.document.write(adpPart1);
   printWin.document.close();
}

function clearResults(form) {

   document.debts.totalprin.value = "";
   document.debts.totalpmt.value = "";
   document.debts.totalint.value = "";
   document.debts.totalnprs.value = "";

   document.debts.adp_totalprin.value = "";
   document.debts.adp_totalpmt.value = "";
   document.debts.adp_totalint.value = "";
   document.debts.adp_totalnprs.value = "";

   document.debts.adp_int_save.value = "";
   document.debts.adp_npr_save.value = "";

   document.debts.schedule_head.value = "";
   document.debts.schedule_rows.value = "";
   document.debts.summary_head.value = "";
   document.debts.summary_rows.value = "";

   var v_summary_cell = document.getElementById("summary");
   v_summary_cell.innerHTML = "";
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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/accelerated-debt-payoff.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				  <h1>Accelerated Debt Repayment Calculator</h1></div>
    <ul id="breadcrumbs">
    <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
    <li><a href="https://www.mortgagecalculator.biz/c/debt.php">Debt</a></li>
    <li>Accelerated Payment</li>
    </ul>
   </div>
   			<div class="bottom-section">

   				<div class="table-block">


<p>This calculator helps people manage their debts by leveraging the "rollover" (or snowball) method. Using this strategy, whenever a smaller debt is paid off the associated cashflow which is freed up is applied to the next largest debt, until all debts are finally paid off. This strategy works well for two reasons. First, because you are tackling the smallest debts first it is easy to see the progress being made &amp; help establish money-saving habits. Second, as each debt is extinguished it accelerates the percent of your free cashflow which can be applied toward the remaining debts.</p>
<p><strong>Usage instructions:</strong> Starting with your smallest debts first, list your debts along with their current balances &amp; the amount you can afford to apply to accelerated debt repayments. Once you have entered all of your debts, click on the "Calculate Results" button to see your debt repayment plan. If you include any mortgage debt in this tool, please only list your principal &amp; interest portion of the mortgage debt (as including property taxes &amp; insurance in this tool would throw off the results.</p>

<form name="debts" method="post" action="#">
<table>
<tbody>
 <tr>
 <td align="right"> </td>
 <td align="center" colspan="4"><strong>Entry Columns</strong></td>
 <td align="center" colspan="2"><strong>Calculated Columns</strong></td>
 </tr>

 <tr>
 <td align="right"><strong>#</strong></td>
 <td align="center"><strong>Creditor</strong></td>
 <td align="center"><strong>Principal<br />Balance ($)</strong></td>
 <td align="center"><strong>Interest<br />Rate (%)</strong></td>
 <td align="center"><strong>Payment<br />Amount ($)</strong></td>
 <td align="center"><strong>Interest<br />Cost</strong></td>
 <td align="center"><strong># of Pmts<br />Left</strong></td>
 </tr>

 <tr>
 <td align="right"><strong>1</strong></td>
 <td align="center"><input type="text" id="D1" name="D1" size="15" tabindex="2" /></td>
 <td align="center"><input type="number" step="any" id="prin1" name="prin1" size="9" tabindex="3" onChange="computeLoan(1)" /></td>
 <td align="center"><input type="number" step="any" id="intRate1" name="intRate1" size=5 tabindex="4" onChange="computeLoan(1)" /></td>
 <td align="center"><input type="number" step="any" id="pmt1" name="pmt1" size="9" tabindex="5" onChange="computeLoan(1)" /></td>
 <td align="center"><input type="text" id="intLeft1" name="intLeft1" size="9" /></td>
 <td align="center"><input type="text" id="pmtLeft1" name="pmtLeft1" size="9" /></td>
 </tr>

 <tr>
 <td align="right"><strong>2</strong></td>
 <td align="center"><input type="text" id="D2" name="D2" size="15" tabindex="6" /></td>
 <td align="center"><input type="number" step="any" id="prin2" name="prin2" size="9" tabindex="7" onChange="computeLoan(2)" /></td>
 <td align="center"><input type="number" step="any" id="intRate2" name="intRate2" size=5 tabindex="8" onChange="computeLoan(2)" /></td>
 <td align="center"><input type="number" step="any" id="pmt2" name="pmt2" size="9" tabindex="9" onChange="computeLoan(2)" /></td>
 <td align="center"><input type="text" id="intLeft2" name="intLeft2" size="9" /></td>
 <td align="center"><input type="text" id="pmtLeft2" name="pmtLeft2" size="9" /></td>
 </tr>

 <tr>
 <td align="right"><strong>3</strong></td>
 <td align="center"><input type="text" id="D3" name="D3" size="15" tabindex="10" /></td>
 <td align="center"><input type="number" step="any" id="prin3" name="prin3" size="9" tabindex="11" onChange="computeLoan(3)" /></td>
 <td align="center"><input type="number" step="any" id="intRate3" name="intRate3" size=5 tabindex="12" onChange="computeLoan(3)" /></td>
 <td align="center"><input type="number" step="any" id="pmt3" name="pmt3" size="9" tabindex="13" onChange="computeLoan(3)" /></td>
 <td align="center"><input type="text" id="intLeft3" name="intLeft3" size="9" /></td>
 <td align="center"><input type="text" id="pmtLeft3" name="pmtLeft3" size="9" /></td>
 </tr>

 <tr>
 <td align="right"><strong>4</strong></td>
 <td align="center"><input type="text" id="D4" name="D4" size="15" tabindex="14" /></td>
 <td align="center"><input type="number" step="any" id="prin4" name="prin4" size="9" tabindex="15" onChange="computeLoan(4)" /></td>
 <td align="center"><input type="number" step="any" id="intRate4" name="intRate4" size=5 tabindex="16" onChange="computeLoan(4)" /></td>
 <td align="center"><input type="number" step="any" id="pmt4" name="pmt4" size="9" tabindex="17" onChange="computeLoan(4)" /></td>
 <td align="center"><input type="text" id="intLeft4" name="intLeft4" size="9" /></td>
 <td align="center"><input type="text" id="pmtLeft4" name="pmtLeft4" size="9" /></td>
 </tr>

 <tr>
 <td align="right"><strong>5</strong></td>
 <td align="center"><input type="text" id="D5" name="D5" size="15" tabindex="18" /></td>
 <td align="center"><input type="number" step="any" id="prin5" name="prin5" size="9" tabindex="19" onChange="computeLoan(5)" /></td>
 <td align="center"><input type="number" step="any" id="intRate5" name="intRate5" size=5 tabindex="20" onChange="computeLoan(5)" /></td>
 <td align="center"><input type="number" step="any" id="pmt5" name="pmt5" size="9" tabindex="21" onChange="computeLoan(5)" /></td>
 <td align="center"><input type="text" id="intLeft5" name="intLeft5" size="9" /></td>
 <td align="center"><input type="text" id="pmtLeft5" name="pmtLeft5" size="9" /></td>
 </tr>

 <tr>
 <td align="right"><strong>6</strong></td>
 <td align="center"><input type="text" id="D6" name="D6" size="15" tabindex="22" /></td>
 <td align="center"><input type="number" step="any" id="prin6" name="prin6" size="9" tabindex="23" onChange="computeLoan(6)" /></td>
 <td align="center"><input type="number" step="any" id="intRate6" name="intRate6" size=5 tabindex="24" onChange="computeLoan(6)" /></td>
 <td align="center"><input type="number" step="any" id="pmt6" name="pmt6" size="9" tabindex="25" onChange="computeLoan(6)" /></td>
 <td align="center"><input type="text" id="intLeft6" name="intLeft6" size="9" /></td>
 <td align="center"><input type="text" id="pmtLeft6" name="pmtLeft6" size="9" /></td>
 </tr>

 <tr>
 <td align="right"><strong>7</strong></td>
 <td align="center"><input type="text" id="D7" name="D7" size="15" tabindex="26" /></td>
 <td align="center"><input type="number" step="any" id="prin7" name="prin7" size="9" tabindex="27" onChange="computeLoan(7)" /></td>
 <td align="center"><input type="number" step="any" id="intRate7" name="intRate7" size=5 tabindex="28" onChange="computeLoan(7)" /></td>
 <td align="center"><input type="number" step="any" id="pmt7" name="pmt7" size="9" tabindex="29" onChange="computeLoan(7)" /></td>
 <td align="center"><input type="text" id="intLeft7" name="intLeft7" size="9" /></td>
 <td align="center"><input type="text" id="pmtLeft7" name="pmtLeft7" size="9" /></td>
 </tr>

 <tr>
 <td align="right"><strong>8</strong></td>
 <td align="center"><input type="text" id="D8" name="D8" size="15" tabindex="31" /></td>
 <td align="center"><input type="number" step="any" id="prin8" name="prin8" size="9" tabindex="32" onChange="computeLoan(8)" /></td>
 <td align="center"><input type="number" step="any" id="intRate8" name="intRate8" size=5 tabindex="33" onChange="computeLoan(8)" /></td>
 <td align="center"><input type="number" step="any" id="pmt8" name="pmt8" size="9" tabindex="34" onChange="computeLoan(8)" /></td>
 <td align="center"><input type="text" id="intLeft8" name="intLeft8" size="9" /></td>
 <td align="center"><input type="text" id="pmtLeft8" name="pmtLeft8" size="9" /></td>
 </tr>

 <tr>
 <td align="right"><strong>9</strong></td>
 <td align="center"><input type="text" id="D9" name="D9" size="15" tabindex="35" /></td>
 <td align="center"><input type="number" step="any" id="prin9" name="prin9" size="9" tabindex="36" onChange="computeLoan(9)" /></td>
 <td align="center"><input type="number" step="any" id="intRate9" name="intRate9" size=5 tabindex="37" onChange="computeLoan(9)" /></td>
 <td align="center"><input type="number" step="any" id="pmt9" name="pmt9" size="9" tabindex="39" onChange="computeLoan(9)" /></td>
 <td align="center"><input type="text" id="intLeft9" name="intLeft9" size="9" /></td>
 <td align="center"><input type="text" id="pmtLeft9" name="pmtLeft9" size="9" /></td>
 </tr>

 <tr>
 <td align="right"><strong>10</strong></td>
 <td align="center"><input type="text" id="D10" name="D10" size="15" tabindex="40" /></td>
 <td align="center"><input type="number" step="any" id="prin10" name="prin10" size="9" tabindex="41" onChange="computeLoan(10)" /></td>
 <td align="center"><input type="number" step="any" id="intRate10" name="intRate10" size=5 tabindex="42" onChange="computeLoan(10)" /></td>
 <td align="center"><input type="number" step="any" id="pmt10" name="pmt10" size="9" tabindex="43" onChange="computeLoan(10)" /></td>
 <td align="center"><input type="text" id="intLeft10" name="intLeft10" size="9" /></td>
 <td align="center"><input type="text" id="pmtLeft10" name="pmtLeft10" size="9" /></td>
 </tr>

 <tr>
 <td colspan="6">Enter a monthly dollar amount you can add to your debt payoff plan:</td>
 <td align="center">
 <input type="text" name="accel_pmt" tabindex="44" size="9" onKeyUp="clearResults(this.form)" />
 </td>
 </tr>

 <tr>
 <td align="center" colspan="7">
 <input type="button" tabindex="45" value="Calculate Results" onClick="computeForm(this.form)" class="table-btn"/> 
 <input type="reset" value="Clear Form" class="table-btn"/>
 </td>
 </tr>

 <tr>
 <td colspan="2" align="center"><strong>Results</strong></td>
 <td align="center"><strong>Principal<br />Balance</strong></td>
 <td align="center"><strong>Interest<br />Rate</strong></td>
 <td align="center"><strong>Payment<br />Amount</strong></td>
 <td align="center"><strong>Interest<br />Cost</strong></td>
 <td align="center"><strong># of Pmts<br />Left</strong></td>
 </tr>

 <tr>
 <td colspan="2">Current totals:</td>
 <td align="center"><input type="text" name="totalprin" size="9" /></td>
 <td align="center"><font face='arial' size='2' color='#000000'> N/A </font></td>
 <td align="center"><input type="text" name="totalpmt" size="9" /></td>
 <td align="center"><input type="text" name="totalint" size="9" /></td>
 <td align="center"><input type="text" name="totalnprs" size="9" /></td>
 </tr>

 <tr>
 <td colspan="2">ADP totals:</td>
 <td align="center"><input type="text" name="adp_totalprin" size="9" /></td>
 <td align="center"><font face='arial' size='2' color='#000000'> N/A </font></td>
 <td align="center"><input type="text" name="adp_totalpmt" size="9" /></td>
 <td align="center"><input type="text" name="adp_totalint" size="9" /></td>
 <td align="center"><input type="text" name="adp_totalnprs" size="9" /></td>
 </tr>

 <tr>
 <td colspan="5">Time and interest savings from Accelerated Debt Payoff Plan:</td>
 <td align="center"><input type="text" name="adp_int_save" size="9" /></td>
 <td align="center"><input type="text" name="adp_npr_save" size="9" /></td>
 </tr>

 <tr>
 <td colspan=7 align="center">
 <div id="summary" align="left">
 </div>
 <input type="hidden" name="schedule_head" />
 <input type="hidden" name="schedule_rows" />
 <input type="hidden" name="summary_head" />
 <input type="hidden" name="summary_rows" />
 </td>
 </tr>

 <tr>
 <td align="center" colspan="7">
 <input type="button" value="Create Payment Schedule" onClick="createSchedule(this.form)" class="table-btn"/> 
 <input type="button" value="Create Payoff Summary" onClick="createSummary(this.form)" class="table-btn"/>
 </td>
 </tr>
 </tbody>
 </table>
 </form>
 
 </div>
 
 <p>&nbsp;</p> 
<a name="viewrates"></a>

<div id="mortcalcbiz-fulltable"></div>

 
<p>&nbsp;</p>
<p><img src="../img/debt-management.png" width="1250" height="942" alt="Debt Management."></p>
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