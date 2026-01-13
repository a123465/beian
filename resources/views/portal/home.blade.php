@extends('layouts.portal')

@section('title', '首页 · 深圳市波斯圈')

@section('content')
    {{-- Top notification bar (like szzghl.cn) --}}
    <div class="top-bar">
        <div class="container top-bar-inner">
            <div class="notice">欢迎访问 {{ config('portal.company_name') }} — 专注企业数字化解决方案</div>
            <div class="actions"><a class="link" href="{{ route('contact') }}">立即咨询</a></div>
        </div>
    </div>

    {{-- Hero 区域（仿 demo 精简版） --}}
    <section class="hero hero-extended demo-style">
        <div class="hero-inner container">
            <div class="hero-left">
                <h1>{{ config('portal.hero.title') }}</h1>
                <p class="lead">{{ config('portal.hero.lead') }}</p>

                <p class="hero-ctas">
                    <a class="btn primary large" href="{{ route('services') }}">{{ config('portal.hero.cta_services') }}</a>
                    <a class="btn ghost" href="{{ route('contact') }}">{{ config('portal.hero.cta_contact') }}</a>
                </p>

                <ul class="hero-highlights">
                    <li>行业经验丰富的交付团队</li>
                    <li>需求到上线的一站式服务</li>
                    <li>企业级质量与可维护性</li>
                </ul>

                <div class="trust-row">
                    <div class="trust-item">交付 <strong>100+</strong></div>
                    <div class="trust-item">满意度 <strong>98%</strong></div>
                    <div class="trust-item">响应 <strong>2 小时</strong></div>
                </div>
            </div>

            <div class="hero-right">
                @php $heroImg = config('portal.hero_image'); @endphp
                @if($heroImg)
                <div class="hero-visual"><img src="{{ $heroImg }}" alt="{{ config('portal.company_name') }}" width="390" height="299"/></div>
                            @else
                    <div class="hero-visual svg-fallback">
                        <svg viewBox="0 0 600 360" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient id="g1" x1="0%" x2="100%" y1="0%" y2="100%">
                                    <stop offset="0%" stop-color="var(--accent)" stop-opacity="1" />
                                    <stop offset="100%" stop-color="var(--accent-2)" stop-opacity="1" />
                                </linearGradient>
                            </defs>
                            <rect width="100%" height="100%" fill="#fbfdff"/>
                            <path d="M0 140 C140 40, 300 240, 600 100 L600 360 L0 360 Z" fill="url(#g1)" opacity="0.95" />
                        </svg>
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- Services / Features 区域（改为卡片式，更接近 demo） --}}
    <section class="section services container" id="services">
        <div class="section-head">
            <h2 class="section-title">我们的能力</h2>
            <p class="section-sub">从产品咨询到交付，我们提供端到端解决方案，覆盖设计、开发与运维。</p>
        </div>

        <div class="services-grid cards">
            @php $fimgs = config('portal.feature_images', []); @endphp
            @foreach(config('portal.features', []) as $i => $feat)
                @php $img = $fimgs[$i] ?? null; @endphp
                <article class="card service-card">
                    <div class="card-body">
                        <div class="thumb card-media">
                            @if($img)
                                <img src="{{ $img }}" alt="{{ $feat['title'] }}" width="320" height="160"/>
                            @else
                                <div class="icon-placeholder">{{ mb_substr($feat['title'],0,1) }}</div>
                            @endif
                        </div>
                        <h3>{{ $feat['title'] }}</h3>
                        <p>{{ $feat['desc'] }}</p>
                        <p class="muted"><a class="link" href="{{ route('services') }}#{{ \Illuminate\Support\Str::slug($feat['title']) }}">了解更多 →</a></p>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    {{-- Cases / Projects（仿 demo 的展示） --}}
    <section class="section cases container">
        <div class="section-head">
            <h2 class="section-title">精选案例</h2>
            <p class="section-sub">我们帮助不同行业的客户完成产品落地与优化。</p>
        </div>

        <div class="cases-grid">
                @php
                $cases = [
                    ['title' => '智慧园区管理平台', 'desc' => '面向园区运营方的租赁、能耗、访客与设备管理一体化解决方案。', 'img' => 'https://images.unsplash.com/photo-1495435229349-e86db7bfa013?w=1200&q=60&auto=format&fit=crop'],
                    ['title' => '企业一体化 CRM', 'desc' => '为中大型企业打造的客户关系管理与销售自动化平台，支持多渠道接入与报表分析。', 'img' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=1200&q=60&auto=format&fit=crop'],
                    ['title' => '电商商家运营后台', 'desc' => '高并发下的订单、库存与促销管理后台，集成第三方支付与物流服务。', 'img' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=1200&q=60&auto=format&fit=crop'],
                    ['title' => '流程自动化与审批 OA', 'desc' => '轻量级企业级 OA 与流程引擎，支持定制表单与移动端审批。', 'img' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=1200&q=60&auto=format&fit=crop'],
                ];
            @endphp

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
    </section>

    {{-- Partners / Logos --}}
    <section class="section partners">
        <div class="container">
            <h3>合作伙伴</h3>
            @php
                $partners = [
                    ['name' => '华为云'],
                    ['name' => '阿里云'],
                    ['name' => '腾讯云'],
                ];
            @endphp

            <div class="partners-row">
                @foreach($partners as $index => $p)
                    <div class="partner"><img src="{{ asset('images/partner'.($index+1).'.svg') }}" alt="{{ $p['name'] }}" width="120" height="60"/></div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 联系 CTA --}}
    <section class="section contact-cta">
        <div class="container contact-cta-inner">
            <div>
                <h3>想了解更多？</h3>
                <p>联系我们获取免费方案评估与报价。</p>
            </div>
            <div>
                <a class="btn primary large" href="{{ route('contact') }}">立即咨询</a>
            </div>
        </div>
    </section>

@endsection
