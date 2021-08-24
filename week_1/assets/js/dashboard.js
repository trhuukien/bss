//Fake data array
var arr = [
    {
        id: 1,
        device: 'TV',
        color: 'rgb(255, 99, 132)',
        mac: '192.168.0.0',
        ip: '127.0.0.1',
        date: '2021-05-31',
        action: 'Sleep',
        pc: 11
    },
    {
        id: 2,
        device: 'Computer',
        color: 'rgb(54, 162, 235)',
        mac: '192.168.0.5',
        ip: '127.0.0.1',
        date: '2021-5-3',
        action: 'Sleep',
        pc: 16
    },
    {
        id: 4,
        device: 'Sofa',
        color: 'rgb(255, 205, 86)',
        mac: '192.168.0.0',
        ip: '127.0.0.1',
        date: '2021-8-31',
        action: 'Active',
        pc: 45
    },
    {
        id: 5,
        device: 'Phone',
        color: 'rgb(11, 11, 11)',
        mac: '192.168.0.0',
        ip: '127.0.0.1',
        date: '2021-5-14',
        action: 'On',
        pc: 18
    },
];

//Get data in HTML
function load() {
    let total = 0;
    const load_data = arr.map(function (item, index) {
        total += item.pc;
        return `  <tr>
            <td> ${index + 1} </td>
            <td>${item.device}</td>
            <td>${item.mac}</td>
            <td>${item.ip}</td>
            <td>${item.date}</td>
            <td>${item.pc}</td>
        </tr>`;
    }).join('');
    const data = load_data + `
                    <tr style="background-color: #FAFBFB;">
                        <th scope="row">Total</th>
                        <td colspan="4"></td>
                        <td><b>${total}</b></td>
                    </tr>
                    `;
    document.getElementById("load_data").innerHTML = data;
}

//Call function
load();

//ADD form submit
//Update chart
function push(e) {
    e.preventDefault();
    const id = Math.floor(Math.random() * 1000000) + 1;
    const name = document.getElementById("name").value;
    const mac = document.getElementById("mac").value;
    const ip = document.getElementById("ip").value;
    const today = new Date();
    const date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
    const pc = document.getElementById("pc").value;
    const cl = `rgb(${Math.floor(Math.random() * 100) + 100}, ${Math.floor(Math.random() * 100) + 100}, ${Math.floor(Math.random() * 100) + 100})`;

    if (name.length > 0 && mac.length > 0 && ip.length > 0 && !isNaN(pc)) {
        if (arr.push({
            id: id,
            device: name,
            color: cl,
            mac: mac,
            ip: ip,
            date: date,
            pc: Number(pc)
        })) {
            alert('Thành công!');
            load();
            myChart.data.labels.push(name);
            myChart.data.datasets[0].data.push(pc);
            myChart.data.datasets[0].backgroundColor.push(cl);
            myChart.update();

            document.getElementById("form-add").reset();
        } else {
            alert('Thất bại! Lỗi gửi form');
        }
    } else {
        alert('Thất bại! Kiểm tra kiểu dữ liệu');
    }
}

// Load Chart
var color = [];
for (let i = 0; i < arr.length; i++) {
    color.push(
        arr[i].color
    );
};

var device = [];
for (let i = 0; i < arr.length; i++) {
    device.push(
        arr[i].device
    );
};

var pc = [];
for (let i = 0; i < arr.length; i++) {
    pc.push(
        arr[i].pc
    );
};

const data = {
    labels: device,
    datasets: [{
        label: 'My First Dataset',
        data: pc,
        backgroundColor: color,
        hoverOffset: 4
    }]
};

const config = {
    type: 'doughnut',
    data: data,
};

var myChart = new Chart(
    document.getElementById('myChart'),
    config
);