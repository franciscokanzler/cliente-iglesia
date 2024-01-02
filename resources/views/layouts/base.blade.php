<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Metas -->
    @if (env('IS_DEMO'))
        <x-demo-metas></x-demo-metas>
    @endif
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        iglesia
    </title>
    <!-- Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1" rel="stylesheet" />
    <link id="pagestyle" href="../assets/css/multiSteps.css?v=1" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/styles.css">
    <!-- Alpine -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    @livewireStyles

</head>

<body class="g-sidenav-show{{--  bg-gray-100 --}}">

    @if (session('token'))
        {{ $slot }}
    @else
        <livewire:auth.login />
    @endif

    <!--   Core JS Files   -->
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
    {{-- <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

    </script> --}}
    <!-- Github buttons -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script>
        window.addEventListener('modal', function(data) {
            if (data.detail.accion == "abrir") {
                $(data.detail.modal).modal('show');
            } else {
                $(data.detail.modal).modal('hide');
            }
        });
        window.addEventListener('modificarPaleta', function(data) {
            console.log(data.detail);
            Object.keys(data.detail).forEach(key => {
                console.log(key + ' - ' + data.detail[key]);
                document.documentElement.style.setProperty(key, data.detail[key]);
            });
        });
        window.addEventListener('infoConsola', function(data) {
            console.log(data.detail);
        });
        window.addEventListener('generarPaleta', function(data) {
            console.log(data.detail);

            const rgbColor = hexToRgb(data.detail);

            // Generar colores más claros y oscuros
            const lighterColors = generateLighterColors(rgbColor, 2);
            const darkerColors = generateDarkerColors(rgbColor, 3);

            const allColors = [...lighterColors, ...darkerColors];

            window.livewire.emit('nuevaPaleta', allColors);

            console.log(lighterColors);
            console.log(darkerColors);
            console.log(allColors);

        });

        // Función para convertir color hexadecimal a RGB
        function hexToRgb(hex) {
            const shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
            hex = hex.replace(shorthandRegex, (m, r, g, b) => {
                return r + r + g + g + b + b;
            });

            const result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
            return result ? {
                r: parseInt(result[1], 16),
                g: parseInt(result[2], 16),
                b: parseInt(result[3], 16)
            } : null;
        }

        // Función para convertir color RGB a hexadecimal
        function rgbToHex(color) {
            return "#" + ((1 << 24) + (color.r << 16) + (color.g << 8) + color.b).toString(16).slice(1);
        }

        // Función para generar colores más claros
        function generateLighterColors(color, count) {
            const lighterColors = [];
            for (let i = 1; i <= count; i++) {
                const factor = 1 + i * 0.1; // Ajusta este valor para cambiar la intensidad del color claro
                const newColor = {
                    r: Math.min(Math.round(color.r * factor), 255),
                    g: Math.min(Math.round(color.g * factor), 255),
                    b: Math.min(Math.round(color.b * factor), 255)
                };
                lighterColors.push(rgbToHex(newColor));
            }
            return lighterColors;
        }

        // Función para generar colores más oscuros
        function generateDarkerColors(color, count) {
            const darkerColors = [];
            for (let i = 1; i <= count; i++) {
                const factor = 1 - i * 0.1; // Ajusta este valor para cambiar la intensidad del color oscuro
                const newColor = {
                    r: Math.max(Math.round(color.r * factor), 0),
                    g: Math.max(Math.round(color.g * factor), 0),
                    b: Math.max(Math.round(color.b * factor), 0)
                };
                darkerColors.push(rgbToHex(newColor));
            }
            return darkerColors;
        }
    </script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    {{-- <script src="assets/js/soft-ui-dashboard.js"></script> --}}
    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
</body>

</html>
