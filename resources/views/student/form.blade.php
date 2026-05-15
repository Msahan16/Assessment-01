<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Marks Calculator</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 100%;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #333;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .header p {
            color: #666;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            color: #333;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            outline: none;
            border-color: #667eea;
            background-color: #f9f9ff;
        }

        .error-message {
            color: #dc3545;
            font-size: 12px;
            margin-top: 5px;
            display: flex;
            align-items: center;
        }

        .error-message::before {
            content: "✕";
            margin-right: 5px;
            font-weight: bold;
        }

        .form-group.error input {
            border-color: #dc3545;
            background-color: #fff5f5;
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        button {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-submit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }

        .btn-reset {
            background: #f0f0f0;
            color: #333;
        }

        .btn-reset:hover {
            background: #e0e0e0;
        }

        .info-box {
            background: #e3f2fd;
            border-left: 4px solid #2196F3;
            padding: 12px;
            border-radius: 4px;
            margin-bottom: 20px;
            font-size: 13px;
            color: #1565c0;
        }

        .marks-input-group {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 10px;
        }

        .marks-input-group .form-group {
            margin-bottom: 0;
        }

        @media (max-width: 500px) {
            .container {
                padding: 25px;
            }

            .header h1 {
                font-size: 24px;
            }

            .marks-input-group {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📊 Student Marks Calculator</h1>
            <p>Enter your marks and get instant results</p>
        </div>

        <div class="info-box">
            ℹ️ Pass criteria: Average ≥ 50 | Marks range: 0-100
        </div>

        <form action="{{ route('student.calculate') }}" method="POST">
            @csrf

            <!-- Student Name -->
            <div class="form-group @error('name') error @enderror">
                <label for="name">Student Name</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    placeholder="Enter your full name"
                    value="{{ old('name') }}"
                    autocomplete="off"
                >
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Subject Marks -->
            <label style="display: block; margin-bottom: 15px; color: #333; font-weight: 600;">Subject Marks (out of 100)</label>
            
            <div class="marks-input-group">
                <!-- Marks 1 -->
                <div class="form-group @error('marks1') error @enderror">
                    <label for="marks1">Subject 1</label>
                    <input 
                        type="number" 
                        id="marks1" 
                        name="marks1" 
                        placeholder="0-100"
                        min="0"
                        max="100"
                        value="{{ old('marks1') }}"
                    >
                    @error('marks1')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Marks 2 -->
                <div class="form-group @error('marks2') error @enderror">
                    <label for="marks2">Subject 2</label>
                    <input 
                        type="number" 
                        id="marks2" 
                        name="marks2" 
                        placeholder="0-100"
                        min="0"
                        max="100"
                        value="{{ old('marks2') }}"
                    >
                    @error('marks2')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Marks 3 -->
                <div class="form-group @error('marks3') error @enderror">
                    <label for="marks3">Subject 3</label>
                    <input 
                        type="number" 
                        id="marks3" 
                        name="marks3" 
                        placeholder="0-100"
                        min="0"
                        max="100"
                        value="{{ old('marks3') }}"
                    >
                    @error('marks3')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Buttons -->
            <div class="button-group">
                <button type="submit" class="btn-submit">Calculate Marks</button>
                <button type="reset" class="btn-reset">Clear Form</button>
            </div>
        </form>
    </div>
</body>
</html>
