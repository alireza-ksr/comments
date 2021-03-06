@extends('layouts.master')

@section('content')
{{--        {{dd(request()->method())}}--}}
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left m-3">
                <h2> مکین</h2>
            </div>
            <div class="pull-right d-flex m-2">
                <a class="btn btn-success" href="{{ route('post.create') }}"> پست جدید </a>
            </div>
        </div>
    </div>

    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>
                {{ $message }}
            </p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>شناسه</th>
            <th>عنوان</th>
            <th>نویسنده</th>
            <th>تاریخ انتشار</th>
            <th>کامنت</th>
            <th>عملیات</th>
        </tr>

        @foreach ($posts as $post)
            <ol>
                @foreach($post->comments as $comment)
{{--                    <li>{{$comment->body}}</li>--}}
                @endforeach
            </ol>
            <tr>
                <td>{{ $post['id'] }}</td>
                <td>{{ $post['title'] }}</td>
                <td>{{ $post['user_id'] }}</td>
                <td>{{ $post['started_at'] }}</td>
                <td>{{$comment->body}}</td>
                <td style="width: 300px">
                    <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('post.show', $post->id) }}">نمایش</a>
                        <a class="btn btn-primary" href="{{ route('post.edit', $post->id) }}">ویرایش</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">حذف</button>
                    </form>
                </td>
            </tr>

        @endforeach

    </table>

@endsection
