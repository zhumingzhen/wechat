@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            关注回复
            <small>设置</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">公众号</a></li>
            <li class="active">关注回复</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">关注回复设置</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('subscribe.store') }}" method="post">
                        {!! csrf_field() !!}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="subscribeTitle">设置标题</label>
                                <input type="text" class="form-control" name="title" id="subscribeTitle" placeholder="设置标题" value="{{ $subscribe['title'] }}">
                            </div>
                            <div class="form-group">
                                <label for="subscribeContent">Password</label>
                                <textarea class="form-control" rows="5" name="content" id="subscribeContent" placeholder="回复内容">{{ $subscribe['content'] }}</textarea>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection