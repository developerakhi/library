<?php 
include('include/header.php');
include('include/dbconnect.php');
?>
<title>Barcode Generator in PHP</title>
<style>
img.barcode {
    border: 1px solid #ccc;
    padding: 20px 10px;
    border-radius: 5px;
}
</style>
<?php include('include/container.php');?>
<div class="container">
	<h2>PRINT YOUR BOOK BARCODE LEVEL</h2>	
	<br>
	<br>
	<div class="row">	
		<div class="col-md-4">
			<form method="post">
				<div class="row">
					<div class="col-md-8">
						<div class="form-group">
							<label>Product Name or Number</label>
							<!-- <input type="text" name="barcodeText" class="form-control" value="<?php //echo @$_POST['barcodeText'];?>"> -->
							<select class="form-control" id="barcodeText" name="barcodeText">
							<?php
                                    // QUERY
                                    // START LOOP 
                                    // Read data
                                    $sql_book = "SELECT * FROM book ORDER BY book_id  DESC";
                                    $result_book = $connection->query($sql_book);
                                    // output data of each row  
                                    while($row_book= $result_book->fetch_assoc()) 
                                    {  
                                    ?>
									 <option value="<?php echo $row_book['book_code']; ?>"><?php echo $row_book['book_name']; ?></option>
									<?php
									} 
									?>
							</select>
						
						</div>
					</div>		
				</div>	
				<div class="row">
				   <div class="col-md-6">
						<div class="form-group">
							<label>Barcode Type</label>
							<select name="barcodeType" id="barcodeType" class="form-control">
								<!-- <option value="codabar" <?php echo (@$_POST['barcodeType'] == 'codabar' ? 'selected="selected"' : ''); ?>>Codabar</option> -->
								<option value="code128" <?php echo (@$_POST['barcodeType'] == 'code128' ? 'selected="selected"' : ''); ?>>Code128</option>
								<!-- <option value="code39" <?php echo (@$_POST['barcodeType'] == 'code39' ? 'selected="selected"' : ''); ?>>Code39</option> -->
							</select> 
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						 <div class="form-group">
							 <label>Barcode Display</label>
							 <select name="barcodeDisplay" class="form-control" required>
								<option value="horizontal" <?php echo (@$_POST['barcodeDisplay'] == 'horizontal' ? 'selected="selected"' : ''); ?>>Horizontal</option>
								<!-- <option value="vertical" <?php echo (@$_POST['barcodeDisplay'] == 'vertical' ? 'selected="selected"' : ''); ?>>Vertical</option> -->
							 </select>
						 </div>
					</div>
				</div>	
				<div class="row">
					<div class="col-md-7">
						<input type="hidden" name="barcodeSize" id="barcodeSize" value="20">
						<input type="hidden" name="printText" id="printText" value="true">
						<input type="submit" name="generateBarcode" class="btn btn-primary form-control" value="Generate Barcode">
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-4">
		 <?php
			if(isset($_POST['generateBarcode'])) {
				$barcodeText = trim($_POST['barcodeText']);
				$barcodeType=$_POST['barcodeType'];
				$barcodeDisplay=$_POST['barcodeDisplay'];
				$barcodeSize=$_POST['barcodeSize'];
				$printText=$_POST['printText'];
				if($barcodeText != '') {
					echo '<h4>Barcode:</h4>';
					echo '<img class="barcode" alt="'.$barcodeText.'" src="barcode1.php?text='.$barcodeText.'&codetype='.$barcodeType.'&orientation='.$barcodeDisplay.'&size='.$barcodeSize.'&print='.$printText.'"/>';
				} else {
					echo '<div class="alert alert-danger">Enter product name or number to generate barcode!</div>';
				}
			}
		?>
		</div>
	</div>		
	
</div>
<?php include('include/footer.php');?>
