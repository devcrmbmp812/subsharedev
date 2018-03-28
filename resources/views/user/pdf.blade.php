<table cellpadding="0" cellspacing="0" style="text-align: left;width: 100%">
    <tr class="top" style="font-size:45px;line-height:45px;color:#333;padding-bottom:20px">
        <td colspan="2" style="padding: 5px;">
            <table>
                <tr>
                    <td class="title" style="font-size:45px;line-height:45px;color:#333;">
                        <img src="{{url('assets/img/logo.png')}}" style="max-width:500;">
                    </td>


                </tr>
            </table>
        </td>
    </tr>

    <tr class="information">
        <td colspan="2" style="padding-bottom:40px;padding: 5px;">
            <table>
                <tr>
                    <td style="padding: 5px;">
                        Transaction #: {{ $transaction->id }}<br> Created: <?php  echo \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaction->created_at)->format('Y-m-d'); ?> <br>

                    </td>


                </tr>
            </table>
        </td>
    </tr>


    <tr class="heading" style="background:#eee;border-bottom:1px solid #ddd;font-weight:bold;">
        <td style="padding: 5px;">
            Transaction Details
        </td>

        <td style="padding: 5px;">
            &nbsp;
        </td>
    </tr>


    <tr class="item">
        <td style="padding: 5px;">
            Title
        </td>

        <td style="padding: 5px;">
            {{ $transaction->title }}
        </td>
    </tr>

    <tr class="item">
        <td style="padding: 5px;">
            Currency
        </td>

        <td style="padding: 5px;">
            {{ $transaction->currency }}
        </td>
    </tr>

    <tr class="item last">
        <td style="padding: 5px;">
            Details
        </td>

        <td style="padding: 5px;">
            {{ $transaction->details }}
        </td>
    </tr>
    <tr class="item last">
        <td style="padding: 5px;">
            Amount
        </td>

        <td style="padding: 5px;">
            {{ $transaction->amount }}
        </td>
    </tr>


</table>
</body>