<div ng-app="apps" ng-controller="PertanyaanController">
  <div id="smartwizard">
    <ul>
      <li ng-repeat="item in datas.layanan"><a href="#step-{{$index+1}}">Group
          {{$index+1}}<br /><small>{{item.nama_layanan}}</small></a></li>
      <!-- <li><a href="#step-2">Step 2<br /><small>Personal Info</small></a></li>
            <li><a href="#step-3">Step 3<br /><small>Payment Info</small></a></li>
            <li><a href="#step-4">Step 4<br /><small>Confirm details</small></a></li> -->
    </ul>
    <div>
      <div ng-repeat="layanan in datas.layanan" id="step-{{$index+1}}">
        <div id="accordion">
          <div class="card" ng-repeat="itemaspek in layanan.pertanyaan">
            <div class="card-header" id="heading{{itemaspek.id_aspek}}">
              <h5 class="mb-0">
                <button ng-class="{'btn btn-link': $index==0, 'btn btn-link collapsed': $index !==0}"
                  data-toggle="collapse" data-target="#collapse{{itemaspek.id_aspek}}" aria-expanded="true"
                  aria-controls="collapse{{itemaspek.id_aspek}}">
                  {{itemaspek.nm_aspek}}
                </button>
              </h5>
            </div>

            <div id="collapse{{itemaspek.id_aspek}}" ng-class="{'collapse show': $index==0, 'collapse': $index!=0}"
              aria-labelledby="heading{{itemaspek.id_aspek}}" data-parent="#accordion">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-sm table-striped">
                    <tr>
                      <th width="30%">Pertanyaan</th>
                      <th class="text-center">Nilai</th>
                    </tr>
                    <tr ng-repeat="itempertanyaan in itemaspek.dataaspek">
                      <td>
                        {{itempertanyaan.pertanyaan}}
                      </td>
                      <td>

                      </td>
                    </tr>
                  </table>
                </div>

              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
</div>
