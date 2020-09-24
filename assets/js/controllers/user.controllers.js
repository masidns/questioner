angular
	.module('ctrl', [])
	.controller('HomeController', HomeController)
	.controller('PertanyaanController', PertanyaanController);

function HomeController($scope, HomeServices) {
	$scope.datas = [];
	$scope.presentase = 0;
	HomeServices.get().then((x) => {
		$scope.datas = x;
		$scope.showData($scope.datas.layanan[0]);
		HomeServices.getMahasiswa().then((mahasiswa) => {
			$scope.datas.mahasiswa = mahasiswa;
			$scope.presentase = (parseFloat(
				$scope.datas.penilai / $scope.datas.mahasiswa.filter((x) => x.statuskul == 'AKTIF').length
			) * 100).toFixed(3);
		});
	});
	var random_rgba = (length) => {
		var color = [];
		for (let index = 0; index < length; index++) {
			var o = Math.round,
				r = Math.random,
				s = 255;
			color.push('rgba(' + o(r() * s) + ',' + o(r() * s) + ',' + o(r() * s) + ',' + 0.7 + ')');
		}
		// console.log(color);
		return color;
	};
	$scope.showData = (item) => {
		var ceklebel = true;
		var labels = [];
		var set = [];
		$scope.datas.rangenilai.forEach((nilai) => {
			var itemdata = {};
			itemdata.label = nilai.deskripsi;
			itemdata.data = [];
			$scope.datas.aspek.forEach((valueaspek) => {
				if (ceklebel) {
					labels.push(valueaspek.nm_aspek);
				}
				var totalnilai = 0;
				valueaspek.itemaspek.forEach((pertanyaan) => {
					var cek = $scope.datas.group.find(
						(x) => x.id_kuisioner === pertanyaan.id_kuisioner && x.id_layanan === item.id_layanan
					);
					if (cek) {
						totalnilai +=
							$scope.datas.nilaikepuasan.filter(
								(x) => x.id_grup === cek.id_grup && x.id_range === nilai.id_range
							).length /
							parseFloat($scope.datas.penilai) *
							100;
						// console.log(
						// 	$scope.datas.nilaikepuasan.filter(
						// 		(x) => x.id_grup === cek.id_grup && x.id_range === nilai.id_range
						// 	).length /
						// 		parseFloat($scope.datas.penilai) *
						// 		100
						// );
					}
				});
				itemdata.data.push(angular.copy(totalnilai / valueaspek.itemaspek.length));
			});
			ceklebel = false;
			itemdata.backgroundColor = random_rgba(1)[0];
			set.push(angular.copy(itemdata));
		});
		console.log(set);
		$scope.grafik(labels, set);
		// var dataset = [];
		// for (let index = 0; index < $scope.datas.rangenilai.length; index++) {
		// 	var backgroundColor = random_rgba(1)[0];
		// 	var itemm = {};
		// 	itemm.label = $scope.datas.rangenilai[index].deskripsi;
		// 	itemm.data = [];
		// 	for (let index1 = 0; index1 < set.length; index1++) {
		// 		itemm.data.push(set[index1][index]);
		// 	}
		// 	itemm.backgroundColor = backgroundColor;
		// 	dataset.push(angular.copy(itemm));
		// }
		// $scope.grafik(labels, dataset);
	};
	$scope.grafik = (labels, dataset) => {
		var ctx = document.getElementById('myChart').getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: labels,
				datasets: dataset
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: true,
					position: 'top'
				},
				scales: {
					xAxes: [
						{
							display: true,
							scaleLabel: {
								display: true,
								labelString: 'Aspek Penilaian'
							}
						}
					],
					yAxes: [
						{
							ticks: {
								beginAtZero: true
							},
							display: true,
							scaleLabel: {
								display: true,
								labelString: 'Nilai'
							}
						}
					]
				}
			}
		});
	};
}
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
