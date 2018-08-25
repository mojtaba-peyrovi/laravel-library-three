@if ($book->format == 'Book')
    <span>
        <img src="/img/book-badge.png" alt="" style="width:30px;">
    </span>
@elseif ($book->format == 'Ebook')
    <span>
        <img src="/img/ebook-badge.png" alt="" style="width:30px;">
    </span>
@elseif ($book->format == 'Audio')
    <span>
        <img src="/img/audio-book-badge.png" alt="" style="width:30px;">
    </span>

@endif
