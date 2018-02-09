<style>
    #pie{
        background-color: <?=$colores['pie']?>;
        color: <?=$colores['pie_letras']?>;
    }
    
    #linea-roja{
        background-color: <?=$colores['pie']?>;
        color: <?=$colores['pie_letras']?>;
    }
    
    body{
        font-family: '<?=$fuente2?>', Arial,Helvetica,sans-serif;
    }
    
    .tfiltro{
        font-family: '<?=$fuente1?>', sans-serif;
    }
    
    h1{
        font-family: '<?=$fuente1?>', sans-serif;
    }

    #buscador2{
        width: 267px;
    }
    
    #buscador2 input[type=text] {
        background: rgba(255, 255, 255, 0.20);
        border: none;
        margin-left: 15px;
        margin-top: 1px;
        border-bottom-left-radius: 3px;
        border-top-left-radius: 3px;
        color: #FFF;
        float: left;
        font-size: 21px;
        outline: none;
        padding: 5px 5px;
        width: 200px;
        vertical-align: middle;
    }

    #buscador2 span#BtBuscar {
        background: #d15c5c url(../source/lupa.png);
        background-position: center;
        background-repeat: no-repeat;
        border: none;
            margin-top: 1px;
        border-bottom-right-radius: 3px;
        border-top-right-radius: 3px;
        float: left;
        font-size: 20px;
        height: 22px;
        padding: 6px;
        width: 30px;
        margin-left: 0px;
        vertical-align: middle;
        }
    
    .num-cesta{
        position: relative;
        padding: 0px 5px;
        border-radius: 20px;
        background: white;
        color: darkslategray;
        font-weight: bold;
    }
    
    @media (max-width:830px)
    { 
        #buscador2{
            position: absolute;
            left:25%; 
            top:25%;
            margin-left: -0px;
        }
    }
    
    @media (max-width:500px)
    { 
        #buscador2{
            position: absolute;
            left:5%; 
            margin-left: -0px;
        }
    }
    
    #grupo-submenu #submenu a
			{
				color: <?=$colores['menu_letra']?>;
                        }
                        #grupo-submenu #submenu ul li:hover > a{
                            color: <?=$colores['menu_letra_hover']?>;
                        }                    
</style>

<style>
        
        * {
    margin: 0;
    padding: 0;
    border: 0 none;
    position: relative;
}
#menu_gral {
    font-family: '<?=$fuente2?>', verdana, sans sherif;
    width: 80%;
    margin: 1.5rem auto;
}
#menu_gral ul {
    list-style-type: none; 
    text-align: center;
    font-size: 0;
}
#menu_gral > ul li {
    display: inline-block;
    width: 50px;
    position: relative;
    background: #f7f7f7;
}
#menu_gral li form {
    display: block;
    text-decoration: none;
    font-size: 1rem;
    line-height: 2.5rem;
    color: #444;
}
#menu_gral li:hover form, #menu_gral li form:focus {
    background: transparent;
    color: #fff;
}

#menu_gral li ul {
    position: absolute;
    width: 0;
    overflow: hidden;
}
#menu_gral li:hover ul, #menu_gral li:focus ul {
    width: 100%;
    margin: 0;
    padding: 0;
    background:  transparent;
    z-index: 5;
}
#menu_gral li li {
    display: block;
    width: 100%;
}
#menu_gral li:hover li form, #menu_gral li:focus li form {
    font-family: '<?=$fuente2?>';
    font-size: .9rem;
    line-height: 1.7rem;
    border-top: 1px solid #e5e5e5;
    background: transparent;
}
#menu_gral li li form:hover, #menu_gral li li form:focus {
    background: transparent; 
}
.goog-te-spinner-pos {
    z-index: -1;
}

#top{
    overflow: visible;
}

#top div > span {
    display: inline;
}

#top div div a.perfil {
    background: rgba(255, 255, 255, 0) url("/source/perfil.png") no-repeat scroll center center / 16px auto;
}

#top div div a.desconectar {
    background: rgba(255, 255, 255, 0) url("/source/standby.png") no-repeat scroll center center / 16px auto;
}

#top div div a.perfil:hover{
    background: rgba(47, 47, 47, 0.3) url(/source/perfil.png) no-repeat center;
    background-size: 16px;
}

#prin:hover{
    background: rgba(47, 47, 47, 0.3) no-repeat center;
}
.num-cesta {
    background: black none repeat scroll 0 0;
    border-radius: 20px;
    color: white;
    font-weight: bold;
    margin-left: -13px;
    top: -30px;
    padding: 0 4px;
    position: relative;
}

#cabecera{
    width: 90% !important;
}
    @media (min-width:992px){
        #cabecera{
            left: -530px;
            margin-left: 50%;
            border-bottom: 0 solid #be2828;
        }


        #cabecera #logo {
            margin-top: 0px;
        }
    }
    @media (min-width:940px){
        .solomovil{
            display: none;
        }
    }
    @media (max-width:940px){
        #cabecera {
            display: none;
        }
        
        .solomovil{
            display: inline;
        }
    }
    @media (max-width:900px){
        .nomostrar{
            display: none !important;
        }
        
        .posicion{
            float: right !important;
        }
        
        .perfil{
            margin-right: 18px !important;
        }
    }
    @media (max-width:1060px){
        #top > div {
            width: 100%;
        }
    }
</style>



</div>


    <div id="cabecera">
    

    
            
                
</div>




</div>

