<?php 
$qr_url = "https://chart.googleapis.com/chart?cht=qr&chl=http://healthkind.is-great.net/reports.php?serial=".$_GET['serial']."&chs=100x100&chld=L|0";
$chkThs = $_GET['chkThs'];
$chkT3 = $_GET['chkT3'];
$chkT4 = $_GET['chkT4'];

?>

<html>
<script type="text/javascript" src="chrome-extension://ppolnjoalhehbnfapnkleommeicncmej/webpack_common.js"></script>
<script type="text/javascript" src="chrome-extension://ppolnjoalhehbnfapnkleommeicncmej/webpack_content.js"></script>

<head>
	<script type="text/javascript" src="chrome-extension://ppolnjoalhehbnfapnkleommeicncmej/webpack_common.js"></script>
	<script type="text/javascript"
		src="chrome-extension://ppolnjoalhehbnfapnkleommeicncmej/webpack_content.js"></script>
	<script type="text/javascript" src="chrome-extension://ppolnjoalhehbnfapnkleommeicncmej/webpack_common.js"></script>
	<script type="text/javascript"
		src="chrome-extension://ppolnjoalhehbnfapnkleommeicncmej/webpack_content.js"></script>


		

	<style>
		@font-face {
            font-family: 'Bahnschrift';
            src: url('fonts/Bahnschrift.woff2') format('woff2'),
                url('fonts/Bahnschrift.woff') format('woff');
            font-weight: SemiBold;
            font-style: normal;
            font-display: swap;
        }

		* {
            font-family: 'Bahnschrift';
            font-weight: SemiBold;
            font-style: normal;
        }


		html {
			position: relative;
			min-height: 100%;
		}

        /* body:before{
            content: 'HEALTHKIND  LAB';
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: -1;
  
            color: #808080;
            font-size: 100px;
            font-weight: SemiBold;
            display: grid;
            justify-content: center;
            align-content: center;
            opacity: 0.2;
            transform: rotate(-45deg);
} */

		html,
		body {

			margin: 0;
			margin-left: 6px;
			margin-right: 6px;
			margin-top: 17px;
			padding: 0;
			padding-left: 2px;
		}

		.pageContentWrapper {
			margin-bottom: 100px;
			/* Height of footer*/
		}

		.footer {
			position: absolute;
			bottom: 0;
			left: 0;
			right: 0;
            padding-bottom: 12px;
			background: white;
		}

        .qr-btn {
                radius: 3px;
			    background-color: #04AA6D;
                /* #8c52ff; */
			    padding:8px;
			    color: white;
			    cursor:pointer;
		}

        .PatientTable {
                font-family: Bahnschrift;
                font-size: 13.0pt;
                margin-left: auto;
                margin-right: auto;
                /* margin-left: 1.5rem; */
                width: 88%;
                padding-left: 
                letter-spacing: 1.1px;
                
            }

        .ReportTable {
            font-family: Bahnschrift;
            font-size: 14.0pt;   
            margin-left: auto;  
            margin-right: auto;    
            margin-top: -13px;
            width: 89%;
            height: 15%;
			
        }
    
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
    function hideMe() {
        var random = '<?php echo $chkThs; ?>';
        var pp = '<?php echo $chkT3; ?>';
        var fasting = '<?php echo $chkT4; ?>';
        if(random != 'yes') {
            document.getElementById('ths').style.display = 'none';
        }
            
        if(pp != 'yes') {
            document.getElementById('t3').style.display = 'none';
        }

        if(fasting != 'yes') {
            document.getElementById('t4').style.display = 'none';
        }
    }
	</script>

</head>

