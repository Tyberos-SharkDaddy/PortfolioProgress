<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Booking Notifications | Portfolio Dashboard</title>
    <link rel="stylesheet" href="Dashboard.css" />
    <style>
        body {
            background: #f7f7f7;
            font-family: 'Segoe UI', Arial, sans-serif;
            color: #222;
        }
        .main-content {
            max-width: 900px;
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
        .notif-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 16px;
        }
        .notif-card {
            background: #e3f2fd;
            border: 1px solid #90caf9;
            border-radius: 8px;
            padding: 16px 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            cursor: pointer;
            transition: background 0.2s, box-shadow 0.2s;
            min-height: 120px;
            justify-content: space-between;
        }
        .notif-card:hover {
            background: #bbdefb;
            box-shadow: 0 2px 8px rgba(33,150,243,0.08);
        }
        .notif-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }
        .notif-title {
            font-weight: 600;
            font-size: 1.05rem;
        }
        .notif-date {
            font-size: 0.95rem;
            color: #1976d2;
        }
        .notif-status {
            background: #1976d2;
            color: #fff;
            border-radius: 4px;
            padding: 2px 10px;
            font-size: 0.93rem;
            align-self: flex-end;
            margin-top: 8px;
        }
        /* Modal details grid */
        #bookingModalContent {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px 16px;
            margin-top: 10px;
        }
        #bookingModalContent .modal-label {
            grid-column: 1 / 2;
            font-weight: 600;
            margin-top: 0;
        }
        #bookingModalContent .modal-value,
        #bookingModalContent .stage-badge,
        #bookingModalContent .meeting-badge,
        #bookingModalContent .payment-badge {
            grid-column: 2 / 3;
            margin-bottom: 6px;
        }
        .stage-badge {
            display: inline-block;
            padding: 2px 10px;
            border-radius: 12px;
            background: #ffe082;
            color: #795548;
            font-size: 0.97rem;
            margin-bottom: 6px;
        }
        .meeting-badge {
            display: inline-block;
            padding: 2px 10px;
            border-radius: 12px;
            background: #c8e6c9;
            color: #388e3c;
            font-size: 0.97rem;
            margin-bottom: 6px;
        }
        .payment-badge {
            display: inline-block;
            padding: 2px 10px;
            border-radius: 12px;
            background: #b3e5fc;
            color: #0277bd;
            font-size: 0.97rem;
            margin-bottom: 6px;
        }
        @media (max-width: 600px) {
            .main-content { padding: 0 4px; }
            .card { padding: 18px 6px 12px 6px; }
            .notif-list { grid-template-columns: 1fr; }
            #bookingModalContent {
                grid-template-columns: 1fr;
            }
            #bookingModalContent .modal-label,
            #bookingModalContent .modal-value,
            #bookingModalContent .stage-badge,
            #bookingModalContent .meeting-badge,
            #bookingModalContent .payment-badge {
                grid-column: 1 / 2;
            }
        }
    </style>
</head>
<body>
    <div class="main-content">
        <h1 class="page-title">Booking Notifications</h1>
        <div class="card">
            <div class="notif-list">
                <!-- Example Notification Card -->
                <div class="notif-card" onclick="openBookingDetails('1')">
                    <div class="notif-info">
                        <span class="notif-title">John Doe</span>
                        <span class="notif-date">john.doe@email.com</span>
                        <span class="notif-date">Service: Web Design</span>
                    </div>
                    <span class="notif-status">New</span>
                </div>
                <div class="notif-card" onclick="openBookingDetails('2')">
                    <div class="notif-info">
                        <span class="notif-title">Jane Smith</span>
                        <span class="notif-date">jane.smith@email.com</span>
                        <span class="notif-date">Service: Logo Branding</span>
                    </div>
                    <span class="notif-status">New</span>
                </div>
                <!-- Add more notification cards as needed -->
            </div>
        </div>
    </div>
    <!-- Booking Details Modal -->
    <div id="bookingModal" style="display:none;position:fixed;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.12);z-index:1000;align-items:center;justify-content:center;">
        <div style="background:#fff;padding:28px 22px 22px 22px;border-radius:10px;width:95%;max-width:400px;position:relative;box-shadow:0 8px 32px rgba(0,0,0,0.08);">
            <button id="closeBookingModal" style="position:absolute;top:10px;right:16px;background:none;border:none;font-size:1.5rem;color:#888;cursor:pointer;">&times;</button>
            <h2 style="margin-top:0;" id="bookingModalTitle">Booking Details</h2>
            <div id="bookingModalContent">
                <!-- Booking details will appear here -->
            </div>
        </div>
    </div>
    <script>
        // Example booking data
        const bookings = {
            "1": {
                name: "John Doe",
                email: "john.doe@email.com",
                service: "Web Design",
                about: "Portfolio Website for a freelance photographer.",
                goal: "Showcase photography works and attract new clients.",
                progress: "Wireframe",
                meeting: "Zoom",
                deadline: "2 months",
                payment: {
                    type: "Half",
                    method: "GCash"
                }
            },
            "2": {
                name: "Jane Smith",
                email: "jane.smith@email.com",
                service: "Logo Branding",
                about: "Logo for a new online shop.",
                goal: "Create a memorable and modern logo.",
                progress: "Brainstorming",
                meeting: "In person",
                deadline: "1 month",
                payment: {
                    type: "Full",
                    method: "Bank Transfer"
                }
            }
        };

        function openBookingDetails(id) {
            const modal = document.getElementById('bookingModal');
            const content = document.getElementById('bookingModalContent');
            const booking = bookings[id];
            if (booking) {
                content.innerHTML = `
                    <span class="modal-label">Client Name:</span>
                    <span class="modal-value">${booking.name}</span>
                    <span class="modal-label">Email:</span>
                    <span class="modal-value">${booking.email}</span>
                    <span class="modal-label">Service:</span>
                    <span class="modal-value">${booking.service}</span>
                    <span class="modal-label">Project About:</span>
                    <span class="modal-value">${booking.about}</span>
                    <span class="modal-label">Goal:</span>
                    <span class="modal-value">${booking.goal}</span>
                    <span class="modal-label">Progress/Stage:</span>
                    <span class="stage-badge">${booking.progress}</span>
                    <span class="modal-label">Meeting Type:</span>
                    <span class="meeting-badge">${booking.meeting}</span>
                    <span class="modal-label">Deadline / Estimated Finish:</span>
                    <span class="modal-value">${booking.deadline}</span>
                    <span class="modal-label">Payment:</span>
                    <span class="payment-badge">${booking.payment.type} - ${booking.payment.method}</span>
                `;
            } else {
                content.innerHTML = "<p>Booking details not found.</p>";
            }
            modal.style.display = 'flex';
        }
        document.getElementById('closeBookingModal').onclick = function() {
            document.getElementById('bookingModal').style.display = 'none';
        };
        window.onclick = function(e) {
            const modal = document.getElementById('bookingModal');
            if (e.target === modal) modal.style.display = 'none';
        };
    </script>
</body>
</html>