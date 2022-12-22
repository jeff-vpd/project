@extends('layouts.app')

<link rel="stylesheet" href="/css/dashboard/style.dash.css">


@section('content')
    <div class="container">
        <div class="text-center titleHead  rounded">
            <h1 class=" heading">Dashboard</h1>
            <h4>Howdy, {{ Auth::user()->name }}</h4>
        </div>
        <div class="gallery-image">
            <div class="img-box rounded">
                <a href="/employee">
                    <img src="https://www.svgrepo.com/show/139985/human-resources.svg" alt="" />
                    <div class="transparent-box">
                        <div class="caption">
                            <h3>Human Resources</h3>
                            <p class="opacity-low">Managing employee life cycle</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="img-box rounded">
                <img src="https://www.svgrepo.com/show/89074/stock.svg" alt="" />
                <div class="transparent-box">
                    <div class="caption">
                        <h3>Inventory</h3>
                        <p class="opacity-low">Company's goods and products</p>
                    </div>
                </div>
            </div>
            <div class="img-box rounded">
                <img src="https://www.svgrepo.com/show/6984/customer-service.svg" alt="" />
                <div class="transparent-box">
                    <div class="caption">
                        <h3>Customer</h3>
                        <p class="opacity-low">We value</p>
                    </div>
                </div>
            </div>
            <div class="img-box rounded">
                <img src="https://www.svgrepo.com/show/32361/cashbox.svg" alt="" />
                <div class="transparent-box">
                    <div class="caption">
                        <h3>Payroll</h3>
                        <p class="opacity-low">Employees Payroll</p>
                    </div>
                </div>
            </div>
            <div class="img-box rounded">
                <img src="https://www.svgrepo.com/show/45743/abacus.svg" alt="" />
                <div class="transparent-box">
                    <div class="caption">
                        <h3>Accounting</h3>
                        <p class="opacity-low">Financial Informations</p>
                    </div>
                </div>
            </div>
            <div class="img-box rounded">
                <img src="https://www.svgrepo.com/show/233840/point-of-sale-payment.svg" alt="" />
                <div class="transparent-box">
                    <div class="caption">
                        <h3>Point of Sale</h3>
                        <p class="opacity-low">Rings up of Customer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        body {
            font-family: Raleway;
            background-color: #aecfe5;
        }
    </style>
@endsection
