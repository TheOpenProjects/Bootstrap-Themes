<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Real Estate Portfolio ROR Calculator: Calculate Rate of Return on Commercial &amp; Residential Real Estate</title>		
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


   var mnames = 

["blank","January","February","March","April","May","June","July","August","September","October","November","December"];


function calc_ror(form) {

   var s_mon = sn(document.getElementById("mon_0").value);
   var s_day = sn(document.getElementById("day_0").value);
   var s_yr = sn(document.getElementById("yr_0").value);
   var s_out = sn(document.getElementById("out_0").value);
   var v_pol = s_out * -1;

   var s_date_str = "" + mnames[s_mon] + " " + s_day + ", " + s_yr + " 00:00:00";
   var s_date = new Date(s_date_str);
   var s_date_ms = s_date.getTime();

   var flows_ar = [[s_date_ms,0,s_out,0]];
   var num_flows = 1;

   var l_mon = 0;
   var l_day = 0;
   var l_yr = 0;
   var l_out = 0;
   var l_in = 0;
   var num_out = 0;
   if(s_out > 0) {
      num_out += 1;
   }
   var num_in = 0;
   var inval_yr = 0;
   if(s_yr < 1900) {
      inval_yr += 1;
   }

   for(var cnt = 1; cnt<19; cnt++) {

      if(sn(document.getElementById("mon_" + cnt + "").value) > 0 &&
         sn(document.getElementById("day_" + cnt + "").value) > 0 &&
         sn(document.getElementById("yr_" + cnt + "").value) > 0 &&
         (sn(document.getElementById("out_" + cnt + "").value) > 0 ||
         sn(document.getElementById("in_" + cnt + "").value) > 0)) {

         num_flows += 1;

         l_mon = sn(document.getElementById("mon_" + cnt + "").value);
         l_day = sn(document.getElementById("day_" + cnt + "").value);
         l_yr = sn(document.getElementById("yr_" + cnt + "").value);
         l_out = sn(document.getElementById("out_" + cnt + "").value);
         l_in = sn(document.getElementById("in_" + cnt + "").value);

         if(l_yr < 1900) {
            inval_yr += 1;
         }

         if(l_out > 0) {
            num_out += 1;
         }
         if(l_in > 0) {
            num_in += 1;
         }

         v_pol -= l_out;
         v_pol += l_in;

         var l_date_str = "" + mnames[l_mon] + " " + l_day + ", " + l_yr + " 00:00:00";
         var l_date = new Date(l_date_str);
         var l_date_ms = l_date.getTime();

         var l_day_num = Math.round((Number(l_date_ms) - Number(s_date_ms)) / 86400000);

         flows_ar.push([l_date_ms,l_day_num,l_out,l_in]);

      }
   }

   if(s_mon == 0 || s_day == 0 || s_yr == 0 || s_out == 0) {
      alert("Please enter a beginning value along with it's month, day, and year.");
      document.calc.mon_0.focus();
   } else
   if(inval_yr > 0) {
      alert("Years must be entered in 4-digit format (e.g. 2012, not 12).");
      document.calc.yr_0.focus();
   } else
   if(num_out == 0) {
      alert("You must have at least one entry in the investment column along with it's month, day, and year.");
   } else
   if(num_in == 0) {
      alert("You must have at least one entry in the Withdrawal & End Value column along with it's month, day, and year.");
   } else {


      document.calc.pol.value = fns(v_pol,2,1,1,1);

      var v_last_flow = flows_ar.length - 1;
      var v_num_days = Math.round((Number(flows_ar[v_last_flow][0]) - Number(flows_ar[0][0])) / 86400000);

      var t_guess = -1;
      var t_bal = 0;
      var t_rate_chk = 0;
      var t_it_cnt = 0;
      var t_d_num = 0;
      var t_d_out = 0;
      var t_d_in = 0;
      var t_d_r = 0;
      var t_d_out_fv = 0;
      var t_d_in_fv = 0;

      var t_num_yrs = 0;


      while(t_rate_chk == 0 && t_it_cnt < 100000) {

         t_it_cnt += 1;
         t_bal = 0;

         for(var f=0;f<flows_ar.length; f++) {

            t_d_num = Number(flows_ar[f][1]);
            t_d_out = Number(flows_ar[f][2]);
            t_d_in = Number(flows_ar[f][3]);
            t_num_yrs = (v_num_days - t_d_num) / 365;
            t_d_r = Math.pow(1+t_guess,t_num_yrs);
            t_d_out_fv = t_d_out * t_d_r;
            t_d_in_fv = t_d_in * t_d_r;


            t_bal = Number(t_bal) + Number(t_d_out_fv) - Number(t_d_in_fv);

         }

         if(t_bal < 0) {
            t_guess += .01;
         } else {
            t_rate_chk = 1;
         }


      }


      var guess = t_guess;
      var bal = 0;
      var rate_chk = 0;
      var it_cnt = 0;
      var d_num = 0;
      var d_out = 0;
      var d_in = 0;
      var d_r = 0;
      var d_out_fv = 0;
      var d_in_fv = 0;

      var num_yrs = 0;


      while(rate_chk == 0 && it_cnt < 100000) {

         it_cnt += 1;
         bal = 0;

         for(var f=0;f<flows_ar.length; f++) {

            d_num = Number(flows_ar[f][1]);
            d_out = Number(flows_ar[f][2]);
            d_in = Number(flows_ar[f][3]);
            num_yrs = (v_num_days - d_num) / 365;
            d_r = Math.pow(1+guess,num_yrs);
            d_out_fv = d_out * d_r;
            d_in_fv = d_in * d_r;


            bal = Number(bal) + Number(d_out_fv) - Number(d_in_fv);

         }

         if(bal < -.5) {
            guess += .000001;
         } else
         if(bal > .5) {
            guess -= .000001;
         } else {
            rate_chk = 1;
         }


      }

      if(it_cnt >= 100000) {
         alert("The number of secondary iterations exceeded 100,000 which may result in a less than accurate IRR result.");
      }

      var v_ror = Math.round(guess * 100 * 100) / 100;
      document.calc.ror.value = fns(v_ror,1,0,2,1);

   }
}


