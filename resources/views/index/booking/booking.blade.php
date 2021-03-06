<?php
/**
 * Created by PhpStorm.
 * User: Loc Nguyen
 * Date: 10/9/2018 9:42 PM
 */
?><!DOCTYPE html>
<html>
<head>
    <title>Movie Ticket Booking Widget Flat Responsive Widget Template :: w3layouts</title>
    <base href="{{asset('')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- for-mobile-apps -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords"
          content="Movie Ticket Booking Widget Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <!-- //for-mobile-apps -->
    <!--<link href='//fonts.googleapis.com/css?family=Kotta+One' rel='stylesheet' type='text/css'>-->
    <!--<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>-->
    <link href="asset/index/css/style.css" rel="stylesheet" type="text/css" media="all"/>

    <style>
        @foreach($type_seats as $detail)
        @if ($detail->show_status == 1)
            div.seatCharts-seat.available.{{$detail->slug_name}}  {
            background-color: {{$detail->color}};
        }

        @else
            div.seatCharts-seat.{{$detail->slug_name}}  {
            background-color: {{$detail->color}};
        }

        @endif
    @endforeach
 /*div.seatCharts-seat. {*/
        /*background-color: #761c19;*/
        /*}*/
    </style>

    <script src="asset/index/js/jquery-1.11.0.min.js"></script>
    <script src="asset/index/js/jquery.seat-charts.js"></script>
