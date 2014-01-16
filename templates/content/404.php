

<?php global $ns_config, $ns_mobile_support, $ns_template_vars; ?>


<h1>Entry not found.</h1>

<div class="not-found">

	<p>The article you were looking for could not be found.  Try searching for it.</p>
	<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>" >
		<label class="screen-reader-text" for="s">Search for:</label>
		<div class="textbox_wrapper"><input type="text" value="" name="s" id="s" /></div>
		<input type="submit" id="searchsubmit" value="Search" />
	</form>

</div>

