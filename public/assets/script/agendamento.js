let selectedServices = [];
let selectedBarber = null;
let selectedDate = null;
let selectedTime = null;

function toggleService(serviceName, servicePrice, element) {
    const index = selectedServices.findIndex(service => service.name === serviceName);
    if (index === -1) {
        selectedServices.push({ name: serviceName, price: servicePrice });
        element.classList.add('selected');
    } else {
        selectedServices.splice(index, 1);
        element.classList.remove('selected');
    }
    updateSummary();
}

function updateBarber(barberName) {
    selectedBarber = barberName;
    updateSummary();
}

function updateTime(time) {
    selectedTime = time;
    updateSummary();
}

function updateSummary() {
    const serviceElement = document.getElementById('service');
    const selectedBarberElement = document.getElementById('selected-barber');
    const selectedDateElement = document.getElementById('selected-date');
    const selectedTimeElement = document.getElementById('selected-time');
    const priceElement = document.getElementById('price');

    let serviceName = '';
    let barberName = '';
    let date = '';
    let time = '';
    let price = 0;

    if (selectedServices.length > 0) {
        serviceName = selectedServices.map(service => service.name).join(', ');
        price = selectedServices.reduce((acc, service) => acc + service.price, 0);
    }

    if (selectedBarber) {
        barberName = selectedBarber;
    }

    if (selectedDate) {
        date = selectedDate.toLocaleDateString('pt-BR');
    }

    if (selectedTime) {
        time = selectedTime;
    }

    serviceElement.innerText = `Serviço: ${serviceName}`;
    selectedBarberElement.innerText = `Barbeiro: ${barberName}`;
    selectedDateElement.innerText = `Data: ${date}`;
    selectedTimeElement.innerText = `Horário: ${time}`;
    priceElement.innerText = `Preço: R$ ${price.toFixed(2)}`;
}

function scheduleAppointment() {
    // Implementar lógica de agendamento aqui
    alert('Agendamento realizado com sucesso!');
}

// Função para gerar o calendário
function generateCalendar() {
    const calendarDays = document.getElementById('calendar-days');
    const currentDate = new Date();
    const month = currentDate.getMonth();
    const year = currentDate.getFullYear();

    // Limpar o calendário anterior
    calendarDays.innerHTML = '';

    // Criar os dias da semana
    const weekDays = ['D', 'S', 'T', 'Q', 'Q ', 'S', 'S '];
    for (let i = 0; i < 7; i++) {
        const dayElement = document.createElement('div');
        dayElement.className = 'calendar-day';
        dayElement.innerText = weekDays[i];
        calendarDays.appendChild(dayElement);
    }

    // Criar os dias do mês
    const daysInMonth = getDaysInMonth(month, year);
    for (let i = 1; i <= daysInMonth; i++) {
        const dayElement = document.createElement('div');
        dayElement.className = 'calendar-day';
        dayElement.innerText = i;
        if (i < currentDate.getDate()) {
            dayElement.className += ' disabled';
        }
        dayElement.onclick = function() {
            if (selectedDate) {
                document.querySelector(`.calendar div.selected`).classList.remove('selected');
            }
            selectedDate = new Date(year, month, i);
            updateSummary();
            dayElement.classList.add('selected');
        };
        calendarDays.appendChild(dayElement);
    }

    // Atualizar o cabeçalho do calendário
    document.getElementById('month-year').innerText = `${getMonthName(month)} ${year}`;
}

// Função para obter o número de dias em um mês
function getDaysInMonth(month, year) {
    return new Date(year, month + 1, 0).getDate();
}

// Função para obter o nome do mês
function getMonthName(month) {
    const monthNames = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
    return monthNames[month];
}

// Função para ir para o mês anterior
function prevMonth() {
    const currentDate = new Date();
    const month = currentDate.getMonth();
    const year = currentDate.getFullYear();

    if (month === 0) {
        year -= 1;
        month = 11;
    } else {
        month -= 1;
    }

    generateCalendar();
}

// Função para ir para o mês seguinte
function nextMonth() {
    const currentDate = new Date();
    const month = currentDate.getMonth();
    const year = currentDate.getFullYear();

    if (month === 11) {
        year += 1;
        month = 0;
    } else {
        month += 1;
    }

    generateCalendar();
}

// Função para abrir o modal
function openModal() {
    document.getElementById('myModal').style.display = 'block';
}

// Função para fechar o modal
function closeModal() {
    document.getElementById('myModal').style.display = 'none';
}

// Inicializar o calendário
generateCalendar();


         // Funções para abrir e fechar o modal de contato
         function openContactModal() {
            document.getElementById('contactModal').style.display = 'block';
        }

        function closeContactModal() {
            document.getElementById('modal').style.display = 'none';
        }

        // Adicionando um evento para fechar o modal ao clicar fora dele
        window.onclick = function(event) {
            const modal = document.getElementsByTagName('modal');
            if (event.target === modal) {
                closeContactModal();
            }
        }
        