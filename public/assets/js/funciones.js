window.onload = function () {
    window.livewire.emit('configuracionInicial');
    setTimeout(function () {
        window.livewire.emit('mostrar');
    }, 1000);
};

window.addEventListener('modal', function (data) {
    if (data.detail.accion == "abrir") {
        $(data.detail.modal).modal('show');
    } else {
        $(data.detail.modal).modal('hide');
    }
});
window.addEventListener('modificarPaleta', function (data) {
    //console.log(data.detail);
    Object.keys(data.detail).forEach(key => {
        //console.log(key + ' - ' + data.detail[key]);
        document.documentElement.style.setProperty(key, data.detail[key]);
    });
});
/* window.addEventListener('sombra', function (data) {
    //console.log(data.detail);
    Object.keys(data.detail).forEach(key => {
        console.log(key);
        console.log(data.detail[key]['status']);
        if (data.detail[key]['status'] == true) {
            document.documentElement.style.setProperty('--btn-box-shadow',
                '0 8px 26px -4px rgba(9, 8, 8, 0.75), 0 8px 9px -5px rgb(15, 15, 15)');
        } else {
            document.documentElement.style.setProperty('--btn-box-shadow', 'none');
        }
    });
}); */
window.addEventListener('infoConsola', function (data) {
    console.log(data.detail);
});
window.addEventListener('generarPaleta', function (data) {
    //console.log(data.detail);

    const rgbColor = hexToRgb(data.detail);

    // Generar colores más claros y oscuros
    const lighterColors = generateLighterColors(rgbColor, 2);
    const darkerColors = generateDarkerColors(rgbColor, 3);

    const allColors = [...lighterColors, ...darkerColors];

    window.livewire.emit('nuevaPaleta', allColors);

    /* console.log(lighterColors);
    console.log(darkerColors);
    console.log(allColors); */

});
window.addEventListener('scroll', ajustarMargenMenu);
window.addEventListener('ajusteMenuDos', ajustarMargenMenu);

window.addEventListener('ajusteMargenBody', function (data) {
    var body = document.querySelector('.body');

    if (document.querySelector('.menu-fixed')) {
        body.style.marginTop = '96px';
    }else{
        body.style.marginTop = '0px';
    }
});

function ajustarMargenMenu() {
    if (!document.querySelector('.menu-fixed')) {
        var menu1 = document.querySelector('.bg-menu');
        var menu2 = document.querySelector('.barraLateral');

        var menu1Height = menu1.offsetHeight;
        var scrollY = window.scrollY || window.pageYOffset;

        // Ajusta el margen superior proporcionalmente al desplazamiento hacia abajo
        var newMenu2Margin = Math.max(menu1Height - scrollY, 0);

        menu2.style.marginTop = newMenu2Margin + 'px';
    }
}

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
