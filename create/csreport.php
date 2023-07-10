
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
            margin-top: 2.1rem;;
            width: 75%;
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
			<table style="width:929px">
				<tbody>
					<tr>
						<td style="width:665px"><img alt=""
								src="http://healthkind.is-great.net/create/assets/heath_logo.png"
								style="height:225px; width:683px; margin-left:15px"></td>
						<td style="width:500px">
							<p style="text-align:right;margin-right:55px"><img alt=""
									src="<?php echo $qr_url; ?>"
									style="height:100px; width:100px"></p>
                            

							<p style="text-align:center"><span style="color:#1F3864;font-family: Bahnschrift;"><strong>&nbsp; &nbsp;Serial :
											<?php echo $_GET['serial']; ?>
										</strong></span></p>
                                        <input type="hidden" value="<?php echo $_GET['serial']; ?>" id="qr_serial" />
						</td>
					</tr>
				</tbody>
			</table>
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
			<p><span style="font-size:11pt"><span style="line-height:normal"><span style="tab-stops:73.5pt"><span style="font-family:Calibri,sans-serif"><span lang="EN-US" style="font-size:13.5pt"><span style="font-family:&quot;Bahnschrift&quot;,sans-serif"><span style="color:black; font-family:Bahnschrift;">Sample Type : <strong>Whole Blood</strong></span></span></span></span></span></span></span></p>
			</td>
			<td style="height:19px" valign="top">
			<p><span style="font-size:11pt"><span style="line-height:normal"><span style="tab-stops:73.5pt"><span style="font-family:Calibri,sans-serif"><span lang="EN-US" style="font-size:13.5pt"><span style="font-family:&quot;Bahnschrift&quot;,sans-serif"><span style="color:black"><span style="font-family:Bahnschrift;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date of report<span style="white-space:pre">		</span>:&nbsp;&nbsp;&nbsp; <strong><?php echo str_replace('-','/',date("d-m-Y", strtotime($_GET['report_date']))); ?></strong></span></span></span></span></span></span></span></span></p>
			</td>
		</tr>
	</tbody>
</table>
            <p><b><u><span lang="EN-US" style="font-size:14.0pt"><span style="line-height:107%"><span style="font-family:&quot;Bahnschrift SemiBold&quot;,sans-serif"><span style="letter-spacing: 1.2px; color:black">CULTURE & SENSITIVITY REPORT</span></span></span></span></u></b></p>
            </center>
			<div style="background-color:#000000; height:0.5px; width:100%;"></div>
<!---------------------------------------------------------------------------------------------------------------------------------------------->
<table align="center" cellspacing="0" class="ReportTable" style="border-collapse:collapse; border:none">
	<tbody>
		<tr>
			<td style="height:30px; vertical-align:top">
			<p><span style="font-size:13pt">Nature&nbsp;of&nbsp;speciment</span></p>

			<p><span style="font-size:13pt">Nature&nbsp;of&nbsp;culture</span></p>

			<p><span style="font-size:13pt">Organism&nbsp;Isolated</span></p>

			<p><span style="font-size:13pt">Report&nbsp;Status</span></p>

			<p><span style="font-size:13pt">Remark&nbsp;(If Any)</span></p>
			</td>
			<td style="height:30px;text-align: center; vertical-align:top; width: 15%">
			<p><span style="font-size:13pt">:</span></p>

			<p><span style="font-size:13pt">:</span></p>

			<p><span style="font-size:13pt">:</span></p>

			<p><span style="font-size:13pt">:</span></p>

			<p><span style="font-size:13pt">:</span></p>
			</td>
			<td style="height:30px; vertical-align:top">
			<p><span style="font-size:13pt">Urine</span></p>

			<p><span style="font-size:13pt">Aerobic</span></p>

			<p><span style="font-size:13pt">No&nbsp;growth&nbsp;detected&nbsp;after&nbsp;48&nbsp;hours&nbsp;of&nbsp;aerobic&nbsp;incubation&nbsp;at&nbsp;37<span style="font-size:10.5pt"><span style="background-color:white"><span style="color:#4d5156">&deg;</span></span></span><span style="font-size:11.0pt">C</span></span></p>

			<p><span style="font-size:13pt">Final</span></p>

			<p><span style="font-size:13pt"><?php echo $_GET['remark']; ?></span></p>
			</td>
		</tr>
	</tbody>
</table>


<!---------------------------       --      End of report     --    ------------------------------->
			<br>
			<p style="text-align: center;"><span style="font-family: Bahnschrift; font-size: 12pt;">**End of Report**</span></p>
		</div>
	</center>


	<?php include "footer.html"; ?>
</body>

</html>