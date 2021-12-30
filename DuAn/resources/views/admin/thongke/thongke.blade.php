@extends('admin.layouts.app')

@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">3 Best Selling Item :</h2>
                @foreach ($mathangbanchay as $item)
                  <h5 class="card-title">{{ $item ->name}}</h5>
                @endforeach
            </div>
        </div>
    </div>
        <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">3 Slowest Selling Item :</h2>
                @foreach ($mathangbancham as $item)
                  <h5 class="card-title">{{ $item ->name}}</h5>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">This Year's Revenue Statistics</h5>

                <!-- Bar Chart -->
                <canvas id="barChart" style="max-height: 400px;"></canvas>
                <script>
                    var thongke_theothang = {!! json_encode($data_product_theothang, JSON_HEX_TAG) !!};
                    var thang1 = thongke_theothang[1];
                    var thang2 = thongke_theothang[2];
                    var thang3 = thongke_theothang[3];
                    var thang4 = thongke_theothang[4];
                    var thang5 = thongke_theothang[5];
                    var thang6 = thongke_theothang[6];
                    var thang7 = thongke_theothang[7];
                    var thang8 = thongke_theothang[8];
                    var thang9 = thongke_theothang[9];
                    var thang10 = thongke_theothang[10];
                    var thang11 = thongke_theothang[11];
                    var thang12 = thongke_theothang[12];
                    document.addEventListener("DOMContentLoaded", () => {
                        new Chart(document.querySelector('#barChart'), {
                            type: 'bar',
                            data: {
                                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'Augus',
                                    'September', 'October', 'November', 'December'
                                ],
                                datasets: [{
                                    label: 'Bar Chart',
                                    data: [thang1, thang2, thang3, thang4, thang5, thang6, thang7, thang8,
                                        thang9, thang10, thang11, thang12
                                    ],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(255, 159, 64, 0.2)',
                                        'rgba(255, 205, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(201, 203, 207, 0.2)',
                                        'rgba(174, 176, 179, 0.2',
                                        'rgb(162, 204, 54,0.2)',
                                        'rgb(77, 19, 45,0.2)'
                                    ],
                                    borderColor: [
                                        'rgb(255, 99, 132)',
                                        'rgb(255, 159, 64)',
                                        'rgb(255, 205, 86)',
                                        'rgb(75, 192, 192)',
                                        'rgb(54, 162, 235)',
                                        'rgb(153, 102, 255)',
                                        'rgb(201, 203, 207)',
                                        'rgba(174, 176, 179',
                                        'rgb(162, 204, 54)',
                                        'rgb(77, 19, 45)',
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    });
                </script>
                <!-- End Bar CHart -->

            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Statistics By Brand</h5>

                <!-- Pie Chart -->
                <canvas id="pieChart" style="max-height: 400px;"></canvas>
                <script>
                    var thongke_theobrand = {!! json_encode($data_product_theobrand, JSON_HEX_TAG) !!};
                    var brand1 = thongke_theobrand[1];
                    var brand2 = thongke_theobrand[2];
                    var brand3 = thongke_theobrand[3];
                    var brand4 = thongke_theobrand[4];
                    var brand5 = thongke_theobrand[5];
                    document.addEventListener("DOMContentLoaded", () => {
                        new Chart(document.querySelector('#pieChart'), {
                            type: 'pie',
                            data: {
                                labels: [
                                    'LV',
                                    'Channel',
                                    'Gucci',
                                    'Nike',
                                    'Puma',
                                ],
                                datasets: [{
                                    label: 'My First Dataset',
                                    data: [brand1, brand2, brand3, brand4, brand5],
                                    backgroundColor: [
                                        'rgb(255, 99, 132)',
                                        'rgb(126, 55, 235)',
                                        'rgb(54, 162, 235)',
                                        'rgb(98, 162, 99)',
                                        'rgb(11, 162, 27)'
                                    ],
                                    hoverOffset: 3
                                }]
                            }
                        });
                    });
                </script>
                <!-- End Pie CHart -->

            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Statistics By Category</h5>

                <!-- Doughnut Chart -->
                <canvas id="doughnutChart" style="max-height: 400px;"></canvas>
                <script>
                    var thongke_theocategory = {!! json_encode($data_product_theocategory, JSON_HEX_TAG) !!};
                    var category1 = thongke_theocategory[1];
                    var category2 = thongke_theocategory[2];
                    var category3 = thongke_theocategory[3];
                    var category4 = thongke_theocategory[4];
                    var category5 = thongke_theocategory[5];
                    document.addEventListener("DOMContentLoaded", () => {
                        new Chart(document.querySelector('#doughnutChart'), {
                            type: 'doughnut',
                            data: {
                                labels: [
                                    'Áo Nam',
                                    'Áo Nữ',
                                    'Quần Nam',
                                    'Quần Nữ',
                                    'Đồ bộ',
                                ],
                                datasets: [{
                                    label: 'My First Dataset',
                                    data: [category1, category2, category3,category4,category5],
                                    backgroundColor: [
                                        'rgb(255, 99, 132)',
                                        'rgb(126, 55, 235)',
                                        'rgb(54, 162, 235)',
                                        'rgb(98, 162, 99)',
                                        'rgb(11, 162, 27)'
                                    ],
                                    hoverOffset: 4
                                }]
                            }
                        });
                    });
                </script>
                <!-- End Doughnut CHart -->

            </div>
        </div>
    </div>
@endsection
