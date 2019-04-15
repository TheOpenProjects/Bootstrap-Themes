<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Commercial Mortgage Calculator: Commercial Real Estate Property Analysis</title>		
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


function computeForm(form) {


   var v_principal = sn(document.calc.principal.value);
   var v_rate = sn(document.calc.rate.value);
   var v_term = sn(document.calc.term.value);
   var v_months = sn(document.calc.months.value)*12;

   if(v_principal == 0) {

   } else
      if(v_term == 0) {

   } else
      if(v_months == 0) {

   } else {

      var v_pmt_months = v_term * 12;

      var v_pi_pmt = computeMonthlyPayment(v_principal, v_pmt_months, v_rate);
      document.calc.pi_pmt.value = fns(v_pi_pmt,2,1,1,1);

      var v_int_only_pmt = v_rate / 100 / 12 * v_principal;
      document.calc.int_only_pmt.value = fns(v_int_only_pmt,2,1,1,1);

      var v_prin = v_principal;
      var v_int_port = 0;
      var v_prin_port = 0;
      var v_i = v_rate / 100 / 12;

      for(var i=0; i<v_months; i++) {

         v_int_port = Math.round(v_prin * v_i * 100) / 100;
         v_prin_port = Number(v_pi_pmt) - Number(v_int_port);
         v_prin = Number(v_prin) - Number(v_prin_port);

      }

      var v_balloon_pmt = v_prin;
      if(v_balloon_pmt < 0) {
         v_balloon_pmt = 0;
      }
      document.calc.balloon_pmt.value = fns(v_balloon_pmt,2,1,1,1);

   }
    
}


function createReport(form) {

   if(document.calc.amort_chk.value == 1) {
      clear_amort(document.calc);
   } else {
      document.calc.amort_chk.value = 1;
   }

   var v_principal = sn(document.calc.principal.value);
   var v_rate = sn(document.calc.rate.value);
   var v_term = sn(document.calc.term.value);
   var v_months = sn(document.calc.months.value);

   if(v_principal == 0) {

   } else
      if(v_term == 0) {

   } else
      if(v_months == 0) {
   } else {

      var v_pmt_months = v_term * 12;

      var v_pi_pmt = computeMonthlyPayment(v_principal, v_pmt_months, v_rate);

      var v_prin = v_principal;
      var v_int = v_rate;
      if(v_int >= 1) {
         v_int /= 100;
      }
      v_int /= 12;

      var npr = v_pmt_months;

      var v_int_port = 0;
      var v_accum_int = 0;
      var v_prin_port = 0;
      var v_accum_prin = 0;
      var v_count = 0;
      var v_pmt_row = "";
      var v_pmt_num = 0;

      var v_display_pmt_amt = 0;

      var v_accum_year_prin = 0;
      var v_accum_year_int = 0;

      while(v_count < npr) {

         if(v_count < (npr - 1)) {

            v_int_port = Math.round(v_prin * v_int * 100) / 100;
            v_accum_int = Number(v_accum_int) + Number(v_int_port);
            v_accum_year_int = Number(v_accum_year_int) + Number(v_int_port);

            v_prin_port = Number(v_pi_pmt) - Number(v_int_port);
            v_accum_prin = Number(v_accum_prin) + Number(v_prin_port);
            v_accum_year_prin = Number(v_accum_year_prin) + Number(v_prin_port);

            v_prin = Number(v_prin) - Number(v_prin_port);

            v_display_pmt_amt = Number(v_prin_port) + Number(v_int_port);

         } else {

            v_int_port = Math.round(v_prin * v_int * 100) / 100;
            v_accum_int = Number(v_accum_int) + Number(v_int_port);
            v_accum_year_int = Number(v_accum_year_int) + Number(v_int_port);

            v_accum_int = Number(v_accum_int) + Number(v_int_port);
            v_accum_year_int = Number(v_accum_year_int) + Number(v_int_port);

            v_prin_port = v_prin;

            v_accum_prin = Number(v_accum_prin) + Number(v_prin_port);
            v_accum_year_prin = Number(v_accum_year_prin) + Number(v_prin_port);

            v_prin = 0;
            v_display_pmt_amt = Number(v_prin_port) + Number(v_int_port);
         }

         v_count = Number(v_count) + Number(1);

         v_pmt_num = Number(v_pmt_num) + Number(1);

         var tbody = document.getElementById('amort_sched');

         var row = document.createElement('tr');
         var cell1 = document.createElement('td');
         cell1.style.textAlign = "right";
         cell1.style.fontSize = "medium";
         cell1.innerHTML = '' + v_count + '';
         row.appendChild(cell1);
         var cell2 = document.createElement('td');
         cell2.style.textAlign = "right";
         cell2.style.fontSize = "medium";
         cell2.innerHTML = '' + fns(v_display_pmt_amt,2,1,1,1) + '';
         row.appendChild(cell2);
         var cell3 = document.createElement('td');
         cell3.style.textAlign = "right";
         cell3.style.fontSize = "medium";
         cell3.innerHTML = '' + fns(v_prin_port,2,1,1,1) + '' ;
         row.appendChild(cell3);
         var cell4 = document.createElement('td');
         cell4.style.textAlign = "right";
         cell4.style.fontSize = "medium";
         cell4.innerHTML = '' + fns(v_int_port,2,1,1,1) + '';
         row.appendChild(cell4);
         var cell5 = document.createElement('td');
         cell5.style.textAlign = "right";
         cell5.style.fontSize = "medium";
         cell5.innerHTML = '' + fns(v_prin,2,1,1,1) + '';
         row.appendChild(cell5);
         tbody.appendChild(row);

      }
   }
}

