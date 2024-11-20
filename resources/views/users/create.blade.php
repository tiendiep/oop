<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Người Dùng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        label {
            font-size: 16px;
            font-weight: bold;
            color: #555;
            margin-bottom: 8px;
            display: block;
        }

        input[type="text"], input[type="date"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus, input[type="date"]:focus, select:focus {
            border-color: #4CAF50;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        select {
            appearance: none;
            background-color: white;
            background-image: url('https://img.icons8.com/ios/50/000000/chevron-down.png');
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 16px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Thêm Người Dùng Mới</h2>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Tên:</label>
            <input type="text" name="name" id="name" required placeholder="Nhập tên người dùng">
        </div>

        <div class="form-group">
            <label for="gender">Giới Tính:</label>
            <select name="gender" id="gender">
                <option value="Male">Nam</option>
                <option value="Female">Nữ</option>
            </select>
        </div>

        <div class="form-group">
            <label for="city_id">Thành Phố:</label>
            <select name="city_id" id="city_id" required>
    <option value="">Chọn Thành Phố</option>
    @foreach ($cities as $city)
        <option value="{{ $city->id }}">{{ $city->citynameVn }}</option>
    @endforeach
</select>
        </div>

        <div class="form-group">
            <label for="district_id">Quận/Huyện:</label>
            <select name="district_id" id="district_id" required>
    <option value="">Chọn Quận/Huyện</option>
    @foreach ($district as $districtItem)
        <option value="{{ $districtItem->id }}">{{ $districtItem->districtVn }}</option>
    @endforeach
</select>
        </div>

        <div class="form-group">
            <label for="date">Ngày Sinh:</label>
            <input type="date" name="date" id="date" required>
        </div>

        <button type="submit">Thêm Người Dùng</button>
    </form>
</div>

</body>
</html>
