<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
         <div class="box box-primary">
            <div class="box-header with-border">
               <h3 class="box-title">Customer Form</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <?php echo form_open_multipart('customers/insert'); ?>
                  <!-- text input -->
                  <div class="form-group">
                     <label>Company</label>
                     <input type="text" name="company" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label>Address</label><br>
                     <input type="text" name="address" class="form-control">
                  </div>
                  <div class="form-group">
                     <label>Contact Person</label>                     
                     <input type="text" name="contact_person" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label>Company Logo</label>
                     <i>(jpg or png only)</i>
                     <br>
                     <input type="file" name="userfile" class="form-control">
                  </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <input type="submit" class="btn btn-primary" value="Submit">
              <a href="<?php echo site_url('customers'); ?>" class="btn btn-default">Back to List</a>
              </form>
            </div>
         </div>
      </div>
      <div class="col-md-2"></div>
   </div>
</section>
<!-- /.content -->