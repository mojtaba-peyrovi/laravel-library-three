
<!-- accordion -->
<div id="toggle" style="margin-bottom:-20px;" class="">
    <ul class="quote-form-toggle">
        <li class="quote-form">New Quote</li>
        <div>
            <!-- add quote form -->
            <form class="" action="{{ route('add-quote', $book->id) }}" method="post">
                {{ csrf_field() }}
                <textarea name="quote" rows="6" cols="80" placeholder="Quote..." class="form-control mt-4"></textarea>
                <div class="row d-flex justify-content-between mt-3">
                    <div class="col-md-5">
                      <input name="footer" type="text" class="form-control" placeholder="Footer">
                    </div>
                    <div class="col-md-5">
                      <input name="cite" type="text" class="form-control" placeholder="Cite">
                    </div>
                    <button type="submit" class="btn btn-success mr-3 float-right" style="padding:8px;margin:1px;">
                      Submit
                    </button>
                </div>
            </form> <!-- end of add quote form -->
        </div>
    </ul>
</div> <!--end of accordion-->