function clear_amort(form) {

   document.calc.amort_chk.value = 0;

   var tbody = document.getElementById('amort_sched');
   var v_years = sn(document.calc.term.value);
   var v_months = v_years * 12;
   for(var i=0; i< v_months; i++) {
      tbody.deleteRow(-1);
   }


}

function clear_results(form) {

   var v_amort_chk = sn(document.calc.amort_chk.value);

   if(v_amort_chk == 1) {
      clear_amort(document.calc);
   } else {
      document.calc.amort_chk.value = 0;
   }

   document.calc.pi_pmt.value = "";
   document.calc.int_only_pmt.value = "";
   document.calc.balloon_pmt.value = "";

}

function clear_form(form) {

   if(document.calc.amort_chk.value == 1) {
      clear_amort(document.calc);
   } else {
      document.calc.amort_chk.value = 0;
   }

   document.calc.pi_pmt.value = "";
   document.calc.int_only_pmt.value = "";
   document.calc.balloon_pmt.value = "";

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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/commercial-loan.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				<div class="main-heading"><h1>Commercial Loan Calculator</h1>
</div>
                    <ul id="breadcrumbs">

                         <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>  
                        <li><a href="https://www.mortgagecalculator.biz/c/investors.php">Investors</a></li> 
                        <li>Commercial Lending Rates</li> 
                    </ul>
                </div>   			
                <div class="bottom-section">
<p>  This calculator will compute the payment amount for a commercial property, giving payment amounts for P & I, Interest-Only and Balloon repayment methods -- along with a monthly amortization schedule.
             </p>

<div class="table-block">
<form name="calc" method="post" action="#">

 <table>
 <tbody>

 <tr>
 <td>
 
 Amount of the loan ($):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="principal" value="1000000" size="15" tabindex="1" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='1000000'?'':this.value;" onblur="this.value = this.value==''?'1000000':this.value;" />
 </td>
 </tr>

 <tr>
 <td>
 
 Annual interest rate (APR %) <a href="#viewrates"><strong>See Current Rate</strong></a>:
 
 </td>
 <td align="center">
 <input type="number" step="any" name="rate" value="5.5" size="15" tabindex="2" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='5.5'?'':this.value;" onblur="this.value = this.value==''?'5.5':this.value;" />
 </td>
 </tr>

 <tr>
 <td>
 
 Amortization term (# of years):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="term" value="30" size="15" tabindex="3" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='30'?'':this.value;" onblur="this.value = this.value==''?'30':this.value;" />
 </td>
 </tr>

 <tr>
 <td>
 
 Loan due term (in years):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="months" value="5" size="15" tabindex="4" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='5'?'':this.value;" onblur="this.value = this.value==''?'5':this.value;" />
 </td>
 </tr>

 <tr>
 <td align="center">
 <input type="button" class="table-btn"  value="Clear" onClick="clear_form(this.form)" />
 </td>
 <td align="center">
 <input type="button" class="table-btn"  value="Calculate" onClick="computeForm(this.form)" tabindex="5" />
 </td>
 </tr>

 <tr>
 <td>
 
 P & I payment:
 
 </td>
 <td align="center">
 <input type="text" name="pi_pmt" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Interest-Only payment:
 
 </td>
 <td align="center">
 <input type="text" name="int_only_pmt" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 
 Balloon payment:
 
 </td>
 <td align="center">
 <input type="text" name="balloon_pmt" size="15" />
 </td>
 </tr>


 <tr>
 <td align="center">
 <input type="button" class="table-btn"  value="Clear Amortization Schedule" onClick="clear_amort(this.form)" />
 <input type="hidden" name="amort_chk" value="0" />
 </td>
 <td align="center">
 <input type="button" class="table-btn"  value="Create Amortization Schedule" onClick="computeForm(this.form);createReport(this.form)" />
 </td>
 </tr>


 </tbody>
 </table>
 <br />
 <br />
 <center>
 <table border="1" cellpadding="2" cellspacing="0" bordercolor="#EEEEEE" id="tableName" width="500">
 <tbody>
 <tr>
 <th scope="col"><strong>Month</strong></th>
 <th scope="col"><strong>Payment</strong></th>
 <th scope="col"><strong>Principal</strong></th>
 <th scope="col"><strong>Interest</strong></th>
 <th scope="col"><strong>Balance</strong></th>
 </tr>
 </tbody>
 <tbody id="amort_sched">
 </tbody>
 </table>
 </center>
 </form>
 </div>
 

<p>&nbsp;</p>
<a name="viewrates"></a>
<h3>Current Mortgage Rates</h3>
<div class="myFinance-widget" data-show-filters="true" data-widget-id="0e398780-2190-4caf-9640-aecf30df3c9c" data-property-value="250000" data-purchase-price="250000" data-percent="20" data-current-loan-balance="200000"  data-table-title="Save Money With Today's Best Fixed Mortgage Rates" data-campaign="mortcalcbiz_fulltable_mortgage"></div>


 <h2>Understanding Commercial Mortgage</h2>
<p>If you are looking to start up your own business, there are several   factors that must come into play before you can move forward toward a   successful future. One thing to consider is how to finance your business   and get product and services moving. There are several ways to finance   your business including savings, investments and utilizing equity from   your home or other assets. Chances are you will have to acquire a   commercial mortgage in order to give you the borrowing power to fund   your inventory and pay for receivables. The first step in getting your   business off the ground is getting approval through a lender. You will   have to make sure that you have a good credit score and a solid history   of credit worthiness. </p>
<p><img src="../img/borrowing-money.png" width="1250" height="1030" alt="Borrowing Money."></p>
<h3>
  How Much Should You Borrow?</h3>
<p>
Some of the main goals of obtaining a commercial loan is for maximizing   business profitability, increasing your working capital and   strengthening your competitive position in your industry. Knowing   exactly how much you should borrow should be something you should figure   out before seeking financing. According to the U.S. Small Business   Association, the average loan amount in 2012 was around $337,730. Some   loans have a maximum lending amount of $5 million dollars. The amount   you wish to borrow depends on several factors such as: </p>
<ul class="arrow"><li>Your annual net income for the past 24 months</li>
<li>Your credit history</li>
<li>Other outstanding debts</li>
<li>Down payment or investment</li></ul>
<p>Depending on the interest rate you qualify for based on your credit   score and past credit history, the loan officer will calculate how much   of a loan you will qualify for. Things to consider include the loan   amount, qualified interest rate, term of the loan and any additional   costs to the monthly payment. These calculations will tell you how much   your monthly payment will be and how much interest you will be paying on   the loan over its lifespan. </p>
<p>
If you are trying to finance an existing business, there are several   advantages. The first step is preparing a business plan is taking a look   at your past financial history. This includes financial statements and   graphs from existing and prior years. Write up a statement that displays   the assets that you are using to secure or back up the loan. Showing   the financial institution that your business has been profitable in the   past will increase the chances of loan approval. Past profits may   significantly increase the amount they will lend you as well. </p>
<p>
How much loan you will need depends on several factors. Are you   acquiring a new building or making improvements to an existing one? Do   you need new inventory? Are you using the loan to pay off existing debt?   As long as you can justify a future profit margin and benefit to taking   on more debt, you shouldn&rsquo;t have a problem with approval as long as   other requirements are in place. Some banks may only lend to you on a   short-term basis at a higher interest rate to see if there has been a   significant profit margin and then offer better loan terms after the   trial period. </p>
<h3>
  How Long Does it Typically Take to Get a Commercial Loan?</h3>
<p>
There are many different financial institutions that will lend to you if   you qualify. The question is where should you make the first inquiry?   If you have a financial institution that you have banked within the   past, they should be your initial contact. Even if they don&rsquo;t advertise   good commercial interest rates, they may be able to give you special   financing just because you are a current customer or have banked with   them in the past. Every circumstance is different and it is important to   inquire before you decide to apply. </p>
<p>
Generally, once you start the application process, you can expect to   receive a preliminary answer or preapproval that same day or the next   business day. This does not guarantee loan approval or the line of   credit they will be offering you. Several things including running   financial history reports, more in-depth credit checks and reference   checks could take up to 10 to 20 business days. Once everything is in   place, the loan then goes to underwriters who will carefully decide on a   face to face basis if they feel they should lend to you. In some cases,   they may want to meet you or other investors who will be contributing   toward your business goals financially. Once it is approved through   underwriting, the next step is setting up the loan terms and signing the   final loan documents. </p>
<h3>
  Benefits of Banks vs. Non-Lenders</h3>
<p>
<img src="../img/commercial-building.png" width="300" height="452" alt="Commercial Building." align="right"/>A bank or federally funded financial institution will be able to   successfully back up the money you need to get your business started.   This is one benefit to going through a bank for a commercial loan as   opposed to a non-lender or private lender. In many cases, a non-lender   will only give you so much money at a time to work with. If you are   approved for a certain amount through a banking institution, funds   should be immediately available. Banks also go through rigorous credit   standards to assure that payments are made on time and reported to all   three credit bureaus including TransUnion, Equifax and Experian. </p>
<p>
Having a bank that reports all of your on-time payments and credit   limits will sustain or improve your overall credit score and credit   ranking. This will help with future loan qualifying requirements. A   traditional bank is also a safer way to access as well as manage your   loan funding. Utilizing your checking account, ATM card and personal   withdraw when you need it, makes it a safer way to access, track and   manage your money. You can also write checks and pay for bills out of   your commercial loan account. Writing checks and automatic withdraws are   not feasible if you are going to a non-lender or non-government-backed   financial institution.</p>
<p>
Another benefit of going through a bank as opposed to a non-lender is   that the terms of your loan can be re-wrote or reformatted at any time.   This means that if your financial situation changes that payments can be   lowered in interest rates adjusted if need be. The drawback of going   through a nontraditional lender is that the fees and provisions that   were set in place before borrowing money often stand whether the loan is   paid off early or not.</p>
<p>
Another advantage to going through a bank is that they are often backed   by government-sponsored loan guarantees. This means should something   happen with the bank or the business gets bought out at anytime during   the life of your loan, the government will guarantee payment to you that   funding is available. There are also 7(a) and 504 loans available   through the small business administration. These loans assist with   financing for real estate, inventory, equipment, business acquisition   startup costs and partner buyout's. These loans range anywhere from   $250,000 to over 10 million dollars. </p>
<p>
Commercial loans funded by banks can be used to make special purchases   and financing can be reorganized as further needs may occur. For   instance if your business grows into a franchise, a bank can easily   recognize these needs and give you the additional working capital that   you need. Maybe you need to buyout partner in additional funding to do   so. A bank will be able to refinance your entire loan so that you can   pay off your partner and move on independently.</p>
<p>
One thing a bank can do as opposed to a non-lender is consolidate   multiple existing loans that may currently finance your equipment,   machinery, inventory and vehicles. Either consolidation is an option or   working to lower interest rates by offering a future balloon payment may   be a viable alternative to paying multiple loans at once.</p>
<h3>
  Drawbacks of Banks vs. Non-Bank Lenders</h3>
<p>
If you have been considering seeking financing through a non-traditional   method such as a silent investor, there may be some risks involved. The   investor may have certain stipulations or high expectations in making   sure that he gets his money back and then some. This could mean if you   don&rsquo;t make a profit, he will pull all funding or he may request that   some form of your personal property be put up as collateral. Examples of   collateral may include:</p>
<ul class="arrow">
<li>Paid vehicles</li>
<li>Home</li>
<li>Vacation home</li>
<li>Jewelry</li>
<li>Equipment</li>
<li>Recreational vehicles</li>
<li>Stocks and bonds</li>
<li>Other items of value</li></ul>
<p>The agreement may be only verbal or not notarized. This can pose a   serious issue that could lead to both of you facing each other in small   claims court. The outcome could be disastrous especially if the   non-lending partner is on the deed to your business. </p>
<p>
You could lose a lot of time and money invested she the case go to   court. By choosing a financial institution, you have certain rights   given the terms of the loan that will help protect you should you be   late on a payment or your financial situation changes. Some defaulted   commercial loans can be discharged appropriately under federal   bankruptcy laws, whereas seeking financing through a non-lender can   cause complications with a bankruptcy discharge or other forms of   repayment programs.</p>
<h3>
  How do Commercial Mortgages Differ from Traditional Mortgages?</h3>
<p>
Commercial mortgages differ from traditional mortgages in that there are   more items listed under the terms of the loan. This means that all of   the buildings, furniture, inventory, as well as start up costs are   included as part of the loan proposal. A traditional mortgage typically   just lists the property, structures, dwelling and sometimes other larger   property features. For a traditional mortgage loan, provisions are   straightforward and payments are based off the current interest rate or   if it&rsquo;s an adjustable rate mortgage, the payments may fluctuate. </p>
<p>
Property appraisals generally follow the basic criteria of loan approval   for both types of loans--residential and commercial. A home appraisal   is unique because each real estate transaction is different due to the   condition of the home and property at face value. Once an appraiser   conducts a traditional real estate appraisal, he looks at the market   value of the home or property. The market value is based off of what   other homes in the same price range are selling for. The real estate   appraiser may look at a previous appraisal, if available and compare it   with any improvements that have been made since then. The appraisal is   then used as part of the final decision process for loan approval.</p>
<p>
The commercial mortgage appraisal will take into to consideration a lot   more than just the property value. It will also include things such as   both the insurable value and liquidation value of property. Often times   the lending institution or mortgage broker will order a commercial   appraisal as opposed to the borrower. Part of the appraisal process must   include a conditional commitment letter or term sheet signed by the   bank. This is a good faith letter showing that the borrower has met the   pre-approval criteria for loan approval. With both a commercial loan and   a home mortgage loan, the appraisal is an important part of the   approval process. The difference between the two is that a commercial   loan appraisal can take up to 30 days longer than a traditional mortgage   appraisal. </p>
<p>
Another difference between a traditional mortgage and a commercial   mortgage is that there may be more than one party on the loan. For a   home mortgage, it is often an individual or a married couple that apply   for the loan. There can be investors or other parties that use both of   their credit to apply for a loan but generally it is only an individual   or two people. For a commercial loan, several investors may have applied   and will need to meet criteria prior to closing. This can be tricky   unless every individual has spotless credit and no underlying causes for   loan rejection. </p>
<h4>
  Balloon Payments and Risks</h4>
<p>
Maybe part of your commercial loan package includes a balloon payment. A   balloon payment occurs when the lender decides that they want a lump   sum of money at some course over the life of the loan. These   stipulations are always set in place prior to the final terms of the   loan being presented to the borrower before signing. With a balloon   payment, it means that you will have to pay a lump sum of money at   specified times during the life of the loan or at the end of the loan.   The term "balloon" was given its name because of the blown-up or large   amount of money that pops up within a loan agreement. These terms vary   per lender and are often seen when you do a land contract or seek a   private, alternative commercial loan. </p>
<p>
How it works is that the loan is amortized or spread out over a long   period of time. With a balloon payment, the payments are generally   interest-only or low-interest for the first three, five or ten years. At   the end of a specific time frame or date, a balloon payment is required   to pay off the entire amount of the loan. This means you will have   three options: </p>
<ul class="arrow">
  <li>Pay off the entire loan balance in cash.</li>
  <li>Refinance the loan and cash out the balance. </li>
  <li>Sell the property and pay off the balloon payment. </li>
</ul>
<p>You will have to find out if there are certain stipulations on the loan.   In some loan terms you can pay off the balance of the loan minus the   balloon payment if the balloon isn't due within the next few payments. </p>
<p>
  While a balloon payment can help you get your business started with   initial lower loan terms, the payment can also come back to bite you,   down the road. Sometimes a balloon payment is also referred to as a   bullet payment. This happens when a large sum of the debt suddenly   becomes due, placing a burden on the business and the borrower. This can   be financially crippling and in some cases doesn't make sense if the   funds are not readily available to pay off the terms of the loan. If   your business is not stable or has been experiencing financial setbacks,   a balloon payment may lead to a downward crumble of not being able to   pay back the loan as well as other business and personal expenses. </p>
<p>
  Failure to pay off a balloon payment can lead to the loan accelerating   and becoming due and payable immediately. In some cases, the bank will   try to collect on the loan and expect all outstanding payments to be   due, otherwise foreclosure could take place. </p>
<p>
  If you suddenly find yourself unable to meet the terms of a loan   agreement, in particular an upcoming balloon payment, the first thing   you should do is contact your lender. Your lender may be able to discuss   repayment or loan restructure options with you. You may also be   eligible for refinancing so that you can eliminate the balloon payment   and get into a loan agreement that is affordable for the long term. </p>
<p>
  While a balloon payment option loan may seem appealing now, consider if   your company has enough potential growth or optional funding to meet   those bulk payments once they arrive. </p>
<h4>
  Hidden Costs </h4>
<p>
  It is important to note that there may be some hidden costs with a   commercial loan. It is important to have your attorney look over any   real estate or loan documentations before you agree to sign them. Hidden   costs may not appear right away or be listed in a checklist section on   the loan documentation. They can arise under certain terms such as   these:</p>
<ul class="arrow"><li><strong>Legal Fees</strong>- Legal fees may be in the form of what your attorney or the   seller&rsquo;s attorney may apply for various services related to the   inspection and closing of the loan and real estate transaction. In most   cases, your attorney will explain what these fees are prior to accepting   his services. If issues arise before the loan closes, there may be   additional fees that could include attorney fees, research fees, title   search and any court filings if applicable. </li>
<li><strong>Appraisal Charges</strong>- The appraisal is an important part of the entire   commercial     loan process. A commercial real estate appraisal can cost   several thousands of dollars because there is so much input that is   needed for a proper analysis. Depending on how large the property is and   how what type of property is being acquired at closing, the appraisal   can quickly accumulate several hundred dollars of hidden or unforeseen   costs. </li>
<li><strong>Application Fees</strong>- The application fees for a commercial loan are often   pre-set so there shouldn&rsquo;t be any surprises at closing. If there are   any changes to the loan or an additional party has been added to the   loan documentation, fees could be added before the account can be   approved and closed on. </li>
<li><strong>Survey Charges</strong>- Most generally a survey of the property will have to   be done. This is done separately from the appraisal. A survey includes   field staking of utilities, building offsets, parking lots, curbs,   gutters and driveways. A topographic survey and boundary survey will   have to be presented to the lender and filed appropriately. Depending on   if the loan is for new construction or existing construction, fees can   arise as inspections continue to take place. </li>
<li><strong>Adjustable Rate Loans</strong>- If your commercial loan package is part of an   adjustable rate, there could be some hidden fees involved. Adjustable   rate means that your interest rate will fluctuate as the interest rate   changes. This means that the payments on your loans over time could   increase or decrease. There may also be certain fees involved when this   change takes place—be sure to ask your lender about these hidden fees if   your loan has an adjustable rate.</li></ul>
<p>
Examine all of these terms before signing to assure that the fees are   fair in comparison to what other lenders are charging. In some cases,   you may be able to get the bank to waive these fees. </p>
<h3>
  Documentation Needed to Acquire a Commercial Loan</h3>
<p>
Part of inching closer to closing on your commercial loan, means you   will have to provide proofs and documentation before the loan can be   finalized. While these are the general criteria requirements for the   loan, your loan officer may ask for more or less documentation depending   on their loan practices.</p>
<ul class="arrow"><li><strong>Personal Information</strong>- You will have to make sure you can provide   documentation of all of your personal information. This means a valid   driver&rsquo;s license, social security card and proof of address. Bring   original documentation to your loan appointment to assure that the loan   can be processed promptly and accurately. </li>
<li><strong>Financial Records</strong>- Your financial history must match all of the   information that you provide on your credit application. Provide the   last 24 months of W-2 or W-9 forms, any self-employment tax forms and   documentation, your current pay stubs and your bank records if you are   self-employed. Include the last 24 months of filed tax returns for your   entire household. Your loan officer may require more information or   less, depending on the application process. </li>
<li><strong>Appraisal Results</strong>- To initially start your application, you may not   need the appraisal in hand. If there has been a recent appraisal done by   the current owner or you are refinancing the property and have one that   is fairly up to date, you may be required to submit this with the   application. Otherwise the appraisal is part of the entire loan process   and will have to be submitted prior to closing. </li>
<li><strong>Survey</strong>- The property survey is one of the main documents needed to   fully process the loan. The survey is also done prior to closing and   will have to be signed and presented prior to the loan being completed   and closed. </li>
<li><strong>Real Estate Documentation</strong>- The original real estate listing (if a new   sale) will have to be presented to the loan officer. If you already own   the building and are refinancing then you will not have this   information. Blueprints to the building and property dimensions may be   required if you are planning on building or making an addition to   existing property. </li>
<li><strong>Business Plan</strong>- Often times, the underwriting group may require you to   present a business plan. This will help them see your vision and how   loan approval will benefit you and bring applicable profit.</li></ul>
<h3>Commercial Loan Conditions</h3>
<p>
As part of the underwriting process, bankers often have a risk   assessment already in place to determine if they should grant a loan.   Once credit scores have been run and documentation has been verified,   they take one last look at the financial plate of the borrower to decide   if they truly should take a risk and build a business relationship. </p>
<p>Sometimes loan conditions are based upon the 5 C&rsquo;s of commercial lending qualifications:</p>
<ul class="arrow">
  <li><strong>Capital-</strong> Your overall net worth and equity play an   important part in how your loan conditions will be wrote up by the   lender. This means if you have a substantial amount of liquid cash or   collateral to offer the bank as a down payment, your chances of getting   approved are greater. This sends a strong message to your lender that   you want nothing more than for your business to succeed and are willing   to invest in whatever it takes to make it work. </li>
  <li><strong>Conditions-</strong> The bank will make sure that they feel you   can meet the conditions of the loan, including the payment and any   future balloon payment if applicable. They may consider your past,   current or potential customer base, liabilities and area competitors. </li>
  <li><strong>Character-</strong> Underwriters will take a good, long look at   your personal character as well as your business practices. This is   based off of a variety of factors including your overall   trustworthiness. Personal references will be closely examined, so make   sure you have references listed that can be contacted and will give and   open and up front response to personal questions and business practices.   The bank may also look into your educational background and what you   went to school for. They may also dig into past business associates and   acquaintances as part of their final approval process.</li>
  <li><strong>Capacity-</strong> The overall capacity at which you can repay   back the loan is also very important. Banks will look over the cash flow   you currently have and how you expect that to increase once the loan is   approved. </li>
  <li><strong>Collateral-</strong> Collateral is a current asset that you own   outright that can provide reassurance to the lender. Some examples of   collateral include real estate, vehicles, equipment, account receivables   and recreational vehicles. These are good faith items that you can list   on your loan application or in a separate clause on the application to   increase your chances of getting loan approval within the dollar amount   you need to succeed. </li>
</ul>
<h4>Commercial Loan Terms </h4>
<p>
  There may be some loan terms as set forth by the lender in the   agreement. One of these may be a pre-payment penalty. This means if you   decide to pay off the loan or cash it out prior to the end of the term,   you could face pre-payment penalties. Pre-payment penalties vary per   lender but generally range anywhere between 2 and 4 percent of the loan.   The reason for this is to guarantee the bank makes money, even if you   decide to take your business elsewhere. Banks often refer to this as a   profit calculation or risk calculation. It is important to check your   loan documentation or contract and have it closely examined by your   attorney to assure that there are no pre-payment penalties and if there   are, if you are willing to risk those penalties and still close the   deal. Not all pre-penalty clauses will hurt you, especially if you have a   good interest rate and plan on paying off your loan all the way to the   end of the loan term. </p>
<p>
  Commercial lending is something to take seriously. You are borrowing a   lot of money to invest in your future, so it is important to maintain a   good working relationship with your lender. As long as you keep up with   proper business practices, you can expect growth and many years of   success as you work on paving a good future. <a href="http://www.sba.gov/content/u-s-small-business-administration-loan-funds-available-purchase-commercial-real-estate" target="_blank">The SBA</a> offers a wealth of information on this topic.</p>
  	 
    
    
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
