@extends('Admin.templates.tpl_default', ['pageId'=>'add_cate'])

@section('css')
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<!-- font-awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- CSS -->
<link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/admin.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/sidebar.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/navbar.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/cate.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/add_cate.css')}}">
<style>
  .attribute-field {
    margin-right: 40px;
    margin-bottom: 50px;
  }
</style>
@endsection

@section('content')
<main>
  <div class="head-title">
    <div class="left">
      <ul class="breadcrumb">
        <li>
          <a href="#">Dashboard</a>
        </li>
        <li><i class='bx bx-chevron-right'></i></li>
        <li>
          <p id="myText"></p>
        </li>
      </ul>
    </div>
  </div>
  <div>
    <div>
      <div class="head">
        <h3>Add Product</h3>
      </div>
      <a href="{{ route('admin.product_add_cate')}}" class="back-link">
        <i class="fa-solid fa-arrow-left"></i>
      </a>
      <div class="account-detail">
        <div class="billing-detail">
          <form class="checkout-form" action="{{ route('admin.product_add2') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="product_name">Tên sản phẩm:</label>
              <input type="text" id="product_name" name="product_name" required>
            </div>
            <div class="form-group">
              <label for="product_name">Mô tả ngắn:</label>
              <input type="text" id="description" name="description" required>
            </div>
            <div class="form-group">
              <label for="product_name">Giá:</label>
              <input type="text" id="price" name="price" required>
            </div>
            <div class="form-group">
              <label for="product_name">Số lượng:</label>
              <input type="text" id="quantity" name="quantity" required>
            </div>
            <div class="form-group">
              <label for="attribute_count">Số lượng thông số kỹ thuật:</label>
              <input type="number" id="attribute_count" name="attribute_count">
            </div>

            <div id="attribute_fields" style="display: flex; flex-wrap: wrap;">

            </div>
            <input type="hidden" id="category_id" name="category_id" value="{{ $categories->id }}">
            <button type="button" id="add_attribute">Thêm thông số</button>
            <div class="form-group">
                <h5>Số lượng ảnh mô tả:</h5>
                <input type="number" id="image_count" name="image_count" min="1" value="1" required>
            </div>

            <div id="image_fields">
                <div class="form-group">
                    <h5>Ảnh mô tả 1:</h5>
                    <input type="file" name="img_link[]" style="width: 300px; height: 50px" required>
                    <button type="button" class="remove-image">Xóa</button>
                </div>
            </div>

            <button type="button" id="add_image">Thêm ảnh</button>
            <button type="submit">Thêm sản phẩm</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets/js/js_admin/navbar_sidebar.js')}}"></script>
<script src="{{ asset('assets/js/js_admin/datatable.js')}}"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Biến đếm số lượng thuộc tính
    var attributeCount = 0;

    // Lắng nghe sự kiện khi người dùng thay đổi số lượng attribute
    document.getElementById('attribute_count').addEventListener('input', function () {
      attributeCount = parseInt(this.value);
      updateAttributeFields();
    });

    // Lắng nghe sự kiện khi người dùng bấm nút "Add Attribute"
    document.getElementById('add_attribute').addEventListener('click', function () {
      attributeCount++;
      updateAttributeFields();
    });

    // Lắng nghe sự kiện khi người dùng nhấp vào nút xóa
    document.addEventListener('click', function (event) {
      if (event.target.classList.contains('remove-attribute')) {
        event.target.parentElement.remove();
        attributeCount--;
        updateAttributeFields();
      }
    });

    // Hàm cập nhật các trường thuộc tính
    function updateAttributeFields() {
      var attributeFields = document.getElementById('attribute_fields');
      attributeFields.innerHTML = '';

      for (var i = 1; i <= attributeCount; i++) {
        var inputField = document.createElement('div');
        inputField.className = 'attribute-field';
        inputField.innerHTML = `
          <label for="attribute_name_${i}">Tên thông số ${i}:</label>
          <input type="text" id="attribute_name_${i}" name="attribute_name[]">
          <label for="attribute_value_${i}">Giá trị thông số ${i}:</label>
          <input type="text" id="attribute_value_${i}" name="attribute_value[]">
          <button type="button" class="remove-attribute">Xóa</button>
        `;
        attributeFields.appendChild(inputField);
      }
    }
  });

  document.addEventListener('DOMContentLoaded', function () {
        var imageCount = 1;

        document.getElementById('image_count').addEventListener('input', function () {
            imageCount = parseInt(this.value);
            updateImageFields();
        });

        document.getElementById('add_image').addEventListener('click', function () {
            imageCount++;
            updateImageFields();
        });

        document.addEventListener('click', function (event) {
            if (event.target.classList.contains('remove-image')) {
                event.target.parentElement.remove();
                imageCount--;
                updateImageFields();
            }
        });

        function updateImageFields() {
            var imageFields = document.getElementById('image_fields');
            imageFields.innerHTML = '';

            for (var i = 1; i <= imageCount; i++) {
                var inputField = document.createElement('div');
                inputField.className = 'form-group';
                inputField.innerHTML = `
                    <h5>Ảnh mô tả ${i}:</h5>
                    <input type="file" name="img_link[]" style="width: 300px; height: 50px" required>
                    <button type="button" class="remove-image">Xóa</button>
                `;
                imageFields.appendChild(inputField);
            }
        }
    });

</script>
@endsection
