//Fake data array
var arr = [
    {
        id: 1,
        device: 'TV',
        mac: '192.168.0.0',
        ip: '127.0.0.1',
        date: '2021-05-31',
        action: 'Sleep',
        pc: 11
    },
    {
        "id": 2,
        device: 'Computer',
        mac: '192.168.0.5',
        ip: '127.0.0.1',
        date: '2021-5-3',
        action: 'Sleep',
        pc: 16
    },
    {
        id: 4,
        device: 'Sofa',
        mac: '192.168.0.0',
        ip: '127.0.0.1',
        date: '2021-8-31',
        action: 'Active',
        pc: 45
    },
    {
        id: 5,
        device: 'Phone',
        mac: '192.168.0.0',
        ip: '127.0.0.1',
        date: '2021-5-14',
        action: 'On',
        pc: 18
    },
    {
        id: 8,
        device: 'Phone',
        mac: '192.168.0.0',
        ip: '127.0.0.1',
        date: '2021-05-31',
        action: 'Sleep',
        pc: 11
    },
    {
        id: 10,
        device: 'TV',
        mac: '192.168.0.0',
        ip: '127.0.0.1',
        date: '2021-05-31',
        action: 'Sleep',
        pc: 11
    },
    {
        id: 11,
        device: 'Smart Phone',
        mac: '192.168.0.5',
        ip: '127.0.0.1',
        date: '2021-5-3',
        action: 'Sleep',
        pc: 16
    },
    {
        id: 12,
        device: 'Flash',
        mac: '192.168.0.0',
        ip: '127.0.0.1',
        date: '2021-8-31',
        action: 'Active',
        pc: 45
    },
];

//Page size
const page_size = 5;

//Search submit
function search(e) {
    e.preventDefault();
    const name = document.getElementById("name").value;

    if (name == '') {
        load_button_page(arr);
        load_page(1);
    } else {
        var search = arr.filter(function (item) {
            item = item.device.toLowerCase();

            return item.indexOf(name.toLowerCase()) > -1;
        });

        load_data = '';
        for (let i = 0; i < search.length; i++) {
            load_data += `<tr>
                                <td>${search[i].id}</td>
                                <td>${search[i].device}</td>
                                <td>${search[i].action}</td>
                                <td>${search[i].date}</td>
                            </tr>`;
        };

        let total = search.length;
        const data = load_data + `
        <tr style="background-color: #FAFBFB;">
            <th scope="row">Total</th>
            <td colspan="2"></td>
            <td><b>${total}</b></td>
        </tr>
        `;
        document.getElementById("load_data").innerHTML = data;
        document.getElementById("page").innerHTML = '';
    }
}

//Load button paginate
function load_button_page(x) {
    const page = Math.ceil(x.length / page_size);

    var button_page = '';
    for (let i = 1; i <= page; i++) {
        button_page += `<button 
                onclick="load_page(${i})" id="page-${i}"
                class="m-3 page d-flex justify-content-center align-items-center">
                <span>${i}</span>
            </button>`;
    }

    document.getElementById("page").innerHTML = button_page;
}

load_button_page(arr);


//On click button page
function load_page(p) {
    const all_btn = document.getElementsByClassName("page");
    if (all_btn.length > 0) {
        for (let i = 0; i < (Math.ceil(arr.length / page_size)); i++) {
            all_btn[i].classList.remove("btn-active");
        }
        const btn = document.getElementById(`page-${p}`);
        btn.classList.add("btn-active");
    }

    const min = (p - 1) * page_size;
    const max = min + 5;

    var load_data = '';
    if (max > arr.length) {
        for (let i = min; i < arr.length; i++) {
            load_data += `<tr>
                            <td>${arr[i].id}</td>
                            <td>${arr[i].device}</td>
                            <td>${arr[i].action}</td>
                            <td>${arr[i].date}</td>
                        </tr>`;
        }
    } else {
        for (let i = min; i < max; i++) {
            load_data += `<tr>
                            <td>${arr[i].id}</td>
                            <td>${arr[i].device}</td>
                            <td>${arr[i].action}</td>
                            <td>${arr[i].date}</td>
                        </tr>`;
        }
    }

    let total = arr.length;
    const data = load_data + `
    <tr style="background-color: #FAFBFB;">
        <th scope="row">Total</th>
        <td colspan="2"></td>
        <td><b>${total}</b></td>
    </tr>
    `;
    document.getElementById("load_data").innerHTML = data;
}

load_page(1);