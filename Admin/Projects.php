<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Build In Progress</title>
    <!-- Bootstrap CSS for minimalist and professional styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f6f8;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .progress-bar {
            border-radius: 5px;
        }

        .add-btn,
        .filter-btn {
            border-radius: 50px;
            padding: 10px 20px;
            font-weight: 500;
            margin-left: 10px;
        }

        .modal-content {
            border-radius: 15px;
            border: none;
        }

        .table-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .card-text small {
            font-size: 0.85rem;
            color: #6c757d;
        }

        .filter-dropdown .dropdown-item:hover {
            background-color: #e9ecef;
        }

        .description-text {
            font-size: 0.9rem;
            color: #6c757d;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .modal-body .row {
            row-gap: 1rem;
        }
    </style>
</head>

<body>
    <div class="table-container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Build In Progress</h2>
            <div>
                <div class="dropdown d-inline-block filter-dropdown">
                    <button class="btn btn-outline-primary filter-btn dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Filter by Status
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                        <li><a class="dropdown-item" href="#" data-filter="all">All</a></li>
                        <li><a class="dropdown-item" href="#" data-filter="In Progress">In Progress</a></li>
                        <li><a class="dropdown-item" href="#" data-filter="Not Started">Not Started</a></li>
                        <li><a class="dropdown-item" href="#" data-filter="Completed">Completed</a></li>
                    </ul>
                </div>
                <div class="dropdown d-inline-block filter-dropdown">
                    <button class="btn btn-outline-primary filter-btn dropdown-toggle" type="button" id="categoryFilterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Filter by Category
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="categoryFilterDropdown">
                        <li><a class="dropdown-item" href="#" data-category="all">All</a></li>
                        <li><a class="dropdown-item" href="#" data-category="Website Dev">Website Dev</a></li>
                        <li><a class="dropdown-item" href="#" data-category="Canva">Canva</a></li>
                        <li><a class="dropdown-item" href="#" data-category="Mobile Dev">Mobile Dev</a></li>
                    </ul>
                </div>
                <button class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#addProjectModal">+ Add Project</button>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4" id="projectCards">
            <!-- Sample Cards -->
            <div class="col project-card" data-status="In Progress" data-category="Website Dev">
                <div class="card p-3">
                    <h5 class="card-title">Project Alpha</h5>
                    <p class="card-text text-muted">Category: Website Dev</p>
                    <p class="card-text text-muted">Status: In Progress</p>
                    <p class="card-text"><small>Start Date: 15 Jun 2025</small></p>
                    <p class="card-text"><small>End Date: 30 Jun 2025</small></p>
                    <p class="description-text" title="Building a responsive e-commerce website">Building a responsive e-commerce website</p>
                    <div class="progress mb-3">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
                    </div>
                    <a href="#" class="btn btn-outline-primary btn-sm">View Details</a>
                </div>
            </div>
            <div class="col project-card" data-status="Not Started" data-category="Mobile Dev">
                <div class="card p-3">
                    <h5 class="card-title">Project Beta</h5>
                    <p class="card-text text-muted">Category: Mobile Dev</p>
                    <p class="card-text text-muted">Status: Not Started</p>
                    <p class="card-text"><small>Start Date: 20 Jun 2025</small></p>
                    <p class="card-text"><small>End Date: 10 Jul 2025</small></p>
                    <p class="description-text" title="Developing a fitness tracking mobile app">Developing a fitness tracking mobile app</p>
                    <div class="progress mb-3">
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                    </div>
                    <a href="#" class="btn btn-outline-primary btn-sm">View Details</a>
                </div>
            </div>
            <!-- Add more cards dynamically via PHP or JS -->
        </div>
    </div>

    <!-- Modal for Adding Project -->
    <div class="modal fade" id="addProjectModal" tabindex="-1" aria-labelledby="addProjectModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="addProjectModalLabel">Add New Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addProjectForm">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="projectName" class="form-label">Project Name</label>
                                <input type="text" class="form-control" id="projectName" placeholder="Enter project name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="projectCategory" class="form-label">Category</label>
                                <select class="form-select" id="projectCategory" required>
                                    <option value="" disabled selected>Select a category</option>
                                    <option value="Website Dev">Website Dev</option>
                                    <option value="Canva">Canva</option>
                                    <option value="Mobile Dev">Mobile Dev</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="projectStatus" class="form-label">Status</label>
                                <select class="form-select" id="projectStatus" required>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Not Started">Not Started</option>
                                    <option value="Completed">Completed</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="projectStartDate" class="form-label">Start Date</label>
                                <input type="date" class="form-control" messaid="projectStartDate" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="projectEndDate" class="form-label">End Date</label>
                                <input type="date" class="form-control" id="projectEndDate" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="projectProgress" class="form-label">Progress (%)</label>
                                <input type="number" class="form-control" id="projectProgress" min="0" max="100" placeholder="Enter progress percentage" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="projectDescription" class="form-label">What is the Project all about?</label>
                                <textarea class="form-control" id="projectDescription" rows="4" placeholder="Describe the project" required></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Save Project</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Form submission handling with basic validation
        document.getElementById('addProjectForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Collect form data
            const name = document.getElementById('projectName').value;
            const category = document.getElementById('projectCategory').value;
            const status = document.getElementById('projectStatus').value;
            const progress = document.getElementById('projectProgress').value;
            const startDate = document.getElementById('projectStartDate').value;
            const endDate = document.getElementById('projectEndDate').value;
            const description = document.getElementById('projectDescription').value;

            // Basic validation: Ensure end date is after start date
            if (new Date(endDate) < new Date(startDate)) {
                alert('End Date must be after Start Date.');
                return;
            }

            // Placeholder for AJAX or PHP integration
            console.log('New Project:', {
                name,
                category,
                status,
                progress,
                startDate,
                endDate,
                description
            });
            // Close modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('addProjectModal'));
            modal.hide();
            // Reset form
            e.target.reset();
        });

        // Filter projects by status
        document.querySelectorAll('#filterDropdown .dropdown-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const filter = this.getAttribute('data-filter');
                const cards = document.querySelectorAll('.project-card');

                cards.forEach(card => {
                    if (filter === 'all' || card.getAttribute('data-status') === filter) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });

                // Update button text
                document.getElementById('filterDropdown').textContent = filter === 'all' ? 'Filter by Status' : `Filter: ${filter}`;
            });
        });

        // Filter projects by category
        document.querySelectorAll('#categoryFilterDropdown .dropdown-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const category = this.getAttribute('data-category');
                const cards = document.querySelectorAll('.project-card');

                cards.forEach(card => {
                    if (category === 'all' || card.getAttribute('data-category') === category) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });

                // Update button text
                document.getElementById('categoryFilterDropdown').textContent = category === 'all' ? 'Filter by Category' : `Filter: ${category}`;
            });
        });
    </script>
</body>

</html>