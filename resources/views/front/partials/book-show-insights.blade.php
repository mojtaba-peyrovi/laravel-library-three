<style media="screen">
    .progress-bar {
        color:black;
    }
    .isnight-row{

    }
    .insight-row img {
        width: 15px;
        height: 15px;
        position: relative;
        top: 17px;
    }
    .progress{
        width: 85%;
        position: relative;
        left: 35px;
    }
    .insight-row{
        margin-top: -10px;
    }
    .insight-row span {
        font-size: 12px;
        font-weight: 500;
        position: relative;
        top:18px;
        left:3px;
    }
    #progress-test{
        margin-top:-12px;
        font-weight:400;
        font-size: 10px;
        /* color:grey; */
    }
    .book-review-chart{
        /* margin-bottom: 150px; */
        display: flex;
        justify-content: center;
    }
    .popularity {
        font-family: 'Lobster', cursive;
        font-size: 25px;
        text-align: center;
        margin-top: -10px;
        margin-bottom: 20px;
    }
</style>
<div class="bg-grey-lighter">
    <!-- book-statistics -->
    <div class="about-book-title">Review Insights</div>
    <hr>
    <div class="popularity">
        Popularity
    </div>
    <!-- book review -->
    <div class="book-review-chart">
        <div class="c100 p{{ $popularity }}">
          <span>{{ $popularity }}%</span>
          <div class="slice">
            <div class="bar"></div>
            <div class="fill"></div>
          </div>
        </div>
    </div>
     <!-- end of book review -->
        <hr>
        <div class="book-show-insights">
            <div class="insight-row" >
                <img src="{{ asset('img/star.png') }}">
                <span class="text-warning">5</span>
                <div class="progress">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $five }}%" aria-valuenow="{{ $five }}" aria-valuemin="0" aria-valuemax="100">
                      <div id="progress-test">%{{ $five }}</div>
                  </div>
                </div>
            </div>

            <div class="insight-row" >
                <img src="{{ asset('img/star.png') }}">
                <span class="text-warning">4</span>
                <div class="progress">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $four }}%" aria-valuenow="{{ $four }}" aria-valuemin="0" aria-valuemax="100">
                      <div id="progress-test">%{{ $four }}</div>
                  </div>
                </div>
            </div>

            <div class="insight-row" >
                <img src="{{ asset('img/star.png') }}">
                <span class="text-warning">3</span>
                <div class="progress">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $three }}%" aria-valuenow="{{ $three }}" aria-valuemin="0" aria-valuemax="100">
                      <div id="progress-test">%{{ $three }}</div>
                  </div>
                </div>
            </div>

            <div class="insight-row" >
                <img src="{{ asset('img/star.png') }}">
                <span class="text-warning">2</span>
                <div class="progress">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $two }}%" aria-valuenow="{{ $two }}" aria-valuemin="0" aria-valuemax="100">
                      <div id="progress-test">%{{ $two }}</div>
                  </div>
                </div>
            </div>
            <div class="insight-row" >
                <img src="{{ asset('img/star.png') }}">
                <span class="text-warning">1</span>
                <div class="progress">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $one }}%" aria-valuenow="{{ $one }}" aria-valuemin="0" aria-valuemax="100">
                      <div id="progress-test">%{{ $one }}</div>
                  </div>
                </div>
            </div>
        </div>
    <!-- end of review insights -->
</div>
