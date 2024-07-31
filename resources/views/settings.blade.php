<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Kasir Settings</title>
    <link href="/img/login3.jpeg" rel="icon">
    <link rel="stylesheet" href="/css/sb-admin-1.css">
</head>
<body>
    <div class="container">
        <h1>Admin Kasir Settings</h1>
        <form action="{{ route('update.settings') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="storeName">Nama Toko:</label>
                <input type="text" id="storeName" name="storeName" value="{{ old('storeName', 'ElectronicShop') }}" required>
            </div>
            <div class="form-group">
                <label for="storeAddress">Alamat Toko:</label>
                <input type="text" id="storeAddress" name="storeAddress" value="{{ old('storeAddress', 'Cinere Residence') }}" required>
            </div>
            <div class="form-group">
                <label for="contactEmail">Email:</label>
                <input type="email" id="contactEmail" name="contactEmail" value="{{ old('contactEmail', 'electronicshop@gmail.com') }}" required>
            </div>
            <div class="form-group">
                <label for="businessHours">Jam Buka:</label>
                <input type="text" id="businessHours" name="businessHours" value="{{ old('businessHours', '24 jam') }}" required>
            </div>
            <button type="submit">Save Settings</button>
        </form>
    </div>
</body>
</html>
