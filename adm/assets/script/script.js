const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})







const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})





if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})



const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
	if(this.checked) {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
})


// JavaScript com suporte a salvamento
const todoList = document.getElementById('todo-list');
const addTaskButton = document.getElementById('add-task');

// Função para carregar tarefas do localStorage
function loadTasks() {
    const savedTasks = JSON.parse(localStorage.getItem('tasks')) || [];
    savedTasks.forEach(task => addTask(task.text, task.isCompleted));
}

// Função para salvar tarefas no localStorage
function saveTasks() {
    const tasks = [];
    document.querySelectorAll('#todo-list li').forEach(li => {
        const text = li.querySelector('p').innerText;
        const isCompleted = li.classList.contains('completed');
        tasks.push({ text, isCompleted });
    });
    localStorage.setItem('tasks', JSON.stringify(tasks));
}

// Função para adicionar uma tarefa
function addTask(taskText = "Nova Tarefa", isCompleted = false) {
    const li = document.createElement('li');
    li.className = isCompleted ? 'completed' : 'not-completed';

    // Conteúdo da tarefa
    li.innerHTML = `
        <p>${taskText}</p>
        <i class='bx bx-dots-vertical-rounded' title="Mais opções"></i>
    `;

    // Alternar status ao clicar no texto
    li.querySelector('p').addEventListener('click', () => {
        li.classList.toggle('completed');
        li.classList.toggle('not-completed');
        saveTasks(); // Salvar mudanças no localStorage
    });

    // Remover tarefa ao clicar no ícone
    li.querySelector('i').addEventListener('click', () => {
        li.remove();
        saveTasks(); // Salvar mudanças no localStorage
    });

    // Adicionar a tarefa na lista
    todoList.appendChild(li);
    saveTasks(); // Salvar mudanças no localStorage
}

// Adicionar tarefa ao clicar no botão de adicionar
addTaskButton.addEventListener('click', () => {
    const taskText = prompt("Digite a descrição da tarefa:");
    if (taskText) addTask(taskText);
});

// Carregar tarefas salvas ao carregar a página
loadTasks();

		
		
			
	
	
