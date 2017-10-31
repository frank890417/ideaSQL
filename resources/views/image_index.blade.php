@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="/image/groupadd" class="btn btn-default"> 群組加入</a>
                    <h2>資料集</h2>
                    <ul class="list-group">
                        @foreach ($catas as $cata)
                            <li class="list-group-item">
                                {{$cata->source}} 
                                <div class="btn btn-danger pull-right" onclick="removeset('{{$cata->source}}')">移除</div>
                            </li>
                        @endforeach
                    </ul>
                    <h2>影像概覽</h2>
                    <table class="table table-striped">
                        <thead>
                            <th style="width: 3%">編號</th>
                            <th style="width: 10%">網址</th>
                            <th style="width: 10%">時間</th>
                            <th style="width: 25%">文字</th>
                            <th style="width: 15%">主顏色</th>
                            <th style="width: 25%">詳細資訊(json)</th>
                            <th style="width: 3%">資料集</th>
                        </thead>
                        <tbody>
                            @foreach ($images as $image)
                            <tr>
                                <td>{{ $image->id }}</td>
                                <td><img style="width: 100px" src="{{$image->img_link}}"/><br><p style="word-break: break-all; font-size: 10px">{{ $image->img_link }}</p></td>
                                <td><p style="word-break: break-all">{{ $image->time }}</p></td>
                                <td><p style="word-break: break-all; font-size: 10px">{{ substr($image->content,0,500)."..." }}</p></td>
                                <td><div style='display: inline-block;width: 40px;height: 40px;border: solid 1px #333;background-color: rgb({{ $image->color_r.','.$image->color_g.','.$image->color_b }})'></div>({{ $image->color_r.','.$image->color_g.','.$image->color_b }})</td>
                                <td><p style="word-break: break-all; font-size: 10px">{{ substr($image->detail_infos,0,500)."..." }}</p></td>
                                <td>{{ $image->source }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<script>

window.removeset = function(cata){
    if (confirm("你確定要移除資料集「"+cata+"」嗎?")){
        window.location= "/image/cata/delete/"+cata.replace("#",";sharp;");
    }
}
</script>
@endsection
