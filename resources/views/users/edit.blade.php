<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Người Dùng</title>
    <style>
        /* Cấu hình chung cho toàn bộ trang */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            flex-direction: column;
        }

        .container {
            width: 80%;
            max-width: 900px;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 40px;
            margin-top: 40px;
        }

        h2 {
            text-align: center;
            font-size: 26px;
            color: #333;
            margin-bottom: 30px;
        }

        /* Thiết kế form */
        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 16px;
            color: #555;
            margin-bottom: 8px;
        }

        input, select {
            padding: 12px 16px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            outline: none;
            transition: border-color 0.3s;
        }

        input:focus, select:focus {
            border-color: #4CAF50;
        }

        button {
            padding: 12px 20px;
            font-size: 18px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            align-self: center;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Hiệu ứng hover cho các trường */
        input:hover, select:hover {
            border-color: #4CAF50;
        }

        /* Đảm bảo các nút và trường nhập liệu không quá rộng trên các màn hình nhỏ */
        @media (max-width: 768px) {
            .container {
                width: 90%;
                padding: 30px;
            }

            input, select, button {
                font-size: 14px;
            }
        }

    </style>
</head>
<body>

<div class="container">
    <h2>Sửa Thông Tin Người Dùng</h2>

    <!-- Form Sửa Người Dùng -->
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Tên người dùng -->
        <label for="name">Tên:</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" id="name" required><br>

        <!-- Giới tính -->
        <label for="gender">Giới Tính:</label>
        <select name="gender" id="gender">
            <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Nam</option>
            <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Nữ</option>
        </select><br>

        <!-- Thành phố -->
        <label for="city_id">Thành Phố:</label>
        <select name="city_id" id="city_id" required>
            @foreach ($cities as $city)
                <option value="{{ $city->id }}" {{ $user->city_id == $city->id ? 'selected' : '' }}>
                    {{ $city->citynameVn }}
                </option>
            @endforeach
        </select><br>

        <!-- Quận/Huyện -->
        <label for="district_id">Quận/Huyện:</label>
        <select name="district_id" id="district_id" required>
            @foreach ($districts as $district)
                <option value="{{ $district->id }}" {{ $user->district_id == $district->id ? 'selected' : '' }}>
                    {{ $district->districtVn }}
                </option>
            @endforeach
        </select><br>

        <!-- Ngày sinh -->
        <label for="date">Ngày Sinh:</label>
        <input type="date" name="date" value="{{ old('date', $user->date) }}" id="date" required><br>

        <!-- Nút submit -->
        <button type="submit">Cập Nhật Người Dùng</button>
    </form>
</div>

</body>
</html>
 