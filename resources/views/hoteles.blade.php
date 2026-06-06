<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelNow Colombia</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --negro: #0f0f0f;
            --gris: #1b1b1b;
            --dorado: #d4af37;
            --blanco: #ffffff;
        }

        body {
            background: var(--negro);
            color: var(--blanco);
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
            background: linear-gradient(90deg, #000000, #1b1b1b);
            border-bottom: 2px solid var(--dorado);
            box-shadow: 0 3px 15px rgba(212, 175, 55, 0.3);
        }

        .navbar-brand {
            color: var(--dorado) !important;
            font-size: 1.5rem;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .hero {
            text-align: center;
            padding: 60px 20px;
        }

        .hero h1 {
            color: var(--dorado);
            font-size: 3rem;
            font-weight: bold;
        }

        .hero p {
            color: #bdbdbd;
            font-size: 1.1rem;
        }

        .card {
            background: var(--gris);
            border: 1px solid rgba(212, 175, 55, 0.25);
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .5);
            color: white;
            margin-bottom: 30px;
        }

        h3 {
            color: var(--dorado);
            font-weight: bold;
        }

        .table {
            color: white;
        }

        .table thead {
            background: var(--dorado);
            color: black;
        }

        .table thead th {
            background: var(--dorado);
            color: black;
            border: none;
        }

        .table tbody tr:nth-child(even) {
            background: rgba(212, 175, 55, 0.07);
        }

        .table tbody tr:hover {
            background: rgba(212, 175, 55, 0.15);
            transition: .3s;
        }

        .hotel-img {
            width: 130px;
            height: 90px;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid var(--dorado);
        }

        .form-control {
            background: #252525;
            color: white;
            border: 1px solid #444;
        }

        .form-control:focus {
            background: #252525;
            color: white;
            border-color: var(--dorado);
            box-shadow: 0 0 10px rgba(212, 175, 55, .4);
        }

        .btn-gold {
            background: var(--dorado);
            color: black;
            font-weight: bold;
            border: none;
            padding: 10px 25px;
        }

        .btn-gold:hover {
            background: #f5cd4d;
            color: black;
            transform: translateY(-2px);
            transition: .3s;
        }

        .alert-success {
            background: #1f3d1f;
            border: 1px solid #4caf50;
            color: #fff;
        }

        footer {
            text-align: center;
            color: #999;
            margin-top: 40px;
            padding: 20px;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <span class="navbar-brand">
                <i class="bi bi-airplane-fill"></i>
                TravelNow Colombia
            </span>
        </div>
    </nav>

    <div class="hero">
        <h1>Turismo Premium</h1>
        <p>
            Explora hoteles exclusivos y realiza reservas
            en los mejores destinos turísticos de Colombia.
        </p>
    </div>

    <div class="container">

        @if(session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle-fill"></i>
            {{ session('success') }}
        </div>
        @endif

        <div class="card p-4">

            <h3 class="mb-4">
                <i class="bi bi-building"></i>
                Hoteles Disponibles
            </h3>

            <div class="table-responsive">

                <table class="table table-borderless align-middle">

                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>ID</th>
                            <th>Hotel</th>
                            <th>Descripción</th>
                            <th>Ciudad</th>
                            <th>Precio/Noche</th>
                            <th>Habitaciones</th>
                            <th>Calificación</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($hoteles as $hotel)

                        <tr>

                            <td>
                                <img src="{{ $hotel['imagen'] }}"
                                    class="hotel-img">
                            </td>

                            <td>{{ $hotel['id'] }}</td>

                            <td>{{ $hotel['nombre'] }}</td>

                            <td>{{ $hotel['descripcion'] }}</td>

                            <td>{{ $hotel['ciudad'] }}</td>

                            <td>
                                ${{ number_format($hotel['precio']) }}
                            </td>

                            <td>
                                {{ $hotel['habitaciones'] }}
                            </td>

                            <td>
                                ⭐ {{ $hotel['calificacion'] }}/5
                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

        <div class="card p-4">

            <h3 class="mb-4">
                <i class="bi bi-calendar-check"></i>
                Registrar Reserva Turística
            </h3>

            <form method="POST" action="{{ route('reserva.store') }}">

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Nombre del Hotel
                    </label>

                    <input type="text"
                        name="hotel"
                        class="form-control"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Descripción de la Reserva
                    </label>

                    <textarea
                        name="descripcion"
                        class="form-control"
                        rows="4"
                        required></textarea>

                </div>

                <button type="submit" class="btn btn-gold">
                    <i class="bi bi-send-fill"></i>
                    Registrar Reserva
                </button>

            </form>

        </div>

    </div>

    <footer>
        © 2026 TravelNow Colombia S.A.S. | Sistema de Gestión Turística
    </footer>

</body>

</html>