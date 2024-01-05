<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Page</title>
</head>
<body>

    <form action="/upload" method="post" enctype="multipart/form-data">
        @csrf

        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" required>

        <br>

        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required>

        <br>

        <label>Gender:</label>
        <label for="">
            <input type="radio" id="male" name="to" value="volume" required> Volume
        </label>
        <label for="">
            <input type="radio" id="female" name="to" value="space" required> Space
        </label>

        <br>

<label for="file_upload">File Upload (Images and Documents):</label>
        <input type="file" id="file_upload" name="file" accept=".pdf, .doc, .docx, .jpg, .jpeg, .png"><br>
        <br>

        <button type="submit">Submit</button>
    </form>

    <a href="/files">
        Files
    </a>
</body>
</html>
