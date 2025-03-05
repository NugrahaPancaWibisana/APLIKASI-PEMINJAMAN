<div class="p-6 bg-white rounded-lg shadow-md">
    <h3 class="mb-4 text-lg font-semibold text-gray-800">Statistik Peminjaman</h3>
    <div class="relative" style="height: 240px">
        <canvas id="incomeChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const dates = @json($dates);
        const peminjamanData = @json($peminjamanData);

        // Get the canvas element
        const ctx = document.getElementById("incomeChart").getContext("2d");

        // Create the chart
        new Chart(ctx, {
            type: "line",
            data: {
                labels: dates,
                datasets: [{
                    label: "Jumlah Peminjaman",
                    data: peminjamanData,
                    borderColor: "rgb(99, 102, 241)",
                    backgroundColor: "rgba(99, 102, 241, 0.1)",
                    tension: 0.4,
                    fill: true,
                    pointStyle: "circle",
                    pointRadius: 4,
                    pointHoverRadius: 6,
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 5 },
                        grid: { display: true, drawBorder: false },
                    },
                    x: { grid: { display: false } },
                },
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: "rgba(0, 0, 0, 0.8)",
                        padding: 12,
                        titleFont: { size: 13 },
                        bodyFont: { size: 12 },
                        titleMarginBottom: 6,
                        callbacks: {
                            label: function(context) {
                                return `Peminjaman: ${context.parsed.y}`;
                            },
                        },
                    },
                },
            },
        });
    </script>
</div>
