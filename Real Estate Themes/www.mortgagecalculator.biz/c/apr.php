<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>What is APR? Calculating Your Purchase Mortgage Interest APR: Formula &amp; Definition</title>		
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


function computeAPR(form) {

   var v_principal = sn(document.calc.principal.value);
   var v_intRate = sn(document.calc.intRate.value);
   var v_numYears = sn(document.calc.numYears.value);

   if(v_principal == 0) {
      alert("Please enter the mortgage's principal amount.");
      document.calc.principal.focus();
   } else
   if(v_intRate == 0) {
      alert("Please enter the mortgage's quoted interest rate.");
      document.calc.intRate.focus();
   } else
   if(v_numYears == 0) {
      alert("Please enter the mortgage's term in number of years.");
      document.calc.numYears.focus();
   } else {

      var v_numMonths = v_numYears * 12;
      var v_points = sn(document.calc.points.value);
      var v_other = sn(document.calc.other.value);

      var v_pi_pmt = computeMonthlyPayment(v_principal, v_numMonths, v_intRate);
      document.calc.pi_pmt.value = fns(v_pi_pmt,2,1,1,1);

      var v_point_perc = v_points;
      if(v_points >= 1) {
         v_point_perc = v_points /=100;
      }
      var v_point_cost = v_principal * v_point_perc;

      var v_upfront = Number(v_point_cost) + Number(v_other);
      document.calc.upfront.value = fns(v_upfront,2,1,1,1);
      
      var v_eff_loan_amt = Number(v_upfront) + Number(v_principal);
      document.calc.eff_loan_amt.value = fns(v_eff_loan_amt,2,1,1,1);

      var v_eff_pmt = computeMonthlyPayment(v_eff_loan_amt, v_numMonths, v_intRate);
      document.calc.eff_pmt.value = fns(v_eff_pmt,2,1,1,1);

      document.calc.act_loan_amt.value = fns(v_principal,2,1,1,1);

      var v_eff_apr = computeIntRate(v_numMonths, v_principal, v_eff_pmt, v_intRate);
      document.calc.eff_apr.value = fns(v_eff_apr,4,0,2,1);

   }

}


