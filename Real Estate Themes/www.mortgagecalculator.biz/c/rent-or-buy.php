<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Should I Buy or Rent a House? Home Ownership vs Renting Calculator</title>		
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


function computeForm(form) {

   var VmoRent = sn(document.calc.moRent.value);
   var VhomeCost = sn(document.calc.homeCost.value);
   var VnoYears = sn(document.calc.noYears.value);
   var v_pay_rate = sn(document.calc.payRate.value);
   var VstayYrs = sn(document.calc.stayYrs.value);

   if(VmoRent == 0) {
      alert("Please enter the amount of your monthly rent payment.");
      document.calc.moRent.focus();
   } else
      if(VhomeCost == 0) {
      alert("Please enter the purchase price of the home.");
      document.calc.homeCost.focus();
   } else
      if(VnoYears == 0) {
      alert("Please your number of years you are financing the home for.");
      document.calc.noYears.focus();
   } else
      if(v_pay_rate == 0) {
      alert("Please enter the mortgage's annual interest rate.");
      document.calc.payRate.focus();
   } else
      if(VstayYrs == 0) {
      alert("Please enter the number of years you plan to stay in this property.");
      document.calc.stayYrs.focus();
   } else {

      //GET RENTAL INFO
      var VtotRent = 0;

      var VmoRentIns = sn(document.calc.moRentIns.value);
      if(VmoRentIns == "" || VmoRentIns == 0) {
         VmoRentIns = 0
      }

      var VinflateRate = sn(document.calc.inflateRate.value);
      if(VinflateRate == "" || VinflateRate == 0) {
         VinflateRate = 0
      } else {
         VinflateRate = VinflateRate / 100;
      }
      VinflateRate = Number(VinflateRate) + Number(1);

      //GET TIME INFO & CONVERT TO MONTHS
      var VstayMonths = VstayYrs * 12;
      var count = 0;

      //GET LOAN INFO
      if(v_pay_rate > 1.0) {
         v_pay_rate = v_pay_rate / 100.0;
      }
      v_pay_rate /= 12;

      var VdownPmt = sn(document.calc.downPmt.value);

      var VorigPrin = Number(VhomeCost) - Number(VdownPmt);
      var intPort = 0;
      var VaccumInt = 0;
      var prinPort = 0;
      var prin = VorigPrin;

      //CALULCATE MONTHLY MORTGAGE PAYMENT
      var noMonths = VnoYears * 12;

      var pow = 1;
      for (var j = 0; j < noMonths; j++) {
         pow = pow * (1 + v_pay_rate);
      }

      var VmoPmt = (VorigPrin * pow * v_pay_rate) / (pow - 1);

      //GET HOME APPRECIATION INFO
      var VapprecRate = sn(document.calc.apprecRate.value);
      if(VapprecRate == "" || VapprecRate == 0) {
         VapprecRate = 0;
      } else
      if(VapprecRate >= 0) {
         VapprecRate = VapprecRate / 100;
      }
      VapprecRate = Number(VapprecRate) + Number(1);
      var VaccumApprec = VhomeCost * VapprecRate;

      //GET PMI (PRIVATE MORTGAGE INSURANCE) INFO
      var Vpmi = sn(document.calc.pmi.value);
      if(Vpmi == 0 || Vpmi == "") {
         Vpmi = 0;
      } else
      if(Vpmi >= .01) {
         Vpmi = Vpmi / 100;
      }
      Vpmi = Vpmi / 12;
      var pmiYN = 0;
      var VaccumPmi = 0;
      var downPayPerc = VdownPmt / VhomeCost;
      if(downPayPerc < .20) {
         pmiYN = 1;
         VaccumPmi = 0;
      }

      //*******CALCULATE CLOSING COSTS

      //POINTS
      var Vfees = sn(document.calc.fees.value);
      if(Vfees == 0 || Vfees == "") {
         Vfees = 0;
      } else {
         Vfees = Vfees / 100;
      }
      var VfeeCost = VorigPrin * Vfees;

      //ORIGINATION FEE
      var Vpoints = sn(document.calc.points.value);
      if(Vpoints == 0 || Vpoints == "") {
         Vpoints = 0;
      } else {
         Vpoints = Vpoints / 100;
      }
      var VpointCost = VorigPrin * Vpoints;

      //OTHER LOAN COSTS
      var VloanCosts= sn(document.calc.loanCosts.value);
      if(VloanCosts == 0 || VloanCosts == "") {
         VloanCosts = 0;
      }

      //TOTAL CLOSING COSTS
      var VclosingCosts = Number(VpointCost) + Number(VfeeCost) + Number(VloanCosts);

      //GET INVESTMENT INFO
      var VinvestIntPort = 0;
      var VinvestPrin = Number(VdownPmt) + Number(VclosingCosts);

      var earnInt = sn(document.calc.saveRate.value);
      earnInt /= 100;
      earnInt /= 12;

      //INITIATE INFLATION FACTOR
      var VaccumInflate = 1;

      //*****CYCLE THROUGH NUMBER OF MONTHS
      while(count < VstayMonths) {

         //ACCUMULATE RENT PAYMENTS & INSURANCE & APPRECIATION
         if(count > 0 && count % 12 == 0) {
            VaccumApprec = VaccumApprec * VapprecRate;
            VmoRent = VmoRent * VinflateRate;
            VaccumInflate = VaccumInflate * VinflateRate;
         }
         VtotRent = Number(VtotRent) + Number(VmoRent);
         VtotRent = Number(VtotRent) + Number(VmoRentIns);

         //ACCUMULATE INTEREST PAYMENTS
         if(count < noMonths) {
            intPort = prin * v_pay_rate;
            VaccumInt = Number(VaccumInt) + Number(intPort)
            prinPort = Number(VmoPmt) - Number(intPort);
            prin = Number(prin) - Number(prinPort);
         }

         //IF PMI APPLICABLE, ACCUMULATE
         if(pmiYN == 1) {
            VaccumPmi = Number(VaccumPmi) + Number(Vpmi * prin);
         }

         //AMORTIZE INVESTED DOWNPAYMENT AND CLOSING COSTS
         VinvestIntPort = earnInt * VinvestPrin;
         VinvestPrin = Number(VinvestPrin) + Number(VinvestIntPort);

         //INCREASE COUNT
         count = Number(count) + Number(1);
      }

      //CALCULATE TOTAL ASSOCIATION DUES
      var VassocDues = sn(document.calc.assocDues.value);
      if(VassocDues == "" || VassocDues == 0) {
         VassocDues = 0;
      }
      var VtotAssocDues = VassocDues * 12 * VstayYrs * VaccumInflate;

      //CALCULATE TOTAL PROPERTY TAXES
      var VpropTax = sn(document.calc.propTax.value);
      if(VpropTax == "" || VpropTax == 0) {
         VpropTax = 0;
      }
      var VtotPropTax = VpropTax * VstayYrs * VaccumInflate;

      //CALCULATE TOTAL MAINTENANCE COSTS
      var Vmaint = document.calc.maint.value;
      if(Vmaint == "" || Vmaint == 0) {
         Vmaint = 0;
      }
      var VtotMaintCost = Vmaint * 12 * VstayYrs * VaccumInflate;

      //CALCULATE TOTAL HOMEOWNER INSURANCE COSTS
      var VhomeIns = sn(document.calc.homeIns.value);
      if(VhomeIns == "" || VhomeIns == 0) {
         VhomeIns = 0;
      } else
      if(VhomeIns >= .01) {
         VhomeIns = VhomeIns / 100;
      }
      var VtotHomeInsCost = VhomeIns * VhomeCost * VstayYrs * VaccumInflate;

      //CALCULATE NET GAIN ON HOME
      var VnetGain = Number(VaccumApprec) - Number(VhomeCost);

      //CALCULATE TAX SAVINGS ON INTEREST, POINTS AND PROPERTY TAXES
      var VtotTaxDeduct = Number(VaccumInt) + Number(VtotPropTax) + Number(VfeeCost);
      var VincomeTax = sn(document.calc.incomeTax.value);
      if(VincomeTax == 0 || VincomeTax == "") {
         VincomeTax = 0;
      } else {
         VincomeTax = VincomeTax / 100;
      }
      var VtotTaxSave = VincomeTax * VtotTaxDeduct;

      //CALCULATE REALTOR COMMISSION ON SALE OF HOME
      var VrealtorCom = sn(document.calc.realtorCom.value);
      if(VrealtorCom == 0 || VrealtorCom == "") {
         VrealtorCom = 0;
      } else {
         VrealtorCom = VrealtorCom / 100;
      }
      var VsellCost = VaccumApprec * VrealtorCom;

      //CALCULATE NET EARNINGS ON INVESTMENT
      var VinvestEarn = Number(VinvestPrin) - Number(VdownPmt) - Number(VclosingCosts);

      document.calc.totRent.value = VtotRent;
      document.calc.moPmt.value = VmoPmt;
      document.calc.accumInt.value = VaccumInt;
      document.calc.closeCosts.value = VclosingCosts;
      document.calc.totPropTax.value = VtotPropTax;
      document.calc.totMaintCost.value = VtotMaintCost;
      document.calc.totHomeInsCost.value = VtotHomeInsCost;
      document.calc.netGain.value = VnetGain;
      document.calc.pmiCost.value = VaccumPmi;
      document.calc.investPrin.value = VinvestEarn;
      document.calc.totAssocDues.value = VtotAssocDues;
      document.calc.totTaxSave.value = VtotTaxSave;
      document.calc.sellCost.value = VsellCost;

      var VtotRentCosts = VtotRent;
      document.calc.totRentCosts.value = VtotRentCosts;
      var VtotRentBenefits = VinvestEarn;
      document.calc.totRentBenefits.value = VtotRentBenefits;
      var VnetRentCost = Number(VtotRent) - Number(VinvestEarn);

      var VtotBuyCosts = Number(VaccumInt) + Number(VclosingCosts) + Number(VtotPropTax) + Number(VtotMaintCost) + Number(VtotHomeInsCost) + Number(VaccumPmi) + Number(VtotAssocDues) + Number(VsellCost);
      document.calc.totBuyCosts.value = VtotBuyCosts;

      var VtotBuyBenefits = Number(VnetGain) + Number(VtotTaxSave);
      document.calc.totBuyBenefits.value = VtotBuyBenefits;
      var VnetBuyCost = Number(VtotBuyCosts) - Number(VtotBuyBenefits);


      document.calc.netRentCost.value = fns(VnetRentCost,2,1,1,1);
      document.calc.netBuyCost.value = fns(VnetBuyCost,2,1,1,1);

      var diff = 0;
      var Vsummary = "";
      if(VnetRentCost > VnetBuyCost) {
         diff = Number(VnetRentCost) - Number(VnetBuyCost);
         Vsummary = "You will save " + fns(diff,2,1,1,1) + " if you buy instead of rent."
      } else {
         diff = Number(VnetBuyCost) - Number(VnetRentCost);
         Vsummary = "You will save " + fns(diff,2,1,1,1) + " if you rent instead of buy."
      }

      document.calc.h_summary.value = Vsummary;

      var v_summary_cell = document.getElementById("summary");
      v_summary_cell.innerHTML = "<font face='arial'><small><strong>Summary:</strong> " + Vsummary + "</small>";

   }

}


