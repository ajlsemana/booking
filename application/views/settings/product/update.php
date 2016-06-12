<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
         <div class="box box-primary">
            <div class="box-header with-border">
               <h3 class="box-title">Product Form</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <?php echo form_open('product/update'); ?>
                  <!-- text input -->
                  <div class="form-group">
                     <label>Name</label>
                     <input type="text" name="product_name" value="<?php echo $data->product_name; ?>" class="form-control" required>                                                           
                  </div>
                  <div class="form-group">
                     <label>Price</label> 
                     <input type="text" name="price" value="<?php echo $data->price; ?>" class="form-control" required>                     
                  </div>
                  <div class="form-group">
                     <label>Product Category</label> 
                     <select name="category" class="form-control">
                      <option value="">- Please Select - </option>
                      <?php
                        foreach($categories as $row) {
                          $selected = ($row->id == $data->cat_id ? 'selected': '');
                          echo '<option value="'.$row->id.'" '.$selected.'>'.$row->product.'</option>';
                        }
                      ?>
                     </select>                    
                  </div>                                 
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
               <input type="hidden" name="id" value="<?php echo $data->id; ?>">
              <input type="submit" class="btn btn-primary" value="Submit">
              <a href="<?php echo site_url('product'); ?>" class="btn btn-default">Back to List</a>
              </form>
            </div>
         </div>
      </div>
      <div class="col-md-2"></div>
   </div>
</section>
<!-- /.content -->