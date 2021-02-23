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

    .register{
    background: -webkit-linear-gradient(left, #F62441, #9acd32);
    margin-top: 1%;
    padding: 2%;
}
    .register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;

}
    #btn-cancelar {
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 30%;
    margin-bottom: 3%;
    cursor: pointer;
}
    .register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}
.register-left img{
    margin-top: 30%;
    margin-bottom: 40%;
    width: 40%;

    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 10%;
    margin-top: 10%;
}
    #btnRegister{
        float: right;
        margin-top: 10%;
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
        background: #228b22;
        color: #fff;
        font-weight: 600;
        width: 50%;
        cursor: pointer;
    }

    .register .nav-tabs{
        margin-top: 3%;
        border: none;
        background: #228b22;
        border-radius: 1.5rem;
        width: 28%;
        float: right;

    }

.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;

}
.register .nav-tabs .nav-link.active{
    width: 100px;
    color: #228b22;
    border: 2px solid #228b22;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;

}
.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #495057;

}
    #form_pro{
        width: 650px;
        height: 500px;
    }
    #detalle_form{
        height: 910px;
    }
    #form_proveedores{
        width: 650px;
        height: 500px;
    }
    #detalle_form_prov{
        height: 700px;
    }

    img{
        height:150px;
        width:100%;
    }

    div [class^="col-"] {
        padding-left: 5px;
        padding-right: 5px;
    }



</style>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</body>
</html>
