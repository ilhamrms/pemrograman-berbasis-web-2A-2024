function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
    
  }
  window.onclick = function(e) {
    if (!e.target.matches('.dropbtn')) {
    var myDropdown = document.getElementById("myDropdown");
      if (myDropdown.classList.contains('show')) {
        myDropdown.classList.remove('show');
      }
    }
  }

let tasks = [];

function renderTasks() {
  const taskList = document.getElementById('taskList');
  taskList.innerHTML = '';
  tasks.forEach((task, index) => {
    const li = document.createElement('li');
    li.textContent = task.name;
    li.className = task.completed ? 'task-item completed' : 'task-item';
    li.onclick = () => toggleTask(index);
  });
}

function addTask() {
  const taskInput = document.getElementById('taskInput');
  const taskName = taskInput.value.trim();
  if (taskName !== '') {
    tasks.push({ name: taskName, completed: false });
    taskInput.value = '';
    saveTasks();
    renderTasks();
  }
}

function toggleTask(index) {
  tasks[index].completed = !tasks[index].completed;
  saveTasks();
  renderTasks();
}

function deleteTask(index) {
  tasks.splice(index,1);
  saveTasks();
  renderTasks();
}

function saveTasks() {
  localStorage.setItem('tasks', JSON.stringify(tasks));
}

function loadTasks() {
  const storedTasks = localStorage.getItem('tasks');
  if (storedTasks) {
    tasks = JSON.parse(storedTasks);
    renderTasks();
  }
}

function filterTasks(type) {
  let filteredTasks = [];
  if (type === 'all') {
    filteredTasks = tasks;
  } else if (type === 'completed') {
    filteredTasks = tasks.filter(task => task.completed);
  }
  renderFilteredTasks(filteredTasks);
}

function renderFilteredTasks(filteredTasks) {
  const taskList = document.getElementById('taskList');
  taskList.innerHTML = '';
  filteredTasks.forEach((task, index) => {
    const li = document.createElement('li');
    li.textContent = task.name;
    li.className = task.completed ? 'task-item completed' : 'task-item';
    li.onclick = () => toggleTask(index);

    const deleteButton = document.createElement('button');
    deleteButton.textContent = 'Delete';
    deleteButton.className = 'delete-btn';
    deleteButton.onclick = (event) => {
      event.stopPropagation(); 
      deleteTask(index);
    };
  });
}
function editTask(index) {
  const newName = prompt('Edit Task:', tasks[index].name);
  if (newName !== null && newName.trim() !== '') {
    tasks[index].name = newName.trim();
    saveTasks();
    renderTasks();
  }
}


window.onload = loadTasks;
function renderTasks() {
  const taskList = document.getElementById('taskList');
  taskList.innerHTML = '';
  tasks.forEach((task, index) => {
    const li = document.createElement('li');
    li.textContent = task.name;
    li.className = task.completed ? 'task-item completed' : 'task-item';

    const editButton = document.createElement('button');
    editButton.textContent = 'Edit';
    editButton.className = 'edit-btn';
    editButton.onclick = (event) => {
      event.stopPropagation();
      editTask(index);
    };

    const deleteButton = document.createElement('button');
    deleteButton.textContent = 'Delete';
    deleteButton.className = 'delete-btn';
    deleteButton.onclick = (event) => {
      event.stopPropagation(); 
      deleteTask(index);
    };

    li.appendChild(editButton);
    li.appendChild(deleteButton);
    taskList.appendChild(li);
  });
}

function renderTasks() {
  const taskList = document.getElementById('taskList');
  taskList.innerHTML = '';
  tasks.forEach((task, index) => {
    // Jika tugas sudah selesai dan di checklist, maka jangan ditampilkan
    if (task.completed && task.checked) {
      return;
    }

    const li = document.createElement('li');
    li.className = task.completed ? 'task-item completed' : 'task-item';
    
    // Checkbox untuk menandai tugas selesai atau belum selesai
    const checkbox = document.createElement('input');
    checkbox.type = 'checkbox';
    checkbox.checked = task.completed;
    checkbox.addEventListener('click', () => toggleTask(index));

    // Label untuk menampilkan nama tugas
    const label = document.createElement('label');
    label.textContent = task.name;

    // Menambahkan checkbox dan label ke dalam elemen <li>
    li.appendChild(checkbox);
    li.appendChild(label);

    const editButton = document.createElement('button');
    editButton.textContent = 'Edit';
    editButton.className = 'edit-btn';
    editButton.onclick = (event) => {
      event.stopPropagation();
      editTask(index);
    };

    const deleteButton = document.createElement('button');
    deleteButton.textContent = 'Delete';
    deleteButton.className = 'delete-btn';
    deleteButton.onclick = (event) => {
      event.stopPropagation(); 
      deleteTask(index);
    };

    li.appendChild(editButton);
    li.appendChild(deleteButton);
    taskList.appendChild(li);
  });
}








