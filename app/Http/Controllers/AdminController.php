<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    function index()
    {
        if (Auth::user()) {
            return redirect(route('admin.dashboard'));
        } else {
            return redirect(route('home.login'));
        }
    }
    function dashboard()
    {
        // Doanh thu trong ngày hôm nay
        $revenue_today = DB::table('orders')->where('created_at', '>=', Carbon::today())->sum('total');
        // Doanh thu tổng
        $total_revenue = DB::table('orders')->sum('total');
        // Sản phẩm bán chạy
        $best_selling = DB::table('products')
            ->join('order_details', 'products.id', '=', 'order_details.product_id')
            ->selectRaw('products.name,products.created_at,products.image,products.price,products.stock, sum(order_details.quantity) as sold')
            ->groupBy('order_details.product_id')
            ->orderByDesc('sold')
            ->paginate(5);

        // Đơn hàng gần đây
        $recent_orders = Order::orderByDesc('id')->take(5)->get();

        $total_users = count(User::where('is_customer', 1)->get());
        $total_customers = count(User::where('is_customer', 0)->get());
        $total_products = count(Product::all());

        // Tạo ra mảng chứa tên các tháng
        $monthNames = [
            1 => 'Tháng Một',
            2 => 'Tháng Hai',
            3 => 'Tháng Ba',
            4 => 'Tháng Tư',
            5 => 'Tháng Năm',
            6 => 'Tháng Sáu',
            7 => 'Tháng Bảy',
            8 => 'Tháng Tám',
            9 => 'Tháng Chín',
            10 => 'Tháng Mười',
            11 => 'Tháng Mười Một',
            12 => 'Tháng Mười Hai',
        ];
        // Câu truy vấn lấy ra tổng doanh thu các tháng
        $revenueByMonth = Order::selectRaw('MONTH(created_at) as month, SUM(total) as total_revenue')
            ->groupBy('month')
            ->get();

        $labels = [];
        $revenueData = [];

        foreach ($revenueByMonth as $item) {
            // Ghi đè các tháng hiện có bằng tháng trong câu truy vấn
            $month = $monthNames[$item->month];
            $labels[] = $month;
            $revenueData[] = $item->total_revenue;
        }

        return view('admin.dashboard', compact([
            'best_selling',
            'revenue_today',
            'total_revenue',
            'total_users',
            'total_products',
            'total_customers',
            'recent_orders',
            'labels',
            'revenueData'
        ]));
    }
    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerateToken();
        return redirect()->route('home.login');
    }
}