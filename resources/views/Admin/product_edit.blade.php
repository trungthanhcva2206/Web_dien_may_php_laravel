@extends('Admin.templates.tpl_default', ['pageId'=>'edit_product'])

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
        <h3>Edit Product</h3>
      </div>
      <a href="{{ route('admin.product')}}" class="back-link">
        <i class="fa-solid fa-arrow-left"></i>
      </a>
      <div class="account-detail">
        <div class="billing-detail">
          <form class="checkout-form" action="/product/update/{{ $product->id }}" method="POST" enctype="multipart/form-data">
          @method('PATCH')
            @csrf
            <div class="form-group">
              <label for="product_name">Tên sản phẩm:</label>
              <input type="text" id="product_name" name="product_name" value="{{ $product->product_name }}">
            </div>
            <div class="form-group">
              <label for="product_name">Mô tả ngắn:</label>
              <input type="text" id="description" name="description" value="{{ $product->description }}">
            </div>
            <div class="form-group">
              <label for="product_name">Giá:</label>
              <input type="text" id="price" name="price" value="{{ $product->price }}">
            </div>
            <div class="form-group">
              <label for="product_name">Số lượng:</label>
              <input type="text" id="quantity" name="quantity" value="{{ $product->quantity }}">
            </div>
            <div class="form-group" style="margin-top: 30px;">
              <label for="product_name" style="font-weight: bold;font-size:larger">Các thông số kỹ thuật</label>
            </div>
            @foreach($attributeData as $index => $attribute)
                <div class="form-inline">
                    <div class="form-group">
                        <label for="attribute_name_{{ $index }}">Tên thông số kỹ thuật:</label>
                        <input type="text" id="attribute_name_{{ $index }}" name="attribute_name[]" value="{{ $attribute['attribute_name'] }}">
                    </div>
                    <div class="form-group">
                        <label for="attribute_value_{{ $index }}">Giá trị thông số:</label>
                        <input type="text" id="attribute_value_{{ $index }}" name="attribute_value[]" value="{{ $attribute['value'] }}">
                    </div>
                    
                </div>
            @endforeach
            <button type="submit" style="margin-left:5px">Update sản phẩm</button>
          </form>
          <p style=" margin-top:30px;font-weight:bold;font-size:20px;margin-bottom:30px">Thêm ảnh hoặc thông số kỹ thuật</p>
          <form class="checkout-form" action="/product/add_update/{{ $product->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="attribute_count">Số lượng thông số kỹ thuật:</label>
              <input type="number" id="attribute_count" name="attribute_count">
            </div>

            <div id="attribute_fields" style="display: flex; flex-wrap: wrap;">

            </div>
            <button type="button" id="add_attribute">Thêm thông số</button>
            <div class="form-group">
                <label for="product_name">Số lượng ảnh mô tả:</label>
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
            <button type="submit">Thêm</button>
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

     document.addEventListener('DOMContentLoaded', function () {
        // Add a click event listener to delete buttons
        var deleteButtons = document.querySelectorAll('.delete-attribute');
        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var index = this.getAttribute('data-index');
                // Remove the attribute fields for the selected index
                var attributeFields = document.querySelectorAll('.form-inline');
                if (attributeFields.length > index) {
                    attributeFields[index].remove();
                }
            });
        });

        // Add a click event listener to the "Thêm thông số" button
        var addAttributeButton = document.getElementById('add-attribute');
        addAttributeButton.addEventListener('click', function () {
            // Add a new attribute field
            var attributeFields = document.querySelectorAll('.form-inline');
            var newIndex = attributeFields.length;
            var newAttributeField = attributeFields[0].cloneNode(true);
            newAttributeField.querySelector('input[name="attribute_name[]"]').value = '';
            newAttributeField.querySelector('input[name="attribute_value[]"]').value = '';
            // Clear the delete button event listener from the new field
            newAttributeField.querySelector('.delete-attribute').removeEventListener('click');
            // Add the new field to the form
            document.querySelector('.checkout-form').appendChild(newAttributeField);
        });
    });


</script>


@endsection
