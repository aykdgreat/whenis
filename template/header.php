 <header>
    <div class="logo"><span style="color:SeaGreen">when</span><span style="color:white">Is</span><span
        style="font-size:15px">.bday</span></div>
  <?php 
  // $showNav = true;
  if($showNav):   
      echo "<nav>
      <ul>
        <li><a href='index.php'>Home</a></li>
        <li><a href='new.php'>Add New</a></li>
        <li><a href='all.php'>All Birthdays</a></li>
        <li><a href='me.php'>My Profile</a></li>
        <li><a href='logout.php'>Logout</a></li>
      </ul>
      <div class='nav-body' id='nav-body'>
        <span href='#' class='close-nav' onclick='closeNav()'>&times;</span>
        <a href='index.php'>Home</a>
        <a href='new.php'>Add New</a>
        <a href='all.php'>All Birthdays</a>
        <a href='me.php'>My Profile</a>
        <a href='logout.php'>Logout</a>
      </div>
      <div class='open-nav' onclick='openNav()'>
        <div class='nav-line'></div>
        <div class='nav-line'></div>
        <div class='nav-line'></div>
      </div>
    </nav>";
  else: echo "";
    endif; 
    ?>
  </header>