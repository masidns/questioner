angular
	.module('ctrl', [])
	.controller('HomeController', HomeController)
	.controller('RangeNilaiController', RangeNilaiController)
	.controller('AspekPenilaianController', AspekPenilaianController)
	.controller('layananController', layananController)
	.controller('QuestionerController', QuestionerController)
	.controller('PeriodeController', PeriodeController)
	.controller('GroupController', GroupController)
	.controller('GroupDetailController', GroupDetailController)
	.controller('LaporanController', LaporanController);

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
	$scope.showData = (value) => {
		var item = $scope.datas.layanan.find((x) => x.id_layanan == value.id_layanan);
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
		$datasets = angular.copy(set);
		for (let index = 0; index <= $datasets.length - 1; index++) {
			set[index].label = $datasets[($datasets.length - 1) - index].label;
		}
		console.log(set);
		$scope.grafik(labels, set, item);
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
	$scope.grafik = (labels, dataset, layanan) => {
		$('#myChart').remove(); // this is my <canvas> element
		$('.card-body').append(
			'<canvas id="myChart"class="chartjs" width="770" height="385"style="display: block; width: 770px; height: 385px;"><canvas>'
		);
		var ctx = document.getElementById('myChart').getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: labels,
				datasets: dataset
			},
			options: {
				title: {
					display: true,
					text: 'LAYANAN ' + layanan.nama_layanan.toUpperCase(),
					font: {
						size: 20
					}
				},
				responsive: true,
				maintainAspectRatio: false,
				legend: {
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

function RangeNilaiController($scope, RangeNilaiService) {
	$scope.datas = [];
	$scope.model = {};
	$scope.tombol = 'Simpan';
	RangeNilaiService.get().then((x) => {
		$scope.datas = x;
	});
	$scope.simpan = () => {
		swal({
			title: 'Information !!!',
			text: 'Anda yakin?',
			icon: 'info',
			buttons: true,
			dangerMode: false
		}).then((value) => {
			if ($scope.model.id_range) {
				RangeNilaiService.put($scope.model).then((x) => {
					swal('Information!!', 'Data Berhasil di Tambah', 'success');
					$scope.model = {};
				});
			} else {
				RangeNilaiService.post($scope.model).then((x) => {
					swal('Information!!', 'Data Berhasil di Tambah', 'success');
					$scope.model = {};
				});
			}
		});
	};
	$scope.edit = (item) => {
		$scope.model = angular.copy(item);
		$scope.tombol = 'Ubah';
	};
	$scope.clear = () => {
		$scope.model = {};
		$scope.tombol = 'Simpan';
	};
	$scope.hapus = (item) => {
		swal({
			title: 'Information !!!',
			text: 'Anda yakin?',
			icon: 'warning',
			buttons: true,
			dangerMode: true
		}).then((value) => {
			RangeNilaiService.delete(item.id_range).then((x) => {
				swal('Information!!', 'Data Berhasil di Hapus', 'success');
			});
		});
	};
}

function AspekPenilaianController($scope, AspekPenilaianService) {
	$scope.datas = [];
	$scope.model = {};
	$scope.tombol = 'Simpan';
	AspekPenilaianService.get().then((x) => {
		$scope.datas = x;
	});
	$scope.simpan = () => {
		swal({
			title: 'Information !!!',
			text: 'Anda yakin?',
			icon: 'info',
			buttons: true,
			dangerMode: false
		}).then((value) => {
			if ($scope.model.id_aspek) {
				AspekPenilaianService.put($scope.model).then((x) => {
					swal('Information!!', 'Data Berhasil di Tambah', 'success');
					$scope.model = {};
				});
			} else {
				AspekPenilaianService.post($scope.model).then((x) => {
					swal('Information!!', 'Data Berhasil di Tambah', 'success');
					$scope.model = {};
				});
			}
		});
	};
	$scope.edit = (item) => {
		$scope.model = angular.copy(item);
		$scope.tombol = 'Ubah';
	};
	$scope.clear = () => {
		$scope.model = {};
		$scope.tombol = 'Simpan';
	};
	$scope.hapus = (item) => {
		swal({
			title: 'Information !!!',
			text: 'Anda yakin?',
			icon: 'warning',
			buttons: true,
			dangerMode: true
		}).then((value) => {
			AspekPenilaianService.delete(item.id_aspek).then((x) => {
				swal('Information!!', 'Data Berhasil di Hapus', 'success');
			});
		});
	};

	$scope.prosesModal = () => {
		alert("Data Tersimpan");

	}

	$scope.panggil = (param) => {
		console.log(param);
	}
}

function layananController($scope, LayananService) {
	$scope.datas = [];
	$scope.model = {};
	$scope.tombol = 'Simpan';
	LayananService.get().then((x) => {
		$scope.datas = x;
	});
	$scope.simpan = () => {
		swal({
			title: 'Information !!!',
			text: 'Anda yakin?',
			icon: 'info',
			buttons: true,
			dangerMode: false
		}).then((value) => {
			if ($scope.model.id_layanan) {
				LayananService.put($scope.model).then((x) => {
					swal('Information!!', 'Data Berhasil di Tambah', 'success');
					$scope.model = {};
				});
			} else {
				LayananService.post($scope.model).then((x) => {
					swal('Information!!', 'Data Berhasil di Tambah', 'success');
					$scope.model = {};
				});
			}
		});
	};
	$scope.edit = (item) => {
		$scope.model = angular.copy(item);
		$scope.tombol = 'Ubah';
	};
	$scope.clear = () => {
		$scope.model = {};
		$scope.tombol = 'Simpan';
	};
	$scope.hapus = (item) => {
		swal({
			title: 'Information !!!',
			text: 'Anda yakin?',
			icon: 'warning',
			buttons: true,
			dangerMode: true
		}).then((value) => {
			LayananService.delete(item.id_layanan).then((x) => {
				swal('Information!!', 'Data Berhasil di Hapus', 'success');
			});
		});
	};


}

function QuestionerController($scope, QuestionerService) {
	$scope.datas = [];
	$scope.model = {};
	$scope.aspek = {};
	$scope.tombol = 'Simpan';
	QuestionerService.get().then((x) => {
		$scope.datas = x;
	});
	$scope.simpan = () => {
		swal({
			title: 'Information !!!',
			text: 'Anda yakin?',
			icon: 'info',
			buttons: true,
			dangerMode: false
		}).then((value) => {
			if ($scope.model.id_kuisioner) {
				QuestionerService.put($scope.model).then((x) => {
					swal('Information!!', 'Data Berhasil di Tambah', 'success');
					$scope.model = {};
					$scope.aspek = {};
				});
			} else {
				QuestionerService.post($scope.model).then((x) => {
					swal('Information!!', 'Data Berhasil di Tambah', 'success');
					$scope.model = {};
					$scope.aspek = {};
				});
			}
		});
	};
	$scope.edit = (item) => {
		$scope.model = angular.copy(item);
		$scope.tombol = 'Ubah';
		$scope.aspek = $scope.datas.aspek.find((x) => x.id_aspek == item.id_aspek);
		console.log($scope.aspek);
	};
	$scope.clear = () => {
		$scope.model = {};
		$scope.tombol = 'Simpan';
	};
	$scope.hapus = (item) => {
		swal({
			title: 'Information !!!',
			text: 'Anda yakin?',
			icon: 'warning',
			buttons: true,
			dangerMode: true
		}).then((value) => {
			QuestionerService.delete(item.id_kuisioner).then((x) => {
				swal('Information!!', 'Data Berhasil di Hapus', 'success');
			});
		});
	};
}

function PeriodeController($scope, PeriodeService) {
	$scope.datas = [];
	$scope.model = {};
	$scope.dataa = true;
	$scope.aspek = {};
	$scope.tombol = 'Simpan';
	$scope.tahunakademik = '';
	$scope.formSimpan = false;
	PeriodeService.get().then((x) => {
		$scope.datas = x;
		var data = $scope.datas.periode.find(
			(x) => x.id_thakademik == $scope.datas.tahunakademikaktive.idtahunakademik
		);
		var today = new Date();
		var date = today.getFullYear() + '-0' + (today.getMonth() + 1) + '-' + today.getDate();
		if (data && new Date(data.selesai) > new Date(date)) {
			$scope.formSimpan = true;
		} else {
			$scope.model.id_thakademik = $scope.datas.tahunakademikaktive.idtahunakademik;
			$scope.tahunakademik =
				$scope.datas.tahunakademikaktive.thakademik + ' - ' + $scope.datas.tahunakademikaktive.gg;
			$scope.formSimpan = false;
		}
	});
	$scope.setTahunAkademik = (item) => {
		var data = $scope.datas.tahunakademik.find((x) => x.idtahunakademik == item);
		return data.thakademik + ' - ' + data.gg;
	};
	$scope.simpan = (item) => {
		swal({
			title: 'Information !!!',
			text: 'Anda yakin?',
			icon: 'info',
			buttons: true,
			dangerMode: false
		}).then((value) => {
			if ($scope.model.id_periode) {
				var today = new Date();
				$scope.model.selesai = today.getFullYear() + '-0' + (today.getMonth() + 1) + '-' + today.getDate();
				PeriodeService.put($scope.model).then((x) => {
					swal('Information!!', 'Data Berhasil di Tambah', 'success');
					$scope.model = {};
					$scope.formSimpan = false;
				});
			} else {
				var today = $scope.model.mulai;
				$scope.model.mulai = today.getFullYear() + '-0' + (today.getMonth() + 1) + '-' + today.getDate();
				var today = $scope.model.selesai;
				$scope.model.selesai = today.getFullYear() + '-0' + (today.getMonth() + 1) + '-' + today.getDate();
				PeriodeService.post($scope.model).then((x) => {
					swal('Information!!', 'Data Berhasil di Tambah', 'success');
					$scope.model = {};
					$scope.formSimpan = true;
				});
			}
		});
	};
	$scope.edit = (item) => {
		$scope.model = angular.copy(item);
		$scope.tombol = 'Ubah';
		var th = $scope.datas.tahunakademik.find((x) => x.idtahunakademik == item.id_thakademik);
		$scope.tahunakademik = th.thakademik + ' - ' + th.gg;
		$scope.formSimpan = true;
	};
	$scope.clear = () => {
		$scope.model = {};
		$scope.tombol = 'Simpan';
	};
	$scope.hapus = (item) => {
		swal({
			title: 'Information !!!',
			text: 'Anda yakin?',
			icon: 'warning',
			buttons: true,
			dangerMode: true
		}).then((value) => {
			PeriodeService.delete(item.id_kuisioner).then((x) => {
				swal('Information!!', 'Data Berhasil di Hapus', 'success');
			});
		});
	};
}

function GroupController($scope, GroupService, helperServices) {
	$scope.datas = [];
	$scope.model = {};
	$scope.dataa = true;
	$scope.aspek = {};
	$scope.tombol = 'Simpan';
	$scope.tahunakademik = '';
	$scope.formSimpan = false;
	GroupService.get().then((x) => {
		$scope.datas = x;
	});
	$scope.setTahunAkademik = (item) => {
		var data = $scope.datas.tahunakademik.find((x) => x.idtahunakademik == item);
		return data.thakademik + ' - ' + data.gg;
	};
	$scope.simpan = (item) => {
		swal({
			title: 'Information !!!',
			text: 'Anda yakin?',
			icon: 'info',
			buttons: true,
			dangerMode: false
		}).then((value) => {
			if ($scope.model.idsetgroup) {
				GroupService.put($scope.model).then((x) => {
					swal('Information!!', 'Data Berhasil di Tambah', 'success');
					$scope.model = {};
					$scope.formSimpan = false;
				});
			} else {
				GroupService.post($scope.model).then((x) => {
					swal('Information!!', 'Data Berhasil di Tambah', 'success');
					$scope.model = {};
					$scope.formSimpan = true;
				});
			}
		});
	};
	$scope.edit = (item) => {
		$scope.model = angular.copy(item);
		$scope.tombol = 'Ubah';
		var th = $scope.datas.tahunakademik.find((x) => x.idtahunakademik == item.id_thakademik);
		$scope.tahunakademik = th.thakademik + ' - ' + th.gg;
		$scope.formSimpan = true;
	};
	$scope.clear = () => {
		$scope.model = {};
		$scope.tombol = 'Simpan';
	};
	$scope.detail = (item) => {
		document.location.href = helperServices.url + '/group/detail/' + item.idsetgroup;
	};
}

function GroupDetailController($scope, GroupService, helperServices) {
	$scope.datas = [];
	$scope.model = {};
	$scope.dataa = true;
	$scope.aspek = {};
	$scope.tombol = 'Simpan';
	$scope.tahunakademik = '';
	$scope.formSimpan = false;
	GroupService.getdetail().then((x) => {
		$scope.datas = x;
		$scope.showData();
	});
	$scope.showData = (item) => {
		if (item) {
			var grouplayanan = $scope.datas.group.filter((x) => x.id_layanan == item.id_layanan);
			var data = angular.copy($scope.datas.aspek);
			data.forEach((aspek) => {
				aspek.itemaspek.forEach((itemaspek) => {
					itemaspek.checked = false;
					grouplayanan.forEach((group) => {
						if (itemaspek.id_kuisioner == group.id_kuisioner) {
							itemaspek.checked = true;
						}
					});
				});
			});
			item.pertanyaan = data;
		} else {
			var set = $scope.datas.layanan[0];
			var grouplayanan = $scope.datas.group.filter((x) => x.id_layanan == set.id_layanan);
			var data = angular.copy($scope.datas.aspek);
			data.forEach((aspek) => {
				aspek.itemaspek.forEach((itemaspek) => {
					itemaspek.checked = false;
					grouplayanan.forEach((group) => {
						if (itemaspek.id_kuisioner == group.id_kuisioner) {
							itemaspek.checked = true;
						}
					});
				});
			});
			set.pertanyaan = data;
		}
	};
	$scope.simpan = (item) => {
		GroupService.postitem($scope.model).then((x) => {
			// swal('Information!!', 'Data Berhasil di Tambah', 'success');
			$scope.model = {};
			$scope.formSimpan = true;
		});
	};
	$scope.edit = (item) => {
		$scope.model = angular.copy(item);
		$scope.tombol = 'Ubah';
		var th = $scope.datas.tahunakademik.find((x) => x.idtahunakademik == item.id_thakademik);
		$scope.tahunakademik = th.thakademik + ' - ' + th.gg;
		$scope.formSimpan = true;
	};
	$scope.clear = () => {
		$scope.model = {};
		$scope.tombol = 'Simpan';
	};
	$scope.detail = (item) => {
		document.location.href = helperServices.url + '/group/detail';
	};
}

function LaporanController($scope, HomeServices) {
	$scope.datas = [];
	$scope.presentase = 0;
	$scope.dataPrint = [];
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
	$scope.showData = (value) => {
		var item = $scope.datas.datalayanan.find((x) => x.id_layanan == value.id_layanan);
		var ceklebel = true;
		var labels = Object.keys(item.aspek);
		item = Object.values(item.aspek);
		var set = [];
		$scope.datas.rangenilai.forEach((nilai) => {
			var itemdata = {};
			itemdata.label = nilai.deskripsi;
			itemdata.data = [];
			for (let index = 0; index < item.length; index++) {
				var valueaspek = Object.values(item[index]);
				var totalnilai = 0;
				valueaspek.forEach((pertanyaan) => {
					totalnilai +=
						$scope.datas.nilaikepuasan.filter(
							(x) => x.id_grup === pertanyaan.id_grup && x.id_range === nilai.id_range
						).length;
				});
				itemdata.data.push(angular.copy(totalnilai / (parseFloat($scope.datas.penilai) * valueaspek.length) * 100));
			}
			// forEach((valueaspek) => {});
			ceklebel = false;
			itemdata.backgroundColor = random_rgba(1)[0];
			set.push(angular.copy(itemdata));
		});
		$datasets = angular.copy(set);
		for (let index = 0; index <= $datasets.length - 1; index++) {
			set[index].label = $datasets[index].label;
		}
		console.log(set);
		$scope.grafik(labels, set, value);
	};
	$scope.grafik = (labels, dataset, layanan) => {
		$scope.dataPrint = [];
		$('#myChart').remove(); // this is my <canvas> element
		$('.card-body').append(
			'<canvas id="myChart"class="chartjs" width="770" height="385"style="display: block; width: 100%; height: 385px;"><canvas>'
		);
		var ctx = document.getElementById('myChart').getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: labels,
				datasets: dataset
			},
			options: {
				title: {
					display: true,
					text: 'LAYANAN ' + layanan.nama_layanan.toUpperCase(),
					font: {
						size: 20
					}
				},
				responsive: true,
				maintainAspectRatio: false,
				legend: {
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
		for (let itemlayanan = 0; itemlayanan < labels.length; itemlayanan++) {
			var items = {};
			items.aspek = labels[itemlayanan];
			items.data = [];
			$scope.dataPrint.push(angular.copy(items));
		}
		for (let index = 0; index < dataset.length; index++) {
			for (let index1 = 0; index1 < dataset[index].data.length; index1++) {
				$scope.dataPrint[index1].data.push(dataset[index].data[index1]);
			}
		}
	};
	$scope.grafikHight = (labels, dataset, layanan) => {
		$scope.dataPrint = [];
		// $('#myChart').remove(); // this is my <canvas> element
		// $('.card-body').append(
		// 	'<div id="myChart" width="770" height="385" style="display: block; width: 80%; height: 420px; margin: auto;"></div>'
		// );
		var myChart = Highcharts.chart('myChart', {
			chart: {
				type: 'column'
			},
			title: {
				text: 'LAYANAN ' + layanan.nama_layanan.toUpperCase()
			},
			xAxis: {
				categories: labels
			},
			yAxis: {
				title: {
					text: 'Persetase (%)'
				}
			},
			plotOptions: {
				column: {
					borderRadius: 5
				}
			},
			series: dataset,
			responsive: {
				rules: [
					{
						chartOptions: {
							legend: {
								align: 'center',
								verticalAlign: 'bottom',
								layout: 'horizontal'
							},
							yAxis: {
								labels: {
									align: 'left',
									x: 0,
									y: -5
								},
								title: {
									text: null
								}
							},
							subtitle: {
								text: null
							},
							credits: {
								enabled: false
							}
						}
					}
				]
			}
		});
		for (let itemlayanan = 0; itemlayanan < labels.length; itemlayanan++) {
			var items = {};
			items.aspek = labels[itemlayanan];
			items.data = [];
			$scope.dataPrint.push(angular.copy(items));
		}
		for (let index = 0; index < dataset.length; index++) {
			for (let index1 = 0; index1 < dataset[index].data.length; index1++) {
				$scope.dataPrint[index1].data.push(dataset[index].data[index1]);
			}
		}
		console.log($scope.dataPrint);
	};
	$scope.print = () => {
		window.print();
	};
	$scope.set = (item) => {
		item.data;
	};
}
