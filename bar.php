<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenditure Bar Graph</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Expenditure Bar Graph</h1>
    <canvas id="expenditureChart" width="800" height="400"></canvas>

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

    $sql = "SELECT * FROM expenditure";
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
        const ctx = document.getElementById('expenditureChart').getContext('2d');
        const expenditureChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($components); ?>,
                datasets: [
                    {
                        label: '2010 Expenditure (RM million)',
                        data: <?php echo json_encode($year2010); ?>,
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: '2011 Expenditure (RM million)',
                        data: <?php echo json_encode($year2011); ?>,
                        backgroundColor: 'rgba(255, 99, 132, 0.6)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
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
                        text: 'Expenditure Comparison (2010 vs 2011)'
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