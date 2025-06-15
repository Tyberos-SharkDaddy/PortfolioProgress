<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Work Experience | Portfolio Dashboard</title>
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
        .add-exp-btn {
            background: #222;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 8px 20px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s;
        }
        .add-exp-btn:hover {
            background: #444;
        }
        .exp-list {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }
        .exp-card {
            background: #fafbfc;
            border: 1px solid #ececec;
            border-radius: 8px;
            padding: 18px 20px;
            display: flex;
            flex-direction: column;
            position: relative;
        }
        .exp-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 4px;
        }
        .exp-company {
            font-size: 1rem;
            color: #444;
            margin-bottom: 2px;
        }
        .exp-duration {
            font-size: 0.97rem;
            color: #888;
            margin-bottom: 8px;
        }
        .exp-details {
            font-size: 0.98rem;
            margin-bottom: 8px;
        }
        .exp-actions {
            position: absolute;
            top: 16px;
            right: 18px;
            display: flex;
            gap: 8px;
        }
        .exp-actions button {
            background: #eee;
            border: none;
            border-radius: 4px;
            padding: 4px 10px;
            font-size: 0.95rem;
            cursor: pointer;
            transition: background 0.2s;
        }
        .exp-actions .edit-btn {
            background: #ffe082;
        }
        .exp-actions .delete-btn {
            background: #ffcdd2;
            color: #b71c1c;
        }
        .exp-actions button:hover {
            background: #ddd;
        }
        /* Modal */
        #expModal {
            display: none;
            position: fixed;
            top: 0; left: 0; width: 100vw; height: 100vh;
            background: rgba(0,0,0,0.12);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }
        #expModal .modal-content {
            background: #fff;
            padding: 28px 22px 22px 22px;
            border-radius: 10px;
            width: 95%;
            max-width: 370px;
            position: relative;
            box-shadow: 0 8px 32px rgba(0,0,0,0.08);
        }
        #closeExpModal {
            position: absolute;
            top: 10px; right: 16px;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #888;
            cursor: pointer;
        }
        #closeExpModal:hover {
            color: #222;
        }
        #expForm label {
            font-size: 0.97rem;
            font-weight: 500;
        }
        #expForm input, #expForm textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 4px;
            margin-bottom: 14px;
            font-size: 1rem;
            background: #fafbfc;
        }
        #expForm button[type="submit"] {
            background: #222;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 8px 18px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.2s;
        }
        #expForm button[type="submit"]:hover {
            background: #444;
        }
        @media (max-width: 600px) {
            .main-content { padding: 0 4px; }
            .card { padding: 18px 6px 12px 6px; }
        }
    </style>
