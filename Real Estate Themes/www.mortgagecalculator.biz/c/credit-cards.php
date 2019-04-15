<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Compare Credit Cards: Which Credit Card Offer is Best?</title>
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

function computeForm(form) {

   if(document.calc.principal.value == "" || document.calc.principal.value ==0) {
      alert("Please enter a principal amount.");
      document.calc.principal.focus();
   } else
   if(document.calc.payment.value == "" || document.calc.payment.value ==0) {
      alert("Please enter a payment amount.");
      document.calc.payment.focus();
   } else
   if(document.calc.regIntRate1.value == "" || document.calc.regIntRate1.value ==0) {
      alert("Please enter a regular interest rate for Card #1.");
      document.calc.regIntRate1.focus();
   } else
   if(document.calc.regIntRate2.value == "" || document.calc.regIntRate2.value ==0) {
      alert("Please enter a regular interest rate for Card #2.");
      document.calc.regIntRate1.focus();
   } else
   if((document.calc.introIntRate1.value.length == 0) && document.calc.introMonths1.value.length > 0) {
      alert("Please enter an introductory interest rate for Card #1. Otherwise, if Card #1 has no introductory offer, please leave both introductory fields blank for Card #1.");
      document.calc.introIntRate1.focus();
   } else
   if((document.calc.introIntRate2.value.length == 0) && document.calc.introMonths2.value.length > 0) {
      alert("Please enter an introductory interest rate for Card #2. Otherwise, if Card #2 has no introductory offer, please leave both introductory fields blank for Card #2.");
      document.calc.introIntRate2.focus();
   } else
   if((document.calc.introMonths1.value == "" || document.calc.introMonths1.value ==0) && document.calc.introIntRate1.value.length > 0) {
      alert("Please enter the number of months the introductory interest rate will last for Card #1. Otherwise, if Card #1 has no introductory offer, please leave both introductory fields blank for Card #1.");
      document.calc.introMonths1.focus();
   } else
   if((document.calc.introMonths2.value == "" || document.calc.introMonths2.value ==0) && document.calc.introIntRate2.value.length > 0) {
      alert("Please enter the number of months the introductory interest rate will last for Card #2. Otherwise, if Card #2 has no introductory offer, please leave both introductory fields blank for Card #2.");
      document.calc.introMonths2.focus();
   } else {

      var Vprincipal = sn(document.calc.principal.value);
      var Vpayment = sn(document.calc.payment.value);

      //CALC CARD #1

      var VannFee1 = sn(document.calc.annFee1.value);
      if(VannFee1 == 0 || VannFee1 =="") {
         VannFee1 = 0;
      } else {
         VannFee1 = VannFee1 / 12;
      }

      var prin1 = Vprincipal;
      var pmt1 = Vpayment;

      var prin1 = Vprincipal;
      var pmt1 = Vpayment;
      var prinPort1 = 0;
      var intPort1 = 0;
      var count1 = 0;
      var accumInt1 = 0;
      var dailyCount1 = 0;
      var tempInt1 = 0;

      //IF INTRO RATE, DO FOLLOWING:
      var VintroMonths1 = sn(document.calc.introMonths1.value);
      if(VintroMonths1 == 0 || VintroMonths1 =="") {
         VintroMonths1 = 0;
      }

      if(VintroMonths1 > 0 && document.calc.introIntRate1.value.length > 0) {

         var VintroIntRate1 = sn(document.calc.introIntRate1.value);
            VintroIntRate1 = VintroIntRate1 / 100.0;

         if(document.calc.compound1.selectedIndex == 0) {
            VintroIntRate1 /= 12;
         } else {
            VintroIntRate1 /= 365;
         }

         if(document.calc.compound1.selectedIndex == 1) {
            while(count1 < VintroMonths1) {
               dailyCount1 = 0;
               tempInt1 = 0;
               while(dailyCount1 < 31) {
                  tempInt1 = Number(VintroIntRate1 * prin1);
                  accumInt1 = Number(accumInt1) +  + Number(tempInt1);
                  prin1 = Number(prin1) + Number(tempInt1);
                  dailyCount1 = dailyCount1 + 1;
               }
               prin1 = Number(prin1) - Number(pmt1);
               count1 = count1 + 1
               if(count1 > 1000) {
                  alert("Given the entered balance, payment and interest rate, card #1 will never be paid off. Please increase the payment amount.");
                  document.calc.payment.focus();
                  break;
               } else {
                  continue;
               }
            }

         } else {
            while(count1 < VintroMonths1) {
               intPort1 = Number(VintroIntRate1 * prin1);
               prinPort1 = Number(pmt1 - intPort1);
               prin1 = Number(prin1 - prinPort1);
               accumInt1 = Number(accumInt1 + intPort1);
               count1 = count1 + 1
               if(count1 > 1000) {
                  alert("Given the entered balance, payment and interest rate, card #1 will never be paid off. Please increase the payment amount.");
                  document.calc.payment.focus();
                  break;
               } else {
                  continue;
               }
            }
         }
      }
      // END INTRO CALC

      //document.calc.nPer2.value = prin1;
      //document.calc.totalCosts2.value = accumInt1;

      //BEGIN REGULAR INTEREST CALC

      var VregIntRate1 = sn(document.calc.regIntRate1.value);
      VregIntRate1 = VregIntRate1 / 100.0;

      if(document.calc.compound1.selectedIndex == 0) {
         VregIntRate1 /= 12;
      } else {
         VregIntRate1 /= 365;
      }

      if(document.calc.compound1.selectedIndex == 1) {
      while((prin1 * ( 1 + VregIntRate1)) > pmt1) {
      //while(count1 < 2) {
            dailyCount1 = 0;
            tempInt1 = 0;
            while(dailyCount1 < 31) {
               tempInt1 = Number(VregIntRate1 * prin1);
               accumInt1 = Number(accumInt1) +  + Number(tempInt1);
               prin1 = Number(prin1) + Number(tempInt1);
               dailyCount1 = dailyCount1 + 1;
            }
            prin1 = Number(prin1) - Number(pmt1);
            count1 = count1 + 1
            if(count1 > 1000) {
               alert("Given the entered balance, payment and interest rate, card #1 will never be paid off. Please increase the payment amount.");
               document.calc.payment.focus();
               break;
            } else {
               continue;
            }
         }
         //FINAL INTEREST PAYMENT
         dailyCount1 = 0;
         tempInt1 = 0;
         while(dailyCount1 < 31) {
            tempInt1 = Number(VregIntRate1 * prin1);
            accumInt1 = Number(accumInt1) +  + Number(tempInt1);
            prin1 = Number(prin1) + Number(tempInt1);
            dailyCount1 = dailyCount1 + 1;
         }
         count1 = count1 + 1

      } else {
         while((prin1 * ( 1 + VregIntRate1)) > pmt1) {
            intPort1 = Number(VregIntRate1 * prin1);
            prinPort1 = Number(pmt1 - intPort1);
            prin1 = Number(prin1 - prinPort1);
            accumInt1 = Number(accumInt1 + intPort1);
            count1 = count1 + 1
            if(count1 > 1000) {
               alert("Given the entered balance, payment and interest rate, card #1 will never be paid off. Please increase the payment amount.");
               document.calc.payment.focus();
               break;
            } else {
               continue;
            }
         }
      //FINAL INTEREST PAYMENT
         intPort1 = Number(VregIntRate1 * prin1);
         accumInt1 = Number(accumInt1 + intPort1);
         count1 = count1 + 1
      }

      VannFee1 = VannFee1 * count1;

      var VtotalCosts1 = Number(VannFee1) + Number(accumInt1);

      document.calc.totalCosts1.value = "$" + fn(VtotalCosts1,2,1);
      document.calc.nPer1.value = count1; 

      //CALC CARD #2

      var VannFee2 = sn(document.calc.annFee2.value);
      if(VannFee2 == 0 || VannFee2 =="") {
   VannFee2 = 0;
      } else {
         VannFee2 = VannFee2 / 12;
      }

      var prin2 = Vprincipal;
      var pmt2 = Vpayment;

      var prin2 = Vprincipal;
      var pmt2 = Vpayment;
      var prinPort2 = 0;
      var intPort2 = 0;
      var count2 = 0;
      var accumInt2 = 0;
      var dailyCount2 = 0;
      var tempInt2 = 0;

      //IF INTRO RATE, DO FOLLOWING:
      var VintroMonths2 = sn(document.calc.introMonths2.value);
      if(VintroMonths2 == 0 || VintroMonths2 =="") {
         VintroMonths2 = 0;
      }

      if(VintroMonths2 > 0 && document.calc.introIntRate1.value.length > 0) {

         var VintroIntRate2 = sn(document.calc.introIntRate2.value);
         VintroIntRate2 = VintroIntRate2 / 100.0;

         if(document.calc.compound2.selectedIndex == 0) {
            VintroIntRate2 /= 12;
         } else {
            VintroIntRate2 /= 365;
         }

         if(document.calc.compound2.selectedIndex == 1) {
            while(count2 < VintroMonths2) {
               dailyCount2 = 0;
               tempInt2 = 0;
               while(dailyCount2 < 31) {
                  tempInt2 = Number(VintroIntRate2 * prin2);
                  accumInt2 = Number(accumInt2) +  + Number(tempInt2);
                  prin2 = Number(prin2) + Number(tempInt2);
                  dailyCount2 = dailyCount2 + 1;
               }
               prin2 = Number(prin2) - Number(pmt2);
               count2 = count2 + 1
               if(count2 > 1000) {
                  alert("Given the entered balance, payment and interest rate, card #2 will never be paid off. Please increase the payment amount.");
                  document.calc.payment.focus();
                  break;
               } else {
                  continue;
               }
            }

         } else {
            while(count2 < VintroMonths2) {
               intPort2 = Number(VintroIntRate2 * prin2);
               prinPort2 = Number(pmt2 - intPort2);
               prin2 = Number(prin2 - prinPort2);
               accumInt2 = Number(accumInt2 + intPort2);
               count2 = count2 + 1
               if(count2 > 1000) {
                  alert("Given the entered balance, payment and interest rate, card #2 will never be paid off. Please increase the payment amount.");
                  document.calc.payment.focus();
                  break;
               } else {
                  continue;
               }
            }
         }
      }
      // END INTRO CALC

      //document.calc.nPer2.value = prin2;
      //document.calc.totalCosts2.value = accumInt2;

      //BEGIN REGULAR INTEREST CALC

      var VregIntRate2 = sn(document.calc.regIntRate2.value);
      VregIntRate2 = VregIntRate2 / 100.0;

      if(document.calc.compound2.selectedIndex == 0) {
         VregIntRate2 /= 12;
      } else {
         VregIntRate2 /= 365;
      }

      if(document.calc.compound2.selectedIndex == 1) {
      while((prin2 * ( 1 + VregIntRate2)) > pmt2) {
      //while(count2 < 2) {
            dailyCount2 = 0;
            tempInt2 = 0;
            while(dailyCount2 < 31) {
               tempInt2 = Number(VregIntRate2 * prin2);
               accumInt2 = Number(accumInt2) +  + Number(tempInt2);
               prin2 = Number(prin2) + Number(tempInt2);
               dailyCount2 = dailyCount2 + 1;
            }
            prin2 = Number(prin2) - Number(pmt2);
            count2 = count2 + 1
            if(count2 > 1000) {
               alert("Given the entered balance, payment and interest rate, card #2 will never be paid off. Please increase the payment amount.");
               document.calc.payment.focus();
               break;
            } else {
               continue;
            }
         }
         //FINAL INTEREST PAYMENT
         dailyCount2 = 0;
         tempInt2 = 0;
         while(dailyCount2 < 31) {
            tempInt2 = Number(VregIntRate2 * prin2);
            accumInt2 = Number(accumInt2) +  + Number(tempInt2);
            prin2 = Number(prin2) + Number(tempInt2);
            dailyCount2 = dailyCount2 + 1;
         }
         count2 = count2 + 1;

      } else {
         while((prin2 * ( 1 + VregIntRate2)) > pmt2) {
            intPort2 = Number(VregIntRate2 * prin2);
            prinPort2 = Number(pmt2 - intPort2);
            prin2 = Number(prin2 - prinPort2);
            accumInt2 = Number(accumInt2 + intPort2);
            count2 = count2 + 1;
            if(count2 > 2000) {
               alert("Given the entered balance, payment and interest rate, card #2 will never be paid off. Please increase the payment amount.");
               document.calc.payment.focus();
               break;
            } else {
               continue;
            }
         }
      //FINAL INTEREST PAYMENT
         intPort2 = Number(VregIntRate2 * prin2);
         accumInt2 = Number(accumInt2 + intPort2);
         count2 = count2 + 1;
      }

      VannFee2 = VannFee2 * count2;

      var VtotalCosts2 = Number(VannFee2) + Number(accumInt2);

      document.calc.totalCosts2.value = "$" + fn(VtotalCosts2,2,1);
      document.calc.nPer2.value = count2; 

   }


}


