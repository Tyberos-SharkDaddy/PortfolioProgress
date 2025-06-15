<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weekly Task Calendar</title>
    <!-- Bootstrap CSS for minimalist and professional styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }

        .calendar-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px;
        }

        .week-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 15px;
        }

        .day-card {
            background: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
            min-height: 250px;
            display: flex;
            flex-direction: column;
        }

        .day-card h6 {
            font-size: 1rem;
            font-weight: 600;
            color: #212529;
            margin-bottom: 15px;
        }

        .task-note {
            background: #f1f3f5;
            border-radius: 6px;
            padding: 10px;
            margin-bottom: 10px;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .task-note.high .priority-dot {
            background: #dc3545;
        }

        .task-note.medium .priority-dot {
            background: #ffc107;
        }

        .task-note.low .priority-dot {
            background: #28a745;
        }

        .priority-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .task-text {
            flex-grow: 1;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .pin-icon {
            color: #6c757d;
            font-size: 0.9rem;
            cursor: pointer;
        }

        .pin-icon.pinned {
            color: #007bff;
        }

        .add-btn,
        .filter-btn {
            border-radius: 20px;
            padding: 8px 20px;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .modal-content {
            border-radius: 12px;
            border: none;
        }

        .modal-body .row {
            row-gap: 1rem;
        }

        .filter-dropdown .dropdown-item {
            font-size: 0.95rem;
            padding: 8px 15px;
        }

        .filter-dropdown .dropdown-item:hover {
            background-color: #e9ecef;
        }
    </style>
</head>

<body>
    <div class="calendar-container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold fs-4">Weekly Task Calendar</h2>
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
                <button class="btn btn-primary add-btn ms-2" data-bs-toggle="modal" data-bs-target="#addTaskModal">+ Add Task</button>
            </div>
        </div>
        <div class="week-grid" id="weekGrid">
            <!-- Dynamically populated via JavaScript -->
        </div>
    </div>

    <!-- Modal for Adding Task -->
    <div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title fs-5" id="addTaskModalLabel">Add New Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addTaskForm">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="taskName" class="form-label">Task Name</label>
                                <input type="text" class="form-control" id="taskName" placeholder="e.g., Websites UI" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="taskPriority" class="form-label">Priority</label>
                                <select class="form-select" id="taskPriority" required>
                                    <option value="" disabled selected>Select priority</option>
                                    <option value="High">High</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Low">Low</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="taskDate" class="form-label">Date</label>
                                <input type="date" class="form-control" id="taskDate" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="taskCategory" class="form-label">Category</label>
                                <select class="form-select" id="taskCategory" required>
                                    <option value="" disabled selected>Select a category</option>
                                    <option value="Website Dev">Website Dev</option>
                                    <option value="Canva">Canva</option>
                                    <option value="Mobile Dev">Mobile Dev</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Save Task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sample tasks (replace with PHP/MySQL fetch in production)
        const sampleTasks = [{
                name: 'Websites UI',
                priority: 'High',
                date: '2025-06-16',
                category: 'Website Dev',
                pinned: false
            },
            {
                name: 'Database Setup',
                priority: 'Medium',
                date: '2025-06-17',
                category: 'Mobile Dev',
                pinned: true
            }
        ];

        // Generate weekly calendar
        const weekGrid = document.getElementById('weekGrid');
        const today = new Date('2025-06-15');
        const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

        function renderCalendar() {
            weekGrid.innerHTML = '';
            for (let i = 0; i < 7; i++) {
                const date = new Date(today);
                date.setDate(today.getDate() + i);
                const dateStr = date.toISOString().split('T')[0];
                const dayCard = document.createElement('div');
                dayCard.className = 'day-card';
                dayCard.innerHTML = `<h6>${days[date.getDay()]} ${date.toLocaleDateString('en-US', { month: 'short', day: 'numeric' })}</h6>`;
                const tasks = sampleTasks.filter(task => task.date === dateStr);
                tasks.sort((a, b) => (b.pinned - a.pinned)); // Pinned tasks first
                tasks.forEach(task => {
                    const taskNote = document.createElement('div');
                    taskNote.className = `task-note ${task.priority.toLowerCase()}`;
                    taskNote.dataset.category = task.category;
                    taskNote.innerHTML = `
                        <span class="priority-dot"></span>
                        <span class="task-text">${task.name} (${task.category})</span>
                        <span class="pin-icon ${task.pinned ? 'pinned' : ''}">${task.pinned ? '★' : '☆'}</span>
                    `;
                    taskNote.querySelector('.pin-icon').addEventListener('click', () => {
                        task.pinned = !task.pinned;
                        renderCalendar();
                    });
                    dayCard.appendChild(taskNote);
                });
                weekGrid.appendChild(dayCard);
            }
        }

        // Form submission handling
        document.getElementById('addTaskForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const name = document.getElementById('taskName').value;
            const priority = document.getElementById('taskPriority').value;
            const date = document.getElementById('taskDate').value;
            const category = document.getElementById('taskCategory').value;
            sampleTasks.push({
                name,
                priority,
                date,
                category,
                pinned: false
            });
            renderCalendar();
            const modal = bootstrap.Modal.getInstance(document.getElementById('addTaskModal'));
            modal.hide();
            e.target.reset();
        });

        // Filter tasks by priority
        document.querySelectorAll('#priorityFilterDropdown .dropdown-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const priority = this.getAttribute('data-priority');
                const taskNotes = document.querySelectorAll('.task-note');
                taskNotes.forEach(note => {
                    if (priority === 'all' || note.classList.contains(priority.toLowerCase())) {
                        note.style.opacity = '1';
                        note.style.display = 'flex';
                    } else {
                        note.style.opacity = '0.3';
                        note.style.display = 'flex';
                    }
                });
                document.getElementById('priorityFilterDropdown').textContent = priority === 'all' ? 'Filter by Priority' : `Filter: ${priority}`;
            });
        });

        // Initial render
        renderCalendar();
    </script>
</body>

</html>