@extends('layouts.frontend.master')
@section('title')
    Checkout-Brator
@endsection
@section('css')
    <style>
        .required {
            color: red;
            font-weight: bold;
        }
    </style>
@endsection
@section('content')
    <!-- bread start-->
    <div class="brator-breadcrumb-area">
        <div class="container-xxxl container-xxl container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brator-breadcrumb">
                        <ul>
                            <li><a href="#_">Home</a></li>
                            <li class="active-link">Check Out</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bread end-->
    <div class="brator-cart-header-area">
        <div class="container-xxxl container-xxl container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Billing details</h2>
                </div>
            </div>
        </div>
    </div>

    @if (session('customerId'))
        <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        @else
            <form action="{{ route('customer/login') }}" method="get">
    @endif


    <input type="hidden" name="product_id" value="{{ $product->id }}" required>
    <input type="hidden" name="customer_id" value=" {{ session('customerId') }} ">
    <input type="hidden" name="quantity" value="{{ $items }}"required>
    @if ($discount > 0)
        <input type="hidden" name="coupon_code" value="{{ $coupon_code }}"required>
    @else
        <input type="hidden" id="coupon-code" name="coupon_code" value=""required>
    @endif

    <div class="brator-cart-area">
        <div class="container-xxxl container-xxl container">
            <div class="row">

                <div class="col-xl-8 col-lg-12">
                    <div class="brator-cart-info">
                        <div class="brator-contact-form-fields blog-post-comment-box-area">

                            <div class="brator-contact-form-field-two-items">
                                <div class="brator-contact-form-field">
                                    <label>First Name<span class="required">*</span></label>
                                    <input type="text" name="frist_name" placeholder="First Name"
                                        value="{{ old('frist_name') ?? ($customer->first_name ?? '') }}" required>
                                </div>
                                <div class="brator-contact-form-field">
                                    <label for="last_name">Last Name <span class="required">*</span></label>
                                    <input type="text" name="last_name" placeholder="Last Name"
                                        value="{{ old('last_name') ?? ($customer->last_name ?? '') }}" required>
                                </div>
                            </div>
                            <div class="brator-contact-form-field-two-items">
                                <div class="brator-contact-form-field">
                                    <label>Company name (optional)</label>
                                    <input type="text" name="company_name"
                                        value="{{ old('company_name') ?? ($customer->company_name ?? '') }}"
                                        placeholder="Company name">
                                </div>
                                <div class="brator-contact-form-field">
                                    <label>Order notes (optional)</label>
                                    <textarea name="note" placeholder="Notes about your order">{{ old('note') ?? ($customer->note ?? '') }}</textarea>
                                </div>
                            </div>
                            <div class="brator-contact-form-field-two-items">
                                <div class="brator-contact-form-field">
                                    <label>Country / Region<span class="required">*</span></label>
                                    <input type="text" name="country"
                                        value="{{ old('country') ?? ($customer->country ?? '') }}"
                                        placeholder="Country / Region" required>
                                </div>

                                <div class="brator-contact-form-field">

                                </div>
                            </div>
                            <div class="brator-contact-form-field-two-items">
                                <div class="brator-contact-form-field">
                                    <label>Street address<span class="required">*</span></label>
                                    <input type="text" name="address"
                                        value="{{ old('address') ?? ($customer->address ?? '') }}"
                                        placeholder="House No. and Street Name" required>
                                    <input type="text" name="unit_address"
                                        value="{{ old('unit_address') ?? ($customer->unit_address ?? '') }}"
                                        placeholder="Apartment,Suite,Unit etc(optional)" required>
                                </div>
                                <div class="brator-contact-form-field">

                                </div>
                            </div>

                            <div class="brator-contact-form-field-two-items">
                                <div class="brator-contact-form-field">
                                    <label>Suburb<span class="required">*</span></label>
                                    <input type="text" name="suburb"
                                        value="{{ old('suburb') ?? ($customer->suburb ?? '') }}" placeholder="Suburb"
                                        required>
                                </div>
                                <div class="brator-contact-form-field">

                                </div>
                            </div>
                            <div class="brator-contact-form-field-two-items">
                                <div class="brator-contact-form-field">
                                    <label>State<span class="required">*</span></label>
                                    <input type="text" name="state"
                                        value="{{ old('state') ?? ($customer->state ?? '') }}" placeholder="State"
                                        required>
                                </div>
                                <div class="brator-contact-form-field">

                                </div>
                            </div>
                            <div class="brator-contact-form-field-two-items">
                                <div class="brator-contact-form-field">
                                    <label>Postcode<span class="required">*</span></label>
                                    <input type="number" name="postcode"
                                        value="{{ old('postcode') ?? ($customer->postcode ?? '') }}"
                                        placeholder="Postcode" required>
                                </div>
                                <div class="brator-contact-form-field">

                                </div>
                            </div>
                            <div class="brator-contact-form-field-two-items">
                                <div class="brator-contact-form-field">
                                    <label>Phone<span class="required">*</span></label>
                                    <input type="text" name="phone_number"
                                        value="{{ old('phone_number') ?? ($customer->phone_number ?? '') }}"
                                        placeholder="Phone" required>
                                </div>
                                <div class="brator-contact-form-field">

                                </div>
                            </div>
                            <div class="brator-contact-form-field-two-items">
                                <div class="brator-contact-form-field">
                                    <label>Email address<span class="required">*</span></label>
                                    <input type="email" name="mail"
                                        value="{{ old('mail') ?? ($customer->mail ?? '') }}" placeholder="Email address"
                                        required>
                                </div>
                                <div class="brator-contact-form-field">

                                </div>
                            </div>
                        </div>
                        <div class="brator-cart-checkout">
                            <div class="brator-cart-checkout-left">
                                <div class="brator-cart-checkout-fields">
                                    @if ($discount)
                                    @else
                                        <input style="display: inline;" type="text" id="coupon-value"name="coupons"
                                            placeholder="Enter Coupon Code" value="" />
                                        <button style="display: inline;" id="coupon-button">Apply Coupon</button>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-7 col-12">
                    <div class="cart-total-area" style="background-image:url(./assets/images/cat-bg.png)">
                        <div class="cart-total-header">
                            <h2>Your order</h2>
                        </div>

                        <div class="cart-total-cost">
                            <div class="cart-total-before-dis item-ditels-cart-total">
                                <p>{{ $product->name }} <strong>×&nbsp;{{ $items }}</strong> </p>
                                <span>${{ $product->sale_price * $items }}</span>
                            </div>
                            <div class="cart-total-dis item-ditels-cart-total">
                                <p id="discount-p">Discount</p>
                                @if ($discount)
                                    <span id="discount">-${{ $discount }}</span>
                                @else
                                    <span id="discount">-$0</span>
                                @endif
                            </div>
                            <div class="cart-total-subtotal item-ditels-cart-total">
                                <p>Subtotal</p><span
                                    id="subtotal">${{ $product->sale_price * $items - $discount }}</span>
                            </div>
                            <div class="cart-total-subtotal item-ditels-cart-total">
                                <p>Tax</p><span id="tax">{{ $product->tax }}% =
                                    ${{ $product->sale_price * $items * ($product->tax / 100) }}</span>
                            </div>
                        </div>
                        @php
                            $total_price = ($product->sale_price + $product->sale_price * ($product->tax / 100)) * $items - $discount;
                        @endphp
                        <div class="cart-total-amount">
                            <p><strong>Total</strong></p>
                            <span><strong id="total">${{ $total_price }}</strong></span>
                            <input type="hidden" name="total_price" value="{{ $total_price }}">
                        </div>

                        <div class="cart-total-process">
                            <h6>Payment Method</h6>
                        </div>
                        <div class="cart-total-shiping">
                            <select name="payment_method">
                                <option value="bank_transfer" disabled>Direct bank transfer</option>
                                <option value="check_payments" disabled>Check payments</option>
                                <option value="cash_on_delivery">Cash on delivery </option>
                            </select>
                        </div>
                        <div class="cart-total-process">
                            <button>Place Order</button>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    </form>
