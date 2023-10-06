<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Link Icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../CSS/dashboard.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <!-- link css-->
  </head>

  <body>
    <div class="container">
      <main>
        <h1>Dashbored</h1>
        <div class="insights">
          <div class="sales">
            <span class="material-symbols-outlined">group</span>
            <div class="middle">
              <div class="left">
                <h1>Students</h1>
              </div>
              <div class="progresss">
                <!-- <svg>
                  <circle cx="38" cy="38" r="36"></circle>
                </svg> -->
                <div class="number">
                  <p>33</p>
                </div>
              </div>
            </div>
          </div>
          <!-- End of Sales -->
          <div class="expenses">
          <i class="bi bi-journal-check" style="font-size: 36px;"></i>
            <div class="middle">
              <div class="left">
                <h1>Courses</h1>
              </div>
              <div class="progresss">
                <div class="number">
                  <p>44</p>
                </div>
              </div>
            </div>
          
          </div>
          <!-- End of Expenses -->
          <div class="income">
            <span class="material-symbols-outlined">analytics</span>
            <div class="middle">
              <div class="left">
                <h1>Income</h1>
              </div>
              <div class="progresss">
                <div class="number">
                  <p>99</p>
                </div>
              </div>
            </div>
          </div>
          <!-- End of Income -->
        </div>
        <!-- End of insights -->
       
      </main>
      <!-- end of main-->
      
      <canvas id="myChart" style="width:90%;max-width:1200px"></canvas>
      <canvas id="pieChart"></canvas>
<script>
const xDate = [6, 7, 8, 10, 15, 16, 20]; 
const ySales =  [2029, 7625, 634, 597, 2975, 1087, 238];
const ctx1 = document.getElementById('myChart').getContext('2d');
    new Chart(ctx1, {
      type: 'line',
      data: {
        labels: xDate,
        datasets: [{
          label: 'Income',
          data: ySales,
          backgroundColor: 'rgba(0, 123, 255, 0.2)',
          borderColor: 'rgba(0, 123, 255, 1)',
          borderWidth: 0
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: false,
            title: {
              display: true,
              text: 'Income'
            }
          },
          x: {
            title: {
              display: true,
              text: 'Date'
            }
          }
        }
      }
    });


     // Sample data

    // Extract categories and counts from the data
    ae=['Resources','Students' ,'Teachers'];
    const categories =ae
    aa= [4,3,2];
    const counts = aa;
    // Create a chart using Chart.js
    const ctx = document.getElementById('pieChart').getContext('2d');
    new Chart(ctx, {
      type: 'pie',
      data: {
        labels: categories,
        datasets: [{
          data: counts,
          backgroundColor: ['rgba(255, 99, 132, 0.7)', 'rgba(54, 162, 235, 0.7)', 'rgba(255, 205, 86, 0.7)'],
          borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 205, 86, 1)'],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top',
          },
          title: {
            display: true,
            text: 'Category Distribution'
          }
        }
      }
    });
</script>
       
    </div>

  </body>
</html>
