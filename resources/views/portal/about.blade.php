@extends('layouts.portal')

@section('title', '关于我们 · 波斯圈')

@section('content')
    <section class="hero small hero-compact">
        <div class="container">
            <h1>关于 {{ config('portal.brand') }}</h1>
            <p class="lead">{{ config('portal.about.intro') }}</p>
        </div>
    </section>

    <section class="section container">
        <div class="two-col">
            <div>
                <h2>我们的愿景</h2>
                <p>{{ config('portal.about.vision') }}</p>

                <h3>价值观</h3>
                <ul>
                    <li>可靠：工程质量与长期维护性</li>
                    <li>高效：敏捷交付与快速响应</li>
                    <li>合作：与客户共同成长</li>
                </ul>
            </div>

            <aside>
                <h3>团队与文化</h3>
                <p>{{ config('portal.about.team') }}</p>

                <div class="team-list">
                    <div class="team-item"><strong>产品</strong><span>产品经理 x2</span></div>
                    <div class="team-item"><strong>前端</strong><span>工程师 x3</span></div>
                    <div class="team-item"><strong>后端</strong><span>工程师 x2</span></div>
                    <div class="team-item"><strong>运维</strong><span>工程师 x1</span></div>
                </div>
            </aside>
        </div>
    </section>

    <section class="section container">
        <h3>发展历程</h3>
        <ol class="timeline">
            <li><strong>2018</strong> 团队成立，开始为中小企业提供建站服务</li>
            <li><strong>2020</strong> 扩展至后台系统与小程序开发</li>
            <li><strong>2023</strong> 引入标准化 CI/CD 与云部署模板</li>
        </ol>
    </section>
@endsection
