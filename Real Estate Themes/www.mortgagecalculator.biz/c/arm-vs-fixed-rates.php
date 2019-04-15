<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>1, 3, 5 7 &amp; 10 Year ARM vs 30 Year Fixed Mortgage Rates</title>		
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
   var Vfixed_rate = sn(document.calc.fixed_rate.value);
   var Vadj_start_rate = sn(document.calc.adj_start_rate.value);
   var Vadj_start_months = sn(document.calc.adj_start_months.value);
   var Vadj_rate_cap = sn(document.calc.adj_rate_cap.value);
   var Vadjust_amt = sn(document.calc.adjust_amt.value);
   var Vadjust_amt_1 = sn(document.calc.adjust_amt_1.value);
   var Vio_start_rate = sn(document.calc.io_start_rate.value);
   var Vio_start_months = sn(document.calc.io_start_months.value);
   var Vio_rate_cap = sn(document.calc.io_rate_cap.value);

   var alert_txt = "";

   if(Vprincipal == 0) {
   } else
   if(Vadjust_amt == 0) {
   } else
   if(Vfixed_rate == 0) {
   } else
   if(Vadj_start_rate == 0) {
   } else
   if(Vadj_start_months == 0) {
   } else
   if(Vadj_rate_cap == 0) {
   } else
   if(Vio_start_rate == 0) {
   } else
   if(Vio_start_months == 0) {
   } else
   if(Vio_rate_cap == 0) {
   } else {

      var VnumYears = sn(document.calc.numYears.value);
      var term_months = VnumYears * 12;

      if(Vprincipal < 100) {
      } else
      if(Vprincipal > 100000000) {
      } else
      if(Vadjust_amt > 3) {
      } else
      if(Vadjust_amt < -3) {
      } else
      if(Vadj_start_rate > 25) {
      } else
      if(Vadj_rate_cap < 5) {
      } else
      if(Vadj_rate_cap > 25) {
      } else
      if(Vadj_start_months > 120) {
      } else
      if(Vio_start_rate > 25) {
      } else
      if(Vio_rate_cap < 5) {
      } else
      if(Vio_rate_cap > 25) {
      } else
      if(Vio_start_months > 120) {
      } else {



         var Vfixed_pmt = computeMonthlyPayment(Vprincipal, term_months, Vfixed_rate);
         Vfixed_pmt = Math.round(Vfixed_pmt * 100) / 100;
         document.calc.fixed_pmt.value = fns(Vfixed_pmt,2,1,1,1);

         var Vadj_start_pmt = computeMonthlyPayment(Vprincipal, term_months, Vadj_start_rate);
         //Vadj_start_pmt = Math.round(Vadj_start_pmt * 100) / 100;
         document.calc.adj_start_pmt.value = fns(Vadj_start_pmt,2,1,1,1);

         var Vio_start_pmt = Vio_start_rate / 100 / 12 * Vprincipal;
         document.calc.io_start_pmt.value = fns(Vio_start_pmt,2,1,1,1);

         var fix_rate = Vfixed_rate;
         var adj_rate = Vadj_start_rate;
         var io_rate = Vio_start_rate;

         var fix_pmt = Vfixed_pmt;
         var adj_pmt = Vadj_start_pmt;
         var io_pmt = Vio_start_pmt;

         var fix_accum_pmts = 0;
         var adj_accum_pmts = 0;
         var io_accum_pmts = 0;

         var fix_prin = Vprincipal;
         var fix_int_port = 0;
         var fix_accum_int = 0;
         var fix_prin_port = 0;
         var fix_accum_prin = 0;

         var adj_prin = Vprincipal;
         var adj_int_port = 0;
         var adj_accum_int = 0;
         var adj_prin_port = 0;
         var adj_accum_prin = 0;

         var io_prin = Vprincipal;
         var io_int_port = 0;
         var io_accum_int = 0;
         var io_prin_port = 0;
         var io_accum_prin = 0;

         var cnt = 0;
         var adj_adjust_nprs = 0;
         var io_adjust_nprs = 0;
         var Vadjust_months = sn(document.calc.adjust_months.value);

         var Vio_adjust_amt_1 = sn(document.calc.io_adjust_amt_1.value);
         var Vio_adjust_months = sn(document.calc.io_adjust_months.value);
         var Vio_adjust_amt = sn(document.calc.io_adjust_amt.value);


         var adj_new_term_months = 0;
         var io_new_term_months = 0;

         var fix_i = 0;
         var adj_i = 0;
         var io_i = 0;

         var pmtRows = "";

         while(cnt < term_months) {

            cnt += 1;

            if(cnt <= Vadj_start_months) {
               adj_rate = Vadj_start_rate;
            } else {
               if((Number(cnt)-Number(1)-Number(Vadj_start_months)) % Vadjust_months == 0) {
                  adj_adjust_nprs += 1;
                  adj_new_term_months = Number(term_months) - Number(cnt) + Number(1);
                  adj_rate = Number((adj_adjust_nprs - 1) * Vadjust_amt) + Number(Vadj_start_rate) + Number(Vadjust_amt_1);
                  if(adj_rate < 2) {
                     adj_rate = 2;
                  }
                  if(adj_rate > Vadj_rate_cap) {
                     adj_rate = Vadj_rate_cap;
                  }
                  adj_pmt = computeMonthlyPayment(adj_prin, adj_new_term_months, adj_rate);
                  //adj_pmt = Math.round(adj_pmt * 100) / 100;
               }
            }


            if(cnt <= Vio_start_months) {
               io_rate = Vio_start_rate;
            } else {
               if((Number(cnt)-Number(1)-Number(Vio_start_months)) % Vio_adjust_months == 0) {
                  io_adjust_nprs += 1;
                  io_new_term_months = Number(term_months) - Number(cnt) + Number(1);
                  io_rate = Number((io_adjust_nprs -1) * Vio_adjust_amt) + Number(Vio_start_rate) + Number(Vio_adjust_amt_1);
                  if(io_rate < 0) {
                     io_rate = 0;
                  }
                  if(io_rate > Vio_rate_cap) {
                     io_rate = Vio_rate_cap;
                  }
                  io_pmt = Math.round(io_rate / 100 / 12 * Vprincipal * 100) / 100;
               }
            }


            fix_i = fix_rate / 100 / 12;
            adj_i = adj_rate / 100 / 12;

            if(cnt < term_months) {

               fix_int_port = Math.round(fix_prin * fix_i * 100) / 100;
               fix_accum_int += fix_int_port;
               fix_prin_port= Number(fix_pmt) - Number(fix_int_port);
               fix_accum_prin = Number(fix_accum_prin) + Number(fix_prin_port);
               fix_prin = Number(fix_prin) - Number(fix_prin_port);

               adj_int_port = Math.round(adj_prin * adj_i * 100) / 100;
               adj_accum_int += adj_int_port;
               adj_prin_port= Number(adj_pmt) - Number(adj_int_port);
               adj_accum_prin = Number(adj_accum_prin) + Number(adj_prin_port);
               adj_prin = Number(adj_prin) - Number(adj_prin_port);

            } else {

               fix_int_port = Math.round(fix_prin * fix_i * 100) / 100;
               fix_accum_int += fix_int_port;
               fix_prin_port= fix_prin;
               fix_accum_prin = Number(fix_accum_prin) + Number(fix_prin_port);
               fix_prin = Number(fix_prin) - Number(fix_prin_port);
               fix_pmt = Number(fix_prin_port) + Number(fix_int_port);

               adj_int_port = Math.round(adj_prin * adj_i * 100) / 100;
               adj_accum_int += adj_int_port;
               adj_prin_port= adj_prin;
               adj_accum_prin = Number(adj_accum_prin) + Number(adj_prin_port);
               adj_prin = Number(adj_prin) - Number(adj_prin_port);
               adj_pmt = Number(adj_prin_port) + Number(adj_int_port);
            }

            fix_accum_pmts += fix_pmt;
            adj_accum_pmts += adj_pmt;
            io_accum_pmts += io_pmt;
            io_accum_int += io_pmt;

            if(report == 1) {
                pmtRows = "" + pmtRows + "<tr><td align=right><font face='arial'>";
                pmtRows += "<small>" + cnt + "</small></td><td align=right>";
                pmtRows += "<font face='arial'><small>" + fns(fix_pmt,2,1,1,1) + "</small>";
                pmtRows += "</td><td align=right><font face='arial'>";
                pmtRows += "<small>" + fns(fix_prin,2,1,1,1) + "</small>";
                pmtRows += "</td><td align=right><font face='arial'>";
                pmtRows += "<small>" + fns(adj_pmt,2,1,1,1) + "</small>";
                pmtRows += "</td><td align=right><font face='arial'>";
                pmtRows += "<small>" + fns(adj_prin,2,1,1,1) + "</small>";
                pmtRows += "</td><td align=right><font face='arial'>";
                pmtRows += "<small>" + fns(io_pmt,2,1,1,1) + "</small>";
                pmtRows += "</td><td align=right><font face='arial'>";
                pmtRows += "<small>" + fns(io_prin,2,1,1,1) + "</small></td></tr>";
            }

         }

         document.calc.fixed_total_pmts.value = fns(fix_accum_pmts,2,1,1,1);
         document.calc.fixed_total_int.value = fns(fix_accum_int,2,1,1,1);
         document.calc.fixed_max_pmt.value = fns(Vfixed_pmt,2,1,1,1);


         document.calc.adj_total_pmts.value = fns(adj_accum_pmts,2,1,1,1);
         document.calc.adj_total_int.value = fns(adj_accum_int,2,1,1,1);
         var Vadj_max_pmt = 0;
         if(adj_pmt > Vadj_start_pmt) {
            Vadj_max_pmt = adj_pmt;
         } else {
            Vadj_max_pmt = Vadj_start_pmt;
         }
         document.calc.adj_max_pmt.value = fns(Vadj_max_pmt,2,1,1,1);

         document.calc.io_total_pmts.value = fns(io_accum_pmts,2,1,1,1);
         document.calc.io_total_int.value = fns(io_accum_int,2,1,1,1);
         var Vio_max_pmt = 0;
         if(io_pmt > Vio_start_pmt) {
            Vio_max_pmt = io_pmt;
         } else {
            Vio_max_pmt = Vio_start_pmt;
         }
         document.calc.io_max_pmt.value = fns(Vio_max_pmt,2,1,1,1);

         var fix_max_rate = fix_rate;

         var adj_max_rate = 0;
         if(adj_rate > Vadj_start_rate) {
            adj_max_rate = adj_rate;
         } else {
            adj_max_rate = Vadj_start_rate;
         }

         var io_max_rate = 0;
         if(io_rate > Vio_start_rate) {
            io_max_rate = io_rate;
         } else {
            io_max_rate = Vio_start_rate;
         }

         if(report == 1) {

            var part1 = "<html><head><title>Amortization Schedule</title>";
            part1 += "</head><b";
            part1 += "od";
            part1 += "y bgcolor= '#FFFFFF'></br /></br /><center><font face='arial'>";
            part1 += "<big><strong>Adjustable Rate Mortgage vs. Fixed Mortgage Summary</strong>";
            part1 += "</big></center></br />";


            var part2 = "<center><table border=1 cellpadding=2 cellspacing=0 bordercolor='#EEEEEE'>";
            part2 += "<tr bgcolor='silver'><td colspan='4'><font face='arial'><small>";
            part2 += "<strong>Comparisons</strong></small></td><td align='center'>";
            part2 += "<font face='arial'><small><strong>Fixed Mortgage</strong></small>";
            part2 += "</td><td align='center'><font face='arial'><small><strong>";
            part2 += "Fully Amortizing ARM</strong></small></td><td align='center' colspan='2'>";
            part2 += "<font face='arial'><small><strong>Interest Only ARM</strong></small></td>";
            part2 += "</tr><tr><td colspan=4><font face='arial'><small>Mortgage loan amount:";
            part2 += "</small></td><td align='right'><font face='arial'>";
            part2 += "<small>" + fns(Vprincipal,2,1,1,1) + "</small></td>";
            part2 += "<td align='right'><font face='arial'>";
            part2 += "<small>" + fns(Vprincipal,2,1,1,1) + "</small>";
            part2 += "</td><td align='right'><font face='arial'>";
            part2 += "<small>" + fns(Vprincipal,2,1,1,1) + "</small></td></tr>";
            part2 += "<tr><td colspan=4><font face='arial'><small>Mortgage term:</small>";
            part2 += "</td><td align='right'><font face='arial'>";
            part2 += "<small>" + VnumYears + " years</small></td><td align='right'>";
            part2 += "<font face='arial'><small>" + VnumYears + " years</small></td>";
            part2 += "<td align='right'><font face='arial'><small>" + VnumYears + " years</small>";
            part2 += "</td></tr><tr><td colspan=4><font face='arial'>";
            part2 += "<small>Beginning interest rate:</small></td><td align='right'>";
            part2 += "<font face='arial'><small>" + fns(Vfixed_rate,3,0,2,1) + "</small>";
            part2 += "</td><td align='right'><font face='arial'>";
            part2 += "<small>" + fns(Vadj_start_rate,3,0,2,1) + "</small></td>";
            part2 += "<td align='right'><font face='arial'>";
            part2 += "<small>" + fns(Vio_start_rate,3,0,2,1) + "</small></td></tr>";
            part2 += "<tr><td colspan=4><font face='arial'><small>Maximum interest rate:</small>";
            part2 += "</td><td align='right'><font face='arial'>";
            part2 += "<small>" + fns(Vfixed_rate,3,0,2,1) + "</small></td>";
            part2 += "<td align='right'><font face='arial'>";
            part2 += "<small>" + fns(adj_max_rate,3,0,2,1) + "</small></td>";
            part2 += "<td align='right'><font face='arial'>";
            part2 += "<small>" + fns(io_max_rate,3,0,2,1) + "</small></td></tr>";
            part2 += "<tr><td colspan=4><font face='arial'><small>Beginning monthly payment:</small>";
            part2 += "</td><td align='right'><font face='arial'>";
            part2 += "<small>" + fns(Vfixed_pmt,2,1,1,1) + "</small></td>";
            part2 += "<td align='right'><font face='arial'>";
            part2 += "<small>" + fns(Vadj_start_pmt,2,1,1,1) + "</small></td>";
            part2 += "<td align='right'><font face='arial'>";
            part2 += "<small>" + fns(Vio_start_pmt,2,1,1,1) + "</small></td></tr>";
            part2 += "<tr><td colspan=4><font face='arial'><small>Maximum monthly payment:";
            part2 += "</small></td><td align='right'><font face='arial'>";
            part2 += "<small>" + fns(Vfixed_pmt,2,1,1,1) + "</small></td>";
            part2 += "<td align='right'><font face='arial'>";
            part2 += "<small>" + fns(Vadj_max_pmt,2,1,1,1) + "</small></td>";
            part2 += "<td align='right'><font face='arial'>";
            part2 += "<small>" + fns(Vio_max_pmt,2,1,1,1) + "</small></td></tr>";
            part2 += "<tr><td colspan=4><font face='arial'><small>Interest rate cap:</small></td>";
            part2 += "<td align='right'><font face='arial'><small>N/A</small></td>";
            part2 += "<td align='right'><font face='arial'>";
            part2 += "<small>" + fns(Vadj_rate_cap,3,0,2,1) + "</small></td>";
            part2 += "<td align='right'><font face='arial'>";
            part2 += "<small>" + fns(Vio_rate_cap,3,0,2,1) + "</small></td></tr>";
            part2 += "<tr><td colspan=4><font face='arial'><small>Expected rate adjustment amount:";
            part2 += "</small></td><td align='right'><font face='arial'><small>N/A</small>";
            part2 += "</td><td align='right'><font face='arial'>";
            part2 += "<small>" + fns(Vadjust_amt,2,0,2,1) + "</small></td>";
            part2 += "<td align='right'><font face='arial'>";
            part2 += "<small>" + fns(Vadjust_amt,2,0,2,1) + "</small></td></tr>";
            part2 += "<tr><td colspan=4><font face='arial'><small>Initial fixed rate period:</small>";
            part2 += "</td><td align='right'><font face='arial'><small>N/A</small></td>";
            part2 += "<td align='right'><font face='arial'><small>" + Vadj_start_months + " months";
            part2 += "</small></td><td align='right'><font face='arial'>";
            part2 += "<small>" + Vio_start_months + " months</small></td></tr>";
            part2 += "<tr><td colspan=4><font face='arial'><small>Total payments:</small></td>";
            part2 += "<td align='right'><font face='arial'>";
            part2 += "<small>" + fns(fix_accum_pmts,2,1,1,1) + "</small></td>";
            part2 += "<td align='right'><font face='arial'>";
            part2 += "<small>" + fns(adj_accum_pmts,2,1,1,1) + "</small></td>";
            part2 += "<td align='right'><font face='arial'>";
            part2 += "<small>" + fns(io_accum_pmts,2,1,1,1) + "</small></td></tr>";
            part2 += "<tr><td colspan=4><font face='arial'><small>Total interest:</small></td>";
            part2 += "<td align='right'><font face='arial'>";
            part2 += "<small>" + fns(fix_accum_int,2,1,1,1) + "</small></td>";
            part2 += "<td align='right'><font face='arial'>";
            part2 += "<small>" + fns(adj_accum_int,2,1,1,1) + "</small></td>";
            part2 += "<td align='right'><font face='arial'>";
            part2 += "<small>" + fns(io_accum_int,2,1,1,1) + "</small></td></tr>";
            part2 += "<tr><td colspan=4><font face='arial'><small>Ending principal balance:</small>";
            part2 += "</td><td align='right'><font face='arial'>";
            part2 += "<small>" + fns(fix_prin,2,1,1,1) + "</small></td>";
            part2 += "<td align='right'><font face='arial'>";
            part2 += "<small>" + fns(adj_prin,2,1,1,1) + "</small></td>";
            part2 += "<td align='right'><font face='arial'>";
            part2 += "<small>" + fns(Vprincipal,2,1,1,1) + "</small></td></tr>";
            part2 += "<tr><td colspan=7><center><font face='arial'><strong>";
            part2 += "Schedule of Payments</strong></br /><font face='arial'><small><small>";
            part2 += "Please allow for slight rounding differences.</small></small>";
            part2 += "</center></td></tr><tr bgcolor='silver'><td align='center'>";
            part2 += "<font face='arial'><small><strong>Pmt</strong></small></td>";
            part2 += "<td align='center' colspan='2'><font face='arial'><small><strong>Fixed Mortgage</strong>";
            part2 += "</small></td><td align='center' colspan='2'><font face='arial'>";
            part2 += "<small><strong>Fully Amortizing ARM</strong></small></td>";
            part2 += "<td align='center' colspan='2'><font face='arial'><small><strong>";
            part2 += "Interest Only ARM</strong></small></td></tr><tr bgcolor='silver'>";
            part2 += "<td align='center'><font face='arial'><small><strong>#</strong></small></td>";
            part2 += "<td align='center'><font face='arial'><small><strong>Payment</strong></small></td>";
            part2 += "<td align='center'><font face='arial'><small><strong>Balance</strong></small>";
            part2 += "</td><td align='center'><font face='arial'><small><strong>Payment</strong>";
            part2 += "</small></td><td align='center'><font face='arial'><small>";
            part2 += "<strong>Balance</strong></small></td><td align='center'>";
            part2 += "<font face='arial'><small><strong>Payment</strong></small></td>";
            part2 += "<td align='center'><font face='arial'><small><strong>Balance</strong>";
            part2 += "</small></td></tr>";

            var part3 = ("" + pmtRows + "");

            var part4 = "</table></br /><center><form method='post'>";
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

   document.calc.fixed_pmt.value = "";
   document.calc.fixed_total_pmts.value = "";
   document.calc.fixed_total_int.value = "";
   document.calc.fixed_max_pmt.value = "";

   document.calc.adj_start_pmt.value = "";
   document.calc.adj_total_pmts.value = "";
   document.calc.adj_total_int.value = "";
   document.calc.adj_max_pmt.value = "";

   document.calc.io_start_pmt.value = "";
   document.calc.io_total_pmts.value = "";
   document.calc.io_total_int.value = "";
   document.calc.io_max_pmt.value = "";
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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/arm-vs-fixed-rates.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				<div class="main-heading"><h1>ARM vs Fixed Rate Mortgage Calculator </h1>
</div>
                    <ul id="breadcrumbs">

                        <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
                        <li><a href="https://www.mortgagecalculator.biz/c/arm.php">ARM</a></li>
                        <li>Fixed vs Adjustable Rate Mortgages</li>
                    </ul>
                </div>   			<div class="bottom-section">
<p><!-- pmms -->
 This calculator helps you compare a fixed rate mortgage with both fully-amortizing and interest-only adjustable rate mortgages (ARMs).               </p>
 
                <p>With mortgage rates near their historic lows, fixed rate home mortgages are likely going to be a much better deal if you plan on living in the house for an extended period of time, as when rates reset on ARM loans the prior short-term savings will likely be more than offset by the higher rates for the duration of the loan, which can cause the interest-only loan payment to exceed the amoritizing 30 year fixed rate payments if mortgage rates spike high enough. For your conveniene, Freddie Mac's PMMS rates have been included to the right.</p>

   				<div class="table-block">
<form name="calc" method="post" action="#">
 <table>
 <tbody>
 <tr>
 <td colspan="4">
 <strong>Loan Information</strong>
 </td>
 </tr>

 <tr>
 <td nowrap colspan="3">
 Mortgage loan amount:
 </td>
 <td align="center">
 <input type="number" step="any" name="principal" size="10" value="250000" onKeyUp="clear_results(this.form);computeForm(0)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>


 <tr>
 <td nowrap colspan="3">
 Mortgage loan term:
 </td>
 <td align="center">
 <input name="numYears" type="number" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" onChange="clear_results(this.form);computeForm(0)" value="30" size="10" />
 </td>
 </tr>

 <tr>
 <td colspan="4">
 <strong>Fixed Rate Mortgage</strong>
 </td>
 </tr>

 <tr>
 <td nowrap colspan="3">
 <a href="#viewrates"><strong>Fixed interest rate</strong></a> (%):
 </td>
 <td align="center">
 <input type="number" step="any" name="fixed_rate" size="10" value="6.500" onKeyUp="clear_results(this.form);computeForm(0)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td colspan="4">
 <strong>Fully Amortized Adjustable Rate Mortgage</strong>
 </td>
 </tr>

 <tr>
 <td nowrap colspan="3">
 Beginning interest rate (%):
 </td>
 <td align="center">
 <input type="number" step="any" name="adj_start_rate" size="10" value="5.250" onKeyUp="clear_results(this.form);computeForm(0)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td nowrap colspan="3">
 Number of months before first rate adjustment:
 </td>
 <td align="center">
 <input type="number" step="any" name="adj_start_months" size="10" value="60" onKeyUp="clear_results(this.form);computeForm(0)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td nowrap colspan="3">
 Expected initial adjustment (%):
 </td>
 <td align="center">
 <input type="number" step="any" name="adjust_amt_1" size="10" value="1" onKeyUp="clear_results(this.form);computeForm(0)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td nowrap colspan="3">
 Number of months before subsequent rate adjustments:
 </td>
 <td align="center">
 <input type="number" step="any" name="adjust_months" size="10" value="12" onKeyUp="clear_results(this.form);computeForm(0)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td nowrap colspan="3">
 Expected subsequent adjustments (%):
 </td>
 <td align="center">
 <input type="number" step="any" name="adjust_amt" size="10" value="0.25" onKeyUp="clear_results(this.form);computeForm(0)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>



 <tr>
 <td nowrap colspan="3">
 Interest rate cap (%):
 </td>
 <td align="center">
 <input type="number" step="any" name="adj_rate_cap" size="10" value="12" onKeyUp="clear_results(this.form);computeForm(0)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td colspan="4">
 <strong>Interest-Only Adjustable Rate Mortgage</strong>
 </td>
 </tr>

 <tr>
 <td nowrap colspan="3">
 Beginning interest rate (%):
 </td>
 <td align="center">
 <input type="number" step="any" name="io_start_rate" size="10" value="5.000" onKeyUp="clear_results(this.form);computeForm(0)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td nowrap colspan="3">
 Number of months before first rate adjustment:
 </td>
 <td align="center">
 <input type="number" step="any" name="io_start_months" size="10" value="36" onKeyUp="clear_results(this.form);computeForm(0)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td nowrap colspan="3">
 Expected initial adjustment (%):
 </td>
 <td align="center">
 <input type="number" step="any" name="io_adjust_amt_1" size="10" value="1" onKeyUp="clear_results(this.form);computeForm(0)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td nowrap colspan="3">
 Number of months before subsequent rate adjustments:
 </td>
 <td align="center">
 <input type="number" step="any" name="io_adjust_months" size="10" value="12" onKeyUp="clear_results(this.form);computeForm(0)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td nowrap colspan="3">
 Expected subsequent adjustments (%):
 </td>
 <td align="center">
 <input type="number" step="any" name="io_adjust_amt" size="10" value="0.25" onKeyUp="clear_results(this.form);computeForm(0)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td nowrap colspan="3">
 Interest rate cap (%):
 </td>
 <td align="center">
 <input type="number" step="any" name="io_rate_cap" size="10" value="12" onKeyUp="clear_results(this.form);computeForm(0)" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td colspan="2" align="center">
 <input type="reset" class="table-btn" value="Clear" />
 </td>
 <td colspan="2" align="center">
 <input type="button" class="table-btn" name="compute" value="Compute Comparisons" onClick="computeForm(0)" />
 </td>

 </tr>

 <tr>
 <td>
 <strong>Comparison Results</strong>
 </td>
 <td align="center">
 <strong>Fixed</strong>
 </td>
 <td align="center">
 <strong>ARM</strong>
 </td>
 <td align="center">
 <strong>Interest-Only ARM</strong>
 </td>
 </tr>

 <tr>
 <td nowrap>
 Beginning monthly payment:<br />
 (
 principal &amp; interest)
 </td>
 <td align="center">
 <input type="text" name="fixed_pmt" size="10" />
 </td>
 <td align="center">
 <input type="text" name="adj_start_pmt" size="10" />
 </td>
 <td align="center">
 <input type="text" name="io_start_pmt" size="10" />
 </td>
 </tr>

 <tr>
 <td nowrap>
 Total monthly payments:
 </td>
 <td align="center">
 <input type="text" name="fixed_total_pmts" size="10" />
 </td>
 <td align="center">
 <input type="text" name="adj_total_pmts" size="10" />
 </td>
 <td align="center">
 <input type="text" name="io_total_pmts" size="10" />
 </td>
 </tr>

 <tr>
 <td nowrap>
 Total interest:
 </td>
 <td align="center">
 <input type="text" name="fixed_total_int" size="10" />
 </td>
 <td align="center">
 <input type="text" name="adj_total_int" size="10" />
 </td>
 <td align="center">
 <input type="text" name="io_total_int" size="10" />
 </td>
 </tr>

 <tr>
 <td nowrap>
 Maximum monthly payment:
 </td>
 <td align="center">
 <input type="text" name="fixed_max_pmt" size="10" />
 </td>
 <td align="center">
 <input type="text" name="adj_max_pmt" size="10" />
 </td>
 <td align="center">
 <input type="text" name="io_max_pmt" size="10" />
 </td>
 </tr>


 <tr>
 <td colspan="4" align="center">
 <input type="button" name="compute" class="table-btn" value="Create Comparison Report and Payment Schedule" onClick="computeForm(0);computeForm(1)" />
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

 <h2>Adjustable Rate vs Fixed Rate Mortgages</h2>
<p> A home mortgage is a loan from a lending institution that follows a   written agreement between the buyer and the lender.  Terms of the loan   vary depending on the buyer's ability to match the current financial   instrument with the predicted future situation in the household.  In the   past, a home shopper had confidence that the household income would   stay relatively constant since jobs were sound and the economy was   strong.  Today, homebuyers struggle to accept long-term debt that could   cause significant hardship if the local, or national, economy weakens   even more.  Sufficient information about the adjustable rate mortgage in   comparison to the fixed rate mortgage should allow the home shopper to   make an informed decision.</p>
<h3>Benchmarks That Influence Mortgage Rates</h3>
<p>
  Contrary to popular belief, financial institutions do not set mortgage   rates based on random factors, economic events or weather forecasts.    Banks are businesses with financial objectives that must be met to stay   compliant with investor objectives and legal solvency requirements.    State and federal government agencies enforce regulations to ensure that   the bank has sufficient funds to back the depositors.</p>
<p>
  Mortgage rates are determined using a number of factors that will yield a   return that makes the investment worthwhile for the institution.    Losing money on mortgages is not a wise business practice.</p>
<ul class="arrow">
  <li>
    	Freddie Mac, or the Federal Home Loan Mortgage Corporation is a   public, government-sponsored enterprise that publishes a set of required   net yield rates for fixed and adjustable rate mortgages.</li>
  <li> The 10-year U.S. Treasury note yield is an important benchmark for   bank loan rates.  Government obligations have been considered the safest   investments available.  Lenders offer a loan interest rate that is 1.5   to 2.0 percent above the 10-year note yield.</li>
  <li> Rate decisions from the Federal Reserve determine the rates lenders   will pay to borrow funds from this quasi-private central bank of the   United States.  Discount rates offered depend on the bank and the   season.</li>
  <li> Adjustable rate mortgages can be indexed to the Prime Rate, which is offered to the banks' best customers.</li>
</ul>
<p>
  Economic indicators work together to reveal the strength of the economy   to these powerful entities.  The value of the U.S. dollar on the global   currency exchanges is important since the banks are global entities.    Consumers are wise to recognize the ever-changing conditions in the   financial markets that cause the lenders to change rates often.    Mortgage decisions are affected directly by the frequency of rate   adjustments.</p>
<h3>Available ARM Mortgage Terms</h3>
<p><img src="../img/variable-rates.png" width="630" height="446" alt="Variable Rates." /> </p>
<p>Mortgage loans with an interest rate that changes at regular intervals   are called adjustable rate mortgages, or ARMs.  A loan of this type has a   set interest rate for the first three, five or seven years.  Lower   rates allow the borrower to qualify for a larger loan since the approval   process is based on the monthly payment.</p>
<h4>
  Common ARM Loan Terms</h4>
<p>
  Borrowers can choose from ARM loans that have a fixed interest rate for   the initial period of the loan, which can be 1, 3, 5, 7, or 10 years.    After the initial period, the interest rate will adjust annually for the   rest of the loan term.  Adjustments to the interest rate will be tied   to the market indicators at the time of the adjustment.  Borrowers must   be aware of the economic conditions that can cause an ARM to become   unaffordable overnight.  Loan terms vary widely between banks.  Some   lenders have limits on the amount that a loan interest rate can adjust   in a single year.  This option prevents dramatic jumps in the interest   rate on the ARM.  In the loan documentation, the borrower will see the   ARM term written as 5/1, which means that the interest rate remains   constant for five years and then adjusts every year thereafter.</p>
<h4>
  Popular ARM Terms</h4>
<p>
  Borrowers are wise to evaluate life events prior to selecting the length   of time for the initial loan period.  The most common ARM loan is the   5/1 term, which offers five years at the same interest rate.  Short-term   stays in a house can dictate the length of time in which the borrower   will want to lock in the interest rate.  Job assignments, such as   military locations, can guide the decision.</p>
<h3>Fixed Rate Mortgage Terms</h3>
<p>
  The potential homeowner should consider the length of time that the   family anticipates living in the home.  At times, the fixed-rate 30-year   mortgage is the best choice since the original plan includes paying off   the entire balance.  Fixed rate mortgages can be paid off more quickly   without penalty in many situations.</p>
<h4>
  30-year fixed rate mortgage</h4>
<p>
  Lenders set the 30-year mortgage interest rate where the borrower pays   for the length in which the money is tied up in the loan.  Over the life   of the loan, the borrower will pay more for this loan than for one of a   shorter duration.  Long-term planning strategies include additional   payments each year to reduce the amount of interest paid over the 30   years.  The 30-year fixed-rate mortgage is the most popular mortgage   offered.</p>
<h4>
  20-year fixed rate mortgage</h4>
<p>
  The 20-year fixed rate mortgage will have a lower interest rate than the   30-year since the bank will be able to use the funds 10 years sooner.    Homeowners will seek this type of loan when the home price is lower and   more funds are available for the down payment.  The monthly payment will   be higher for the same loan amount since the term is shorter.</p>
<h4>
  15-year fixed rate mortgage</h4>
<p>
  Some borrowers prefer a 15-year mortgage to reduce the amount of   interest paid over the life of the loan.  Lenders set the interest lower   on these mortgages since the money is not tied up for as long.  The   monthly payment is higher for the same amount of money since there are   fewer payments.</p>
<h3>Differences Between ARM and Fixed-Rate Mortgages</h3>
<p>
  Lenders set interest rates on ARM and fixed-rate mortgages based on the   amount of money that must be earned during the loan term to make the   investment profitable.  Projecting the value of a dollar over the next   30 years causes the lender to take a conservative estimate that is a   little higher than actual costs to ensure that the loan does not lose   money.  Interest rates on the adjustable rate mortgages are easier to   project since economic indicators move in cycles, such as 3, 5, or 7   years.</p>
<h4>
  Adjustable Rate Mortgages</h4>
<p>
  <strong>Advantages</strong></p>
<ul class="arrow">
  <li>	Lower rates and monthly payments during the initial lending phase.    Lower payments allow the borrower to qualify for larger loans.</li>
  <li> Falling rates can be leveraged without refinancing the loan.  ARM   loans follow the markets, so the borrower has an advantage when the loan   rates fall multiple times after the initial loan period.</li>
  <li> Borrowers have more cash available for other obligations each month.</li>
  <li> Frequent moves will be less expensive for the homeowner who needs to switch locations and loans more often.</li>
</ul>
<p>
  	<strong>Disadvantages</strong></p>
<ul class="arrow">
  <li>     Significant increases in the interest rate and monthly payments can   occur without warning throughout the loan term.  Sharp increases in the   ARM interest rate can create unaffordable monthly payments for the   borrower.</li>
  <li> The first interest rate adjustment after the initial loan period is   not limited by the annual limits on the loan.  Adjustments to the   payment can be extremely expensive for the unsuspecting borrower.</li>
  <li> Economic conditions can set an upward trend for home mortgage rates that make the ARM loan unaffordable over time.</li>
  <li> ARM loans are difficult to decipher for the borrower.  Lenders can   create a complex loan agreement that is expensive for the borrower and   lucrative for the lender.</li>
  <li> Low monthly payments can cause the borrower to end up owing more on   the loan at the end of the term than when the initial loan was   established.  Interest is applied to the loan balance over the lifetime   of the loan even if the mortgage payment does not cover the interest   expense.</li>
</ul>
<h4>
  Fixed Rate Mortgages</h4>
<p>
  <strong>Advantages</strong></p>
<ul class="arrow">
  <li>
    Interest rates and monthly payments will never change from the initial   closing on the loan to the final payment.  Inflation and market   fluctuations have no impact on the loan terms.</li>
  <li> Homeowners are able to live according to a household budget that is   predictable and affordable.  Housing costs are manageable since the   mortgage payment remains constant.</li>
  <li> Lenders are unable to apply any additional fees or adjustments to the fixed-rate loan.</li>
</ul>
<p>
  	<strong>Disadvantages</strong></p>
<ul class="arrow">
  <li>
    	Declining interest rates require mortgage refinance loans to reduce the interest rate on the mortgage agreement.</li>
  <li> A fixed rate mortgage written during a time of high interest rates can be too expensive for the borrower to qualify.</li>
  <li> Fixed rate mortgages are almost identical from lender to lender.    Borrowers will find that a fixed-rate mortgage is sold multiple times to   other lenders.  The terms will never change, but the entity that   receives the payment will change.</li>
</ul>
<h3>Rate Shift Risks in ARMs</h3>
<p>
  Borrowers choose an adjustable rate mortgage loan for any number of   reasons.  A glimpse at the lender's perspective on this loan type is   essential during the decision process.  Interest rate shifts no longer   rest on the lender when the mortgage has an adjustable interest rate   feature.  The borrower accepts all of the risk for the interest rate   changes that happen following the initial loan term.  Market forces can   dictate higher interest rates that will be passed directly to the   borrower.  Interest rate jumps will cause the monthly payments to   increase to offset the costs the lender would have absorbed on a   fixed-rate mortgage.</p>
<p>
  Lower monthly payments during the initial loan term are the borrower's   reward for shouldering the interest rate risk.  The lender will accept   an initial loss that can be recovered in the future years of the ARM   agreement.  Borrowers must beware of the potential for unaffordable loan   payments once the initial loan term ends.</p>
<h3>Borrowers Win With Longer Mortgage Terms</h3>
<p>
  Homebuyers must consider many factors when selecting the best mortgage   type and length for the current home purchase.  Life events can change   the household income level and monthly expenses.  Upcoming events, such   as college, business growth or retirement, can be anticipated.  Serious   illness can be a life-changing surprise that alters the family's ability   to afford the rising costs of an ARM loan.</p>
<p>
  Personal situations will determine which loan type is advantageous:</p>
<ul class="arrow">
  <li>
    <strong>Adjustable-rate mortgages</strong> are appropriate when the homeowner   anticipates a move within the initial mortgage period.  Lower interest   rates and monthly payments reduce the household expenses while the   family resides in the house.  High market interest rates can be offset   through the use of an ARM loan.  Risks arise when the situation changes   and the mortgage is held past the initial period.  Borrowers must be   prepared for that first payment jump if the market interest rates are   rising.  In some instances, the real estate market will not support a   rapid sale of the property.  Homeowners can be left with an expensive   payment if life events shift in the wrong direction.</li>
  <li><strong>Fixed-rate mortgages</strong> offer stability for the homeowner who plans   to remain in the same house for the foreseeable future.  Low interest   rates can be set for the entire time the family lives in the house.    Life events are easier to handle when the mortgage payment is constant.    High interest rates can be refinanced when the markets shift.</li>
</ul>
<h3>Personal Finances Must Be In Order</h3>
<p>
  Home ownership has always been the core of the American Dream.  In   reality, the cost of owning a home is much more than the monthly   mortgage payment.  The wise borrower will spend approximately five years   preparing for a lifetime of owning homes of progressively higher value.    Initial preparation can create a firm foundation on which the   financial future can rest.</p>
<ul class="arrow">
  <li><strong>
    	Repay all short-term debts</strong> – Credit card debt is a constant drain on   the monthly budget.  Repayment of all outstanding credit card balances   will improve the household cash flow in preparation for home ownership.    Switch to paying for all purchases with cash, since financial experts   say that using cash causes people to spend 30 percent less during the   year.</li>
  <li><strong>Create an emergency fund</strong> – Every family should have a savings account   with 6 to 12 months of income set aside.  Building this fund is   excellent preparation for saving for the house down payment.  The money   in this account is used to pay for household repairs that would cause   the family to incur debt.  Available funds are meant to sustain the   family through a serious illness or the loss of a job. </li>
  <li><strong>Trim the household budget</strong> – All unnecessary monthly expenses should   be removed from the monthly budget.  Extras are unnecessary when the   family has a goal of owning a home.  Each family will decide what is   necessary, and how to reduce the amount of money spent each month.    Entertainment costs are a significant category that can be trimmed to   include more family time and free options for having fun.  Eating out   should be limited since buying groceries and cooking at home is much   less expensive.</li>
  <li><strong> Repair both credit reports</strong> – Each year, consumers should request a   copy of the personal credit report from each of the three credit   bureaus.  All negative entries should be evaluated for accuracy.    Mistakes must be corrected by following the written procedure on the   credit bureau's website.  This process can require months, so get   started immediately.  All negative marks that are legitimate must be   handled through payments for outstanding debts.</li>
  <li><strong>Save for the down payment</strong> – Anyone with the dream of living in the   same house for many years will want to save enough money to make a 20   percent down payment at closing time.  A conventional loan is less   expensive for the borrower.  Better interest rates are available to   borrowers who are able to invest this significant amount of money.</li>
  <li><strong> Choose the right mortgage</strong> – Borrowers must consider all of the   information written above when deciding which loan is best.    Short-sightedness can be expensive for the homeowner who opts for a loan   that looks good on paper but does not meet long-term objectives.  Every   aspect of the loan must be considered in light of the economic   conditions that will cause interest rates to rise in coming years.</li>
</ul>
<p>
  Financial position is more important than ever for the homebuyer.    Lenders have strict lending guidelines that are designed to mitigate the   risk of nonpayment from all borrowers.  Federal regulations have been   tightened since the financial crisis of 2008.  Borrowers must have   pristine credit and stable income sources that will prevent problems   with on-time payments for the foreseeable future.</p>
<h3>General Guidelines for Affordable Houses</h3>
<p>
  Lenders have determined that most borrowers can afford to invest a   standard percentage of the household income in a mortgage payment.    Borrowers must perform calculations that apply to the family's actual   lifestyle.  These guidelines can be too expensive for certain situations   where the family participates in other activities that require monthly   fees.  Some households prefer to save more money each month for other   long-term goals and pay a lower mortgage payment each month.</p>
<p>
  Lenders believe an affordable mortgage payment will meet two conditions:</p>
<ul class="arrow">
  <li>
    	The monthly mortgage and property tax obligation will be less than 31 percent of the gross monthly household income.</li>
  <li> The total monthly debt payments for the household will be less than 43   percent of the household income.  All outstanding debts on the credit   history are included in this calculation along with the mortgage payment   and property tax.</li>
</ul>
<p>
  Before agreeing to mortgage terms, the wise lender will be aware of the   family's goals that will require funds as the children grow.  Other   priorities can influence how much money is available for the mortgage   payment.  Lenders can approve a loan that is too expensive for the   family's future goals, which might include shifting to a one-income   family when the first child is born.</p>
<h3>The Need for a Crystal Ball</h3>
<p>
  Mortgage selection can seem like a daunting task since the primary wage   earner is responsible for paying the mortgage every month for years.    Discussions with trusted financial advisors allow the home buyer to   evaluate various scenarios.  Financial goals must be factored into the   decision to prevent unnecessary financial hardship.  Management of the   household income is more important than ever when the mortgage payment   consumes nearly 40 percent of the monthly household income.  Wisdom will   guide the decision when sufficient information is available through   multiple trusted sources. </p>

 
                
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

