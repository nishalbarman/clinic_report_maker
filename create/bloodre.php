
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
            margin-top: 5px;
            width: 89%;
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
			<p><span style="font-size:11pt"><span style="line-height:normal"><span style="tab-stops:73.5pt"><span style="font-family:Calibri,sans-serif"><span lang="EN-US" style="font-size:13.5pt"><span style="font-family:&quot;Bahnschrift&quot;,sans-serif"><span style="color:black; font-family:Bahnschrift;">Sample Type : <strong>Whole Blood</strong></span></span></span></span></span></span></span></p>
			</td>
			<td style="height:19px" valign="top">
			<p><span style="font-size:11pt"><span style="line-height:normal"><span style="tab-stops:73.5pt"><span style="font-family:Calibri,sans-serif"><span lang="EN-US" style="font-size:13.5pt"><span style="font-family:&quot;Bahnschrift&quot;,sans-serif"><span style="color:black"><span style="font-family:Bahnschrift;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date of report<span style="white-space:pre">		</span>:&nbsp;&nbsp;&nbsp; <strong><?php echo str_replace('-','/',date("d-m-Y", strtotime($_GET['report_date']))); ?></strong></span></span></span></span></span></span></span></span></p>
			</td>
		</tr>
	</tbody>
</table>
            <p><b><u><span lang="EN-US" style="font-size:14.0pt"><span style="line-height:107%"><span style="font-family:&quot;Bahnschrift SemiBold&quot;,sans-serif"><span style="letter-spacing: 1.2px; color:black">BLOOD R.E.</span></span></span></span></u></b></p>
            </center>
			<div style="background-color:#000000; height:0.5px; width:100%;"></div>
<!---------------------------------------------------------------------------------------------------------------------------------------------->
			<table align="center" cellspacing="0" class="ReportTable"
    style="border-collapse:collapse; border:none;" width="85%">
    <tbody>
        <tr style="margin-bottom: 5px; height: 35px;">
            <td colspan="2" style="height:30px; vertical-align:top; width:177px">
                <p style="text-align:center"><span style="font: size 12.5pt"><u>Test</u></span>
                </p>
            </td>
            <td style="height:32px; vertical-align:top; width:152px">
                <p style="text-align:center"><span style="font-size:12.5pt"><u>Result</u></span>
                </p>
            </td>
            <td style="height:32px; vertical-align:top; width:199px">
                <p style="text-align:center"><span style="font-size:12.5pt"><u>Unit</u></span>
                </p>
            </td>
            <td style="height:32px; vertical-align:top; width:170px">
                <p style="text-align:center"><span style="font-size:12.5pt"><u>Ref.Interval</u></span>
                </p>
            </td>
        </tr>

        <!------------ Table header encds here, and report details starts here. ----------------->
        <tr>
            <td colspan="2" style="height:30px; vertical-align:top; width:177px">
                <p><span style="font-size:14pt">TLC
                                    :</span></p>
            </td>
            <td style="height:32px; vertical-align:top; width:152px">
                <p style="text-align:center"><span style="font-size:14pt"><?php echo $_GET['tlc'];?>
                            </span></p>

                <p style="text-align:center">&nbsp;</p>
            </td>
            <td style="height:32px; vertical-align:top; width:199px">
                <p style="text-align:center"><span style="font-size:14pt">/cumm</span>
                </p>
            </td>
            <td style="height:32px; vertical-align:top; width:170px">
                <p style="text-align:center"><span style="font-size:14pt">4000-11000</span>
                </p>
            </td>
        </tr>
        <tr>
            <td style="height:30px; vertical-align:top; width:88px">
                <p><span style="font-size:14pt">DLC
                                :</span></p>

                <p style="text-align:right">&nbsp;</p>
            </td>
            <td style="height:30px; vertical-align:top; width:89px">
                <p style="text-align:right"><span style="font-size:14pt">Neutrophil
                                :</span></p>

                <p style="text-align:right"><span style="font-size:14pt">Lymphocyte:</span>
                </p>

                <p style="text-align:right"><span style="font-size:14pt">Monocyte
                                :</span></p>

                <p style="text-align:right"><span style="font-size:14pt">Eosinophil
                                :</span></p>

                <p style="text-align:right"><span style="font-size:14pt">Basophil
                                :</span></p>
            </td>
            <td style="height:30px; vertical-align:top; width:152px">
                <p style="text-align:center"><span style="font-size:14pt"><?php echo $_GET['neu']; ?></span>
                </p>

                <p style="text-align:center"><span style="font-size:14pt"><?php echo $_GET['lym']; ?></span>
                </p>

                <p style="text-align:center"><span style="font-size:14pt"><?php echo $_GET['mono']; ?></span>
                </p>

                <p style="text-align:center"><span style="font-size:14pt"><?php echo $_GET['eos']; ?></span>
                </p>

                <p style="text-align:center"><span style="font-size:14pt"><?php echo $_GET['bas']; ?></span>
                </p>

                
            </td>

            <p style="text-align:center">&nbsp;</p>
            </td>
            <td style="height:30px; vertical-align:top; width:199px">
                <p style="text-align:center"><span style="font-size:14pt">%</span>
                </p>

                <p style="text-align:center"><span style="font-size:14pt">%</span></span>
                </p>

                <p style="text-align:center"><span style="font-size:14pt">%</span>
                </p>

                <p style="text-align:center"><span style="font-size:14pt">%</span>
                </p>

                <p style="text-align:center"><span style="font-size:14pt">%</span><br />
                    &nbsp;</p>
            </td>
            <td style="height:30px; vertical-align:top; width:170px">
                <p style="text-align:center"><span style="font-size:14pt">40-70%</span>
                </p>

                <p style="text-align:center"><span style="font-size:14pt">20-40%</span>
                </p>

                <p style="text-align:center"><span style="font-size:14pt">02-10%</span>
                </p>

                <p style="text-align:center"><span style="font-size:14pt">01-06%</span>
                </p>

                <p style="text-align:center">&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="height:30px; vertical-align:top; width:177px">
                <p><span style="font-size:14pt">Hb%
                                :</span></p>
            </td>
            <td style="height:30px; vertical-align:top; width:152px">
                <p style="text-align:center"><span style="font-size:14pt">
                                <?php echo $_GET['hb'];?>
                            </span></p>
            </td>
            <td style="height:30px; vertical-align:top; width:199px">
                <p style="text-align:center"><span style="font-size:14pt">gm/dl</span>
                </p>
            </td>
            <td style="height:30px; vertical-align:top; width:170px">
                <p style="text-align:center"><span style="font-size:14pt">M(13-17),
                                F(12-15)</span></p>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="height:30px; vertical-align:top; width:177px">
                <p><span style="font-size:14pt">ESR
                                :</span></p>
            </td>
            <td style="height:30px; vertical-align:top; width:152px">
                <p style="text-align:center"><span style="font-size:14pt">
                                <?php echo $_GET['esr'];?>
                            </span></p>
            </td>
            <td style="height:30px; vertical-align:top; width:199px">
                <p style="text-align:center"><span style="font-size:14pt">mm</span>
                </p>
            </td>
            <td style="height:30px; vertical-align:top; width:170px">
                <p style="text-align:center"><span style="font-size:14pt">Male:upto 70 years : < 14 mm, Male : > 70 Years : < 30 mm, Female : upto 70 Years : < 20 mm, Female : > 70 Years : < 35 mm</span>
                </p>
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