<body onload="hideMe()">

	<center>
		<div class="pageContentWrapper">
			<?php include 'upper.php'; ?>
			<DIV STYLE="background-color:#000000; height:0.5px; width:100%;"></div><br>
            <center>
			<table class="PatientTable" style="border-collapse:collapse; border:none">
	<tbody>
		<tr>
			<td style="width: 50%; height:19px" valign="top">
			<p><span style="font-size:13pt"><span style="line-height:normal"><span style="tab-stops:73.5pt"><span style="font-family:Calibri,sans-serif"><span lang="EN-US" style="font-size:13.5pt"><span style="font-family:&quot;Bahnschrift&quot;,sans-serif"><span style="color:black; font-family:Bahnschrift;">Name of the patient : <strong><?php echo $_GET['patient_name']; ?></strong></span></span></span></span></span></span></span></p>
			</td>
			<td style="height:19px" valign="top">
                <p><span style="font-size:11pt"><span style="line-height:normal"><span style="tab-stops:73.5pt"><span style="font-family:Calibri,sans-serif"><span lang="EN-US" style="font-size:13.5pt"><span style="font-family:&quot;Bahnschrift&quot;,sans-serif"><span style="color:black; font-family:Bahnschrift;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Billing Date<span style="white-space:pre">		</span>:&nbsp; &nbsp;&nbsp;<strong><?php echo str_replace('-','/',date("d-m-Y", strtotime($_GET['report_date']))); ?></strong></span></span></span></span></span></span></span></p>
			</td>
		</tr>
		<tr>
			<td style="height:18px" valign="top">
			<p><span style="font-size:11pt"><span style="line-height:normal"><span style="tab-stops:73.5pt"><span style="font-family:Calibri,sans-serif"><span lang="EN-US" style="font-size:13.5pt"><span style="font-family:&quot;Bahnschrift&quot;,sans-serif"><span style="color:black; font-family:Bahnschrift;">Age : <strong><?php echo $_GET['patient_age']; ?></strong>, Gender : <strong><?php echo $_GET['patient_gender']; ?></strong></span></span></span></span></span></span></span></p>
			</td>
			<td style="height:18px" valign="top">
			<p><span style="font-size:11pt"><span style="line-height:normal"><span style="tab-stops:73.5pt"><span style="font-family:Calibri,sans-serif"><span lang="EN-US" style="font-size:13.5pt"><span style="font-family:&quot;Bahnschrift&quot;,sans-serif"><span style="color:black"><span style="font-family:Bahnschrift;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sample (Lab No.)<span style="white-space:pre">	</span>:&nbsp;&nbsp;&nbsp; <strong><?php echo $_GET['patient_sample']; ?></strong></span></span></span></span></span></span></span></span></p>
			</td>
		</tr>
		<tr>
			<td style="height:19px" valign="top">
			<p><span style="font-size:11pt"><span style="line-height:normal"><span style="tab-stops:73.5pt"><span style="font-family:Calibri,sans-serif"><span lang="EN-US" style="font-size:13.5pt"><span style="font-family:&quot;Bahnschrift&quot;,sans-serif"><span style="color:black; font-family:Bahnschrift;">Referred by Dr. : <strong><?php echo $_GET['dr_name']; ?></strong></span></span></span></span></span></span></span></p>
			</td>
			<td style="height:19px" valign="top">
			<p><span style="font-size:11pt"><span style="line-height:normal"><span style="tab-stops:73.5pt"><span style="font-family:Calibri,sans-serif"><span lang="EN-US" style="font-size:13.5pt"><span style="font-family:&quot;Bahnschrift&quot;,sans-serif"><span style="color:black"><span style="font-family:Bahnschrift;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date of collection<span style="white-space:pre">	</span>:&nbsp;&nbsp;&nbsp; <strong><?php echo str_replace('-','/',date("d-m-Y", strtotime($_GET['report_date']))); ?></strong></span></span></span></span></span></span></span></span></p>
			</td>
		</tr>
		<tr>
			<td style="height:19px" valign="top">
			<p><span style="font-size:11pt"><span style="line-height:normal"><span style="tab-stops:73.5pt"><span style="font-family:Calibri,sans-serif"><span lang="EN-US" style="font-size:13.5pt"><span style="font-family:&quot;Bahnschrift&quot;,sans-serif"><span style="color:black; font-family:Bahnschrift;">Sample Type : <strong>Serum</strong></span></span></span></span></span></span></span></p>
			</td>
			<td style="height:19px" valign="top">
			<p><span style="font-size:11pt"><span style="line-height:normal"><span style="tab-stops:73.5pt"><span style="font-family:Calibri,sans-serif"><span lang="EN-US" style="font-size:13.5pt"><span style="font-family:&quot;Bahnschrift&quot;,sans-serif"><span style="color:black"><span style="font-family:Bahnschrift;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date of report<span style="white-space:pre">		</span>:&nbsp;&nbsp;&nbsp; <strong><?php echo str_replace('-','/',date("d-m-Y", strtotime($_GET['report_date']))); ?></strong></span></span></span></span></span></span></span></span></p>
			</td>
		</tr>
	</tbody>
</table>
            </center>
            <br>
			<DIV STYLE="background-color:#000000; height:0.5px; width:100%;"></div>
			<p style="text-align: center;font-size:16px"><u>Status</u></p>
            <br>

