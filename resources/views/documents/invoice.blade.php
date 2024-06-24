<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" charset="UTF-8" http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta />

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            font-size: 14px;
            min-height: 100vh;

        }


        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th,
        td {
            text-align: right;
        }

        td {
            padding: 8px;
        }

        h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .header {
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 300px;
        }

        .address {
            font-size: 14px;
            text-align: right;
        }

        .footer {
            display: flex;
            width: 100%;
            justify-content: space-between;
            background-color: #f5f5f5;
            font-size: 12px;
            margin-top: auto;

        }

        .footer-column {
            flex: 1;
        }

        .footer-left {
            text-align: left;
        }

        .footer-right {
            text-align: right;
        }

        .footer-center {
            text-align: center;
        }

        .footer-left,
        .footer-right,
        .footer-center {
            padding: 0 20px;
        }

        @media (max-width: 768px) {
            .footer {
                flex-direction: column;
            }

            .footer-column {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }

        .container {
            display: flex;
            justify-content: space-between;
        }

        .column {
            width: 33%;
        }
    </style>
    <title>Simple Table</title>
</head>

<body>
    <main>
        <div class="header">
            <div class="container">
                <div>
                </div>
                <div class="address">

                </div>
                <table>

                    <tbody>
                        <tr style="border: none; width:100%">
                            <td style="text-align: left;">
                                <img src="https://elsenmedia.com/emdocs/uploads/2021/02/emlogobracket_t.png" alt="Logo" class="w-32">
                            </td>
                            <td style="text-align: right;">
                                <p>XTL Freigaben</p>
                                <p>Großes Feld 7</p>
                                <p>25421 Pinneberg</p>
                                <p>Tel.: 04101/5389206</p>
                                <p>mail@elsenmedia.com</p>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="container">
            <table>

                <tbody>
                    <tr style="border: none; ">
                        <td style="width: 50%; text-align: left;">
                            <p style="text-decoration:underline;">XTL Freigaben, Großes Feld 7, 25421 Pinneberg</p>
                            <p>Sprint Tank GmbH <br>
                                Kurfürstendamm 26a<br>
                                10719 Berlin
                            </p>
                        </td>
                        <td style="width: 25%; text-align: right;">
                            <p>Rechnungsnr.: <br>
                                Kundennr.: <br>
                                Datum: <br>
                                Lieferdatum: <br>
                            </p>
                        </td>
                        <td style="width: 25%; text-align: right;">
                            <p> {{$invoice->invoice_number}}<br>
                                {{$invoice->user_id}}<br>
                                {{ \Carbon\Carbon::parse($invoice->created_at)->format('d.m.Y')}} <br>
                                {{ \Carbon\Carbon::parse($invoice->created_at)->format('d.m.Y')}} <br>

                            </p>
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
        <h2>Rechnung <span style="font-weight: bold;">{{$invoice->invoice_number}}</span></h2>

        <p>Unsere erbrachten Leistungen stellen wir Ihnen wie folgt in Rechnung:</p>
        <div class="overflow-x-auto">
            <table>
                <thead>
                    <tr>
                        <th>Pos.</th>
                        <th>Bezeichnung</th>
                        <th>Anz.</th>
                        <th>Einzel €</th>
                        <th>Gesamt €</th>
                    </tr>

                </thead>
                <tbody>
                    <tr style="border-top: 1px solid black; text-align: left; width: auto;">
                        <td style="width: 5%">1</td>
                        <td>Number of API Calls</td>
                        <td>{{$invoice->api_call_count}}</td>
                        <td>{{$invoice->api_call_cost}}</td>
                        <td>{{$invoice->api_call_count * $invoice->api_call_cost}}</td>

                    </tr>

                    <tr style="border-top: 1px solid black; text-align: left; width: auto;">
                        <td>2</td>
                        <td>Monthly API Cost</td>
                        <td>1</td>
                        <td>{{$invoice->monthly_cost}}</td>
                        <td>{{$invoice->monthly_cost}}</td>
                    </tr>
                </tbody>
            </table>
            <table>
                <tbody>
                    <tr>
                        <td style="text-align: left;">Zwischensumme (netto) </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{$invoice->total_bill}}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Umsatzsteuer {{$invoice->tax_rate * 100}}%</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{$invoice->total_bill * $invoice->tax_rate}}</td>
                    </tr>
                    <tr style="border-top: 1px solid black; text-align: left; width: auto;">
                        <td style="text-align: left; font-weight: bold;">Gesamtbetrag</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{$invoice->total_bill + $invoice->total_bill * $invoice->tax_rate}}</td>
                </tbody>
            </table>
        </div>
        <div>
            <p> Zahlbar bis {{ \Carbon\Carbon::parse($invoice->created_at)->addDays(15)->format('d.m.Y')}} , rein netto ohne Abzüge. <br>
                Alle Preise verstehen sich zzgl. 19% USt. falls nicht anders angegeben. Im Übrigen gelten unsere AGB <br>
                unter elsenmedia.com/agbs. Bitte überweisen Sie den Rechnungsbetrag unter Angabe der <br>
                Rechnungsnummer auf das angegebene Konto bei der VR Bank in Holstein. <br>
                Wir bedanken uns für Ihren Auftrag und die angenehme Zusammenarbeit. <br>
                Ihr Team der XTL Freigaben
            </p>

        </div>
    </main>
    <footer class="footer">
        <table>

            <tbody>
                <tr style="border: none; ">
                    <td style="width: 33%; text-align: left;">
                        <div class="footer-column footer-left">
                            XTL Freigaben<br>
                            Großes Feld 7<br>
                            25421 Pinneberg<br>
                            Tel.: 04101/5389206<br>
                            mail@elsenmedia.com<br>
                        </div>
                    </td>
                    <td style="width: 33%; text-align: left;">
                        <div class="footer-column footer-center">
                            USt-IdNr.: DE338867353<br>
                            Amtsgericht Pinneberg, HRB 15591 PI<br>
                            Sitz der Gesellschaft: Pinneberg<br>
                            Geschäftsführer: Mario Elsen<br>
                            www.elsenmedia.com/agbs
                        </div>
                    </td>
                    <td style="width: 33%; text-align: left;">
                        <div class="footer-column footer-right">
                            XTL Freigaben <br>
                            VR Bank in Holstein <br>
                            IBAN: DE26 2219 1405 0079 0031 70 <br>
                            BIC: GENODEF1PIN<br>
                        </div>
                    </td>

                </tr>
            </tbody>
        </table>
    </footer>
</body>

</html>