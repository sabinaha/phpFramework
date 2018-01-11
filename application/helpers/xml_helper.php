<?php
/*Start xml_helper.php file */
function print_xml($loadedpage){
    if ($loadedpage == "pancake")
      $xmlfile = file_get_contents("http://localhost:8888/tasty/assets/xml/pancakes.xml");
    else
      $xmlfile = file_get_contents("http://localhost:8888/tasty/assets/xml/meatballs.xml");

    $cookbook = new SimpleXMLElement($xmlfile);
    echo "<h1>".$cookbook->recipe->title."</h1>";
    echo "<img class='recipeImage' src='".$cookbook->recipe->imagepath."' alt='Picture of ".$cookbook->recipe->title."' />";

    echo "<div class='left'>";
    echo "<h2>Ingredients</h2><ul>";
    foreach ($cookbook->recipe->ingredient->li as $li)
      echo "<li>".$li."</li>", PHP_EOL;
    echo "</div>";

    echo "<div class='middle'>";
    echo "<h2>Directions</h2><ol>";
    echo "<p><strong>Prep: </strong>".$cookbook->recipe->preptime,
         "<strong>Cook: </strong>".$cookbook->recipe->cooktime,
         "<strong>Ready in: </strong>".$cookbook->recipe->totaltime."</p>";
    foreach ($cookbook->recipe->recipetext->li as $li)
      echo "<li>".$li."</li>", PHP_EOL;

    echo "</div>";
}
/*     * End xml_helper.php file     */
?>
