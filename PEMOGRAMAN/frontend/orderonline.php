<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout - Fiksi Cafe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .hero-section {
            height: 40vh;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1554118811-1e0d58224f24?auto=format&fit=crop&w=1600&q=80') no-repeat center center/cover;
        }
        
        .cart-item {
            border-bottom: 1px solid #eee;
            padding: 15px 0;
        }
        
        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .quantity-btn {
            width: 30px;
            height: 30px;
            border: 1px solid #ddd;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
        
        .step-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            position: relative;
        }
        
        .step-indicator::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            height: 2px;
            background: #dee2e6;
            z-index: 1;
        }
        
        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 2;
        }
        
        .step-number {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #8B4513;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .empty-cart {
            text-align: center;
            padding: 60px 20px;
        }
        
        .empty-cart i {
            font-size: 4rem;
            color: #dee2e6;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<?php include('../layout/header.html'); ?>

    <!-- Hero Section -->
    <section class="hero-section text-white d-flex align-items-center">
        <div class="container text-center">
            <h1 class="display-5 fw-bold mb-3">Checkout Pesanan</h1>
            <p class="lead">Lengkapi informasi pemesanan Anda</p>
        </div>
    </section>

    <!-- Order Process -->
    <section class="py-4 bg-light">
        <div class="container">
            <div class="step-indicator">
                <div class="step active">
                    <div class="step-number">1</div>
                    <span>Keranjang</span>
                </div>
                <div class="step">
                    <div class="step-number">2</div>
                    <span>Informasi</span>
                </div>
                <div class="step">
                    <div class="step-number">3</div>
                    <span>Konfirmasi</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Cart Items -->
                <div class="col-lg-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-white">
                            <h4 class="mb-0">
                                <i class="fas fa-shopping-cart me-2"></i>Keranjang Belanja
                            </h4>
                        </div>
                        <div class="card-body">
                            <div id="cartItems">
                                <!-- Cart items will be loaded here -->
                            </div>
                        </div>
                    </div>

                    <!-- Checkout Form -->
                    <div class="card shadow-sm mt-4">
                        <div class="card-header bg-white">
                            <h4 class="mb-0">
                                <i class="fas fa-user me-2"></i>Informasi Pemesanan
                            </h4>
                        </div>
                        <div class="card-body">
                            <form id="checkoutForm">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Lengkap *</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">No. Telepon *</label>
                                        <input type="tel" class="form-control" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control">
                                    </div>
                                    
                                    <div class="col-12 mb-3">
                                        <label class="form-label">Metode Pengiriman</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="delivery" checked>
                                            <label class="form-check-label">
                                                Antar ke Alamat (Rp 10.000)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="delivery">
                                            <label class="form-check-label">
                                                Ambil di Tempat (Gratis)
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 mb-3">
                                        <label class="form-label">Alamat Lengkap</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                    
                                    <div class="col-12 mb-3">
                                        <label class="form-label">Catatan Pesanan</label>
                                        <textarea class="form-control" rows="3" placeholder="Contoh: Kurangi gula, tambah es, dll."></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="col-lg-4">
                    <div class="card shadow-sm sticky-top" style="top: 20px;">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">Ringkasan Pesanan</h5>
                        </div>
                        <div class="card-body">
                            <div id="orderSummary">
                                <!-- Order summary will be loaded here -->
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <span>Subtotal</span>
                                        <span id="subtotal">Rp 0</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Biaya Pengiriman</span>
                                        <span id="deliveryFee">Rp 0</span>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between fw-bold">
                                        <span>Total</span>
                                        <span id="total">Rp 0</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid mt-3">
                                <button class="btn btn-primary btn-lg" onclick="processOrder()">
                                    <i class="fas fa-paper-plane me-2"></i>Konfirmasi Pesanan
                                </button>
                            </div>
                            <div class="text-center mt-3">
                                <small class="text-muted">
                                    <i class="fas fa-clock me-1"></i>
                                    Pesanan diproses dalam 15-30 menit
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-4">
      <h3>Keranjang Anda</h3>
      <div id="cartItems"></div>

      <div class="card mt-3">
        <div class="card-body">
          <div class="d-flex justify-content-between"><span>Subtotal</span><span id="subtotal">Rp 0</span></div>
          <div class="d-flex justify-content-between"><span>Biaya Pengiriman</span><span id="deliveryFee">Rp 0</span></div>
          <hr>
          <div class="d-flex justify-content-between fw-bold"><span>Total</span><span id="total">Rp 0</span></div>
        </div>
      </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
      const cart = JSON.parse(localStorage.getItem('cart') || '[]');
      const cartItemsEl = document.getElementById('cartItems');
      const subtotalEl = document.getElementById('subtotal');
      const deliveryFeeEl = document.getElementById('deliveryFee');
      const totalEl = document.getElementById('total');

      if (!cartItemsEl) return console.warn('Element #cartItems tidak ditemukan');

      if (cart.length === 0) {
        cartItemsEl.innerHTML = '<div class="text-muted py-4">Keranjang kosong.</div>';
        subtotalEl.textContent = 'Rp 0';
        deliveryFeeEl.textContent = 'Rp 0';
        totalEl.textContent = 'Rp 0';
        return;
      }

      let subtotal = 0;
      cartItemsEl.innerHTML = '';
      cart.forEach(item => {
        const q = Number(item.quantity) || 0;
        const p = Number(item.price) || 0;
        const line = q * p;
        subtotal += line;

        const row = document.createElement('div');
        row.className = 'd-flex justify-content-between align-items-center border-bottom py-2';
        row.innerHTML = `
          <div>
            <strong>${item.name}</strong><br>
            <small class="text-muted">Rp ${p.toLocaleString()} x ${q}</small>
          </div>
          <div class="fw-bold">Rp ${line.toLocaleString()}</div>
        `;
        cartItemsEl.appendChild(row);
      });

      const delivery = subtotal > 0 ? 5000 : 0; // contoh ongkir
      const total = subtotal + delivery;

      subtotalEl.textContent = 'Rp ' + subtotal.toLocaleString();
      deliveryFeeEl.textContent = 'Rp ' + delivery.toLocaleString();
      totalEl.textContent = 'Rp ' + total.toLocaleString();
    });
    </script>
