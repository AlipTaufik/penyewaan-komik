<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MaMin List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e0f7fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #00796b;
            margin-bottom: 20px;
            font-size: 24px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 16px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        thead tr {
            background-color: #00796b;
            color: #ffffff;
            text-align: left;
        }

        th, td {
            padding: 12px 15px;
            border: 1px solid #dddddd;
        }

        tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        tbody tr:nth-of-type(even) {
            background-color: #f1f8e9;
        }

        tbody tr:last-of-type {
            border-bottom: 2px solid #00796b;
        }

        tbody tr:hover {
            background-color: #e0f2f1;
            cursor: pointer;
        }

        th, td {
            transition: background-color 0.3s ease;
        }

        th:hover {
            background-color: #004d40;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>List of Komik</h1>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>kode_komik</th>
                    <th>nama_komik</th>
                    <th>harga per sewa</th>
                    <th>genre</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($komik as $komiks)
                <tr>
                    <td>{{ $komiks->id }}</td>
                    <td>{{ $komiks->kode_komik }}</td>
                    <td>{{ $komiks->nama_komik }}</td>
                    <td>{{ number_format($komiks->harga, 2, '.', ',') }}</td>
                    <td>{{ $komiks->genre }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