function help(help_id,txt) {


   var help_cell = document.getElementById("help_" + help_id + "");
   help_cell.innerHTML = "<font face='arial'><small>" + txt + "</small>";

   for(var i = 1; i<6; i++) {

      if(i != help_id) {

         var clear_cell = document.getElementById("help_" + i + "");
         clear_cell.innerHTML = "";
      }
   }

}

function clear_results(form) {

   var v_summary_cell = document.getElementById("summary");
   v_summary_cell.innerHTML = "";

   document.calc.netRentCost.value = "";
   document.calc.netBuyCost.value = "";

}

function reset_calc(form) {

   var v_summary_cell = document.getElementById("summary");
   v_summary_cell.innerHTML = "";

   var help_cell_1 = document.getElementById("help_1");
   help_cell_1.innerHTML = "";

   var help_cell_2 = document.getElementById("help_2");
   help_cell_2.innerHTML = "";

   var help_cell_3 = document.getElementById("help_3");
   help_cell_3.innerHTML = "";

   var help_cell_4 = document.getElementById("help_4");
   help_cell_4.innerHTML = "";

   var help_cell_5 = document.getElementById("help_5");
   help_cell_5.innerHTML = "";

   document.calc.reset();

}


function showReport(form) {

   computeForm(form);

   var part1 = "<html><head><title>Rent Vs. Buy Report</title>";
   part1 += "</head><b";
   part1 += "od";
   part1 += "y><br /><br /><center></center>";

   var part2 = "<center><table border=''1 cellspacing='0' cellpadding='4'><tr>";
   part2 += "<td colspan='2' align='center'><font face='arial'><big><strong>Rent</strong></big>";
   part2 += "</td><td align='center'><font face='arial'><big><strong>vs.</strong></big></td>";
   part2 += "<td colspan=2 align='center'><font face='arial'><big><strong>Buy</strong></big>";
   part2 += "</td></tr><tr><td colspan=2 valign='top'><font face='arial'><small><strong>";
   part2 += "Monthly Rent Payment: " + fns(document.calc.moRent.value,2,1,1,1) + "<br />";
   part2 += "Annual Return on Investment: " + fns(document.calc.saveRate.value,2,0,2,1) + "</strong>";
   part2 += "</small></td><td> </td><td colspan=2><font face='arial'><small><strong>";
   part2 += "Purchase Price: " + fns(document.calc.homeCost.value,2,1,1,1) + "<br />Down ";
   part2 += "Payment: " + fns(document.calc.downPmt.value,2,1,1,1) + "<br />Mortgage ";
   part2 += "Term: " + document.calc.noYears.value + " years<br />Interest ";
   part2 += "Rate: " + fns(document.calc.payRate.value,2,0,2,1) + "<br />Monthly Mortgage ";
   part2 += "Payment: " + fns(document.calc.moPmt.value,2,1,1,1) + "<br /></strong></small>";
   part2 += "</td></tr><tr><td colspan=5><center><font face='arial'><big><strong>Cost Benefit ";
   part2 += "Analysis</strong></big><br /><font face='arial'><small><small>Calculations ";
   part2 += "are based upon a " + document.calc.inflateRate.value + "% annual inflation rate over ";
   part2 += "the course of " + document.calc.stayYrs.value + " years (the time between now and ";
   part2 += "when you estimate you would sell the home). Please allow for slight rounding";
   part2 += " differences.</small></small></center></td></tr><tr bgcolor='#CCCCCC'>";
   part2 += "<td><font face='arial'><small><strong>Renting Costs</strong></small></td><td>";
   part2 += "<font face='arial'><small><strong>Amount</strong></small></td><td> </td><td>";
   part2 += "<font face='arial'><small><strong>Buying Costs</strong></small></td><td>";
   part2 += "<font face='arial'><small><strong>Amount</strong></small></td></tr>";

   var rows = "";
   rows += "<tr><td><font face='arial'><small>Total Rent & Insurance Payments:</small>";
   rows += "</td><td align='right'><font face='arial'>";
   rows += "<small>" + fns(document.calc.totRent.value,2,1,1,1) + "</small></td>";
   rows += "<td> </td><td><font face='arial'><small>Total of Interest Payments:</small>";
   rows += "</td><td align='right'><font face='arial'>";
   rows += "<small>" + fns(document.calc.accumInt.value,2,1,1,1) + "</small></td></tr>";

   rows += "<tr><td align='right'> </td><td> </td><td> </td><td>";
   rows += "<font face='arial'><small>Total Closing Costs:</small></td>";
   rows += "<td align='right'><font face='arial'>";
   rows += "<small>" + fns(document.calc.closeCosts.value,2,1,1,1) + "</small></td></tr>";

   rows += "<tr><td align='right'> </td><td> </td><td> </td><td>";
   rows += "<font face='arial'><small>Total Property Tax Costs:</small></td>";
   rows += "<td align='right'><font face='arial'>";
   rows += "<small>" + fns(document.calc.totPropTax.value,2,1,1,1) + "</small></td></tr>";

   rows += "<tr><td align='right'> </td><td> </td><td> </td><td>";
   rows += "<font face='arial'><small>Total Maintenance Costs:</small></td>";
   rows += "<td align='right'><font face='arial'>";
   rows += "<small>" + fns(document.calc.totMaintCost.value,2,1,1,1) + "</small></td></tr>";

   rows += "<tr><td align='right'> </td><td> </td><td> </td><td>";
   rows += "<font face='arial'><small>Total Homeowner's Insurance Costs:</small>";
   rows += "</td><td align='right'><font face='arial'>";
   rows += "<small>" + fns(document.calc.totHomeInsCost.value,2,1,1,1) + "</small></td></tr>";

   rows += "<tr><td align='right'> </td><td> </td><td> </td><td>";
   rows += "<font face='arial'><small>Total Association Dues:</small></td>";
   rows += "<td align='right'><font face='arial'>";
   rows += "<small>" + fns(document.calc.totAssocDues.value,2,1,1,1) + "</small></td></tr>";

   rows += "<tr><td align='right'> </td><td> </td><td> </td><td>";
   rows += "<font face='arial'><small>Total PMI Costs:</small></td>";
   rows += "<td align='right'><font face='arial'>";
   rows += "<small>" + fns(document.calc.pmiCost.value,2,1,1,1) + "</small></td></tr>";

   rows += "<tr><td align='right'> </td><td> </td><td> </td><td>";
   rows += "<font face='arial'><small>Cost of selling home:</small></td>";
   rows += "<td align='right'><font face='arial'>";
   rows += "<small>" + fns(document.calc.sellCost.value,2,1,1,1) + "</small></td></tr>";

   rows += "<tr><td align='right'><font face='arial'><small><strong>Total Costs</strong></small>";
   rows += "</td><td align='right'><font face='arial'><small>";
   rows += "<strong>" + fns(document.calc.totRentCosts.value,2,1,1,1) + "</strong></small></td>";
   rows += "<td> </td><td align='right'><font face='arial'><small><strong>Total Costs</strong>";
   rows += "</small></td><td align='right'><font face='arial'><small>";
   rows += "<strong>" + fns(document.calc.totBuyCosts.value,2,1,1,1) + "</strong></small></td></tr>";

   rows += "<tr><td align='right'> </td><td> </td><td> </td><td> </td>";
   rows += "<td align='right'> </td></tr>";

   rows += "<tr bgcolor='#CCCCCC'><td><font face='arial'><small><strong>Renting Benefits</strong>";
   rows += "</small></td><td><font face='arial'><small><strong>Amount</strong></small>";
   rows += "</td><td> </td><td><font face='arial'><small><strong>Buying Benefits</strong></small>";
   rows += "</td><td><font face='arial'><small><strong>Amount</strong></small></td></tr>";

   rows += "<tr><td><font face='arial'><small>Interest Earned on Invested Funds:</small>";
   rows += "</td><td align='right'><font face='arial'>";
   rows += "<small>" + fns(document.calc.investPrin.value,2,1,1,1) + "</small></td>";
   rows += "<td> </td><td><font face='arial'><small>Tax Savings:</small></td>";
   rows += "<td align='right'><font face='arial'>";
   rows += "<small>" + fns(document.calc.totTaxSave.value,2,1,1,1) + "</small></td></tr>";

   rows += "<tr><td align='right'> </td><td> </td><td> </td><td>";
   rows += "<font face='arial'><small>Home Appreciation:</small></td><td align='right'>";
   rows += "<font face='arial'><small>" + fns(document.calc.netGain.value,2,1,1,1) + "</small>";
   rows += "</td></tr>";

   rows += "<tr><td align='right'><font face='arial'><small><strong>Total Benefits</strong></small>";
   rows += "</td><td align='right'><font face='arial'><small>";
   rows += "<strong>" + fns(document.calc.totRentBenefits.value,2,1,1,1) + "</strong></small></td>";
   rows += "<td> </td><td align='right'><font face='arial'><small><strong>Total Benefits</strong>";
   rows += "</small></td><td align='right'><font face='arial'><small>";
   rows += "<strong>" + fns(document.calc.totBuyBenefits.value,2,1,1,1) + "</strong></small></td></tr>";

   rows += "<tr><td align='right'><font face='arial'><small><strong>NET COST OF RENTING:</strong>";
   rows += "</small></td><td align='right'><font face='arial'><small>";
   rows += "<strong>" + document.calc.netRentCost.value + "</strong></small></td><td> </td>";
   rows += "<td align='right'><font face='arial'><small><strong>NET COST OF BUYING:</strong></small>";
   rows += "</td><td align='right'><font face='arial'><small>";
   rows += "<strong>" + document.calc.netBuyCost.value + "</strong></small></td></tr>";

   rows += "<tr bgcolor='#CCCCCC'><td colspan='5'><font face='arial'><small><strong>";
   rows += "Summary:</strong> " + document.calc.h_summary.value + "</small></td></tr>";

   var part4 = "</table><br /><center><form method='post'>";
   part4 += "<input type='button' value='Close' onClick='window.close()'>";
   part4 += "</form></center></body></html>";

   var schedule = (part1 + "" + part2 + "" + rows + "" + part4 + "");

   reportWin = window.open("","","width=600,height=400,toolbar=yes,menubar=yes,scrollbars=yes");
   reportWin.document.write(schedule);
   reportWin.document.close();

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
						<div class="bankrateWidget" app="oa" kind="tabbed" tabs="mortgage,cd,creditcard,auto" widgetwidth="280" pkey="i01zfw6c7a" fontfamily="arial,sans-serif" linkscolor="#0000ff" titlebarbackgroundcolor="#f1fdeb" activetabbackgroundcolor="#08b5db" nextbuttonbackgroundcolor="#08b5db" pid="orgcalcmortbiz" campaign="mcbside#/c/rent-or-buy.php"></div><script src="//widgets.bankrate.com/booter.js"></script>
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
				<div class="main-heading"><h1>Home Rent Vs. Buy Calculator</h1>
</div>
                    <ul id="breadcrumbs">

                        <li><a href="https://www.mortgagecalculator.biz/">Home</a></li>
                        <li>Rent versus Buy Analysis</li>
                    </ul>
                </div>
                <div class="bottom-section">
<p><img src="https://www.mortgagecalculator.biz/img/house-in-hands.jpg" alt="house" width="130" class="alignright" />    This calculator will help you to compare the costs of renting to the costs of buying a property. Since there are all kinds of forces at work behind the scenes (interest, property taxes, tax savings, appreciation, opportunity costs, closing costs, selling costs, etc.), comparing the cost of renting to the cost of buying is a lot more complicated than just comparing the monthly mortgage payment to the monthly rent payment. This calculator attempts to forecast the net effects of all the hidden forces so you can make an informed decision.             </p>
                <p>Much like the stock market rises &amp; falls due to changes in earnings and multiple expansion, the cost of owning vs renting changes across time &amp; location, as <a href="http://info.trulia.com/rentvsbuy">real estate is local</a>.</p>
 <p>
 Help & Instructions will appear in cells to the right of fields once you click in or tab into the fields.

 </p>
 
<div class="table-block">
<form name="calc" method="post" action="#">
 <table>
 <tbody>

 <tr>
 <td align="center">
 <strong>Entry Descriptions</strong>
 </td>
 <td align="center">
 <strong>Entry Fields</strong>
 </td>
 <td align="center">
 <strong>Explain/Instruct</strong>
 </td>
 </tr>

 <tr>
 <td>
 
 Monthly rent ($):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="moRent" size="15" value="800" onKeyUp="clear_results(this.form)" onFocus="help(1,'Enter the amount of the monthly rent payment.')" />
 </td>
 <td rowspan="5" width="125" align="center" valign="top">

 <div id="help_1" style="width: 120px; text-align: left; padding-top: 6px">
 </div>

 </td>
 </tr>

 <tr>
 <td>
 
 Monthly rental insurance ($):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="moRentIns" size="15" value="15" onKeyUp="clear_results(this.form)" onFocus="help(1,'Enter the monthly rental insurance premium.')" />
 </td>
 </tr>

 <tr>
 <td>
 
 Expected annual inflation rate (%):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="inflateRate" size="15" value="4" onKeyUp="clear_results(this.form)" onFocus="help(1,'Enter the annual inflation rate. Enter 4% as 4. This is used to inflate the costs of rent, insurance, maintenance, dues and property taxes for the length of time you will own the home.')" />
 </td>
 </tr>

 <tr>
 <td>
 
 Purchase price of home ($):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="homeCost" size="15" value="100000" onKeyUp="clear_results(this.form)" onFocus="help(1,'Enter the total purchase price of the home -- not including closing costs.')" />
 </td>
 </tr>

 <tr>
 <td>
 
 Down payment amount ($):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="downPmt" size="15" value="10000" onKeyUp="clear_results(this.form)" onFocus="help(1,'Enter the amount you will have available to put down on the house after you have set aside the cash you will need to pay the closing costs.')" />
 </td>
 </tr>

 <tr>
 <td>
 
 Length of mortgage term (# of years):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="noYears" size="15" value="30" onKeyUp="clear_results(this.form)" onFocus="help(2,'Enter the number of years you are financing the home for.')" />
 </td>
 <td rowspan="5" width="125" align="center" valign="top">

 <div id="help_2" style="width: 120px; text-align: left; padding-top: 6px">
 </div>

 </td>
 </tr>

 <tr>
 <td>
 
 <a href="#viewrates"><strong>Mortgage's annual interest rate</strong></a> (%):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="payRate" size="15" value="7" onKeyUp="clear_results(this.form)" onFocus="help(2,'Enter the annual interest rate of the morgage. Enter 8% as simply 8 (do not include percent sign).')" />
 </td>
 </tr>

 <tr>
 <td>
 
 Discount points on purchase of home (%):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="points" size="15" value="1" onKeyUp="clear_results(this.form)" onFocus="help(2,'Discount points are paid up front in order to reduce the interest rate of your mortgage. Each point represents 1% of your mortgage balance. Enter 1% as simply 1 (do not include percent sign).')" />
 </td>
 </tr>

 <tr>
 <td>
 
 Origination fees (%):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="fees" size="15" value="1" onKeyUp="clear_results(this.form)" onFocus="help(2,'The percentage (often as high as 1% of the loan amount) that a lending institution charges for processing and originating a loan.')" />
 </td>
 </tr>

 <tr>
 <td>
 
 Other loan costs ($):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="loanCosts" size="15" value="0" onKeyUp="clear_results(this.form)" onFocus="help(2,'The total of other loan related costs, such as filing fees, appraiser fees, etc.')" />
 </td>
 </tr>

 <tr>
 <td>
 
 Mortgage Insurance (PMI %):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="pmi" size="15" value=".4" onKeyUp="clear_results(this.form)" onFocus="help(3,'If your downpayment is less than 20% of the value of the home you are buying, you may be required to pay mortgage insurance of somewhere between 0.2% and 0.5% of your principal balance each month. Enter .04% simply as .4 (do not include percent sign).')" />
 </td>
 <td rowspan="5" width="125" align="center" valign="top">

 <div id="help_3" style="width: 120px; text-align: left; padding-top: 6px">
 </div>

 </td>
 </tr>

 <tr>
 <td>
 
 Homeowner's insurance rate (%):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="homeIns" size="15" value=".5" onKeyUp="clear_results(this.form)" onFocus="help(3,'Your homeowner insurance rate -- entered as a percentage of the value of your home. Typical rate is 0.5%. Enter .5% simply as .5 (do not include percent sign).')" />
 </td>
 </tr>

 <tr>
 <td>
 
 Monthly association dues ($):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="assocDues" size="15" value="0" onKeyUp="clear_results(this.form)" onFocus="help(3,'If you are a member of a homeowner association, enter your monthly dues in this field.')" />
 </td>
 </tr>

 <tr>
 <td>
 
 Average monthly maintenance ($):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="maint" size="15" value="100" onKeyUp="clear_results(this.form)" onFocus="help(3,'Enter the amount you expect to spend on repairing and maintaining your home.')" />
 </td>
 </tr>

 <tr>
 <td>
 
 Annual property tax ($):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="propTax" size="15" value="2000" onKeyUp="clear_results(this.form)" onFocus="help(3,'Enter the amount of property taxes you expect to pay each year.')" />
 </td>
 </tr>

 <tr>
 <td>
 
 State plus Federal income tax rate (%):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="incomeTax" size="15" value="28" onKeyUp="clear_results(this.form)" onFocus="help(4,'Enter your combined state and federal income tax percentage rate. Enter 28% simply as 28 (do not include percent sign).')" />
 </td>
 <td rowspan="5" width="125" align="center" valign="top">

 <div id="help_4" style="width: 120px; text-align: left; padding-top: 6px">
 </div>

 </td>
 </tr>

 <tr>
 <td>
 
 Interest rate you expect to earn on savings (%):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="saveRate" size="15" value="7" onKeyUp="clear_results(this.form)" onFocus="help(4,'Enter the annual interest rate you expect to earn on the down payment and closing costs you will invest if you decide to rent instead of buy. Enter 7% simply as 7 (do not include percent sign).')" />
 </td>
 </tr>

 <tr>
 <td>
 
 Expected percentage your home will appreciate by each year (%):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="apprecRate" size="15" value="3" onKeyUp="clear_results(this.form)" onFocus="help(4,'Enter the percentage amount you expect your house to appreciate by each year. Enter 3% simply as 3 (do not include percent sign).')" />
 </td>
 </tr>

 <tr>
 <td>
 
 Number of years you will stay at this property:
 
 </td>
 <td align="center">
 <input type="number" step="any" name="stayYrs" size="15" value="5" onKeyUp="clear_results(this.form)" onFocus="help(4,'Enter the number of years you expect to rent or own the property you are considering. Typically, if you plan to move out of a home in less than 5 years from the date of purchase, you may be better off renting.')" />
 </td>
 </tr>

 <tr>
 <td>
 
 Realtor commission rate (%):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="realtorCom" size="15" value="7" onKeyUp="clear_results(this.form)" onFocus="help(4,'Enter the percentage of your home selling price that you expect to pay a real estate agent or broker when it is time to sell your home. Enter 7% simply as 7 (do not include percent sign).')" />
 </td>
 </tr>

 <tr>
 <td align="center" colspan="3">
 <input type="button" value="Compute" onClick="computeForm(this.form)"  class="table-btn"  />
 <input type="hidden" name="totRent" size="12" />
 <input type="hidden" name="moPmt" size="12" />
 <input type="hidden" name="accumInt" size="12" />
 <input type="hidden" name="closeCosts" size="12" />
 <input type="hidden" name="totPropTax" size="12" />
 <input type="hidden" name="totMaintCost" size="12" />
 <input type="hidden" name="totHomeInsCost" size="12" />
 <input type="hidden" name="totAssocDues" size="12" />
 <input type="hidden" name="pmiCost" size="12" />
 <input type="hidden" name="investPrin" size="12" />
 <input type="hidden" name="totTaxSave" size="12" />
 <input type="hidden" name="netGain" size="12" />
 <input type="hidden" name="sellCost" size="12" />
 <input type="hidden" name="totRentCosts" size="12" />
 <input type="hidden" name="totBuyCosts" size="12" />
 <input type="hidden" name="totRentBenefits" size="12" />
 <input type="hidden" name="totBuyBenefits" size="12" />
 <input type="hidden" name="h_summary" size="12" />
 </td>
 </tr>

 <tr>
 <td align="center">
 <strong>Result Descriptions</strong>
 </td>
 <td align="center">
 <strong>Result Fields</strong>
 </td>
 <td align="center">
 <strong>Explain/Instruct</strong>
 </td>
 </tr>

 <tr>
 <td>
 
 Total estimated cost of renting:
 
 </td>
 <td align="center">
 <input type="text" name="netRentCost" size="15" onFocus="help(5,'Total estimated cost of renting.')" />
 </td>
 <td rowspan="2" width="125" align="center" valign="top">

 <div id="help_5" style="width: 120px; text-align: left; padding-top: 6px">
 </div>

 </td>
 </tr>

 <tr>
 <td>
 
 Total estimated cost of buying:
 
 </td>
 <td align="center">
 <input type="text" name="netBuyCost" size="15" onFocus="help(5,'Total estimated cost of buying.')" />
 </td>
 </tr>

 <tr>
 <td colspan="3" id="summary">

 </td>
 </tr>

 <tr>
 <td align="center" colspan="2">
 <input type="button"  class="table-btn" value="Create Detailed Printer-Friendly Report" onClick="showReport(this.form)" />
 </td>
 <td align="center" colspan="1">
 <input type="button"  class="table-btn" value="Reset" onClick="reset_calc(this.form)">
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

 
 <h2>Should You Purchase a House?</h2>
<p> Owning a home is often called the American Dream, but are you really   ready to buy a house?  Purchasing a home is one of the biggest   investments you will make in your lifetime, and when you make this   purchase you want to purchase the right house at the right period of   time in your life.  There are a variety of different scenarios where   renting makes more sense than buying, and other scenarios where buying   will be the best decision for you and your family long term.  It is   important to consider a variety of different factors when you are toying   with the idea of viewing homes and making an offer on one.  Here is   your straightforward guide on Buying vs. Renting so that you can make an   informed and educated decision. </p>
  <h3> When Is the Time Right to Buy Versus Rent? </h3>
<p><img src="../img/sale-or-rent.jpg" width="630" height="417" alt="Buying vs Renting." /> </p>
<p>Buying a house makes quite a bit of sense for many individuals, but only   when the time is right.  The first subject you will need to study to   determine if it best to buy or rent is timing.  Individuals and families   go through several different stages, and not every stage is the right   time for an individual or a family to buy a residential property.    Timing is everything when it comes to home ownership, and there are red   flags to look out that will tell you that it is not your time to buy.    Here are some of the factors that you should sit down and consider   before you call a real estate agent, make an offer, or prequalify for a   loan:</p>
<h4>Your credit score is low</h4>
<p>
  Lenders all around the nation are offering low interest home mortgage   loans, but this does not mean that every borrower will receive low rates   and fair terms.  Everyone who is considering buying a home should run   their credit report, compare their reports with all 3 credit bureaus,   and fix errors before applying for any mortgage loans.  If any of your   reports show a score of 620 or less, you should press pause on your   mission to buy a home until you can raise your credit score. </p>
<p>
  Virtually all lenders see FICO scores under 620 as risky, and if you do   find a lender willing to extend a loan to you, you are more likely to be   dumped in the hands of a predatory lender and will be paying higher   rates over the life of the loan.  Take time to look at your credit   report in depth and look at more than just your score.  If you have   several late payments, it can disqualify you from getting approved for a   loan.  Make sure defaults, late payments, and other derogatory reports   do not get in your way of qualifying for a good home mortgage loan with   low rates and fair loan terms. </p>
<h4>Do you have job security?</h4>
<p>
  Are you working in the field of your dreams?  Many times, the field that   you work in will determine how stable your job is.  When you are   answering this question, you must be very honest with yourself.  Doing   research online and looking at the Bureau of Labor Statistics'   predictions of growth in your field can help you see if there will be   growth in the future. </p>
<p>
  If you are not sure how well your company is doing, you can use public   financial records and other information on the Internet to your   advantage to see if there will be layoffs or cutbacks in the near   future.  No one ever wants to lose their job or experience a pay cut,   but experiencing this when you own a home can be much more difficult.    You can be earning plenty of money and still not be in the position to   buy a residential property, so make sure that you know you have job   security first because unemployment compensation is not enough to cover   the average mortgage. </p>
<h4>Is relocation in the future?</h4>
<p>
  There are a variety of different reasons in your life that you might   relocate, and you cannot foresee or predict all of them.  If there is a   possibility that you would need to relocate for work, or you have been   talking about accepting a position across the country, it is best to   rent so that you are not bound to a property long term.  If you sell a   home when you need to relocate, you risk the chance of losing out in   potential profits due to time restrictions.  Be realistic about how long   you plan on staying in the area, and only commit to buying a property   if you really plan on staying for years. </p>
<h4>Do you have money for the down payment?</h4>
<p>
  Is the time right financially?  You may be making enough to cover your   mortgage, your housing expenses, and all of your other bills, but do you   have money that you can use for a down payment.  When the housing   market bubble burst in 2007, one of the biggest reasons why this   happened is because of the fact that lenders were not requiring down   payments and they were approving borrowers who could not actually afford   to own a home.  To prevent this from happening in the future, lenders   have gotten very strict about down payment requirements. </p>
<p>
  Ideally, borrowers should have 20% of the purchase price of the property   to put down, but lenders will approve you with less.  Make sure that   you speak with a mortgage broker to find out how much of a down payment   you would need to satisfy the lender's requirements.  In the past, there   were ways to apply for piggyback loans which would take a borrower's   down payment from 3 percent to 10 percent, but piggyback loans are gone.    When applying for a conventional loan, you will need between 5 and 20   percent down payment,, with 20 percent being best.  If you can come up   with the entire 20% down payment, you will not have to pay Private   Mortgage Insurance (PMI) which keeps your mortgage payments down. </p>
<h4>Will life events require more space?</h4>
<p>
  Are you planning on having a baby?  Do you have children who will be   leaving the nest in the near future?  Will you be responsible for caring   for your elderly parents when they cannot care for themselves?  These   are all timing factors you must keep in mind before you select a home.    You need enough space, and adding space to a home can be very expensive.    If your future is plagued with a lot of uncertainty, it may be best to   hold off buying until you know how many rooms you will really need for   children, guests, and elderly family members.  If, on the other hand,   you know how many rooms you will need and you can afford a home that   will grow with your family, buying could be a good option.</p>
<h3> Considering Purchase Price vs. Income and Rent vs. Purchase Price</h3>
<p>
  If you have determined that the timing is right to buy a home, you need   to move on and find out if your finances are right as well.  Household   income will pay a major role in whether or not you are actually ready to   cover your mortgage payments and other household expenses.  There are a   variety of different ratios that you can use to determine if you are   making enough money to become a homeowner, or if the rents are going to   be more realistic for you in the short term. </p>
<h4>The Front-end and Back-end Debt-to-Income Ratios</h4>
<p>
  You can use the two different ratios that the lenders use to determine   if your income is large enough to buy a home within a reasonable price   range.  Before you start applying for mortgage loans, you should take   the time to understand how debt-to-income ratios help the lenders   underwrite your loan application and determine if you can really afford   to own a home and pay for your other bills as well. </p>
<p>
  The front-end ratio is a ratio calculated between mortgage payments and   gross income, and most lenders only approve borrowers who will only use   28 percent or less of their gross monthly income towards mortgage   payments.  The back-end ratio is used to calculate the percentage of   gross monthly income that will go towards covering all debt payments.    Lenders generally only approve loans when the mortgage payments for the   purchase price of the property and all other debt payments when 36   percent or less of the household's income goes towards the total debt. </p>
<h4>Rental prices versus purchase price</h4>
<p>
  If you have a high debt ratio, you may be able to qualify for a home   mortgage loan.  If you use a home mortgage calculator to calculate the   mortgage payments based on a specific interest rate and a purchase   price, and you determine that your front-end ratio is extremely high,   you may want to look at the rental prices and how they compare to the   purchase prices of properties.  If you have a high front-end and   back-end debt-to-income ratio, this means that in the eyes of the lender   you cannot afford to feed yourself, pay your mortgage, and cover your   other bills. </p>
<p>
  In some cases, the cost of rent for similar properties are much lower   than the price that you would pay if you bought a home.  In the real   estate sector, comparing the purchase price and the rental price costs   is referred to as a price-rent ratio formulation.  To calculate the   price-rent ratio, you should take the median purchase price of a   property in your area and divide this median number to 12 times the   median rental price.  When you calculate this, you will have an   annualized ratio.  The smaller the number, the smaller the gap is   between rental prices and purchase costs.  When this gap is small, it   may be more attractive to buy rather than rent.  When the gap is larger,   it means that in the short term it is much more affordable to rent.</p>
<h3> Using Local Real Estate Market Conditions to Make Your Decision</h3>
<p>
  After you have determined front-end and back-end debt-to-income ratios   and price-rent ratios, you should then move on to considering the real   estate market conditions in the area.  If buying costs you less than   renting, that does not mean it is in your best interests if the price   trends in your area are going down.  On the other hand, the wisest   buyers will purchase homes when housing values are low and the trends   show that the prices are on the verge of rising and gaining momentum.    Assessing the trends in a suburban, rural, or metropolitan area that you   would like to live in is key to making the best decision on buying or   renting. </p>
<p>
  There are a variety of different pieces of data that you should look at   the assess the local market conditions.  Assessing the current   conditions and which way the market will move is extremely important.    If you use expert predictions of the real estate market, be aware of the   fact that the predictions are not guaranteed.  They are strictly to   give you an idea of how the trends can play out in the future, and you   should do your own homework and research the credibility of the "expert"   before you make a decision based on one prediction. </p>
<p>
  Two numbers that are extremely important are the listed sales price of   homes and the number of months homes have remained on the market.  If   you find that the sales prices of the homes in an area are going up and   that the months a home has been on the market are going down, this is a   sign that buyer demand is on the rise.  When buyer demand goes up, this   means that more buyers are finding financing, more buyers are confident   that the market is on the rebound, and more sellers are accepting   serious offers. </p>
<p>
  If the number of homes being listed on the market declines, the   inventory is low and there are more buyers competing for a smaller   number of homes.  In these scenarios, the average purchase price of   properties goes up and buyers cannot find the best bargains.  If the   trends show that inventory is going down and prices are going up, you   should strike while you can still afford to buy.  If the trends show   that homeowners are currently losing equity but new developments in the   area will make the area desirable in the future, you should buy while   sellers are willing to take low offers and then bank from rises in   equity when demand in the area is higher.  As you can see, there are a   variety of different marketing conditions to consider before you really   commit to making such a long-term investment.</p>
<h3> How to Prepare for Buying if Now Is Not the Time</h3>
<p>
  If you have discovered that you are not financially ready to buy a home,   do not be discouraged.  It is not too late to get your finances in   order and to start saving to become a homeowner.  You should never just   rush into buying a home because your dream is to be a homeowner.  In   fact, rushing into buying can hurt you financially and lead to   devastation when you have no other option but to foreclose on the   property.  You should never have to take out lines of credit or apply   for credit cards to live off of because you cannot cover your bills.    Here are some very valuable tips on preparing yourself financially for   buying a home: </p>
<h4>Run Your Credit Well in Advance</h4>
<p>
  You should not wait until the month before you plan on looking at   residential homes to run your credit.  Even worse, do not let lenders   run your credit until you know exactly what has been reported under you   social security number.  There could be delinquencies you did not know   about, and errors that will not look favorably on you as a borrower, and   knowing what is on your report in advance will help you avoid damaging   your reputation for creditworthiness. </p>
<p>
  You should run your credit report at least 6 months in advance so that   you can work on improving your FICO score and paying down your debts.    By doing this, you can work on lowering your debt-to-income ratio as you   raise your score.  This will help you qualify for the best mortgage   interest rates.  Some may recommend running credit reports a year in   advance so that you have plenty of time to fix errors with bureaus.  If   you are close to your balance on your credit cards, leave ample time to   pay down your debt so that the lenders are more likely to approve your   loan applications.</p>
<h4>Stop Borrowing Money</em> </p>
</h4>
<p>
  When you are committed to buying a home, you should stop borrowing money   the minute that you start saving for a home.  There is no denying the   fact that the home is going to be the largest single debt you have on   your credit report, and lenders must assess risk to avoid lending to the   wrong borrower.  To assess risk, lenders have very strict underwriting   guidelines and requirements, and looking like a good risk is pertinent.    When you have as little access to credit as possible, lenders will look   at you as less of a borrowing risk. </p>
<p>
  Avoid applying for any new credit cards, do not take out a new auto   loan, avoid taking out open-ended lines of credit from furniture stores,   and say no to the temptation to take that 0% financing same as cash   offer at the electronics store.  When you stop borrowing money, you are   less of a risk to lenders.  By being less of a risk, you can qualify to   buy a home with an average income instead of having to raise your salary   just to live the American Dream.</p>
<h3>Calculating the Expense of Owning a Home</em> </p>
</h3>
<p>
  Do you really know how much it costs to own a home?  When you rent a   home, you have a fixed monthly rental rate that you are obligated to pay   until the rental term ends.  You may have utilities, cable, internet,   and renter's insurance, but the majority of the cost is known upfront.    Calculating the expense of owning a home is not as obvious, and you   should be familiar with all of the costs of owning a home so that you   can prepare.  The amount of house you can afford in the future is based   on how much you have saved, how much you make, and your other financial   obligations.  If you are trying to get on the right path financially,   here are some of the expenses that you must cover when you buy a home: </p>
<ul class="arrow">
  <li>
    Homeowners insurance</li>
  <li> Property taxes </li>
  <li> Private mortgage insurance</li>
  <li> House maintenance </li>
  <li> Homeowners association fees </li>
  <li> Mortgage payments</li>
</ul>
<p>
  It is in your best interest to get preapproved for a mortgage loan well   before you want to buy so that you can see the price range you can   currently afford.  If this price range is not sufficient, you can easily   identify what you need to change so that you can qualify for a larger   loan and more of a home.  Make sure that you take the time to research   lenders before you apply for preapprovals.  By doing this, you will have   peace of mind in knowing that a reputable lender with fair terms and   conditions has qualified you. </p>
<h4>Saving for your downpayment</h4>
<p>
  If you put anything less than 20% down on a home that you purchase you   will be required to pay PMI, or Private Mortgage Insurance, until the   loan balance is 80% or less of the property's appraised value.  Private   mortgage insurance can be very expensive, and this is money that does   not go into the equity of the home that you purchase.  A downpayment is   almost always a requirement, but the higher your downpayment the better.    If you currently do not have a downpayment saved to purchase a home,   it is important to start saving as you rent.  Here are some tips on   saving for a downpayment to purchase a home: </p>
<ul class="arrow">
  <li>
      Create a monthly budget that allows you to put money away for the   downpayment.  Look at your monthly income, your expenses, and see what   you can cut back.  If you take notes of what you spend for an entire   month, you can identify where you are spending unnecessarily and where   you can save. </li>
  <li>Look for bills that can be reduced.  If you have premium channels,   get rid of them.  If you have special phone features, eliminate them.    Try to reduce auto insurance and renters insurance premiums. </li>
  <li> Look for a night job where you can earn extra money strictly to be   put away for saving.  You may be pressed for time, but if you save all   of the earnings you will save for a downpayment quickly.</li>
  <li>Set a realistic goal, know the time frame, and put a specified amount   of money from your paycheck into a separate savings that is for your   downpayment. </li>
  <li> Ask family for help if you are not too proud.  Many times, parents   and grandparents are happy to help with a downpayment if they can afford   to do so.  If your family knows you are saving, they may be more open   to giving you the gift of cash for Christmas and birthdays so that the   cash can be added to your downpayment fund.</li>
</ul>
<h3> How Much Home is Considered Affordable?</h3>
<p>
  Home affordability differs from region to region.  If you want to   calculate how much home you can afford, you need to consider not only   location, but also lender qualifications.  You need to keep the fact   that the lender that underwrites your loan will generally sell your loan   to a company who services the loan for the life of the loan, otherwise   known as the amortization period.  There are plenty of home loan   programs designed to make housing much more affordable in areas where   first-time buyers find affording a house to be difficult.  If you want   to calculate the rough estimate of the price of an affordable house   based on your income, you can use affordable housing calculators and   enter your information to get a general idea.  The information you will   need to enter into the calculator includes: </p>
<ul class="arrow">
  <li>
      Annual income</li>
  <li> Downpayment</li>
  <li> Annual rate</li>
  <li> Amortization period </li>
  <li> Annual taxes and insurance </li>
  <li> Annual maintenance </li>
</ul>
<p>
  Typically speaking, an expert financial planner will define an   affordable house as one with monthly payments that are less than a   quarter of of your after-tax monthly income.  This figure may vary based   on the interest rate you are charged and the loan period that you   choose.  It is best to deal with a mortgage broker or a loan processor   directly to get exact figures when you are trying to determine   affordability.</p>
<h3> Determining the Incentives for Buying a Home</h3>
<p>
  There are obvious short-term advantages to renting a home, but you also   need to know the short-term and long-term incentives for taking the leap   and buying a property.  When you file your taxes as a renter, you can   claim the renter's credit as the head of household, but this credit is   not even close to the tax incentives you receive for owning a home.    There is no denying that renting is cheaper in the first few years,   because the cost of buying a home initially is high.  But this added   cost will balance out, and most experts say that, on average, buying a   home is cheaper after 6 years.  This is primarily because of the fact   that you receive annual incentives.  Here are some of the advantages and   incentives that you must keep in mind when you are trying to determine   whether renting or buying is the best long-term choice:</p>
<h4>Government Incentives in the Form of Down Payment Assistance</em> </p>
</h4>
<p>
  In some areas, there are incentives in the form of down payment   assistance available to first-time home buyers.  The Federal Housing   Administration and state governments have special programs that keep   closing costs low and require buyers to pay small down payments so that   the average American can buy a home who may not have qualified   otherwise.</p>
<h4>Tax Incentives for Owning a Home</em> </p>
</h4>
<p>
  Did you know that you can qualify for tax credits if you own a home?  As   an eligible tax payer, you can take advantage of a tax credit for   buying a home and reduce your tax obligations for the year you purchase   your home.  You may be able to write off the down payment and other home   buying costs, which will entitle you to a large refund.  In addition to   this, you will enjoy the luxury of writing off the interest payments   that you make throughout the year every year on your taxes.  Some home   improved and even a portion of your mortgage payments can be written off   if you do business in your home.  The tax incentive for owning a home   adds up over the years, and the refund that you receive can go in your   savings or towards maintaining your home.</p>
<h4>Earning Equity in the Property</em> </p>
</h4>
<p>
  When you are renting a home, unless you have a special lease to own   contract, you are paying the landlord's mortgage in exchange for having a   roof over your head.  None of the money you pay towards a rental home   will be available to you later down the line.  You are simply paying   into the property owner's equity so that you do not have to deal with   the pitfalls of owning property. </p>
<p>
  If you purchase a residential home, every time you pay principal and   interest payments towards your mortgage loan, you are earning a small   amount of equity.  This equity builds over time, and you have the right   to tap into this equity if you ever need to.  Most of time, it is best   not to touch your home's equity, but if you have an investment   opportunity that will earn you money, equity is great thing to have   available.  You can also use this equity during times of financial   hardship by refinancing your home, but this should always be a last   resort. </p>
<h4>Enjoying Capital Gains without Having to Worry about Rising Rents</h4>
<p>
  When property values rise, property owners enjoy capital gains.  In a   perfect world, property owners would sit back and watch the price of   their property rise as they pay down the mortgage.  This is not always   what happens, but if you buy at the right time, the value of the home   you buy will go up dramatically over time.  If you buy a home at   $200,000 and the value rises to $250,000 over a period of 3 years, you   are enjoying capital gains of $50,000 over a span of just 3 years.  If   you were to sell the property at its new value, you would be pocketing   the gains and using this for a new investment. </p>
<p>
  While there is no risk in losing money when values decline if you choose   to rent, if you do not take on the risk you will also never reap the   benefits of earning capital gains over time.  You also need to recognize   the fact that rental rates do rise over time.  As property values rise,   landlords have the right to raise rents to follow the housing market   trends. </p>
<p>
  If you survey rental prices over a span of 5 years, you will see that   rates do rise if values are rising, and you can avoid falling victim to   rising rental rates if you decide to be a buyer instead of a long-term   renter.  This is a factor that many people overlook entirely when   assessing the risk on both sides.  If you apply for a fixed loan and you   buy a property, you have peace of mind in knowing your monthly payments   will always remain fixed, unless you qualify for a lower interest loan   where your payments can go down. </p>
<h4>Do What you Want to Your Home</h4>
<p>
  If you rent a home for a long period of time, it may feel like your home   but ultimately your landlord owns it.  If you feel like adding a pool,   adding a bedroom, changing the flooring, or updating the property, you   must first get approval from the property owner.  Even after you get   approval, all of the modifications that you make are benefiting the   landlord and not yourself.  The additions are adding value to the   property and making the property more appealing to other renters in a   competitive market. </p>
<p>
  If you own a home, you can make the modifications that you want to make,   and these upgrades will benefit you and no one else.  If you improve   curb appeal, not only will your home look nicer, it may have a higher   appraised value.  If you add a pool, not only can you entertain and   throw pool parties, you can increase comparable values and make your   home more valuable than others in your neighborhood.  The improvement   you pay for will pay for itself in the long run if you ever want to sell   the home.  If you do not want to sell the home, the improvements you   make make the value of your home grow so that the property in the   neighborhood goes for more.</p>
<h3> Knowing the Risks Associated with Buying a Home</h3>
<p>
  Buying a home, even when you are financially prepared, can be a risky   venture.  While the risk pays off more often than not, you need to   accept and acknowledge the fact that buying is definitely more risky   than renting.  If you are not ready to take on the risks associated with   buying a home, you may want to continue to rent homes until the risks   are not as scary to you.  Keep in mind that even conservative   individuals can buy homes and feel comfortable buying.  Here are some of   the risks you should be aware of:</p>
<h4>Buying a Home with Defects</em> </p>
</h4>
<p>
  A home must pass a home inspection before you can close on a loan, but   sometime the minor and major defects are overlooked.  There is nothing   worse than buying a home and discovering the home needs a new foundation   or roof just months later.  You need to be aware of the fact that you   are responsible for maintenance and the expensive repairs as soon as you   receive the keys.  As a renter, the landlord is required by law to make   the repairs for you so that the home is safe and livable.  In this   sense, buying a home is a big risk.</p>
<h4>Limited Lifestyle Flexibility </h4>
<p>
  If your lifestyle changes, you need more space, or you need to relocate,   there is not much flexibility when you buy.  You can add a room if the   code permits this change, but the cost will be high.  You cannot pick up   your home and move it to a new community or a new state to change jobs   or shorten your commute.  If you need flexibility for relocating or life   events, you should continue to rent. </p>
<h4>Lenders Want their Money Even if You Lose Your Job</h4>
<p>
  Your lender and your landlord will both want the money they are owed if   you are disabled or you lose your job.  It is much more difficult to   cover a mortgage payment when you do not have a job than it is to cover a   rent payment.  If you break your lease, it may affect you, but failing   to fulfill your obligations on a mortgage can damage your credit for   years and lead to foreclosure and bankruptcy.  If you are renting, you   only need to fulfill the rest of your lease, which is a period of a few   months, but your mortgage can be a 30 year obligation.  If you do not   have a stable job, renting is much more practical.</p>
<h4>The Risk of Catastrophic Loss and the Cost to Recoup</em> </p>
</h4>
<p>
  You buy home insurance as a homeowner and you buy renter's insurance as a   tenant.  While insurance is designed to help you in times of loss,   insurance does not always cover everything.  If you own a property and   an earthquake strikes, you must find a way to cover your high Earthquake   deductible or to pay for all of the repairs if you do not have a   specialty earthquake insurance plan.  As a tenant, the property owner   must allow you to leave your lease if a property is damaged and the   landlord cannot fix it.  You are not liable for the repairs, unless you   were negligent for the damage yourself. </p>
<p>
  As a property owner, you must be resourceful and find ways to pay for   damage that is not paid for by your insurance portfolio.  Building a   good insurance portfolio is a start to reducing risk, but there will   always be scenarios where the insurance company will not pay for all of   the damages.  Be sure you have money set aside to pay for repairs, and   always have a game plan to mitigate damage in the event of a   catastrophic loss.</p>
<h4>Owning a House Can be Stressful</em> </p>
</h4>
<p>
  If you are easily stressed, you will find that owning a home tends to   place more stress on you than being a tenant.  You will find that you   have more financial obligations, and that fulfilling the obligations can   be more difficult.  If you are not ready for the stress associated with   being a homeowner, you may want to continue renting until you can find a   coping mechanism.  Debt is something that will not go away for a long   time.  Unless you know you will hit the lottery or you can cover your   mortgage without any difficulty in the future, there will always be some   stress. </p>
<p>
  There is much more to buying a home than just finding your dream home.    Before you start tempting yourself to buy, sit down with your spouse or   other half and think about all of the most important factors.  There are   beautiful rental homes and there are beautiful new constructions and   resale properties.  No matter how nice a home looks, you need to be sure   that you are financially ready, emotionally ready, and that your   liefstyle is ready for this big leap that you will be making.  Home   ownership has a lot of advantages, but there are risks you cannot   ignore.  If you find that you are not ready, set a goal and prepare for   the buying process in the future.  Buying is not for everyone, and not   everyone benefits from renting either.  Jot down the pros and the cons,   and make the best decision for your own unique situation. </p>

 
 
                
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