function clear_results(form) {

      document.calc.pi_pmt.value = "";
      document.calc.upfront.value = "";
      document.calc.eff_loan_amt.value = "";
      document.calc.eff_pmt.value = "";
      document.calc.act_loan_amt.value = "";
      document.calc.eff_apr.value = "";
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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/apr.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				<div class="main-heading"><h1>Calculate APR on Home, Personal &amp; Auto Loans</h1>
</div>
                    <ul id="breadcrumbs">

                      <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
                        <li><a href="https://www.mortgagecalculator.biz/c/term-comparison.php">Compare Loans</a></li>
                        <li>Annual Percentage Rates</li>
                    </ul>
               </div>   			<div class="bottom-section">
<p><img src="https://www.mortgagecalculator.biz/img/house-in-hands.jpg" alt="house" width="130" class="alignright" />   
This calculator figures the effective annual percentage rate (APR) interest rate of a mortgage when upfront loan costs are included.</p>
                <p>For car loans, credit cards &amp; other personal loan types outside of home loans, enter zero on the closing costs and points to complete your APR calculation.</p>
                <p>Actual APR (also known as annual equivalent rate, effective interest rate, or effective annual rate) may vary from quoted APR:</p>
                <ul class="arrow">
                        <li>Other borrowing costs &mdash; like closing costs;</li>
                        <li>Frequency with which compound interest is computed (typically daily);</li>
				</ul>
                
   				<div class="table-block">
<form name="calc" method="post" action="#">
 <table>
 <tbody>
 <tr>
 <td>
 Mortgage loan amount:
 </td>
 <td align="center">
 <input type="number" step="any" name="principal" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 <a href="#viewrates"><strong>Quoted interest rate</strong></a> (%):
 </td>
 <td align="center">
 <input type="number" step="any" name="intRate" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 Mortgage loan term (# years):
 </td>
 <td align="center">
 <input type="number" step="any" name="numYears" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 Points (%):
 </td>
 <td align="center">
 <input type="number" step="any" name="points" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 Other closing costs to include:
 </td>
 <td align="center">
 <input type="number" step="any" name="other" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td align="center">
 <input type="reset" value="Reset" class="table-btn"  />
 </td>
 <td align="center">
 <input type="button" name="compute" class="table-btn"  value="Compute APR" onClick="computeAPR(this.form)" />
 </td>
 </tr>

 <tr>
 <td>
 Principal and interest payment:
 </td>
 <td align="center">
 <input type="text" name="pi_pmt" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 Total of points and other closing costs:
 </td>
 <td align="center">
 <input type="text" name="upfront" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 Effective loan amount:
 </td>
 <td align="center">
 <input type="text" name="eff_loan_amt" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 Monthly payment on effective loan amount:
 </td>
 <td align="center">
 <input type="text" name="eff_pmt" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 But loan amount is really only:
 </td>
 <td align="center">
 <input type="text" name="act_loan_amt" size="15" />
 </td>
 </tr>

 <tr>
 <td>
 Therefore, the APR is really this amount:
 </td>
 <td align="center">
 <input type="text" name="eff_apr" size="15" />
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



 <h2>Understanding Mortgage Rates</h2>
<p><img src="../img/investing-in-a-home.png" width="1250" height="1250" alt="Investing in a Home."> </p>
<p>Understanding the concept of mortgage rates can be complicated,   which is why it is important to clear your basics properly. There are   many concepts, the knowledge of which will be important when you try to   understand mortgage rates. The following are a few points that could be   helpful </p>
<h3> What is APR? </h3>
<p>In strictest terms, APR is Annual Percentage Rate or   the rate charged for borrowing a loan. This rate is an annual rate and   represents the actual cost of the loan over its entire borrowed period.   Thus, transaction fees and other additional charges associated with the   loan would become a part of APR. Also, it is usually represented as a   percentage. </p>
<ul class="arrow">
  <li>
  Credit cards companies have various loans with different costs, which   are affected by their transaction fees, rate structure, penalties and   other such charges. APR becomes the standard that enables borrowers to   have a bottom line to know how much various lenders are charging them   for the loan. This makes APR a comparison tool as well. </li>
  <li>According to the law, the APR must be shown to the customers by the   credit card company they are borrowing from, because they need to   understand the cost of their borrowing. Thus, if the company charges 2% a   month, the APR would be 12 x 2% = 24% annually. This figure would not   be the same as the annual percentage yield, which makes use of a   compound interest.</li></ul>
    <h3>Is There a Significant Difference Between the Quoted APR &amp;   Effective APR? </h3>
<p> There are two rates into which real interest rate is   categorized - the quoted APR and the effective APR. Banks work in   mysterious ways and when they quote an interest rate that you would be   paying for borrowing the funds, it might not be the actual rate that   would be effective. There is a lot of thinking involved and you need to   understand that products that are sold by the banks are complex.</p>
<p>
  Not only banks, but other companies and firms are pretty fond of complex   products themselves and many risks and costs get lost in the small   print. This is mostly because the customers are not aware of all the   intricate details about the product and they don&rsquo;t quite understand   exactly what they are buying. Thus, the banks are able to successfully   hide the true interest rate of the product. </p>
<p>
  <strong> Quoted APR</strong> – This can also be called simple interest or nominal   interest rate per annum. Basically, this APR is quoted without taking   into account the effects of compounding intra year. Thus, when financial   institutions are lending money, they quote this APR and earn the   interest from their customers. Why do they use this APR? Because the   customer would feel that they are paying a lot less than what they   actually are. This helps them sell their products. Normally, quoted APR   is applicable to mortgages, credit cards and loans of various kinds. </p>
<p>
  <strong>Effective APR</strong> – Effective APR takes into account the compounding   effect and is basically, the real rate you would be paying for your   loan. The differences might seem subtle but they can be huge when you   think about their implications for borrowers and lending companies.   Also, when you open a savings account or a bank account, you want to be   paid the highest possible interest. At times like this, the banks might   quote the effective rate to give you the illusion that you would be paid   higher. At this occasion, there would be no mentioned of the quoted   APR. </p>
<p>
  <strong>Example </strong>– If a product&rsquo;s APR is 5% at one company and 5.1% at another,   you would obviously choose the option with 5% because whilst borrowing,   you always want to choose the option that costs the least. However, this   5% rate has not taken into account the factor of compounding. If it is   compounded semi-annually, you will be paying 5.06%, quarterly   compounding would give you 5.09% and monthly compounding would give you   5.11%. These rates post compounding are your actual or effective rates.   Now, think about this deviation of 0.11% when the term of you loan is 30   years long. It would seem quite big.</p>
<p>
  Thus, it is very important to understand the difference between these   two rates because even after a lot of reforms from the government,   institutions and lending companies continue to fool customers like this.   The best form of defense against such practices is arming yourself with   knowledge and knowing if you are being cheated on the basis of a   technicality. This would help you make the right decision while you are   trying to choose a loan based on the rates. It would also be helpful   when you decide to open an account to store your savings. </p>
<h3>
  Comparison of APR against Common Loan Types – Credit Cards and   Mortgages </h3>
<p> As you know, APR is mainly a tool of comparison between   different loans provided by different companies so that the borrower can   make an informed decision about the cost they would be paying. If all   the other things are considered to be equal, you can simply go for the   lowest APR and be done with it. However, all other things are not equal   and this is best explained in the case of Credit Cards and Mortgages.</p>
<p>
  <strong>Credit Cards</strong> – You know that APR does not include compounding effects   which means that you end up paying more than what is being quoted to you   by the lending company. For credit cards, if you start making very   small payments to clear off your accounts, you would be paying interest   on the borrowed amount plus the interest that has been charged   previously to your account. Effectively, your borrowing cost would be   really high. </p>
<p>
  Another important thing to mention for credit cards is that for credit   cards, APR is minus other costs. To find out about those costs, you have   to conduct separate research and compare those other fees with each   other by adding them to the compounded APR. Also, for different   transaction types, there might be different APRs and you should enquire   about this. </p>
<p>
  <strong>Mortgage Loans</strong> – With Mortgage loans, there are many things to   consider because unlike credit card loans, these loans are long term in   nature. So, while making the comparison of APR in case of mortgage   loans, try keeping the bigger picture in mind. Make sure you know about   the charges that are included and excluded from the APR calculation.   When you calculate the rate, one time charges would seem small because   they would be spread out over the lifetime of the loan. But this may not   be the actual situation. Thus, rates may appear less than what they   actually are. </p>
<h3> What are Adjustable Rate Mortgage Indexes (or ARM Indexes) and how do   they Work? </h3>
<p> These days, 20% of applicants who apply for a mortgage get   ARM. The concept of ARM is all about the indexing part. When you get an   adjustable rate mortgage, there are two factors you need to understand –   the index and the margin. Neutral third parties publish the index and   it is set by the forces acting in the market. After that, the margin is   added to the index which finalizes the final rate you will be getting.   Margin is basically a fixed number of percentage points. </p>
<p>
  There are certain common indexes, namely LIBOR, MAT, COFI and CMT and   they all respond in different ways to the ups and downs of the country&rsquo;s   economy. </p>
<p>
  For classification purposes, indexes have two categories – average based   indexes and spot rate based indexes. The first type – average based –   responds slowly to the rising and falling of the markets. Spot rate   based indexes respond in a volatile manner and can be abrupt in their   movement since spot rates in themselves are volatile. </p>
<p>
  However, average based ARMs would have a higher margin than spot rate   based margins because you would be paying a higher rate and that could   be a drawback. However, you would be safe from volatile movements as   well and that is one huge advantage of average based indexes. For minute   analysis, a graph should be consulted for different indexes and their   movement. </p>
<p>
  The following are some popular indexes, their workings and who should get them – </p>
<ul class="arrow">
  <li><strong>
    COFI Index</strong> – This is an average based index and so, the movement of   this index is slow in response to market conditions. For loans that are   COFI based, the rate of payment would be adjusted monthly and the   monthly payment would be adjusted annually. Negative amortization could   happen with this index, which means that you will owe a bit more than   what you borrowed in case all the payments you have made are not   covering the interest portion. These loans are indexed off to 11th   district bank system&rsquo;s cost of funds. If the rates are rising, borrowers   could benefit with this index but for falling rates, they could be   disadvantageous. </li>
  <li><strong>MAT Index</strong> – The 12 MAT or 12 MTA is indexed off to the 1 year Treasury   bill&rsquo;s average of 12 months. The average yield of the previous month is   published every month by the US Treasury and the 12 MAT-index has 12   published average yields to take as an average. Similar to COFI, the   rate of payment gets adjusted each month. For short term rates, market   fluctuations and their reaction to this index is slow since for every   single increase, the index increases by one twelfth on the following   month. </li>
  <li><strong>LIBOR Index</strong> – The rate at which the banks of London borrow reserves   off each other is tracked by LIBOR. The fluctuation is more volatile   with this index than both COFI and 12 MAT. It could be considered to be   an equivalent of US&rsquo; federal funds but instead of the government, the   market forces determine it. Common LIBOR maturities are 1 month, 6   months and 12 months. 1 month LIBOR would have monthly adjustments, 6   months LIBOR would have half yearly adjustments and the same trend is   followed for 12 month LIBOR with annual adjustments. Instead of just   responding to the domestic US market, this index is sensitive to a wider   market. Both the lender and the borrower share the increased risk. </li>
  <li><strong>CMT Index</strong> - The CMT is indexed off to the 1 year Treasury bill&rsquo;s   average of weeks or months. Obviously, the rate fluctuations are pretty   quick with this index. Most CMT loans have yearly adjustments. They are   pretty popular as well, especially with home loan hybrid mortgages which   follow a fixed rate for the first couple of years and then become CMT   mortgages for the rest of the time period. </li>
</ul>
<p>
  It is important that you check if switching indexes would be possible   during repayment of your ARM and refinancing is not the only option you   have left in case the index turns against you.</p>
<h3>
  	What are the Factors that Impact Mortgage Rates? </h3>
<p>Some of these   factors are controllable by you while some others are not. You can   surely control your own credit history and down payment. Better credit   history means less risk and lower mortgage rates. Higher down payment   means that in case of default, the lender would be able to recover the   maximum amount from you. </p>
<ul class="arrow">
  <li><strong>
    Inflation</strong> – When prices rise, purchasing power falls. If you obtained a   loan of $100 and you pay back $100, the value of this $100 would be   different because of the time difference and inflation&rsquo;s effect on the   purchasing/spending power of money. The lender would not have the same   value of it. Thus, the interest rates would increase to make up for the   lost value and this is how inflation affects mortgage rates. </li>
  <li><strong>Economic Conditions</strong> – During the economy&rsquo;s depression period, losing   jobs is common and that increases the risk of a default occurring in   repayment of the mortgage. Thus, during such a phase, mortgage rates   tend to rise since the risk has increased and the lenders need to make   up for it. When the economy is facing a boom period, the risk reduces   and the rates come down accordingly. </li>
  <li><strong>Federal Reserve Rates</strong> – Only the overnight rates from bank to bank are   suggested by the Federal Reserve and they have to part to play in   setting the rate of interest. The overnight rate is the rate at which   various banks can borrow funds from each other. When this overnight rate   falls, mortgage rates might experience a rise because it means that the   economy is not doing so well. </li>
  <li><strong>Investment Opportunities</strong> – Financial institutions and banks lend   mortgage money and by doing so, their money gets tied up in that   investment. However, when they notice that other investments like bonds   or stocks are giving much higher returns than mortgages, they realize   that those are better investment opportunities than the mortgage market.   Thus, the funds available for mortgages fall and become limited. Since   limited funds invoke more competition from mortgage borrowers, the   mortgage rates shoot up.</li>
</ul>
<h3>
  	Risk of Rate Resets Embedded in ARM Loans </h3>
<p><img src="../img/market-turbulence.png" width="300" height="424" alt="Market Turbulence." align="right"/>ARMs are perfect for   borrowers who need a loan for a short time and mostly, borrowers who are   set to sell their property in a short while or get renovations of a   major nature done in the time period of 3 to 5 years do not need the   security of stable interest rates beyond that time. </p>
<p>
  However, there have been instances when borrowers simply wanted to   reduce their loan payments and are, in fact, going to need their house   and property for a long period of time. In the last few years, this has   caused problems for many borrowers since the interest rates are   scheduled to be reset to a higher one and they found out that they would   not qualify for refinance because the value of their home is less. </p>
<p>
  If your property is scheduled to have a reset in the next 12 months or so, the following are a few things you should know – </p>
<ul class="arrow">
  <li><strong>Home Affordable Refinance Program (HAMP)</strong> – Recent figures have   revealed that there are over 1 million Americans whose ARM loans would   be reset in the next year. For them, HARP allows a refinance option with   traditional and historical low fixed interest rates if they had   original backing from government mortgage firms Freddie Mac or Fannie   Mac. For FHA insured mortgages, there are other programs which will   still continue their benefits for such borrowers. For borrowers whose   loans were not backed by the above mentioned government sponsored firms,   other programs would still be made available by the government over the   next year or even some time after that. </li>
  <li><strong>Get a Professional</strong> – In order to achieve the best results for   yourself, your situation needs to be properly documented after thorough   investigation. Some programs mentioned above would require extra time to   understand and navigate through. At least 6 months before the date your   loan is scheduled for a reset, you should contact a mortgage   professional so that they will there will be enough time to investigate,   document, apply and finalize everything. </li>
  <li><strong>Make Your Mortgage Payments in a Timely Manner</strong> – If your mortgage   payment is strong, all the options would be easily available to you and   things would be hassle free. Thus, you should continue to pay all your   mortgages on time and properly so that you can make yourself eligible   for maximum options and programs. </li>
  <li><strong>Total Financial Review</strong> – You can use this opportunity for a full   review of your financial life, including budgeting, savings,   investments, insurance and protection, and cash flow. There are many   financial professionals who can help you with that. </li>
</ul>
<h3>How Do Mortgage Rates Differ for Different Mortgage Products? </h3>
<p>The   following are the different mortgage products available and how the   interest rates get affected by them – </p>
<ul class="arrow">
  <li>
    <strong>Fixed Rate Mortgages</strong> – As the name suggests, these mortgages have a   rate that is set for a fixed period of time, usually 10 years, 15 years,   20 years or 30 years. Usually, the rate is lower for shorter time   periods and vice versa. The best thing about these loans is that you   will know exactly how much you have to pay and budgeting can be simple   in the early loan years. However, if the market interest rates end up   falling below the fixed rate you are getting, you would not find   benefits with this product. Once the period for fixed rate application   gets over, variable rate would come into effect.</li>
  <li> <strong>Adjustable Rate Mortgages</strong> – These mortgages have already been   discussed but it should be mentioned that they work on a variable rate.   Thus, any rise and fall would affect you and for a drop in rates, you   would have benefits. The problem with this is that if the initial rate   increases, your monthly payments would be increased as well as your   interest payment. ARMs generally have a term of 30 years and the fixed   period runs for 3 years, 5 years, 7 years or 10 years. </li>
  <li><strong>Capped Rate Mortgages</strong> – This is an interesting product and gives you   some amount of hedging against extreme market interest rate   fluctuations. This means that even though, your interest rate payments   would change with your lender&rsquo;s variable rate, it would not increase   beyond a capped rate which would be set at the beginning and would be in   effect for a specific time period. Thus, you can have an estimation of   the maximum amount you will have to pay in the capped rate period. It is   beneficial to you because if the lender&rsquo;s SVR (standard variable rate)   is low, you pay the low rate but if it increases above the capped rate,   you pay the capped rate. </li>
  <li> <strong>Discounted Rate Mortgages</strong> – For a set time period, you will be given a   discount on the lender&rsquo;s SVR but your payments would continue to be   variable. Even though you will not have the certainty that is associated   with fixed rate mortgages, you will still have some savings in the   discounted rate period. For people on a strict and tight budget, this   could not be an attractive product but for people with some spare money   and especially when the market has low interest rates, it could be   pretty lucrative.</li>
  <li><strong>Tracker Rate Mortgages</strong> – These mortgages allow you to not be affected   by your lender&rsquo;s SVR and use their base rate. Basically, the tracker is   set above or below this rate and they would be tracked until the tracker   rate period. After that, you would be reverted back to SVR.  In case   base rates increase, not only would you interest payment increase but so   would your monthly installments. </li>
  <li><strong>Offset Mortgages</strong> – In this, you can offset your mortgage using your   savings account and current account. The balance that is left would be   payable by you on your offset mortgage and even the interest would be   chargeable on the difference only. Thus, with this mortgage, you could   easily lower your total payable interest if you have money in your bank   accounts. However, the credit balance would not be liable to any   interest earnings. In case of people who get bonuses regularly, this   could work. In offsetting, you have two options –
<ul class="arrow">
      <li>Don&rsquo;t change the initial repayment term but enjoy lower monthly payments; or<br>
      </li>
      <li> Don&rsquo;t change the initial monthly payment but enjoy quickly paying off your loan.</li>
      <li>In both these options, you would be saving some money. Of course,   prepayment charges would apply, depending on different products. </li>
    </ul>
  </li>
</ul>
<h3>
  	Finding Your Current Credit Score and Managing Your Credit Profile </h3>
<p>The job of your credit score is to be instrumental in deciding your   credit rate when your loan gets approved. Thus, before you apply for a   mortgage, it is important that you have full knowledge about your credit   score, the factors that affect it, its components and its accuracy.   This would help you manage your credit profile. </p>
<h4>
  How Is the Credit Score Calculated? </h4>
<p>Every lender asks the borrower to   submit their credit report so that they can decide on the likelihood of   whether the borrower will be able to pay back the loan or not. Also,   the rate of borrowing is decided based on their credit report. Credit   score or FICO score is calculated by taking into account the following   factors – </p>
<ul class="arrow">
  <li><strong>
    Payment History of the Borrower</strong> – Here, the past loans taken by the   borrower are analyzed to see if they properly made payments for their   past loans on a timely basis. Were there any instances when a payment   was missed or did they experience failure to pay back an entire debt?   Any past declaration of bankruptcy is also analyzed along with the fact   as to if the borrower had ever gone into collection. </li>
  <li><strong> Current Debt of the Borrower</strong> – The current amount of debt on the   borrower&rsquo;s credit card becomes an important factor. It is checked   whether they have any current credit cards which have maxed out. Also,   any current student loans, car loans and other such loans are checked   for their outstanding value and the amount of debt owed is inspected as   well. </li>
  <li><strong>Total Time Period of Credit History</strong> – A short credit history is   usually not a reliable one which is why the entire credit history of the   borrower, as far as possible, is analyzed. This step analyzes whether   the borrower has handled their debts properly and how many years since   they have been managing their credit. The opening date of each bank   account and credit card is inspected and the activity timeline is   examined as well. </li>
  <li><strong>Types of Credit Taken By the Borrower</strong> – This step will analyze about   the current types of credit that the borrower is using and how often   they usually apply for credit. <br>
    Before getting a mortgage, you should get your credit score from any or all of the following credit agencies – 
    <ul class="arrow">
      <li>	<a href="http://www.equifax.com/">Equifax</a><br>
      </li>
      <li> <a href="http://www.transunion.com/">TransUnion</a><br>
      </li>
      <li> <a href="http://www.experian.com/">Experian</a></li>
      <li>You can get a free credit report from each of the above providers at <a href="https://www.annualcreditreport.com/">AnnualCreditReport.com</a>.</li>
    </ul>
  </li>
</ul>
<h4> Contents of the Credit Report </h4>
<ul class="arrow">
  <li><strong>
    Identification</strong> – The credit report contains all identifying   information of the borrower like name, aliases, past address and current   address, SSN and marital status. This information should be latest and   you should make sure that you update this information in your credit   profile. </li>
  <li><strong>Credit Lines</strong> – In this, the revolving credit lines or regular   installments are included like auto loans, credit cards, mortgages and   cards of department store chains. Information on each account will be   included in this segment, including the date that the account was   opened, the starting balance, current balance and late payments   (frequency with numbers). All credit grantors might not report to the   same bureau and thus, for a comprehensive review, reports from all the 3   major credit bureaus should be reviewed. </li>
  <li><strong> Court Records</strong> – Any judgments, bankruptcy records, liens, divorces as   well as satisfied judgments and liens become a part of this section. </li>
</ul>
<p>
  No information about salary history, religion, ethnicity, personal   history, medical records, stocks, bonds, personal assets or   checking/savings account becomes a part of your credit report. </p>
<h4>Review Your Credit Report </h4>
<p>Because of the sheer size of information and   requests that all the major credit bureaus receive on a daily basis,   mistakes and errors are pretty common. Thus, reviewing your own report   becomes pretty important because reporting errors are always a   probability. Scrutinize your credit report closely and look for any   errors that you might find. Since you know everything about your credit   history, it should not be difficult to find erroneous figures or   statements in your own report. It is important that these errors are   corrected before information is submitted to the lenders for getting the   loan.</p>
<p>
  In case the errors are discovered after the report has been sent to   lending institution, you can submit a request to the credit bureau   asking them to send notifications about the correction to the said   lending institutions who have been recipients of your report in the last   6 months. Your prospective lender would be included in this report as   well since they received your report too and might reject your loan   based on the wrong information.</p>
<p>
  Reviewing your report properly could unearth many errors – big or small –   and could have an effect on your overall credit score, which is why   reviewing is so important. You might just get a loan at a lower rate   because of the errors you find in your report. According to the law, you   are allowed a free review of your credit report every year. </p>
<h3>How to Understand Your Credit Score and Improve It </h3>
<p>The range of   credit score is between 300 to 850 and most of the scores fall around   600 to 700. For improving chances of getting a loan, a high credit score   is important. If the credit score is low, the interest rates would be   higher because the lender wants to make up for your increased risk   factor by charging you more interest. Sadly, there are no quick fixes to   improve credit scores and profile but following these points can slowly   improve credit history over the years – </p>
<ul class="arrow">
  <li>
    	<strong>Look for Incorrect Information or Errors </strong>– If there are any late   payments that are listed wrongly or incorrectly, then contact both the   reporting agency and the credit bureau and dispute them. </li>
  <li><strong>Pay Bills in a Timely Manner</strong> – Always ensure that your bills are paid   on time. You can set up an ECS with your bank for respective payment or   you can use reminders on your email or phone to remind you about bill   payments and due dates. </li>
  <li><strong>Try to Reduce Total Owed Debt</strong> – A good plan is to target to higher   interest debts first and pay them off. On all the other accounts, make   minimum payment till the high interest ones are cleared. If you find it   difficult to manage, make use of the services of a credit counseling   company. </li>
  <li><strong> Pay at Least the Minimum Amount on Your Credit Card</strong> – Make sure you   are at least paying the minimum amount due for your monthly credit card   payment and if you can afford it, you can even pay more. </li>
  <li><strong> Don&rsquo;t Max Out Your Limits</strong> – A good measure is to keep a balance worth 25% of maximum credit limit on your cards. </li>
  <li><strong>Pay Back Debts but No Debts Means Low Score</strong> – Low score would also be a result of no past loans or credit card use. </li>
  <li><strong> Keep Credit Card Accounts Open and Do Not Open Any New Accounts</strong> –   Closed cards show up on the credit report so, instead of closing them,   keep them open to improve your credit score. Similarly, starting new   credit card accounts would lower your score as well.</li>
</ul>
<p>
  Finally, it is extremely important to be honest with the lender. Almost   everyone goes through a tough financial phase in their life because of   education, relocation, family problems, personal problems, illness or   divorce. But most lenders understand that it&rsquo;s normal and thus, a few   short payments or occasional erratic behavior in credit payment does not   mar your report. If you have picked up after the bad financial phase,   it would weigh in your favor. Thus, don&rsquo;t try to use nefarious means to   clean up your credit report and instead, be honest with the lenders and   it would be easier for you to get a loan without getting into trouble. </p>
<h3>
  Refinancing Your Mortgage </h3>
<p>Are you planning to refinance your   mortgage for the first time or are you a serial refinancer? Refinancing   should be for taking advantage of the lower rates of interest but you   lose this benefit when you refinance mortgage multiple time. The other   plan with lower interest rates may seem attractive but are you sure it   is the right one for you?</p>
<p>
  If you are planning to refinance mortgage, you shouldn't do it just so   that you can brag about it. You need to do it for the right reasons and   wait for the right time. Think it through and then refinance.</p>
<p>
  To summarize, you have to decide whether your current is loan is a better option than refinance or not. </p>
<h4> Set Goals </h4>
<p>The first thing that you must do is to decide what you   want and set goals accordingly. Refinancing is not going to pay off your   debt completely. It is only going to lower it a little so that you save   money on the interest and, maybe, restructure so that you can pay off   your debt sooner. This means, lower interest on the loan with different   loan term.</p>
<p>
  Two goals you can hope to achieve by refinancing mortgage are – </p>
<ul class="arrow">
  <li><strong>	Reduced Interest Rate</strong> – This is the most common reason for refinancing   mortgage. When the interest rates are lower, then you can save money on   the interest to be paid on the loan and, therefore, repay it sooner. </li>
  <li><strong>Debt Consolidation</strong> – The second reason is debt consolidation. This is   for people who have a first mortgage followed by a home equity loan.   Refinancing the mortgage will help you consolidate the loan and you can   repay it together.</li>
</ul>
<p>
  Typically, most homeowners refinance mortgage to get out of the   Adjustable rate of mortgage terms and get into the security of fixed   interest rated over a fixed loan term.</p>
<h4>
  When Should You Refinance? </h4>
<p>Now that your reasons for refinancing   mortgage are clear, and you have set goals, you must consider if the   time is right for refinancing. 
To determine the right time, look at the cost related savings and ask   yourself, how long you are going to stay in the house? If you plan to   remain in the house for some time, then refinancing makes good sense but   if you plan to sell and move out again then it is not worth the time   and effort. </p>
<p>Also, before refinancing, review your current mortgage and loan terms,   and credit score. Although this is a good rule to follow, you can&rsquo;t   really calculate your savings this way. The savings actually come from   the low interest payments. But, if the interest rate is low and the loan term is longer, then you   will end up paying more interest than before. Consider all these factors   before you refinance your existing mortgage.</p>
<p>
  	Short terms savings are very important but when you are considering   refinancing, they are not the only consideration. You need to consider   what kind of loan your current mortgage is. Is it adjustable rate of   mortgage, piggyback or interest only mortgage? These kinds of mortgages   should propel you to consider opting for refinancing mortgage. They are   expensive and refinancing can help you save money. </p>
<p>
  But, again, if you do not plan to be in the house for a long time, then even with ARM, refinancing is not beneficial.</p>
<h4>
  When You Should NOT Refinance </h4>
<p> All this time, we have been discussing   the right reasons for refinancing mortgage and setting goals for the   same. But, now, let us discuss, when you should not refinance.</p>
<p>
  When you calculate the savings, mortgage and loan terms and the length   of time in which you are going to be in the house, you may find that   refinancing is not an option for you. It is more expensive. If you find   that with refinancing you may end up paying more than the worth of the   house, just continue with your current loan and with the repayments.</p>
<h3>
  Types of Refinancing </h3>
<p>If you have decided that refinancing is an   option for you and you will be saving money with it then you must learn   about the types of refinancing options available. There are 2 main kinds   of refinancing options – </p>
<h4>
  	Cash Out Refinancing </h4>
<p>This kind of refinancing requires you to take a   new mortgage on your old property where the new loan amount is more   than the old mortgage. The different amount is taken in cash. This kind   of loan has a higher rate of interest.</p>
<p>
  You may be wondering why, when the goal is of saving money via   refinancing, people opt for cash out refinancing. This kind of   refinancing occurs when you have another debt to pay and the cash   difference is used to pay it off. </p>
<p>
  For example, if you have a credit card debt, then you can repay it with   the cash from cash out refinancing. This will ensure that you are free   from the credit card debt, which was at a high rate. The money that you   free up can go towards repayment of the mortgage.</p>
<p>
  There is, however, a con to this scenario. You end up paying much more   interest than you would have normally paid. If you think it through, you   will see that the debt from the credit card is transferred to the   mortgage. Also, the biggest problem is that you cannot afford to miss a   single mortgage payment. Miss it and you start getting calls from the   debt collectors. This affects your credit score.</p>
<h4>
  	Plain Vanilla Refinancing </h4>
<p>This type of refinancing replaces your   current mortgage loan with a newer loan that has a lower rate of   interest. There is no cash out here and you are not paying any extra   money. The benefit is that the rate of interest is low and the new   mortgage loan does not exceed the current loan. </p>
<p>
  Thus, you see that refinancing can help you save money and, if you have   any other debts, repay those debts too. But, you are the only one who   can decide if refinancing is the right option for you. </p>
<h3>
  How Do Mortgage Rates Affect Home Prices? </h3>
<p>Any investment is affected   by interest rates, specifically Treasury bill rates and interbank   exchange rates. These rates, in turn, affect mortgage rates. Even though   the effect of rate fluctuation has a huge impact on people&rsquo;s purchasing   power, it is not real estate&rsquo;s only deciding factor. As far as interest   related factors go, mortgage rates might be the only factor influencing   the house prices because capital flows, demand-supply and investor&rsquo;s   ROI as affected by it. </p>
<p>
  For investors, the most common technique for property valuation is the   income approach. Yes, it is a given that the value of real estate is   severely influenced by supply and demand factors and also, replacement   cost of new property development but still, income approach is used. </p>
<p>
  It starts with forecasting or predicting the property trends such as   anticipating lease payments. Then, all the costs of the property like   financing cost are factored into the equation to find out the net   operating income after expenses. Also, capital expenses are then   deducted to come to net cash flow and after discounting/capitalization,   the value of the property can be found out. </p>
<p>
  <strong> Effect On Capital Flows</strong> – Interest rates affect mortgage rates and   then, mortgage rates influence value of the property by affecting the   costs related to the property. But investment values are even more   affected by the demand and supply factors related to the competing   property. When the inter-bank exchange rates fall down, funds become   cheaper and are allowed to flow into the system. Similarly, when these   rates rise up, funds become costlier and the capital available is   withdrawn. </p>
<p>
  If availability of capital is restricted, lending falls down and   accordingly, so do property values. Also, these capital flow changes   have a direct impact on market&rsquo;s demand supply dynamics, thereby   affecting property prices. </p>
<p>
  <strong>Discount Rates</strong> – Capitalization rates are what an investor needs as   his rate of return from the investment. They are the investor&rsquo;s required   rate of dividend. Discount rates are the total return requirements of   the investor. Both these rates are impacted by interest rates, which in   turn impact mortgage rates as well. Because there is a risk free element   involved, when risk increases in certain investments, the additional   risk has to be compensated by providing a higher return. Thus, the risk   free rates become adjusted for the added risk or risk premium. </p>
<p>
  Risk premiums can vary depending on market risk factors and demand   supply but discount rates change based on interest rates. When competing   or substitute investments experience an increase in desired rate of   return, the value of your property will fall and conversely, when the   desired rate falls, the real estate prices would rise. </p>
<p>
  So, while mortgage rates do have an impact on real estate prices, their   impact is supported by the above-mentioned factors as well. They work   together to swing the real estate industry.</p>
<p>
  All the above points would clear all your doubts about mortgage rates   and how they work in the market. These allow you to choose the best   mortgage loan for yourself.</p>
 
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

