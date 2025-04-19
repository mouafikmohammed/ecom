

<!-- <div class="panel panel-default sidebar-menu">
	<div class="panel-heading">
		<h3 class="panel-title">CATEGORIES</h3>
	</div>
	<div class="panel-body">
		<ul class="nav nav-pills nav-stacked category-menu">
			<?php //echo getCat(); ?>
			
		</ul>
	</div>
	</div> -->

<style>

.cat_li {
	padding: 5px;
	background-color:#FAEBD7;
	border-style: groove;
	
}
</style>


<div class="panel panel-default sidebar-menu">
	<div class="panel-heading">
		<h3 class="panel-title">PRODUCT CATEGORIES</h3>
	</div>
	<div  >
		<ul class="nav nav-pills nav-stacked category-menu">
		 <?php echo getPCats(); ?>
		</ul>
	</div>
</div>
