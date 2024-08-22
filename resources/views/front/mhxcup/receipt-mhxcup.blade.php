<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>MHX CUP MINI 4WD 2023</title>

    <!-- Favicon -->
    <link rel="icon" href="./images/favicon.png" type="image/x-icon" />

    <!-- Invoice styling -->
    <style>

        body {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            text-align: center;
            color: #777;
        }

        body h1 {
            font-weight: 300;
            margin-bottom: 0px;
            padding-bottom: 0px;
            color: #000;
        }

        body h3 {
            font-weight: 300;
            margin-top: 10px;
            margin-bottom: 20px;
            font-style: italic;
            color: #555;
        }

        body a {
            color: #06f;
        }

        .invoice-box {
            max-width: 600px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        .invoice-box ol.noted-printer {
            text-align:left;
            margin: 0 0 0;
            padding: 0 0 0 1.5rem;
        }

        .invoice-box ol.noted-printer li {
            margin-left: 0;
            padding-left: 0;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }
    </style>
</head>

<body>
<div class="invoice-box">
    <table>
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            <img src="{{ asset('assets/images/mini-4wd/mini-4wd-mhxcup@4x.png') }}" alt="Company logo" style="width: 100%; max-width: 300px" />
                        </td>
                        <td>
                            Invoice #: {{ $uniq }}<br />
                            Created: {{ date('d-m-Y', strtotime($create_date)) }}<br />
                            {{--Due: February 1, 2023--}}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            <strong>INFINITY PULSE SDN. BHD.</strong><br />
                            16-G, Jalan Seri Rejang 3, <br>
                            Rampai Business Park, South, <br>
                            Taman Sri Rampai, <br>
                            53300 Kuala Lumpur, <br>
                            Wilayah Persekutuan Kuala Lumpur
                        </td>
                        <td>
                            {{ $full_name }}<br />
                            {{ $identification_card_number }}<br />
                            {{ $group }}<br />
                            {{ $phone_number }}<br>
                            {{ $email }}<br>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        {{--<tr class="heading">
            <td>Payment Method</td>
            <td>Check #</td>
        </tr>
        <tr class="details">
            <td>Check</td>
            <td>1000</td>
        </tr>--}}
        <tr class="heading">
            <td>ITEMS DESCRIPTION</td>
            <td>Price</td>
        </tr>
        <tr class="item">
            <td>Register of <span style="text-transform: capitalize !important;">{{ $category }}</span> <br> <span style="font-weight: bold">( {{ $registration }} x RM{{ number_format($price_category, 2) }} )</span></td>
            <td>RM{{ number_format($total_cost, 2) }}</td>
        </tr>
        <tr class="item">
            <td>
                RACE ID <br>
                @foreach ($runNum as $key => $number)
                    <span style="text-transform: uppercase;">{{ $number->nickname }}{{ sprintf("%03s",$number->register) }}</span>@if (!$loop->last), @elseif ($key === count($runNum) - 1). @endif
                @endforeach
            </td>
            <td></td>
        </tr>
        @if(!is_null($runNum[0]->shirt_zie))
        <tr class="item">
            <td>
                T-SHIRT SIZE <br>
                @foreach ($runNum as $key => $number)
                    <span style="text-transform: uppercase;">{{ $number->shirt_zie }}</span>@if (!$loop->last), @elseif ($key === count($runNum) - 1). @endif
                @endforeach
            </td>
            <td></td>
        </tr>
        @endif
        <tr class="total">
            <td></td>
            <td>Total: RM{{ number_format($total_cost, 2) }}</td>
        </tr>
    </table>

    <h4 style="text-align: left; margin: 0 0 .8rem;">Notes:</h4>
    <ol class="noted-printer">
        <li>All payment made is non-refundable</li>
        <li>Registration are not exchangenable/swap</li>
        <li>Please bring this receipt to redeem your race card</li>
        <li>IC/Passport is a must for verification to redeem your race card</li>
        <li>Other terms & conditions applied</li>
    </ol>
</div>

</body>
</html>
