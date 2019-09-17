<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->

    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <?php
      // data main menu
      if($this->session->userdata('username'))
      {
        $main_menu = $this->db->get_where('menu_user', array('is_main_menu' => 0));

        foreach ($main_menu->result() as $main) {
            // Query untuk mencari data sub menu
            $sub_menu = $this->db->get_where('menu_user', array('is_main_menu' => $main->id));
            // periksa apakah ada sub menu
            if ($sub_menu->num_rows() > 0) {
                // main menu dengan sub menu
                echo "<li class='treeview'>" . anchor($main->link, '<i class="' . $main->icon . '"></i> <span>' . $main->judul_menu . '</span>' .
                        '<span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>');
                // sub menu nya disini
                echo "<ul class='treeview-menu'>";
                foreach ($sub_menu->result() as $sub) {
                    echo "<li>" . anchor($sub->link, '<i class="' . $sub->icon . '"></i>' . $sub->judul_menu) . "</li>";
                }
                echo"</ul></li>";
            } else {
                // main menu tanpa sub menu
                echo "<li>" . anchor($main->link, '<i class="' . $main->icon . '"></i> <span>' . $main->judul_menu) . " </span> </li>";
            }
        }

      }
      elseif ($this->session->userdata('man'))
      {
        $main_menu = $this->db->get_where('menu_admin', array('is_main_menu' => 0));

        foreach ($main_menu->result() as $main) {
            // Query untuk mencari data sub menu
            $sub_menu = $this->db->get_where('menu_admin', array('is_main_menu' => $main->id));
            // periksa apakah ada sub menu
            if ($sub_menu->num_rows() > 0) {
                // main menu dengan sub menu
                echo "<li class='treeview'>" . anchor($main->link, '<i class="' . $main->icon . '"></i> <span>' . $main->judul_menu . '</span>' .
                        '<span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>');
                // sub menu nya disini
                echo "<ul class='treeview-menu'>";
                foreach ($sub_menu->result() as $sub) {
                    echo "<li>" . anchor($sub->link, '<i class="' . $sub->icon . '"></i>' . $sub->judul_menu) . "</li>";
                }
                echo"</ul></li>";
            } else {
                // main menu tanpa sub menu
                echo "<li>" . anchor($main->link, '<i class="' . $main->icon . '"></i> <span>' . $main->judul_menu) . " </span> </li>";
            }
        }

      }
      else
      {
        $main_menu = $this->db->get_where('menu_public', array('is_main_menu' => 0));

        foreach ($main_menu->result() as $main) {
            // Query untuk mencari data sub menu
            $sub_menu = $this->db->get_where('menu_public', array('is_main_menu' => $main->id));
            // periksa apakah ada sub menu
            if ($sub_menu->num_rows() > 0) {
                // main menu dengan sub menu
                echo "<li class='treeview'>" . anchor($main->link, '<i class="' . $main->icon . '"></i> <span>' . $main->judul_menu . '</span>' .
                        '<span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>');
                // sub menu nya disini
                echo "<ul class='treeview-menu'>";
                foreach ($sub_menu->result() as $sub) {
                    echo "<li>" . anchor($sub->link, '<i class="' . $sub->icon . '"></i>' . $sub->judul_menu) . "</li>";
                }
                echo"</ul></li>";
            } else {
                // main menu tanpa sub menu
                echo "<li>" . anchor($main->link, '<i class="' . $main->icon . '"></i> <span>' . $main->judul_menu) . " </span> </li>";
            }
        }

      }
      ?>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
