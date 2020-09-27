<?php include("includes/header.php"); ?>
		<?php $codeLine = array(); ?>
		<div class="container">
			<div class="col-12">
				<div class="row row-margin">
					<h4>Copy / Paste or Upload your program statement for measuring code complexity.</h4>
				</div>
				<div class="row"></div>
				<div class="row">
					<div class="col-md-6">
						<form action="index.php" method="post" enctype="multipart/form-data">
							<div class="row">
								<label for="file">Pick your program file:</label>
								<input type="file" class="form-control-file" id="file" 
									name="file" onchange="form.submit()" accept=".java,.cpp" />
							</div>
						</form>
					</div>
					<div class="col-md-6">
						<form action="index.php" method="post" enctype="multipart/form-data">
							<div class="row">
								<label for="file">Pick a zip file:</label>
								<input type="file" class="form-control-file" id="zip_file" 
									name="zip_file" onchange="form.submit()" accept=".zip,.rar,.7zip" />
							</div>
						</form>
					</div>
				</div>
				<div class="row row-margin">
					<textarea rows="14" class="form-control" id="codeArea">
						<?php
							// if a file selected go with this
							if (isset($_FILES['file'])) {
								$counter = 0;
								$fp = fopen($_FILES['file']['tmp_name'], 'rb');
								while (($line = fgets($fp, 4096)) !== false) {
									global $codeLine;
									$codeLine[$counter] = $line;
									echo "$line";
									$counter++;
								}
							} // if a zip selected go with this
							else if (isset($_FILES['zip_file'])) {
								if($_FILES["zip_file"]["name"]) {
									$filename = $_FILES["zip_file"]["name"];
									$source = $_FILES["zip_file"]["tmp_name"];
									$type = $_FILES["zip_file"]["type"];
									
									// $zip = new ZipArchive();
									// $x = $zip->open($targetzip);
									$zip = zip_open($source);
									if (is_resource($zip)) {
										while ($zip_entry = zip_read($zip)) {

											if (zip_entry_open($zip, $zip_entry))
											{
												$contents = zip_entry_read($zip_entry);
												global $codeLine;
												$codeLine = explode("\n", $contents);
												echo $contents;
												zip_entry_close($zip_entry);
											}
										}

										zip_close($zip);
									} else {
										echo "Cannot read the zip";
									}
								}
							} else {
								echo "Your program code snippet will be displayed here...";
							}
						?>
					</textarea>
				</div>
				<div class="row row-margin">
					<div class="col-11"></div>
					<div class="col-1">
						<button id="analyze" name="analyze" class="btn btn-success" onClick="analyzeProgram()">Analyze</button>
					</div>
				</div>
			</div>
			<div class="col-12" id="output-table">
				<div class="row row-margin">
					<div class="col-11" id="output"></div>
					<div class="col-1">
						<a href="/code-measuring-tool/edit.php" class="btn btn-primary">Change Weights</a>
					</div>
				</div>
				
                <?php include("includes/svm_output.php") ?>
                <br />
				<?php include("includes/controlstructure.php") ?>
				<br />
				<?php include("includes/inheritance.php") ?>
				<br />
				<?php include("includes/coupling_output.php") ?>
				<br />
				<?php include("includes/all_factors_output.php") ?>

			</div>
			<script type="text/javascript">
				document.getElementById("output-table").style.display = "none";
				function analyzeProgram() {
					var codeArea = document.getElementById("codeArea").value;
					document.getElementById("output").innerHTML = "Analyzed code lines count is: " + codeArea.length;
					document.getElementById("output-table").style.display = "block";
				}
			</script>	
		</div>		
<?php include("includes/footer.php"); ?>