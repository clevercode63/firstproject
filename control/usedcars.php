<?php

	/*
	================================================
	== Used Car Page
	================================================
	*/
	

	ob_start(); // Output Buffering Start

	session_start();
	$pageTitle = 'Used Car';

	if (isset($_SESSION['Username'])) {

		include 'init.php';


		$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

		if ($do == 'Manage') {


			$stmt = $con->prepare("SELECT *
									
									FROM 
										products");

			// Execute The Statement

			$stmt->execute();

			// Assign To Variable 

			$products = $stmt->fetchAll();



			?>

			<h1 class="text-center">Manage Used Cars</h1>
			<div class="container">
				<div class="table-responsive">
					<table class="main-table text-center table table-bordered">
						<tr>
							<td>#ID</td>
							<td> Model</td>
							<td>Color</td>
							<td>Price</td>
							<td>Years</td>
							<td>Brands</td>
							<td>Control</td>
						</tr>
						<?php
							foreach($products as $product) {
								echo "<tr>";
									echo "<td>" . $product['ProductsID'] . "</td>";
									echo "<td>" . $product['ProductsModel'] . "</td>";
									echo "<td>" . $product['ProductsColor'] . "</td>";
									echo "<td>" . $product['ProductsPrice'] . "</td>";
									echo "<td>" . $product['ProductsYears'] ."</td>";
									echo "<td>" . $product['P_Date'] ."</td>";
									echo "<td>" . $product['B_ID'] ."</td>";
									echo "<td>
										<a href='usedcars.php?do=Edit&productid=" . $product['ProductsID'] . "' class='btn btn-primary'><i class='fa fa-edit'></i> Edit</a>
										<a href='usedcars.php?do=Delete&productid=" . $product['ProductsID'] . "' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete </a>";
									echo "</td>";
								echo "</tr>";
							}
						?>
						<tr>
					</table>
				</div>
				<a href="usedcars.php?do=Add" class="btn btn-sm btn-primary">
					<i class="fa fa-plus"></i> New Used Cars
				</a>
			</div>

			<?php } else {

				echo '<div class="container">';
					echo '<div class="message">There\'s No Used Cars To Show</div>';
					echo '<a href="usedcars.php?do=Add" class="btn btn-sm btn-primary">
							<i class="fa fa-plus"></i> New Used Cars
						</a>';
		

				echo '</div>';

			} ?>

		<?php 

		} elseif ($do == 'Add') { ?>

			<h1 class="text-center">Add Page</h1>
			<div class="container">
				<form class="form-horizontal" action="?do=Insert" method="POST">
					
						<!-- Start Model Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Model</label>
						<div class="col-sm-5 col-md-4">
							<input 
								type="text" 
								name="model" 
								class="form-control" 
								required="required"   
								placeholder="Model of The Car" />
						</div>
					</div>
					<!-- End Model Field -->
					<!-- Start Price Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Price</label>
						<div class="col-sm-5 col-md-4">
							<input 
								type="text" 
								name="price" 
								class="form-control" 
								required="required"  
								placeholder="Price of The Car" />
						</div>
					</div>
					<!-- End Price Field -->
					<!-- Start Color Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Color</label>
						<div class="col-sm-5 col-md-4">
							<input 
								type="text" 
								name="color" 
								class="form-control" 
								 required="required" 
								placeholder="Color of Car" />
						</div>
					</div>
					<!-- End Color Field -->
					<!-- Start Brands Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Brand</label>
						<div class="col-sm-5 col-md-4">
							<select  name="years">
								<option value="0">...</option>
								<?php 
									$stmt = $con-> prepare("SELECT * FROM brands");
									$stmt->execute();
									$b = $stmt->fetchAll();
									foreach ($b as $br ) {
										echo "<option value= '" .$br['BrandsID'] . "'>".$br['BrandsTitle'] ."</option>";
									}
									?>
							</select>
						</div>
					</div>

					<!-- End Brands Field -->
					<!-- Start Years Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Years</label>
						<div class="col-sm-5 col-md-4">
							<select  name="brand">
								<option value="0">...</option>
								<option value="1">2019</option>
								<option value="2">2018</option>
								<option value="3">2017</option>
								<option value="4">2016</option>
								<option value="5">2015</option>
								<option value="6">2014</option>
								<option value="7">2013</option>
								<option value="8">2012</option>
								<option value="9">2011</option>
								<option value="10">2010</option>
								<option value="11">2009</option>
								<option value="12">2008</option>
								<option value="13">2007</option>
								<option value="14">2006</option>
								<option value="15">2005</option>
								<option value="16">2004</option>
								<option value="17">2005</option>
								<option value="18">2004</option>
								<option value="19">2003</option>
								<option value="20">2002</option>
								<option value="21">2001</option>
								<option value="22">2000</option>
								<option value="23">1999</option>
								<option value="24">1998</option>
								<option value="25">1997</option>
								<option value="26">1996</option>
								<option value="27">1995</option>
								<option value="28">1994</option>
								<option value="29">1993</option>
								<option value="30">1992</option>
								<option value="31">1991</option>
								<option value="32">1990</option>
								<option value="33">1989</option>
								<option value="34">1988</option>
								<option value="35">1987</option>
								<option value="36">1986</option>
								<option value="37">1985</option>
								<option value="38">1984</option>
							</select>
						</div>
					</div>
					<!-- End Years Field -->
				
					<!-- Start Submit Field -->
					<div class="form-group form-group-lg">
						<div class="col-sm-offset-5 col-sm-5">
							<input type="submit" value="Add +" class="btn btn-primary btn-xm" />
						</div>
					</div>
					<!-- End Submit Field -->
				</form>
			</div>

			<?php

		} elseif ($do == 'Insert') {

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				echo "<h1 class='text-center'>Insert Page</h1>";
				echo "<div class='container'>";

				// Get Variables From The Form

				
				$model 		= $_POST['model'];
				$price 		= $_POST['price'];
				$color 		= $_POST['color'];
				$years 		= $_POST['years'];
				$brand		= $_POST['brand'];
			
				
				
				// Validate The Form

				$formErrors = array();

				if (empty($model)) {
					$formErrors[] = 'Model Can\'t be <strong>Empty</strong>';
				}

				if (empty($price)) {
					$formErrors[] = 'Price Can\'t be <strong>Empty</strong>';
				}

				if (empty($color)) {
					$formErrors[] = 'Color Can\'t be <strong>Empty</strong>';
				}

				if ($brand == 0) {
					$formErrors[] = 'You Must Choose the <strong>Brands</strong>';
				}


				if ($years == 0) {
					$formErrors[] = 'You Must Choose the <strong>Years</strong>';
				}



				// Loop Into Errors Array And Echo It

				foreach($formErrors as $error) {
					echo '<div class="alert alert-danger">' . $error . '</div>';
				}

				// Check If There's No Error Proceed The Update Operation

				if (empty($formErrors)) {

					// Insert Userinfo In Database

					$statement = $con->prepare("INSERT INTO 

						                                   products(ProductsModel, 
						                                         ProductsColor,
						                                         ProductsPrice,
						                                         ProductsYears,
						                                         P_Date,
						                                         B_ID)
		
						                        VALUES
						                              (:zmodel,
						                               :zprice,
						                               :zcolor,
						                               :zyears,
						                                now()
						                               :zbrand)
						                               ");

					$statement->execute(array(

						'zmodel' 	=> $model,
						'zprice' 	=> $price,
						'zcolor' 	=> $color,
						'zyears' 	=> $years,
						'zbrand'	=> $brand));

					// Echo Success Message

					$theMsg = "<div class='alert alert-success'>" . $statement->rowCount() . ' Record Inserted</div>';

					redirectHome($theMsg, 'back');

				}

			} else {

				echo "<div class='container'>";

				$theMsg = '<div class="alert alert-danger">Sorry You Cant Browse This Page Directly</div>';

				redirectHome($theMsg);

				echo "</div>";

			}

			echo "</div>";

		} elseif ($do == 'Edit') {

			// Check If Get Request item Is Numeric & Get Its Integer Value

			$productid = isset($_GET['productid']) && is_numeric($_GET['productid']) ? intval($_GET['productid']) : 0;

			// Select All Data Depend On This ID

			$stmt = $con->prepare("SELECT * FROM products WHERE ProductsID = ?");

			// Execute Query

			$stmt->execute(array($productid));

			// Fetch The Data

			$products = $stmt->fetch();

			// The Row Count

			$count = $stmt->rowCount();

			// If There's Such ID Show The Form

			if ($count > 0) { ?>

				<h1 class="text-center">Edit Page</h1>
				<div class="container">
					<form class="form-horizontal" action="?do=Update" method="POST">
						<input type="hidden" name="productid" value="<?php echo $productid ?>" />
						<!-- Start Name Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Name</label>
							<div class="col-sm-10 col-md-6">
								<input 
									type="text" 
									name="name" 
									class="form-control" 
									required="required"  
									placeholder="Name of The Item"
									value="<?php echo $item['item_Name'] ?>" />
							</div>
						</div>
						<!-- End Name Field -->
						<!-- Start Description Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Description</label>
							<div class="col-sm-10 col-md-6">
								<input 
									type="text" 
									name="description" 
									class="form-control" 
									required="required"  
									placeholder="Description of The Item"
									value="<?php echo $item['item_Description'] ?>" />
							</div>
						</div>
						<!-- End Description Field -->
						<!-- Start Price Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Price</label>
							<div class="col-sm-10 col-md-6">
								<input 
									type="text" 
									name="price" 
									class="form-control" 
									required="required" 
									placeholder="Price of The Item"
									value="<?php echo $item['item_Price'] ?>" />
							</div>
						</div>
						<!-- End Price Field -->
						<!-- Start Country Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Country</label>
							<div class="col-sm-10 col-md-6">
								<input 
									type="text" 
									name="country" 
									class="form-control" 
									required="required" 
									placeholder="Country of Made"
									value="<?php echo $item['item_CountryMade'] ?>" />
							</div>
						</div>
						<!-- End Country Field -->
						<!-- Start Status Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Status</label>
							<div class="col-sm-10 col-md-6">
								<select name="status">
									<option value="1" <?php if ($item['item_Status'] == 1) { echo 'selected'; } ?>>New</option>
									<option value="3" <?php if ($item['item_Status'] == 2) { echo 'selected'; } ?>>Used</option>
									<option value="4" <?php if ($item['item_Status'] == 3) { echo 'selected'; } ?>>Very Old</option>
								</select>
							</div>
						</div>
						<!-- End Status Field -->
							<!-- Start Categories Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Category</label>
						<div class="col-sm-10 col-md-6">
							<select  name="category">
								<?php 
								$allCats = getAllFrom("*", "categories", "", "", "cat_ID");
										foreach ($allCats as $cat) {
											echo "<option value='" . $cat['cat_ID'] . "'";
									if ($item['Cat_ID'] == $cat['cat_ID']) { echo 'selected'; } 
											echo ">" . $cat['cat_Name'] . "</option>";
								}								
							?>
							</select>
						</div>
					</div>
					<!-- End Categories Field -->
						<!-- Start Submit Field -->
						<div class="form-group form-group-lg">
							<div class="col-sm-offset-2 col-sm-10">
								<input type="submit" value="Save Item" class="btn btn-primary btn-sm" />
							</div>
						</div>
						<!-- End Submit Field -->
					</form>

					<?php

					// Select All Users Except Admin 

					$stmt = $con->prepare("SELECT 
												comments.*, users.Username AS Member  
											FROM 
												comments
											INNER JOIN 
												users 
											ON 
												users.UserID = comments.user_id
											WHERE item_id = ?");

					// Execute The Statement

					$stmt->execute(array($itemid));

					// Assign To Variable 

					$rows = $stmt->fetchAll();

					if (! empty($rows)) {
						
					?>
					<h1 class="text-center">Manage [ <?php echo $item['Name'] ?> ] Comments</h1>
					<div class="table-responsive">
						<table class="main-table text-center table table-bordered">
							<tr>
								<td>Comment</td>
								<td>User Name</td>
								<td>Added Date</td>
								<td>Control</td>
							</tr>
							<?php
								foreach($rows as $row) {
									echo "<tr>";
										echo "<td>" . $row['comment'] . "</td>";
										echo "<td>" . $row['Member'] . "</td>";
										echo "<td>" . $row['comment_date'] ."</td>";
										echo "<td>
											<a href='comments.php?do=Edit&comid=" . $row['c_id'] . "' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
											<a href='comments.php?do=Delete&comid=" . $row['c_id'] . "' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete </a>";
											if ($row['status'] == 0) {
												echo "<a href='comments.php?do=Approve&comid="
														 . $row['c_id'] . "' 
														class='btn btn-info activate'>
														<i class='fa fa-check'></i> Approve</a>";
											}
										echo "</td>";
									echo "</tr>";
								}
							?>
							<tr>
						</table>
					</div>
					<?php } ?>
				</div>

			<?php

			// If There's No Such ID Show Error Message

			} else {

				echo "<div class='container'>";

				$theMsg = '<div class="alert alert-danger">Theres No Such ID</div>';

				redirectHome($theMsg);

				echo "</div>";

			}			

		} elseif ($do == 'Update') {

			echo "<h1 class='text-center'>Update Item</h1>";
			echo "<div class='container'>";

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				// Get Variables From The Form

				$id 		= $_POST['itemid'];
				$name 		= $_POST['name'];
				$desc 		= $_POST['description'];
				$price 		= $_POST['price'];
				$country	= $_POST['country'];
				$status 	= $_POST['status'];
				$cate 		= $_POST['category'];
				$member 	= $_POST['member'];
				$tags 		= $_POST['tags'];
				

				// Validate The Form

				$formErrors = array();

				if (empty($name)) {
					$formErrors[] = 'Name Can\'t be <strong>Empty</strong>';
				}

				if (empty($desc)) {
					$formErrors[] = 'Description Can\'t be <strong>Empty</strong>';
				}

				if (empty($price)) {
					$formErrors[] = 'Price Can\'t be <strong>Empty</strong>';
				}

				if (empty($country)) {
					$formErrors[] = 'Country Can\'t be <strong>Empty</strong>';
				}

				if ($status == 0) {
					$formErrors[] = 'You Must Choose the <strong>Status</strong>';
				}

				if ($member == 0) {
					$formErrors[] = 'You Must Choose the <strong>Member</strong>';
				}

				if ($cate == 0) {
					$formErrors[] = 'You Must Choose the <strong>Category</strong>';
				}

				// Loop Into Errors Array And Echo It

				foreach($formErrors as $error) {
					echo '<div class="alert alert-danger">' . $error . '</div>';
				}

				// Check If There's No Error Proceed The Update Operation

				if (empty($formErrors)) {

					// Update The Database With This Info

					$stmt = $con->prepare("UPDATE 
												items 
											SET 
												item_Name = ?, 
												item_Description = ?, 
												item_Price = ?, 
												item_CountryMade = ?,
												item_Status = ?,
												Cate_ID = ?,
												Member_ID = ?,
												tags = ?
											WHERE 
												item_ID = ?");

					$stmt->execute(array($name, $desc, $price, $country, $status, $cate, $member,$tags,  $id));

					// Echo Success Message

					$theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Updated</div>';

					redirectHome($theMsg, 'back');

				}

			} else {

				$theMsg = '<div class="alert alert-danger">Sorry You Cant Browse This Page Directly</div>';

				redirectHome($theMsg);

			}

			echo "</div>";

		} elseif ($do == 'Delete') {

			echo "<h1 class='text-center'>Delete Item</h1>";
			echo "<div class='container'>";

				// Check If Get Request Item ID Is Numeric & Get The Integer Value Of It

				$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;

				// Select All Data Depend On This ID

				$check = checkItem('item_ID', 'items', $itemid);

				// If There's Such ID Show The Form

				if ($check > 0) {

					$stmt = $con->prepare("DELETE FROM items WHERE item_ID = :zid");

					$stmt->bindParam(":zid", $itemid);

					$stmt->execute();

					$theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Deleted</div>';

					redirectHome($theMsg, 'back');

				} else {

					$theMsg = '<div class="alert alert-danger">This ID is Not Exist</div>';

					redirectHome($theMsg);
		echo '</div>';

		}

		include $tpl . 'footer.php';

	} else {

		header('Location: index.php');

		exit();
	}

	ob_end_flush(); // Release The Output

?>