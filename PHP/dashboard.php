<!DOCTYPE html>
<html lang="en">
<head><?php   include "../includes/head.php"   ?></head>


<body>
    <div class="container-fluid">
      <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
          <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
            <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
              <span class="fs-5 d-none d-sm-inline">Menu</span>
            </a>
            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
              <li class="nav-item">
                <a href="../PHP/dashboard.php" class="nav-link align-middle px-0">
                  <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                </a>
              </li>
              <li>
                <a href="../PHP/dashboard.php" class="nav-link px-0 align-middle">
                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span></a>
              </li>
              <li>
                <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                   <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">ADD</span> </a>
                <ul class="collapse  nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                  <li class="w-100">
                    <a href="../php/addStudent.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Student</span>  </a>
                  </li>
                  <li>
                    <a href="../PHP/addResource.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Resource</span>  </a>
                  </li>
                </ul>
              </li>
             
              <li>
                <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                  <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Update</span></a>
                <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                  <li class="w-100">
                    <a href="../PHP/updateStudent.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Student</span> </a>
                  </li>
                  <li>
                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Resource</span> </a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                  <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Delete</span> </a>
                <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                  <li class="w-100">
                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Student</span></a>
                  </li>
                  <li>
                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Resource</span> </a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#" class="nav-link px-0 align-middle">
                  <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Customers</span> </a>
              </li>
            </ul>
            <hr>
          </div>
        </div>
        <div class="col py-3">
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
        </div>


      </div>

    </div>


    <script>
      const xDate = [6, 7, 8, 10, 15, 16, 20];
      const ySales = [2029, 7625, 634, 597, 2975, 1087, 238];
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
      ae = ['Resources', 'Students', 'Teachers'];
      const categories = ae
      aa = [4, 3, 2];
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


</body>

</html>