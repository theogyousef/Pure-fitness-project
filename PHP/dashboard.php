<!DOCTYPE html>
<html lang="en">
<head><?php   include "../includes/head.php"   ?></head>


<body>
    <div class="container-fluid">
      <div class="row flex-nowrap">
      <?php   include "../includes/aside.php"   ?>
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

          <div style="display: flex;">
                 <div style="width: 900px;">
                   <canvas id="myChart"></canvas>
                 </div>
                 <div style="width: 900px;">
                  <canvas id="pieChart"></canvas>
                </div>

        </div>


      </div>

    </div>


    <script src="../JS/chart.js"></script>


</body>

</html>