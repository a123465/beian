@extends('layouts.portal')

@section('title', '案例列表')

@section('content')
    <div class="container">
        <div class="section-head">
            <h2 class="section-title">全部案例</h2>
            <p class="section-sub">我们的一些项目示例，点击查看详情。</p>
        </div>

        <div class="cases-grid">
            @foreach($cases as $case)
                <article class="case-card">
                    <figure class="case-thumb">
                        <img src="{{ $case['img'] }}" alt="{{ $case['title'] }}" width="640" height="360"/>
                    </figure>
                    <div class="case-body">
                        <h4>{{ $case['title'] }}</h4>
                        <p>{{ $case['desc'] }}</p>
                        <a class="link" href="{{ route('cases.show', ['slug' => \Illuminate\Support\Str::slug($case['title'])]) }}">查看详情 →</a>
                    </div>
                </article>
            @endforeach
        </div>

    </div>
@endsection
