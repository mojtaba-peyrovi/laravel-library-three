<style type="text/css">
	.star-on,
	.star-off{
		width:13px;
		height:13px;
		margin-top: -20px;
	}

</style>
<!-- rating stars -->
<span class="rates">

    <span class="hidden">{{ $book_rate = $book->rate }}</span>
    @for ($i=0; $i < $book_rate; $i++)
        <img src="/img/star.png" class="star-on">
    @endfor
    <span class="hidden">{{ $rate_off = 5 - ($book->rate) }}</span>
    @for ($i=0; $i < $rate_off; $i++)
        <img src="/img/star-off.png" class="star-off">
    @endfor
</span>
<!-- end of stars-->
