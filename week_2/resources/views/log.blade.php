@extends('layout')
@section('title', 'Log')
@section('log', 'active')

@section('main-content')

<div class="mx-200px">
    <div class="row">
        <div class="d-flex align-items-center justify-content-between p-0">
            <h3>ACTION LOG</h3>
            <form action="" class="d-flex align-items-center" method="GET">
                <input value="<?= $key ?>" class="input-active" style="background-color: #EAE1E1; height: auto;" height="20px" type="text" name="search" id="name" placeholder="name">
                <button type="submit" class="btn mx-3">Search</button>
            </form>
        </div>
        <table class="table mx-auto bg-white rounded mt-3" style="line-height: 40px;">
            <thead>
                <tr>
                    <th scope="col">Device ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody id="load_data2">
                <?php foreach ($logs as $l) : ?>
                    <tr>
                        <td><?= $l['id'] ?></td>
                        <td><?= $l['name'] ?></td>
                        <td><?= $l['action'] ?></td>
                        <td><?= $l['date'] ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td><b>Total</b></td>
                    <td colspan="2"></td>
                    <td><b>{{$count}}<b></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="row d-flex justify-content-center align-items-center" id="page2">
        <?php for ($p = 1; $p <= $page; $p++) : ?>
            <a href="{{route('log')}}?search=<?= $key ?>&page=<?= $p ?>" class="m-3 page d-flex justify-content-center align-items-center">
                <span> <?= $p; ?></span>
            </a>
        <?php endfor; ?>
    </div>
</div>
@endsection