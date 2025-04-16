<!-- resources/views/iframe-container.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRM — Create deal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
        }

        #formFrame {
            display: none;
            width: 100%;
            height: 850px;
            border: 1px solid #ccc;
            margin-top: 30px;
            border-radius: 10px;
        }

        button {
            padding: 12px 24px;
            background-color: #28a745;
            color: white;
            border: none;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h1>CRM: Create Deal</h1>

<button onclick="showForm()">+ Создать сделку</button>

<iframe id="formFrame" src="{{ url('/piperdrive-form') }}"></iframe>

<script>
    function showForm() {
        document.getElementById('formFrame').style.display = 'block';
    }
</script>

</body>
</html>
