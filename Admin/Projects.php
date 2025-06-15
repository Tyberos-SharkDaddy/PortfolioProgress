<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Projects | Portfolio Dashboard</title>
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
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.04);
            padding: 32px 24px 24px 24px;
            margin-bottom: 32px;
        }

        .add-project-btn {
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

        .add-project-btn:hover {
            background: #444;
        }

        .project-categories {
            display: flex;
            gap: 10px;
            margin-bottom: 24px;
        }

        .category-btn {
            background: #f2f2f2;
            border: none;
            border-radius: 5px;
            padding: 7px 18px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
        }

        .category-btn.active,
        .category-btn:hover {
            background: #222;
            color: #fff;
        }

        .projects-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 18px;
            margin-top: 10px;
        }

        .project-card {
            background: #fafbfc;
            border: 1px solid #ececec;
            border-radius: 8px;
            padding: 18px 20px;
            transition: box-shadow 0.2s;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.03);
            display: flex;
            flex-direction: column;
            min-height: 170px;
        }

        .project-card:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.07);
        }

        .project-card h3 {
            margin: 0 0 8px 0;
            font-size: 1.2rem;
            font-weight: 600;
        }

        .project-card p {
            margin: 4px 0;
            font-size: 0.98rem;
        }

        /* Modal */
        #projectModal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.12);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        #projectModal .modal-content {
            background: #fff;
            padding: 28px 22px 22px 22px;
            border-radius: 10px;
            width: 95%;
            max-width: 370px;
            position: relative;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
        }

        #closeModal {
            position: absolute;
            top: 10px;
            right: 16px;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #888;
            cursor: pointer;
        }

        #closeModal:hover {
            color: #222;
        }

        #projectForm label {
            font-size: 0.97rem;
            font-weight: 500;
        }

        #projectForm input,
        #projectForm textarea,
        #projectForm select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 4px;
            margin-bottom: 14px;
            font-size: 1rem;
            background: #fafbfc;
        }

        #projectForm button[type="submit"] {
            background: #222;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 8px 18px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.2s;
        }

        #projectForm button[type="submit"]:hover {
            background: #444;
        }

        @media (max-width: 600px) {
            .main-content {
                padding: 0 4px;
            }

            .card {
                padding: 18px 6px 12px 6px;
            }
        }
        
    </style>
</head>

<body>
    <div class="main-content">
        <h1 class="page-title">Projects</h1>
        <div class="card">
            <!-- Add Project Button -->
            <div style="display:flex; justify-content:flex-end; margin-bottom:16px;">
                <button id="addProjectBtn" class="add-project-btn">
                    + Add New Project
                </button>
            </div>
            <!-- Project Categories -->
            <div class="project-categories">
                <button class="category-btn active" data-category="All">All</button>
                <button class="category-btn" data-category="Web Design">Web Design</button>
                <button class="category-btn" data-category="Development">Development</button>
                <button class="category-btn" data-category="Branding">Branding</button>
                <button class="category-btn" data-category="UI/UX">UI/UX</button>
            </div>
            <!-- Projects List -->
            <div class="projects-list">
                <!-- Example Project Cards -->
                <div class="project-card" data-category="Web Design">
                    <h3>Company Website Redesign</h3>
                    <p><strong>Category:</strong> Web Design</p>
                    <p><strong>Description:</strong> Revamp the company website for a modern look and improved UX.</p>
                    <p><strong>Status:</strong> In Progress</p>
                </div>
                <div class="project-card" data-category="Development">
                    <h3>Portfolio Web App</h3>
                    <p><strong>Category:</strong> Development</p>
                    <p><strong>Description:</strong> Build a personal portfolio web application with dynamic content.</p>
                    <p><strong>Status:</strong> Completed</p>
                </div>
                <div class="project-card" data-category="Branding">
                    <h3>Logo Design for Startup</h3>
                    <p><strong>Category:</strong> Branding</p>
                    <p><strong>Description:</strong> Create a unique logo for a tech startup.</p>
                    <p><strong>Status:</strong> Planning</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Structure -->
    <div id="projectModal">
        <div class="modal-content">
            <button id="closeModal">&times;</button>
            <h2 style="margin-top:0;">Add New Project</h2>
            <form id="projectForm">
                <label for="projectName">Project Name</label>
                <input type="text" id="projectName" name="projectName" required>
                <label for="projectDesc">Description</label>
                <textarea id="projectDesc" name="projectDesc" required></textarea>
                <label for="projectCategory">Category</label>
                <select id="projectCategory" name="projectCategory" required>
                    <option value="">Select Category</option>
                    <option value="Web Design">Web Design</option>
                    <option value="Development">Development</option>
                    <option value="Branding">Branding</option>
                    <option value="UI/UX">UI/UX</option>
                </select>
                <button type="submit">Add Project</button>
            </form>
        </div>
    </div>
    <script>
        // Modal open/close logic
        const addBtn = document.getElementById('addProjectBtn');
        const modal = document.getElementById('projectModal');
        const closeModal = document.getElementById('closeModal');
        addBtn.onclick = () => modal.style.display = 'flex';
        closeModal.onclick = () => modal.style.display = 'none';
        window.onclick = (e) => {
            if (e.target === modal) modal.style.display = 'none';
        };

        // Add project to list (front-end only)
        document.getElementById('projectForm').onsubmit = function(e) {
            e.preventDefault();
            const name = document.getElementById('projectName').value;
            const desc = document.getElementById('projectDesc').value;
            const cat = document.getElementById('projectCategory').value;
            const card = document.createElement('div');
            card.className = 'project-card';
            card.setAttribute('data-category', cat);
            card.innerHTML = `<h3>${name}</h3>
                <p><strong>Category:</strong> ${cat}</p>
                <p><strong>Description:</strong> ${desc}</p>
                <p><strong>Status:</strong> Planning</p>`;
            document.querySelector('.projects-list').prepend(card);
            modal.style.display = 'none';
            this.reset();
            filterProjects(currentCategory); // keep filter after adding
        };

        // Category filter logic
        const categoryBtns = document.querySelectorAll('.category-btn');
        let currentCategory = "All";
        categoryBtns.forEach(btn => {
            btn.onclick = function() {
                categoryBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                currentCategory = this.getAttribute('data-category');
                filterProjects(currentCategory);
            }
        });

        function filterProjects(category) {
            const cards = document.querySelectorAll('.project-card');
            cards.forEach(card => {
                if (category === "All" || card.getAttribute('data-category') === category) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>
</body>

</html>