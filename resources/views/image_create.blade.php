@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="/image/" class="btn btn-default"> 返回列表</a>
                    <form action="/image/groupadd" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="_method" value="POST">
                        <textarea name="img_datas" id="img_datas" cols="30" rows="10" style="width: 100%"></textarea>
                        <button type="submit" class="btn btn-primary"> 送出資料 </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
