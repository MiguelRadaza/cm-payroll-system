<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $payslip->employee->company->name }} - Paysplip</title>
    <style>
        body {
            background: #f0f0f0;
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            padding: 20px;
            height: 100%;
        }

        @import url('https://fonts.googleapis.com/css?family=Roboto:200,300,400,600,700');

        * {
            font-family: 'Roboto', sans-serif;
            font-size: 12px;
            color: #444;
        }

        #payslip {
            width: calc( 8.5in - 80px );
            height: calc( 11in - 60px );
            background: #fff;
            padding: 30px 40px;
        }

        #title {
            margin-bottom: 20px;
            font-size: 38px;
            font-weight: 600;
        }

        #scope {
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            padding: 7px 0 4px 0;
            display: flex;
            justify-content: space-around;
        }

        #scope > .scope-entry {
            text-align: center;
        }

        #scope > .scope-entry > .value {
            font-size: 14px;
            font-weight: 700;
        }

        .content {
            display: flex;
            border-bottom: 1px solid #ccc;
            height: 880px;
        }

        .content .left-panel {
            border-right: 1px solid #ccc;
            min-width: 200px;
            padding: 20px 16px 0 0;
        }

        .content .right-panel {
            width: 100%;
            padding: 10px 0  0 16px;
        }

        #employee {
            text-align: center;
            margin-bottom: 20px;
        }
        #employee #name {
            font-size: 15px;
            font-weight: 700;
        }

        #employee #email {
            font-size: 11px;
            font-weight: 300;
        }

        .details, .contributions, .ytd, .gross {
            margin-bottom: 20px;
        }

        .details .entry, .contributions .entry, .ytd .entry {
            display: flex;
            justify-content: space-between;
            margin-bottom: 6px;
        }

        .details .entry .value, .contributions .entry .value, .ytd .entry .value {
            font-weight: 700;
            max-width: 130px;
            text-align: right;
        }

        .gross .entry .value {
            font-weight: 700;
            text-align: right;
            font-size: 16px;
        }

        .contributions .title, .ytd .title, .gross .title {
            font-size: 15px;
            font-weight: 700;
            border-bottom: 1px solid #ccc;
            padding-bottom: 4px;
            margin-bottom: 6px;
        }

        .content .right-panel .details {
            width: 100%;
        }

        .content .right-panel .details .entry {
            display: flex;
            padding: 0 10px;
            margin: 6px 0;
        }

        .content .right-panel .details .label {
            font-weight: 700;
            width: 120px;
        }

        .content .right-panel .details .detail {
            font-weight: 600;
            width: 130px;
        }

        .content .right-panel .details .rate {
            font-weight: 400;
            width: 80px;
            font-style: italic;
            letter-spacing: 1px;
        }

        .content .right-panel .details .amount {
            text-align: right;
            font-weight: 700;
            width: 90px;
        }

        .content .right-panel .details .net_pay div, .content .right-panel .details .nti div {
            font-weight: 600;
            font-size: 12px;
        }

        .content .right-panel .details .net_pay, .content .right-panel .details .nti {
            padding: 3px 0 2px 0;
            margin-bottom: 10px;
            background: rgba(0, 0, 0, 0.04);
        }


        @media print {
            body {
                background: #f0f0f0;
                display: block;
                padding: 0;
                margin: 0;
            }

            #payslip {
                width: 100%; /* Use the full width of the printed page */
                height: auto; /* Let the content dictate the height */
                page-break-inside: avoid; /* Avoid page breaks within the payslip */
            }

            /* Add this to avoid breaking the content */
            .content {
                page-break-inside: avoid;
            }

            /* Adjust other styles as needed for print layout */
            /* For example, you might need to adjust font sizes, margins, and padding */
        }

    </style>
