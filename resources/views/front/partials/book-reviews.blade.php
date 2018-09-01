<style type="text/css">
	.star-on,
	.star-off{
		width:13px;
		height:13px;
		margin-top: -20px;
	}


</style>
<span class="hidden">{{ $book_stars = $book->calculate_stars() }}</span>
<span class="hidden">{{ $int = floor($book_stars) }}</span>
<span class="hidden">{{ $decimal = $book_stars - $int }}</span>
<span class="rates">
	@if ($int == 5)
		@for ($i=0; $i < 5; $i++)
			<img src="/img/star.png" class="star-off">
		@endfor
	@else
		<!--integer part -->
		@for ($i=0; $i < $int; $i++)
	        <img src="/img/star.png" class="star-on">
	    @endfor

		<!-- decimal part -->
		@if ($decimal > 0)
			<img src="/img/star_half.png" class="star-on">
			<!-- off stars -->
			<span class="hidden">{{ $rate_off = 5 - $int }}</span>
			@for ($i=1; $i < $rate_off; $i++)
				<img src="/img/star-off.png" class="star-off">
			@endfor
		@elseif ($decimal == 0)
			<!-- off stars -->
			<span class="hidden">{{ $rate_off = 5 - $int }}</span>
			@for ($i=0; $i < $rate_off; $i++)
				<img src="/img/star-off.png" class="star-off">
			@endfor
		@endif
	@endif
</span>
