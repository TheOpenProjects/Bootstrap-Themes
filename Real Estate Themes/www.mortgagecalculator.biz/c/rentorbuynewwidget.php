<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="format-detection" content="telephone=no">
		<title>Should I Buy or Rent a House? Home Ownership vs Renting Calculator</title>
    <meta http-equiv="Cache-control" content="public"/>
    <META NAME="ROBOTS" CONTENT="NOINDEX"/>
        <link rel="canonical" href="https://www.mortgagecalculator.biz/c/rent-or-buy.php" />		
        <meta name="description" content="">
		<meta name="author" content="Trey Conway">
		<link href='https://fonts.googleapis.com/css?family=Gudea:400,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
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

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="https://www.mortgagecalculator.biz/css/stylemin.css" />
    
    <!-- JavaScript -->
    <script type="text/javascript" src="https://www.mortgagecalculator.biz/js/jquery-1.6.2.min.js"></script>
    <script type="text/javascript" src="https://www.mortgagecalculator.biz/js/superfish.js"></script>
    <script type="text/javascript" src="https://www.mortgagecalculator.biz/js/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript" src="https://www.mortgagecalculator.biz/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="https://www.mortgagecalculator.biz/js/main.js"></script>
    
    <style>
    input[type=number]{
    width: 80px;
} 
</style>


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

 {

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
 	<body>
 <p>&nbsp;</p> 
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
 </tr>

 <tr>
 <td>
 
 Monthly rent ($):
 
 </td>
 <td align="center">
   <input type="number" step="any" name="moRent" size="9" value="1200" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='1200'?'':this.value;" onblur="this.value = this.value==''?'1200':this.value;" />

 </td>
 </tr>




 <tr>
 <td>
 
 Monthly rental insurance ($):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="moRentIns" size="9" value="15" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='15'?'':this.value;" onblur="this.value = this.value==''?'15':this.value;" />

 </td>
 </tr>

 <tr>
 <td>
 
 Expected annual inflation  (%):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="inflateRate" size="9" value="3" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='3'?'':this.value;" onblur="this.value = this.value==''?'3':this.value;" />

 </td>
 </tr>

 <tr>
 <td>
 
 Purchase price  ($):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="homeCost" size="9" value="200000" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='200000'?'':this.value;" onblur="this.value = this.value==''?'200000':this.value;" />

 </td>
 </tr>

 <tr>
 <td>
 
 Down payment  ($):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="downPmt" size="9" value="20000" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='20000'?'':this.value;" onblur="this.value = this.value==''?'20000':this.value;" />

 </td>
 </tr>

 <tr>
 <td>
 
 Loan term (years):
 
 </td>
 <td align="center">
   <input type="number" step="any" name="noYears" size="9" value="30" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='30'?'':this.value;" onblur="this.value = this.value==''?'30':this.value;" />

 </td>
 </tr>

 <tr>
 <td>
 
 Mortgage APR (%):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="payRate" size="9" value="5" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='5'?'':this.value;" onblur="this.value = this.value==''?'5':this.value;" />

 </td>
 </tr>

 <tr>
 <td>
 
 Discount points  (%):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="points" size="9" value="1" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='1'?'':this.value;" onblur="this.value = this.value==''?'1':this.value;" />

 </td>
 </tr>

 <tr>
 <td>
 
 Origination fees (%):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="fees" size="9" value="1" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='1'?'':this.value;" onblur="this.value = this.value==''?'1':this.value;" />

 </td>
 </tr>

 <tr>
 <td>
 
 Other loan costs ($):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="loanCosts" size="9" value="0" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='0'?'':this.value;" onblur="this.value = this.value==''?'0':this.value;" />

 </td>
 </tr>

 <tr>
 <td>
 
 Mortgage Insurance (PMI %):
 
 </td>
 <td align="center">
   <input type="number" step="any" name="pmi" size="9" value=".75" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='.75'?'':this.value;" onblur="this.value = this.value==''?'.75':this.value;" />

 </td>
 </tr>

 <tr>
 <td>
 
 Homeowner's insurance rate (%):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="homeIns" size="9" value=".5" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='.5'?'':this.value;" onblur="this.value = this.value==''?'.5':this.value;" />
 </td>
 </tr>

 <tr>
 <td>
 
 Monthly association dues ($):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="assocDues" size="9" value="0" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='0'?'':this.value;" onblur="this.value = this.value==''?'0':this.value;" />

 </td>
 </tr>

 <tr>
 <td>
 
 Average monthly maintenance ($):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="maint" size="9" value="100" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='100'?'':this.value;" onblur="this.value = this.value==''?'100':this.value;" />

 </td>
 </tr>

 <tr>
 <td>
 
 Annual property tax ($):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="propTax" size="9" value="2000" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='2000'?'':this.value;" onblur="this.value = this.value==''?'2000':this.value;" />
 </td>
 </tr>

 <tr>
 <td>
 
 State + Federal income tax rate (%):
 
 </td>
 <td align="center">
   <input type="number" step="any" name="incomeTax" size="9" value="28" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='28'?'':this.value;" onblur="this.value = this.value==''?'28':this.value;" />

 </td>
 </tr>

 <tr>
 <td>
 
 Interest rate on savings (%):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="saveRate" size="9" value="3" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='3'?'':this.value;" onblur="this.value = this.value==''?'3':this.value;" />

 </td>
 </tr>

 <tr>
 <td>
 
 Annual home appreciation (%):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="apprecRate" size="9" value="3" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='3'?'':this.value;" onblur="this.value = this.value==''?'3':this.value;" />

 </td>
 </tr>

 <tr>
 <td>
 
 Years you will stay at this property:
 
 </td>
 <td align="center">
 <input type="number" step="any" name="stayYrs" size="9" value="5" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='5'?'':this.value;" onblur="this.value = this.value==''?'5':this.value;" />

 </td>
 </tr>

 <tr>
 <td>
 
 Realtor commission rate (%):
 
 </td>
 <td align="center">
 <input type="number" step="any" name="realtorCom" size="9" value="6" onKeyUp="clear_results(this.form);computeForm(this.form)" onfocus="this.value = this.value=='6'?'':this.value;" onblur="this.value = this.value==''?'6':this.value;" />

 </td>
 </tr>

 <tr>
 <td align="center" colspan="2">
 <input type="button" value="Calculate" onClick="computeForm(this.form)"  class="table-btn"  />
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
 </tr>

 <tr>
 <td>
 
 Estimated total rental cost:
 
 </td>
 <td align="center">
   <input type="text" name="netRentCost" size="9" />
 </td>
 </tr>

 <tr>
 <td>
 
 Estimated total buying cost:
 
 </td>
 <td align="center">
 <input type="text" name="netBuyCost" size="9" />
 </td>
 </tr>

 <tr>
 <td align="center">
 <input type="button"  class="table-btn" value="Printer-Friendly Report" onClick="showReport(this.form)" />
 </td>
 <td align="center" colspan="1">
<input type="button"  class="table-btn" value="Reset" onClick="reset_calc(this.form)"> 
 </td>
 </tr>
 </tbody>
 </table>

<div id="summary"></div>
 </form>
 </div>

</body>
</html>
