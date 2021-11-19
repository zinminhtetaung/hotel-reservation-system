<body>
  <!--========== NAV ==========-->
  <div class="nav" id="navbar">
    <nav class="nav__container">
      <div>
        <a href="#" class="nav__link nav__logo">
          <i class='bx bxs-disc nav__icon'></i>
          <span class="nav__logo-name">Relax</span>
        </a>

        <div class="nav__list">
          <div class="nav__items">
            <h3 class="nav__subtitle">Dashboard</h3>

            <a href="user/home" class="nav__link active">
              <i class='bx bx-home nav__icon'></i>
              <span class="nav__name">Home</span>
            </a>

            <div class="nav__dropdown">
              <a href="#" class="nav__link">
                <i class='bx bx-user nav__icon'></i>
                <span class="nav__name">User View</span>
                <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
              </a>

              <div class="nav__dropdown-collapse">
                <div class="nav__dropdown-content">
                  <a href="user/home" class="nav__dropdown-item">Home</a>
                  <a href="user/hotelview" class="nav__dropdown-item">Hotels</a>
                  <a href="user/roomuserview" class="nav__dropdown-item">Rooms</a>
                </div>
              </div>
            </div>
          </div>

          <div class="nav__items">
            <h3 class="nav__subtitle">Admin View</h3>

            <div class="nav__dropdown">
              <a href="#" class="nav__link">
                <i class='bx bx-bell nav__icon'></i>
                <span class="nav__name">Manage System</span>
                <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
              </a>

              <div class="nav__dropdown-collapse">
                <div class="nav__dropdown-content">
                <a href="/users" class="nav__dropdown-item">User</a>
                  <a href="/hotels/list" class="nav__dropdown-item">Hotel</a>
                  <a href="/rooms/list" class="nav__dropdown-item">Room</a>
                  <a href="/" class="nav__dropdown-item">Reservation</a>
                  <a href="/search" class="nav__dropdown-item">Search</a>
                  <a href="/onlineBooking" class="nav__dropdown-item">Online Booking</a>
                </div>
              </div>

            </div>

            <a href="/graph" class="nav__link">
              <i class='bx bx-compass nav__icon'></i>
              <span class="nav__name">Graph</span>
            </a>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <!--========== CONTENTS ==========-->

</body>