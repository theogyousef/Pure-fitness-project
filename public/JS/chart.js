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