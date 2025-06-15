<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Services | Portfolio Dashboard</title>
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
        .add-service-btn {
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
        .add-service-btn:hover {
            background: #444;
        }
        .services-list {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }
        .service-card {
            background: #fafbfc;
            border: 1px solid #ececec;
            border-radius: 8px;
            padding: 18px 20px;
            display: flex;
            flex-direction: column;
            position: relative;
        }
        .service-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 6px;
        }
        .service-details {
            font-size: 0.98rem;
            margin-bottom: 8px;
        }
        .service-actions {
            position: absolute;
            top: 16px;
            right: 18px;
            display: flex;
            gap: 8px;
        }
        .service-actions button {
            background: #eee;
            border: none;
            border-radius: 4px;
            padding: 4px 10px;
            font-size: 0.95rem;
            cursor: pointer;
            transition: background 0.2s;
        }
        .service-actions .edit-btn {
            background: #ffe082;
        }
        .service-actions .delete-btn {
            background: #ffcdd2;
            color: #b71c1c;
        }
        .service-actions button:hover {
            background: #ddd;
        }
        /* Modal */
        #serviceModal {
            display: none;
            position: fixed;
            top: 0; left: 0; width: 100vw; height: 100vh;
            background: rgba(0,0,0,0.12);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }
        #serviceModal .modal-content {
            background: #fff;
            padding: 28px 22px 22px 22px;
            border-radius: 10px;
            width: 95%;
            max-width: 370px;
            position: relative;
            box-shadow: 0 8px 32px rgba(0,0,0,0.08);
        }
        #closeServiceModal {
            position: absolute;
            top: 10px; right: 16px;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #888;
            cursor: pointer;
        }
        #closeServiceModal:hover {
            color: #222;
        }
        #serviceForm label {
            font-size: 0.97rem;
            font-weight: 500;
        }
        #serviceForm input, #serviceForm textarea, #serviceForm select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 4px;
            margin-bottom: 14px;
            font-size: 1rem;
            background: #fafbfc;
        }
        #serviceForm button[type="submit"] {
            background: #222;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 8px 18px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.2s;
        }
        #serviceForm button[type="submit"]:hover {
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
        <h1 class="page-title">Services</h1>
        <div class="card">
            <div style="display:flex; justify-content:flex-end; margin-bottom:16px;">
                <button id="addServiceBtn" class="add-service-btn">+ Add New Service</button>
            </div>
            <div class="services-list" id="servicesList">
                <!-- Example Service Card -->
                <div class="service-card" data-service-id="1">
                    <div class="service-title">🌐 Web Design</div>
                    <div class="service-details">Modern and responsive website design for businesses and individuals.</div>
                    <div class="service-actions">
                        <button class="edit-btn" onclick="editService(this)">Edit</button>
                        <button class="delete-btn" onclick="deleteService(this)">Delete</button>
                    </div>
                </div>
                <div class="service-card" data-service-id="2">
                    <div class="service-title">🏷️ Logo Branding</div>
                    <div class="service-details">Unique and memorable logo creation for your brand identity.</div>
                    <div class="service-actions">
                        <button class="edit-btn" onclick="editService(this)">Edit</button>
                        <button class="delete-btn" onclick="deleteService(this)">Delete</button>
                    </div>
                </div>
                <!-- Add more service cards as needed -->
            </div>
        </div>
    </div>
    <!-- Modal Structure -->
    <div id="serviceModal">
        <div class="modal-content">
            <button id="closeServiceModal">&times;</button>
            <h2 id="modalTitle" style="margin-top:0;">Add New Service</h2>
            <form id="serviceForm">
                <label for="serviceName">Service Name</label>
                <input type="text" id="serviceName" name="serviceName" required>
                <label for="serviceIcon">Icon</label>
                <select id="serviceIcon" name="serviceIcon" required style="width:100%;padding:8px;border:1px solid #ddd;border-radius:5px;margin-bottom:14px;">
                    <option value="🌐">🌐 Web</option>
                    <option value="🎨">🎨 Design</option>
                    <option value="🏷️">🏷️ Branding</option>
                    <option value="💻">💻 Code</option>
                    <option value="🔍">🔍 SEO</option>
                    <option value="📷">📷 Photo</option>
                    <option value="🛒">🛒 E-Commerce</option>
                    <option value="📱">📱 App</option>
                    <option value="📝">📝 Content</option>
                    <option value="📊">📊 Analytics</option>
                    <option value="🎬">🎬 Video</option>
                    <option value="🎵">🎵 Audio</option>
                    <option value="🖼️">🖼️ Graphics</option>
                    <option value="🛠️">🛠️ Maintenance</option>
                    <option value="🧑‍💻">🧑‍💻 Consulting</option>
                    <option value="🗂️">🗂️ Management</option>
                    <option value="📦">📦 Deployment</option>
                    <option value="🔒">🔒 Security</option>
                    <option value="🌟">🌟 Featured</option>
                    <option value="🚀">🚀 Launch</option>
                    <option value="🧩">🧩 Integration</option>
                    <option value="📚">📚 Training</option>
                    <option value="💡">💡 Ideas</option>
                    <option value="🧑‍🎨">🧑‍🎨 Illustration</option>
                    <option value="🧑‍🏫">🧑‍🏫 Coaching</option>
                    <option value="🧑‍🔬">🧑‍🔬 Research</option>
                    <option value="🧑‍🔧">🧑‍🔧 Support</option>
                    <option value="🧑‍🚀">🧑‍🚀 Innovation</option>
                    <option value="🧑‍💼">🧑‍💼 Business</option>
                    <option value="📈">📈 Growth</option>
                    <option value="🗣️">🗣️ Communication</option>
                    <option value="🌍">🌍 Global</option>
                    <option value="⏱️">⏱️ Fast</option>
                    <option value="💬">💬 Chat</option>
                    <option value="📞">📞 Call</option>
                    <option value="📅">📅 Schedule</option>
                    <option value="🧾">🧾 Documentation</option>
                    <option value="🧮">🧮 Calculation</option>
                    <option value="🧬">🧬 Science</option>
                    <option value="🧳">🧳 Travel</option>
                    <option value="🛡️">🛡️ Protection</option>
                    <option value="🧰">🧰 Tools</option>
                    <option value="🧲">🧲 Marketing</option>
                    <option value="🧵">🧵 Custom</option>
                    <option value="🧸">🧸 Fun</option>
                    <option value="🧊">🧊 Cool</option>
                    <option value="🧗">🧗 Challenge</option>
                    <option value="🧙">🧙 Magic</option>
                    <option value="🧚">🧚 Creative</option>
                    <option value="🧜">🧜 Unique</option>
                    <option value="🧞">🧞 Solution</option>
                    <option value="🧟">🧟 Fix</option>
                    <option value="🧠">🧠 Smart</option>
                    <option value="🦄">🦄 Special</option>
                    <option value="🐱‍💻">🐱‍💻 Geek</option>
                    <option value="🐉">🐉 Power</option>
                    <option value="🔥">🔥 Hot</option>
                    <option value="❄️">❄️ Cool</option>
                    <option value="⚡">⚡ Fast</option>
                    <option value="💎">💎 Premium</option>
                    <option value="🏆">🏆 Award</option>
                    <option value="🥇">🥇 Top</option>
                    <option value="🥈">🥈 Silver</option>
                    <option value="🥉">🥉 Bronze</option>
                </select>
                <label for="serviceDesc">Details</label>
                <textarea id="serviceDesc" name="serviceDesc" required></textarea>
                <input type="hidden" id="editIndex" value="">
                <button type="submit">Save Service</button>
            </form>
        </div>
    </div>
    <script>
        // Modal logic
        const addBtn = document.getElementById('addServiceBtn');
        const modal = document.getElementById('serviceModal');
        const closeModal = document.getElementById('closeServiceModal');
        const form = document.getElementById('serviceForm');
        const servicesList = document.getElementById('servicesList');
        const modalTitle = document.getElementById('modalTitle');
        const editIndex = document.getElementById('editIndex');
        let editingCard = null;

        addBtn.onclick = () => {
            modal.style.display = 'flex';
            modalTitle.textContent = "Add New Service";
            form.reset();
            editIndex.value = "";
            editingCard = null;
        };
        closeModal.onclick = () => modal.style.display = 'none';
        window.onclick = (e) => { if (e.target === modal) modal.style.display = 'none'; };

        form.onsubmit = function(e) {
            e.preventDefault();
            const name = document.getElementById('serviceName').value;
            const desc = document.getElementById('serviceDesc').value;
            const icon = document.getElementById('serviceIcon').value;
            if(editIndex.value) {
                editingCard.querySelector('.service-title').innerHTML = icon + " " + name;
                editingCard.querySelector('.service-details').textContent = desc;
            } else {
                const card = document.createElement('div');
                card.className = 'service-card';
                card.innerHTML = `
                    <div class="service-title">${icon} ${name}</div>
                    <div class="service-details">${desc}</div>
                    <div class="service-actions">
                        <button class="edit-btn" onclick="editService(this)">Edit</button>
                        <button class="delete-btn" onclick="deleteService(this)">Delete</button>
                    </div>
                `;
                servicesList.prepend(card);
            }
            modal.style.display = 'none';
            form.reset();
        };

        // Edit Service
        window.editService = function(btn) {
            editingCard = btn.closest('.service-card');
            const title = editingCard.querySelector('.service-title').textContent.trim();
            const iconMatch = title.match(/^(\S+)/);
            const name = title.replace(/^(\S+)\s/, '');
            document.getElementById('serviceName').value = name;
            document.getElementById('serviceDesc').value = editingCard.querySelector('.service-details').textContent;
            // Set icon dropdown
            const iconSelect = document.getElementById('serviceIcon');
            for(let i=0; i<iconSelect.options.length; i++) {
                if(iconSelect.options[i].value === iconMatch[1]) {
                    iconSelect.selectedIndex = i;
                    break;
                }
            }
            editIndex.value = "1";
            modalTitle.textContent = "Edit Service";
            modal.style.display = 'flex';
        };

        // Delete Service
        window.deleteService = function(btn) {
            const card = btn.closest('.service-card');
            card.remove();
        };
    </script>
</body>
</html>