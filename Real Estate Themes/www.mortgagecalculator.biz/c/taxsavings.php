<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Home Mortgage Interest Deduction Calculator</title>		
    <meta http-equiv="Cache-control" content="public"/>
    <META NAME="ROBOTS" CONTENT="NOINDEX"/>
        <link rel="canonical" href="https://www.mortgagecalculator.biz/c/tax-savings.php" />		
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


function computeForm(form) {

   var Vprop_value = sn(document.calc.prop_value.value);
   var Vprincipal = sn(document.calc.principal.value);
   var Vrate = sn(document.calc.rate.value);
   var Vterm = sn(document.calc.term.value);
   var Vtax_rate = sn(document.calc.tax_rate.value);
   var Vsave_years = sn(document.calc.save_years.value);


   if(Vprop_value == 0) {
      alert("Please enter the value of the property (purchase price).");
      document.calc.prop_value.focus();
   } else
   if(Vprincipal == 0) {
      alert("Please enter the mortgage's principal amount.");
      document.calc.principal.focus();
   } else
   if(Vrate == 0) {
      alert("Please enter the mortgage's annual interest rate.");
      document.calc.rate.focus();
   } else
   if(Vterm == 0) {
      alert("Please enter the mortgage's term in number of years.");
      document.calc.term.focus();
   } else
   if(Vtax_rate == 0) {
      alert("Please enter the your state and federal tax rate.");
      document.calc.tax_rate.focus();
   } else
   if(Vsave_years == 0) {
      alert("Please enter the number of years you wish to calculate the tax savings for (must be less than or equal to the loan term).");
      document.calc.save_years.focus();
   } else {

      var Vpoints = sn(document.calc.points.value);
      var Vclose_costs = sn(document.calc.close_costs.value);
      var Vprop_tax_rate = sn(document.calc.prop_tax_rate.value);

      var months = Vterm * 12;

      var Vmonthly_pmt = computeMonthlyPayment(Vprincipal, months, Vrate);
      document.calc.monthly_pmt.value = fns(Vmonthly_pmt,2,1,1,1);

      var prop_tax_perc = Vprop_tax_rate / 100;
      var Vann_prop_tax = Vprop_value * prop_tax_perc;
      document.calc.ann_prop_tax.value = fns(Vann_prop_tax,2,1,1,1);

      var prin = Vprincipal;
      var i = Vrate;
      if(i >= 1) {
         i /=100;
      }
      i /= 12;
      var int_port = 0;
      var accum_int = 0;
      var prin_port = 0;
      var save_months = 0;
      if(Vsave_years > Vterm) {
         save_months = months;
      } else {
         save_months = Vsave_years * 12;
      }
      var cnt = 0;

      while(cnt < save_months) {

         cnt += 1;

         int_port = prin * i;
         accum_int += int_port;
         prin_port = Number(Vmonthly_pmt) - Number(int_port);
         prin = Number(prin) - Number(prin_port);

      }

      var points_perc = Vpoints;
      points_perc /= 100;
      var points_amt = points_perc * Vprincipal;

      var tax_perc = Vtax_rate;
      tax_perc /= 100;

      var total_deduct = Number(accum_int) + Number(points_amt) + Number(Vsave_years * Vann_prop_tax);
      var Vtax_savings = total_deduct * tax_perc;
      document.calc.tax_savings.value = fns(Vtax_savings,2,1,1,1);


   }

}

function clear_results(form) {

   document.calc.monthly_pmt.value = "";
   document.calc.ann_prop_tax.value = "";
   document.calc.tax_savings.value = "";


}

