<?php
	
	/* 
	================================================
	== New Cars Page
	================================================
	*/
	ob_start(); // Output Buffering Start
	session_start();
	$pageTitle = 'NewCars';

	if (isset($_SESSION['Username'])) {

		include 'init.php';

		$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
/*
		if ($do == 'Manage') {

			$sort = 'asc';
			$sort_array = array('asc', 'desc');
			if (isset($_GET['sort']) && in_array($_GET['sort'], $sort_array)){
				$sort = $_GET['sort'];
			}
			$statment = $con->prepare("SELECT * FROM categories ORDER BY cat_Ordering $sort");
			$statment->execute();
			$cats = $statment->fetchAll(); 

			if (! empty($cats)) {

			?>
			<h1 class="text-center">Manage Categories</h1>
			<div class="container categories">
				<div class="panel panel-default">
					<div class="panel-heading">
					<i class="fa fa-edit"></i>Manage Categories
					<div class="option pull-right">
						<i class="fa fa-sort"></i> Order:[
						<a class ="<?php if ($sort == 'desc') {echo 'active';} ?>" href="?sort=desc">Desc</a> |
						<a class ="<?php if ($sort == 'asc') {echo 'active';} ?>" href="?sort=asc">Asc</a>]
						<i class="fa fa-eye"></i> View:[
						<span class="active" data-view="full">Full</span> |
						<span >Classic</span>]
					</div>
				</div>
						<div class="panel-body">
							<?php
								foreach ($cats as $cat){
									echo "<div class='cat'>";
									echo "<div class='hidden-buttons'>";
										echo "<a href='categories.php?do=Edit&catid=".$cat['cat_ID']."' class='btn btn-xm btn-success'><i class='fa fa-edit'></i>Edit</a>";
										echo "<a href='categories.php?do=Delete&catid=".$cat['cat_ID']."' class='confirm btn btn-xm btn-danger'><i class= 'fa fa-close'></i>Delete</a>";
									echo"</div>";
										echo "<h3>" . $cat['cat_Name'] . '</h3>';
										echo "<div class='full-view'>";
											echo "<p>"; 
												if ($cat['cat_Description'] == '') { echo 'This is Empty';
												} else {echo $cat['cat_Description'] ;}
											echo "</p>";
												 if ($cat['cat_Visibility'] == 1){ echo'<span class="visibility"><i class="fa fa-eye"></i>Hidden</span>';}
												 if ($cat['AllowComment'] == 1){ echo'<span class="comments"><i class="fa fa-close"></i>Comment Disabled</span>';}
												 if ($cat['cat_AllowAds'] == 1){ echo'<span class="advertises"><i class="fa fa-close"></i>Ads Disabled</span>';}	
										 echo"</div>"; 
									echo "</div>";
									echo "<hr>";
							}
						?>
					</div>
				</div>
				<a class="add-category btn btn-primary" href="categories.php?do=Add"><i class="fa fa-plus"></i>Add New Category</a>
			</div>
			<?php } else {

				echo '<div class="container">';
					echo '<div class="message">There\'s No Categories To Show</div>';
					echo '<a href="categories.php?do=Add" class="btn btn-primary">
							<i class="fa fa-plus"></i> New Category
						</a>';
				echo '</div>';

			} ?>


<?php 
		} elseif ($do == 'Add') { ?>

				<h1 class="text-center">Add New Category</h1>
			<div class="container">
				<form class="form-horizontal" action="?do=Insert" method="POST" enctype="multipart/form-data">
					<!-- Start Name Of Category Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" name="name" class="form-control" autocomplete="off" required="required" placeholder="Name Of Category" />
						</div>
					</div>
					<!-- End Name Of Category Field -->
					<!-- Start Description Of Category Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Description</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" name="description" class="form-control" placeholder="Description Of Category" />
							
						</div>
					</div>
					<!-- End Description Of Category Field -->
					<!-- Start Ordering Of Category Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Ordering</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" name="ordering" class="form-control" placeholder="Number Order The Categories" />
						</div>
					</div>
					<!-- End Ordering Of Category Field -->
					<!-- Start Visibility Of Category Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Visible</label>
						<div class="col-sm-10 col-md-6">
							<div>
								<input id="vis-yes" type="radio" name="visibility" value="0" checked />
								<label for="vis-yes">Yes</label>
							</div>
							<div>
								<input id="vis-no" type="radio" name="visibility" value="1"  />
								<label for="vis-no">No</label>
							</div>
						</div>
					</div>
					<!-- End Visibility Of Category Field -->
					<!-- Start Comment Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Allow Commenting</label>
						<div class="col-sm-10 col-md-6">
							<div>
								<input id="com-yes" type="radio" name="comment" value="0" checked />
								<label for="com-yes">Yes</label>
							</div>
							<div>
								<input id="com-no" type="radio" name="comment" value="1"  />
								<label for="com-no">No</label>
							</div>
						</div>
					</div>
					<!-- End Comment Field -->
					<!-- Start Start Ads Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Allow Adverts</label>
						<div class="col-sm-10 col-md-6">
							<div>
								<input id="ads-yes" type="radio" name="ads" value="0" checked />
								<label for="ads-yes">Yes</label>
							</div>
							<div>
								<input id="ads-no" type="radio" name="ads" value="1"  />
								<label for="ads-no">No</label>
							</div>
						</div>
					</div>
					<!-- End Ads Field -->
					<!-- Start Submit Field -->
					<div class="form-group form-group-lg">
						<div class="col-sm-offset-2 col-sm-10">
							<input type="submit" value="Add Category" class="btn btn-primary btn-lg" />
						</div>
					</div>
					<!-- End Submit Field -->
				</form>
			</div>
			<?php 
			
		} elseif ($do == 'Insert') { 

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				echo "<h1 class='text-center'>Insert Category</h1>";
				echo "<div class='container'>";

				// Get Variables From The Form

				$name 		= $_POST['name'];
				$desc 		= $_POST['description'];
				$order 		= $_POST['ordering'];
				$visible 	= $_POST['visibility'];
				$comment 	= $_POST['comment'];
				$ads 		= $_POST['ads'];

					// Check If Category Exist مin Database

					$check = checkItem("cat_Name", "categories ", $name);

					if ($check == 1) {

						$theMsg = '<div class="alert alert-danger">Sorry This Category Is Exist</div>';

						redirectHome($theMsg, 'back');

					} else {

						// Insert Category info In Database

						$stmt = $con->prepare("INSERT INTO 
													categories(cat_Name, cat_Description, cat_Ordering, cat_Visibility, AllowComment, cat_AllowAds )
												VALUES(:zname, :zdesc, :zorder, :zvisible, :zcomment , :zads) ");
						$stmt->execute(array(

							'zname' 	=> $name,
							'zdesc' 	=> $desc,
							'zorder' 	=> $order,
							'zvisible' 	=> $visible,
							'zcomment'	=> $comment,
							'zads'		=> $ads


						));

						// Echo Success Message

						$theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Inserted</div>';

						redirectHome($theMsg, 'back');

					}


			} else {

				echo "<div class='container'>";

				$theMsg = '<div class="alert alert-danger">Sorry You Cant Browse This Page Directly</div>';

				redirectHome($theMsg);

				echo "</div>";

			}

			echo "</div>";

			
		}elseif ($do == 'Edit') {
			// Check If Get Request catid Is Numeric & Get Its Integer Value

			$catid = isset($_GET['catid']) && is_numeric($_GET['catid']) ? intval($_GET['catid']) : 0;

			// Select All Data Depend On This ID

			$stmt = $con->prepare("SELECT * FROM categories WHERE cat_ID = ? ");

			// Execute Query

			$stmt->execute(array($catid));

			// Fetch The Data

			$cat = $stmt->fetch();

			// The Row Count

			$count = $stmt->rowCount();

			// If There's Such ID Show The Form

			if ($count > 0) { ?>

			<h1 class="text-center">Edit Category</h1>
				<div class="container">
					<form class="form-horizontal" action="?do=Update" method="POST">
						<input type="hidden" name="catid" value="<?php echo $catid ; ?>" />
						<!-- Start Name Of Category Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Name</label>
							<div class="col-sm-10 col-md-6">
								<input type="text" name="name" class="form-control"  required="required" placeholder="Name Of Category" value = "<?php  echo $cat['cat_Name']?>"/>
							</div>
						</div>
						<!-- End Name Of Category Field -->
						<!-- Start Description Of Category Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Description</label>
							<div class="col-sm-10 col-md-6">
								<input type="text" name="description" class="form-control" placeholder="Description Of Category" value = "<?php  echo $cat['cat_Description']?>"/>
								
							</div>
						</div>
						<!-- End Description Of Category Field -->
						<!-- Start Ordering Of Category Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Ordering</label>
							<div class="col-sm-10 col-md-6">
								<input type="text" name="ordering" class="form-control" placeholder="Number Order The Categories" value = "<?php  echo $cat['cat_Ordering']?>"/>
							</div>
						</div>
						<!-- End Ordering Of Category Field -->
						<!-- Start Visibility Of Category Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Visible</label>
							<div class="col-sm-10 col-md-6">
								<div>
									<input id="vis-yes" type="radio" name="visibility" value="0" <?php if($cat['cat_Visibility'] == 0){echo 'checked' ;} ?> />
									<label for="vis-yes">Yes</label>
								</div>
								<div>
									<input id="vis-no" type="radio" name="visibility" value="1" <?php if($cat['cat_Visibility'] == 1){echo 'checked' ;} ?> />
									<label for="vis-no">No</label>
								</div>
							</div>
						</div>
						<!-- End Visibility Of Category Field -->
						<!-- Start Comment Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Allow Commenting</label>
							<div class="col-sm-10 col-md-6">
								<div>
									<input id="com-yes" type="radio" name="comment" value="0"  <?php if($cat['AllowComment'] == 0){echo 'checked' ;} ?>/>
									<label for="com-yes">Yes</label>
								</div>
								<div>
									<input id="com-no" type="radio" name="comment" value="1"  <?php if($cat['AllowComment'] == 1){echo 'checked' ;} ?>/>
									<label for="com-no">No</label>
								</div>
							</div>
						</div>
						<!-- End Comment Field -->
						<!-- Start  Ads Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Allow Adverts</label>
							<div class="col-sm-10 col-md-6">
								<div>
									<input id="ads-yes" type="radio" name="ads" value="0"  <?php if($cat['cat_AllowAds'] == 0){echo 'checked' ;} ?>/>
									<label for="ads-yes">Yes</label>
								</div>
								<div>
									<input id="ads-no" type="radio" name="ads" value="1"  <?php if($cat['cat_AllowAds'] == 1){echo 'checked' ;} ?>/>
									<label for="ads-no">No</label>
								</div>
							</div>
						</div>
						<!-- End Ads Field -->
						<!-- Start Submit Field -->
						<div class="form-group form-group-lg">
							<div class="col-sm-offset-2 col-sm-10">
								<input type="submit" value="Save " class="btn btn-primary btn-lg" />
							</div>
						</div>
						<!-- End Submit Field -->
					</form>
				</div>

			<?php

			// If There's No Such ID Show Error Message

			} else {

				echo "<div class='container'>";

				$theMsg = '<div class="alert alert-danger">Theres No Such ID</div>';

				redirectHome($theMsg);

				echo "</div>";

			}
			
		}elseif ($do == 'Update') {
				echo "<h1 class='text-center'>Update Category</h1>";
				echo "<div class='container'>";

				if ($_SERVER['REQUEST_METHOD'] == 'POST') {

					// Get Variables From The Form

					$id 		= $_POST['catid'];
					$name 		= $_POST['name'];
					$desc 		= $_POST['description'];
					$order 		= $_POST['ordering'];
					$visibile 	= $_POST['visibility'];
					$comment 	= $_POST['comment'];
					$ads 		= $_POST['ads'];

							// Update The Database With This Info

							$stmt = $con->prepare("UPDATE
														 categories
													SET 
														cat_Name 	= ?,
														cat_Description = ?,
														cat_Ordering 	= ?,
														cat_Visibility	=?,
														AllowComment	=?,
														cat_AllowAds	=?
													WHERE 
														cat_ID = ?");

							$stmt->execute(array($name, $desc, $order, $visibile, $comment, $ads,  $id));

							// Echo Success Message

							$theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Updated</div>';

							redirectHome($theMsg, 'back');

				} else {

					$theMsg = '<div class="alert alert-danger">Sorry You Cant Browse This Page Directly</div>';

					redirectHome($theMsg);

				}

				echo "</div>";

		}elseif ($do == 'Delete') {

			echo "<h1 class='text-center'>Delete Category</h1>";
			echo "<div class='container'>";

				// Check If Get Request catid Is Numeric & Get The Integer Value Of It

				$catid = isset($_GET['catid']) && is_numeric($_GET['catid']) ? intval($_GET['catid']) : 0;

				// Select All Data Depend On This ID

				$check = checkItem('cat_ID', 'categories', $catid);

				// If There's Such ID Show The Form

				if ($check > 0) {

					$stmt = $con->prepare("DELETE FROM categories WHERE cat_ID = :zid");

					$stmt->bindParam(":zid", $catid);

					$stmt->execute();

					$theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Deleted</div>';

					redirectHome($theMsg);

				} else {

					$theMsg = '<div class="alert alert-danger">This ID is Not Exist</div>';

					redirectHome($theMsg);

				}

			echo '</div>';

			
		}

		include $tpl . 'footer.php';

	} else {

		header('Location: index.php');

		exit();*/
	}

	ob_end_flush(); // Release The Output

	?>