@endsection

@section('js')
    <script>
        $(document).ready(function() {

            var submitButton = document.getElementById("coupon-button");
            // var submitButton = document.querySelector("#myForm button[type=submit]");
            var myDropzone = this;
            var productId = @json($product->id);
            var product = @json($product);
            var items = @json($items);
            subtotal = product.sale_price * items;
            // console.log(subtotal);

            submitButton.addEventListener("click", function(e) {
                var submitValue = document.getElementById("coupon-value");
                e.preventDefault();
                e.stopPropagation();
                const buttonValue = submitValue.value;
                // console.log(buttonValue);
                $.ajax({
                    url: "{{ route('discount.validate') }}",
                    method: 'GET',
                    data: {
                        discount_code: buttonValue,
                        discount_product: productId,
                        subtotal: subtotal,
                        items: items,
                    },
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}" // Include the CSRF token in the headers
                    },
                    success: function(data) {
                        // console.log(data);
                        if (data == 'not_valid' || data.length == 0) {
                            setTimeout(function() {
                                alert("Coupon Not Valid!");
                            }, 500);
                        } else {
                            subtotal = subtotal - data;
                            const taxAmount = (subtotal * (product.tax / 100));
                            if (product.tax != null) {
                                document.getElementById("tax").innerHTML =
                                    `$${taxAmount.toFixed(2)}`;
                                document.getElementById("total").innerHTML =
                                    `$${subtotal + taxAmount}`;
                            } else {
                                document.getElementById("total").innerHTML = `-$${subtotal}`;
                            }
                            document.getElementById("subtotal").innerHTML = `$${subtotal}`;
                            document.getElementById("discount").innerHTML = `-$${data}`;
                            document.getElementById("discount-p").innerHTML =
                                `Discount(${buttonValue})`;

                            document.getElementById("coupon-code").value = buttonValue;

                            submitButton.style.display = 'none';
                            submitValue.style.display = 'none';
                            window.scrollTo({
                                top: 400,
                                behavior: 'smooth',
                            })
                            setTimeout(function() {
                                alert("Coupon Added Successfully");
                            }, 500);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endsection
