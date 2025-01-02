<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenditure Line Graph</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Expenditure Comparison: 2010 vs 2011 (Second Table)</h1>
    <canvas id="lineChart" width="800" height="400"></canvas>

    <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "LAB7"; // Replace with your database name

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to fetch data from second table
    $sql = "SELECT * FROM travel_expenditure"; // Ensure only second table data is stored here
    $result = $conn->query($sql);

    $components = [];
    $year2010 = [];
    $year2011 = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $components[] = $row['component'];
            $year2010[] = $row['year_2010'];
            $year2011[] = $row['year_2011'];
        }
    }
    $conn->close();
    ?>

    <script>
        const labels = <?php echo json_encode($components); ?>;
        const data2010 = <?php echo json_encode($year2010); ?>;
        const data2011 = <?php echo json_encode($year2011); ?>;

        // Line Graph: Second Table Data
        const ctx = document.getElementById('lineChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: '2010 Expenditure (RM million)',
                        data: data2010,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        fill: true,
                        borderWidth: 2,
                        tension: 0.4 // Smooth curve
                    },
                    {
                        label: '2011 Expenditure (RM million)',
                        data: data2011,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        fill: true,
                        borderWidth: 2,
                        tension: 0.4 // Smooth curve
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    title: {
                        display: true,
                        text: 'Expenditure Line Graph (Second Table Data)'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>