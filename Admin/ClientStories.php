<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Stories</title>
    <!-- Bootstrap CSS for minimalist and professional styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
        }

        .stories-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .story-card {
            background: #ffffff;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            border-left: 5px solid #e9ecef;
            transition: transform 0.2s ease;
        }

        .story-card:hover {
            transform: translateY(-2px);
        }

        .story-card.high {
            border-left-color: #dc3545;
        }

        .story-card.medium {
            border-left-color: #ffc107;
        }

        .story-card.low {
            border-left-color: #28a745;
        }

        .story-card h6 {
            font-size: 1.2rem;
            font-weight: 600;
            color: #1d2528;
            margin-bottom: 12px;
        }

        .story-text {
            font-size: 1rem;
            color: #495057;
            line-height: 1.7;
            margin-bottom: 10px;
        }

        .story-category,
        .story-dates {
            font-size: 0.85rem;
            color: #6c757d;
            font-style: italic;
            margin-bottom: 5px;
        }

        .add-btn,
        .filter-btn {
            border-radius: 25px;
            padding: 10px 25px;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .modal-content {
            border-radius: 15px;
            border: none;
        }

        .modal-body .row {
            row-gap: 1.2rem;
        }

        .filter-dropdown .dropdown-item {
            font-size: 0.95rem;
            padding: 10px 20px;
        }

        .filter-dropdown .dropdown-item:hover {
            background-color: #f1f3f5;
        }

        .nav-link {
            color: #495057;
            font-weight: 500;
            margin-right: 25px;
            font-size: 1rem;
        }

        .nav-link:hover {
            color: #007bff;
        }

        .nav-link.active {
            color: #007bff;
            border-bottom: 2px solid #007bff;
        }

        .no-stories {
            font-size: 1rem;
            color: #6c757d;
            text-align: center;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="stories-container">
        
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h2 class="fw-bold fs-3">Client Stories</h2>
            <div>
                <div class="dropdown d-inline-block filter-dropdown">
                    <button class="btn btn-outline-primary filter-btn dropdown-toggle" type="button" id="priorityFilterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Filter by Priority
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="priorityFilterDropdown">
                        <li><a class="dropdown-item" href="#" data-priority="all">All</a></li>
                        <li><a class="dropdown-item" href="#" data-priority="High">High</a></li>
                        <li><a class="dropdown-item" href="#" data-priority="Medium">Medium</a></li>
                        <li><a class="dropdown-item" href="#" data-priority="Low">Low</a></li>
                    </ul>
                </div>
                <button class="btn btn-primary add-btn ms-3" data-bs-toggle="modal" data-bs-target="#addStoryModal">+ Add Story</button>
            </div>
        </div>
        <div id="storiesList">
            <!-- Dynamically populated via JavaScript -->
            <div class="no-stories" id="noStoriesMessage">No stories available yet. Add one to get started!</div>
        </div>
    </div>

    <!-- Modal for Adding Story -->
    <div class="modal fade" id="addStoryModal" tabindex="-1" aria-labelledby="addStoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title fs-5" id="addStoryModalLabel">Add Client Story</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addStoryForm">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="storyProject" class="form-label">Project Name</label>
                                <input type="text" class="form-control" id="storyProject" placeholder="e.g., Carla’s Website" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="storyText" class="form-label">Client Story</label>
                                <textarea class="form-control" id="storyText" rows="5" placeholder="e.g., Carla struggled with manual order tracking. We built a custom system to automate it. Her business now runs smoothly." required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="storyPriority" class="form-label">Priority</label>
                                <select class="form-select" id="storyPriority" required>
                                    <option value="" disabled selected>Select priority</option>
                                    <option value="High">High</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Low">Low</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="storyCategory" class="form-label">Category</label>
                                <select class="form-select" id="storyCategory" required>
                                    <option value="" disabled selected>Select category</option>
                                    <option value="Website Dev">Website Dev</option>
                                    <option value="Canva">Canva</option>
                                    <option value="Mobile Dev">Mobile Dev</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="storyStartDate" class="form-label">Date Started</label>
                                <input type="date" class="form-control" id="storyStartDate" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="storyEndDate" class="form-label">Date Ended</label>
                                <input type="date" class="form-control" id="storyEndDate">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Save Story</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sample data (replace with PHP/MySQL fetch in production)
        let sampleStories = [{
                project: 'Carla’s Website',
                text: 'Carla struggled with manual order tracking. We built a custom system to automate it. Her business now runs smoothly.',
                priority: 'High',
                category: 'Website Dev',
                startDate: '2025-06-10',
                endDate: '2025-06-16'
            },
            {
                project: 'Mark’s Database',
                text: 'Mark’s team faced data silos. We created a centralized database solution. Their workflow is now efficient and seamless.',
                priority: 'Medium',
                category: 'Mobile Dev',
                startDate: '2025-06-12',
                endDate: ''
            }
        ];

        // Sample projects for tracking (replace with shared data from calendar.php or build.php)
        let sampleProjects = ['Carla’s Website', 'Mark’s Database'];

        // Generate client stories
        const storiesList = document.getElementById('storiesList');
        const noStoriesMessage = document.getElementById('noStoriesMessage');

        function renderStories() {
            storiesList.innerHTML = '';
            if (sampleStories.length === 0) {
                noStoriesMessage.style.display = 'block';
            } else {
                noStoriesMessage.style.display = 'none';
                sampleStories.forEach(story => {
                    const storyCard = document.createElement('div');
                    storyCard.className = `story-card ${story.priority.toLowerCase()}`;
                    storyCard.innerHTML = `
                        <h6>${story.project}</h6>
                        <p class="story-text">${story.text}</p>
                        <p class="story-category">Category: ${story.category}</p>
                        <p class="story-dates">Started: ${story.startDate}${story.endDate ? ' | Ended: ' + story.endDate : ''}</p>
                    `;
                    storiesList.appendChild(storyCard);
                });
            }
        }

        // Form submission for stories
        document.getElementById('addStoryForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const project = document.getElementById('storyProject').value;
            const text = document.getElementById('storyText').value;
            const priority = document.getElementById('storyPriority').value;
            const category = document.getElementById('storyCategory').value;
            const startDate = document.getElementById('storyStartDate').value;
            const endDate = document.getElementById('storyEndDate').value;
            sampleStories.push({
                project,
                text,
                priority,
                category,
                startDate,
                endDate
            });
            if (!sampleProjects.includes(project)) {
                sampleProjects.push(project);
            }
            renderStories();
            const modal = bootstrap.Modal.getInstance(document.getElementById('addStoryModal'));
            modal.hide();
            e.target.reset();
        });

        // Filter stories by priority
        document.querySelectorAll('#priorityFilterDropdown .dropdown-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const priority = this.getAttribute('data-priority');
                const storyCards = document.querySelectorAll('.story-card');
                storyCards.forEach(card => {
                    if (priority === 'all' || card.classList.contains(priority.toLowerCase())) {
                        card.style.opacity = '1';
                        card.style.display = 'block';
                    } else {
                        card.style.opacity = '0.3';
                        card.style.display = 'block';
                    }
                });
                document.getElementById('priorityFilterDropdown').textContent = priority === 'all' ? 'Filter by Priority' : `Filter: ${priority}`;
            });
        });

        // Initial render
        renderStories();
    </script>
</body>

</html>