</head>
<body>
<div class="content">
    {{--<h1>Movie Ticket Booking Widget</h1>--}}
    <div class="main" id="booking">
        <h1>{{$plan_cinema->movie->name}}</h1>
        <div class="demo">
            <div id="seat-map">
                <div class="front" style="width: {{count(explode(",",$view_room->col))*29+6*(count(explode(",",$view_room->col))-1) }}px;">SCREEN</div>
            </div>
            <div class="booking-details">
                {{--<ul class="book-left">--}}
                {{--<li>Movie </li>--}}
                {{--<li>Time </li>--}}
                {{--<li>Tickets</li>--}}
                {{--<li>Total</li>--}}
                {{--<li>Seats :</li>--}}
                {{--</ul>--}}
                {{--<ul class="book-right">--}}
                {{--<li>: {{$plan_cinema->movie->duration}} phút</li>--}}
                {{--<li>: {{date_format(date_create($plan_cinema->show_date),"D d m")}}, {{date_format(date_create($plan_cinema->time_begin),"H:i")}}</li>--}}
                {{--<li>: <span id="counter">0</span></li>--}}
                {{--<li>: <b><i>$</i><span id="total">0</span></b></li>--}}
                {{--</ul>--}}
                <div class="clear"></div>

                {{--<button class="checkout-button" onclick="booking_ticket()">Book Now</button>--}}
                {{--<button class="checkout-button" onclick="next()">Next</button>--}}
                {{--<div id="legend"></div>--}}
                <div style="text-align: center">Ghế đã chọn</div>
                <ul id="selected-seats" class="scrollbar scrollbar1"></ul>
            </div>
            <div style="clear:both"></div>
            <div id="legend">
            </div>
        </div>
    </div>

    <div class="main" id="product">
        <h2>{{$plan_cinema->movie->name}}</h2>
        <div class="demo">
            {{--<h4>Xin chào mấy mem</h4>--}}
            @foreach($products as $detail)
            <div class="item">
                <div class="block-left">
                    <div class="image">
                        <img src="images/products/{{$detail->image}}" alt="" width="150px"/>
                    </div>
                </div>
                <div class="block-right">
                    <div class="description">
                        <span>{{$detail->name}}</span>
                        <span>{{$detail->description}}</span>
                    </div>
                    <div class="quantity">
                        <button class="minus-btn buttondau" type="button" name="minus">
                            <img src="asset/index/images/minus.svg" alt=""/>
                        </button>
                        <input type="text" name="product" data-price="{{$detail->price}}" data-id="{{$detail->id}}" value="0">
                        <button class="plus-btn buttondau" type="button" name="plus">
                            <img src="asset/index/images/plus.svg" alt=""/>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
            <div style="clear:both"></div>
        </div>
    </div>
    <div class="main info-booking" id="kodoi">
        {{--<h2>{{$plan_cinema->movie->name}}</h2>--}}
        <div class="demo">
            <input type="hidden" name="tabs" value="1">
            <div class="previous" style="float: left; width: 100px">
                <button class="btn-previous" onclick="previous()"><img src="asset/index/images/previous.png">Previous
                </button>
            </div>
            <div class="img"><img src="{{$plan_cinema->movie->image}}" width="100px">
            </div>
            <div class="info-movie">
                <ul class="book-left">
                    <li>Rạp chiếu</li>
                    <li>Ngày chiếu</li>
                    <li>Suất chiếu</li>
                    <li>Thời lượng</li>
                    <li>Phòng chiếu</li>
                </ul>
                <ul class="book-right">
                    <li>{{\App\SP::getInfoCinemaByRoom($plan_cinema->room_id)[0]->name}}</li>
                    <li>{{date_format(date_create($plan_cinema->movie->show_date),"d/m/Y")}}</li>
                    <li>{{date_format(date_create($plan_cinema->movie->time_begin),"H:i")}}</li>
                    <li>{{$plan_cinema->movie->duration}} phút</li>
                    <li>{{$plan_cinema->room->name}}</li>
                </ul>
            </div>
            <div class="info-invoice">
                <div class="price-ticket">Phim <span>0 VND</span></div>
                <div class="price-product">Combo <span>0 VNĐ</span></div>
                <div class="total">Tổng <span>0 VNĐ</span></div>

            </div>
            <div class="next" style="float:right; width: 100px; text-align: right;">
                <button class="btn-next" onclick="next()" style="float: right"><img src="asset/index/images/next.png">Next
                </button>
                <form action="{{route("index.payment.post")}}" method="post">
                    {{@csrf_field()}}
                    <input hidden value="" name="booking_seats">
                    <input hidden value="{{$plan_cinema->id}}" name="plan_cinema">
                    <input hidden value="{{$plan_cinema->room_id}}" name="room_id">
                    <input type="hidden" value="0" name="input_price_ticket">
                    <input type="hidden" value="0" name="input_price_product">
                    <input type="hidden" name="list_product">
                    <button class="btn-booking" type="submit" style="float: right"><img
                                src="asset/index/images/booking.png">Book
                    </button>
                </form>
                {{--<button class="btn-booking" onclick="booking_ticket()" style="float: right"><img--}}
                            {{--src="asset/index/images/booking.png">Book--}}
                {{--</button>--}}
            </div>
            {{--<button class="checkout-button" onclick="updatePrice()">mua</button>--}}
            <div style="clear:both"></div>
        </div>
    </div>
    {{--<p class="copy_rights">&copy; 2016 Movie Ticket Booking Widget. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank"> W3layouts</a></p>--}}
</div>
<script type="text/javascript">
    var price_in = '<?php echo $plan_cinema->price_ticket ?>'; //price
    var price = parseInt(price_in); //price
    $(document).ready(function () {

        controlButton();
//        $("#booking").hide();
        $("#product").hide();

        var $cart = $('#selected-seats'), //Sitting Area
            $counter = $('#counter'), //Votes
            $total = $('.info-invoice .price-ticket span'); //Total money
        var $booking_seats = $("input[name='booking_seats']");

        var sc = $('#seat-map').seatCharts({
            map: [
                @foreach (explode(",",$view_room->view) as $i => $detail)
                    '{{ $detail }}',
                @endforeach
                {{--                {!! $plan_cinema->room->view !!}--}}
            ],
            seats: { //Definition seat property
                @foreach($type_seats as $detail)
                @if ($detail->show_status == 1)
                {!! $detail->symbol .": { price : " . $detail->price . ", classes : '" . $detail->slug_name . "', category : '" . $detail->name . "' }, " !!}
                @endif
                @endforeach
            },
            naming: {
                top: false,
                left: false,
                columns: [
//                    '1', '2','', '3', '4'
                    @foreach (explode(",",$view_room->col) as $i => $detail)
                        '{!! $detail !!}',
                    @endforeach
                ],
                rows: [
//                    'A','B','C','D'
                    @foreach (explode(",",$view_room->row) as $i => $detail)
                        '{!! $detail !!}',
                    @endforeach
                ],
                getLabel: function (character, row, column) {
                    return row + column;
                }
            },
            legend: { //Definition legend
                node: $('#legend'),
                items: [
//                            [ 'f', 'available',   '1st' ],
//                            [ 'e', 'available',   '2nd'],
                    @foreach($type_seats as $detail)
                    {!! "['". $detail->symbol . "', '" . ($detail->show_status == 1 ? "available" : $detail->slug_name) . "', '" . $detail->name  ."'], " !!}
                    @endforeach
                ]
            },
            click: function () { //Click event
                if (this.status() == 'available') { //optional seat
                    $('<li>' + ' Seat ' + this.settings.label + '</li>')
                    //                    $('<li>Row'+(this.settings.row+1)+' Seat'+this.settings.label+'</li>')
                    //                            $('<li>Row'+(String.fromCharCode(this.settings.row+1+64))+' Seat'+this.settings.label+'</li>')
                        .attr('id', 'cart-item-' + this.settings.id)
                        .data('seatId', this.settings.id)
                        .appendTo($cart);

//								reSetBookingTicket(this.settings.label);
                    $booking_seats.val(reSetBookingTicket(sc) + this.settings.label + ",");
                    console.log(reSetBookingTicket(sc) + this.settings.label + ",");
                    $counter.text(sc.find('selected').length + 1);
                    $total.text((recalculateTotal(sc) + this.data().price) + " VND");
                    $("input[name='input_price_ticket']").val((recalculateTotal(sc) + this.data().price));
                    updateTotal();
                    return 'selected';
                } else if (this.status() == 'selected') { //Checked
                    //Update Number
                    $counter.text(sc.find('selected').length - 1);
                    //update totalnum
                    $total.text((recalculateTotal(sc) - this.data().price) + " VND");
                    $("input[name='input_price_ticket']").val((recalculateTotal(sc) - this.data().price));
                    console.log(reSetBookingTicket(sc).replace(this.settings.label + ",", ""));
                    $booking_seats.val(reSetBookingTicket(sc).replace(this.settings.label + ",", ""));
                    //Delete reservation
                    $('#cart-item-' + this.settings.id).remove();
                    //optional
                    updateTotal();
                    return 'available';
                } else if (this.status() == 'unavailable') { //sold
                    return 'unavailable';
                } else {
                    return this.style();
                }
            }
        });
        //sold seat
        sc.get([
            @foreach($tickets as $detail)
            {!! "'".$detail->row_name."_".$detail->col_name."'," !!}
            @endforeach
            //                    'A_2', '4_4','4_5','6_6','6_7','8_5','8_6','8_7','8_8', '10_1', '10_2'
        ]).status('unavailable');

        {{--setInterval(function () {--}}
            {{--$.ajax({--}}
                {{--type: 'get',--}}
                {{--url: '{{route("getdatcho",['id' => $plan_cinema->id])}}',--}}
                {{--dataType: 'json',--}}
                {{--success: function (response) {--}}
                    {{--//iterate through all bookings for our event--}}
                    {{--$.each(response, function (index, booking) {--}}
                        {{--//find seat by id and set its status to unavailable--}}
                        {{--sc.status(booking, 'unavailable');--}}
{{--//                    console.log(booking)--}}
                    {{--});--}}
                {{--}--}}
            {{--});--}}
        {{--}, 10000); //every 10 seconds--}}

    });

    function booking_ticket() {
        var seats = $("input[name='booking_seats']").val();
        if (seats == "") {
            alert("Not choose seat");
            return;
        }
        var total1 = $("input[name='input_price_ticket']").val();
        var total2 = $("input[name='input_price_product']").val();
        var plan_id = $("input[name='plan_cinema']").val();
        var room_id = $("input[name='room_id']").val();
        var products = $("input[name='list-product']").val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.post("{{route("savebooking")}}", {
            _token: CSRF_TOKEN,
            seats: seats,
            price_ticket: total1,
            price_product: total2,
//            total: total1+total2,
            plan_id: plan_id,
            room_id: room_id,
            products: products
        }, function (data) {
//                        $("#projector").html(data);
            console.log(data);
//                        loadPlan();
        })
    }
</script>

<script src="asset/index/js/booking-script.js"></script>
<script src="asset/index/js/jquery.nicescroll.js"></script>
<script src="asset/index/js/scripts.js"></script>
</body>
</html>
