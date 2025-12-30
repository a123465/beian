@extends('layouts.portal')

@section('title', '服务 · 波斯圈')

@section('content')
    <section class="hero small hero-compact">
        <div class="container">
            <h1>我们的服务</h1>
            <p class="lead">面向企业的产品与技术服务，覆盖从咨询到交付的全阶段。</p>
        </div>
    </section>

    <section class="section container services-list">
        <div class="cards">
            @foreach(config('portal.services', []) as $s)
                <article class="card service">
                    <div class="card-body">
                        <h3>{{ $s }}</h3>
                        <p>根据客户实际业务定制解决方案与实施计划。</p>
                        <p class="muted">适用行业广泛 · 可扩展 · 可维护</p>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section class="section container">
        <h3>合作流程</h3>
        <ol class="steps">
            <li>需求沟通 → 评估与报价</li>
            <li>签约与设计阶段</li>
            <li>开发与交付测试</li>
            <li>部署与运维交付</li>
        </ol>
    </section>
@endsection
