<x-app-layout>

    <!-- Header -->
    <div class="relative bg-blue-900 md:pt-32 pb-32 pt-12">
        <div class="px-4 md:px-10 mx-auto w-full">
            <div>
                <!-- Card stats -->
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                            <div class="flex-auto p-4">
                                <div class="flex flex-wrap">
                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                                            Ventas del mes
                                        </h5>
                                        <span class="font-semibold text-xl text-blueGray-700">
                                            {{ $salesOfTheMonth }}
                                        </span>
                                    </div>
                                    <div class="relative w-auto pl-4 flex-initial">
                                        <div
                                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500">
                                            <i class="far fa-chart-bar"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-sm text-blueGray-400 mt-4">
                                    <span class="whitespace-nowrap">
                                        Desde el ultimo mes
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                            <div class="flex-auto p-4">
                                <div class="flex flex-wrap">
                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                                            Ventas del año
                                        </h5>
                                        <span class="font-semibold text-xl text-blueGray-700">
                                            {{ $salesOfTheYear }}
                                        </span>
                                    </div>
                                    <div class="relative w-auto pl-4 flex-initial">
                                        <div
                                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-orange-500">
                                            <i class="fas fa-chart-pie"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-sm text-blueGray-400 mt-4">
                                    <span class="whitespace-nowrap"> Desde el ultimo año </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                            <div class="flex-auto p-4">
                                <div class="flex flex-wrap">
                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                                            Clientes
                                        </h5>
                                        <span class="font-semibold text-xl text-blueGray-700">
                                            {{ $numberOfClients }}
                                        </span>
                                    </div>
                                    <div class="relative w-auto pl-4 flex-initial">
                                        <div
                                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-pink-500">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-sm text-blueGray-400 mt-4">
                                    <span class="whitespace-nowrap"> clientes recurrentes </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                            <div class="flex-auto p-4">
                                <div class="flex flex-wrap">
                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                                            Productos vendidos
                                        </h5>
                                        <span class="font-semibold text-xl text-blueGray-700">
                                            {{ $numberOfProducts }}
                                        </span>
                                    </div>
                                    <div class="relative w-auto pl-4 flex-initial">
                                        <div
                                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-blue-500">
                                            <i class="fas fa-percent"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-sm text-blueGray-400 mt-4">
                                    <span class="whitespace-nowrap">
                                        Hasta la fecha
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="px-4 md:px-10 mx-auto w-full -m-24 h-96">
        <div class="flex flex-wrap">
            <div class="w-full xl:w-6/12 mb-12 xl:mb-0 px-4">
                <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-gray-200">
                    <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
                        <div class="flex flex-wrap items-center">
                            <div class="relative w-full max-w-full flex-grow flex-1">
                                <h6 class="uppercase text-blueGray-100 mb-1 text-xs font-semibold">
                                    Descripción
                                </h6>
                                <h2 class="text-xl font-semibold">
                                    Comparación de los ultimo meses
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 flex-auto">
                        <!-- Chart -->
                        <div>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full xl:w-6/12 px-4">
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                    <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
                        <div class="flex flex-wrap items-center">
                            <div class="relative w-full max-w-full flex-grow flex-1">
                                <h6 class="uppercase text-blueGray-400 mb-1 text-xs font-semibold">
                                    Productos
                                </h6>
                                <h2 class="text-blueGray-700 text-xl font-semibold">
                                    Más vendidos
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 flex-auto">
                        <!-- Chart -->
                        <div class="relative h-350-px">
                            <canvas id="myDoughnut"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const dtx = document.getElementById('myDoughnut');
        const ctx = document.getElementById('myChart');

        const domain = window.location.origin;
        function myChartFunction(total_sales){
            new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
                    'Octubre', 'Noviembre', 'Diciembre'
                ],
                datasets: [{
                    label: 'Ventas',
                    data: total_sales,
                    borderWidth: 1,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                }],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        }

        function myDoughnutFunction(labels, data){
            new Chart(dtx, {
                type: 'doughnut',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'My First Dataset',
                        data: data,
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)'
                        ],
                        hoverOffset: 4
                    }]
                },
            })
        }

        async function fetchDataChart() {
            try {
                const response = await fetch(domain + "/sales-for-month");
                if (response.ok) {
                    const result = await response.json();
                    const total_sales = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                    result.forEach(data => {
                        console.log(data.month)
                        switch (data.month) {
                            case 1:
                                total_sales[data.month] = data.total_sales;
                                break;
                            case 2:
                                total_sales[data.month] = data.total_sales;
                                break;
                            case 3:
                                total_sales[data.month] = data.total_sales;
                                break;
                            case 4:
                                total_sales[data.month] = data.total_sales;
                                break;
                            case 5:
                                total_sales[data.month] = data.total_sales;
                                break;
                            case 6:
                                total_sales[data.month] = data.total_sales;
                                break;
                            case 7:
                                total_sales[data.month] = data.total_sales;
                                break;
                            case 8:
                                total_sales[data.month] = data.total_sales;
                                break;
                            case 9:
                                total_sales[data.month] = data.total_sales;
                                break;
                            case 10:
                                total_sales[data.month] = data.total_sales;
                                break;
                            case 11:
                                total_sales[data.month] = data.total_sales;
                                break;
                            case 12:
                                total_sales[data.month] = data.total_sales;
                                break;

                            default:
                                break;

                        }
                    });
                    console.log(total_sales)
                    myChartFunction(total_sales);
                } else {
                    throw new Error("Error en la solicitud");
                }
            } catch (error) {
                console.error(error);
            }
        }

        async function fetchDataDoughnut() {
            try {
                const response = await fetch(domain + "/sold-products");
                if (response.ok) {
                    const resultProducts = await response.json();
                    const labels = [];
                    const data = [];
                    if (Object.keys(resultProducts).lenght === 0) {
                        myDoughnutFunction(labels,data);
                    } else {
                        resultProducts.forEach(dt=>{
                            labels.push(dt.product.name);
                            data.push(dt.total_sales);
                        })
                        console.log(data)
                        console.log(labels)
                        myDoughnutFunction(labels, data);
                    }
                } else {
                    throw new Error("Error en la solicitud");
                }
            } catch (error) {
                console.error(error);
            }
        }
        fetchDataChart();
        fetchDataDoughnut();
       

    </script>

</x-app-layout>
