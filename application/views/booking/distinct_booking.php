<!-- Main content -->
<br>
<section class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="box">
            <?php echo form_open_multipart('booking/update', array('id' => 'updateForm')); ?>
            <div class="box-header">
			   <u>
				  <h4><?php echo $data->booking_name; ?></h4>
			   </u>			   
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			   <div class="col-md-10">
               <table style="width: 75%;" class="tables">
                  <tr>
                     <td><label>Project Name</label></td>
                     <td><input type="text" value="<?php echo $data->project_name; ?>" name="project_name" class="form-controls" size="60" required></td>
                  </tr>
                  <tr>
                     <td><label>Customer Name</label></td>
                     <td>
                        <select name="company" required>
                        <?php
                           $html = '';
						   $logo = base_url().'images/customers/no-photo.jpg';
                           foreach($customers as $customer) {
                            $selected = ($customer->company == $data->customer_id ? 'selected' : '');
                            if($customer->company == $data->customer_id) {
								if($customer->uploaded_file != '') {
									$logo = base_url().'uploads/customers/'.$customer->uploaded_file;
								}
							}
                            $html .= '<option value="'.$customer->company.'" '.$selected.'>'.$customer->company.'</option>';
                           }
                           echo $html;
                           ?>
                        </select>
                     </td>					 
                  </tr>
                  <tr>
                     <td><label>PO Date</label></td>
                     <td>
                        <?php echo date('d-m-Y', strtotime($data->po_date)); ?>
                        <!--<input type="date" readonly value="<?php echo $data->po_date; ?>" name="po_date">-->
                     </td>
                  </tr>
                  <tr>
                     <td><label>Customer PO No.</label></td>
                     <td><input type="text" size="60" value="<?php echo $data->cust_po_num; ?>" class="form-controls" size="30" name="cust_po_num" required></td>
                  </tr>
                  <tr>
                     <td><label>Currency</label></td>
                     <td>
                        <u><?php echo $data->currency; ?></u>
                        <select id="sel-currency" disabled required style="display: none;">
                        <?php
                           $html = '';
                           foreach($currencies as $row) {
                               $selected = ($row->name == $data->currency ? 'selected' : '');
                               $html .= '<option value="'.$row->name.'|'.$row->rate.'" '.$selected.'>'.$row->name.'</option>';
                           }
                           echo $html;
                           ?>
                        </select>                                
                        <i class="fa fa-chevron-right" style="color: #d6d6d6;"></i><i class="fa fa-chevron-right" style="color: #b0b1b2;"></i><i class="fa fa-chevron-right" style="color: #999999;"></i> 
                        <input type="text" id="rate" value="<?php echo $data->rate; ?>" name="rate" size="3" required>
                     </td>
                  </tr>
                  <tr>
                     <td><label>Uploaded File</label></td>
                     <td>
                        <?php
                           if($data->uploaded_file != '') {
                             $path = base_url().'uploads/booking/'.$data->uploaded_file;
                             echo '<a href="'.$path.'" target="_blank" title="'.$data->uploaded_file.'"><i class="fa fa-fw fa-file-o" style="color: #DD4B39;"></i></a>';
                           } else {
                             echo 'n/a';
                           } 
                           ?>
                        <input type="file" name="userfile">    
                        <input type="hidden" name="currency" id="currency" value="<?php echo $data->currency; ?>">   
                        <input type="hidden" name="id" value="<?php echo $data->id; ?>">
                        <input type="hidden" name="old_rate" value="<?php echo $data->rate; ?>">   
                        <input type="hidden" name="booking_name" value="<?php echo $data->booking_name; ?>">
                        <input type="hidden" name="old_file" value="<?php echo $data->uploaded_file; ?>">
                        <input type="hidden" name="year" value="<?php echo $_GET['year']; ?>">  
                     </td>
                  </tr>
                  <tr>
                     <td>&nbsp;</td>
                     <td>
                        <input type="submit" style="margin-top: 9px;" value="Update" class="btn btn-primary">
                        <a href="<?php echo site_url('booking/?year='.$_GET['year']); ?>" style="margin-top: 9px;" class="btn">Back</a>
                     </td>
                  </tr>
               </table>		
				</div>
				<div class="col-md-2" id="logo-wrapper">
					<img class="img-responsive" width="120" src="<?php echo $logo; ?>" alt="customer logo" title="<?php echo $data->customer_id; ?>">
				</div>
            </div>
            <!-- /.box-body -->               
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12">
         <script>        			
            $(function() {
                var totalData;                
                var t_bill = 0;                 
            var grid;
            
                //var data = <?php echo $_SESSION['orders']; ?>;
                var pqd = {};
                pqd.products = [<?php echo $json_products; ?>];
            
            <?php
               $hidden_col = '';
                   $editable = 'editable: true,';
               if($data->currency == 'USD') {
                $hidden_col = 'hidden: true,';
                   } else {
                     $editable = 'editable: false,';
                   }
               
               $arr_symbol = array(
                'AED' => 'AED',
                'USD' => '$',
                'SAR' => 'SAR',
                'EUR' => '€',
               );
               ?>
            
            //called when save changes button is clicked.
            function saveChanges() {            
            //attempt to save editing cell.
            if (grid.saveEditCell() === false) {
            return false;
            }
            
            if ( grid.isDirty() && grid.isValidChange({ focusInvalid: true }).valid ) {
            
            var changes = grid.getChanges({ format: "byVal" });       
            //post changes to server 
            $.ajax({
            dataType: "json",
            type: "POST",
            async: true,
            beforeSend: function (jqXHR, settings) {
            grid.showLoading();
            },
            url: '<?php echo site_url('booking/crud_option/'.$data->booking_name.'/'.$data->rate.'/'.$data->currency); ?>',
            data: { list: changes },
            success: function (changes) {
            //debugger;
            grid.commit({ type: 'add', rows: changes.addList });
            grid.commit({ type: 'update', rows: changes.updateList });
            
            grid.history({ method: 'reset' });
            grid.refreshDataAndView();
            },
            complete: function () {
            grid.hideLoading();
            }
            });         
            }
            }
            
            //calculate sum of 3rd and 4th column.
            function calculateSummary() {          
                var profitTotal = 0;                       
                var converted_total = 0;                       
            
                $.ajax({type: 'GET', url: "<?php echo site_url('booking/getTotalBill/'.$data->booking_name); ?>", success: function(result){                                      
                  var obj = jQuery.parseJSON( result );
                          t_bill = parseFloat(obj.total).toFixed(2);                            
                          t_converted = parseFloat(obj.converted_total).toFixed(2);                            
                      }});   
                      
                if(t_bill > 0) {          
                  profitTotal = t_bill;//.replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
                  //profitTotal = profitTotal.split('.');
                  
                  
                  converted_total = t_converted;//.replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
                  //converted_total = converted_total.split('.');   
                }
            
                //totalData = { "id": null, "product_category": null, "product": null, "price": null,  "qty": null, "discount": null, "bill": '<b>Total: $'+(profitTotal[0] === undefined ? 0 : profitTotal[0])+'</b>', "converted_total": '<b>Total: <?php echo $arr_symbol[$data->currency]; ?> '+(converted_total[0] === undefined ? 0 : converted_total[0])+'</b>', pq_rowcls: '' };           
                totalData = { "id": null, "product_category": null, "product": null, "price": null,  "qty": null, "discount": null, "bill": profitTotal, "converted_total": converted_total, pq_rowcls: '' };           
            }    
            
            //define the grid.
            var obj = {
                hwrap: false,
                resizable: true,
                rowBorders: false,
                virtualX: true,
            height: 'flex',
            pasteModel: { on: false },
                numberCell: {
                    show: true
                },
                trackModel: {
                    on: true
                }, //to turn on the track changes.            
                toolbar: {
                    items: [{
                        type: 'button',
                        icon: 'ui-icon-plus',
                        label: 'New Item',
                        listener: {
                            "click": function(evt, ui) {
                                //append empty row at the end.                            
                                var rowData = { product_category: '', discount: 0 };                       
                                var rowIndx = grid.addRow( { rowData: rowData, checkEditable: true });
                                
                                grid.goToPage({
                                    rowIndx: rowIndx
                                });
                                grid.editFirstCellInRow({
                                    rowIndx: rowIndx
                                }); 
                            }
                        }
                    }, {
                        type: 'separator'
                    }, {
                        type: 'button',
                        icon: 'ui-icon-disk',
                        label: 'Save',
                        listener: {
                            "click": function(evt, ui) {                              
            saveChanges();
            calculateSummary();
            grid.refreshDataAndView();
                            }
            }
                        
                    }, {
                        type: 'separator'
                    }, {
                        type: 'button',
            label: 'Delete',
            icon: 'ui-icon-trash',
            listener: {
            "click": function() {                              
            var data = grid.option('dataModel.data'),
            checked = [];
            
            for (var i = 0, len = data.length; i < len; i++) {
            var rowData = data[i];
            if (rowData.state) {
            checked.push(rowData.id);
            }
            }
            //sort the ids.
            checked = checked.sort(function (a, b) { return (a - b); });
            
            if(confirm('Are you sure you want to delete the row(s)?')) {                
            $.ajax({
            url: '<?php echo site_url('booking/deleteList'); ?>',
            data: { datas: checked },             
            type: "POST",
            async: true,
            beforeSend: function(jqXHR, settings) {
            $(".saving", grid.widget()).show();
            },
            success: function(result) {       
            grid.refreshDataAndView();
            },
            complete: function() {
            $(".saving", grid.widget()).hide();
            }
            });
            calculateSummary();
            }
            }
            }
                    }]          
                },
                scrollModel: {
                    autoFit: true
                },                
                editor: {
                    select: true
                },
                title: "<b><?php echo $data->booking_name; ?></b>",
                change: function(evt, ui) {   
            /*
                    var grid = this;
                    if (grid.isDirty() && grid.isValidChange({allowInvalid: true }).valid) {
                        var changes = grid.getChanges({ format: 'byVal' });
            
                        $.ajax({
                            url: '<?php echo site_url('booking/crud_option/'.$data->booking_name.'/'.$data->rate); ?>',
                            data: {
                                list: {
                                    updateList: changes.updateList,
                                    addList: changes.addList
            }
                            },
                            dataType: "json",
                            type: "POST",
                            async: true,
                            beforeSend: function(jqXHR, settings) {
                                $(".saving", grid.widget()).show();
                            },
                            success: function(changes) {        
            grid.commit({ type: 'add', rows: changes.addList });
            grid.commit({ type: 'update', rows: changes.updateList });
            
            grid.history({ method: 'reset' });
                            },
                            complete: function() {
                                $(".saving", grid.widget()).hide();
                            }
                        });
                    }
            */
                },
            destroy: function () {
            //clear the interval upon destroy.
            //clearInterval(interval);
            },
                colModel: [
            { dataIndx: "state", maxWidth: 30, minWidth: 30, align: "center", resizable: false,
            type: 'checkBoxSelection', cls: 'ui-state-default', sortable: false, editor: false,
            dataType: 'bool',
            cb: {
            all: false, //checkbox selection in the header affect current page only.
            header: true //show checkbox in header. 
            }
            },
                        { title: "", type: "hidden", hidden: true, dataType: "integer", dataIndx: "id", editable: false, width: 80 },                        
                        { title: "Category", width: 200, dataType: "string", dataIndx: "product_category",
                            editor: {
                               type: "select",
                                    mapIndices: { product: "product" },
                                    labelIndx: "product_category",
                                    valueIndx: "product_category",
                                    prepend: { "": "" },
                                    options: pqd.products
                           },
                            validations: [
                                { type: 'minLen', value: 1, msg: "Required" }
                            ]
                        },
                        { title: "Product", width: 200, dataType: "string", dataIndx: "product",
                            editor: {
                                type: "select",
                                mapIndices: { "price": "price"},                            
                                prepend: { "": "" }, 
                                valueIndx: "price",
                                labelIndx: "product",                               
                                options: function (ui) {                                    
                                    var prod = pqd.products,
                                        cat = ui.rowData.product_category;
                                    
                                    if (cat) {
                                        //iterate through the countries list to find the matching record.
                                        for (var i = 0; i < prod.length; i++) {
                                            var row = prod[i];
            
                                            if (row.product_category == cat) { //match found.                                                
                                                var sp_prod = row.product.split("|");
                                                var sp_price = row.price.split("|");                                            
                                                var str = [];
                                                
                                                for(var ii in sp_prod) {                                                
                                                    str[ii] = { "product": sp_prod[ii], "price": sp_price[ii] };                                                   
                                                }
                                                
                                                return str;                                                
                                            }
                                        }
                                    } else {
            return {};
            }
                                    return [];
                                }
                            },
                            validations: [
                                { type: 'minLen', value: 1, msg: "Required" }
                            ]
                        }, 
                { title: "Description", dataType: "string", dataIndx: "description", editable: true, width: 200 },
                { title: "Price <?php echo $data->currency; ?>", <?php echo $hidden_col; ?> dataType: "float", align: "right", dataIndx: "converted_price", editable: true, width: 140,
                validations: [
                  { type: 'nonEmpty', msg: "Required" },
                  { type: 'gt', value: 0, msg: "better be > 1", warn: true}],
                render: function(ui) {
                  var r = parseFloat(ui.cellData).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
                  //r = r.split('.');
                  if(r == 'NaN') {
                    r = '';
                  }
                  return r;
                }
              },
              { title: "Price USD", dataType: "float", align: "right", dataIndx: "price", <?php echo $editable; ?> width: 140,
            <?php if($data->currency == 'USD'): ?>
                validations: [
            { type: 'nonEmpty', msg: "Required" },
            { type: 'gt', value: 0, msg: "better be > 1", warn: true}],
                <?php endif; ?>
            render: function(ui) {
              var r = parseFloat(ui.cellData).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
              //r = r.split('.');
              if(r == 'NaN') {
              r = '';
              }
              return r;
            }
            },                        
                        { title: "Qty", dataType: "float", align: "right", dataIndx: "qty", editable: true, width: 120,
            validations: [
            { type: 'gte', value: 0.1, msg: "must be >= 0.1" }
                            ]
            },
                        { title: "Discount (%)", dataType: "integer", align: "right", dataIndx: "discount", editable: true, width: 150,
            validations: [
            { type: 'gte', value: 0, msg: "must be >= 0" }
                            ]
            },                        
            { 
                            title: "Amount <?php echo $data->currency; ?>", <?php echo $hidden_col; ?> dataType: "string", align: "right", dataIndx: "converted_total", editable: false, width: 180,                            
            render: function(ui) {
              var r = parseFloat(ui.cellData).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
              if(r == 'NaN') {
                r = '';
              }
              return r;
            }
                        },
                        { 
                            title: "Amount USD", dataType: "float", align: "right", dataIndx: "bill", editable: false, width: 180,
              render: function(ui) {
                var r = parseFloat(ui.cellData).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
                if(r == 'NaN') {
                  r = '';
                }
                return r;
              }
                        }
                ],
                postRenderInterval: -1, //synchronous post render.
                pageModel: {
                    type: "local",
                    rPP: 100
                },
                dataModel: {
                    dataType: "JSON",
                    location: "remote",
                    recIndx: "id",
                    url: "<?php echo site_url('booking/getOrderDetails?booking_name='.$data->booking_name); ?>",
                    //url: "/pro/products.php", //for PHP
                    getData: function(response) {
                        return {
                            data: response.data           
                        };
                    }
                },
                load: function(evt, ui) {
                    var grid = this,
                        data = grid.option('dataModel').data;
            
                    grid.widget().pqTooltip(); //attach a tooltip.
            
                    //validate the whole data.
                    grid.isValid({
                        data: data
                    });         
                }
            };  
            var $summary = "";
            obj.render = function (evt, ui) {
                $summary = $("<div class='pq-grid-summary'  ></div>")
                    .prependTo($(".pq-grid-bottom", this.widget()));
                calculateSummary();
            }
            //refresh summary whenever data changes due to edit, add, paste, undo, redo etc.            
            obj.change = function (evt, ui) {            
                obj.refresh.call(this); 
                calculateSummary();               
            }
            
            obj.refresh = function (evt, ui) {
                calculateSummary();
                var data = [totalData]; //2 dimensional array
                var obj = { data: data, $cont: $summary }
                this.createTable(obj);
            }
            
            grid = pq.grid("#grid_editing", obj);  
            });
         </script>
         <style> 
            tr.green td { background: lightgreen;}
            tr.yellow td { background: yellow;}
            div.pq-grid *
            {
            font-size:12px;    
            }
            button.delete_btn
            {
            margin:-2px 0px;
            }
            button.edit_btn
            {
            margin:-3px 0px;
            }
            tr.pq-grid-row td
            {
            color:#888;
            }
            tr.pq-row-edit > td
            {
            color:#000;
            }
            tr.pq-row-delete
            {
            text-decoration:line-through;         
            }
            tr.pq-row-delete td
            {
            background-color:pink;   
            }
         </style>
         <br>
         <div id="grid_editing" style="margin:5px auto;"></div>
      </div>
   </div>
   <textarea style="margin-top: 3px;" placeholder="Type your comment here..." name="comments" rows="5" cols="60"><?php echo $data->comments; ?></textarea>
   <br>
   <a href="" title="Save Comment" id="a-save"><i class="fa fa-fw fa-save"></i></a>
</section>
</form>
<script>
   $('#sel-currency').change(function() {
        var sp = $(this).val().split('|');     
        
        $('#currency').val(sp[0]);
        $('#rate').val(sp[1]);
     });
   
    $('#a-save').click(function(e) {
      e.preventDefault();
      $('#updateForm').submit();
    });
</script>
<?php
   $uri_crud = $this->uri->segment(3);
   
   if(! empty($uri_crud)) {
     ?>
<script>
   setTimeout(function(){ window.location.href = '<?php echo site_url('booking?year='.$_GET['year']); ?>'; }, 1000);
</script>
<?php
   }
   ?>
<!-- /.content -->