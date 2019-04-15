<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Canadian Estate Cost Calculator</title>		
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


function getMTR(form) {

   var VMTR = document.calc.province.options[document.calc.province.selectedIndex].value;
   document.calc.MTR.value =  VMTR + "%";
   document.calc.HMTR.value = VMTR / 100;
   document.calc.EPVindex.value = document.calc.province.selectedIndex;
}


//---------------------------------------
function computeREB(form) {

   var VMTR =  document.calc.province.options[document.calc.province.selectedIndex].value;

   document.calc.MTR.value =  VMTR + "%";
   document.calc.HMTR.value = VMTR / 100;
   document.calc.EPVindex.value = document.calc.province.selectedIndex;

   //REAL ESTATE, BUSINESS
   var VREBOC = sn(document.calc.REBOC.value);
   if(VREBOC.length == 0) {
      VREBOC = 0;
   }
   var VREBCV = sn(document.calc.REBCV.value);
   if(VREBCV.length == 0) {
      VREBCV = 0;
   }
   var VREBGL = Number(VREBCV) - Number(VREBOC);
   document.calc.REBGL.value = fns(VREBGL,2,1,1,0);
   var VREBTGL = VREBGL * .75;
   document.calc.REBTGL.value = fns(VREBTGL,0,1,1,0);

} //END OF COMPUTE REB FUNCTION

//---------------------------------------
function computeRP(form) {

   var VRPCV = sn(document.calc.RPCV.value);
   if(VRPCV.length == 0) {
      VRPCV = 0;
   } 
   var VRPGL = VRPCV;
   if(VRPGL.length == 0) {
      VRPGL = 0;
   } 
   document.calc.RPGL.value = fns(VRPGL,0,1,1,0);
   var VRPTGL = VRPCV;
   document.calc.RPTGL.value = fns(VRPTGL,0,1,1,0);

} //END OF COMPUTE RP FUNCTION


//---------------------------------------
function computeFI(form) {

   //FINANCIAL INVESTMENTS
   var VFIOC = sn(document.calc.FIOC.value);
   if(VFIOC.length == 0) {
      VFIOC = 0;
   }
   var VFICV = sn(document.calc.FICV.value);
   if(VFICV.length == 0) {
      VFICV = 0;
   }
   var VFIGL = Number(VFICV) - Number(VFIOC);
   document.calc.FIGL.value = fns(VFIGL,0,1,1,0);
   var VFITGL = VFIGL * .75;
   document.calc.FITGL.value = fns(VFITGL,0,1,1,0);
} //END OF COMPUTE FI FUNCTION

