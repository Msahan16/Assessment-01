<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results - Student Marks Calculator</title>
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
            max-width: 600px;
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

        .student-name {
            color: #667eea;
            font-size: 24px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .status-badge {
            display: inline-block;
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 16px;
            margin-top: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .status-pass {
            background: #d4edda;
            color: #155724;
            border: 2px solid #28a745;
        }

        .status-fail {
            background: #f8d7da;
            color: #721c24;
            border: 2px solid #dc3545;
        }

        .results-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin: 30px 0;
        }

        .result-card {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            border-left: 4px solid #667eea;
        }

        .result-card.pass {
            border-left-color: #28a745;
        }

        .result-card.fail {
            border-left-color: #dc3545;
        }

        .result-card h3 {
            color: #666;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .result-card .value {
            color: #333;
            font-size: 32px;
            font-weight: 700;
        }

        .marks-breakdown {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }

        .marks-breakdown h3 {
            color: #333;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .marks-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #e0e0e0;
            font-size: 14px;
        }

        .marks-row:last-child {
            border-bottom: none;
        }

        .marks-row.total {
            background: #f0f0f0;
            padding: 10px;
            margin: 10px -10px 0 -10px;
            border-radius: 4px;
            font-weight: 600;
            color: #333;
        }

        .marks-label {
            color: #666;
        }

        .marks-value {
            color: #333;
            font-weight: 600;
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        button, a {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-recalculate {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-recalculate:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }

        .btn-new {
            background: #f0f0f0;
            color: #333;
        }

        .btn-new:hover {
            background: #e0e0e0;
        }

        .celebration {
            text-align: center;
            font-size: 40px;
            margin: 20px 0;
        }

        .summary-text {
            text-align: center;
            color: #666;
            font-size: 14px;
            margin: 20px 0;
            line-height: 1.6;
        }

        @media (max-width: 600px) {
            .container {
                padding: 25px;
            }

            .header h1 {
                font-size: 24px;
            }

            .student-name {
                font-size: 20px;
            }

            .results-grid {
                grid-template-columns: 1fr;
            }

            .result-card .value {
                font-size: 28px;
            }

            .button-group {
                flex-direction: column;
            }

            button, a {
                flex: auto;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📈 Results</h1>
            <div class="student-name">{{ $name }}</div>
            
            <div class="celebration">
                @if($status === 'Pass')
                    🎉
                @else
                    📋
                @endif
            </div>

            <span class="status-badge @if($status === 'Pass') status-pass @else status-fail @endif">
                {{ $status }}
            </span>
        </div>

        <!-- Summary -->
        <div class="summary-text">
            @if($status === 'Pass')
                <strong>Congratulations!</strong> You have successfully passed with an excellent performance.
            @else
                <strong>Better luck next time!</strong> Work hard and improve your scores.
            @endif
        </div>

        <!-- Results Grid -->
        <div class="results-grid">
            <div class="result-card @if($status === 'Pass') pass @else fail @endif">
                <h3>Total Marks</h3>
                <div class="value">{{ $total }}/300</div>
            </div>
            <div class="result-card @if($status === 'Pass') pass @else fail @endif">
                <h3>Average Marks</h3>
                <div class="value">{{ $average }}</div>
            </div>
        </div>

        <!-- Marks Breakdown -->
        <div class="marks-breakdown">
            <h3>📊 Marks Breakdown</h3>
            <div class="marks-row">
                <span class="marks-label">Subject 1:</span>
                <span class="marks-value">{{ $marks1 }}/100</span>
            </div>
            <div class="marks-row">
                <span class="marks-label">Subject 2:</span>
                <span class="marks-value">{{ $marks2 }}/100</span>
            </div>
            <div class="marks-row">
                <span class="marks-label">Subject 3:</span>
                <span class="marks-value">{{ $marks3 }}/100</span>
            </div>
            <div class="marks-row total">
                <span class="marks-label">Total:</span>
                <span class="marks-value">{{ $total }}/300</span>
            </div>
        </div>

        <!-- Result Interpretation -->
        <div class="marks-breakdown">
            <h3>✓ Result Analysis</h3>
            <div class="marks-row">
                <span class="marks-label">Pass Criteria:</span>
                <span class="marks-value">Average ≥ 50</span>
            </div>
            <div class="marks-row">
                <span class="marks-label">Your Average:</span>
                <span class="marks-value">{{ $average }}</span>
            </div>
            <div class="marks-row">
                <span class="marks-label">Status:</span>
                <span class="marks-value" style="color: @if($status === 'Pass') #28a745 @else #dc3545 @endif">
                    {{ $status }}
                </span>
            </div>
        </div>

        <!-- Buttons -->
        <div class="button-group">
            <a href="{{ route('student.form') }}" class="btn-new">➕ Calculate Again</a>
            <a href="{{ route('student.form') }}" class="btn-recalculate">🏠 Back to Form</a>
        </div>
    </div>
</body>
</html>
