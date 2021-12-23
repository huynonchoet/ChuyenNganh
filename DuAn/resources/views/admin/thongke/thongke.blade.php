@extends('admin.layouts.app')

@section('content')
<div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">This Year's Revenue Statistics</h5>

              <!-- Bar Chart -->
              <canvas id="barChart" style="max-height: 400px;"></canvas>
              <script>
                var thongke = {!! json_encode($data_product_theothang, JSON_HEX_TAG) !!};
                var thang1=thongke[1];
                var thang2=thongke[2];
                var thang3=thongke[3];
                var thang4=thongke[4];
                var thang5=thongke[5];
                var thang6=thongke[6];
                var thang7=thongke[7];
                var thang8=thongke[8];
                var thang9=thongke[9];
                var thang10=thongke[10];
                var thang11=thongke[11];
                var thang12=thongke[12];
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#barChart'), {
                    type: 'bar',
                    data: {
                      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July' , 'Augus' , 'September' , 'October' , 'November' , 'December'],
                      datasets: [{
                        label: 'Bar Chart',
                        data: [thang1,thang2,thang3,thang4,thang5,thang6,thang7,thang8,thang9,thang10,thang11,thang12],
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
@endsection