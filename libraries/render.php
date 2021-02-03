<?php

// fonction qui va renvoyer le contenu $pagecontent de la page

function render(string $path)
{
    ob_start();
    require 'libraries/views/' . $path . '.html.php';

    $pageContent = ob_get_clean();

    require 'libraries/views/layout.html.php';
}




?>