<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pipedrive Job Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }

        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-section {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        .form-section h3 {
            margin-top: 0;
            font-size: 20px;
        }

        .form-section input,
        .form-section select,
        .form-section textarea {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .form-section input:focus,
        .form-section select:focus,
        .form-section textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        @media (max-width: 768px) {
            .grid-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<form action="{{route('piperdrive.send')}}" method="POST">
    @csrf
    <div class="grid-container">

        <!-- Client details -->
        <div class="form-section">
            <h3>Client details</h3>
            <input type="text" name="first_name" placeholder="First name">
            <input type="text" name="last_name" placeholder="Last name">
            <input type="text" name="phone" placeholder="Phone">
            <input type="email" name="email" placeholder="Email (optional)">
        </div>

        <!-- Job type -->
        <div class="form-section">
            <h3>Job type</h3>
            <select name="job_type">
                <option>Recall Job</option>
                <option>New Installation</option>
            </select>
            <select name="job_source">
                <option>GL Pinellas</option>
                <option>GL Hillsborough</option>
            </select>
            <textarea name="job_description" placeholder="Job description (optional)"></textarea>
        </div>

        <!-- Service location -->
        <div class="form-section">
            <h3>Service location</h3>
            <input type="text" name="address" placeholder="Full Address">
            <input type="text" name="city" placeholder="City">
            <input type="text" name="state" placeholder="State">
            <input type="text" name="zip" placeholder="Zip code">
            <select name="area">
                <option>North</option>
                <option>West</option>
            </select>
        </div>

        <!-- Scheduled -->
        <div class="form-section">
            <h3>Scheduled</h3>
            <input type="date" name="date">
            <select name="start_time">
                <option>09:00</option>
                <option>10:00</option>
                <option>11:00</option>
                <option>12:00</option>
                <option>13:00</option>
                <option>14:00</option>
                <option>15:00</option>
                <option>16:00</option>
                <option>17:00</option>
                <option>18:00</option>
                <option>19:00</option>
            </select>

            <select name="end_time">
                <option>10:00</option>
                <option>11:00</option>
                <option>12:00</option>
                <option>13:00</option>
                <option>14:00</option>
                <option>15:00</option>
                <option>16:00</option>
                <option>17:00</option>
                <option>18:00</option>
                <option>19:00</option>
                <option>20:00</option>
            </select>
            <select name="technician">
                <option>Test select</option>
                <option>Sasha</option>
                <option>Masha</option>
            </select>
        </div>
        <div style="margin-top: 20px;">
            <button type="submit" style="
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    ">
                Отправить
            </button>
        </div>
        @if(session('success'))
            <div style="color: green">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div style="color: red">{{ session('error') }}</div>
        @endif

    </div>
</form>

</body>
</html>

