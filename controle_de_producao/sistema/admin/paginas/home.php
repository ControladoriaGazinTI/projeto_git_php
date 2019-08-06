<canvas id="myChart"></canvas>


<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'radar',

        // The data for our dataset
        data: {
            labels: ['<?php print_r(implode("','", $teste1)); ?>'],
            datasets: [{
                label: 'QTDE',
                pointBackgroundColor: 'rgba(0, 0, 0, 10)', //altera cor do ponto de referencia
                pointBorderColor: 'rgba(0, 0, 0, 10)', //
                backgroundColor: 'rgb(255, 200, 200)',
                borderColor: 'rgb(255, 99, 132)',
                pointStyle: 'triangle', //altera o tipo do

                //lineTension: 0.0,//deixar linha sem curva
                //borderDash: [23],//colocar traços na linha
                data: [<?php print_r(implode(",", $teste)); ?>],

            }]
        },

        // Configuration options go here
        options: {}
    });
</script>