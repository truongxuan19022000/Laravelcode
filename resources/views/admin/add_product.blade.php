@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm sản phẩm
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">

                            <div class="position-center">
                                <form id="form" role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group" >
                                    <label for="exampleInputEmail1">Tên sản phẩm</label> 
                                    <input id="product_name" type="text" data-validation="length alphanumeric"
                                    data-validation-length="3-12" 
                                    data-validation-error-msg="Product name must be within [3,12]"
                                    name="product_name" class="form-control " id="slug" placeholder="Tên danh mục" onkeyup="ChangeToSlug();"
                                    >
                                   
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">SL sản phẩm</label>
                                    <input id="product_sl" type="text" data-validation="number"  data-validation-error-msg="required to enter the number" name="product_quantity" class="form-control" id="exampleInputEmail1" placeholder="Điền số lượng">
                                </div>
                              
                                     <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input id="product_price" type="text" data-validation="number" data-validation-error-msg="required to enter the number"  name="product_price" class="form-control" id="" placeholder="Tên danh mục">
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" 
                                    data-validation="mime size required" 
                                    data-validation-allowing="jpg, png" 
                                       data-validation-error-msg-required="No image selected"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none"  rows="8" class="form-control" name="product_desc" id="ckeditor1" placeholder="Mô tả sản phẩm"></textarea>
                                </div>
                                
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                      <select name="product_cate" class="form-control input-sm m-bot15">
                                        @foreach($cate_product as $key => $cate)
                                            <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Thương hiệu</label>
                                      <select name="product_brand" class="form-control input-sm m-bot15">
                                        @foreach($brand_product as $key => $brand)
                                            <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="product_status" class="form-control input-sm m-bot15">
                                         <option value="1">Ẩn</option>
                                            <option value="0">Hiển thị</option>

                                    </select>
                                </div>

                                <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
            <script>
            const form =document.getElementById('form');
            const name =document.getElementById('product_name');
            const product_sl =document.getElementById('product_sl');
            const price =document.getElementById('product_price');
            form.addEventListener('submit',(e)=>{
                e.preventDefault();
                checkInput();
            });
            function checkInput(){
                const nameValue=product_name.value.trim();
                const product_slValue=product_sl.value.trim();
                const price=product_price.value.trim();
                if(nameValue === ''){
                    alert('khong duoc bo trong name');
                }
                else{
                    setSuccessFor(name);
                }
            }
           
@endsection
