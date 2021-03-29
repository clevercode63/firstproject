<!DOCTYPE>
<html>
	<head>
		<meta charset="utf-8"/>
		<title><?php getTitle() ?> </title>
		<link rel="stylesheet" href="<?php echo $css; ?>bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo $css; ?>font-awesome.min.css" />

		<link rel="stylesheet" href="<?php echo $css; ?>jquery-ui.css" />
		<link rel="stylesheet" href="<?php echo $css; ?>jquery.selectBoxIt.css" />
		<link rel="stylesheet" href="<?php echo $css; ?>frontend.css" /> 

	</head>
	<body>
    <div class="upper-bar">
      <div class="container">
        <?php 
          if (isset($_SESSION['user'])) { ?>

        <img class="my-image img-thumbnail img-circle" src="img.png" alt="" />
        <div class="btn-group my-info">
          <span class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <?php echo $sessionUser ?>
            <span class="caret"></span>
          </span>
             <ul class="dropdown-menu">
                <li><a href="profile.php">My Profile</a></li>
                <li><a href="newitem.php">New Item</a></li>
                <li><a href="profile.php#my-ads">My Items</a></li>
                <li><a href="logout.php">Logout</a></li>
             </ul>
        </div>
        <?php
            
          } else {
            ?>
            <div class="login">
                <a href="login.php">
                   <span class="pull-right">Login|SignUp</span>
                </a>
            </div>
        <?php }?>
        <div class="input-search">
            <form action="items.php " method="post">
                <input type ="text" name="search" placeholder="Search....">
            </form> 

      </div>
    </div>
<nav class="navbar navbar-inverse">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-nav" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><i class="fa fa-home fa-fw"></i>Home</a>
    </div>
    <div class="collapse navbar-collapse" id="app-nav">
      <ul class="nav navbar-nav navbar-right">
        <?php 
          foreach (getCat() as $cat ) {
           echo '<li><a href="categories.php?pageid=' . $cat['cat_ID'] . '&pagename=' . str_replace('&','-', $cat['cat_Name']).'">' .
            $cat['cat_Name'] . 
           '</a></li>';
                                      }

        ?>
           <!--<a class="navbar-brand" href="about.php"><i class="fa fa-info fa-fw"></i>About</a>-->
      </ul>
    </div>
  </div>
</nav>