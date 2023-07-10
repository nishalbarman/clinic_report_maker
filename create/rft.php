<?php 
$qr_url = "https://chart.googleapis.com/chart?cht=qr&chl=http://healthkind.is-great.net/reports.php?serial=".$_GET['serial']."&chs=100x100&chld=L|0";
$chkRan = $_GET['rand'];
$chkPap = $_GET['pap'];
$chkfas = $_GET['fast'];
$chkUrea = $_GET['chkUrea'];
$chkUric = $_GET['chkUric'];
$chkCrea = $_GET['chkCrea'];
$chkAmyl = $_GET['chkAmyl'];
$chkLipa = $_GET['chkLipa'];
$chkSgot = $_GET['chkSgot'];
$chkSgpt = $_GET['chkSgpt'];

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
			background: transparent;
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
            margin-top: -10px;
            width: 89%;
            
            margin-left: 5rem;
			
        }

        
    
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
    function hideMe() {
        var random = '<?php echo $chkRan; ?>';
        var pp = '<?php echo $chkPap; ?>';
        var fasting = '<?php echo $chkfas; ?>';
        var urea = '<?php echo $chkUrea; ?>';
        var uric = '<?php echo $chkUric; ?>';
        var creatitine = '<?php echo $chkCrea; ?>';
        var amylase = '<?php echo $chkAmyl; ?>';
        var lipase = '<?php echo $chkLipa; ?>';
        var sgot = '<?php echo $chkSgot; ?>';
        var sgpt = '<?php echo $chkSgpt; ?>';
        
        if(random != 'yes') {
            document.getElementById('random').style.display = 'none';
        }
            
        if(pp != 'yes') {
            document.getElementById('pap').style.display = 'none';
        }

        if(fasting != 'yes') {
            document.getElementById('fasting').style.display = 'none';
        }

        if(urea != 'yes') {
            document.getElementById('urea').style.display = 'none';
        }

        if(uric != 'yes') {
            document.getElementById('uric').style.display = 'none';
        }

        if(creatitine != 'yes') {
            document.getElementById('creatitine').style.display = 'none';
        }

        if(amylase != 'yes') {
            document.getElementById('amylase').style.display = 'none';
        }

        if(lipase != 'yes') {
            document.getElementById('lipase').style.display = 'none';
        }

        if(sgot != 'yes') {
            document.getElementById('sgot').style.display = 'none';
        }

        if(sgpt != 'yes') {
            document.getElementById('sgpt').style.display = 'none';
        }
    }
	</script>

</head>

<body>

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
			<p><span style="font-size:11pt"><span style="line-height:normal"><span style="tab-stops:73.5pt"><span style="font-family:Calibri,sans-serif"><span lang="EN-US" style="font-size:13.5pt"><span style="font-family:&quot;Bahnschrift&quot;,sans-serif"><span style="color:black; font-family:Bahnschrift;">Age : <strong><?php echo $_GET['patient_age']; ?></strong> Years, Gender : <strong><?php echo $_GET['patient_gender']; ?></strong></span></span></span></span></span></span></span></p>
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
<p><b><u><span lang="EN-US" style="font-size:14.0pt"><span style="line-height:107%"><span style="font-family:&quot;Bahnschrift SemiBold&quot;,sans-serif"><span style="letter-spacing: 1.2px; color:black">RENAL FUNCTION TEST (RFT)</span></span></span></span></u></b></p>
            </center>
            <br>
			<DIV STYLE="background-color:#000000; height:0.5px; width:100%;"></div>
			<p style="text-align: center;font-size:16px"><u>Status</u></p>
            <br>

