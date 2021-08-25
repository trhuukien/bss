@extends('layout')
@section('title', 'Log')
@section('log', 'active')

@section('main-content')

<div class="mx-200px">
    <div class="row">
        <div class="d-flex align-items-center justify-content-between p-0">
            <h3>ACTION LOG</h3>
            <form action="" class="d-flex align-items-center" method="GET">
                <input value="<?= $pz ?>" class="input-active" style="background-color: #EAE1E1; height: auto; width: 40px; margin-right: 10px;" type="number" name="page_size" id="" placeholder="Log">
                <input value="<?= $key ?>" class="input-active" style="background-color: #EAE1E1; height: auto;" type="text" name="search" id="name" placeholder="name">
                <button type="submit" class="btn mx-3" style="margin-right: 0;">Search</button>
            </form>
        </div>
        <span class="txt1" style="color: red; font-family: Arial, Helvetica, sans-serif;">
            @if(session('msg'))
            <p>{{session('msg')}}</p>
            @endif
        </span>
        <table class="table mx-auto bg-white rounded mt-3" style="line-height: 40px;">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Dashboard id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                    <th scope="col">Date</th>
                    <th scope="col">
                        <a href="{{route('log.add')}}">ADD Log</a>
                    </th>
                </tr>
            </thead>
            <tbody id="load_data2">
                <?php foreach ($logs as $l) : ?>
                    <tr>
                        <td><?= $l['id'] ?></td>
                        <td><?= $l['db_id'] ?></td>
                        <td><?= $l['name'] ?></td>
                        <td><?= $l['action'] ?></td>
                        <td><?= $l['date'] ?></td>
                        <td>
                            <a style="text-decoration: none;" onclick="return(confirm('Bạn có chắc chắn muốn xóa?'))" href="{{route('log.delete', ['id' => $l->id])}}" class="btn">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td><b>Total</b></td>
                    <td colspan="4"></td>
                    <td><b>{{$count}}<b></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="row d-flex justify-content-center align-items-center" id="page2">
        <?php for ($p = 1; $p <= $page; $p++) : ?>
            <a href="{{route('log')}}?search=<?= $key ?>&page=<?= $p ?>&page_size=<?= $pz ?>" class="page d-flex justify-content-center align-items-center" style="margin: 10px; text-decoration: none;">
                <span> <?= $p; ?></span>
            </a>
        <?php endfor; ?>
    </div>
</div>
@endsection