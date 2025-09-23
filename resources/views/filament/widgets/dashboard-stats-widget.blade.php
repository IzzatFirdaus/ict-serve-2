<div>
    <h2 class="text-lg font-bold">Dashboard Statistics</h2>
    <canvas id="dashboard-stats-chart"></canvas>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('dashboard-stats-chart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: @json($this->getChartData()),
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
            },
        });
    });
</script>
