<table style="width:929px">
				<tbody>
					<tr>
						<td style="width:665px"><img alt=""
								src="http://healthkind.is-great.net/create/assets/health_logo_copy.png"
								style="height:225px; width:680px; margin-left:21px"></td>
						<td style="width:500px">
							<p style="text-align:right;margin-right:55px"><img alt=""
									src="<?php echo $qr_url; ?>"
									style="height:100px; width:100px"></p>
                            

							<p style="text-align:center"><span style="color:#1F3864;font-family: Bahnschrift; font-weight: bold;"><strong>&nbsp; &nbsp;Serial :
											<?php echo $_GET['serial']; ?>
										</strong></span></p>
                                        <input type="hidden" value="<?php echo $_GET['serial']; ?>" id="qr_serial" />
						</td>
					</tr>
				</tbody>
			</table>