<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortalController extends Controller
{
    /**
     * Show the company portal homepage.
     */
    public function index()
    {
        return view('portal.home');
    }

    /**
     * About page
     */
    public function about()
    {
        return view('portal.about');
    }

    /**
     * Services page
     */
    public function services()
    {
        return view('portal.services');
    }

    /**
     * Contact page
     */
    public function contact()
    {
        return view('portal.contact');
    }

    /**
     * Case detail page
     */
    public function case($slug = null)
    {
        $cases = [
            ['title' => '智慧园区管理平台', 'desc' => '面向园区运营方的租赁、能耗、访客与设备管理一体化解决方案。', 'img' => 'https://images.unsplash.com/photo-1495435229349-e86db7bfa013?w=1200&q=60&auto=format&fit=crop'],
            ['title' => '企业一体化 CRM', 'desc' => '为中大型企业打造的客户关系管理与销售自动化平台，支持多渠道接入与报表分析。', 'img' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=1200&q=60&auto=format&fit=crop'],
            ['title' => '电商商家运营后台', 'desc' => '高并发下的订单、库存与促销管理后台，集成第三方支付与物流服务。', 'img' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=1200&q=60&auto=format&fit=crop'],
            ['title' => '流程自动化与审批 OA', 'desc' => '轻量级企业级 OA 与流程引擎，支持定制表单与移动端审批。', 'img' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=1200&q=60&auto=format&fit=crop'],
        ];
        // If no slug provided, show a simple cases index page
        if (is_null($slug)) {
            return view('portal.cases', ['cases' => $cases]);
        }

        foreach ($cases as $c) {
            if (Str::slug($c['title']) === $slug) {
                return view('portal.case', ['case' => $c]);
            }
        }

        abort(404);
    }
}
