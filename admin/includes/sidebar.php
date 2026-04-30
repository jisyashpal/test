  <?php
  $cp = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
  $cpage = explode('.', $cp);
  $page = $cpage[0];
  // $armkey = array('category', 'subcategory', 'company', 'delivery-zone');
  $product = array('bannerlist', 'add_cat', 'add_homeabout', 'testimonial', 'client');
  ?>

  <aside class="main-sidebar sidebar elevation-4" style="background: #f1f2f6;">
    <div class="sidebar">
      <div class="user-panel pb-3 mb-3 d-flex">
        <div class="image" style="padding-left: 0px;">
          <br><br> <a href="dashboard.php" class="nav-link <?php if ($page == 'dashboard') {
                                                              echo 'active';
                                                            } ?>">
            <h2 style="font-size: 22px;
    color: black;">Amorous Glances</h2>
          </a>
        </div>
      </div>
      <nav class="" style="margin-top:-80px;">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <br> <br>
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link <?php if ($page == 'dashboard') {
                                                      echo 'active';
                                                    } ?>">
              <i class="nav-icon fas fa-tachometer-alt "></i>
              <b></b>
              <p style="color:#000;"><b> Dashboard</b>

              </p>
            </a>
          </li>

          <!-- home page  -->
          <li class="nav-item">
            <a href="bannerlist.php" class="nav-link  <?php if ($page == 'bannerlist') {
                                                        echo 'active';
                                                      } ?>">
              <i class="fa-solid fa-sliders" style="color:#040668;"></i>
              <p style="color:black;">&nbsp; Bannerlist</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="testimonial.php" class="nav-link  <?php if ($page == 'testimonial') {
                                                          echo 'active';
                                                        } ?>">
              <i class="fa-solid fa-comment" style="color:#040668;"></i>
              <p style="color:black;">&nbsp; Testimonial</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="co-sponsors.php" class="nav-link  <?php if ($page == 'co-sponsors') {
                                                          echo 'active';
                                                        } ?>">
              <i class="fa-solid fa-handshake" style="color:#040668;"></i>
              <p style="color:black;">&nbsp; Co-Sponsors</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="accolades.php" class="nav-link  <?php if ($page == 'accolades') {
                                                        echo 'active';
                                                      } ?>">
              <i class="fa-solid fa-award" style="color:#040668;"></i>
              <p style="color:black;">&nbsp; Accolades</p>
            </a>
          </li>


          <li class="nav-item">
            <a href="write-review.php" class="nav-link  <?php if ($page == 'write-review') {
                                                          echo 'active';
                                                        } ?>">
              <i class="fa-solid fa-square-pen" style="color:#040668;"></i>
              <p style="color:black;">&nbsp; Write a Review</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="contact.php" class="nav-link  <?php if ($page == 'contact') {
                                                      echo 'active';
                                                    } ?>">
              <i class="fa-solid fa-address-book" style="color:#040668;"></i>
              <p style="color:black;">&nbsp; Contact Us</p>
            </a>
          </li>



        </ul>
      </nav>
    </div>
  </aside>