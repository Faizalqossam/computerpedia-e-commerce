@extends('landingpage.index')
@section('content')
    <section class="bg-light">
        @if (count($carts)==0)
            <section class="container py-5">
                <div class="row text-center pt-5 pb-3">
                    <div class="col-lg-6 m-auto">
                        <h1 class="display-3 fw-bold mb-2">Your Cart is Empty!</h1>
                        <h5 class="fw-normal mt-3 mb-5">
                            Let's Start Shopping Now.
                        </h5>

                        <a class="btn btn-success" href="{{ url('/shop') }}">Shopping</a>
                    </div>
                </div>
            </section>
        @else
            <div class="container pb-5">
                <div class="row justify-content-center">
                    <div class="col-lg-7 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">My Cart</h3>

                                @foreach ($carts as $item)
                                    <div class="row mt-3">
                                        <div class="col-3 ms-3">
                                            <img src="{{ asset('/public/admin/img/') }}/{{ $item->photo }} "
                                                class="img-thumbnail">
                                        </div>
                                        <div class="col-7 mt-3 align-items-center">
                                            <p class="fw-bold">
                                                {{ $item->name }} <br>
                                                <span class="fw-normal">Rp. {{ number_format($item->total_price) }}</span> <br>
                                                <span class="fw-normal">{{ $item->order_quantity }} Item</span>

                                            </p>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <form method="POST" action=" {{ route('orders.destroyCart', $item->id) }}">
                                            @csrf
                                            @method('DELETE')

                                            <input type="hidden" class="delete_id" value={{ $item->id }}>

                                            <button class="btn btndelete">
                                                <i class="fa fa-fw fa-trash text-dark mr-1"></i> Remove from cart
                                            </button>
                                        </form>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <a class="btn btn-success" href="{{ route('orders.checkout',$item->id ) }}">Checkout</a>
                                    </div>
                                    <hr class="border border-success border-2 opacity-50 mb-3">
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.btndelete').click(function (e) {
            e.preventDefault();

            var deleteid = $(this).closest("form").find('.delete_id').val();
            console.log(deleteid);

            swal({
                    title: "Are You Sure?",
                    text: "After Removed, You can't restore this Item again!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        var data = {
                            "_token": $('input[name=_token]').val(),
                            'id': deleteid,
                        };
                        $.ajax({
                            type: "DELETE",
                            url: 'cart/destroy/' + deleteid,
                            data: data,
                            success: function (response) {
                                swal(response.status, {
                                        icon: "success",
                                    })
                                    .then((result) => {
                                        location.reload();
                                    });
                            }
                        });
                    }
                });
        });

    });

</script>

@endsection
