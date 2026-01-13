<?php

return [
    // 基础信息
    'company_name' => '深圳市波斯圈信息技术服务有限公司',
    'brand' => '波斯圈 · 深圳',

    // 颜色，可直接在布局中注入为 CSS 变量
    // 主色（现代蓝 -> 青绿色渐变）
    'accent' => '#0B5FD6',
    'accent2' => '#00C2A8',

    // 推荐字体（用于布局中引入 Google Fonts）
    'font' => 'Inter',

    // hero 内容
    'hero' => [
        'title' => '打造有温度的数字化产品',
        'lead' => '我们专注于企业网站、管理后台、小程序以及云端部署，帮助企业用技术提升业务效率与用户体验。',
        'cta_services' => '了解我们的服务',
        'cta_contact' => '联系销售',
    ],

    // hero 侧图：使用网络图片（示例来自 Unsplash，可替换为你自己的链接）
    'hero_image' => 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=1400&q=80&auto=format&fit=crop',

    // features 对应的小图（可选）
    'feature_images' => [
        'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=800&q=80&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1515879218367-8466d910aaa4?w=800&q=60&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=800&q=60&auto=format&fit=crop',
    ],

    // features（首页三列特性）
    'features' => [
        ['title' => '企业网站', 'desc' => '响应式设计与营销型页面，支持内容管理。'],
        ['title' => 'Web 应用', 'desc' => '可伸缩的后台系统，权限与流程定制。'],
        ['title' => '云与运维', 'desc' => '标准化 Docker 部署、CI/CD、监控告警。'],
    ],

    // 服务清单（服务页）
    'services' => [
        '企业官网开发',
        '后台与业务系统',
        '小程序与移动端',
        '云部署与运维',
        '技术顾问',
    ],

    // 联系信息
    'contact' => [
        'phone' => '+86 19168778773',
        'email_sales' => '19168778773@163.com',
        'email_support' => '19168778773@163.com',
        'address' => '广东省深圳市',
    ],

    // 关于页面（简短描述、愿景等）
    'about' => [
        'intro' => '深圳市波斯圈信息技术服务有限公司是一家专注于中小企业数字化转型的技术服务公司。我们提供从产品设计、开发到部署与运维的一站式服务。',
        'vision' => '通过可靠、可维护的工程实践帮助客户实现业务增长与数字化革新。',
        'team' => '我们小而精的团队由产品经理、前端/后端工程师、测试与运维组成，强调快速迭代与持续交付。',
    ],

    // 备案号（如果有，可在页脚显示）
    'icp' => '粤ICP备2025512979号-1',
];