</body>
</html>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 mb-4 mb-lg-0">
            <h5 class="text-uppercase mb-4">Fiksi Cafe</h5>
            <p>Tempat nyaman untuk menikmati kopi, buku, cerita, dan suasana hangat.</p>
            <div class="mt-4">
              <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-lg"></i></a>
              <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-lg"></i></a>
              <a href="#" class="text-white me-3"><i class="fab fa-tiktok fa-lg"></i></a>
              <a href="#" class="text-white me-3"><i class="fab fa-whatsapp fa-lg"></i></a>
              <a href="#" class="text-white"><i class="fab fa-youtube fa-lg"></i></a>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <h5 class="text-uppercase mb-4">Kontak Kami</h5>
            <p class="mb-2"><i class="fas fa-map-marker-alt me-2"></i>Jl. Contoh No.123, Majalengka</p>
            <p class="mb-2"><i class="fas fa-phone me-2"></i>0812-3456-7890</p>
            <p class="mb-2"><i class="fas fa-envelope me-2"></i>fiksi.cafe@mail.com</p>
            <p><i class="fas fa-clock me-2"></i>Buka: 09.00 - 22.00 WIB</p>
          </div>
          <div class="col-lg-4">
            <h5 class="text-uppercase mb-4">Newsletter</h5>
            <p>Dapatkan informasi promo dan menu terbaru dari Fiksi Cafe</p>
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Email Anda" aria-label="Email">
              <button class="btn btn-primary" type="button">Daftar</button>
            </div>
          </div>
        </div>
        <hr class="my-4">
        <div class="row align-items-center">
          <div class="col-md-6">
            <p class="mb-0">&copy; 2025 Fiksi Cafe. All rights reserved.</p>
          </div>
          <div class="col-md-6 text-md-end">
            <p class="mb-0">Powered By : Moch Lutfi Hilmi Fathurohman</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Order System JavaScript -->
    <script>
      // Sample menu data
      const menuItems = [
        // Kopi
        { id: 1, name: "Espresso Fiksi", category: "kopi", price: 25000, image: "https://images.unsplash.com/photo-1544787219-7f47ccb76574?auto=format&fit=crop&w=500&q=80", bestSeller: true },
        { id: 2, name: "Latte Art Special", category: "kopi", price: 35000, image: "https://images.unsplash.com/photo-1572442388796-11668a67e53d?auto=format&fit=crop&w=500&q=80", bestSeller: true },
        { id: 3, name: "Cappuccino Classic", category: "kopi", price: 32000, image: "https://images.unsplash.com/photo-1572442388796-11668a67e53d?auto=format&fit=crop&w=500&q=80" },
        { id: 4, name: "Americano", category: "kopi", price: 28000, image: "https://images.unsplash.com/photo-1511537190424-bbbab87ac5eb?auto=format&fit=crop&w=500&q=80" },
        
        // Non-Kopi
        { id: 5, name: "Matcha Latte", category: "non-kopi", price: 35000, image: "https://images.unsplash.com/photo-1515823064-d6e0c04616a7?auto=format&fit=crop&w=500&q=80", bestSeller: true },
        { id: 6, name: "Chocolate Mint", category: "non-kopi", price: 32000, image: "https://images.unsplash.com/photo-1572490122747-3968b75cc699?auto=format&fit=crop&w=500&q=80" },
        { id: 7, name: "Thai Tea", category: "non-kopi", price: 28000, image: "https://images.unsplash.com/photo-1567095761054-7a02e69e5c43?auto=format&fit=crop&w=500&q=80" },
        
        // Makanan
        { id: 8, name: "Croissant Almond", category: "makanan", price: 28000, image: "https://images.unsplash.com/photo-1563729784474-d77dbb933a9e?auto=format&fit=crop&w=500&q=80", bestSeller: true },
        { id: 9, name: "Sandwich Club", category: "makanan", price: 45000, image: "https://images.unsplash.com/photo-1539252554453-80ab65ce3586?auto=format&fit=crop&w=500&q=80" },
        { id: 10, name: "Avocado Toast", category: "makanan", price: 35000, image: "https://images.unsplash.com/photo-1541519227354-08fa5d50c44d?auto=format&fit=crop&w=500&q=80" },
        
        // Snack
        { id: 11, name: "Chocolate Chip Cookies", category: "snack", price: 22000, image: "https://images.unsplash.com/photo-1499636136210-6f4ee915583e?auto=format&fit=crop&w=500&q=80", bestSeller: true },
        { id: 12, name: "Banana Bread", category: "snack", price: 25000, image: "https://images.unsplash.com/photo-1586444248902-2f64eddc13df?auto=format&fit=crop&w=500&q=80" },
        { id: 13, name: "Tiramisu", category: "snack", price: 35000, image: "https://images.unsplash.com/photo-1571877227200-a0d98ea607e9?auto=format&fit=crop&w=500&q=80" }
      ];

      let cart = [];
      let currentStep = 1;

      // Initialize the page
      document.addEventListener('DOMContentLoaded', function() {
        loadMenuItems();
        setupEventListeners();
      });

      // Load menu items to the grid
      function loadMenuItems(filter = 'all') {
        const menuGrid = document.getElementById('menuGrid');
        menuGrid.innerHTML = '';

        const filteredItems = filter === 'all' ? menuItems : menuItems.filter(item => item.category === filter);

        filteredItems.forEach(item => {
          const menuCard = createMenuCard(item);
          menuGrid.appendChild(menuCard);
        });
      }

      // Create menu card element
      function createMenuCard(item) {
        const col = document.createElement('div');
        col.className = 'col-md-6 col-lg-4';
        col.setAttribute('data-category', item.category);

        col.innerHTML = `
          <div class="card order-card ${item.bestSeller ? 'best-seller' : ''}">
            ${item.bestSeller ? '<span class="badge bg-warning category-badge">Best Seller</span>' : ''}
            <img src="${item.image}" class="card-img-top menu-img" alt="${item.name}">
            <div class="card-body">
              <h6 class="card-title">${item.name}</h6>
              <div class="d-flex justify-content-between align-items-center">
                <span class="price-tag">Rp ${item.price.toLocaleString()}</span>
                <button class="btn btn-outline-primary btn-sm" onclick="addToCart(${item.id})">
                  <i class="fas fa-plus"></i> Tambah
                </button>
              </div>
            </div>
          </div>
        `;

        return col;
      }

      // Setup event listeners
      function setupEventListeners() {
        // Filter buttons
        document.querySelectorAll('.filter-btn').forEach(button => {
          button.addEventListener('click', function() {
            document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            loadMenuItems(this.getAttribute('data-filter'));
          });
        });

        // Delivery type toggle
        document.querySelectorAll('input[name="deliveryType"]').forEach(radio => {
          radio.addEventListener('change', function() {
            const addressSection = document.getElementById('deliveryAddressSection');
            const deliveryFee = document.getElementById('deliveryFee');
            
            if (this.value === 'pickup') {
              addressSection.style.display = 'none';
              deliveryFee.textContent = 'Gratis';
              updateCartTotal();
            } else {
              addressSection.style.display = 'block';
              deliveryFee.textContent = 'Rp 10.000';
              updateCartTotal();
            }
          });
        });

        // Checkout form submission
        document.getElementById('checkoutForm').addEventListener('submit', function(e) {
          e.preventDefault();
          processOrder();
        });
      }

      // Add item to cart
      function addToCart(itemId) {
        const item = menuItems.find(menuItem => menuItem.id === itemId);
        const existingItem = cart.find(cartItem => cartItem.id === itemId);

        if (existingItem) {
          existingItem.quantity += 1;
        } else {
          cart.push({
            ...item,
            quantity: 1
          });
        }

        updateCartDisplay();
        showCartNotification(`${item.name} ditambahkan ke keranjang`);
      }

      // Update cart quantity
      function updateQuantity(itemId, change) {
        const item = cart.find(cartItem => cartItem.id === itemId);
        
        if (item) {
          item.quantity += change;
          
          if (item.quantity <= 0) {
            cart = cart.filter(cartItem => cartItem.id !== itemId);
          }
        }
        
        updateCartDisplay();
      }

      // Remove item from cart
      function removeFromCart(itemId) {
        cart = cart.filter(cartItem => cartItem.id !== itemId);
        updateCartDisplay();
      }

      // Update cart display
      function updateCartDisplay() {
        const cartItems = document.getElementById('cartItems');
        const cartSummary = document.getElementById('cartSummary');
        
        if (cart.length === 0) {
          cartItems.innerHTML = `
            <div class="text-center text-muted py-4">
              <i class="fas fa-shopping-cart fa-2x mb-3"></i>
              <p>Keranjang belanja Anda masih kosong</p>
            </div>
          `;
          cartSummary.style.display = 'none';
        } else {
          cartItems.innerHTML = '';
          cart.forEach(item => {
            const cartItem = document.createElement('div');
            cartItem.className = 'cart-item';
            cartItem.innerHTML = `
              <div class="d-flex justify-content-between align-items-start">
                <div class="flex-grow-1">
                  <h6 class="mb-1">${item.name}</h6>
                  <p class="mb-1 text-muted">Rp ${item.price.toLocaleString()}</p>
                </div>
                <button class="btn btn-sm btn-outline-danger ms-2" onclick="removeFromCart(${item.id})">
                  <i class="fas fa-trash"></i>
                </button>
              </div>
              <div class="quantity-controls">
                <button class="quantity-btn" onclick="updateQuantity(${item.id}, -1)">-</button>
                <span>${item.quantity}</span>
                <button class="quantity-btn" onclick="updateQuantity(${item.id}, 1)">+</button>
                <span class="ms-auto fw-bold">Rp ${(item.price * item.quantity).toLocaleString()}</span>
              </div>
            `;
            cartItems.appendChild(cartItem);
          });
          
          cartSummary.style.display = 'block';
          updateCartTotal();
        }
      }

      // Update cart total
      function updateCartTotal() {
        const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        const deliveryFee = document.querySelector('input[name="deliveryType"]:checked').value === 'delivery' ? 10000 : 0;
        const total = subtotal + deliveryFee;
        
        document.getElementById('subtotal').textContent = `Rp ${subtotal.toLocaleString()}`;
        document.getElementById('deliveryFee').textContent = deliveryFee === 0 ? 'Gratis' : `Rp ${deliveryFee.toLocaleString()}`;
        document.getElementById('total').textContent = `Rp ${total.toLocaleString()}`;
      }

      // Show cart notification
      function showCartNotification(message) {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = 'alert alert-success position-fixed';
        notification.style.cssText = 'top: 100px; right: 20px; z-index: 1050; min-width: 300px;';
        notification.innerHTML = `
          <i class="fas fa-check-circle me-2"></i>${message}
        `;
        
        document.body.appendChild(notification);
        
        // Remove notification after 3 seconds
        setTimeout(() => {
          notification.remove();
        }, 3000);
      }

      // Proceed to checkout
      function proceedToCheckout() {
        if (cart.length === 0) {
          alert('Keranjang belanja Anda masih kosong. Silakan tambahkan item terlebih dahulu.');
          return;
        }
        
        // Update step indicator
        document.getElementById('step1').classList.remove('active');
        document.getElementById('step2').classList.add('active');
        currentStep = 2;
        
        // Show checkout section
        document.getElementById('checkoutSection').style.display = 'block';
        
        // Scroll to checkout section
        document.getElementById('checkoutSection').scrollIntoView({ behavior: 'smooth' });
        
        // Populate order summary in checkout
        updateCheckoutOrderSummary();
      }

      // Back to menu
      function backToMenu() {
        // Update step indicator
        document.getElementById('step2').classList.remove('active');
        document.getElementById('step1').classList.add('active');
        currentStep = 1;
        
        // Hide checkout section
        document.getElementById('checkoutSection').style.display = 'none';
        
        // Scroll to top
        window.scrollTo({ top: 0, behavior: 'smooth' });
      }

      // Update checkout order summary
      function updateCheckoutOrderSummary() {
        const summaryContainer = document.getElementById('checkoutOrderSummary');
        summaryContainer.innerHTML = '';
        
        cart.forEach(item => {
          const summaryItem = document.createElement('div');
          summaryItem.className = 'order-summary-item';
          summaryItem.innerHTML = `
            <div class="flex-grow-1">
              <h6 class="mb-1">${item.name}</h6>
              <small class="text-muted">${item.quantity} x Rp ${item.price.toLocaleString()}</small>
            </div>
            <span class="fw-bold">Rp ${(item.price * item.quantity).toLocaleString()}</span>
          `;
          summaryContainer.appendChild(summaryItem);
        });
        
        // Add total
        const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        const deliveryFee = document.querySelector('input[name="deliveryType"]:checked').value === 'delivery' ? 10000 : 0;
        const total = subtotal + deliveryFee;
        
        const totalItem = document.createElement('div');
        totalItem.className = 'order-summary-item';
        totalItem.innerHTML = `
          <div class="flex-grow-1">
            <h6 class="mb-0">Total</h6>
          </div>
          <span class="fw-bold fs-5 text-primary">Rp ${total.toLocaleString()}</span>
        `;
        summaryContainer.appendChild(totalItem);
      }

      // Process order
      function processOrder() {
        // In a real application, you would send this data to a server
        const orderData = {
          customer: {
            name: document.getElementById('customerName').value,
            phone: document.getElementById('customerPhone').value,
            email: document.getElementById('customerEmail').value
          },
          delivery: {
            type: document.querySelector('input[name="deliveryType"]:checked').value,
            address: document.getElementById('deliveryAddress').value,
            note: document.getElementById('deliveryNote').value
          },
          payment: {
            method: document.querySelector('input[name="paymentMethod"]:checked').value
          },
          order: {
            items: cart,
            notes: document.getElementById('orderNotes').value,
            total: calculateOrderTotal()
          },
          timestamp: new Date().toISOString()
        };
        
        // Simulate order processing
        alert('Pesanan Anda berhasil dikirim! Kami akan segera memproses pesanan Anda.');
        
        // Reset cart and form
        cart = [];
        updateCartDisplay();
        document.getElementById('checkoutForm').reset();
        backToMenu();
        
        // Update step indicator to completed
        document.getElementById('step2').classList.remove('active');
        document.getElementById('step3').classList.add('completed');
        document.getElementById('step4').classList.add('active');
      }

      // Calculate order total
      function calculateOrderTotal() {
        const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        const deliveryFee = document.querySelector('input[name="deliveryType"]:checked').value === 'delivery' ? 10000 : 0;
        return subtotal + deliveryFee;
      }

      // Muat cart dari localStorage agar keranjang yang ditambahkan di menu.php muncul di halaman ini
      document.addEventListener('DOMContentLoaded', function() {
        // pastikan struktur yang sama dengan yang disimpan di menu.php (id, name, price, quantity)
        window.cart = JSON.parse(localStorage.getItem('cart')) || [];

        // normalisasi tipe data
        window.cart.forEach(item => {
          item.price = Number(item.price) || 0;
          item.quantity = Number(item.quantity) || 0;
        });

        // jika fungsi updateCartDisplay/updateCartTotal/updateCheckoutOrderSummary sudah ada, panggil
        if (typeof updateCartDisplay === 'function') {
          updateCartDisplay();
        } else {
          // fallback: render sederhana ke #cartItems
          const cartItemsEl = document.getElementById('cartItems');
          if (cartItemsEl) {
            if (window.cart.length === 0) {
              cartItemsEl.innerHTML = '<div class="text-center text-muted py-4"><i class="fas fa-shopping-cart fa-2x mb-3"></i><p>Keranjang belanja Anda masih kosong</p></div>';
            } else {
              cartItemsEl.innerHTML = '';
              window.cart.forEach(item => {
                const div = document.createElement('div');
                div.className = 'cart-item';
                div.innerHTML = `<div class="d-flex justify-content-between"><div><h6>${item.name}</h6><small class="text-muted">Rp ${Number(item.price).toLocaleString()}</small></div><div class="fw-bold">x ${item.quantity}</div></div>`;
                cartItemsEl.appendChild(div);
              });
            }
          }
        }

        if (typeof updateCheckoutOrderSummary === 'function') updateCheckoutOrderSummary();
        if (typeof updateCartTotal === 'function') updateCartTotal();
      });
    </script>
  </body>
</html>