</head>
<body>
    <div id="payslip">
        <div id="title">Payslip</div>
        <div id="scope">
            <div class="scope-entry">
                <div class="title">PAY RUN</div>
                <div class="value">Mar 15, 2015</div>
            </div>
            <div class="scope-entry">
                <div class="title">PAY PERIOD</div>
                <div class="value">Mar 1 - Mar 15, 2015</div>
            </div>
        </div>
        <div class="content">
            <div class="left-panel">
                <div id="employee">
                    <div id="name">
                        {{ $payslip->employee->company->name }} 
                    </div>
                    <div id="email">
                        {{ $payslip->employee->company->user->email }} 
                    </div>
                </div>
                <div class="details">
                    <div class="entry">
                        <div class="label">Employee ID</div>
                        <div class="value">{{ $payslip->employee->id }} </div>
                    </div>
                    {{-- <div class="entry">
                        <div class="label">Tax Status</div>
                        <div class="value">Married - 2 Dependents</div>
                    </div> --}}
                    <div class="entry">
                        <div class="label">{{ $payslip->employee->is_fixed? 'Fixed Rate' : 'Hourly Rate' }}</div>
                        <div class="value">{{ number_format($payslip->employee->rate, 2) }} </div>
                    </div>
                    <div class="entry">
                        <div class="label">Company Name</div>
                        <div class="value">{{ $payslip->employee->company->name }}</div>
                    </div>
                    <div class="entry">
                        <div class="label">Date Hired</div>
                        <div class="value">{{ $payslip->employee->created_at }}</div>
                    </div>
                    <div class="entry">
                        <div class="label">Position</div>
                        <div class="value">{{ $payslip->employee->position == "15-30"? "15th & 30th" : "30th"  }}</div>
                    </div>
                    {{-- <div class="entry">
                        <div class="label">Department</div>
                        <div class="value">1st String</div>
                    </div> --}}
                    {{-- <div class="entry">
                        <div class="label">Rank</div>
                        <div class="value">MVP</div>
                    </div> --}}
                    <div class="entry">
                        <div class="label">Payroll Cycle</div>
                        <div class="value">{{ $payslip->employee->payout  }}</div>
                    </div>
                    {{-- <div class="entry">
                        <div class="label">Cost Center</div>
                        <div class="value">Under the Table Funds</div>
                    </div>
                    <div class="entry">
                        <div class="label">TIN</div>
                        <div class="value">123-123-123-123</div>
                    </div>
                    <div class="entry">
                        <div class="label">SSS</div>
                        <div class="value">12-3123123-1</div>
                    </div>
                    <div class="entry">
                        <div class="label">HDMF</div>
                        <div class="value">1231-2312-3123</div>
                    </div>
                    <div class="entry">
                        <div class="label">Philhealth</div>
                        <div class="value">12-312312312-3</div>
                    </div> --}}
                    {{-- <div class="entry">
                        <div class="label">Prepared by</div>
                        <div class="value">Piven Himself</div>
                    </div> --}}
                </div>
                <div class="gross">
                    <div class="title">Gross Income</div>
                    <div class="entry">
                        <div class="label"></div>
                        <div class="value">{{ number_format(($payslip->employee->payout == "15-30"?  $payslip->employee->rate / 2 : $payslip->employee->rate), 2)  }}</div>
                    </div>
                </div>
                <div class="contributions">
                    <div class="title">Employer Contribution</div>
                    {{-- <div class="entry">
                        <div class="label">SSS</div>
                        <div class="value">1,178.70</div>
                    </div>
                    <div class="entry">
                        <div class="label">SSS EC</div>
                        <div class="value">30.00</div>
                    </div>
                    <div class="entry">
                        <div class="label">HDMF</div>
                        <div class="value">100.00</div>
                    </div>
                    <div class="entry">
                        <div class="label">PhilHealth</div>
                        <div class="value">437.50</div>
                    </div> --}}
                </div>
                <div class="ytd">
                    <div class="title">Year To Date Figures</div>
                    <div class="entry">
                        <div class="label">Gross Income</div>
                        <div class="value">{{ number_format($payslip->employee->rate * 12, 2) }}</div>
                    </div>
                    {{-- <div class="entry">
                        <div class="label">Taxable Income</div>
                        <div class="value">82,705.06</div>
                    </div>
                    <div class="entry">
                        <div class="label">Withholding Tax</div>
                        <div class="value">21,548.85</div>
                    </div>
                    <div class="entry">
                        <div class="label">Net Pay</div>
                        <div class="value">69,656.21</div>
                    </div>
                    <div class="entry">
                        <div class="label">Allowance</div>
                        <div class="value">2,500.00</div>
                    </div>
                    <div class="entry">
                        <div class="label">Bonus</div>
                        <div class="value">21,409.34</div>
                    </div>
                    <div class="entry">
                        <div class="label">Commission</div>
                        <div class="value">5,500.00</div>
                    </div>
                    <div class="entry">
                        <div class="label">Deduction</div>
                        <div class="value">500.00</div>
                    </div>
                    <div class="entry">
                        <div class="label">SSS Employer</div>
                        <div class="value">1,178.70</div>
                    </div>
                    <div class="entry">
                        <div class="label">SSS EC Employer</div>
                        <div class="value">30.00</div>
                    </div>
                    <div class="entry">
                        <div class="label">PhilHealth Employer</div>
                        <div class="value">437.50</div>
                    </div>
                    <div class="entry">
                        <div class="label">Pag-ibig Employer</div>
                        <div class="value">100.00</div>
                    </div> --}}
                </div>
            </div>
            <div class="right-panel">
                <div class="details">
                    <div class="basic-pay">
                        <div class="entry">
                            <div class="label">Basic Pay</div>
                            <div class="detail"></div>
                            <div class="rate">{{ number_format($payslip->employee->rate, 2) }}/Month</div>
                            <div class="amount">{{ number_format($payslip->employee->rate, 2) }}</div>
                        </div>
                    </div>
                    <div class="salary">
                        <div class="entry">
                            <div class="label">Salary</div>
                            <div class="detail"></div>
                            <div class="rate"></div>
                            <div class="amount"></div>
                        </div>
                        
                        <div class="entry">
                            <div class="label"></div>
                            <div class="detail">Regular Holiday Night Overtime</div>
                            <div class="rate">2hrs@742.50/hr</div>
                            <div class="amount">1,485.00</div>
                        </div>
                        <div class="entry">
                            <div class="label"></div>
                            <div class="detail">Special Holiday</div>
                            <div class="rate">9hrs@337.50/hr</div>
                            <div class="amount">3,037.50</div>
                        </div>
                        <div class="entry">
                            <div class="label"></div>
                            <div class="detail">Special Holiday Night</div>
                            <div class="rate">7hrs@371.25/hr</div>
                            <div class="amount">2,598.75</div>
                        </div>
                        <div class="entry">
                            <div class="label"></div>
                            <div class="detail">Rest Day</div>
                            <div class="rate">8hrs@337.50/hr</div>
                            <div class="amount">2,700.00</div>
                        </div>
                    </div>
                    <div class="leaves">
                        <div class="entry">
                            <div class="label">Leaves</div>
                            <div class="detail"></div>
                            <div class="rate"></div>
                            <div class="amount"></div>
                        </div>
                        <div class="entry paid">
                            <div class="label"></div>
                            <div class="detail">Paid Leave</div>
                            <div class="rate">8hrs@259.62/hr</div>
                            <div class="amount">2,076.92</div>
                        </div>
                        <div class="entry unpaid">
                            <div class="label"></div>
                            <div class="detail">Unpaid Leave</div>
                            <div class="rate">8hrs@259.62/hr</div>
                            <div class="amount">(2076.96)</div>
                        </div>
                    </div>
                    <div class="taxable_allowance">
                        <div class="entry">
                            <div class="label">Taxable Allowance</div>
                            <div class="detail"></div>
                            <div class="rate"></div>
                            <div class="amount"></div>
                        </div>
                        {{-- <div class="entry">
                            <div class="label"></div>
                            <div class="detail">Allowance Name</div>
                            <div class="rate"></div>
                            <div class="amount">1,000.00</div>
                        </div> --}}
                    </div>
                    <div class="taxable_bonus">
                        <div class="entry">
                            <div class="label">Taxable Bonus</div>
                            <div class="detail"></div>
                            <div class="rate"></div>
                            <div class="amount"></div>
                        </div>
                        {{-- <div class="entry">
                            <div class="label"></div>
                            <div class="detail">Bonus Name</div>
                            <div class="rate"></div>
                            <div class="amount">19,409.34</div>
                        </div> --}}
                    </div>
                    <div class="taxable_commission"></div>
                    <div class="contributions">
                        <div class="entry">
                            <div class="label">Contributions</div>
                            <div class="detail"></div>
                            <div class="rate"></div>
                            <div class="amount"></div>
                        </div>
                        {{-- <div class="entry">
                            <div class="label"></div>
                            <div class="detail">SSS</div>
                            <div class="rate"></div>
                            <div class="amount">(581.30)</div>
                        </div>
                        <div class="entry">
                            <div class="label"></div>
                            <div class="detail">HDMF</div>
                            <div class="rate"></div>
                            <div class="amount">(100.00)</div>
                        </div>
                        <div class="entry">
                            <div class="label"></div>
                            <div class="detail">PhilHealth</div>
                            <div class="rate"></div>
                            <div class="amount">(437.50)</div>
                        </div> --}}
                    </div>
                    <div class="nti">
                        <div class="entry">
                            <div class="label">TAXABLE INCOME</div>
                            <div class="detail"></div>
                            <div class="rate"></div>
                            <div class="amount">0</div>
                        </div>
                    </div>
                    <div class="withholding_tax">
                        <div class="entry">
                            <div class="label">Withholding Tax</div>
                            <div class="detail"></div>
                            <div class="rate"></div>
                            {{-- <div class="amount">(21,548.85)</div> --}}
                        </div>
                    </div>
                    <div class="non_taxable_allowance">
                        <div class="entry">
                            <div class="label">Non-Taxable Allowance</div>
                            <div class="detail"></div>
                            <div class="rate"></div>
                            <div class="amount"></div>
                        </div>
                        {{-- <div class="entry">
                            <div class="label"></div>
                            <div class="detail">Allowance Name</div>
                            <div class="rate"></div>
                            <div class="amount">1,500.00</div>
                        </div> --}}
                    </div>
                    <div class="non_taxable_bonus">
                        <div class="entry">
                            <div class="label">Non-Taxable Bonus</div>
                            <div class="detail"></div>
                            <div class="rate"></div>
                            <div class="amount"></div>
                        </div>
                        {{-- <div class="entry">
                            <div class="label"></div>
                            <div class="detail">Bonus Name</div>
                            <div class="rate"></div>
                            <div class="amount">0</div>
                        </div> --}}
                    </div>
                    <div class="non_taxable_commission">
                        <div class="entry">
                            <div class="label">Non-Taxable Commission</div>
                            <div class="detail"></div>
                            <div class="rate"></div>
                            <div class="amount"></div>
                        </div>
                        {{-- <div class="entry">
                            <div class="label"></div>
                            <div class="detail">Commission Name 1</div>
                            <div class="rate"></div>
                            <div class="amount">3,000.00</div>
                        </div>
                        <div class="entry">
                            <div class="label"></div>
                            <div class="detail">Commission Name 2</div>
                            <div class="rate"></div>
                            <div class="amount">2,500.00</div>
                        </div> --}}
                    </div>
                    <div class="deductions">
                        <div class="entry">
                            <div class="label">Deductions</div>
                            <div class="detail"></div>
                            <div class="rate"></div>
                            <div class="amount"></div>
                        </div>
                        <?php
                            if (!empty($payslip->deductions)) {
                                foreach ($payslip->deductions as $deduction) {
                                    ?>
                                        <div class="entry">
                                            <div class="label"></div>
                                            <div class="detail">{{ $deduction->name }}</div>
                                            <div class="rate"></div>
                                            <div class="amount">{{ $deduction->amount }}</div>
                                            <div class="amount">(500.00)</div>
                                        </div>
                                    <?php
                                }
                            }
                        ?>
                        
                    </div>
                    <div class="net_pay">
                        <div class="entry">
                            <div class="label">NET PAY</div>
                            <div class="detail"></div>
                            <div class="rate"></div>
                            <div class="amount">{{ number_format($payslip->net_pay - $payslip->total_deductions, 2) }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>