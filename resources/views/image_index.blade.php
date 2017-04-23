@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="/image/groupadd" class="btn btn-default"> 群組加入</a>
                    <table class="table table-striped">
                        <thead>
                            <th style="width: 5%">編號</th>
                            <th style="width: 30%">網址</th>
                            <th style="width: 65%">文字</th>
                        </thead>
                        <tbody>
                            @foreach ($images as $image)
                            <tr>
                                <td>{{ $image->id }}</td>
                                <td>{{ $image->img_link }}</td>
                                <td>{{ $image->content }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
