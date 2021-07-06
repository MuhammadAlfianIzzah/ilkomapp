<x-admin-layout>
    <style>


    </style>
    @php
        $brands = [];
        $unit = [];
        $month = [];
        $dollar = [];
    @endphp
    @foreach ($data as $dt)
        @php
            $brands[] = $dt->brand;
            $unit[] = $dt->units_sold;
        @endphp
    @endforeach
    @foreach ($data2 as $dt2)
        @php
            $month[] = $dt2->month;
            $dollar[] = $dt2->dollars_sold ?? 0;
        @endphp
    @endforeach

    <div class="row">

    </div>
    <div class="row">
        <div class="col-lg-6">
            <h3>Series</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama produk</th>
                        <th scope="col">brand</th>
                        <th scope="col">🧒Seri</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($item as $itm)


                        <tr>
                            <th scope="row">3</th>
                            <td>{{ $itm->item_name }}</td>
                            <td>{{ $itm->brand }}</td>
                            <td>{{ $itm->type }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="col-lg-6 border border-info d-flex align-items-center">
            <canvas id="sales_brand" height="70" width="100"></canvas>
        </div>

    </div>
    <div class="row">
        <div class="col-lg">
            <canvas id="line" height="40" width="100"></canvas>
        </div>
    </div>


    <script>
        let brand = @json($brands);
        let unit = @json($unit);
        let month = @json($month);
        let dollar = @json($dollar);
        $(document).ready(function() {
            var ctx = document.getElementById('sales_brand').getContext('2d');
            var sales_brand = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: brand,
                    datasets: [{
                        label: '#Grafik penjualan',
                        data: unit,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
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
        $(document).ready(function() {
            var ctx = document.getElementById('line').getContext('2d');
            var sales_brand = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: month,
                    datasets: [{
                        label: '#Grafik pendapatan perbulan',
                        data: dollar,
                        backgroundColor: [
                            '#264653',

                        ],
                        borderColor: [
                            "#f8edeb"
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
</x-admin-layout>