function clear_results(form) {

   document.calc.totalCosts1.value = "";
   document.calc.nPer1.value = ""; 
   document.calc.totalCosts2.value = "";
   document.calc.nPer2.value = ""; 
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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/credit-cards.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				  <h1>Credit Card Comparison Calculator</h1></div>
    <ul id="breadcrumbs">
    <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
    <li>Credit Cards</li>
    </ul>
   </div>
   			<div class="bottom-section">

   				<div class="table-block">

<p>Are you considering obtaining a new credit card while being overwhelmed at the number of options available? If so, this tool can help you figure out which card best suits your needs based upon any annual fees, long-term interest rates, introductory rate specials and compounding periodicity. Simply enter your details for each card including the payment amount, the balance &amp; the terms for each card. The calculator will then used fixed payments to help you figure the full cost of each of the cards. If you ever pay lower amounts than what you enter then your actual costs may vary. For cards without any introductory teaser rate please leave the associated field blank.</p> 

<form name="calc" method="post" action="#">
 <table width="100%">
 <thead>
 <tr>
 <th>Old Credit Card</th>
 <th>Input Amount</th>
 </tr>
 </thead>
 <tbody>
 <tr>
 <td>Initial Credit Card Balance:</td>
 <td align="center">
 <input name="principal" type="number" step="any" onKeyUp="clear_results(this.form)" value="5000" size="15" />
 </td>
 </tr>

 <tr>
 <td>Your Monthly Payments:<br />
 <font size='-1'>Must be greater than monthly interest charge</font></td>
 <td align="center">
 <input name="payment" type="number" step="any" onKeyUp="clear_results(this.form)" value="125" size="15" />
 </td>
 </tr></tbody>

<table>
<thead>
 <tr>
 <th>Compare Card Costs</th>
 <th>Card #1</th>
 <th>Card #2</th>
 </tr>
</thead>
<tbody>
 <tr>
 <td>Optional Annual Fee:</td>
 <td align="center">
 <input name="annFee1" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="0" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 <td align="center">
 <input name="annFee2" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="100" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>Optional Introductory Rate:</td>
 <td align="center">
 <input name="introIntRate1" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="9.9" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 <td align="center">
 <input name="introIntRate2" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="0" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>Optional Introductory Rate Term (months):</td>
 <td align="center">
 <input name="introMonths1" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="12" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 <td align="center">
 <input name="introMonths2" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="6" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>Regular Annual Interest Rate:</td>
 <td align="center">
 <input name="regIntRate1" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="14.9" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 <td align="center">
 <input name="regIntRate2" type="number" step="any" onKeyUp="clear_results(this.form);computeForm(this.form)" value="18.6" size="15" onfocus="if (this.value==this.defaultValue) this.value = ''"
onblur="if (this.value=='') this.value = this.defaultValue" />
 </td>
 </tr>

 <tr>
 <td>Cmpounding Frequency:</td>
 <td align="center">
 <select name="compound1" size="1" onChange="clear_results(this.form);computeForm(this.form)">
 <option value="0">Monthly</option>
 <option value="1">Daily</option>
 </select>
 </td>
 <td align="center">
 <select name="compound2" size="1" onChange="clear_results(this.form);computeForm(this.form)">
 <option value="0">Monthly</option>
 <option value="1">Daily</option>
 </select>
 </td>
 </tr>

 <tr>
 <td colspan=3 align="center">
 <input type="button" value="Calculate" onClick="computeForm(this.form)" class="table-btn"/>
 <input type="reset" value="Reset" class="table-btn"/>
 </td>
 </tr>

 <tr>
 <td>Payments Untill Balance Paid Off:</td>
 <td align="center">
 <input type="text" name="nPer1" size="15" />
 </td>
 <td align="center">
 <input type="text" name="nPer2" size="15" />
 </td>
 </tr>

 <tr>
 <td>Total Interest Expense:</td>
 <td align="center">
 <input type="text" name="totalCosts1" size="15" />
 </td>
 <td align="center">
 <input type="text" name="totalCosts2" size="15" />
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
<p><img src="../img/choosing-a-credit-card.png" width="1250" height="992" alt="Choosing a Credit Card."></p>
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