<?php
$this->load->view('header');
echo "<h1>".$title."</h1>";


echo "<table>";
foreach($items as $c) {
    echo "<tr>";
    echo "<td>".$c['itemname']."</td>";
    echo "<td>".$c['pricein']."</td>";
    echo "<td>".$c['pricesale']."</td>";
    echo "<td>".$c['info']."</td>";

}
echo "</table>";

$this->load->view('footer');