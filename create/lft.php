
<?php 
$qr_url = "https://chart.googleapis.com/chart?cht=qr&chl=http://healthkind.is-great.net/reports.php?serial=".$_GET['serial']."&chs=100x100&chld=L|0";


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
            margin-left: 4rem;
            margin-top: 1.2rem;
            width: 89%;
            height: 37%;
        }
    
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body onload="generateQRCode()">
<script type="text/javascript">
			/* JS comes here */
            
            function generateQRCode() {
                var qr;
			(function() {
                    qr = new QRious({
                    element: document.getElementById('qr-code'),
                    size: 100,
                    value: 'https://studytonight.com'
                });
            })();

                var qrtext = document.getElementById("qr_serial").value;
                alert(qrtext);
                var url = "http://healthkind.is-great.net/reports.php?serial=" + qrtext;
                
                qr.set({
                    foreground: 'black',
                    size: 100,
                    value: url
                });

            }
		</script>
	<center>
		<div class="pageContentWrapper">
			<?php include 'upper.php'; ?>
			<div style="background-color:#000000; height:0.5px; width:100%;"></div><br>
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
            <p><b><u><span lang="EN-US" style="font-size:14.0pt"><span style="line-height:107%"><span style="font-family:&quot;Bahnschrift SemiBold&quot;,sans-serif"><span style="letter-spacing: 1.2px; color:black">LIVER FUNCTION TEST (LFT)</span></span></span></span></u></b></p>
            </center>
			<div style="background-color:#000000; height:0.5px; width:100%;"></div>
			<p style="text-align: center;font-size:16px"><u>Status</u></p>
