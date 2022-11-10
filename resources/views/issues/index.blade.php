<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Define Free Issues</title>
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
                    <a class="btn btn-success" href="{{ route('issues.create') }}"> Create Line Free Issues</a>
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
                    <th>Free Issue Label</th>
                    <th>Type</th>
                    <th>Purchase Product</th>
                    <th>Free Product</th>
                    <th>Purchase Quantity</th>
                    <th>Free Quantity</th>
                    <th>Lower Limit</th>
                    <th>Upper Limit</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($issues as $issue)
                    <tr>
                        <td>{{ $issue->id }}</td>
                        <td>{{ $issue->free_issue_label }}</td>
                        <td>{{ $issue->type }}</td>
                        <td>{{ $issue->purchase_product }}</td>
                        <td>{{ $issue->free_product }}</td>
                        <td>{{ $issue->purchase_quantity }}</td>
                        <td>{{ $issue->free_quantity }}</td>
                        <td>{{ $issue->lower_limit }}</td>
                        <td>{{ $issue->upper_limit }}</td>
                        <td>
                            <form action="{{ route('issues.destroy',$issue->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('issues.edit',$issue->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $issues->links() !!}
    </div>
</body>
</html>