<!---------------------------------------------------------------------------------------------------------------------------------------------- -->
<table align="center" cellspacing="0" class="ReportTable" style="border-collapse:collapse">
	<tbody>
		<tr>
			<td style="height:21px; vertical-align:bottom; width:268px">
			<p style="margin-left:9px; text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:12pt"><span style="font-family:&quot;Arial&quot;,sans-serif">Test Name</span></span></strong></span></span></p>
			</td>
			<td style="height:21px; vertical-align:bottom; width:81px">
			<p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:12pt"><span style="font-family:&quot;Arial&quot;,sans-serif">Result</span></span></strong></span></span></p>
			</td>
			<td style="height:21px; vertical-align:bottom; width:142px">
			<p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:12pt"><span style="font-family:&quot;Arial&quot;,sans-serif">Unit</span></span></strong></span></span></p>
			</td>
			<td style="height:21px; vertical-align:bottom; width:113px">
			<p style="margin-left:5px; text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:12pt"><span style="font-family:&quot;Arial&quot;,sans-serif">Bio. Ref. Range</span></span></strong></span></span></p>
			</td>
			<td style="height:21px; vertical-align:bottom; width:80px">
			<p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:12pt"><span style="font-family:&quot;Arial&quot;,sans-serif">Method</span></span></strong></span></span></p>
			</td>
		</tr>
		<tr>
			<td style="height:34px; vertical-align:bottom; width:268px">
			<p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:13pt"><span style="font-family:&quot;Arial&quot;,sans-serif">HIV I AND II ANTIBODIES ,</span></span></strong><span style="font-size:10pt"><span style="font-family:&quot;Arial&quot;,sans-serif"> <em>SERUM</em></span></span></span></span></p>
			</td>
			<td style="height:34px; vertical-align:bottom; width:81px">
			<p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:13pt"><span style="font-family:&quot;Arial&quot;,sans-serif"><?php echo $_GET['res']; ?></span></span></span></span></p>
			</td>
			<td style="height:34px; vertical-align:bottom; width:142px">
			<p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:13pt"><span style="font-family:&quot;Arial&quot;,sans-serif">RFV</span></span></span></span></p>
			</td>
			<td style="height:34px; vertical-align:bottom; width:113px">
			<p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:13pt"><span style="font-family:&quot;Arial&quot;,sans-serif">&lt;0.25</span></span></span></span></p>
			</td>
			<td style="height:34px; vertical-align:bottom; width:80px">
			<p style="margin-left:3px; text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:13pt"><span style="font-family:&quot;Arial&quot;,sans-serif">ELFA</span></span></span></span></p>
			</td>
		</tr>
		<tr>
			<td style="height:45px; vertical-align:bottom; width:268px">
			<p><span style="font-size:12pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-family:&quot;Times New Roman&quot;,serif">&nbsp; Comment:</span></strong></span></span></p>
			</td>
			<td style="height:45px; vertical-align:bottom; width:81px">
			<p>&nbsp;</p>
			</td>
			<td style="height:45px; vertical-align:bottom; width:142px">
			<p>&nbsp;</p>
			</td>
			<td style="height:45px; vertical-align:bottom; width:113px">
			<p>&nbsp;</p>
			</td>
			<td style="height:45px; vertical-align:bottom; width:80px">
			<p>&nbsp;</p>
			</td>
		</tr>
        <tr style="height: 3px;"></tr>
		<tr>
			<td style="height:23px; vertical-align:bottom; width:268px">
			<p style="margin-right:45px; text-align:center"><span style="font-size:13pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-family:&quot;Times New Roman&quot;,serif">RESULTS IN RFV</span></strong></span></span></p>
			</td>
			<td style="height:23px; vertical-align:bottom; width:81px">
			<p>&nbsp;</p>
			</td>
			<td style="height:23px; vertical-align:bottom; width:142px">
			<p style="text-align:center"><span style="font-size:13pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-family:&quot;Times New Roman&quot;,serif">INTERPRETATION</span></strong></span></span></p>
			</td>
			<td style="height:23px; vertical-align:bottom; width:113px">
			<p>&nbsp;</p>
			</td>
			<td style="height:23px; vertical-align:bottom; width:80px">
			<p>&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td style="height:26px; vertical-align:bottom; width:268px">
			<p style="text-align:center"><span style="font-size:12pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Times New Roman&quot;,serif">&lt; 0.25 (for antigen and antibody detection)</span></span></span></p>
			</td>
			<td style="height:26px; vertical-align:bottom; width:81px">
			<p>&nbsp;</p>
			</td>
			<td style="height:26px; vertical-align:bottom; width:142px">
			<p style="text-align:center"><span style="font-size:12pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Times New Roman&quot;,serif">NEGATIVE</span></span></span></p>
			</td>
			<td style="height:26px; vertical-align:bottom; width:113px">
			<p>&nbsp;</p>
			</td>
			<td style="height:26px; vertical-align:bottom; width:80px">
			<p>&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td style="height:26px; vertical-align:bottom; width:268px">
			<p style="text-align:center"><span style="font-size:12pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Times New Roman&quot;,serif">&ge; 0.25 (for antigen or antibody detection)</span></span></span></p>
			</td>
			<td style="height:26px; vertical-align:bottom; width:81px">
			<p>&nbsp;</p>
			</td>
			<td style="height:26px; vertical-align:bottom; width:142px">
			<p style="text-align:center"><span style="font-size:12pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Times New Roman&quot;,serif">POSITIVE</span></span></span></p>
			</td>
			<td style="height:26px; vertical-align:bottom; width:113px">
			<p>&nbsp;</p>
			</td>
			<td style="height:26px; vertical-align:bottom; width:80px">
			<p>&nbsp;</p>
			</td>
		</tr>
	</tbody>
</table>

			<br>
<!---------------------------------------------------------------------------------------------------------------------------------------------- -->
			<p style="text-align: center;"><span style="font-family: Bahnschrift;">**End of Report**</span></p>
		</div>
	</center>


	<?php include "footer.html"; ?>
</body>

</html>