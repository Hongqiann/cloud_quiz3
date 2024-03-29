<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table</title>
</head>
<body>

    <h2>Data Table</h2>

    @if(count($data) > 0)
        <table border="1">
            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Medium</th>
                    <th>Path</th>
                    <th>Image</th>
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{ $item["firstname"] }}</td>
                        <td>{{ $item["lastname"] }}</td>
                        <td>{{ $item["medium"] }}</td>
                        <td>{{ $item["path"] }}</td>



                            @if($item["medium"] == "space")
                                <!-- Content to display when the condition is true -->
                                <td><img src="{{ $item["path"] }}" style="width: 100%;height: 100%;object-fit: contain;" /></td>
                            @else
                                <!-- Content to display when the condition is false -->
                                <td><img src="download/{{ $item["path"] }}" /></td>
                            @endif
                        <!-- Add more cells based on your data structure -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No data available.</p>
    @endif

</body>
</html>
