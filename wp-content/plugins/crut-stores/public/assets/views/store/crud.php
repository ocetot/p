<?php ob_start();?>

<div class="row">
    <div class="col-xs-12">
        <h2>Ingresa la ubicacionddd</h2>
        
        <form id="crud_store_form_create" action="" method="POST">
            



            <input type="text" name="method" value="POST">
            <input type="text" name="action" value="create-store">
            <input type="text" name="_wpnonce" value="<?php echo wp_create_nonce('create-store');?>">
           


           
            <div class="form-group">
                <input type="text" name="store_name" class="form-control" placeholder="Nombre">
            </div>

            <div class="form-group">
                <input type="text" name="store_address" class="form-control" placeholder="Direccion">
            </div>

            <div class="form-group">
            <input type="text" name="store_lantitud" class="form-control" placeholder="Lantitud">
            </div>

            <div class="form-group">
            <input type="text" name="store_longitud" class="form-control" placeholder="Longitud">
            </div>

            <div class="form-group">
            <input type="submit" class="btn btn-success" >
            </div>   
            
            
        </form>
    </div>
</div>


<?php $view_crut_store = ob_get_contents();?>
<?php ob_end_clean();?>
