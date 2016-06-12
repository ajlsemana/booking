<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
         <div class="box box-primary">
            <div class="box-header with-border">
               <h3 class="box-title">Currency Form</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <?php echo form_open('settings/update_currency'); ?>
                  <!-- text input -->
                  <div class="form-group">
                     <label>Currency Name</label>
                     <input type="text" name="name" value="<?php echo $data->name; ?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label>Rate</label>
                     <input type="text" name="rate" value="<?php echo $data->rate; ?>" class="form-control" required>                     
                  </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
               <input type="hidden" name="id" value="<?php echo $data->id; ?>">
              <input type="submit" class="btn btn-primary" value="Submit">
              <a href="<?php echo site_url('settings/currencies'); ?>" class="btn btn-default">Back to List</a>
              </form>
            </div>
         </div>
      </div>
      <div class="col-md-2"></div>
   </div>
</section>
<!-- /.content -->