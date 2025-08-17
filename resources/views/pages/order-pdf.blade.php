<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pedido #{{ $order->id }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: "Nunito", sans-serif;
            letter-spacing: 2px;
            font-size: 12px;
            color: #333;
        }

        /*
        .container {
            max-width: 800px;
            margin: auto;
        } */

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .total {
            text-align: right;
            font-size: 14px;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            font-size: 10px;
            color: #777;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Cabeçalho -->
        <div class="header">
            <img style="width: 18%; border-radius: 100%;" src="{{ $order->customer_image }}" alt="">
            <h1>Pedido #{{ $order->id }}</h1>
            <p>{{ \Carbon\Carbon::parse($order->created_date)->translatedFormat('l, d, M, Y') }}</p>
        </div>

        <h1 style="margin-top: 0; font-size: 14px; background: #f4f4f4; width: 100%; padding: 5px; border-radius: 4px;">
            Cliente
        </h1>

        <!-- Informações -->
        <table>
            <tbody>
                <tr>
                    <td>
                        <p><strong>Nome:</strong> {{ $order->customer_name }}</p>
                    </td>
                    <td>
                        <p><strong>Email:</strong> {{ $order->customer_email }}</p>
                    </td>
                    <td>
                        <p><strong>Telefone:</strong> {{ $order->customer_phone }}</p>
                    </td>
                </tr>
            </tbody>
        </table>

        <h1 style="margin-top: 0; font-size: 14px; background: #f4f4f4; width: 100%; padding: 5px; border-radius: 4px;">
            Pedido
        </h1>

        <!-- Informações -->
        <table>
            <tbody>
                <tr>
                    <td>
                        <p><strong>Data:</strong> {{ \Carbon\Carbon::parse($order->created_date)->format('d/m/Y') }}</p>
                    </td>
                    <td>
                        <p><strong>Hora:</strong> {{ \Carbon\Carbon::parse($order->created_date)->format('H:i') }}</p>
                    </td>
                    <td>
                        <p><strong>Pagamento:</strong> {{ $order->payment }}</p>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Itens -->
        <table>
            <thead>
                <tr style="background: #f4f4f4; font-size: 12px;">
                    <th style="text-align: left;">Itens</th>
                    <th>Qtd</th>
                    <th style="text-align: right;">Preço</th>
                    <th style="text-align: right;">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td style="text-align: center;">{{ $item->pivot->quantity }}</td>
                        <td style="text-align: right;">R$ {{ number_format($item->price, 2, ',', '.') }}</td>
                        <td style="text-align: right;">R$ {{ number_format($item->price * $item->pivot->quantity, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Total -->
        <p class="total">Total: R$ {{ number_format($order->total, 2, ',', ' ') }}</p>

        <!-- Rodapé -->
        <div class="footer">
            <p>Obrigado por comprar conosco!</p>
            {{-- <p>{{ $store['name'] ?? 'Minha Loja' }} - {{ $store['cnpj'] ?? '00.000.000/0000-00' }}</p> --}}
        </div>
    </div>
</body>

</html>
