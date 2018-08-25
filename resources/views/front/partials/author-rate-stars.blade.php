<style type="text/css">
	.star-on,
	.star-off{
		width:15px;
		height:15px;
		margin-top: -20px;
	}

</style>
<!-- rating stars -->
	<span class="rates">

	    <span class="hidden">{{ $author_rate = $author->rate }}</span>
	    @for ($i=0; $i < $author_rate; $i++)
	        <img src="/img/star.png" class="star-on">
	    @endfor
	    <span class="hidden">{{ $rate_off = 5 - ($author->rate) }}</span>
	    @for ($i=0; $i < $rate_off; $i++)
	        <img src="/img/star-off.png" class="star-off">
	    @endfor
	</span>
