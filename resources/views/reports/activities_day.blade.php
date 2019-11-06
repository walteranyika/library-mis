@extends('base_templates.core')
@section('extras')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Select Date Range</label>
                    <input type="text" name="daterange" value="01/01/2018 - 01/15/2018" class="form-control" />
                </div>
            </div>


        </div>
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <canvas id="myChart" width="800" height="400"></canvas>
            </div>
        </div>
    </div>

    <script>
        $(function () {
            var ctx = document.getElementById('myChart');
            var myBarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        <?php
                        if (!empty($activities)) {
                            foreach ($activities as $item){
                                echo "'$item->date_created',";
                            }
                        }
                        ?>
                    ],
                    datasets: [
                        {
                            label: "Number of activities",
                            backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                            data: [<?php
                                foreach ($activities as $item){
                                    echo "'$item->total',";
                                }
                            ?>]
                        }
                    ]
                },
                options: {
                    legend: { display: false },
                    title: {
                        display: true,
                        text: 'Number of daily activities in the library'
                    }
                }
            });
        });

        function fetchData(start, end) {
            axios.get('localhost:8000/api/get/current/'+start+"/"+end)
                .then(function (response) {
                    // handle success
                    var services=response.data.message;
                    //TODO Complete Data Fetch
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .finally(function () {
                    // always executed
                });
        }
    </script>



    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });
    </script>
@endsection
