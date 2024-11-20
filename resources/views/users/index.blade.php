<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Người Dùng</title>
    <style>
        /* Thiết lập kiểu font cho toàn bộ trang */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f3f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            flex-direction: column;
        }

        /* Container chính */
        .container {
            width: 80%;
            max-width: 1200px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 30px;
        }

        /* Tiêu đề trang */
        h2 {
            text-align: center;
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }

        /* Form tìm kiếm */
        .search-form {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }

        .search-form input[type="text"] {
            padding: 10px 20px;
            font-size: 16px;
            width: 50%;
            border: 2px solid #ddd;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s;
        }

        .search-form input[type="text"]:focus {
            border-color: #4CAF50;
        }

        .search-form button {
            padding: 10px 20px;
            font-size: 16px;
            margin-left: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .search-form button:hover {
            background-color: #45a049;
        }

        /* Bảng Danh Sách Người Dùng */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            font-size: 16px;
        }

        th {
            background-color: #007BFF;
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Nút Sửa và Xóa */
        button {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #d32f2f;
        }

        /* Liên kết Sửa */
        .action-links a {
            color: #007BFF;
            text-decoration: none;
            margin-right: 10px;
            font-size: 14px;
        }

        .action-links a:hover {
            text-decoration: underline;
        }
        .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #45a049;
    }

    .btn i {
        margin-right: 8px; /* Khoảng cách giữa biểu tượng và văn bản */
    }

    </style>
</head>
<body>

<div class="container">
    <h2>Danh Sách Người Dùng</h2>

    <!-- Form tìm kiếm -->
    <form class="search-form" action="{{ route('users.search') }}" method="GET">
        <input type="text" name="name" placeholder="Tìm kiếm người dùng theo tên">
        <button type="submit">Tìm Kiếm</button>
    </form>

    <a href="{{ route('users.create') }}" class="btn">
    Thêm 
    </a>



    <!-- Bảng danh sách người dùng -->
    <table>
        <thead>
            <tr>
                <th>Tên</th>
                <th>Giới Tính</th>
                <th>Thành Phố</th>
                <th>Quận/Huyện</th>
                <th>Ngày Sinh</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->gender }}</td>
                    <td>{{ $user->city ? $user->city->citynameVn : 'Không có thông tin' }}</td>
                    <td>{{ $user->district ? $user->district->districtVn : 'Không có thông tin' }}</td>
                    <td>{{ $user->date }}</td>
                    <td class="action-links">
                        <a href="{{ route('users.edit', $user->id) }}">Sửa</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
