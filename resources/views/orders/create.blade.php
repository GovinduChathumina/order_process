<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ceylon Linux</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<style>
  form{
        margin: 20px 0;
}
    form input, button{
        padding: 5px;
    }
    table{
        width: 100%;
        margin-bottom: 20px;
		border-collapse: collapse;
    }
    table, th, td{
        border: 1px solid #cdcdcd;
    }
    table th, table td{
        padding: 10px;
        text-align: left;
    }
</style>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Placing Order</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('orders.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Customer Name:</strong>
                        <select id="customer" name="customer" autocomplete="country-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                          <option value='0'>-- Select customer --</option>
                          @foreach($customers as $customer)
                            <option value='{{ $customer->id }}'>{{ $customer->customer_name }}</option>
                          @endforeach
                        </select>
                        {{-- <input type="text" name="customer_id" class="form-control" placeholder="Customer Name"> --}}
                        @error('customer_id')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Order Number:</strong>
                        <input type="text" name="order_number" value="00{{$orderNumber}}" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Order Number">
                        @error('order_number')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </form>
        <form>
          <select id="name" name="name" autocomplete="country-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <option value='0'>-- Product Name --</option>
            @foreach($products as $product)
              <option value='{{ $product->id }}'>{{ $product->product_name }}</option>
            @endforeach
          </select>
          <input type="text" id="code" placeholder="Product Code">
          <input type="text" id="price" placeholder="Price">
          <input type="text" id="quantity" placeholder="Quantity">
          <input type="text" id="amount" placeholder="Amount">
        <input type="button" class="add-row" value="Add Product">
      </form>
      <table>
          <thead>
              <tr>
                  <th>Select</th>
                  <th>Product Name</th>
                  <th>Product Code</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Amount</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  {{-- <td><input type="checkbox" name="record"></td> --}}
              </tr>
          </tbody>
      </table>
      <button type="button" class="btn btn-danger ml-3 delete-row">Delete Row</button><br><br>
      <button type="submit" class="btn btn-primary ml-3">Save Order</button>
    </div>
</body>
<script>
  $(document).ready(function(){
      $(".add-row").click(function(){
          var name = $("#name").val();
          var code = $("#code").val();
          var price = $("#price").val();
          var quantity = $("#quantity").val();
          var amount = $("#amount").val();
          var markup = "<tr><td><input type='checkbox' name='record'></td><td>" + name + "</td><td>" + code + "</td><td>" + price + "</td><td>" + quantity + "</td><td>" + amount + "</td></tr>";
          $("table tbody").append(markup);
      });
      
      // Find and remove selected table rows
      $(".delete-row").click(function(){
          $("table tbody").find('input[name="record"]').each(function(){
            if($(this).is(":checked")){
                  $(this).parents("tr").remove();
              }
          });
      });
  });    
</script>
<script type='text/javascript'>
  $(document).ready(function(){
 
     // Supplier Change
     $('#name').change(function(){
 
        // Supplier id
        var id = $(this).val();
 
        // Empty the dropdown
        $('#code').find('option').not(':first').remove();
 
        // AJAX request
        $.ajax({
          url: 'getProductCode/'+id,
          type: 'get',
          dataType: 'json',
          success: function(response){
                  var id = response[0].id;
                  var code = response[0].product_code;
                  var price = response[0].price;

                  $("#code").val(code);
                  $("#price").val(price);
          }
        });
     });

     $('#quantity').keyup(function(){
      var quantity = $("#quantity").val();
      var price = $("#price").val();
      var amount = quantity*price;
      $("#amount").val(amount);
     });
  });
  </script>
</html>