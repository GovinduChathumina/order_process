<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ceylon Linux</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Order Management</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('orders.create') }}"> Create Order</a>
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
                    <th>Order No</th>
                    <th>Customer Name</th>
                    <th>Order Date</th>
                    <th>Order Time</th>
                    <th>Net Amount</th>
                    <th width="280px">Detailed View</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->amount }}</td>
                        <td>
                            <form action="{{ route('customers.destroy',$order->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('customers.edit',$order->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $orders->links() !!}
    </div>
</body>
</html>