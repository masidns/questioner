angular.module('ctrl', [])
    .controller('PertanyaanController', PertanyaanController);


function PertanyaanController($scope, helperServices) {
    $scope.datas = [];
    $scope.model = {};
    $scope.dataa = true;
    $scope.aspek = {};
    $scope.stepData = {};
		$scope.submitFinal = function(age) {
		    console.log(age);
		    $scope.stepData.age = age;
		    console.log($scope.stepData);
		}
}