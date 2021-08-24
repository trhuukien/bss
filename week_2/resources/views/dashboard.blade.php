@extends('layout')
@section('title', 'Dashboard')
@section('dashboard', 'active')

@section('main-content')

<div class="container">
    <div class="row">
        <br><br>
        <table class="table table-none-mobile mx-auto" style="line-height: 40px;">
            <thead>
                <tr>
                    <th scope="col">Index</th>
                    <th scope="col">Device</th>
                    <th scope="col">MAC Address</th>
                    <th scope="col">IP</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">PC (Kw/H)</th>
                </tr>
            </thead>
            <tbody id="load_data22">
                <?php $index = 0;
                $total = 0; ?>
                <?php foreach ($dashboards as $d) : ?>
                    <?php $index++;
                    $total += $d['pc'] ?>
                    <tr>
                        <td><?= $index ?></td>
                        <td><?= $d['device'] ?></td>
                        <td><?= $d['mac'] ?></td>
                        <td><?= $d['ip'] ?></td>
                        <td><?= $d['created_at'] ?></td>
                        <td><?= $d['pc'] ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td><b>Total</b></td>
                    <td colspan="4"></td>
                    <td><b><?= $total ?><b></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row-2">
        <div>
            <div class="box">
                <div class="content-chart">
                    <b>Power Consumption</b>
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <form class="box" id="form-add" method="POST">
                @csrf
                <div class="content-box">
                    <input class="input-active" type="text" name="device" id="name" placeholder="Name..." required>
                    <input class="input-active" type="text" name="ip" id="ip" placeholder="IP..." required>
                    <input class="input-active" type="text" name="mac" id="mac" placeholder="MAC..." required>
                    <input class="input-active" type="number" name="pc" id="pc" placeholder="PC..." required>
                    <div>
                        <button name="btn-submit" type="submit" class="btn mt-7">ADD</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    var arr = <?= json_encode($dashboards) ?>;

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
</script>
@endsection