<!---------------------------------------------------------------------------------------------------------------------------------------------->
<table align="center" cellspacing="0" class="ReportTable" style="border-collapse:collapse; border:none;">
	<tbody>
		<tr>
			<td style="height:39px; vertical-align:top;">
			<p style="text-align:center"><span style="font-size:12pt"><u>Test</u></span></p>
			</td>
			<td style="height:39px; vertical-align:top;">
			<p style="text-align:center"><span style="font-size:12pt"><u>Result</u></span></p>
			</td>
			<td style="height:39px; vertical-align:top;">
			<p style="text-align:center"><span style="font-size:12pt"><u>Biological Ref. Interval<</u></span></p>
			</td>
			<td style="height:39px; vertical-align:top;">
			<p style="text-align:center"><span style="font-size:12pt"><u>Method</u></span></p>
			</td>
		</tr>
		<tr>
			<td style="height:37px; vertical-align:top;">
			<p><span style="font-size:13pt">SERUM BILIRUBIN (TOTAL)</span></p>
			</td>
			<td style="height:37px; vertical-align:top; ">
			<p style="text-align:center"><span style="font-size:13pt"><?php echo $_GET['sbt']; ?> mg / dL</span></p>
			</td>
			<td style="height:37px; vertical-align:top; ">
			<p style="text-align:center"><span style="font-size:13pt">0.2 mg / dL &ndash; 1.2 mg / dL</span></p>
			</td>
			<td style="height:37px; vertical-align:top; ">
			<p style="text-align:center"><span style="font-size:13pt">Diazo Method</span></p>
			</td>
		</tr>
		<tr>
			<td style="height:37px; vertical-align:top;">
			<p><span style="font-size:13pt">SERUM BILIRUBIN (DIRECT)</span></p>
			</td>
			<td style="height:37px; vertical-align:top;">
			<p style="text-align:center"><span style="font-size:13pt"><?php echo $_GET['sbd']; ?> mg/dL</span></p>
			</td>
			<td style="height:37px; vertical-align:top; ">
			<p style="text-align:center"><span style="font-size:13pt">0.1 mg / dL &ndash; 0.4 mg / dL</span></p>
			</td>
			<td style="height:37px; vertical-align:top;">
			<p style="text-align:center"><span style="font-size:13pt">Diazo Method</span></p>
			</td>
		</tr>
		<tr>
			<td style="height:37px; vertical-align:top;">
			<p><span style="font-size:13pt">SERUM BILIRUBIN (INDIRECT)</span></p>
			</td>
			<td style="height:37px; vertical-align:top; ">
			<p style="text-align:center"><span style="font-size:13pt"><?php echo $_GET['sbi']; ?> mg/dL</span></p>
			</td>
			<td style="height:37px; vertical-align:top;">
			<p style="text-align:center"><span style="font-size:13pt">0.1 mg / dL &ndash; 0.8 mg / d</span></p>
			</td>
			<td style="height:37px; vertical-align:top; ">
			<p style="text-align:center">&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td style="height:37px; vertical-align:top; ">
			<p><span style="font-size:13pt">SGOT</span></p>
			</td>
			<td style="height:37px; vertical-align:top; ">
			<p style="text-align:center"><span style="font-size:13pt"><?php echo $_GET['sgot']; ?> U/L</span></span></p>
			</td>
			<td style="height:37px; vertical-align:top; ">
			<p style="text-align:center"><span style="font-size:13pt">(8-40) U/L</span></p>
			</td>
			<td style="height:37px; vertical-align:top; ">
			<p style="text-align:center"><span style="font-size:13pt">IFCC GEN-2PnP</span></span></p>
			</td>
		</tr>
		<tr>
			<td style="height:37px; vertical-align:top; ">
			<p><span style="font-size:13pt">SGPT</span></p>
			</td>
			<td style="height:37px; vertical-align:top;">
			<p style="text-align:center"><span style="font-size:13pt"><?php echo $_GET['sgpt']; ?> U/L</span></p>
			</td>
			<td style="height:37px; vertical-align:top; ">
			<p style="text-align:center"><span style="font-size:13pt">(5-35) U/L</span></p>
			</td>
			<td style="height:37px; vertical-align:top; ">
			<p style="text-align:center"><span style="font-size:13pt">IFCC GEN-2PnP</span></p>
			</td>
		</tr>
		<tr>
			<td style="height:37px; vertical-align:top;  ">
			<p><span style="font-size:13pt">ALKALINE PHOSPHATASE</span></p>
			</td>
			<td style="height:37px; vertical-align:top;  ">
			<p style="text-align:center"><span style="font-size:13pt"><?php echo $_GET['aklp']; ?> IU/L</span></p>
			</td>
			<td style="height:37px; vertical-align:top; ">
			<p style="text-align:center"><span style="font-size:13pt">(Male: &lt;270, Female: &lt;240) IU/L</span></p>
			</td>
			<td style="height:37px; vertical-align:top; ">
			<p style="text-align:center"><span style="font-size:13pt">IFCC GEN-2PnP</span></p>
			</td>
		</tr>
		<tr>
			<td style="height:37px; vertical-align:top;  ">
			<p><span style="font-size:13pt">PROTEIN (TOTAL)</span></p>
			</td>
			<td style="height:37px; vertical-align:top;  ">
			<p style="text-align:center"><span style="font-size:13pt"><?php echo $_GET['pt']; ?> gm/dL</span></p>
			</td>
			<td style="height:37px; vertical-align:top;  ">
			<p style="text-align:center"><span style="font-size:13pt">5-8 gm/dL</span></p>
			</td>
			<td style="height:37px; vertical-align:top;  ">
			<p style="text-align:center"><span style="font-size:13pt">Biuret Reaction></span></p>
			</td>
		</tr>
		<tr>
			<td style="height:37px; vertical-align:top;  ">
			<p><span style="font-size:13pt">SERUM ALBUMIN</span></p>
			</td>
			<td style="height:37px; vertical-align:top; ">
			<p style="text-align:center"><span style="font-size:13pt"><?php echo $_GET['salb']; ?> gm/dL</span></p>
			</td>
			<td style="height:37px; vertical-align:top;  ">
			<p style="text-align:center"><span style="font-size:13pt">3.5-5.6 gm/dL</span></p>
			</td>
			<td style="height:37px; vertical-align:top; ">
			<p style="text-align:center"><span style="font-size:13pt">BCG</span></p>
			</td>
		</tr>
		<tr>
			<td style="height:37px; vertical-align:top;  ">
			<p><span style="font-size:13pt">GLOBULIN</span></p>
			</td>
			<td style="height:37px; vertical-align:top; ">
			<p style="text-align:center"><span style="font-size:13pt"><?php echo $_GET['glo']; ?> gm/dL</span></p>
			</td>
			<td style="height:37px; vertical-align:top;  ">
			<p style="text-align:center"><span style="font-size:13pt">2.3-3.4 gm/dL</span></p>
			</td>
			<td style="height:37px; vertical-align:top;  ">
			<p style="text-align:center"><span style="font-size:13pt">Calculated</span></p>
			</td>
		</tr>
		<tr>
			<td style="height:37px; vertical-align:top;  ">
			<p><span style="font-size:13pt">G.G.T.P</span></p>
			</td>
			<td style="height:37px; vertical-align:top;  ">
			<p style="text-align:center"><span style="font-size:13pt"><?php echo $_GET['ggtp']; ?> U/L</span></p>
			</td>
			<td style="height:37px; vertical-align:top;  ">
			<p style="text-align:center"><span style="font-size:13pt">(Male: &lt;50, Female: &lt;32) U/L</span></p>
			</td>
			<td style="height:37px; vertical-align:top;  ">
			<p style="text-align:center"><span style="font-size:13pt">IFCC ENZ COLORIMETRIC</span></p>
			</td>
		</tr>
	</tbody>
</table>

<!---------------------------       --      End of report     --    ------------------------------->
			
			<p style="text-align: center;"><span style="font-family: Bahnschrift; font-size: 12pt;">**End of Report**</span></p>
		</div>
	</center>


	<?php include "footer.html"; ?>
</body>

</html>