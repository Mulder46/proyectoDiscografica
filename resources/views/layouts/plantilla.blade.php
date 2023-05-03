<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet" type="text/css">

</head>
<body>
    <div class="cajaCentro">
        <nav class="navbar">
            <!--Menu de artistas  --> 
            <ul class="menu__list r-list">
                <li class="menuItem"><a class="menu__link r-link text-underlined" href="/">Inicio</a></li>
                <li class="menuItem"><a class="menu__link r-link text-underlined" href="/artists">Todos los artistas</a></li>
                <li class="menuItem"><a class="menu__link r-link text-underlined" href="/show-artist-form">Listar artista</a></li>
                <li class="menuItem"><a class="menu__link r-link text-underlined" href="/disks">Todos los discos</a></li>
                <li class="menuItem"><a class="menu__link r-link text-underlined" href="/show-disk-form">Listar disco</a></li>
                <li class="menuItem"><a class="menu__link r-link text-underlined" href="/songs">Todos las canciones</a></li>
                <li class="menuItem"><a class="menu__link r-link text-underlined" href="/show-song-form">Listar canción</a></li>
        </nav>

 
            <div class="gris">
                <div class="hijoGris">
                    @yield('content')
                </div>
            </div>

        
        <footer class="foot">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8b/Copyleft.svg/220px-Copyleft.svg.png" height="14">Creado por por David León valle (Fox Mulder). Todos los derechos son libres:"Imaginemos un mundo en que cada persona tiene el acceso libre y gratuito a la suma de todo el conocimiento humano. Es lo que estamos haciendo." 
        </footer>
    </div>
</body>
</html>