<!doctype html>

@yield('table')

<style>
    #botones_ser{
        left: inherit;
    }

    #color_panel{
        background-color: #5b8583;
        color: white;
    }

    #encabezado
    {
        margin: 5%;
        background: transparent;
    }


    #resultados{
        transition: all 0.5s;
    }

    #resultados:hover
    {
        background-color: #f0ad4e;
        transition: 0.5s;
    }

    #pie_pagina
    {
        background-color: #5bc0de;
        color: white;
    }


    body {
        background: linear-gradient(to right, #3FB6A8, #7ED386);
    }

    .container {
        background: #FFFFFF;
        width: 540px;
        height: 500px;
        margin: 0 auto;
        position: relative;
        margin-top: 2%;
        box-shadow: 2px 5px 20px rgba(119, 119, 119, 0.5);
    }

    .logo {
        float: right;
        margin-right: 12px;
        margin-top: 12px;
        font-family: "Nunito Sans", sans-serif;
        color: #3DBB3D;
        font-weight: 900;
        font-size: 1.5em;
        letter-spacing: 1px;
    }

    .CTA {
        width: 80px;
        height: 40px;
        right: -20px;
        bottom: 0;
        margin-bottom: 90px;
        position: absolute;
        z-index: 1;
        background: #7ED386;
        font-size: 1em;
        transform: rotate(-90deg);
        transition: all .5s ease-in-out;
        cursor: pointer;
    }
    .CTA h1 {
        color: #FFFFFF;
        margin-top: 10px;
        margin-left: 9px;
    }
    .CTA:hover {
        background: #3FB6A8;
        transform: scale(1.1);
    }

    .leftbox {
        float: left;
        top: -5%;
        left: 8%;
        position: absolute;
        width: 10%;
        height: 110%;
        background: #4b5563;
        box-shadow: 3px 3px 10px rgba(119, 119, 119, 0.5);
    }

    nav a {
        list-style: none;
        padding: 35px;
        color: #FFFFFF;
        font-size: 1.1em;
        display: block;
        transition: all .3s ease-in-out;
    }
    nav a:hover {
        transform: scale(1.2);
        cursor: pointer;
    }
    nav a:first-child {
        margin-top: 7px;
    }

    .rightbox {
        float: right;
        width: 60%;
        height: 100%;
    }

    .profile, .payment, .subscription, .privacy, .settings {
        transition: opacity .5s ease-in;
        position: absolute;
        width: 70%;
    }

    #nuevo_ser{
        text-align:center;
        color: #3b3f45;
        font-family: "Nunito Sans", sans-serif;
        font-weight: 700;
    }

</style>



</html>
