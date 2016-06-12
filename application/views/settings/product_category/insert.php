<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
         <div class="box box-primary">
            <div class="box-header with-border">
               <h3 class="box-title">Product Category Form</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <?php echo form_open('product_category/insert'); ?>
                  <!-- text input -->
                  <div class="form-group">
                     <label>Name</label>
                     <input type="text" name="name" class="form-control" required>                     
                  </div>                 
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <input type="submit" class="btn btn-primary" value="Submit">
              <a href="<?php echo site_url('product_category'); ?>" class="btn btn-default">Back to List</a>
              </form>
            </div>
         </div>
      </div>
      <div class="col-md-3"></div>
   </div>
</section>
<!-- /.content -->