</head>
<body>
    <div class="main-content">
        <h1 class="page-title">Work Experience</h1>
        <div class="card">
            <div style="display:flex; justify-content:flex-end; margin-bottom:16px;">
                <button id="addExpBtn" class="add-exp-btn">+ Add Experience</button>
            </div>
            <div class="exp-list" id="expList">
                <!-- Example Experience Card -->
                <div class="exp-card">
                    <div class="exp-title">Frontend Developer</div>
                    <div class="exp-company">ABC Tech Solutions</div>
                    <div class="exp-duration">Jan 2022 - Present</div>
                    <div class="exp-details">Developed and maintained responsive web applications using React and Vue.js.</div>
                    <div class="exp-actions">
                        <button class="edit-btn" onclick="editExp(this)">Edit</button>
                        <button class="delete-btn" onclick="deleteExp(this)">Delete</button>
                    </div>
                </div>
                <div class="exp-card">
                    <div class="exp-title">Web Designer</div>
                    <div class="exp-company">Creative Studio</div>
                    <div class="exp-duration">Jun 2020 - Dec 2021</div>
                    <div class="exp-details">Designed UI/UX for client websites and collaborated with developers for implementation.</div>
                    <div class="exp-actions">
                        <button class="edit-btn" onclick="editExp(this)">Edit</button>
                        <button class="delete-btn" onclick="deleteExp(this)">Delete</button>
                    </div>
                </div>
                <!-- Add more experience cards as needed -->
            </div>
        </div>
    </div>
    <!-- Modal Structure -->
    <div id="expModal">
        <div class="modal-content">
            <button id="closeExpModal">&times;</button>
            <h2 id="expModalTitle" style="margin-top:0;">Add Experience</h2>
            <form id="expForm">
                <label for="expTitle">Job Title</label>
                <input type="text" id="expTitle" name="expTitle" required>
                <label for="expCompany">Company</label>
                <input type="text" id="expCompany" name="expCompany" required>
                <label for="expDuration">Duration</label>
                <input type="text" id="expDuration" name="expDuration" placeholder="e.g. Jan 2022 - Present" required>
                <label for="expDetails">Details</label>
                <textarea id="expDetails" name="expDetails" required></textarea>
                <input type="hidden" id="editExpIndex" value="">
                <button type="submit">Save Experience</button>
            </form>
        </div>
    </div>
    <script>
        // Modal logic
        const addExpBtn = document.getElementById('addExpBtn');
        const expModal = document.getElementById('expModal');
        const closeExpModal = document.getElementById('closeExpModal');
        const expForm = document.getElementById('expForm');
        const expList = document.getElementById('expList');
        const expModalTitle = document.getElementById('expModalTitle');
        const editExpIndex = document.getElementById('editExpIndex');
        let editingExpCard = null;

        addExpBtn.onclick = () => {
            expModal.style.display = 'flex';
            expModalTitle.textContent = "Add Experience";
            expForm.reset();
            editExpIndex.value = "";
            editingExpCard = null;
        };
        closeExpModal.onclick = () => expModal.style.display = 'none';
        window.onclick = (e) => { if (e.target === expModal) expModal.style.display = 'none'; };

        expForm.onsubmit = function(e) {
            e.preventDefault();
            const title = document.getElementById('expTitle').value;
            const company = document.getElementById('expCompany').value;
            const duration = document.getElementById('expDuration').value;
            const details = document.getElementById('expDetails').value;
            if(editExpIndex.value) {
                editingExpCard.querySelector('.exp-title').textContent = title;
                editingExpCard.querySelector('.exp-company').textContent = company;
                editingExpCard.querySelector('.exp-duration').textContent = duration;
                editingExpCard.querySelector('.exp-details').textContent = details;
            } else {
                const card = document.createElement('div');
                card.className = 'exp-card';
                card.innerHTML = `
                    <div class="exp-title">${title}</div>
                    <div class="exp-company">${company}</div>
                    <div class="exp-duration">${duration}</div>
                    <div class="exp-details">${details}</div>
                    <div class="exp-actions">
                        <button class="edit-btn" onclick="editExp(this)">Edit</button>
                        <button class="delete-btn" onclick="deleteExp(this)">Delete</button>
                    </div>
                `;
                expList.prepend(card);
            }
            expModal.style.display = 'none';
            expForm.reset();
        };

        // Edit Experience
        window.editExp = function(btn) {
            editingExpCard = btn.closest('.exp-card');
            document.getElementById('expTitle').value = editingExpCard.querySelector('.exp-title').textContent;
            document.getElementById('expCompany').value = editingExpCard.querySelector('.exp-company').textContent;
            document.getElementById('expDuration').value = editingExpCard.querySelector('.exp-duration').textContent;
            document.getElementById('expDetails').value = editingExpCard.querySelector('.exp-details').textContent;
            editExpIndex.value = "1";
            expModalTitle.textContent = "Edit Experience";
            expModal.style.display = 'flex';
        };

        // Delete Experience
        window.deleteExp = function(btn) {
            const card = btn.closest('.exp-card');
            card.remove();
        };
    </script>
</body>
</html>