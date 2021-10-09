<?php
    // объявили переменную, которая True если адрес совпадает с адресом с страницы с картинкой
    $is_image = $url == "/Mustang/image"; 
    $is_info = $url == "/Mustang/info"; 
?>
<h4>Это Ford Mustang</h4>
<ul class="nav nav-pills mb-2">
  <li class="nav-item">
    <a class="nav-link <?php echo $is_image ? "active" : '' ?>" aria-current="page" href="/Mustang/image">Картинка</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?= $is_info ? "active" : '' ?>" href="/Mustang/info">Описание</a>
  </li>
</ul>

<?php 
    $url = $_SERVER["REQUEST_URI"];

    if (preg_match("#^/Mustang/image#", $url)) {
        require "../views/Mustang_image.php";
    } elseif (preg_match("#^/Mustang/info#", $url)) {
        require "../views/Mustang_info.php";
    } 
    
?>