//---------------------------------------
function computeForm(form) {

   var VMTR = document.calc.province.options[document.calc.province.selectedIndex].value;
   document.calc.MTR.value =  VMTR + "%";
   document.calc.HMTR.value = VMTR / 100;
   document.calc.EPVindex.value = document.calc.province.selectedIndex;

   //CASH
   var VCASHCV = sn(document.calc.CASHCV.value);
   if(VCASHCV.length == 0) {
      VCASHCV = 0;
   }

   //REAL ESTATE, BUSINESS
   var VREBOC = sn(document.calc.REBOC.value);
   if(VREBOC.length == 0) {
      VREBOC = 0;
   }
   var VREBCV = sn(document.calc.REBCV.value);
   if(VREBCV.length == 0) {
      VREBCV = 0;
   }
   var VREBGL = Number(VREBCV) - Number(VREBOC);
   document.calc.REBGL.value = fns(VREBGL,0,1,1,0);
   var VREBTGL = VREBGL * .75;
   document.calc.REBTGL.value = fns(VREBTGL,0,1,1,0);

   //REGISTERED PROGRAMS
   var VRPCV = sn(document.calc.RPCV.value);
   if(VRPCV.length == 0) {
      VRPCV = 0;
   } 
   var VRPGL = VRPCV;

   document.calc.RPGL.value = fns(VRPGL,0,1,1,0);
   var VRPTGL = VRPCV;
   document.calc.RPTGL.value = fns(VRPTGL,0,1,1,0);

   //FINANCIAL INVESTMENTS
   var VFIOC = sn(document.calc.FIOC.value);
   if(VFIOC.length == 0) {
      VFIOC = 0;
   }
   var VFICV = sn(document.calc.FICV.value);
   if(VFICV.length == 0) {
      VFICV = 0;
   }
   var VFIGL = Number(VFICV) - Number(VFIOC);
   document.calc.FIGL.value = fns(VFIGL,0,1,1,0);
   var VFITGL = VFIGL * .75;
   document.calc.FITGL.value = fns(VFITGL,0,1,1,0);

   //TAX TOTALS
   var VTAXTOTOC = Number(VREBOC) + Number(VFIOC);
   document.calc.TAXTOTOC.value = fns(VTAXTOTOC,0,1,1,0);

   var VTAXTOTCV = Number(VCASHCV) + Number(VREBCV) + Number(VRPCV) + Number(VFICV);
   document.calc.TAXTOTCV.value = fns(VTAXTOTCV,0,1,1,0);

   var VTAXTOTGL = Number(VREBGL) + Number(VRPGL) + Number(VFIGL);
   document.calc.TAXTOTGL.value = fns(VTAXTOTGL,0,1,1,0);

   var VTAXTOTTGL = Number(VREBTGL) + Number(VRPTGL) + Number(VFITGL);
   document.calc.TAXTOTTGL.value = fns(VTAXTOTTGL,0,1,1,0);

   //PERSONAL
   var VPERSCV = sn(document.calc.PERSCV.value);
   if(VPERSCV.length == 0) {
      VPERSCV = 0;
   }

   //MORTGAGE DEBT
   var VMDEBTCV = sn(document.calc.MDEBTCV.value);
   if(VMDEBTCV.length == 0) {
      VMDEBTCV = 0;
   }

   //OTHER DEBT
   var VODEBTCV = sn(document.calc.ODEBTCV.value);
   if(VODEBTCV.length == 0) {
      VODEBTCV = 0;
   }

   //TOTAL
   var VTOTCV = Number(Number(VPERSCV) - Number(VMDEBTCV) - Number(VODEBTCV)) + Number(VTAXTOTCV);
   document.calc.TOTCV.value = fns(VTOTCV,0,1,1,0);

   //IF TOTAL IS GREATER THAN ZERO, COMPUTE REST OF FORM
   if(VTOTCV > 0) {

   //ESTATE PROBATE VALUE
   var VEPV = Number(VTAXTOTCV) + Number(VPERSCV) - Number(VMDEBTCV);
   document.calc.EPV.value = fns(VEPV,0,1,1,0);

   //DEEMED DEPOSITION
   var VAPTR = sn(document.calc.HMTR.value);
   var VDD = Number(VRPCV * VAPTR) + ((Number(VREBGL) + Number(VFIGL)) * .75 * VAPTR);
   document.calc.DD.value = fns(VDD,0,1,1,0);

   //EXECUTOR FEES
   var VEF = VEPV * .05;
   document.calc.EF.value = fns(VEF,0,1,1,0);

   //PROBATE FEES
   var VPF = 0;

   //British Columbia
   if(document.calc.EPVindex.value == 0) {
      if(VEPV < 10000) {
         VPF = 0;
      } else
      if(VEPV > 10000 && VEPV < 25000) {
         VPF = 200;
      } else
      if(VEPV > 25000 && VEPV < 50000) {
         VPF = Number(200) + Number(((Number(VEPV) - Number(25000)) * 6));
      } else
      if(VEPV > 50000) {
         VPF = Number(350) + Number(((Number(VEPV) - Number(50000)) / 1000 * 14));
      }
   }

   //Alberta
   if(document.calc.EPVindex.value == 1) {
      if(VEPV < 10000) {
         VPF = 25;
      } else
      if(VEPV > 10000 && VEPV < 25000) {
         VPF = 100;
      } else
      if(VEPV > 25000 && VEPV < 50000) {
         VPF = 200;
      } else
      if(VEPV > 50000 && VEPV < 100000) {
         VPF = 400;
      }
      if(VEPV > 100000 && VEPV < 250000) {
         VPF = 600;
      }
      if(VEPV > 250000 && VEPV < 500000) {
         VPF = 1500;
      }
      if(VEPV > 500000 && VEPV < 1000000) {
         VPF = 3000;
      }
      if(VEPV > 1000000) {
         VPF = 6000;
      }
   }

   //Saskatchewan
   if(document.calc.EPVindex.value == 2) {
      if(VEPV <= 1000) {
         VPF = 12;
      } else
      if(VEPV > 1000) {
         VPF = Number(12) + Number(parseInt(((Number(VEPV) - Number(1000)) / 1000 * 6),10));
      }
   }

   //Manitoba
   if(document.calc.EPVindex.value == 3) {
      if(VEPV <= 5000) {
         VPF = 25;
      } else
      if(VEPV > 5000) {
         VPF = Number(25) + Number(parseInt(((Number(VEPV) - Number(5000)) / 1000 * 6),10));
      }
   }

   //Ontario
   if(document.calc.EPVindex.value == 4) {
      if(VEPV <= 50000) {
         VPF = parseInt((VEPV / 1000),10) * 5;
      } else
      if(VEPV > 50000) {
         VPF = Number(250) + Number(parseInt(((Number(VEPV) - Number(50000)) / 1000 * 15),10));
      }
   }

   //Quebec
   if(document.calc.EPVindex.value == 5) {
      VPF = 0;
   }

   //New Brunswick
   if(document.calc.EPVindex.value == 6) {
      if(VEPV <= 5000) {
         VPF = 25;
      } else
      if(VEPV > 5000 && VEPV <= 10000) {
         VPF = 50;
      } else
      if(VEPV > 10000 && VEPV <= 15000) {
         VPF = 75;
      } else
      if(VEPV > 15000 && VEPV <= 20000) {
         VPF = 100;
      } else
      if(VEPV > 20000) {
         VPF = Number(100) + Number((Number(VEPV) - Number(20000)) / 1000 * 5);
      }
   }

   //Prince Edward Island
   if(document.calc.EPVindex.value == 7) {
      if(VEPV <= 10000) {
         VPF = 50;
      } else
      if(VEPV > 10001 && VEPV <= 25001) {
         VPF = 100;
      } else
      if(VEPV > 25001 && VEPV <= 50001) {
         VPF = 200;
      } else
      if(VEPV > 50001 && VEPV <= 100000) {
         VPF = 400;
      } else
      if(VEPV > 100000) {
         VPF = Number(400) + Number(((Number(VEPV) - Number(100000)) / 1000 * 4));
      }
   }

   //Nova Scotia
   if(document.calc.EPVindex.value == 8) {
      if(VEPV <= 10000) {
         VPF = 75;
      } else
      if(VEPV > 10000 && VEPV <= 25000) {
         VPF = 150;
      } else
      if(VEPV > 25000 && VEPV <= 50000) {
         VPF = 250;
      } else
      if(VEPV > 50000 && VEPV <= 100000) {
         VPF = 500;
      } else
      if(VEPV > 100000 && VEPV <= 150000) {
         VPF = 600;
      } else
      if(VEPV > 150000 && VEPV <= 200000) {
         VPF = 800;
      } else
      if(VEPV > 200000) {
         VPF = Number(800) + Number((Number(VEPV) - Number(200000)) / 1000 * 5);
      }
   }

   //Newfoundland
   if(document.calc.EPVindex.value == 9) {
      if(VEPV <= 1000) {
         VPF = 50;
      } else
      if(VEPV > 1000) {
         VPF = Number(50) + Number(parseInt(((Number(VEPV) - Number(1000)) / 1000 * 4),10));
      }
   }

   //Northwest Territories
   if(document.calc.EPVindex.value == 10) {
      VPF = parseInt((VEPV / 1000 * 3),10);
   }

   //Yukon
   if(document.calc.EPVindex.value == 11) {
      if(VEPV <= 10000) {
         VPF = 0;
      } else
      if(VEPV > 10000 && VEPV <= 25000) {
         VPF = 140;
      } else
      if(VEPV > 25000) {
         VPF = Number(140) + Number(parseInt(((Number(VEPV) - Number(25000)) / 1000 * 6),10));
      }
   }

   document.calc.PF.value = fns(VPF,0,1,1,0);

   //LEGAL & ACCOUNTING
   var VLA = VEPV * .02;
   document.calc.LA.value = fns(VLA,0,1,1,0);

   //FINAL EXPENSES
   var VFE = 10000;
   document.calc.FE.value = fns(VFE,0,1,1,0);

   //TOTAL SETTLEMENT COSTS
   var VTSC = Number(VDD) + Number(VEF) + Number(VPF) + Number(VLA) + Number(VFE);
   document.calc.TSC.value = fns(VTSC,0,1,1,0);

   //NET ESTATE
   var VNE = Number(VTOTCV) - Number(VTSC);
   document.calc.NE.value = fns(VNE,0,1,1,0);

   //ESTATE SHRINKAGE
   var VES = (Number(VTOTCV) - Number(VNE)) / VTOTCV;
   document.calc.ES.value = fns((VES * 100),2,0,2,1) + "";
   document.calc.HES.value = VES;

   //NET ESTATE VALUE
   var VNEV = 1 - VES;
   document.calc.NEV.value = fns((VNEV * 100),2,0,2,1) + "";
   document.calc.HNEV.value = VNEV;
   }//end of if statement that checks to see if Total is greater than zero

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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/canadian-estate.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				<div class="main-heading"><h1> Canada Estate Planning Calculator </h1>
</div>
                    <ul id="breadcrumbs">

                        <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
                        <li><a href="https://www.mortgagecalculator.biz/c/canadian.php">Canada</a></li>
                        <li>Estate Planning</li>
                    </ul>
                </div>   			<div class="bottom-section">
<p>This calculator will help you to forecast the value of your estate after probate.</p>
<p>
Choose your province and then fill in all applicable entry boxes. Each time you add or change an entry, clicking the tab key will recalculate the Estate Cost.
</p>

<div class="table-block">
<form name="calc" method="post" action="#">
<table>
<tbody>
<tr>
<td>

Choose your Province:

</td>
<td colspan=3 align="center"><select name="province" onChange="computeForm(this.form)"  width="180" style="width: 180px">
<option value="49.55">British Columbia</option>
<option value="45.17">Alberta</option>
<option value="50.79">Saskatchewan</option>
<option value="49.38">Manitoba</option>
<option value="49.21">Ontario</option>
<option value="52.18">Quebec</option>
<option value="48.29">New Brunswick</option>
<option value="49.87">Prince Edward Island</option>
<option value="47.56">Nova Scotia</option>
<option value="52.90">Newfoundland</option>
<option value="43.94">Northwest Territories</option>
<option value="46.11">Yukon</option>
</select>
</td>
<td>
Rate <input type="text" name="MTR" size="6" value="49.55%" />
<input type="hidden" name="HMTR" size=15 value=".4955" />
<input type="hidden" name="EPVindex" size=15 value="0" />
</td>
</tr>

<tr>
<td align="center">
<strong>
Asset<br />Category
</strong>
</td>
<td align="center">
<strong>
Original<br />Cost
</strong>
</td>
<td align="center">
<strong>
Current<br />Value
</strong>
</td>
<td align="center">
<strong>
Gain<br />(Loss)
</strong>
</td>
<td align="center">
<strong>
Taxable Gain<br />
(Loss)
</strong>
</td>
</tr>

<tr>
<td>

Cash

</td>
<td>
</td>
<td align="center">
<input type="number" step="any" name="CASHCV" size="7" value="0" onChange="computeForm(this.form)" onclick="this.value=''"/>
</td>
<td>
</td>
<td>
</td>
</tr>

<tr>
<td>

Real Estate, Business

</td>
<td align="center">
<input type="number" step="any" name="REBOC" size="7" value="0" onChange="computeForm(this.form)" onclick="this.value=''"/>
</td>
<td align="center">
<input type="number" step="any" name="REBCV" size="7" value="0" onChange="computeForm(this.form)" onclick="this.value=''"/>
</td>
<td align="center">
<input type="number" step="any" name="REBGL" size="10" value="0" onclick="this.value=''"/>
</td>
<td align="center">
<input type="number" step="any" name="REBTGL" size="10" value="0" onclick="this.value=''"/>
</td>
</tr>

<tr>
<td>

Registered Programs<br />
<small>(RSPs, RIFs, LIFs)</small>

</td>
<td>
</td>
<td align="center">
<input type="number" step="any" name="RPCV" size="7" value="0" onChange="computeForm(this.form)" onclick="this.value=''"/>
</td>
<td align="center">
<input type="number" step="any" name="RPGL" size="10" value="0" onclick="this.value=''"/>
</td>
<td align="center">
<input type="number" step="any" name="RPTGL" size="10" value="0" onclick="this.value=''"/>
</td>
</tr>

<tr>
<td>

Financial Investments<br />
<small>(Stocks, Bonds, Mut. F.)</small>

</td>
<td align="center">
<input type="number" step="any" name="FIOC" size="7" value="0" onChange="computeForm(this.form)" onclick="this.value=''"/>
</td>
<td align="center">
<input type="number" step="any" name="FICV" size="7" value="0" onChange="computeForm(this.form)" onclick="this.value=''"/>
</td>
<td align="center">
<input type="number" step="any" name="FIGL" size="10" value="0" onclick="this.value=''"/>
</td>
<td align="center">
<input type="number" step="any" name="FITGL" size="10" value="0" onclick="this.value=''"/>
</td>
</tr>

<tr>
<td>

Tax Totals

</td>
<td align="center">
<input type="number" step="any" name="TAXTOTOC" size="10" value="0" onclick="this.value=''"/>
</td>
<td align="center">
<input type="number" step="any" name="TAXTOTCV" size="10" value="0" onclick="this.value=''"/>
</td>
<td align="center">
<input type="number" step="any" name="TAXTOTGL" size="10" value="0" onclick="this.value=''"/>
</td>
<td align="center">
<input type="number" step="any" name="TAXTOTTGL" size="10" value="0" onclick="this.value=''"/>
</td>
</tr>

<tr>
<td>

Personal<br />
<small>(Family home, personal)</small>

</td>
<td>
</td>
<td align="center">
<input type="number" step="any" name="PERSCV" size="7" value="0" onChange="computeForm(this.form)" onclick="this.value=''"/>
</td>
<td>
</td>
<td>
</td>
</tr>

<tr>
<td>

Mortgage Debt

</td>
<td>
</td>
<td align="center">
<input type="number" step="any" name="MDEBTCV" size="7" value="0" onChange="computeForm(this.form)" onclick="this.value=''"/>
</td>
<td>
</td>
<td>
</td>
</tr>

<tr>
<td>

Other Debt

</td>
<td>
</td>
<td align="center">
<input type="number" step="any" name="ODEBTCV" size="7" value="0" onChange="computeForm(this.form)" onclick="this.value=''"/>
</td>
<td>
</td>
<td>
</td>
</tr>

<tr>
<td>

Total

</td>
<td>
</td>
<td align="center">
<input type="text" name="TOTCV" size="10" value="0" />
</td>
<td>
</td>
<td>
</td>
</tr>

<tr>
<td colspan='5'>
<strong>Results</strong>
</td>
</tr>

<tr>
<td>

Estate Probate Value

</td>
<td colspan='4'>
<input type="text" name="EPV" size="10" value="0" />
</td>
</tr>

<tr>
<td>

Deemed Disposition

</td>
<td colspan='4'>
<input type="text" name="DD" size="10" value="0" />
</td>
</tr>

<tr>
<td>

Executor Fees (5%)

</td>
<td colspan='4'>
<input type="text" name="EF" size="10" value="0" />
</td>
</tr>

<tr>
<td>

Probate Fees

</td>
<td colspan='4'>
<input type="text" name="PF" size="10" value="0" />
</td>
</tr>

<tr>
<td>

Legal & Accounting (2%)

</td>
<td colspan='4'>
<input type="text" name="LA" size="10" value="0" />
</td>
</tr>

<tr>
<td>

Final Expenses

</td>
<td colspan='4'>
<input type="text" name="FE" size="10" value="0" />
</td>
</tr>

<tr>
<td>

Total Settlement Costs

</td>
<td colspan='4'>
<input type="text" name="TSC" size="10" value="0" />
</td>
</tr>

<tr>
<td>

Net Estate

</td>
<td colspan='4'>
<input type="text" name="NE" size="10" value="0" />
</td>
</tr>

<tr>
<td>

Estate Shrinkage

</td>
<td colspan='4'>
<input type="text" name="ES" size="10" value="0" />
<input type="hidden" name="HES" value="0">
</td>
</tr>

<tr>
<td>

Net Estate Value

</td>
<td colspan='4'>
<input type="text" name="NEV" size="10" value="0" />
<input type="hidden" name="HNEV" value="0">
</td>
</tr>



</tbody>
</table>
</form>
</div>

<p>&nbsp;</p>
<p align="center"><img src="../img/canadian-estate-planning.png" width="400" height="355" alt="Canadian Estate Planning Mock Up." /></p>	
    
    
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
