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
                <div class="pull-left mb-2">
                    <h2>Define Free Issues</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('issues.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('issues.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Free Issue Label:</strong>
                        <input type="text" name="free_issue_label" class="form-control" placeholder="Free Issue Label">
                        @error('free_issue_label')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Type:</strong>
                        <input type="text" name="type" class="form-control" placeholder="Type">
                        @error('type')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Purchase Product:</strong>
                        <input type="text" name="purchase_product" class="form-control" placeholder="Purchase Product">
                        @error('purchase_product')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Free Product:</strong>
                        <input type="text" name="free_product" class="form-control" placeholder="Free Product">
                        @error('free_product')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Purchase Quantity:</strong>
                        <input type="text" name="purchase_quantity" class="form-control" placeholder="Purchase Quantity">
                        @error('purchase_quantity')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Free Quantity:</strong>
                        <input type="text" name="free_quantity" class="form-control" placeholder="Free Quantity">
                        @error('free_quantity')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Lower Limit:</strong>
                        <input type="text" name="lower_limit" class="form-control" placeholder="Lower Limit">
                        @error('lower_limit')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Upper Limit:</strong>
                        <input type="text" name="upper_limit" class="form-control" placeholder="Upper Limit">
                        @error('upper_limit')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">ADD</button>
            </div>
        </form>
    </div>
</body>

</html>