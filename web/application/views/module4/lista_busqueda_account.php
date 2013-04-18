<?php
foreach ($lista as $value) {
    ?>
<div class="listabus" id="<?php echo $value['id']?>"><b><?php echo $value["cc"];?></b><?php echo $value["nombre"]?></div>
<?php
}
?>
