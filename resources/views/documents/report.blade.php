<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
</head>

<body>
    <table class="w-full">
        <tr>
            <td class="w-half">
                <h2>Invoice ID: 834847473</h2>
            </td>
        </tr>
    </table>

    <div class="margin-top">
        <table class="w-full">
            <tr>
                <td class="w-half">
                    <div>
                        <h4>To:</h4>
                    </div>
                    <div>{{$report->tenant->name}}</div>
                </td>
                <td class="w-half">
                    <div>
                        <h4>From:</h4>
                    </div>
                    <div>XTL Freigaben</div>
                    <div>Hamburg</div>
                </td>
            </tr>
        </table>
    </div>

    <div class="margin-top">
        <table class="products">
            <tr>
                <th>Description</th>
                <th>Users / Api Calls Count</th>
                <th>Issued At</th>
                <th>Created At</th>
            </tr>
            <tr class="items">
                <td>{{ $report->description}}</td>
                <td>
                    <ul>
                        @php
                        $users = json_decode($report->users, true);
                        $apiCallsCount = json_decode($report->api_calls_count, true);
                        @endphp

                        @foreach($users as $key => $user)
                        <li>{{ $user }} : {{ $apiCallsCount[$key] }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>{{$report->created_at}}</td>
                <td>{{$report->expired_at}}</td>
            </tr>
        </table>
    </div>

    <div class="total">
        Total: $129.00 USD
    </div>

    <div class="footer margin-top">
        <div>Thank you</div>
        <div>&copy; XTL Freigaben</div>
    </div>
</body>

<style>
    h4 {
        margin: 0;
    }

    .w-full {
        width: 100%;
    }

    .w-half {
        width: 50%;
    }

    .margin-top {
        margin-top: 1.25rem;
    }

    .footer {
        font-size: 0.875rem;
        padding: 1rem;
        background-color: rgb(241 245 249);
    }

    table {
        width: 100%;
        border-spacing: 0;
    }

    table.products {
        font-size: 0.875rem;
    }

    table.products tr {
        background-color: rgba(15, 119, 109, 1);
    }

    table.products th {
        color: #ffffff;
        padding: 0.5rem;
    }

    table tr.items {
        background-color: rgb(241 245 249);
    }

    table tr.items td {
        padding: 0.5rem;
    }

    .total {
        text-align: right;
        margin-top: 1rem;
        font-size: 0.875rem;
    }
</style>

</html>