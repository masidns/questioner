<div  ng-app="apps" ng-controller="PertanyaanController">
    <steps class="col-sm-8">
        <step class="step1" name="first">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Step 1:</h3>
            </div>
            <div class="panel-body">
              <form>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email Address</label>
                  <input type="email" class="form-control" ng-model="stepData.email" id="exampleInputEmail1" placeholder="Email">
                </div>
              </form>
            </div>
            <div class="clearfix panel-footer">
              <button class="btn btn-success pull-right" step-next>Next <i class="glyphicon glyphicon-chevron-right"></i></button>
            </div>
          </div>
        </step>
        <step class="step2" name="second">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Step 2:</h3>
            </div>
            <div class="panel-body">
              <form>
                <div class="form-group">
                  <label for="exampleInputName">Enter Name</label>
                  <input type="text" class="form-control" ng-model="stepData.name" id="exampleInputName" placeholder="Name">
                </div>
              </form>
            </div>
            <div class="clearfix panel-footer">
              <button class="btn btn-danger pull-left" step-previous><i class="glyphicon glyphicon-chevron-left"></i> Prev</button>
              <button class="btn btn-success pull-right" step-next>Next <i class="glyphicon glyphicon-chevron-right"></i></button>
            </div>
          </div>
        </step>
        <step class="step3" name="third">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Step 3:</h3>
            </div>
            <div class="panel-body">
              <form>
                <div class="form-group">
                  <label for="exampleInputName">Enter Age</label>
                  <input type="number" class="form-control" ng-model="stepData.age" id="exampleInputAge" placeholder="Age"/>
                </div>
              </form>
            </div>
            <div class="clearfix panel-footer">
              <button class="btn btn-danger pull-left" step-previous><i class="glyphicon glyphicon-chevron-left"></i> Prev</button>
              <button class="btn btn-success pull-right" ng-click="submitFinal(stepData.age);">Complete <i class="glyphicon glyphicon-chevron-right"></i></button>
            </div>
          </div>
        </step>
      </steps>
</div>
