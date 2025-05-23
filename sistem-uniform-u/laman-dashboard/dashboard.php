<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <?php include '../sidebar.php'; ?> <!--Menambahkan sidebar-->
</head>
<body>

<!-- Main Content -->
<div class="flex-grow-1 p-4">
  <h2>Selamat Datang, Nana</h2>
  <hr>

  <!-- Row Cards -->
  <div class="row g-4 mb-4">
    <!-- Total Penjualan -->
    <div class="col-md-6 col-xl-3">
      <div class="card shadow-sm border-0">
        <div class="card-body d-flex align-items-center">
          <div class="me-3">
            <i class="fas fa-shopping-cart fa-2x text-primary"></i>
          </div>
          <div>
            <h6 class="mb-0">Total Penjualan</h6>
            <h4 class="fw-bold">28</h4>
          </div>
        </div>
      </div>
    </div>

    <!-- Total Pendapatan -->
    <div class="col-md-6 col-xl-3">
      <div class="card shadow-sm border-0">
        <div class="card-body d-flex align-items-center">
          <div class="me-3">
            <i class="fas fa-money-bill-wave fa-2x text-success"></i>
          </div>
          <div>
            <h6 class="mb-0">Pendapatan</h6>
            <h4 class="fw-bold">Rp 2.800.000</h4>
          </div>
        </div>
      </div>
    </div>

    <!-- Total Pelanggan -->
    <div class="col-md-6 col-xl-3">
      <div class="card shadow-sm border-0">
        <div class="card-body d-flex align-items-center">
          <div class="me-3">
            <i class="fas fa-users fa-2x text-warning"></i>
          </div>
          <div>
            <h6 class="mb-0">Pelanggan</h6>
            <h4 class="fw-bold">124</h4>
          </div>
        </div>
      </div>
    </div>

    <!-- Total Produk -->
    <div class="col-md-6 col-xl-3">
      <div class="card shadow-sm border-0">
        <div class="card-body d-flex align-items-center">
          <div class="me-3">
            <i class="fas fa-boxes fa-2x text-danger"></i>
          </div>
          <div>
            <h6 class="mb-0">Jumlah Produk</h6>
            <h4 class="fw-bold">48</h4>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Grafik Penjualan & Reminder Produk -->
<div class="row g-4 mb-4">
  <!-- Grafik Penjualan -->
  <div class="col-lg-8">
    <div class="card shadow-sm border-0 h-100">
      <div class="card-body">
        <h5 class="card-title">Grafik Penjualan</h5>
        <canvas id="salesChart" height="150"></canvas>
      </div>
    </div>
  </div>

  <!-- Produk Hampir Habis -->
  <div class="col-lg-4">
    <div class="card shadow-sm border-0 h-100">
      <div class="card-body">
        <h5 class="card-title mb-3">Stok Hampir Habis!</h5>
        <div class="card product-card mb-3">
          <img src="../assets/uniform/Rok.png" class="card-img-top img-fluid" style="max-height: 400px; max-width: 400px; object-fit: contain;" alt="Stok Hampir Habis">
          <div class="card-body">
            <span class="product-tag tag-sd">SD</span>
            <div class="d-flex justify-content-between align-items-center">
              <strong>Rok Merah</strong>
            </div>
            <small class="text-muted">Wanita</small>
            <hr>
            <div class="size-buttons">
              <button class="btn btn-outline-secondary btn-sm" onclick="showStock(this, 2)">XL</button>
              <button class="btn btn-outline-secondary btn-sm" onclick="showStock(this, 1)">L</button>
              <button class="btn btn-outline-secondary btn-sm" onclick="showStock(this, 0)">M</button>
            </div>
            <div class="stock-text text-danger mt-2">Stok beberapa ukuran hampir habis!</div>
            <hr>
            <h6 class="fw-bold">IDR 94,760</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
</div>

<!-- Efek Collapse di Sidebar -->
<script>
  const sidebar = document.getElementById('sidebar');
  const toggleBtn = document.getElementById('toggleSidebar');
  const logo = document.getElementById('sidebarLogo');

  toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('collapsed');
  });

  sidebar.addEventListener('mouseenter', () => {
    if (sidebar.classList.contains('collapsed')) {
      sidebar.classList.remove('collapsed');
    }
  });

  sidebar.addEventListener('mouseleave', () => {
    if (!sidebar.classList.contains('manual-toggle')) {
      sidebar.classList.add('collapsed');
    }
  });
</script>

<!-- Visualisasi Chart -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('salesChart').getContext('2d');
  const salesChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
      datasets: [{
        label: 'Penjualan',
        data: [5, 12, 9, 14, 8, 15],
        backgroundColor: 'rgba(13, 110, 253, 0.2)',
        borderColor: 'rgba(13, 110, 253, 1)',
        borderWidth: 2,
        tension: 0.3,
        fill: true,
        pointBackgroundColor: 'rgba(13, 110, 253, 1)'
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  function showStock(btn, qty) {
    const stockText = btn.closest('.card-body').querySelector('.stock-text');
    stockText.textContent = `Stok ukuran ${btn.innerText}: ${qty}`;
    if (qty <= 2) {
      stockText.classList.add('text-danger');
    } else {
      stockText.classList.remove('text-danger');
    }
  }
</script>

</body>
</html>