function saveReport(form) {

   var Vmonthly_pmt = sn(document.calc.monthly_pmt.value);
   var Vann_prop_tax = sn(document.calc.ann_prop_tax.value);

   if(Vmonthly_pmt == 0 || Vann_prop_tax == 0 || document.calc.tax_savings.value.length == 0) {
      alert("Please calculate the top portion of the calculator before attempting to create the Annual Savings Report.");
   } else {


      var Vprop_value = sn(document.calc.prop_value.value);
      var Vprincipal = sn(document.calc.principal.value);
      var Vrate = sn(document.calc.rate.value);
      var Vterm = sn(document.calc.term.value);
      var Vpoints = sn(document.calc.points.value);
      var Vclose_costs = sn(document.calc.close_costs.value);
      var Vprop_tax_rate = sn(document.calc.prop_tax_rate.value);
      var Vtax_rate = sn(document.calc.tax_rate.value);
      var Vsave_years = sn(document.calc.save_years.value);

      var points_perc = Vpoints;
      points_perc /= 100;
      var points_amt = points_perc * Vprincipal;

      var tax_perc = Vtax_rate;
      tax_perc /= 100;

      var months = Vterm * 12;

      var prin = Vprincipal;
      var i = Vrate;
      if(i >= 1) {
         i /=100;
      }
      i /= 12;
      var int_port = 0;
      var accum_int = 0;
      var accum_ann_int = 0;
      var prin_port = 0;
      var save_months = 0;
      if(Vsave_years > Vterm) {
         save_months = months;
      } else {
         save_months = Vsave_years * 12;
      }
      var cnt = 0;
      var yr_cnt = 0;
      var accum_pmts = 0;
      var ann_pmts = Vmonthly_pmt * 12 + Vann_prop_tax;

      var report_rows = "";

      var ann_tax_deduct = 0;
      var accum_tax_deduct = 0;
      var ann_tax_save = 0;
      var accum_tax_save = 0;

      while(cnt < save_months) {

         cnt += 1;

         int_port = prin * i;
         accum_int += int_port;
         accum_ann_int += int_port;
         prin_port = Number(Vmonthly_pmt) - Number(int_port);
         prin = Number(prin) - Number(prin_port);

         if(cnt % 12 == 0) {
            yr_cnt += 1;

            accum_pmts += ann_pmts;

            report_rows += "<tr><td align='right'><font face='arial'><small>" + yr_cnt + "</td>";
            report_rows += "<td align='right'><font face='arial'><small>" + fns(ann_pmts,2,1,1,1) + "</td>";
            report_rows += "<td align='right'><font face='arial'><small>" + fns(accum_ann_int,2,1,1,1) + "</td>";

           ann_tax_deduct = Number(accum_ann_int) + Number(Vann_prop_tax);
           if(yr_cnt == 1) {
              ann_tax_deduct += points_amt;
           }
           ann_tax_save = ann_tax_deduct * tax_perc;
           accum_tax_save += ann_tax_save;

           report_rows += "<td align='right'><font face='arial'><small>" + fns(ann_tax_save,2,1,1,1) + "</td></tr>";

           accum_ann_int = 0;
           ann_tax_save = 0;

         }

      }

      var part1 = "<html><head><title>Annual Tax Savings Report</title></head>";
      part1 += "<b";
      part1 += "od";
      part1 += "y bgcolor= '#FFFFFF'><br /><br /><center>";
      part1 += "<font face='arial'><big><strong>Annual Tax Savings Report</strong></big>";
      part1 += "</center>";
      part1 += "";
      part1 += "";
      part1 += "";

      var part2 = "<center><table border='1' cellpadding='2' cellspacing='0'><tr bgcolor='silver'>";
      part2 += "<td align='center'><font face='arial'><small><strong>Year</strong></small></td>";
      part2 += "<td align='center'><font face='arial'><small><strong>Mortgage &<br />Property Tax<br />";
      part2 += "Payment</strong></small></td>";
      part2 += "<td align='center'><font face='arial'><small><strong>Interest<br />Paid</strong></small></td>";
      part2 += "<td align='center'><font face='arial'><small><strong>Tax<br />Savings</strong></small></td></tr>";

      var part4 = "<tr><td align='right'><font face='arial'><small><strong>Total:</strong></small></td>";
      part4 += "<td align=right><font face='arial'><small><strong>" + fns(accum_pmts,2,1,1,1) + "</strong></small></td>";
      part4 += "<td align=right><font face='arial'><small><strong>" + fns(accum_int,2,1,1,1) + "</strong></small></td>";
      part4 += "<td align=right><font face='arial'><small><strong>" + fns(accum_tax_save,2,1,1,1) + "</strong></small></td>";
      part4 += "</tr></table><br /><center><form method='post'>";
      part4 += "<input type='button' value='Close Window' onClick='window.close()' />";
      part4 += "</form></center></body></html>";

      var schedule = (part1 + "" + part2 + "" + report_rows + "" + part4 + "");

      reportWin = window.open("","","width=500,height=400,toolbar=yes,menubar=yes,scrollbars=yes");
      reportWin.document.write(schedule);
      reportWin.document.close();

   }

}</script>

<!-- analytic -->
</head>
 	<body>
<div class="table-block">
<form name="calc" method="post" action="#">
 <table>
 <tbody>

 <tr>
 <td>
 Property value:
 </td>
 <td>
 <input type="number" step="any" name="prop_value" value="" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>
 <tr>
 <td>
 Loan amount:
 </td>
 <td>
 <input type="number" step="any" name="principal" value="" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 Annual interest rate (%):
 </td>
 <td>
 <input type="number" step="any" name="rate" value="" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 Loan term (years):
 </td>
 <td>
 <input type="number" step="any" name="term" value="" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 Points (%):
 </td>
 <td>
 <input type="number" step="any" name="points" value="" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 Loan closing costs:
 </td>
 <td>
 <input type="number" step="any" name="close_costs" value="" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 Property tax rate (%):
 </td>
 <td>
 <input type="number" step="any" name="prop_tax_rate" value="" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 Your state and federal tax rate (%):
 </td>
 <td>
 <input type="number" step="any" name="tax_rate" value="" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 Number of years to calculate savings for:
 </td>
 <td>
 <input type="number" step="any" name="save_years" value="" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td colspan="2" align="center">
 <input type="button" class="table-btn"  name="compute" value="Compute Tax Savings" onClick="computeForm(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 Monthly Principal and Interest Payment:
 </td>
 <td>
 <input type="text" name="monthly_pmt" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 Annual property tax amount:
 </td>
 <td>
 <input type="text" name="ann_prop_tax" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 Tax savings for entered period:
 </td>
 <td>
 <input type="text" name="tax_savings" size="15" />
 </td>
 </tr>

 <tr>
 <td align="center">
 <input type="button"  class="table-btn" name="compute" value="Annual Savings Report" onClick="saveReport(this.form)" />
 </td>
 <td align="center">
 <input type="reset"  class="table-btn" value="Reset" />
 </td>
 </tr>



 </tbody>
 </table>
 </form>
 </div> 
</body>
</html>