<!---------------------------------------------------------------------------------------------------------------------------------------------- -->
<table align="center" cellspacing="0" class="ReportTable"
    style="border-collapse:collapse; border:none;">
    <tbody>
    <tr >
            <td colspan="2" style="height:30px; vertical-align:top; width:15%">
                <p style="text-align:center"><span style="font: size 12.5pt"><u>Test</u></span>
                </p>
            </td>
            <td style="height:32px; vertical-align:top; width:152px">
                <p style="text-align:center"><span style="font-size:12.5pt"><u>Result</u></span>
                </p>
            </td>
            <td style="height:32px; vertical-align:top; width:199px">
                <p style="text-align:center"><span style="font-size:12.5pt"><u>Biological
                    Ref. Interval</u></span>
                </p>
            </td>
            <td style="height:32px; vertical-align:top; width:170px">
                <p style="text-align:center"><span style="font-size:12.5pt"><u>Method</u></span>
                </p>
            </td>
        </tr>
    
		<tr id="urea" >
            <td colspan="2" style="height:30px; vertical-align:middle; width:177px">
                <p><span style="font-size:13.5pt">BLOOD&nbsp;UREA</span></p>
            </td>
            <td style="height:30px; vertical-align:center; width:152px">
                <p style="text-align:center"><span style="font-size:13.5pt">
                                <?php echo $_GET['urea'];?> mg/dl
                            </span></p>
            </td>
            
            <td style="height:30px; vertical-align:; width:170px">
                <p style="text-align:center"><span style="font-size:13.5pt">(10-50) mg/dl</span>
                </p>
            </td>

            <td style="height:30px; vertical-align:top; width:20%">
                <p style="text-align:center"><span style="font-size:11pt"><span
                            style="font-family:Calibri,sans-serif"><span
                                style="font-family:&quot;Bahnschrift SemiBold&quot;,sans-serif">GIDH</span></span></span>
                </p>
            </td>
        </tr>
        <tr id="urea" style="height: 5px;"/>
		<tr id="uric" >
            <td colspan="2" style="height:30px; vertical-align:middle; width:177px">
                <p><span style="font-size:13.5pt">URIC&nbsp;ACID</span></p>
            </td>
            <td style="height:30px; vertical-align:center; width:152px">
                <p style="text-align:center"><span style="font-size:13.5pt">
                                <?php echo $_GET['uric'];?> mg/dl
                            </span></p>
            </td>
            
            <td style="height:30px; vertical-align:; width:170px">
                <p style="text-align:center"><span style="font-size:13.5pt">(2-7) mg/dl</span>
                </p>
            </td>

            <td style="height:30px; vertical-align:top; width:20%">
                <p style="text-align:center"><span style="font-size:11pt"><span
                            style="font-family:Calibri,sans-serif"><span
                                style="font-family:&quot;Bahnschrift SemiBold&quot;,sans-serif">URICASE END POINT</span></span></span>
                </p>
            </td>
        </tr>
        <tr id="uric" style="height: 5px;"/>
		<tr id="creatitine" >
            <td colspan="2" style="height:30px; vertical-align:center; width:177px">
                <p><span style="font-size:13.5pt">CREATININE</span></p>
            </td>
            <td style="height:30px; vertical-align:center; width:152px">
                <p style="text-align:center"><span style="font-size:13.5pt">
                                <?php echo $_GET['crea'];?> mg/dl
                            </span></p>
            </td>
            
            <td style="height:30px; vertical-align:; width:170px">
                <p style="text-align:center"><span style="font-size:13.5pt">0.6-1.2 mg/dl</span>
                </p>
            </td>

            <td style="height:30px; vertical-align:top; width:20%">
                <p style="text-align:center"><span style="font-size:11pt"><span
                            style="font-family:Calibri,sans-serif"><span
                                style="font-family:&quot;Bahnschrift SemiBold&quot;,sans-serif">PAP</span></span></span>
                </p>
            </td>
        </tr>
        <tr id="creatitine" style="height: 5px;"/>
		<tr id="amylase" >
            <td colspan="2" style="height:30px; vertical-align:center; width:177px">
                <p><span style="font-size:13.5pt">SODIUM</span></p>
            </td>
            <td style="height:30px; vertical-align:center; width:152px">
                <p style="text-align:center"><span style="font-size:13.5pt">
                                <?php echo $_GET['amyle'];?> mmol/L
                            </span></p>
            </td>
            
            <td style="height:30px; vertical-align:; width:170px">
                <p style="text-align:center"><span style="font-size:13.5pt">135-145 mmol/L</span>
                </p>
            </td>

            <td style="height:30px; vertical-align:top; width:20%">
                <p style="text-align:center"><span style="font-size:11pt"><span
                            style="font-family:Calibri,sans-serif"><span
                                style="font-family:&quot;Bahnschrift SemiBold&quot;,sans-serif"></span></span></span>
                </p>
            </td>
        </tr>
        <tr id="amylase" style="height: 5px;"/>
		<tr id="lipase" >
            <td colspan="2" style="height:30px; vertical-align:center; width:177px">
                <p><span style="font-size:13.5pt">&nbsp;POTASSIUM</span></p>
            </td>
            <td style="height:30px; vertical-align:center; width:152px">
                <p style="text-align:center"><span style="font-size:13.5pt">
                                <?php echo $_GET['lipa'];?> mmol/L
                            </span></p>
            </td>
            
            <td style="height:30px; vertical-align:; width:170px">
                <p style="text-align:center"><span style="font-size:13.5pt">3.5-5.5 mmol/L</span>
                </p>
            </td>

            <td style="height:30px; vertical-align:top; width:20%">
                <p style="text-align:center"><span style="font-size:11pt"><span
                            style="font-family:Calibri,sans-serif"><span
                                style="font-family:&quot;Bahnschrift SemiBold&quot;,sans-serif"></span></span></span>
                </p>
            </td>
        </tr>
        <tr id="lipase" style="height: 5px;"/>
        
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