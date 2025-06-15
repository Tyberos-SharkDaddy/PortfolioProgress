<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Client Reviews | Portfolio Dashboard</title>
    <link rel="stylesheet" href="Dashboard.css" />
    <style>
        body {
            background: #f7f7f7;
            font-family: 'Segoe UI', Arial, sans-serif;
            color: #222;
        }
        .main-content {
            max-width: 700px;
            margin: 40px auto;
            padding: 0 16px;
        }
        .page-title {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 24px;
            letter-spacing: -1px;
        }
        .card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.04);
            padding: 32px 24px 24px 24px;
            margin-bottom: 32px;
        }
        .reviews-list {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }
        .review-card {
            background: #fafbfc;
            border: 1px solid #ececec;
            border-radius: 8px;
            padding: 18px 20px;
            display: flex;
            flex-direction: column;
            position: relative;
        }
        .review-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 8px;
        }
        .review-client {
            font-weight: 600;
        }
        .review-date {
            font-size: 0.95rem;
            color: #888;
        }
        .review-actions {
            position: absolute;
            top: 16px;
            right: 18px;
            display: flex;
            gap: 8px;
        }
        .review-actions button {
            background: #eee;
            border: none;
            border-radius: 4px;
            padding: 4px 10px;
            font-size: 0.95rem;
            cursor: pointer;
            transition: background 0.2s;
        }
        .review-actions button.hide-btn {
            background: #ffe082;
        }
        .review-actions button.delete-btn {
            background: #ffcdd2;
            color: #b71c1c;
        }
        .review-actions button:hover {
            background: #ddd;
        }
        .review-text {
            font-size: 1.05rem;
            margin-bottom: 4px;
        }
        .review-hidden {
            opacity: 0.5;
            background: #f5f5f5;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <h1 class="page-title">Client Reviews</h1>
        <div class="card">
            <div class="reviews-list">
                <!-- Example Review Card -->
                <div class="review-card" data-review-id="1">
                    <div class="review-header">
                        <span class="review-client">Juan Dela Cruz</span>
                        <span class="review-date">June 10, 2025</span>
                    </div>
                    <div class="review-text">
                        "Very professional and delivered the project on time. Highly recommended!"
                    </div>
                    <div class="review-actions">
                        <button class="hide-btn" onclick="toggleHide(this)">Hide</button>
                        <button class="delete-btn" onclick="deleteReview(this)">Delete</button>
                    </div>
                </div>
                <div class="review-card" data-review-id="2">
                    <div class="review-header">
                        <span class="review-client">Maria Santos</span>
                        <span class="review-date">June 8, 2025</span>
                    </div>
                    <div class="review-text">
                        "Great communication and creative ideas. Will work again!"
                    </div>
                    <div class="review-actions">
                        <button class="hide-btn" onclick="toggleHide(this)">Hide</button>
                        <button class="delete-btn" onclick="deleteReview(this)">Delete</button>
                    </div>
                </div>
                <!-- Add more review cards as needed -->
            </div>
        </div>
    </div>
    <script>
        function toggleHide(btn) {
            const card = btn.closest('.review-card');
            card.classList.toggle('review-hidden');
            btn.textContent = card.classList.contains('review-hidden') ? 'Show' : 'Hide';
        }
        function deleteReview(btn) {
            const card = btn.closest('.review-card');
            card.remove();
        }
    </script>
</body>
</html>