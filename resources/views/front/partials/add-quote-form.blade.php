<!-- add quote form -->
<form class="" action="{{ route('add-quote', $book->id) }}" method="post">
    {{ csrf_field() }}
    <textarea name="quote" rows="8" cols="80" placeholder="Quote..." class="form-control mt-4"></textarea>
    <div class="row d-flex justify-content-between mt-3">
        <div class="col-md-5">
          <input name="footer" type="text" class="form-control" placeholder="Footer">
        </div>
        <div class="col-md-5">
          <input name="cite" type="text" class="form-control" placeholder="Cite">
        </div>
        <button type="submit" class="btn btn-success mr-3" style="padding:8px;margin:1px;">
          Submit
        </button>
    </div>
</form> <!-- end of add quote form -->
