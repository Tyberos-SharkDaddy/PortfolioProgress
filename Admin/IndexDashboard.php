<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Creative Dashboard</title>
    <link rel="icon" href="favicon.ico" />
    <meta name="description" content="A creative dashboard interface with analytics and task tracking.">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        :root {
            --bg-color: #f4f6f8;
            --text-color: #333;
            --card-bg: rgba(255, 255, 255, 0.95);
            --glass-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
            --accent: #0d6efd;
        }

        .dark-mode {
            --bg-color: #121212;
            --text-color: #f4f4f4;
            --card-bg: rgba(36, 36, 36, 0.95);
            --glass-shadow: 0 12px 30px rgba(0, 0, 0, 0.5);
        }

        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: var(--bg-color);
            color: var(--text-color);
            transition: all 0.3s ease;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            background: #0d6efd;
            color: white;
            position: fixed;
            padding: 20px;
            transition: transform 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        .sidebar.closed {
            transform: translateX(-100%);
        }

        .sidebar h2 {
            font-size: 1.5rem;
            margin-bottom: 30px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 10px 0;
            font-weight: 500;
            transition: background 0.2s ease;
        }

        .sidebar ul li a:hover {
            text-decoration: underline;
            color: #ffc107;
        }

        .topbar {
            background: #0d6efd;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 10;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        .topbar .menu-toggle,
        .topbar .theme-toggle {
            background: transparent;
            border: none;
            color: white;
            font-size: 1.6rem;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .topbar .menu-toggle:hover,
        .topbar .theme-toggle:hover {
            color: #ffc107;
        }

        main {
            margin-left: 250px;
            padding: 40px 30px;
            transition: margin-left 0.3s ease;
        }

        main.collapsed {
            margin-left: 0;
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 30px;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .card {
            background: var(--card-bg);
            border-radius: 16px;
            padding: 24px;
            box-shadow: var(--glass-shadow);
            backdrop-filter: blur(12px);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 22px 36px rgba(0, 0, 0, 0.15);
        }

        .card h3 a {
            color: var(--accent);
            text-decoration: none;
        }

        .card h3 a:hover {
            text-decoration: underline;
        }

        .task-board {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .task-board div {
            background: rgba(0, 0, 0, 0.03);
            padding: 12px;
            border-radius: 10px;
            color: var(--text-color);
        }

        .dark-mode .task-board div {
            background: rgba(255, 255, 255, 0.05);
            color: #ddd;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                z-index: 999;
                height: 100%;
            }

            main {
                margin-left: 0;
                padding: 20px;
            }

            .task-board {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="topbar">
        <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
    </div>

    <div class="sidebar" id="sidebar">
        
        <h2>Dashboard</h2>
        
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link text-white" href="anaylistics.php">📊 Analytics</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="Projects.php">🛠 Build In Progress</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="ClientStories.php">💼 Client Stories</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="Taskcalendar.php">🧠 Task Universe</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="notifications.php">📢 Notifications</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="bookings.php">📅 Bookings</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="Reviews.php">✅ Feedback</a></li>
        </ul>
    </div>

    <main id="main">
        <h1>Welcome to Your Creative Dashboard</h1>

        <div class="dashboard-grid">
            <div class="card">
                <h3><a href="analytics.php">📊 Analytics</a></h3>
                <canvas id="analyticsChart"></canvas>
            </div>

            <div class="card">
                <h3><a href="#notifications">📢 Notifications</a></h3>
                <ul>
                    <li>New booking received</li>
                    <li>Client feedback updated</li>
                    <li>Project deadline in 3 days</li>
                </ul>
            </div>

            <div class="card">
                <h3><a href="#build">🛠 Build In Progress</a></h3>
                <ul>
                    <li>Portfolio Revamp</li>
                    <li>Freelance App - Beta</li>
                    <li>Booking Calendar</li>
                </ul>
            </div>

            <div class="card">
                <h3><a href="#clients">💼 Client Stories</a></h3>
                <ul>
                    <li><strong>ShopNest:</strong> E-com Revamp Success</li>
                    <li><strong>DreamEvents:</strong> UX Boost</li>
                </ul>
            </div>

            <div class="card">
                <h3><a href="#tasks">🧠 Task Universe</a></h3>
                <div class="task-board">
                    <div><strong>To Do:</strong><br>Design new hero</div>
                    <div><strong>In Progress:</strong><br>Client API integration</div>
                    <div><strong>Done:</strong><br>Published new blog</div>
                </div>
            </div>

            <div class="card">
                <h3><a href="#feedback">✅ Latest Client Feedback</a></h3>
                <ul>
                    <li>"The UI is so clean!" - Mark</li>
                    <li>"Very fast delivery, thanks!" - Anna</li>
                    <li>"Excited to launch." - Leo</li>
                </ul>
            </div>

            <div class="card">
                <h3><a href="#bookings">📅 Recent Bookings</a></h3>
                <ul>
                    <li>John D. - 06/10</li>
                    <li>Sara P. - 06/12</li>
                    <li>Mike L. - 06/13</li>
                </ul>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('analyticsChart').getContext('2d');
        const analyticsChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Views',
                    data: [30, 50, 40, 60, 70, 90, 100],
                    borderColor: '#0d6efd',
                    fill: false,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return 'Views: ' + context.parsed.y;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            color: '#ccc'
                        }
                    },
                    y: {
                        grid: {
                            color: '#ccc'
                        }
                    }
                }
            }
        });

        function updateChartTheme(isDark) {
            analyticsChart.options.scales.x.grid.color = isDark ? '#444' : '#ccc';
            analyticsChart.options.scales.y.grid.color = isDark ? '#444' : '#ccc';
            analyticsChart.update();
        }

        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('closed');
            document.getElementById('main').classList.toggle('collapsed');
        }

        function toggleTheme() {
            const isDark = document.body.classList.toggle('dark-mode');
            updateChartTheme(isDark);
        }

        // Optional: Close sidebar on outside click (mobile)
        document.addEventListener('click', function(e) {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.querySelector('.menu-toggle');
            if (!sidebar.contains(e.target) && !toggleBtn.contains(e.target) && window.innerWidth <= 768) {
                sidebar.classList.add('closed');
                document.getElementById('main').classList.add('collapsed');
            }
        });
    </script>
</body>

</html>