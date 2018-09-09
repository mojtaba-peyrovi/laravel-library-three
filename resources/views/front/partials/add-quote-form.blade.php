<style media="screen">
.quote-form{

    list-style-type:none;
    cursor:pointer;
    -moz-border-radius:0 10px 0 10px;
    margin:2px;
    padding:5px 5px 5px 5px;
}

.quote-form-toggle div{
    cursor: auto;
    display: none;
    font-size: 13px;
    padding: 5px 0 5px 20px;
    text-decoration: none;
}
.quote-form-toggle div a{
    color:#000000;
    font-weight:bold;
}
.quote-form div:hover{
    text-decoration:none !important;
}
.quote-form:before {
    content: "+";
    padding:10px 10px 10px 0;
    color:green;
    font-weight:bold;
}
.quote-form.active:before {
    content: "-";
    padding:10px 10px 10px 0;
    color:green;
    font-weight:bold;
}
#toggle{
    width:100%;
    margin:0 auto;
}
</style>
<!-- accordion -->
<div id="toggle" style="margin-bottom:-20px;" class="mt-4">
    <ul class="quote-form-toggle" style="margin-left:-40px;">
        <li class="quote-form">New Quote</li>
        <div>
            <!-- add quote form -->
            <form class="" action="{{ route('add-quote', $book->id) }}" method="post">
                {{ csrf_field() }}
                <textarea name="quote" rows="6" cols="80" placeholder="Quote..." class="form-control mt-4"></textarea>

                <div style="display:flex;align-items: stretch;margin-left:-20px;">
                    <input name="footer" type="text" class="form-control mt-2 mr-2" placeholder="Footer">
                    <input name="cite" type="text" class="form-control mt-2" placeholder="Cite">
                </div>
                <button type="submit" class="btn btn-success mr-3 float-right" style="padding:8px;margin-right:-30px;">
                  Submit
                </button>




            </form> <!-- end of add quote form -->
        </div>
    </ul>
</div> <!--end of accordion-->
