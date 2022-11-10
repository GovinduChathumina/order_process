<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ceylon Linux</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Customer</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('customers.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('customers.update',$customer->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Customer Name:</strong>
                        <input type="text" name="customer_name" value="{{ $customer->customer_name }}" class="form-control"
                            placeholder="Customer Name">
                        @error('customer_name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Customer Code:</strong>
                        <input type="text" name="customer_code" class="form-control" placeholder="Customer Code"
                            value="{{ $customer->customer_code }}">
                        @error('customer_code')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Customer Address:</strong>
                        <input type="text" name="customer_address" value="{{ $customer->customer_address }}" class="form-control"
                            placeholder="Customer Address">
                        @error('customer_address')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Customer Contact:</strong>
                        <input type="text" name="customer_contact" value="{{ $customer->customer_contact }}" class="form-control"
                            placeholder="Customer Contact">
                        @error('customer_contact')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Edit</button>
            </div>
        </form>
    </div>
</body>

</html>