function clear_results(form) {

   document.calc.pol.value = "";
   document.calc.ror.value = "";

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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/ror-calc.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				<div class="main-heading"><h1>Portfolio Rate of Return Calculator</h1>
</div>
                    <ul id="breadcrumbs">

                         <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>  
                        <li><a href="https://www.mortgagecalculator.biz/c/investors.php">Investors</a></li> 
                        <li>Estimated Rate of Return</li> 
                    </ul>
                </div>
                <div class="bottom-section">
<p><img src="https://www.mortgagecalculator.biz/img/house-in-hands.jpg" alt="house" width="130" class="alignright" />   This calculator will help you to determine the average annual rate of return on an investment that has a non-periodic payment schedule.              </p><p>
 <strong>Instructions:</strong> Enter the month, day, and year of the beginning investment, and then for each investment and withdrawal after that. All cash flows entered after the first line must be dated later than the first line, but need not be entered in the order they occurred. Note that for an entry line to be included in the calculations, the month, day, and 4-digit year, and one investment or withdrawal is required. And finally, the first line and at least 1 withdrawal are required in order to complete the calculation.
 <p>
 Note: The calculator will make up to 100,000 attempts at finding a rate solution for the cash flow schedule. If the calculator reaches the maximum number of tries you will receive an alert message warning you of the potential inaccuracy of the rate result.
 </p>
 
<div class="table-block"> 
<form name="calc" method="post" action="#">
 <table>
 <tbody>

 <tr>
 <td>
 <strong>
 Month
 </strong>
 </td>
 <td>
 <strong>
 Day
 </strong>
 </td>
 <td>
 <strong>
 Year
 </strong>
 </td>
 <td>
 <strong>
 Investments
 </strong>
 </td>
 <td>
 <strong>
 Withdrawals<br />
 & End Value
 </strong>
 </td>
 </tr>

 <tr>
 <td>
 <input type='number' id='mon_0' name='mon_0' value='1' size='2' onKeyUp='clear_results(form)' />
 </td>
 <td>
 <input type='number' id='day_0' name='day_0' value='1' size='2' onKeyUp='clear_results(form)' />
 </td>
 <td>
 <input type='number' id='yr_0' name='yr_0' size='4' value='2000' onKeyUp='clear_results(form)' />
 </td>
 <td>
 <input type='number' id='out_0' name='out_0' size='15' value='100000' onKeyUp='clear_results(form)' />
 </td>
 <td>
 
 << Begin Value
 
 </td>
 </tr>

 <tr>
 <td>
 <input type='number' id='mon_1' name='mon_1' value='' size='2' />
 </td>
 <td>
 <input type='number' id='day_1' name='day_1' value='' size='2' />
 </td>
 <td>
 <input type='number' id='yr_1' name='yr_1' size='4' value='' />
 </td>
 <td>
 <input type='number' id='out_1' name='out_1' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 <td>
 <input type='number' id='in_1' name='in_1' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 </tr>

 <tr>
 <td>
 <input type='number' id='mon_2' name='mon_2' value='' size='2' />
 </td>
 <td>
 <input type='number' id='day_2' name='day_2' value='' size='2' />
 </td>
 <td>
 <input type='number' id='yr_2' name='yr_2' size='4' value='' />
 </td>
 <td>
 <input type='number' id='out_2' name='out_2' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 <td>
 <input type='number' id='in_2' name='in_2' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 </tr>

 <tr>
 <td>
 <input type='number' id='mon_3' name='mon_3' value='' size='2' />
 </td>
 <td>
 <input type='number' id='day_3' name='day_3' value='' size='2' />
 </td>
 <td>
 <input type='number' id='yr_3' name='yr_3' size='4' value='' />
 </td>
 <td>
 <input type='number' id='out_3' name='out_3' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 <td>
 <input type='number' id='in_3' name='in_3' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 </tr>

 <tr>
 <td>
 <input type='number' id='mon_4' name='mon_4' value='' size='2' />
 </td>
 <td>
 <input type='number' id='day_4' name='day_4' value='' size='2' />
 </td>
 <td>
 <input type='number' id='yr_4' name='yr_4' size='4' value='' />
 </td>
 <td>
 <input type='number' id='out_4' name='out_4' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 <td>
 <input type='number' id='in_4' name='in_4' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 </tr>

 <tr>
 <td>
 <input type='number' id='mon_5' name='mon_5' value='' size='2' />
 </td>
 <td>
 <input type='number' id='day_5' name='day_5' value='' size='2' />
 </td>
 <td>
 <input type='number' id='yr_5' name='yr_5' size='4' value='' />
 </td>
 <td>
 <input type='number' id='out_5' name='out_5' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 <td>
 <input type='number' id='in_5' name='in_5' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 </tr>

 <tr>
 <td>
 <input type='number' id='mon_6' name='mon_6' value='' size='2' />
 </td>
 <td>
 <input type='number' id='day_6' name='day_6' value='' size='2' />
 </td>
 <td>
 <input type='number' id='yr_6' name='yr_6' size='4' value='' />
 </td>
 <td>
 <input type='number' id='out_6' name='out_6' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 <td>
 <input type='number' id='in_6' name='in_6' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 </tr>

 <tr>
 <td>
 <input type='number' id='mon_7' name='mon_7' value='' size='2' />
 </td>
 <td>
 <input type='number' id='day_7' name='day_7' value='' size='2' />
 </td>
 <td>
 <input type='number' id='yr_7' name='yr_7' size='4' value='' />
 </td>
 <td>
 <input type='number' id='out_7' name='out_7' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 <td>
 <input type='number' id='in_7' name='in_7' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 </tr>

 <tr>
 <td>
 <input type='number' id='mon_8' name='mon_8' value='' size='2' />
 </td>
 <td>
 <input type='number' id='day_8' name='day_8' value='' size='2' />
 </td>
 <td>
 <input type='number' id='yr_8' name='yr_8' size='4' value='' />
 </td>
 <td>
 <input type='number' id='out_8' name='out_8' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 <td>
 <input type='number' id='in_8' name='in_8' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 </tr>

 <tr>
 <td>
 <input type='number' id='mon_9' name='mon_9' value='' size='2' />
 </td>
 <td>
 <input type='number' id='day_9' name='day_9' value='' size='2' />
 </td>
 <td>
 <input type='number' id='yr_9' name='yr_9' size='4' value='' />
 </td>
 <td>
 <input type='number' id='out_9' name='out_9' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 <td>
 <input type='number' id='in_9' name='in_9' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 </tr>

 <tr>
 <td>
 <input type='number' id='mon_10' name='mon_10' value='' size='2' />
 </td>
 <td>
 <input type='number' id='day_10' name='day_10' value='' size='2' />
 </td>
 <td>
 <input type='number' id='yr_10' name='yr_10' size='4' value='' />
 </td>
 <td>
 <input type='number' id='out_10' name='out_10' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 <td>
 <input type='number' id='in_10' name='in_10' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 </tr>

 <tr>
 <td>
 <input type='number' id='mon_11' name='mon_11' value='' size='2' />
 </td>
 <td>
 <input type='number' id='day_11' name='day_11' value='' size='2' />
 </td>
 <td>
 <input type='number' id='yr_11' name='yr_11' size='4' value='' />
 </td>
 <td>
 <input type='number' id='out_11' name='out_11' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 <td>
 <input type='number' id='in_11' name='in_11' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 </tr>

 <tr>
 <td>
 <input type='number' id='mon_12' name='mon_12' value='' size='2' />
 </td>
 <td>
 <input type='number' id='day_12' name='day_12' value='' size='2' />
 </td>
 <td>
 <input type='number' id='yr_12' name='yr_12' size='4' value='' />
 </td>
 <td>
 <input type='number' id='out_12' name='out_12' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 <td>
 <input type='number' id='in_12' name='in_12' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 </tr>

 <tr>
 <td>
 <input type='number' id='mon_13' name='mon_13' value='' size='2' />
 </td>
 <td>
 <input type='number' id='day_13' name='day_13' value='' size='2' />
 </td>
 <td>
 <input type='number' id='yr_13' name='yr_13' size='4' value='' />
 </td>
 <td>
 <input type='number' id='out_13' name='out_13' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 <td>
 <input type='number' id='in_13' name='in_13' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 </tr>

 <tr>
 <td>
 <input type='number' id='mon_14' name='mon_14' value='' size='2' />
 </td>
 <td>
 <input type='number' id='day_14' name='day_14' value='' size='2' />
 </td>
 <td>
 <input type='number' id='yr_14' name='yr_14' size='4' value='' />
 </td>
 <td>
 <input type='number' id='out_14' name='out_14' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 <td>
 <input type='number' id='in_14' name='in_14' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 </tr>

 <tr>
 <td>
 <input type='number' id='mon_15' name='mon_15' value='' size='2' />
 </td>
 <td>
 <input type='number' id='day_15' name='day_15' value='' size='2' />
 </td>
 <td>
 <input type='number' id='yr_15' name='yr_15' size='4' value='' />
 </td>
 <td>
 <input type='number' id='out_15' name='out_15' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 <td>
 <input type='number' id='in_15' name='in_15' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 </tr>

 <tr>
 <td>
 <input type='number' id='mon_16' name='mon_16' value='' size='2' />
 </td>
 <td>
 <input type='number' id='day_16' name='day_16' value='' size='2' />
 </td>
 <td>
 <input type='number' id='yr_16' name='yr_16' size='4' value='' />
 </td>
 <td>
 <input type='number' id='out_16' name='out_16' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 <td>
 <input type='number' id='in_16' name='in_16' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 </tr>

 <tr>
 <td>
 <input type='number' id='mon_17' name='mon_17' value='' size='2' />
 </td>
 <td>
 <input type='number' id='day_17' name='day_17' value='' size='2' />
 </td>
 <td>
 <input type='number' id='yr_17' name='yr_17' size='4' value='' />
 </td>
 <td>
 <input type='number' id='out_17' name='out_17' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 <td>
 <input type='number' id='in_17' name='in_17' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 </tr>

 <tr>
 <td>
 <input type='number' id='mon_18' name='mon_18' value='' size='2' />
 </td>
 <td>
 <input type='number' id='day_18' name='day_18' value='' size='2' />
 </td>
 <td>
 <input type='number' id='yr_18' name='yr_18' size='4' value='' />
 </td>
 <td>
 <input type='number' id='out_18' name='out_18' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 <td>
 <input type='number' id='in_18' name='in_18' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 </tr>

 <tr>
 <td>
 <input type='number' id='mon_19' name='mon_19' value='' size='2' />
 </td>
 <td>
 <input type='number' id='day_19' name='day_19' value='' size='2' />
 </td>
 <td>
 <input type='number' id='yr_19' name='yr_19' size='4' value='' />
 </td>
 <td>
 <input type='number' id='out_19' name='out_19' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 <td>
 <input type='number' id='in_19' name='in_19' size='15' value='' onKeyUp='clear_results(form)' />
 </td>
 </tr>

 <tr>
 <td colspan="3" align="center">
 <input type="reset" class="table-btn"  value="Reset" />
 </td>
 <td colspan="2" align="center">
 <input type="button" class="table-btn"  value="Calculate" onclick="calc_ror(this.form)" />
 </td>
 </tr>

 <tr>
 <td colspan="4">
 
 Profit/-Loss:
 
 </td>
 <td>
 <input type="text" id="pol" name="pol" size="15" />
 </td>
 </tr>

 <tr>
 <td colspan="4">
 
 Average annual rate of return:
 
 </td>
 <td>
 <input type="text" id="irr" name="ror" size="15" />
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


 
<p>&nbsp;</p>
 <p><img src="../img/price-appreciation.png" width="630" height="446" alt="Home Price Appreciation." /></p>	
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
