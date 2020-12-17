<?php $this->load->view('header');
?>
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <?php
            $st['class']='form-horizontal';
            echo form_open('home/getItemInfo2',$st);
            echo "<div>";
            form_label('Выберите товар','',array('class'=>'control-label'));
            echo '<select name="itemid">';
            foreach($list as $l){
                echo '<option value='.$l['id'].'>';
                echo $l['itemname'];
                echo '</option>';

            }
            echo '</select>';
            echo form_submit(array('name'=>'send','value'=>'OK','class'=>'btn btn-success'));

            echo "</div>";
            
            echo form_close();
            ?>

            </div>
