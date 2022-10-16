<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery.dataTables.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/dataTables.bootstrap4.css'?>">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
    

</head>
<body>
<div class="container">
    <!-- Page Heading -->
    <div class="row" id="show_data">
        <div class="col-12">
            <div class="col-md-12">
                <h5>User list
                </h5>
            </div>
            
            

            <?php foreach ($data as $item) { ?>  
            <form class="my-3" id="edit_modal<?php echo $item->id ?>" action="javascript:void(0)">
                <div class="border p-3 fieldGroup">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Id</label>                             
                        <input type="text" readonly name="id" id="id" class="form-control" value="<?php echo $item->id ?>" placeholder="User Id">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" name="first_name[]" id="first_name" value="<?php echo $item->first_name ?>" class="form-control" placeholder="User Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Last Name</label>
                        <input type="text" name="last_name[]" id="last_name" value="<?php echo $item->last_name ?>" class="form-control" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Phone Number</label>
                        <input type="text" name="phone_number[]" id="phone_number" value="<?php echo $item->phone_number ?>" class="form-control" placeholder="phone_number">
                    </div>
                    <button data-id="<?php echo $item->id; ?>" class="btn btn-primary btn_update">Edit</button>

                </div>
                
            </form>
            <?php } ?>
        </div>
    </div>
         
</div>
 
        
        <!--END MODAL ADD-->
 
        
 
        <!--MODAL DELETE-->
         <form>
            <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete User  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <strong>Are you sure to delete this record?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="product_code_delete" id="product_code_delete" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL DELETE-->
 
<!-- <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/dataTables.bootstrap4.js'?>"></script>
 
<script type="text/javascript">
    $(document).ready(function(){


        $('.btn_update').on('click',function(){
            var id = $(this).data("id");
            
                var formdata = $('#edit_modal'+id).serialize();
                
                console.log(formdata);
                $.ajax({
                    type : "POST",
                    url  : "<?php echo site_url('user/update')?>",
                    dataType : "JSON",
                    data : formdata,
    
                    success: function(data){
                        console.log(data);
                        // location.reload(true)
                        $('[name="first_name"]').val(data.first_name);
                        $('[name="last_name"]').val(data.first_name);
                        $('[name="phone_number"]').val(data.phone_number);
                    }
                });
                return false;
        });

        

//         show_product(); //call function show all product
         
        $('#mydata').dataTable();
    
        //group add limit
        var maxGroup = 3;
        
        //add more fields group
        $(".addMore").click(function(){
            if($('body').find('.fieldGroup').length < maxGroup){
                var fieldHTML = '<div class="form-group fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
                $('body').find('.fieldGroup:last').after(fieldHTML);
            }else{
                alert('Maximum '+maxGroup+' groups are allowed.');
            }
        });
        
        //remove fields group
        $("body").on("click",".remove",function(){ 
            $(this).parents(".fieldGroup").remove();
        });
 
 
        //Save product
//         $('#btn_save').on('click',function(){
//             var id_array = [];
//             var first_name_array = [];
//             var last_name_array = [];
//             var phone_number_array = [];

//             var formdata = $('.add_modal').serialize();
//             console.log(formdata);
//             $.ajax({
//                 type : "POST",
//                 url  : "<?php echo site_url('user/save')?>",
//                 dataType : "JSON",
//                 data : formdata,
//                 success: function(data){
//                     $('[name="first_name"]').val("");
//                     $('[name="last_name"]').val("");
//                     $('[name="phone_number"]').val("");
//                     $('#Modal_Add').modal('hide');
//                     show_product();
//                 }
//             });
//             return false;
//         });
 
        //get data for update record
        $('#show_data').on('click','.item_edit',function(){
            var id = $(this).data('id');
            var first_name = $(this).data('first_name');
            var last_name = $(this).data('last_name');
            var phone_number = $(this).data('phone_number');
//             var price        = $(this).data('price');
             
            $('#Modal_Edit').modal('show');
            $('[name="id_edit"]').val(id);
            $('[name="first_name_edit"]').val(first_name);
            $('[name="last_name_edit"]').val(last_name);
            $('[name="phone_edit"]').val(phone_number);
//             $('[name="price_edit"]').val(price);
        });
    
        
        //update record to database
        
 
        //get data for delete record
        $('#show_data').on('click','.item_delete',function(){
            var id = $(this).data('id');
             
            $('#Modal_Delete').modal('show');
            $('[name="product_code_delete"]').val(id);
        });
 
        //delete record to database
         $('#btn_delete').on('click',function(){
            var id = $('#product_code_delete').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('user/delete')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $('[name="product_code_delete"]').val("");
                    $('#Modal_Delete').modal('hide');
                    show_product();
                }
            });
            return false;
        });
 
    });
 
</script>
</body>
</html>