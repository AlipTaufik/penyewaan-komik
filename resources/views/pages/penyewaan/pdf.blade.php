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
        <h1>List of Penyewaan</h1>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>nomor_sewa</th>
                    <th>customer</th>
                    <th align="center">total_penyewaan</th>
                    <th align="center">status_penyewaan</th>

                </tr>
            </thead>
            <tbody>
                @foreach($penyewaan as $penyewaan)

                <tr>
                    <td>{{ $penyewaan->id }}</td>
                    <td>{{ $penyewaan->nomor_sewa }}</td>
                    <td>{{ $penyewaan->customer }}</td>
                    <td align="right">{{ number_format($penyewaan->total_penyewaan) }}</td>
                    <td align="center">{{ $penyewaan->status_penyewaan }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
