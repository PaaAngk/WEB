<?php
    // объявили переменную, которая True если адрес совпадает с адресом с страницы с картинкой
    $is_image = $url == "/Mark2/image"; 
    $is_info = $url == "/Mark2/info"; 
?>
<h4>Это Toyota Mark 2</h4>
<ul class="nav nav-pills  mb-2">
  <li class="nav-item">
    <a class="nav-link <?php echo $is_image ? "active" : '' ?>" aria-current="page" href="/Mark2/image">Картинка</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?= $is_info ? "active" : '' ?>" href="/Mark2/info">Описание</a>
  </li>
</ul>   

<?php 
    $url = $_SERVER["REQUEST_URI"];

    if (preg_match("#^/Mark2/image#", $url)) {
        require "../views/Mark2_image.php";
    } elseif (preg_match("#^/Mark2/info#", $url)) {
        require "../views/Mark2_info.php";
    } 
    
?>