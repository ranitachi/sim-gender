<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @php
        $data = App\Models\Kategori::all();
    @endphp
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>no</th>
            <th>judul</th>
        </tr>
        @foreach ($data as $key => $item)
            <tr>
                <td>{{ $key = $key + 1 }}</td>
                <td>
                    <a href="{{ url('/') }}{{ $item->url_route }}">
                        {{ $item->judul }}
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>