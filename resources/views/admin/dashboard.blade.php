<x-admin title="Dashboard">
    <div class="row">
        <div class="col-6">
            <div class="row">
                <canvas id="myChart"></canvas>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Sản phẩm bán chạy nhất</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table table-hover table-centered align-middle table-nowrap mb-0">
                                    <tbody>
                                        @foreach ($best_selling->take(5) as $item)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-sm bg-light rounded p-1 me-2">
                                                            <img src="/storage/products/{{ $item->image }}"
                                                                alt="" class="img-fluid d-block">
                                                        </div>
                                                        <div>
                                                            <h5 class="fs-14 my-1"><a
                                                                    href="apps-ecommerce-product-details.html"
                                                                    class="text-reset">{{ $item->name }}</a></h5>
                                                            <span class="text-muted">{{ $item->created_at }}1</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 my-1 fw-normal">
                                                        {{ $cart->format_price($item->price) }}
                                                        <sup>đ</sup>
                                                    </h5>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 my-1 fw-normal">{{ $item->sold }}</h5>
                                                    <span class="text-muted">Đã bán</span>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 my-1 fw-normal">{{ $item->stock }}</h5>
                                                    <span class="text-muted">Tồn kho</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="align-items-center mt-4 pt-2 justify-content-between d-flex">
                                <div class="flex-shrink-0">
                                    <div class="text-muted">
                                        Hiển thị {{ $best_selling->count() }} của {{ $best_selling->total() }} kết quả
                                    </div>
                                </div>
                                <div>
                                    {{ $best_selling->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-4">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">Nhân viên</p>
                                    <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                            data-target="{{ $total_users }}">{{ $total_users }}</span></h2>
                                    <a href="{{ route('admin.user') }}?is_customer=1">Chi tiết
                                        <i class="ri-arrow-right-line"></i>
                                    </a>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-dark rounded-circle fs-2">
                                            <i class="las la-user-shield"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div>
                <div class="col-4">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">Khách hàng</p>
                                    <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                            data-target="{{ $total_customers }}">{{ $total_customers }}</span></h2>
                                    <a href="{{ route('admin.user') }}?is_customer=0">Chi tiết
                                        <i class="ri-arrow-right-line"></i>
                                    </a>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-warning rounded-circle fs-2">
                                            <i class="las la-user"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div>
                <div class="col-4">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">Sản phẩm</p>
                                    <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                            data-target="{{ $total_products }}">{{ $total_products }}</span></h2>
                                    <a href="{{ route('admin.product') }}">Chi tiết
                                        <i class="ri-arrow-right-line"></i>
                                    </a>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-success rounded-circle fs-2">
                                            <i class="las la-shopping-bag"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-light text-primary rounded-circle shadow fs-3">
                                        <i class="ri-money-dollar-circle-fill align-middle"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">
                                        Tổng doanh thu</p>
                                    <h4 class=" mb-0"><span class="counter-value"
                                            data-target="{{ $total_revenue }}"></span> <sup>đ</sup></h4>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-light text-primary rounded-circle shadow fs-3">
                                        <i class="ri-money-dollar-circle-fill align-middle"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">
                                        Doanh thu hôm nay</p>
                                    <h4 class=" mb-0"><span class="counter-value"
                                            data-target="{{ $revenue_today }}"></span> <sup>đ</sup></h4>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Đơn hàng gẩn đây</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                    <thead class="text-muted table-light">
                                        <tr>
                                            <th scope="col">Order ID</th>
                                            <th scope="col">Khách hàng</th>
                                            <th scope="col">Địa chỉ</th>
                                            <th scope="col">Tổng tiền</th>
                                            <th scope="col">Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($recent_orders) > 0)
                                            @foreach ($recent_orders as $item)
                                                <tr>
                                                    <td>
                                                        <a href="apps-ecommerce-order-details.html"
                                                            class="fw-medium link-primary">{{ $item->id }}</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-2">
                                                                <img src="/storage/avatars/{{ $item->user->avatar }}"
                                                                    alt=""
                                                                    class="avatar-xs rounded-circle shadow">
                                                            </div>
                                                            <div>{{ $item->name }}</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>{{ $item->address }}</div>
                                                    </td>
                                                    <td>
                                                        <div>{{ $cart->format_price($item->total) }} đ</div>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badg badge-soft-success">{{ $item->status->name }}</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('script')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const data = {
                labels: @json($labels),
                datasets: [{
                    label: 'Doanh thu các tháng',
                    data: @json($revenueData),
                    backgroundColor: 'rgb(54, 162, 235)',
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            new Chart(
                document.getElementById('myChart'),
                config
            );
        </script>
    @endsection
</x-admin>
