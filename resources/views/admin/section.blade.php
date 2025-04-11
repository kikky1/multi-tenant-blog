<section class="no-padding-top no-padding-bottom">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-6 col-sm-6">
          <div class="statistic-block block">

            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="title">
                <div class="icon"><i class="icon-user-1"></i></div><strong>All Users</strong>
              </div>
              <div class="number dashtext-1">{{$userCount}}</div>
            </div>

            <div class="progress progress-template">
              <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-sm-6">
          <div class="statistic-block block">
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="title">
                <div class="icon"><i class="icon-contract"></i></div><strong>Total Posts</strong>
              </div>
              <div class="number dashtext-2">{{$postCount}}</div>
            </div>
            <div class="progress progress-template">
              <div role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>