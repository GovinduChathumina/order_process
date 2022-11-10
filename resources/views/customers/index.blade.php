<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel 9 CRUD Tutorial Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2></h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('customers.create') }}"> Create Customer</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Customer Name</th>
                    <th>Customer Code</th>
                    <th>Customer Address</th>
                    <th>Customer Contact</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->customer_name }}</td>
                        <td>{{ $customer->customer_code }}</td>
                        <td>{{ $customer->customer_address }}</td>
                        <td>{{ $customer->customer_contact }}</td>
                        <td>
                            <form action="{{ route('customers.destroy',$customer->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('customers.edit',$customer->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $customers->links() !!}
    </div>
</body>
</html>