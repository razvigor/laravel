@extends('layouts.app', ['activePage' => 'dashboard', 'menuParent' => 'dashboard', 'titlePage' => __('Početna')])

@section('content')
<div class="content">
  <div class="content">
    <div class="container-fluid">

      <!-- <button type="button" class="btn btn-round btn-default dropdown-toggle btn-link" data-toggle="dropdown">
  7 days
  </button> -->
      {{--
      <div class="row">
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-rose" data-header-animation="true">
              <div class="ct-chart" id="websiteViewsChart"></div>
            </div>
            <div class="card-body">
              <div class="card-actions">
                <button type="button" class="btn btn-danger btn-link fix-broken-card">
                  <i class="material-icons">build</i> Fix Header!
                </button>
                <button type="button" class="btn btn-info btn-link" rel="tooltip" data-placement="bottom" title="Refresh">
                  <i class="material-icons">refresh</i>
                </button>
                <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Change Date">
                  <i class="material-icons">edit</i>
                </button>
              </div>
              <h4 class="card-title">Website Views</h4>
              <p class="card-category">Last Campaign Performance</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> campaign sent 2 days ago
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-success" data-header-animation="true">
              <div class="ct-chart" id="dailySalesChart"></div>
            </div>
            <div class="card-body">
              <div class="card-actions">
                <button type="button" class="btn btn-danger btn-link fix-broken-card">
                  <i class="material-icons">build</i> Fix Header!
                </button>
                <button type="button" class="btn btn-info btn-link" rel="tooltip" data-placement="bottom" title="Refresh">
                  <i class="material-icons">refresh</i>
                </button>
                <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Change Date">
                  <i class="material-icons">edit</i>
                </button>
              </div>
              <h4 class="card-title">Daily Sales</h4>
              <p class="card-category">
                <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> updated 4 minutes ago
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-info" data-header-animation="true">
              <div class="ct-chart" id="completedTasksChart"></div>
            </div>
            <div class="card-body">
              <div class="card-actions">
                <button type="button" class="btn btn-danger btn-link fix-broken-card">
                  <i class="material-icons">build</i> Fix Header!
                </button>
                <button type="button" class="btn btn-info btn-link" rel="tooltip" data-placement="bottom" title="Refresh">
                  <i class="material-icons">refresh</i>
                </button>
                <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Change Date">
                  <i class="material-icons">edit</i>
                </button>
              </div>
              <h4 class="card-title">Completed Tasks</h4>
              <p class="card-category">Last Campaign Performance</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> campaign sent 2 days ago
              </div>
            </div>
          </div>
        </div>
      </div>
      --}}
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">weekend</i>
              </div>
              <p class="card-category">Proizvodi</p>
              <h3 class="card-title">184</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-danger">warning</i>
                <a href="#normativ">Više podataka...</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-rose card-header-icon">
              <div class="card-icon">
                <i class="material-icons">chrome_reader_mode</i>
              </div>
              <p class="card-category">Radni nalozi</p>
              <h3 class="card-title">75.521</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">local_offer</i> Tracked from Google Analytics
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="fa fa-handshake-o"></i>
              </div>
              <p class="card-category">Kupci</p>
              <h3 class="card-title">17</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i> U periodu 2018-2021
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="fa fa-drivers-license-o"></i>
              </div>
              <p class="card-category">Zaposleni</p>
              <h3 class="card-title">120</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">update</i> 2021
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card ">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons"></i>
              </div>
              <h4 class="card-title">Države sa najvećim obimom prodaje</h4>
            </div>
            <div class="card-body ">
              <div class="row">
                <div class="col-md-6">
                  <div class="table-responsive table-sales">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td>
                            <div class="flag">
                            <img src="{{ asset('material')}}/img/flags/US.png"> </div>
                          </td>
                          <td>Republika Srbija</td>
                          <td class="text-right">
                            4.400
                          </td>
                          <td class="text-right">
                            33%
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="flag">
                              <img src="{{ asset('material')}}/img/flags/DE.png"> </div>
                          </td>
                          <td>Germany</td>
                          <td class="text-right">
                            1.300
                          </td>
                          <td class="text-right">
                            20.43%
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="flag">
                              <img src="{{ asset('material')}}/img/flags/AU.png"> </div>
                          </td>
                          <td>Australia</td>
                          <td class="text-right">
                            760
                          </td>
                          <td class="text-right">
                            10.35%
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="flag">
                              <img src="{{ asset('material')}}/img/flags/GB.png"> </div>
                          </td>
                          <td>United Kingdom</td>
                          <td class="text-right">
                            690
                          </td>
                          <td class="text-right">
                            7.87%
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="flag">
                              <img src="{{ asset('material')}}/img/flags/RO.png"> </div>
                          </td>
                          <td>Romania</td>
                          <td class="text-right">
                            600
                          </td>
                          <td class="text-right">
                            5.94%
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="flag">
                              <img src="{{ asset('material')}}/img/flags/BR.png"> </div>
                          </td>
                          <td>Brasil</td>
                          <td class="text-right">
                            550
                          </td>
                          <td class="text-right">
                            4.34%
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="flag">
                              <img src="{{ asset('material')}}/img/flags/AU.png"> </div>
                          </td>
                          <td>Bugarska</td>
                          <td class="text-right">
                            140
                          </td>
                          <td class="text-right">
                            2.74%
                          </td>
                        </tr>                        
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-6 ml-auto mr-auto">
                  <div id="worldMap" style="height: 300px;"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{--
      <h3>Manage Listings</h3>
      <br>
      <div class="row">
        <div class="col-md-4">
          <div class="card card-product">
            <div class="card-header card-header-image" data-header-animation="true">
              <a href="#pablo">
                <img class="img" src="{{ asset('material')}}/img/card-2.jpg">
              </a>
            </div>
            <div class="card-body">
              <div class="card-actions text-center">
                <button type="button" class="btn btn-danger btn-link fix-broken-card">
                  <i class="material-icons">build</i> Fix Header!
                </button>
                <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="View">
                  <i class="material-icons">art_track</i>
                </button>
                <button type="button" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="Edit">
                  <i class="material-icons">edit</i>
                </button>
                <button type="button" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="Remove">
                  <i class="material-icons">close</i>
                </button>
              </div>
              <h4 class="card-title">
                <a href="#pablo">Cozy 5 Stars Apartment</a>
              </h4>
              <div class="card-description">
                The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.
              </div>
            </div>
            <div class="card-footer">
              <div class="price">
                <h4>$899/night</h4>
              </div>
              <div class="stats">
                <p class="card-category"><i class="material-icons">place</i> Barcelona, Spain</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-product">
            <div class="card-header card-header-image" data-header-animation="true">
              <a href="#pablo">
                <img class="img" src="{{ asset('material')}}/img/card-3.jpg">
              </a>
            </div>
            <div class="card-body">
              <div class="card-actions text-center">
                <button type="button" class="btn btn-danger btn-link fix-broken-card">
                  <i class="material-icons">build</i> Fix Header!
                </button>
                <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="View">
                  <i class="material-icons">art_track</i>
                </button>
                <button type="button" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="Edit">
                  <i class="material-icons">edit</i>
                </button>
                <button type="button" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="Remove">
                  <i class="material-icons">close</i>
                </button>
              </div>
              <h4 class="card-title">
                <a href="#pablo">Office Studio</a>
              </h4>
              <div class="card-description">
                The place is close to Metro Station and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the night life in London, UK.
              </div>
            </div>
            <div class="card-footer">
              <div class="price">
                <h4>$1.119/night</h4>
              </div>
              <div class="stats">
                <p class="card-category"><i class="material-icons">place</i> London, UK</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-product">
            <div class="card-header card-header-image" data-header-animation="true">
              <a href="#pablo">
                <img class="img" src="{{ asset('material')}}/img/card-1.jpg">
              </a>
            </div>
            <div class="card-body">
              <div class="card-actions text-center">
                <button type="button" class="btn btn-danger btn-link fix-broken-card">
                  <i class="material-icons">build</i> Fix Header!
                </button>
                <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="View">
                  <i class="material-icons">art_track</i>
                </button>
                <button type="button" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="Edit">
                  <i class="material-icons">edit</i>
                </button>
                <button type="button" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="Remove">
                  <i class="material-icons">close</i>
                </button>
              </div>
              <h4 class="card-title">
                <a href="#pablo">Beautiful Castle</a>
              </h4>
              <div class="card-description">
                The place is close to Metro Station and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Milan.
              </div>
            </div>
            <div class="card-footer">
              <div class="price">
                <h4>$459/night</h4>
              </div>
              <div class="stats">
                <p class="card-category"><i class="material-icons">place</i> Milan, Italy</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      --}}
    </div>
  </div>
</div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

      md.initVectorMap();

    });
  </script>
@endpush