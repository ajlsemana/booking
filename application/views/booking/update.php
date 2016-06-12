<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8" style="display: none;">
         <div class="box box-primary">
            <div class="box-header with-border">
               <h3 class="box-title">Update Booking Form</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <?php echo form_open('booking/update'); ?>
                  <!-- text input -->
                  <div class="form-group">
                     <label>Company</label>
                     <input type="text" name="company" value="<?php echo $data->company; ?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label>Address</label><br>
                     <input type="text" name="address" value="<?php echo $data->address; ?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label>Contact Person</label>                     
                     <input type="text" name="contact_person" value="<?php echo $data->contact_person; ?>" class="form-control" required>
                  </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
               <input type="hidden" name="id" value="<?php echo $data->id; ?>">
              <!--<input type="submit" class="btn btn-primary" value="Submit">-->
              <a href="<?php echo site_url('booking?year='.$_GET['year']); ?>" class="btn btn-default">Back to List</a>
              </form>
            </div>
         </div>
      </div>
      <div class="col-md-2"></div>
   </div>
</section>
<!-- /.content -->