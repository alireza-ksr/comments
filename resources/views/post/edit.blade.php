@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>ویرایش پست</h2>

            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('post.index') }}">بازگشت</a>

            </div>

        </div>

    </div>
    <form action="{{ route('post.update',['post' => $post->id]) }}" method="POST">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>عنوان:</strong>
                    <input type="tel" value="{{$post->title}}" name="" class="form-control" placeholder="">

                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>نویسنده:</strong>
                    <textarea class="form-control" style="height:150px" name="" placeholder="">{{"$post->title"}}</textarea>

                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">ثبت</button>

            </div>

        </div>
    </form>
@endsection
