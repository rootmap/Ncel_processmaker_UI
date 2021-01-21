<div class="row">
  <div class="col-xl-3 col-md-6">
    <div class="card mini-stats">
      <div class="p-3 mini-stats-content">
        <div class="mb-4">
          <div class="float-right text-right">
            <p class="text-white-50" style="font-size: 25px; color: white !important;">Inbox</p>
          </div>
          <span class="peity-pie" data-peity='{ "fill": ["rgba(255, 255, 255, 0.8)", "rgba(255, 255, 255, 0.2)"]}'
            data-width="54" data-height="54">5/8</span>
        </div>
      </div>
      <div class="ml-3 mr-3">
        <a href="inbox">
          <div style="color: black;" class="bg-white p-3 mini-stats-desc rounded">
            <h5 class="float-right mt-0"><?=count($inbox->cases)?></h5>
            <h6 class="mt-0 mb-3">Total Case</h6>
            <p class="text-muted mb-0">Click here to check inbox</p>
          </div>
        </a>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="card mini-stats">
      <div class="p-3 mini-stats-content">
        <div class="mb-4">
          <div class="float-right text-right">
            <p class="text-white-50" style="font-size: 25px; color: white !important;">Draft</p>
          </div>
          <span class="peity-donut"
            data-peity='{ "fill": ["rgba(255, 255, 255, 0.8)", "rgba(255, 255, 255, 0.2)"], "innerRadius": 18, "radius": 32 }'
            data-width="54" data-height="54">2/5</span>
        </div>
      </div>
      <div class="ml-3 mr-3">
        <a href="draft">
          <div style="color: black;" class="bg-white p-3 mini-stats-desc rounded">
            <h5 class="float-right mt-0"><?=count($draft->cases)?></h5>
            <h6 class="mt-0 mb-3">Total Case</h6>
            <p class="text-muted mb-0">Click here to check draft</p>
          </div>
        </a>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="card mini-stats">
      <div class="p-3 mini-stats-content">
        <div class="mb-4">
          <div class="float-right text-right">
            <p class="text-white-50" style="font-size: 25px; color: white !important;">Participated</p>
          </div>
          <span class="peity-pie" data-peity='{ "fill": ["rgba(255, 255, 255, 0.8)", "rgba(255, 255, 255, 0.2)"]}'
            data-width="54" data-height="54">3/8</span>
        </div>
      </div>
      <div class="ml-3 mr-3">
        <a href="participated">
          <div style="color: black;" class="bg-white p-3 mini-stats-desc rounded">
            <h5 class="float-right mt-0"><?=count($participated->cases)?></h5>
            <h6 class="mt-0 mb-3">Total Case</h6>
            <p class="text-muted mb-0">Click here to check participated</p>
          </div>
        </a>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="card mini-stats">
      <div class="p-3 mini-stats-content">
        <div class="mb-4">
          <div class="float-right text-right">
            <p class="text-white-50" style="font-size: 25px; color: white !important;">Unassigned</p>
          </div>
          <span class="peity-donut"
            data-peity='{ "fill": ["rgba(255, 255, 255, 0.8)", "rgba(255, 255, 255, 0.2)"], "innerRadius": 18, "radius": 32 }'
            data-width="54" data-height="54">3/5</span>
        </div>
      </div>
      <div class="ml-3 mr-3">
        <a href="unassigned">
          <div style="color: black;" class="bg-white p-3 mini-stats-desc rounded">
            <h5 class="float-right mt-0"><?=count($unassigned->cases)?></h5>
            <h6 class="mt-0 mb-3">Total Case</h6>
            <p class="text-muted mb-0">Click here to check unassigned</p>
          </div>
        </a>
      </div>
    </div>
  </div>
</div><!-- end row -->