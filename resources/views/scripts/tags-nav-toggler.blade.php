<script>
	$('#tagsNavToggler').click(function(e)
	{
		e.stopPropagation();
		$('#tagsNav').toggleClass('open');
	});

	$('.tag-nav-item').click(function()
	{
		window.location.href = $(this).find('a').attr('href');
	});

	$('body').click(function()
	{
		if ($('#tagsNav').hasClass('open'))
			$('#tagsNav').removeClass('open');
	});

	$('#hideHero').click(function()
	{
		$('.hero').addClass('closed');
		$('#showHero').removeClass('hide');
	});

	$('#showHero').click(function()
	{
		$(this).addClass('hide');
		$('.hero').removeClass('closed');
	});
</script>