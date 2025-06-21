<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Modern Analytics Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #1e1f22;
      color: #f4f4f4;
      display: flex;
      overflow-x: hidden;
    }

    .sidebar {
      width: 250px;
      background: #2d2f33;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      padding: 20px 0;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.3);
      transform: translateX(0);
      transition: transform 0.3s ease;
    }

    .sidebar.closed {
      transform: translateX(-250px);
    }

    .sidebar .nav {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .sidebar .nav-item {
      margin: 10px 0;
    }

    .sidebar .nav-link {
      display: flex;
      align-items: center;
      padding: 12px 20px;
      text-decoration: none;
      color: #f4f4f4;
      font-size: 16px;
      transition: background 0.3s;
    }

    .sidebar .nav-link:hover {
      background: #3a3c42;
    }

    .sidebar .nav-link.active {
      background: #2196f3;
      color: #fff;
    }

    .main {
      flex: 1;
      padding: 40px;
      max-width: calc(1200px + 250px);
      margin-left: 250px;
      transition: margin-left 0.3s ease;
    }

    .main.sidebar-closed {
      margin-left: 0;
      max-width: 1200px;
    }

    .hamburger {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      background: #2d2f33;
      border-radius: 8px;
      cursor: pointer;
      margin-bottom: 20px;
      font-size: 24px;
      color: #f4f4f4;
    }

    .hamburger:hover {
      background: #3a3c42;
    }

    .overview-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 24px;
      margin-bottom: 30px;
    }

    .overview-card {
      background: #2d2f33;
      border-radius: 14px;
      padding: 24px;
      text-align: center;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }

    .analytics-line-card {
      background: #1d1e22;
      border-radius: 16px;
      padding: 24px;
      margin-bottom: 30px;
    }

    .filter-select {
      padding: 8px 14px;
      border-radius: 8px;
      border: none;
      background: #2d2f33;
      color: #fff;
    }

    .analytics-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 24px;
    }

    .analytics-card {
      background: #2d2f33;
      border-radius: 16px;
      padding: 20px;
    }

    .filter-tabs {
      margin-bottom: 15px;
    }

    .filter-tabs button {
      padding: 8px 16px;
      margin-right: 10px;
      border: none;
      border-radius: 8px;
      background: #2d2f33;
      color: #fff;
      cursor: pointer;
      transition: background 0.3s;
    }

    .filter-tabs button.active {
      background: #2196f3;
    }

    .filter-tabs button:hover {
      background: #3a3c42;
    }

    .sub-filter-tabs {
      margin-top: 10px;
      margin-bottom: 10px;
    }

    .sub-filter-tabs button {
      padding: 6px 12px;
      margin-right: 8px;
      border: none;
      border-radius: 6px;
      background: #3a3c42;
      color: #fff;
      cursor: pointer;
      transition: background 0.3s;
    }

    .sub-filter-tabs button.active {
      background: #4caf50;
    }

    .sub-filter-tabs button:hover {
      background: #4a4c52;
    }

    .filter-container {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .filter-container button {
      padding: 8px 16px;
      border: none;
      border-radius: 8px;
      background: #2d2f33;
      color: #fff;
      cursor: pointer;
      transition: background 0.3s;
    }

    .filter-container button:hover {
      background: #3a3c42;
    }

    .filter-container button.active {
      background: #2196f3;
    }

    @media (max-width: 768px) {
      .sidebar {
        transform: translateX(-250px);
      }

      .sidebar.open {
        transform: translateX(0);
      }

      .main {
        margin-left: 0;
        max-width: 1200px;
      }

      .main.sidebar-open {
        margin-left: 250px;
      }
    }
  </style>
</head>

<body>
  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link text-white" href="IndexDashboard.php">🏠 Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="analytics.php">📊 Analytics</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href=" .php">🛠 Build In Progress</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="ClientStories.php">💼 Client Stories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="Taskcalendar.php">🧠 Task Universe</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="Notifications.php">📢 Notifications</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="Bookings.php">📅 Bookings</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="Reviews.php">✅ Feedback</a>
      </li>
    </ul>
  </div>


  <div class="main" id="main">
    <!-- Hamburger Menu -->
    <div class="hamburger" id="hamburger" onclick="toggleSidebar()">
      <span class="material-symbols-rounded">menu</span>
    </div>

    <!-- FILTER SELECTOR -->
    <div class="filter-container" style="margin-bottom: 20px;">
      <label for="dataFilter">Filter: </label>
      <select class="filter-select" id="dataFilter">
        <option value="all" selected>All</option>
        <option value="profit">Profit</option>
        <option value="bookings">Bookings</option>
        <option value="payments">Initial Payments</option>
        <option value="services">Most Booked Services</option>
        <option value="services2">Additional Services</option>
        <option value="projects">Projects Status</option>
      </select>
      <button id="allFilterButton" onclick="resetFilter()">Reset</button>
    </div>

    <div class="filter-tabs" id="lineChartFilter">
      <button class="active" onclick="updateLineChart('income', event)">Income</button>
      <button onclick="updateLineChart('bookings', event)">Bookings</button>
      <button onclick="updateLineChart('profit', event)">Profit</button>
      <button onclick="updateLineChart('losses', event)">Losses</button>
      <button onclick="updateLineChart('projects', event)">Projects</button>
      <div class="sub-filter-tabs" id="projectsSubFilter" style="display: none;">
        <button class="active" onclick="updateLineChart('projects-ongoing', event)">Ongoing</button>
        <button onclick="updateLineChart('projects-cancelled', event)">Cancelled</button>
      </div>
      <button onclick="updateLineChart('services', event)">Services</button>
      <div class="sub-filter-tabs" id="servicesSubFilter" style="display: none;">
        <button class="active" onclick="updateLineChart('services-web', event)">Web Design</button>
        <button onclick="updateLineChart('services-portfolio', event)">Portfolio Dev</button>
        <button onclick="updateLineChart('services-marketing', event)">Marketing Branding</button>
      </div>
    </div>
    <!-- CLIENTS & PROJECTS -->
    <div class="overview-grid" id="overviewCards">
      <div class="overview-card">
        <h3 id="clientsCount">128</h3>
        <p>Clients</p>
      </div>
      <div class="overview-card">
        <h3 id="projectsCount">46</h3>
        <p>Projects Done</p>
      </div>
    </div>

    <!-- LINE CHART WITH TIMEFRAME -->
    <div class="analytics-line-card">
      <div style="display: flex; justify-content: space-between; align-items: center;">
        <h3>Monthly Analytics Overview</h3>
        <select class="filter-select" id="timeFrame">
          <option value="monthly">Monthly</option>
          <option value="weekly">Weekly</option>
          <option value="yearly">Yearly</option>
        </select>
      </div>
      <canvas id="analyticsLineChart" height="120"></canvas>
    </div>

    <!-- ANALYTICS GRID -->
    <div class="analytics-grid">
      <div class="analytics-card" id="servicesCard">
        <h4>Most Booked Services</h4>
        <div class="filter-tabs" id="servicesChartFilter">
          <button class="active" onclick="updateServicesChart('all', event)">All</button>
          <button onclick="updateServicesChart('web', event)">Web Design</button>
          <button onclick="updateServicesChart('portfolio', event)">Portfolio Dev</button>
          <button onclick="updateServicesChart('marketing', event)">Marketing Branding</button>
        </div>
        <canvas id="servicesChart"></canvas>
      </div>
      <div class="analytics-card" id="services2Card">
        <h4>Additional Services</h4>
        <div class="filter-tabs" id="services2ChartFilter">
          <button class="active" onclick="updateServices2Chart('all', event)">All</button>
          <button onclick="updateServices2Chart('web', event)">Web Design</button>
          <button onclick="updateServices2Chart('portfolio', event)">Portfolio Dev</button>
          <button onclick="updateServices2Chart('marketing', event)">Marketing Branding</button>
        </div>
        <canvas id="services2Chart"></canvas>
      </div>
      <div class="analytics-card" id="paymentsCard">
        <h4>Initial Payments</h4>
        <div class="filter-tabs" id="paymentsChartFilter">
          <button class="active" onclick="updatePaymentsChart('all', event)">All</button>
          <button onclick="updatePaymentsChart('full', event)">Full</button>
          <button onclick="updatePaymentsChart('half', event)">Half</button>
          <button onclick="updatePaymentsChart('notyet', event)">Not Yet Paid</button>
        </div>
        <canvas id="paymentsChart"></canvas>
      </div>
      <div class="analytics-card" id="profitCard">
        <h4>Profit</h4>
        <canvas id="profitChart"></canvas>
      </div>
      <div class="analytics-card" id="bookingsCard">
        <h4>Bookings</h4>
        <canvas id="bookingsChart"></canvas>
      </div>
      <div class="analytics-card" id="projectsCard">
        <h4>Projects Cancelled and Ongoing</h4>
        <div class="filter-tabs" id="projectsChartFilter">
          <button class="active" onclick="updateProjectsChart('both', event)">Both</button>
          <button onclick="updateProjectsChart('cancelled', event)">Cancelled</button>
          <button onclick="updateProjectsChart('ongoing', event)">Ongoing</button>
        </div>
        <canvas id="projectsChart"></canvas>
      </div>
    </div>
  </div>

  <script>
    // Data definitions
    const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun"];
    const incomeData = [12000, 15000, 10000, 18000, 20000, 17000];
    const profitData = [8000, 11000, 7000, 14000, 16000, 13000];
    const lossesData = [-2000, -1000, -2000, -1000, -1500, -1200];
    const bookingsData = [3, 4, 2, 5, 6, 4];
    const cancelledProjectsData = [1, 0, 2, 1, 0, 1];
    const ongoingProjectsData = [2, 3, 1, 4, 3, 2];
    const webDesignData = [2, 3, 1, 4, 2, 1];
    const portfolioDevData = [1, 2, 2, 1, 3, 2];
    const marketingBrandingData = [0, 1, 2, 0, 1, 2];
    const fullPaymentsData = [1, 2, 1, 2, 2, 1];
    const halfPaymentsData = [2, 2, 3, 3, 4, 3];
    const notYetPaidData = [1, 1, 0, 2, 1, 0];
    const webDesignData2 = [3, 2, 4, 1, 3, 2];
    const portfolioDevData2 = [2, 1, 3, 2, 2, 1];
    const marketingBrandingData2 = [1, 2, 0, 1, 0, 2];

    // Aggregate Projects and Services data
    const projectsData = cancelledProjectsData.map((val, idx) => val + ongoingProjectsData[idx]);
    const servicesData = webDesignData.map((val, idx) => val + portfolioDevData[idx] + marketingBrandingData[idx]);

    const barColors = ['#2196f3', '#4caf50', '#ffc107', '#f44336', '#9c27b0', '#ff5722'];

    // Initialize all Chart.js instances
    const ctx = document.getElementById('analyticsLineChart').getContext('2d');
    const analyticsLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: months,
        datasets: [{
          label: 'Income',
          data: incomeData,
          borderColor: '#2196f3',
          backgroundColor: 'rgba(33,150,243,0.08)',
          tension: 0.4,
          fill: true
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top'
          }
        },
        scales: {
          y: {
            beginAtZero: false
          }
        }
      }
    });

    const servicesChartCtx = document.getElementById('servicesChart').getContext('2d');
    const servicesChart = new Chart(servicesChartCtx, {
      type: 'bar',
      data: {
        labels: months,
        datasets: [{
            label: 'Web Design',
            data: webDesignData,
            backgroundColor: barColors[0]
          },
          {
            label: 'Portfolio Dev',
            data: portfolioDevData,
            backgroundColor: barColors[1]
          },
          {
            label: 'Marketing Branding',
            data: marketingBrandingData,
            backgroundColor: barColors[2]
          }
        ]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom'
          }
        },
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    const services2ChartCtx = document.getElementById('services2Chart').getContext('2d');
    const services2Chart = new Chart(services2ChartCtx, {
      type: 'bar',
      data: {
        labels: months,
        datasets: [{
            label: 'Web Design',
            data: webDesignData2,
            backgroundColor: barColors[0]
          },
          {
            label: 'Portfolio Dev',
            data: portfolioDevData2,
            backgroundColor: barColors[1]
          },
          {
            label: 'Marketing Branding',
            data: marketingBrandingData2,
            backgroundColor: barColors[2]
          }
        ]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom'
          }
        },
        scales: {
          x: {
            stacked: true
          },
          y: {
            stacked: true,
            beginAtZero: true
          }
        }
      }
    });

    const paymentsChartCtx = document.getElementById('paymentsChart').getContext('2d');
    const paymentsChart = new Chart(paymentsChartCtx, {
      type: 'bar',
      data: {
        labels: months,
        datasets: [{
            label: 'Full',
            data: fullPaymentsData,
            backgroundColor: barColors[1]
          },
          {
            label: 'Half',
            data: halfPaymentsData,
            backgroundColor: barColors[2]
          },
          {
            label: 'Not Yet Paid',
            data: notYetPaidData,
            backgroundColor: barColors[5]
          }
        ]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom'
          }
        },
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    const profitChartCtx = document.getElementById('profitChart').getContext('2d');
    const profitChart = new Chart(profitChartCtx, {
      type: 'line',
      data: {
        labels: months,
        datasets: [{
          label: 'Profit',
          data: profitData,
          borderColor: '#4caf50',
          fill: true
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    const bookingsChartCtx = document.getElementById('bookingsChart').getContext('2d');
    const bookingsChart = new Chart(bookingsChartCtx, {
      type: 'line',
      data: {
        labels: months,
        datasets: [{
          label: 'Bookings',
          data: bookingsData,
          borderColor: '#ffc107',
          fill: true
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    const projectsChartCtx = document.getElementById('projectsChart').getContext('2d');
    const projectsChart = new Chart(projectsChartCtx, {
      type: 'bar',
      data: {
        labels: months,
        datasets: [{
            label: 'Cancelled',
            data: cancelledProjectsData,
            backgroundColor: barColors[3]
          },
          {
            label: 'Ongoing',
            data: ongoingProjectsData,
            backgroundColor: barColors[4]
          }
        ]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom'
          }
        },
        scales: {
          x: {
            stacked: true
          },
          y: {
            stacked: true,
            beginAtZero: true
          }
        }
      }
    });

    // Sidebar toggle function
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const main = document.getElementById('main');
      sidebar.classList.toggle('closed');
      main.classList.toggle('sidebar-closed');
    }

    // Overview filter toggle
    const overviewSection = document.getElementById('overviewCards');
    const dataFilter = document.getElementById('dataFilter');
    const allFilterButton = document.getElementById('allFilterButton');

    function updateFilter() {
      const sel = dataFilter.value;
      ['services', 'services2', 'payments', 'profit', 'bookings', 'projects'].forEach(key => {
        document.getElementById(`${key}Card`).style.display = (sel === key) ? 'block' : 'none';
      });
      overviewSection.style.display = (sel === 'all') ? 'grid' : 'none';
      allFilterButton.classList.toggle('active', sel === 'all');
      updateLineChart(sel === 'all' ? 'all' : 'income', {
        target: document.querySelector('#lineChartFilter button')
      });
    }

    function resetFilter() {
      dataFilter.value = 'all';
      updateFilter();
    }

    // Line chart filter update function
    function updateLineChart(type, event) {
      const buttons = document.querySelectorAll('#lineChartFilter button');
      const projectsSubFilter = document.getElementById('projectsSubFilter');
      const servicesSubFilter = document.getElementById('servicesSubFilter');
      buttons.forEach(btn => btn.classList.remove('active'));
      if (event.target.tagName === 'BUTTON') {
        event.target.classList.add('active');
      }

      let datasets = [];
      projectsSubFilter.style.display = 'none';
      servicesSubFilter.style.display = 'none';

      if (type === 'all') {
        datasets = [{
            label: 'Income',
            data: incomeData,
            borderColor: '#2196f3',
            backgroundColor: 'rgba(33,150,243,0.08)',
            tension: 0.4,
            fill: true
          },
          {
            label: 'Profit',
            data: profitData,
            borderColor: '#4caf50',
            backgroundColor: 'rgba(76,175,80,0.08)',
            tension: 0.4,
            fill: true
          },
          {
            label: 'Losses',
            data: lossesData,
            borderColor: '#f44336',
            backgroundColor: 'rgba(244,67,54,0.08)',
            tension: 0.4,
            fill: true
          },
          {
            label: 'Bookings',
            data: bookingsData.map(x => x * 1000), // Scale for visibility
            borderColor: '#ffc107',
            backgroundColor: 'rgba(255,193,7,0.08)',
            tension: 0.4,
            fill: true
          },
          {
            label: 'Projects',
            data: projectsData.map(x => x * 1000), // Scale for visibility
            borderColor: '#9c27b0',
            backgroundColor: 'rgba(156,39,176,0.08)',
            tension: 0.4,
            fill: true
          },
          {
            label: 'Services',
            data: servicesData.map(x => x * 1000), // Scale for visibility
            borderColor: '#ff5722',
            backgroundColor: 'rgba(255,87,34,0.08)',
            tension: 0.4,
            fill: true
          }
        ];
        analyticsLineChart.options.scales.y.title = {
          display: true,
          text: 'Value (Income/Profit/Losses in $, Others Scaled)'
        };
      } else {
        let data, label, borderColor, backgroundColor;
        if (type.startsWith('projects')) {
          projectsSubFilter.style.display = 'block';
          const subButtons = document.querySelectorAll('#projectsSubFilter button');
          if (type === 'projects') {
            type = 'projects-ongoing';
            subButtons.forEach(btn => btn.classList.remove('active'));
            subButtons[0].classList.add('active');
          }
        } else if (type.startsWith('services')) {
          servicesSubFilter.style.display = 'block';
          const subButtons = document.querySelectorAll('#servicesSubFilter button');
          if (type === 'services') {
            type = 'services-web';
            subButtons.forEach(btn => btn.classList.remove('active'));
            subButtons[0].classList.add('active');
          }
        }

        switch (type) {
          case 'income':
            data = incomeData;
            label = 'Income';
            borderColor = '#2196f3';
            backgroundColor = 'rgba(33,150,243,0.08)';
            break;
          case 'bookings':
            data = bookingsData;
            label = 'Bookings';
            borderColor = '#ffc107';
            backgroundColor = 'rgba(255,193,7,0.08)';
            break;
          case 'profit':
            data = profitData;
            label = 'Profit';
            borderColor = '#4caf50';
            backgroundColor = 'rgba(76,175,80,0.08)';
            break;
          case 'losses':
            data = lossesData;
            label = 'Losses';
            borderColor = '#f44336';
            backgroundColor = 'rgba(244,67,54,0.08)';
            break;
          case 'projects-ongoing':
            data = ongoingProjectsData;
            label = 'Ongoing Projects';
            borderColor = '#9c27b0';
            backgroundColor = 'rgba(156,39,176,0.08)';
            break;
          case 'projects-cancelled':
            data = cancelledProjectsData;
            label = 'Cancelled Projects';
            borderColor = '#f44336';
            backgroundColor = 'rgba(244,67,54,0.08)';
            break;
          case 'services-web':
            data = webDesignData;
            label = 'Web Design';
            borderColor = '#2196f3';
            backgroundColor = 'rgba(33,150,243,0.08)';
            break;
          case 'services-portfolio':
            data = portfolioDevData;
            label = 'Portfolio Dev';
            borderColor = '#4caf50';
            backgroundColor = 'rgba(76,175,80,0.08)';
            break;
          case 'services-marketing':
            data = marketingBrandingData;
            label = 'Marketing Branding';
            borderColor = '#ffc107';
            backgroundColor = 'rgba(255,193,7,0.08)';
            break;
        }

        datasets = [{
          label: label,
          data: data,
          borderColor: borderColor,
          backgroundColor: backgroundColor,
          tension: 0.4,
          fill: true
        }];
        analyticsLineChart.options.scales.y.title = {
          display: false
        };
      }

      analyticsLineChart.data.datasets = datasets;
      analyticsLineChart.update();
    }

    // Services chart filter update function
    function updateServicesChart(type, event) {
      const buttons = document.querySelectorAll('#servicesChartFilter button');
      buttons.forEach(btn => btn.classList.remove('active'));
      event.target.classList.add('active');

      let datasets;
      switch (type) {
        case 'all':
          datasets = [{
              label: 'Web Design',
              data: webDesignData,
              backgroundColor: barColors[0]
            },
            {
              label: 'Portfolio Dev',
              data: portfolioDevData,
              backgroundColor: barColors[1]
            },
            {
              label: 'Marketing Branding',
              data: marketingBrandingData,
              backgroundColor: barColors[2]
            }
          ];
          break;
        case 'web':
          datasets = [{
            label: 'Web Design',
            data: webDesignData,
            backgroundColor: barColors[0]
          }];
          break;
        case 'portfolio':
          datasets = [{
            label: 'Portfolio Dev',
            data: portfolioDevData,
            backgroundColor: barColors[1]
          }];
          break;
        case 'marketing':
          datasets = [{
            label: 'Marketing Branding',
            data: marketingBrandingData,
            backgroundColor: barColors[2]
          }];
          break;
      }

      servicesChart.data.datasets = datasets;
      servicesChart.update();
    }

    // Additional Services chart filter update function
    function updateServices2Chart(type, event) {
      const buttons = document.querySelectorAll('#services2ChartFilter button');
      buttons.forEach(btn => btn.classList.remove('active'));
      event.target.classList.add('active');

      let datasets;
      switch (type) {
        case 'all':
          datasets = [{
              label: 'Web Design',
              data: webDesignData2,
              backgroundColor: barColors[0]
            },
            {
              label: 'Portfolio Dev',
              data: portfolioDevData2,
              backgroundColor: barColors[1]
            },
            {
              label: 'Marketing Branding',
              data: marketingBrandingData2,
              backgroundColor: barColors[2]
            }
          ];
          services2Chart.options.scales.x.stacked = true;
          services2Chart.options.scales.y.stacked = true;
          break;
        case 'web':
          datasets = [{
            label: 'Web Design',
            data: webDesignData2,
            backgroundColor: barColors[0]
          }];
          services2Chart.options.scales.x.stacked = false;
          services2Chart.options.scales.y.stacked = false;
          break;
        case 'portfolio':
          datasets = [{
            label: 'Portfolio Dev',
            data: portfolioDevData2,
            backgroundColor: barColors[1]
          }];
          services2Chart.options.scales.x.stacked = false;
          services2Chart.options.scales.y.stacked = false;
          break;
        case 'marketing':
          datasets = [{
            label: 'Marketing Branding',
            data: marketingBrandingData2,
            backgroundColor: barColors[2]
          }];
          services2Chart.options.scales.x.stacked = false;
          services2Chart.options.scales.y.stacked = false;
          break;
      }

      services2Chart.data.datasets = datasets;
      services2Chart.update();
    }

    // Payments chart filter update function
    function updatePaymentsChart(type, event) {
      const buttons = document.querySelectorAll('#paymentsChartFilter button');
      buttons.forEach(btn => btn.classList.remove('active'));
      event.target.classList.add('active');

      let datasets;
      switch (type) {
        case 'all':
          datasets = [{
              label: 'Full',
              data: fullPaymentsData,
              backgroundColor: barColors[1]
            },
            {
              label: 'Half',
              data: halfPaymentsData,
              backgroundColor: barColors[2]
            },
            {
              label: 'Not Yet Paid',
              data: notYetPaidData,
              backgroundColor: barColors[5]
            }
          ];
          break;
        case 'full':
          datasets = [{
            label: 'Full',
            data: fullPaymentsData,
            backgroundColor: barColors[1]
          }];
          break;
        case 'half':
          datasets = [{
            label: 'Half',
            data: halfPaymentsData,
            backgroundColor: barColors[2]
          }];
          break;
        case 'notyet':
          datasets = [{
            label: 'Not Yet Paid',
            data: notYetPaidData,
            backgroundColor: barColors[5]
          }];
          break;
      }

      paymentsChart.data.datasets = datasets;
      paymentsChart.update();
    }

    // Projects chart filter update function
    function updateProjectsChart(type, event) {
      const buttons = document.querySelectorAll('#projectsChartFilter button');
      buttons.forEach(btn => btn.classList.remove('active'));
      event.target.classList.add('active');

      let datasets;
      switch (type) {
        case 'both':
          datasets = [{
              label: 'Cancelled',
              data: cancelledProjectsData,
              backgroundColor: barColors[3]
            },
            {
              label: 'Ongoing',
              data: ongoingProjectsData,
              backgroundColor: barColors[4]
            }
          ];
          projectsChart.options.scales.x.stacked = true;
          projectsChart.options.scales.y.stacked = true;
          break;
        case 'cancelled':
          datasets = [{
            label: 'Cancelled',
            data: cancelledProjectsData,
            backgroundColor: barColors[3]
          }];
          projectsChart.options.scales.x.stacked = false;
          projectsChart.options.scales.y.stacked = false;
          break;
        case 'ongoing':
          datasets = [{
            label: 'Ongoing',
            data: ongoingProjectsData,
            backgroundColor: barColors[4]
          }];
          projectsChart.options.scales.x.stacked = false;
          projectsChart.options.scales.y.stacked = false;
          break;
      }

      projectsChart.data.datasets = datasets;
      projectsChart.update();
    }

    // Event listeners
    dataFilter.addEventListener('change', updateFilter);
    document.getElementById('timeFrame').addEventListener('change', function() {
      const type = this.value;
      let newLabels = [],
        newData = [];

      if (type === 'weekly') {
        newLabels = ['W1', 'W2', 'W3', 'W4'];
        newData = [2500, 3200, 2800, 3100];
      } else if (type === 'monthly') {
        newLabels = months;
        newData = incomeData;
      } else {
        newLabels = ['2021', '2022', '2023', '2024'];
        newData = [88000, 92000, 100000, 110000];
      }

      analyticsLineChart.data.labels = newLabels;
      analyticsLineChart.data.datasets[0].data = newData;
      analyticsLineChart.update();
    });

    // Initialize filter on page load
    updateFilter();
  </script>
</body>

</html>