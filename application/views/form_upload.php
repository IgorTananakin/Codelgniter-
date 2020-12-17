<?php $this->load->view('header'); ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
        <?php
            if(isset($error)){
                echo '<div stryle="color:red;"'.$error.'</div>';
            } else {
                echo '<div style="color:green;">'.$result.'</div>';

            }

            echo '<div class="mt-4"';
            $rt['class']='form-horisontal';
            echo form_open('home/uploadImages',$st);
            echo form_label('Выберите картинку','',array('class'=>'control-label'));
            echo form_upload('image',array('class'=>'form-control'));
            echo form_submit(array('name'=>'send', 'value'=>'OK','class'=>'btn btn-success'));
            echo form_close();
            ?>
            </div>
            </div>
            <?php
            $this->load->view('footer');