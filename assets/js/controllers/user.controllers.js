angular.module('ctrl', []).controller('PertanyaanController', PertanyaanController);

function PertanyaanController($scope, helperServices, PertanyaanService) {
	$scope.datas = [];
	$scope.model = {};
	$scope.dataPertanyaan = [];
	$scope.dataa = true;
	$scope.aspek = {};
	$scope.stepData = {};
	PertanyaanService.get().then((x) => {
		if (x.message) {
			swal('Information', x.message, 'info');
		} else {
			$scope.datas = x;
			$scope.showData();
			var today = new Date();
			var date = today.getFullYear() + '-0' + (today.getMonth() + 1) + '-' + today.getDate();
			$scope.periode = $scope.datas.periode.find((x) => new Date(x.selesai) >= new Date(date));
			setTimeout(() => {
				$('#smartwizard').smartWizard({
					selected: 0,
					theme: 'arrows',
					autoAdjustHeight: true,
					transitionEffect: 'fade',
					showStepURLhash: false
				});
			}, 500);
		}
	});
	$scope.showData = () => {
		// var set = $scope.datas.layanan[0];
		$scope.datas.layanan.forEach((set) => {
			set.pertanyaan = [];
			var grouplayanan = $scope.datas.group.filter((x) => x.id_layanan == set.id_layanan);
			var data = angular.copy($scope.datas.aspek);
			data.forEach((aspek) => {
				aspek.dataaspek = [];
				aspek.itemaspek.forEach((itemaspek) => {
					itemaspek.checked = false;
					grouplayanan.forEach((group) => {
						if (itemaspek.id_kuisioner == group.id_kuisioner) {
							itemaspek.id_grup = group.id_grup;
							aspek.dataaspek.push(angular.copy(itemaspek));
						}
					});
				});
				set.pertanyaan.push(angular.copy(aspek));
			});
			// set.pertanyaan = data;
		});
	};
	$scope.addItem = () => {
		var cek = $scope.dataPertanyaan.find(
			(x) => x.id_periode == $scope.model.id_periode && x.id_grup == $scope.model.id_grup
		);
		if (cek) {
			cek.id_range = $scope.model.id_range;
			$scope.model = {};
		} else {
			$scope.dataPertanyaan.push(angular.copy($scope.model));
			$scope.model = {};
		}
	};
	$scope.simpan = () => {
		$('#confirm').modal('hide');
		var status = true;
		$scope.datas.layanan.forEach((itemlayanan) => {
			itemlayanan.pertanyaan.forEach((item) => {
				item.dataaspek.forEach((element) => {
					var cek = $scope.dataPertanyaan.find((x) => x.id_grup == element.id_grup);
					if (!cek) status = false;
				});
			});
		});
		if (status) {
			PertanyaanService.post($scope.dataPertanyaan).then((x) => {
				swal('Information', 'Berhasil di simpan', 'success');
				$scope.datas = [];
				$scope.dataPertanyaan;
			});
		} else {
			swal('Information', 'Gagal Menyimpan anda belum menjawab semua pertanyaan', 'info');
		}
	};
}
