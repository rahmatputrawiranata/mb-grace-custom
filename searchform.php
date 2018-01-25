<form class="navbar-form navbar-left" id="searchform" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
	<div class="form-group">
		<input id="s" type="text" class="form-control" name="s" placeholder="<?php echo __('Search', 'mb-grace'); ?>">
	</div>
	<button type="submit" class="btn btn-primary">
		<?php echo __('Submit', 'mb-grace'); ?>
	</button>
</form>